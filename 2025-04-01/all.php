<?php
session_start();
$id;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    $id = null;
}
$conn = mysqli_connect("localhost", "root", "", "gifts");

$cate = isset($_GET['cate']) ? $_GET['cate']:'건강식품';
$cate_style = 'style="background-color: #ff4500;color:white;"';

if($cate !== null) {
    $all_item_sql = "SELECT i.id, i.category, i.img, i.name, i.descript, i.price, i.post, i.boon, DATE_FORMAT(i.date, '%Y-%m-%d') AS date, c.hap FROM item i LEFT JOIN discount c ON i.id = c.id AND i.category = c.category WHERE i.category = '$cate'";
    $all_item_result = mysqli_query($conn, $all_item_sql);
}

$item_id = isset($_GET['item_id']) ? $_GET['item_id']:null;
if($item_id !== null) {
    if($id === null) {
        echo "
        <script>
        alert('로그인이 필요합니다');
        location = 'all.php#item_category_box';
        localStorage.setItem('login', 1);
        </script>
    ";
    } else {
        $cart_sql = "INSERT INTO cart (user_id, item_id, hap) VALUES ('$id', $item_id, 1)";
        $cart_result = mysqli_query($conn, $cart_sql);
        if($cart_result !== false) {
            echo"
                <script>
                    alert('장바구니에 추가되었습니다.');
                    location = 'all.php?cate=".$cate."&#item_category_box';
                </script>
            ";
        }
    }
} 

?>
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
        <div class="item_container">
            <div class="item_header">
                <div class="item_category_box" id="item_category_box">
                    <a <?php if($cate === '건강식품'){echo $cate_style;}?> href="all.php?cate=건강식품&#item_category_box">건강식품</a>
                    <a <?php if($cate === '디지털'){echo $cate_style;}?> href="all.php?cate=디지털&#item_category_box">디지털</a>
                    <a <?php if($cate === '팬시'){echo $cate_style;}?> href="all.php?cate=팬시&#item_category_box">팬시</a>
                    <a <?php if($cate === '향수'){echo $cate_style;}?> href="all.php?cate=향수&#item_category_box">향수</a>
                    <a <?php if($cate === '헤어케어'){echo $cate_style;}?> href="all.php?cate=헤어케어&#item_category_box">헤어케어</a>
                </div>
            </div>
            <div class="item_body">
                <div class="item_shop_container">
                <?php
                 if($all_item_result !== false) {
                     if(mysqli_num_rows($all_item_result) > 0) {
                        while($all_item_row = mysqli_fetch_assoc($all_item_result)) {
                            $price = $all_item_row['price'];
                            $hap = $all_item_row['hap'];
                            $hap_total = 0;
                            $discount_style = '';
                            $discount_box = '';
                            if($hap != '') {
                                $discount_style = 'color:orangered;';
                                if($hap == 10) {
                                    $discount_box = '<div class="discount_1">10%</div>';
                                    $hap = $hap / 100;
                                    $hap_total = $price - ($price * $hap);
                                    $price = $hap_total;
                                    $price = '<span style="'.$discount_style.'" class="item_price">'.$price.'</span> <del class="del">'.$all_item_row['price'].'</del>';
                                } else if($hap == 30) {
                                    $discount_box = '<div class="discount_2">30%</div>';
                                    $hap = $hap / 100;
                                    $hap_total = $price - ($price * $hap);
                                    $price = $hap_total;
                                    $price = '<span style="'.$discount_style.'" class="item_price">'.$price.'</span> <del class="del">'.$all_item_row['price'].'</del>';
                                } else if($hap == 10000) {
                                    $discount_box = '<div class="discount_3">10,000</div>';
                                    $price = $price - 10000;
                                    $price = '<span style="'.$discount_style.'" class="item_price">'.$price.'</span> <del class="del">'.$all_item_row['price'].'</del>';
                                }

                                if($price  < 0) {
                                    $price = 0;
                                }
                            } else {
                                $price = '<span class="item_price">'.$price.'</span>';
                            }

                            echo'<div class="item_shop_box">'.$discount_box.'';
                            echo'<a class="cart_move" href="all.php?cate='.$cate.'&item_id='.$all_item_row['id'].'&#item_category_box"><div></div></a>';
                            echo'<div class="hide_shop_text_box"><p>'.$all_item_row['boon'].'</p></div>';
                            echo '<img src="image/'.$all_item_row['category'].'/'.$all_item_row['img'].'" alt="">';
                            echo '<div class="item_hsop_text_box">';
                            echo '<p class="item_name">'.$all_item_row['name'].'</p>';
                            echo '<p id="item_price">'.$price.'</p>';
                            echo '<p class="item_descript">'.$all_item_row['descript'].'</p>';
                            echo '<p class="item_post">배송비 <span class="itpost">'.$all_item_row['post'].'</span>원 (<span>20,000</span>원 이상 구매시 무료배송)</p>';
                            echo '</div>';
                            echo'</div>';
                        }
                     } else {
                         echo'<div class="none">데이터가 없습니다.</div>';
                     }
                 }
                ?>
                </div>
            </div>
        </div>
        <div class="no_member">
            <div class="no_member_01">
                <h1><span style="border-bottom: 5px solid orangered;">비</span>회원 주문</h1>
                <label style="<?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){echo'pointer-events: none;';}?>" for="modal">비회원 주문</label>
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