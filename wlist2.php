
<?php
require 'core2.php';
require 'conne.inc.php';


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

    <title>Wishlist</title>
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
  <style>
          body{
          background-image: url("./assets/img/final.jpg");
            background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
  height:100vh;
   overflow: hidden;
          }
        </style>
  <!-- Static navbar -->
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
            <li><a href="wlist2.php">Wishlist</a></li>
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
	<h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wish List</h2>
<br> <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

<?php



if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
         $userid=$_SESSION['user_id'];
         $queryy="SELECT * FROM `wishlist` WHERE  `user_id`='$userid'";
         $dhanu=mysqli_query($c,$queryy);

     if($dhanu)
    {
       while($row1=mysqli_fetch_assoc($dhanu))
       { $bookid=$row1['book_id'];
         
         $sql="SELECT * FROM `book` WHERE  `book_id`='$bookid' AND status!='Sold'";
         $dhanu1=mysqli_query($c,$sql);
          
           if($dhanu1)
           { 
 while($row=mysqli_fetch_assoc($dhanu1))
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
$image=$row['imagename'];

?>

<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4" style="min-height : 200px; max-width: 300px; border: none; border-radius : 20px; margin : 0 10px;padding : 10px 40px; text-align:center; background-color:rgba(255,228,196,0.4);box-shadow: 12px 12px 25px 0px rgba(55, 84, 170, 0.2), -12px -12px 25px 0px rgba(255, 255, 255, 0.7), inset -5px -5px 10px 0px rgba(55, 84, 170, 0.2), inset 5px 5px 10px 0px rgba(255, 255, 255, 0.7)">
		<?php 
		
       if($status!='Sold')
       {	
		     if($image)
            {
                 echo "<img  class=\"img-rounded\" src=.\assets\img\\$image height=\"170px\" width=\"130px\"  alt=\"Image\"   >  ";
            }
            else
            {
        ?> 
                <img class="img-rounded" src="noimage.jpg" alt="Image" style="width: 130px; height: 170px;">
        <?php 
            }

          ?>
          
          <?php echo"<br><a id='various3' href='perticular.php?id=$bookid'><b>$bookname</b></a>";
                   echo'<br>Author :'.$author;
				   echo'<br>Price :'.$price;
                     if($status!='Booked')
                    {
                            echo"<br><a id='various3' href='booking2.php?id=$bookid'><b>Buy Now</b></a>";
                    }
                    else
					{
					        echo"<br>Temporary Unavailable";
					}
					?>
		 <?php echo"<br><a class=\"btn success\"id='various3' href='perticular.php?id=$bookid' role=\"button\">View details &raquo;</a>";
                  } ?>
         		 <style>
       .btn {
  border: 2px solid black;
  background-color: rgba(255, 255, 255, 0.4);
  color: black;
  padding: 3px 6px;
  font-size: 12px;
  cursor: pointer;
}

.success {
  border-color: rgb(165,42,42);
  color: rgb(165,42,42);
}

.success:hover {
  background-color: rgb(165,42,42);
  color: white;
}
     </style>
        </div><!-- /.col-lg-4 -->
    



<?php
}
           }
  
           else
          {
		     echo'sorry';
          }
        }
     }
	   else {echo'error';}
  }
  
   else
  {
     echo'login';
  }
?>
