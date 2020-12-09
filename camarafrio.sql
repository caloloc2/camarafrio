/*
Navicat MySQL Data Transfer

Source Server         : Nibemi
Source Server Version : 50559
Source Host           : ec2-34-223-215-43.us-west-2.compute.amazonaws.com:3306
Source Database       : camarafrio

Target Server Type    : MYSQL
Target Server Version : 50559
File Encoding         : 65001

Date: 2020-12-08 22:58:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for registros
-- ----------------------------
DROP TABLE IF EXISTS `registros`;
CREATE TABLE `registros` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime DEFAULT NULL,
  `temperatura` double(11,5) DEFAULT '0.00000',
  PRIMARY KEY (`id_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of registros
-- ----------------------------
INSERT INTO `registros` VALUES ('5', '2020-12-05 04:45:51', '13.44000');
INSERT INTO `registros` VALUES ('6', '2020-12-05 04:46:40', '20.12000');
INSERT INTO `registros` VALUES ('7', '2020-12-05 22:14:24', '54.33000');
INSERT INTO `registros` VALUES ('8', '2020-12-07 10:03:10', '20.66000');
INSERT INTO `registros` VALUES ('9', '2020-12-07 13:39:19', '20.66000');
INSERT INTO `registros` VALUES ('10', '2020-12-07 13:40:09', '22.66000');
INSERT INTO `registros` VALUES ('11', '2020-12-07 14:05:57', '22.66000');
INSERT INTO `registros` VALUES ('12', '2020-12-07 14:07:39', '22.66000');
INSERT INTO `registros` VALUES ('13', '2020-12-07 14:28:18', '22.66000');
INSERT INTO `registros` VALUES ('14', '2020-12-07 14:28:59', '22.66000');
INSERT INTO `registros` VALUES ('15', '2020-12-07 14:40:45', '22.66000');
INSERT INTO `registros` VALUES ('16', '2020-12-07 14:41:15', '21.50000');
INSERT INTO `registros` VALUES ('17', '2020-12-07 14:42:07', '21.25000');
INSERT INTO `registros` VALUES ('18', '2020-12-07 14:43:20', '28.75000');
INSERT INTO `registros` VALUES ('19', '2020-12-07 14:47:35', '0.00000');
INSERT INTO `registros` VALUES ('20', '2020-12-07 14:47:36', '0.00000');
INSERT INTO `registros` VALUES ('21', '2020-12-07 14:47:39', '0.00000');
INSERT INTO `registros` VALUES ('22', '2020-12-07 14:47:41', '0.00000');
INSERT INTO `registros` VALUES ('23', '2020-12-07 14:47:44', '0.00000');
INSERT INTO `registros` VALUES ('24', '2020-12-07 14:49:07', '0.00000');
INSERT INTO `registros` VALUES ('25', '2020-12-07 14:49:08', '0.00000');
INSERT INTO `registros` VALUES ('26', '2020-12-07 14:49:57', '27.50000');
INSERT INTO `registros` VALUES ('27', '2020-12-07 14:50:51', '32.00000');
INSERT INTO `registros` VALUES ('28', '2020-12-07 14:55:35', '25.50000');
INSERT INTO `registros` VALUES ('29', '2020-12-07 14:55:37', '25.50000');
INSERT INTO `registros` VALUES ('30', '2020-12-07 14:55:38', '25.75000');
INSERT INTO `registros` VALUES ('31', '2020-12-07 14:55:40', '25.50000');
INSERT INTO `registros` VALUES ('32', '2020-12-07 14:55:41', '25.00000');
INSERT INTO `registros` VALUES ('33', '2020-12-07 14:55:43', '25.25000');
INSERT INTO `registros` VALUES ('34', '2020-12-07 14:55:44', '25.50000');
INSERT INTO `registros` VALUES ('35', '2020-12-07 14:55:46', '25.25000');
INSERT INTO `registros` VALUES ('36', '2020-12-07 14:55:48', '25.50000');
INSERT INTO `registros` VALUES ('37', '2020-12-07 14:55:50', '25.50000');
INSERT INTO `registros` VALUES ('38', '2020-12-07 14:56:09', '24.75000');
INSERT INTO `registros` VALUES ('39', '2020-12-07 14:56:10', '24.75000');
INSERT INTO `registros` VALUES ('40', '2020-12-07 14:56:12', '24.75000');
INSERT INTO `registros` VALUES ('41', '2020-12-07 14:56:47', '23.75000');
INSERT INTO `registros` VALUES ('42', '2020-12-07 14:57:06', '24.00000');
INSERT INTO `registros` VALUES ('43', '2020-12-07 14:57:07', '24.00000');
INSERT INTO `registros` VALUES ('44', '2020-12-07 14:57:09', '24.00000');
INSERT INTO `registros` VALUES ('45', '2020-12-07 14:57:10', '24.00000');
INSERT INTO `registros` VALUES ('46', '2020-12-07 14:57:12', '24.25000');
INSERT INTO `registros` VALUES ('47', '2020-12-07 14:57:14', '23.75000');
INSERT INTO `registros` VALUES ('48', '2020-12-07 14:57:16', '24.00000');
INSERT INTO `registros` VALUES ('49', '2020-12-07 14:57:17', '24.25000');
INSERT INTO `registros` VALUES ('50', '2020-12-07 14:57:36', '23.25000');
INSERT INTO `registros` VALUES ('51', '2020-12-07 14:57:38', '23.50000');
INSERT INTO `registros` VALUES ('52', '2020-12-07 14:57:39', '23.75000');
INSERT INTO `registros` VALUES ('53', '2020-12-07 14:57:41', '24.25000');
INSERT INTO `registros` VALUES ('54', '2020-12-07 14:57:42', '24.75000');
INSERT INTO `registros` VALUES ('55', '2020-12-07 14:57:44', '24.50000');
INSERT INTO `registros` VALUES ('56', '2020-12-07 14:58:21', '28.25000');
INSERT INTO `registros` VALUES ('57', '2020-12-07 14:58:22', '28.00000');
INSERT INTO `registros` VALUES ('58', '2020-12-07 14:59:28', '35.00000');
INSERT INTO `registros` VALUES ('59', '2020-12-07 15:00:01', '36.50000');
INSERT INTO `registros` VALUES ('60', '2020-12-07 15:00:34', '32.75000');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'calolomino@gmail.com', '12345');
