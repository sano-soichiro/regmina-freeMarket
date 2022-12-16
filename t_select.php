<?php
//初期設定
require_once './initial_setting.php';

if(!isset($_COOKIE['buy'][0])){
    header('location:./index.php');
    exit;
}

require_once './tpl/'.basename(__FILE__);

?>