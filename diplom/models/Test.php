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
 * @property int $theme
 * @property string $questions
 */

class Test extends \yii\db\ActiveRecord
{
    public static function getDb() {
        return \Yii::$app->db2;
    }
    public static function tableName()
    {
        return 'tests';
    }
/*    public function getTheme11()
    {
        return $this->hasOne(Theme::class, ['id' => 'theme1']);
    }
    public function getTheme12()
    {
        return $this->hasOne(Theme::class, ['id' => 'theme2']);
    }*/
/*    public function getSubject1()
    {
        return $this->hasMany(Subject::class, ['id' => 'subject']);
    }

    public function getQuestionsKol()
    {
        return $this->questions;
    }*/

    public function getTheme13() {
        return $this->hasMany(Theme::class, ['id' => 'subtheme_id'])
            ->viaTable('tests_subthemes', ['test_id' => 'id']);
    }
    public function getSubject1() {
        return $this->hasMany(Subject::class, ['id' => 'subject_id'])
            ->viaTable('tests_subjects', ['test_id' => 'id']);
    }

    public function returnType() {
        return 'test';
    }

}