<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="web.css">
</head>
<body>
    <?php 
        $conn = mysqli_connect("localhost", "root", "", "web");

        $id = $_GET['id'];

        $sql = "SELECT username FROM users WHERE username = '$id'";

        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);
    
    ?>
    <div id="wrap">
        <form action="action.php" method="POST" id="forr">
            <div>
                <h1>회원가입</h1>
            </div>
            <div>
                <p>아이디
                    <?php if(!empty($id)){ if(mysqli_num_rows($result) > 0){echo'<span id="sp">이미 존재하는 아이디입니다.</span>';}else{echo'<span id="sp" style="color: blue;">사용 가능한 아이디입니다.</span>';}} else {echo'<span id="sp" style="opacity: 0;">값 없음</span>';}?>
                </p>
                <input type="text" name="id" id="id" placeholder=" 아이디 입력" value="<?php if(mysqli_num_rows($result) > 0){echo'';} else {echo$id;}?>" <?php if(!empty($id)){ if(mysqli_num_rows($result) > 0){echo'';}else{echo'readonly';}}?>>
                <a href="" id="aa" onclick="sele()">ID 중복확인</a>
            </div>
            <div>
            <p>비밀번호
                    <span></span>
                </p>
                <input type="password" name="password" id="password" placeholder=" 비밀번호 입력">
            </div>
            <div>
            <p>비밀번호 확인
                    <span id="re"></span>
                </p>
                <input type="password" name="repassword" id="repassword" placeholder=" 비밀번호 재입력">
            </div>
            <div>
            <p>이메일
                    <span></span>
                </p>
                <input type="email" name="email" id="email" placeholder=" 이메일 주소">
            </div>
            <div>
                <input type="submit" value="가입하기">
                <input onclick="home()" type="button" value="다시쓰기">
            </div>
        </form>
    </div>
    <script src="web.js"></script>
</body>
</html>