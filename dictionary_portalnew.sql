/*
Navicat MySQL Data Transfer

Source Server         : localxampp3308
Source Server Version : 50505
Source Host           : localhost:3308
Source Database       : dictionary_portalnew

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-09 11:38:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `crf`
-- ----------------------------
DROP TABLE IF EXISTS `crf`;
CREATE TABLE `crf` (
  `id_crf` int(11) NOT NULL AUTO_INCREMENT,
  `idProjects` int(11) NOT NULL,
  `crf_name` varchar(255) NOT NULL,
  `crf_title` varchar(255) NOT NULL,
  `languages` longtext CHARACTER SET utf8 NOT NULL,
  `l1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `l2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `l3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `l4` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `l5` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `no_of_modules` varchar(10) NOT NULL,
  PRIMARY KEY (`id_crf`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of crf
-- ----------------------------
INSERT INTO `crf` VALUES ('1', '1', 'Baseline Survey Questionnaire', 'tool A', 'English, Urdu', 'English', 'Urdu', null, null, null, '2019-08-01', '2019-09-25', '', '3');
INSERT INTO `crf` VALUES ('2', '1', 'Tool B', 'B', 'Persian', 'Persian', null, null, null, null, '2019-08-01', '2019-08-25', '', '2');
INSERT INTO `crf` VALUES ('3', '1', 'Tool C', 'C', 'English, Urdu, Persian', 'English', 'Urdu', 'Persian', null, null, '2019-09-07', '2019-10-30', '', '5');
INSERT INTO `crf` VALUES ('4', '2', 'CRF 1', '1', 'English', 'English', null, null, null, null, '2018-10-14', '2019-06-18', '', '4');
INSERT INTO `crf` VALUES ('9', '3', 'Test crd', 'test', 'English, اردو', 'English', 'اردو', null, null, null, '2021-09-23', '2021-12-30', '', '3');
INSERT INTO `crf` VALUES ('10', '3', 'Test crf 2', 'test 2', 'English, اردو, سندھی', 'English', 'اردو', 'سندھی', null, null, '2019-01-01', '2022-12-31', '', '7');
INSERT INTO `crf` VALUES ('11', '6', 'DP CRF A', 'CRF A', 'Englsih, Urdu, Sindhi', 'Englsih', 'Urdu', 'Sindhi', null, null, '2012-03-12', '2012-03-12', '', '3');
INSERT INTO `crf` VALUES ('16', '7', 'Test CRF A', 'CRF A', 'English, Urdu', 'English', 'Urdu', null, null, null, '2022-02-22', '2022-02-22', '', '1');
INSERT INTO `crf` VALUES ('17', '8', 'Household Survey', 'hh', 'English, Urdu', 'English', 'Urdu', null, null, null, '2022-02-22', '2022-02-22', '', '1');
INSERT INTO `crf` VALUES ('18', '8', 'Baseline Survery Questionnaire', 'Baseline', 'English, Sindhi', 'English', 'Sindhi', null, null, null, '2019-01-01', '2020-02-01', '', '2');
INSERT INTO `crf` VALUES ('19', '9', 'First follow-up visit form: ANISA RSV follow-up study', 'First Followup', 'English, Urdu', 'English', 'Urdu', null, null, null, '1970-01-01', '1970-01-01', '', '1');

-- ----------------------------
-- Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `idModule` int(11) NOT NULL AUTO_INCREMENT,
  `id_crf` int(11) NOT NULL,
  `variable_module` varchar(255) DEFAULT NULL,
  `module_name_l1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_desc_l1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_name_l2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_desc_l2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_name_l3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_desc_l3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_name_l4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_desc_l4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_name_l5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_desc_l5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `module_status` varchar(255) NOT NULL,
  `module_type` varchar(255) NOT NULL,
  `idProjects` int(11) NOT NULL,
  `isActive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idModule`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('1', '1', 'A', 'Module A', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'ماڈیول اے', 'لوریم اِپسم پرنٹنگ اور ٹائپسیٹنگ انڈسٹری کا صرف ڈمی متن ہے۔ لوریم ایپسم 1500s کے بعد سے ہی انڈسٹری کا معیاری ڈمی متن رہا ہے ، جب ایک نامعلوم پرنٹر ٹائپ کی ایک گیلی لے کر اس کو ٹائپ کرتے ہوئے ٹائپ نمونہ کی کتاب بناتا ہے۔ یہ نہ صرف پانچ صدیوں سے زندہ بچا ہے', '', '', '', '', '', '', 'Ongoing', 'Multiple', '1', '');
INSERT INTO `modules` VALUES ('2', '2', 'A', 'ماژول A', ' همانطور که گاها شناخته شده است ، متن ساختگی است که در طرح های چاپی ، گرافیکی یا وب استفاده می شود. این گذرگاه به یک نویسنده نامه ناشناخته در قرن پانزدهم منتسب شده است که تصور می شود قسمت هایی از Cicero\'s De Finibus Bonorum et Malorum را برای استفاده در ی', '', '', '', '', '', '', '', '', 'Completed', 'Single', '1', '');
INSERT INTO `modules` VALUES ('3', '1', 'B', 'Module B', 'B Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum', 'ماژول B', 'همانطور که گاها شناخته شده است ، متن ساختگی است که در طرح های چاپی ، گرافیکی یا وب استفاده می شود. این گذرگاه به یک نویسنده نامه ناشناخته در قرن پانزدهم منتسب شده است که تصور می شود قسمت هایی از Cicero\'s De Finibus Bonorum et Malorum را برای استفاده در یک', '', '', '', '', '', '', 'Ongoing', 'Single', '1', '');
INSERT INTO `modules` VALUES ('4', '3', 'A', 'Module A of tool C id crf 3', 'Module A of tool C id crf 3 description', 'آلے C id crf 3 تفصیل کا ماڈیول A۔', 'آلے C id crf 3 تفصیل کا ماڈیول A۔', 'ماژول A ابزار C id crf 3', 'ماژول A توضیحات ابزار C id crf 3', '', '', '', '', 'Ongoing', 'Single', '2', '');
INSERT INTO `modules` VALUES ('5', '1', 'C', 'English', 'English Description', '', '', '', '', '', '', '', '', 'Ongoing', 'Single', '0', '');
INSERT INTO `modules` VALUES ('6', '1', 'D', 'English 2', 'English Description', 'سندھی ', 'سندھی تفصیل', '', '', '', '', '', '', 'Ongoing', 'Multiple', '0', '');
INSERT INTO `modules` VALUES ('7', '4', 'A', 'test', 'test description', 'ٹیسٹ ', 'ٹیسٹ کی تفصیل', 'سندھی ', 'سندھی تفصیل', 'تست', 'توضیحات آزمون', '', '', 'Ongoing', 'Multiple', '2', '');
INSERT INTO `modules` VALUES ('8', '4', 'B', 'fadas', 'asdasdas', '', '', '', '', '', '', '', '', 'Ongoing', 'Multiple', '2', '');
INSERT INTO `modules` VALUES ('9', '11', 'A', 'Household', 'household description', 'گھریلو', 'گھریلو تفصیل', 'سندھی ', 'سندھی تفصیل', '', '', '', '', 'Ongoing', 'Multiple', '6', '');
INSERT INTO `modules` VALUES ('10', '11', 'A', 'Lorem ipsum', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum e', 'لوریم ایپسم ', 'لوریم ایپسم ، یا لپسسم جیسا کہ یہ کبھی کبھی جانا جاتا ہے ، ڈمی متن ہے جو پرنٹ ، گرافک یا ویب ڈیزائن تیار کرنے میں استعمال ہوتا ہے۔ گزرنے کی وجہ 15 ویں صدی میں ایک نامعلوم ٹائپ سیٹٹر سے منسوب ہے جس کے بارے میں سوچا جاتا ہے کہ وہ ایک قسم کی نمونہ کی کتاب می', 'سندھی ', 'ماژول A توضیحات ابزار C id crf 3', '', '', '', '', 'Ongoing', 'Single', '6', '');
INSERT INTO `modules` VALUES ('17', '16', 'A', 'Module A', 'Module A Desc', 'Module B', 'Module B Desc', '', '', '', '', '', '', 'Completed', 'Multiple', '7', '');
INSERT INTO `modules` VALUES ('18', '17', 'SC', 'Social Economic Social - English', 'Social Economic Social - English desc', 'Social Economic Social - urdu', 'asdsa', '', '', '', '', '', '', 'Ongoing', 'Single', '8', '');
INSERT INTO `modules` VALUES ('19', '18', 'H', 'HOUSEHOLD AND MEMBERS INFORMATION', 'HOUSEHOLD AND MEMBERS INFORMATION ', 'معلومات خانواده و اعضا', 'معلومات خانواده و اعضا', '', '', '', '', '', '', 'Ongoing', 'Multiple', '8', '');
INSERT INTO `modules` VALUES ('20', '19', 'F', 'First Followup', 'First follow-up visit form: ANISA RSV follow-up study', '  پہلے وِزِٹ ', '  پہلے وِزِٹ کا سوال نامہ (آر ایس وی مطالعہ)\nی\n', '', '', '', '', '', '', 'Ongoing', 'Single', '9', '');
INSERT INTO `modules` VALUES ('21', '19', 'G', 'Data Form 2: Second household visit form', 'This form is to be completed for all children by research assistants during the second household visit (second home visit or during the sixth month visit of the enrolment.\nRespondent: \n•	Primarily mother, if mother is absent even after three visits, infor', '  دوسرے وِزِٹ کا سوال نامہ (آر ایس وی مطالعہ)ی', 'اس فارم کو آر ایس وی مطالعہ کے لئے پچھلے انیسہ مطالعے میں منتخب کیے گئے بچوں کے لیے پُر کرنا ہے۔ یہ فارم مطالعے کے پہلے وِزِٹ کے دوران پُر کیا جائے گا۔  (تحقیقاتی اسسٹنٹ اس فارم کو مکمل کرے گا)\n \nجواب دینے والا:\nبنیادی طور پر بچے کی ماں جواب دے گی، اگر ت', '', '', '', '', '', '', 'Ongoing', 'Single', '9', '');

-- ----------------------------
-- Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `idProjects` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `short_title` varchar(10) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `no_of_crf` varchar(30) NOT NULL,
  `languages` longtext NOT NULL,
  `no_of_sites` varchar(30) NOT NULL,
  `email_of_person` longtext NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'1',
  `iduser` int(11) NOT NULL,
  `createdDateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(255) DEFAULT NULL,
  `updateDateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idProjects`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', 'Central Asia Stunting Initiative', 'casi', '2019-06-03', '2020-04-30', '3', 'English, Urdu, Persian', '3', 'abcd@aku.edu', '', '0', '2019-10-14 12:24:25', null, '2019-09-19 12:03:07', null);
INSERT INTO `projects` VALUES ('2', 'Kangaroo Mother Care', 'kmc', '2018-02-16', '2019-12-26', '1', 'English', '1', 'abcd@aku.edu', '', '0', '2019-10-24 14:03:09', null, '2019-09-19 12:04:27', null);
INSERT INTO `projects` VALUES ('3', 'Typbar', 'Typbar', '2019-09-02', '2020-01-10', '0', 'English', '1', 'abcd@aku.edu', '', '0', '2019-09-30 15:46:51', null, '2019-09-30 15:21:47', null);
INSERT INTO `projects` VALUES ('6', 'Dictionary Portal', 'DP', '2019-10-22', '2020-02-22', '3', 'English, Sindhi, Urdu, Persian', '10', 'abcd@test.com', '', '0', '2019-11-17 19:34:17', '2', '2019-11-17 19:34:17', null);
INSERT INTO `projects` VALUES ('7', 'Test project', 'Test', '2022-02-22', '2033-03-31', '1', 'English, Urdu', '3', 'shehroz.altaf92@gmail.com', '', '0', '2019-11-18 09:36:52', '2', '2019-11-18 09:36:52', null);
INSERT INTO `projects` VALUES ('8', 'Demo Projecct', 'Demo', '2020-09-09', '2022-02-22', '3', 'English, Urdu', '4', 'irfansyed.pg@gmail.com', '', '0', '2019-11-18 10:39:24', '2', '2019-11-18 10:39:24', null);
INSERT INTO `projects` VALUES ('9', 'RSV', 'RSV', '1970-01-01', '1970-01-01', '2', 'English, Urdu', '1', 'shahroz.khan@aku.edu', '', '0', '2019-11-27 13:36:46', '2', '2019-11-27 13:36:46', null);

-- ----------------------------
-- Table structure for `section`
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `idSection` int(11) NOT NULL AUTO_INCREMENT,
  `idModule` int(11) DEFAULT NULL,
  `section_title` longtext CHARACTER SET utf8,
  `section_desc` longtext CHARACTER SET utf8,
  `section_title_l1` longtext CHARACTER SET utf8,
  `section_desc_l1` longtext CHARACTER SET utf8,
  `section_title_l2` longtext CHARACTER SET utf8,
  `section_desc_l2` longtext CHARACTER SET utf8,
  `section_title_l3` longtext CHARACTER SET utf8,
  `section_desc_l3` longtext CHARACTER SET utf8,
  `section_title_l4` longtext CHARACTER SET utf8,
  `section_desc_l4` longtext CHARACTER SET utf8,
  `section_title_l5` longtext CHARACTER SET utf8,
  `section_desc_l5` longtext CHARACTER SET utf8,
  `section_var_name` varchar(255) DEFAULT NULL,
  `section_status` varchar(255) DEFAULT NULL,
  `id_crf` int(11) DEFAULT NULL,
  `idProjects` int(11) DEFAULT NULL,
  `isActive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idSection`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('1', '1', 'Section 1', 'section 1 desc', 'Section 1', 'section 1 desc', 'دفعہ 1', 'سیکشن 1 تفصیل', null, null, null, null, null, null, '1', 'ongoing', '1', '1', '');
INSERT INTO `section` VALUES ('2', '1', 'Section 2', 'desc', 'Section 2', 'desc', 'دفعہ 2', 'سیکشن 2 تفصیل', null, null, null, null, null, null, '2', 'ongoing', '1', '1', '');
INSERT INTO `section` VALUES ('3', '4', 'Section 3', 'desription', 'Section 3', 'desription', 'دفعہ 3', 'سیکشن 3 تفصیل', null, null, null, null, null, null, '3', 'completed', '1', '1', '');
INSERT INTO `section` VALUES ('4', '2', 'Section A', 'description A', 'Section A', 'description A', null, null, null, null, null, null, null, null, '1', 'ongoing', '2', '1', '');
INSERT INTO `section` VALUES ('5', '3', 'Section B', 'description B', 'Section B', 'description B', null, null, null, null, null, null, null, null, '1', 'completed', '1', '1', '');
INSERT INTO `section` VALUES ('9', '10', 'The order by clause', ' The order by clause is used to sort the query result sets in either ascending or descending order', 'The order by clause', ' The order by clause is used to sort the query result sets in either ascending or descending order', 'شق کے ذریعہ آرڈر', 'شق کے ذریعہ آرڈر کا استعمال سوال کے نتائج کے سیٹ کو چڑھتے یا نزول والے ترتیب میں ترتیب دینے کے لئے استعمال کیا جاتا ہے', 'سندھی ', 'ماژول A توضیحات ابزار C id crf 3', null, null, null, null, 'A', 'Ongoing', '11', '6', '');
INSERT INTO `section` VALUES ('12', '17', 'Section A', 'Section A Desc', 'Section A', 'Section A Desc', 'Section B', 'Section B Desc', null, null, null, null, null, null, 'A', 'Ongoing', '16', '7', '');
INSERT INTO `section` VALUES ('13', '18', 'Section 1 eng', 'Section 1 eng DESC', 'Section 1 eng', 'Section 1 eng DESC', 'section 1 urdu', 'section 1 desc', null, null, null, null, null, null, 'A', 'Ongoing', '17', '8', '');
INSERT INTO `section` VALUES ('14', '19', ' HOUSEHOLD INFORMATION (HH) ', ' HOUSEHOLD INFORMATION (HH) ', ' HOUSEHOLD INFORMATION (HH) ', ' HOUSEHOLD INFORMATION (HH) ', 'معلومات خانه ', 'معلومات خانه', null, null, null, null, null, null, '1', 'Ongoing', '18', '8', '');
INSERT INTO `section` VALUES ('15', '19', 'List of HouseHold Member', 'List of HouseHold Member (HL)', 'List of HouseHold Member', 'List of HouseHold Member (HL)', ': لیست اعضای خانواده ', 'لیست اعضای خانواده (HL)', null, null, null, null, null, null, 'HL', 'Ongoing', '18', '8', '');
INSERT INTO `section` VALUES ('16', '19', 'SOCIO-ECONOMIC STATUS (SS) ', 'This section will be filled by the Head of the household (HH) or knowledgeable member at-least 18 years old ', 'SOCIO-ECONOMIC STATUS (SS) ', 'This section will be filled by the Head of the household (HH) or knowledgeable member at-least 18 years old ', 'وضعیت اقتصادی – اجتماعی (SS)', 'این بخش توسط ریس خانه (HH) یا یک عضو دانا که حد اقل 18 ساله باشد، خانه پری گردد.', null, null, null, null, null, null, '3', 'Ongoing', '18', '8', '');
INSERT INTO `section` VALUES ('17', '20', 'Address and identification information', 'Address and identification information', 'Address and identification information', 'Address and identification information', ')  ایڈریس اور شناخت کی معلومات', ')  ایڈریس اور شناخت کی معلومات', null, null, null, null, null, null, 'A', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('18', '20', 'Taking consent form the caregiver', 'Taking consent form the caregiver', 'Taking consent form the caregiver', 'Taking consent form the caregiver', 'رضاکارانہ طور پر دیکھ بھال کرنے والا ', 'رضاکارانہ طور پر دیکھ بھال کرنے والا ', null, null, null, null, null, null, '2', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('19', '20', 'Household information', 'Household information', 'Household information', 'Household information', 'گھریلو معلومات', 'گھریلو معلومات', null, null, null, null, null, null, '3', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('20', '20', 'Previous health information', 'Previous health information', 'Previous health information', 'Previous health information', 'پچھلی صحت کی معلومات', 'پچھلی صحت کی معلومات', null, null, null, null, null, null, '4', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('21', '20', 'Screening for Atopic Dermatitis', 'Screening for Atopic Dermatitis', 'Screening for Atopic Dermatitis', 'Screening for Atopic Dermatitis', ') ایٹوپک ڈرمیٹائٹس کے لئے اسکریننگ', ') ایٹوپک ڈرمیٹائٹس کے لئے اسکریننگ', null, null, null, null, null, null, '5', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('22', '20', 'Screening for asthma/wheeze\n\n', 'Screening for asthma/wheeze\n(Show the video of Asthma and wheeze)\n', 'Screening for asthma/wheeze\n\n', 'Screening for asthma/wheeze\n(Show the video of Asthma and wheeze)\n', 'دمہ کے لئے اسکریننگ\n', '(دمہ اور پہاڑی کی ویڈیو دکھائیں)', null, null, null, null, null, null, '6', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('23', '21', 'Address and identification information', 'Address and identification information', 'Address and identification information', 'Address and identification information', 'ایڈریس اور شناخت کی معلومات', 'ایڈریس اور شناخت کی معلومات', null, null, null, null, null, null, '1', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('24', '21', '2.0 Screening for Atopic Dermatitis ((Please match the information with the record in the health card)', 'Screening for Atopic Dermatitis ((Please match the information with the record in the health card)', '2.0 Screening for Atopic Dermatitis ((Please match the information with the record in the health card)', 'Screening for Atopic Dermatitis ((Please match the information with the record in the health card)', 'ایٹوپک ڈرمیٹائٹس کے لئے اسکریننگ ', 'ایٹوپک ڈرمیٹائٹس کے لئے اسکریننگ ', null, null, null, null, null, null, '2', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('25', '21', '3. Screening for asthma/wheeze\n(Show the video of Asthma and wheeze)\n', 'Screening for asthma/wheeze\n(Show the video of Asthma and wheeze)', '3. Screening for asthma/wheeze\n(Show the video of Asthma and wheeze)\n', 'Screening for asthma/wheeze\n(Show the video of Asthma and wheeze)', 'دمہ کے لئے اسکریننگ دمہ اور سینے سے سیٹی کی آواز کی ویڈیو دکھائیں', 'دمہ کے لئے اسکریننگ دمہ اور سینے سے سیٹی کی آواز کی ویڈیو دکھائیں', null, null, null, null, null, null, '3', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('26', '21', 'Screening for Rhinitis', 'Screening for Rhinitis', 'Screening for Rhinitis', 'Screening for Rhinitis', 'راینائیٹس  کے لئے اسکریننگ', 'راینائیٹس  کے لئے اسکریننگ', null, null, null, null, null, null, '4', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('27', '21', '5. Screening for family atopic disease', 'Screening for family atopic disease', '5. Screening for family atopic disease', 'Screening for family atopic disease', 'خاندان کی بیماری کے لئے اسکریننگ', 'خاندان کی بیماری کے لئے اسکریننگ', null, null, null, null, null, null, '5', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('28', '21', '6.0 Predisposing factors', 'Predisposing factors', '6.0 Predisposing factors', 'Predisposing factors', 'پیش قدمی عوامل', 'پیش قدمی عوامل', null, null, null, null, null, null, '6', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('29', '21', 'End of the interview', 'End of the interview', 'End of the interview', 'End of the interview', 'انٹرویو کا اختتام ہوگیا؟', 'انٹرویو کا اختتام ہوگیا؟', null, null, null, null, null, null, '7', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('30', '20', '7. Screening for Rhinitis', 'Screening for Rhinitis', '7. Screening for Rhinitis', 'Screening for Rhinitis', '  7.0) راینائیٹس  کے لئے اسکریننگ', 'راینائیٹس  کے لئے اسکریننگ', null, null, null, null, null, null, '7', 'Ongoing', '19', '9', '');
INSERT INTO `section` VALUES ('31', '20', '8. Screening for family atopic disease.', 'Screening for family atopic disease', '8. Screening for family atopic disease.', 'Screening for family atopic disease', 'خاندان کی بیماری کے لئے اسکریننگ', 'خاندان کی بیماری کے لئے اسکریننگ', null, null, null, null, null, null, '8', 'Ongoing', '19', '9', '');

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
  `nature_var` varchar(10) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=695 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of section_detail
-- ----------------------------
INSERT INTO `section_detail` VALUES ('1', '1', '1', 'A101', 'Label', null, '1', 'Geographical Area', 'جغرافیائی علاقہ', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('2', '1', '1', 'A102', 'Input', null, '2', 'Enumeration Block Number', 'گنتی کا بلاک نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '255', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('3', '1', '1', 'A103', 'Input', null, '3', 'Province', 'صوبہ', '', '', '', null, null, null, null, 'l1,l2', '0', '255', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('4', '1', '1', 'A104', 'Input', null, '4', 'Disctrict', 'ضلع', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('5', '1', '1', 'A105', 'Input', null, '5', 'Tehsil/Taluka', 'تحصیل / تالہ', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('6', '1', '1', 'A106', 'Input', null, '6', 'City/Village', 'شہر / گاؤں', '', '', '', null, null, null, null, 'l1,l2', '0', '255', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('7', '1', '1', 'A107', 'Input', null, '7', 'Cluster Number', 'کلسٹر نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('8', '1', '1', 'A108', 'Input', null, '8', 'Household Number', 'گھریلو نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('9', '1', '1', 'A109', 'Input', null, '9', 'Interviewer name and number', 'انٹرویو لینے والے کا نام اور نمبر', '', '', '', null, null, null, null, 'l1,l2', '0', '0', null, null, 'single', '1', '1', '');
INSERT INTO `section_detail` VALUES ('10', '1', '1', 'A110', 'Input', null, '0', 'asd', 'sasd', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('11', '1', '1', '', '', null, '0', '', '', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('12', '1', '1', 'A111', 'Label', null, '0', 'lab1', 'lab12', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('13', '1', '1', 'A116', 'Label', null, '0', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting In', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative ', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('14', '1', '1', 'A112', 'Input', null, '0', 'inp1', 'inp2', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('15', '1', '1', 'A113', 'Label', null, '0', 'asd', 'qqq', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('16', '1', '1', 'A114', 'Input', null, '0', 'dasdasda', 'sdasdsadasdas', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('17', '1', '1', 'A115', 'Input', null, '0', 'xxxxxxx', 'vvvvvv', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('18', '1', '1', 'A116', 'Label', null, '0', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting In', 'Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative Central Asia Stunting Initiative ', '', '', '', null, null, null, null, null, null, null, null, null, null, '1', '1', '');
INSERT INTO `section_detail` VALUES ('19', '9', '10', 'A101', 'Label', null, '0', 'household  name', 'abcd', '', '', '', null, null, null, null, null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('20', '9', '10', 'A102', 'Input', null, '0', 'household  name 1', 'xyz', '', '', '', null, null, null, null, null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('39', '9', '10', 'AA03', 'Input', null, '0', 'Input test', 'Input test', 'Input test', '', '', null, null, '', null, null, '10', '22', 'ReadOnly', 'Required', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('40', '9', '10', 'AA04', 'Input', null, '1', 'textarea test 1', 'textarea test 1', 'textarea test 1', '', '', null, null, '', null, null, '', '', '', '', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('41', '9', '10', 'AA05', 'Input', null, '2', 'textarea test 2', 'textarea test 2', 'textarea test 2', '', '', null, null, '', null, null, '', '', 'ReadOnly', 'Required', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('42', '9', '10', 'AA06', 'Input', null, '3', 'input test 2', 'input test 2', 'input test 2', '', '', null, null, 'AA03', null, null, '', '', '', '', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('43', '9', '10', 'AA07', 'SelectBox', null, '4', 'Select test 1', 'Select test 1', 'Select test 1', '', '', null, null, null, null, null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('44', '9', '10', 'AA07A', 'Options', null, '5', '', '', '', '', '', 'Option 1', 'Option 1 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('45', '9', '10', 'AA07B', 'Options', null, '5', '', '', '', '', '', 'Option 2', 'Option 2 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('46', '9', '10', 'AA07C', 'Options', null, '5', '', '', '', '', '', 'Option 3', 'Option 3 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('47', '9', '10', 'AA07D', 'Options', null, '5', '', '', '', '', '', 'Option 4', 'Option 4 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('48', '9', '10', 'AA07E', 'Options', null, '5', '', '', '', '', '', 'Option 5', 'Option 5 Value', null, 'AA07', null, null, null, null, null, null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('49', '9', '10', 'AA08', 'Input', null, '0', 'inp', 'inp', 'inp', '', '', null, null, '', null, null, '', '', '', '', null, '11', '6', '');
INSERT INTO `section_detail` VALUES ('50', '12', '17', 'AA01', 'Label', null, '0', 'Title 1', 'Title 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('51', '12', '17', 'AA02', 'Input', null, '1', 'Input 1', 'Input 1', '', '', '', null, null, '', null, null, '11', '22', 'ReadOnly', 'Required', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('52', '12', '17', 'AA03', 'Input', null, '2', 'Input 2', 'Input 2', '', '', '', null, null, 'AA03', null, null, '', '', '', 'Required', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('53', '12', '17', 'AA04', 'Input', null, '3', 'Text Area 1', 'Text Area 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '16', '7', '');
INSERT INTO `section_detail` VALUES ('54', '13', '18', 'SCA01', 'Label', null, '0', 'Hading 1', 'Heading 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('55', '13', '18', 'SCA02', 'Input', null, '1', 'Household name', 'Household name', '', '', '', null, null, '', null, null, '10', '20', '', 'Required', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('56', '13', '18', 'SCA03', 'Input', null, '2', 'Input 2', 'Input 2', '', '', '', null, null, 'SCA02', null, null, '', '', '', '', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('57', '13', '18', 'SCA04', 'Input', null, '3', 'textarea 1', 'textarea 1', '', '', '', null, null, '', null, null, '', '', '', '', null, '17', '8', '');
INSERT INTO `section_detail` VALUES ('58', '14', '19', 'HH', 'Label', null, '0', 'HOUSEHOLD INFORMATION ', 'معلومات خانواده', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('59', '14', '19', 'H101', 'Input', null, '1', 'Geographical Area', 'منطقه جغرافیا', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('60', '14', '19', 'H102', 'Input', null, '0', 'Cluster Number', 'شماره کلاستر', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('61', '14', '19', 'H103', 'Input', null, '0', 'Province', 'ولایت', '', '', '', null, null, '', null, null, '05', '15', '', 'Required', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('62', '14', '19', 'H104', 'Input', null, '1', 'District', 'ولسوالی', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('63', '14', '19', 'H105', 'Input', null, '2', 'City', 'شهر', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('64', '14', '19', 'H106', 'Input', null, '3', 'Village', 'قریه', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('65', '14', '19', 'H107', 'Input', null, '4', 'Cluster number', 'شماره کلاستر', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('66', '14', '19', 'H1L', 'Label', null, '0', 'The enumerator will read out the consent for understanding of respondent and will mention the purpose of the study and time required to complete the interviews (a separate consent sheet will be provided to the enumerators)', 'سروی کننده رضایت نامه را برای درک جواب دهنده می خواند، مقصد تحقیق  و زمان مورد ضرورت برای تکمیل مصاحبه را ذکر می کند (یک ورق رضایت نامه جدا برای سروی کننده تهیه می گردد). ', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('68', '14', '19', 'H117', 'Checkbox', null, '0', 'Was consent taken?', 'آیا رضایت گرفته شده است؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('69', '14', '19', 'H117A', 'COption', null, '0', 'Verbal consent', '	رضایت شفاهی', '', '', '', null, 'Y/N', null, 'H117', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('71', '14', '19', 'H117B', 'COption', null, '0', 'Written consent', '	رضایت کتبی', '', '', '', null, 'Y/N', null, 'H117', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('72', '14', '19', 'H1L', 'Label', null, '0', 'If verbal consent is not given STOP interview and move to last Question of this section to record the outcome of the interview', 'اگر رضایت شفاهی داده نشد، مصاحبه را متوقف نموده و به سوال آخر این بخش برای درج نتیجه مصاحبه بروید.', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('73', '14', '19', 'H118', 'SelectBox', null, '0', 'Result of Household Questionnaire interview', 'نتیجه مصاحبه سوالنامه خانواده', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('74', '14', '19', 'H118A', 'Options', null, '0', 'Completed ', 'تکمیل ', '', '', '', null, '1', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('77', '14', '19', 'H118B', 'Options', null, '0', 'No household member at home or no competent respondent at home at time\r\nof visit\r\n', 'هیچ عضو خانه در خانه نبود یا در زمان بازدید جواب دهنده توانامند در خانه نبود', '', '', '', null, '2', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('79', '14', '19', 'H118C', 'Options', null, '0', 'Refused', 'نبود ', '', '', '', null, '3', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('80', '14', '19', 'H118D', 'Options', null, '0', 'Dwelling vacant or address not a dwelling', 'تمام خانواده برای مدت طولانی غایب بود ', '', '', '', null, '5', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('81', '14', '19', 'H118E', 'Options', null, '0', 'Dwelling not found', 'خانه پیدا نشد ', '', '', '', null, '6', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('82', '14', '19', 'H118F', 'Options', null, '0', 'Other (specify)', 'دیگر (مشخص نمایید) ', '', '', '', null, '96', null, 'H118', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('83', '15', '19', 'H201', 'Input', null, '0', ' Line number ', ' سروی خانواده', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('84', '15', '19', 'H202', 'Input', null, '1', 'First, please tell me the name of each person who usually lives here, starting with the head of the household.   Probe for additional household members.', '. در نخست، لطف نموده نام های تمام اشخاص این خانواده بود را بگوید و از رئیس خانواده شروع کنید.', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('85', '15', '19', 'H203', 'Radio', null, '2', 'relationship with  Head of household)?', 'ابت با رئیس خانواده', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('86', '15', '19', 'H204', 'Radio', null, '3', 'Sex', 'جنس', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('87', '15', '19', 'H204A', 'RadioOptions', null, '3', 'Male', 'مرد', '', '', '', null, '1', null, 'H204', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('88', '15', '19', 'H204B', 'RadioOptions', null, '3', 'Female', 'عورت', '', '', '', null, '2', null, 'H204', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('89', '15', '19', 'H203A', 'RadioOptions', null, '2', '1', '1', '', '', '', null, '1', null, 'H203', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('90', '15', '19', 'H203B', 'RadioOptions', null, '2', '2', '2', '', '', '', null, '2', null, 'H203', null, null, null, null, null, null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('119', '16', '19', 'H301', 'SelectBox', null, '0', 'What is the mother tongue of the head of the household?', 'زبان مادری رئیس خانه چیست؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('120', '16', '19', 'H301A', 'Options', null, '0', 'Urdu  ', 'اردو', '', '', '', '', '1', '', 'H301', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('121', '16', '19', 'H301B', 'Options', null, '0', 'Shina  ', 'شینا ', '', '', '', '', '2', '', 'H301', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('122', '16', '19', 'H301C', 'Options', null, '0', 'Hunzi/Brushasky  ', 'ھنزی /بروشسکی', '', '', '', '', '3', '', 'H301', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('123', '16', '19', 'H301D', 'Options', null, '0', 'Khowar/Chitrali ', 'ار/ چترالی کھو', '', '', '', '', '4', '', 'H301', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('124', '16', '19', 'H301E', 'Options', null, '0', 'Wakhi    ', 'ھنزی /بروشسکی', '', '', '', '', '5', '', 'H301', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('125', '16', '19', 'H301F', 'Options', null, '0', 'Russian ', 'رشین ', '', '', '', '', '10', '', 'H301', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('126', '16', '19', 'H301G', 'Options', null, '0', 'Others specify ', 'دیگر', '', '', '', '', '96', '', 'H301', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('127', '16', '19', 'H302', 'Radio', null, '1', 'What is ownership status of household? ', 'وضعیت ملکیت خانه چگونه است', '', '', '', '', null, '', null, null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('128', '16', '19', 'H302A', 'RadioOptions', null, '1', 'Own', 'شخصی ', '', '', '', '', '1', '', 'H302', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('129', '16', '19', 'H302B', 'RadioOptions', null, '1', 'Rented', 'کرایی ', '', '', '', '', '2', '', 'H302', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('130', '16', '19', 'H302C', 'RadioOptions', null, '1', 'Others specify', 'دیگر (مشخص نمایید)', '', '', '', '', '96', '', 'H302', null, '', '', '', '', null, '18', '8', '');
INSERT INTO `section_detail` VALUES ('131', '17', '20', 'FA01', 'Input', null, '0', 'Country/Site', 'مُلک / سائٹ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('132', '17', '20', 'FA02', 'Input', null, '0', 'Field site', 'فیلڈ سائٹ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('133', '17', '20', 'FA03', 'Input', null, '1', 'Para', 'پارہ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('134', '17', '20', 'FA04', 'Input', null, '2', 'Block', 'بلاک', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('135', '17', '20', 'FA05', 'Input', null, '3', 'Structure', 'ساخت', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('136', '17', '20', 'FA06', 'Input', null, '4', 'Household ', 'گھر', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('137', '17', '20', 'FA07', 'Input', null, '0', 'Mother\'s Current ID', 'ماں کا موجودہ شناختی آئی ڈی', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('138', '17', '20', 'FA08', 'Input', null, '1', 'Mother\'s Permanent ID', 'آئی ڈی ماں کا مستقل شناختی', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('139', '17', '20', 'FA09', 'Input', null, '0', 'Child’s name', 'بچے کا نام', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('140', '17', '20', 'FA10', 'Input', null, '1', 'Mother\'s Name', 'ماں کا نام', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('141', '17', '20', 'FA11', 'Input', null, '2', 'Father\'s Name', 'والد کا نام ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('142', '17', '20', 'FA12', 'Input', null, '3', 'Household Head’s Name', 'گھر کے سربراہ کا نام', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('143', '17', '20', 'FA13', 'Input', null, '4', 'CHW\'s Name & Code', ' کا نام اور کوڈ CHW ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('144', '17', '20', 'FA14', 'Input', null, '5', 'Date of Visit (1st attempt)', 'وِزِٹ کی تاریخ (پہلی کوشش)', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('145', '17', '20', 'FA15', 'Input', null, '6', 'Date of Visit (2nd attempt)', 'وِزِٹ کی تاریخ (دوسری کوشش)', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('146', '17', '20', 'FA16', 'Input', null, '7', 'Date of Visit (3rd attempt)', 'وِزِٹ کی تاریخ    (تیسری کوشش)', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('147', '18', '20', 'F201', 'Radio', null, '0', 'The mother/caregiver has given Informed consent to participate in the surveillance', 'ماں یا دیکھ بھال کرنے والے نے مطالعے میں حصہ لینے کے بارے میں مطمئن رضامندی دی ہے', '', '', '', null, null, '203', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('148', '18', '20', 'F201A', 'Radio', null, '0', 'Yes', 'ہاں   ', '', '', '', '', '1', '203', 'F201', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('149', '18', '20', 'F201B', 'Radio', null, '0', 'No', 'ںہیں   ', '', '', '', '', '2', '203', 'F201', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('150', '18', '20', 'F202', 'Radio', null, '0', 'Reason for not providing consent', 'رضامندی فراہم نہ کرنے کی وجہ', '', '', '', null, null, '1001', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('151', '18', '20', 'F202A', 'RadioOptions', null, '0', 'Not interested', 'دلچسپی نہیں ہے', '', '', '', '', '1', '1001', 'F202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('152', '18', '20', 'F202B', 'RadioOptions', null, '0', 'Busy', 'مصروفیت', '', '', '', '', '2', '1001', 'F202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('153', '18', '20', 'F202C', 'RadioOptions', null, '0', 'Not comfortable with the study procedures', 'مطالعہ کے طریقہ کار سے مطمئن نہیں', '', '', '', '', '3', '1001', 'F202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('154', '18', '20', 'F202D', 'RadioOptions', null, '0', 'Refused to mention any cause', 'کسی بھی وجہ کا ذکر کرنے سے انکار', '', '', '', '', '4', '1001', 'F202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('155', '18', '20', 'F202E', 'RadioOptions', null, '0', 'No one present in the household', 'گھر میں کوئی بھی موجود نہیں', '', '', '', '', '5', '1001', 'F202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('156', '18', '20', 'F202F', 'RadioOptions', null, '0', 'Child could not identified', 'بچے کی نشاندہی نہیں ہوئی  ', '', '', '', '', '6', '1001', 'F202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('157', '18', '20', 'F203', 'Radio', null, '1', 'Record who the caregiver/respondent is if consent is given.', '(رضامندی ملنے کی صورت میں) دیکھ بھال کرنے والا / جواب دینے والا شخص کون ہے؟', '', '', '', '', null, '205', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('158', '18', '20', 'F203A', 'RadioOptions', null, '1', 'Mother [Preferred]', 'ماں', '', '', '', '', '1', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('159', '18', '20', 'F203B', 'RadioOptions', null, '1', 'Grand Mother', 'دادی', '', '', '', '', '2', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('160', '18', '20', 'F203C', 'RadioOptions', null, '1', 'Aunt', ' آنٹی', '', '', '', '', '3', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('161', '18', '20', 'F203D', 'RadioOptions', null, '1', 'Sister', 'بہن', '', '', '', '', '4', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('162', '18', '20', 'F203E', 'RadioOptions', null, '1', 'Father', 'والد', '', '', '', '', '5', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('163', '18', '20', 'F203F', 'RadioOptions', null, '1', 'Grandfather', 'دادا', '', '', '', '', '6', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('164', '18', '20', 'F203G', 'RadioOptions', null, '1', 'Uncle', 'انکل', '', '', '', '', '7', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('165', '18', '20', 'F203H', 'RadioOptions', null, '1', 'Brother', 'بھائی', '', '', '', '', '8', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('166', '18', '20', 'F203I', 'RadioOptions', null, '1', 'Other (Specify', 'دیگر (وضاحت کریں)  ', '', '', '', '', '96', '205', 'F203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('167', '18', '20', 'F204', 'Radio', null, '0', '[Why was the Mother not the respondent?]', 'ماں کیوں جواب دہ نہیں تھی؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('168', '18', '20', 'F204A', 'RadioOptions', null, '0', 'She has died', 'وہ حیات نہیں ہیں', '', '', '', '', '1', '', 'F204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('169', '18', '20', 'F204B', 'RadioOptions', null, '0', 'She had out-migrated', 'وہ دوسرے شہرمنتقل ہوگئی ہے', '', '', '', '', '2', '', 'F204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('170', '18', '20', 'F204C', 'RadioOptions', null, '0', 'She was incapacitated', 'اس قابل نہیں ہے وہ', '', '', '', '', '3', '', 'F204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('171', '18', '20', 'F204D', 'RadioOptions', null, '0', 'Continuously not available', 'مسلسل غیر حاظر ہے', '', '', '', '', '4', '', 'F204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('172', '18', '20', 'F204E', 'Input', null, '0', 'Other Specify', 'دیگر (وضاحت کریں)  ', '', '', '', '', '96', 'F203', 'F204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('179', '18', '20', 'F205', 'Radio', null, '0', 'Is the child alive? ', 'کیا بچہ زندہ ہے', '', '', '', null, null, '301', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('180', '18', '20', 'F205A', 'RadioOptions', null, '0', 'Yes, still alive', 'ہاں، اب بھی زندہ', '', '', '', '', '1', '301', 'F205', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('181', '18', '20', 'F205B', 'RadioOptions', null, '0', 'No, child has died', 'نہیں، بچہ مر چکا ہے', '', '', '', '', '2', '301', 'F205', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('182', '18', '20', 'F206', 'Input', null, '0', 'When did the child die? Date of death', 'بچے کی تاریخ وفات کیا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('183', '19', '20', 'F301', 'Input', null, '0', 'How long you are staying in this household?', 'کتنے عرصے سے آپ اس گھر میں رہ رہے ہیں؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('184', '19', '20', 'F302', 'Input', null, '1', 'How many members are there in the household?', 'گھر میں کتنے افراد ہیں؟ ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('185', '19', '20', 'F303', 'Input', null, '2', 'How many rooms are there in the house to sleep in?', 'گھر میں سونے کے لیے کتنے کمرے ہیں؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('186', '19', '20', 'F304', 'Radio', null, '0', 'OBSERVE AND RECORD MAIN MATERIAL OF THE ROOF', 'گھر کی چھت کو دیکھیں اور نوٹ کریں کہ چھت کا بنیادی مواد کیا ہے؟', '', '', '', null, null, '111', null, null, '', '', 'Readonly', 'Required', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('187', '19', '20', 'F304A', 'RadioOptions', null, '0', 'No Roof', 'چھت نہیں ہے', '', '', '', '', '11', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('188', '19', '20', 'F304B', 'RadioOptions', null, '0', 'Thatch/Palm leaf/Reed/Grass', 'اسچ چھت / کھجور کے درخت کے پتے/ ریڈ /  گھاس', '', '', '', '', '12', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('189', '19', '20', 'F304C', 'RadioOptions', null, '0', 'Mud', 'مٹی', '', '', '', '', '13', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('190', '19', '20', 'F304D', 'RadioOptions', null, '0', 'Sod/Mud and Grass Mixture', 'سوڈ / مٹی اور گھاس کا مرکب', '', '', '', '', '14', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('191', '19', '20', 'F304E', 'RadioOptions', null, '0', 'Wood (P)', 'لکڑی (پی', '', '', '', '', '15', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('192', '19', '20', 'F304F', 'RadioOptions', null, '0', 'Rustic Mat', 'رسٹک چٹائی', '', '', '', '', '21', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('193', '19', '20', 'F304G', 'RadioOptions', null, '0', 'Bamboo', 'بانس', '', '', '', '', '22', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('194', '19', '20', 'F304H', 'RadioOptions', null, '0', 'Raw Wood Planks/Timber/Cardboard', 'خام لکڑی کا تختہ / لکڑی / گتے', '', '', '', '', '23', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('195', '19', '20', 'F304I', 'RadioOptions', null, '0', 'Plastic/Polyethylene Sheeting', 'پلاسٹک / Polyethylene ', '', '', '', '', '24', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('196', '19', '20', 'F304J', 'RadioOptions', null, '0', 'Unburnt Brick', 'Un-burnt ', '', '', '', '', '25', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('197', '19', '20', 'F304K', 'RadioOptions', null, '0', 'Loosely packed Stone', 'جمع کئے گئے پتھر', '', '', '', '', '26', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('198', '19', '20', 'F304L', 'RadioOptions', null, '0', 'Metal/GI or Iron Sheet/Tin', 'میٹل / جی آئی یا آئرن شیٹ / ٹِن', '', '', '', '', '31', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('199', '19', '20', 'F304M', 'RadioOptions', null, '0', 'Finished Wood', 'تیار شدہ لکڑی', '', '', '', '', '32', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('200', '19', '20', 'F304N', 'RadioOptions', null, '0', 'Calamine/Cement Fiber', 'کیلامین / سیمنٹ فائبر ', '', '', '', '', '33', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('201', '19', '20', 'F304O', 'RadioOptions', null, '0', 'Asbestos Sheet', 'اسبسٹوس شیٹ', '', '', '', '', '34', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('202', '19', '20', 'F304P', 'RadioOptions', null, '0', 'Concrete/Cement', 'مضبوط اینٹ  سیمنٹ / آرسیسی / کنکریٹ', '', '', '', '', '35', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('203', '19', '20', 'F304Q', 'RadioOptions', null, '0', 'Roofing shingles', ' روف شنگلز', '', '', '', '', '36', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('204', '19', '20', 'F304R', 'RadioOptions', null, '0', 'Tiles', 'ٹائلیں', '', '', '', '', '37', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('205', '19', '20', 'F304S', 'RadioOptions', null, '0', 'Slate', 'سلیٹ', '', '', '', '', '38', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('206', '19', '20', 'F304T', 'RadioOptions', null, '0', 'Burnt Brick', 'برنٹ برک', '', '', '', '', '39', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('207', '19', '20', 'F304U', 'Input', null, '0', 'Other (Specify)', 'دیگر (وضاحت کریں)', '', '', '', '', '96', '', 'F304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('208', '19', '20', 'F305', 'Radio', null, '0', 'OBSERVE AND RECORD MAIN MATERIAL OF THE FLOOR', 'گھر کے فرش کو دیکھیں اور نوٹ کریں کہ فرش کا بنیادی مواد کیا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('209', '19', '20', 'F305A', 'RadioOptions', null, '0', 'Mud/Clay/Earth/Sand', 'گیلی مٹی / مٹی / زمین / ریت', '', '', '', '', '11', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('210', '19', '20', 'F305B', 'RadioOptions', null, '0', 'Dung', 'ڈنگ', '', '', '', '', '12', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('211', '19', '20', 'F305C', 'RadioOptions', null, '0', 'Rudimentary Floor Raw Wood Planks', 'ابتدائی خام لکڑی کا تختہ', '', '', '', '', '21', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('212', '19', '20', 'F305D', 'RadioOptions', null, '0', 'Palm/Bamboo', 'پام / بانس', '', '', '', '', '22', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('213', '19', '20', 'F305E', 'RadioOptions', null, '0', 'Brick with no lime/cement', 'سیمنٹ / چونے کے بغیر اینٹ', '', '', '', '', '23', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('214', '19', '20', 'F305F', 'RadioOptions', null, '0', 'Rough Stone with no lime/cement', 'سیمنٹ / چونے کے بغیر پتھر', '', '', '', '', '24', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('215', '19', '20', 'F305G', 'RadioOptions', null, '0', 'Parquet/polished wood', 'لکڑی / پالش لکڑی', '', '', '', '', '31', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('216', '19', '20', 'F305H', 'RadioOptions', null, '0', 'Vinyl/Asphalt', 'ونایل / اسفالٹ', '', '', '', '', '32', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('217', '19', '20', 'F305I', 'RadioOptions', null, '0', 'Ceramic tiles', 'سیرامک ٹائلز', '', '', '', '', '33', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('218', '19', '20', 'F305J', 'RadioOptions', null, '0', 'Cement', 'سیمنٹ', '', '', '', '', '34', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('219', '19', '20', 'F305K', 'RadioOptions', null, '0', 'Chips/Terrazzo/Mosaic', 'چپس / ٹریرازو / موزیک', '', '', '', '', '35', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('220', '19', '20', 'F305L', 'RadioOptions', null, '0', 'Carpet/Mat', 'قالین / چٹائی', '', '', '', '', '36', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('221', '19', '20', 'F305M', 'RadioOptions', null, '0', 'Polished Stone/Marble/Granit', 'پالش پتھر / ماربل / گرینٹ', '', '', '', '', '37', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('222', '19', '20', 'F305N', 'Input', null, '0', 'Other (Specify)', 'دیگر (وضاحت کریں)  ', '', '', '', '', '96', '', 'F305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('238', '19', '20', 'F306', 'Radio', null, '1', 'OBSERVE AND RECORD MAIN MATERIAL OF THE EXTERIOR WALLS', 'گھر کے باہر کی دیواروں کو دیکھیں اور نوٹ کریں کہ دیواروں کا بنیادی مواد کیا ہے؟', '', '', '', '', null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('239', '19', '20', 'F306A', 'RadioOptions', null, '1', 'No Walls', ' دیوار نہیں ہے', '', '', '', '', '11', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('240', '19', '20', 'F306B', 'RadioOptions', null, '1', 'Cane/Palm/Trunks/Bamboo', 'کین / پام / ٹرنک / بانس', '', '', '', '', '12', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('241', '19', '20', 'F306C', 'RadioOptions', null, '1', 'Dirt/Mud ', 'گندگی /  گیلی مٹی', '', '', '', '', '13', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('242', '19', '20', 'F306D', 'RadioOptions', null, '1', 'Stone', 'پتھر', '', '', '', '', '14', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('243', '19', '20', 'F306E', 'RadioOptions', null, '1', 'Grass/Reed/Thatch/Sticks', 'گھاس / ریڈ / تھیچ / لکڑیاں', '', '', '', '', '15', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('244', '19', '20', 'F306F', 'RadioOptions', null, '1', 'Bamboo with mud', 'مٹی ساتھ کے بانس            ', '', '', '', '', '21', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('245', '19', '20', 'F306G', 'RadioOptions', null, '1', 'Stone with mud', 'مٹی ساتھ کے پتھر             ', '', '', '', '', '22', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('246', '19', '20', 'F306H', 'RadioOptions', null, '1', 'Plywood', 'پلائیووڈ', '', '', '', '', '23', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('247', '19', '20', 'F306I', 'RadioOptions', null, '1', 'Cardboard/Plastic', 'گتے / پلاسٹک', '', '', '', '', '24', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('248', '19', '20', 'F306J', 'RadioOptions', null, '1', 'Sunburn Brick', 'سورج بوم اینٹیں', '', '', '', '', '25', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('249', '19', '20', 'F306K', 'RadioOptions', null, '1', 'Raw Wood/Reused Wood', 'خام لکڑی / استعمال شدہ لکڑی', '', '', '', '', '26', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('250', '19', '20', 'F306L', 'RadioOptions', null, '1', 'Cement/Concrete', 'سیمنٹ / کُنکریٹ', '', '', '', '', '31', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('251', '19', '20', 'F306M', 'RadioOptions', null, '1', 'Stone with Lime/Cement ', 'سیمنٹ / چونے کے ساتھ پتھر', '', '', '', '', '32', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('252', '19', '20', 'F306N', 'RadioOptions', null, '1', 'Burnt Bricks with Lime/Cement', 'اینٹیں / سیمنٹ  چونے کے ساتھ', '', '', '', '', '33', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('253', '19', '20', 'F306O', 'RadioOptions', null, '1', 'Finished Wood Planks/Shingles', 'مکمل لکڑی کے تختے / شنگلز', '', '', '', '', '34', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('254', '19', '20', 'F306P', 'RadioOptions', null, '1', 'Cement Blocks', ' سیمنٹ بلاکس', '', '', '', '', '35', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('255', '19', '20', 'F306Q', 'RadioOptions', null, '1', 'Metal/GI or Iron Sheet/Tin/ Asbestos Sheet', 'میٹل / جی آئی یا آئرن شیٹ / ٹن / اسبسٹسوس شیٹ', '', '', '', '', '36', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('256', '19', '20', 'F306R', 'RadioOptions', null, '1', 'Other (Specify)', 'دیگر وضاحت کریں', '', '', '', '', '96', '', 'F306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('257', '19', '20', 'F307', 'Radio', null, '2', 'What is the main source of drinking water for members of the household?', 'گھر کے افراد کے لئے پینے کے پانی کا بنیادی ذریعہ کیا ہے؟', '', '', '', '', null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('258', '19', '20', 'F307A', 'RadioOptions', null, '2', 'Piped', 'پائپ', '', '', '', '', '11', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('259', '19', '20', 'F307B', 'RadioOptions', null, '2', 'Tube well/hand pump', 'ٹیوب / دستی پمپ', '', '', '', '', '12', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('260', '19', '20', 'F307C', 'RadioOptions', null, '2', 'Dug well or Spring water', 'سپرنگ یا کنویں کا پانی', '', '', '', '', '13', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('261', '19', '20', 'F307D', 'RadioOptions', null, '2', 'Rainwater', 'بارش کا پانی', '', '', '', '', '14', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('262', '19', '20', 'F307E', 'RadioOptions', null, '2', 'Water tanker/cart', 'واٹر ٹینکر / ٹوکری', '', '', '', '', '15', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('263', '19', '20', 'F307F', 'RadioOptions', null, '2', 'Surface', 'سطح', '', '', '', '', '16', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('264', '19', '20', 'F307G', 'RadioOptions', null, '2', 'Bottled', 'بوتل', '', '', '', '', '17', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('265', '19', '20', 'F307H', 'RadioOptions', null, '2', 'Other (Specify)', 'دیگر وضاحت کریں', '', '', '', '', '96', '', 'F307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('266', '19', '20', 'F308', 'Radio', null, '3', 'What kind of toilet facility do members of the household usually use?', 'عام طور پر خاندان کے افراد کس قسم کے ٹوائلٹ سہولت کا استعمال کرتے ہیں؟', '', '', '', '', null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('267', '19', '20', 'F308A', 'RadioOptions', null, '3', 'Flush to piped sewer system', 'پائپ شدہ سیور کا نظام میں فلش', '', '', '', '', '11', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('268', '19', '20', 'F308B', 'RadioOptions', null, '3', 'Flush to septic tank', 'سیپٹک ٹینک میں فلش', '', '', '', '', '12', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('269', '19', '20', 'F308C', 'RadioOptions', null, '3', 'Flush to pit latrine', 'گھڑا ٹوائلٹ میں فلش', '', '', '', '', '13', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('270', '19', '20', 'F308D', 'RadioOptions', null, '3', 'Flush to somewhere else', 'کہیں اور فلش کرنا', '', '', '', '', '14', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('271', '19', '20', 'F308E', 'RadioOptions', null, '3', 'Flush, don\'t know where', 'فلش، پتہ نہیں کہاں', '', '', '', '', '15', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('272', '19', '20', 'F308F', 'RadioOptions', null, '3', 'Ventilated improved Pit (VIP)/biogas latrine', 'ہوا دار بہتر گھڑا / بایوگیس ٹوائلٹ', '', '', '', '', '21', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('273', '19', '20', 'F308G', 'RadioOptions', null, '3', 'Pit latrine with slab', 'سلیب کے ساتھ گھڑا ٹوائلٹ', '', '', '', '', '22', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('274', '19', '20', 'F308H', 'RadioOptions', null, '3', 'Pit latrine without slab/open pit', 'سلیب کے بغیر گھڑا ٹوائلٹ', '', '', '', '', '23', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('275', '19', '20', 'F308I', 'Radio', null, '3', 'Twin pit/composting toilet ', 'ٹوئن گڑھا / کمپوسٹنگ ٹوائلٹ ', '', '', '', '', '31', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('276', '19', '20', 'F308J', 'RadioOptions', null, '3', 'Dry toilet ', 'خشک ٹوائلٹ', '', '', '', '', '41', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('277', '19', '20', 'F308K', 'RadioOptions', null, '3', 'Bucket toilet ', 'بالٹی ٹوائلٹ', '', '', '', '', '51', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('278', '19', '20', 'F308L', 'RadioOptions', null, '3', 'Hanging toilet/hanging latrine ', ' لٹکتا ہوا ٹوائلٹ', '', '', '', '', '61', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('279', '19', '20', 'F308M', 'RadioOptions', null, '3', 'No facility/bush/open space or field', 'کوئی سہولت نہیں/جھاڑی/ کھلی جگہ یا میدان', '', '', '', '', '71', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('280', '19', '20', 'F308N', 'RadioOptions', null, '3', 'Other (Specify)', 'دیگر وضاحت کریں', '', '', '', '', '96', '', 'F308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('281', '19', '20', 'F309', 'Radio', null, '0', 'Does the household have', 'کیا گھر میں یہ موجود ہے', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('282', '19', '20', 'F309A', 'RadioOptions', null, '0', 'Electricity', 'بجلی', '', '', '', '', '1', '', 'F309', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('283', '19', '20', 'F309B', 'RadioOptions', null, '0', 'Electric fan ', 'الیکٹرک پنکھا', '', '', '', '', '2', '', 'F309', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('284', '19', '20', 'F309C', 'RadioOptions', null, '0', 'Water pump ', 'واٹر پمپ ', '', '', '', '', '3', '', 'F309', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('285', '19', '20', 'F310', 'Radio', null, '1', 'ASK, OBSERVE AND RECORD ANIMALS THAT LIVE IN THE HOUSEHOLD', 'پوچھیں، دیکھیں اور نوٹ کریں کہ گھر میں کونسے جانور ہیں؟', '', '', '', '', '3', '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('286', '19', '20', 'F310A', 'RadioOptions', null, '1', 'Goats, cows, buffaloes', 'بکری، گائے، بھینس', '', '', '', '', '1', '', 'F310', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('287', '19', '20', 'F310B', 'RadioOptions', null, '1', 'Hen, chicken, ducks, geese', 'مرغا، مرغی، بطخ، ہنس', '', '', '', '', '2', '', 'F310', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('288', '19', '20', 'F311', 'Radio', null, '2', 'Do anyone (including you) smoke cigarette in the household', 'کیا آپکے گھر میں کوئی  سگریٹ  پیتا ہے؟', '', '', '', '', '2', '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('289', '19', '20', 'F311A', 'RadioOptions', null, '2', 'Yes', 'ہاں                     ', '', '', '', '', '1', '', 'F311', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('290', '19', '20', 'F311B', 'RadioOptions', null, '2', 'No', 'نہیں', '', '', '', '', '2', '', 'F311', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('291', '19', '20', 'F312', 'Radio', null, '3', 'How often does she/he smoke cigarette?', 'وہ سگریٹ کتنی مرتبا پیتے ہیں؟', '', '', '', '', '2', '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('292', '19', '20', 'F312A', 'RadioOptions', null, '3', '10 or more times every day', 'ہر روز 10 یا اس سے زیادہ مرتبہ  ', '', '', '', '', '1', '', 'F312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('293', '19', '20', 'F312B', 'RadioOptions', null, '3', 'Between 5-9 times every day', 'ہر روز 5-9 کے درمیان', '', '', '', '', '2', '', 'F312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('294', '19', '20', 'F312C', 'RadioOptions', null, '3', 'Between 1-4 times every day', 'ہر دن 1-4 کے درمیان', '', '', '', '', '3', '', 'F312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('295', '19', '20', 'F312D', 'RadioOptions', null, '3', 'More than once per week', 'فی ہفتہ ایک بار سے زیادہ', '', '', '', '', '4', '', 'F312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('296', '19', '20', 'F312E', 'RadioOptions', null, '3', 'At least once per week', 'کم سے کم ہفتے میں ایک بار', '', '', '', '', '5', '', 'F312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('297', '19', '20', 'F312F', 'RadioOptions', null, '3', 'Occasionally', 'کبھی کبھار', '', '', '', '', '6', '', 'F312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('298', '19', '20', 'F313', 'Radio', null, '4', 'Whether she/he smoke indoors? ', 'کیا وہ سگریٹ گھر کے اندر پیتے ہیں؟', '', '', '', '', '6', '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('299', '19', '20', 'F313A', 'RadioOptions', null, '4', 'Always', 'ہمیشہ', '', '', '', '', '1', '', 'F313', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('300', '19', '20', 'F313B', 'RadioOptions', null, '4', 'Mostly', 'زیادہ تر', '', '', '', '', '2', '', 'F313', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('301', '19', '20', 'F313C', 'RadioOptions', null, '4', 'Rarely', 'کبھی کبھار', '', '', '', '', '3', '', 'F313', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('302', '19', '20', 'F313D', 'RadioOptions', null, '4', 'Never', 'کبھی نہیں', '', '', '', '', '4', '', 'F313', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('303', '19', '20', 'F314', 'Radio', null, '0', 'What type of stove and fuel is most often used in the house for cooking?  [PLEASE OBSERVE STOVE AND CONFIRM RESPONSES]', 'گھر میں کھانا پکانے کے لئے کس قسم کا چولہا اور ایندھن کا استعمال کیا جاتا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('304', '19', '20', 'F314A', 'RadioOptions', null, '0', 'Gas stove using natural gas, LPG or LNG', 'قدرتی گیس والا چولہا، ایل پی جی یا ایل این جی', '', '', '', '', '11', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('305', '19', '20', 'F314B', 'RadioOptions', null, '0', 'Gas stove using bio-gas', 'بجلی سے چلنے والا چولہا', '', '', '', '', '12', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('306', '19', '20', 'F314C', 'RadioOptions', null, '0', 'Kerosene stove', 'کیروسین چولہا', '', '', '', '', '31', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('307', '19', '20', 'F314D', 'RadioOptions', null, '0', 'Traditional mud stove using traditional biomass fuel (firewood, tree residue, sawdust, straw, rice husk, jute/sugar cane sticks, other crop residue)', 'روایتی ایندھن کا استعمال کرتے ہوئے روایتی مٹی کا چولہا (لکڑی، درخت کے باقیات، تنکا، چاول کی شاک، جوٹ کی چھڑیوں، دیگر فصلوں کی باقیات', '', '', '', '', '41', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('308', '19', '20', 'F314E', 'RadioOptions', null, '0', 'Traditional mud stove using charcoal', 'کوئلے کا استعمال کرتے ہوئے روایتی چولہا', '', '', '', '', '42', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('309', '19', '20', 'F314F', 'RadioOptions', null, '0', 'Traditional mud stove  using animal residue', 'روایتی مٹی  کا چولہا جانوروں کی باقیات', '', '', '', '', '43', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('310', '19', '20', 'F314G', 'RadioOptions', null, '0', 'Improved mud stove', 'بہتر مٹی کا چولہا', '', '', '', '', '51', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('311', '19', '20', 'F314H', 'RadioOptions', null, '0', 'Other', 'دیگر', '', '', '', '', '96', '', 'F314', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('312', '19', '20', 'F315', 'Radio', null, '1', 'In which place in house is food most often cooked?  [PLEASE OBSERVE AND CONFIRM RESPONSES]', 'گھر میں کون سی جگہ کھانا پکتا ہے؟ [براہ کرم یقین دہانی کریں اور تصدیق کر کے جواب دیں]', '', '', '', '', '96', '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('313', '19', '20', 'F315A', 'RadioOptions', null, '1', 'In a room used for living or sleeping', '   رہنے اور سونے والے کمرے میں', '', '', '', '', '1', '', 'F315', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('314', '19', '20', 'F315B', 'RadioOptions', null, '1', 'In a separate room in same building used as kitchen', '  اسی عمارت کے علیحدہ کمرے کو باورچی خانے کے طور پر استعمال کیا جاتا ہے', '', '', '', '', '2', '', 'F315', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('315', '19', '20', 'F315C', 'RadioOptions', null, '1', 'In separate building used as kitchen', 'باورچی کھانا  دوسری عمارت میں ہے', '', '', '', '', '3', '', 'F315', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('316', '19', '20', 'F315D', 'RadioOptions', null, '1', 'In verandah', 'ورانڈا', '', '', '', '', '4', '', 'F315', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('317', '19', '20', 'F315E', 'RadioOptions', null, '1', 'Outdoors', 'باہر', '', '', '', '', '5', '', 'F315', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('318', '19', '20', 'F315F', 'RadioOptions', null, '1', 'Others', 'دیگر', '', '', '', '', '96', '', 'F315', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('319', '19', '20', 'F316', 'Radio', null, '0', 'If the stove is indoors, what type of ventilation is used for the stove?  [PLEASE OBSERVE STOVE AND CONFIRM RESPONSES]', 'اگر چولہا گھر کے اندر ہے تو، اُس کے لئے کس قسم کی وینٹیلیشن کا استعمال کیا جاتا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('320', '19', '20', 'F316A', 'RadioOptions', null, '0', 'Chimney', 'چمنی', '', '', '', '', '1', '', 'F316', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('321', '19', '20', 'F316B', 'RadioOptions', null, '0', 'Vents or fans next to stove', 'چولہے کے ساتھ وینٹ یا پنکھا ہے', '', '', '', '', '2', '', 'F316', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('322', '19', '20', 'F316C', 'RadioOptions', null, '0', 'Open window next to stove', 'آگے کھلی کھڑکی ہے', '', '', '', '', '3', '', 'F316', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('323', '19', '20', 'F316D', 'RadioOptions', null, '0', 'Other', 'دیگر', '', '', '', '', '4', '', 'F316', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('324', '19', '20', 'F316E', 'RadioOptions', null, '0', 'None', 'کوئی نہیں', '', '', '', '', '5', '', 'F316', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('325', '19', '20', 'F317', 'Radio', null, '0', 'When food is being cooked in the house where does the child usually stay? ', 'جب کھانا پکایا جاتا ہے تو عام طور پربچہ کہاں رہتا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('326', '19', '20', 'F317A', 'RadioOptions', null, '0', 'In the same place where food is being cooked', 'اسی جگہ میں جہاں کھانا پکایا جا رہا ہے', '', '', '', '', '1', '', 'F317', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('327', '19', '20', 'F317B', 'RadioOptions', null, '0', 'In the same room where food is being cooked', 'اسی کمرے میں جہاں کھانا پکایا جا رہا ہے', '', '', '', '', '2', '', 'F317', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('328', '19', '20', 'F317C', 'RadioOptions', null, '0', 'Elsewhere', 'دوسری جگہ', '', '', '', '', '3', '', 'F317', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('329', '20', '20', 'F401', 'Radio', null, '0', 'Did the child have any breathing complications or illness in the first one year of life?', 'کیا بچے کو پہلے سال میں کوئی سانس لینے والی پیچیدگی یا بیماری تھی؟', '', '', '', null, null, '501', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('330', '20', '20', 'F401A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F401', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('331', '20', '20', 'F401B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F401', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('332', '20', '20', 'F402', 'Radio', null, '1', 'What complications or illness did the child have?', 'بچے کو کس قسم کی  پیچیدگی یا بیماری تھی ؟', '', '', '', '', '2', '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('333', '20', '20', 'F402A', 'RadioOptions', null, '1', 'Cough', '	کھانسی', '', '', '', '', '1', '', 'F402', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('334', '20', '20', 'F402B', 'RadioOptions', null, '1', 'Cold/running nose', 'سرد / بہتی ہوئی ناک', '', '', '', '', '2', '', 'F402', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('335', '20', '20', 'F402C', 'RadioOptions', null, '1', 'Rapid/ difficult breathing', ' سانس لینے میں مشکل', '', '', '', '', '3', '', 'F402', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('336', '20', '20', 'F403', 'Radio', null, '0', 'Did you child seek any health care for the complication/illness?', 'کیا آپ نے کبھی اس بیماری یا مشکل کے لیے کسی ڈاکٹر کو دکھایا؟', '', '', '', null, null, '408', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('337', '20', '20', 'F403A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F403', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('338', '20', '20', 'F403B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F403', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('339', '20', '20', 'F404', 'Radio', null, '0', 'Where did your child receive the care from [indicate the medically trained provider in 6.08] for the child? ', 'آپ نے بچے کو کہاں دکھایا تھا؟  [تربیت یافتہ طب کا جواب سوال نمبر6.08 میں دیں]', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('340', '20', '20', 'F404A', 'RadioOptions', null, '0', 'Hospital [use local description]', 'ہسپتال [مقامی وضاحت کریں]', '', '', '', '', '1', '', 'F404', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('341', '20', '20', 'F404B', 'RadioOptions', null, '0', '1st level facility', 'پہلی سطح کی سہولت', '', '', '', '', '2', '', 'F404', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('342', '20', '20', 'F404C', 'RadioOptions', null, '0', 'Outreach/Satellite', 'آؤٹ ریچ / سیٹلائٹ', '', '', '', '', '3', '', 'F404', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('343', '20', '20', 'F405', 'Radio', null, '0', 'Was the child admitted to the hospital?', 'کیا بچا ہسپتال میں داخل ہوا تھا؟', '', '', '', null, null, '408', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('344', '20', '20', 'F405A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '408', 'F405', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('345', '20', '20', 'F405B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '408', 'F405', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('346', '20', '20', 'F405C', 'RadioOptions', null, '0', 'Don\'t know', 'نہیں معلوم', '', '', '', '', '8', '408', 'F405', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('347', '20', '20', 'F406', 'Input', null, '0', 'On what date was the child admitted to the hospital?', 'کونسی تاریخ کوبچہ ہسپتال میں داخل ہوا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('348', '20', '20', 'F407', 'Input', null, '0', 'How many days did the child stay in the hospital?', 'بچا کتنے دن ہسپتال میں رہا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('349', '20', '20', 'F408', 'Radio', null, '0', 'Has the child received any medicine at home?', 'کیا بچے نے گھر میں کسی دوا کا استعمال کیا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('350', '20', '20', 'F408A', 'RadioOptions', null, '0', 'Yes', 'ہاں                 ', '', '', '', '', '1', '', 'F408', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('351', '20', '20', 'F408B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F408', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('352', '20', '20', 'F408C', 'RadioOptions', null, '0', 'Don\'t know', 'نہیں معلوم', '', '', '', '', '8', '', 'F408', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('353', '21', '20', 'F501', 'Radio', null, '0', 'Has the child ever had an itchy rash, which was coming and going for at least 12 months?', 'کیا بچے کو خارش کے ساتھ جلد پر ریش تھے جو کم سے کم 12 ماہ تک آتے جاتے رہے ؟', '', '', '', null, null, '507', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('354', '21', '20', 'F501A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '507', 'F501', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('355', '21', '20', 'F501B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '507', 'F501', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('356', '21', '20', 'F501C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '8', '507', 'F501', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('357', '21', '20', 'F502', 'Radio', null, '0', 'Has the child had this itchy rash at any time in the past 12 months?', 'کیا پچھلے 12 مہینے کے دوران بچے کو خارش کے ساتھ جلد پر ریش ہوئے ہیں؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('358', '21', '20', 'F502A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F502', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('359', '21', '20', 'F502B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F502', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('360', '21', '20', 'F502C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '8', '', 'F502', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('361', '21', '20', 'F503', 'Radio', null, '0', 'Has this itchy rash at any time affected any of the following places: the folds of the elbows, behind the knees, in front of the ankles, under the buttocks, or around the neck, ears, or eyes?', 'کیا یہ جلد پر خارش کے ساتھ ریش سے جسم کے یہ حصے متاثرہوئے تھے: کہنیوں کے تہہ ، گھٹنوں کے پیچھے ، ٹخنوں کے سامنے ، کولہوں کے نیچے ، یا گردن ، کان یا آنکھوں کے گرد؟ ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('362', '21', '20', 'F503A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F503', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('363', '21', '20', 'F503B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F503', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('364', '21', '20', 'F503C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '8', '', 'F503', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('365', '21', '20', 'F504', 'Input', null, '0', 'At what age did this itchy rash first occur?', 'پہلی مرتبہ کس عمر میں یہ خارش کے ساتھ ریش ہوئے تھے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('366', '21', '20', 'F505', 'Radio', null, '0', 'Has the rash cleared completely at any time during the past 12 months?', 'کیا پچھلے 12 مہینے کے دوران یہ خارش کے ساتھ ریش پوری طرح صاف ہوگئے تھے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('367', '21', '20', 'F505A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F505', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('368', '21', '20', 'F505B', 'RadioOptions', null, '0', 'No', ' نہیں', '', '', '', '', '2', '', 'F505', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('369', '21', '20', 'F505C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '8', '', 'F505', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('370', '21', '20', 'F506', 'Radio', null, '0', 'In the past 12 months, how often on average, has your child been kept awake at night by this itchy rash?', 'پچھلے 12 مہینوں میں ، کتنی مرتبہ، آپ کا بچا رات کے وقت خارش کی وجہ سے جاگ گیا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('371', '21', '20', 'F506A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں', '', '', '', '', '1', '', 'F506', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('372', '21', '20', 'F506B', 'RadioOptions', null, '0', '1-2 times', ' 1۔2 مرتبہ ', '', '', '', '', '2', '', 'F506', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('373', '21', '20', 'F506C', 'RadioOptions', null, '0', '3-5 times', '3۔5 مرتبہ ', '', '', '', '', '3', '', 'F506', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('374', '21', '20', 'F506D', 'RadioOptions', null, '0', '>5 times', '5 سے زائد مرتبہ', '', '', '', '', '4', '', 'F506', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('375', '21', '20', 'F507', 'Radio', null, '0', 'Has your child ever had eczema?', 'کیا آپکے بچے کو کبھی ایکزیما ہوا تھا؟', '', '', '', null, null, '601', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('376', '21', '20', 'F507A', 'RadioOptions', null, '0', 'Yes', 'ہاں             ', '', '', '', '', '1', '601', 'F507', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('377', '21', '20', 'F507B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '601', 'F507', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('378', '21', '20', 'F507C', 'RadioOptions', null, '0', 'Don\'t know', ' پتہ نہیں', '', '', '', '', '8', '601', 'F507', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('379', '21', '20', 'F508', 'Radio', null, '0', 'In last 12 months has  your child had Eczema', 'گزشتہ 12 مہینوں کے دوران آپ کے بچے کو ایکزیما ہوا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('380', '21', '20', 'F508A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F508', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('381', '21', '20', 'F508B', 'RadioOptions', null, '0', 'No', ' نہیں', '', '', '', '', '2', '', 'F508', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('382', '21', '20', 'F508C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '8', '', 'F508', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('384', '19', '20', 'F309A1', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F309A1', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('385', '19', '20', 'F309A2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F309A1', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('387', '19', '20', 'F309B1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'F309B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('388', '19', '20', 'F309B2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F309B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('389', '22', '20', 'F601', 'Radio', null, '0', 'Has the child ever had wheezing (a whistling noise from the chest) in the chest at any time in the past?', 'کیا ماضی میں کسی بھی وقت بچے کے سینے میں گھرگھراہٹ (سینے سے سیٹی کی آواز) آئی ہے؟', '', '', '', null, null, '607', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('390', '22', '20', 'F601A', 'RadioOptions', null, '0', 'Yes', 'ہاں             ', '', '', '', '', '1', '607', 'F601', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('391', '22', '20', 'F601B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '607', 'F601', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('392', '22', '20', 'F601C', 'RadioOptions', null, '0', 'Don\'t know', ' پتہ نہیں', '', '', '', '', '8', '607', 'F601', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('393', '22', '20', 'F602', 'Radio', null, '0', 'Has the child had wheezing (a whistling noise from the chest) in the chest at any time in the past 12 months?', 'کیا پچھلے 12 مہینوں میں کسی بھی وقت سینے میں گھرگھراہٹ (سینے سے سیٹی کی آواز)آئی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('394', '22', '20', 'F602A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F602', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('395', '22', '20', 'F602B', 'RadioOptions', null, '0', 'No', ' نہیں', '', '', '', '', '2', '', 'F602', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('396', '22', '20', 'F602C', 'RadioOptions', null, '0', 'پتہ نہیں', 'Don\'t know', '', '', '', '', '8', '', 'F602', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('397', '22', '20', 'F603', 'Input', null, '0', 'How many attacks of wheezing (a whistling noise from the chest) has had in the past 12 months?', 'پچھلے 12 مہینوں میں گھرگھراہٹ (سینے سے سیٹی کی آواز) کے کتنے واقعات ہوئے ہیں؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('398', '22', '20', 'F604', 'Radio', null, '0', 'In the past 12 months, how often has sleep been disturbed due to wheezing (a whistling noise from the chest)', 'پچھلے 12 مہینوں میں ، گھرگھراہٹ (سینے سے سیٹی کی آواز) کی وجہ سے کتنی بار نیند خراب ہوئی ہے', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('399', '22', '20', 'F604A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں', '', '', '', '', '1', '', 'F604', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('400', '22', '20', 'F604B', 'RadioOptions', null, '0', 'Less than one night per week', 'ہفتے میں ایک رات سے کم', '', '', '', '', '2', '', 'F604', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('401', '22', '20', 'F604C', 'RadioOptions', null, '0', 'One or more nights per week', 'ہفتے میں ایک یا زیادہ راتیں', '', '', '', '', '3', '', 'F604', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('402', '22', '20', 'F605', 'Radio', null, '0', 'In the past 12 months, how often, has sleep been disturbed due to cough during the night when your child appears well otherwise (i.e. no cold or chest infection)', 'پچھلے 12 مہینوں میں ، رات میں کھانسی کی وجہ سے کتنی بار نیند میں خلل پڑا ہے ، جب آپ کا بچہ ٹھیک ظاہر ہوتا ہے (یعنی کوئی زُکام یا سینے میں انفکشن نہیں ہوتا ہے)', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('403', '22', '20', 'F605A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں', '', '', '', '', '1', '', 'F605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('404', '22', '20', 'F605B', 'RadioOptions', null, '0', 'Less than one night per week', 'ہفتے میں ایک رات سے کم', '', '', '', '', '2', '', 'F605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('405', '22', '20', 'F605C', 'RadioOptions', null, '0', 'One or more nights per week', 'ہفتے میں ایک یا زیادہ راتیں', '', '', '', '', '3', '', 'F605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('406', '22', '20', 'F606', 'Radio', null, '0', 'In the past 12 months, has wheezing ever been severe enough to limit speech or cries to only one or two words or cries at a time between breaths?', 'پچھلے 12 مہینوں میں ، گھرگھراھٹ کبھی اتنی شدید ہوئی کہ بولنے یا رونے کی آواز کو محدود کردے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('407', '22', '20', 'F606A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '', 'F606', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('408', '22', '20', 'F606B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'F606', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('409', '22', '20', 'F606C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '8', '', 'F606', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('410', '22', '20', 'F607', 'Radio', null, '0', 'Has the child ever had a diagnosis of asthma?', 'کیا کبھی بچے کو دمہ کی تشخیص ہوئی ہے؟', '', '', '', null, null, '609', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('411', '22', '20', 'F607A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', '609', 'F607', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('412', '22', '20', 'F607B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '609', 'F607', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('413', '22', '20', 'F607C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '8', '609', 'F607', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('414', '23', '21', 'G111', 'Input', null, '0', 'Mother\'s Current ID', 'ماں کا موجودہ شناختی آئی ڈی ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('415', '23', '21', 'G112', 'Input', null, '0', 'Mother\'s Permanent ID', 'آئی ڈی ماں کا مستقل شناختی', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('416', '23', '21', 'G113', 'Input', null, '0', 'Child’s Name', 'بچے کا نام', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('417', '23', '21', 'G114', 'Input', null, '0', 'Mother\'s Name', 'ماں کا نام', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('418', '23', '21', 'G115', 'Input', null, '0', 'Father\'s Name', 'والد کا نام ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('419', '23', '21', 'G116', 'Input', null, '0', 'Household Head’s Name', 'گھر کے سربراہ کا نام', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('420', '23', '21', 'G117', 'Input', null, '0', 'CHW\'s Name & Code', ' کا نام اور کوڈ CHW ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('421', '23', '21', 'G118', 'Input', null, '0', 'Date of Visit', 'وِزِٹ کی تاریخ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('422', '24', '21', 'G201', 'Radio', null, '0', 'Has the child had this itchy rash at any time in the past 6 months?', 'کیا پچھلے 6مہینے کے دوران بچے کو خارش کے ساتھ جلد پر سُرخ داغ یا دانے ہوئے ہیں؟ ', '', '', '', null, null, '301', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('423', '24', '21', 'G201A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '301', 'G201', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('424', '24', '21', 'G201B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '301', 'G201', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('425', '24', '21', 'G201C', 'RadioOptions', null, '0', 'Don\'t know', 'پتہ نہیں', '', '', '', '', '98', '301', 'G201', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('426', '24', '21', 'G202', 'Radio', null, '0', 'Has this itchy rash affected any of the following places: the folds of the elbows, behind the knees, in front of the ankles, under the buttocks, or around the neck, ears, or eyes?', 'کیا یہ جلد پر خارش کے ساتھ سُرخ داغ یا دانے سے جسم کے یہ حصے متاثرہوئے تھے: کہنیوں کے تہہ ، گھٹنوں کے پیچھے ، ٹخنوں کے سامنے ، کولہوں کے نیچے ، یا گردن ، کان یا آنکھوں کے گرد؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('427', '24', '21', 'G202A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('428', '24', '21', 'G202B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('429', '24', '21', 'G202C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G202', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('430', '24', '21', 'G203', 'Radio', null, '0', 'Has the rash cleared completely at any time during the past 6 months?', 'کیا پچھلے 6 مہینے کے دوران یہ خارش کے ساتھ سُرخ داغ یا دانے پوری طرح صاف ہوگئے تھے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('431', '24', '21', 'G203A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('432', '24', '21', 'G203B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('433', '24', '21', 'G203C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G203', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('434', '24', '21', 'G204', 'Radio', null, '0', 'In the past 6 months, how often on average, has your child been kept awake at night by this itchy rash?', 'پچھلے 6 مہینوں میں ، کتنی مرتبہ، آپ کا بچا  رات کے وقت جلد پر خارش کی وجہ سے جاگ گیا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('435', '24', '21', 'G204A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں ', '', '', '', '', '1', '', 'G204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('436', '24', '21', 'G204B', 'RadioOptions', null, '0', '1-2 times', '1۔2 مرتبہ ', '', '', '', '', '2', '', 'G204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('437', '24', '21', 'G204C', 'RadioOptions', null, '0', '3-5 times', '3۔5 مرتبہ ', '', '', '', '', '3', '', 'G204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('438', '24', '21', 'G204D', 'RadioOptions', null, '0', '>5 times', '5 سے زائد مرتبہ', '', '', '', '', '4', '', 'G204', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('439', '24', '21', 'G205', 'Radio', null, '0', 'Has your child had eczema in last 6 months?', 'کیا آپکے بچے کو کبھی ایکزیما (خارش کے ساتھ سُرخ داغ یا دانے) ہوا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('440', '24', '21', 'G205A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G205', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('441', '24', '21', 'G205B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G205', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('442', '24', '21', 'G205C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G205', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('443', '25', '21', 'G301', 'Radio', null, '0', 'Has the child had wheezing (a whistling noise from the chest) in the chest at any time in the past 6 months?', 'کیا پچھلے 6 مہینوں میں کسی بھی وقت سینے میں گھرگھراہٹ (سینے سے سیٹی کی آواز)آئی ہے؟', '', '', '', null, null, '306', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('444', '25', '21', 'G301A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '306', 'G301', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('445', '25', '21', 'G301B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '306', 'G301', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('446', '25', '21', 'G301C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '306', 'G301', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('447', '25', '21', 'G302', 'Input', null, '0', 'How many attacks of wheezing (a whistling noise from the chest) has had in the past 6 months?', 'پچھلے 6 مہینوں میں گھرگھراہٹ (سینے سے سیٹی کی آواز) کے کتنے واقعات ہوئے ہیں؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('448', '25', '21', 'G303', 'Radio', null, '0', 'In the past 6 months, how often has sleep been disturbed due to wheezing (a whistling noise from the chest)', 'پچھلے 6 مہینوں میں ، گھرگھراہٹ (سینے سے سیٹی کی آواز) کی وجہ سے کتنی بار نیند خراب ہوئی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('449', '25', '21', 'G303A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں ', '', '', '', '', '1', '', 'G303', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('450', '25', '21', 'G303B', 'RadioOptions', null, '0', 'Less than one night per week ', 'فی ہفتہ ایک رات سے کم ', '', '', '', '', '2', '', 'G303', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('451', '25', '21', 'G303C', 'RadioOptions', null, '0', 'One or more nights per week ', 'فی ہفتہ ایک یا زیادہ راتیں ', '', '', '', '', '3', '', 'G303', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('452', '25', '21', 'G304', 'Radio', null, '0', 'In the past 6 months, how often, has sleep been disturbed due to cough during the night when your child appears well otherwise (i.e. no cold or chest infection) ', 'پچھلے 6 مہینوں میں ، رات میں کھانسی کی وجہ سے کتنی بار نیند میں خلل پڑا ہے ، جب آپ کا بچہ ٹھیک ظاہر ہوتا ہے (یعنی کوئی زُکام یا سینے میں انفکشن نہیں ہوتا ہے)', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('453', '25', '21', 'G304A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں ', '', '', '', '', '1', '', 'G304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('454', '25', '21', 'G304B', 'RadioOptions', null, '0', 'Less than one night per week ', 'فی ہفتہ ایک رات سے کم ', '', '', '', '', '2', '', 'G304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('455', '25', '21', 'G304C', 'RadioOptions', null, '0', 'One or more nights per week ', 'فی ہفتہ ایک یا زیادہ راتیں ', '', '', '', '', '3', '', 'G304', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('456', '25', '21', 'G305', 'Radio', null, '0', 'In the past 6 months, has wheezing ever been severe enough to limit speech or cries to only one or two words or cries at a time between breaths?', 'پچھلے 6 مہینوں میں ، گھرگھاہٹ کبھی اتنی شدید ہوئی تھی کہ سانس کے بیچھ میں صرف ایک یا دو الفاظ تک یا رونے کی آواز کو محدود کردے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('457', '25', '21', 'G305A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('458', '25', '21', 'G305B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('459', '25', '21', 'G305C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G305', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('460', '25', '21', 'G306', 'Radio', null, '0', 'Has the child had a diagnosis of asthma in last 6 months?', 'کیا پچھلے 6 ماہ میں بچے کو دمہ کی تشخیص ہوئی ہے؟', '', '', '', null, null, 'G308', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('461', '25', '21', 'G306A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', 'G308', 'G306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('462', '25', '21', 'G306B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', 'G308', 'G306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('463', '25', '21', 'G306C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', 'G308', 'G306', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('464', '25', '21', 'G307', 'Radio', null, '0', 'Who gave the diagnosis of asthma', 'کیا پچھلے 6 ماہ میں بچے کو دمہ کی تشخیص ہوئی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('465', '25', '21', 'G307A', 'RadioOptions', null, '0', 'Doctor', 'ڈاکٹر', '', '', '', '', '1', '', 'G307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('466', '25', '21', 'G307B', 'RadioOptions', null, '0', 'Paramedics', 'پیرا میڈیک', '', '', '', '', '2', '', 'G307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('467', '25', '21', 'G307C', 'RadioOptions', null, '0', 'Nurse', 'نرس', '', '', '', '', '3', '', 'G307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('468', '25', '21', 'G307D', 'RadioOptions', null, '0', 'Others Specify', 'کوئی اور؟    (وضاحت کریں)', '', '', '', '', '96', '', 'G307', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('469', '25', '21', 'G308', 'Radio', null, '0', 'In the past 6 months, has your child had a dry cough or wheeze (a whistling noise from the chest) during or after exercise?', 'پچھلے 6 مہینوں میں ، کیا آپ کے بچے کو ورزش کے دوران یا اس کے بعد خشک کھانسی ہوئی ہے (سینے سے سیٹی کی آواز) آئی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('470', '25', '21', 'G308A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('471', '25', '21', 'G308B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('472', '25', '21', 'G308C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G308', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('473', '25', '21', 'G309', 'Radio', null, '0', 'In the past 6 months, has the child had a dry cough at night, apart from a cough associated with a cold or chest infection?', 'پچھلے 6 مہینوں میں ، کیا اس سردی یا سینے میں انفیکشن سے وابستہ کھانسی کے علاوہ بھی ، بچے کو رات کو خشک کھانسی ہوئی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('474', '25', '21', 'G309A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G309', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('475', '25', '21', 'G309B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G309', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('476', '25', '21', 'G309C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G309', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('477', '25', '21', 'G310', 'Radio', null, '0', 'How many times your child had visited the healthcare facilities for asthma and breathing difficulties In last six month?', 'پچھلے چھ ماہ میں ، آپ کے بچے نے دمہ اور سانس لینے میں دشواریوں کے سبب کتنی بار صحت کی سہولیات کا دورہ کیا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('478', '25', '21', 'G310A', 'RadioOptions', null, '0', 'Number of medical visit', 'طبی دورے کی تعداد', '', '', '', '', '1', '', 'G310', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('479', '25', '21', 'G310B', 'RadioOptions', null, '0', 'Don\'t Know', 'نہیں معلوم ', '', '', '', '', '98', '', 'G310', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('480', '25', '21', 'G311', 'Input', null, '0', 'When the last time your child visited the healthcare centre for asthma or breathing difficulties', 'دمہ یا سانس لینے میں دشواریوں کے سبب آپ کے بچے نے آخری بار ہیلتھ کیر سنٹر کا دورہ کب کیا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('481', '25', '21', 'G312', 'Radio', null, '0', 'Has any medication used to control the symptoms?', 'کیا علامات کو کنٹرول کرنے کے لئے کسی دوا کا استعمال کیا ہے؟', '', '', '', null, null, 'G401', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('482', '25', '21', 'G312A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('483', '25', '21', 'G312B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('484', '25', '21', 'G312C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G312', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('485', '25', '21', 'G313', 'Input', null, '0', 'Drug used for to control asthma', 'دمہ کو کنٹرول کرنے کے لئے استعمال ہونے والی دوائیں', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('486', '26', '21', 'G401', 'Radio', null, '0', 'In the past 6 months, has the child had a problem with sneezing, or a runny, or blocked nose when she/he DID NOT have a cold or the flu?', 'پچھلے 6 مہینوں میں، جب سردی یا زُکام نہیں تھا ، تو بچے کو چھینکنے ، یا ناک بند ہونے سے کتنی بار مسئلہ ہوا؟', '', '', '', null, null, 'G405', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('487', '26', '21', 'G401A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں', '', '', '', '', '1', 'G405', 'G401', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('488', '26', '21', 'G401B', 'RadioOptions', null, '0', '1-2 times', '1۔2 مرتبہ', '', '', '', '', '2', 'G405', 'G401', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('489', '26', '21', 'G401C', 'RadioOptions', null, '0', '3-5 times', '3۔5 مرتبہ ', '', '', '', '', '3', 'G405', 'G401', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('490', '26', '21', 'G401D', 'RadioOptions', null, '0', '> 5 times', '5 سے زائد مرتبہ', '', '', '', '', '4', 'G405', 'G401', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('491', '26', '21', 'G402', 'Radio', null, '0', 'In the past 6 months, has this nose problem been accompanied by itchy-watery eyes? ', 'پچھلے 12 مہینوں میں، کیا ناک کی تکلیف کے ساتھ آنکھوں میں خارش ہوئی تھی؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('492', '26', '21', 'G402A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G402', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('493', '26', '21', 'G402B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G402', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('494', '26', '21', 'G402C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G402', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('495', '26', '21', 'G403', 'Input', null, '0', 'In which of the past 6 months did this nose problem occur? Please write all that apply', 'پچھلے 6 ماہ کے دوران کن مہینوں میں ناک کی تکلیف ہوئی؟ ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('496', '26', '21', 'G404', 'Radio', null, '0', 'In the past 6 months, how much did this nose problem interfere with daily activities of your child?', 'پچھلے 6 مہینوں میں ، ناک کی اس پریشانی نے آپ کے بچے کی روز مرہ کی سرگرمیوں میں کتنا مداخلت کی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('497', '26', '21', 'G404A', 'RadioOptions', null, '0', 'No disturbances', 'کوئی پریشانی نہیں ', '', '', '', '', '1', '', 'G404', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('498', '26', '21', 'G404B', 'RadioOptions', null, '0', 'Minimum disturbances', 'کم سے کم پریشانی', '', '', '', '', '2', '', 'G404', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('499', '26', '21', 'G404C', 'RadioOptions', null, '0', 'Moderate disturbances', 'درمیانی پریشانی', '', '', '', '', '3', '', 'G404', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('500', '26', '21', 'G404D', 'RadioOptions', null, '0', 'Severe disturbances', 'شدید پریشانی', '', '', '', '', '4', '', '496', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('501', '26', '21', 'G405', 'Radio', null, '0', 'In last 6 months has the child had hay fever?', 'کیا پچھلے 6 مہینے میں بچے کو بخار ہوا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('502', '26', '21', 'G405A', 'RadioOptions', null, '0', 'Yes', 'ہاں ', '', '', '', '', '1', '', 'G405', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('503', '26', '21', 'G405B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G405', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('504', '26', '21', 'G405C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G405', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('505', '27', '21', 'G501', 'Radio', null, '0', 'In last 6 months does the mother had', 'کیا ماں کو کبھی یہ مسائل ہوئے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('506', '27', '21', 'G501A', 'Radio', null, '0', 'Asthma', 'دمہ', '', '', '', null, null, '', 'G501', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('507', '27', '21', 'G501A1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G501A', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('508', '27', '21', 'G501A2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G501A', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('509', '27', '21', 'G501B', 'Radio', null, '0', 'Allergic rhinitis', 'رائینایٹس    (ناک کی سوزش)', '', '', '', null, null, '', 'G501', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('510', '27', '21', 'G501B1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G501B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('511', '27', '21', 'G501B2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G501B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('512', '27', '21', 'G501C', 'Radio', null, '0', 'Eczema', 'ایکزیما          (جلد پر سُرخ داغ اور خارش)', '', '', '', null, null, '', 'G501', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('513', '27', '21', 'G501C1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G501C', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('514', '27', '21', 'G501C2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G501C', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('515', '27', '21', 'G502', 'Radio', null, '0', 'In last 6 months does the father ever had', 'کیا والد کو کبھی یہ مسائل ہوئے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('516', '27', '21', 'G502A', 'Radio', null, '0', 'Asthma', 'دمہ', '', '', '', null, null, '', 'G502', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('517', '27', '21', 'G502A1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G502A', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('518', '27', '21', 'G502A2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G502A', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('519', '27', '21', 'G502B', 'Radio', null, '0', 'Allergic rhinitis', 'رائینایٹس    (ناک کی سوزش)', '', '', '', null, null, '', 'G502', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('520', '27', '21', 'G502B1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G502B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('521', '27', '21', 'G502B2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G502B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('522', '27', '21', 'G502C', 'Radio', null, '0', 'Eczema', 'ایکزیما          (جلد پر سُرخ داغ اور خارش)', '', '', '', null, null, '', 'G502', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('523', '27', '21', 'G502C1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G502C', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('524', '27', '21', 'G502C2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G502C', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('525', '28', '21', 'G601', 'Radio', null, '0', 'In last 6 months which of the item increase the breathing difficulties of your child', 'اِن میں سے کِن چیزوں کی وجہ سے آپکے بچے کو سانس لینے کی مشکلات میں مذید اضافہ ہوتا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('526', '28', '21', 'G601', 'Radio', null, '0', 'In last 6 months which of the item increase the breathing difficulties of your child', 'اِن میں سے کِن چیزوں کی وجہ سے آپکے بچے کو سانس لینے کی مشکلات میں مذید اضافہ ہوتا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('527', '28', '21', 'G601A', 'Radio', null, '1', 'Exercise', 'ورزش', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('528', '28', '21', 'G601A1', 'RadioOptions', null, '1', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601A', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('529', '28', '21', 'G601A2', 'RadioOptions', null, '1', 'No', 'نہیں', '', '', '', '', '2', '', 'G601A', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('530', '28', '21', 'G601A3', 'RadioOptions', null, '1', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601A', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('531', '28', '21', 'G601B', 'Radio', null, '0', 'Infection', 'انفیکشن', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('532', '28', '21', 'G601B1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('533', '28', '21', 'G601B2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('534', '28', '21', 'G601B3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601B', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('535', '28', '21', 'G601C', 'Radio', null, '0', 'Emotion (crying/laughing)', 'جذبات۔ (رونا / ہنسنا)', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('536', '28', '21', 'G601C1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601C', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('537', '28', '21', 'G601C2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601C', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('538', '28', '21', 'G601C3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601C', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('539', '28', '21', 'G601D', 'Radio', null, '0', 'Season/weather', 'سیزن / موسم', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('540', '28', '21', 'G601D1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601D', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('541', '28', '21', 'G601D2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601D', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('542', '28', '21', 'G601D3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601D', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('543', '28', '21', 'G601E', 'Radio', null, '0', 'Smoke', 'دھواں', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('544', '28', '21', 'G601D1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601E', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('545', '28', '21', 'G601D2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601E', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('546', '28', '21', 'G601D3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601E', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('547', '28', '21', 'G601F', 'Radio', null, '0', 'Environmental Dust', 'ماحولیاتی آلودگی', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('548', '28', '21', 'G601F1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601F', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('549', '28', '21', 'G601F2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601F', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('550', '28', '21', 'G601F3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601F', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('551', '28', '21', 'G601G', 'Radio', null, '0', 'Household dust', 'گھریلو دھول', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('552', '28', '21', 'G601G1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601G', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('553', '28', '21', 'G601G2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601G', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('554', '28', '21', 'G601G3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601G', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('555', '28', '21', 'G601H', 'Radio', null, '0', 'Cold weather', 'سرد موسم', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('556', '28', '21', 'G601H1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601H', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('557', '28', '21', 'G601H2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601H', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('558', '28', '21', 'G601H3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601H', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('559', '28', '21', 'G601I', 'Radio', null, '0', 'Pollen', 'جرگ (پولن)', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('560', '28', '21', 'G601I1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601I', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('561', '28', '21', 'G601I2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601I', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('562', '28', '21', 'G601I3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601I', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('563', '28', '21', 'G601J', 'Radio', null, '0', 'Feather', 'پنکھ / پَر', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('564', '28', '21', 'G601J1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601J', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('565', '28', '21', 'G601J2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601J', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('566', '28', '21', 'G601J3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601J', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('567', '28', '21', 'G601K', 'Radio', null, '0', 'Grass', 'گھاس', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('568', '28', '21', 'G601K1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601K', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('569', '28', '21', 'G601K2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601K', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('570', '28', '21', 'G601K3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601K', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('571', '28', '21', 'G601L', 'Radio', null, '0', 'Others', 'کچھ اور', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('572', '28', '21', 'G601L1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601L', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('573', '28', '21', 'G601L2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601L', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('574', '28', '21', 'G601L3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601L', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('575', '28', '21', 'G601E', 'Radio', null, '0', 'Smoke', 'دھواں', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('576', '28', '21', 'G601E1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G601E', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('577', '28', '21', 'G601E2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G601E', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('578', '28', '21', 'G601E3', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', '', 'G601E', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('579', '28', '21', 'G602', 'Radio', null, '0', 'In last 6 months does your child have any food allergy', 'کیا پچھلے 6 مہینوں میں آپ کے بچے کو کسی غذا سے الرجی ہوئی ہے؟', '', '', '', null, null, 'G604', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('580', '28', '21', 'G602A', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', 'G604', 'G602', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('581', '28', '21', 'G602B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', 'G604', 'G602', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('582', '28', '21', 'G602C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', 'G604', 'G602', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('583', '28', '21', 'G603', 'Input', null, '0', 'In last 6 months which food your child has allergy.', 'آپ کے بچے کو پچھلے 6 ماہ میں کون سی غذا سے الرجی ہوئی؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('584', '28', '21', 'G604', 'Radio', null, '0', 'Has  your child had Eczema in last six months', 'کیا آپ کے بچے کو پچھلے چھ مہینوں میں ایکزیما ہوا ہے؟ (جلد پر سُرخ داغ اور خارش)', '', '', '', null, null, 'G701', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('585', '28', '21', 'G604A', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', 'G701', 'G604', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('586', '28', '21', 'G604B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', 'G701', 'G604', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('587', '28', '21', 'G604C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', 'G701', 'G604', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('588', '28', '21', 'G605', 'Radio', null, '0', 'Where the eczema was found', 'ایکزیما کس جگہ ہوا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('589', '28', '21', 'G605A', 'RadioOptions', null, '0', 'Face', 'چہرہ', '', '', '', '', '1', '', 'G605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('590', '28', '21', 'G605B', 'RadioOptions', null, '0', 'Neck', 'گردن', '', '', '', '', '2', '', 'G605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('591', '28', '21', 'G605C', 'RadioOptions', null, '0', 'Elbows', 'کوہنیوں', '', '', '', '', '3', '', 'G605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('592', '28', '21', 'G605D', 'RadioOptions', null, '0', 'Wrests', 'کلائی', '', '', '', '', '4', '', 'G605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('593', '28', '21', 'G605E', 'RadioOptions', null, '0', 'Groins', 'کرب', '', '', '', '', '5', '', 'G605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('594', '28', '21', 'G605F', 'RadioOptions', null, '0', 'Knees', 'گھٹنوں', '', '', '', '', '6', '', 'G605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('595', '28', '21', 'G605G', 'RadioOptions', null, '0', 'Ankles', 'ٹخنوں', '', '', '', '', '7', '', 'G605', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('596', '29', '21', 'G701', 'Radio', null, '0', 'End of the interview', 'انٹرویو کا اختتام ہوگیا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('597', '29', '21', 'G701A', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G701', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('598', '29', '21', 'G702', 'Radio', null, '0', '[Visit  Outcome]', 'دورے کا نتیجہ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('599', '29', '21', 'G702A', 'RadioOptions', null, '0', 'Completed', 'مکمل ', '', '', '', '', '1', '', 'G702', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('600', '29', '21', 'G702B', 'RadioOptions', null, '0', 'Incompleted', 'نامکمل', '', '', '', '', '2', '', 'G702', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('601', '29', '21', 'G703', 'Radio', null, '0', 'Could the caregiver show the health card?', 'کیا ہیلتھ کا خیال رکھنے والے نے ہیلتھ کارڈ دکھایا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('602', '29', '21', 'G703A', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', '', 'G703', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('603', '29', '21', 'G703B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', '', 'G703', null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('604', '29', '21', 'G704', 'Input', null, '0', 'Next visit date', 'اگلے دورے کی تاریخ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('605', '29', '21', 'G705', 'Input', null, '0', 'Interviewer’s name:', 'انٹرویو لینے والے کا نام درج کریں:', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('606', '22', '20', 'F608', 'Radio', null, '0', 'Who gave the diagnosis of asthma ?', 'دمہ کی تشخیص کس نے کی؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('607', '22', '20', 'F608A', 'RadioOptions', null, '0', 'Doctor', 'ڈاکٹر', '', '', '', '', '1', null, 'F608', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('608', '22', '20', 'F608B', 'RadioOptions', null, '0', 'Paramedics', 'پیرا میڈیک', '', '', '', '', '2', null, 'F608', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('609', '22', '20', 'F608C', 'RadioOptions', null, '0', 'Nurse', 'نرس', '', '', '', '', '3', null, 'F608', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('610', '22', '20', 'F608D', 'RadioOptions', null, '0', 'Others Specify', 'کوئی اور؟ وضاحت کریں', '', '', '', '', '96', null, 'F608', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('611', '22', '20', 'F609', 'Radio', null, '0', 'In the past 12 months, has your child had a dry cough or wheeze (a whistling noise from the chest) during or after exercise?', 'پچھلے 12 مہینوں میں ، کیا آپ کے بچے کو ورزش کے دوران یا اس کے بعد خشک کھانسی ہوئی ہے (سینے سے سیٹی کی آواز) آئی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('612', '22', '20', 'F609A', 'RadioOptions', null, '0', 'Yes', 'ہاں             ', '', '', '', '', '1', null, 'F609', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('613', '22', '20', 'F609B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F609', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('614', '22', '20', 'F609C', 'RadioOptions', null, '0', 'Don\'t Know', ' پتہ نہیں', '', '', '', '', '98', null, 'F609', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('615', '22', '20', 'F610', 'Radio', null, '0', 'In the past 12 months, has the child had a dry cough at night, apart from a cough associated with a cold or chest infection?', 'پچھلے 12 مہینوں میں ، کیا اس سردی یا سینے میں انفیکشن سے وابستہ کھانسی کے علاوہ بھی ، بچے کو رات کو خشک کھانسی ہوئی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('616', '22', '20', 'F610A', 'RadioOptions', null, '0', 'Yes', 'ہاں             ', '', '', '', '', '1', null, 'F610', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('617', '22', '20', 'F610B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F610', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('618', '22', '20', 'F610C', 'RadioOptions', null, '0', 'Don\'t Know', ' پتہ نہیں', '', '', '', '', '98', null, 'F610', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('619', '30', '20', 'F701', 'Radio', null, '0', 'Has child ever had a problem with sneezing or a runny or blocked nose when you DID NOT have a cold or the flu?', 'جب سردی یا فلو نہیں ہے تو کیا آپ کے بچے کو چھینکنے یا ناک بند ہونے/ بہنے سے کبھی تکلیف ہوئی ہے؟', '', '', '', null, null, '706', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('620', '30', '20', 'F701A', 'RadioOptions', null, '0', 'Yes', 'ہاں             ', '', '', '', '', '1', null, 'F701', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('621', '30', '20', 'F701B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F701', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('622', '30', '20', 'F701C', 'RadioOptions', null, '0', 'Don\'t Know', ' پتہ نہیں', '', '', '', '', '98', null, 'F701', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('623', '30', '20', 'F702', 'Radio', null, '0', 'In the past 12 months, has the child had a problem with sneezing, or a runny, or blocked nose when you DID NOT have a cold or the flu?', 'پچھلے 12 مہینوں میں ، جب آپ کو نزلہ یا فلو نہیں تھا ، تو کیا بچے کو چھینک ، یا ناک بند ہونے سے مسئلہ ہوا تھا؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('624', '30', '20', 'F702A', 'RadioOptions', null, '0', 'Never', 'کبھی نہیں', '', '', '', '', '1', null, 'F702', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('625', '30', '20', 'F702B', 'RadioOptions', null, '0', '1-2 times', '1۔2 مرتبہ ', '', '', '', '', '2', null, 'F702', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('626', '30', '20', 'F702C', 'RadioOptions', null, '0', '3-5 times', '3۔5 مرتبہ', '', '', '', '', '3', null, 'F702', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('627', '30', '20', 'F702D', 'RadioOptions', null, '0', '>5 times', '5 سے زائد مرتبہ', '', '', '', '', '4', null, 'F702', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('628', '30', '20', 'F703', 'Radio', null, '0', 'In the past 12 months, has this nose problem been accompanied by itchy-watery eyes? ', 'پچھلے 12 مہینوں میں ، کیا آنکھوں میں خارش کے ساتھ اس ناک کی تکلیف کا سامنا کرنا پڑا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('629', '30', '20', 'F703A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', null, 'F703', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('630', '30', '20', 'F703B', 'RadioOptions', null, '0', 'No', ' نہیں', '', '', '', '', '2', null, 'F703', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('631', '30', '20', 'F703C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', null, 'F703', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('632', '30', '20', 'F704', 'Input', null, '0', 'In which of the past 12 months did this nose problem occur? Please tick all that apply', 'پچھلے 12 ماہ کے دوران ناک کی تکلیف ہوئی؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('633', '30', '20', 'F705', 'Radio', null, '0', 'In the past 12 months, how much did this nose problem interfere with your child’s daily activities?', 'پچھلے 12 مہینوں میں ، ناک کی اس پریشانی نے آپ کے بچے کی روز مرہ کی سرگرمیوں میں کتنا مداخلت کی ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('634', '30', '20', 'F705A', 'RadioOptions', null, '0', 'No disturbances', 'کوئی پریشانی نہیں', '', '', '', '', '1', null, 'F705', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('635', '30', '20', 'F705B', 'RadioOptions', null, '0', 'Minimum disturbances', 'کم سے کم پریشانی', '', '', '', '', '2', null, 'F705', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('636', '30', '20', 'F705C', 'RadioOptions', null, '0', 'Moderate disturbances', 'درمیانی پریشانی', '', '', '', '', '3', null, 'F705', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('637', '30', '20', 'F705D', 'RadioOptions', null, '0', 'Severe disturbances', 'شدید پریشانی', '', '', '', '', '4', null, 'F705', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('638', '30', '20', 'F706', 'Radio', null, '0', 'Has the child ever had hay fever?', 'کیا بچے کو کبھی بخار ہوا ہے؟', '', '', '', null, null, '801', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('639', '30', '20', 'F706A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', null, 'F706', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('640', '30', '20', 'F706B', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F706', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('641', '30', '20', 'F706C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', null, 'F706', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('642', '30', '20', 'F707', 'Radio', null, '0', 'In past 12 months has the child had hay fever? (Hay fever is rhinitis that may be sneezing, congestion, runny nose, and sinus pressure in response to airborne substances, such as pollen.)', 'پچھلے 12 مہینے میں بچے کو بخار ہوا ہے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('643', '30', '20', 'F707A', 'RadioOptions', null, '0', 'Yes', 'ہاں              ', '', '', '', '', '1', null, 'F707', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('644', '30', '20', 'F707B', 'RadioOptions', null, '0', 'No', ' نہیں', '', '', '', '', '2', null, 'F707', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('645', '30', '20', 'F707C', 'RadioOptions', null, '0', 'Don\'t Know', 'پتہ نہیں', '', '', '', '', '98', null, 'F707', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('646', '31', '20', 'F801', 'Radio', null, '0', 'Does the mother ever had', 'کیا ماں کو کبھی یہ مثائل ہوئے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('647', '31', '20', 'F801A', 'Radio', null, '0', 'Asthma', 'دمہ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('648', '31', '20', 'F802A1', 'RadioOptions', null, '0', 'Yes', ' ہاں', '', '', '', '', '1', null, 'F801A', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('649', '31', '20', 'F802A2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F801A', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('650', '31', '20', 'F801B', 'Radio', null, '0', 'Allergic rhinitis', 'رائینایٹس', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('651', '31', '20', 'F801B1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', null, 'F801B', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('652', '31', '20', 'F801B2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F801B', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('653', '31', '20', 'F801C', 'Radio', null, '0', 'Eczema', 'ایکزیما', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('654', '31', '20', 'F801C1', 'RadioOptions', null, '0', 'Yes', 'ہاں    ', '', '', '', '', '1', null, 'F801C', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('655', '31', '20', 'F801C2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F801C', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('656', '31', '20', 'F802', 'Radio', null, '0', 'Does the father ever had?', 'کیا والد کو کبھی یہ مثائل ہوئے؟', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('657', '31', '20', 'F802A', 'Radio', null, '0', 'Asthma', 'دمہ', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('658', '31', '20', 'F802A1', 'RadioOptions', null, '0', 'Yes', ' ہاں    ', '', '', '', '', '1', null, 'F802A', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('659', '31', '20', 'F802A2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F802A', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('660', '31', '20', 'F802B', 'Radio', null, '0', 'Allergic rhinitis', 'رائینایٹس', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('661', '31', '20', 'F802B1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', null, 'F802B', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('662', '31', '20', 'F802B2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F802B', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('663', '31', '20', 'F802C', 'Radio', null, '0', 'Eczema', 'ایکزیما', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('664', '31', '20', 'F802C1', 'RadioOptions', null, '0', 'Yes', 'ہاں', '', '', '', '', '1', null, 'F802C', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('665', '31', '20', 'F802C2', 'RadioOptions', null, '0', 'No', 'نہیں', '', '', '', '', '2', null, 'F802C', null, null, null, null, null, null, null, null, '');
INSERT INTO `section_detail` VALUES ('692', '17', '20', 'FA17', 'Input', null, '0', 'yr', 'yy', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('693', '19', '20', 'F318', 'SelectBox', null, '0', 'test', 'ٹیسٹ', '', '', '', null, null, '2222', '123', null, '50', '100', 'ReadOnly', 'Required', null, '19', '9', '');
INSERT INTO `section_detail` VALUES ('694', '18', '20', 'F209', 'Label', null, '0', 'test', 'test', '', '', '', null, null, '', null, null, '', '', '', '', null, '19', '9', '');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `createdBy` varchar(255) DEFAULT NULL,
  `createdDateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updateBy` varchar(255) DEFAULT NULL,
  `updatedDateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'shahroz.khan@aku.edu', 'abcd1234', 'shahroz.khan@aku.edu', '', null, null, null, null);
INSERT INTO `users` VALUES ('2', 'dmu@aku', 'aku?dmu', 'dmu@aku', '', null, null, null, null);
INSERT INTO `users` VALUES ('3', 'muhammad.farooqui', 'abcd1234', 'muhammad.farooqui@aku.edu', '', null, '2019-11-27 15:02:59', null, null);
