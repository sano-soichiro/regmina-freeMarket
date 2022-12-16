<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/textbox_style.css">
    <link rel="stylesheet" href="./css/complete.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php require_once './tpl/fonts.php'; ?>
    <title>REGMINA</title>
</head>
<body>
    <section id="complete">
        <div class="complete_wrapper2">
            <div class="complete_heading">注文が完了しました</div>
            <div class="complete_item2">
               <div class="complete_img"><img src="<?php echo $dir_img ; ?>" alt=""></div>
               <div class="complete_unit">
                  <div class="complete_product_unit" >
                     <div class="complete_product_name"><?php echo $cart[0]['products_name']; ?></div>
                     <div class="complete_product_seller"><?php echo $cart[0]['user_name']; ?></div>
                  </div>
                  <div class="complete_product_unit">
                     <div class="complete_product_price">￥ <?php echo $cart[0]['price']; ?></div>
                  </div>
               </div>
            </div>
            <a class="to_home_btn" href="./index.php">ホームへ戻る</a>
        </div>
    </section>
</body>
</html>