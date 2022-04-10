<?php


namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Question;

class QuestionSearch extends Question
{
    public function rules()
    {
        return [
            [['id', 'subject', 'theme1', 'theme2', 'class', 'type'], 'integer'],
            [['text', 'var1', 'var2', 'var3', 'var4', 'answer', 'media', 'hint'], 'string'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Question::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'class' => $this->class,
            'subject' => $this->subject,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}