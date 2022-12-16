-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 12 月 16 日 16:29
-- サーバのバージョン： 10.4.14-MariaDB
-- PHP のバージョン: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `regmina`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `category_b`
--

CREATE TABLE `category_b` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'カテゴリー名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `category_b`
--

INSERT INTO `category_b` (`id`, `name`) VALUES
(1, '野菜'),
(2, '果物'),
(3, '加工食品');

-- --------------------------------------------------------

--
-- テーブルの構造 `category_s`
--

CREATE TABLE `category_s` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `category_b_id` int(11) NOT NULL COMMENT '大分類ID',
  `name` varchar(255) NOT NULL COMMENT 'カテゴリー名',
  `kana_name` varchar(255) NOT NULL COMMENT 'カテゴリーかな'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `category_s`
--

INSERT INTO `category_s` (`id`, `category_b_id`, `name`, `kana_name`) VALUES
(1, 1, 'ニンジン', 'にんじん'),
(2, 1, 'トマト', 'とまと'),
(3, 1, '玉ねぎ', 'たまねぎ'),
(4, 1, 'ごぼう', 'ごぼう'),
(5, 1, 'そら豆', 'そらまめ'),
(6, 1, 'ほうれん草', 'ほうれんそう'),
(7, 1, '蓮根', 'れんこん'),
(8, 1, 'オクラ', 'おくら'),
(9, 1, '枝豆', 'えだまめ'),
(10, 1, 'ピーマン', 'ぴーまん'),
(11, 1, 'ニンニク', 'にんにく'),
(12, 1, 'アスパラガス', 'あすぱらがす'),
(13, 1, 'キュウリ', 'きゅうり'),
(14, 2, 'リンゴ', 'りんご'),
(15, 2, 'レモン', 'れもん'),
(16, 2, '桃', 'もも'),
(17, 2, 'ブドウ', 'ぶどう'),
(18, 2, 'グレープフルーツ', 'ぐれーぷふるーつ'),
(19, 3, 'ジャム', 'じゃむ'),
(20, 3, '干し柿', 'ほしがき'),
(21, 3, 'スナック', 'すなっく');

-- --------------------------------------------------------

--
-- テーブルの構造 `expiration_date`
--

