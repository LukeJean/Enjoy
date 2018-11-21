<?php

require_once('connect.php');

function writeComment($id){

    @$id=$_POST['recipient-name'];

    @$title=$_GET['title'];

    @$c_title=$_GET['c_title'];

    @$replay=$_POST['message-text'];

    @$tag=$_POST['tag'];

    echo $tag;

    @$insertsql="insert into comment(tag,title,comment,c_title,re_id) values('$tag','$title','$replay','$c_title','$id')";

    if($replay!=''){
        
        @mysqli_query($GLOBALS[con],$insertsql);
        
        return 1;

    }else{

        return 0;

    }

}

//30是父级id
if(writeComment(30)){

    echo "<script type='text/javascript'>

            alert('回复成功');

            self.location=document.referrer; 

        </script>";

}else{

    echo "<script type='text/javascript'>

            alert('回复失败');

            window.history.back(-1); 

        </script>";

}

 ?>
