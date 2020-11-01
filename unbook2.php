<?php
require 'core2.php';
require 'conne.inc.php';

 
 
 $bookid=$_GET['id'];
	
		if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
    {

    $quer= "SELECT * FROM `booking` where book_id='$bookid' order by exp_date desc limit 1";    
         if($dhanu=mysqli_query($c,$quer))
         {        
		    $row=mysqli_fetch_assoc($dhanu);
            $sellerid=$row['s_id'];
			$buyerid=$row['b_id'];
           echo $sellerid;
		   echo $buyerid;
			
			
         }
	    
	       $status="Active";
           $user=$_SESSION['user_id'];
		   
           if($user==$sellerid||$user==$buyerid)
	       { 
		        $queryy="UPDATE `book` SET `status`='Active' WHERE book_id=$bookid";
                $qu="UPDATE `booking` SET `sign`='=' WHERE book_id='$bookid' AND  b_id='$buyerid'";

                       if($dhanu=mysqli_query($c,$queryy))
                       {     if($jdn=mysqli_query($c,$qu)){
                         header('Location:HOME2.php');}
	           
				       }
					   else
					   {
					      echo'ERROR1';
					   }
		         
	      }
		  }
	else
	{
	echo'Please Login';
	}
?>	
