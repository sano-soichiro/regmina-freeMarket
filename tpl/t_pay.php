<!DOCTYPE html>
<html lang = "ja">

   <head>
      <meta charset="UTF-8">
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
                  <p class="purchase_price"><?php echo $cart[0]['price']; ?></p>
                  <p class="purchase_buyer">by <a href="#"><?php echo $cart[0]['user_name']; ?></a></p>
               </div>
            </div>
            <div class="purchase_group_bottom">
               <div class="purchase_content_head">購入内容</div>
               <div class="purchase_unit">
                  <div class="purchase_content_title">
                     <p class="purchase_content_01">商品：</p>
                     <p class="purchase_content_02"><?php echo $cart[0]['products_name']; ?></p>
                  </div><div class="purchase_price">￥ <?php echo $cart[0]['price']; ?></div>
               </div>
               <div class="purchase_unit">
                  <div class="purchase_content_title">
                     <p class="purchase_content_01">チップ：</p>
                  </div>
                  <div class="purchase_price">￥ <?php echo $_COOKIE['tip']; ?></div>
               </div>
               <div class="purchase_unit">
                  <div class="purchase_content_title">
                     <p class="purchase_content_01">配送料：</p>
                     <p class="purchase_content_02"><?php echo $address[0]['prefecture']; ?></p>
                  </div>
                  <div class="purchase_price">￥ <?php echo $postage; ?></div>
               </div>
               <div class="page_border"></div>
               <div class="purchase_unit"><div class="purchase_content_total">合計金額：</div><div class="purchase_total_price">￥ <?php echo $sum; ?></div></div>
            </div>
         </div>
         <div class="address_group">
            <form action="./t_pay.php" method="post" class="tip_content">
               <div class="boost_head">クレジットカードを選択</div>
               <?php foreach($credit as $value): ?>
               <div class="credit_card">
                  <input id="c<?php echo $value['id']; ?>" class="credit_input_radio" type="radio" name="credit" value="<?php echo $value['id']; ?>">
                  <label for="c<?php echo $value['id']; ?>">
                     <div class="credit_wrapper">
                        <div class="credit_kind credit_info"><img src="./img/<?php echo $value['kind']; ?>.svg" alt="<?php echo $value['kind']; ?>"></div>
                        <div class="credit_contents">
                           <div class="credit_hide_num credit_info"><?php echo $value['hide_num']; ?></div>
                           <div class="credit_contents_child">
                              <div class="credit_name credit_info"><?php echo $value['name']; ?></div>
                              <div class="credit_limit_day credit_info">有効期限 : <?php echo $value['limit_day']; ?></div>
                           </div>
                        </div>
                     </div>
                  </label>
               </div>
               <?php endforeach; ?>
               <p class="credit_error"><?php echo $error;?></p>
               <div class="page_border"></div>
               <p class="credit_add_content"><a class="credit_add" href="./t_credit.php">カードを追加する</a></p>
               <div class="button_wrapper"><button class="color_button" type="submit" name="button" value="submit">購入</button></div>
            </form>
         </div>
      </div>
   </body>   
</html>