CREATE TABLE `expiration_date` (
  `id` int(11) NOT NULL COMMENT '識別ID',
  `name` varchar(255) NOT NULL COMMENT '発送先',
  `name_kana` varchar(255) NOT NULL COMMENT '発送先',
  `time` int(11) NOT NULL COMMENT '日数',
  `del_date` date DEFAULT NULL COMMENT '削除用カラム'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `expiration_date`
--

INSERT INTO `expiration_date` (`id`, `name`, `name_kana`, `time`, `del_date`) VALUES
(1, 'アスパラガス', 'あすぱらがす', 12, NULL),
(2, 'オクラ', 'おくら', 5, NULL),
(3, 'カボチャ', 'かぼちゃ', 90, NULL),
(4, 'カリフラワー', 'かりふらわー', 12, NULL),
(5, 'キュウリ', 'きゅうり', 10, NULL),
(6, 'キャベツ', 'きゃべつ', 8, NULL),
(7, 'ゴーヤ', 'ごーや', 12, NULL),
(8, '小松菜', 'こまつな', 7, NULL),
(9, 'さやいんげん', 'さやいんげん', 12, NULL),
(10, 'さやえんどう', 'さやえんどう', 12, NULL),
(11, 'ズッキーニ', 'ずっきーに', 9, NULL),
(12, 'そら豆', 'そらまめ', 8, NULL),
(13, '玉ねぎ', 'たまねぎ', 60, NULL),
(14, 'ちんげんさい', 'ちんげんさい', 7, NULL),
(15, 'トウモロコシ', 'とうもろこし', 12, NULL),
(16, 'トマト', 'とまと', 19, NULL),
(17, '茄子', 'なす', 12, NULL),
(18, 'ピーマン', 'ぴーまん', 24, NULL),
(19, 'もやし', 'もやし', 12, NULL),
(20, 'ニンニク', 'にんにく', 30, NULL),
(21, '長ネギ', 'ながねぎ', 30, NULL),
(22, '白菜', 'はくさい', 19, NULL),
(23, 'ブロッコリー', 'ぶろっこりー', 7, NULL),
(24, 'ほうれん草', 'ほうれんそう', 9, NULL),
(25, '水菜', 'みずな', 7, NULL),
(26, 'モロヘイヤ', 'もろへいや', 7, NULL),
(27, 'かぶ', 'かぶ', 9, NULL),
(28, 'ゴボウ', 'ごぼう', 35, NULL),
(29, 'さつまいも', 'さつまいも', 35, NULL),
(30, '里芋', 'さといも', 35, NULL),
(31, 'じゃがいも', 'じゃがいも', 7, NULL),
(32, '生姜', 'しょうが', 19, NULL),
(33, '大根', 'だいこん', 10, NULL),
(34, '長芋', 'ながいも', 19, NULL),
(35, '人参', 'にんじん', 15, NULL),
(36, '蓮根', 'れんこん', 10, NULL),
(37, 'リンゴ', 'りんご', 10, NULL),
(38, '梨', 'なし', 7, NULL),
(39, '苺', 'いちご', 8, NULL),
(40, 'ミカン', 'みかん', 25, NULL),
(41, 'レモン', 'れもん', 8, NULL),
(42, 'キウイ', 'きうい', 15, NULL),
(43, 'グレープフルーツ', 'ぐれーぷふるーつ', 9, NULL),
(44, 'バナナ', 'ばなな', 7, NULL),
(45, '柿', 'かき', 15, NULL),
(46, 'アボカド', 'あぼかど', 7, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `gender`
--

CREATE TABLE `gender` (
  `code` int(1) NOT NULL COMMENT '性別コード',
  `name` varchar(6) NOT NULL COMMENT '性別'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gender`
--

INSERT INTO `gender` (`code`, `name`) VALUES
(1, 'male'),
(2, 'female'),
(3, 'other');

-- --------------------------------------------------------

--
-- テーブルの構造 `how_long`
--

CREATE TABLE `how_long` (
  `from_area` tinyint(3) UNSIGNED NOT NULL COMMENT '発送元',
  `to_area` tinyint(3) UNSIGNED NOT NULL COMMENT '発送先',
  `time` int(11) NOT NULL COMMENT '日数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `prefecture`
--

CREATE TABLE `prefecture` (
  `id` int(2) NOT NULL,
  `region_id` tinyint(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_kana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `prefecture`
--

INSERT INTO `prefecture` (`id`, `region_id`, `name`, `name_kana`) VALUES
(1, 1, '北海道', 'ホッカイドウ'),
(2, 2, '青森県', 'アオモリケン'),
(3, 2, '岩手県', 'イワテケン'),
(4, 2, '宮城県', 'ミヤギケン'),
(5, 2, '秋田県', 'アキタケン'),
(6, 2, '山形県', 'ヤマガタケン'),
(7, 2, '福島県', 'フクシマケン'),
(8, 3, '茨城県', 'イバラキケン'),
(9, 3, '栃木県', 'トチギケン'),
(10, 3, '群馬県', 'グンマケン'),
(11, 3, '埼玉県', 'サイタマケン'),
(12, 3, '千葉県', 'チバケン'),
(13, 3, '東京都', 'トウキョウト'),
(14, 3, '神奈川県', 'カナガワケン'),
(15, 4, '新潟県', 'ニイガタケン'),
(16, 4, '富山県', 'トヤマケン'),
(17, 4, '石川県', 'イシカワケン'),
(18, 4, '福井県', 'フクイケン'),
(19, 4, '山梨県', 'ヤマナシケン'),
(20, 4, '長野県', 'ナガノケン'),
(21, 4, '岐阜県', 'ギフケン'),
(22, 4, '静岡県', 'シズオカケン'),
(23, 4, '愛知県', 'アイチケン'),
(24, 5, '三重県', 'ミエケン'),
(25, 5, '滋賀県', 'シガケン'),
(26, 5, '京都府', 'キョウトフ'),
(27, 5, '大阪府', 'オオサカフ'),
(28, 5, '兵庫県', 'ヒョウゴケン'),
(29, 5, '奈良県', 'ナラケン'),
(30, 5, '和歌山県', 'ワカヤマケン'),
(31, 6, '鳥取県', 'トットリケン'),
(32, 6, '島根県', 'シマネケン'),
(33, 6, '岡山県', 'オカヤマケン'),
(34, 6, '広島県', 'ヒロシマケン'),
(35, 6, '山口県', 'ヤマグチケン'),
(36, 7, '徳島県', 'トクシマケン'),
(37, 7, '香川県', 'カガワケン'),
(38, 7, '愛媛県', 'エヒメケン'),
(39, 7, '高知県', 'コウチケン'),
(40, 8, '福岡県', 'フクオカケン'),
(41, 8, '佐賀県', 'サガケン'),
(42, 8, '長崎県', 'ナガサキケン'),
(43, 8, '熊本県', 'クマモトケン'),
(44, 8, '大分県', 'オオイタケン'),
(45, 8, '宮崎県', 'ミヤザキケン'),
(46, 8, '鹿児島県', 'カゴシマケン'),
(47, 8, '沖縄県', 'オキナワケン');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT '識別ID',
  `products_name` varchar(255) NOT NULL COMMENT '商品名',
  `category_id` int(11) NOT NULL COMMENT 'カテゴリID',
  `from_area` int(2) NOT NULL COMMENT '発送地',
  `to_ship` int(11) NOT NULL COMMENT '発送までの日数',
  `burdener` int(1) NOT NULL COMMENT '出品者負担：0,受取側負担：1',
  `expriration_date` date NOT NULL COMMENT '消費期限',
  `start_date` int(11) DEFAULT NULL COMMENT '値引き開始日',
  `final_rate` int(11) DEFAULT NULL COMMENT '最終値引き率',
  `price` int(11) NOT NULL COMMENT '価格',
  `stock` int(11) NOT NULL COMMENT '在庫数',
  `del_date` date DEFAULT NULL COMMENT '削除用カラム',
  `user_id` int(11) NOT NULL COMMENT '識別ID',
  `img_name` varchar(255) NOT NULL COMMENT '拡張子'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `products_name`, `category_id`, `from_area`, `to_ship`, `burdener`, `expriration_date`, `start_date`, `final_rate`, `price`, `stock`, `del_date`, `user_id`, `img_name`) VALUES
(1, '大根', 7, 5, 3, 0, '2022-01-21', 4, 20, 270, 5, NULL, 10, '.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `products_info`
--

CREATE TABLE `products_info` (
  `products_id` int(11) NOT NULL COMMENT '商品ID',
  `id` int(11) NOT NULL COMMENT '連番',
  `title` varchar(255) NOT NULL COMMENT 'タイトル',
  `img_name` varchar(255) DEFAULT NULL COMMENT '画像名',
  `contents` varchar(255) NOT NULL COMMENT 'コンテンツの内容',
  `del_date` date DEFAULT NULL COMMENT '削除用カラム'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `products_info`
--

INSERT INTO `products_info` (`products_id`, `id`, `title`, `img_name`, `contents`, `del_date`) VALUES
(1, 0, 'ふにゃふにゃ', 'daikon.jpg', 'ふにゃヒュあしてます', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `region`
--

CREATE TABLE `region` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_kana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `region`
--

INSERT INTO `region` (`id`, `name`, `name_kana`) VALUES
(1, '北海道地方', 'ホッカイドウ'),
(2, '東北地方', 'トウホクチホウ'),
(3, '関東地方', 'カントウチホウ'),
(4, '中部地方', 'チュウブチホウ'),
(5, '近畿地方', 'キンキチホウ'),
(6, '中国地方', 'チュウゴクチホウ'),
(7, '四国地方', 'シコクチホウ'),
(8, '九州地方', 'キュウシュウチホウ');

-- --------------------------------------------------------

--
-- テーブルの構造 `r_credit`
--

CREATE TABLE `r_credit` (
  `user_id` int(11) NOT NULL COMMENT '会員ID',
  `id` int(11) NOT NULL COMMENT '識別ID',
  `card_num` varchar(12) NOT NULL COMMENT 'カード番号',
  `name` varchar(255) NOT NULL COMMENT '利用者名',
  `limit_day` int(6) NOT NULL COMMENT '有効期限',
  `security_code` int(4) NOT NULL COMMENT 'セキュリティコード'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `r_user`
--

CREATE TABLE `r_user` (
  `id` int(11) NOT NULL COMMENT '識別ID',
  `user_id` varchar(255) NOT NULL COMMENT 'ログインID',
  `hashed_pass` varchar(255) NOT NULL COMMENT 'ハッシュ化されたパスワード',
  `salt` varchar(255) NOT NULL COMMENT 'ソルト',
  `stretch` int(5) NOT NULL COMMENT 'ストレッチ回数',
  `lastname` varchar(255) NOT NULL COMMENT '姓',
  `firstname` varchar(255) NOT NULL COMMENT '名',
  `kana_lastname` varchar(255) DEFAULT NULL COMMENT 'セイ',
  `kana_firstname` varchar(255) DEFAULT NULL COMMENT 'メイ',
  `birth_day` date NOT NULL COMMENT '誕生日',
  `gender` int(1) NOT NULL COMMENT '性別コード',
  `tel_num` varchar(20) NOT NULL COMMENT '電話番号',
  `post_num` varchar(7) NOT NULL COMMENT '郵便番号',
  `prefecture` int(2) NOT NULL COMMENT '都道府県コード',
  `city_name` varchar(255) NOT NULL COMMENT '市区町村',
  `address` varchar(255) NOT NULL COMMENT '番地',
  `profile` varchar(255) DEFAULT '' COMMENT '自己紹介文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `r_user`
--

INSERT INTO `r_user` (`id`, `user_id`, `hashed_pass`, `salt`, `stretch`, `lastname`, `firstname`, `kana_lastname`, `kana_firstname`, `birth_day`, `gender`, `tel_num`, `post_num`, `prefecture`, `city_name`, `address`, `profile`) VALUES
(8, 'yuika', '4adf370896302a59b1384123b4ed3ee4', '61d56ae727f62', 4653, '中川', '結以花', 'ナカガワ', 'ユイカ', '2001-01-18', 1, '8098667641', '6660112', 28, '川西市', '大和西4-4-21', ''),
(9, 'yuika', 'e0b2a72d659c658af7de121cd6a7bb35', '61e44d9507858', 2319, '中川', '結以花', 'ナカガワ', 'ユイカ', '2001-01-18', 3, '8098667641', '6660112', 1, '川西市', '大和西4-4-21', '結以花マン'),
(10, 'ika', '4c1fd8d6b974f2fb20b8b1c729fd95ca', '61e44e9b8a939', 2425, '中川', '以下', 'ナカガワ', 'イカ', '2001-01-18', 1, '12345671234', '6660112', 1, '川西市大和西4丁目', '4-21', 'ikaaaaa'),
(11, 'mimura', 'c7f705526e015b377764a66d77e5a0b0', '61ee603f7c327', 3417, '吉村', '三村', 'ヨシムラ', 'ミムラ', '2000-10-03', 3, '8098667641', '6660112', 1, '川西市', '大和西', '三村くん');

-- --------------------------------------------------------

--
-- テーブルの構造 `shipping_adress`
--

CREATE TABLE `shipping_adress` (
  `id` int(11) NOT NULL COMMENT '識別ID',
  `name` varchar(255) NOT NULL COMMENT '宛名',
  `post_num` varchar(7) NOT NULL COMMENT '郵便番号',
  `prefecture` int(2) NOT NULL COMMENT '都道府県コード',
  `city_name` varchar(255) NOT NULL COMMENT '市区町村',
  `address` varchar(255) NOT NULL COMMENT '番地'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `category_b`
--
ALTER TABLE `category_b`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `category_s`
--
ALTER TABLE `category_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_b_id` (`category_b_id`);

--
-- テーブルのインデックス `expiration_date`
--
ALTER TABLE `expiration_date`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `how_long`
--
ALTER TABLE `how_long`
  ADD PRIMARY KEY (`from_area`,`to_area`),
  ADD KEY `to_area` (`to_area`);

--
-- テーブルのインデックス `prefecture`
--
ALTER TABLE `prefecture`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `from_area` (`from_area`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `products_info`
--
ALTER TABLE `products_info`
  ADD PRIMARY KEY (`products_id`,`id`);

--
-- テーブルのインデックス `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `r_credit`
--
ALTER TABLE `r_credit`
  ADD PRIMARY KEY (`user_id`,`id`);

--
-- テーブルのインデックス `r_user`
--
ALTER TABLE `r_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`),
  ADD KEY `prefecture` (`prefecture`);

--
-- テーブルのインデックス `shipping_adress`
--
ALTER TABLE `shipping_adress`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `category_b`
--
ALTER TABLE `category_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;

--
-- テーブルのAUTO_INCREMENT `category_s`
--
ALTER TABLE `category_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=22;

--
-- テーブルのAUTO_INCREMENT `expiration_date`
--
ALTER TABLE `expiration_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID', AUTO_INCREMENT=47;

--
-- テーブルのAUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID', AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `r_user`
--
ALTER TABLE `r_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID', AUTO_INCREMENT=12;

--
-- テーブルのAUTO_INCREMENT `shipping_adress`
--
ALTER TABLE `shipping_adress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID';

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `category_s`
--
ALTER TABLE `category_s`
  ADD CONSTRAINT `category_s_ibfk_1` FOREIGN KEY (`category_b_id`) REFERENCES `category_b` (`id`);

--
-- テーブルの制約 `how_long`
--
ALTER TABLE `how_long`
  ADD CONSTRAINT `how_long_ibfk_1` FOREIGN KEY (`from_area`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `how_long_ibfk_2` FOREIGN KEY (`to_area`) REFERENCES `region` (`id`);

--
-- テーブルの制約 `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_s` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`from_area`) REFERENCES `prefecture` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `r_user` (`id`);

--
-- テーブルの制約 `products_info`
--
ALTER TABLE `products_info`
  ADD CONSTRAINT `products_info_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- テーブルの制約 `r_user`
--
ALTER TABLE `r_user`
  ADD CONSTRAINT `r_user_ibfk_1` FOREIGN KEY (`gender`) REFERENCES `gender` (`code`),
  ADD CONSTRAINT `r_user_ibfk_2` FOREIGN KEY (`prefecture`) REFERENCES `prefecture` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
