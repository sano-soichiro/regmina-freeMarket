<?php
//初期設定
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
//●購入者の地方取得
//=================================

if(isset($_COOKIE['prefecture_id'])){
    $address[0]['prefecture_id'] = $_COOKIE['prefecture_id'];
}

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
//●クレジットカード情報を取得
//=================================

//初期化
$credit = [];
//データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//sqlを設定する
$sql = "SELECT * FROM r_credit WHERE user_id =".$_COOKIE['login_id'];
//sqlを実行する
$result = db_run($link,$sql);
//フェッチ処理
$credit = get_data($result);

if(!$credit){
    $credit = [];
}

foreach($credit as $key => $value){
    $credit[$key]['kind'] = return_credit_kind($value['card_num']);
    $credit[$key]['hide_num'] = return_hide_num($value['card_num']);
    $credit[$key]['limit_day'] = date_change($credit[$key]['limit_day']);
}

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
//●合計金額
//=================================
$sum = $cart[0]['price'] + $postage + $_COOKIE['tip'];

//=================================
//●取引情報登録
//=================================

$error = '';

if(isset($_POST['button']) && $_POST['button'] == 'submit'){
    if(!isset($_COOKIE['shipping_address'])){
        $shipping_address = 0;
    }
    else{
        $shipping_address = $_COOKIE['shipping_address'];
    }

    
    if(isset($_POST['credit'])){

        //=================================
        //●取引情報保存
        //=================================

        //データベース登録
        //--データベースに接続する
        $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
        //--sqlを設定する
        $column = ['product_id','user_id','credit_id','address_id','tip','price_down_rate'];
        $entry_data = [$_COOKIE['buy'][0],$_COOKIE['login_id'],$_POST['credit'],$shipping_address,$_COOKIE['tip'],0];
        $sql = create_insert_sql('transaction',$column,$entry_data);
        echo $sql;
        //--sqlを実行する
        $id = db_run_insert($link,$sql);

        //=================================
        //●引き当て処理
        //=================================

        //--データベースに接続する
        $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
        //--sqlを設定する
        $sql = "UPDATE products SET stock = stock - 1 where id = ".$_COOKIE['buy'][0];
        echo $sql;
        //sqlを実行する
        $result = db_run($link,$sql);


        //COOKIEを削除
        $buy = $_COOKIE['buy'];
    
        setcookie('buy[0]','',time() - 60 * 60);
        setcookie('shipping_address','',time() - 60 * 60);
        setcookie('tip','',time() - 60 * 60);
        setcookie('prefecture_id','',time() - 60 * 60);
    
        header('location:./t_complete.php?buy='.$buy[0]);
        exit;
    }
    else{
        $error = '支払い方法を選択してください';
    }
}

function return_credit_kind($number){
    if(strpos($number,'4') === 0){
        return 'visa';
    }
    elseif(strpos($number,'35') === 0){
        return 'jcb';
    }
    elseif(strpos($number,'5') === 0){
        return 'master_card';
    }
    else{
        return 'other';
    }
}

function return_hide_num($number){
    $cut_num = substr($number,8);
    $cut_num = '**** **** **** '.$cut_num;
    return $cut_num;
}

function date_change($limit_day){
    return substr($limit_day,4).'/'.substr($limit_day,0,4);
}

require_once './tpl/'.basename(__FILE__);
?>
