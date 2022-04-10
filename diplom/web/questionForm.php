<?php
    header('Content-Type: application/json');



    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') //проверка на асинхронность
    {
/*        if (isset($_POST["name"]) && isset($_POST["email"]) )
        {
            if ($_POST['name'] == '')
            {
                echo 'Не заполнено поле Имя';
                return; //проверяем наличие обязательных полей
            }
            if ($_POST['email'] == '')
            {
                echo 'Не заполнено поле E-mail';
                return;
            }
            $name = $_POST['name'];
            $email = $_POST['email'];
            mail("email1@yandex.ru", "Заявка с сайта", "Имя:".$name.". E-mail: ".$email ,"From: email2@yandex.ru \r\n"); //здесь делаем отправку заявки на почту. не забудьте поменять оба адреса
            echo 'Заявка отправлена!';
            return; //возвращаем сообщение пользователю
        }*/

/*        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            }
            if (isset($_POST['phone'])) {
                $phone = $_POST['phone'];
            }
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }
            if (isset($_POST['formData'])) {
                $formData = $_POST['formData'];
            }
        }*/

        if (isset($_POST["vars"])) {
            $answer = $_POST['var'];

            //echo 'Заявка отправлена!';
            //echo '$answer: '.$answer;

/*            $response = array();
            $response['value'] = $data;
            echo json_encode($response);*/

            echo $answer;
           // return; //возвращаем сообщение пользователю
        }
    }
?>