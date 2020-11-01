<?php

require 'core2.php';
require 'conne.inc.php';
//if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
if(loggedin())
{

//echo'your logged in '.$username.'<br/><br/><br/><a href="logout.php">LOGOUT</a>';
 header('Location: HOME2.php'); 
}
else
{
include 'loginform2.php';
}
?>
