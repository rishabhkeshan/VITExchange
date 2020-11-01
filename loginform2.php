<!DOCTYPE html>
<html lang="en">
<body bgcolor="white" width="100%">
	<div align="center">
	<img src="./assets/img/VITExchange.png" alt="VITExchange Logo" />
	</div>
<div align="center">
<h1>Welcome to VITExchange</h1>
<p>Your one stop shop to buy and sell used books</p>
</div>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head bgcolor="white" width="100%">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Welcome to VITExchange</title>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="signin.css" rel="stylesheet">

<script src="assets/js/ie-emulation-modes-warning.js"></script>

<style type="text/css">
.auto-style1 {
	color: #FFFFFF;
}
.auto-style2 {
	text-decoration: none;
}
</style>
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
<div class="container">
<form class="form-signin sizei" method="POST" style="padding-left:300px;padding-right:300px;" >
<h2 style=" text-align:center;" class="form-signin-heading">Sign in to continue</h2>
<h1></h1>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<a class="btn btn-lg btn-primary btn-block" href="register2.php" role="button">Register</a>



</form>



<?php
require 'conne.inc.php';
function db_result($result, $row, $field)
{
	if ($result->num_rows == 0) return 'unknown';
	$result->data_seek($row);
	$ceva = $result->fetch_assoc();
	return (isset($ceva[$field]) ? $ceva[$field]
		: (strpos($field, '.') ? $ceva[substr($field, strrpos($field, '.') + 1)] : ''));
}
if(isset($_POST['login'])&&isset($_POST['password']))
{
$usernam=$_POST['login'];
$password=$_POST['password'];
$password_hash=md5($password);
$username=md5($usernam);
if(!empty($username)&&!empty($password))
{
$query="SELECT `user_id` FROM `user` WHERE `user_id`='$username' AND `password`='$password_hash'"; 
$query_run=mysqli_query($c,$query); 
if($query_run)
{ 

$query_num_rows=mysqli_num_rows($query_run);

if($query_num_rows==0)
{
echo'invalid';
}
else if($query_num_rows==1){

echo $user_id=db_result($query_run,0,'user_id');
$_SESSION['user_id']=$user_id;
header('Location: index.php');

}

}
}
}
else
{

}


?>


</div>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</div>
</body>
</html>

