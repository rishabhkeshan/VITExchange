<?php

require 'universal.inc.php';
if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/^[ a-zA-Z]+/", $_POST['name1'])){
$select1 =$_POST['select'];
$name=$_POST['name1'];
$sql="SELECT * FROM `book` WHERE $select1 LIKE '%" . $name. "%'";

}}}
else
{
$sql="SELECT * FROM `book` WHERE 1";
}

if($dhanu=mysqli_query($q,$sql))
{
echo'<br>';
if(mysqli_num_rows($dhanu)==0) 
{
echo "NO RESSSULT FOUND";
}
else{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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
<style type="text/css">
.newStyle1 {
	color: #800080;
	visibility: visible;
	display: block;
	position: static;
	width: auto;
	height: auto;
	top: auto;
	right: 100px;
	left: 100px;
}
.auto-style1 {
	margin-bottom: 0px;
}
.auto-style2 {
	text-decoration: none;
}
.auto-style3 {
	background-color: #C0C0C0;
}
</style>
</head>
 
<body>
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
          <li><a href="Home2.php">Home</a></li>
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
<br> 
<form  method="post" action="searchres.php?go"  id="searchform"> 
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input  type="text" name="name1" style="height: 29px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="select" size="1" style="height: 29px">
		  <option  name ="name" value="name" selected="selected">Book Name</option>
	      <option value="author" name="author">Author</option>
	      <option value="publication">Publicaion</option>
	      </select>
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input  type="submit" name="submit" value="submit" style="height: 33px; width: 78px"> 
	    </form> 
		  

</body>
</html>
<?php


while($row=mysqli_fetch_assoc($dhanu))
{ 

if(!$bookname=$row['name'])
{break;}
$author=$row['author'];
$description=$row['description'];
$price=$row['price'];
$publication=$row['publication'];
$category=$row['category'];
$status=$row['status'];
$bookid=$row['book_id'];
$image=$row['image'];

?>

<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
		<?php 
		
       if($status!='Sold')
       {	
		     if($image)
            {
                 echo "<img  class=\"img-rounded\" src=getimage.php?id=$bookid height=\"170px\" width=\"130px\"  alt=\"Generic placeholder image\"   >  ";
            }
            else
            {
        ?> 
                <img class="img-rounded" src="noimage.jpg" alt="Generic placeholder image" style="width: 130px; height: 170px;">
        <?php 
            }

          ?>
          
          <?php echo"<br><a id='various3' href='perticular.php?id=$bookid'><b>$bookname</b></a>";
                   echo'<br>Author :'.$author;
				   echo'<br>Price :'.$price;
                     if($status!='Booked')
                    {
                            echo"<br><a id='various3' href='wishlist2.php?id=$bookid'><b>Add to Wishlist</b></a>";
                            echo"<br><a id='various3' href='booking2.php?id=$bookid'><b>Booking</b></a>";
                    }
                    else
					{
					        echo"<br>Temporary Unavailable";
					}
					?>
		 <?php echo"<br><a class=\"btn btn-default\"id='various3' href='perticular.php?id=$bookid' role=\"button\">View details &raquo;</a>";
                  } ?>
         
        </div><!-- /.col-lg-4 -->
    



<?php
}
}
}

else
{
echo 'NOT CONNECTES';
}
?><script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
