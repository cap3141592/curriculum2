<?php
require_once("db_connect.php");

if (isset($_POST["submitFlag"])) {
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        // エスケープ処理がENT_QUOTES

        // ハッシュ化がPASSWORD_DEFAULT
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $pdo = db_connect();

        try {
            $sql = "INSERT INTO users (name, password) VALUES (:name, :password)"; 
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $passwordHash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
            die();
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
    <title>ユーザー新規登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="station">
    <h2>ユーザー登録画面</h2>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="ユーザー名"><br>
        <input type="password" name="password" placeholder="パスワード"><br>
        <input class="submit button" type="submit" value="新規登録" name="submitFlag">
    </form>
    <a class="button" href="login.php"><p>ログイン画面へ</p></a>
    </div>
</body>
</html>





