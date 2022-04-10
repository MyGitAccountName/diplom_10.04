<?php


namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class SignupForm extends Model
{
    public $Login;
    public $Name = "";
    public $SurName = "";
    public $Password;
    public $Confirm;
    public $Birthday;
    public $image;

    public function rules() {
        return [
            [['Login', 'Password', 'Confirm', 'Birthday'], 'required', 'message' => 'Заполните поле!'],
            ['Login', 'unique', 'targetClass' => User::className(), 'message' => 'Этот логин уже занят!'],
            ['Login', 'validateLogin'],
            [['Name','SurName'], 'validateName'],
            //     ['Login', 'string', 'min' => 4, 'message' => 'Длина логина от 4 до 24 символов!'],
            ['Confirm', 'compare', 'compareAttribute' => 'Password', 'message' => 'Неверный пароль!'],
            [['image'], 'file', 'extensions' => 'png, jpg, bmp'],
            /*[['Avatar'], 'file', 'extensions' => 'png, jpg, bmp', 'skipOnEmpty' => false],*/
        ];
    }

    public function attributeLabels() {
        return [
            'Login' => 'Логин',
            'SurName' => 'Фамилия',
            'Name' => 'Имя',
            'Birthday' => 'Дата рождения',
            'Password' => 'Пароль',
            'Confirm' => 'Подтвердите пароль',
            'image' => 'Выберите фото'
        ];
    }

    public function upload($id)
    {
        if ($this->validate()) {
            var_dump($this->image);
            // $this->image->saveAs("uploads/{$this->image->baseName}.{$this->image->extension}");
            $this->image->saveAs("uploads/{$id}.{$this->image->extension}");
        } else {
            return false;
        }
    }

/*    public function upload($id)
    {
        if ($this->validate()) {
            var_dump($this->image);
           // $this->image->saveAs("uploads/{$this->image->baseName}.{$this->image->extension}");
            $this->image->saveAs("uploads/{$id}.{$this->image->extension}");
        } else {
            return false;
        }
    }*/

    public function validateLogin($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (strlen($this->Login)<4 || strlen($this->Login)>24)
            {
                $errorMsg= 'Длина логина от 4 до 24 символов!';
                $this->addError('Login',$errorMsg);
            }
        }
    }

    public function validateName($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (strlen($this->Name)===1)
            {
                $errorMsg= 'Коротковато...';
                $this->addError('Name',$errorMsg);
            }
            if (strlen($this->SurName)===1)
            {
                $errorMsg= 'Коротковато...';
                $this->addError('SurName',$errorMsg);
            }
            if (!preg_match("/^[a-zа-яё-]{2,20}$/iu", $this->Name))
            {
                $errorMsg= 'Имена должны состоять из букв!';
                $this->addError('Name',$errorMsg);
            }
            if (!preg_match("/^[a-zа-яё-]{2,20}$/iu", $this->SurName))
            {
                $errorMsg= 'Фамилии должны состоять из букв!';
                $this->addError('SurName',$errorMsg);
            }
        }
    }

    public function convertToDate($input)
    {
        $tmp = explode('.', $input);
        return ($tmp[2].$tmp[1].$tmp[0]);
    }

}