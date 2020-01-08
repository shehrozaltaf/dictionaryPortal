/*
 Navicat Premium Data Transfer

 Source Server         : localserver
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : dictionary_portal

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 18/11/2019 02:57:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crf
-- ----------------------------
DROP TABLE IF EXISTS `crf`;
CREATE TABLE `crf`  (
  `id_crf` int(11) NOT NULL AUTO_INCREMENT,
  `idProjects` int(11) NOT NULL,
  `crf_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `crf_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `languages` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `l1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `l2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `l3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `l4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `l5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `no_of_modules` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_crf`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of crf
-- ----------------------------
INSERT INTO `crf` VALUES (1, 1, 'Baseline Survey Questionnaire', 'tool A', 'English, Urdu', 'English', 'Urdu', NULL, NULL, NULL, '2019-08-01', '2019-09-25', b'1', '3');
INSERT INTO `crf` VALUES (2, 1, 'Tool B', 'B', 'Persian', 'Persian', NULL, NULL, NULL, NULL, '2019-08-01', '2019-08-25', b'1', '2');
INSERT INTO `crf` VALUES (3, 1, 'Tool C', 'C', 'English, Urdu, Persian', 'English', 'Urdu', 'Persian', NULL, NULL, '2019-09-07', '2019-10-30', b'1', '5');
INSERT INTO `crf` VALUES (4, 2, 'CRF 1', '1', 'English', 'English', NULL, NULL, NULL, NULL, '2018-10-14', '2019-06-18', b'1', '4');
INSERT INTO `crf` VALUES (9, 3, 'Test crd', 'test', 'English, اردو', 'English', 'اردو', NULL, NULL, NULL, '2021-09-23', '2021-12-30', b'1', '3');
INSERT INTO `crf` VALUES (10, 3, 'Test crf 2', 'test 2', 'English, اردو, سندھی', 'English', 'اردو', 'سندھی', NULL, NULL, '2019-01-01', '2022-12-31', b'1', '7');
INSERT INTO `crf` VALUES (11, 6, 'DP CRF A', 'CRF A', 'Englsih, Urdu, Sindhi', 'Englsih', 'Urdu', 'Sindhi', NULL, NULL, '2012-03-12', '2012-03-12', b'1', '3');

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules`  (
  `idModule` int(11) NOT NULL AUTO_INCREMENT,
  `id_crf` int(11) NOT NULL,
  `variable_module` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `module_name_l1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_desc_l1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_name_l2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_desc_l2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_name_l3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_desc_l3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_name_l4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_desc_l4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_name_l5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_desc_l5` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `module_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `idProjects` int(11) NOT NULL,
  `isActive` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`idModule`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES (1, 1, 'A', 'Module A', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'ماڈیول اے', 'لوریم اِپسم پرنٹنگ اور ٹائپسیٹنگ انڈسٹری کا صرف ڈمی متن ہے۔ لوریم ایپسم 1500s کے بعد سے ہی انڈسٹری کا معیاری ڈمی متن رہا ہے ، جب ایک نامعلوم پرنٹر ٹائپ کی ایک گیلی لے کر اس کو ٹائپ کرتے ہوئے ٹائپ نمونہ کی کتاب بناتا ہے۔ یہ نہ صرف پانچ صدیوں سے زندہ بچا ہے', '', '', '', '', '', '', 'Ongoing', 'Multiple', 1, b'1');
INSERT INTO `modules` VALUES (2, 2, 'A', 'ماژول A', ' همانطور که گاها شناخته شده است ، متن ساختگی است که در طرح های چاپی ، گرافیکی یا وب استفاده می شود. این گذرگاه به یک نویسنده نامه ناشناخته در قرن پانزدهم منتسب شده است که تصور می شود قسمت هایی از Cicero\'s De Finibus Bonorum et Malorum را برای استفاده در ی', '', '', '', '', '', '', '', '', 'Completed', 'Single', 1, b'1');
INSERT INTO `modules` VALUES (3, 1, 'B', 'Module B', 'B Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum', 'ماژول B', 'همانطور که گاها شناخته شده است ، متن ساختگی است که در طرح های چاپی ، گرافیکی یا وب استفاده می شود. این گذرگاه به یک نویسنده نامه ناشناخته در قرن پانزدهم منتسب شده است که تصور می شود قسمت هایی از Cicero\'s De Finibus Bonorum et Malorum را برای استفاده در یک', '', '', '', '', '', '', 'Ongoing', 'Single', 1, b'1');
INSERT INTO `modules` VALUES (4, 3, 'A', 'Module A of tool C id crf 3', 'Module A of tool C id crf 3 description', 'آلے C id crf 3 تفصیل کا ماڈیول A۔', 'آلے C id crf 3 تفصیل کا ماڈیول A۔', 'ماژول A ابزار C id crf 3', 'ماژول A توضیحات ابزار C id crf 3', '', '', '', '', 'Ongoing', 'Single', 2, b'1');
INSERT INTO `modules` VALUES (5, 1, 'C', 'English', 'English Description', '', '', '', '', '', '', '', '', 'Ongoing', 'Single', 0, b'1');
INSERT INTO `modules` VALUES (6, 1, 'D', 'English 2', 'English Description', 'سندھی ', 'سندھی تفصیل', '', '', '', '', '', '', 'Ongoing', 'Multiple', 0, b'1');
INSERT INTO `modules` VALUES (7, 4, 'A', 'test', 'test description', 'ٹیسٹ ', 'ٹیسٹ کی تفصیل', 'سندھی ', 'سندھی تفصیل', 'تست', 'توضیحات آزمون', '', '', 'Ongoing', 'Multiple', 2, b'1');
INSERT INTO `modules` VALUES (8, 4, 'B', 'fadas', 'asdasdas', '', '', '', '', '', '', '', '', 'Ongoing', 'Multiple', 2, b'1');
INSERT INTO `modules` VALUES (9, 11, 'A', 'Household', 'household description', 'گھریلو', 'گھریلو تفصیل', 'سندھی ', 'سندھی تفصیل', '', '', '', '', 'Ongoing', 'Multiple', 6, b'1');
INSERT INTO `modules` VALUES (10, 11, 'A', 'Lorem ipsum', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'لوریم ایپسم ', 'لوریم ایپسم ، یا لپسسم جیسا کہ یہ کبھی کبھی جانا جاتا ہے ، ڈمی متن ہے جو پرنٹ ، گرافک یا ویب ڈیزائن تیار کرنے میں استعمال ہوتا ہے۔ گزرنے کی وجہ 15 ویں صدی میں ایک نامعلوم ٹائپ سیٹٹر سے منسوب ہے جس کے بارے میں سوچا جاتا ہے کہ وہ ایک قسم کی نمونہ کی کتاب می', 'سندھی ', 'ماژول A توضیحات ابزار C id crf 3', '', '', '', '', 'Ongoing', 'Single', 6, b'1');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects`  (
  `idProjects` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `short_title` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `no_of_crf` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `languages` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_of_sites` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_of_person` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `iduser` int(11) NOT NULL,
  `createdDateTime` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `createdBy` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updateDateTime` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idProjects`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES (1, 'Central Asia Stunting Initiative', 'casi', '2019-06-03', '2020-04-30', '3', 'English, Urdu, Persian', '3', 'abcd@aku.edu', b'1', 0, '2019-10-14 12:24:25', NULL, '2019-09-19 12:03:07', NULL);
INSERT INTO `projects` VALUES (2, 'Kangaroo Mother Care', 'kmc', '2018-02-16', '2019-12-26', '1', 'English', '1', 'abcd@aku.edu', b'1', 0, '2019-10-24 14:03:09', NULL, '2019-09-19 12:04:27', NULL);
INSERT INTO `projects` VALUES (3, 'Typbar', 'Typbar', '2019-09-02', '2020-01-10', '0', 'English', '1', 'abcd@aku.edu', b'1', 0, '2019-09-30 15:46:51', NULL, '2019-09-30 15:21:47', NULL);
INSERT INTO `projects` VALUES (6, 'Dictionary Portal', 'DP', '2019-10-22', '2020-02-22', '3', 'English, Sindhi, Urdu, Persian', '10', 'abcd@test.com', b'1', 0, '2019-11-17 19:34:17', '2', '2019-11-17 19:34:17', NULL);

-- ----------------------------
-- Table structure for section
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section`  (
  `idSection` int(11) NOT NULL AUTO_INCREMENT,
  `idModule` int(11) NULL DEFAULT NULL,
  `section_title` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_desc` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_title_l1` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_desc_l1` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_title_l2` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_desc_l2` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_title_l3` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_desc_l3` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_title_l4` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_desc_l4` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_title_l5` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_desc_l5` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `section_var_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_crf` int(11) NULL DEFAULT NULL,
  `idProjects` int(11) NULL DEFAULT NULL,
  `isActive` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`idSection`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES (1, 1, 'Section 1', 'section 1 desc', 'Section 1', 'section 1 desc', 'دفعہ 1', 'سیکشن 1 تفصیل', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'ongoing', 1, 1, b'1');
INSERT INTO `section` VALUES (2, 1, 'Section 2', 'desc', 'Section 2', 'desc', 'دفعہ 2', 'سیکشن 2 تفصیل', NULL, NULL, NULL, NULL, NULL, NULL, '2', 'ongoing', 1, 1, b'1');
INSERT INTO `section` VALUES (3, 4, 'Section 3', 'desription', 'Section 3', 'desription', 'دفعہ 3', 'سیکشن 3 تفصیل', NULL, NULL, NULL, NULL, NULL, NULL, '3', 'completed', 1, 1, b'1');
INSERT INTO `section` VALUES (4, 2, 'Section A', 'description A', 'Section A', 'description A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'ongoing', 2, 1, b'1');
INSERT INTO `section` VALUES (5, 3, 'Section B', 'description B', 'Section B', 'description B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'completed', 1, 1, b'1');
INSERT INTO `section` VALUES (9, 10, 'The order by clause', ' The order by clause is used to sort the query result sets in either ascending or descending order', 'The order by clause', ' The order by clause is used to sort the query result sets in either ascending or descending order', 'شق کے ذریعہ آرڈر', 'شق کے ذریعہ آرڈر کا استعمال سوال کے نتائج کے سیٹ کو چڑھتے یا نزول والے ترتیب میں ترتیب دینے کے لئے استعمال کیا جاتا ہے', 'سندھی ', 'ماژول A توضیحات ابزار C id crf 3', NULL, NULL, NULL, NULL, 'A', 'Ongoing', 11, 6, b'1');

-- ----------------------------
-- Table structure for section_detail
-- ----------------------------
DROP TABLE IF EXISTS `section_detail`;
CREATE TABLE `section_detail`  (
  `idSectionDetail` int(11) NOT NULL AUTO_INCREMENT,
  `idSection` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `variable_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nature` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `seq_no` int(11) NOT NULL,
  `label_l1` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `label_l2` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `label_l3` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `label_l4` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `label_l5` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `option_title` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `option_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `skipQuestion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idParentQuestion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LanguageType` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MinVal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `MaxVal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `readonly` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `required` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_crf` int(11) NULL DEFAULT NULL,
  `idProjects` int(11) NULL DEFAULT NULL,
  `isActive` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`idSectionDetail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of section_detail
-- ----------------------------
INSERT INTO `section_detail` VALUES (1, 1, 1, 'A101', 'Label', 1, 'Geographical Area', 'جغرافیائی علاقہ', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '0', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (2, 1, 1, 'A102', 'Input', 2, 'Enumeration Block Number', 'گنتی کا بلاک نمبر', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '255', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (3, 1, 1, 'A103', 'Input', 3, 'Province', 'صوبہ', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '255', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (4, 1, 1, 'A104', 'Input', 4, 'Disctrict', 'ضلع', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '0', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (5, 1, 1, 'A105', 'Input', 5, 'Tehsil/Taluka', 'تحصیل / تالہ', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '0', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (6, 1, 1, 'A106', 'Input', 6, 'City/Village', 'شہر / گاؤں', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '255', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (7, 1, 1, 'A107', 'Input', 7, 'Cluster Number', 'کلسٹر نمبر', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '0', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (8, 1, 1, 'A108', 'Input', 8, 'Household Number', 'گھریلو نمبر', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '0', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (9, 1, 1, 'A109', 'Input', 9, 'Interviewer name and number', 'انٹرویو لینے والے کا نام اور نمبر', '', '', '', NULL, NULL, NULL, NULL, 'l1,l2', '0', '0', NULL, NULL, 'single', 1, 1, b'1');
INSERT INTO `section_detail` VALUES (10, 1, 1, 'A110', 'Input', 0, 'asd', 'sasd', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (11, 1, 1, '', '', 0, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (12, 1, 1, 'A111', 'Label', 0, 'lab1', 'lab12', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (13, 1, 1, 'A116', 'Label', 0, 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting In', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (14, 1, 1, 'A112', 'input', 0, 'inp1', 'inp2', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (15, 1, 1, 'A113', 'Label', 0, 'asd', 'qqq', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (16, 1, 1, 'A114', 'input', 0, 'dasdasda', 'sdasdsadasdas', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (17, 1, 1, 'A115', 'input', 0, 'xxxxxxx', 'vvvvvv', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (18, 1, 1, 'A116', 'Label', 0, 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting In', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, b'1');
INSERT INTO `section_detail` VALUES (19, 9, 10, 'A101', 'Label', 0, 'household  name', 'abcd', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (20, 9, 10, 'A102', 'input', 0, 'household  name 1', 'xyz', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (39, 9, 10, 'AA03', 'input', 0, 'Input test', 'Input test', 'Input test', '', '', NULL, NULL, '', NULL, NULL, '10', '22', 'ReadOnly', 'Required', NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (40, 9, 10, 'AA04', 'input', 1, 'textarea test 1', 'textarea test 1', 'textarea test 1', '', '', NULL, NULL, '', NULL, NULL, '', '', '', '', NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (41, 9, 10, 'AA05', 'input', 2, 'textarea test 2', 'textarea test 2', 'textarea test 2', '', '', NULL, NULL, '', NULL, NULL, '', '', 'ReadOnly', 'Required', NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (42, 9, 10, 'AA06', 'input', 3, 'input test 2', 'input test 2', 'input test 2', '', '', NULL, NULL, 'AA03', NULL, NULL, '', '', '', '', NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (43, 9, 10, 'AA07', 'SelectBox', 4, 'Select test 1', 'Select test 1', 'Select test 1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (44, 9, 10, 'AA07A', 'Options', 5, '', '', '', '', '', 'Option 1', 'Option 1 Value', NULL, 'AA07', NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (45, 9, 10, 'AA07B', 'Options', 5, '', '', '', '', '', 'Option 2', 'Option 2 Value', NULL, 'AA07', NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (46, 9, 10, 'AA07C', 'Options', 5, '', '', '', '', '', 'Option 3', 'Option 3 Value', NULL, 'AA07', NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (47, 9, 10, 'AA07D', 'Options', 5, '', '', '', '', '', 'Option 4', 'Option 4 Value', NULL, 'AA07', NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (48, 9, 10, 'AA07E', 'Options', 5, '', '', '', '', '', 'Option 5', 'Option 5 Value', NULL, 'AA07', NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, b'1');
INSERT INTO `section_detail` VALUES (49, 9, 10, 'AA08', 'input', 0, 'inp', 'inp', 'inp', '', '', NULL, NULL, '', NULL, NULL, '', '', '', '', NULL, 11, 6, b'1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `createdBy` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `createdDateTime` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `updateBy` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updatedDateTime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'shahroz.khan@aku.edu', 'abcd1234', 'shahroz.khan@aku.edu', b'1', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'dmu@aku', 'aku?dmu', 'dmu@aku', b'1', NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
