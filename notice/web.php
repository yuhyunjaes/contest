<?php
$conn = mysqli_connect("localhost", "root", "", "notice");
if(!$conn) {
    echo'접속 오류';
}

$limits = 6;

$orderby = isset($_GET['orderby']) ? $_GET['orderby']: 'DESC';
$title = isset($_GET['title']) ? $_GET['title']: 'all';
$where_text = null;
if($title === 'nomal' || $title === 'event') {
    $where_text = "WHERE category = '$title'";
}

$page = isset($_GET['page']) ? (int)$_GET['page']: 1;
$limit_start = ($page - 1) * $limits;

$sql = "SELECT * FROM notices $where_text ORDER BY da $orderby LIMIT $limit_start, $limits";
$result = mysqli_query($conn, $sql);

$count_sql = "SELECT COUNT(*) AS total FROM notices $where_text";
$count_result = mysqli_query($conn, $count_sql);
$count_fet = mysqli_fetch_assoc($count_result);
$total = $count_fet['total'];

$all_page = ceil($total / $limits);
?>

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
                        <li><a href="#">관리자</a></li>
                        <li><a href="#">장바구니</a></li>
                        <li><a href="#">로그인</a></li>
                        <li><a href="#">회원가입</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidemain">
                <input type="checkbox" name="aco" id="aco1">
                <label for="aco1">
                    <p><a href="#">소개</a></p>
                </label>

                <input type="checkbox" name="aco" id="aco2">
                <label for="aco2" class="aco_icon">
                    <p>판매상품</p>
                </label>
                <div class="acoo">
                    <a href="#">전체상품</a><a href="#">인기상품</a>
                </div>

                <input type="checkbox" name="aco" id="aco3">
                <label for="aco3">
                    <p><a href="#">가맹점</a></p>
                </label>

                <input type="checkbox" name="aco" id="aco4">
                <label for="aco4">
                    <p><a href="#">장바구니</a></p>
                </label>
            </div>
        </div>
        <header>
            <div class="logo">
                <label for="side1">
                    <div></div>
                    <div></div>
                    <div></div>
                </label>
                <a href="#"><img src="image/로고4.png" alt="로고고"></a>
            </div>
            <nav>
                <ul class="menu">
                    <li>
                        <a href="#">소개</a>
                    </li>
                    <li>
                        <a href="#">판매상품</a>
                        <ul class="submenu">
                            <li><a href="#">전체상품</a></li>
                            <li><a href="#">인기상품</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">가맹점</a>
                    </li>
                    <li>
                        <a href="#">장바구니</a>
                    </li>
                </ul>
            </nav>
            <div class="bu_menu">
                <ul class="buumenu">
                    <li>
                        <a href="#">관리자</a>
                    </li>
                    <li>
                        <a href="#">장바구니</a>
                    </li>
                    <li>
                        <a href="#">로그인</a>
                    </li>
                    <li>
                        <a href="#">회원가입</a>
                    </li>
                </ul>
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
        <div class="category_title"><h1><span>CATEGORY</span></h1></div>
        <div class="contents">
            <div class="cate1">
                <div class="cate_header"><h1><span>건</span>강식품</h1></div>
                <div class="cate_body">
                    <div class="catebody_1">
                        <div class="shopbox">
                            <img src="image/건강식품/1.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_2">
                        <div class="shopbox">
                            <img src="image/건강식품/3.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_3">
                        <div class="shopbox">
                            <img src="image/건강식품/4.PNG" alt="카테고리">
                        </div>
                    </div>
                </div>
            </div>
            <div class="cate2">
                <div class="cate_header"><h1><span>디</span>지털</h1></div>
                <div class="cate_body">
                    <div class="catebody_1">
                        <div class="shopbox">
                            <img src="image/디지털/1.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_2">
                        <div class="shopbox">
                            <img src="image/디지털/2.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_3">
                        <div class="shopbox">
                            <img src="image/디지털/3.PNG" alt="카테고리">
                        </div>
                    </div>
                </div>
            </div>
            <div class="cate3">
                <div class="cate_header"><h1><span>팬</span>시</h1></div>
                <div class="cate_body">
                    <div class="catebody_1">
                        <div class="shopbox">
                            <img src="image/팬시/1.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_2">
                        <div class="shopbox">
                            <img src="image/팬시/2.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_3">
                        <div class="shopbox">
                            <img src="image/팬시/3.PNG" alt="카테고리">
                        </div>
                    </div>
                </div>
            </div>
            <div class="cate4">
                <div class="cate_header"><h1><span>향</span>수</h1></div>
                <div class="cate_body">
                    <div class="catebody_1">
                        <div class="shopbox">
                            <img src="image/향수/1.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_2">
                        <div class="shopbox">
                            <img src="image/향수/2.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_3">
                        <div class="shopbox">
                            <img src="image/향수/3.PNG" alt="카테고리">
                        </div>
                    </div>
                </div>
            </div>
            <div class="cate5">
                <div class="cate_header"><h1><span>헤</span>어케어</h1></div>
                <div class="cate_body">
                    <div class="catebody_1">
                        <div class="shopbox">
                            <img src="image/헤어케어/1.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_2">
                        <div class="shopbox">
                            <img src="image/헤어케어/2.PNG" alt="카테고리">
                        </div>
                    </div>
                    <div class="catebody_3">
                        <div class="shopbox">
                            <img src="image/헤어케어/3.PNG" alt="카테고리">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gongji_title"><h1><span>NOTICE</span></h1></div>
        <div class="gongji" id="gong">
            <h1><span>공</span>지사항</h1>
            <section class="gongjibox">
                <article>
                    <p>총 <span style="color: orangered;"><?php echo$total?>건</span>의 공지사항이 있습니다.</p>
                </article>
                <div class="noticebox">
                    <div class="notice_controll">
                        <div class="day">
                            <b>날짜:</b>
                            <a style="<?php if($orderby === 'ASC'){echo'color: orangered;';}else{echo'color:black;';}?>" href="web.php?page=<?php echo$page?>&orderby=ASC&title=<?php echo$title?>&#gong">오름차순</a>
                            <a style="<?php if($orderby === 'DESC'){echo'color: orangered;';}else{echo'color:black;';}?>" href="web.php?page=<?php echo$page?>&orderby=DESC&title=<?php echo$title?>&#gong">내림차순</a>
                        </div>
                        <div class="title">
                            <b>종류:</b>
                            <a style="<?php if($title === 'nomal'){echo'color:orangered;';}else{echo'color:black';}?>" href="web.php?page=1&orderby=<?php echo$orderby?>&title=nomal&#gong">일반</a>
                            <a style="<?php if($title === 'event'){echo'color:orangered;';}else{echo'color:black';}?>" href="web.php?page=1&orderby=<?php echo$orderby?>&title=event&#gong">이벤트</a>
                            <a style="<?php if($title === 'all'){echo'color:orangered;';}else{echo'color:black';}?>" href="web.php?page=1&orderby=<?php echo$orderby?>&title=all&#gong">모두보기</a>
                        </div>
                    </div>
                    <div class="notice_body">
                        <?php
                        if ($result === false) {
                            echo '오류 발생';
                        } else {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $descript = $row['descript'];
                                    $day = $row['da'];
                                    $category = $row['category'];
                                    switch($category){
                                        case('nomal'):
                                            $category = '일반';
                                            break;
                                        case('event'):
                                            $category = '이벤트';
                                            break;
                                    }
                                      echo '<div class="notice">';
                                    echo '<h4 class="cate">[' . $category . ']</h4>';
                                    echo '<h4 class="desc">' . $descript . '</h4>';
                                    echo '<span class="date">' . $day . '</span>';
                                    echo '</div>';
                                }
                            } else {
                                $error = '데이터가 없습니다';
                                echo '<p class="error" id="errtext" style="position:absolute;top:50%;left:50%;transform: translate(-50%, -50%);">'.$error.'</p>';
                                if($error) {
                                    echo '<script>location="web.php?page=1&orderby='.$orderby.'&title='.$title.'&#gong"</script>';
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="btnbox">
                        <div class="btbox">
                            <?php
                            if($page > 1) {
                                echo'<a class="back" href="web.php?page='.($page - 1).'&orderby='.$orderby.'&title='.$title.'&#gong">이전</a>';
                            }
                            echo '<div>';
                               for($i = 1;$i <= $all_page;$i++) {
                                if($i === $page) {
                                    echo'<span>'.$i.'</span>';
                                } else {
                                    echo'<a href="web.php?page='.$i.'&orderby='.$orderby.'&title='.$title.'&#gong">'.$i.'</a>';
                                }
                            }
                            echo '</div>';
                            if($page < $all_page) {
                                echo '<a class="next" href="web.php?page='.($page + 1).'&orderby='.$orderby.'&title='.$title.'&#gong">다음</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>