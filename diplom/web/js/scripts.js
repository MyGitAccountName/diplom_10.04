//let result = document.querySelector('#result');

/*$(document).ready(function () {
    $('form').submit(function () {
        let formID = $(this).attr('id'); // Получение ID формы
        let formNm = $('#' + formID);
        $.ajax({
            type: 'POST',
            url: 'questionForm.php', // Обработчик формы отправки
            data: formNm.serialize(),
            success: function (data) {
                // Вывод текста результата отправки в текущей форме
                $(formNm).html(data);
            }
        });
        return false;
    });
});*/

$(document).ready(function () {
    $('input[type="radio"]').click(function (){
        let clientAnswer = +($(this).val());
        let formID = '#'+$(this).parents('form:first').attr('id');
        let rightAnswer = +($(formID + ' :text').last().val())-1;
        let center = $(this).parents('.qCenter');

        if (clientAnswer != rightAnswer)
        {
            $(this).addClass('wrong');
            $(center).find('img').last().css('display','block');
        }
        else {
            addRightAnswer();
/*            let ra = +($('#rAnsw').text())+1;
            $('#rAnsw').text(ra);*/
            $(center).find('img').first().css('display','block');



/*            $(function() {
                curResult = $.session.get("curResult");
            });

           // curResult = $.session.get("curResult");

            curResult++;
           // $.session.set("curResult", "value");

            $(function() {
                $.session.set("curResult", "value");
            });*/

            //document.getElementById('rIco').style.display="block";
        }

        let vars = document.querySelectorAll(formID + ' input');
        for (let elem of vars) {
            elem.setAttribute('disabled',true);
        }
        $(formID + ' input[type="radio"]').eq(rightAnswer).addClass('right');

/*        $.ajax({
           // type: 'POST',
            url: 'questionForm.php', // Обработчик формы отправки
            method: 'POST',
            data: {var:vars, answer:answer},
            //data: $(this).serialize(),

            success: function (data) {
                // Вывод текста результата отправки в текущей форме
                console.log(data);
                alert(data);
                //$(formNm).html(data);
            }
        });*/
    });

    $('.abType2').click(function () {
        let formID = '#'+$(this).parents('form:first').attr('id');
        let rightAnswer = $(formID + ' :text').last().val().split(',');
        let vars = document.querySelectorAll(formID + ' input');
        let center = $(this).parents('.qCenter');
        let kolRight = 0;
        let kolWrong = 0;
        $(this).hide();
        for (let i=0; i<vars.length; i++) {
            for (let rAnsw of rightAnswer) {
                if (i + 1 === +rAnsw) {
                    vars[i].classList.add('right');
                    if (vars[i].checked) {
                        kolRight++;
                    }
                }
            }
            if (vars[i].checked && !vars[i].classList.contains('right'))  {
                vars[i].classList.add('wrong');
                kolWrong++;
            }
            vars[i].setAttribute('disabled',true);
        }

        if (kolRight === rightAnswer.length && kolWrong === 0) {
            $(center).find('img').first().css('display','block');
            addRightAnswer();
        }
        else {
            $(center).find('img').last().css('display','block');
        }
    });

    $('.abType3').click(function () {
        let formID = '#'+$(this).parents('form:first').attr('id');
        let rightAnswer = $(formID + ' :text').last().val().split(',');
        let answer = $(formID).find('input').first().val();
        let center = $(this).parents('.qCenter');
        $(this).hide();
        if (answer==rightAnswer) {
            $(center).find('img').first().css('display','block');
            addRightAnswer();
        }
        else {
            $(center).find('img').last().css('display','block');
            $(formID + ' .raType3').show();
        }
        document.querySelector(formID + ' input').setAttribute('disabled',true);
    });

    $('.finishTest').click(function () {
        $("#result").attr("hidden",false);
    });

    $('.toPrev').click(function () {
        let cur = $('.questionField:visible');
        let pos = $('.questionField').index(cur);
        hideQuestion(pos);
        showQuestion(pos-1);
    });

    $('.toNext').click(function () {
        let cur = $('.questionField:visible');
        let pos = $('.questionField').index(cur);
        hideQuestion(pos);
        showQuestion(pos+1);
    });


    document.addEventListener('keyup', function(event) {
        if (event.code != "ArrowRight" && event.code != "ArrowLeft")
            return;
        else {
            let cur = $('.questionField:visible');
            let pos = $('.questionField').index(cur);
            let max = $('.questionField').length-1;

            if (event.code === "ArrowRight") {
                if (pos<max) {
                    hideQuestion(pos);
                    showQuestion(pos+1);
                }

            }
            if (event.code === "ArrowLeft") {
                if (pos>0) {
                    hideQuestion(pos);
                    showQuestion(pos-1);
                }
            }
        }
        //$('.questionField:visible').attr('id');
/*        let cur = $('.questionField:visible');
        alert($('.questionField:visible').attr('id'));

        alert($('.questionField').index(cur));
        let pos = $('.questionField').index(cur);

        hideQuestion(pos);
        showQuestion(pos+1);*/
    });






   // const filterBox = $('#materials .item');
    const filterBox = document.querySelectorAll('#materials .item');
    $('#subjectTop').click(function (event) {

       // alert (event.target.tagName);

   // $('#subjectTop').addEventListener('click', (event) => {
        if (event.target.tagName !== 'SPAN') return false;

        let p = event.target.parentElement;
        let cb = $(p).find(' input');
        let filterClass = event.target.dataset['f'];
        if ($(cb).is(':checked'))
        {
            $(cb).prop('checked',false);
            filterBox.forEach( elem => {
                if (elem.classList.contains(filterClass)) {
                    $(elem).css('display','none');
                }
            });
        }
        else {
            $(cb).prop('checked',true);
            filterBox.forEach( elem => {
                if (elem.classList.contains(filterClass)) {
                    $(elem).css('display','block');
                }
            });
        }

   // cb.checked = true;


    //    alert (p.attr('checked'));
/*        let filterClass = event.target.dataset['f'];
     //   console.log(filterClass);

        filterBox.forEach( elem => {
           //elem.classList.remove('hide');
           if (!elem.classList.contains(filterClass)) {
               //elem.classList.add('hide');
               $(elem).css('display','none');
           }
           else $(elem).css('display','block');
        });*/

       // $('.hide').css('display','none');


    });



    $('#subjectField').change(function (event) {   // редактор вопросов

      //  alert(this.value);
    });

});


