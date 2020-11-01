<?php  
require 'core2.php';
require 'conne.inc.php';

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
$userid=$_SESSION['user_id'];
$bookid=$_GET['id'];
$queryy="SELECT * FROM `wishlist` WHERE  `book_id`='$bookid' AND `user_id`='$userid'";
$dhanu=mysqli_query($c,$queryy);
if(mysqli_num_rows($dhanu)==0)
{
$query = "INSERT INTO `wishlist`(`user_id`, `book_id`) VALUES ('".$userid."','".$bookid."')";

$runquery=mysqli_query($c,$query);
if($runquery)
{

header('Location:wlist2.php');
}
else
{
echo'please try after some time';
header('Location:wlist2.php');
}
}
else
{
  echo"BOOK IS ALREADY IN WHISHLIST";
}
}

else
{
echo'login';
}
?>
