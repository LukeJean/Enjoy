<?php
    require_once('connect/video.php'); 
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>课程分类</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- 框架 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery/jquery-3.3.1.min.js"></script>
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
            $word=$_SESSION['name'];
        } else{
            $word='登录';
        }
    ?>
    
    <div class="link2">
        <a href="javascript:void(0)" style="color: black;" class="btn_login" id="btn_showlogin" data-toggle="modal" data-target="#mymodal"><?php echo $word; ?></a>
    </div>
    <div class="link" >
            <a href="" style="color: black;">下载中心</a>
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
                            <label class="sr-only" for="exampleInputAmount">请输入用户名</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-user"></span> User
                                        
                                    </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="请输入用户名">
                                            
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
            if (!empty($data1)) {
                foreach ($data1 as $value1) { 
        ?>
        <div style="margin:0 0 20px 36px;position:relative;float:left;background: #fff;border-radius: 10px;">

            <a href="video.php?course=<?php echo $value1['title']; ?>&c_title=<?php echo $value1['c_title']; ?>#1">

                <div style="width:240px;height:135px;background:#fcc;border-radius: 10px 10px 0 0;overflow: hidden;">
                    <img src="<?php echo $value1['picture']; ?>"  style="max-width: 100%;"/>
                </div>

                <div style="padding:10px;">
                    <div><h4 style="margin: 0;color: #333;"><?php echo $value1['title']; ?></h4></div>
                    <div style="width: 60px;float: left;margin-right: 90px;"><a href="#"><h5 style="color: #666;"><?php echo $value1['teacher']; ?></h5><a></div>
                    <div><h5 style="color:#666;float: left;">1234</h5></div>
                </div>
            </a>
        </div>
        <?php
                }
            } 
        ?>

    </div>

<br><br><br>
    
</div>
</body>

</html>