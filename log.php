<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>BookBazzar.Com</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href='https://fonts.googleapis.com/css?family=Covered+By+Your+Grace' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  

function newDoc() {
    window.location.assign("register2.php")
}
</script>
</head>
<body>
 
    <div class="row">
      <div class="col s12 " >
 		<h1 class="center" style="font-family: 'Covered By Your Grace', cursive;">Login</h1>     
 	</div>
    </div>
          



  <div class="row" id="centerme">
    <form class="col l6"  name="myForm" " method="post" action="loginform2.php">
	<div class="row">
         <div class="input-field col l12">Email
          <input name="login" type="email" class="validate">
        </div>
      </div>
      <div class="row">
        <div class="input-field col l12">Password
          <input name="password" id="password" type="password" class="validate">
        </div>
      </div>

       <div class="row">
        <div class="input-field col l6">

         <input type="submit" class="waves-effect waves-light btn-large" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;

        </div>

	 <div class="input-field col l6">

         <input type="button" class="waves-effect waves-light btn-large" onclick="newDoc()" value="Register">&nbsp;&nbsp;&nbsp;&nbsp;

        </div>
      </div>

	

     
    </form>

  </div>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

<?php
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
echo'';
}
else if($query_num_rows==1){
echo $user_id=mysqli_result($query_run,0,'user_id');
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

  </body>
</html>
