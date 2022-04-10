<?php

namespace app\models;
use Yii;


/**
 * This is the model class for table "subthemes".
 *
 * @property int $id
 * @property int $subject
 * @property int $theme
 * @property string $subtheme
 */

class Theme extends \yii\db\ActiveRecord
{
    public static function getDb() {
        return \Yii::$app->db2;
    }
    public static function tableName()
    {
        return 'subthemes';
    }

    public function getTest1()
    {
        return $this->hasMany(Test::class, ['theme1' => 'id']);
    }

    public function getTest2()
    {
        return $this->hasMany(Test::class, ['theme2' => 'id']);
    }

    public function getTest() {
        return $this->hasMany(Test::class, ['id' => 'test_id'])
            ->viaTable('tests_subthemes', ['subtheme_id' => 'id']);
    }

    public function getBook() {
        return $this->hasMany(Book::class, ['id' => 'book_id'])
            ->viaTable('books_subthemes', ['subtheme_id' => 'id']);
    }

    public function getSubject22() {
        return $this->hasMany(Subject::class, ['id' => 'subject']);
    }

    public function getQuestionNum1() {
        return $this->hasMany(Question::class, ['id' => 'theme1']);
    }
    public function getQuestionNum2() {
        return $this->hasMany(Question::class, ['id' => 'theme2']);
    }


    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'subtheme' => 'subtheme',
            'theme' => 'theme',
        ];
    }
/*    public function getSubtheme()
    {
        return $this->subtheme;
    }*/

}