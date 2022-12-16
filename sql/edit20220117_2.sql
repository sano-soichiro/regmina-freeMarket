/* データベースの指定 */
USE regmina;

DROP TABLE how_long;

CREATE TABLE how_long(
  from_area int(2) NOT NULL COMMENT '配送元',
  to_area int(2) NOT NULL COMMENT '配送先',
  how_long int(2) NOT NULL COMMENT '日数',
  fee int(5) NOT NULL COMMENT '配送料',
  PRIMARY KEY (from_area,to_area)
);

INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','1','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','2','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','3','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','4','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','5','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','6','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','7','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('1','8','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','1','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','2','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','3','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','4','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','5','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','6','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','7','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('2','8','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','1','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','2','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','3','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','4','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','5','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','6','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','7','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('3','8','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','1','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','2','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','3','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','4','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','5','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','6','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','7','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('4','8','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','1','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','2','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','3','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','4','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','5','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','6','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','7','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('5','8','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','1','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','2','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','3','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','4','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','5','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','6','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','7','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('6','8','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','1','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','2','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','3','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','4','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','5','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','6','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','7','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('7','8','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','1','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','2','3','700');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','3','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','4','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','5','2','500');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','6','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','7','1','300');
INSERT INTO how_long(from_area,to_area,how_long,fee) VALUES('8','8','1','300');
