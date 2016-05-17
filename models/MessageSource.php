<?php

namespace yeesoft\translation\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "message_source".
 *
 * @property integer $id
 * @property string $category
 * @property string $message
 * @property integer $immutable
 *
 * @property Message[] $messages
 */
class MessageSource extends \yeesoft\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message_source}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['immutable', 'message', 'category'], 'required'],
            [['immutable'], 'integer'],
            [['category'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee', 'ID'),
            'category' => Yii::t('yee/translation', 'Category'),
            'message' => Yii::t('yee/translation', 'Source Message'),
            'immutable' => Yii::t('yee/translation', 'Immutable'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getMessageCategories()
    {
        $rows = (new Query())
            ->select(['category', 'count(*) AS count'])
            ->from(self::tableName())
            ->groupBy('category')
            ->orderBy('category ASC')
            ->all();

        $categories = [];
        foreach ($rows as $row) {
            $categories[$row['category']] = $row['count'];
        }

        return $categories;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getCategories()
    {
        $sources = MessageSource::find()
            ->distinct()
            ->select(['category'])
            ->all();

        $result = [];
        foreach ($sources as $source) {
            $result[$source->category] = $source->category;
        }

        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getMessagesByCategory($category)
    {
        return MessageSource::findAll(['category' => $category]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getMessageIdsByCategory($category)
    {
        $messages = MessageSource::getMessagesByCategory($category);

        $ids = array_map(function ($message) {
            return $message->id;
        }, $messages);

        return $ids;
    }
}