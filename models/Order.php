<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $discription
 * @property int $user_id
 * @property string $username
 * @property string $servise
 * @property string $date
 * @property int $price
 * @property int $status
 *
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discription', 'servise'], 'required'],
            [[ 'price', 'status'], 'integer'],
//            ['username', 'default', 'value' => Yii::$app->user->getUserName()],
            [['discription', 'servise'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->user_id = Yii::$app->user->id;
            $this->date = date("Y-m-d H:i:s");
        }

        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'discription' => 'Описание',
            'user_id' => 'User ID',
            'username' => 'ФИО',
            'servise' => 'Услуга',
            'date' => 'Дата',
            'price' => 'Цена',
            'status' => 'Статус',
        ];

    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getStatusText()
    {
        switch ($this->status){
            case 0: return 'Не выполнен';
            case 1: return 'Выполнен';
        }
    }
}
