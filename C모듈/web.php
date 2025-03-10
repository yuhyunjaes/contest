<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="web.css">
</head>
<body>
    <div id="wrap">
        <form action="action.php" method="POST" id="forr">
            <div>
                <h1>회원가입</h1>
            </div>
            <div>
                <p>아이디
                    <span></span>
                </p>
                <input type="text" name="id" id="id" placeholder=" 아이디 입력">
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
            </div>
        </form>
    </div>
    <script src="web.js"></script>
</body>
</html>