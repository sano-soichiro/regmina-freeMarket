<?php

//-------------------------------------------------------------------------
//●未入力チェック
//-------------------------------------------------------------------------
function not_entered_check($entered_value){
   if($entered_value == ""){
      return NOT_ENTERED;
   }
   else{
      return '';
   }
}

//-------------------------------------------------------------------------
//●パスワードのチェック
//第一引数…チェック文字列
//第二引数…構成文字
//第三引数…必須文字の配列
//第四引数…何文字以上
//第二～第三引数でオプションを設定します。
//全て未設定の場合、問答無用でtrueを返します。
//-------------------------------------------------------------------------

function password_check($str,$count,$composition,$requireds = null){
   //正規表現を作成
   $pattern = '/^';
   if(!($requireds == null)){
      foreach($requireds as $condition){
         $pattern .= "(?=.*[" . $condition . "])";
      }
   }
   $pattern .= "[" . $composition . "]" . "{" . $count . ",}$/";
   //未入力チェック、パターンチェック
   if($str == ""){
      return NOT_ENTERED;
   }
   elseif(!preg_match($pattern,$str)){
      return NOT_PASS;
   }
   else{
      return '';
   }
}

//-------------------------------------------------------------------------
//●年齢チェック
//-------------------------------------------------------------------------
function age_check($age){
   if($age == ""){
      return NOT_ENTERED;
   }
   elseif(!is_numeric($age)){
      return NOT_NUMERIC;
   }
   elseif($age < 0){
      return NOT_PLUS;
   }
   else{
      return '';
   }
}

//-------------------------------------------------------------------------
//●セレクトボックスの初期値チェック
//-------------------------------------------------------------------------
function select_check($select_value){
   if($select_value == "initial_value"){
      return NOT_SELECT;
   }
   else{
      return '';
   }
}

//-------------------------------------------------------------------------
//●数値チェック
//-------------------------------------------------------------------------
function numeric_check($num){
   if($num == ""){
      return NOT_ENTERED;
   }
   elseif(!is_numeric($num)){
      return NOT_NUMERIC;
   }
   else{
      return '';
   }
}

//-------------------------------------------------------------------------
//●ファイルの形式チェック
//引数：$upload_file…$_FILESの内容が格納されている一次元連想配列
//引数：$format…対応形式を格納した一次元配列
//-------------------------------------------------------------------------
function format_check($upload_file,$format){
   if($upload_file['name'] == ''){
      return '';
   }
   $divided_file_name = explode('.',$upload_file['name']);
   $file_format = $divided_file_name[count($divided_file_name) - 1];
   if($file_format == ''){
      return FORMAT;
   }
   foreach($format as $value){
      if($value == $file_format || $value == strtolower($file_format)){
         return "";
      }
   }
   return FORMAT.'あなたがアップロードした形式は「'.$file_format.'」です。';
}

//-------------------------------------------------------------------------
//●日付の妥当性をチェックする
//引数①～③　順に　年、月、日
//-------------------------------------------------------------------------
function is_reasonable_date($year,$month,$day){
   if($year == "" || $month == "" || $day == ""){
      return NOT_ENTERED;
   }
   elseif(!(is_numeric($year) && is_numeric($month) && is_numeric($day))){
      return NOT_NUMERIC;
   }
   elseif(!checkdate($month,$day,$year)){
      return NOT_DATE;
   }
   else{
      return '';
   }
}

//-------------------------------------------------------------------------
//●エラーメッセージを格納エラーの個数を数える
//-------------------------------------------------------------------------

function error_count($error_msg){
   $count = 0;
   foreach($error_msg as $value){
      if(!$value == ""){
         $count ++;
      }
   }
   return $count;
}
?>