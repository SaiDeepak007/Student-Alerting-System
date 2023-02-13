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
    <title>Student Alerting System| Create Time Table Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">

</head>

<body>
    <div class="form">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h3 class="form-title">Update the time table here</h3>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <select class="form-control form-control-sm" name="dayselect" id="dayselect">
                                <option selected>Choose the day</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thurrsday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub1"><i class="zmdi "></i>Sub1: </label>
                            <br><br>
                            <input type="text" name="sub1" id="sub1"
                                placeholder="   Enter the subject name for I (9:10-10:10)" />
                        </div>
                        <div class="form-group">
                            <label for="sub2"><i class="zmdi "></i>Sub2: </label>
                            <br><br>
                            <input type="text" name="sub2" id="sub2"
                                placeholder="   Enter the subject name for II (10:10-11:10)" />
                        </div>
                        <div class="form-group">
                            <label for="sub3"><i class="zmdi "></i>Sub3: </label>
                            <br><br>
                            <input type="text" name="sub3" id="sub3"
                                placeholder="   Enter the subject name for III (11:10-12:10)" />
                        </div>
                        <div class="form-group">
                            <label for="sub4"><i class="zmdi "></i>Sub4: </label>
                            <br><br>
                            <input type="text" name="sub4" id="sub4"
                                placeholder="   Enter the subject name for IV (12:10-1:00)" />
                        </div>
                        <div class="form-group">
                            <label for="sub5"><i class="zmdi "></i>Sub5: </label>
                            <br><br>
                            <input type="text" name="sub5" id="sub5"
                                placeholder="   Enter the subject name for V (1:00-2:00)" />
                        </div>
                        <div class="form-group">
                            <label for="sub6"><i class="zmdi "></i>Sub6: </label>
                            <br><br>
                            <input type="text" name="sub6" id="sub6"
                                placeholder="   Enter the subject name for VI (2:00-3:00)" />
                        </div>
                        <div class="form-group">
                            <label for="sub7"><i class="zmdi "></i>Sub7: </label>
                            <br><br>
                            <input type="text" name="sub7" id="sub7"
                                placeholder="   Enter the subject name for VII (3:00-4:00)" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="addtimetable" id="addtimetable" class="btn btn-primary" value="Add" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="delete" id="delete" class="btn btn-primary" value="Clear time table" />
                        </div>
                        <a type="button" class="btn btn-primary" href="viewtimetable.php">View Time Table</a>
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

if(isset($_POST['addtimetable'])){
    include "db.php";
    $dayselect=$_POST["dayselect"];
    $sub1=$_POST["sub1"];
    $sub2=$_POST["sub2"];
    $sub3=$_POST["sub3"];
    $sub4=$_POST["sub4"];
    $sub5=$_POST["sub5"];
    $sub6=$_POST["sub6"];
    $sub7=$_POST["sub7"];

    $sql="INSERT INTO `timetable`(`day`,`9:10-10:10`,`10:10-11:10`,`11:10-12:10`,`12:10-1:00`,`1:00-2:00`,`2:00-3:00`,`3:00-4:00`) VALUES('$dayselect','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7') ON DUPLICATE KEY UPDATE `9:10-10:10`='$sub1',`10:10-11:10`='$sub2',`11:10-12:10`='$sub3',`12:10-1:00`='$sub4',`1:00-2:00`='$sub5',`2:00-3:00`='$sub6',`3:00-4:00`='$sub7'";
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'>
        alert('New record inserted/updated successfully');
      </script>" ;
      } 
      else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
}
if(isset($_POST['delete'])){
    include "db.php";
    $sql="TRUNCATE TABLE `timetable`";
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