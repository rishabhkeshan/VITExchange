<?php
ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
function dbi_result($result, $row, $field)
{
  if ($result->num_rows == 0) return 'unknown';
  $result->data_seek($row);
  $ceva = $result->fetch_assoc();
  return (isset($ceva[$field]) ? $ceva[$field]
    : (strpos($field, '.') ? $ceva[substr($field, strrpos($field, '.') + 1)] : ''));
}
//$http_referer=$_SERVER['HTTP_REFERER']) ;
function loggedin()
{  

  if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
  {
  return true;
  }
  else
  {return false;
  }
}
function getuserfield($field)
{
require 'conne.inc.php';
$query="SELECT `$field` FROM `user` WHERE `user_id`='".$_SESSION['user_id']."'";
if($query_run=mysqli_query($c,$query))
{
if($query_result=dbi_result($query_run,0,$field))
{  
   return $query_result;
}  
else
{
  echo 'UNKNOWN USER';

  
 }


}

}
?>
