<?php
require_once './initial_setting.php';

$hash_pass = '';

$user = [];

$user_column = ['user_id','hashed_pass','salt','stretch','lastname','firstname','kana_lastname','kana_firstname','birth_day','gender','tel_num','post_num','prefecture','city_name','address','profile'];
$credit_column = ['user_id' , 'id' , 'card_num' , 'name' , 'limit_day' , 'security_code'];

// セッション取得
if(!empty($_SESSION)){
    $mail = $_SESSION['mail'];
    $user_id = $_SESSION['user_id'];
    $pass_code = $_SESSION['pass'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $first_name_kana = $_SESSION['first_name_kana'];
    $last_name_kana = $_SESSION['last_name_kana'];
    $year = $_SESSION['year'];
    $month = $_SESSION['month'];
    $day = $_SESSION['day'];
    $gender_code = $_SESSION['gender'];
    $tel = $_SESSION['tel'];
    $post_code = $_SESSION['post_code'];
    $prefecture_code = $_SESSION['prefecture'];
    $municipalitie = $_SESSION['municipalitie'];
    $address = $_SESSION['address'];
    $building = $_SESSION['building'];
    $profile = $_SESSION['profile'];
    $pass = '';

/*     $card_num = $_SESSION['card_num'];
    $card_name = $_SESSION['card_name'];
    $card_date = $_SESSION['card_date'];
    $card_code = $_SESSION['card_code']; */
}

// pass●化
for($i=0;$i < strlen($pass_code);$i++){
    $pass = $pass.'●';
}

// 都道府県取得
$link = mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT name FROM prefecture WHERE id = ".$prefecture_code.";";
    $result = db_run($link , $sql);
}
$work = mysqli_fetch_assoc($result);
$prefecture = $work['name'];

// 性別取得
if($gender_code == 1){
    $gender = '女性';
}elseif($gender_code == 2){
    $gender = '男性';
}else{
    $gender = 'カスタム';
}

// 戻るボタン押された時
if(!empty($_POST) && $_POST['confirm'] == 'back'){
    $_SESSION['confirm'] = 'back';

    if(file_exists('./img/work/' . $_SESSION['product_img_name'])){
        unlink('./img/work/' . $_SESSION['product_img_name']);
    }

    header('Location:./entry.php');
    exit;
}


// 完了ボタン押された時
if(!empty($_POST) && $_POST['confirm'] == 'complete'){
    // パスワードハッシュ化
    $salt = uniqid();
    $stretch = mt_rand(1000 , 10000);
    $hash_pass = salt_hash($stretch , $salt , $pass_code);

    $user_data = [$user_id,$hash_pass,$salt,$stretch,$last_name,$first_name,$last_name_kana,$first_name_kana,$year.$month.$day,$gender_code,$tel,$post_code,$prefecture_code,$municipalitie,$address,$profile];

    // DB格納
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');
        $insert_sql = create_insert_sql('r_user' , $user_column , $user_data);
        mysqli_query($link , $insert_sql);
        mysqli_close($link);
    }

    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT id FROM r_user ORDER BY id DESC LIMIT 1";
        $result = db_run($link , $sql);
    }
    $work = mysqli_fetch_assoc($result);
    if($work){
        $profile_id = $work;
    }else{
        $profile_id['id'] = 0;
    }

    // 画像フォルダ作成
    if(!file_exists("./img/profile/".$profile_id['id'])){
        mkdir("./img/profile/".$profile_id['id'] , 0777);
    }

    // imgフォルダに「元の画像」を保存する
    if(isset($_SESSION['product_img_name']) && file_exists('./img/work/' . $_SESSION['product_img_name'])){
        rename('./img/work/' . $_SESSION['product_img_name'] , './img/profile/' . $profile_id['id'] . '/thumb.jpg');
    }

    // クレカの処理
/*     $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT id FROM r_credit ORDER BY DESC LIMIT 1";
        $result = db_run($link , $sql);
    }
    $id_check = mysqli_fetch_assoc($result);

    if($id_check !== null){
        $id = $id + 1;
    }else{
        $id = 0;
    }

    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT id FROM r_user ORDER BY DESC LIMIT 1";
        $result = db_run($link , $sql);
    }
    $user_used_id = mysqli_fetch_assoc($result);

    $credit_data = ["'".$user_used_id."'" , $id , "'".$card_num."'" , "'".$card_name."'" , $card_date , $card_code];

    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');
        create_insert_sql('r_user' , $credit_column , $credit_data);
        mysqli_close($link);
    } */

    // セッション削除
    session_destroy();

    // 画面遷移
    header('Location:./complete.php');
    exit;
}


require_once './tpl/confirm.php';

?>