<!doctype html>
<html lang ="ja">
<head>
<meta charset ="utf-8">
<title>商品一覧</title>
<?php require_once './tpl/fonts.php';?>
<link href="./css/product_list.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php require_once './tpl/navigation.php';?>

<div id="main">

    <p class="search_p">検索結果 : <?php echo $search_count;?>件</p>

    <div id="content">
        <form action="./product_list.php" method="get">
        <?php foreach($product as $val){?>
            <button type="submit" name="id" value="<?php echo $val['id'];?>" class="product_btn">
                <div class="item">
                    <div class="product_img">
                        <img src="./img/products/<?php echo $val['id'];?>/img<?php echo $val['img_ex'];?>" alt="商品画像" class="item_icon">
                    </div>
                    <div class="product_content">
                        <div class="category_head">
                            <p class="category"><?php echo $val['category'];?></p>
                        </div>
                        <div class="product_name_wrapper">
                            <p class="product_name"><?php echo $val['name'];?></p>
                        </div>
                        <p class="payment">¥ <?php echo $val['payment'];?></p>
                    <div class="user_head">
                        <div class="user_heads1">
                            <div class="user_img"><img src="./tpl/user-circle-solid.svg" alt=""></div>
                            <div class="user_name"><?php echo $val['user'];?></div>
                        </div>
                        <div class="user_heads2">
                            <div class="pre_img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="384" height="512" viewBox="0 0 384 512">
                                    <path id="map-marker-alt-solid" d="M172.268,501.67C26.97,291.031,0,269.413,0,192,0,85.961,85.961,0,192,0S384,85.961,384,192c0,77.413-26.97,99.031-172.268,309.67a24.011,24.011,0,0,1-39.464,0ZM192,272a80,80,0,1,0-80-80A80,80,0,0,0,192,272Z"/>
                                </svg>
                            </div>
                            <p class="prefecture"><?php echo $val['prefecture'];?></p>
                        </div>
                    </div>
                    </div>
                </div>
            </button>
        <?php }?>
        </form>
    </div>

    
</div>

</body>
</html>

