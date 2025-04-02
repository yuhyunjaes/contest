<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "gifts");

if(!$conn) {
    echo'연결오류';
}

$id = isset($_POST['logid']) ? $_POST['logid']:null;
$password = isset($_POST['logpass']) ? $_POST['logpass']:null;

if(empty($id) || empty($password)) {
    echo"
        <script>
            alert('아이디 또는 비밀번호를 확인해주세요');
            history.back();
        </script>
    ";
} else {
    $sel_sql = "SELECT * FROM user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sel_sql);
    $row = mysqli_fetch_assoc($result);
    if($result !== false) {
        if(mysqli_num_rows($result) > 0) {
            $password_hash = hash('sha256', $password . $row['salt']);
            if($password_hash === $row['hash_password']) {
                $_SESSION['user_id'] = $row['user_id'];
                echo"
                    <script>
                        location = 'web.php';
                    </script>

                    ";
            } else {
                echo"
        <script>
            alert('아이디 또는 비밀번호를 확인해주세요');
            history.back();
        </script>
    ";
            }
        } else {
            echo"
        <script>
            alert('아이디 또는 비밀번호를 확인해주세요');
            history.back();
        </script>
    ";
        }
    }

}

?>