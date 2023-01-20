<?php
session_start();
require_once('function.php');
check_user_logged_in();

include_once("db_connect.php");
$pdo = db_connect();

try {
    $sql = "SELECT * FROM books ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error' . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メインページ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="station" id="book_table">
    <h1>在庫一覧画面</h1>
    <div class="main">
        <div class="left button submit">
            <a href="new_stock.php?id"><p>新規登録</p></a>
        </div>
        <div class="right button">
            <a href="logout.php"><p>ログアウト</p></a>
        </div>
    </div>
    <table>
        <tr>
            <td>タイトル</td>
            <td>発売日</td>
            <td>在庫数</td>
            <td></td>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo date('Y/m/d', strtotime($row['date']) ) ?></td>
            <td><?php echo $row['stock'] ?></td>
            <td id="deleteColumn">
                <div class="delete button">
                    <a href="delete.php?id=<?php echo $row['id'] ?>"> <p>削除</p> </a>
                </div>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>
