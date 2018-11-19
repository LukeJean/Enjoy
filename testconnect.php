<?php

	// 连库
	require_once('connect.php');

	//变量
	@$title = $_GET['course'];
	@$c_title = $_GET['c_title'];


    //视频列表
    @$sql_list="select * from video where keywords like '%$_GET[c]%'";//按时间排
    $query_list=mysqli_query($con,$sql_list);//传递给数据库处理，把结果集的地址传递给$query
    if ($query_list&&mysqli_num_rows($query_list)){
        while ($row_list=mysqli_fetch_assoc($query_list)){
            $data_list[]=$row_list;//最终产生的$data是一个二维数组
        }
    }else{
        $data_list=array();
    }

	//视频
	$sql_video="select * from chapter where (title like '$title') and (c_title like '$c_title')";
    $query_video=mysqli_query($con,$sql_video);
    if ($query_video&&mysqli_num_rows($query_video)) {
        $row_video=mysqli_fetch_assoc($query_video);

    }else{
        echo "这个视频不存在";
        exit;
    }

    //猜你喜欢的变量
    $search=$row_video['search'];

    //目录
    $sql_menu="SELECT * FROM chapter WHERE title LIKE '$title' ";
    $query_menu=mysqli_query($con,$sql_menu);
    if ($query_menu&&mysqli_num_rows($query_menu)){
        while ($row_menu=mysqli_fetch_assoc($query_menu)){
            $data_menu[]=$row_menu;
        }
    }else{
        $data_menu=array();
    }

    //猜你喜欢
    $sql_like="SELECT * FROM video WHERE search LIKE '$search' ";
    $query_like=mysqli_query($con,$sql_like);
    if ($query_like&&mysqli_num_rows($query_like)){
        while ($row_like=mysqli_fetch_assoc($query_like)){
            $data_like[]=$row_like;
        }
    }else{
        $data_like=array();
    }

    //父级评论显示
    $sql_father="SELECT * FROM comment WHERE title LIKE '$title' AND c_title LIKE '$c_title' AND re_id = 0";
    $query_father=mysqli_query($con,$sql_father);
    if ($query_father&&mysqli_num_rows($query_father)){
        while ($row_father=mysqli_fetch_assoc($query_father)){
            $data_father[]=$row_father;
        }
    }else{
        $data_father=array();
    }

    //子级评论显示
    

    //知识点时间
    $sql_point="SELECT * FROM point WHERE title LIKE '$title' AND c_title LIKE '$c_title' ";
    $query_point=mysqli_query($con,$sql_point);
    if ($query_point&&mysqli_num_rows($query_point)){
        while ($row_point=mysqli_fetch_assoc($query_point)){
            $data_point[]=$row_point;
        }
    }else{
        $data_point=array();
    }

    //搜索
    @$sql_search="SELECT * FROM video WHERE title LIKE '%$_POST[keyword]%'";
    $query_search=mysqli_query($con,$sql_search);//传递给数据库处理，把结果集的地址传递给$query
    if ($query_search&&mysqli_num_rows($query_search)){
        while ($row_search=mysqli_fetch_assoc($query_search)){
            $data_search[]=$row_search;//最终产生的$data是一个二维数组
        }
    }else{
        $data_search=array();
    }

 ?>