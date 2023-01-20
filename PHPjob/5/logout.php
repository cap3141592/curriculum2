<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="station">
    <h2>ログアウト画面</h2>
    <div>ログアウトしました</div>
    <a class="button" href="login.php"><p>ログイン画面に戻る</p></a>
</div>
</body>
</html>
