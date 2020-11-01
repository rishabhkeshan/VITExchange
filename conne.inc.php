<?php
$c=mysqli_connect('localhost','root','') or die("NOT CONNECTED");
$cc=mysqli_select_db( $c,'hello1');
if(!$cc)
{echo'UNSUCCESSFUL CONNECTION';}
else
{
echo'';
}
?>
