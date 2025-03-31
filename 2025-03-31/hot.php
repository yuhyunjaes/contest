<?php
session_start();
$id;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    $id = null;
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="hot.css">
</head>
<body>
    <div id="wrap">
    <?php include 'second/login_user.php';?>
    <?php include 'second/new_user.php';?>
        <?php include 'second/header.php';?>
        <div class="contents">
            <div class="contents_textbox">
                <h1><span>GIFTS:Mall</span> 인기상품</h1>
                <p><span style="font-weight: 100;color: white;">GIFTS:Mall</span> 홈페이지에 오신것을 환영합니다.</p>
            </div>
        </div>
        <div class="all_container">
        </div>
        <?php include 'second/footer.php';?>
    </div>
</body>
</html>