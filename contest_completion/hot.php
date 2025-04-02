<?php
session_start();
$id;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    $id = null;
}

$conn = mysqli_connect("localhost", "root", "", "gifts");
$hot_item_sql = "SELECT i.id, i.category, i.img, i.name, i.descript, i.price, i.post, i.boon, DATE_FORMAT(i.date, '%Y-%m-%d') AS date, c.hap FROM item i JOIN discount c ON i.id = c.id AND i.category = c.category";
$hot_result = mysqli_query($conn, $hot_item_sql);

$item_id = isset($_GET['item_id']) ? $_GET['item_id']:null;

if($item_id !== null) {
    if($id === null) {
        echo"
            <script>
                alert('로그인이 필요합니다.');
                location = 'hot.php';
                localStorage.setItem('new_cart', 1);
            </script>
        ";
    }else {
        $cart_sql = "INSERT INTO cart (user_id, item_id, hap) VALUES ('$id', $item_id, 1)";
        $cart_result = mysqli_query($conn, $cart_sql);
        if($cart_result !== false) {
            echo "
            <script>
                alert('장바구니에 추가되었습니다.');
                location = 'hot.php#hot_container';
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
    <link rel="stylesheet" href="hot.css">
    <script src="js/hot.js"></script>
</head>
<body>
    <div id="wrap">
    <?php include 'second/login_user.php';?>
    <?php include 'second/new_user.php';?>
        <?php include 'second/header.php';?>
        <div class="contents">
            <div class="contents_textbox">
                <h1><span>GIFTS:Mall</span> 인기상품</h1>
                <p><span style="font-weight: 100;color: white;">GIFTS:Mall</span> 홈페이지에 오신것을 환영합니다.</p>
            </div>
        </div>
        <div class="hot_container" id="hot_container">
            <div class="hot_body">
                <?php
                    if($hot_result !== false) {
                        if(mysqli_num_rows($hot_result) > 0) {
                            while($all_item_row = mysqli_fetch_assoc($hot_result)) {
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
                                echo'<a class="cart_move" href="hot.php?item_id='.$all_item_row['id'].'&#hot_container"><div></div></a>';
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
                            echo'데이터가 없습니다.';
                        }
                    }
                ?>
            </div>
        </div>
        <?php include 'second/footer.php';?>
    </div>
</body>
</html>