<?php

	require_once('connect.php');
	$title=$_GET['course'];
	$c_title=$_GET['c_title'];
    $sql="select * from chapter where (title like '$title') and (c_title like '$c_title')";
    $query=mysqli_query($con,$sql);
    if ($query&&mysqli_num_rows($query)) {
        $row=mysqli_fetch_assoc($query);

    }else{
        echo "这个视频不存在";
        exit;
    }
    $title=$row['title'];
    $search=$row['search'];


    $sql1="select * from chapter where title like '$title'";
    $query1=mysqli_query($con,$sql1);
    if ($query1&&mysqli_num_rows($query1)){
        while ($row1=mysqli_fetch_assoc($query1)){
            $data[]=$row1;
        }
    } 
 ?>