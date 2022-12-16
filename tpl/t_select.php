<!DOCTYPE html>
<html lang = "ja">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/textbox_style.css">
   <link rel="stylesheet" href="./css/t_select_style.css">
   <link rel="stylesheet" href="./css/navigation.css">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <?php require_once './tpl/fonts.php'; ?>
   <title>REGMINA</title>
</head>
<body>
   <div id="address_area">
      <div id="address_selection">
         <div class="address_caption">
            <h2 class="heading">商品の配送先を選択する</h2>
            <p class="text">この商品の配送先を選択しましょう。</p>
         </div>
         <div class="address_unit">
            <div class="address_item"><a class="address_button1" href="./t_present.php"><i class="fas fa-gifts"></i><span class="address_string1">プレゼントする</span></a></div>
            <div class="address_item"><a class="address_button2" href="./t_confirm.php"><i class="far fa-check-circle"></i><span class="address_string2">登録済み住所</span></a></div>
         </div>
      </div>
   </div>
</body>   
</html>