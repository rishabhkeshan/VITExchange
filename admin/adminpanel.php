  <?php
/* 
require 'core2.php';
require 'conne.inc.php';

echo "<b>Welcome, ".getuserfield('fname').' '.getuserfield('lname');
*/



require '../universal.inc.php';


$sql="SELECT * FROM `book` WHERE `status`='Deactive'";
$query=mysqli_query($c,$sql)
?>
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <br>
    <br>
    <br>

<br><br>
 
    <?php
echo'<br><br>';

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
$image=$row['image'];

?>
<div class="row">
        <div class="col l4">
    <?php 
    
       if($status=='Deactive')
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
          echo"<br><a href='activebook.php?id=$bookid' class=\"waves-effect waves-light btn-large\">Active Book</a>";
         
    }     ?>
     
        </div><!-- /.col-lg-4 -->
    



<?php
}
?>


    

    </div><!-- /.container -->





      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>
        