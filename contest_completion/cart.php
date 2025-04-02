<?php
session_start();
$id;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
} else {
    $id = null;
}
$conn = mysqli_connect("localhost", "root", "", "gifts");
$cart_sql = "SELECT c.item_id, i.img, i.category, i.post, i.price, d.hap, i.name, COUNT(c.hap) AS total FROM cart c JOIN item i ON c.item_id = id LEFT JOIN discount d ON i.id = d.id WHERE c.user_id = '$id' GROUP BY i.img, i.category, i.price, d.hap, i.name, c.item_id, i.post";
$cart_result = mysqli_query($conn, $cart_sql);

$updel = isset($_GET['updel']) ? $_GET['updel']:null;
$user = isset($_GET['user']) ? $_GET['user']:null;
$item = isset($_GET['item']) ? $_GET['item']:null;

if($updel !== null && $user !== null && $item !== null) {
    if($updel === "insert") {
        $cart_up_sql = "INSERT INTO cart (user_id, item_id, hap) VALUES ('$user', $item, 1)";
        $cart_up_result = mysqli_query($conn, $cart_up_sql);
        if($cart_up_result !== false) {
            echo "
                <script>
                    location = 'cart.php#contents_textbox';
                </script>
            ";
        }
    } else if ($updel === "delete") {
        $cart_down_sql = "DELETE FROM cart WHERE user_id = '$user' AND item_id = $item LIMIT 1";
        $cart_down_result = mysqli_query($conn, $cart_down_sql);
        if($cart_down_result !== false) {
            echo "
                <script>
                    location = 'cart.php#contents_textbox';
                </script>
            ";
        }
    }
}
$total_price = 0;
$posti = 0;
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
    <script src="js/cart.js"></script>
</head>
<body>
    <div id="wrap">
    <?php include 'second/login_user.php';?>
    <?php include 'second/new_user.php';?>
        <?php include 'second/header.php';?>
        <div class="contents">
            <div class="contents_textbox" id="contents_textbox">
                <h1><span>GIFTS:Mall</span> 장바구니</h1>
                <p><span style="font-weight: 100;color: white;">GIFTS:Mall</span> 홈페이지에 오신것을 환영합니다.</p>
            </div>
        </div>
        <div class="cart_container">
            <div class="show_cart_box">
                <?php
                    if($cart_result !== false) {
                        if(mysqli_num_rows($cart_result) > 0) {
                            while($cart_row = mysqli_fetch_assoc($cart_result)) {
                                $hap = $cart_row['hap'];
                                $container_price = 0;
                                $price = $cart_row['price'];
                                if($hap !== null) {
                                    if($hap == 10) {
                                        $hap = $hap / 100;
                                        $container_price = $price * $hap;
                                        $price = $price - $container_price;
                                    } else if($hap == 30) {
                                        $hap = $hap / 100;
                                        $container_price = $price * $hap;
                                        $price = $price - $container_price;
                                    } else if($hap == 10000) {
                                        $price = $price - 10000;
                                    }
                                }
                                $posti += $cart_row['post'];
                                $total_price += $price * $cart_row['total'];
                                if($total_price >= 20000) {
                                    $posti = '0';
                                }
                                echo'<div class="cart_item_box">';
                                echo'<img src="image/'.$cart_row['category'].'/'.$cart_row['img'].'" alt="">';
                                echo'<p class="item_name_box">'.$cart_row['name'].'<br><br><span class="onlyone">'.$price.'</span></p>';
                                echo'<div class="up_down_btn">
                                    <a href="cart.php?updel=delete&user='.$id.'&item='.$cart_row['item_id'].'#contents_textbox">-</a>
                                    <span>'.$cart_row['total'].'</span>
                                    <a href="cart.php?updel=insert&user='.$id.'&item='.$cart_row['item_id'].'#contents_textbox">+</a>
                                    </div>';
                                echo'<div class="item_shop_post_box">'.$cart_row['post'].'</div>';
                                echo'<div class="item_price_box">'.($price * $cart_row['total']).'</div>';
                                echo'</div>';
                            }
                        } else {
                            echo '<h1 class="no_num_cart">장바구니에 담긴 상품이 없습니다.</h1>';
                        }
                    }
                ?>
            </div>
            <div class="total_box">
                <div class="by_show_box">
                    <div class="total_by_box">
                        <h2>결제 예정금액</h2>
                        <p class="total_show_box">상품금액 <span class="total_show_hap"><?php echo $total_price?></span></p>
                        <p class="post_show_box">배송비 <span class="total_show_post"><?php echo $posti?></span></p>
                        <div class="total_post_hap">합계 <span class="total_post_hap_show"><?php echo $total_price + $posti?></span></div>
                        <button>구매하기</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'second/footer.php';?>
    </div>
</body>
</html>