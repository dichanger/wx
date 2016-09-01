/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : activity

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2016-08-30 11:28:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ac_admin
-- ----------------------------
DROP TABLE IF EXISTS `ac_admin`;
CREATE TABLE `ac_admin` (
  `id` int(11) NOT NULL,
  `adminUser` varchar(255) DEFAULT NULL,
  `adminPass` varchar(255) DEFAULT NULL,
  `datatime` datetime DEFAULT NULL COMMENT '登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_admin
-- ----------------------------
INSERT INTO `ac_admin` VALUES ('1', 'admin', ' admin', null);

-- ----------------------------
-- Table structure for ac_prize
-- ----------------------------
DROP TABLE IF EXISTS `ac_prize`;
CREATE TABLE `ac_prize` (
  `id` int(11) NOT NULL,
  `prize_name` varchar(255) DEFAULT NULL COMMENT '奖品名',
  `type` varchar(255) DEFAULT NULL COMMENT '类型',
  `price` decimal(10,0) DEFAULT NULL COMMENT '价格',
  `picture_path` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `surplus` int(11) DEFAULT NULL COMMENT '剩余',
  `total` int(11) DEFAULT NULL COMMENT '累计发放份数',
  `already` int(255) DEFAULT NULL COMMENT '累计提现人数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_prize
-- ----------------------------
INSERT INTO `ac_prize` VALUES ('1', '一元红包', '现金', '1', '', '100', '102', '101');
INSERT INTO `ac_prize` VALUES ('2', '四十四', '试试', '1', null, '1', '1', '1');

-- ----------------------------
-- Table structure for ac_signin
-- ----------------------------
DROP TABLE IF EXISTS `ac_signin`;
CREATE TABLE `ac_signin` (
  `id` int(11) NOT NULL,
  `invitation_code` int(11) DEFAULT NULL COMMENT '邀请码',
  `con_day` int(11) DEFAULT NULL COMMENT '签到天数',
  `signin_time` datetime DEFAULT NULL COMMENT '签到时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_signin
-- ----------------------------

-- ----------------------------
-- Table structure for ac_user
-- ----------------------------
DROP TABLE IF EXISTS `ac_user`;
CREATE TABLE `ac_user` (
  `id` int(11) NOT NULL,
  `wechat_name` varchar(255) DEFAULT NULL COMMENT '微信名',
  `real_name` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `phone_number` char(22) DEFAULT NULL COMMENT '手机号码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_user
-- ----------------------------
