<?php

	header("Content-type:text/plain;charset=utf-8");

	require_once('connect.php');

	$username = $_POST['id'];

	$pass = $_POST['password'];

	function login($username,$password){

		if ($username == null||$password == null) {

			echo "请将表单填写完整";

			return;

		}

		$sql="select * from users WHERE student_id like '$username' AND password = '$password' ";

    	@$query=mysqli_query($GLOBALS[con],$sql);

    	if($query&&mysqli_num_rows($query)){

        	 while($row = mysqli_fetch_assoc($query)){

            	// $result[] = $row;

            	session_start();

				$_SESSION['name']=$row['name'];

            	$result = "登录成功";

        	}
    	
    	}else{

    		$result = "登录失败";

    	}

    	echo "<script>alert('".$result."');window.location.href='index.php';</script>";

	}

	login($username,$pass);
