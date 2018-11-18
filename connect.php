<?php
	require_once('config.php');//引用数据库配置文件
	//连库
	if(!($con=mysqli_connect(HOST,USERNAME,PASSWORD))){
		echo mysqli_connect_error();
	} 
	//选库
	if (!(mysqli_select_db($con,'new'))) {
		echo mysqli_connect_error();
	}
	//字符集,要有两个参数，只有最后的那个会报错
	if(mysqli_query($con,"set names 'UTF8'")){
		echo mysqli_connect_error();
	}
 ?>