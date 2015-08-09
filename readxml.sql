/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : readxml

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-08-09 19:10:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'A');
INSERT INTO `users` VALUES ('2', 'B');

-- ----------------------------
-- Table structure for xmls
-- ----------------------------
DROP TABLE IF EXISTS `xmls`;
CREATE TABLE `xmls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xmlPath` varchar(100) CHARACTER SET latin1 DEFAULT '',
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xmls
-- ----------------------------
INSERT INTO `xmls` VALUES ('1', 'sampleXML/test_A1.xml', '1');
INSERT INTO `xmls` VALUES ('2', 'sampleXML/test_B.xml', '2');
INSERT INTO `xmls` VALUES ('3', 'sampleXML/test_A2.xml', '1');
