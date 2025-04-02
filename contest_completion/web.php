<?php
session_start();
$id;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    $id = null;
}

$conn = mysqli_connect("localhost", "root", "", "gifts");
if(!$conn) {
    echo '접속애러';
}
$page = isset($_GET['page']) ? $_GET['page']:1;
$option = isset($_GET['option']) ? $_GET['option']: 'all';
$order = isset($_GET['order']) ? $_GET['order']:'DESC';

$limit = 6;
$start_limit = ($page - 1) * $limit;

$sql = "SELECT id, category, descript, DATE_FORMAT(da, '%Y-%m-%d') AS da FROM notices ORDER BY da $order LIMIT $start_limit, $limit";

$total_sql = "SELECT COUNT(*) AS total FROM notices ORDER BY da $order";

if($option === "all") {
    $sql = "SELECT id, category, descript, DATE_FORMAT(da, '%Y-%m-%d') AS da FROM notices ORDER BY da $order LIMIT $start_limit, $limit";
    $total_sql = "SELECT COUNT(*) AS total FROM notices ORDER BY da $order";
} else if($option === "event") {
    $sql = "SELECT id, category, descript, DATE_FORMAT(da, '%Y-%m-%d') AS da FROM notices WHERE category = 'event' ORDER BY da $order LIMIT $start_limit, $limit";
    $total_sql = "SELECT COUNT(*) AS total FROM notices WHERE category = 'event' ORDER BY da $order";
}else if($option === "nomal") {
    $sql = "SELECT id, category, descript, DATE_FORMAT(da, '%Y-%m-%d') AS da FROM notices WHERE category = 'nomal' ORDER BY da $order LIMIT $start_limit, $limit";
    $total_sql = "SELECT COUNT(*) AS total FROM notices WHERE category = 'nomal' ORDER BY da $order";
}
$result = mysqli_query($conn, $sql);

$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row['total'];
$now_page = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="web.css">
    <script src="js/jquery.js"></script>
    <script src="js/web.js"></script>
