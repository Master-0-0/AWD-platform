<?php
include '../data/server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LCC316安全实验室-AWD攻防练习平台</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="login-box">
    <h1>Login</h1>
    <form action="login.php" method="POST">
        <div class="textbox">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <input type="text" placeholder="username" name="name">
        </div>
        <div class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="password" name="pass">
        </div>
        <input class="btn" type="submit" na value="sign in">
    </form>
    <p style="text-align: center">AWD攻防练习平台 @Master</p>
</div>
</body>
</html>
<?php
//  启动 Session
session_start();
//  声明一个名为 admin 的变量，并赋空值。
$_SESSION["admin"] = null;
$name = verify_str(test_input($_POST['name']));
$pass = verify_str(test_input($_POST['pass']));
if($name && $pass){
    $sql = "select * from attack_user where user='{$name}' and  pass='{$pass}' limit 0,1";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            //var_dump($row);
            session_start();
            //  注册登陆成功的 admin 变量，并赋值 true
            $_SESSION["admin"] = true;
            setcookie('token', $row["token"],null,'/');
            setcookie('team', $row["team"],null,'/');
            //cookie跨路径
            Header("HTTP/1.1 303 See Other");
            Header("Location: ../index.php");
            exit();

        }

    }
}


?>