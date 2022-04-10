<?php


namespace app\models;


class QType extends \yii\db\ActiveRecord
{
    public static function getDb() {
        return \Yii::$app->db2;
    }
    public static function tableName()
    {
        return 'types';
    }
}