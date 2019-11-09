/*
 Navicat Premium Data Transfer

 Source Server         : store
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : localhost:3306
 Source Schema         : store_db

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 03/11/2019 12:56:21
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
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(9) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `quantity` int(9) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order`(`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_products
-- ----------------------------
INSERT INTO `order_products` VALUES (6, 43, 32573, 'Лук', 3);
INSERT INTO `order_products` VALUES (7, 43, 32880, 'Картопля', 3);
INSERT INTO `order_products` VALUES (8, 43, 34650, 'Морква', 2);
INSERT INTO `order_products` VALUES (9, 44, 32573, 'Лук', 3);
INSERT INTO `order_products` VALUES (10, 44, 32880, 'Картопля', 3);
INSERT INTO `order_products` VALUES (11, 44, 34650, 'Морква', 2);

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
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (43, 54, '2019-11-03 10:53:46', '2019-11-03 10:53:46', 90.90);
INSERT INTO `orders` VALUES (44, 55, '2019-11-03 10:55:05', '2019-11-03 10:55:05', 90.90);

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
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `users` VALUES (14, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:14:33', '2019-11-03 09:14:33');
INSERT INTO `users` VALUES (15, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:14:49', '2019-11-03 09:14:49');
INSERT INTO `users` VALUES (16, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:15:06', '2019-11-03 09:15:06');
INSERT INTO `users` VALUES (17, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:15:07', '2019-11-03 09:15:07');
INSERT INTO `users` VALUES (18, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:16:13', '2019-11-03 09:16:13');
INSERT INTO `users` VALUES (19, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:16:25', '2019-11-03 09:16:25');
INSERT INTO `users` VALUES (20, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:17:33', '2019-11-03 09:17:33');
INSERT INTO `users` VALUES (21, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:18:17', '2019-11-03 09:18:17');
INSERT INTO `users` VALUES (22, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:19:15', '2019-11-03 09:19:15');
INSERT INTO `users` VALUES (23, 'vvt2001@ukr.net', 'Anna', 'test@test.ru', '333333333333333', 'dsnbvnmbnmnbmmn', '3211', '2019-11-03 09:19:29', '2019-11-03 09:19:29');
INSERT INTO `users` VALUES (24, 'trikotazh0_sql', 'Anna', 'vvt2001@ukr.net', '44444444444', 'bjjkljhljk', '123456', '2019-11-03 09:20:18', '2019-11-03 09:20:18');
INSERT INTO `users` VALUES (25, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:21:02', '2019-11-03 09:21:02');
INSERT INTO `users` VALUES (26, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:21:34', '2019-11-03 09:21:34');
INSERT INTO `users` VALUES (27, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:22:40', '2019-11-03 09:22:40');
INSERT INTO `users` VALUES (28, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:37:47', '2019-11-03 09:37:47');
INSERT INTO `users` VALUES (29, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:38:29', '2019-11-03 09:38:29');
INSERT INTO `users` VALUES (30, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:39:08', '2019-11-03 09:39:08');
INSERT INTO `users` VALUES (31, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:39:23', '2019-11-03 09:39:23');
INSERT INTO `users` VALUES (32, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 09:41:10', '2019-11-03 09:41:10');
INSERT INTO `users` VALUES (33, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:03:53', '2019-11-03 10:03:53');
INSERT INTO `users` VALUES (34, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:05:00', '2019-11-03 10:05:00');
INSERT INTO `users` VALUES (35, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:08:52', '2019-11-03 10:08:52');
INSERT INTO `users` VALUES (36, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:09:40', '2019-11-03 10:09:40');
INSERT INTO `users` VALUES (37, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:10:04', '2019-11-03 10:10:04');
INSERT INTO `users` VALUES (38, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:10:08', '2019-11-03 10:10:08');
INSERT INTO `users` VALUES (39, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:11:19', '2019-11-03 10:11:19');
INSERT INTO `users` VALUES (40, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:14:13', '2019-11-03 10:14:13');
INSERT INTO `users` VALUES (41, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:14:37', '2019-11-03 10:14:37');
INSERT INTO `users` VALUES (42, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:16:59', '2019-11-03 10:16:59');
INSERT INTO `users` VALUES (43, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:17:54', '2019-11-03 10:17:54');
INSERT INTO `users` VALUES (44, 'vvt2001@ukr.net', 'Тест', 'vvt2001@ukr.net', '44444444444', 'ffghghf', '3211', '2019-11-03 10:18:14', '2019-11-03 10:18:14');
INSERT INTO `users` VALUES (45, 'vvt2001@ukr.net', 'Anna', 'vvt2001@ukr.net', '44444444444', 'dfgdsfg', '3211', '2019-11-03 10:24:33', '2019-11-03 10:24:33');
INSERT INTO `users` VALUES (46, 'vvt2001@ukr.net', 'Anna', 'vvt2001@ukr.net', '44444444444', 'dfgdsfg', '3211', '2019-11-03 10:26:08', '2019-11-03 10:26:08');
INSERT INTO `users` VALUES (47, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:28:17', '2019-11-03 10:28:17');
INSERT INTO `users` VALUES (48, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:28:31', '2019-11-03 10:28:31');
INSERT INTO `users` VALUES (49, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:31:18', '2019-11-03 10:31:18');
INSERT INTO `users` VALUES (50, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:31:53', '2019-11-03 10:31:53');
INSERT INTO `users` VALUES (51, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:34:30', '2019-11-03 10:34:30');
INSERT INTO `users` VALUES (52, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:36:11', '2019-11-03 10:36:11');
INSERT INTO `users` VALUES (53, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:37:25', '2019-11-03 10:37:25');
INSERT INTO `users` VALUES (54, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:53:46', '2019-11-03 10:53:46');
INSERT INTO `users` VALUES (55, 'vvt2001@ukr.net', 'Тест', 'vjuh.tour@gmail.com', '5555', 't', '3211', '2019-11-03 10:55:05', '2019-11-03 10:55:05');

SET FOREIGN_KEY_CHECKS = 1;
