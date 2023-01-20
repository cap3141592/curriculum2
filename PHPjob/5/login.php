<?php
require_once('db_connect.php');
session_start();

if (isset($_POST["submitFlag"])) {
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        // エスケープ処理がENT_QUOTES

        $pdo = db_connect();
        try {
            $sql = "SELECT * FROM users WHERE name = :name"; 
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
            die();
        }

        // 名前からデータベースと一致するか探す
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // ここでエスケープしたパスワードと、DB内のハッシュ化済みのパスワードを比較
            if (password_verify($password, $row['password'])) {
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                header("Location: main.php");
                exit;
            } else {
                echo "パスワードが間違っています。" . '<br>';
            }
        } else {
            echo "ユーザー名か、パスワードが間違っています" . '<br>';
        }
    }
    if (empty($_POST["name"])) {
        echo "ユーザー名を入力してください" . '<br>';
    } 
    if (empty($_POST["password"])) {
        echo "パスワードを入力してください" . '<br>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="station">
    <div class="between">
        <div> <h2>ログイン画面</h2> </div>
        <div>
            <a class="button" id="signUp" href="signUP.php"> <p>新規ユーザー登録</p> </a>
        </div>
    </div>
    <form class="formBox" method="POST" action="">
        <input type="text" name="name" placeholder="ユーザー名"><br>
        <input type="password" name="password" placeholder="パスワード"><br>
        <input class="submit button" type="submit" value="ログイン" name="submitFlag">
    </form>
    </div>
</body>
</html>
