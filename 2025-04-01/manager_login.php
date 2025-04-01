<?php
    session_start();
    $id = 'admin';
    $password = '1111';

    $manager_id = isset($_POST['manager_id']) ? $_POST['manager_id']:null;
    $manager_password = isset($_POST['manager_password']) ? $_POST['manager_password']:null;

    if($manager_id !== null && $manager_password !== null) {
        if($id === $manager_id && $manager_password === $password) {
            $_SESSION['manager_id'] = $manager_id;
            echo"
                <script>
                    location = 'manager.php';
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
    }
    

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/manager_login.css">
</head>
<body>
    <div id="wrap">
        <a href="web.php">◀ 나가기</a>
        <form action="manager_login.php" method="POST" id="forr">
            <div class="login_container">
                <div class="login_header">
                    <h1>관리자 로그인</h1>
                </div>
                <div class="login_body">
                    <div>
                        <div>
                            <input type="text" name="manager_id" id="manager_id">
                            <label for="manager_id">아이디</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="password" name="manager_password" id="manager_password">
                            <label for="manager_password">비밀번호</label>
                        </div>
                    </div>
                </div>
                <div class="login_footer">
                    <input type="submit" value="로그인">
                </div>
            </div>
        </form>
    </div>
    <script>
        document.getElementById('forr').addEventListener('submit',(event)=>{
            const manager_id = document.getElementById('manager_id'),
            manager_password = document.getElementById('manager_password');
            if(manager_id.value.length === 0) {
                alert('아이디를 입력해주세요');
                manager_id.focus();
                event.preventDefault();
            } else if(manager_password.value.length === 0) {
                alert('비밀번호를 입력해주세요');
                manager_password.focus();
                event.preventDefault();
            }
        })
    </script>
</body>
</html>