/* データベースの指定 */
USE regmina;

DROP TABLE r_credit;

CREATE TABLE r_credit(
  user_id int(11) NOT NULL COMMENT '会員ID',
  id int(11) NOT NULL COMMENT '識別ID',
  card_num varchar(12) NOT NULL COMMENT 'カード番号',
  name varchar(255) NOT NULL COMMENT '利用者名',
  limit_day int(6) NOT NULL COMMENT '有効期限',
  security_code int(4) NOT NULL COMMENT 'セキュリティコード',
  PRIMARY KEY (user_id,id)
);

ALTER TABLE products DROP COLUMN img_name;
ALTER TABLE products ADD img_name varchar(255) NOT NULL COMMENT '拡張子';