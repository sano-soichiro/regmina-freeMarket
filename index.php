<?php
require_once './initial_setting.php';

$product = [];
$list = [];
$status = ['block','none'];
$err_modal = 'none';
$modal_alert = 'none';

// ピックアップ情報抜出
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $num = rand(1,22);
    $sql = "SELECT p.id AS 'id' , p.products_name AS 'name' , c.name AS 'category' , p.price AS 'payment' ,  p.img_name AS 'img_ex' , u.lastname AS 'lastname' , u.firstname AS 'firstname' , u.profile AS 'profile'
            FROM products as p
            INNER JOIN category_s AS c ON p.category_id = c.id
            INNER JOIN r_user AS u ON p.user_id = u.id
            WHERE p.category_id = ".$num." AND p.stock != 0
            ORDER BY p.expriration_date ASC
            LIMIT 5;";
    $result = db_run($link , $sql);
}
$work = mysqli_fetch_assoc($result);
while($work){
    $product[] = $work;
    $work = mysqli_fetch_assoc($result);
}

foreach($product as $key => $val){
    $product[$key]['user'] = $val['lastname'].$val['firstname'];
}

// ログイン状態
if(!empty($_COOKIE['login_id'])){
    // クラス名変更
    $status[0] = 'none';
    $status[1] = 'block';

    // ユーザー取得
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        $sql = "SELECT id , lastname , firstname FROM r_user WHERE id = ".$_COOKIE['login_id'];
        $result = db_run($link , $sql);
        $user = get_data($result);
    }


    if(!empty($_POST) && $_POST['confirm'] == 'logout'){
        // cookie削除
        setcookie('login_id' , '' , time()-100);
        
        header('Location:./index.php');
        exit;
    }
}

// 会員登録
if(!empty($_POST) && $_POST['confirm'] == 'entry'){
    $_SESSION['mail'] = $_POST['mail'];
    
    header('Location:./entry.php');
    exit;
}

// ログイン
if(!empty($_POST) && $_POST['confirm'] == 'login'){
    // ユーザーが存在するか
    $sql = "SELECT * FROM r_user WHERE user_id LIKE '".$_POST['user_id']."';";
    $link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
    if($link){
        mysqli_set_charset($link , 'utf-8');
        $result = mysqli_query($link , $sql);
        
        $work = mysqli_fetch_assoc($result);
        while($work){
            $list[] = $work;
            $work = mysqli_fetch_assoc($result);
        }
        mysqli_close($link);
    }
    
    // パスワードハッシュ化
    foreach($list as $key => $value){
        $salt = $value['salt'];
        $strech = $value['stretch'];
        $hash_pass = salt_hash($strech , $salt , $_POST['pass']);
        
        // ページ遷移
        if($value['hashed_pass'] == $hash_pass){
            setcookie('login_id' , $value['id'] , time()+60*60);
            
            header('Location:./index.php');
            exit;
        }
    }
    $err_modal = 'display';
    $modal_alert = 'modal_alert';
}

// 商品押下時
/* if(!empty($_GET) && strpos($_GET['product'] , 'product_number')){
    header('Location:./product.php?product_id='.$_POST['product']);
    exit;
}
 */

require_once './navigation.php';
require_once './tpl/index.php';
require_once './tpl/footer.php';
?>