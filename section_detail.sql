/*
Navicat MySQL Data Transfer

Source Server         : localxampp3308
Source Server Version : 50505
Source Host           : localhost:3308
Source Database       : dictionary_portalnew

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-18 16:17:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `section_detail`
-- ----------------------------
DROP TABLE IF EXISTS `section_detail`;
CREATE TABLE `section_detail` (
  `idSectionDetail` int(11) NOT NULL AUTO_INCREMENT,
  `idSection` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `variable_name` varchar(255) NOT NULL,
  `nature` varchar(255) CHARACTER SET utf8 NOT NULL,
  `seq_no` int(11) NOT NULL,
  `label_l1` longtext CHARACTER SET utf8 NOT NULL,
  `label_l2` longtext CHARACTER SET utf8 NOT NULL,
  `label_l3` longtext CHARACTER SET utf8 NOT NULL,
  `label_l4` longtext CHARACTER SET utf8 NOT NULL,
  `label_l5` longtext CHARACTER SET utf8 NOT NULL,
  `option_title` longtext CHARACTER SET utf8,
  `option_value` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `skipQuestion` varchar(255) DEFAULT NULL,
  `idParentQuestion` varchar(255) DEFAULT NULL,
  `LanguageType` varchar(255) DEFAULT NULL,
  `MinVal` varchar(255) DEFAULT NULL,
  `MaxVal` varchar(255) DEFAULT NULL,
  `readonly` varchar(255) DEFAULT NULL,
  `required` varchar(255) DEFAULT NULL,
  `section_type` varchar(255) DEFAULT NULL,
  `id_crf` int(11) DEFAULT NULL,
  `idProjects` int(11) DEFAULT NULL,
  `isActive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idSectionDetail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of section_detail
-- ----------------------------
INSERT INTO `section_detail` VALUES ('1', '1', '1', 'A101', 'Label', '1', 'Geographical Area', 'جغرافیائی علاقہ', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('2', '1', '1', 'A102', 'Input', '2', 'Enumeration Block Number', 'گنتی کا بلاک نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '255', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('3', '1', '1', 'A103', 'Input', '3', 'Province', 'صوبہ', '', '', '', null, null, null, null, 'l1,l2', '0', '255', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('4', '1', '1', 'A104', 'Input', '4', 'Disctrict', 'ضلع', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('5', '1', '1', 'A105', 'Input', '5', 'Tehsil/Taluka', 'تحصیل / تالہ', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('6', '1', '1', 'A106', 'Input', '6', 'City/Village', 'شہر / گاؤں', '', '', '', null, null, null, null, 'l1,l2', '0', '255', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('7', '1', '1', 'A107', 'Input', '7', 'Cluster Number', 'کلسٹر نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('8', '1', '1', 'A108', 'Input', '8', 'Household Number', 'گھریلو نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('9', '1', '1', 'A109', 'Input', '9', 'Interviewer name and number', 'انٹرویو لینے والے کا نام اور نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('10', '1', '1', 'A110', 'Input', '0', 'asd', 'sasd', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('11', '1', '1', '', '', '0', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('12', '1', '1', 'A111', 'Label', '0', 'lab1', 'lab12', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('13', '1', '1', 'A116', 'Label', '0', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting In', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative ', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('14', '1', '1', 'A112', 'input', '0', 'inp1', 'inp2', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('15', '1', '1', 'A113', 'Label', '0', 'asd', 'qqq', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('16', '1', '1', 'A114', 'input', '0', 'dasdasda', 'sdasdsadasdas', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('17', '1', '1', 'A115', 'input', '0', 'xxxxxxx', 'vvvvvv', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('18', '1', '1', 'A116', 'Label', '0', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting In', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative ', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('19', '9', '10', 'A101', 'Label', '0', 'household  name', 'abcd', '', '', '', null, null, null, null, null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('20', '9', '10', 'A102', 'input', '0', 'household  name 1', 'xyz', '', '', '', null, null, null, null, null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('39', '9', '10', 'AA03', 'input', '0', 'Input test', 'Input test', 'Input test', '', '', null, null, '', null, null, '10', '22', 'ReadOnly', 'Required', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('40', '9', '10', 'AA04', 'input', '1', 'textarea test 1', 'textarea test 1', 'textarea test 1', '', '', null, null, '', null, null, '', '', '', '', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('41', '9', '10', 'AA05', 'input', '2', 'textarea test 2', 'textarea test 2', 'textarea test 2', '', '', null, null, '', null, null, '', '', 'ReadOnly', 'Required', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('42', '9', '10', 'AA06', 'input', '3', 'input test 2', 'input test 2', 'input test 2', '', '', null, null, 'AA03', null, null, '', '', '', '', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('43', '9', '10', 'AA07', 'SelectBox', '4', 'Select test 1', 'Select test 1', 'Select test 1', '', '', null, null, null, null, null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('44', '9', '10', 'AA07A', 'Options', '5', '', '', '', '', '', 'Option 1', 'Option 1 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('45', '9', '10', 'AA07B', 'Options', '5', '', '', '', '', '', 'Option 2', 'Option 2 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('46', '9', '10', 'AA07C', 'Options', '5', '', '', '', '', '', 'Option 3', 'Option 3 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('47', '9', '10', 'AA07D', 'Options', '5', '', '', '', '', '', 'Option 4', 'Option 4 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('48', '9', '10', 'AA07E', 'Options', '5', '', '', '', '', '', 'Option 5', 'Option 5 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('49', '9', '10', 'AA08', 'input', '0', 'inp', 'inp', 'inp', '', '', null, null, '', null, null, '', '', '', '', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('50', '12', '17', 'AA01', 'Label', '0', 'Title 1', 'Title 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('51', '12', '17', 'AA02', 'input', '1', 'Input 1', 'Input 1', '', '', '', null, null, '', null, null, '11', '22', 'ReadOnly', 'Required', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('52', '12', '17', 'AA03', 'input', '2', 'Input 2', 'Input 2', '', '', '', null, null, 'AA03', null, null, '', '', '', 'Required', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('53', '12', '17', 'AA04', 'input', '3', 'Text Area 1', 'Text Area 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('54', '13', '18', 'SCA01', 'Label', '0', 'Hading 1', 'Heading 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('55', '13', '18', 'SCA02', 'input', '1', 'Household name', 'Household name', '', '', '', null, null, '', null, null, '10', '20', '', 'Required', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('56', '13', '18', 'SCA03', 'input', '2', 'Input 2', 'Input 2', '', '', '', null, null, 'SCA02', null, null, '', '', '', '', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('57', '13', '18', 'SCA04', 'input', '3', 'textarea 1', 'textarea 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('58', '14', '19', 'HH', 'Label', '0', 'HOUSEHOLD INFORMATION ', 'معلومات خانواده', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('59', '14', '19', 'H101', 'input', '1', 'Geographical Area', 'منطقه جغرافیا', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('60', '14', '19', 'H102', 'input', '0', 'Cluster Number', 'شماره کلاستر', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('61', '14', '19', 'H103', 'input', '0', 'Province', 'ولایت', '', '', '', null, null, '', null, null, '05', '15', '', 'Required', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('62', '14', '19', 'H104', 'input', '1', 'District', 'ولسوالی', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('63', '14', '19', 'H105', 'input', '2', 'City', 'شهر', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('64', '14', '19', 'H106', 'input', '3', 'Village', 'قریه', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('65', '14', '19', 'H107', 'input', '4', 'Cluster number', 'شماره کلاستر', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('66', '14', '19', 'H1L', 'Label', '0', 'The enumerator will read out the consent for understanding of respondent and will mention the purpose of the study and time required to complete the interviews (a separate consent sheet will be provided to the enumerators)', 'سروی کننده رضایت نامه را برای درک جواب دهنده می خواند، مقصد تحقیق  و زمان مورد ضرورت برای تکمیل مصاحبه را ذکر می کند (یک ورق رضایت نامه جدا برای سروی کننده تهیه می گردد). ', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('68', '14', '19', 'H117', 'Checkbox', '0', 'Was consent taken?', 'آیا رضایت گرفته شده است؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('69', '14', '19', 'H117A', 'COption', '0', 'Verbal consent', '	رضایت شفاهی', '', '', '', null, 'Y/N', null, 'H117', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('71', '14', '19', 'H117B', 'COption', '0', 'Written consent', '	رضایت کتبی', '', '', '', null, 'Y/N', null, 'H117', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('72', '14', '19', 'H1L', 'Label', '0', 'If verbal consent is not given STOP interview and move to last Question of this section to record the outcome of the interview', 'اگر رضایت شفاهی داده نشد، مصاحبه را متوقف نموده و به سوال آخر این بخش برای درج نتیجه مصاحبه بروید.', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('73', '14', '19', 'H118', 'SelectBox', '0', 'Result of Household Questionnaire interview', 'نتیجه مصاحبه سوالنامه خانواده', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('74', '14', '19', 'H118A', 'Options', '0', 'Completed ', 'تکمیل ', '', '', '', null, '1', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('77', '14', '19', 'H118B', 'Options', '0', 'No household member at home or no competent respondent at home at time\r\nof visit\r\n', 'هیچ عضو خانه در خانه نبود یا در زمان بازدید جواب دهنده توانامند در خانه نبود', '', '', '', null, '2', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('79', '14', '19', 'H118C', 'Options', '0', 'Refused', 'نبود ', '', '', '', null, '3', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('80', '14', '19', 'H118D', 'Options', '0', 'Dwelling vacant or address not a dwelling', 'تمام خانواده برای مدت طولانی غایب بود ', '', '', '', null, '5', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('81', '14', '19', 'H118E', 'Options', '0', 'Dwelling not found', 'خانه پیدا نشد ', '', '', '', null, '6', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('82', '14', '19', 'H118F', 'Options', '0', 'Other (specify)', 'دیگر (مشخص نمایید) ', '', '', '', null, '96', null, 'H118', null, null, null, null, null, null, '18', '8', '');
