<?php
require_once './initial_setting.php';
$product = '';
$category = 'IS NOT NULL';
$area = 'IS NOT NULL';
$burdener = 'IS NOT NULL';
$burdener_min = '';
$burdener_max = '';
$product = [];


if($_GET['category'] != ''){
    $category = '= '.$_GET['category'];
}
if($_GET['area'] != ''){
    $area = '= '.$_GET['area'];
}
if($_GET['burdener'] != ''){
    $burdener = '= '.$_GET['burdener'];
}
if($_GET['burdener_min'] != ''){
    $burdener_min = 'AND p.price >= '.$_GET['burdener_min'];
}
if($_GET['burdener_max'] != ''){
    $burdener_max = 'AND p.price <= '.$_GET['burdener_max'];
}
if($_GET['burdener_min'] != '' && $_GET['burdener_max'] != ''){
    $burdener_min = 'AND p.price BETWEEN '.$_GET['burdener_min'].' AND '.$_GET['burdener_max'];
}

if(!empty($_GET)){
    // 商品取得
    $link = @mysqli_connect(HOST ,  USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT p.id AS 'id' , p.products_name AS 'name' , c.name AS 'category' , p.price AS 'payment' , u.lastname AS 'user' , pre.name AS 'prefecture' , p.img_name AS 'img_ex'
                FROM products AS p
                INNER JOIN category_s AS c ON p.category_id = c.id
                INNER JOIN r_user AS u ON p.user_id = u.id
                INNER JOIN prefecture AS pre ON u.prefecture = pre.id
                WHERE p.products_name LIKE '%".$_GET['search']."%' AND c.id ".$category." AND pre.region_id ".$area." AND p.burdener ".$burdener." ".$burdener_min." ".$burdener_max." AND p.stock != 0
                ORDER BY p.final_rate ASC;";
        $result = db_run($link , $sql);
        $product = get_data($result);
    }
    if($product == false){
        $product = [];
    }

    $link = @mysqli_connect(HOST ,  USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT COUNT(p.products_name) AS '検索件数'
                FROM products AS p
                INNER JOIN category_s AS c ON p.category_id = c.id
                INNER JOIN r_user AS u ON p.user_id = u.id
                INNER JOIN prefecture AS pre ON u.prefecture = pre.id
                WHERE p.products_name LIKE '%".$_GET['search']."%' AND c.id ".$category." AND pre.region_id ".$area." AND p.burdener ".$burdener." ".$burdener_min." ".$burdener_max."
                ORDER BY p.final_rate ASC;";
        $result = db_run($link , $sql);
        $work = get_data($result);
        $search_count = $work[0]['検索件数'];
    }

    // 商品押下時
    if(!empty($_GET['id'])){
        header('Location:./product_detail.php?id='.$_GET['id']);
        exit;
    }
}else{
    header('Location:./index.php');
    exit;
}



require_once './navigation.php';
require_once './tpl/product_list.php';
require_once './tpl/footer.php';
?>