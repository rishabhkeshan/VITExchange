<?php
require 'core2.php';
require 'conne.inc.php';

if(isset($_POST['name'])&&isset($_POST['author'])&&isset($_POST['publication']))
 {
$name=$_POST['name'];
$author=$_POST['author'];
$publication=$_POST['publication'];

$user_id=$_SESSION['user_id'];
 if(!empty($name)&&!empty($author)&&!empty($publication)) 
{
if(strlen($name)>30||strlen($author)>30||strlen($publication)>30)
{
 echo 'please do not cross max lenth';
}
else
{
$queryy="INSERT INTO `requirement`(`name`, `author`, `publication`, `user_id`) VALUES ('".$name."','".$author."','".$publication."','".$user_id."')";
if($queryyrun=mysqli_query($c,$queryy)){ header('Location: requirementpage.php');}
else{echo'<br>Sorry can not post requirement at this time, Try again later<br><br>';}

}
}
else
{
echo'All FIELDS ARE REQUIRED TO BE FIILED';
}
}

?><!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Post Requirement</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
           <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li><a href="HOME2.php">Home</a></li>
            <li><a href="post2.php">Post Add</a></li>
            <li><a href="wlist2.php">Wish List</a></li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                 <li><a href="accountinfo.php">My Profile</a></li>
                <li><a href="checkadds.php">My Adds</a></li>
                <li><a href="yourbookings.php">My Bookings</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Other</li>
                <li><a href="removeadds.php">Remove Add</a></li>
            <li><a href="review.php">Submit Feedback</a></li>
              
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
 <li><a href="revieww.php">User Reviews</a></li>
		    <li><a href="logout.php">Logout</a></li>
			<span class="sr-only">(current)</span></a></li>
            <li><a href="accountinfo.php"><?php echo getuserfield('fname').' '.getuserfield('lname');?>
</a></li>
            </ul>
        </div> </div>
        </nav>

      </div>
    </div>
	<div><br><br><br><br><br><br><br>
<form class="form-horizontal" action="requirement.php" method="POST">
  <div class="form-group">
    <label for="inputPassword1" class="col-sm-2 control-label">Book Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Author</label>
    <div class="col-sm-10">
      <input type="text" name="author" class="form-control" >
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Publication</label>
    <div class="col-sm-10">
      <input type="text" name="publication" class="form-control" >
    </div>
  </div>
 
 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">POST</button>
    </div>
  </div>
</form>
</div>
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
