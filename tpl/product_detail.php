<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/product_detail_style.css">
    <link rel="stylesheet" href="./css/textbox_style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php require_once './tpl/fonts.php'; ?>
    <title>REGMINA</title>
</head>
<body>

<section id="product_top">
    <div class="product_top_content">
        <div class="product_top_left">
            <ul class="">
                <li class="img_size"><img src="./img/products/<?php echo $product[0]['id']; ?>/img<?php echo $product[0]['img_ex']; ?>" alt=""></li>
            </ul>
        </div>
        <div class="product_top_right">
            <div class="product_option_top">
                <div class="product_jenre"><?php echo $product[0]['category']; ?></div>
                <div class="product_place"><i class="fas fa-map-marker-alt"></i> <?php echo $product[0]['prefecture']; ?></div>
            </div>
            <div class="product_title_content">
                <h2 class="product_title"><?php echo $product[0]['name']; ?></h2>
                <div class="favorite_button"><button class="" type="button"><i class="far fa-heart"></i></button></div>
            </div>
            <div class="product_price"><span class="price_font">￥<?php echo $product[0]['payment']; ?></span>  (税込)</div>
            <ul class="product_options_right">
                <li class=""><div class="option_right">配送料の負担</div><div class="option_right_content"><?php echo $product[0]['burdener']==0 ? "出品者" : "購入者";?>負担</div></li>
                <li class=""><div class="option_right">発送までの日数</div><div class="option_right_content"><?php echo $product[0]['to_ship']; ?>日で発送</div></li>
                <li class=""><div class="option_right">賞味期限・消費期限</div><div class="option_right_content"><?php echo $product[0]['expiry_date']; ?></div></li>
            </ul>
            <form action="./product_detail.php" method="post" class="product_cart"><button class="product_cart_btn color_button" type="submit">購入</button><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></form action="./product_detail.php">
            <div class="product_stock"><p class="stock_letter">在庫数残り</p><div class="stock_pcs"><?php echo $product[0]['stock']; ?> 点以上</div></div>
            <div class="product_service">
                <div class="product_share_title">SHARE :</div>
                <ul class="product_share_list">
                    <li class=""><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class=""><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class=""><a href="#"><i class="fas fa-envelope"></i></a></li>
                    <li class=""><a href="#"><i class="fas fa-link"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="product_bottom">
    <!--タブ-->
    
    <div class="tab_align">
        <ul class="tab-group">
            <li class="tab is-active">説明</li>
            <li class="tab">レビュー</li>
        </ul>
    </div>
    <div class="page_border"></div>

    <!--タブを切り替えて表示するコンテンツ-->
    <div class="panel_align">
        <div class="panel-group">
            <div class="panel is-show">
                <div class="product_exp_content">
                    <?php if($product_info !== false){ ?>
                    <?php foreach($product_info as $key => $value){ ?>
                    <div class="product_exp">
                        <div class="product_exp_head"><?php echo $value['title'];?></div>
                        <div class="product_exp_img"><img src="./img/products/<?php echo $value['products_id'];?>/<?php echo $value['id'];?>/<?php echo $value['img_name']; ?>" alt=""></div>
                        <div class="product_exp_exp"><?php echo $value['contents'];?></div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="panel">
                B
            </div>
        </div>
        <div class="profile_group">
            <div class="profile">
            <?php foreach($product as $key => $value){ ?>
                <div class="profile_img"><img src="./img/profile/<?php echo $value['user_id'];?>/thumb.jpg" alt=""></div> 
                <div class="profile_content">
                    <div class="profile_content_padding">
                        <div class="profile_name"><?php echo $value['lastname']. $value['firstname']; ?></div>
                        <div class="profile_comment"><?php echo $value['profile'];?></div>
                        <div class="profile_link"><a href="#">個人サイト <i class="fas fa-external-link-square-alt"></i></a></div>
                    </div>
                </div>
            <?php } ?>                
            </div>
        </div>
    </div>
</section>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/tab.js"></script>
</body>
</html>