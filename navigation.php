<?php
require_once './initial_setting.php';


// カテゴリー取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT * FROM category_s ORDER BY kana_name ASC";
    $result = db_run($link , $sql);
    $category = get_data($result);
}

// 地域取得
$link = @mysqli_connect(HOST , USER_ID , PASSWORD , DB_NAME);
if($link){
    $sql = "SELECT * FROM region";
    $result = db_run($link , $sql);
    $area = get_data($result);
}

require_once './tpl/navigation.php';
?>