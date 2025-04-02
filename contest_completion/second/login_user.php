<input type="radio" name="loginbox" id="loginbox">
        <input type="radio" name="loginbox" id="loginboxno">
        <div class="login_container">
            <div class="real_login">
                <form action="login_action.php" method="POST" id="forr1">
                <div class="login_box">
                    <div class="login_header">
                        <h1>로그인</h1>
                        <label for="loginboxno"></label>
                    </div>
                    <div class="login_body">
                        <div class="div">
                            <label for="logid">아이디</label>
                            <input type="text" name="logid" id="logid" placeholder=" 아이디를 입력하세요">
                        </div>
                        <div class="div">
                            <label for="logpass">비밀번호</label>
                            <input type="password" name="logpass" id="logpass" placeholder=" 비밀번호를 입력하세요">
                        </div>
                        <input type="submit" value="로그인">
                    </div>
                </div>
                </form>
            </div>
        </div>