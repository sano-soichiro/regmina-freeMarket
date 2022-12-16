<!doctype html>
<html lang ="ja">
<head>
    <meta charset ="utf-8">
    <title>出品確認</title>
    <link href="./css/exhibit_confirm.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php require_once './tpl/navigation.php';?>

<div class="header">
    <h1>以下の内容で出品してもよろしいでしょうか？</h1>
    <p>登録ボタンを押すと登録を完了します。</p>
</div>

<div id="main">
    <div class="grouping">
        <div class="space"></div>
        <div class="line">
            <p class="title">商品名</p>
            <p class="content"><?php echo $product_name;?></p>
        </div>
        <div class="line">
            <p class="title">メインカテゴリー</p>
            <p class="content"><?php echo $category;?></p>
        </div>
    </div>
    <div class="grouping">
        <div class="line">
            <p class="title">発送地域</p>
            <p class="content"><?php echo $area;?></p>
        </div>
        <div class="line">
            <p class="title">発送までの日数</p>
            <p class="content"><?php echo $ship_day;?>日</p>
        </div>
        <div class="space"></div>
        <div class="line">
            <h2>期限算出</h2>
        </div>
        <div class="line">
            <p class="title_sub">野菜・果物の種類は？</p>
            <p class="content"><?php echo $vegetable;?></p>
        </div>
        <div class="line">
            <p class="title_sub">収穫日</p>
            <p class="content"><?php echo $harvest_year;?>/<?php echo $harvest_month;?>/<?php echo $harvest_day;?></p>
        </div>
        <div class="line">
            <p class="title_sub">期限算出結果</p>
            <p class="content"><?php echo $shelf_year;?>/<?php echo $shelf_month;?>/<?php echo $shelf_day;?><p>
        </div>
    </div>
    <div class="grouping">
        <div class="line">
            <p class="title">価格</p>
            <p class="content"><?php echo $payment;?>円</p>
        </div>
        <div class="line">
            <p class="title">在庫数</p>
            <p class="content"><?php echo $stock;?></p>
        </div>
        <div class="space"></div>
        <div class="line">
            <h2>自動値下げ</h2>
        </div>
        <div class="line">
            <p class="title_sub">値引率</p>
            <p class="content"><?php echo $discount_rate;?>％</p>
        </div>
        <div class="line">
            <p class="title_sub">値引き開始日</p>
            <p class="content">消費期限の<?php echo $discount_day;?>日前から</p>
        </div>
    </div>
    <div class="grouping">
        <div class="line">
            <p class="title">商品画像</p>
            <div class="product_img"><img src="./img/work/<?php echo $_SESSION['product_img_name'];?>" alt=""></div>
        </div>
    </div>

    <?php foreach ($head as $key => $val){?>
        <div class="grouping">
            <div class="line">
                <p class="title">01.商品の説明</p>
            </div>
            <div class="line">
                <p class="title_sub">見出し</p>
                <p class="content"><?php echo $val;?></p>
            </div>
            <div class="line">
                <p class="title_sub">説明画像</p>
                <div class="product_img"><img src="./img/work/<?php echo $_SESSION['head_img'.$key.'_name'];?>" alt=""></div>
            </div>
            <div class="line">
                <p class="title_sub">説明</p>
                <p class="content"><?php echo $head_ex[$key];?></p>
            </div>
        </div>
    <?php }?>

    <div class="space"></div>

    <form action="./exhibit_confirm.php" method="post">
        <div class="a_head">
            <input type="checkbox" name="consent" id="check">
            <label for="check"><a href="" class="a">REGMINA 利用規約</a> の契約条項に同意します (最終更新日：2021年12月27日)。</label>
        </div>

        <div class="btn_head">
            <button type="submit" name="confirm" value="back" class="btn"> < 戻る</button>
            <button type="submit" name="confirm" value="complete" class="btn">登録 > </button>
        </div>
    </form>
    
    <div class="space"></div>

</div>

</body>
</html>