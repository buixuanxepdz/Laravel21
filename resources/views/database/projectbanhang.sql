/*
 Navicat Premium Data Transfer

 Source Server         : php27
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : projectbanhang

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 02/08/2021 11:36:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES (1, 'Adidas', 'adidas436', 1, '2021-06-24 15:13:50', '2021-06-24 15:13:50');
INSERT INTO `brands` VALUES (2, 'Zara', 'zara61', 1, '2021-06-26 16:24:46', '2021-06-26 16:24:46');
INSERT INTO `brands` VALUES (3, 'Ralph Lauren', 'ralph-lauren629', 1, '2021-06-26 16:25:33', '2021-06-26 16:25:33');
INSERT INTO `brands` VALUES (4, 'Brooks Brothers', 'brooks-brothers983', 1, '2021-06-26 16:26:09', '2021-06-26 16:26:09');
INSERT INTO `brands` VALUES (5, 'J.Crew', 'jcrew664', 1, '2021-06-26 16:26:28', '2021-06-26 16:26:28');
INSERT INTO `brands` VALUES (6, 'Gucci', 'gucci322', 23, '2021-07-10 14:09:10', '2021-07-10 14:09:10');

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  UNIQUE INDEX `cache_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('laravel_cachemenus', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:6:{i:0;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:14:\"Quần áo nam\";s:4:\"slug\";s:11:\"quan-ao-nam\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-24 14:29:51\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:14:\"Quần áo nam\";s:4:\"slug\";s:11:\"quan-ao-nam\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-24 14:29:51\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:15:\"Quần áo nữ\";s:4:\"slug\";s:10:\"quan-ao-nu\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-24 14:29:51\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:15:\"Quần áo nữ\";s:4:\"slug\";s:10:\"quan-ao-nu\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-24 14:29:51\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:21:\"Quần áo thể thao\";s:4:\"slug\";s:16:\"quan-ao-the-thao\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-24 14:29:51\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:21:\"Quần áo thể thao\";s:4:\"slug\";s:16:\"quan-ao-the-thao\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2021-06-24 14:29:51\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:19:\"Quần áo trẻ em\";s:4:\"slug\";s:17:\"quan-ao-tre-em953\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-06-24 21:24:06\";s:10:\"updated_at\";s:19:\"2021-06-24 21:24:06\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:19:\"Quần áo trẻ em\";s:4:\"slug\";s:17:\"quan-ao-tre-em953\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-06-24 21:24:06\";s:10:\"updated_at\";s:19:\"2021-06-24 21:24:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:6;s:4:\"name\";s:21:\"Quần áo bơi lội\";s:4:\"slug\";s:18:\"quan-ao-boi-loi365\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-06-24 21:26:47\";s:10:\"updated_at\";s:19:\"2021-06-24 21:26:47\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:6;s:4:\"name\";s:21:\"Quần áo bơi lội\";s:4:\"slug\";s:18:\"quan-ao-boi-loi365\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-06-24 21:26:47\";s:10:\"updated_at\";s:19:\"2021-06-24 21:26:47\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:19:\"App\\Models\\Category\":28:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:11;s:4:\"name\";s:22:\"Quần áo mùa đông\";s:4:\"slug\";s:19:\"quan-ao-mua-dong467\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:23;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-07-10 14:08:52\";s:10:\"updated_at\";s:19:\"2021-07-10 14:08:52\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:11;s:4:\"name\";s:22:\"Quần áo mùa đông\";s:4:\"slug\";s:19:\"quan-ao-mua-dong467\";s:9:\"parent_id\";i:0;s:7:\"user_id\";i:23;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-07-10 14:08:52\";s:10:\"updated_at\";s:19:\"2021-07-10 14:08:52\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}', 1627881708);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT 0,
  `user_id` int NULL DEFAULT 0,
  `depth` int NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Quần áo nam', 'quan-ao-nam', 0, 0, 0, NULL, '2021-06-24 14:29:51');
INSERT INTO `categories` VALUES (2, 'Quần áo nữ', 'quan-ao-nu', 0, 0, 0, NULL, '2021-06-24 14:29:51');
INSERT INTO `categories` VALUES (3, 'Quần áo thể thao', 'quan-ao-the-thao', 0, 0, 0, NULL, '2021-06-24 14:29:51');
INSERT INTO `categories` VALUES (4, 'Áo sơ mi nam', 'ao-so-mi-nam952', 1, 0, 0, '2021-06-24 20:49:16', '2021-06-24 20:49:16');
INSERT INTO `categories` VALUES (5, 'Quần áo trẻ em', 'quan-ao-tre-em953', 0, 0, 0, '2021-06-24 21:24:06', '2021-06-24 21:24:06');
INSERT INTO `categories` VALUES (6, 'Quần áo bơi lội', 'quan-ao-boi-loi365', 0, 0, 0, '2021-06-24 21:26:47', '2021-06-24 21:26:47');
INSERT INTO `categories` VALUES (7, 'Quần bò nam', 'quan-bo-nam990', 1, 0, 0, '2021-06-24 21:28:03', '2021-06-24 21:28:03');
INSERT INTO `categories` VALUES (10, 'Quần áo công sở', 'quan-ao-cong-so393', 1, 23, 0, '2021-07-10 14:08:29', '2021-07-10 14:08:29');
INSERT INTO `categories` VALUES (11, 'Quần áo mùa đông', 'quan-ao-mua-dong467', 0, 23, 0, '2021-07-10 14:08:52', '2021-07-10 14:08:52');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 65 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES (4, 'Quần áo4', NULL, '', 4, NULL, '2021-06-24 14:29:51');
INSERT INTO `images` VALUES (8, 'Quần áo8', NULL, '', 8, NULL, '2021-06-24 14:29:51');
INSERT INTO `images` VALUES (9, 'Quần áo9', NULL, '', 9, NULL, '2021-06-24 14:29:51');
INSERT INTO `images` VALUES (31, 'aodabiker.jpg601', 'public', 'images/aodabiker.jpg601', 2, '2021-06-25 21:03:18', '2021-06-25 21:03:18');
INSERT INTO `images` VALUES (42, 'quanaonam.jpg335', 'public', 'images/quanaonam.jpg335', 25, '2021-06-26 16:24:35', '2021-06-26 16:24:35');
INSERT INTO `images` VALUES (43, 'quânonam2.jpg923', 'public', 'images/quânonam2.jpg923', 25, '2021-06-26 16:24:35', '2021-06-26 16:24:35');
INSERT INTO `images` VALUES (44, 'aodabiker.jpg861', 'public', 'images/aodabiker.jpg861', 26, '2021-06-26 16:28:05', '2021-06-26 16:28:05');
INSERT INTO `images` VALUES (45, 'vaytim.jpg844', 'public', 'images/vaytim.jpg844', 27, '2021-06-26 16:30:28', '2021-06-26 16:30:28');
INSERT INTO `images` VALUES (46, 'settreem.jpg586', 'public', 'images/settreem.jpg586', 28, '2021-06-26 17:00:57', '2021-06-26 17:00:57');
INSERT INTO `images` VALUES (47, 'leatherjacket.jpg906', 'public', 'images/leatherjacket.jpg906', 26, '2021-06-26 19:46:27', '2021-06-26 19:46:27');
INSERT INTO `images` VALUES (48, 'bo-quan-ao-the-thao-nam-sport-cao-cap.jpg817', 'public', 'images/bo-quan-ao-the-thao-nam-sport-cao-cap.jpg817', 29, '2021-06-27 09:48:51', '2021-06-27 09:48:51');
INSERT INTO `images` VALUES (49, 'quancargo.jpg799', 'public', 'images/quancargo.jpg799', 30, '2021-06-29 20:24:11', '2021-06-29 20:24:11');
INSERT INTO `images` VALUES (55, 'quan-jeans-tron-form-slimfit-qj021-mau-xanh-bien.png731', 'public', 'images/quan-jeans-tron-form-slimfit-qj021-mau-xanh-bien.png731', 38, '2021-07-08 10:03:36', '2021-07-08 10:03:36');
INSERT INTO `images` VALUES (56, 'quan-jeans-tron-form-slimfit-qj021-mau-xanh-bien1.png808', 'public', 'images/quan-jeans-tron-form-slimfit-qj021-mau-xanh-bien1.png808', 38, '2021-07-08 10:03:36', '2021-07-08 10:03:36');
INSERT INTO `images` VALUES (57, 'quan-jeans-tron-form-slimfit-qj021-mau-xanh-bien2.png679', 'public', 'images/quan-jeans-tron-form-slimfit-qj021-mau-xanh-bien2.png679', 38, '2021-07-08 10:03:36', '2021-07-08 10:03:36');
INSERT INTO `images` VALUES (58, 'aosomiden.jpg691', 'public', 'images/aosomiden.jpg691', 39, '2021-07-09 20:44:19', '2021-07-09 20:44:19');
INSERT INTO `images` VALUES (59, 'aosomiden1.jpg823', 'public', 'images/aosomiden1.jpg823', 39, '2021-07-09 20:44:19', '2021-07-09 20:44:19');
INSERT INTO `images` VALUES (60, 'aosomiden2.jpg59', 'public', 'images/aosomiden2.jpg59', 39, '2021-07-09 20:44:19', '2021-07-09 20:44:19');
INSERT INTO `images` VALUES (63, 'đồ-công-sở-1-533x800.jpg183', 'public', 'images/đồ-công-sở-1-533x800.jpg183', 41, '2021-07-18 11:11:09', '2021-07-18 11:11:09');
INSERT INTO `images` VALUES (64, 'setvay.jpg293', 'public', 'images/setvay.jpg293', 42, '2021-07-18 16:13:33', '2021-07-18 16:13:33');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 125 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (99, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (100, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (101, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (102, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (103, '2021_05_30_131620_create_products_table', 1);
INSERT INTO `migrations` VALUES (104, '2021_05_30_134653_create_images_table', 1);
INSERT INTO `migrations` VALUES (105, '2021_05_30_134703_create_categories_table', 1);
INSERT INTO `migrations` VALUES (106, '2021_06_03_131542_create_users_info_table', 1);
INSERT INTO `migrations` VALUES (108, '2021_06_03_150634_create_order_product_table', 1);
INSERT INTO `migrations` VALUES (109, '2021_06_06_131503_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (110, '2021_06_12_025010_add_quantity_column_products_table', 1);
INSERT INTO `migrations` VALUES (111, '2021_06_13_213831_add_disk_column_images_table', 1);
INSERT INTO `migrations` VALUES (112, '2021_06_17_222835_add_disk_column_userinfo', 1);
INSERT INTO `migrations` VALUES (113, '2021_06_17_223014_add_path_column_userinfo', 1);
INSERT INTO `migrations` VALUES (114, '2021_06_18_154258_create_brands_table', 1);
INSERT INTO `migrations` VALUES (115, '2021_06_18_154533_add_brand_id_column_products', 1);
INSERT INTO `migrations` VALUES (116, '2021_06_19_165537_add_user_id_column_categories', 1);
INSERT INTO `migrations` VALUES (117, '2021_06_24_130053_add_user_id_column_brands', 1);
INSERT INTO `migrations` VALUES (118, '2021_06_24_213322_create_cache_table', 2);
INSERT INTO `migrations` VALUES (119, '2021_07_01_125729_create_warehouses_table', 3);
INSERT INTO `migrations` VALUES (120, '2021_07_07_182445_create_orders_table', 4);
INSERT INTO `migrations` VALUES (122, '2021_07_07_184518_create_order_product_table', 5);
INSERT INTO `migrations` VALUES (123, '2021_07_07_191717_add_column_user_id_table', 5);
INSERT INTO `migrations` VALUES (124, '2021_07_10_162942_create_statisticals_table', 6);

-- ----------------------------
-- Table structure for order_product
-- ----------------------------
DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_product
-- ----------------------------
INSERT INTO `order_product` VALUES (2, 2, 30, 'Quần cargo', 10000000, 1, '2021-07-07 22:21:51', '2021-07-07 22:21:51');
INSERT INTO `order_product` VALUES (3, 3, 38, 'QUẦN JEANS TRƠN FORM SLIMFIT QJ021 MÀU XANH BIỂN', 500000, 2, '2021-07-08 10:13:48', '2021-07-08 10:13:48');
INSERT INTO `order_product` VALUES (4, 4, 29, 'Bộ quần áo thể thao', 200000, 1, '2021-07-08 12:28:38', '2021-07-08 12:28:38');
INSERT INTO `order_product` VALUES (5, 5, 38, 'QUẦN JEANS TRƠN', 500000, 1, '2021-07-08 14:30:56', '2021-07-08 14:30:56');
INSERT INTO `order_product` VALUES (6, 6, 30, 'Quần cargo', 10000000, 1, '2021-07-08 16:05:26', '2021-07-08 16:05:26');
INSERT INTO `order_product` VALUES (7, 6, 25, 'Bộ quần áo nam giá hạt dẻ', 3000000, 1, '2021-07-08 16:05:26', '2021-07-08 16:05:26');
INSERT INTO `order_product` VALUES (8, 7, 38, 'QUẦN JEANS TRƠN', 500000, 1, '2021-07-08 17:35:42', '2021-07-08 17:35:42');
INSERT INTO `order_product` VALUES (9, 8, 29, 'Bộ quần áo thể thao', 200000, 1, '2021-07-08 22:43:14', '2021-07-08 22:43:14');
INSERT INTO `order_product` VALUES (10, 9, 27, 'Váy tím', 1200000, 2, '2021-07-09 07:29:25', '2021-07-09 07:29:25');
INSERT INTO `order_product` VALUES (11, 10, 28, 'Bộ quần áo trẻ em', 120000, 1, '2021-07-09 07:33:45', '2021-07-09 07:33:45');
INSERT INTO `order_product` VALUES (12, 11, 39, 'áo mơ mi đen', 1500000, 1, '2021-07-09 21:16:13', '2021-07-09 21:16:13');
INSERT INTO `order_product` VALUES (13, 12, 27, 'Váy tím', 1200000, 1, '2021-07-10 19:26:25', '2021-07-10 19:26:25');
INSERT INTO `order_product` VALUES (14, 13, 26, 'Áo da biker', 1500000, 1, '2021-07-10 19:54:14', '2021-07-10 19:54:14');
INSERT INTO `order_product` VALUES (15, 14, 28, 'Bộ quần áo trẻ em', 120000, 1, '2021-07-10 20:52:31', '2021-07-10 20:52:31');
INSERT INTO `order_product` VALUES (16, 15, 39, 'áo mơ mi đen', 1500000, 2, '2021-07-10 22:21:33', '2021-07-10 22:21:33');
INSERT INTO `order_product` VALUES (17, 15, 28, 'Bộ quần áo trẻ em', 120000, 1, '2021-07-10 22:21:33', '2021-07-10 22:21:33');
INSERT INTO `order_product` VALUES (18, 16, 39, 'áo mơ mi đen', 1500000, 1, '2021-07-14 21:25:28', '2021-07-14 21:25:28');
INSERT INTO `order_product` VALUES (19, 17, 28, 'Bộ quần áo trẻ em', 120000, 1, '2021-07-16 09:03:03', '2021-07-16 09:03:03');
INSERT INTO `order_product` VALUES (20, 18, 29, 'Bộ quần áo thể thao', 200000, 1, '2021-07-18 16:07:40', '2021-07-18 16:07:40');
INSERT INTO `order_product` VALUES (21, 18, 41, 'Set quần áo công sở nữ', 10000000, 2, '2021-07-18 16:07:40', '2021-07-18 16:07:40');
INSERT INTO `order_product` VALUES (23, 20, 39, 'áo mơ mi đen', 1500000, 2, '2021-08-01 20:18:41', '2021-08-01 20:18:41');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (2, 2, 'Admin 2', '0829834234', 'Ha noi', 'abc', 11000000, 0, '2021-07-07 22:21:51', '2021-07-07 22:21:51');
INSERT INTO `orders` VALUES (3, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'ship nhanh nhé', 1100000, 3, '2021-07-08 00:00:00', '2021-07-08 00:00:00');
INSERT INTO `orders` VALUES (4, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', NULL, 220000, 2, '2021-07-08 00:00:00', '2021-07-17 20:51:03');
INSERT INTO `orders` VALUES (5, 2, 'Admin 2', '0829834234', 'Ha noi', 'abc', 550000, 2, '2021-07-08 00:00:00', '2021-07-09 23:10:15');
INSERT INTO `orders` VALUES (6, 2, 'Admin 2', '0829834234', 'Ha noi', 'hello', 14300000, 2, '2021-07-08 00:00:00', '2021-07-18 11:08:24');
INSERT INTO `orders` VALUES (7, 2, 'Admin 2', '0829834234', 'Ha noi', 'abc', 550000, 3, '2021-07-08 00:00:00', '2021-07-08 18:59:35');
INSERT INTO `orders` VALUES (8, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'xin chao', 220000, 3, '2021-07-08 00:00:00', '2021-07-08 22:55:42');
INSERT INTO `orders` VALUES (9, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'vay dep', 2640000, 3, '2021-07-09 00:00:00', '2021-07-09 07:30:23');
INSERT INTO `orders` VALUES (10, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'ship nhanh nhe', 132000, 3, '2021-07-09 00:00:00', '2021-07-09 07:35:01');
INSERT INTO `orders` VALUES (11, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'absbdksahdkba', 1650000, 2, '2021-07-09 21:16:13', '2021-07-17 20:41:13');
INSERT INTO `orders` VALUES (12, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'ship nhanh cai nha', 1320000, 3, '2021-07-10 19:26:25', '2021-07-10 19:28:13');
INSERT INTO `orders` VALUES (13, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'áo da xịn', 1650000, 3, '2021-07-10 19:54:14', '2021-07-10 19:54:33');
INSERT INTO `orders` VALUES (14, 2, 'Admin 2', '0829834234', 'Ha noi Viet Nam', 'fdfgdfg', 132000, 3, '2021-07-10 20:52:31', '2021-07-10 20:52:55');
INSERT INTO `orders` VALUES (15, 2, 'Admin 2', '0829834234', 'Ha noi', 'nghia sndlandlsjkad', 3432000, 3, '2021-07-10 22:21:33', '2021-07-18 09:48:55');
INSERT INTO `orders` VALUES (16, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'áo xịn', 1650000, 3, '2021-07-14 21:25:28', '2021-07-14 21:25:48');
INSERT INTO `orders` VALUES (17, 2, 'Admin 2', '0829834234', 'Ha noi', 'giao nhanh nhe', 132000, 3, '2021-07-16 09:03:03', '2021-07-16 09:03:26');
INSERT INTO `orders` VALUES (18, 2, 'Admin 2', '0829834234', 'Ha noi', NULL, 22220000, 1, '2021-07-18 16:07:40', '2021-07-18 16:14:49');
INSERT INTO `orders` VALUES (20, 22, 'Bui Xuan Xep', '0886832574', 'Hà Nội', 'hê lô', 3300000, 2, '2021-08-01 20:18:41', '2021-08-02 11:28:43');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_price` int NOT NULL DEFAULT 0,
  `sale_price` int NOT NULL DEFAULT 0,
  `discount_percent` int NOT NULL DEFAULT 0,
  `size` int NOT NULL DEFAULT 0,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `user_id` int NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  `brand_id` int NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (25, 'Bộ quần áo nam giá hạt dẻ', 'bo-quan-ao-nam-gia-hat-de', 200000, 3000000, 0, 0, '<p>Bọ quần áo đẹp</p>', 1, 1, NULL, 1, '2021-06-26 16:24:35', '2021-06-26 16:24:35', NULL, 123);
INSERT INTO `products` VALUES (26, 'Áo da biker', 'ao-da-biker-nam', 1200000, 1500000, 0, 0, '<p>Áo da đẹp</p>', 1, 1, 2, 1, '2021-06-26 16:28:05', '2021-07-10 19:54:33', NULL, 9999);
INSERT INTO `products` VALUES (27, 'Váy tím', 'vay-tim', 100000, 1200000, 0, 0, '<p>đẹp</p>', 1, 2, 3, 1, '2021-06-26 16:30:28', '2021-07-10 19:28:13', NULL, 119);
INSERT INTO `products` VALUES (28, 'Bộ quần áo trẻ em', 'quan-short133', 100000, 120000, 0, 0, '<p>sÁá</p>', 1, 5, 3, 1, '2021-06-26 17:00:57', '2021-07-18 09:48:55', NULL, 119);
INSERT INTO `products` VALUES (29, 'Bộ quần áo thể thao', 'bo-quan-ao-the-thao503', 100000, 200000, 0, 0, '<p>áo đẹp</p>', 1, 3, 1, 0, '2021-06-27 09:48:51', '2021-07-08 22:55:42', NULL, 122);
INSERT INTO `products` VALUES (30, 'Quần cargo', 'quan-cargo717', 100000, 10000000, 0, 0, '<p>đâsdad</p>', 1, 1, 4, 1, '2021-06-29 20:24:11', '2021-06-29 20:24:11', NULL, 1000);
INSERT INTO `products` VALUES (38, 'QUẦN JEANS TRƠN', 'quan-jeans-tron-form-slimfit-qj021-mau-xanh-bien357', 100000, 500000, 0, 0, '<p>Quần quá đẹp</p>', 1, 7, 4, 0, '2021-07-08 10:03:36', '2021-07-08 18:59:35', NULL, 979);
INSERT INTO `products` VALUES (39, 'áo mơ mi đen', 'ao-mo-mi-den553', 100000, 1500000, 0, 0, '<p>Chất liệu tốt</p>', 1, 4, NULL, 1, '2021-07-09 20:44:19', '2021-07-18 09:48:55', NULL, 997);
INSERT INTO `products` VALUES (41, 'Set quần áo công sở nữ', 'set-quan-ao-cong-so-nu385', 100000, 10000000, 0, 0, '<p>-Chất liệu : Vải co giãn</p><p>-Bảo hành; 6 tháng</p>', 1, 10, 5, 1, '2021-07-18 11:11:09', '2021-07-18 11:11:09', NULL, 1000);
INSERT INTO `products` VALUES (42, 'set váy', 'set-vay933', 100000, 1000000, 0, 0, '<p>abc</p>', 1, 2, 5, 1, '2021-07-18 16:13:33', '2021-07-18 16:13:33', NULL, 123);

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for statisticals
-- ----------------------------
DROP TABLE IF EXISTS `statisticals`;
CREATE TABLE `statisticals`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `sales` int NOT NULL,
  `profit` int NOT NULL,
  `quantity` int NOT NULL,
  `total_order` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statisticals
-- ----------------------------
INSERT INTO `statisticals` VALUES (1, '2021-07-10', 3102000, 1702000, 3, 3, '2021-07-10 19:28:13', '2021-07-10 20:52:55');
INSERT INTO `statisticals` VALUES (2, '2021-07-14', 1650000, 1550000, 1, 1, '2021-07-14 21:25:48', '2021-07-14 21:25:48');
INSERT INTO `statisticals` VALUES (3, '2021-07-16', 132000, 32000, 1, 1, '2021-07-16 09:03:26', '2021-07-16 09:03:26');
INSERT INTO `statisticals` VALUES (4, '2021-07-18', 3432000, 3332000, 3, 1, '2021-07-18 09:48:55', '2021-07-18 09:48:55');

-- ----------------------------
-- Table structure for tbl_statistical
-- ----------------------------
DROP TABLE IF EXISTS `tbl_statistical`;
CREATE TABLE `tbl_statistical`  (
  `id_statistical` int NOT NULL AUTO_INCREMENT,
  `order_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sales` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profit` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `total_order` int NOT NULL,
  PRIMARY KEY (`id_statistical`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_statistical
-- ----------------------------
INSERT INTO `tbl_statistical` VALUES (1, '2021-06-08', '20000000', '7000000', 90, 10);
INSERT INTO `tbl_statistical` VALUES (2, '2021-06-07', '68000000', '9000000', 60, 8);
INSERT INTO `tbl_statistical` VALUES (3, '2021-06-06', '30000000', '3000000', 45, 7);
INSERT INTO `tbl_statistical` VALUES (4, '2020-11-05', '45000000', '3800000', 30, 9);
INSERT INTO `tbl_statistical` VALUES (5, '2020-11-04', '30000000', '1500000', 15, 12);
INSERT INTO `tbl_statistical` VALUES (6, '2020-11-03', '8000000', '700000', 65, 30);
INSERT INTO `tbl_statistical` VALUES (7, '2020-11-02', '28000000', '23000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (8, '2020-11-01', '25000000', '20000000', 7, 6);
INSERT INTO `tbl_statistical` VALUES (9, '2020-10-31', '36000000', '28000000', 40, 15);
INSERT INTO `tbl_statistical` VALUES (10, '2020-10-30', '50000000', '13000000', 89, 19);
INSERT INTO `tbl_statistical` VALUES (11, '2020-10-29', '20000000', '15000000', 63, 11);
INSERT INTO `tbl_statistical` VALUES (12, '2020-10-28', '25000000', '16000000', 94, 14);
INSERT INTO `tbl_statistical` VALUES (13, '2020-10-27', '32000000', '17000000', 16, 10);
INSERT INTO `tbl_statistical` VALUES (14, '2020-10-26', '33000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (15, '2020-10-25', '36000000', '18000000', 22, 12);
INSERT INTO `tbl_statistical` VALUES (16, '2020-10-24', '34000000', '20000000', 33, 20);
INSERT INTO `tbl_statistical` VALUES (17, '2020-10-23', '25000000', '16000000', 94, 14);
INSERT INTO `tbl_statistical` VALUES (18, '2020-10-22', '12000000', '7000000', 16, 10);
INSERT INTO `tbl_statistical` VALUES (19, '2020-10-21', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (20, '2020-10-20', '66000000', '18000000', 22, 12);
INSERT INTO `tbl_statistical` VALUES (21, '2020-10-19', '74000000', '20000000', 33, 20);
INSERT INTO `tbl_statistical` VALUES (22, '2020-10-18', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (23, '2020-10-17', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (24, '2020-10-16', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (25, '2020-10-15', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (26, '2020-10-14', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (27, '2020-10-13', '74000000', '20000000', 33, 20);
INSERT INTO `tbl_statistical` VALUES (28, '2020-10-12', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (29, '2020-10-11', '74000000', '20000000', 10, 20);
INSERT INTO `tbl_statistical` VALUES (30, '2020-10-10', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (31, '2020-10-09', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (32, '2020-10-08', '74000000', '20000000', 15, 20);
INSERT INTO `tbl_statistical` VALUES (33, '2020-10-07', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (34, '2020-10-06', '74000000', '20000000', 30, 22);
INSERT INTO `tbl_statistical` VALUES (35, '2020-10-05', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (36, '2020-10-04', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (37, '2020-10-03', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (38, '2020-10-02', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (39, '2020-10-01', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (40, '2020-09-30', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (41, '2020-09-29', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (42, '2020-09-28', '74000000', '20000000', 15, 20);
INSERT INTO `tbl_statistical` VALUES (43, '2020-09-27', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (44, '2020-09-26', '74000000', '20000000', 30, 22);
INSERT INTO `tbl_statistical` VALUES (45, '2020-09-25', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (46, '2020-09-24', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (47, '2020-09-23', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (48, '2020-09-22', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (49, '2020-09-21', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (50, '2020-09-20', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (51, '2020-09-19', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (52, '2020-09-18', '74000000', '20000000', 15, 20);
INSERT INTO `tbl_statistical` VALUES (53, '2020-09-17', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (54, '2020-09-16', '74000000', '20000000', 30, 22);
INSERT INTO `tbl_statistical` VALUES (55, '2020-09-15', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (56, '2020-09-14', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (57, '2020-09-13', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (58, '2020-09-12', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (59, '2020-09-11', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (60, '2020-09-10', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (61, '2020-09-09', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (62, '2020-09-08', '74000000', '20000000', 15, 20);
INSERT INTO `tbl_statistical` VALUES (63, '2020-09-07', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (64, '2020-09-06', '74000000', '20000000', 30, 22);
INSERT INTO `tbl_statistical` VALUES (65, '2020-09-05', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (66, '2020-09-04', '74000000', '20000000', 32, 20);
INSERT INTO `tbl_statistical` VALUES (67, '2020-09-03', '63000000', '19000000', 14, 5);
INSERT INTO `tbl_statistical` VALUES (68, '2020-09-02', '66000000', '18000000', 23, 12);
INSERT INTO `tbl_statistical` VALUES (69, '2020-09-01', '74000000', '20000000', 32, 20);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `role` int NOT NULL DEFAULT 0,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `current_team_id` bigint UNSIGNED NULL DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin1@gmail.com', NULL, 1, '$2y$10$nsf/gf/WwpTqQQHKEoXXQeO2in3lZ91irTN2Vi4J9nyuQrbQq2LWC', NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-26 08:31:53');
INSERT INTO `users` VALUES (2, 'Admin 2', 'admin2@gmail.com', NULL, 0, '$2y$10$HFurJjg195lLShNMUDVK1uMVKHfVZ.Vi/QduSra1xXFemzfI402.G', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'Admin 3', 'admin3@gmail.com', NULL, 0, '$2y$10$3tkabqlIY0.ngDT7Us7gsuNnqVE6/LoEGb4ED1njhnRxmdxq5XHNC', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'Admin 4', 'admin4@gmail.com', NULL, 0, '$2y$10$vXPNIpwtGcoyjKY6t6W0MugmwToXnzOjBuHI2l/odbCFQmkV04y12', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, 'Admin 5', 'admin5@gmail.com', NULL, 0, '$2y$10$1dZJWAgLKtWu2Cqobq/Cwe/YmRZpM0t2qvau.VVrVk4URRqAlQdye', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 'Admin 6', 'admin6@gmail.com', NULL, 0, '$2y$10$EpuTt3Iksray8RPUJXAJQeyLcGCJdNniKUFqi.hquGS1KVvfaXFF6', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'Admin 7', 'admin7@gmail.com', NULL, 0, '$2y$10$6AqM4f43TViHdtYfWjppZeLIgt2xBPnnRazuJAC0qfEUGzHu/ahm.', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 'Admin 8', 'admin8@gmail.com', NULL, 0, '$2y$10$lOsvfDpgDAfR.0FyWJ1vweHQbU8YPOj64gWvseBvOheYqT8.HZ9hK', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 'Admin 9', 'admin9@gmail.com', NULL, 0, '$2y$10$lcwGEzK0cULTXeSNrLSBOuIvqZqehM8lrnka9QHlinusAP5z5.pMi', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (10, 'Admin 10', 'admin10@gmail.com', NULL, 0, '$2y$10$KcLWHfD9rdEv8OetMKFaxuxCH4zbMpflkkhSBh6icoYIuca1VPAsu', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 'Admin 11', 'admin11@gmail.com', NULL, 0, '$2y$10$1P1Rmdv7xPg7Nt74LUi4tOqrlhr911nFLV2WiBRt.y1ZbG7YiT.Gy', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (12, 'Admin 12', 'admin12@gmail.com', NULL, 0, '$2y$10$CpXiXcEOsyzfLL0mGC/QEueqYouLGcQnb7wveJp2QiNAsNLaYdQE6', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 'Admin 13', 'admin13@gmail.com', NULL, 0, '$2y$10$ZCw4OmFJvxAiFi0dIUeR2eUU0Ym3yWoQheZIYFsdme6w3sjooxf3C', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 'Admin 14', 'admin14@gmail.com', NULL, 0, '$2y$10$KK.FPtKHTcva0gP1GpmwbOszDf177BHLuvvAXcl2nUilA.d7cIwEK', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 'Admin 15', 'admin15@gmail.com', NULL, 0, '$2y$10$sNB0/WX1AjJ3KveMhivgtO3BBzFzAHEYb7jJ1pNpha3B8wp4ecPMO', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 'Admin 16', 'admin16@gmail.com', NULL, 0, '$2y$10$QLW.w3ULoFSTD5wCt.syc.8p.v.jPkAfcKxWFy0bMMO0rGX/UJzY6', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 'Admin 17', 'admin17@gmail.com', NULL, 0, '$2y$10$yz/rxvVp4vu/tk3t65yAWeRSUj1J1jeXkQHuOxOrP17TwEtFLDlAO', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 'Admin 18', 'admin18@gmail.com', NULL, 0, '$2y$10$MptzLZPTtUj6tPnhlMCgieJJO3kRK5UpUYiXuiTjQ/isxAUHEN4zm', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 'Admin 19', 'admin19@gmail.com', NULL, 0, '$2y$10$Sm63WfgWorvmLGaDe0MB4u4CdWdtLRLFA4DXl5eTmeetqgQUHxciy', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (22, 'Bui Xuan Xep', 'buixuanxep@gmail.com', NULL, 0, '$2y$10$2El1P9zXetxyJM5lv9ZKtelpzbxSiYMghzBwqaegLP2YzL6YzlOHS', NULL, NULL, NULL, NULL, NULL, '2021-07-08 10:12:52', '2021-07-08 10:12:52');
INSERT INTO `users` VALUES (23, 'xuan xep', 'bxx@gmail.com', NULL, 2, '$2y$10$fFwA2FO6h4z/tk/p5aLGIOpafYX4vQK0kjL0ET2J253EGbbSHyJY6', NULL, NULL, NULL, NULL, NULL, '2021-07-10 13:40:12', '2021-07-10 13:40:12');

-- ----------------------------
-- Table structure for users_info
-- ----------------------------
DROP TABLE IF EXISTS `users_info`;
CREATE TABLE `users_info`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_info
-- ----------------------------
INSERT INTO `users_info` VALUES (1, '0829834234', 'Ha noi', 1, 'public', 'images/leatherjacket.jpg', NULL, '2021-07-18 16:16:33');
INSERT INTO `users_info` VALUES (2, '0829834234', 'Ha noi', 2, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (3, '0829834234', 'Ha noi', 3, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (4, '0829834234', 'Ha noi', 4, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (5, '0829834234', 'Ha noi', 5, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (6, '0829834234', 'Ha noi', 6, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (7, '0829834234', 'Ha noi', 7, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (8, '0829834234', 'Ha noi', 8, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (9, '0829834234', 'Ha noi', 9, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (10, '0829834234', 'Ha noi', 10, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (11, '0829834234', 'Ha noi', 11, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (12, '0829834234', 'Ha noi', 12, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (13, '0829834234', 'Ha noi', 13, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (14, '0829834234', 'Ha noi', 14, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (15, '0829834234', 'Ha noi', 15, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (16, '0829834234', 'Ha noi', 16, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (17, '0829834234', 'Ha noi', 17, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (18, '0829834234', 'Ha noi', 18, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (19, '0829834234', 'Ha noi', 19, NULL, NULL, NULL, NULL);
INSERT INTO `users_info` VALUES (22, '0886832574', 'Hà Nội', 22, NULL, NULL, '2021-07-08 10:12:52', '2021-07-08 10:12:52');
INSERT INTO `users_info` VALUES (23, '09384332423', 'Phú Xuyên Hà Nội', 23, 'public', 'images/ngiuthoi.jpg', '2021-07-10 13:40:12', '2021-07-10 13:40:12');

-- ----------------------------
-- Table structure for warehouses
-- ----------------------------
DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `quantity` int NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warehouses
-- ----------------------------
INSERT INTO `warehouses` VALUES (1, '0', NULL, 31, NULL, '2021-07-02 20:32:25', '2021-07-02 20:32:25');
INSERT INTO `warehouses` VALUES (2, '1', NULL, 32, NULL, '2021-07-02 20:33:50', '2021-07-02 20:33:50');

SET FOREIGN_KEY_CHECKS = 1;
