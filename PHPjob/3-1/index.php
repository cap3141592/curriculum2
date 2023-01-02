<?php

$num = 1; 
while($num <= 100) {
    if($num % 3 == 0 && $num % 5 == 0) {
        echo 'FizzBuzz!!';
    } elseif($num % 3 == 0 && $num % 5 != 0) {
        echo 'Fizz!';
    } elseif($num % 3 != 0 && $num % 5 == 0) {
        echo 'Buzz!';
    } elseif($num % 3 != 0 && $num % 5 != 0) { // else {
        echo $num;
    }
    echo '<br>';
    $num++;
}

?>