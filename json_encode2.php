<?php 
//----------------------------------------------------
//●データベース処理
//----------------------------------------------------
require_once './initial_setting.php';

//--データベースに接続する
$link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
//--sqlを設定する
$sql = "select id from prefecture where name LIKE '%".$_POST['prefecture']."%'";
//--sqlを実行する
$result = db_run($link,$sql);
//--フェッチ処理
$data = get_data($result);

echo json_encode($data);
?>