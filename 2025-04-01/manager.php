<?php
    session_start();
    if(!isset($_SESSION['manager_id']) && empty($_SESSION['manager_id'])) {
        echo"
        <script>
        alert('잘못된 접근 로그인후 이용 부탁드립니다.');
        location = 'manager_login.php';
        </script>
        ";
    } 

    $conn = mysqli_connect("localhost", "root", "", "gifts");
    if(!$conn) {
        echo'연결오류';
    }

    $itemupdate = isset($_GET['itemupdate']) ? $_GET['itemupdate']:null;
    if($itemupdate !== null) {
        $itemupdate_sql = "SELECT * FROM item WHERE id = $itemupdate";
        $itemupdate_result = mysqli_query($conn, $itemupdate_sql);
        if(mysqli_num_rows($itemupdate_result) > 0) {
            $itemupdate_row = mysqli_fetch_assoc($itemupdate_result);
        }
    }

    $whcate = isset($_GET['whcate']) ? $_GET['whcate']:'건강식품';
    $deas = isset($_GET['deas']) ? $_GET['deas']:'DESC';

    if($deas === 'DESC' || $deas === 'ASC') {
        if($whcate !== null) {
            $whcate_sql = "SELECT i.id, i.category, i.img, i.name, i.descript, i.price, i.post, i.boon,i.date, c.hap FROM item i LEFT JOIN discount c ON i.id = c.id AND i.category = c.category WHERE i.category = '$whcate' ORDER BY i.date $deas";
            $whcate_result = mysqli_query($conn, $whcate_sql);
        }
    }
    $update_id = isset($_POST['update_id']) ? $_POST['update_id']:null;
    $im1 = isset($_POST['im1']) ? $_POST['im1']:null;
    $itemname1 = isset($_POST['itemname1']) ? $_POST['itemname1']:null;
    $itemprice1 = isset($_POST['itemprice1']) ? $_POST['itemprice1']:null;
    $itempost1 = isset($_POST['itempost1']) ? $_POST['itempost1']:null;
    $itemdesc1 = isset($_POST['itemdesc1']) ? $_POST['itemdesc1']:null;
    $itemboon1 = isset($_POST['itemboon1']) ? $_POST['itemboon1']:null;
    $catego1 = isset($_POST['catego1']) ? $_POST['catego1']:null;
    if($update_id !== null && $itemname1 !== null && $itemprice1 !== null && $itempost1 !== null && $itemdesc1 !== null && $itemboon1 !== null) {
        if(!empty($im1)) {
            $update_item_sql = "UPDATE item SET category = '$catego1', img = '$im1', name = '$itemname1', descript = '$itemdesc1', price = '$itemprice1', post = '$itempost1', boon = '$itemboon1' WHERE id = $update_id";
        } else {
            $update_item_sql = "UPDATE item SET category = '$catego1', name = '$itemname1', descript = '$itemdesc1', price = '$itemprice1', post = '$itempost1', boon = '$itemboon1' WHERE id = $update_id";
        }
        $update_item_result = mysqli_query($conn, $update_item_sql);
        if($update_item_result !== false) {
            echo "
                <script>
                alert('상품 수정이 완료되었습니다.');
                location = 'manager.php?whcate=".$catego1."';
                localStorage.setItem('new', 3);
                </script>
            ";
        }
    }

    $hot_item_value = isset($_POST['hot_item_value']) ? $_POST['hot_item_value']:null;
    $hot_item_cate = isset($_POST['hot_item_cate']) ? $_POST['hot_item_cate']:null;
    $option = isset($_POST['option']) ? $_POST['option']:null;
    if($hot_item_value !== null && $option !== null && $hot_item_cate !== null) {
        $hot_item_discount_sql = "UPDATE discount SET id = $hot_item_value, hap = $option WHERE category = '$hot_item_cate'";
        $hot_item_discount_result = mysqli_query($conn, $hot_item_discount_sql);
        if($hot_item_discount_result !== false) {
            echo "
                <script>
                alert('".$hot_item_cate." 인기상품 등록/변경이 완료되었습니다.');
                location = 'manager.php?whcate=".$hot_item_cate."';
                localStorage.setItem('new', 3);
                </script>
            ";
        }
    }

    $hot_item = isset($_GET['hot_item']) ? $_GET['hot_item']:null;
    
    $itemdelete = isset($_GET['itemdelete']) ? $_GET['itemdelete']:null;
    if($itemdelete !== null) {
        $itemdelete_sql = "DELETE FROM item WHERE id = $itemdelete";
        $itemdelete_result = mysqli_query($conn, $itemdelete_sql);
        if($itemdelete_result !== false) {
            echo "
                <script>
                alert('상품 삭제가 완료되었습니다.');
                location = 'manager.php?whcate=".$whcate."';
                localStorage.setItem('new', 3);
                </script>
            ";
        }
    }

    $im = isset($_POST['im']) ? $_POST['im']:null;
    $itemname = isset($_POST['itemname']) ? $_POST['itemname']:null;
    $itemprice = isset($_POST['itemprice']) ? $_POST['itemprice']:null;
    $itempost = isset($_POST['itempost']) ? $_POST['itempost']:null;
    $itemdesc = isset($_POST['itemdesc']) ? $_POST['itemdesc']:null;
    $itemboon = isset($_POST['itemboon']) ? $_POST['itemboon']:null;
    $catego = isset($_POST['catego']) ? $_POST['catego']:null;

    if($im !== null && $itemname !== null && $itemprice !== null && $itempost !== null && $itemdesc !== null && $itemboon !== null) {
        $new_item_sql = "INSERT INTO item (category, img, name, descript, price, post, boon) VALUES ('$catego', '$im', '$itemname', '$itemdesc', '$itemprice', '$itempost', '$itemboon')";
        $new_item_result = mysqli_query($conn, $new_item_sql);
        if($new_item_result !== false) {
            echo "
                <script>
                    alert('상품 등록이 완료되었습니다.');
                    location = 'manager.php?whcate=".$catego."';
                    localStorage.setItem('new', 3);
                </script>
            ";
        }
    }

    $dele = isset($_GET['dele']) ? $_GET['dele']:null;

    $ser = isset($_POST['ser']) ? $_POST['ser']:null;

    $cate = isset($_POST['cate']) ? $_POST['cate']:null;
    $title = isset($_POST['title']) ? $_POST['title']:null;

    $catee = isset($_POST['catee']) ? $_POST['catee']:null;
    $titlee = isset($_POST['titlee']) ? $_POST['titlee']:null;
    $iiiddd = isset($_POST['iidd']) ? $_POST['iidd']:null;

    if($catee !== null && $titlee !== null && $iiiddd !== null) {
        $up_sql = "UPDATE notices SET category = '$catee', descript = '$titlee' WHERE id = $iiiddd";
        $up_result = mysqli_query($conn, $up_sql);
        if($up_result !== false) {
            echo "
                <script>
                    alert('글이 수정 완료되었습니다.');
                    location = 'manager.php';
                    localStorage.setItem('key', 1);
                </script>
            ";
        }
    }

    if($cate !== null && $title !== null) {
        $new_sql = "INSERT INTO notices (category, descript) VALUES ('$cate', '$title')";
        $new_result = mysqli_query($conn, $new_sql);
        if($new_result !== false) {
            echo "
                <script>
                    alert('글이 등록 완료되었습니다.');
                    location = 'manager.php';
                    localStorage.setItem('key', 1);
                </script>
            ";
        }
    }

    if($dele !== null) {
        $delete_sql = "DELETE FROM notices WHERE id = $dele";
        $result_delete = mysqli_query($conn, $delete_sql);
        if($result_delete !== false) {
            echo"
                <script>
                    alert('해당 글이 삭제가 완료되었습니다.');
                    location = 'manager.php';
                    localStorage.setItem('key', 1);
                </script>
            ";
        }
    }

    $user_sql = "SELECT * FROM user ORDER BY created_at DESC";
    $result = mysqli_query($conn, $user_sql);

    if($ser === null) {
        $notice_sql = "SELECT id, category, descript, DATE_FORMAT(da, '%Y-%m-%d') AS da FROM notices ORDER BY da DESC";    
    } else {
        $notice_sql = "SELECT id, category, descript, DATE_FORMAT(da, '%Y-%m-%d') AS da FROM notices WHERE descript like '$ser%' ORDER BY da DESC";
    }
    $result_notice = mysqli_query($conn, $notice_sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="manager.css">
    <script src="js/manager.js"></script>
</head>
<body>
    <div id="wrap">
        <div class="login_box">
            <div class="logbox"></div>
        </div>
        <div class="manager_me">
            <div class="mana_me"><p>관리자: <?php echo $_SESSION['manager_id'];?><br><a href="logout.php">로그아웃</a></p></div>
        </div>

        <div class="manager_side">
            <div class="manager_side_logo">
                <img src="image/로고4.png" alt="">
            </div>
            <div class="manager_side_menu">
                <article><p>관리자</p></article>
                <label class="modal_btn" onclick="move1()" for="manager_modal1"><p>회원 관리</p><span>></span></label>
                <label class="modal_btn2" onclick="move2()" for="manager_modal2"><p>공지사항 관리</p><span>></span></label>
                <label class="modal_btn3" onclick="move3()" for="manager_modal3"><p>판매상품 관리</p><span>></span></label>
                <div class="move_btn">회원 관리</div>
            </div>
        </div>
        <div class="manager_body">
            <input type="radio" class="mana" name="manager_modal" id="manager_modal1" checked>
            <input type="radio" class="mana" name="manager_modal" id="manager_modal2">
            <input type="radio" class="mana" name="manager_modal" id="manager_modal3">
            <div class="modalbox1">
                <div class="modal1">
                    <div class="title_box">
                        <div class="title">
                            <h1><span>회</span>원 관리</h1>
                        </div>
                    </div>
                    <div class="table_container">
                        <table border="1">
                            <tr>
                                <th>아이디</th>
                                <th>비밀번호_해시</th>
                                <th>유저이름</th>
                                <th>이메일</th>
                                <th>가입일자</th>
                            </tr>
                            <?php 
                                if($result !== false) {
                                    if(mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $user_id = $row['user_id'];
                                            $hash_password = $row['hash_password'];
                                            $user_name = $row['user_name'];
                                            $email = $row['email'];
                                            $created_at = $row['created_at'];
                                            echo '<tr>';
                                            echo '<td>'.$user_id.'</td>';
                                            echo '<td>'.$hash_password.'</td>';
                                            echo '<td style="text-align: center;">'.$user_name.'</td>';
                                            echo '<td>'.$email.'</td>';
                                            echo '<td style="text-align: center;">'.$created_at.'</td>';
                                            echo '</tr>';

                                        }
                                    }else {
                                        echo'<p>데이터가 없습니다.</p>';
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modalbox2">
                <div class="modal2">

                <input type="radio" name="up_notice" id="up_notice_open">
                    <input type="radio" name="up_notice" id="up_notice_close">
                    <div class="up_notice_container">
                        <div class="up_notice_box">
                            <div class="up_notice">
                                <div class="up_notice_header">
                                    <h1>글 수정</h1>
                                    <label for="up_notice_close">
                                        <div class="ex_box"></div>
                                    </label>
                                </div>
                                <?php
                                    $noid = isset($_GET['noid']) ? $_GET['noid']: null;
                                    if($noid !== null) {
                                        $up_select_sql = "SELECT * FROM notices WHERE id = $noid";
                                        $up_select_result = mysqli_query($conn, $up_select_sql);
                                        if($up_select_result !== false) {
                                            $row2 = mysqli_fetch_assoc($up_select_result);
                                            $descriptt = $row2['descript'];
                                            $categoryt = $row2['category'];
                                            $categoryt = $row2['category'];
                                            $iidd = $row2['id'];
                                        }
                                    }
                                ?>
                                <form action="manager.php" id="up_notice" method="POST">
                                <div class="up_notice_body">
                                    <div>
                                        <div>
                                            <label for="catee">유형</label>
                                            <select name="catee" id="catee">
                                                <option value="">유형을 선택해주세요</option>
                                                <option <?php if($categoryt === "nomal"){echo 'selected';}?> value="nomal">일반</option>
                                                <option <?php if($categoryt === "event"){echo 'selected';}?> value="event">이벤트</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label for="titlee">제목</label>
                                            <input type="text" name="titlee" id="titlee" placeholder=" 제목을 입력하세요" value="<?php echo$descriptt;?>">
                                            <input type="hidden" name="iidd" id="iidd" value="<?php echo$iidd;?>">
                                        </div>
                                    </div>
                                    <input type="submit" value="수정하기">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <input type="radio" name="new_notice" id="new_notice_open">
                    <input type="radio" name="new_notice" id="new_notice_close">
                    <div class="new_notice_container">
                        <div class="new_notice_box">
                            <div class="new_notice">
                                <div class="new_notice_header">
                                    <h1>새 글쓰기</h1>
                                    <label for="new_notice_close">
                                        <div class="ex_box"></div>
                                    </label>
                                </div>
                                <form action="manager.php" id="new_notice" method="POST">
                                <div class="new_notice_body">
                                    <div>
                                        <div>
                                            <label for="cate">유형</label>
                                            <select name="cate" id="cate">
                                                <option value="">유형을 선택해주세요</option>
                                                <option value="nomal">일반</option>
                                                <option value="event">이벤트</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label for="title">제목</label>
                                            <input type="text" name="title" id="title" placeholder=" 제목을 입력하세요">
                                        </div>
                                    </div>
                                    <input type="submit" value="등록하기">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="title_box">
                        <div class="title">
                            <h1><span>공</span>지사항 관리</h1>
                            <form action="manager.php" id="forr" method="POST">
                                <input type="text" name="ser" id="ser" placeholder=" 제목을 입력해주세요">
                                <input type="submit" value="검색">
                            </form>
                        </div>
                    </div>
                    <div class="notice_container">
                        <table border="1">
                            <tr>
                                <th>유형</th>
                                <th>제목</th>
                                <th>공지일자</th>
                                <th colspan="2">관리</th>
                            </tr>
                            <?php
                                if($result_notice !== false) {
                                    if(mysqli_num_rows($result_notice) > 0) {
                                        while($row1 = mysqli_fetch_assoc($result_notice)) {
                                            $category = $row1['category'];
                                            $descript = $row1['descript'];
                                            $da = $row1['da'];
                                            switch($category) {
                                                case"nomal":
                                                    $category = "일반";
                                                    break;
                                                case"event":
                                                    $category = "이벤트";
                                                    break;
                                            }
                                            echo'<tr>';
                                            echo '<td>'.$category.'</td>';
                                            echo '<td>'.$descript.'</td>';
                                            echo '<td style="text-align: center;">'.$da.'</td>';
                                            echo '<td style="text-align: center;"><a class="updatebtn" style="text-decoration: none;color:white" href="manager.php?noid='.$row1['id'].'">수정</a></td>';
                                            echo '<td style="text-align: center;"><a class="deletebtn" style="text-decoration: none;" href="manager.php?dele='.$row1['id'].'">삭제</a></td>';
                                            echo'</tr>';
                                        }
                                        if($ser !== null && mysqli_num_rows($result_notice) >= 1) {
                                            echo'<tr><td style="text-align: center;" colspan="5"><a href="manager.php" class="loa">돌아가기</a></td></tr>';
                                        }
                                    } else {
                                        echo'<tr><td style="text-align: center;" colspan="5">"'.$ser.'"의 대한 검색결과가 없습니다.<br><a href="manager.php" class="loa">돌아가기</a></td></tr>';
                                    }
                                }
                            ?>
                        </table>
                    </div>
                    <div class="notice_footer">
                        <label for="new_notice_open">글쓰기 +</label>
                    </div>
                </div>
            </div>
            <div class="modalbox3">
                <div class="modal3">


                <input type="radio" name="hot_item" id="hot_item_open">
                <input type="radio" name="hot_item" id="hot_item_close">
                <div class="hot_item_container">
                    <form action="manager.php" method="POST">
                    <div class="hot_item_box">
                        <div class="hot_item_modal">
                            <div class="hot_item_header">
                                <h1 style="text-align: center;"><?php echo $whcate;?> 인기상품 <br> 등록/변경</h1>
                                <label for="hot_item_close"><div class="hot_close"></div></label>
                            </div>
                            <div class="hot_item_body">
                                <div class="hot_item_show">
                                    <div class="hot_item_show_box">
                                        <input type="hidden" name="hot_item_value" value="<?php echo$hot_item;?>">
                                        <input type="hidden" name="hot_item_cate" value="<?php echo$whcate;?>">
                                        <?php
                                            $hot_item_select_sql = "SELECT * FROM item WHERE category = '".$whcate."'";
                                            $hot_item_select_result = mysqli_query($conn, $hot_item_select_sql);
                                            if($hot_item_select_result !== false) {
                                                if(mysqli_num_rows($hot_item_select_result) > 0) {
                                                    while($hot_item_select_row = mysqli_fetch_assoc($hot_item_select_result)) {
                                                        $style1 = '';
                                                        $style2 = 'style="color: black;"';
                                                        if($hot_item === $hot_item_select_row['id']){
                                                            $style1 = 'style="background-color: orangered;"';
                                                            $style2 = 'style="color: white;"';
                                                        }
                                                        echo '<a '.$style1.' onclick="hot_item()" href="manager.php?whcate='.$whcate.'&hot_item='.$hot_item_select_row['id'].'&deas='.$deas.'" class="hot_item_div">';
                                                        echo '<img src="image/'.$hot_item_select_row['category'].'/'.$hot_item_select_row['img'].'" alt="">';
                                                        echo '<div '.$style2.' class="hot_item_text">'.$hot_item_select_row['name'].'</div>';
                                                        echo '</a>';
                                                    }
                                                } else {
                                                    echo'데이터가 없습니다.';
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="select_option">
                                    <input onclick="op1()" type="radio" name="option" id="option1" value="10000">
                                    <label for="option1">10,000원 할인</label>
                                    <input onclick="op2()" type="radio" name="option" id="option2" value="10">
                                    <label for="option2">10% 할인</label>
                                    <input onclick="op3()" type="radio" name="option" id="option3" value="30">
                                    <label for="option3">30% 할인</label>
                                </div>
                                <div class="hot_bin_box"></div>
                                <div class="hot_item_sumit_box">
                                    <input type="submit" value="등록하기">
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                    <input type="radio" name="newitem" id="newitemopen">
                    <input type="radio" name="newitem" id="newitemclose">
                    <div class="new_item_container">
                        <form action="manager.php" method="POST" id="new_item_fo">
                        <div class="new_item_box">
                            <div class="new_item">
                                <div class="new_item_header">
                                    <h1>상품등록</h1>
                                    <label for="newitemclose"><div class="newitemclo"></div></label>
                                </div>
                                <div class="new_item_body">
                                    <div class="new_item_body2">
                                            <input type="file" name="im" id="im">
                                            <label for="im">이미지 선택</label>
                                            <label for="im">이미지 미리보기</label>
                                            <div class="show_img" id="show_img"></div>
                                    </div>
                                    <div class="new_item_body1">
                                        <div class="new_item_body1-1">
                                            <div>
                                                <label for="itemname">제품명</label>
                                                <input type="text" name="itemname" id="itemname" placeholder=" 제품명을 입력하세요">
                                            </div>
                                            <div>
                                                <label for="itemprice">제품가격</label>
                                                <input type="number" name="itemprice" id="itemprice" placeholder=" 제품가격을 입력하세요">
                                            </div>
                                            <div>
                                                <label for="itempost">배송비용</label>
                                                <input type="number" name="itempost" id="itempost" placeholder=" 배송비용을 입력하세요">
                                            </div>
                                        </div>
                                        <div class="new_item_body1-2">
                                            <div>
                                                <label for="itemdesc">제품설명</label>
                                                <textarea name="itemdesc" id="itemdesc"  placeholder=" 제품설명을 입력하세요"></textarea>
                                            </div>
                                            <div>
                                                <label for="itemboon">결제혜택</label>
                                                <textarea name="itemboon" id="itemboon" placeholder=" 결제혜택을 입력하세요"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new_item_body3">
                                        <p>카테고리</p>
                                        <input type="radio" name="catego" id="categono" checked>
                                        <div>
                                            <input type="radio" name="catego" id="catego1" value="건강식품">
                                            <label for="catego1">건강식품</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="catego" id="catego2" value="디지털">
                                            <label for="catego2">디지털</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="catego" id="catego3" value="팬시">
                                            <label for="catego3">팬시</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="catego" id="catego4" value="향수">
                                            <label for="catego4">향수</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="catego" id="catego5" value="헤어케어">
                                            <label for="catego5">헤어케어</label>
                                        </div>
                                    </div>
                                    <div class="new_item_body4">
                                        <input type="submit" value="등록">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>


                    <input type="radio" name="newitem1" id="newitemopen1">
                    <input type="radio" name="newitem1" id="newitemclose1">
                    <div class="new_item_container1">
                        <form action="manager.php?whcate=<?php echo$whcate;?>" method="POST" id="update_item">
                        <input type="hidden" name="update_id" value="<?php echo $itemupdate_row['id'];?>">
                        <div class="new_item_box">
                            <div class="new_item">
                                <div class="new_item_header">
                                    <h1>상품수정</h1>
                                    <label for="newitemclose1"><div class="newitemclo"></div></label>
                                </div>
                                <div class="new_item_body">
                                    <div class="new_item_body2">
                                            <input type="file" name="im1" id="im1">
                                            <label for="im">이미지 선택</label>
                                            <label for="im">이미지 미리보기</label>
                                            <div class="show_img" id="show_imgg">
                                                <img src="image/<?php echo $itemupdate_row['category'].'/'.$itemupdate_row['img'];?>" alt="">
                                            </div>
                                    </div>
                                    <div class="new_item_body1">
                                        <div class="new_item_body1-1">
                                            <div>
                                                <label for="itemname1">제품명</label>
                                                <input type="text" name="itemname1" id="itemname1" placeholder=" 제품명을 입력하세요" value="<?php echo$itemupdate_row['name'];?>">
                                            </div>
                                            <div>
                                                <label for="itemprice1">제품가격</label>
                                                <input type="number" name="itemprice1" id="itemprice1" placeholder=" 제품가격을 입력하세요" value="<?php echo$itemupdate_row['price'];?>">
                                            </div>
                                            <div>
                                                <label for="itempost1">배송비용</label>
                                                <input type="number" name="itempost1" id="itempost1" placeholder=" 배송비용을 입력하세요" value="<?php echo$itemupdate_row['post'];?>">
                                            </div>
                                        </div>
                                        <div class="new_item_body1-2">
                                            <div>
                                                <label for="itemdesc1">제품설명</label>
                                                <textarea name="itemdesc1" id="itemdesc1"  placeholder=" 제품설명을 입력하세요"><?php echo$itemupdate_row['descript'];?></textarea>
                                            </div>
                                            <div>
                                                <label for="itemboon1">결제혜택</label>
                                                <textarea name="itemboon1" id="itemboon1" placeholder=" 결제혜택을 입력하세요"><?php echo$itemupdate_row['boon'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new_item_body3">
                                        <p>카테고리</p>
                                        <input type="hidden" name="catego1" id="categono1" value="non" checked>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '건강식품'){echo'checked';}?> type="radio" name="catego1" id="catego11" value="건강식품">
                                            <label for="catego11">건강식품</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '디지털'){echo'checked';}?> type="radio" name="catego1" id="catego12" value="디지털">
                                            <label for="catego12">디지털</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '팬시'){echo'checked';}?> type="radio" name="catego1" id="catego13" value="팬시">
                                            <label for="catego13">팬시</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '향수'){echo'checked';}?> type="radio" name="catego1" id="catego14" value="향수">
                                            <label for="catego14">향수</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '헤어케어'){echo'checked';}?> type="radio" name="catego1" id="catego15" value="헤어케어">
                                            <label for="catego15">헤어케어</label>
                                        </div>
                                    </div>
                                    <div class="new_item_body4">
                                        <input type="submit" value="수정">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>



                    <div class="title_box">
                        <div class="title">
                            <h1><span>판</span>매상품 관리</h1>
                            <div class="item_control_box">
                                <a style="<?php if($whcate === "건강식품") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=건강식품&deas=<?php echo $deas;?>">건강식품</a>
                                <a style="<?php if($whcate === "디지털") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=디지털&deas=<?php echo $deas;?>">디지털</a>
                                <a style="<?php if($whcate === "팬시") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=팬시&deas=<?php echo $deas;?>">팬시</a>
                                <a style="<?php if($whcate === "향수") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=향수&deas=<?php echo $deas;?>">향수</a>
                                <a style="<?php if($whcate === "헤어케어") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=헤어케어&deas=<?php echo $deas;?>">헤어케어</a>
                            </div>
                        </div>
                    </div>
                    <div class="item_table_container">
                        <table border="1">
                            <tr>
                                <th>제품사진</th>
                                <th>제품명</th>
                                <th>제품설명</th>
                                <th>제품<br>가격</th>
                                <th>배송<br>비용</th>
                                <th>결제혜택</th>
                                <th>인기<br>상품</th>
                                <th>등록일자</th>
                                <th colspan="2">관리</th>
                            </tr>
                            <?php
                            if($whcate_result !== false) {
                                if(mysqli_num_rows($whcate_result) > 0) {
                                    while($whrow = mysqli_fetch_assoc($whcate_result)) {
                                        $hot_mark = $whrow['hap'];
                                        switch($hot_mark) {
                                            case 10000:
                                                $hot_mark = "10,000원 <br> 할인";
                                                break;
                                            case 10:
                                                $hot_mark = "10% <br> 할인";
                                                break;
                                            case 30:
                                                $hot_mark = "30% <br> 할인";
                                                break;
                                            case '':
                                                $hot_mark = "X";
                                                break;
                                        }
                                        echo'<tr>';
                                        echo '<td><img src="image/'.$whrow["category"].'/'.$whrow['img'].'" alt=""></td>';
                                        echo '<td>'.$whrow['name'].'</td>';
                                        echo '<td>'.$whrow['descript'].'</td>';
                                        echo '<td class="korea_money">'.$whrow['price'].'</td>';
                                        echo '<td class="korea_money">'.$whrow['post'].'</td>';
                                        echo '<td>'.$whrow['boon'].'</td>';
                                        echo '<td style="text-align: center;">'.$hot_mark.'</td>';
                                        echo '<td>'.$whrow['date'].'</td>';
                                        echo '<td><a onclick="itemupdate()" href="manager.php?whcate='.$whcate.'&itemupdate='.$whrow['id'].'&deas='.$deas.'" class="item_up_btn">수정</a></td>';
                                        echo '<td><a class="item_de_btn" href="manager.php?whcate='.$whcate.'&itemdelete='.$whrow['id'].'&deas='.$deas.'">삭제</a></td>';
                                        echo'</tr>';
                                    }
                                } else {
                                    echo'
                                        <tr><td colspan="9">데이터가 없습니다.</td></tr>
                                    ';
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="item_footer">
                        <label for="newitemopen">상품등록 +</label>
                        <label for="hot_item_open"><?php echo $whcate;?> 인기상품 등록/변경 +</label>
                        <div class="item_asc_desc">
                            <a style="<?php if($deas === 'DESC'){echo 'background-color: orangered;color:white;';}?>" class="deas_btn" href="manager.php?whcate=<?php echo$whcate;?>&deas=DESC">최신순</a>
                            <a style="<?php if($deas === 'ASC'){echo 'background-color: orangered;color:white;';}?>" class="deas_btn" href="manager.php?whcate=<?php echo$whcate;?>&deas=ASC">오래된순</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>