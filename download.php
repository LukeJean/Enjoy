<?php
    require_once('connect.php');
    //搜索课件
    @$sql_doc="SELECT * FROM chapter WHERE title LIKE '%$_POST[doc]%'";
    $query_doc=mysqli_query($con,$sql_doc);
    if ($query_doc&&mysqli_num_rows($query_doc)){
        while ($row_doc=mysqli_fetch_assoc($query_doc)){
            $data_doc[]=$row_doc;
        }
    }else{
        $data_doc=array();
    }

    //课件显示
    $sql_every="select * from chapter where PPT != ' '";

    @$query_every = mysqli_query($GLOBALS[con],$sql_every);
    // @$sql_every="SELECT * FROM chapter where PPT != ''";
    // $query_every=mysqli_query($con,$sql_every);
    if ($query_every&&mysqli_num_rows($query_every)){
        while ($row_every=mysqli_fetch_assoc($query_every)){
            $data_every[]=$row_every;
        }
    }else{
        $data_every=array();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />
    <meta charset="utf-8" />
    <title>下载中心</title>
    <!-- bootstrap框架 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/doc.css">



    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/mainl.css" /><!-- 自己写的样式 -->

    <!-- 背景颜色 -->
    <link rel="stylesheet" type="text/css" href="css/reset.css">
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
            <a href="" style="color: black;">下载中心</a>
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
                            <label class="sr-only" for="exampleInputAmount">请输入学号</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="input-group">
                                    <div class="input-group-addon">
                                        
                                            <span class="glyphicon glyphicon-user"></span> User
                                        
                                    </div>
                                    <input type="text" class="form-control" id="id" name="id" placeholder="请输入学号">
                                            
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

<!-- 搜索课件 -->

<!-- <div style="float:right; margin-right:0px;margin-top:5px;">
    <form class="form-inline" action="searchDoc.php" method="post">
        <input type="text" placeholder="搜索课件" name="doc">
        <button>搜索</button>
    </form>
</div> -->



<div class="container" id="1" style="margin-top:56px;">
    <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-md-offset-1">
            <div class="row">
                <div id="containerl" class="col-md-12 col-sm-12 col-xs-12">
                    <table class="table">
                        <thead style="background-color: black;color:white;">
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">课程名称</th>
                                <th scope="col">章节名称</th>
                                <th scope="col">课件</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <?php

                            $page_sql="select * from chapter where PPT != ' ' ";

                            @$page_query = mysqli_query($GLOBALS[con],$page_sql);
        
                        ?>
                        <tbody style="background-color: white;">
                            <tr>
                            <?php
                                while($row = mysqli_fetch_assoc($page_query)){
        
                            ?>
                                <th scope="row"><?php echo $row['tid']; ?></th>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['c_title']; ?></td>
                                <td><?php echo $row['PPT']; ?></td>
                                <td>
                                    <a href="downloadFile.php?title=<?php echo $row['title']?>&PPT=<?php echo $row['PPT']?>">下载</a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>       
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-md-offset-1">
            <ul class="pager">
                <li class="previous disabled"><a href="#">&larr; Older</a></li>
                <li class="next disabled"><a href="#">Newer &rarr;</a></li>
            </ul>
        </div>
    </div>
</div>
 

</body>
</html>