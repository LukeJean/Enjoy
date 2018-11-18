<?php
    require_once('connect.php');
    $title=$_GET['course'];
    $sql3="select * from video where title like '$title'";
    $query3=mysqli_query($con,$sql3);
    if ($query3&&mysqli_num_rows($query3)) {
        $row3=mysqli_fetch_assoc($query3);

    }else{
        echo "这个视频不存在";
        exit;
    } 
 ?>