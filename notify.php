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
    $dday='monday';
    if(date("l")=="Sunday"){
        $dday='monday';
    }else if(date("l")=="Monday"){
        $dday='tuesday';
    }else if(date("l")=="Tuesday"){
        $dday='wednesday';
    }else if(date("l")=="Wednesday"){
        $dday='thurrsday';
    }else if(date("l")=="Thursday"){
        $dday='friday';
    }else if(date("l")=="Friday"){
        $dday='saturday';  
    }
    else if(date("l")=="Saturday"){
        $dday='monday';  
    }
    
    $sql="SELECT * FROM `timetable` WHERE day = '$dday'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($res)) {
   $subs="<b>9:10-10:10</b>: ".$row["9:10-10:10"]."<br><b>10:10-11:10</b>: ".$row["10:10-11:10"]." <br><b>11:10-12:10</b>: ".$row["11:10-12:10"]." <br><b>12:10-1:00</b>: ".$row["12:10-1:00"]." <br><b>1:00-2:00</b>: ".$row["1:00-2:00"]." <br><b>2:00-3:00</b>: ".$row["2:00-3:00"]." <br><b>3:00-4:00</b>: ".$row["3:00-4:00"];
    }
   
    //Content
    $mail->isHTML(true);                        //Set email format to HTML
    $mail->Subject = 'Remainder from Student Alerting System';
    $mail->Body    = "<p>Hey you have the following classes tomorrow </p> <br>".$subs;
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