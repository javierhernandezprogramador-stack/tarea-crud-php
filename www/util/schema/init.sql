/*
 Navicat Premium Data Transfer

 Source Server         : A-connection
 Source Server Type    : MySQL
 Source Server Version : 100625
 Source Host           : localhost:3306
 Source Schema         : db_nueva

 Target Server Type    : MySQL
 Target Server Version : 100625
 File Encoding         : 65001

 Date: 22/02/2026 23:49:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_persona
-- ----------------------------
DROP TABLE IF EXISTS `tb_persona`;
CREATE TABLE `tb_persona`  (
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dui` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`codigo`) USING BTREE,
  INDEX `fk_persona_usuario`(`usuario` ASC) USING BTREE,
  CONSTRAINT `fk_persona_usuario` FOREIGN KEY (`usuario`) REFERENCES `tb_usuario` (`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_persona
-- ----------------------------
INSERT INTO `tb_persona` VALUES ('d40725ef-4c2c-4fd1-a079-6c20726685fa', 'Javier ', 'Sanchez', '06487595-8', '78sdf-54s5df-54sdf', 'San rafael cedros', '79532658', 'ab962c1d-9bba-4262-9c58-c00d6bc45b2d', '2026-02-12');
INSERT INTO `tb_persona` VALUES ('dc401872-685c-4d55-a7fc-9c074d2a003d', 'Elizabeth', 'Flores', '06784512-9', '48784-dfd8-8sd', 'Sonsonate', '78986523', '6419e160-7632-412c-a64e-51602e896bb9', '2026-02-12');

-- ----------------------------
-- Table structure for tb_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario`  (
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`codigo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_usuario
-- ----------------------------
INSERT INTO `tb_usuario` VALUES ('6419e160-7632-412c-a64e-51602e896bb9', 'elizabeth@gmail.com', '$2y$10$l0Hh3wcILxYG6j4hZtWiPO6Mv0sl5hKMuCt06yejYCpZ9xZNkZP7e');
INSERT INTO `tb_usuario` VALUES ('ab962c1d-9bba-4262-9c58-c00d6bc45b2d', 'javier@gmail.com', '$2y$10$YhqMLZQYZhwsSk066RRVQOWCloEqf.il.IiTpwcFPmCtT1fzBdvOK');

SET FOREIGN_KEY_CHECKS = 1;
