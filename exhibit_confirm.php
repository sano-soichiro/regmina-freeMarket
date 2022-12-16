<?php
require_once './initial_setting.php';

// SESSION受け取り
$product_name = $_SESSION['product_name'];
$category_date = $_SESSION['category_date'];
$area_date = $_SESSION['area_date'];
$ship_day = $_SESSION['ship_day'];
$ship_charge = $_SESSION['ship_charge'];
$vegetable_date = $_SESSION['vegetable'];
$discount_rate = $_SESSION['discount_rate'];
$amount = $_SESSION['amount'];
$payment = $_SESSION['payment'];
$stock = $_SESSION['stock'];
$discount_day = $_SESSION['discount_day'];
$vegetable = $_SESSION['vegetable'];
$harvest_date = $_SESSION['harvest_date'];
$head = $_SESSION['head'];
$head_img = $_SESSION['head_img'];
$head_ex = $_SESSION['head_ex'];
$product_img = $_SESSION['product_img'];
if($_SESSION['experition_date'] != ''){
    $expiration_date = $_SESSION['experition_date'];
}else{
    $expiration_date = '';
}

$harvest_year = '';
$harvest_month = '';
$harvest_day = '';

$shelf_year = '';
$shelf_month = '';
$shelf_day = '';

$products_column = ['products_name','category_id','from_area','to_ship','burdener','expriration_date','start_date','final_rate','price','stock','img_name','user_id'];
$products_info_column = ['products_id','id','title','img_name','contents'];

// 年月日分け
$harvest_year = substr($harvest_date , 0 , 4);
$harvest_month = substr($harvest_date , 4 , 2);
$harvest_day = substr($harvest_date , 6 , 2);

if($_SESSION['experition_date'] != ''){
    $shelf_year = substr($expiration_date , 0 , 4);
    $shelf_month = substr($expiration_date , 4 , 2);
    $shelf_day = substr($expiration_date , 6 , 2);
}

// カテゴリ取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT name
            FROM category_s
            WHERE id = ".$category_date;
    $result = db_run($link , $sql);
    $work = get_data($result);
    $category = $work[0]['name'];
}

// カテゴリ詳細取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT name
            FROM expiration_date
            WHERE id = ".$vegetable_date;
    $result = db_run($link , $sql);
    $work = get_data($result);
    $vegetable = $work[0]['name'];
}

// 地域取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT name
            FROM region
            WHERE id = ".$area_date;
    $result = db_run($link , $sql);
    $work = get_data($result);
    $area = $work[0]['name'];
}

// 戻るボタン
if(!empty($_POST) && $_POST['confirm'] == 'back'){
    $_SESSION['confirm'] = 'back';

    if(file_exists('./img/work/' . $product_img['name'])){
        unlink('./img/work/' . $product_img['name']);
    }

    foreach($head_img as $key => $value){
        if(file_exists('./img/work/' . $_SESSION['head_img']['name'][$key])){
            unlink('./img/work/' . $_SESSION['head_img']['name'][$key]);
        }
    }

    header('Location:./exhibit.php');
    exit;
}

// 完了ボタン
if(!empty($_POST) && $_POST['confirm'] == 'complete'){
    // DB格納(products)
    $products_date = [$product_name,$category_date,$area_date,$ship_day,$ship_charge,$expiration_date,$discount_day,$discount_rate,$payment,$stock,$_SESSION['ex'],$_COOKIE['login_id']];

    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $product_sql = create_insert_sql('products' , $products_column , $products_date);
        db_run($link , $product_sql);
    }

    // DB格納(products_info)
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT id , img_name FROM products ORDER BY id DESC LIMIT 1";
        $result = db_run($link , $sql);
    }
    $work = mysqli_fetch_assoc($result);
    if($work){
        $product_id = $work;
    }else{
        $product_id['id'] = 0;
    }

    // 画像フォルダ作成
    if(!file_exists("./img/products/".$product_id['id'])){
        mkdir("./img/products/".$product_id['id'] , 0777);
    }

    // imgフォルダに「元の画像」を保存する
    if(isset($_SESSION['product_img_name']) && file_exists('./img/work/' . $_SESSION['product_img_name'])){
        rename('./img/work/' . $_SESSION['product_img_name'] , './img/products/' . $product_id['id'] . '/' . $_SESSION['product_img_name']);
    }

    if($head[0] != ''){
        foreach($head as $key => $value){
            $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
            if($link){
                $sql = "SELECT id FROM products_info WHERE products_id = ".$product_id['id']." ORDER BY id DESC LIMIT 1;";
                $result = db_run($link , $sql);
            }
            $work = get_data($result);
            $product_sub_id = $work[0]['id'];
            if($work){
                $product_sub_id = $product_sub_id + 1;
            }else{
                $product_sub_id = 0;
            }
        
            // 画像フォルダ作成
            if(!file_exists("./img/products/".$product_id['id']."/".$product_sub_id)){
                mkdir("./img/products/".$product_id['id']."/".$product_sub_id , 0777);
            }
            
            // imgフォルダに「元の画像」を保存する
            if($_SESSION['head_img']['name'][$key] != ''){
                if(isset($_SESSION['head_img'.$key.'_name']) && file_exists('./img/work/' . $_SESSION['head_img'.$key.'_name'])){
                    rename('./img/work/' . $_SESSION['head_img'.$key.'_name'] , './img/products/'.$product_id['id'].'/'.$product_sub_id.'/'.$_SESSION['head_img'.$key.'_name']);
                }
            }
            $products_info_date = [$product_id['id'],$product_sub_id,$head[$key],$_SESSION['head_img']['name'][$key],$head_ex[$key]];
        
            $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
            if($link){
                $sql = create_insert_sql('products_info' , $products_info_column , $products_info_date);
                db_run($link , $sql);
            }
        }
    }

    // 画面遷移
    header('Location:./exhibit_complete.php');
    exit;
}elseif(!isset($_SESSION)){

    // 不正アクセス
    header('Location:./exhibit.php');
    exit;
}

require_once './tpl/exhibit_confirm.php';

?>