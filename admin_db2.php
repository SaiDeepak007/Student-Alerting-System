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
    <!-- Font Icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="images/favicon.ico">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student Alerting System| Admin Dashboard 2</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="icon" href="images/favicon.ico">
        <style>
               .colour{
                background-color: yellow;
                color:black;
               }
               .col{
                background-color: green;
               }
        </style>
    </head>
    <body>
    <div class="form">
        <div class="container">
        <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Welcome, <?php echo $_SESSION['your_name']; ?>!</h2>
                    <p>You are on admin panel now.</p>
                    <p>You can create/update and view event Related data from here .</p>
                    <p>Use below buttons to navigate.</p>
                    <p style="color:yellow; font-size:18px">->Event</p>
                    <br>
                    <a type="button" class="btn btn-primary , colour" href="create_event.php">Update Event</a>
                    <a type="button" class="btn btn-primary , colour" href="view_event.php">View Events</a>
                    <br><br>
                    <a type="button" class="btn btn-primary notifybt , colour" href="notify_event.php">Notify Recent event</a>
                    
                </div>
                <div class="signup-image">
                    <figure><img src="images/admin.png" alt="admin image"></figure>
                    <a href="logout.php" class="signup-image-link">Logout</a>
                </div>
            </div>
        </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
    <!--footer-->
    <br>
        <p style="text-align:center;">©2022 Student Alerting System. All Rights Reserved.</p>
    </body>
</html>