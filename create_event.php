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
    <title>Student Alerting System| Update event Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">

</head>

<body>
    <div class="form">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h3 class="form-title">Update the Latest events related data here</h3>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                           
                            <label for="name"><i class="zmdi "></i>Event Name: </label>
                            <br><br>
                            <input type="text" name="name" id="name"
                                placeholder="   Enter the Name of the Event" />
                        </div>
                        <div class="form-group">
                            <label for="cat"><i class="zmdi "></i>Category of the Event: </label>
                            <br><br>
                            <input type="text" name="cat" id="cat"
                                placeholder="   Enter the category" />
                        </div>
                        
                        <div class="form-group">
                            <label for="exp"><i class="zmdi "></i>Expected conduction Date: </label>
                            <br><br>
                            <input type="text" name="exp" id="exp"
                                placeholder="   Enter the exp" />
                        </div>
                        <div class="form-group">
                            <label for="el"><i class="zmdi "></i>Eligiblity for which years: </label>
                            <br><br>
                            <input type="text" name="el" id="el"
                                placeholder="   Enter the eligible years and separate with','" />
                        </div>
                       
                       
                       
                        <div class="form-group form-button">
                            <input type="submit" name="addresult" id="addresult" class="btn btn-primary" value="Add" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="deleteresult" id="deleteresult" class="btn btn-primary" value="Clear Data" />
                        </div>
                        <a type="button" class="btn btn-primary" href="view_event.php">View Event data</a>
                    </form>
                </div>
            </div>

            <a href="logout.php" class="signup-image-link">Logout</a>

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

<?php

if(isset($_POST['addresult'])){
    include "db.php";
    $s1=$_POST["name"];
    $s2=$_POST["cat"];
    $s3=$_POST["exp"];
    $s4=$_POST["el"];
    

    $sql="INSERT INTO `event`(`name`,`category`,`expected-date`,`eligible`) VALUES('$s1','$s2','$s3','$s4')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('new record insert Success')</script>";
        echo "<script>window.open('admindashboard.php','_self')</script>";
    }
    else
    {
        echo "error:".mysqli_error($con);
    }
}
if(isset($_POST['deleteresult'])){
    include "db.php";
    $sql="TRUNCATE TABLE `event`";
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'>
        alert('Time table is cleared succesfully');
      </script>" ;
      } 
      else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
}
?>