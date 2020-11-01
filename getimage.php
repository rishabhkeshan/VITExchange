<?php

require 'core2.php';
require 'conne.inc.php';

$id=addslashes($_REQUEST['id']);
$image=mysqli_query($c,"SELECT imagename FROM book WHERE book_id=$id");
// $image=mysqli_fetch_assoc($image);
// $image=$image['image'];

// header("Content-type: image/jpeg");

echo $image;
?>
