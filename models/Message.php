<?php

namespace yeesoft\translation\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property integer $source_id
 * @property string $language
 * @property string $translation
 *
 * @property MessageSource $id0
 */
class Message extends \yeesoft\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_id', 'language'], 'required'],
            [['source_id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 16]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSource()
    {
        return $this->hasOne(MessageSource::className(), ['id' => 'source_id']);
    }

    /**
     * @inheritdoc
     */
    public static function initMessages($category, $language)
    {
        $messageIds = MessageSource::getMessageIdsByCategory($category);

        $translations = Message::find()
            ->select('source_id')
            ->andWhere(['IN', 'source_id', $messageIds])
            ->andWhere(['language' => $language])
            ->all();

        $translationIds = array_map(function ($translation) {
            return $translation->source_id;
        }, $translations);

        $translationsToCreate = array_diff($messageIds, $translationIds);

        foreach ($translationsToCreate as $translationId) {
            $message = new Message();
            $message->source_id = $translationId;
            $message->language = $language;
            $message->translation = '';
            $message->save();
        }

        return true;
    }
}