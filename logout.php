<?php
    // 基本思路：先判断是否有session，有的话删除
    header("Content-type: text/html; charset=utf-8;");//以utf-8显示，与session无关  
    session_start();
    if(isset($_SESSION['name'])){
        unset($_SESSION['name']);
        echo "<script>
				alert('注销成功');
				window.location.href='index.php';
			</script>";
    }else {
       echo "<script>
				alert('注销失败');
				window.location.href='index.php';
			</script>";
    }