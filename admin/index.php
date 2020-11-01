<!DOCTYPE html>
<html lang="en">
<body bgcolor="white" width="100%">
<div align="center">
<h1>Welcome to VITExchange</h1>
</div>
<div align="center">
<img src="vjti.png" alt="VJTI Logo" />
</div>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head bgcolor="white" width="100%">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title>Welcome to VITExchange</title>

<!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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

<div class="container">

<form class="form-signin" method="POST" >
<h2 class="form-signin-heading">Admin sign in</h2>
<label for="inputEmail" class="sr-only">Email address</label>
<input type="email" name="login" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>



</form>



<?php
if(isset($_POST['login'])&&isset($_POST['password']))
{
$usernam=$_POST['login'];
$password=$_POST['password'];
if(!empty($username)&&!empty($password))
{

if($username=="admin10896@gmail.com" && $password=="admin10896")
{ 

header('Location:adminpanel.php');

}
else
{
	?>
	<script type="text/javascript">
		alert("WRONG USERNAME OR PASSWORD")
	</script>

	<?php
	header('Location:index.php');

}
}
else{
	?>
<script type="text/javascript">
		alert("EMPTY FIELD FOR USERNAME OR PASSWORD NOT ALLOWED")
	</script>

	<?php
		header('Location:index.php');

}
}
?>


</div> 
</div>
</body>
</html>

