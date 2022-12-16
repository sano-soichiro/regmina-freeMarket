/* データベースの指定 */
USE regmina;


CREATE TABLE transaction(
  id int(11) NOT NULL AUTO_INCREMENT COMMENT '識別ID',
  product_id int(11) NOT NULL COMMENT '商品ID',
  user_id int(11) NOT NULL COMMENT '購入者ID',
  credit_id int(11) NOT NULL COMMENT 'クレジットの識別ID',
  address_id int(11) NOT NULL COMMENT '配送先ID',
  tip int(11) NOT NULL COMMENT 'チップ',
  price_down_rate int(11) NOT NULL COMMENT '割引率',
  PRIMARY KEY (id)
);