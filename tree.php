<?php

require_once('connect.php');

$list = 'bd-callout bd-callout-info';

$best = '';

function getList($title,$c_title,$re_id=0,&$result=array(),$spac=0){

    // TODO:把div设置成缩进方式

    $spac = $spac + 5;

    $sql="select * from comment WHERE re_id='$re_id' and title like '$title' and c_title like '$c_title' ";

    @$query=mysqli_query($GLOBALS[con],$sql);

    if($query&&mysqli_num_rows($query)){

        while($row = mysqli_fetch_assoc($query)){

            $row['comment'] = str_repeat('&nbsp;&nbsp;',$spac).$row['comment'];

            $result[] = $row;

            getList($title,$c_title,$row['id'],$result,$spac);

        }

    }

    return $result;

}

function getBest($title,$c_title,$re_id=0,&$result=array(),$spac=0){

    $spac = $spac + 5;

    $sql="select * from comment WHERE re_id='$re_id' and title like '$title' and c_title like '$c_title' and tag = 2";

    @$query=mysqli_query($GLOBALS[con],$sql);

    if($query&&mysqli_num_rows($query)){

        while($row = mysqli_fetch_assoc($query)){

            $row['comment'] = str_repeat('&nbsp;&nbsp;',$spac).$row['comment'];

            $result[] = $row;

            getBest($title,$c_title,$row['id'],$result,$spac);

        }

    }

    return $result;

}

function getOk($title,$c_title,$re_id=0,&$result=array(),$spac=0){

    $spac = $spac + 5;

    $sql="select * from comment WHERE re_id='$re_id' and title like '$title' and c_title like '$c_title' and tag = 3";

    @$query=mysqli_query($GLOBALS[con],$sql);

    if($query&&mysqli_num_rows($query)){

        while($row = mysqli_fetch_assoc($query)){

            $row['comment'] = str_repeat('&nbsp;&nbsp;',$spac).$row['comment'];

            $result[] = $row;

            getOk($title,$c_title,$row['id'],$result,$spac);

        }

    }

    return $result;

}

function getNo($title,$c_title,$re_id=0,&$result=array(),$spac=0){

    $spac = $spac + 5;

    $sql="select * from comment WHERE re_id='$re_id' and title like '$title' and c_title like '$c_title' and tag = -1";

    @$query=mysqli_query($GLOBALS[con],$sql);

    if($query&&mysqli_num_rows($query)){

        while($row = mysqli_fetch_assoc($query)){

            $row['comment'] = str_repeat('&nbsp;&nbsp;',$spac).$row['comment'];

            $result[] = $row;

            getNo($title,$c_title,$row['id'],$result,$spac);

        }

    }

    return $result;

}

function displayCate($re_id=0,$title,$c_title,$selected=1){

    $rs = getList($title,$c_title,$re_id);

    $str='';

    $str.= "<div style='width=100px;height=50'>";

    foreach($rs as $key => $val){

        $selectedstr = '';

        if($val['id'] == $selected){

        $sellectedstr ="selected";

        }

        if($val['tag']==2){
            //精华
            $color='bd-callout-info';
        }elseif ($val['tag']==3) {
            //已解决
            $color='bd-callout-success';
        }elseif ($val['tag']==-1) {
            //未解决
            $color='bd-callout-danger';
        }else{
            $color='bd-callout-info';
        }

        $str.= "<div class='bd-callout ".$color."'>".$val['comment']."
        <input type='hidden' name='getid' id='getid' value=".$val['id']." /><a data-toggle='modal' data-target='#mymodal_2' onclick='transmit()'>回复</a></div>";

    }

    return $str .= '</div>';

}


function displayBest($re_id=0,$title,$c_title,$selected=1){

    $rs = getBest($title,$c_title,$re_id);

    $str='';

    $str.= "<div style='width=100px;height=50'>";

    foreach($rs as $key => $val){

        $selectedstr = '';

        if($val['id'] == $selected){

        $sellectedstr ="selected";

        }

        $str.= "<div class='bd-callout bd-callout-info'>".$val['comment']."
        <input type='hidden' name='getid' id='getid' value=".$val['id']." />
        <a data-toggle='modal' data-target='#mymodal_2' onclick='transmit()'>回复</a></div>";

    }

    return $str .= '</div>';

}

function displayOk($re_id=0,$title,$c_title,$selected=1){

    $rs = getOk($title,$c_title,$re_id);

    $str='';

    $str.= "<div style='width=100px;height=50'>";

    foreach($rs as $key => $val){

        $selectedstr = '';

        if($val['id'] == $selected){

        $sellectedstr ="selected";

        }

        $str.= "<div class='bd-callout bd-callout-success'>".$val['comment']."
        <input type='hidden' name='getid' id='getid' value=".$val['id']." />
        <a data-toggle='modal' data-target='#mymodal_2' onclick='transmit()'>回复</a></div>";

    }

    return $str .= '</div>';

}

function displayNo($re_id=0,$title,$c_title,$selected=1){

    $rs = getNo($title,$c_title,$re_id);

    $str='';

    $str.= "<div style='width=100px;height=50'>";

    foreach($rs as $key => $val){

        $selectedstr = '';

        if($val['id'] == $selected){

        $sellectedstr ="selected";

        }

        $str.= "<div class='bd-callout bd-callout-danger'>".$val['comment']."
        <input type='hidden' name='getid' id='getid' value=".$val['id']." />
        <a data-toggle='modal' data-target='#mymodal_2' onclick='transmit()'>回复</a></div>";

    }

    return $str .= '</div>';

}



// echo displayCate(0,1);

?>

<!-- TODO:每次的id都是26 -->

<script type='text/javascript'>
    
    function transmit(){
        
        var idl = document.getElementById("getid").value;    //获取所需传递的参数id
       
        $('#idl').val(idl);   
                // alert('hello');

        delete idl;
    }

</script>

