<?php
require_once './initial_setting.php';

if(isset($_SESSION)){
    // SESSION削除
    session_destroy();

    // 画面遷移
    header('Location:./index.php');
    exit;
}
else{
    // 不正アクセス
    header('Location:./exhibit.php');
    exit;
}

require_once './navigation.php';
require_once './tpl/footer.php';
?>