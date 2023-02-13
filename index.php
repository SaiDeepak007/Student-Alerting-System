<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Student Alerting System</title>
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
<!-- Table Style -->
<style>
    table {
        border-collapse: separate;
        border-spacing: 0 15px;
    }
</style>
</head>

<body>
    <?php
        require('db.php');
        // When form submitted, insert values into the database.
        if (isset($_REQUEST['name'])) {
            // removes backslashes
            $username = stripslashes($_REQUEST['name']);
            //escapes special characters in a string
            $username = mysqli_real_escape_string($con, $username);
            $email    = mysqli_real_escape_string($con, $username);
            $email    = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_REQUEST['pass']);
            $password = mysqli_real_escape_string($con, $password);
            $create_datetime = date("Y-m-d H:i:s");
            $query    = "INSERT into `users` (username, password, email, create_datetime)
                         VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
            $result   = mysqli_query($con, $query);
            if ($result) {
                echo "<div class='form'>
                      <h3>You are registered successfully.</h3><br/>
                      <p class='link'>Click here to <a href='signin.php'>Login</a></p>
                      </div>";
            } else {
                echo "<div class='form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='index.php'>registration</a> again.</p>
                      </div>";
            }
        } else {
    ?>
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Welcome to Student Alerting System</h2>
                    <h3 class="form-title">Sign up</h3>
                    <h6><b>Note:</b>Use only offical Mail Id</h6><br>
                    <form method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="name" id="name" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="signin.php" class="signup-image-link">I am already member</a>
                    <a href="adminsignin.php" class="signup-image-link">Admin login</a>
                </div>
            </div>
        </div>
        <!--author section-->
        <br>
        <br>
        <div class="container">
            <div class="signup-form">
                <br>
                <h2 class="form-title"> Our Team</h2>
                <table cellspacing="30">
                  <tr>
                        <td><img src="images/myself1.png" alt="20H51A62A3" style="width:150px;height:150px;"></td>
                        <td>
                            <p> &ensp; 20H51A6245 S.SAI DEEPAK REDDY</p>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="images/62a0.png" alt="20H51A62A0" style="width:150px;height:150px;"></td>
                        <td>
                            <p> &ensp; 20H51A62A0 G.DHEERAJ REDDY</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><img src="images/james_cir.png" alt="20H51A62A3" style="width:150px;height:150px;"></td>
                        <td>
                            <p> &ensp; 20H51A6263 N.JAMES SUVISHAL</p>
                        </td>
                    </tr>
                 
                </table>
            </div>
        </div>
        <!--footer-->
        <br>
        <p style="text-align:center;">©2022 Student Alerting System. All Rights Reserved.</p>
    </section>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
    <?php
    }
?>
</body>

</html>