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
$sql = "SELECT products.products_name as 'products_name' , products.price as 'price' , CONCAT(r_user.lastname,r_user.firstname) as 'user_name' , products.img_name as 'img_name' , products.id as 'id' FROM products INNER JOIN r_user ON products.user_id = r_user.id WHERE products.id = ".$_COOKIE['buy'][0];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$cart = get_data($result);

//画像のパス
$dir_img = './img/products/'.$cart[0]['id'].'/img'.$cart[0]['img_name'];

//=================================
//●都道府県を取得
//=================================

//初期化
$prefecture = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "SELECT * FROM prefecture";
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$prefecture = get_data($result);

//=================================
//●送料計算処理
//=================================
$postage = 0;

//=================================
//●合計金額
//=================================
$sum = $cart[0]['price'];

//=================================
//●送料計算処理
//=================================
if(isset($_POST['button']) && $_POST['button'] == 'submit'){
    $error = [];

    $error['tip'] = numeric_check($_POST['tip']);
    $error['name'] = not_entered_check($_POST['name']);
    $error['post_num'] = numeric_check($_POST['post_num']);
    $error['prefecture'] = select_check($_POST['prefecture']);
    $error['city_name'] = not_entered_check($_POST['city_name']);
    $error['address'] = not_entered_check($_POST['address']);

    if(error_count($error) === 0){
        //エラーがない場合
        //チップ情報をcookieへ保存する
        setcookie('tip',$_POST['tip'],time() + 60 * 60);
        //データベース登録
        //--データベースに接続する
        $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
        //--sqlを設定する
        $column = ['name','post_num','prefecture','city_name','address'];
        $entry_data = [$_POST['name'],$_POST['post_num'],$_POST['prefecture'],$_POST['city_name'],$_POST['address']];
        $sql = create_insert_sql('shipping_adress',$column,$entry_data);
        //--sqlを実行する
        $id = db_run_insert($link,$sql);
        //配送先idをcookieへ保存する
        setcookie('shipping_address',$id,time() + 60 * 60);
        setcookie('prefecture_id',$_POST['prefecture'],time() + 60 * 60);
        //画面遷移
        header('Location:./t_pay.php');
        exit;
    }
}

require_once './tpl/'.basename(__FILE__);
?>



