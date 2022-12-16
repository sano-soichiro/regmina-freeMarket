<?php
require_once './initial_setting.php';

$mail = '';
$user_id = '';
$pass = '';
$confirm_pass = '';
$last_name = '';
$first_name = '';
$last_name_kana = '';
$first_name_kana = '';
$year = '';
$month = '';
$day = '';
$gender = '';
$tel = '';
$post_code = '';
$prefecture = '';
$municipalitie = '';
$address = '';
$building = '';
$profile = '';
/* $card_num = '';
$card_name = '';
$card_date = '';
$card_code = ''; */

$pass_flg = 0;
$ex_flg = 0;
$err_msg = [];
$prefecture_list = [];
$gender_list = [];

$err_msg['mail'] = '';
$err_msg['user_id'] = '';
$err_msg['pass'] = '';
$err_msg['confirm_pass'] = '';
$err_msg['last_name'] = '';
$err_msg['first_name'] = '';
$err_msg['last_name_kana'] = '';
$err_msg['first_name_kana'] = '';
$err_msg['year'] = '';
$err_msg['month'] = '';
$err_msg['day'] = '';
$err_msg['gender'] = '';
$err_msg['tel'] = '';
$err_msg['post_code'] = '';
$err_msg['prefecture'] = '';
$err_msg['municipalitie'] = '';
$err_msg['address'] = '';
$err_msg['building'] = '';
$err_msg['birth_day'] = '';
$err_msg['profile'] = '';
$err_msg['file'] = '';

$input_error_text = [];
$input_error_text['building'] = 'input_text';
$input_error_text['profile'] = 'profile';

$checked = [];
$checked[0] = 'checked';
$checked[1] = '';
$checked[2] = '';

// 都道府県取得
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT * FROM prefecture;";
    $result = db_run($link , $sql);
}
$work = mysqli_fetch_assoc($result);
while($work){
    $prefecture_list[] = $work;
    $work = mysqli_fetch_assoc($result);
}

// 性別取得
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT * FROM gender;";
    $result = db_run($link , $sql);
}
$work = mysqli_fetch_assoc($result);
while($work){
    $gender_list[] = $work;
    $work = mysqli_fetch_assoc($result);
}

// 戻るボタンで戻ってきた場合
if(!empty($_SESSION) && $_SESSION['confirm'] == 'back'){
    $mail = $_SESSION['mail'];
    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $first_name_kana = $_SESSION['first_name_kana'];
    $last_name_kana = $_SESSION['last_name_kana'];
    $year = $_SESSION['year'];
    $month = $_SESSION['month'];
    $day = $_SESSION['day'];
    $gender = $_SESSION['gender'];
    $tel = $_SESSION['tel'];
    $post_code = $_SESSION['post_code'];
    $prefecture = $_SESSION['prefecture'];
    $municipalitie = $_SESSION['municipalitie'];
    $address = $_SESSION['address'];
    $building = $_SESSION['building'];
    $profile = $_SESSION['profile'];

    if($gender == 1){
        $checked[0] = 'checked';
    }elseif($gender == 2){
        $checked[1] = 'checked';
    }else{
        $checked[2] = 'checked';
    }
}

// 初来訪チェック
if(!empty($_POST) && $_POST['confirm'] == 'confirm'){
    // ポスト受け取り
    $mail = $_POST['mail'];
    $user_id = $_POST['user_id'];
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $first_name_kana = $_POST['first_name_kana'];
    $last_name_kana = $_POST['last_name_kana'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $gender = $_POST['gender'];
    $tel = $_POST['tel'];
    $post_code = $_POST['post_code'];
    $prefecture = $_POST['prefecture'];
    $municipalitie = $_POST['municipalitie'];
    $address = $_POST['address'];
    $building = $_POST['building'];
    $profile = $_POST['profile'];

    if($gender == 1){
        $checked[0] = 'checked';
    }elseif($gender == 2){
        $checked[1] = 'checked';
    }else{
        $checked[2] = 'checked';
    }

/*     $card_num = $_POST['card_num'];
    $card_name = $_POST['card_name'];
    $card_date = $_POST['card_date'];
    $card_code = $_POST['card_code']; */

    // 未入力チェック
    foreach($_POST as $key => $value){
        if($key == 'year' || $key == 'month' || $key == 'day'){
            $err_msg['birth_day'] = not_entered_check($value);
        }elseif($key != 'building' && $key != 'profile'){
            $err_msg[$key] = not_entered_check($value);
        }
    }
    // 正規表現チェック
    $com = 'a-zA-Z0-9!#<>:;&~@%+$"\'\*\^\(\)\[\]\|\/\.,_-';
    $pass_err = password_check($pass , 8 , $com);
    if($pass_err != ''){
        $err_msg['pass'] = $pass_err;
    }

    // 日付チェック
    $date_err[0] = is_reasonable_date($year,$month,$day);

    // 数値チェック
    $numeric_err[0] = numeric_check($tel);
    $numeric_err[1] = numeric_check($post_code);
    
    // パスワード確認
    if($pass != $confirm_pass){
        $pass_flg = 1;
    }
    if($pass_flg == 1 && $err_msg['confirm_pass'] == ''){
        $err_msg['confirm_pass'] = '確認用パスワードが一致しませんでした';
    }

    // エラー色変え
    foreach($err_msg as $key => $value){
        if($value != ''){
            $input_error_text[$key] = 'input_error_text';
        }elseif($value == ''){
            $input_error_text[$key] = 'input_text';
        }
    }
    if($pass_flg == 1){
        $input_error_text['confirm_pass'] = 'input_error_text';
    }

    // 拡張子識別
    if($_FILES['file']['type'] != 'image/jpeg'){
        $ex_flg = 1;
        $ex_err = '拡張子はjpgまたはjpegのみ対応しています';
    }

    // エラー分岐
    if(!error_count($err_msg) && $pass_flg == 0 && $pass_err === '' && $numeric_err[0] == '' && $numeric_err[1] == '' && $date_err[0] == '' && $ex_flg == 0){
        // セッション設定
        $_SESSION['mail'] = $mail;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['pass'] = $pass;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['first_name_kana'] = $first_name_kana;
        $_SESSION['last_name_kana'] = $last_name_kana;
        $_SESSION['year'] = $year;
        $_SESSION['month'] = $month;
        $_SESSION['day'] = $day;
        $_SESSION['gender'] = $gender;
        $_SESSION['tel'] = $tel;
        $_SESSION['post_code'] = $post_code;
        $_SESSION['prefecture'] = $prefecture;
        $_SESSION['municipalitie'] = $municipalitie;
        $_SESSION['address'] = $address;
        $_SESSION['building'] = $building;
        $_SESSION['profile'] = $profile;

/*         $_SESSION['card_num'] = $card_num;
        $_SESSION['card_name'] = $card_name;
        $_SESSION['card_date'] = $card_date;
        $_SESSION['card_code'] = $card_code; */

        // 画像一時保管
        // 日本語ファイルに対応するためにエンコードする
        $file_name = mb_convert_encoding($_FILES['file']['name'],'sjis','utf8');

        // セッションに画像名を保存する
        $_SESSION['product_img_name'] = $file_name;

        // 一時保存先「work」へのパスの設定
        $file_pass = './img/work/' . $file_name;

        // 一時保存処理
        move_uploaded_file($_FILES['file']['tmp_name'] , $file_pass);

        // ページ遷移
        header('Location:./confirm.php');
        exit;
    }
}

require_once './navigation.php';
require_once './tpl/entry.php';

?>