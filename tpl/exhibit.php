<!doctype html>
<html lang ="ja">
<head>
    <meta charset ="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>出品登録</title>
    <?php require_once './tpl/fonts.php';?>
    <link href="./css/exhibit.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php require_once './tpl/navigation.php';?> 

<div class="header">
    <h1>出品する商品情報を入力してください</h1>
    <p>あなたの出品する商品をわかりやすく紹介しましょう。</p>
</div>

<div id="main">
    <form action="./exhibit.php" method="post" enctype="multipart/form-data">
        <!-- lineのまとまり -->
        <div class="grouping">
            <div class="line">
                <div class="explanation">
                    <p class="bold">出品する商品名から入力してください</p>
                    <p class="nomal">出品する商品を一目でわかるように明白かつ簡単な<br>
                        タイトルを付けましょう。
                    </p>
                </div>
                <div class="input_space">
                    <p class="bold">商品名</p>
                    <input type="text" name="product_name" class="input">
                    <p class="err"><?php echo isset($err_msg['product_name']) ? $err_msg['product_name'] : "";?></p>
                </div>
            </div>
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品のカテゴリー</p>
                    <p class="nomal">この商品に最も合ったカテゴリーを選びましょう。</p>
                    <p class="nomal">購入者が注目しそうなカテゴリーを選びましょう。<br>
                        また、サブカテゴリーを選択することで、さらに<br>
                        具体的な検索結果で絞り込むことができます。</p>
                    <p class="nomal">カテゴリーとサブカテゴリ―は、商品の出品後でも<br>
                        変更することができます。</p>
                </div>
                <div class="input_space">
                    <p class="bold">商品カテゴリー</p>
                    <select name="category" class="input_min">
                        <?php foreach ($category as $val){?>
                            <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                        <?php }?>
                    </select>
                    <p class="err"><?php echo isset($err_msg['category']) ? $err_msg['category'] : "";?></p>
                </div>
            </div>
        </div>

        <!-- lineのまとまり -->
        <div class="grouping">
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品の発送地域</p>
                    <p class="nomal">商品の発送地となる地域を選択してください。</p>
                </div>
                <div class="input_space">
                    <p class="bold">地域</p>
                    <select name="area" class="input_min">
                        <?php foreach ($area as $val){?>
                            <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                        <?php }?>
                    </select>
                    <p class="err"><?php echo isset($err_msg['area']) ? $err_msg['area'] : "";?></p>
                </div>
            </div>
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品の発送までの日数</p>
                    <p class="nomal">商品の発送までの日数を選択してください。</p>
                </div>
                <div class="input_space">
                    <p class="bold">発送までの日数</p>
                    <input type="text" name="ship_day" class="input_min">
                    <p class="err"><?php echo isset($err_msg['ship_day']) ? $err_msg['ship_day'] : "";?></p>
                </div>
            </div>
            <div class="line">
                <div class="explanation">
                    <p class="bold">配送料の負担</p>
                    <p class="nomal">商品の配送料を出品者か購入者どちらが負担するかを<br>選択してください。</p>
                </div>
                <div class="input_space">
                    <p class="bold">配送料負担者</p>
                    <select name="ship_charge" class="input_min">
                        <option value="0">出品者</option>
                        <option value="1">購入者</option>
                    </select>
                    <p class="err"><?php echo isset($err_msg['ship_charge']) ? $err_msg['ship_charge'] : "";?></p>
                </div>
            </div>
            <div class="line">
                <h2>期限算出</h2>
            </div>
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品の賞味期限・消費期限</p>
                    <p class="nomal">期限算出機能は商品の賞味期限または消費期限の<br>
                        日付を付けます。賞味期限または消費期限どちかが<br>
                        期限を過ぎた場合商品が自動的に商品一覧画面から<br>
                        非表示にされます。
                    </p>
                </div>
                <div class="input_space">
                    <p class="bold">野菜・果物の種類は？</p>
                    <select name="vegetable" class="input_min" id="kind_id">
                        <?php foreach($shelf_life as $key => $val){?>
                            <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                        <?php }?>
                    </select>
                    <p class="err"><?php echo isset($err_msg['vegetable']) ? $err_msg['vegetable'] : "";?></p>

                    <p class="bold">いつ収穫しましたか？</p>
                    <input type="text" name="harvest_date" class="input" id="harvest_date" placeholder="例）20210101">
                    <p class="err"><?php echo isset($err_msg['harvest_date']) ? $err_msg['harvest_date'] : "";?></p>
                    
                    <button type="button" class="calc_btn" id="run_button">算出する</button>
                    <p class="bold">期限算出結果</p>
                    <input type="text" name="experition_date" class="input" id="experition_date">
                    <p class="err"><?php echo isset($err_msg['experition_date']) ? $err_msg['experition_date'] : "";?></p>
                </div>
            </div>
        </div>

        <!-- lineのまとまり -->
        <div class="grouping">
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品の価格</p>
                    <p class="nomal">商品の価格を付けてください。<br>
                        あなたの受取額か、購入者の支払額の<br>
                        価格を付けてください。
                    </p>
                </div>
                <div class="input_space">
                    <div class="flex">
                        <div>
                            <p class="bold">購入者支払額(手数料込)</p>
                            <input type="text" name="amount" class="input_min" id="price">
                        </div>
                        <div>
                            <p class="bold">あなたの受取額</p>
                            <input type="text" name="payment" class="input_min" id="included_price">
                        </div>
                    </div>
                    <p class="err"><?php echo isset($err_msg['amount']) ? $err_msg['amount'] : "";?></p>
                    <p class="err"><?php echo isset($err_msg['payment']) ? $err_msg['payment'] : "";?></p>
                </div>
            </div>
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品の在庫数</p>
                    <p class="nomal">販売する商品の在庫数を付けてください。<br>
                        ここでの在庫数は商品詳細ページに反映されます。
                    </p>
                </div>
                <div class="input_space">
                    <p class="bold">在庫数</p>
                    <input type="text" name="stock" class="input_min">
                    <p class="err"><?php echo isset($err_msg['stock']) ? $err_msg['stock'] : "";?></p>
                </div>
            </div>
            <div class="line">
                <div class="explanation">
                    <p class="bold">自動値下げ</p>
                    <p class="nomal">賞味期限・消費期限・値引き率に応じて期限に<br>
                        近づくにつれ自動的にシステムで<br>
                        値引きを行います。
                    </p>
                </div>
                <div class="input_space">
                    <p class="bold">値引率</p>
                    <div class="flex_">
                        <input type="text" name="discount_rate" class="input_min">
                        <p class="insert">％</p>
                    </div>

                    <p class="bold">値引き開始日</p>
                    <div class="flex">
                        <p class="insert2">値引き開始は消費期限の</p>
                        <input type="text" name="discount_day" class="input_min">
                        <p class="insert2">日前から</p>
                    </div>
                    <p class="err"><?php echo isset($err_msg['discount_day']) ? $err_msg['discount_day'] : "";?></p>
                </div>
            </div>
        </div>

        <!-- lineのまとまり -->
        <div class="grouping">
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品画像</p>
                    <p class="nomal">あなたのプロジェクトを分かりやすく表した画像を<br>
                        追加します。どんなサイズでもうまく表示される<br>
                        画像を選びましょう。<br>
                        この項目で選択された画像は商品詳細ページに<br>
                        表示されます。
                    </p>
                </div>
                <div class="input_space">
                    <input type="file" name="product_img" class="input_file">
                    <p class="err"><?php echo isset($err_msg['product_img']) ? $err_msg['product_img'] : "";?></p>
                </div>
            </div>
        </div>

        <!-- lineのまとまり -->
        <div class="grouping">
            <div class="line">
                <div class="explanation">
                    <p class="bold">商品の説明</p>
                    <p class="nomal">商品の説明では、購入者が知っておくべき情報を<br>
                        すべて記載してください。<br>
                        すべての項目を記述する必要が無ければ、その一部<br>
                        の項目は何も記述しなくても構いません。
                </div>
                <div class="input_space add_input">
                    <p class="bold">1.見出し</p>
                    <input type="text" name="head[]" class="input">
                    <p class="bold">1.商品説明画像</p>
                    <input type="file" name="head_img[]" class="input_file">
                    <p class="bold">1.商品説明</p>
                    <textarea name="head_ex[]" rows="6" cols="40" class="input_big"></textarea>
                </div>
            </div>
        </div>


        <div id="add_input_area">
            <?php for($i=0; $i<$form_count; $i++): ?>
            <div class="grouping">
                <div class="line">
                    <div class="explanation">
                        <p class="bold"></p>
                        <p class="nomal"></p>
                    </div>
                    <div class="input_space add_input" >
                        <p class="bold"><?php echo $i + 2;?>.見出し</p>
                        <input type="text" name="head[]" value="<?php echo $_POST['head'][$i]; ?>" class="input">
                        <p class="bold"><?php echo $i + 2;?>.商品説明画像</p>
                        <input type="file" name="head_img[]" value="<?php echo $_POST['head_img'][$i]; ?>" class="input_file">
                        <p class="bold"><?php echo $i + 2;?>.商品説明</p>
                        <textarea name="head_ex[]" rows="6" cols="40" class="input_big" value="<?php echo $_POST['head_ex'][$i]; ?>"></textarea>
                    </div>
                    <input type="hidden" name="count_box[]" value="">
                </div>
            </div>
            <?php endfor; ?>
        </div>



        <div class="line">
            <div class="explanation"></div>
            <div class="input_space">
                <button type="button" class="add_btn">項目<?php echo $i + 2 ?>を追加する　＋</button>
            </div>
        </div>
        <div class="flex_"><button type="submit" name="confirm" value="confirm" class="confirm_btn">確認画面へ　＞</button></div>
    </form>

</div>


<script src="./js/jquery-3.3.1.min.js"></script>
<script src="./js/add.js"></script>

</body>
</html>
