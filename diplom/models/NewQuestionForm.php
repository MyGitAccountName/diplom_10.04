<?php

namespace app\models;

use Yii;
use yii\base\Model;

class NewQuestionForm extends Model
{
    public $subject;
    public $theme1;
    public $theme2;
    public $class;
    public $type;
    public $text;
    public $var1;
    public $var2;
    public $var3;
    public $var4;
    public $answer;
    public $media;
    public $hint;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // обязательные поля
            [['subject', 'theme1', 'class', 'type', 'text', 'answer'], 'required', 'message' => 'Заполните поле!'],

            [['theme2', 'var1', 'var2', 'var3', 'var4', 'hint', 'media'], 'default', 'value'=> NULL],
            //[['media'], 'file'],
        ];
    }

    public function attributeLabels() {
        return [
            'subject' => 'Предмет:',
            'theme1' => 'Тема 1:',
            'theme2' => 'Тема 2:',
            'class' => 'Класс:',
            'type' => 'Тип вопроса:',
            'text' => 'Вопрос:',
            'var1' => 'Вариант 1:',
            'var2' => 'Вариант 2:',
            'var3' => 'Вариант 3:',
            'var4' => 'Вариант 4:',
            'answer' => 'Правильный ответ(ы):',
            'media' => 'Файл:',
            'hint' => 'Подсказка:'
        ];
    }
}