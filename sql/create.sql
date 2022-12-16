/* データベースの作成 */
CREATE DATABASE regmina CHARACTER SET utf8;
/* データベースの指定 */
USE regmina;

CREATE TABLE `region` (
  `id` tinyint(3) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_kana` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `prefecture` (
  `id` int(2) NOT NULL,
  `region_id` tinyint(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_kana` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE gender(
    code int(1) NOT NULL COMMENT '性別コード',
    name varchar(6) NOT NULL COMMENT '性別',
    PRIMARY KEY (code)
);

CREATE TABLE r_user(
    id int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID',
    user_id varchar(255) NOT NULL COMMENT 'ログインID',
    hashed_pass varchar(255) NOT NULL COMMENT 'ハッシュ化されたパスワード',
    salt varchar(255) NOT NULL COMMENT 'ソルト',
    stretch int(5) NOT NULL COMMENT 'ストレッチ回数',
    lastname varchar(255) NOT NULL COMMENT '姓',
    firstname varchar(255) NOT NULL COMMENT '名',
    kana_lastname varchar(255) COMMENT 'セイ',
    kana_firstname varchar(255) COMMENT 'メイ',
    birth_day date NOT NULL COMMENT '誕生日',
    gender int(1) NOT NULL COMMENT '性別コード',
    tel_num varchar(20) NOT NULL COMMENT '電話番号',
    post_num varchar(7) NOT NULL COMMENT '郵便番号',
    prefecture int(2) NOT NULL COMMENT '都道府県コード',
    city_name varchar(255) NOT NULL COMMENT '市区町村',
    address varchar(255) NOT NULL COMMENT '番地',
    profile varchar(255) DEFAULT '' COMMENT '自己紹介文',
    FOREIGN KEY(gender) REFERENCES gender(code),
    FOREIGN KEY(prefecture) REFERENCES prefecture(id),
    PRIMARY KEY (id)
);

CREATE TABLE r_credit(
    user_id int(11) NOT NULL COMMENT '会員ID',
    id int(11) NOT NULL COMMENT '識別ID',
    card_num varchar(12) NOT NULL COMMENT 'カード番号',
    name varchar(255) NOT NULL COMMENT '利用者名',
    limit_day int(6) NOT NULL COMMENT '有効期限',
    security_code int(4) NOT NULL COMMENT 'セキュリティコード',
    FOREIGN KEY(user_id) REFERENCES r_user(id),
    PRIMARY KEY (user_id,id)
);

INSERT INTO gender 
(code,name)
VALUES 
(1,'male'),
(2,'female'),
(3,'other');

INSERT INTO `region` VALUES
  (1,'北海道地方','ホッカイドウ'),
  (2,'東北地方','トウホクチホウ'),
  (3,'関東地方','カントウチホウ'),
  (4,'中部地方','チュウブチホウ'),
  (5,'近畿地方','キンキチホウ'),
  (6,'中国地方','チュウゴクチホウ'),
  (7,'四国地方','シコクチホウ'),
  (8,'九州地方','キュウシュウチホウ');

  INSERT INTO `prefecture` VALUES
  (1,1,'北海道','ホッカイドウ'),
  (2,2,'青森県','アオモリケン'),
  (3,2,'岩手県','イワテケン'),
  (4,2,'宮城県','ミヤギケン'),
  (5,2,'秋田県','アキタケン'),
  (6,2,'山形県','ヤマガタケン'),
  (7,2,'福島県','フクシマケン'),
  (8,3,'茨城県','イバラキケン'),
  (9,3,'栃木県','トチギケン'),
  (10,3,'群馬県','グンマケン'),
  (11,3,'埼玉県','サイタマケン'),
  (12,3,'千葉県','チバケン'),
  (13,3,'東京都','トウキョウト'),
  (14,3,'神奈川県','カナガワケン'),
  (15,4,'新潟県','ニイガタケン'),
  (16,4,'富山県','トヤマケン'),
  (17,4,'石川県','イシカワケン'),
  (18,4,'福井県','フクイケン'),
  (19,4,'山梨県','ヤマナシケン'),
  (20,4,'長野県','ナガノケン'),
  (21,4,'岐阜県','ギフケン'),
  (22,4,'静岡県','シズオカケン'),
  (23,4,'愛知県','アイチケン'),
  (24,5,'三重県','ミエケン'),
  (25,5,'滋賀県','シガケン'),
  (26,5,'京都府','キョウトフ'),
  (27,5,'大阪府','オオサカフ'),
  (28,5,'兵庫県','ヒョウゴケン'),
  (29,5,'奈良県','ナラケン'),
  (30,5,'和歌山県','ワカヤマケン'),
  (31,6,'鳥取県','トットリケン'),
  (32,6,'島根県','シマネケン'),
  (33,6,'岡山県','オカヤマケン'),
  (34,6,'広島県','ヒロシマケン'),
  (35,6,'山口県','ヤマグチケン'),
  (36,7,'徳島県','トクシマケン'),
  (37,7,'香川県','カガワケン'),
  (38,7,'愛媛県','エヒメケン'),
  (39,7,'高知県','コウチケン'),
  (40,8,'福岡県','フクオカケン'),
  (41,8,'佐賀県','サガケン'),
  (42,8,'長崎県','ナガサキケン'),
  (43,8,'熊本県','クマモトケン'),
  (44,8,'大分県','オオイタケン'),
  (45,8,'宮崎県','ミヤザキケン'),
  (46,8,'鹿児島県','カゴシマケン'),
  (47,8,'沖縄県','オキナワケン');

CREATE TABLE shipping_adress(
  id int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID',
  name varchar(255) NOT NULL COMMENT '宛名',
  post_num varchar(7) NOT NULL COMMENT '郵便番号',
  prefecture int(2) NOT NULL COMMENT '都道府県コード',
  city_name varchar(255) NOT NULL COMMENT '市区町村',
  address varchar(255) NOT NULL COMMENT '番地',
  PRIMARY KEY (id)
);

CREATE TABLE category_b (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  name varchar(255) NOT NULL COMMENT 'カテゴリー名',
  PRIMARY KEY (id)
);

CREATE TABLE category_s (
  id int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  category_b_id int(11) NOT NULL COMMENT '大分類ID',
  name varchar(255) NOT NULL COMMENT 'カテゴリー名',
  kana_name varchar(255) NOT NULL COMMENT 'カテゴリーかな',
  PRIMARY KEY (id),
  FOREIGN KEY(category_b_id) REFERENCES category_b(id)
);

INSERT INTO category_b
(name)
VALUES
('野菜'),
('果物'),
('加工食品');

INSERT INTO category_s
(category_b_id,name,kana_name)
VALUES
(1,'ニンジン','にんじん'),
(1,'トマト','とまと'),
(1,'玉ねぎ','たまねぎ'),
(1,'ごぼう','ごぼう'),
(1,'そら豆','そらまめ'),
(1,'ほうれん草','ほうれんそう'),
(1,'蓮根','れんこん'),
(1,'オクラ','おくら'),
(1,'枝豆','えだまめ'),
(1,'ピーマン','ぴーまん'),
(1,'ニンニク','にんにく'),
(1,'アスパラガス','あすぱらがす'),
(1,'キュウリ','きゅうり'),
(2,'リンゴ','りんご'),
(2,'レモン','れもん'),
(2,'桃','もも'),
(2,'ブドウ','ぶどう'),
(2,'グレープフルーツ','ぐれーぷふるーつ'),
(3,'ジャム','じゃむ'),
(3,'干し柿','ほしがき'),
(3,'スナック','すなっく');

CREATE TABLE products(
  id int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID',
  products_name varchar(255) NOT NULL COMMENT '商品名',
  category_id int(11) NOT NULL COMMENT 'カテゴリID',
  from_area int(2) NOT NULL COMMENT '発送地',
  to_ship int(11) NOT NULL COMMENT '発送までの日数',
  burdener int(1) NOT NULL COMMENT '出品者負担：0,受取側負担：1',
  expriration_date date NOT NULL COMMENT '消費期限',
  start_date int(11) DEFAULT NULL COMMENT '値引き開始日',
  final_rate int(11) DEFAULT NULL COMMENT '最終値引き率',
  price int(11) NOT NULL COMMENT '価格',
  stock int(11) NOT NULL COMMENT '在庫数',
  del_date date DEFAULT NULL COMMENT '削除用カラム',
  img_name int(255) NOT NULL COMMENT '画像ファイル名',
  user_id int(11) NOT NULL COMMENT '識別ID',
  FOREIGN KEY (category_id) REFERENCES category_s(id),
  FOREIGN KEY (from_area) REFERENCES prefecture(id),
  FOREIGN KEY (user_id) REFERENCES r_user(id),
  PRIMARY KEY (id)
);

CREATE TABLE products_info(
  products_id int(11) NOT NULL COMMENT '商品ID',
  id int(11) NOT NULL COMMENT '連番',
  title varchar(255) NOT NULL COMMENT 'タイトル',
  img_name varchar(255) DEFAULT NULL COMMENT '画像名',
  contents varchar(255) NOT NULL COMMENT 'コンテンツの内容',
  del_date date DEFAULT NULL COMMENT '削除用カラム',
  PRIMARY KEY (products_id,id),
  FOREIGN KEY(products_id) REFERENCES products(id)
);

CREATE TABLE how_long(
  from_area tinyint(3) unsigned COMMENT '発送元',
  to_area tinyint(3) unsigned COMMENT '発送先',
  time int(11) NOT NULL COMMENT '日数',
  FOREIGN KEY (from_area) REFERENCES region(id),
  FOREIGN KEY (to_area) REFERENCES region(id),
  PRIMARY KEY (from_area,to_area)
);

CREATE TABLE expiration_date(
  id int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID',
  name varchar(255) NOT NULL COMMENT '発送先',
  name_kana varchar(255) NOT NULL COMMENT '発送先',
  time int(11) NOT NULL COMMENT '日数',
  del_date date DEFAULT NULL COMMENT '削除用カラム',
  PRIMARY KEY (id)
); 

INSERT INTO expiration_date
(name,name_kana,time)
VALUES
('アスパラガス','あすぱらがす',12),
('オクラ','おくら',5),
('カボチャ','かぼちゃ',90),
('カリフラワー','かりふらわー',12),
('キュウリ','きゅうり',10),
('キャベツ','きゃべつ',8),
('ゴーヤ','ごーや',12),
('小松菜','こまつな',7),
('さやいんげん','さやいんげん',12),
('さやえんどう','さやえんどう',12),
('ズッキーニ','ずっきーに',9),
('そら豆','そらまめ',8),
('玉ねぎ','たまねぎ',60),
('ちんげんさい','ちんげんさい',7),
('トウモロコシ','とうもろこし',12),
('トマト','とまと',19),
('茄子','なす',12),
('ピーマン','ぴーまん',24),
('もやし','もやし',12),
('ニンニク','にんにく',30),
('長ネギ','ながねぎ',30),
('白菜','はくさい',19),
('ブロッコリー','ぶろっこりー',7),
('ほうれん草','ほうれんそう',9),
('水菜','みずな',7),
('モロヘイヤ','もろへいや',7),
('かぶ','かぶ',9),
('ゴボウ','ごぼう',35),
('さつまいも','さつまいも',35),
('里芋','さといも',35),
('じゃがいも','じゃがいも',7),
('生姜','しょうが',19),
('大根','だいこん',10),
('長芋','ながいも',19),
('人参','にんじん',15),
('蓮根','れんこん',10),
('リンゴ','りんご',10),
('梨','なし',7),
('苺','いちご',8),
('ミカン','みかん',25),
('レモン','れもん',8),
('キウイ','きうい',15),
('グレープフルーツ','ぐれーぷふるーつ',9),
('バナナ','ばなな',7),
('柿','かき',15),
('アボカド','あぼかど',7);