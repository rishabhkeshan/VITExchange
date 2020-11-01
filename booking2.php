<?php  
require 'core2.php';
require 'conne.inc.php';
echo "<b>Welcome,  ".getuserfield('fname').'  '.getuserfield('lname');
    
           $bookid=$_GET['id'];
	
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
    {       $quer="SELECT * FROM `ads` WHERE  `book_id`='$bookid'";
           if($dhanu=mysqli_query($c,$quer))
         {        
		    $row=mysqli_fetch_assoc($dhanu);
            $sellerid=$row['user_id'];
         }
	    
	       $status="Booked";
           $buyerid=$_SESSION['user_id'];
           if($sellerid)
	       { 
		        $queryy="INSERT INTO `booking`(`s_id`, `b_id`, `book_id`, `booking_date`,exp_date) VALUES('".$sellerid."','".$buyerid."','".$bookid."',NOW(),DATE_ADD(NOW(),INTERVAL 24 HOUR))";

				if($dhanu=mysqli_query($c,$queryy))
                {     $sql="UPDATE `book` SET `status`='$status'  WHERE `book_id`='$bookid'";
                     
                       if($dhanu=mysqli_query($c,$sql))
                       {     
                         header('Location:yourbookings.php');
	           
				       }
					   else
					   {
					      echo'ERROR1';
					   }
		         }
				 else
				 {echo'error2';
				 }
	       }
		   else
		   {
		     echo'error3';
		   }
	}
	else
	{
	echo'Please Login';
	}
	
	
	?>
