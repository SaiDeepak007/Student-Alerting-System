<?php
//include auth_session.php file on all user panel pages
session_start();
if(strlen($_SESSION['your_name'])==0)
    {   
header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Student Alerting System | Notify</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="">
<link rel="icon" href="images/favicon.ico">
<!-- Font Icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>
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
$mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'studentalertingsystem@outlook.com';                     //SMTP username
$mail->Password   = 'cmr@1234';                               //SMTP password
$mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->setFrom('studentalertingsystem@outlook.com');


$sql="select * from users";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    $mail->addReplyTo("studentalertingsystem@outlook.com");
    while($x=mysqli_fetch_assoc($res)){
       $mail->addAddress($x['email']);
    }
   
    $sql="SELECT * FROM `attendance`";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_array($res)) {
   $subs=$row["rollno"]."<br> SEC: ".$row["sec"]." <br>BRANCH: ".$row["branch"]." <br> NO OF SUBJECTS: ".$row["subjects"]." <br>PERCENTAGE: ".$row["percentage"]."<br><br>";
    }
    }
    //Content
    $mail->isHTML(true);                        //Set email format to HTML
    $mail->Subject = 'Remainder from Student Alerting System';
    $mail->Body    = "<p>Hey this is the attendance u maintained till now and it is mandatory to manitain 75% attendance to attend end examinations</p> <br>".$subs;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
    //     echo "<script type='text/javascript'>
    //     alert('Mail sent succesfully');
    //   </script>" ;
    //    header("Location: admindashboard.php");
       

        echo "<script>alert('Mail Sent Successfully to all the users')</script>";
        echo "<script>window.open('admindashboard.php','_self')</script>";
    
    }
}
else{
    echo "<script type='text/javascript'>
        alert('Failed to send mail');
      </script>" ;
      header("Location: admindashboard.php");
}
?>
</body>
</html>