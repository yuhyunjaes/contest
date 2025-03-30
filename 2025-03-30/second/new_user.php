<input type="radio" name="user" id="user">
        <input type="radio" name="user" id="user_none">
        <div class="new_user" id="new_user">
            <div class="real_userbox">
                <form action="action.php" method="POST" id="forr">
                    <div class="newuser_text">
                        <div class="newuser_text_header">
                            <h1>회원가입</h1>
                            <label for="user_none"></label>
                        </div>
                        <div class="newuser_text_body">
                            <div>
                                <label for="idd">아이디</label>
                                <input type="text" name="idd" id="idd" placeholder=" 아이디를 입력하세요">
                            </div>
                            <div>
                                <label for="pass">비밀번호</label>
                                <input type="password" name="pass" id="pass" placeholder=" 비밀번로를 입력하세요">
                            </div>
                            <div>
                                <label for="nam">이름</label>
                                <input type="text" name="nam" id="nam" placeholder=" 이름을 입력하세요">
                            </div>
                            <div>
                                <label for="ema">이메일</label>
                                <input type="email" name="ema" id="ema" placeholder=" 이메일을 입력하세요">
                            </div>
                            <div>
                                <input type="submit" value="가입하기">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>