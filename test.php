<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');
$con = mysqli_connect("localhost","root","","LoginSystem");

$mail = new PHPMailer(true);                     //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'classalert07@gmail.com';                     //SMTP username
$mail->Password   = 'classalert1234!';                               //SMTP password
$mail->SMTPSecure = true;            //Enable implicit TLS encryption
$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->setFrom('classalert07@gmail.com');

    $mail->addReplyTo("classalert07@gmail.com");
       $mail->addAddress("harshavb08@gmail.com");
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Remainder from Class Alert';
    $mail->Body    = "Hey you have the following classes tomorrow";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        echo "<script type='text/javascript'>
        alert('Mail sent succesfully');
      </script>" ;
      // header("Location: admindashboard.php");
    }
?>