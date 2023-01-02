<?php
// 練習問題１

// step1:フルーツと単価の連想配列を作成してください。
$fruits = ["りんご" => 150,"みかん" => 50,"もも" => 600];
$num = [2, 3, 5];
$i = 0;

// step2:単価を計算する関数を定義してください。
function value ($price, $buy) {

return $price * $buy;
}

// step3:繰り返しを使ってそれぞれのフルーツを書き出してください。
foreach ($fruits as $name => $tanka) {

echo $name . "は、".value($tanka, $num[$i]) ."円です。";
echo "<br>";
$i++;
}


// 自分の回答

// // step1:フルーツと単価の連想配列を作成してください。
// $cost = ["apple"=>150,"orange"=>50,"peach"=>600];
// $num = ["apple"=>2,"orange"=>3,"peach"=>5];

// // step2:単価を計算する関数を定義してください。

// // 仮定:単価と個数を引数として、果物ごとに合計の値段を返したい。
// function value($price,$buy) {
//     return $price * $buy;
// }

// // step3:繰り返しを使ってそれぞれのフルーツを書き出してください。
// $name = ["apple"=>"りんご","orange"=>"みかん","peach"=>"もも"];

// foreach ($name as $nE => $nJ) {
//     $vl = value($cost[$nE] , $num[$nE]);
//     echo "${nJ}は${vl}円です。";
//     echo '<br>';
// }

?>
