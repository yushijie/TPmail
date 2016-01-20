/*
Navicat MySQL Data Transfer

Source Server         : 本机连接
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-01-20 21:06:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `think_cart`
-- ----------------------------
DROP TABLE IF EXISTS `think_cart`;
CREATE TABLE `think_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `goods` text NOT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_cart
-- ----------------------------
INSERT INTO `think_cart` VALUES ('17', '7', 'a:4:{i:0;a:2:{s:2:\"id\";s:1:\"3\";s:3:\"num\";i:1;}i:1;a:2:{s:2:\"id\";s:2:\"14\";s:3:\"num\";i:3;}i:2;a:2:{s:2:\"id\";s:1:\"5\";s:3:\"num\";i:6;}i:3;a:2:{s:2:\"id\";s:2:\"12\";s:3:\"num\";i:1;}}', '1453279563');

-- ----------------------------
-- Table structure for `think_goods`
-- ----------------------------
DROP TABLE IF EXISTS `think_goods`;
CREATE TABLE `think_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'goodsid',
  `title` varchar(30) NOT NULL,
  `price` float(20,2) NOT NULL DEFAULT '0.00',
  `create_time` int(10) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '商品状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_goods
-- ----------------------------
INSERT INTO `think_goods` VALUES ('3', '衣服', '100.06', '1453186988', '1453186988', '0');
INSERT INTO `think_goods` VALUES ('4', '裤子', '90.00', '1453187140', '1453187140', '0');
INSERT INTO `think_goods` VALUES ('5', '电脑', '3000.00', '1453187150', '1453187150', '0');
INSERT INTO `think_goods` VALUES ('6', '鼠标', '30.11', '1453187160', '1453187160', '0');
INSERT INTO `think_goods` VALUES ('7', '杯子', '10.09', '1453187173', '1453187173', '0');
INSERT INTO `think_goods` VALUES ('8', '测试商品1', '11.00', '1453187193', '1453187193', '0');
INSERT INTO `think_goods` VALUES ('9', '测试商品2', '22.00', '1453187195', '1453187195', '0');
INSERT INTO `think_goods` VALUES ('11', '测试商品4', '44.00', '1453187201', '1453187201', '0');
INSERT INTO `think_goods` VALUES ('12', '测试商品5', '55.00', '1453187203', '1453187203', '0');
INSERT INTO `think_goods` VALUES ('13', '房子100平米', '3200000.00', '1453187768', '1453188607', '0');
INSERT INTO `think_goods` VALUES ('14', '测试商品11', '111.00', '1453188649', '1453188649', '0');
INSERT INTO `think_goods` VALUES ('15', '测试商品22', '222.00', '1453188654', '1453188654', '0');

-- ----------------------------
-- Table structure for `think_user`
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '用户密码',
  `ip` varchar(15) DEFAULT NULL COMMENT 'ip',
  `email` varchar(30) DEFAULT NULL COMMENT 'email',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间戳',
  `last_time` int(10) DEFAULT NULL COMMENT '最后登录时间戳',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('6', '1', 'c41c3c779e3de94250936bce950423ef', '127.0.0.1', '', '1453177981', '1453177981');
INSERT INTO `think_user` VALUES ('7', '2', 'c41c3c779e3de94250936bce950423ef', '127.0.0.1', '', '1453177984', '1453177984');
INSERT INTO `think_user` VALUES ('12', 'xx1', '28a0c6171db3e623fd9d2e11a09238c7', '127.0.0.1', 'test@qq.com', '1453178427', '1453178427');
INSERT INTO `think_user` VALUES ('13', 'xx2', '28a0c6171db3e623fd9d2e11a09238c7', '127.0.0.1', 'test@qq.com', '1453178430', '1453178430');
INSERT INTO `think_user` VALUES ('14', 'xx3', '28a0c6171db3e623fd9d2e11a09238c7', '127.0.0.1', 'test@qq.com', '1453178432', '1453178432');
INSERT INTO `think_user` VALUES ('15', 'xx4', '28a0c6171db3e623fd9d2e11a09238c7', '127.0.0.1', 'test@qq.com', '1453178434', '1453178434');
INSERT INTO `think_user` VALUES ('16', 'xx5', '28a0c6171db3e623fd9d2e11a09238c7', '127.0.0.1', 'test@qq.com', '1453178436', '1453178436');
INSERT INTO `think_user` VALUES ('17', 'xx6', '28a0c6171db3e623fd9d2e11a09238c7', '127.0.0.1', 'test@qq.com', '1453178439', '1453178439');
INSERT INTO `think_user` VALUES ('18', 'xx7', '28a0c6171db3e623fd9d2e11a09238c7', '127.0.0.1', 'test@qq.com', '1453178441', '1453178441');
