<?php
require_once './initial_setting.php';

$product_info = [];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    $id = $_POST['id'];
}

// 不正アクセス
if(!isset($_GET['id']) && !isset($_POST['id'])){
    header('Location:./index.php');
    exit;
}

// 商品取得
$link = @mysqli_connect(HOST ,  USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT p.id AS 'id' , p.products_name AS 'name' , p.to_ship AS 'to_ship' , p.expriration_date AS 'expiry_date' , p.burdener AS 'burdener' , p.stock AS 'stock' , c.name AS 'category' , p.price AS 'payment' , pre.name AS 'prefecture' , p.img_name AS 'img_ex' , u.lastname AS 'lastname' , u.firstname AS 'firstname' , u.profile AS 'profile' , p.user_id AS 'user_id'
            FROM products AS p
            INNER JOIN category_s AS c ON p.category_id = c.id
            INNER JOIN r_user AS u ON p.user_id = u.id
            INNER JOIN prefecture AS pre ON u.prefecture = pre.id
            WHERE p.id = ".$id.
            ";";
    $result = db_run($link , $sql);
    $product = get_data($result);
}

// 商品詳細取得
$link = @mysqli_connect(HOST ,  USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT products_id , id , title , img_name , contents
            FROM products_info
            WHERE products_id = ".$id;
    $result = db_run($link , $sql);
    $product_info = get_data($result);
}

// 購入ボタン押下時
if(!empty($_POST)){
    setcookie('buy[0]' , $product[0]['id'] , time()+60*60);

    header('Location:./t_select.php');
    exit;
}

require_once './navigation.php';
require_once './tpl/product_detail.php';
require_once './tpl/footer.php';
?>