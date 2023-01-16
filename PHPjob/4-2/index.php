<?php
require_once('getData.php');

$getData = new getData();

$user = $getData->getUserData();
$post = $getData->getPostData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <div class="left">
            <img src="img/logo_yandi.png" id="logo">
        </div>
        <div class="right">
            <div class="box"><p><?php echo $user['last_name'] . $user['first_name']; ?></p></div>
            <div class="box"><p>最終ログイン日：<?php echo $user['last_login']; ?></p></div>
        </div>
    </div>
    <table>
        <tr>
            <th>記事ID</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>投稿日</th>
        </tr>
        <?php foreach ($post as $value) { ?>
        <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php 
            if ($value['category_no'] === 1) {
                echo "食事";
            } elseif ($value['category_no'] === 2) {
                echo "旅行";
            } else {
                echo "その他";
            }
            ?></td>
            <td><?php echo $value['comment']; ?></td>
            <td><?php echo $value['created']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <p id="copyright">Y&I group,inc</p>
</body>
</html>
