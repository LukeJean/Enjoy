<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />

    <title>享授——在线课程学习平台</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- 框架 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <html lang="en" class="no-js">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <!--公告样式-->
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />

    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/tabs.css" />
    <link rel="stylesheet" type="text/css" href="css/tabstyles.css" />
    <link rel="stylesheet" type="text/css" href="css/mainl.css" /><!-- 自己写的样式 -->

    <script src="js/modernizr.custom.js"></script>
    <script src="./css/tubiao/iconfont.js"></script>


    <style type="text/css">
        
    </style>
</head>
<body>
<div class="navigation">
    <div class="logo" style="float:left;top:-10px;position:relative;height: 60px;">
        <a href="index.php"><img src="img/logo.png" style="max-height: 100%;" /></a>
    </div>
    <div class="container" style="width:400px;height: 10px; margin-top: 20px;">
        <div class="search bar6">
            <form action="do.php" method="post">
                <input placeholder="" name="keyword" type="text">
                <button type="submit" value="搜索"></button>
            </form>
        </div>
    </div>

    <?php
        @session_start();
        if(isset($_SESSION['name'])){
            //如果登录了，显示用户名，改变模态框的链接
            $word=$_SESSION['name'];
            $modal='dropdown';
        } else{
            $word='登录';
            $modal='modal';
        }
    ?>

    <div class="link2" >
        <a href="javascript:void(0)" style="color: black;" class="btn_login" id="btn_showlogin" data-toggle="<?php echo $modal; ?>" data-target="#mymodal"><?php echo $word; ?></a>
    </div>

    <!-- <div class="dropdown link2">
	    <a type="button" class="dropdown-toggle" id="dropdownMenu1" 
			data-toggle="dropdown" style="color:black;">
		    <?php //echo $word; ?>
		    <span class="caret"></span>
	    </a>-->
        
	   

    <div class="link" >
        <a href="download.php" style="color: black;">下载中心</a>
    </div>

    <!-- 下线 -->
    <!-- 基本思路：鼠标移动到用户名那里，显示一个下线的气泡，点击之后下线 -->

    

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
                            <label class="sr-only" for="exampleInputAmount">请输入学号</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-user"></span> User
                                        
                                    </div>
                                    <input type="text" class="form-control" id="id" name="id" placeholder="请输入学号">
                                            
                                </div>

                        </div><br><br><br>

                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">请输入密码</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-lock"></span> Pass
                                        
                                    </div>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入密码">             
                                </div>
                        </div><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
<div class="container">
<div class="main" >
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="">
	
	<div class="top">
		<div class="leftl">
			<div class="group"><a class="text" href="CourseList.php?c=school">校内优秀课程</a></div>
			<hr>
			<div class="group"><a class="text" href="CourseList.php?c=china">国内精品课程</a></div>
			<hr>
			<div class="group"><a class="text" href="CourseList.php?c=world">国际名校课程</a></div>
		</div>
			<!-- <div class="youbian"> -->
			<!-- 轮播 -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel"  style="float: left; width: 75%; height: 333px;border-radius: 0 10px 0 0;">
			<!-- data-ride -->
			<!-- 轮播（Carousel）指标 -->
			<ol class="carousel-indicators" style="z-index: 1;">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>   
			<!-- 轮播（Carousel）项目 -->
			<div class="carousel-inner" style="float: left; width: 100%; height: 333px;border-radius: 0 10px 0 0;">
				<div class="item active">
					<a href="video.php?course=Vue&c_title=01.反馈#1"><img src="img/Vue.png" alt="First slide"></a>
				</div>
				<div class="item">
					<a href="video.php?course=bootstrap&c_title=01-课程概要#1"><img src="img/bootstrap.png" alt="Second slide"></a>
				</div>
				<div class="item">
					<a href="video.php?course=Laravel&c_title=1.1Laravel5.2框架基础 开发的博客项目介绍#1"><img src="img/laravel.png" alt="Third slide"></a>
				</div>
			</div>
			<!-- 轮播（Carousel）导航 -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="border-radius: 0 10px 0 0;">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div> 



        <!-- </div> -->
    </div>
    <div class="tabs tabs-style-iconbox" style="border-radius:0 0 10px 10px;font-size:2em;">
        <nav>
            <ul>
                <li>
                    <a href="CourseList.php?c=English">
                        <svg class="icon" aria-hidden="true" style="margin-bottom:3px">
                            <use xlink:href="#icon-cet"></use>
                        </svg><br>
                        <span>英语</span>
                    </a>
                </li>

                <li>
                    <a href="CourseList.php?c=computer">
                        <svg class="icon" aria-hidden="true" style="margin-bottom:3px">
                            <use xlink:href="#icon-jisuanji"></use>
                        </svg><br>
                        <span>计算机</span>
                    </a>
                </li>
                <li>
                    <a href="CourseList.php?c=innovate">
                        <svg class="icon" aria-hidden="true" style="margin-bottom:3px">
                            <use xlink:href="#icon-huiji"></use>
                        </svg><br>
                        <span>创新创业</span>
                    </a>
                </li>
                <li>
                    <a href="CourseList.php?c=accounting">
                        <svg class="icon" aria-hidden="true" style="margin-bottom:3px">
                            <use xlink:href="#icon-huiji1"></use>
                        </svg><br>
                        <span>注册会计师</span>
                    </a>
                </li>
                <li>
                    <a href="CourseList.php?c=law">
                        <svg class="icon" aria-hidden="true" style="margin-bottom:3px">
                            <use xlink:href="#icon-lvshi1"></use>
                        </svg><br>
                        <span>国家司法考试</span>
                    </a>
                </li>
                <li>
                    <a href="CourseList.php?c=master">
                        <svg class="icon" aria-hidden="true" style="margin-bottom:3px">
                            <use xlink:href="#icon-lvshi"></use>
                        </svg><br>
                        <span>考研</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="content-wrap">
          <section id="section-iconbox-1">
            <p>1</p>
          </section>
          <section id="section-iconbox-2">
            <p>2</p>
          </section>
          <section id="section-iconbox-3">
            <p>3</p>
          </section>
          <section id="section-iconbox-4">
            <p>4</p>
          </section>
          <section id="section-iconbox-5">
            <p>5</p>
          </section>
        </div>
        <!-- /content -->
    </div>
	
</div>
</div>
 </div>
 </div>   
</div>
</body>
</html>