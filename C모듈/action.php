
<?php
    $conn = mysqli_connect("localhost", "root", "", "web");


    $id = $_POST['id'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $salt = bin2hex(random_bytes(32));
    $password_hash = hash('sha256', $password . $salt);

    $sql = "INSERT INTO users (username, email, password_hash, salt) VALUES ('$id', '$email', '$password_hash', '$salt')";


    $result = mysqli_query($conn, $sql);

    if($result === false) {
        echo'오류';
    } else {
        echo '<script>alert("회원가입이 완료되었습니다!"); location = "login.php";</script>';

    }
?>