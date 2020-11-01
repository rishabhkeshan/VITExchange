<?php
require 'universal.inc.php';
$sql="SELECT * FROM `book` WHERE 1";
if($dhanu=mysqli_query($c,$sql))
{
echo'<br>';
if(mysqli_num_rows($dhanu)==0) 
{
echo "NO RESSSULT FOUND";
}
else{


$query = mysqli_query($c,$sql);
// Here we have the total row count
$rows = mysqli_num_rows($query);
// This is the number of results we want displayed per page
$page_rows = 3;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit
//$sql = "SELECT * from book $limit";
$sql = "SELECT * from book $limit";

$query = mysqli_query($c,$sql);
// This shows the user what page they are on, and the total number of pages
$textline1 = "Testimonials (<b>$rows</b>)";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
    }
}
$list = '';

?><!DOCTYPE html>
<html lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HomePage</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
            <style>
          body{
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
	
	
	
	
	 
	
	
	

<form  method="post" action="searchres.php?go"  id="searchform"> 
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 Search : &nbsp;&nbsp;&nbsp;&nbsp; <input  type="text" name="name1" style="height: 29px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="select" size="1" style="height: 29px">
		  <option  name ="name" value="name" selected="selected">Book Name</option>
	      <option value="author" name="author">Author</option>
	      <option value="publication">Publicaion</option>
	      </select>
	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input  type="submit" name="submit" value="submit" style="height: 33px; width: 78px"> 
	    </form> 
	<div>
  <p style="margin-left:100px;"><?php echo '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$textline2; ?></p>
  <p><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$list; ?></p>
  <div id="pagination_controls"><?php echo'&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>'.$paginationCtrls.'</b>'; ?></div>
</div>


      
	  
	  <?php
echo'<br>';

while($row=mysqli_fetch_assoc($query))
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
      <div class="row">
        
		<?php 
      
       if($status!='Sold' && $status!='Deactive')
       { echo	"<div class='col-lg-3' style='min-height : 380px; border: none; border-radius : 20px; margin : 0 40px;padding : 20px 80px; text-align:center; background-color:rgba(255,228,196,0.4);box-shadow: 12px 12px 25px 0px rgba(55, 84, 170, 0.2), -12px -12px 25px 0px rgba(255, 255, 255, 0.7), inset -5px -5px 10px 0px rgba(55, 84, 170, 0.2), inset 5px 5px 10px 0px rgba(255, 255, 255, 0.7);'>";
		     if($image)
            {
                 echo "<img  class=\"img-rounded\" src=.\assets\img\\$image height=\"170px\" width=\"130px\"  alt=\"Generic placeholder image\"   >  ";
            }
            else
            {
        ?> 
                <img class="img-rounded" src="./assets/img/book2.jpg" alt="Generic placeholder image" style="width: 130px; height: 170px;">
        <?php 
            }

          ?>
          
          <?php echo"<br><br><div style='height : 20px;'><a style=' text-decoration : none; color : rgb(128,0,0); margin-top : 8px; padding : 16px 0;' id='various3' href='perticular.php?id=$bookid'><b>$bookname</b></a></div>";
                   echo"<br><span style='text-decoration : none; color : rgb(128,0,0);'><br>Author : $author</span>";
           echo"<span style='text-decoration : none; color : rgb(128,0,0);'><br>Price : ₹$price</span>";
                     if($status!='Booked')
                    {
                            // echo"<br><a style='text-decoration : none; color : rgb(208,0,0);' id='various3' href='wishlist2.php?id=$bookid'><b>Add to Wishlist</b></a>";
                            echo"<br><a style='text-decoration : none; color : rgb(208,0,0);' id='various3' href='booking2.php?id=$bookid'><b>Buy Now</b></a>";
                    }
                    else
					{
					        echo"<br>Already Booked";
					}
          echo"<br><div style='height:50px; margin-top:20px;'><a class=\"btn success\"id='various3' href='perticular.php?id=$bookid' role=\"button\">View details</a></div>";
		}			?>
		 <style>
       .btn {
  border: 2px solid black;
  background-color: rgba(255, 255, 255, 0.4);
  color: black;
  padding: 7px 14px;
  font-size: 16px;
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
}}}
?>


    

    </div>
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>


</html>

