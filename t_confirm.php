<?php
require_once './initial_setting.php';

if(!isset($_COOKIE['buy'][0])){
    header('location:./index.php');
    exit;
}

//=================================
//●商品情報を取得
//=================================

//初期化
$cart = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "SELECT products.products_name as 'products_name' , products.price as 'price' , CONCAT(r_user.lastname,r_user.firstname) as 'user_name' , products.img_name as 'img_name' , products.id as 'id' , r_user.prefecture as 'prefecture_id'  FROM products INNER JOIN r_user ON products.user_id = r_user.id WHERE products.id = ".$_COOKIE['buy'][0];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$cart = get_data($result);

//画像のパス
$dir_img = './img/products/'.$cart[0]['id'].'/img'.$cart[0]['img_name'];

//=================================
//●会員情報を取得・cookieへ格納
//=================================

//初期化
$address = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "SELECT CONCAT(r_user.lastname,r_user.firstname) as 'user_name' , r_user.post_num as 'post_num' , prefecture.name as 'prefecture' , r_user.prefecture as 'prefecture_id' , r_user.city_name as 'city_name' , r_user.address as 'address' FROM r_user INNER JOIN prefecture ON r_user.prefecture = prefecture.id WHERE r_user.id = ".$_COOKIE['login_id'];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$address = get_data($result);

//=================================
//●購入者の地方取得
//=================================

//初期化
$buyer_area = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "select region_id from prefecture where id = ".$address[0]['prefecture_id'];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$buyer_area = get_data($result);

//=================================
//●出品者の地方取得
//=================================

//初期化
$seller_area = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "select region_id from prefecture where id = ".$cart[0]['prefecture_id'];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$seller_area = get_data($result);


//=================================
//●送料計算処理
//=================================
//初期化
$how_long = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "select * from how_long where from_area = ".$seller_area[0]['region_id']." and to_area = ".$buyer_area[0]['region_id'].";";
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$fee_and_long = get_data($result);

$postage = $fee_and_long[0]['fee'];

//=================================
//●合計金額
//=================================
$sum = $postage + $cart[0]['price'];

//=================================
//●エラーチェック
//=================================
if(isset($_POST['button']) && $_POST['button'] == 'submit'){
    $error = [];
    $error['tip'] = numeric_check($_POST['tip']);
    if(error_count($error) === 0){
        //エラーがない場合
        setcookie('tip',$_POST['tip'],time() + 60 * 60);
        //画面遷移
        header('Location:./t_pay.php');
        exit;
    }
}

require_once './tpl/'.basename(__FILE__);
?>



