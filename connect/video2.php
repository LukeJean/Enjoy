<?php 
    require_once('connect.php');
    $sql2="SELECT * FROM video WHERE title LIKE '%$_POST[keyword]%'";
    $query2=mysqli_query($con,$sql2);//传递给数据库处理，把结果集的地址传递给$query
    if ($query2&&mysqli_num_rows($query2)){
        while ($row2=mysqli_fetch_assoc($query2)){
            $data2[]=$row2;//最终产生的$data是一个二维数组
        }
    }else{
        $data2=array();
    }
 ?>