<?php 
    //CourseList.php
    require_once('connect.php');
    $sql1="select * from video where keywords like '%$_GET[c]%'";//按时间排
    $query1=mysqli_query($con,$sql1);//传递给数据库处理，把结果集的地址传递给$query
    if ($query1&&mysqli_num_rows($query1)){
        while ($row1=mysqli_fetch_assoc($query1)){
            $data1[]=$row1;//最终产生的$data是一个二维数组
        }
    }else{
        $data1=array();
    }
 ?>