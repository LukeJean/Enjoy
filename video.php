<?php
   require_once('testconnect.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html;">

    <html lang="en" class="no-js">

    <title><?php echo $title; ?></title>

    
    <!-- bootstrap框架 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/doc.css">



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/mainl.css" /><!-- 自己写的样式 -->

    <!-- 背景颜色 -->
    <link rel="stylesheet" type="text/css" href="css/reset.css">

    <!-- 播放器 -->
    <!-- <link rel="stylesheet" href="./css/video.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://at.alicdn.com/t/font_884665_myedel9jrs.css"> -->

    <!-- 评论  不能删-->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>


    <style type="text/css">
        a{
            text-decoration:none;
        }
        .mt50{margin-top: 20px;}
       /* .pt50{padding: 20px;}*/
        .bringins-content a{color: white;}
    </style>
</head>
<body>
    <div class="navigation">
        <div class="logo" style="float:left;top:0px;position:relative;height: 60px;">
            <a href="index.php"><img src="img/logo.png" style="max-height: 100%;" /></a>
        </div>
        <div class="container" style="width:400px;height: 10px; margin-top: 10px;">
            <div class="search bar6" style="margin-top:9px;">
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
                $modal='m';
            } else{
                $word='登录';
                $modal='modal';
            
            }
        ?>
        <div class="link2" style=" font-size: 15px; margin-top:5px;">
            <a href="javascript:void(0)" style="color: black;" class="btn_login" id="btn_showlogin" data-toggle="<?php echo $modal; ?>" data-target="#mymodal"><?php echo $word; ?></a>
        </div>
        <div class="link" style=" font-size: 15px; margin-top:5px;">
            <a href="download.php" style="color: black;">下载中心</a>
        </div>
    <!-- 模态框 -->

        <div class="modal" id="mymodal" >
        <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 id="h4">我要登录</h4>
                </div>
                
                <div class="modal-body">
                    <form class="form-inline" action="login.php" method="post">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">请输入用户名</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-user"></span> User
                                        
                                    </div>
                                    <input type="text" class="form-control" id="id" name="id" placeholder="请输入用户名">
                                            
                                </div>

                        </div><br><br><br>

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">请输入密码</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-lock"></span> Pass
                                        
                                    </div>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">             
                                </div>
                        </div><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" style="width: 245.117px;" value="登录">
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container" id="1">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-md-offset-1">
                <div class="row">
                <div id="containerl" class="col-md-12 col-sm-12 col-xs-12">
                    <div class="tab-menu tworow">
                        <span id="thirdbg"></span>
                        <ul id="hourlist" style="margin-top: 10px;">
                            <li type="button" class="active" id="btn2" >课程目录</li>
                                <?php
                                    if (!empty($data_point)) {
                                        foreach ($data_point as $value_point) { 
                                ?>
                            <li type="button" title="" onclick='setCurrentTime(<?php echo $value_point['time']; ?>)'><?php echo $value_point['name']; ?></li>
                                <?php
                                        }
                                    }
                                ?>
                        </ul>                    
                   </div>
                </div>
                </div>
                <script>
                    document.getElementById("thirdbg").style.width="";
                        new Slideicon($("#list"),{
                        index:0,
                        cover:$("#bg"),
                        callback:function (data) {
                            console.log(data)
                        }
                    });
                    new Slideicon($("#hourlist"),{
                        index:0,
                        cover:$("#thirdbg"),
                        callback:function (data) {
                        console.log(data)
                        }
                    });
                </script>
                <script src="js/jquery.min.js"></script>
                <script src="js/slide.js"></script>

                <div>

                    <div class="col-md-9 col-sm-9 col-xs-9"style="margin-top:28px;">
                    <!-- 播放器 -->
                        <video width="100%" height="328.117px" controls id="player">
                            <source src="<?php echo $row_video['ip']; ?>"  type="video/mp4">
                        </video>
                    </div>
                    <div style="height: 328.117px;background:white;margin-top:28px;" class="col-md-3 col-sm-3 col-xs-3">
                    <!-- border:1px solid #B0C4DE -->
                        <div style="height: 10%; margin-top: 0px; border-bottom:1px solid #DCDCDC">
                            <center><p style="margin-top: 10px;">猜你喜欢</p></center>
                        </div>
                        <div style="overflow: auto; width: 100%;height: 85%;">
                            <div style="margin-top:10px;">
                            <?php
                                if (!empty($data_like)) {
                                    foreach ($data_like as $value_like) { 
                            ?>
                                        <div style="margin:0 0 10px 16px;position:relative;float:left;background: #fff;border-radius: 10px; width: 80%; border:1px solid #DCDCDC;" >

                                            <a href="video.php?course=<?php echo $value_like['title']; ?>&c_title=<?php echo $value_like['c_title']; ?>#1">

                                                <div style="width:100%;height:80px;background:#fcc;border-radius: 10px 10px 0 0;overflow: hidden;">
                                                    <img src="<?php echo $value_like['picture']; ?>" style="max-width: 100%;"/>
                                                </div>

                                                <div style="padding:10px;">
                                                    <div><p style="margin: 0;color: #333;float: left; margin-left: 10px;"><?php echo $value_like['title']; ?></p></div>
                                                </div>
                                            </a>
                                        </div>
                            <?php
                                    }
                                } 
                            ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--模态窗口中的内容-->
