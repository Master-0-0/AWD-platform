<?php
set_time_limit(0); //不限制脚本执行时间
//填写队伍
$team = array("1"=>"http://www.awdd.com/Rankin.php","2"=>"http://www.awdd.com/Ranking.php","3"=>"http://www.awdd.com/Ranking.php");
while(1){
    foreach ($team as $x=>$value){
        if(@file_get_contents($value)){
            echo "<p>".$x."存活</p>";
        }else{
            echo "<p>".$x."失败</p>";
            //扣分
            $sql = "update attack_user set score=score-3 where team='{$x}'";
            echo $sql;
//            file_put_contents("1.txt",$sql);
            mysqli_query($conn,$sql);
        }

    }
    sleep(5);
}



