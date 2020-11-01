
<?php
require 'core2.php';
require 'conne.inc.php';
   


 if($file=$_FILES['photo']['tmp_name'])
 {
   
   if($file)
   {
     $image=addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $image_name=addslashes($_FILES['photo']['name']); 
    $image_size=getimagesize($_FILES['photo']['tmp_name']);
	if($image_size==NULL)
	{   echo"Ready";
	}
	else
	{
   echo"Ready";
   
     }
   }
   else{   echo"Ready";
}
}  
  ?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
 
<form  method="POST" action="imagr.php" enctype="multipart/form-data>
  <input name="photo" type="file"   />
  <input type="submit" name="Submit" value="Submit" />
</form>

 
</body>
</html>










