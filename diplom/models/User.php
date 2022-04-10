<?php

namespace app\models;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $image='';
   // public $avatar='';

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    public static function tableName()
    {
        return 'userlist';
    }

    public function rules()
    {
        return [
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
        ];
    }


/*    public function getMessage()
    {
        return $this->hasMany(Message::class, ['User' => 'id']);
    }*/

/*    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];*/


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
       // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by login
     *
     * @param string $login
     * @return static|null
     */
    /*public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }*/
    public static function findByLogin($login)
    {
        return static::findOne(['login' => $login]);
    }


    public static function isUserAdmin($login)
    {
        if (static::findOne(['login' => $login, 'role' => self::ROLE_ADMIN]))
        {
            return true;
        } else {
            return false;
        }
    }



    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }


    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    /*public function validatePassword($password)
    {
        return $this->password === $password;
    }*/
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    public function upload($id)
    {
        if ($this->validate() && ($this->image != null)) {
            // $this->image->saveAs("uploads/{$this->image->baseName}.{$this->image->extension}");
            $this->image->saveAs("images/avatars/{$id}.{$this->image->extension}");
            $this->avatar = $this->image->extension;
        } else {
            return false;
        }
    }

    public function getExtension()
    {
        return $this->image->extension;
        //return $this->avatar;
    }
}
