<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/textbox_style.css">
    <link rel="stylesheet" href="./css/navigation.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php require_once './tpl/fonts.php'; ?>
    <title>REGMINA</title>
</head>
<body>
    <nav>
        <div id="nav_group">
            <div class="global_nav">
                <a href="./index.php" class="regmina_logo">REGMINA</a>
                <div class="global_nav_option">
                    <div id="openModal" class="search_container"><i id="fa-search" class="fas fa-search"></i></div>
                    <div class="exhibit_container"><a href="./exhibit.php" class="basic_button exhibit_btn">出品する</a></div>
                </div>
            </div>
            <div class="modalBg"></div>
            <div id="modal_body">
                <form id="modal_search" action="./product_list.php" method="get">
                    <div class="form_search_container">
                        <div class="form_search"><input id="search" class="input_text" type="text" name="search"></div>
                        <div class="form_search_button"><button class="search_submit" type="submit" name="confirm"><i class="fas fa-search"></i></button></div>
                    </div>
                    <div class="modal_search_wrapper">
                        <div class="modal_search_item">
                            <div class="form_category_container">
                                <div class="form_category">カテゴリー</div>
                                <select class="" name="category" id="">
                                <option value="">-</option>
                                <?php foreach($category as $key => $value){ ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form_area_container">
                                <div class="form_area">地域</div>
                                <select  class="" name="area" id="">
                                <option value="">-</option>
                                <?php foreach($area as $key => $value){ ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal_search_item">
                            <div class="form_burdener_container">
                                <div class="form_burdener">配送費負担者</div>
                                <select class="" name="burdener" id="">
                                    <option value="">-</option>
                                    <option value="0">購入者</option>
                                    <option value="1">出品者</option>
                                </select>
                            </div>
                            <div class="form_burdener_price_container">
                                <div class="form_burdener_price">配送費価格</div>
                                <div class="search_min_max1"><input class="input_text" type="text" name="burdener_min" placeholder="Min"></div>
                                <div class="line"> ～ </div>
                                <div class="search_min_max2"><input class="input_text" type="text" name="burdener_max" placeholder="Max"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <script src="js/navigation.js"></script>
</body>
</html>