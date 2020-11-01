
<?php

require 'core2.php';
require 'conne.inc.php';
$userid=$_SESSION['user_id'];
$queryy="SELECT * FROM `ads` where `user_id`='$userid'";
if($dhanu=mysqli_query($c,$queryy))
{
$rows=mysqli_num_rows($dhanu);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>User Dashboard</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="navbar-static-top.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
<style type="text/css">

.auto-style1 {
	text-decoration: none;
}

</style>
</head>

<body >
            <style>
          body{
          background-image: url("./assets/img/final.jpg");
          background-repeat: no-repeat;
           overflow: hidden;
          }
        </style>
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
            <li><a href="wlist2.php">WishList</a></li>
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
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<h2 style="text-align:center;">My Profile</h2>
<br><br>
<div class="col-md-4"></div>
<div class="col-md-4">
<table  class="table" style="margin : 0 25% 0 20%;margin-right:20%;background-color:rgba(255,255,255,0.4); border-radius:20px; padding:10px;box-shadow: 12px 12px 25px 0px rgba(55, 84, 170, 0.2), -12px -12px 25px 0px rgba(255, 255, 255, 0.7), inset -5px -5px 10px 0px rgba(55, 84, 170, 0.2), inset 5px 5px 10px 0px rgba(255, 255, 255, 0.7); ">
	<tr>
		<td style=" height: 37px;text-align:center;" >&nbsp;&nbsp;&nbsp;First 
		Name</td>
		<td style="width: 18px; height: 37px" class="auto-style2">&nbsp;&nbsp;&nbsp; :</td>
		<td style="height: 37px;" class="auto-style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo getuserfield('fname');?></td>
	</tr>
	<tr>
		<td style="height: 37px;text-align:center;" class="auto-style2">&nbsp;&nbsp;&nbsp;Last Name
		</td>
		<td style="width: 18px; height: 37px" class="auto-style2">&nbsp;&nbsp;&nbsp; :</td>
		<td style="height: 37px;" class="auto-style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo getuserfield('lname'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
	</tr>
	<tr>
		<td style=" height: 37px;text-align:center;" class="auto-style2">&nbsp;Email Id
		</td>
		<td style="width: 18px; height: 37px" class="auto-style2">&nbsp;&nbsp;&nbsp; :</td>
		<td style="height: 37px;" class="auto-style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo getuserfield('email_id'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
	</tr>
	<tr>
		<td style=" height: 37px;text-align:center;" class="auto-style2">&nbsp;&nbsp;&nbsp;Contact No
		<td style="width: 37px; height: 37px;" class="auto-style2">&nbsp;&nbsp;&nbsp; :</td>
		<td style="height: 37px;" class="auto-style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo getuserfield('contact_no'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
	</tr>
	<tr>
		<td style=" height: 37px;text-align:center;" class="auto-style2">&nbsp;&nbsp;&nbsp;Current Ads </td>
		<td style="width: 37px; height: 37px;" class="auto-style2">&nbsp;&nbsp;&nbsp; : </td>
		<td style="height: 37px;" class="auto-style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
	</tr>
</table>
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<br> <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