</head>
<body>
    <div class="loading" id="loading">
        <div class="loading_box">
            <div class="rotate_box" id="rotate_box"></div>
            <div class="loading_text" id="loading_text">
                <p>GIFTS:Mall</p>
            </div>
        </div>
    </div>
    <div id="wrap">
        <?php include 'second/login_user.php';?>
        <?php include 'second/new_user.php';?>

        <input type="radio" name="side" id="side1">
        <input type="radio" name="side" id="side2">
        <div class="sidemenu">
            <div class="sideheader">
                <div class="sidelogo">
                    <img src="image/로고4.png" alt="로고고">
                    <label for="side2" class="sidenone_btn">X</label>
                </div>
                <div class="sidelogin">
                    <ul>
                        <li><a href="manager_login.php">관리자</a></li>
                        <li><a href="cart.php">장바구니</a></li>
                        <li><label for="loginbox">로그인</label></li>
                        <li><label for="user">회원가입</label></li>
                    </ul>
                </div>
            </div>
            <div class="sidemain">
                <input type="checkbox" name="aco" id="aco1">
                <label for="aco1">
                    <p><a href="intro.php">소개</a></p>
                </label>

                <input type="checkbox" name="aco" id="aco2">
                <label for="aco2" class="aco_icon">
                    <p>판매상품</p>
                </label>
                <div class="acoo">
                    <a href="all.php">전체상품</a><a href="hot.php">인기상품</a>
                </div>

                <input type="checkbox" name="aco" id="aco3">
                <label for="aco3">
                    <p><a href="#">가맹점</a></p>
                </label>

                <input type="checkbox" name="aco" id="aco4">
                <label for="aco4">
                    <p><a href="#">고객센터</a></p>
                </label>
            </div>
        </div>
        <header>
            <div class="real_header">
                <div class="logo">
                    <label for="side1">
                        <div></div>
                        <div></div>
                        <div></div>
                    </label>
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
                            <a href="manager_login.php">관리자</a>
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
        <div class="recon">
            <div class="container">
                <input type="radio" name="slider" id="slider1" checked>
                <input type="radio" name="slider" id="slider2">
                <input type="radio" name="slider" id="slider3">

                <input type="radio" name="slider" id="slider4">
                <input type="radio" name="slider" id="slider5">
                <input type="radio" name="slider" id="slider6">

                <div class="slider1">
                    <div class="slide1">
                        <div class="slidebox">
                            <div class="realbox1">
                            </div>
                        </div>
                        <label for="slider3" class="left"></label>
                        <label for="slider2" class="right"></label>
                        <label for="slider6" class="left1"></label>
                        <label for="slider5" class="right1"></label>
                    </div>
                    <div class="slide2">
                        <div class="slidebox">
                            <div class="realbox2">
                            </div>
                        </div>
                        <label for="slider1" class="left"></label>
                        <label for="slider3" class="right"></label>
                        <label for="slider4" class="left1"></label>
                        <label for="slider6" class="right1"></label>
                    </div>
                    <div class="slide3">
                        <div class="slidebox">
                            <div class="realbox3">
                            </div>
                        </div>
                        <label for="slider2" class="left"></label>
                        <label for="slider1" class="right"></label>
                        <label for="slider5" class="left1"></label>
                        <label for="slider4" class="right1"></label>
                    </div>
                    <div class="slide1">
                        <div class="slidebox">
                            <div class="realbox1">
                            </div>
                        </div>
                        <label for="slider3" class="left"></label>
                        <label for="slider2" class="right"></label>
                        <label for="slider6" class="left1"></label>
                        <label for="slider5" class="right1"></label>
                    </div>
                </div>
                <div class="slider2">
                    <div class="slide2">
                        <div class="slidebox">
                            <div class="realbox2">
                            </div>
                        </div>
                        <label for="slider1" class="left"></label>
                        <label for="slider3" class="right"></label>
                        <label for="slider4" class="left1"></label>
                        <label for="slider6" class="right1"></label>
                    </div>
                    <div class="slide3">
                        <div class="slidebox">
                            <div class="realbox3">
                            </div>
                        </div>
                        <label for="slider2" class="left"></label>
                        <label for="slider1" class="right"></label>
                        <label for="slider5" class="left1"></label>
                        <label for="slider4" class="right1"></label>
                    </div>
                    <div class="slide1">
                        <div class="slidebox">
                            <div class="realbox1">
                            </div>
                        </div>
                        <label for="slider3" class="left"></label>
                        <label for="slider2" class="right"></label>
                        <label for="slider6" class="left1"></label>
                        <label for="slider5" class="right1"></label>
                    </div>
                    <div class="slide2">
                        <div class="slidebox">
                            <div class="realbox2">
                            </div>
                        </div>
                        <label for="slider1" class="left"></label>
                        <label for="slider3" class="right"></label>
                        <label for="slider4" class="left1"></label>
                        <label for="slider6" class="right1"></label>
                    </div>
                </div>
                <div class="slider3">
                    <div class="slide3">
                        <div class="slidebox">
                            <div class="realbox3">
                            </div>
                        </div>
                        <label for="slider2" class="left"></label>
                        <label for="slider1" class="right"></label>
                        <label for="slider5" class="left1"></label>
                        <label for="slider4" class="right1"></label>
                    </div>
                    <div class="slide1">
                        <div class="slidebox">
                            <div class="realbox1">
                            </div>
                        </div>
                        <label for="slider3" class="left"></label>
                        <label for="slider2" class="right"></label>
                        <label for="slider6" class="left1"></label>
                        <label for="slider5" class="right1"></label>
                    </div>
                    <div class="slide2">
                        <div class="slidebox">
                            <div class="realbox2">
                            </div>
                        </div>
                        <label for="slider1" class="left"></label>
                        <label for="slider3" class="right"></label>
                        <label for="slider4" class="left1"></label>
                        <label for="slider6" class="right1"></label>
                    </div>
                    <div class="slide3">
                        <div class="slidebox">
                            <div class="realbox3">
                            </div>
                        </div>
                        <label for="slider2" class="left"></label>
                        <label for="slider1" class="right"></label>
                        <label for="slider5" class="left1"></label>
                        <label for="slider4" class="right1"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="content1">
            <div class="controll_menu">
                <ul class="category">
                    <li><h1>상품<br> <span>카</span>테고리</h1></li>
                    <li><input type="radio" name="cate" id="cate1" checked><label for="cate1" class="category_btn"><p>건강식품</p></label><div class="cate1box">
                        <div class="category_realbox">
                            <div class="big_cate">
                                <div class="obj_box1">
                                    <div class="sale_box"><div><p>이뮨 멀티비타민&미네랄</p></div></div>
                                </div>
                            </div>
                            <div class="small_cate">
                                <a href="all.php">바로가기 ></a>
                                <div class="obj_box2"><div><p>센트룸</p><p>27,000원</p></div></div>
                                <div class="obj_box3"><div><p>닥터브라이언</p><p>2,000원</p></div></div>
                            </div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="cate" id="cate2"><label for="cate2" class="category_btn"><p>디지털</p></label><div class="cate2box">
                    <div class="category_realbox">
                            <div class="big_cate">
                                <div class="obj_box1" id="cate_img1">
                                    <div class="sale_box"><div><p>파이널마우스 스타라이트12 페가수스 미디엄</p></div></div>
                                </div>
                            </div>
                            <div class="small_cate">
                                <a href="#">바로가기 ></a>  
                                <div class="obj_box2" id="cate_img1-1"><div><p>PANTONE PD충전 보조배터리</p><p>24,400원</p></div></div>
                                <div class="obj_box3" id="cate_img1-2"><div><p>Bowie D05 무선 블루투스 5.3 헤드셋 </p><p>36,900원</p></div></div>
                            </div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="cate" id="cate3"><label for="cate3" class="category_btn"><p>팬시</p></label><div class="cate3box">
                    <div class="category_realbox">
                            <div class="big_cate">
                                <div class="obj_box1" id="cate_img2">
                                    <div class="sale_box"><div><p>게이밍 이어폰 VJJB NI</p></div></div>
                                </div>
                            </div>
                            <div class="small_cate">
                                <a href="#">바로가기 ></a>  
                                <div class="obj_box2" id="cate_img2-1"><div><p>명품 자동 장우산</p><p>31,600원</p></div></div>
                                <div class="obj_box3" id="cate_img2-2"><div><p>14K 윙블링 원터치 링 귀걸이(주문제작)</p><p>250,000원</p></div></div>
                            </div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="cate" id="cate4"><label for="cate4" class="category_btn"><p>향수</p></label><div class="cate4box">
                    <div class="category_realbox">
                            <div class="big_cate">
                                <div class="obj_box1" id="cate_img3">
                                    <div class="sale_box"><div><p>몽블랑 익스플로러 EDP 60ml</p></div></div>
                                </div>
                            </div>
                            <div class="small_cate">
                                <a href="#">바로가기 ></a>
                                <div class="obj_box2" id="cate_img3-1"><div><p>에스쁘아 솔리드 퍼퓸 4.2g</p><p>26,000원</p></div></div>
                                <div class="obj_box3" id="cate_img3-2"><div><p>호텔도슨 향수 오드퍼퓸 75ml</p><p>153,000원</p></div></div>
                            </div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="cate" id="cate5"><label for="cate5" class="category_btn"><p>헤어케어</p></label><div class="cate5box">
                    <div class="category_realbox">
                            <div class="big_cate">
                                <div class="obj_box1" id="cate_img4">
                                    <div class="sale_box"><div><p>닥터포헤어 피토프레시 헤어쿨링 스프레이 150ml</p></div></div>
                                </div>
                            </div>
                            <div class="small_cate">
                                <a href="#">바로가기 ></a>
                                <div class="obj_box2" id="cate_img4-1"><div><p>어노브 딥 데미지 트리트먼트 EX 더블</p><p>29,800원</p></div></div>
                                <div class="obj_box3" id="cate_img4-2"><div><p style="font-size: 10px;">려 루트젠 여성맞춤 볼륨 탈모증상케어 샴퓨 353ml</p><p>21,900원</p></div></div>
                            </div>
                        </div>
                    </div></li>
                </ul>
            </div>
            <div class="show_menu"></div>
        </div>
        <div class="side_content">
            <div class="side_content_header">
                <h4>상품 <br><span style="border-bottom: 5px solid orangered;">카</span>테고리</h4>
                <ul class="side_content_menu">
                    <li><input type="radio" name="side_con" id="side_con1" checked><label for="side_con1">건강식품</label><div class="side_con_box1">
                        <div class="side_big_box">
                            <div class="side_box1">
                                <div class="side_sale_box"><div><p></p></div></div>
                            </div>
                        </div>
                        <div class="side_small_box">
                            <div class="side_box1-1"><div><p></p><p></p></div></div>
                            <div class="side_box1-2"><div><p></p><p></p></div></div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="side_con" id="side_con2"><label for="side_con2">디지털</label><div class="side_con_box2">
                    <div class="side_big_box">
                            <div class="side_box2">
                                <div class="side_sale_box"><div><p></p></div></div>
                            </div>
                        </div>
                        <div class="side_small_box">
                            <div class="side_box2-1"><div><p></p><p></p></div></div>
                            <div class="side_box2-2"><div><p></p><p></p></div></div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="side_con" id="side_con3"><label for="side_con3">팬시</label><div class="side_con_box3">
                    <div class="side_big_box">
                            <div class="side_box3">
                                <div class="side_sale_box"><div><p></p></div></div>
                            </div>
                        </div>
                        <div class="side_small_box">
                            <div class="side_box3-1"><div><p></p><p></p></div></div>
                            <div class="side_box3-2"><div><p></p><p></p></div></div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="side_con" id="side_con4"><label for="side_con4">향수</label><div class="side_con_box4">
                    <div class="side_big_box">
                            <div class="side_box4">
                                <div class="side_sale_box"><div><p></p></div></div>
                            </div>
                        </div>
                        <div class="side_small_box">
                            <div class="side_box4-1"><div><p></p><p></p></div></div>
                            <div class="side_box4-2"><div><p></p><p></p></div></div>
                        </div>
                    </div></li>
                    <li><input type="radio" name="side_con" id="side_con5"><label for="side_con5">헤어케어</label><div class="side_con_box5">
                    <div class="side_big_box">
                            <div class="side_box5">
                                <div class="side_sale_box"><div><p></p></div></div>
                            </div>
                        </div>
                        <div class="side_small_box">
                            <div class="side_box5-1"><div><p></p><p></p></div></div>
                            <div class="side_box5-2"><div><p></p><p></p></div></div>
                        </div>
                    </div></li>
                </ul>
            </div>
            <div class="side_content_body"></div>
        </div>

        <div class="notice" id="notice">
            <div class="notice_header">
                <div class="notice_title">
                    <h1>기프트몰 <br><span style="font-family: none;border-bottom: 5px solid orangered;">공</span>지사항</h1>
                    <h4>기프트몰 <br><span style="font-family: none;border-bottom: 5px solid orangered;">공</span>지사항</h4>
                </div>
                <div class="notice_none">
                    <div class="option">
                        <p>유형</p>
                        <a style="<?php if($option === "all"){echo'color: orangered;';}?>" href="web.php?page=1&option=all&order=<?php echo $order;?>&#notice" onclick="nonenext()">전체보기</a>
                        <a style="<?php if($option === "event"){echo'color: orangered;';}?>" href="web.php?page=1&option=event&order=<?php echo $order;?>#notice" onclick="nonenext()">이벤트</a>
                        <a style="<?php if($option === "nomal"){echo'color: orangered;';}?>" href="web.php?page=1&option=nomal&order=<?php echo $order;?>&#notice" onclick="nonenext()">일반</a>
                        
                        <p>공지일자</p>
                        <a style="<?php if($order === "DESC"){echo'color: orangered';}?>" href="web.php?page=<?php echo $page?>&option=<?php echo $option;?>&order=DESC&#notice" onclick="nonenext()">최신순</a>
                        <a style="<?php if($order === "ASC"){echo'color: orangered';}?>" href="web.php?page=<?php echo $page?>&option=<?php echo $option;?>&order=ASC&#notice" onclick="nonenext()">오래된순</a>
                    </div>
                </div>
            </div>
            <div class="notice_body">
                <table>
                    <tr>
                        <th>유형</th>
                        <th>제목</th>
                        <th>공지일자</th>
                    </tr>
                    <?php
                        if($result !== false) {
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $category = $row['category'];
                                    $descript = $row['descript'];
                                    $da = $row['da'];
                                    switch($category) {
                                        case"nomal":
                                            $category = "일반";
                                            break;
                                        case"event":
                                            $category = "이벤트";
                                            break;
                                    }
                                    echo'<tr>';
                                    echo'<td>';
                                    echo $category;
                                    echo'</td>';
                                    echo'<td>';
                                    echo $descript;
                                    echo'</td>';
                                    echo'<td>';
                                    echo $da;
                                    echo'</td>';
                                    echo'</tr>';
                                }
                            }
                            else {
                                echo'<tr><td colspan="3" style="text-align:center;">';
                                echo'데이터가 없습니다.';
                                echo'</tr></td>';
                            }
                        }
                    ?>  
                </table>
            </div>
            <div class="notice_footer">
                <div class="back_box">
                    <?php
                        if($page > 1) {
                            echo'<a href="web.php?page='.($page - 1).'&option='.$option.'&order='.$order.'&#notice" onclick="nonenext()">이전</a>';
                        }
                    ?>
                </div>
                <div class="notice_menu">
                    <?php
                        for($i = 1;$i <= $now_page;$i++) {
                            if($i == $page) {
                                echo '<span>'.$i.'</span>';
                            }
                            else {
                                echo '<a href="web.php?page='.$i.'&option='.$option.'&order='.$order.'&#notice" onclick="nonenext()">'.$i.'</a>';
                            }
                        }
                    ?>
                </div>
                <div class="next_box">
                    <?php
                    if($page < $now_page) {
                        echo'<a href="web.php?page='.($page + 1).'&option='.$option.'&order='.$order.'&#notice" onclick="nonenext()">다음</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="shop_container">
            <div class="in_shop">
                <div class="in_shop1">
                    <div class="in_shop1-1">
                        <div class="jubvox">입점<br><span style="font-family: none;border-bottom: 5px solid orangered;">절</span>차 안내</div>
                        <div class="shop_text_box">
                            <p>대한민국 No.1</p>
                            <h1><span style="color:orangered;font-family: fantasy;font-weight: 100;">GIFTS:Mall</span>과 함께 할 <span style="font-family: fantasy;font-weight: 100;">WIN-WIN</span> 파트너를 찾습니다.</h1>
                            <h1>제휴사의 많은 지원을 기다립니다.</h1>
                        </div>
                    </div>
                    <div class="in_shop1-2">
                        <div class="banner1">
                            <div class="banner_img">
                                <img src="image/shop.png" alt="">
                            </div>
                            <div class="banner_text"><p>상품입점/제휴문의</p></div>
                        </div>
                        <div class="banner2">
                            <div class="banner_img">
                                <img src="image/select.png" alt="">
                            </div>
                            <div class="banner_text"><p>문의결과조회</p></div>
                        </div>
                        <div class="banner3">
                            <div class="banner_img">
                                <img src="image/paper.png" alt="">
                            </div>
                            <div class="banner_text"><p>전자계약시스템</p></div>
                        </div>
                        <div class="banner4">
                            <div class="banner_img">
                                <img src="image/partner.png" alt="">
                            </div>
                            <div class="banner_text"><p>파트너시스템</p></div>
                        </div>
                    </div>
                </div>
                <div class="in_shop2">
                    <div class="max_480_shop">
                        <div class="m_4_header">
                            <h4>입점 <br><span style="border-bottom: 5px solid orangered;">절</span>차 안내</h4>
                        </div>
                        <div class="m_4_body">
                            <div>
                                <p>1단계</p>
                                <div>임시회원가입</div>
                            </div>
                            <div>
                                <p>2단계</p>
                                <div>온라인상담</div>
                            </div>
                            <div>
                                <p>3단계</p>
                                <div>방문상담</div>
                            </div>
                            <div>
                                <p>계약체결</p>
                                <div>6단계</div>
                            </div>
                            <div>
                                <p>신용평가</p>
                                <div>5단계</div>
                            </div>
                            <div>
                                <p>품평회</p>
                                <div>4단계</div>
                            </div>
                            <section class="m_4_long_text1">
                                <p>미거래 업체는 임시회원 가입/로그인 후 상담신청을 하실 수 있습니다.</p>
                            </section>
                            <section class="m_4_long_text2">
                                <p>GIFTS:Mall 입점/제휴를 위해서는 온라인 상담이 선행되어야 합니다. 상담 문의 후 사이트를 통해 결과를 안내해 드립니다.</p>
                            </section>
                            <section class="m_4_long_text3">
                                <p>온라인 상담이 긍정적일 경우, 담당MD/제휴담당자와 구체적인 상담을 진행하게 됩니다.</p>
                            </section>
                            <section class="m_4_long_text4">
                                <p>공정한 평가를 위해 상품력, 기획력, 영업력, 판촉력 등의 항목을 기준으로 내부 품평회를 진행합니다.</p>
                            </section>
                            <section class="m_4_long_text5">
                                <p>입점확정 협력사의 경우 신뢰있는 거래를 위해 신용평가를 받고 있습니다.</p>
                            </section>
                            <section class="m_4_long_text6">
                                <p>전자계약서(또는 수기계약서)를 통해 거래계약서와 관련서류를 작성하시면 입점절차가 완료됩니다.</p>
                            </section>
                            <span class="mouse_ani">단계에 마우스를 올리거나 클릭해주세요!</span>
                        </div>
                    </div>

                    <div class="mouse_up_ani">단계에 마우스를 올려주세요!</div>
                    <div class="shop_bar">
                        <div class="shop_bar_full">
                            <div class="shop_next_box">
                                <div class="nextbox">
                                    <p>1단계</p>
                                    <span>임시회원가입</span>
                                    <div>
                                        <p>미거래 업체는 임시회원 가입/로그인 후 상담신청을 하실 수 있습니다.</p>
                                    </div>
                                </div>
                                <div class="nextbox">
                                    <p>2단계</p>
                                    <span>온라인상담</span>
                                    <div>
                                        <p>GIFTS:Mall 입점/제휴를 위해서는 온라인 상담이 선행되어야 합니다. 상담 문의 후 사이트를 통해 결과를 안내해 드립니다.</p>
                                    </div>
                                </div>
                                <div class="nextbox">
                                    <p>3단계</p>
                                    <span>방문상담</span>
                                    <div>
                                        <p>온라인 상담이 긍정적일 경우, 담당MD/제휴담당자와 구체적인 상담을 진행하게 됩니다.</p>
                                    </div>
                                </div>
                                <div class="nextbox">
                                    <p>4단계</p>
                                    <span>품평회</span>
                                    <div>
                                        <p>공정한 평가를 위해 상품력, 기획력, 영업력, 판촉력 등의 항목을 기준으로 내부 품평회를 진행합니다.</p>
                                    </div>
                                </div>
                                <div class="nextbox">
                                    <p>5단계</p>
                                    <span>신용평가</span>
                                    <div>
                                        <p>입점확정 협력사의 경우 신뢰있는 거래를 위해 신용평가를 받고 있습니다.</p>
                                    </div>
                                </div>
                                <div class="nextbox">
                                    <p>6단계</p>
                                    <span>계약체결</span>
                                    <div>
                                        <p>전자계약서(또는 수기계약서)를 통해 거래계약서와 관련서류를 작성하시면 입점절차가 완료됩니다.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'second/footer.php';?>
    </div>
</body>
</html>