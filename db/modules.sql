/*
Navicat MySQL Data Transfer

Source Server         : localxampp3308
Source Server Version : 50505
Source Host           : localhost:3308
Source Database       : dictionary_portal

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-02-04 14:23:54
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `isActive` varchar(1) DEFAULT '1',
  PRIMARY KEY (`idModule`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('1', '1', 'A', 'Module A', 'The passage is attributed to an unknown typesetter in the 15th century who is t', 'ماڈیول اے', 'لوریم اِپسم پرنٹنگ اور ٹائپسیٹنگ انڈسٹری کا صرف ڈمی متن ہے۔ لوریم ایپسم 1500s کے بعد سے ہی انڈسٹری کا معیاری ڈمی متن رہا ہے ، جب ایک نامعلوم پرنٹر ٹائپ کی ایک گیلی لے کر اس کو ٹائپ کرتے ہوئے ٹائپ نمونہ کی کتاب بناتا ہے۔ یہ نہ صرف پانچ صدیوں سے زندہ بچا ہے', '', '', '', '', '', '', 'Ongoing', 'Multiple', '1', '1');
INSERT INTO `modules` VALUES ('2', '2', 'A', 'ماژول A', 'The passage is attributed to an unknown typesetter in the 15th century who is t', '', '', '', '', '', '', '', '', 'Completed', 'Single', '1', '1');
INSERT INTO `modules` VALUES ('3', '1', 'B', 'Module B', 'The passage is attributed to an unknown typesetter in the 15th century who is t', 'ماژول B', 'همانطور که گاها شناخته شده است ، متن ساختگی است که در طرح های چاپی ، گرافیکی یا وب استفاده می شود. این گذرگاه به یک نویسنده نامه ناشناخته در قرن پانزدهم منتسب شده است که تصور می شود قسمت هایی از Cicero\'s De Finibus Bonorum et Malorum را برای استفاده در یک', '', '', '', '', '', '', 'Ongoing', 'Single', '1', '1');
INSERT INTO `modules` VALUES ('4', '3', 'A', 'Module A of tool C id crf 3', 'Module A of tool C id crf 3 description', 'آلے C id crf 3 تفصیل کا ماڈیول A۔', 'آلے C id crf 3 تفصیل کا ماڈیول A۔', 'ماژول A ابزار C id crf 3', 'ماژول A توضیحات ابزار C id crf 3', '', '', '', '', 'Ongoing', 'Single', '2', '1');
INSERT INTO `modules` VALUES ('5', '1', 'C', 'English', 'English Description', '', '', '', '', '', '', '', '', 'Ongoing', 'Single', '0', '1');
INSERT INTO `modules` VALUES ('6', '1', 'D', 'English 2', 'English Description', 'سندھی ', 'سندھی تفصیل', '', '', '', '', '', '', 'Ongoing', 'Multiple', '0', '1');
INSERT INTO `modules` VALUES ('7', '4', 'A', 'test', 'test description', 'ٹیسٹ ', 'ٹیسٹ کی تفصیل', 'سندھی ', 'سندھی تفصیل', 'تست', 'توضیحات آزمون', '', '', 'Ongoing', 'Multiple', '2', '1');
INSERT INTO `modules` VALUES ('8', '4', 'B', 'fadas', 'asdasdas', '', '', '', '', '', '', '', '', 'Ongoing', 'Multiple', '2', '1');
INSERT INTO `modules` VALUES ('9', '11', 'A', 'Household', 'household description', 'گھریلو', 'گھریلو تفصیل', 'سندھی ', 'سندھی تفصیل', '', '', '', '', 'Ongoing', 'Multiple', '6', '1');
INSERT INTO `modules` VALUES ('10', '11', 'A', 'Lorem ipsum', 'The passage is attributed to an unknown typesetter in the 15th century who is t', 'لوریم ایپسم ', 'لوریم ایپسم ، یا لپسسم جیسا کہ یہ کبھی کبھی جانا جاتا ہے ، ڈمی متن ہے جو پرنٹ ، گرافک یا ویب ڈیزائن تیار کرنے میں استعمال ہوتا ہے۔ گزرنے کی وجہ 15 ویں صدی میں ایک نامعلوم ٹائپ سیٹٹر سے منسوب ہے جس کے بارے میں سوچا جاتا ہے کہ وہ ایک قسم کی نمونہ کی کتاب می', 'سندھی ', 'ماژول A توضیحات ابزار C id crf 3', '', '', '', '', 'Ongoing', 'Single', '6', '1');
INSERT INTO `modules` VALUES ('17', '16', 'A', 'Module A ', 'Module A Desc ', 'Module B', 'Module B Desc ', '', '', '', '', '', '', 'Completed', 'Multiple', '7', '1');
INSERT INTO `modules` VALUES ('18', '17', 'SC', 'Social Economic Social - English', 'Social Economic Social - English desc', 'Social Economic Social - urdu', 'asdsa', '', '', '', '', '', '', 'Ongoing', 'Single', '8', '1');
INSERT INTO `modules` VALUES ('19', '18', 'H', 'HOUSEHOLD AND MEMBERS INFORMATION', 'HOUSEHOLD AND MEMBERS INFORMATION ', 'معلومات خانواده و اعضا', 'معلومات خانواده و اعضا', '', '', '', '', '', '', 'Ongoing', 'Multiple', '8', '1');
INSERT INTO `modules` VALUES ('20', '19', 'F', 'First Followup', 'First follow-up visit form: ANISA RSV follow-up study', '  پہلے وِزِٹ ', '  پہلے وِزِٹ کا سوال نامہ (آر ایس وی مطالعہ)\nی\n', '', '', '', '', '', '', 'Ongoing', 'Single', '9', '1');
INSERT INTO `modules` VALUES ('21', '20', 'G', 'Data Form 2: Second household visit form', 'This form is to be completed for all children by research assistants during the second household visit (second home visit or during the sixth month visit of the enrolment.\nRespondent: \n•	Primarily mother, if mother is absent even after three visits, infor', '  دوسرے وِزِٹ کا سوال نامہ (آر ایس وی مطالعہ)ی', 'اس فارم کو آر ایس وی مطالعہ کے لئے پچھلے انیسہ مطالعے میں منتخب کیے گئے بچوں کے لیے پُر کرنا ہے۔ یہ فارم مطالعے کے پہلے وِزِٹ کے دوران پُر کیا جائے گا۔  (تحقیقاتی اسسٹنٹ اس فارم کو مکمل کرے گا)\n \nجواب دینے والا:\nبنیادی طور پر بچے کی ماں جواب دے گی، اگر ت', '', '', '', '', '', '', 'Ongoing', 'Single', '9', '1');
INSERT INTO `modules` VALUES ('22', '21', 'H', 'HEALTH FACILITY ASSESSMENT', 'A pilot study: Linking facility-based mortality audits with community engagement to improve maternal and newborn outcomes in Gilgit-Baltistan, Pakistan', 'HEALTH FACILITY ASSESSMENT', 'A pilot study: Linking facility-based mortality audits with community engagement to improve maternal and newborn outcomes in Gilgit-Baltistan, Pakistan', '', '', '', '', '', '', 'Ongoing', 'Single', '10', '1');
INSERT INTO `modules` VALUES ('23', '22', 'A', 'STILLBIRTH AND NEONATAL DEATH CASE REVIEW FORM', 'STILLBIRTH AND NEONATAL DEATH CASE REVIEW FORM', '', '', '', '', '', '', '', '', 'Ongoing', 'Single', '10', '1');
INSERT INTO `modules` VALUES ('24', '23', 'H', 'HOUSEHOLD QUESTIONNAIRE', '', ' گھرانہ کا سوالنامہ ', '', '', '', '', '', '', '', 'Ongoing', 'Single', '12', '1');
INSERT INTO `modules` VALUES ('25', '24', 'A', 'MODULE A', 'HOUSEHOLD IDENTIFICATION AND DEMOGRAPHIC INFORMATION', 'ماڈیول اے ', 'گھرانے کی شناخت اور آبادیاتی معلومات', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('26', '24', 'B', 'MODULE B', 'HOUSEHOLD MEMBERS’ INFORMATION', 'ماڈیول بی', 'گھرانے اور اس کے افراد کی معلومات', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('27', '24', 'C', 'MODULE C', 'SOCIO-ECONOMIC STATUS (SS)', 'ماڈیول سی', 'سماجی واقتصادی معلومات', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('28', '24', 'D', 'MODULE D', 'HAND-WASHING (HW)', 'ماڈیول ڈی', 'ہاتھ دھونے سے متعلق معلومات', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('29', '24', 'E', 'MODULE E', 'HOUSEHOLD FOOD INSECURITY EXPERIENCE SCALE', 'ماڈیول ا ی', 'گھرانے کی غذائی قلت کےتجربات کی ', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('30', '24', 'F', 'MODULE F', 'HOUSEHOLD DIETRY DIVERSITY AND SOURCE ASSESMENT', 'ماڈیول ا یف', 'گھرانے کی مختلف اقسام کے کھانوں کے استعمال کے بارے میں معلومات', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('31', '24', 'G', 'MODULE G', ' CHILD GENERAL HEALTH', 'ماڈیول جی', 'بچوں کی عمومی صحت کے بارے میں معلومات', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('32', '24', 'H', 'MODULE H', ' SEMI-QUANTITATIVE FOOD FREQUENCY', 'ماڈیول ایچھ', ' جزوی خوراک کی تعداداورمقدار', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('33', '24', 'I', 'MODULE I\n\n', ' 24-HOUR FOOD RECALL\n\n', 'ماڈیول آئی   ', '24 گھنٹے کی  غذا یاد کر کے   ', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('34', '24', 'J', 'MODULE J', ' SOSAS ', 'ماڈیول جے', ' سرجنز کی بیرون ممالک میں جراحی کی ضروریات کا تعین', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('38', '24', 'K', 'MODULE K', 'CHILD ANTHROPOMETRIC ASSESSMENT', 'ماڈیول کے', 'بچوں کی جسمانی پیمائش اور طبی معائنہ', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('39', '24', 'L', 'MODULE L', ' NUTRITIONAL IRON STATUS ASSESSMENT OF PARTICIPANT', 'ماڈیول : ایل', 'شرکاءکی غذائی فولاد کی صورتحال کا جائزہ', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('40', '24', 'M', 'MODULE M', ' VISION TEST', 'ماڈیول ایم', 'بینائی کا معائنہ ', '', '', '', '', '', '', 'Ongoing', 'Single', '13', '1');
INSERT INTO `modules` VALUES ('41', '25', 'H', 'Household Line Listing Form', 'Household Line Listing Form', 'گھریلو لائن کی فہرست سازی کا فارم', 'گھریلو لائن کی فہرست سازی کا فارم', '', '', '', '', '', '', 'Ongoing', 'Single', '14', '1');
INSERT INTO `modules` VALUES ('42', '26', 'H', 'MIDLINE HOUSEHOLD SURVEY QUESTIONNAIRE', 'MIDLINE HOUSEHOLD SURVEY QUESTIONNAIRE', '', '', '', '', '', '', '', '', 'Ongoing', 'Single', '14', '1');
INSERT INTO `modules` VALUES ('43', '27', 'A', 'Module A', 'Household Identification and Demographic Information ', 'ماڈئول اے', 'گھرانے کی شناخت اور آبادیاتی معلومات', '', '', '', '', '', '', 'Ongoing', 'Single', '15', '1');
INSERT INTO `modules` VALUES ('44', '27', 'B', 'Module B', 'KAP (Knowledge Attitude Practices)', 'ماڈیول بی', 'معلومات روئیے طرزعمل', '', '', '', '', '', '', 'Ongoing', 'Single', '15', '1');
INSERT INTO `modules` VALUES ('45', '27', 'C', 'Module C', 'Mobilization ', 'ماڈیول سی', 'موبلائزیشن', '', '', '', '', '', '', 'Ongoing', 'Single', '15', '1');
INSERT INTO `modules` VALUES ('46', '28', 'A', 'MODULE A : HOUSEHOLD IDENTIFICATION AND DEMOGRAPHIC INFORMATION', 'MODULE A : HOUSEHOLD IDENTIFICATION AND DEMOGRAPHIC INFORMATION', 'ماڈیول  اے  :  گھرانے کی شناخت اور آبادیاتی معلومات:', 'ماڈیول  اے  :  گھرانے کی شناخت اور آبادیاتی معلومات:', '', '', '', '', '', '', 'Completed', 'Single', '16', '1');
INSERT INTO `modules` VALUES ('47', '28', 'B', 'MODULE B : HOUSEHOLD DIETRY DIVERSITY AND SOURCE ASSESMENT', 'MODULE B : HOUSEHOLD DIETRY DIVERSITY AND SOURCE ASSESMENT', 'ماڈیول  بی :  گھریلو کھانوں کے عدم تحفظ ، غذائی تنوع اور ذرائع کا اندازہ:', 'ماڈیول  بی :  گھریلو کھانوں کے عدم تحفظ ، غذائی تنوع اور ذرائع کا اندازہ:', '', '', '', '', '', '', 'Completed', 'Single', '16', '1');
INSERT INTO `modules` VALUES ('48', '28', 'c', 'MODULE C : CHILD GENERAL HEALTH', 'MODULE C : CHILD GENERAL HEALTH', 'ماڈیول  سی :  بچوں کی عمومی صحت', 'ماڈیول  سی :  بچوں کی عمومی صحت', '', '', '', '', '', '', 'Completed', 'Single', '16', '1');
INSERT INTO `modules` VALUES ('49', '28', 'D', 'MODULE D : SEMI-QUANTITATIVE FOOD FREQUENCY', 'MODULE D : SEMI-QUANTITATIVE FOOD FREQUENCY', 'MODULE D : SEMI-QUANTITATIVE FOOD FREQUENCY', 'MODULE D : SEMI-QUANTITATIVE FOOD FREQUENCY', '', '', '', '', '', '', 'Completed', 'Single', '16', '1');
INSERT INTO `modules` VALUES ('51', '16', 'B', 'Test 2', 'Test 2ss', 'Test 2', 'Test 2ss', '', '', '', '', '', '', 'Completed', 'Single', '7', '1');
INSERT INTO `modules` VALUES ('52', '28', 'K', 'MODULE K: RESPONDENT AND CHILD’S PHYSICAL INFORMATION', 'RESPONDENT AND CHILD’S PHYSICAL INFORMATION', 'ماڈیول کے :  جوابدہندہ، اور بچوں کی جسمانی معلومات', 'ماڈیول کے :  جوابدہندہ، اور بچوں کی جسمانی معلومات', '', '', '', '', '', '', 'Completed', 'Single', '16', '1');
INSERT INTO `modules` VALUES ('53', '28', 'L', 'MODULE L: NUTRITIONAL IRON STATUS ASSESSMENT OF PARTICIPANT ', 'MODULE L: NUTRITIONAL IRON STATUS ASSESSMENT OF PARTICIPANT ', ' ماڈیول ایل : شرکت کرنے  والے کی غذائیت سے متعلق آئرن کی حیثیت کی جانچ', ' ماڈیول ایل : شرکت کرنے  والے کی غذائیت سے متعلق آئرن کی حیثیت کی جانچ', '', '', '', '', '', '', 'Ongoing', 'Single', '16', '1');
INSERT INTO `modules` VALUES ('54', '28', 'M', 'MODULE M: VISION TEST ', 'MODULE M: VISION TEST ', ' ماڈیول ایم    : بینائی  کی جانچ                                                                                                                                                                                     ', ' ماڈیول ایم    : بینائی  کی جانچ                                                                                                                                                                                     ', '', '', '', '', '', '', 'Ongoing', 'Single', '16', '1');
INSERT INTO `modules` VALUES ('55', '23', 'UF', 'ELIGIBLE CHILD MODULE', 'INFORMATION PANEL(UF)', 'اہل بچے کا مادیول', 'بچے کی معلوماتی پینل', '', '', '', '', '', '', 'Ongoing', 'Multiple', '12', '1');
