/*
 Navicat Premium Data Transfer

 Source Server         : store_db
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : 127.0.0.1:3306
 Source Schema         : store_db

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 03/11/2019 07:58:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for order_products
-- ----------------------------
DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products`  (
  `id` int(6) NOT NULL,
  `product_id` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `prod_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(20, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 12, '2019-11-03 05:55:55', '2019-11-03 05:55:55', 48.70);
INSERT INTO `orders` VALUES (2, 13, '2019-11-03 05:56:56', '2019-11-03 05:56:56', 48.70);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) UNSIGNED NOT NULL,
  `quantity` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34651 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (32570, 'Буряк', 'burak.jpg', 8.10, 0, NULL, '2019-10-26 18:55:53', '2019-10-26 18:55:53');
INSERT INTO `products` VALUES (32572, 'Капуста', 'kapusta.jpg', 8.90, 0, NULL, '2019-10-26 18:55:53', '2019-10-26 18:55:53');
INSERT INTO `products` VALUES (32573, 'Лук', 'luk.jpg', 10.30, 0, NULL, '2019-10-27 10:50:52', '2019-10-27 10:50:52');
INSERT INTO `products` VALUES (32880, 'Картопля', 'kartoplya.jpg', 14.60, 0, NULL, '2019-10-26 18:55:53', '2019-10-26 18:55:53');
INSERT INTO `products` VALUES (34650, 'Морква', 'morkva.jpg', 8.10, 0, NULL, '2019-10-26 18:52:18', '2019-10-26 18:52:18');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'tartakovskyi', 'Владимир', 'vjuh.tour@gmail.com', '11111111111', 'sdadfgdfsgdfgfd', '123456', '2019-11-02 17:07:50', '2019-11-02 17:07:50');
INSERT INTO `users` VALUES (3, 'Stroimweb', 'test', 'test@test.ru', '11111111111', 'dfgdfgg', '123456', '2019-11-02 17:09:40', '2019-11-02 17:09:40');
INSERT INTO `users` VALUES (4, 'tartakovskyi', 'Владимир', 'test@test.ru', '11111111111', 'dfgdfg', '123456', '2019-11-03 05:46:36', '2019-11-03 05:46:36');
INSERT INTO `users` VALUES (5, 'tartakovskyi', 'Владимир', 'test@test.ru', '11111111111', 'dfgdfg', '123456', '2019-11-03 05:47:47', '2019-11-03 05:47:47');
INSERT INTO `users` VALUES (6, 'tartakovskyi', 'Владимир', 'test@test.ru', '11111111111', 'dfgdfg', '123456', '2019-11-03 05:48:03', '2019-11-03 05:48:03');
INSERT INTO `users` VALUES (7, 'tartakovskyi', 'Владимир', 'test@test.ru', '11111111111', 'dfgdfg', '123456', '2019-11-03 05:48:21', '2019-11-03 05:48:21');
INSERT INTO `users` VALUES (8, 'tartakovskyi', 'Владимир', 'test@test.ru', '11111111111', 'dfgdfg', '123456', '2019-11-03 05:49:32', '2019-11-03 05:49:32');
INSERT INTO `users` VALUES (9, 'sdfs', 'sdfsdf', 'lpmax@ukr.net', '222222222222', 'dfgdffgfghbvcbnvbnnbv', 'sdfsa', '2019-11-03 05:50:57', '2019-11-03 05:50:57');
INSERT INTO `users` VALUES (10, 'sdfs', 'sdfsdf', 'lpmax@ukr.net', '222222222222', 'dfgdffgfghbvcbnvbnnbv', 'sdfsa', '2019-11-03 05:51:19', '2019-11-03 05:51:19');
INSERT INTO `users` VALUES (11, 'sdfs', 'sdfsdf', 'lpmax@ukr.net', '222222222222', 'dfgdffgfghbvcbnvbnnbv', 'sdfsa', '2019-11-03 05:55:31', '2019-11-03 05:55:31');
INSERT INTO `users` VALUES (12, 'sdfs', 'sdfsdf', 'lpmax@ukr.net', '222222222222', 'dfgdffgfghbvcbnvbnnbv', 'sdfsa', '2019-11-03 05:55:55', '2019-11-03 05:55:55');
INSERT INTO `users` VALUES (13, 'sdfs', 'sdfsdf', 'lpmax@ukr.net', '222222222222', 'dfgdffgfghbvcbnvbnnbv', 'sdfsa', '2019-11-03 05:56:56', '2019-11-03 05:56:56');

SET FOREIGN_KEY_CHECKS = 1;
