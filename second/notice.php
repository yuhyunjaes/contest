
<?php
$conn = mysqli_connect("localhost", "root", "", "web");
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
    <title>공지사항</title>
    <link rel="stylesheet" href="css/notice.css">
</head>
<body>
    <div id="wrap">
        <div class="noticebox">
            <div class="notice_header">
                <h1>공지사항</h1>
            </div>
            <div class="notice_controll">
                <div class="day">
                    <b>날짜:</b>
                    <a style="<?php if($orderby === 'ASC'){echo'color: orangered;';}else{echo'color:black;';}?>" href="notice.php?page=<?php echo$page?>&orderby=ASC&title=<?php echo$title?>">오름차순</a>
                    <a style="<?php if($orderby === 'DESC'){echo'color: orangered;';}else{echo'color:black;';}?>" href="notice.php?page=<?php echo$page?>&orderby=DESC&title=<?php echo$title?>">내림차순</a>
                </div>
                <div class="title">
                    <b>종류:</b>
                    <a style="<?php if($title === 'nomal'){echo'color:orangered;';}else{echo'color:black';}?>" href="notice.php?page=1&orderby=<?php echo$orderby?>&title=nomal">일반</a>
                    <a style="<?php if($title === 'event'){echo'color:orangered;';}else{echo'color:black';}?>" href="notice.php?page=1&orderby=<?php echo$orderby?>&title=event">이벤트</a>
                    <a style="<?php if($title === 'all'){echo'color:orangered;';}else{echo'color:black';}?>" href="notice.php?page=1&orderby=<?php echo$orderby?>&title=all">모두보기</a>
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
                            echo '<script>location="notice.php?page=1&orderby='.$orderby.'&title='.$title.'"</script>';
                        }
                    }
                }
                ?>
            </div>
            <div class="btnbox">
                <div class="btbox">
                    <?php
                    if($page > 1) {
                        echo'<a class="back" href="notice.php?page='.($page - 1).'&orderby='.$orderby.'&title='.$title.'">이전</a>';
                    }
                    echo '<div>';

                     for($i = 1;$i <= $all_page;$i++) {
                        if($i === $page) {
                            echo'<span>'.$i.'</span>';
                        } else {
                            echo'<a href="notice.php?page='.$i.'&orderby='.$orderby.'&title='.$title.'">'.$i.'</a>';
                        }
                    }
                    echo '</div>';
                    if($page < $all_page) {
                        echo '<a class="next" href="notice.php?page='.($page + 1).'&orderby='.$orderby.'&title='.$title.'">다음</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
