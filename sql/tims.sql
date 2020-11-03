/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : tims

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-06-21 13:22:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for d_info
-- ----------------------------
DROP TABLE IF EXISTS `d_info`;
CREATE TABLE `d_info` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of d_info
-- ----------------------------
INSERT INTO `d_info` VALUES ('0', '信息管理中心');
INSERT INTO `d_info` VALUES ('1', '电气与信息工程学院');
INSERT INTO `d_info` VALUES ('3', '纺织服装学院');
INSERT INTO `d_info` VALUES ('5', '计算机与通信学院（人工智能产业学院）');
INSERT INTO `d_info` VALUES ('7', '计算科学与电子学院');
INSERT INTO `d_info` VALUES ('9', '外国语学院');
INSERT INTO `d_info` VALUES ('11', '设计艺术学院');
INSERT INTO `d_info` VALUES ('13', '体育教学部');
INSERT INTO `d_info` VALUES ('15', '应用技术学院');
INSERT INTO `d_info` VALUES ('17', '国际教育学院（国际交流中心）');
INSERT INTO `d_info` VALUES ('2', '机械工程学院');
INSERT INTO `d_info` VALUES ('4', '材料与化工学院');
INSERT INTO `d_info` VALUES ('6', '管理学院');
INSERT INTO `d_info` VALUES ('8', '经济学院');
INSERT INTO `d_info` VALUES ('10', '建筑工程学院');
INSERT INTO `d_info` VALUES ('12', '马克思主义学院（人文社会科学部）');
INSERT INTO `d_info` VALUES ('14', '工程训练中心');
INSERT INTO `d_info` VALUES ('16', '继续教育学院');

-- ----------------------------
-- Table structure for t_info
-- ----------------------------
DROP TABLE IF EXISTS `t_info`;
CREATE TABLE `t_info` (
  `t_id` int(255) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_gender` char(255) DEFAULT NULL,
  `t_birthday` date DEFAULT NULL,
  `t_dep` varchar(255) NOT NULL,
  `t_edu` varchar(255) DEFAULT NULL,
  `t_title` varchar(255) DEFAULT NULL,
  `t_addr` varchar(255) DEFAULT NULL,
  `t_telep` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`t_id`),
  KEY `t_dep` (`t_dep`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_info
-- ----------------------------
INSERT INTO `t_info` VALUES ('10001', '许光汉', '男', '1990-10-31', '5', '硕士', '高级工程师', '湖南省湘潭市岳塘区某某小区', '12345678900');
INSERT INTO `t_info` VALUES ('10002', '刘敏涛', '女', '1976-01-10', '2', '硕士', null, '湖南省湘潭市岳塘区某某小区', '12345678900');
INSERT INTO `t_info` VALUES ('10003', '刘昊然', '男', '1997-10-10', '3', '博士', '高级工程师', '北京市朝阳区某某小区', '12345678900');
INSERT INTO `t_info` VALUES ('10004', '张一山', '男', '1992-05-05', '4', null, null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10005', '杨紫', '女', '1992-11-06', '5', '博士', null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10006', '李易峰', '男', '1987-05-04', '6', '博士', null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10007', '周冬雨', '女', '1992-01-31', '7', '硕士', null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10008', '关晓彤', '女', '1997-09-17', '8', '硕士', null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10009', '迪丽热巴', '女', '1992-06-03', '9', '博士', null, '', '12345678900');
INSERT INTO `t_info` VALUES ('10010', '赵丽颖', '女', '1983-08-08', '10', null, null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10011', '易烊千玺', '男', '2020-11-28', '11', '博士', null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10012', '魏大勋', '男', '1989-04-12', '12', null, null, null, '12345678900');
INSERT INTO `t_info` VALUES ('10013', 'Henry Lau', '男', '1989-10-11', '13', '', '', '', '12345678900');
INSERT INTO `t_info` VALUES ('10014', 'Robyn Rihanna Fenty', '女', '1988-02-20', '14', '', '', '', '12345678900');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `user_pw` varchar(32) NOT NULL,
  `user_dep` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_dep` (`user_dep`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1000', '123456', '0');
INSERT INTO `user` VALUES ('1002', '123456', '2');
INSERT INTO `user` VALUES ('1010', '123456', '10');
INSERT INTO `user` VALUES ('1001', '123456', '1');
