/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : camarafrio

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-12-10 13:29:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for notificacion
-- ----------------------------
DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE `notificacion` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of notificacion
-- ----------------------------
INSERT INTO `notificacion` VALUES ('1', 'calolomino@gmail.com');
