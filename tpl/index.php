<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <link rel="stylesheet" href="./css/index_style.css">
    <link rel="stylesheet" href="./css/textbox_style.css">
    <link rel="stylesheet" href="./css/modal.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php require_once './tpl/fonts.php'; ?>
    <title>REGMINA</title>
</head>
<body>

<!--  M O D A L  -->
<section id="modalArea2" class="<?php echo $err_modal;?>">
  <!-- Modal_Background -->
  <div class="modalBg2"></div>
  <div class="modalWrapper">
    <div class="modalContents">
      <h2>サインイン</h2>
      <div class="closeModal2"></div>
      <form action="./index.php" name="userForm" method="post">
        <p class="signin_head">ユーザーID</p>
        <p><input type="text" name="user_id" class="input_text" placeholder="ユーザーID" autocomplete="off"></p>
        <p class="signin_head">パスワード</p>
        <p><input type="text" name="pass" class=" input_text" placeholder="パスワード" autocomplete="off"></p>
        <p class="<?php echo $modal_alert;?>">ユーザーIDまたはパスワードが正しくありません</p>
        <div class="signInButton"><button class="color_button" type="submit" name="confirm" value="login">サインイン</button></div>
        <p class="signInComment">アカウントをお持ちでない方は  <a href="./entry.php" class="modal_link">新規登録</a></p>
      </form>
    </div>
  </div>
</section>


<main>
  <div class="left_wrapper">
    <ul class="left_list">
      <li class="left_content">
        <h2 class="left_content_title">新着出品ダイジェスト</h2>
        <div class="left_content_comment">1月20日の「大寒」を前に、各地で大雪が猛威を振るっている今週。雪国での暮らしはとても大変なことなのだと、改めて思います...そんな季節を象徴するかのように、近ごろは雪国の農家さんから「雪」がキーとなる食材の出品が集まっています。</div>
      </li>
      <li class="left_content">
        <h2 class="left_content_title">今週の旬の果物</h2>
        <div class="left_content_comment">レグミナに出品されている今週の旬のくだものです。さて、今週はどんな地域の、どんな旬に人気が集まったのでしょうか。</div>
      </li>
      <li class="left_content">
        <h2 class="left_content_title">冬の大人気フルーツ</h2>
        <div class="left_content_comment">レグミナに出品されている大人気くだものです。さて、今季はどんな地域の、どんな旬に人気が集まったのでしょうか。</div>
      </li>
    </ul>
  </div>
  <!-- SLICKスライドショー -->
  <div class="right_wrapper">
    <ul class="right_img_list">
      <li class="right_content"><img src="./img/apple7.jpg" alt=""></li>
      <li class="right_content"><img src="./img/orange.jpg" alt=""></li>
      <li class="right_content"><img src="./img/strawberry.jpg" alt=""></li>
    </ul>
    <div class="sign_content">
      <div class="sign_wrapper <?php echo $status[1];?>">
        <!-- LOGIN している -->
        <div class="signed block">
          <div class="sign_img"> 
            <img src="./img/profile/<?php echo $user[0]['id'];?>/thumb.jpg" alt="<?php echo $user[0]['id'];?>">
          </div>
          <div class="sign_name"><?php echo $user[0]['lastname']. $user[0]['firstname'];?></div>
          <div class="signed_content2"></div>
        </div>
        <div class="page_border"></div>
        <form action="./index.php" name="userForm" method="post" class="form_signed">
          <div class="logout_content"><button class="logout" type="submit" name="confirm" value="logout">サインアウト</button></div>
        </form>
        <!-- LOGIN していない -->
      </div>
      <div class="sign_wrapper">
        <div class="signed block <?php echo $status[0];?>">
          <div class="">
            <div class=""></div>
            <div class=""></div>
            <div class=""></div>
          </div>
          <div class="">
            <div id="openModal2" class="openModal2">サインイン</div>
            <a href="./entry.php">会員登録</a>
          </div>
          <div class="page_border"></div>
          <div class="">ログインまたは会員登録をしてください</div>
        </div>
      </div>
    </div>
  </div>
</main>

  <!-- 商品リスト(ピックアップ) -->
  <div id="pick_up_head">
    <div id="pick_up">
      <h2>ピックアップ</h2>
      <form action="./product_detail.php" method="get">
        <?php foreach($product as $val){?>
          <button type="submit" name="id" value="<?php echo $val['id'];?>">
            <div class="item">
              <div class="product_img">
                <img src="./img/products/<?php echo $val['id'];?>/img<?php echo $val['img_ex'];?>" alt="商品画像" class="item_icon">
              </div>
              <div class="product_content">
                <div class="product_name_wrapper">
                  <p class="product_name"><?php echo $val['name'];?></p>
                </div>
                <div class="category_head">
                  <p class="category"><?php echo $val['category'];?></p>
                </div>
                <p class="payment">¥<?php echo $val['payment'];?></p>
                <div class="user_head">
                    <div class="user_img"><img src="./tpl/user-circle-solid.svg" alt=""></div>
                    <div class="user_name"><?php echo $val['user'];?></div>
                </div>
              </div>
            </div>
          </button>
        <?php }?>
      </form>
    </div>
  </div>
<script src="js/index.js"></script>
<script src="js/slick.min.js"></script>
</body>
</html>