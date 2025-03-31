<?php
$conn = mysqli_connect("localhost", "root", "", "gifts");
if(!$conn) {
    echo'접속오류';
}

$id = isset($_POST['idd']) ? $_POST['idd']:null;
$password = isset($_POST['pass']) ? $_POST['pass']:null;
$name = isset($_POST['nam']) ? $_POST['nam']:null;
$email = isset($_POST['ema']) ? $_POST['ema']:null;
if(empty($id) || empty($password) || empty($name) || empty($email)) {
    echo"<script>alert('회원정보를 입력해주세요');history.back();</script>";
} else {
    $sql1 = "SELECT * FROM user";
    $result1 = mysqli_query($conn, $sql1);
    if($result1 !== false) {
        if(mysqli_num_rows($result1) > 0) {
            while($row = mysqli_fetch_assoc($result1)) {
                $in_id = $row['user_id'];
                $in_em = $row['email'];
                if($in_id === $id) {
                    echo"<script>alert('아이디가 이미 존재합니다.');history.back();localStorage.setItem('key1', 'nonee');</script>";
                }
                if($in_em === $email) {
                    echo"<script>alert('이메일이 이미 존재합니다.');history.back();localStorage.setItem('key1', 'nonee');</script>";
                }
            }
        }
    }

    $salt = bin2hex(random_bytes(32));
    $hash_password = hash('sha256', $password . $salt);
    $sql = "INSERT INTO user (user_id, hash_password, salt, user_name, email) VALUES ('$id', '$hash_password', '$salt', '$name', '$email')";
    $result = mysqli_query($conn, $sql);
    if($result !== false) {
        echo"<script>alert('회원가입이 완료되었습니다!');location = 'web.php';</script>";
    }
}
?>