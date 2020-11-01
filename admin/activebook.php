<?php
require '../core2.php';
require '../conne.inc.php';

 
 
 $bookid=$_GET['id'];
	
		
 
	       $status="Active";
		   
		        $queryy="UPDATE `book` SET `status`='Active' WHERE book_id=$bookid";
                    if($dhanu=mysqli_query($c,$queryy))
                       {    header('Location:adminpanel.php');}
	           
				      
					   else
					   {
					      echo'ERROR1';
					   }
		         
	 
?>	
