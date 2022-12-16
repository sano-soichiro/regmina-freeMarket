<!doctype html>
<html lang ="ja">
<head>
<meta charset ="utf-8">
<title>タイトル</title>
<link href="./css/confirm.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- require_once header部分 -->
<div id="main">
    
    <div id="head">
        <h1>会員登録</h1>
        <p class="main_p">以下の内容で登録してもよろしいですか？</p>
        <p class="sub_p">登録ボタンを押すと登録を完了します。</p>
    </div>
    
    <div id="main_clum">
        <div class="clum">
            <p class="head_clum">ユーザID</p>
            <p class="sub_clum"><?php echo $user_id;?></p>
        </div>
        <div class="clum">
            <p class="head_clum">メールアドレス</p>
            <p class="sub_clum"><?php echo $mail;?></p>
        </div>
        <div class="clum">
            <p class="head_clum">パスワード</p>
            <p class="sub_clum"><?php echo $pass;?></p>
        </div>
        <div class="clum">
            <p class="head_clum">氏名</p>
            <p class="sub_clum"><?php echo $last_name . $first_name;?></p>
        </div>
        <div class="clum">
            <p class="head_clum">氏名(フリガナ)</p>
            <p class="sub_clum"><?php echo $last_name_kana . $first_name_kana;?></p>
        </div>
        <div class="clum">
            <p class="head_clum">生年月日</p>
            <p class="sub_clum"><?php echo $year;?>年<?php echo $month;?>月<?php echo $day;?>日</p>
        </div>
        <div class="clum">
            <p class="head_clum">性別</p>
            <p class="sub_clum"><?php echo $gender;?></p>
        </div>
        <div class="clum">
            <p class="head_clum">電話番号</p>
            <p class="sub_clum"><?php echo $tel?></p>
        </div>
        <div class="clum">
            <p class="head_clum">郵便番号</p>
            <p class="sub_clum"><?php echo $post_code;?></p>
        </div>
        <div class="clum">
            <p class="head_clum">住所</p>
            <p class="sub_clum"><?php echo $prefecture . $municipalitie . $address . $building;?></p>
        </div>
    </div>
    
    <p class="sub_pp">[登録]をクリックすることで、利用規約、<br>データに関するポリシー、Cookieポリシーに同意するものとします。</p>
    
    <form action="./confirm.php" method="post">
        <div id="btn_head">
            <button type="submit" name="confirm" value="back">戻る</button>
            <button type="submit" name="confirm" value="complete">登録</button>
        </div>
    </form>
    
    <a href="">アカウントをすでにお持ちの方はこちらへ</a>

</div>
</body>
</html>