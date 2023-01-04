<head>
  <link rel="stylesheet" href="css/style.css">
</head>


<?php 
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
    // 名前
    $name1 = $_POST['user_name'];

    // 回答
    $answer[0] = $_POST['answer1'];
    $answer[1] = $_POST['answer2'];
    $answer[2] = $_POST['answer3'];

    // '@'で圧縮した文字列を、配列にもどす。
    $correct_all = $_POST['correct_all'];
    $correct = explode("@",$correct_all);

    //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
    function scoreOut($k) {
        global $answer , $correct;
        $a = $answer[$k];
        $b = $correct[$k];
        $flag = strcmp($a,$b);
        if ($flag === 0) {
            echo "正解！";
        } elseif ($flag !== 0) {
            echo "残念・・・";
        }
    }
?>


<!-- 画面上に表示する処理 -->
<body>
    <div class="centerDisplay">
        <div class="textField">
            <p> <?php echo $name1; ?>さんの結果は・・・？</p>
            <p>①の答え</p>
            <!--作成した関数を呼び出して結果を表示-->
            <?php scoreOut(0); ?>

            <p>②の答え</p>
            <!--作成した関数を呼び出して結果を表示-->
            <?php scoreOut(1); ?>

            <p>③の答え</p>
            <!--作成した関数を呼び出して結果を表示-->
            <?php scoreOut(2); ?>
        </div>
    </div>
</body>
