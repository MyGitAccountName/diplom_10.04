<?php

/* @var $this yii\web\View */
/* @var $questionNum int */
/* @var $questionText string */
/* @var $testName string */
/* @var $subjects array */
/* @var $size int */
/* @var $difficulty int */
/* @var $time int */
/* @var $questions array */
/* @var $vars array */
/* @var $question \app\models\Question */

use yii\helpers\Html;

$this->registerJsFile("js/scripts.js");
$this->registerCssFile('css/testing.css');

$this->title = 'Тест: "'. $testName . '"';

$questionNum = 0;

//var_dump($questions);
?>

<div class="testing">
    <h1><?= Html::encode($this->title) ?></h1>


    <script type="text/javascript">
        var questionsJS = <?php echo json_encode($questions); ?>;
    </script>

    <?php //var_dump($questionNum); ?>
    <?php //var_dump($time); ?>


    <div id="timer" class="timer">
<!--        <div class="timer-number">
            <span class="days timer-time"></span>
            <span class="timer-text">Days</span>
        </div>
        <div class="timer-number">
            <span class="hours timer-time"></span>
            <span class="timer-text">Hours</span>
        </div>-->
        <div class="timer-number">
            <span class="minutes timer-time"></span><span class="points timer-time">:</span><span class="seconds timer-time"></span>
        </div>
    </div>

    <?php
    echo '<script type="text/javascript">
         function initializeTimer(time) {
            let minutesSpan = document.getElementById("timer").querySelector(".minutes");
            let secondsSpan = document.getElementById("timer").querySelector(".seconds");
            let pointsSpan = document.getElementById("timer").querySelector(".points");
            let tmp = time;
        
            function updateClock() {
                minutesSpan.innerHTML = ("0" + Math.floor(tmp / 60)).slice(-2);
                secondsSpan.innerHTML = ("0" + Math.floor(tmp % 60)).slice(-2);
                if (tmp%2===1) pointsSpan.style.color = "#0000";
                else pointsSpan.style.color = "#fff";
                if (tmp <= 0) {
                    clearInterval(timeInterval);
                    setTimeout(function() {
                        let allVars = document.querySelectorAll(".varsForm input");
                        for (let elem of allVars) {
                            elem.setAttribute("disabled", true);
                        }
                        $("#result").attr("hidden",false);
                    }, 2000);
                }
                else tmp--;
            }
            updateClock();
            let timeInterval = setInterval(updateClock, 1000);
        }      
        initializeTimer('.$time.');
    </script>';

    for ($num = 0; $num < $size; $num++)
    {
        echo \app\components\QuestionWidget::widget(['question' => $questions[$num], 'num' => $num, 'size' => $size]);
    }


    echo '<div id="result" hidden>
        <span class="result">'.$this->title.'</span>
        <span id="resSpan">0</span>
    </div>';
?>

</div>