<?php
include 'data/server.php';
//  防止全局变量造成安全隐患
$admin = false;
//  启动会话，这步必不可少
session_start();
//  判断是否登陆
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
//    $user = $_COOKIE['user'];
//    echo "欢迎用户: ".$user;
//    var_dump($_COOKIE['token']);
}else{
    die("
	<script>
	alert('抱歉你没有访问权限哦');
	window.location.href='login/login.php';
	</script>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AWD攻防成员后台</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="body1">
    <div id="Ranking">
        <p>AWD攻防赛排行榜</p>
        <iframe src="Ranking.php" scrolling="no" frameborder="0"></iframe>
    </div>
</div>
<div id="body2">
    <div id="list">
        <div id="name">
            <?php
            echo '<p>用户 '.test_input($_COOKIE['team']).'</p>';
            ?>
        </div>
        <div id="flag">
            <p><a href="flag.php">提交flag</a></p>
        </div>
        <div id="help">
            <p>规则说明:</p>
			<p>比赛开始有30分钟在该时间内可修复漏洞打补丁期间选手禁止攻击。</p>
            <p>每队基础分数为3000,每提交一次flag攻击队伍加100,防守队伍减100。</p>
            <p>各队flag生成时间为5分钟一次。</p>
            <p>如果有队伍靶机的web服务关停则会每10秒减3分直到靶机恢复。</p>
            <p>禁止攻击平台发现违规队伍分数清零</p>
            <p>各位选手们好好享受比赛吧！</p>
        </div>
    </div>
</div>
</body>
</html>
