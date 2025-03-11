<?php
$conn = mysqli_connect("localhost", "root", "", "web");

$id = $_POST['id'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$id'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if($result === false) {
    echo'에러';
} else {
    if($user) {
        $password_hash = hash('sha256', $password . $user['salt']);
        if($password_hash === $user['password_hash']) {
            echo('로그인 성공');
        } else {
            echo'<script>alert("아이디 또는 비밀번호가 일치하지 않습니다.");location = "login.php";</script>';
        }
    } else {
        echo'<script>alert("아이디 또는 비밀번호가 일치하지 않습니다.");location = "login.php";</script>';
    }
}

?>