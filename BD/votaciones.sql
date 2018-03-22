/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 100130
Source Host           : localhost:3306
Source Database       : votaciones

Target Server Type    : MYSQL
Target Server Version : 100130
File Encoding         : 65001

Date: 2018-03-22 13:54:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for candidatos
-- ----------------------------
DROP TABLE IF EXISTS `candidatos`;
CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of candidatos
-- ----------------------------

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evento` varchar(250) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventos
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) NOT NULL,
  `class_icono` varchar(50) DEFAULT '',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', 'Mantenimiento', 'fa fa-cogs', '1', '2017-05-26 18:56:58', null, '1', null);
INSERT INTO `menus` VALUES ('2', 'Mantenimiento Expert', 'fa fa-cogs', '0', '2017-05-27 13:02:56', null, '1', null);

-- ----------------------------
-- Table structure for opciones
-- ----------------------------
DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `opcion` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `class_icono` varchar(50) DEFAULT '',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `op_menu_id` (`menu_id`) USING BTREE,
  CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of opciones
-- ----------------------------
INSERT INTO `opciones` VALUES ('1', '2', 'Mantenimiento - Cargos', 'expertmanage.cargo.cargo', 'fa fa-sitemap', '0', '2017-05-26 19:00:25', null, '1', null);
INSERT INTO `opciones` VALUES ('2', '1', 'Mantenimiento - Eventos', 'basicmanage.cargo.cargo', 'fa fa-sitemap', '1', '2017-05-26 19:01:08', null, '1', null);
INSERT INTO `opciones` VALUES ('3', '2', 'Mantenimiento - Productos', 'expertmanage.producto.productosucursal', 'fa fa-sitemap', '0', '2017-05-26 19:02:18', null, '1', null);
INSERT INTO `opciones` VALUES ('4', '1', 'Mantenimiento - Productos', 'basicmanage.producto.productosucursal', 'fa fa-sitemap', '0', '2017-05-26 19:02:49', null, '1', null);
INSERT INTO `opciones` VALUES ('5', '2', 'Mantenimiento - Empresas', 'expertmanage.empresa.empresa', 'fa fa-sitemap', '0', '2017-05-26 19:03:08', null, '1', null);
INSERT INTO `opciones` VALUES ('6', '1', 'Mantenimiento - Empresas', 'basicmanage.empresa.empresa', 'fa fa-sitemap', '0', '2017-05-26 19:03:08', null, '1', null);
INSERT INTO `opciones` VALUES ('7', '2', 'Mantenimiento - Personas', 'expertmanage.persona.persona', 'fa fa-sitemap', '0', '2017-05-27 05:56:39', null, '1', null);
INSERT INTO `opciones` VALUES ('8', '1', 'Mantenimiento - Personas', 'basicmanage.persona.persona', 'fa fa-sitemap', '1', '2017-05-27 13:01:38', null, '1', null);
INSERT INTO `opciones` VALUES ('9', '2', 'Mantenimiento - Sucursales', 'expertmanage.sucursal.sucursal', 'fa fa-institute', '0', '2017-05-27 13:05:08', null, '1', null);
INSERT INTO `opciones` VALUES ('10', '1', 'Mantenimiento - Sucursales', 'basicmanage.sucursal.sucursal', 'fa fa-institute', '0', '2017-05-27 13:05:37', null, '1', null);
INSERT INTO `opciones` VALUES ('11', '2', 'Mantenimiento - Empleados', 'expertmanage.empleado.empleado', 'fa fa-institute', '0', '2017-05-30 09:41:09', null, '1', null);
INSERT INTO `opciones` VALUES ('12', '1', 'Mantenimiento - Empleados', 'basicmanage.empleado.empleado', 'fa fa-institute', '0', '2017-05-30 09:41:41', null, '1', null);
INSERT INTO `opciones` VALUES ('13', '2', 'Mantenimiento - Proveedores', 'expertmanage.proveedor.proveedor', 'fa fa-sitemap', '0', '2017-05-30 21:19:22', null, '1', null);
INSERT INTO `opciones` VALUES ('14', '1', 'Mantenimiento - Proveedores', 'basicmanage.proveedor.proveedor', 'fa fa-sitemap', '0', '2017-05-30 21:19:54', null, '1', null);
INSERT INTO `opciones` VALUES ('15', '2', 'Mantenimiento - Clientes', 'expertmanage.cliente.cliente', 'fa fa-sitemap', '0', '2017-05-30 22:49:09', null, '1', null);
INSERT INTO `opciones` VALUES ('16', '1', 'Mantenimiento - Clientes', 'basicmanage.cliente.cliente', 'fa fa-sitemap', '0', '2017-05-30 22:49:40', null, '1', null);
INSERT INTO `opciones` VALUES ('17', '1', 'Venta', 'basicincome.venta.venta', 'fa fa-sitemap', '0', '2017-10-24 12:22:42', null, '1', null);

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paterno` varchar(80) NOT NULL,
  `materno` varchar(80) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `sexo` char(1) NOT NULL DEFAULT 'M',
  `email` varchar(100) DEFAULT '',
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT '',
  `telefono` varchar(20) DEFAULT '',
  `celular` varchar(30) DEFAULT '',
  `fecha_nacimiento` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES ('1', 'Admin', 'System', 'Software', '12312312', 'M', 'jorgeshevchenk@gmail.com', '$2y$10$d3smAsgOCWZYHDJKBVvegeWjHvNE1QmAdW0envPb7CAXg58vMAGWe', 'psXc4IilUhVsAGog5uDOzbTkKV7N4rHPOkN8nnFj0qla0M5Bpfx01YnLGBm5', null, '', '', '1988-10-14', '1', '2017-05-26 15:53:15', '2017-08-09 11:04:25', '1', '1');
