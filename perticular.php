<?php
require 'core2.php';
require 'conne.inc.php';

?><!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/carousel/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Mar 2015 14:01:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Book Description</title>

    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
                    <style>
          body{
            height:100vh;
          background-image: url("./assets/img/final.jpg");
            background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
          }
        </style>
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
	<br><br><br><br>
	
<?php
    
	$bookid=$_GET['id'];
$queryy="SELECT * FROM `book` WHERE  `book_id`='$bookid'";
if($dhanu=mysqli_query($c,$queryy))
{  $row=mysqli_fetch_assoc($dhanu);

$bookname=$row['name'];
$author=$row['author'];
$description=$row['description'];
$price=$row['price'];
$publication=$row['publication'];
$category=$row['category'];
$status=$row['status'];
$bookid=$row['book_id'];
$image=$row['imagename'];
echo'<br>';
echo'<br>';

$image=$row['imagename'];?>
<div class="container marketing">

      <div class="row">
        <div class="col-lg-4">
		<?php 
		
       if($status!='Sold')
       {	
		     if($image)
            {
                 echo "<img  class=\"img-rounded\" src=.\assets\img\\$image height=\"270px\" width=\"230px\"  alt=\"Generic placeholder image\"   >  ";
            }
            else
            {
        ?> 
                <img class="img-rounded" src="noimage.jpg" alt="Generic placeholder image" style="width: 130px; height: 170px;">
        <?php 
            }

          ?>
          
            <?php echo"<br><h4 style='font-size:20px'><a style=' text-decoration : none; margin-top : 8px; padding : 16px 0;' id='various3' href='perticular.php?id=$bookid'><b>$bookname</b></a></h4>";
                     if($status!='Booked')
                    {
                            echo"<br><a style='font-size:20px' id='various3' href='wishlist2.php?id=$bookid'><b>Add to Wishlist</b></a>";
                            echo"<br><a style='font-size:20px' id='various3' href='booking2.php?id=$bookid'><b>Buy Now</b></a>";
                    }
                    else
					{
					        echo"<br>Sold";
					}
					?>
		 <?php 
             }      ?>
         
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-8">
    <?php
  echo  '<h3><b>Description</b></h3>';
  echo'<br>';
   echo''.$description;
echo'<br><br>';
 echo "<table class='table'>
 <tr>
 <td><b>Publication</b></td>
  <td>$publication</td>
  </tr>
  <tr>
 <td><b>Category</b></td>
  <td>$category</td>
  </tr>
  <tr>
 <td><b>Author</b></td>
  <td>$author</td>
  </tr>
  <tr>
 <td><b>Price</b></td>
  <td>₹$price</td>
  </tr>
 </table>";
                  
}

?>
</div>
 </div>
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

