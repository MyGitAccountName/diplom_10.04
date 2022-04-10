<?php

namespace app\models;
use Yii;
use app\models\Theme;
use app\models\Subject;

/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property string $text
 * @property int $subject
 * @property int $theme1
 * @property int $theme2
 * @property int $class
 * @property int $type
 * @property string $var1
 * @property string $var2
 * @property string $var3
 * @property string $var4
 * @property string $answer
 * @property string $media
 * @property string $hint
*/

class Question extends \yii\db\ActiveRecord
{
    public static function getDb() {
        return \Yii::$app->db2;
    }
    public static function tableName()
    {
        return 'questionbase';
    }

    public function getTheme1() {
        return $this->hasOne(Theme::class, ['id' => 'theme1']);
    }
    public function getTheme2() {
        return $this->hasOne(Theme::class, ['id' => 'theme2']);
    }

    public function rules()
    {
        return [
            [['subject', 'theme1', 'class', 'type', 'text', 'answer'], 'required', 'message' => 'Заполните поле!'],
            [['theme2', 'var1', 'var2', 'var3', 'var4', 'hint', 'media'], 'default', 'value'=> NULL],
        ];
    }
}