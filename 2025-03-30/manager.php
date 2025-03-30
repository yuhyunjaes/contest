<?php
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

    if($whcate !== null) {
        $whcate_sql = "SELECT id, category, img, name, descript, price, post, boon, discount, DATE_FORMAT(date, '%Y-%m-%d') AS date FROM item WHERE category = '$whcate'";
        $whcate_result = mysqli_query($conn, $whcate_sql);
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
                    location = 'manager.php';
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
            <div class="mana_me"><p>관리자</p></div>
        </div>

        <div class="manager_side">
            <div class="manager_side_logo">
                <img src="image/로고4.png" alt="">
            </div>
            <div class="manager_side_menu">
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
                        <label for="new_notice_open">글쓰기</label>
                    </div>
                </div>
            </div>
            <div class="modalbox3">
                <div class="modal3">
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
                                        <input type="hidden" name="catego" id="categono" value="non">
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
                        <form action="manager.php" method="POST" id="update_item">
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
                                                <label for="itemname">제품명</label>
                                                <input type="text" name="itemname" id="itemname" placeholder=" 제품명을 입력하세요" value="<?php echo$itemupdate_row['name'];?>">
                                            </div>
                                            <div>
                                                <label for="itemprice">제품가격</label>
                                                <input type="number" name="itemprice" id="itemprice" placeholder=" 제품가격을 입력하세요" value="<?php echo$itemupdate_row['price'];?>">
                                            </div>
                                            <div>
                                                <label for="itempost">배송비용</label>
                                                <input type="number" name="itempost" id="itempost" placeholder=" 배송비용을 입력하세요" value="<?php echo$itemupdate_row['post'];?>">
                                            </div>
                                        </div>
                                        <div class="new_item_body1-2">
                                            <div>
                                                <label for="itemdesc">제품설명</label>
                                                <textarea name="itemdesc" id="itemdesc"  placeholder=" 제품설명을 입력하세요"><?php echo$itemupdate_row['descript'];?></textarea>
                                            </div>
                                            <div>
                                                <label for="itemboon">결제혜택</label>
                                                <textarea name="itemboon" id="itemboon" placeholder=" 결제혜택을 입력하세요"><?php echo$itemupdate_row['boon'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new_item_body3">
                                        <p>카테고리</p>
                                        <input type="hidden" name="catego" id="categono" value="non" checked>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '건강식품'){echo'checked';}?> type="radio" name="catego" id="catego1" value="건강식품">
                                            <label for="catego1">건강식품</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '디지털'){echo'checked';}?> type="radio" name="catego" id="catego2" value="디지털">
                                            <label for="catego2">디지털</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '팬시'){echo'checked';}?> type="radio" name="catego" id="catego3" value="팬시">
                                            <label for="catego3">팬시</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '향수'){echo'checked';}?> type="radio" name="catego" id="catego4" value="향수">
                                            <label for="catego4">향수</label>
                                        </div>
                                        <div>
                                            <input <?php if($itemupdate_row['category'] === '헤어케어'){echo'checked';}?> type="radio" name="catego" id="catego5" value="헤어케어">
                                            <label for="catego5">헤어케어</label>
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
                                <a style="<?php if($whcate === "건강식품") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=건강식품">건강식품</a>
                                <a style="<?php if($whcate === "디지털") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=디지털">디지털</a>
                                <a style="<?php if($whcate === "팬시") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=팬시">팬시</a>
                                <a style="<?php if($whcate === "향수") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=향수">향수</a>
                                <a style="<?php if($whcate === "헤어케어") {echo'background-color: orangered;color: white;';}?>" class="cate_control" href="manager.php?whcate=헤어케어">헤어케어</a>
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
                                <th>등록시간</th>
                                <th colspan="2">관리</th>
                            </tr>
                            <?php
                            if($whcate_result !== false) {
                                if(mysqli_num_rows($whcate_result) > 0) {
                                    while($whrow = mysqli_fetch_assoc($whcate_result)) {
                                        echo'<tr>';
                                        echo '<td><img src="image/'.$whrow["category"].'/'.$whrow['img'].'" alt=""></td>';
                                        echo '<td>'.$whrow['name'].'</td>';
                                        echo '<td>'.$whrow['descript'].'</td>';
                                        echo '<td>'.$whrow['price'].'</td>';
                                        echo '<td>'.$whrow['post'].'</td>';
                                        echo '<td>'.$whrow['boon'].'</td>';
                                        echo '<td>'.$whrow['discount'].'</td>';
                                        echo '<td>'.$whrow['date'].'</td>';
                                        echo '<td><a onclick="itemupdate()" href="manager.php?whcate='.$whcate.'&itemupdate='.$whrow['id'].'" class="item_up_btn">수정</a></td>';
                                        echo '<td><a class="item_de_btn" href="">삭제</a></td>';
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
                        <label for="newitemopen">상품등록</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>