INSERT INTO `personas` VALUES ('2', 'Escobar', 'Vasquez', 'Abeldaño', '34234234', 'M', '', '$2y$10$FKTtnWg0srdJA9vfOwP34.k43DnYsMJ9ByhIZW3Yknjn1rnWo75xu', null, '', '', '', null, '1', '2017-06-14 11:40:08', '2017-06-14 14:52:53', '1', '1');
INSERT INTO `personas` VALUES ('3', 'gg', 'gg', 'gg', '99999999', 'M', 'RCAPCHAB@gmail.com', '$2y$10$ar4fnjro47P7c0Mr97j0FOkdUqzazQIlhQ0xI4rLQDXPRkEh/WY66', null, '', '6666666', '999999999', '2017-06-14', '1', '2017-06-14 14:28:44', '2017-06-14 14:28:44', '1', null);

-- ----------------------------
-- Table structure for personas_privilegios_sucursales
-- ----------------------------
DROP TABLE IF EXISTS `personas_privilegios_sucursales`;
CREATE TABLE `personas_privilegios_sucursales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) NOT NULL,
  `privilegio_id` int(11) NOT NULL,
  `sucursal_id` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ppc_privilegio_id` (`privilegio_id`) USING BTREE,
  KEY `ppc_persona_id` (`persona_id`) USING BTREE,
  KEY `ppc_sucursal_id` (`sucursal_id`) USING BTREE,
  CONSTRAINT `personas_privilegios_sucursales_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `personas_privilegios_sucursales_ibfk_2` FOREIGN KEY (`privilegio_id`) REFERENCES `privilegios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `personas_privilegios_sucursales_ibfk_3` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personas_privilegios_sucursales
-- ----------------------------
INSERT INTO `personas_privilegios_sucursales` VALUES ('1', '1', '1', null, null, null, '1', '2017-05-26 19:06:06', null, '1', null);

-- ----------------------------
-- Table structure for privilegios
-- ----------------------------
DROP TABLE IF EXISTS `privilegios`;
CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilegio` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of privilegios
-- ----------------------------
INSERT INTO `privilegios` VALUES ('1', 'Admin', '1', '2017-05-26 19:04:59', null, '1', null);

-- ----------------------------
-- Table structure for privilegios_opciones
-- ----------------------------
DROP TABLE IF EXISTS `privilegios_opciones`;
CREATE TABLE `privilegios_opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilegio_id` int(11) NOT NULL,
  `opcion_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `po_privilegio_id` (`privilegio_id`) USING BTREE,
  KEY `po_opcion_id` (`opcion_id`) USING BTREE,
  CONSTRAINT `privilegios_opciones_ibfk_1` FOREIGN KEY (`opcion_id`) REFERENCES `opciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `privilegios_opciones_ibfk_2` FOREIGN KEY (`privilegio_id`) REFERENCES `privilegios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of privilegios_opciones
-- ----------------------------
INSERT INTO `privilegios_opciones` VALUES ('1', '1', '1', '0', '2017-05-26 19:05:13', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('2', '1', '2', '1', '2017-05-26 19:05:13', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('3', '1', '3', '0', '2017-05-26 19:05:13', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('4', '1', '4', '1', '2017-05-26 19:05:13', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('5', '1', '5', '0', '2017-05-26 19:05:13', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('6', '1', '6', '1', '2017-05-26 19:05:13', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('7', '1', '7', '0', '2017-05-27 05:57:25', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('8', '1', '8', '1', '2017-05-27 13:04:26', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('9', '1', '9', '0', '2017-05-27 13:06:03', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('10', '1', '10', '1', '2017-05-27 13:06:10', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('12', '1', '11', '0', '2017-05-30 09:42:52', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('13', '1', '12', '1', '2017-05-30 09:43:04', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('14', '1', '13', '0', '2017-05-30 21:20:40', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('15', '1', '14', '1', '2017-05-30 21:20:54', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('16', '1', '15', '0', '2017-05-30 22:50:09', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('17', '1', '16', '1', '2017-05-30 22:50:22', null, '1', null);
INSERT INTO `privilegios_opciones` VALUES ('18', '1', '17', '1', '2017-10-24 12:23:00', null, '1', null);

-- ----------------------------
-- Table structure for sucursales
-- ----------------------------
DROP TABLE IF EXISTS `sucursales`;
CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal` varchar(100) NOT NULL,
  `direccion` varchar(250) DEFAULT '',
  `telefono` varchar(20) DEFAULT '',
  `celular` varchar(30) DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `foto` varchar(100) DEFAULT '',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sucursales
-- ----------------------------
INSERT INTO `sucursales` VALUES ('1', 'Sucursal Nueva', 'Mz C lT 15', '6283848', '91291291', 'RCAPCHAB@gmail.com', '', '1', '2017-05-30 21:39:25', '2017-05-31 09:19:03', '1', '1');
INSERT INTO `sucursales` VALUES ('2', 'sucursal vieja', 'Mz C lT 15', '948484', '94838', 'RCAPCHAB@gmail.com', '', '1', '2017-06-04 11:37:28', '2017-06-04 11:37:28', '1', null);

-- ----------------------------
-- Table structure for votos
-- ----------------------------
DROP TABLE IF EXISTS `votos`;
CREATE TABLE `votos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidato_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `persona_id_created_at` int(11) NOT NULL,
  `persona_id_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of votos
-- ----------------------------
