/*
Navicat MySQL Data Transfer

Source Server         : localxampp3308
Source Server Version : 50505
Source Host           : localhost:3308
Source Database       : akuportal

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-30 10:54:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `idGroup` varchar(255) NOT NULL,
  `GroupName` varchar(255) DEFAULT NULL,
  `isActive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1AA4943C-B01F-61DF-A582-04A3E8150048', 'Applicant', '');
INSERT INTO `group` VALUES ('5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', 'Admin', '');
INSERT INTO `group` VALUES ('B80AA3B7-B792-722D-8553-B676C5908A72', 'Reviewer', '');

-- ----------------------------
-- Table structure for `pagegroup`
-- ----------------------------
DROP TABLE IF EXISTS `pagegroup`;
CREATE TABLE `pagegroup` (
  `idPageGroup` varchar(255) NOT NULL,
  `idGroup` varchar(255) DEFAULT NULL,
  `idPages` varchar(255) DEFAULT NULL,
  `CanAdd` bit(1) DEFAULT b'0',
  `CanEdit` bit(1) DEFAULT b'0',
  `CanDelete` bit(1) DEFAULT b'0',
  `CanView` bit(1) DEFAULT b'0',
  `CanViewAllDetail` bit(1) DEFAULT b'0',
  `isActive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idPageGroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pagegroup
-- ----------------------------
INSERT INTO `pagegroup` VALUES ('08444cb3-0a47-4e58-b110-13e5058cac3f', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', '7b668b0f-b90e-467d-9c8b-c2e2a6911981', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('0E6A3956-83E1-F8B3-BC8B-DB5C1D651154', 'B80AA3B7-B792-722D-8553-B676C5908A72', '72bd808d-8033-47e9-a580-7ab5b5492837', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('2cc64fd6-4c56-4164-8801-190c5f5c149e', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', 'ff0d3248-2fe9-4157-a922-e131eaa1efe4', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('3FBC940D-72CA-19C3-6233-087DAAECDF7B', 'B80AA3B7-B792-722D-8553-B676C5908A72', '1263d139-3698-46aa-b8c6-35b20019fd69', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('42406577-46C9-1A3A-19B5-9E0A502E1A1E', '1AA4943C-B01F-61DF-A582-04A3E8150048', '208FA412-F700-3339-CA7E-4E9EE459F6C0', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('48FE9A0A-54ED-72B5-B227-A4F0CF854A0D', 'B80AA3B7-B792-722D-8553-B676C5908A72', 'cc5f8e7a-c74d-419b-82dd-7c59b026e8f5', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('58a8f49f-3363-40f9-bdc1-14c0ea120b97', '1AA4943C-B01F-61DF-A582-04A3E8150048', 'ae40d56c-1f44-46e8-82f4-6360a26b30b8', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('5B24D6B6-1ED9-6D2C-1AAD-60A447A4C67D', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', '97E36CB6-A673-9ADC-711A-2A574A24CBC0', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('5ce26d33-b3e5-4c07-aecc-d40bb7d39ce1', '1AA4943C-B01F-61DF-A582-04A3E8150048', 'cc5f8e7a-c74d-419b-82dd-7c59b026e8f5', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('67B24AE4-7FDF-80DB-0E67-D03F75FE9CD6', 'B80AA3B7-B792-722D-8553-B676C5908A72', '7b668b0f-b90e-467d-9c8b-c2e2a6911981', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('68a19c68-4326-4b7c-a66c-eea13866c306', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', 'ae40d56c-1f44-46e8-82f4-6360a26b30b8', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('6cf1b0cf-4312-4fee-8d27-1a66b22fc477', '1AA4943C-B01F-61DF-A582-04A3E8150048', 'T70d3248-2fe9-4157-a932-e131eaa1efe1', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('6EC22485-D3EF-AE2B-08A6-5B3D830251B5', 'B80AA3B7-B792-722D-8553-B676C5908A72', 'ff0d3248-2fe9-4157-a922-e131eaa1efe4', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('728A2AE1-8EA6-E7B3-B53A-F03BC55882FD', '1AA4943C-B01F-61DF-A582-04A3E8150048', 'ff0d3248-2fe9-4157-a922-e131eaa1efe4', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('81D905E7-B704-FC1F-A15B-F1F20E107241', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', 'BB2E4401-D405-55E8-A3C6-CC37A27DC327', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('8398EE0C-BEF5-F263-3680-483B66FDBD97', '1AA4943C-B01F-61DF-A582-04A3E8150048', 'BB2E4401-D405-55E8-A3C6-CC37A27DC327', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('90B3A59A-9035-BB47-0F67-8719C68E87EA', 'B80AA3B7-B792-722D-8553-B676C5908A72', '208FA412-F700-3339-CA7E-4E9EE459F6C0', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('92860DF8-7D3F-B160-02D7-94E86F809143', 'B80AA3B7-B792-722D-8553-B676C5908A72', '97E36CB6-A673-9ADC-711A-2A574A24CBC0', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('97739515-c587-4849-aa53-c51f026b3b5c', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', 'T70d3248-2fe9-4157-a932-e131eaa1efe1', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('A34130B7-DA0A-18D1-1F32-91E85C0E4138', 'B80AA3B7-B792-722D-8553-B676C5908A72', 'ae40d56c-1f44-46e8-82f4-6360a26b30b8', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('A8722A7F-0D57-97D1-AB09-3EC7BC1261F2', '1AA4943C-B01F-61DF-A582-04A3E8150048', '72bd808d-8033-47e9-a580-7ab5b5492837', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('B86BE76A-7D01-20F0-319B-03D02955ECD2', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', '208FA412-F700-3339-CA7E-4E9EE459F6C0', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('badcde94-4323-4619-b914-236553e0bf54', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', '72bd808d-8033-47e9-a580-7ab5b5492837', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('BF3FADEF-0BEC-661A-8556-60E427CAFB43', 'B80AA3B7-B792-722D-8553-B676C5908A72', 'BB2E4401-D405-55E8-A3C6-CC37A27DC327', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('C3624BCE-5F6A-3808-FB25-783FABAF658F', 'B80AA3B7-B792-722D-8553-B676C5908A72', 'T70d3248-2fe9-4157-a932-e131eaa1efe1', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('E2675622-8B7A-3866-5A06-AB0FAC334ED0', '1AA4943C-B01F-61DF-A582-04A3E8150048', '7b668b0f-b90e-467d-9c8b-c2e2a6911981', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('e359a33c-3e82-4505-a9ea-b13ba64d9622', '5PJ0CBA5-G72F-4280-CA41-1F2933C5B90D', 'cc5f8e7a-c74d-419b-82dd-7c59b026e8f5', '', '', '', '', '', '');
INSERT INTO `pagegroup` VALUES ('F4195EEF-0527-066A-0F0A-646FB287EEBF', '1AA4943C-B01F-61DF-A582-04A3E8150048', '97E36CB6-A673-9ADC-711A-2A574A24CBC0', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `idPages` varchar(255) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `isParent` bit(1) DEFAULT b'0',
  `idParent` varchar(255) DEFAULT NULL,
  `controller_name` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `sort_no` int(11) DEFAULT NULL,
  `isActive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idPages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1263d139-3698-46aa-b8c6-35b20019fd69', 'Admin', '#', '', null, null, null, '10', '');
INSERT INTO `pages` VALUES ('208FA412-F700-3339-CA7E-4E9EE459F6C0', 'Teams', 'Teams', '', '1263d139-3698-46aa-b8c6-35b20019fd69', 'Teams', 'MTeams', '11', '');
INSERT INTO `pages` VALUES ('72bd808d-8033-47e9-a580-7ab5b5492837', 'Dashboard', 'dashboard', '', null, 'Dashboard', 'MDashboard', '1', '');
INSERT INTO `pages` VALUES ('7b668b0f-b90e-467d-9c8b-c2e2a6911981', 'Settings', 'setting', '', '1263d139-3698-46aa-b8c6-35b20019fd69', 'Setting', 'MSetting', '14', '');
INSERT INTO `pages` VALUES ('97E36CB6-A673-9ADC-711A-2A574A24CBC0', 'Drafts', 'form_drafts', '', null, 'Form', 'MForm_View', '5', '');
INSERT INTO `pages` VALUES ('ae40d56c-1f44-46e8-82f4-6360a26b30b8', 'Applications', 'form_view', '', null, 'Form_View', 'MForm_View', '4', '');
INSERT INTO `pages` VALUES ('BB2E4401-D405-55E8-A3C6-CC37A27DC327', 'AIMS Applications', 'aims_applications', '', null, 'Form', 'MForm', '2', '');
INSERT INTO `pages` VALUES ('cc5f8e7a-c74d-419b-82dd-7c59b026e8f5', 'Pages', 'pages', '', '1263d139-3698-46aa-b8c6-35b20019fd69', 'Pages', 'MPages', '12', '');
INSERT INTO `pages` VALUES ('ff0d3248-2fe9-4157-a922-e131eaa1efe4', 'Users', 'users', '', '1263d139-3698-46aa-b8c6-35b20019fd69', 'Users', 'MUsers', '13', '');
INSERT INTO `pages` VALUES ('T70d3248-2fe9-4157-a932-e131eaa1efe1', 'DRC Application', 'form', '', null, 'Form', 'MForm', '3', '');
