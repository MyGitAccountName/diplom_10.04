<?php


namespace app\models;
use Yii;
use app\models\Theme;
use app\models\Subject;


/**
 * This is the model class for table "tests".
 *
 * @property int $id
 * @property string $name
 * @property int $subject
 * @property string $file_name
 */

class Book extends \yii\db\ActiveRecord
{
    public static function getDb() {
        return \Yii::$app->db2;
    }
    public static function tableName()
    {
        return 'books';
    }

    public function getTheme13() {
        return $this->hasMany(Theme::class, ['id' => 'subtheme_id'])
            ->viaTable('books_subthemes', ['book_id' => 'id']);
    }
    public function getSubject1() {
        return $this->hasMany(Subject::class, ['id' => 'subject_id'])
            ->viaTable('books_subjects', ['book_id' => 'id']);
    }


    public function returnType() {
        return 'book';
    }
}