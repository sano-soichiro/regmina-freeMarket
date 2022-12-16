<?php
require_once './initial_setting.php';

//初期設定
//=================================
//●商品情報を取得
//=================================

//初期化
$cart = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "SELECT products.products_name as 'products_name' , products.price as 'price' , CONCAT(r_user.lastname,r_user.firstname) as 'user_name' , products.img_name as 'img_name' , products.id as 'id' FROM products INNER JOIN r_user ON products.user_id = r_user.id WHERE products.id = ".$_GET['buy'];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$cart = get_data($result);

//画像のパス
$dir_img = './img/products/'.$cart[0]['id'].'/img'.$cart[0]['img_name'];

require_once './tpl/'.basename(__FILE__);
?>
