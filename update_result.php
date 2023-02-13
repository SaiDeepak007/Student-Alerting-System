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
    <title>Student Alerting System | Create Time Table Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">

</head>

<body>
    <div class="form">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h3 class="form-title">Update the Latest Result data here</h3>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <!-- <select class="form-control form-control-sm" name="rollno" id="rollno">
                                <option selected>Choose the RollNo</option>
                                <option value="monday">20H51A6245</option>
                                <option value="tuesday">20H51A62A0</option>
                                <option value="wednesday">20H51A6285</option>
                                <option value="thurrsday">20H51A6263</option>
                                <option value="friday">20H51A6242</option>
                                <option value="saturday">20H51A6228</option>
                            </select> -->
                            <label for="rollno"><i class="zmdi "></i>Roll No: </label>
                            <br><br>
                            <input type="text" name="rollno" id="rollno"
                                placeholder="   Enter the ROLLNO" />
                        </div>
                        <div class="form-group">
                            <label for="sem1"><i class="zmdi "></i>Sem1: </label>
                            <br><br>
                            <input type="text" name="sem1" id="sem1"
                                placeholder="   Enter the SEM1 result" />
                        </div>
                        
                        <div class="form-group">
                            <label for="sem2"><i class="zmdi "></i>Sem2: </label>
                            <br><br>
                            <input type="text" name="sem2" id="sem2"
                                placeholder="   Enter the SEM2 result" />
                        </div>
                        <div class="form-group">
                            <label for="sem3"><i class="zmdi "></i>Sem3: </label>
                            <br><br>
                            <input type="text" name="sem3" id="sem3"
                                placeholder="   Enter the SEM3 result" />
                        </div>
                        <div class="form-group">
                            <label for="sem4"><i class="zmdi "></i>Sem4: </label>
                            <br><br>
                            <input type="text" name="sem4" id="sem4"
                                placeholder="   Enter the SEM4 result" />
                        </div>
                        <div class="form-group">
                            <label for="cgpa"><i class="zmdi "></i>cgpa: </label>
                            <br><br>
                            <input type="text" name="cgpa" id="cgpa"
                                placeholder="   Enter the CGPA" />
                        </div>
                        <div class="form-group">
                            <label for="backlogs"><i class="zmdi "></i>backlogs: </label>
                            <br><br>
                            <input type="text" name="backlogs" id="backlogs"
                                placeholder="   Enter the no of backlogs" />
                        </div>
                       
                        <div class="form-group form-button">
                            <input type="submit" name="addresult" id="addresult" class="btn btn-primary" value="Add" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="deleteresult" id="deleteresult" class="btn btn-primary" value="Clear result" />
                        </div>
                        <a type="button" class="btn btn-primary" href="view_result.php">View Result data</a>
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
    $dayselect=$_POST["rollno"];
    $s1=$_POST["sem1"];
    $s2=$_POST["sem2"];
    $s3=$_POST["sem3"];
    $s4=$_POST["sem4"];
    $s5=$_POST["cgpa"];
    $s6=$_POST["backlogs"];
    

    $sql="INSERT INTO `result`(`rollno`,`sem1`,`sem2`,`sem3`,`sem4`,`cgpa`,`backlogs`) VALUES('$dayselect','$s1','$s2','$s3','$s4','$s5','$s6')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('new record insert Success')</script>";
        echo "<script>window.open('update_result.php','_self')</script>";
    }
    else
    {
        echo "error:".mysqli_error($con);
    }
}
if(isset($_POST['deleteresult'])){
    include "db.php";
    $sql="TRUNCATE TABLE `result`";
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