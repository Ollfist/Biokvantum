<?php 
 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 
    
  require 'phpmailer/scr/Exception.php';
  require 'phpmailer/scr/PHPMailer.php';


  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->IsHTML(true);
  $mail->setLanguage('ru','phpmailer/language/');


  //От кого
  $mail->SetFrom('max.blankov@mail.ru','Это ваши гости');
  //Кому
  $mail->addAddress('tnx.bb@mail.ru');
  $mail->Subject = 'Привет! Я ваш "гость"';


  //Тело письма
  $body = '<h1>Встречайте супер письмо</h1>';

  if (trim(!empty($_POST['email']))) {

    $body.= '<p><strong>E-mail:</strong>'.$_POST['email'].'</p>';
  }
  if (trim(!empty($_POST['number']))) {

    $body.= '<p><strong>Номер телефона:</strong>+7'.$_POST['number'].'</p>';
  }
  if (trim(!empty($_POST['house']))) {

    $body.= '<p><strong>Дом:</strong>'.$_POST['house'].'</p>';
  }
  if (trim(!empty($_POST['message']))) {

    $body.='<p><strong>Сообщение:</strong>'.$_POST['message'].'</p>';
  }


  $mail->Body = $body;

  //Отправляем
  if (!$mail->send()) {
    $message = 'Ошибка' ;

  }     else {
    $message = 'Данные отправлены!';
  }

  $response =  ['message'=> $message];

  header('Content-type: application/json');
  echo json_encode($response);
  ?>
