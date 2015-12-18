<?php
namespace yii\easyii\models;

use Yii;

class Admin extends \yii\easyii\components\ActiveRecord implements \yii\web\IdentityInterface
{
    static $rootUser = [
        'admin_id' => 0,
        'username' => 'root',
        'password' => '',
        'auth_key' => '',
        'access_token' => '',
        'role' => 'root',
        'cate_manage' => '',
    ];

    public static function tableName()
    {
        return 'easyii_admins';
    }

    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'unique'],
            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'length' => [6, 12]],
            ['password', 'safe'],
            ['email', 'required'],
            ['email', 'email'],
            ['cate_manage', 'required'],
            ['access_token', 'default', 'value' => null]
        ];
    }
    
    public function roles()
    {
        return [
            'admin' => Yii::t('easyii', 'Administrator'),
            'editor' => Yii::t('easyii', 'Editor'),
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('easyii', 'Username'),
            'password' => Yii::t('easyii', 'Password'),
            'role' => Yii::t('easyii', 'Assign role'),
            'cate_manage' => Yii::t('easyii', 'Assign categories'),
            'email' => Yii::t('easyii', 'Email'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->cate_manage = implode(',', $this->cate_manage);
            if ($this->isNewRecord) {
                $this->auth_key = $this->generateAuthKey();
                $this->password = $this->hashPassword($this->password);
            } else {
                $this->password = $this->password != '' ? $this->hashPassword($this->password) : $this->oldAttributes['password'];
            }
            return true;
        } else {
            return false;
        }
    }

    public static function findIdentity($id)
    {
        $result = null;
        try {
            $result = $id == self::$rootUser['admin_id']
                ? static::createRootUser()
                : static::findOne($id);
        } catch (\yii\base\InvalidConfigException $e) {
        }
        return $result;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        if ($username === self::$rootUser['username']) {
            return static::createRootUser();
        }
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->admin_id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $this->hashPassword($password);
    }

    private function hashPassword($password)
    {
        return sha1($password . $this->getAuthKey() . Setting::get('password_salt'));
    }

    private function generateAuthKey()
    {
        return Yii::$app->security->generateRandomString();
    }

    public static function createRootUser()
    {
        return new static(array_merge(self::$rootUser, [
            'password' => Setting::get('root_password'),
            'auth_key' => Setting::get('root_auth_key')
        ]));
    }

    public function isRoot()
    {
        return $this->username === self::$rootUser['username'];
    }
    
    public function controlCates()
    {
        return ($this->cate_manage) ? explode(',', $this->cate_manage) : false;
    }
}
