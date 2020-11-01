<?php
require 'core2.php';
require 'conne.inc.php';
if (!loggedin()) {

    if (isset($_POST['emailid']) && isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['password']) && isset($_POST['contactno'])) {
        $password = $_POST['password'];
        $password_again = $_POST['password_again'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $emailid = $_POST['emailid'];
        $contactno = $_POST['contactno'];
        $username = md5($emailid);
        if (!empty($contactno) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($surname) && !empty($emailid)) {
            if (strlen($firstname) > 30 || strlen($surname) > 30 || strlen($emailid) > 30) {
                echo 'please do not cross max lenth';
            } else {
                if ($password != $password_again) {
                    echo '<br> Password\'s dont match<br>';
                } else {
                    $password_hash = md5($password);
                    $sql = "SELECT `user_id` FROM `user` WHERE `user_id`='$username'";
                    $sqlrun = mysqli_query($c, $sql);
                    $queryrun = "SELECT `email_id` FROM `user` WHERE `email_id`='$emailid'";
                    $queryrun = mysqli_query($c, $queryrun);
                    if (((mysqli_num_rows($sqlrun)) == 1) || ((mysqli_num_rows($queryrun)) == 1)) {
                        if ((mysqli_num_rows($sqlrun)) == 1) {
                            echo 'Username ' . $username . '  Alredy exists';
                        } else if ((mysqli_num_rows($queryrun)) == 1) {
                            echo 'Email address ' . $emailid . '  Already exists ';
                        }
                    } else {
                        $queryy = "INSERT INTO `user`(`fname`, `lname`, `user_id`,`password`,`email_id`,`contact_no`) VALUES ('" . $firstname . "','" . $surname . "','" . $username . "','" . $password_hash . "','" . $emailid . "','" . $contactno . "')";
                        if ($queryyrun = mysqli_query($c, $queryy)) {
                            header('Location: success.php');
                        } else {
                            echo '<br>Sorry can not register at this time, Try again later<br><br>';
                        }
                    }
                }
            }
        } else {
            echo 'All FIELDS ARE REQUIRED TO BE FILLED';
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title></title>
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">
        <script src="assets/js/ie-emulation-modes-warning.js"></script>
    </head>

    <body>
                    <style>
          body{
              height:100vh;
          background-image: url("./assets/img/homefinal.jpg");
            background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
          }
        </style>
        <div style="margin: auto 20vw;">
        	<div align="center">
	<img src="./assets/img/VITExchange.png" alt="VITExchange Logo" />
	</div>
            <h1 style="text-align:center;"><span class="auto-style3"> Register to VITExchange now !</span></h1>
            <h5 style="text-align:center;">Get started with savings, aapki apni dukaan</h5>
            <form class="form-signin" action="register2.php" method="POST" class="newStyle1" style="max-width : 800px;">
                <div class="col-sm-6">
                    <label for="firstname">&nbsp;&nbsp;&nbsp;First name</label><br>
                    <input class="form-control" type="text" name="firstname" id="firstname" maxlength="30" value="<?php if (isset($firstname)) {
                                                                                                                        echo $firstname;
                                                                                                                    } ?>" /><br>
                </div>
                <div class="col-sm-6">
                    <label for="surname">&nbsp;&nbsp;&nbsp;Last name</label><br>
                    <input class="form-control" type="text" name="surname" id="surname" maxlength="30" value="<?php if (isset($surname)) {
                                                                                                                    echo $surname;
                                                                                                                } ?>" /><br>
                </div>
                <div class="col-sm-6">
                    <label for="emailid">&nbsp;&nbsp;&nbsp;Email Address</label><br>
                    <input class="form-control" type="text" name="emailid" id="emailid" maxlength="35" value="" /><br>
                </div>
                <div class="col-sm-6">
                    <label for="contactno">&nbsp;&nbsp;&nbsp;Contact No</label><br>
                    <input class="form-control" type="text" name="contactno" maxlength="13" value="" /><br>
                </div>
                <div class="col-sm-6">
                    <label for="password">&nbsp;&nbsp;&nbsp;Choose a password</label><br>
                    <input class="form-control" type="password" name="password" id="password" value="" /><br>
                </div>
                <div class="col-sm-6">
                    <label for="password_again">&nbsp;&nbsp;&nbsp;Retype password</label><br>
                    <input class="form-control" type="password" name="password_again" id="password_again" value="" /><br>
                </div>
                <div class="col-sm-12" style="clear: both;">
                    <input class="btn btn-lg btn-success btn-block" type="submit" name="Register" id="submitButton" value="Register" />
                </div>
        </div>
    </body>
    </html>

<?php
} else if (loggedin()) {
    echo 'Already logged in';
}
?>