<!DOCTYPE html>
<html lang = "ja">

   <head>
   <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/textbox_style.css">
      <link rel="stylesheet" href="./css/entry_style.css">
      <link rel="stylesheet" href="./css/navigation.css">
      <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <?php require_once './tpl/fonts.php'; ?>
      <title>REGMINA</title>
   </head>

   <body>
      <div class="form_top">
         <h1 class="form_top_head">支払方法を追加</h1>
         <p class="form_top_comment">お支払方法を追加を押すとお支払方法の登録を完了します。</p>
      </div>
      <form id="credit_form" action="./t_credit.php" method="post">
         <div class="form_user_content">
                     <div class="form_content_02">
               <div class="form_head">カード番号</div>
               <div class="input_block2"><input class="input_text form_textbox_max" type="text" name="card_num" value="<?php echo isset($_POST['card_num']) ? $_POST['card_num'] : '' ;?>"></div>
               <div class="form_text_msg_block"><p class="error_msg_color"><?php echo isset($error['card_num']) ? $error['card_num'] : ''; ?></p></div>
            </div>
            <div class="form_content_02">
               <div class="form_head">カード名義</div>
               <div class="input_block2"><input class="input_text form_textbox_max" type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ;?>"></div>
               <div class="form_text_msg_block"><p class="error_msg_color"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p></div>
            </div>
            <div class="input_birthday_content">
               <div class="form_content_02">
                  <div class="form_head">有効期限</div>
                  <div class="input_birthday_content">
                     <span class="second">20</span><input class="input_text form_textbox_MMDD" type="text" name="year" value="<?php echo isset($_POST['year']) ? $_POST['year'] : '' ;?>" placeholder="22"><div class="big_slash">/</div><input class="input_text form_textbox_MMDD" type="text" name="month" value="<?php echo isset($_POST['month']) ? $_POST['month'] : '' ;?>" placeholder="5">
                     <div class="form_text_msg_block"><p class="error_msg_color"><?php echo isset($error['limit']) ? $error['limit'] : ''; ?></p></div>
                  </div>
               </div>
               <div class="form_content_02 padding_left_60px">
                  <div class="form_head">セキュリティコード</div>
                  <input class="input_text form_textbox_MMDD" type="text" name="security_code" placeholder="CVC" value="<?php echo isset($_POST['security_code']) ? $_POST['security_code'] : '' ;?>">
                  <div class="form_text_msg_block"><p class="error_msg_color"><?php echo isset($error['security_code']) ? $error['card_num'] : ''; ?></p></div>
               </div>
            </div>
            <div class="page_border"></div>
            <div class="submit_btn"><button class="confirm_button color_button" type="submit" name="button" value="submit">支払方法を追加</button></div>
            <p class="margin_bottom_100px form_bottom_comment">購入ボタンをクリックすることで、REGMINA の利用規約および<a href="#">プライバシーポリシー</a>に同意したことになり、ご利用のお支払い方法に REGMINA の決済処理パートナー、請求を行うことにも同意したものとみなされます。</p>
         </div>
      </form>
   </body>   
</html>