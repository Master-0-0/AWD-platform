<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>input flag</title>
    <link rel="stylesheet" href="css/flag.css">
</head>
<body>
<div id="flag">
    <form action="" method="POST">
        <div id="attack">
            <select name="team">
                <option value="">队伍</option>
<?php
include 'data/server.php';
$sql6 = "select * from attack_user";
//查询队伍
$result = mysqli_query($conn,$sql6);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
//            var_dump($row);
        echo '<option>'.$row["team"].'</option>';
    }
}
?>
            </select>
        </div>
        <div id="input">
            <input type="text" name="flag" value="" placeholder="请输入获取到的flag">
        </div>
        <div id="submit">
            <input type="submit" value="提交">
        </div>
    </form>
</div>
<div id="help">
    <p id="p"></p>
</div>
</body>
<script>

    window.onload = function () {
        setInterval(function () {
            var date = new Date();
            var currentTime = date.getTime();
            var nextDate = new Date('2022/9/3 18:0:0');
            nextTime = nextDate.getTime();

            var allTime = nextTime - currentTime;

            // 7. 把毫秒转成秒
            var allSecond = parseInt(allTime / 1000);

            // 8.转化
            var d = size(parseInt(allSecond / 3600 / 24));
            var h = size(parseInt(allSecond / 3600 % 24));
            var m = size(parseInt(allSecond / 60 % 60));
            var s = size(parseInt(allSecond % 60));

            var span = document.getElementById('p');
            span.innerText ='比赛结束倒计时: '+ d + '天' + h + '小时' + m + '分钟' + s + '秒';
        }, 1000)
    }
    function size(num) {
        return num >= 10 ? num : '0' + num;
    }

</script>
<!--倒计时js from https://github.com/Combo819/Birthday-countdown-->
</html>
<?php
//  防止全局变量造成安全隐患
$admin = false;
//  启动会话，这步必不可少
session_start();
//  判断是否登陆
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
    $token = verify_str(test_input($_COOKIE['token']));

    $flag = verify_str(test_input($_POST['flag']));
    $team = verify_str(test_input($_POST['team']));
    if($flag && $team){
        //检查队伍，不可以提交自己的flag
        $chek = "select * from attack_user where team='{$team}' and token='{$token}'";
        $results = mysqli_query($conn,$chek);
        if(mysqli_num_rows($results) > 0) {
            while($row0 = mysqli_fetch_assoc($results)) {
//                var_dump($row0);
                if ($row0){
                    die("<script>alert('警告!! 不可以提交自己的flag')</script>");
                }
            }
        }

        //检查flag是否合法
        $sql = "select team,flag from flag where team='{$team}' and flag='{$flag}' limit 0,1;";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
//                var_dump($row);
                //检查目标的分数是否到0
                $sql2 = "select score from attack_user where team='{$team}'";
                $results = mysqli_query($conn,$sql2);
                if(mysqli_num_rows($results) > 0) {
                    while($row2 = mysqli_fetch_assoc($results)) {
                        //var_dump($row2);
                        //检查目标分数是否为0
                        if($row2["score"]==0){
                            die("<script>alert('目标已经没分可扣了，你们太强了')</script>");
                        }

                        //扣分
                        $sql3 = "update attack_user set score=score-100 where team='{$team}'";
                        if(mysqli_query($conn,$sql3)){
                            echo "<script>alert('表哥tql，分数+100')</script>";
                        }
                        //加分*
                        $sql4="update attack_user set score=score+100 where token='{$token}'";
                        mysqli_query($conn,$sql4);

                        //删除flag
                        $sql5="update flag set flag='null' where flag='{$flag}'";
                        mysqli_query($conn,$sql5);

                        //记录提交的flag
                        $sql6 ="insert into log_flag values(null,'{$flag}','{$team}','{$_COOKIE['team']}')";
                        mysqli_query($conn,$sql6);

                    }
                }
            }
        }else{
            echo "<script>alert('flag不对')</script>";}
    }else{
        echo "<script>alert('请选择被攻击队伍和输入flag')</script>";
    }
}else{
    die("
	<script>
	alert('抱歉你没有访问权限哦');
	window.location.href='login/login.php';
	</script>");
}
?>
