<?php
session_start();
require_once('function.php');
check_user_logged_in();
$id = $_GET['id'];
if (empty($id)) {
    header("Location: main.php");
    exit;
}

include_once("db_connect.php");
$pdo = db_connect();
try {
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error ' . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="station">
        <h2>削除</h2>
        <p>ID: <?php echo $id; ?>を削除しました。</p>
        <a class="button" href="main.php"><p>ホームへ戻る</p></a>
    </div>
</body>
</html>
