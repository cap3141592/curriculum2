<?php

// step2
$luk_rank = ["凶","小吉","小吉","小吉","中吉","中吉","中吉","吉","吉","大吉"];
$enter_numbers = $_POST['enter_numbers'];


$str1 = strlen($enter_numbers) -1 ;

if($str1 <0) {
    // 入力がなかったとき
    $pick_name = 100;
    $luk_rank[100] = "(数字の羅列を入力してください)" ;
} else {
    $pick_num = mt_rand(0,$str1);
    $pick_name = substr($enter_numbers, $pick_num, 1);
}

?>

<!-- step3 -->
<p><?php echo date("Y/m/d", time()); ?>の運勢は</p>
<p>選ばれた数字は<?php echo $pick_name; ?></p>
<p><?php echo $luk_rank[$pick_name]; ?></p>


