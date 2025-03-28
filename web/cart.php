<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <div id="wrap">
    <?php include 'second/login_user.php';?>
    <?php include 'second/new_user.php';?>
        <?php include 'second/header.php';?>
        <div class="contents">
            <div class="contents_textbox">
                <h1><span>GIFTS:Mall</span> 장바구니</h1>
                <p><span style="font-weight: 100;color: white;">GIFTS:Mall</span> 홈페이지에 오신것을 환영합니다.</p>
            </div>
        </div>
        <div class="cart_container">
        <form action="#" method="POST">
            <table border="1">
                <tr>
                    <th><input type="checkbox"></th>
                    <th colspan="2">상품</th>
                    <th>수량</th>
                    <th>단가</th>
                    <th>배송비</th>
                    <th>총액</th>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="7"></td>
                </tr>
            </table>
        </form>
        </div>
        <?php include 'second/footer.php';?>
    </div>
</body>
</html>