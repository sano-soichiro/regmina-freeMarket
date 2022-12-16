<?php
require_once './initial_setting.php';

$err_flg = 0;

$product_name = '';
$category = '';
$area = '';
$ship_day = '';
$ship_charge = '';
$vegetable = '';
$discount_rate = '';
$amount = '';
$payment = '';
$stock = '';
$discount_day = '';
$vegetable = '';
$harvest_date = '';
$head = '';
$head_img = '';
$head_ex = '';
$product_img = '';
$img_ex = '';
$expiration_date = '';


$category = [];
$area = [];
$shelf_life = [];

$date_err = ['',''];
$numeric_err = ['','','','','',''];

// COOKIE判定
if(!empty($_COOKIE['login_id'])){

    // カテゴリー取得
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT * FROM category_s ORDER BY kana_name ASC";
        $result = db_run($link , $sql);
    }
    $work = mysqli_fetch_assoc($result);
    while($work){
        $category[] = $work;
        $work = mysqli_fetch_assoc($result);
    }

    // 地域取得
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT * FROM region";
        $result = db_run($link , $sql);
    }
    $work = mysqli_fetch_assoc($result);
    while($work){
        $area[] = $work;
        $work = mysqli_fetch_assoc($result);
    }

    // 野菜取得
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT * FROM expiration_date ORDER BY name_kana ASC;";
        $result = db_run($link , $sql);
    }
    $work = mysqli_fetch_assoc($result);
    while($work){
        $shelf_life[] = $work;
        $work = mysqli_fetch_assoc($result);
    }

    // 非初来訪時
    if(!empty($_POST) && $_POST['confirm'] == 'confirm'){

        // 値入手
        $product_name = $_POST['product_name'];
        $category_date = $_POST['category'];
        $area_date = $_POST['area'];
        $ship_day = $_POST['ship_day'];
        $ship_charge = $_POST['ship_charge'];
        $vegetable = $_POST['vegetable'];
        $discount_rate = $_POST['discount_rate'];
        $amount = $_POST['amount'];
        $payment = $_POST['payment'];
        $stock = $_POST['stock'];
        $discount_day = $_POST['discount_day'];
        $vegetable = $_POST['vegetable'];
        $harvest_date = $_POST['harvest_date'];
        $head = $_POST['head'];
        $head_ex = $_POST['head_ex'];
        $product_img = $_FILES['product_img'];
        $experition_date = $_POST['experition_date'];

        // 未入力チェック
        foreach($_POST as $key => $value){
            if(!strpos($key , 'head') && $key != 'discount_rate' && $key != 'discount_day' && $key != 'amount' && $key != 'harvest_date'){
                $err_msg[$key] = not_entered_check($value);
            }
        }

        // 日付妥当性チェック
        $excheck_year = substr($experition_date , 0 , 4);
        $excheck_month = substr($experition_date , 4 , 2);
        $excheck_day = substr($experition_date , 6 , 2);
        
        $hacheck_year = substr($harvest_date , 0 , 4);
        $hacheck_month = substr($harvest_date , 4 , 2);
        $hacheck_day = substr($harvest_date , 6 , 2);

        $date_err[1] = is_reasonable_date($excheck_year , $excheck_month , $excheck_day);
        if($harvest_date != ''){
            $date_err[0] = is_reasonable_date($hacheck_year , $hacheck_month , $hacheck_day);
        }
        
        // 数値チェック
        $numeric_err[0] = numeric_check($ship_day);
        $numeric_err[1] = numeric_check($amount);
        $numeric_err[2] = numeric_check($payment);
        $numeric_err[3] = numeric_check($stock);
        if($discount_rate != '' || $discount_day != ''){
            $numeric_err[4] = numeric_check($discount_rate);
            $numeric_err[5] = numeric_check($discount_day);
        }

        // エラーチェック
        if(!error_count($err_msg) && $date_err[0] == '' && $date_err[1] == '' && $numeric_err[0] == '' && $numeric_err[1] == '' && $numeric_err[2] == '' && $numeric_err[3] == '' && $numeric_err[4] == '' && $numeric_err[5] == ''){
            // SESSION設定
            $_SESSION['product_name'] = $product_name;
            $_SESSION['category_date'] = $category_date;
            $_SESSION['area_date'] = $area_date;
            $_SESSION['ship_day'] = $ship_day;
            $_SESSION['ship_charge'] = $ship_charge;
            $_SESSION['vegetable'] = $vegetable;
            $_SESSION['discount_rate'] = $discount_rate;
            $_SESSION['amount'] = $amount;
            $_SESSION['payment'] = $payment;
            $_SESSION['stock'] = $stock;
            $_SESSION['discount_day'] = $discount_day;
            $_SESSION['vegetable'] = $vegetable;
            $_SESSION['harvest_date'] = $harvest_date;
            $_SESSION['head'] = $head;
            $_SESSION['head_img'] = $head_img;
            $_SESSION['head_ex'] = $head_ex;
            $_SESSION['product_img'] = $product_img;
            $_SESSION['shelf_life'] = $shelf_life;
            $_SESSION['experition_date'] = $experition_date;

            // 拡張子取得
            $ex = substr($product_img['name'] , strpos($product_img['name'] , '.'));
            $_SESSION['ex'] = $ex;

            // 日本語ファイルに対応するためにエンコードする
            $file_name = mb_convert_encoding('img'.$ex,'sjis','utf8');

            // セッションに画像名を保存する
            $_SESSION['product_img_name'] = $file_name;

            // 一時保存先「work」へのパスの設定
            $file_pass = './img/work/' . $file_name;

            // 一時保存処理
            move_uploaded_file($product_img['tmp_name'] , $file_pass );

            // 詳細画像
            if($head[0] != ''){
                foreach($head as $key => $value){
                    if($_FILES['head_img']['name'][$key] != ''){
                        // 日本語ファイルに対応するためにエンコードする
                        $file_name = mb_convert_encoding($_FILES['head_img']['name'][$key],'sjis','utf8');

                        // セッションに画像名を保存する
                        $_SESSION['head_img'] = $_FILES['head_img'];
                        $_SESSION['head_img'.$key.'_name'] = $file_name;

                        // 一時保存先「work」へのパスの設定
                        $file_pass = './img/work/' . $file_name;

                        // 一時保存処理
                        move_uploaded_file($_SESSION['head_img']['tmp_name'][$key] , $file_pass );
                    }
                }
            }

            // 画面遷移
            header('Location:./exhibit_confirm.php');
            exit;
        }
    }

    // 可変長BOX
    if(isset($_POST['confirm']) && $_POST['confirm'] == 'confirm'){
        if(isset($_POST['count_box'])){
            $form_count = count($_POST['count_box']);
        }
        else{
            $form_count = 0;
        }
    }
    else{
        //初回接続時の処理
        $form_count = 0;
        $_POST['head'][0] = '';
        $_FILES['head_img'][0] = '';
        $_POST['head_ex'][0] = '';
    }
}elseif(empty($_COOKIE['login_id'])){

    // 不正アクセス
    header('Location:./index.php');
    exit;
}


require_once './tpl/exhibit.php';

?>