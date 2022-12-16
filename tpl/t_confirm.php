<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/textbox_style.css">
      <link rel="stylesheet" href="./css/t_confirm_style.css">
      <link rel="stylesheet" href="./css/navigation.css">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <?php require_once './tpl/fonts.php'; ?>
      <title>REGMINA</title>
   </head>

   <body>
      <div id="purchase_confirm_area">
         <div class="purchase_group">
            <div class="purchase_head">商品のご注文</div>
            <div class="purchase_group_top">
               <div class="purchase_img"><img src="<?php echo $dir_img ; ?>" alt=""></div>
               <div class="purchase_content">
                  <p class="purchase_title"><?php echo $cart[0]['products_name']; ?></p>
                  <p class="purchase_price">￥ <?php echo $cart[0]['price']; ?></p>
                  <p class="purchase_buyer">by <a href="#"><?php echo $cart[0]['user_name']; ?></a></p>
               </div>
            </div>
            <div class="purchase_group_bottom">
               <div class="purchase_content_head">購入内容</div>
               <div class="purchase_unit"><div class="purchase_content_title"><p class="purchase_content_01">商品：</p><p class="purchase_content_02"><?php echo $cart[0]['products_name']; ?></p></div><div class="purchase_price">￥ <?php echo $cart[0]['price']; ?></div></div>
               <div class="purchase_unit"><div class="purchase_content_title"><p class="purchase_content_01">配送料：</p><p class="purchase_content_02"><?php echo $address[0]['prefecture']; ?></p></div><div class="purchase_price">￥ <?php echo $postage; ?></div></div>
               <div class="page_border"></div>
               <div class="purchase_unit"><div class="purchase_content_total">合計金額：</div><div class="purchase_total_price">￥ <?php echo $sum; ?></div></div>
            </div>
         </div>
         <div class="address_group">
            <div class="address_content">
               <div class="address_content_head">登録済みの住所</div>
               <div class="address_unit"><div class="address_content_title">郵便番号</div><div class="address_content_postcode"><?php echo $address[0]['post_num']; ?></div></div>
               <div class="address_unit"><div class="address_content_title">都道府県</div><div class="address_content_prefecture"><?php echo $address[0]['prefecture']; ?></div></div>
               <div class="address_unit"><div class="address_content_title">市区町村</div><div class="address_content_city"><?php echo $address[0]['city_name']; ?></div></div>
               <div class="address_unit"><div class="address_content_title">番地</div><div class="address_content_address"><?php echo $address[0]['address']; ?></div></div>
               <div class="address_unit"><div class="address_content_title">建物名</div><div class="address_content_address"></div></div>
            </div>
            <form action="./t_confirm.php" method="post" class="tip_content">
               <div class="boost_head">チップ</div>
               <p class="boost_text">チップとは、商品の代金にお好きな金額を上乗せして購入できる機能です。<br>チップされた金額は、サービス利用料を除きすべて出品者に支払われます。</p>
               <div class="boost_textbox"><input class="input_text" type="text" name="tip" value="<?php echo isset($_POST['tip']) ? $_POST['tip'] : '' ;?>"><p class="yen">円</p></div>
               <p class="error_text"><?php echo isset($error['tip']) ? $error['tip'] : ''; ?></p>
               <div class="button_wrapper"><button class="color_button" type="submit" name="button" value="submit">支払選択へ</button></div>
            </form>
         </div>
      </div>
   </body>   
</html>