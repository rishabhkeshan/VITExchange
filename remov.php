<?php

require 'core2.php';
require 'conne.inc.php';
$b_id=$_GET['id'].'<br>';
$bookid=$_GET['bid'];
$s_id=$_SESSION['user_id'];
	$que="UPDATE `transaction` SET `b_id`='$b_id' WHERE `s_id`='$s_id' and `book_id`='$bookid' ";
     if($dhanu=mysqli_query($que))
      {
	    header('Location:removeadds.php');
	  
	  }
	  else
	  {
	     echo'<h3>Try after some time<h3>';
	  }




?>