<!-- TODO:文字显示不正确 -->
        <div id="sampledata2" class="bringins-content" style="color: #D5D6E2;">
    <!-- test.php和test1.php合并 -->
            <h3><?php echo $title; ?></h3>
                <?php
                    if (empty($data_menu)){
                        echo "当前没有视频，请管理员在后台添加视频";
                    }else{
                        foreach ($data_menu as $value_menu) {
                            echo "<a href='video.php?course=",$title,"&c_title=",$value_menu['c_title'],"#1'>",$value_menu['c_title'],"</a><br><br>";
                        }                               
                    }
                ?>
        </div>
        <!-- 时间 -->
        <script>   
            var myVid=document.getElementById("player"); 
            myVid.addEventListener("timeupdate",timeupdate);     
            var _endTime; 
     
            //CuPlayer.com视频播放 
            function playMedia(startTime,endTime){ 
            //CuPlayer.com设置结束时间 
                _endTime = endTime; 
                var file = document.getElementById("file").files[0]; 
                if(!file){ 
                    alert("请指定视频路径"); 
                    return false; 
                } 
                var url = (window.URL) ? window.URL.createObjectURL(file) : window.webkitURL.createObjectURL(file); 
                myVid.src = url; 
                myVid.controls = true; 
                setTimeout("setCurrentTime('"+startTime+"')",200); 
            } 
     
            //CuPlayer.com设置视频开始播放事件 
            function setCurrentTime(startTime){ 
                myVid.currentTime=startTime; 
                myVid.play(); 
            } 
     
            function timeupdate(){ 
                //CuPlayer.com因为当前的格式是带毫秒的float类型的如：12.231233，所以把他转成String了便于后面分割取秒 
                var time = myVid.currentTime+""; 
                document.getElementById("showTime").value=time; 
                var ts = time.substring(0,time.indexOf(".")); 
                if(ts==_endTime){ 
                    myVid.pause(); 
                } 
            } 
     
        </script> 
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/bringins.js"></script>

        <script>
            $(document).ready(function() {
                $('#btn').click(function(){
                    $('#sampledata1').bringins({
                        "color":"black",//弹出窗的背景色
                        "width":"21.2%",
                        "closeButton":"white"//关闭按钮的颜色
                    });
                });
                $('#btn2').click(function(){
                    $('#sampledata2').bringins({
                        "position":"left",
                        "color":"black",//弹出窗的背景色
                        "width":"20%",//弹出窗的宽度
                        "closeButton":"white"//关闭按钮的颜色
                    });
                });
                $('#btn3').click(function(){
                    $('#sampledata3').bringins({
                        "position":"center",
                        "color":"black",
                        "closeButton":"white",
                        "width":"100%"
                    });
                });
            });
        </script>

        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-md-offset-1 " style="margin-top: 28px;">
                <div style="background-color:#FFF; height: 1000px;">
                    <div>
                        <font style="width:150px; float:left; font-family:Tahoma, Geneva, sans-serif; font-size: 24px;margin:14px auto">
                            &nbsp;&nbsp;答疑&解惑
                        </font>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-1 col-md-offset-1" style="margin-top:28px;" >
                        <form style="margin-left: 100px;" action="" method="post" role="form" >
                            <div class="form-group">
                                <textarea style="width: 120%; " class="form-control" rows="3" name="comment" id="content"></textarea><br>
                                <button type="submit" name="submit" class="btn btn-primary" style="float:right; margin-right:-85px;">提交</button>
                            </div>
                        </form>
                    </div>
                    
                    <?php
                        if (!(isset($_POST['comment'])&&(!empty($_POST['comment'])))) {
                
                        }
                        //TODO:评论的回车bug
                        @$comment=$_POST['comment'];
                        $insertsql="insert into comment(title,comment,c_title) values('$title','$comment','$c_title')";
                        if($comment!=''){
                            mysqli_query($con,$insertsql);
                    ?>
                        <script type="text/javascript">
                            alert('评论成功');
                        </script>
                    <?php
                        }
                    ?>

                    <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-md-offset-2">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active">
                                <a href="#all" data-toggle="tab">
                                    全部
                                </a>
                            </li>
                            <li><a href="#best" data-toggle="tab">精华</a></li>
                            <li><a href="#ok" data-toggle="tab">已解决</a></li>
                            <li><a href="#no" data-toggle="tab">未解决</a></li>
                        </ul>
                    </div>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="all">
                        <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-md-offset-2 " style="margin-top:28px; height: auto;">
                            <div>
                                <!-- 评论之后的内容写这里 -->

                                <?php
                                    require_once('tree.php');
                                    echo displayCate(0,$title,$c_title,1); 
                                ?>
                            </div>
                        </div> 
                    </div><!-- all -->
                    <div class="tab-pane fade" id="best">
                        <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-md-offset-2 " style="margin-top:28px; height: auto;">
                            <div>
                                <!-- 评论之后的内容写这里 -->

                                <?php
                                    require_once('tree.php');
                                    echo displayBest(0,$title,$c_title,1); 
                                ?>
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="ok">
                        <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-md-offset-2 " style="margin-top:28px; height: auto;">
                            <div>
                                <!-- 评论之后的内容写这里 -->

                                <?php
                                    require_once('tree.php');
                                    echo displayOk(0,$title,$c_title,1); 
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="no">
                        <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-md-offset-2 " style="margin-top:28px; height: auto;">
                            <div>
                                <!-- 评论之后的内容写这里 -->

                                <?php
                                    echo displayNo(0,$title,$c_title,1); 
                                ?>
                            </div>
                        </div>
                    </div>
                    </div>
                    

                </div>
                <br>
            </div>
        </div>
        <div class="modal" id="mymodal_2" data-id='<?php echo $value['id']; ?>'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4>回复</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" action="replay.php?title=<?php echo $title; ?>&c_title=<?php echo $c_title; ?>" method="post">
                            <div class="form-group">
                                <input type="hidden" name="idl" id="idl" value="">
                                <textarea class="form-control" rows="5" name="replay" id="replay"></textarea>
                                <br>
                                <center><input type="submit" name="" class="btn btn-primary"></center>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div><!--model-->


        <!-- <script type="text/javascript">
    
            function transmit(){
        
                var idl = document.getElementById("getid").value;    //获取所需传递的参数id
       
                $('#idl').val(idl);   
                // alert('hello');
            }

        </script> -->
    </div> 
</body>
</html>