function check() {
    $('.answerButton').click(function () {
        let formID = '#'+$(this).parents('form:first').attr('id');
        let rightAnswer = $(formID + ' :text').last().val().split(',');
    });
}

function addRightAnswer() {
    let a = (+$('#resSpan').text())+1;
    $('#resSpan').text(a);
}



/*document.body.addEventListener('change', function (e) {
    let target = e.target;
    let message;

    let vars = document.querySelectorAll("#vars0 input");
    for (let elem of vars) {
        elem.setAttribute('disabled',true);
    }

    switch (target.id) {
        case 'q0_v0':
            message = 'The Rejected radio button changed0';
            break;
        case 'q0_v1':
            message = 'The Pending radio button changed1';
            document.querySelectorAll("#vars0 input").setAttribute('disabled',true);
            //document.getElementById('vars0').setAttribute('disabled',true);
            break;
        case 'q0_v2':
            message = 'The Resolved radio button changed2';
            target.setAttribute('disabled',true);
            break;
        case 'q0_v3':
            message = 'The Rejected radio button changed3';
            break;



    }

});*/


/*$('input[type=radio]').change(function(){
    let form = $(this).parents('form');
    $.post(url, form.serialize(), function(resp){
        if(resp=='OK') //показ остальных полей
            });
});*/



function showQuestion(num) {
    //let id = 'question'+num;
    let question = document.getElementById('question'+num);
   // question3.hide();


    // let question = $('#question'+num);

   // document.getElementById(id).classList.replace('d-none','d-flex');
    question.classList.replace('d-none','d-flex');

    let max = $('.questionField').length-1;
    if (num===max) {
        $('#question' + num + ' .toNext').css("visibility", "hidden");
    }
}

function hideQuestion(num) {
    let id = 'question'+num;
    document.getElementById(id).classList.remove('d-flex');
    document.getElementById(id).classList.add('d-none');
}

function showNextQuestion(curent) {
    hideQuestion(curent);
    showQuestion(curent+1);
}

function showPrevQuestion(curent) {
    hideQuestion(curent);
    showQuestion(curent-1);
}













/*function getTimeRemaining(endtime) {
    let t = Date.parse(endtime) - Date.parse(new Date());
    let seconds = Math.floor((t / 1000) % 60);
    let minutes = Math.floor((t / 1000 / 60) % 60);
    let hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    let days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}*/

function getTimeRemaining(time) {
    let seconds = Math.floor(time % 60);
    let minutes = Math.floor((time / 60));
    return {
        'total': time,
        'minutes': minutes,
        'seconds': seconds
    };
}

/*function initializeClock(id, endtime) {
    let clock = document.getElementById(id);
    let daysSpan = clock.querySelector('.days');
    let hoursSpan = clock.querySelector('.hours');
    let minutesSpan = clock.querySelector('.minutes');
    let secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
        let t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }

    updateClock();
    let timeinterval = setInterval(updateClock, 1000);
}*/

function showResult() {
    let modal = $modal({
        title: 'Результат',
        content: '<p>Содержимое модального окна...</p>',
        footerButtons: [
            { class: 'btn btn__cancel', text: 'Отмена', handler: 'modalHandlerCancel' },
            { class: 'btn btn__ok', text: 'ОК', handler: 'modalHandlerOk' }
        ]
    });
    modal.show();
}





/*function initializeTimer(time) {
    let minutesSpan = document.getElementById('timer').querySelector('.minutes');
    let secondsSpan = document.getElementById('timer').querySelector('.seconds');
    let tmp = time;

    function updateClock() {
        //let t = getTimeRemaining(tmp);

        minutesSpan.innerHTML = ('0' + Math.floor(tmp / 60)).slice(-2);
        secondsSpan.innerHTML = ('0' + Math.floor(tmp % 60)).slice(-2);

        if (tmp <= 0) {
            clearInterval(timeInterval);
            ///alert('Время вышло!');



            setTimeout(function() {
                let allVars = document.querySelectorAll('.varsForm input');
                for (let elem of allVars) {
                    elem.setAttribute('disabled', true);
                }
                $('#result').attr('hidden',false);
               // showResult();
              //  window.location.href = 'test/result';

            }, 2000);
        }
        else tmp--;
    }

    updateClock();
    let timeInterval = setInterval(updateClock, 1000);
}*/


//let deadline="January 01 2022 00:00:00 GMT+0700";
//let deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000); // for endless timer
//initializeClock('countdown', deadline);

//initializeTimer(3);