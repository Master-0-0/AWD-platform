<?php
include 'data/server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AWD攻防赛排行</title>
    <link rel="stylesheet" href="css/Ranking.css">
</head>
<body>
<div id="list">
    <div class="name">
        <p>名次</p>
    </div>
    <div class="name">
        <p>团队名称</p>
    </div>
    <div class="name">
        <p>分数</p>
    </div>
</div>
<?php
$i=1;
$sql6 = "select * from attack_user order by score desc";
$result = mysqli_query($conn,$sql6);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
//            var_dump($row);
            echo '<div id="mingc">';
            echo '<div class="test"><p>'.$i.'</p></div>
                  <div class="test"><p>'.$row["team"].'</p></div>
                  <div class="test"><p>'.$row["score"].'</p></div>';
            $i=$i+1;

        }
    }
?>
