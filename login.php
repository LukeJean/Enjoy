<?php
	require_once('connect.php');

	$username = $_POST['id'];

	$pass = $_POST['password'];

	function login($username,$password){

		//思路：先从数据库里边取用户名密码，然后正则匹配，如果正确，返回1，不正确返回0

		$sql="select * from users WHERE name like '$username' ";

    	@$query=mysqli_query($GLOBALS[con],$sql);

    	if($query&&mysqli_num_rows($query)){

        	 while($row = mysqli_fetch_assoc($query)){

            	$result[] = $row;

        	}
    	
    	}

    	return $result;

	}

	function isLogin($username,$password){

		$message = login($username,$password);

		foreach($message as $val){

			// echo $val['name'];

			// echo $val['password'];

			if($password===$val['password']){

				// echo "yes";

				session_start();

				$_SESSION['name']=$username;

				echo "<script>
						alert('登录成功');
						window.location.href='index.php';
					  </script>";

			}else{

				echo "<script>alert('密码错误');window.location.href='index.php';</script>";

			}

		}

	}

	// var_dump (isLogin($username,$pass));

	isLogin($username,$pass);

 ?>