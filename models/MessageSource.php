<?php

namespace yeesoft\translation\models;

use Yii;

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
class MessageSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['immutable'], 'required'],
            [['immutable'], 'integer'],
            [['category'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yee/translation', 'ID'),
            'category' => Yii::t('yee/translation', 'Category'),
            'message' => Yii::t('yee/translation', 'Message'),
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
}