<?php 
	require_once('connect.php');

	$title = $_POST['title'];

	$c_title = $_POST['c_title'];

	$name = $_POST['user'];

	$content = $_POST['content'];

	$insertsql="insert into comment(title,c_title,comment,user) values('$title','$c_title','$content','$user')";
    
    if($content!=''){
        
        mysqli_query($con,$insertsql);

	
    
    	echo '{"name": "'.$name.'","content": "'.$content.'","status": "1"}';
	
    }
    

	// echo "<script>alert('php文件')</script>";

 ?>