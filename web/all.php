<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="all.css">
    <script src="js/all.js"></script>
</head>
<body>
    <div class="end_box">
        <div class="enbox">
            <h1 id="end_text"></h1>
        </div>
    </div>
    <input type="radio" name="modal" id="modal">
    <input type="radio" name="modal" id="modal_non">
    <div class="modal_box">
        <div class="real_modal">    
            <div class="modal_shop_box">
                <div class="shop_header">
                    <h1>비회원 주문</h1>
                    <label for="modal_non"><div class="lala"></div></label>
                </div>
                <div class="shop_body">
                    <div class="shop_item" id="shop_item" ondragover="over1(event)" ondrop="drop1(event)">
                        <div class="shop_item_header">
                            <div class="shop_item_btnbox">
                                <input type="radio" name="item" id="item1" checked>
                                <label for="item1">건강식품</label>
                                <div class="item_box1">
                                    <div class="real_item_box">
                                        <div draggable="true" class="item">이뮨 멀티비타민&미네랄</div>
                                        <div draggable="true" class="item">센트룸</div>
                                    </div>
                                </div>

                                <input type="radio" name="item" id="item2">
                                <label for="item2">디지털</label>
                                <div class="item_box2">
                                    <div class="real_item_box"></div>
                                </div>

                                <input type="radio" name="item" id="item3">
                                <label for="item3">팬시</label>
                                <div class="item_box3">
                                    <div class="real_item_box"></div>
                                </div>

                                <input type="radio" name="item" id="item4">
                                <label for="item4">향수</label>
                                <div class="item_box4">
                                    <div class="real_item_box"></div>
                                </div>

                                <input type="radio" name="item" id="item5">
                                <label for="item5">헤어케어</label>
                                <div class="item_box5">
                                    <div class="real_item_box"></div>
                                </div>
                            </div>
                        </div>
                        <div class="shop_item_body"></div>
                    </div>
                    <div class="shop_by">
                        <div class="show_shop_box" id="shopbox" ondrop="drop(event)" ondragover="over(event)">
                            <p id="no_obj">아직 담긴 상품이 없습니다.</p>
                        </div>
                        <div class="by_box">
                            <div class="radom_box">
                                <p>비회원 ID:</p>
                                <input type="text" name="ran" id="ran" readonly>
                            </div>
                            <div class="by_bt_box">
                                <div class="price_box" id="price_box">0원</div>
                                <button id="last_by">구매하기</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wrap">
        <?php include 'second/login_user.php';?>
        <?php include 'second/new_user.php';?>
        <?php include 'second/header.php';?>
        <div class="ve_container" id="ve_con">
            <div class="controlbox" id="controlbox">
                <div class="control_header"></div>
                <div class="control_footer">
                    <button class="play_btn" id="ply"></button>
                    <button class="stop_btn" id="sto"></button>
                    <button class="skip1" onclick="skiptime(-10)">-10s</button>
                    <button class="skip2" onclick="skiptime(10)">+10s</button>
                    <button class="stop" id="stop"></button>
                    <div class="speed_box">
                        <p>현재 재생속도:</p>
                        <div id="show_speed" class="show_speed">1배</div>
                        <button class="speed_btn" id="speed_down">-0.1배</button>
                        <button id="rese">1배</button>
                        <button class="speed_btn" id="speed_up">+0.1배</button>
                    </div>
                    <div class="loop">
                        <input type="checkbox" name="loop" id="loop" checked>
                        <p>반복재생:</p>
                        <label for="loop" id="loopbtn">꺼짐</label>
                    </div>
                    <div class="auto">
                        <input type="checkbox" name="auto" id="auto" checked>
                        <p>자동재생:</p>
                        <label for="auto" id="autobtn">꺼짐</label>
                    </div>
                </div>
            </div>
            <video src="image/AD.mp4" id="vi"></video>
        </div>
        <div class="contents">
            <div class="contents_textbox">
                <h1><span>GIFTS:Mall</span> 전체상품</h1>
                <p><span style="font-weight: 100;color: white;">GIFTS:Mall</span> 홈페이지에 오신것을 환영합니다.</p>
            </div>
        </div>
        <div class="item_container"></div>
        <div class="no_member">
            <div class="no_member_01">
                <h1><span style="border-bottom: 5px solid orangered;">비</span>회원 주문</h1>
                <label for="modal">비회원 주문</label>
            </div>
            <div class="no_member_02">
            <h1><span style="border-bottom: 5px solid orangered;">상</span>품 문의</h1>
                <button>상품 문의</button>
            </div>
        </div>
        <?php include 'second/footer.php';?>
    </div>
</body>
</html>