<?php


namespace app\models;
use Yii;
use app\models\Test;
use app\models\Theme;

class Subject extends \yii\db\ActiveRecord
{
    public static function getDb() {
        return \Yii::$app->db2;
    }
    public static function tableName()
    {
        return 'subjects';
    }

    public function getTest()
    {
       // return $this->hasMany(Test::class, ['subject' => 'id']);
        return $this->hasMany(Test::class, ['id' => 'test_id'])
            ->viaTable('tests_subjects', ['subject_id' => 'id']);
    }
    public function getBook()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])
            ->viaTable('books_subjects', ['subject_id' => 'id']);
    }
}