<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $password
 * @property int $role
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'login', 'password'], 'required'],
            [['name', 'login', 'password'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->password = md5($this->password);
        }

        return parent::beforeSave($insert);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'login' => 'Логин',
            'password' => 'Пароль',
            'role' => 'Роль',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return null;
    }

    public static function findByUsername($login)
    {
        return User::findOne(['login' => $login]);
    }

    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    public function isAdmin()
    {
        return $this->role === 1;
    }
    public function getUserName()
    {
        return $this->name;
    }

}
