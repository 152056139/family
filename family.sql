/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : family

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-11-16 20:57:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Dynimic
-- ----------------------------
DROP TABLE IF EXISTS `Dynimic`;
CREATE TABLE `Dynimic` (
  `Dynimic_no` int(11) NOT NULL AUTO_INCREMENT,
  `Dynimic_member` int(255) DEFAULT NULL,
  `Dynimic_count` double(255,0) DEFAULT NULL,
  `Dynimic_type` varchar(255) DEFAULT NULL,
  `Dynimic_remark` text,
  `Dynimic_datatime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Dynimic_no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Dynimic
-- ----------------------------
INSERT INTO `Dynimic` VALUES ('6', '26', '500', '收入', ' 充饭卡', '2017-11-03 20:42:08');
INSERT INTO `Dynimic` VALUES ('7', '27', '200', '支出', '买礼物', '2017-11-03 20:46:02');
INSERT INTO `Dynimic` VALUES ('8', '26', '200', '支出', ' 充装备', '2017-11-03 20:46:18');
INSERT INTO `Dynimic` VALUES ('10', '26', '1000', '收入', ' 买了个袜子，没错，就一个袜子就1000真的不是我骗你，真的就一直袜子，然后就1000真的不是我骗钱，信不信由你，反正这钱我花了，你能把我怎么滴。', '2017-11-03 21:13:32');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `member_no` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(255) DEFAULT NULL,
  `member_sex` varchar(255) DEFAULT '',
  `member_birthday` date DEFAULT NULL,
  `member_company` varchar(255) DEFAULT NULL,
  `member_job` varchar(255) DEFAULT NULL,
  `member_nation` varchar(255) DEFAULT NULL,
  `member_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `member_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`member_no`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('26', '杨旭', '男', '1997-05-14', '太原工业学院', '学生', '汉族', '20171103/05f305d01a253167aaebd93a2065a535.jpeg', '123');
INSERT INTO `member` VALUES ('27', '霍华丽', '女', '1997-10-04', '湖南理工学院', '学生', '汉族', '20171103/ab61170d52e8616c2dd57ef6b0062424.jpeg', '123');
