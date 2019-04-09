<?php
   require_once('connect.php');
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

 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />
    <title>课程分类</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- 框架 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="css/bootstrap.min.css"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <html lang="en" class="no-js">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--公告样式-->
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/mainl.css" />

    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
    <script src="js/modernizr.custom.js"></script>
    
    
    <style>
        .subject{
            display: none;
        }
        .subject_first {
            display: block;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#college").change(function(){
                var index = $(this).get(0).selectedIndex;
                $('.subject').hide().eq(index).show();
            });
        });
    </script>
    
    <style type="text/css">
        #main{
            min-height:768px;
        }
    </style>
</head>
<body style="">
<div class="navigation">
    <div class="logo" style="float:left;top:-10px;position:relative;height: 60px;">
        <a href="index.php"><img src="img/logo.png" style="max-height: 100%;" /></a>
    </div>
    <div class="container" style="width:400px;height: 10px; margin-top: 20px;">
        <div class="search bar6">
            <form action="do.php" method="post">
                <input placeholder="" name="keyword" type="text">
                <button type="submit"></button>
            </form>
        </div>
    </div>

    <?php
        @session_start();
        if(isset($_SESSION['name'])){
            //如果登录了，显示用户名，改变模态框的链接
            $word=$_SESSION['name'];
            $modal='dropdown';
            $display = 'yes';
            $data_target = '1';
        } else{
            $word='登录';
            $modal='modal';
            $display = 'none';
            $data_target = '#mymodal';
        }
    ?>
    
    <div class="dropdown link2">
        <a type="button" class="dropdown-toggle btn_login" id="btn_showlogin" style="color:black;" href="javascript:void(0)" data-toggle="<?php echo $modal; ?>" data-target="<?php echo $data_target;?>">
            <?php echo $word; ?>
            <span class="caret"  style="display: <?php echo $display; ?>;"></span>
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" style="display:<?php echo $display; ?>;">
            <li><a href="logout.php" style="color: black;">注销登录</a></li>
        </ul>
    </div>
    <div class="link" >
            <a href="download.php" style="color: black;">下载中心</a>
    </div>
    <!-- 模态框 -->

    <div class="modal" id="mymodal" >
        <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4>我要登录</h4>
                </div>
                
                <div class="modal-body">
                    <form class="form-inline" action="login.php" method="post">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">请输入学号</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-user"></span> User
                                        
                                    </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="请输入学号">
                                            
                                </div>

                        </div><br><br><br>

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">请输入密码</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-lock"></span> Pass
                                        
                                    </div>
                                        <input type="password" class="form-control" id="exampleInputAmount" placeholder="请输入密码">             
                                </div>
                        </div><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-lg btn-block" style="width: 245.117px;">登录</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="main" class="container">

    
    <div class="video1">
        <?php
            if (!empty($data_list)) {
                foreach ($data_list as $value_list) { 
        ?>
        <div style="margin:0 0 20px 36px;position:relative;float:left;background: #fff;border-radius: 10px;">

            <a href="video.php?course=<?php echo $value_list['title']; ?>&c_title=<?php echo $value_list['c_title']; ?>#1">

                <div style="width:240px;height:135px;background:white;border-radius: 10px 10px 0 0;overflow: hidden;">
                    <img src="<?php echo $value_list['picture']; ?>"  style="max-width: 100%;"/>
                </div>

                <div style="padding:10px;">
                    <div><h4 style="margin: 0;color: #333;"><?php echo $value_list['title']; ?></h4></div>
                    <div style="width: 60px;float: left;margin-right: 90px;"><a href="#"><h5 style="color: #666;"><?php echo $value_list['teacher']; ?></h5><a></div>
                    <div><h5 style="color:#666;float: left;">&nbsp;</h5></div>
                </div>
            </a>
        </div>
        <?php
                }
            }
            else{
                echo "<center><h4>正在维护中，等待管理员添加视频</h4></center>";
            }
        ?>

    </div>

<br><br><br>
    
</div>
</body>

</html>