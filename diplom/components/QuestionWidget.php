<?php

namespace app\components;

use yii\base\Widget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\Test;
use app\models\Theme;
use app\models\Question;
use yii;



class QuestionWidget extends Widget
{
    public $question;
    public $size;
    public $num;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

    }





    public function run()
    {
        $session = Yii::$app->session;
        $session->open();

        if ($this->num != 0 )
        {
            echo '<div id="question'.$this->num.'" class="questionField d-none">';
        }
        else
            echo '<div id="question'.$this->num.'" class="questionField">';

        echo '<h2>Вопрос: '. ($this->num+1) . ' из ' . $this->size . '</h2>';

        echo '<p class="qText">'.$this->question['text'].'</p>';


        echo '<div class="qCenter d-flex">';

        switch ($this->question['type'])
        {
/*            case 0:
            {
                echo '<div class="vars" id="vars'.$this->num.'">';
                for ($i = 0; $i < count($this->question['vars']); $i++)
                {
                    echo   '<input type="radio" id="q'.$this->num.'_v'.$i.'" name="vars" value='.$i.'>
                            <label for="q'.$this->num.'_v'.$i.'">'.$this->question["vars"][$i].'</label>';
                }
                echo '</div>';



/*                echo   '<input type="radio" id="v1" name="vars" value=1>
                        <label for="v1">'.$this->question["var1"].'</label>
                        <input type="radio" id="v2" name="vars" value=2>
                        <label for="v2">'.$this->question["var2"].'</label>
                        <input type="radio" id="v3" name="vars" value=3>
                        <label for="v3">'.$this->question["var3"].'</label>
                        <input type="radio" id="v4" name="vars" value=4>
                        <label for="v4">'.$this->question["var4"].'</label>';*/



       /*         echo '<p>'.$this->question['var1'].'</p>';
                echo '<p>'.$this->question['var2'].'</p>';
                echo '<p>'.$this->question['var3'].'</p>';
                echo '<p>'.$this->question['var4'].'</p>';*/
        //    }*/



            case 1:
            {
/*                echo '<div class="vars" id="vars'.$this->num.'">';
                for ($i = 0; $i < count($this->question['vars']); $i++)
                {
                    echo   '<input type="radio" id="q'.$this->num.'_v'.$i.'" name="vars" value='.$i.'>
                            <label for="q'.$this->num.'_v'.$i.'">'.$this->question["vars"][$i].'</label>';
                }
                echo '</div>';*/


                echo '<form class="varsForm" id="vars'.$this->num.'">';
                for ($i = 0; $i < count($this->question['vars']); $i++)
                {
                    echo   '<div class="vars_radio">
                                <input type="radio" id="q'.$this->num.'_v'.$i.'" name="vars" value='.$i.'>
                                <label for="q'.$this->num.'_v'.$i.'">'.$this->question["vars"][$i].'</label>
                            </div> ';
                }
                echo '<input type="text" id="answer'.$this->num.'" hidden value='.$this->question["answer"].'>
                </form>';
                break;
            }

            case 2:
            {
                echo '<form class="varsForm" id="vars'.$this->num.'">';
                for ($i = 0; $i < count($this->question['vars']); $i++)
                {
                    echo   '<div class="vars_cb">
                                <input type="checkbox" id="q'.$this->num.'_v'.$i.'" name="vars" value='.($i+1).'>
                                <label for="q'.$this->num.'_v'.$i.'">'.$this->question["vars"][$i].'</label>
                            </div> ';
                }
                echo '<input type="text" id="answer'.$this->num.'" hidden value='.$this->question["answer"].'>
                <a class="answerButton abType2">Подтвердить</a>
                </form>';

                break;
            }

            case 3:
            {
                echo '<form class="varsForm" id="vars'.$this->num.'">';
                echo '<input type="text" class="clientAnswer">';
                echo '<input type="text" id="answer'.$this->num.'" hidden value='.$this->question["answer"].'>
                <a class="answerButton abType3">Подтвердить</a>
                <p class="raType3">Правильный ответ: '.$this->question["answer"].'</p>
                </form>';

                break;
            }

        }


        echo '<div class="qRes">
            <img src="../web/images/ico/right.png" id="rIco">
            <img src="../web/images/ico/wrong.png" id="wIco">
            </div>
        </div>';




        echo '<div class="qBottom">';
            echo '<a class="toPrev"></a>';
       // echo '<div onclick="showPrevQuestion('. ($this->num). ')" class="toPrev"></div>';
            echo '<button class="finishTest btn btn-primary">Завершить</button>';
            echo '<a class="toNext"></a>';
        echo '</div>
        </div>';
    }

}