<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/textbox_style.css">
    <link rel="stylesheet" href="./css/entry_style.css">
    <link rel="stylesheet" href="./css/radio.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php require_once './tpl/fonts.php'; ?>
    <title>REGMINA</title>
</head>
<body>
<section id="entry_section">
    <form action="./entry.php" method="post" enctype="multipart/form-data">

        <div class="form_user_content">
            <div class="form_content_01">
                <h1 class="form_title">会員登録</h1>
                <p class="form_comment">安心・安全にご利用いただくために、お客さまの本人情報の登録に<br>ご協力ください。他のお客さまに公開されることはありません。</p>
            </div>
            <div class="form_content_02">
                <div class="form_head">メールアドレス</div>
                <div class="input_block"><input type="text" name="mail" class="form_textbox_medium input_text <?php echo $input_error_text['mail'];?>" value="<?php echo $mail;?>"></div class="input_block">
                <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['mail']; ?></p></div>
            </div>
            <div class="form_content_02">
                <div class="form_head">ユーザーID</div>
                <div class="input_block"><input type="text" name="user_id" class="form_textbox_medium input_text <?php echo $input_error_text['user_id'];?>" value="<?php echo $user_id;?>"></div class="input_block">
                <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['user_id']; ?></p></div>
            </div>
            <div class="form_content_02 padding_top_20px">
                <div class="form_head">パスワード <span class="form_head_comment">半角英数字(記号含む) 8文字以上</span></div>
                <div class="input_block"><input type="text" name="pass" class="form_textbox_medium input_text <?php echo $input_error_text['pass'];?>" value="<?php echo $pass;?>"></div class="input_block">
                <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['pass']; ?></p></div>
            </div>
            <div class="form_content_02">
                <div class="form_head">確認のためもう一度入力してください</div>
                <div class="input_block"><input type="text" name="confirm_pass" class="form_textbox_medium input_text <?php echo $input_error_text['confirm_pass'];?>" value="<?php echo $confirm_pass;?>"></div class="input_block">
                <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['confirm_pass']; ?></p></div>
            </div>
        </div>
        <div class="page_border"></div>

        <!-- 本人基本情報 -->
        <div class="form_basic_content">
            <div class="form_block_01">
                <h2 class="form_subtitle">本人基本情報</h2>
                <p class="form_comment">入力情報に誤りがあると、パスワード再設定が正しく行えない場合があります。<br>ご自身の氏名をお間違えないように登録してください。</p>
            </div>
            <div class="form_content_02_flex">
                <div class="form_short_block">
                    <div class="form_head">姓 (全角)</div>
                    <div class="input_block"><input type="text" name="last_name" class="form_textbox_short input_text <?php echo $input_error_text['last_name'];?>" value="<?php echo $last_name;?>"></div class="input_block">
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['last_name']; ?></p></div>
                </div>
                <div class="form_short_block">
                    <div class="form_head">名 (全角)</div>
                    <div class="input_block"><input type="text" name="first_name" class="form_textbox_short input_text <?php echo $input_error_text['first_name'];?>" value="<?php echo $first_name;?>"></div class="input_block">
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['first_name']; ?></p></div>
                </div>
            </div>
            <div class="form_content_02_flex">
                <div class="form_short_block">
                    <div class="form_head">姓カナ (全角)</div>
                    <div class="input_block"><input name="last_name_kana" type="text" class="form_textbox_short input_text <?php echo $input_error_text['last_name_kana'];?>" value="<?php echo $last_name_kana;?>"></div>
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['last_name_kana']; ?></p></div>
                </div>
                <div class="form_short_block">
                    <div class="form_head">名カナ (全角)</div>
                    <div class="input_block"><input name="first_name_kana" type="text" class="form_textbox_short input_text <?php echo $input_error_text['first_name_kana'];?>" value="<?php echo $first_name_kana;?>"></div>
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['first_name_kana']; ?></p></div>
                </div>
            </div>
            <div class="form_content_02">
                <div class="form_short_block">
                    <div class="form_head">生年月日</div>
                    <div class="input_birthday_content">
                        <div class="input_block margin_right_10px"><input type="text" name="year" class="form_textbox_YYYY input_text <?php echo $input_error_text['year'];?>" value="<?php echo $year;?>" placeholder="YYYY"></div>
                        <div class="big_slash">/</div>
                        <div class="input_block margin_right_10px"><input type="text" name="month" class="form_textbox_MMDD input_text <?php echo $input_error_text['month'];?>" value="<?php echo $month;?>" placeholder="MM"></div>
                        <div class="big_slash">/</div>
                        <div class="input_block margin_right_10px"><input type="text" name="day" class="form_textbox_MMDD input_text <?php echo $input_error_text['day'];?>" value="<?php echo $day;?>" placeholder="DD"></div>
                    </div>
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['birth_day']; ?></p></div>
                </div>
            </div>
            <div class="form_head padding_top_20px">性別</div>
                <div class="form_radio_flex">
                    <label>女性<input type="radio" class="radio_button" name="gender" value="1" <?php echo $checked[0];?>><span class="outside"><span class="inside"></span></span></label>
                    <label>男性<input type="radio" class="radio_button" name="gender" value="2" <?php echo $checked[1];?>><span class="outside"><span class="inside"></span></span></label>
                    <label>カスタム<input type="radio" class="radio_button" name="gender" value="3" <?php echo $checked[2];?>><span class="outside"><span class="inside"></span></span></label>
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['gender']; ?></p></div>
                </div>
            <div class="form_content_02">
                <div class="form_head">電話番号</div>
                    <div class="input_block"><input type="text" name="tel" class="form_textbox_short input_text <?php echo $input_error_text['tel'];?>" value="<?php echo $tel ;?>"></div>
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['tel']; ?></p></div>
                </div>            
            </div>
        </div>
        <div class="page_border"></div>
        <div class="form_address_content padding_bottom_40px">
            <div class="form_head_20 padding_bottom_40px">住所</div>
            <div class="padding_left_40px">
                <div class="form_address_block">
                    <div class="form_address_head">郵便番号</div>
                    <div class="input_block_flex"><input id="zipcode" type="text" name="post_code" class="form_textbox_post input_text <?php echo $input_error_text['zipcode'];?> margin_0" value="<?php echo $post_code;?>"><button type="button" id="postcode_btn"class="address_search_button" name="address_search" value="address_search"><i class="fas fa-search"></i>住所検索</button></div class="input_block">
                </div>
                <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['post_code']; ?></p></div>
                <div class="form_address_block">
                    <div class="form_address_head">都道府県</div>
                    <select name="prefecture" id="prefecture">
                        <?php foreach($prefecture_list as $key => $value){ ?>
                        <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                        <?php } ?>
                    </select>
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['prefecture']; ?></p></div>
                </div>
                <div class="form_address_block">
                    <div class="form_address_head">市区町村</div>
                    <div class="input_block"><input id="city" type="text" name="municipalitie" class="form_textbox_medium input_text <?php echo $input_error_text['municipalitie'];?>" value="<?php echo $municipalitie;?>"></div class="input_block">
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['municipalitie']; ?></p></div>
                </div>
                <div class="form_address_block padding_bottom_20px">
                    <div class="form_address_head">町域</div>
                    <div class="input_block"><input id="address" type="text" name="address" class="form_textbox_medium input_text <?php echo $input_error_text['address'];?>" value="<?php echo $address;?>"></div class="input_block">
                    <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['address']; ?></p></div>
                </div>
                <div class="form_address_block padding_bottom_20px">
                    <div class="form_address_head">建物名<span class="form_tag">任意</span></div>
                    <div class="input_block"><input id="" type="text" name="building" class="form_textbox_medium input_text" value="<?php echo $building;?>"></div class="input_block">
                    <div class="form_text_msg_block"><p class="error_msg_color"></p></div>
                </div>
            </div>
        </div>
        <div class="page_border"></div>
        <div class="form_basic_content">
            <div class="form_content_02">
                <div class="form_head">プロフィール写真<span class="form_head_comment">拡張子は".jpg"のみ対応してます</span></div>
                <div class="input_block"><input type="file" name="file" class="form_textbox_medium input_text <?php echo $input_error_text['file']; ?>"></div class="input_block">
                <div><p class="error_msg_color"><?php echo $err_msg['file']; ?></p></div>
            </div>
            <div class="form_content_02">
                <div class="form_head">自己紹介</div>
                <div class="input_block"><input type="text" name="profile" class="form_textbox_medium input_text <?php echo $input_error_text['profile'];?>" value="<?php echo $profile;?>"></div class="input_block">
                <div class="form_text_msg_block"><p class="error_msg_color"><?php echo $err_msg['profile']; ?></p></div>
            </div>
        </div>
        <div class="page_border"></div>
        <div class="submit_entry_btn"><button type="submit" class="confirm_button basic_button margin_bottom_100px" name="confirm" value="confirm">確認画面へ</button></div>
    </form>
</section>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/postcode.js"></script>
</body>
</html>