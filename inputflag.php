<?php
include 'data/server.php';
$team=verify_str(test_input($_POST['attack']));
$flag=verify_str(test_input($_POST['flag']));
$sql = "insert into flag values (null,'{$team}','{$flag}')";
//echo $sql;

if($team && $flag){
    if(mysqli_query($conn,$sql)===true){
        echo "yes";
    }
}
?>