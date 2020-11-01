
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">

</style>
</head>
 
<body  >
<form id="form1" name="form1" method="GET" action="removemech.php">
  <a href="HOME2.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
  <a href="../../../xampp/myscr/post2.php">Post Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="../../../xampp/myscr/accountinfo.php">My Account</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="../../../xampp/myscr/wlist2.php">Wish List</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="../../../xampp/myscr/requirementpage.php">Current Requirements</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
  <a href="../../../xampp/myscr/logout.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <br>
   <br>
  

</body>
</html>

<?php

require 'core2.php';
require 'conne.inc.php';

if(isset($_GET['deletee'])&&!empty($_GET['deletee']))
{
 $bookid=$_GET['deletee'].'<br>';
$s_id=$_SESSION['user_id'];
$que="INSERT INTO `transaction`(`s_id`, `book_id`)
          VALUES ('".$s_id."','".$bookid."')";
		  
$dhanu=mysqli_query($c,$que);

$quee="UPDATE `book` SET `status`='Sold' WHERE `book_id`='$bookid'";
        $dhanu=mysqli_query($c,$quee);
 } 

$newq="SELECT email_id from user where user_id in (SELECT `b_id` FROM booking WHERE book_id='$bookid')";

          if($newquery=mysqli_query($c,$newq))
           { 
               while($row=mysqli_fetch_assoc($newquery))
               {  
                if(!$emailid=$row['email_id'])
                 {break;}
                 $email=md5($emailid);
                 echo"<br><a id='various3'  href='remov.php?id=$email&bid=$bookid'>$emailid</a>";
   
                  		   
			   }
           }
  
           else
          {
		     echo'sorry';
          }
 

	
	


?>
