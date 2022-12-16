<?php
require_once './initial_setting.php';
//初期設定

if(!isset($_COOKIE['buy'][0])){
    header('location:./index.php');
    exit;
}

if(isset($_POST['button']) && $_POST['button'] == 'submit'){
    $error = [];
    $error['card_num'] = numeric_check($_POST['card_num']);
    $error['name'] = not_entered_check($_POST['name']);
    $error['limit'] = is_reasonable_date('20'.$_POST['year'],$_POST['month'],1);
    $error['security_code'] = numeric_check($_POST['security_code']);
    if(error_count($error) === 0){
        //エラーがない場合
        //データベース登録

        //データベースに接続する
        $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
        //sqlを設定する
        $sql = "SELECT MAX(id) as 'id' FROM r_credit WHERE user_id = ".$_COOKIE['login_id'];
        //sqlを実行する
        $result = db_run($link,$sql);
        //フェッチ処理
        $card_id = get_data($result);
        
        if(is_null($card_id[0]['id'])){
            $card_id[0]['id'] = 1;
        }
        else{
            $card_id[0]['id']++;
        }

        $month = $_POST['month'];
        if($_POST['month'] < 10){
            $month = '0'.$_POST['month'];
        }

        //--データベースに接続する
        $link = mysqli_connect(HOST,USER_ID,PASSWORD,DB_NAME);
        //--sqlを設定する
        $column = ['user_id','id','card_num','name','limit_day','security_code'];
        $entry_data = [$_COOKIE['login_id'],$card_id[0]['id'],$_POST['card_num'],$_POST['name'],'20'.$_POST['year'].$month,$_POST['security_code']];
        $sql = create_insert_sql('r_credit',$column,$entry_data);
        //--sqlを実行する
        $id = db_run_insert($link,$sql);
        //画面遷移
        header('Location:./t_pay.php');
        exit;
    }
}
else{

}

require_once './tpl/'.basename(__FILE__);
?>



