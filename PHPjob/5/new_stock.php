<?php
session_start();
require_once('function.php');
check_user_logged_in();

include_once("db_connect.php");

if (isset($_POST["submitFlag"])) {
    if (!empty($_POST["title"]) && !empty($_POST["date"])) {

        if (!empty($_POST["stock"]) && $_POST["stock"] >= 1) {
            $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
            $date = htmlspecialchars($_POST['date'], ENT_QUOTES);
            // エスケープ処理がENT_QUOTES
            $stock = htmlspecialchars($_POST['stock'], ENT_QUOTES);
                // 数値しか入力できないので、不要かもしれない

            $pdo = db_connect();
            try {
                $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :dateB, :stock)"; 
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':dateB', $date);
                $stmt->bindParam(':stock', $stock);
                $stmt->execute();
            } catch (PDOException $e) {
                echo 'Error' . $e->getMessage();
                die();
            }
        }
    }
    if (empty($_POST["title"])) {
        echo "タイトルを入力してください" . '<br>';
    } 
    if (empty($_POST["date"])) {
        echo "発売日を入力してください" . '<br>';
    }
    if (empty($_POST["stock"]) || $_POST["stock"] <= 0) {
        echo "在庫数は1以上を入力してください" . '<br>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫登録画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="station">
    <h2>本 登録画面</h2>
    <a class="button" href="main.php"><p>登録を中断する</p></a>
    <form method="POST" action="">
        <input type="text" name="title" placeholder="タイトル"><br>
        <input type="text" name="date" placeholder="発売日"><br>
        <p>在庫数</p>
        <input type="number" name="stock" min="0" placeholder="選択してください"><br>
            <!-- type="number"
            上下に矢印のついた数値入力。直接入力でなければmin,maxで下限上限を指定できる。 -->
        <input class="submit button" type="submit" value="登録" name="submitFlag">
    </form>
    </div>
</body>
</html>
