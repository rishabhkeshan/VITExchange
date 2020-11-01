<?php


require 'core2.php';
require 'conne.inc.php';?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Static Top Navbar Example for Bootstrap</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="navbar-static-top.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>





	<style type="text/css" media="screen">
	.auto-style2 {
		color: #FFFFFF;
		background-color: #0E55A7;
	}
	</style>
</head><body>
                      <style>
          body{
              height:100vh;
          background-image: url("./assets/img/final.jpg");
            background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
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
          <li class="active"><a href="Home2.php">Home</a></li>
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

              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
		    <li><a href="logout.php">Logout</a></li>
			<span class="sr-only">(current)</span></a></li>
            <li><a href="accountinfo.php"><?php echo getuserfield('fname').' '.getuserfield('lname');?>
</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php  

$userid=$_SESSION['user_id'];
$queryy="SELECT * FROM `ads` where `user_id`='$userid' ";
if($dhanu=mysqli_query($c,$queryy))
{

echo'<br>';
if(mysqli_num_rows($dhanu)==0)
{
echo "NO RESSSULT FOUND";
}
else{
while($row=mysqli_fetch_assoc($dhanu))
{  
   if(!$bookid=$row['book_id'])
   {break;}
   $post_date=$row['post_date'];
   $queryy="SELECT * FROM `book` where `book_id`='$bookid' ";
if($dg=mysqli_query($c,$queryy))
{
echo'<br>';
if(mysqli_num_rows($dhanu)==0)
{
echo "NO RESSSULT FOUND";
}
else{
while($roww=mysqli_fetch_assoc($dg))
{  

   $name=$roww['name'];
   $author=$roww['author'];
   $status=$roww['status'];
   if($status!='Sold')
   {
   
   ?>
   
   <table style="width: 100%">
		<tr>
			<td class="auto-style2">&nbsp;</td>
			<td class="auto-style"><br><b>Book Name :</b><?php echo"<a id='various3' href='removemech.php?deletee=$bookid'>&nbsp&nbsp&nbspREMOVE ADD  </a>"; ?><br><b>Author   :</b><?php echo $author; ?><br> <b>Post Date   :</b> <?php echo $post_date;?>&nbsp;</td>
			<td class="auto-style2">&nbsp;</td>
		</tr>
	</table>
     <?php
   
   }
   echo'<br><br>';
   
}

}
}
  
}}
}
  ?>
		<div id="extra">
			
		</div>
		<div id="footer">
			<ul>
				
			</ul>
			<p></p>
		</div>
	</div>
	
	
<br> <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
