
<?php
require 'core2.php';
require 'conne.inc.php';
$sql = "UPDATE booking SET sign=IF(TIMEDIFF(exp_date,NOW()) >= 0,'+','-') WHERE sign!='=' ";
if($dhanu=mysqli_query($c,$sql))
{

$sqll = "SELECT b_id,book_id,sign FROM `booking` WHERE sign='-'";
if($dhanuu=mysqli_query($c,$sqll))
{
while($row=mysqli_fetch_assoc($dhanuu))
{ 
$b_id=$row['b_id'];
$book_id=$row['book_id'];
$sign=$row['sign'];
if($sign=='-')
{
$sqli = "UPDATE `book` SET `status`='Active' WHERE book_id='$book_id'";
if($dh=mysqli_query($c,$sqli))
{

$sqt = "UPDATE booking SET sign='=' WHERE b_id='$b_id' AND book_id='$book_id'";
if(mysqli_query($c,$sqt))
{}



}
}
}
}
}	
	
?>
