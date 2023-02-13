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
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #DDD;
    }

    tr:hover {
        background-color: #D6EEEE;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Alerting System | Time Table</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="icon" href="images/favicon.ico">
</head>

<body>
    <div class="form">
        <div class="container">
            <div class="signup-content">
                <div class="jumbotron ">
                    <h3 class="form-title">YOUR ATTENDANCE</h3>
                    <table class="table">
                        <table class="tb" style="width:100%">
                            <tr>
                                <th scope="col">ROll NO</th>
                                <th scope="col">Section</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Subjects</th>
                                <th scope="col">Percentage</th>
                                
                            </tr>
                            <?php
                               include "db.php";
                               $full=$_SESSION['your_name'];
                             $variable = substr($full, 0, strpos($full, "@"));
                               $sql="SELECT * FROM `attendance` where rollno='$variable';
                            --     ORDER BY CASE
                            --         WHEN day = 'sunday' THEN 1
                            --        WHEN day = 'monday' THEN 2
                            --        WHEN day = 'tuesday' THEN 3
                            --        WHEN day = 'wednesday' THEN 4
                            --         WHEN day = 'thurrsday' THEN 5
                            --         WHEN day = 'friday' THEN 6
                            --         WHEN day = 'saturday' THEN 7
                            --    END ASC";
                               $result=mysqli_query($con,$sql);
                               if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_array($result)) {
                                    echo "<tr><th>".$row["rollno"]."</th><td>".$row["sec"]."</td><td>".$row["branch"]."</td><td>".$row["subjects"]."</td><td>".$row["percentage"]."</td></tr>";
                                }
                               
                               }
                               else
                               {
                                   echo "SORRY! WE ARE UNABLE TO FETCH YOUR DATA,TRY USING YOUR OFFICAL COLLEGE MAIL ID";
                               }

                            ?>
                        </table>
                        <div class="">
                            <br>
                            <a href="logout.php" class="signup-image-link">Logout</a>
                        </div>
                </div>
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
    <p style="text-align:center;">©2022 Student Alerting System.All Rights Reserved.</p>
    <br>
</body>

</html>