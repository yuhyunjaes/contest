<header>
            <div class="real_header">
                <div class="logo">
                    <a href="web.php"><img src="image/로고4.png" alt="로고고"></a>
                </div>
                <nav>
                    <ul class="menu">
                        <li>
                            <a href="intro.php">소개</a>
                        </li>
                        <li>
                            <a href="#">판매상품</a>
                            <ul class="submenu">
                                <li><a href="all.php">전체상품</a></li>
                                <li><a href="hot.php">인기상품</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">가맹점</a>
                        </li>
                        <li>
                            <a href="#">고객센터</a>
                        </li>
                    </ul>
                </nav>
                <div class="bu_menu">
                    <ul class="buumenu">
                        <li>
                            <a href="manager.php">관리자</a>
                        </li>
                        <li>
                            <a href="cart.php">장바구니</a>
                        </li>
                        <li>
                            <label style="<?php if($id!==null){echo'display:none;';}?>" for="loginbox">로그인</label>
                            <p href="logout.php" style="<?php if($id!== null){echo'display:block;';}else{echo'display:none;';}?>"><?php echo$id;?></p>
                        </li>
                        <li>
                            <label style="<?php if($id!==null){echo'display:none;';}?>" for="user">회원가입</label>
                            <a href="logout.php" style="<?php if($id!== null){echo'display:block;';}else{echo'display:none;';}?>">로그아웃</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>