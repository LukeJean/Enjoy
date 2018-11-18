<?php
function Model()
{
	$id=$_GET['id'];
	$title=$_GET['title'];
	$c_title=$_GET['c_title'];
	echo "
	<div class='modal' id='mymodal_2'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button class='close' data-dismiss='modal'>&times;</button>
                        <h4>回复</h4>
                    </div>

                    <div class='modal-body'>
                        <form role='form' action='replay.php?title=".$title."&c_title=".$c_title."' method='post'>
                            <div class='form-group'>
                                <input type='text' name='id' id='id' value='".$id."'>
                                <p id='messag'>id在这里</p>
                                <textarea class='form-control' rows='5' name='replay' id='replay'></textarea>
                                <br>
                                <center><input type='submit' name='' class='btn btn-primary'></center>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div><!--model-->
        ";
}
Model();
 ?>