/*
Navicat MySQL Data Transfer

Source Server         : 122.226.64.112
Source Server Version : 50096
Source Host           : 122.226.64.112:3306
Source Database       : a0430085541

Target Server Type    : MYSQL
Target Server Version : 50096
File Encoding         : 65001

Date: 2014-09-23 12:50:14
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `syjx_apply`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_apply`;
CREATE TABLE `syjx_apply` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `jobs` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL default '0',
  `sex` varchar(120) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `marriage` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `eduresume` text NOT NULL,
  `workresume` text NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `listorder` int(10) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_apply
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_article`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_article`;
CREATE TABLE `syjx_article` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `keywords` varchar(120) NOT NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `copyfrom` varchar(100) NOT NULL,
  `fromlink` varchar(200) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `alt` varchar(255) default NULL,
  `color` char(7) NOT NULL,
  `isbold` tinyint(1) unsigned NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `recommends` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `realhits` int(10) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `puttime` int(10) unsigned NOT NULL default '0',
  `tpl` varchar(20) NOT NULL,
  `listorder` int(10) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`),
  KEY `recommend` (`recommends`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_article
-- ----------------------------
INSERT INTO syjx_article VALUES ('16', '16', '全国研究生智慧城市大赛我院代表队勇夺特等奖', '1', '智慧城市大赛', '全国研究生智慧城市大赛我院代表队勇夺特等奖', '<span style=\"color:#295279;font-family:Simsun;line-height:22px;white-space:normal;background-color:#FFFFFF;font-size:small;\"><span style=\"font-family:Arial;\">&nbsp; &nbsp; 8月22日-25日，由教育部学位与研究生教育发展中心、中国科协青少年科技中心，联合全国工程专业学位研究生教育指导委员会、中国智慧城市产业技术创新战略联盟、数字音视频编解码（AVS）产业技术创新战略联盟共同主办、北京航空航天大学承办的首届全国研究生智慧城市技术与创意设计大赛决赛在北航举行。该赛事是中国研究生创新实践大赛的赛事之一，共吸引来自全国71所高校（研究所）的1200余名研究生报名参赛，经过网络初评，41所高校（研究所）的98支队伍、300余名参赛师生齐聚北航，由我院研究生组成的3支代表队和其他5支兄弟院系的代表队晋级决赛共同代表武汉大学与全国各大高校代表队切磋较量。我院参赛作品获特等奖1项，</span>三等奖2项，优秀奖3项的优异成绩，胡瑞敏、陈军两位老师荣获优秀指导教师奖。此外，我校获团体总分第一名，第二名和第三名分别是西安交通大学和清华大学。<br />\r\n<p align=\"center\">\r\n <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140903103413324.jpg\" />\r\n</p>\r\n</span>\r\n<p align=\"left\" style=\"color:#295279;font-family:Simsun;line-height:22px;white-space:normal;background-color:#FFFFFF;\">\r\n <span style=\"font-size:small;\"><br />\r\n</span><span style=\"font-size:small;font-family:Arial;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本次大赛由创意设计大赛和视频技术挑战赛两大赛事组成。创意设计大赛有119所高校的993件作品报名参赛，最终有70件作品入围决赛。我院严岩、蔡旭芬、黄冰月、熊明福团队的作品《面向大数据的视频侦查分析系统》（指导老师：胡瑞敏、陈军）凭借胡瑞敏、陈军、梁超等老师的悉心指导，以及队员答辩出色的表现，斩获全国特等奖；视频技术挑战赛有71所高校399支队伍报名参赛，最终35支晋级决赛，我院两支队伍晋级三个项目，终获得1项三等奖，3项优秀奖的好成绩。<br />\r\n</span>\r\n</p>\r\n<span style=\"color:#295279;line-height:22px;white-space:normal;background-color:#FFFFFF;font-size:small;font-family:Arial;\">\r\n<p align=\"center\">\r\n <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140903103422398.jpg\" />\r\n</p>\r\n<p align=\"left\">\r\n <br />\r\n<strong>附件：计算机学院参赛获奖情况统计</strong>\r\n</p>\r\n<p align=\"left\">\r\n <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140903103433317.jpg\" />\r\n</p>\r\n</span>', '', 'http://cs.51snet.cn/', '', '智慧城市大赛', '', '0', '0', '', '0', '0', '1411111968', '1411111968', '1408951882', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('17', '16', '计算机学院召开物联网工程专业课程研讨会', '1', '课程研讨会', '计算机学院召开物联网工程专业课程研讨会', '<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp; &nbsp; &nbsp; 2013年12月6日下午，学院召开了物联网工程本科专业课程研讨会。副院长王丽娜教授、物联网工程专业建设负责人黄传河教授、实验教学中心负责人张沪寅教授、教学办主任余琍及所有专业课程建设负责教师、教学秘书等出席会议。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 黄传河教授首先介绍了物联网工程专业在全国各高校开设和建设的情况，解读了各高校物联网专业课程体系的设置，并就学院新修订的人才培养方案与老方案的区别进行了对比。黄教授介绍了我院物联网工程专业课程设置的思路和人才培养理念，逐一强调了20余门课程大纲内容的要求及大纲编写中所要注意的问题，提出将物联网定位技术、物联网信息安全建设成为武汉大学优势特色课程，他建议各位老师在课程建设工作中，积极参照权威资料，注重与企业合作交流，切实将课程内容设计到精致。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 王丽娜副院长提出学院高度重视物联网工程专业建设，将从政策上给予广大老师支持，也督促目前在编的四本教材（物联网工程设计与实施、传感器原理及应用、物联网通信技术、云计算与云存储）能按时间要求提交初稿。在她的建议下，会议商议确定了各课程组负责人及相关成员，为未来的专业建设奠定了良好基础。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">与会教师就课程大纲内容、课程建设、课程教学要求、实验环境设置等问题进行了交流学习，明确了专业课程建设目标，在思想上统一了认识。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 据悉，物联网工程专业是我院2010年向国家申请的战略新兴产业紧需人才的新专业，已经经历了三年的教学摸索和实践，新专业实验环境在不断完善，积累了相当的专业教学经验。物联网工程专业在校学生近百名，2010级学生32人中，有7人保送研究生，人才培养质量受到广泛认可。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p align=\"center\" style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">\r\n <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20131210155105278.jpg\" />\r\n</p>\r\n<div>\r\n <br />\r\n</div>', '', 'http://cs.51snet.cn/', '', '课程研讨会', '', '0', '0', '', '0', '0', '1411112112', '1411112112', '1386574449', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('18', '16', '计算机学院三门精品课程入选国家精品资源共享课', '1', '', '计算机学院三门精品课程入选国家精品资源共享课', '<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp; &nbsp; &nbsp; 根据湖北省教育厅公布的有关精品资源共享课程名单，我院《编译原理》、《密码学》、《微机系统与接口技术》三门课程入选国家精品资源共享课程。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 自国家启动精品资源共享课建设以来，已进行了3批次的申报及审批工作。&nbsp;经过课程组负责老师及其团队的精心准备和努力工作，我院今年申报的3门课程《编译原理》、《密码学》、《微机系统与接口技术》成功列入第三批国家精品资源共享课名录。这是继这三门课程分别于2005年、2009年、2010年获得国家级精品课程以来，我院又一重要课程教学成果，对我院教学内容与课程体系建设起到了良好的示范及推进作用。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 精品资源共享课建设是国家精品开放课程建设项目的组成部分，旨在促进教育教学观念转变，推动高等学校优质课程教学资源通过现代信息技术手段共建共享，根据工作部署，“十二五”期间，教育部将在原国家精品课程建设成果基础上，通过高等学校本科教学质量与教学改革工程支持建设5000门国家级精品资源共享课。我校此次共有28门课程入选，数量居全省第一，我院三门课程入选，数量居学校前列。</span>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411112194', '1411112194', '1389771352', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('19', '16', '2014年TI杯全国大学生物联网设计竞赛华中与西南分赛区决赛胜利举行', '1', '物联网设计竞赛', '2014年TI杯全国大学生物联网设计竞赛华中与西南分赛区决赛胜利举行', '<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp; &nbsp; &nbsp; 2014年8月7日-8月9日，由武汉大学计算机学院承办的“全国大学生物联网设计竞赛（TI杯）华中与西南赛区决赛”在计算机学院大楼A301胜利举行。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 全国大学生物联网设计竞赛（TI杯）（以下简称“竞赛”）是面向高校大学生举办的全国性竞赛。竞赛坚持“为专业建设服务、高校与企业共同参与”的方针，以创意“可实现”为宗旨，综合考察参赛团队的创意、设计和工程实现能力，为探索物联网工程专业人才培养模式、实施“卓越工程师计划”提供有力支持。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">竞赛由教育部高等学校计算机类专业教学指导委员会主办，教育部高等学校物联网工程专业教学研究专家组承办，德州仪器半导体技术公司（TI）协办，是物联网领域的全国性高级别、高水平的赛事。大赛分为各分赛区初赛、各分赛区决赛、全国总决赛（上海交大举行，全国六大赛区共推荐48支队伍参赛）三个阶段。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 武汉大学计算机学院今年承办了第一届全国大学生物联网设计竞赛华中与西南分赛区决赛。分赛区报名数达76支，初赛共有6个省1个直辖市（湖北、四川、河南、江西、湖南、云南和重庆市）共28个学校67支队伍参赛。经过初赛评选出32支队进入决赛，各参赛队在决赛中参与了PPT展示、作品现场演示、专家提问回答等各项环节内容，最终经过专家的认真评选，推选出特等奖8项，一等奖16项，二等奖8项。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 比赛邀请武汉大学、华中科技大学、中南大学、武汉理工大学、河南大学、湖北工业大学、重庆邮电大学、四川乐山师范学院等学校的专家担任大赛评委。武汉大学党委副书记、副校长王传中参加了大赛开幕式并讲话。颁奖典礼上，武汉大学本科生院陈传夫院长、计算机学院胡瑞敏院长分别致辞并为获特等奖的队伍颁奖。</span>', '', 'http://cs.51snet.cn/', '', '物联网设计竞赛', '', '0', '0', '', '0', '0', '1411112296', '1411112296', '1407742643', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('20', '16', '我院两代表队双双斩获首届全国物联网竞赛一等奖', '1', '', '我院两代表队双双斩获首届全国物联网竞赛一等奖', '<span style=\"color:#295279;line-height:22px;white-space:normal;background-color:#FFFFFF;font-size:small;font-family:Arial;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;由教育部计算机类专业教指委主办的第一届“TI杯全国大学生物联网设计竞赛”全国总决赛于2014年8月25日至8月27日在上海交通大学举行。武汉大学计算机学院2支代表队表现优异均获得全国一等奖，武汉大学被组委会授予“优秀组织奖”。&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本竞赛采取“创意+设计+实现”三层递进的比赛原则，有来自全国200多所高校的500多支队参赛，经过全国6个分赛区的角逐，最终51支队进入全国总决赛。武汉大学计算机学院代表队侯沐澜、卢玥锟、欧阳坤、王晶的作品《集聚性RFID快速识别系统及应用》（指导老师：黄传河），结合CDMA+TDMA技术实现读写器与标签之间的通信，通过使用正交码给每个标签数据扩频，并且在阅读器端用相同码片进行解扩的方式最多可同时识别数百个标签，具有广阔的应用前景。&nbsp;代表队张倬胜、章尹圣原、薛静远、马方方的作品《基于iBeacon定位技术的智慧图书馆》（指导老师：艾浩军），遵循物联网技术架构，设计了智慧图书馆整体解决方案。以iBeacon室内定位、3D实境、移动互联网、SaaS等技术为基础，实现了图书馆场景下的智能定位与导航服务、图书馆增强现实位置服务、3D运行监管、角色个性化服务等功能。两支队伍在决赛中展现出了独特的创意，给在场的评委留下了深刻的印象，获得了高度评价。&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 武汉大学计算机学院拥有物联网工程本科专业，此次竞赛活动所取得的可喜成绩充分展现了计算机学院物联网专业学生较高的专业水平。&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本次竞赛由教育部高等学校计算机类专业教学指导委员会主办，教育部高等学校物联网工程专业教学研究专家组承办，德州仪器半导体技术公司（TI）、WI-FI联盟等多家单位协办，比赛旨在通过竞赛交流和与业界应用的结合创新，丰富和发展物联网工程专业建设的学科内容与创新方向，提高学生的实践和创新能力，是物联网领域级别最高、水平最高、代表性最广的大学生赛事。&nbsp;<br />\r\n</span>\r\n<p align=\"center\" style=\"color:#295279;font-family:Simsun;line-height:22px;white-space:normal;background-color:#FFFFFF;\">\r\n <span style=\"font-size:small;font-family:Arial;\"><img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140902122157710.jpg\" /><br />\r\n<img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140902122208543.jpg\" /></span>\r\n</p>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411112351', '1411112351', '1409557117', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('21', '16', '我院学子在第四届全国大学生智能设计竞赛总决赛中喜创佳绩', '1', '', '我院学子在第四届全国大学生智能设计竞赛总决赛中喜创佳绩', '<span style=\"color:#295279;line-height:22px;white-space:normal;background-color:#FFFFFF;font-size:small;font-family:Arial;\">&nbsp; &nbsp; &nbsp; &nbsp; 7月28日，由中国人工智能学会主办的第四届“华为杯”全国大学生智能设计竞赛总决赛在厦门大学落下帷幕，本次竞赛共吸引来自武汉大学、中国科学技术大学、中国科学院大学、中南大学、南开大学、厦门大学等全国41所高校的161支队伍参加，最终有38支本科生及研究生队伍进入决赛。&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 武汉大学计算机学院的贾力华、张子良、杨江、张速的作品（指导老师：蔡朝晖）《音乐智能推荐系统》获得一等奖。王凌阳、吴晓铭、杜洪洲、周焰的作品（指导老师：曾承）《基于WIFI的室内定位系统》给全场评委留下深刻的印象，获得二等奖。&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本次竞赛是由中国人工智能学会主办，中国人工智能学会教育委员会主持，厦门大学承办，华为技术公司赞助的全国性赛事，其目的是普及智能科学与技术知识，提高学生采用智能科学技术与理论解决问题的能力，培养学生的创新意识与团队合作精神，选拔、推荐优秀智能科学与技术专业人才创造条件，促进高等学校智能及相关学科教学实践改革和学生实践能力培养。&nbsp;<br />\r\n</span>\r\n<p align=\"center\" style=\"color:#295279;font-family:Simsun;line-height:22px;white-space:normal;background-color:#FFFFFF;\">\r\n <span style=\"font-size:small;font-family:Arial;\"><img border=\"0\" src=\"http://192.168.1.208/cs2011/uploadfile/EditFile/20140909160938944.jpg\" /><br />\r\n<img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140909161002683.jpg\" /><br />\r\n</span>\r\n</p>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411112404', '1411112404', '1409643567', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('6', '16', '建行福建省分行“信息安全暨IT风险管理研讨班”在我院开班', '1', '', '', '<div class=\"ConShow\">\r\n <p style=\"text-indent:23.25pt;\" class=\"MsoNormal\">\r\n  3月24日上午，我院为建设银行福建省分行开设的“信息安全暨IT风险管理研讨班”在学院B404会议室举行了开班典礼。学院党委书记沃闻达、福建省建行李刚副总经理出席开班典,典礼由副院长彭正明主持。 <br />\r\n&nbsp;&nbsp;&nbsp; \r\n沃书记在致辞中对福建省建行培训学员的到来表示热烈欢迎，他简要介绍了武汉大学计算机学院的基本情况,，期待各位学员在我院培训期间能够“学有所获、学有所成”。福建省建行李刚副总经理发表讲话，他对计算机学院的大力支持和本次培训的精心筹备表示由衷的感谢，希望通过本次培训提升福建省建行信息安全队伍的业务素质和管理水平，增强信息技术人员的信息安全专业技能，提高信息科技风险防范能力，保障业务健康持续发展。<br />\r\n&nbsp;&nbsp;&nbsp; \r\n据悉，本次培训为期五天，参加培训的学员来自福建省建行及各地分行的信息技术骨干。为了提高培训效果，我院针对福建省建行的需求，量身打造培训方案，主要内容包括信息安全技术及保障体系、新技术应用及信息安全（移动平台、电子支付、云计算等）、信息防泄露安全技术（数字加密、信息隐藏、数字水印等）、网络服务及协议安全、操作系统安全、手机应用研发安全等。\r\n </p>\r\n <p style=\"text-indent:23.25pt;\" class=\"MsoNormal\" align=\"center\">\r\n  <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140326150211242.jpg\" /> \r\n </p>\r\n</div>\r\n<br />', '', 'http://localhost/', '', '', '', '0', '0', '', '0', '0', '1410962101', '1411111522', '1399557278', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('22', '16', '计算机学院一项教学成果获国家级教学成果一等奖', '1', '', '计算机学院一项教学成果获国家级教学成果一等奖', '<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp; &nbsp; &nbsp; 2014年国家教学成果奖表彰大会于9月9日在北京人民大会堂举行，由我院国家级教学名师何炎祥教授主持，张焕国、王丽娜、杜瑞颖、彭国军、余琍、吴黎兵、傅建明等老师共同完成的《创建信息安全专业培养体系，引领信息安全专业建设》教学成果荣获2014年高等教育国家级教学成果一等奖。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 习近平总书记说：“没有网络安全，就没有国家安全”要确保我国的信息安全，关键是人才。信息安全专业承载着信息安全人才培养的重任。武汉大学计算机学院是全国第一个开办信息安全专业的院系，解决了中国信息安全专业从无到有的问题。2001年至今，制订了全国第一套信息安全本科专业课程体系和教学计划，建立了全国第一个信息安全本科专业实验室，建立了全国第一个信息安全企业博士后产业基地，出版了全国第一套信息安全本科教材。牵头制定了教育部“高等学校信息安全专业指导性专业规范”。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 通过十余年的研究、探索与实践，理清了信息安全学科的知识结构和学科特点，提出了一套科学制定专业培养方案的方法，打造了一支高素质的教学团队，创建了信息安全人才培养实践体系，探索出了以“竞赛为牵引、基地为平台”的实践创新能力培养方案，提升了学生创新能力与团队协作精神。为全国开办信息安全专业的高校贡献了办学经验，培养的学生得到社会的广泛认可和高度称赞。该成果在信息安全专业建设方面，处于国内领先水平。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 据悉，高等教育国家级教学成果奖是我国教育领域中唯一的一项国家级奖励，代表了当前我国高等教育教学工作的最高水平，每四年评选一次，此次共从各省推荐的946项成果中评选特等奖2项，一等奖50项，二等奖400项。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p align=\"center\" style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">\r\n <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140909175152405.jpg\" /><br />\r\n<img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140909175203661.jpg\" />\r\n</p>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411112449', '1411112449', '1410334819', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('23', '16', '弘毅班学员参加2014中国可信计算与信息安全大会', '1', '', '弘毅班学员参加2014中国可信计算与信息安全大会', '<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp; &nbsp; &nbsp; 2014年9月13日至14日，由中国计算机学会（CCF）主办，华中科技大学和湖北民族学院承办、武汉大学协办的2014年第八届中国可信计算与信息安全大会（CTCIS&nbsp;2014）在湖北省恩施市召开。本届会议围绕着“网络安全中的可信计算”问题，探讨了信息安全领域的安全计算环境、可信云计算、软件安全分析、隐私保护等热点、难点的挑战。武汉大学弘毅学堂计算机班2011级和2012级的15名同学参加了本次大会。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本届中国可信计算与信息安全大会邀请了国内外资深专家作大会报告，包括沈昌祥院士、张焕国教授、荆继武教授、曹珍富教授、杜跃进教授、Shouhuai&nbsp;Xu、Yang&nbsp;Xiang、王绍斌、陈恺等知名学者。本届大会提供了涉及可信云计算、网络安全、密码学、内容安全与隐私保护等方向的专题论坛。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 会议中，弘毅班的同学们认真倾听、积极思考，主动与专家交流沟通，表现出了良好的学习状态与专业素质。本次大会内容丰富，为开拓学生专业视野、了解信息安全领域热点问题的研究进展与思路，帮助学生进一步凝练与梳理自身的研究重点与方向，提供了良好的机遇，对培养高水平的计算机学科拔尖人才意义重大。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p align=\"center\" style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">\r\n <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140918103526179.jpg\" />\r\n</p>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411112502', '1411112502', '1410853267', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('24', '16', '“可信软件的构造方法与技术”成果获2014年湖北省科技进步一等奖', '1', '', '“可信软件的构造方法与技术”成果获2014年湖北省科技进步一等奖', '<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp; &nbsp; &nbsp; &nbsp; 2014年湖北省科技奖励评审结果出炉，由我院何炎祥教授主持、联合天津大学共同完成的“可信软件的构造方法与技术”获得湖北省科技进步一等奖。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本成果在国家自然科学基金“可信软件基础研究”重大研究计划重点项目、973计划、863计划和湖北省自然科学基金重点项目等资助下，针对可信软件的需求建模与验证、设计与实现、测试与评估展开系统深入研究，提出了一整套可信软件的构造方法和技术，构造了一个可验证的微型编译器，提出了一个基于可信链思想的可信软件开发过程模型，设计并实现了可信软件开发集成工具平台，为可信软件构造的各个阶段提供有力支撑。&nbsp;</span><br style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#295279;font-family:Arial;font-size:medium;line-height:22px;white-space:normal;background-color:#FFFFFF;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 本项目已成功应用于瑞达信息安全产业股份有限公司等近十家企业的软件开发项目，创造经济效益达9303万元，取得了良好的经济和社会效益。面向云环境的系统行为采集与保护实验平台的核心技术被华为公司采用。为上海海尔集成电路有限公司所开发的编译器是目前国内唯一经过商业化验证的C编译器。本成果申请国家发明专利22项，获批9项。申请并获得软件著作权14项。发表学术论文160多篇，其中，SCI&nbsp;索引24篇，EI索引110余篇。评审专家一致认为该成果创新特色明显，整体达到国际先进水平，关键技术处于国际领先。</span>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '1', '1', '1411112590', '1411112590', '1410853352', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('11', '16', '计算机学院2014年优秀大学生暑期夏令营开营', '1', '', '', '<div class=\"ConShow\">\r\n <span style=\"font-size:small;font-family:Arial;\">7月9日下午，武汉大学计算机学院2014年优秀大学生暑期夏令营开营仪式在学院会议室隆重举行。学院党委书记沃闻达、院长胡瑞敏教授、院党委副书记胡俊英、副院长彭智勇、应时、彭正明以及学院梁意文教授、黄传河教授、肖春霞教授出席了开营仪式，仪式由胡俊英副书记主持。<br />\r\n <p align=\"center\">\r\n  <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140711092750319.jpg\" /> \r\n </p>\r\n&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n沃闻达书记代表学院向各位营员的到来表示诚挚的问候和热烈欢迎，他表示本次夏令营活动旨在拉近广大青年学子的距离，促进优秀大学生之间的交流与互动，增进青年学生对计算机相关学科学习、研究的兴趣和对武汉大学计算机学院的了解，希望大家珍惜短暂时光，交织学术理想，编织朋友情谊。 <br />\r\n <p align=\"center\">\r\n  <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140711092802205.jpg\" /> \r\n </p>\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n胡瑞敏院长向各位营员介绍了武汉大学美丽的校园环境、计算机学院舒适的学习环境、一流的科研设备、完整的学科架构、雄厚的师资力量、齐全的专业设置、超强的科研实力、精细的人才培养方案、丰硕的人才培养成果以及活跃的对外交流，鼓励大家在本次夏令营取得优异成绩，欢迎各位营员报考武汉大学计算机学院。 <br />\r\n <p align=\"center\">\r\n  <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/2014071109281422.jpg\" /> \r\n </p>\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n开营仪式后，副院长彭智勇教授做了题为“海量复杂数据管理新技术”的学术报告，教育部新世纪人才计划获得者肖春霞教做了题为“内容敏感的视频缩放与摘要”的学术报告。两场报告瞄准学术前沿，内容高端，拓宽了同学们的学术视野。 <br />\r\n <p align=\"center\">\r\n  <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140711092830568.jpg\" /> \r\n </p>\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n为了更好的扩大学院的知名度和影响力，发挥政策优势，本届暑期夏令营适度扩大了规模与营员范围，吸引了来自武汉大学、吉林大学、大连理工大学、东北大学、中国海洋大学等985、211与部分重点高校的202名优秀本科生报名参加。为期3天的夏令营活动内容充实，包括知名专家学术讲座，学院研究所与科研基地导航、优秀营员考核等，活动将增进不同学校的学生对我院的了解，力求从政策层面提高我院研究生的生源质量，促进研究生培养质量的提升。</span> <br />\r\n</div>\r\n<br />', '', 'http://localhost/', '', '', '', '0', '0', '', '0', '0', '1410962210', '1411111537', '1405000589', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('12', '16', '全国大学生信息安全竞赛我院代表队再创佳绩', '1', '', '', '<div class=\"ConShow\">\r\n <p>\r\n  <span style=\"font-size:small;font-family:Arial;\">7月21日，2014年全国大学生信息安全竞赛（第七届）在武汉落下帷幕，由我院本科生组成的7支代表队代表武汉大学与来自全国各高校代表队同场竞技，共获得一等奖2项、二等奖4项、三等奖1项，叶登攀、宋伟两位老师获优秀指导教师奖，我校总体成绩位居全国前列，被大赛组委会授予“优秀组织奖”。 <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n本次比赛是计算机学院第七次代表学校参加全国总决赛，来自全国112所高校的631支队伍报名参加大赛，最终有135件作品入选决赛。经过两天的展示与评比，朱吉祥、罗纯龙、欧阳坤、郑棉仑的作品《基于情景感知的移动平台的访问控制技术》（指导老师：叶登攀），丁路潇、刘炟呈、李晓娟、聂孜析的作品《基于全同态加密的可信云数据库系统》（指导老师：宋伟），得到评委高度评价，最终获得全国一等奖。 <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n本次大赛由教育部高教司和工信部信息安全协调司指导，教育部高等学校信息安全专业教学指导委员会主办，海军工程大学承办，旨在为培养、选拔、推荐优秀信息安全专业人才创造条件，促进高等学校信息安全学科课程体系、教学内容和方法的改革，培养学生的创新意识与团队合作精神，普及信息安全知识。 <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 据悉，第八届全国大学生信息安全竞赛将在东北大学举行。 </span> \r\n </p>\r\n <p>\r\n  <span style=\"font-size:small;font-family:Arial;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n（通讯员：崔竞松）<br />\r\n</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-family:Arial;\"><span style=\"font-size:small;\"><b>获奖队伍作品及人员列表：</b><b></b></span></span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-family:Arial;\"><span style=\"font-size:small;\"><b>一等奖：</b><b></b></span></span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-size:small;font-family:Arial;\">1、基于情景感知的移动平台的访问控制技术，队员：朱吉祥、罗纯龙、欧阳坤、郑棉仑，指导老师：叶登攀</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-size:small;font-family:Arial;\">2、基于全同态加密的可信云数据库系统，队员：丁路潇、刘炟呈、李晓娟、聂孜析，指导老师：宋伟</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-family:Arial;\"><span style=\"font-size:small;\"><b>二等奖：</b><b></b></span></span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-size:small;font-family:Arial;\">1、云平台KVM虚拟化条件下Zeus僵尸网络检测系统系统，队员：杜雪莹、吴凯琳、杨超、吴越，指导老师：崔竞松</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-size:small;font-family:Arial;\">2、基于控制意图感知的网络木马检测系统，队员：于慧、王至前、马琳、苏通，指导老师：彭国军</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-size:small;font-family:Arial;\">3、面向数字压缩音频的被动篡改检测系统，队员：范梦迪、赵思寒、高雄智、吴兴超，指导老师：任延珍</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-size:small;font-family:Arial;\">4、基于OpenFlow的SDN智能防火墙系统，队员：王江、林武桃、焦虹阳、陈诗雅，指导老师：王鹃</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-family:Arial;\"><span style=\"font-size:small;\"><b>三等奖：</b><b></b></span></span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-size:small;font-family:Arial;\">1、通用接口侧信道安全评测系统，队员：张纪杨、陈镇霖、陈小兵、李思政，指导老师：唐明</span> \r\n </p>\r\n <p align=\"left\">\r\n  <span style=\"font-family:Arial;\"><span style=\"font-size:small;\"><b>优秀指导教师奖：</b>叶登攀、宋伟。</span></span> \r\n </p>\r\n <p align=\"center\">\r\n  <img border=\"0\" src=\"http://cs.whu.edu.cn/cs2011/uploadfile/EditFile/20140723090955486.jpg\" /> \r\n </p>\r\n<br />\r\n</div>\r\n<br />', '', 'http://localhost/', '', '', '', '0', '0', '', '0', '0', '1410962233', '1411111558', '1406037417', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('13', '16', '我院成功举办2014大数据与未来计算论坛', '1', '', '', '<div class=\"ConShow\">\r\n <span style=\"font-size:small;font-family:Arial;\">17日上午，由武汉大学计算机学院承办的“2014大数据与未来计算论坛”在武汉东湖宾馆隆重召开。此次会议的主题是：大数据与未来计算—现状、&nbsp;挑战、&nbsp;对策。包括两院院士李德仁、中国科学院院士怀进鹏在内的100余位国内专家学者和精英企业家、政府官员以及来自国外的20位未来计算领域的顶级科学家参与了此次论坛。大会发布了《大数据与社会﹒东湖宣言》，武汉市副市长邵为民、武汉大学校长冯友梅共同为“武汉大数据发展战略研究院”揭牌。 <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n“未来计算论坛（FFC）”由中国工程院院士、中南大学校长、我国著名计算机科学家张尧学教授于2007年倡导发起，至今已举办7届。论坛致力于对未来计算的前沿领域、方向、问题及理论、方法、技术等进行研讨，以期揭示未来计算领域的学科前沿和发展动向，为未来一段时间指明发展方向，还为推动政界、学术界和企业界的深层次合作和发展创造条件。未来计算论坛因其前瞻性、高端性、权威性，已经成为我国计算机科教领域具有重要影响的活动。 <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n近日，武汉市政府正式发布《武汉市大数据产业发展行动计划（2014-2018年）》，提出未来5年武汉市将构建两个大数据产业园，八个云数据中心,多个重点领域大数据交易平台，形成&nbsp;“2+8+N”的大数据产业发展格局。 <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n为共同推进大数据与未来计算发展，本届论坛专门设置“院士论坛”、“企业家论坛”、“青年论坛”等分论坛，聚焦大数据与未来计算，关注武汉市大数据产业发展。两院院士李德仁，澳门大学校长、国际欧亚科学院院士赵伟代表国内外院士，中国移动研究院首席科学家杨景分别代表科学家和企业家作了专题演讲。与会各方提出：大数据产业涉及大数据科学、大数据技术、大数据工程和大数据应用等领域，应在大数据计算架构、大数据安全与隐私、大数据分析、大数据深度学习、大数据智能、大数据应用技术等共性技术方面加强国际合作，以求共同推进大数据基础技术的进步。高等院校应发挥引领作用，前瞻性地规划和实施人才培养计划，为大数据产业培养和输送有竞争力的大量人才。政府应发挥资源优势，大力引进大数据高端人才，搭建良好的大数据人才发展环境。武汉市政府借此向全球大数据科技界与产业界精英发出邀请，共同参与武汉市大数据产业发展。</span> <br />\r\n</div>\r\n<br />', '', 'http://localhost/', '', '', '', '0', '0', '', '1', '1', '1410962252', '1411111739', '1408456642', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('14', '16', '我院两篇论文被智能交通系统国际顶级会议录用', '1', '', '', '<div class=\"ConShow\">\r\n <span style=\"font-size:small;font-family:Arial;\">日前，我院胡文斌副教授课题组撰写的二篇论文被IEEE智能交通系统国际会议录用。第17届IEEE智能交通系统国际会议（The&nbsp;17th&nbsp;International&nbsp;IEEE&nbsp;Conference&nbsp;on&nbsp;Intelligent&nbsp;Transportation&nbsp;Systems，&nbsp;ITSC’&nbsp;2014）将于2014年10月在中国青岛召开，胡文斌副教授课题组硕士生王欢和博士生严丽平撰写的2篇论文《An&nbsp;Actual&nbsp;Urban&nbsp;Traffic&nbsp;Simulation \r\n&nbsp;Model&nbsp;for&nbsp;Predicting &nbsp;and&nbsp;Avoiding&nbsp;Traffic&nbsp;Congestion》、 \r\n《Traffic&nbsp;Jams&nbsp;Prediction&nbsp;Method&nbsp;based&nbsp;on&nbsp;Two-dimension&nbsp;Cellular&nbsp;Automata&nbsp;Model》被录用，论文通讯作者为胡文斌副教授。 <br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n近年来，随着城市的快速机动化进程，交通阻塞在交通安全、城市环境等方面带来了极大的负面作用，如何解决交通阻塞已成为交通研究的热点领域。智能交通系统（ITS）是将先进的信息技术、数字通讯传输技术、电子传感技术、电子控制技术及计算机处理技术等有效地集成运用于整个地面交通管理系统而建立的一种在大范围内、全方位发挥作用的、实时、准确、高效的综合交通运输管理系统。ITS可以有效地降低交通拥堵所带来的不良后果，交通流建模与仿真则是ITS技术应用的理论基础。胡文斌老师课题组在著名BML（Biham,&nbsp;Middleton&nbsp;and&nbsp;Levine）模型的基础上，提出一种有效地将实际路网映射到BML模型的方法，在解决冲突点和模糊点的基础上，通过拥堵点规避算法提高交通拥堵规避和路线规划。&nbsp;<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IEEE国际智能交通系统会议（IEEE&nbsp;ITSC）是国际电气电子工程师学会智能交通系统学会（IEEE&nbsp;ITSS）的年会，以支持把通信、计算机和控制等领域的先进技术应用于智能交通系统的基础和应用研究，是该领域最高学术水平的国际会议。会议录用论文将会被推荐到IEEE智能交通系统会刊（IEEE&nbsp;Transaction&nbsp;on&nbsp;Intelligent&nbsp;Transportation&nbsp;Systems）上发表（IF=&nbsp;2.472）。</span> \r\n</div>\r\n<br />', '', 'http://localhost/', '', '', '', '0', '0', '', '1', '1', '1410962276', '1411111624', '1406901459', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('25', '16', '【转发】关于开展2014年实验教学中心开放实验项目及2013年实验技术项目中期检查工作的通知', '1', '', '【转发】关于开展2014年实验教学中心开放实验项目及2013年实验技术项目中期检查工作的通知', '<h3 style=\"margin:0px;padding:8px 0px 0px;font-family:宋体, Arial, Helvetica, sans-serif;font-size:14px;font-weight:lighter;line-height:28px;color:#454545;white-space:normal;background-color:#FFFFFF;\">\r\n <span style=\"margin:0px;padding:0px;font-family:宋体;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;武大设函<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">[2014]<span style=\"margin:0px;padding:0px;color:black;\">28</span></span>号</span>\r\n <p class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:6pt;padding:0px;\">\r\n  <b style=\"margin:0px;padding:0px;\"><span style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;\">各有关院（系）实验教学中心、项目负责人：</span></b>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:30pt;line-height:21px;\">\r\n  <span style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\">按照“项目申报，专家论证，合同管理，跟踪建设，严格验收，效益评估”的原则，为做好实验教学中心开放实验项目及实验技术项目建设工作，经研究，决定对各院（系）实验教学中心承担的<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">2014</span>年开放实验项目和<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">2013</span>年实验技术项目进行中期检查。现就有关事项通知如下：</span>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:30pt;line-height:21px;\">\r\n  <span style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\">一、请各有关项目负责人结合原申报书及责任书，认真填写实验教学中心开放实验项目及实验技术项目中期执行情况自查表（见附件），做好项目自查工作。自查重点内容包括：项目执行进度、已经取得的阶段性成效或成果、下一步研究计划、经费开支情况、项目研究存在的问题及解决方案等。自查表（一式三份）经主管院领导签字盖章后，于<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">9</span>月<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">26</span>日前交实验室建设与管理办公室，同时将电子版发送至：<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">guanli@whu.edu.cn</span>。</span>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:30pt;line-height:21px;\">\r\n  <span style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\">二、中期检查按照院系自查、现场检查两个步骤进行。自查时间：<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">9</span>月<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">15</span>日<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">—25</span>日；检查时间：<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">10</span>月<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">9</span>日，由实验室与设备管理处组织专家到各项目单位或项目组进行现场检查。现场检查重点包括：项目管理情况、查看已有成果实物、新技术新方法推广应用、经费使用各种记录等。</span>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:30pt;line-height:21px;\">\r\n  <span style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\">三、各有关院系要重视本次检查工作，进一步加强领导，做好自查工作。本次中期检查情况将作为下期同类建设项目申报立项的重要参考依据。</span>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:30pt;line-height:21px;\">\r\n  <span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\"><span style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:274.7pt;line-height:21px;\">\r\n  <span style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;实验室与设备管理处</span>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:30pt;line-height:21px;\">\r\n  <span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\"><span style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>2014</span><span style=\"margin:0px;padding:0px;font-family:宋体;font-size:14pt;line-height:28px;\">年<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">9</span>月<span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\">15</span>日</span>\r\n </p>\r\n <p align=\"left\" class=\"MsoNormal\" style=\"margin-top:0px;margin-bottom:0px;padding:0px;text-indent:30pt;line-height:21px;\">\r\n  <span lang=\"EN-US\" style=\"margin:0px;padding:0px;font-family:宋体;\"><span style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;\"><img border=\"0\" alt=\"文件类型: .docx\" src=\"http://lab.whu.edu.cn/e/data/images/downfile.jpg\" style=\"margin:0px;padding:0px;vertical-align:baseline;\" /><a target=\"_blank\" title=\"附件：实验中心开放实验项目、实验技术项目中期执行情况自查表.docx\" href=\"http://lab.whu.edu.cn/d/file/tzgg/2014-09-15/79507ed811b34e88f384a2ae2d509434.docx\" style=\"margin:0px;padding:0px;color:#454545;text-decoration:none;\">附件：实验中心开放实验项目、实验技术项目中期执行情况自查表.docx</a>&nbsp;(12.84 KB)</span></span>\r\n </p>\r\n</h3>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '1', '1', '1411113338', '1411113338', '1410940423', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('26', '17', '《武汉大学实验室技术安全管理办法》', '1', '', '《武汉大学实验室技术安全管理办法》', '<h3 style=\"margin:0px;padding:8px 0px 0px;font-family:宋体, Arial, Helvetica, sans-serif;font-size:14px;font-weight:lighter;line-height:28px;color:#454545;white-space:normal;background-color:#FFFFFF;\">\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:22pt;\">武汉大学实验室技术安全管理办法</span>\r\n </div>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;\">\r\n  &nbsp;\r\n </div>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第一章&nbsp;总则</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第一条&nbsp;为进一步加强武汉大学实验室技术安全管理，防止安全事故发生，保证学校教学、科研工作的正常进行，维护师生员工切身利益，根据国家《危险化学品安全管理条例》（国务院令第344号）、《病原微生物实验室生物安全管理条例》（国务院令第424号）、《易制毒化学品管理条例》（国务院令第445号）、《放射性同位素与射线装置安全和防护条例》（国务院令第449号）、《关于加强学校实验室排污管理的通知》（教技2005[3]号）等法律法规，制定本办法。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第二条&nbsp;本办法中的实验室是指全校开展教学、科研活动的实验场所。实验室技术安全工作包括危险化学品的安全管理、生物安全管理、麻醉药品和精神药品管理、辐射安全管理、实验废弃物安全管理、实验室安全设施建设及环境保护等方面的工作。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第三条&nbsp;实验室技术安全管理工作必须贯彻“安全第一、预防为主”和“谁主管、谁负责”的方针。学校所有院（系）所属实验室、国家（部）重点实验室以及各放射性物质使用场所均适用本办法。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  &nbsp;\r\n </div>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第二章&nbsp;实验室技术安全管理体系与职责</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第四条&nbsp;实验室技术安全管理是学校安全稳定工作的重要组成部分，实行校、院（系）、实验中心（实验室）三级管理。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第五条&nbsp;学校设立武汉大学实验室技术安全管理领导小组，学校有关领导担任组长，成员由人事部、保卫部、科学技术发展研究院、人文社会科学研究院、学生工作部、研究生工作部、基建管理部、实验室与设备管理处等职能部门分管领导和相关专业技术领域专家组成，主要负责监督、指导全校实验室技术安全管理工作以及协调解决实验室技术安全工作中的重要事项。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第六条&nbsp;实验室与设备管理处是学校实验室技术安全的归口管理部门，下设实验室安全管理办公室，全面负责全校实验室技术安全管理的日常工作。主要职责有：</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">贯彻落实国家和湖北省有关政策法规，制定学校实验室安全管理相关规章制度并监督执行；负责全校实验室技术安全监督检查与安全教育工作，督促指导各实验室结合学科专业特点开展相关宣传教育及培训活动；负责全校实验室剧毒（易制毒）危险化学品、放射性同位素、麻醉药品和精神药品的购买审批工作，对存放保管、使用过程、后期处置进行监督与检查；负责全校放射性同位素及射线装置的剂量监督和安全防护工作，协助各级环保部门进行辐射安全监测和评估等工作；负责学校辐射从业人员的安全培训、个人剂量检测及职业健康检查，管理从业人员营养保健津贴；负责学校危险化学品仓库和实验废弃物中转站的安全管理，督促、指导学校各实验室做好特种技术设备的安全管理；协助保卫部做好实验室日常安全的督促、检查和指导工作；协助基建管理部做好实验室环境保护及实验废弃物处置工作。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第七条&nbsp;学院（系）、重点实验室等二级单位主要负责人是各单位实验室技术安全第一责任人，分管实验室安全工作的副院长（副主任）是各单位实验室技术安全直接责任人。各单位成立实验室安全管理工作小组，设置专、兼职管理人员具体负责本单位实验室技术安全管理日常工作。主要职责有：</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">制定、完善本单位实验室技术安全管理规章制度，建立本单位实验室技术安全责任体系；结合本单位学科专业特点，对新建实验室或新增科研实验项目开展实验室技术安全评估；开展实验室安全教育，执行实验室准入制度；制定《实验室安全事故应急预案》，定期组织实验室安全应急演练；定期组织实验室安全检查与评估，及时整改安全隐患；贯彻落实上级有关政策要求，自觉接受上级有关部门的监督和检查。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第八条&nbsp;实验中心（实验室）负责人或科研项目组负责人是所在实验室的安全责任人，全面负责本中心（实验室）的技术安全工作。主要职责有：依据本中心（实验室）特点和实验项目性质制订、完善实验操作规程；做好实验室的日常安全管理工作；配合上级有关部门要求做好安全信息数据上报工作。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第九条&nbsp;进入实验室工作和学习的人员，均需通过相应的技术安全教育和考核；进入实验室后必须严格按照实验操作规程开展实验，并配合做好实验室技术安全工作；学生导师要切实加强对学生的教育和管理，落实安全措施与责任。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  &nbsp;\r\n </div>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第三章&nbsp;实验室技术安全管理工作</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十条&nbsp;危险化学品的安全管理。危险化学品是指按照国家有关标准规定的剧毒、易燃易爆、易制毒、易制爆等化学品。各实验室要按照国家有关法律法规以及学校相关规定，加强涉及危险化学品的教学、实验、科研和生产场所及其流通环节的安全监督与管理，包括购买、运输、存贮、使用、生产、销毁等过程。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">学校危险化学品仓库和实验废弃物中转站由实验室与设备管理处负责管理，实行严格的出入库、领用、回收和处置管理制度，规范各项业务流程和办理手续，并按照公安、环保部门要求做好安全防护和应急处理工作。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十一条&nbsp;辐射安全管理。辐射安全主要包括放射性同位素（密封放射源和非密封放射性物质）和射线装置的安全。各涉辐单位必须在学校备案，并按照国家有关法律法规和学校相关规定，在获取环保部门颁发的《辐射安全许可证》后方能开展相关工作；要加强涉辐场所安全及警示设施的建设，加强辐射装置和放射源的采购、保管、使用、备案等管理，规范涉辐废弃物的处置；配合学校做好实验场所的安全防护和环境监测工作；配合学校环保办、上级环境保护部门做好环境保护评估与验收工作；从业人员需定期参加辐射安全与防护知识培训，持证上岗；要做好放射性从业人员定编定岗与安全防护工作。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十二条&nbsp;生物安全管理。生物安全主要涉及病原微生物安全、实验动物安全、转基因生物安全等。各实验室要按照国家有关法律法规以及学校相关规定，规范生化类试剂和用品的采购、实验操作、废弃物处理等工作程序，加强生物类实验室安全的管理，责任到人；加强生物安全实验室的建设、管理和备案工作，获取相应资质。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十三条&nbsp;教学科研用麻醉品和精神药品的安全管理。教学科研用麻醉品和精神药品是指以科学研究或者教学活动为目的，在国家公布的相应品种目录之列的药品。各实验室要按照国家有关法律法规以及学校相关规定，加强非医用麻醉品和精神药品的教学、实验、科研等活动环节的安全监督与管理，包括购买、运输、存贮、使用、销毁等过程。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十四条&nbsp;实验废弃物安全管理。实验废弃物主要涉及实验过程中产生的三废（废气、废液、废固）物质，实验用剧毒物品（麻醉品、药品）残留物等。各实验室要按照国家有关法律法规以及学校相关规定，加强实验室废弃物管理；要实行分类存放，做好无害化处理、包装和标识，定时交送相应的收集点；要规范实验废弃物处置管理，必须交由有资质的单位进行处置。放射性废弃物严格按照国家环保部门的法律法规进行处置。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十五条&nbsp;安全设施与实验环境管理。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">（一）具有潜在安全隐患的实验室，须根据潜在危险因素配置消防器材（如灭火器、灭火沙、消防栓、防火门、防火闸等），烟雾报警、监控系统、应急喷淋、洗眼装置、危险气体报警、通风系统（必要时需加装吸收系统）、防护罩、警戒隔离等安全设施，配备必要的防护用品，并加强实验室安全设施的管理工作，切实做好更新、维护保养和检修工作，做好相关记录，确保其完好性。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">（二）需要特殊实验环境的实验室，必须在特定环境下进行实验，需要使用有毒物品，气瓶，易燃易爆物等实验器材或化学试剂的实验室，必须在保证实验安全前提下才能开展实验。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">（三）新建、改造、扩建实验室时必须将有害物质、有毒气体的处理列入工程计划一并设计、施工，坚持竣工合格验收制度，病原微生物实验室、同位素室等建设前须按照国家有关规定到有关管理部门备案，许可后方能建设。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  &nbsp;\r\n </div>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第四章&nbsp;实验室技术安全教育与检查</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十六条&nbsp;实验室安全教育的主要任务是宣传贯彻国家有关政策、法律和法规；引导师生员工牢固树立“我懂安全、我要安全、我保安全”的思想意识；提高师生员工自我保护和应对实验室突发安全事故的能力；减少和控制实验室安全事故的危害和影响。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十七条&nbsp;学校结合新生入学教育和新进教职工职业培训，对新生和新进教职工开展实验室安全主题教育；定期组织放射性从业人员的职业培训；负责安全教育工作的指导与检查。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">院（系）作为实验室安全教育主体，应落实本单位实验室安全教育计划，制定本单位实验室事故应急预案。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">教师、实验技术人员和管理人员，要采取多种形式加强对学生的安全教育，研究生导师要切实加强学生在实验过程中的实验室安全教育和监管。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十八条&nbsp;各学院结合学科专业特点和实验室具体安全要求，开展对本院师生员工和其他进入实验室人员的思想教育、法制教育、安全知识教育、安全技能教育以及预防教育等，制定教育计划，设置教育课程，开展应急演练。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第十九条&nbsp;学校根据校、院（系）、实验中心（实验室）三级管理的要求，逐级签订实验室安全责任书。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第二十条&nbsp;实验室与设备管理处会同保卫部、科学技术发展研究院、基建管理部等职能部门定期开展全校实验室安全检查和危险化学品、辐射安全专项检查，并接受上级公安机关、环保部门、卫生部门的指导和检查。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">各学院应定期对本单位实验室安全进行自查，并配合学校和上级有关部门的检查工作，对发现的安全问题及时整改，形成校-院-室三级联动的安全监管体制。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  &nbsp;\r\n </div>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第五章&nbsp;实验室安全事故处理</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第二十一条&nbsp;实验室发生技术安全事故，学院和实验室应立即启动应急预案，采取措施防止事故扩大和蔓延，保护好现场，并及时报告实验室与设备管理处、保卫部和基建管理部，重大险情应立即报警。</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第二十二条&nbsp;发生较严重的事故时，学校成立调查小组进行调查，调查小组向学校提交事故调查报告，分清事故性质和责任，提出处理建议和整改、防范措施。学校有关部门依据事故调查报告，对事故涉及的单位和人员，按照学校有关管理规定处理；触犯法律的由司法机关依法处理。</span><span style=\"line-height:23pt;text-indent:32.8pt;\">&nbsp;</span>\r\n </div>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第六章&nbsp;附&nbsp;则</span>\r\n </div>\r\n <div style=\"margin:0px;padding:0px;line-height:23pt;text-indent:32.8pt;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\">第二十三条&nbsp;本办法由武汉大学实验室与设备管理处负责解释，自发布之日起施行。</span>\r\n </div>\r\n <p style=\"margin-top:0px;margin-bottom:0px;padding:0px;\">\r\n  <span style=\"margin:0px;padding:0px;font-size:16pt;\"><br clear=\"all\" style=\"margin:0px;padding:0px;\" />\r\n</span>\r\n </p>\r\n <div align=\"center\" style=\"margin:0px;padding:0px;text-align:center;line-height:23pt;\">\r\n  <br />\r\n </div>\r\n</h3>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411113653', '1411113653', '1411113407', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('27', '17', '《武汉大学仪器设备管理暂行办法》', '1', '', '《武汉大学仪器设备管理暂行办法》', '<p class=\"p0\" style=\"margin-bottom:0pt;margin-top:0pt;\">\r\n <br />\r\n</p>\r\n<p class=\"p0\" style=\"margin-bottom:0pt;margin-top:0pt;\">\r\n <br />\r\n</p>\r\n<p class=\"p0\" style=\"margin-bottom:0pt;margin-top:0pt;\">\r\n <img border=\"0\" alt=\"文件类型: .docx\" src=\"http://lab.whu.edu.cn/e/data/images/downfile.jpg\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;color:#454545;font-size:14px;line-height:28px;white-space:normal;background-color:#FFFFFF;vertical-align:baseline;\" /><a title=\"武汉大学仪器设备管理暂行办法.docx\" target=\"_blank\" href=\"http://lab.whu.edu.cn/d/file/gzzd/2013-04-03/416fff3508fe59146ea8a3893e10a870.docx\" style=\"margin:0px;padding:0px;font-family:宋体, Arial, Helvetica, sans-serif;color:#454545;text-decoration:none;font-size:14px;line-height:28px;white-space:normal;background-color:#FFFFFF;\">武汉大学仪器设备管理暂行办法.docx</a><span style=\"color:#454545;font-family:宋体, Arial, Helvetica, sans-serif;font-size:14px;line-height:28px;white-space:normal;background-color:#FFFFFF;\">&nbsp;(6.16 MB)</span>\r\n</p>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411114012', '1411114012', '1411113704', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('28', '17', '《武汉大学大型仪器设备开放共享补贴办法（试行）》', '1', '', '《武汉大学大型仪器设备开放共享补贴办法（试行）》', '<a href=\"http://cs.51snet.cn/data/attachment/file/20140919/97df78c788a2a15c66d664dcc63c9c57.docx\" target=\"_blank\">武汉大学大型仪器设备开放共享补贴办法（试行）</a>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411114218', '1411114258', '1411114168', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('29', '17', '《武汉大学大型仪器设备维修费使用管理办法（试行）》', '1', '', '《武汉大学大型仪器设备维修费使用管理办法（试行）》', '<a href=\"http://cs.51snet.cn/data/attachment/file/20140919/f919046055476788957b323c6a8b7026.docx\" target=\"_blank\">《武汉大学大型仪器设备维修费使用管理办法（试行）》</a>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411114719', '1411114719', '1411114651', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('30', '17', '《武汉大学加强大型仪器设备开放共享实施办法》', '1', '', '《武汉大学加强大型仪器设备开放共享实施办法》', '<a href=\"http://cs.51snet.cn/data/attachment/file/20140919/eaa06ab48eee0dc6e10aedb788b75c30.doc\" target=\"_blank\">《武汉大学加强大型仪器设备开放共享实施办法》</a>', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '0', '0', '1411114843', '1411114862', '1411114791', '', '999', '1', 'zh_cn');
INSERT INTO syjx_article VALUES ('31', '17', '仪器设备管理工作流程', '1', '', '仪器设备管理工作流程', '<a href=\"http://cs.51snet.cn/data/attachment/file/20140919/9b70bd5f684c3f0f46a2c0a1f54ca0f1.docx\" target=\"_blank\">仪器设备管理工作流程</a><br />', '', 'http://cs.51snet.cn/', '', '', '', '0', '0', '', '3', '3', '1411115047', '1411115090', '1411114920', '', '999', '1', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_ask`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_ask`;
CREATE TABLE `syjx_ask` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `keywords` varchar(120) NOT NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `alt` varchar(255) default NULL,
  `color` char(7) NOT NULL,
  `isbold` tinyint(1) NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `recommends` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `realhits` int(10) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `puttime` int(10) unsigned NOT NULL default '0',
  `tpl` varchar(20) NOT NULL,
  `listorder` int(10) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`),
  KEY `recommend` (`recommends`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_ask
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_category`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_category`;
CREATE TABLE `syjx_category` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `parent` mediumint(8) unsigned NOT NULL default '0',
  `lft` mediumint(9) unsigned NOT NULL,
  `rht` mediumint(9) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `nameen` varchar(100) default NULL,
  `isexternal` tinyint(1) NOT NULL default '0',
  `externalurl` varchar(255) NOT NULL,
  `target` varchar(10) NOT NULL default '_self',
  `dir` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `model` varchar(20) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `alt` varchar(255) default NULL,
  `content` text NOT NULL,
  `color` char(7) NOT NULL,
  `tpllist` varchar(20) NOT NULL,
  `tpldetail` varchar(20) NOT NULL,
  `pagesize` tinyint(4) unsigned NOT NULL,
  `isnavigation` tinyint(1) unsigned NOT NULL default '1',
  `isdisabled` tinyint(1) unsigned NOT NULL default '0',
  `listorder` tinyint(4) unsigned NOT NULL default '99',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `parent` (`parent`),
  KEY `lang` (`lang`),
  KEY `dir` (`dir`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_category
-- ----------------------------
INSERT INTO syjx_category VALUES ('1', '0', '1', '14', '中心概况', '', '1', '/index.php/category/about', '_self', 'zxgk', '', '', '', 'page', '', '0', '', '', '', '', '0', '1', '1', '1', 'zh_cn');
INSERT INTO syjx_category VALUES ('2', '0', '15', '24', '实验资源', '', '0', '', '_self', 'syzy', '', '', '', 'page', '', '0', '', '', '', '', '0', '1', '0', '2', 'zh_cn');
INSERT INTO syjx_category VALUES ('3', '0', '25', '34', '实验平台', '', '0', '', '_self', 'sypt', '', '', '', 'page', '', '0', '', '', '', '', '0', '1', '0', '3', 'zh_cn');
INSERT INTO syjx_category VALUES ('4', '0', '35', '42', '师资队伍', '', '1', '/index.php/category/teacher', '_self', 'zsdw', '', '', '', 'product', '', '0', '', '', '', '', '0', '1', '1', '4', 'zh_cn');
INSERT INTO syjx_category VALUES ('6', '0', '43', '50', '合作共享', '', '0', '', '_self', 'share', '', '', '', 'article', '', '0', '', '', '', '', '0', '1', '0', '6', 'zh_cn');
INSERT INTO syjx_category VALUES ('7', '0', '51', '58', '成果转化', '', '0', '', '_self', 'cgzh', '', '', '', 'article', '', '0', '', '', '', '', '0', '1', '0', '7', 'zh_cn');
INSERT INTO syjx_category VALUES ('8', '0', '59', '60', '下载中心', '', '0', '', '_self', 'download', '', '', '', 'down', '', '0', '', '', '', '', '0', '1', '0', '8', 'zh_cn');
INSERT INTO syjx_category VALUES ('9', '0', '61', '70', '服务指南', '', '1', '/index.php/category/sxzn', '_self', 'service', '', '', '', 'page', '', '0', '', '', '', '', '0', '1', '0', '9', 'zh_cn');
INSERT INTO syjx_category VALUES ('10', '0', '71', '78', '中心动态', '', '1', '/index.php/category/news', '_self', 'zxdt', '', '', '', 'article', '', '0', '', '', '', '', '0', '1', '1', '10', 'zh_cn');
INSERT INTO syjx_category VALUES ('11', '0', '79', '80', '虚拟仿真实验平台入口页面', '', '0', '', '_self', 'info', '', '', '', 'page', '', '0', '<img src=\"http://cs.51snet.cn/data/template/default/images/btn.jpg\" width=\"578\" height=\"52\" border=\"0\" usemap=\"#Map\" /> \r\n<map name=\"Map\" id=\"Map\">\r\n	<area shape=\"rect\" coords=\"-3,1,181,55\" href=\"http://cs.51snet.cn/index.php/category/student\" />\r\n          <area shape=\"rect\" coords=\"198,8,380,61\" href=\"http://cs.51snet.cn/entry.html\" />\r\n          <area shape=\"rect\" coords=\"398,9,580,85\" href=\"http://cs.51snet.cn/entry2.html\" />\r\n</map>\r\n<br />\r\n<p>\r\n	&nbsp; &nbsp; 网络安全虚拟仿真实验教学包括基础性实验、专业课实验、综合实验以及科研创新实验等四个部分组成。教学平台入口http://cslab.whu.edu.cn，如图3所示基本功能模块包括上述四个组成部分，其中基础性实验、专业性实验、综合性共计26个模块，126个实验项目，涵盖了网络安全中各种常见的实验，适用于计算机科学与技术、信息安全、物联网工程、仿真科学与技术、软件工程等专业方向的本科生《计算机网络》、《网络安全》、《数据库安全》、《信息隐藏》等20门专业必修课，《恶意代码（计算机病毒）分析与防范》、《Internet应用安全》、《上网安全与信息安全意识》、《计算机网路工程设计与实践》等6门全校通识课的实验教学。虚拟仿真实验教学中心每年为本科生开设26门实验课程，涉及32个本科专业，约为1530名本科生服务，实验人机时约为17.5万。\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"http://cs.51snet.cn/data/attachment/image/20140922/5720fdb8eccf6f17f995ecd5fc6c53df.png\" alt=\"\" style=\"text-align:center;line-height:1.5;\" />\r\n</p>\r\n<img src=\"http://cs.51snet.cn/data/template/default/images/btn.jpg\" width=\"578\" height=\"52\" border=\"0\" usemap=\"#Map\" /> \r\n<map name=\"Map\" id=\"Map\">\r\n	<area shape=\"rect\" coords=\"-3,1,181,55\" href=\"http://cs.51snet.cn/index.php/category/student\" />\r\n          <area shape=\"rect\" coords=\"198,8,380,61\" href=\"http://cs.51snet.cn/entry.html\" />\r\n          <area shape=\"rect\" coords=\"398,9,580,85\" href=\"http://cs.51snet.cn/entry2.html\" />\r\n</map>', '', '', 'page_info', '0', '1', '0', '11', 'zh_cn');
INSERT INTO syjx_category VALUES ('12', '1', '2', '3', '中心简介', '', '0', '', '_self', 'about', '', '', '', 'page', '', '0', '<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;\"> </span> \r\n</p>\r\n<p class=\"p0\" style=\"margin-bottom:0pt;margin-top:0pt;\">\r\n	<span style=\"line-height:1.5;\">&nbsp; &nbsp; 武汉大学网络安全虚拟仿真实验教学中心在计算机实验教学中心的支持下，主要承担本科生的信息安全方向及相关的实验课程，以及面向校内外的网络安全实验资源开放共享服务。虚拟仿真实验教学包括基础性实验、专业课实验、综合实验以及科研创新实验等四个部分虚拟仿真实验资源组成。</span><span style=\"line-height:1.5;text-indent:24pt;\"></span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">网络安全虚拟仿真中心采用物联网、云计算、大数据技术、高速网络、智能计算等新技术，建立统一的实验云平台，打破不同操作系统、不同版本、不同网络接口支持的仿真系统软件信息壁垒，由服务器集群进行实验资源的多层次共享。无论校内外，师生统一登录访问cslab.whu.edu.cn&nbsp;域名，以B/S&nbsp;方式进入网络安全虚拟仿真实验教学中心，进行实验及学习。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">采用虚拟现实技术、多媒体技术、数字仿真技术、服务器集群技术、高速网络等现代最新成果，在已建设成功的、功能强大的校园网IPV6&nbsp;支持下，由10G光纤通信，连接实验云平台及计算机实验教学中心各实验室、校内科研平台与基地、校内外各实验终端。高速校园网系统100%覆盖全校，服务器存储容量达到200T，可满足多达3000人同时实验。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">武汉大学计算机学科架构齐全，为中心实验平台的建设提供学科前沿技术支撑，提供软件工程、多媒体技术、可信计算、空天信息技术、计算机软件、计算机应用、计算机工程等技术支持。每年我校有大量的、高水平的“863”、“973”、国家自然科学基金等项目的科研成果，转化为中心的实验教学优势。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">遵照《高等院校信息安全专业指导性专业规范》以及专业的实践能力体系（主要包含软件系统实践能力领域、硬件系统实践能力领域、密码学实践能力领域、网络安全实践能力领域、信息内容安全实践能力领域、创新实践能力领域）和实践教学体系的内容，武汉大学积极探索专业规范的落实情况与实践教学资源的建设，在计算机实验教学中心及信息安全实验室长期建设的基础上成立网络安全虚拟仿真实验教学中心，建成“网络安全虚拟仿真实验云平台”，其体系架构如图1所示。</span><o:p></o:p>\r\n</p>\r\n<span style=\"font-family:SimSun;\"> \r\n<div style=\"text-align:center;\">\r\n	<span style=\"line-height:1.5;\"></span><img src=\"http://cs.51snet.cn/data/attachment/image/20140922/d0d1deb1fe4828b4f079ed0d5a1f8240.png\" alt=\"\" style=\"line-height:1.5;\" /> \r\n</div>\r\n</span> \r\n<p class=\"p18\" style=\"text-align:center;margin-bottom:0pt;margin-top:0pt;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">图&nbsp;1&nbsp;网络安全虚拟仿真实验云平台</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">武汉大学“网络安全虚拟仿真实验教学中心”基于高性能计算系统搭建了网络安全虚拟仿真实验教学平台。该高性能计算系统由曙光集群、HP集群、HP&nbsp;SMP大型机、GPU集群、存储系统组成。其中，</span><span style=\"font-family:SimSun;line-height:1.5;\">&nbsp;</span><span style=\"font-family:SimSun;line-height:1.5;\">曙光集群的峰值计算能力为19.64TFlops，包括93个计算节点、6个I/O节点、2个管理节点，每个节点2个CPU，每个CPU&nbsp;12核，主频2.2GHz，节点内存128GB。节点由40Gbps的IB交换机互联。</span><span style=\"font-family:SimSun;line-height:1.5;\">&nbsp;&nbsp;</span><span style=\"font-family:SimSun;line-height:1.5;\">HP集群的峰值计算能力为2.675Tflops，包括76个计算节点、10个I/O、2个管理节点，每个节点2个CPU，每个CPU&nbsp;2核，主频2.2GHz，节点内存4GB，节点由10Gbps的IB交换机互联。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">利用云计算平台可重构、资源虚拟化等特点，网络安全虚拟仿真实验云能够仿真多样化的网络环境，克隆多个网络安全实验环境，已解决网络安全实验的独占性和不可逆性等问题。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">在基于高性能计算网格的云计算平台上，凭借云计算平台的强大计算能力以及云计算中的资源虚拟化优势，网络安全虚拟仿真实验云能够仿真多样化的网络环境，克隆多样化的网络安全实验环境，解决了网络安全实验的独占性和不可逆性等问题。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">在网络安全虚拟仿真实验云的支撑层，我们构建并建设了多种硬件及系统仿真，比如网络拓扑仿真软件、硬件防火墙仿真软件等，克服网络安全实验设备昂贵，维护费时费力等问题。支撑层构建了一个虚拟仿真教学资源构件库平台，构件库包含基础环境构建库（包括网络拓扑结构、网络协议、操作系统、应用软件等）和信息安全资源构建库（包括密码、漏洞、恶意样本、防火墙等各类虚拟设备等）两类。该平台是整个虚拟仿真实验的软件基础。用户可以在该平台上按照标准接口自行设计和构建虚拟仿真教学资源。在实验教学时，可根据要求，组合各类构件资源形成虚拟仿真实验环境。学生即可在此环境下进行实验，平台亦提供教学管理功能，可自动对学生实验进行批判、打分。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"font-family:SimSun;line-height:1.5;\">在服务层，我们设计了面向全流程的实验能力及考核系统，不仅涵盖了基础实验模块、专业实验模块、综合实验模块和科研创新模块，还提供了多种网络访问模式、交互式体验模式、以及开放式实验接口。这不仅为实验资源的共享提供了有效支撑，开放式实验接口还能够提供实验模块的更新与修正的功能，以克服网络安全实验技术更新快等问题。</span> \r\n</p>', '', '', '', '0', '1', '0', '1', 'zh_cn');
INSERT INTO syjx_category VALUES ('13', '1', '4', '5', '现任领导', '', '0', '', '_self', 'leader', '', '', '', 'page', '', '0', '<p class=\"p15\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">王丽娜，女，1964年出生，博士，教授，武汉大学计算机学院副院长，空天信息安全与可信计算教育部重点实验室（B类）主任，博士生导师，国务院政府特殊津贴获得者。1989年于东北大学获硕士学位。2001年于东北大学获得博士学位。1997年在日本工业技术院电子技术综合研究所从事计算机网络安全的研究工作。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p15\" style=\"text-indent:23.2500pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">在教学方面，主讲《信息隐藏技术》、《信息系统安全》和《网络安全》3门本科生课程，《密码分析与应用》1门硕士研究生课程，《网络协议安全》1门博士研究生课程。主编《信息隐藏技术与应用》、《信息隐藏技术试验教程》、《信息安全综合实验教程》、《信息系统的安全与保密》、《信息安全导论》等7部教材。主持、参与国家级、省级教改项目7项，发表教学改革研究论文2篇。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:21.0000pt;margin-bottom:0pt;margin-top:0pt;\">\r\n	<span style=\"line-height:1.5;\">在科研方面，先后承担各类科研课题40余项，其中负责国家自然科学基金重大研究计划项目（90718006）“软件的可信环境的构造及算法研究”、国家863计划项目（2009AA01Z442）“基于可信虚拟机的数据防泄露关键技术研究与原型系统实现”、教育部科技重点项目（108087）“保证业务连续性的安全容灾方法与关键技术研究”、国家自然科学基金项目（60743003）“基于复杂网络理论的Internet可生存性研究”、国家自然科学基金项目（60473023)“网络容侵机制与算法研究”、教育部博士点基金(20070486107)、湖北省科技攻关项目（2007AA101C44）“容灾备份关键技术研究”等，以及作为骨干成员参与国家863计划项目“适用于可信计算的公钥基础设施研究（2008AA01Z404）”（副组长）、国家科技部科技型中小企业技术创新基金（04C26214201280），湖北省自然科学基金重点项目等多项国家和省部级项目。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.1000pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">在教学方面成果：</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">2012年获得第七届湖北省高等学校教学成果奖一等奖；</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">2010、2012年，两次获得武汉大学优秀教学成果奖一等；</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">2008年获武汉大学第三届“尊师爱学”我最喜欢的十佳优秀教师；</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">2010、2011年连续二年获武汉大学优秀教学管理干部。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.1000pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">在科研方面成果：主持国家自然科学基金重大研究计划项目1项、国家863计划1项、国家自然科学基金项目4项、教育部博士点基金2项、科技型中小企业技术创新基金项目等，作为学术骨干参与国家发改委2012年信息安全专业化服务项目1项、863项目1项等。先后获得：湖北省科技进步一等奖（排名第一，2012），二等奖（排名第一，2007）各一项，武汉市科技进步一等奖（排名第一，2012）、二等奖（排名第一，2007）各一项，辽宁省科技进步一等奖一项（排名第二，1999），辽宁省教委科技进步一等奖（排名第二，1999），东北三省第四届CAI一等奖一项（排名第一，1999）。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.1000pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">曾发表过计算机安全保密方面的论文100余篇，其中SCI收录10余篇，EI收录30余篇，ISTP收录20余篇。出版教材等7部。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.1000pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">主要成果：</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.0500pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（1）在国家高技术研究发展计划（863计划）“基于可信虚拟机的数据防泄漏关键技术研究与原型系统实现（2009AA01Z442）”中结合可信计算及虚拟机技术，研究面向敏感用户数据防泄漏的统一模型和关键技术，取得一系列技术成果，在敏感用户数据防泄漏理论和技术方面取得一些突破。该研究成果经过了省科技厅组织的专家组鉴定，鉴定结果为：达到国际先进水平，并获得湖北省科技进步一等奖。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.0500pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（2）在国家自然科学基金重大研究计划项目\"软件的可信环境构造、建模及算法研究（90718006）\"中展开面向软件可信环境构造的可信连接扩展方法、网络传输行为可靠性以及可信协议的设计与证明方法三方面的基础科学与关键理论研究。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.1550pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（3）研究出基于磁盘的数据备份的新框架和新产品；开发了打开文件备份代理系统和Hinfo文件级快照系统；提出了全局压缩的新存储算法；研制出具有高安全性的磁盘文件保密柜。其中Hinfo-Backup系列备份产品获得国家软件著作权登记(2005SR01865)。项目成果获得湖北省科技进步二等奖（2007）。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.1550pt;text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（4）提出了基于RSA数字签名防欺诈的门限秘密共享体制；提出了基于RSA加解密算法防欺诈的门限秘密共享体制、多个组织间的门限秘密共享体制；研究Asmuth-Bloom门限秘密共享体制的扩展。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-left:1.1550pt;text-indent:21.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（5）研究了一种新的适合多媒体信息的混沌加密算法，对混沌加密的效率及安全性进行分析，以有效实现对文本、图像、声音等多媒体信息的加密。研究了基于混沌理论的用户身份“指纹”认证算法，构造身份认证双方的混沌同步控制器。</span><o:p></o:p>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '', '', '', '0', '1', '0', '2', 'zh_cn');
INSERT INTO syjx_category VALUES ('14', '1', '6', '7', '学校背景', '', '0', '', '_self', 'xxbj', '', '', '', 'page', '', '0', '<p>\r\n	<span style=\"line-height:1.5;\">&nbsp; &nbsp;&nbsp;</span><strong style=\"line-height:150%;\"><span style=\"line-height:1.5;\">武汉大学办学力量雄厚，成果突出</span></strong> \r\n</p>\r\n<p class=\"p0\" style=\"text-indent:0px;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; 武汉大学是国家教育部直属重点综合性大学，是国家“985工程”和“211工程”重点建设高校。武汉大学学科门类齐全、综合性强、特色明显，涵盖了哲、经、法、教育、文、史、理、工、农、医、管理、艺术等12个学科门类。学校设有人文科学、社会科学、理学、工学、信息科学和医学六大学部37个学院（系）。有124个本科专业。5个一级学科被认定为国家重点学科，共覆盖了29个二级学科，另有17个二级学科被认定为国家重点学科。6个学科为国家重点（培育）学科。43个一级学科具有博士学位授予权。58个一级学科具有硕士学位授予权。有38个博士后流动站。设有三所三级甲等附属医院。</span> \r\n</p>\r\n<p class=\"p0\" style=\"text-indent:0px;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; 武汉大学现有专任教师3700余人，其中正副教授2600余人，有8位中国科学院院士、8位中国工程院院士、3位欧亚科学院院士、9位人文社科资深教授、22人次“973项目”（含国家重大基础研究计划）首席科学家、6位“863项目”计划领域专家、5个国家创新研究群体、43位国家杰出青年科学基金获得者、15位国家级教学名师。武汉大学有5个国家重点实验室、2个国家工程技术研究中心、2个国家野外科学观测研究站、11个教育部重点实验室和5个教育部工程研究中心；还拥有7个教育部人文社会科学重点研究基地、10个国家基础科学研究与人才培养基地、9个国家级实验教学示范中心和1个国家大学生文化素质教育基地。</span> \r\n</p>\r\n<p class=\"p0\" style=\"margin-bottom:0pt;margin-top:0pt;\">\r\n	<span style=\"line-height:1.5;\">&nbsp; &nbsp; 2000年以来，学校获得国家自然科学奖、国家发明奖和国家科技进步奖三大奖59项，SCI论文数和国家自然科学基金项目数均位列全国高校前列，在教育部人文社会科学优秀成果奖评选中获奖数居全国高校前三位，国家社科基金课题、教育部社科课题均居全国高校前列，并有数十项成果获得国家“五个一”工程奖、国家图书奖、中国图书奖。学校连续十余次荣获深圳国际高新技术成果交易会优秀产品奖（成交奖）和优秀组织奖。</span> \r\n</p>\r\n<p class=\"p0\" style=\"margin-bottom:0pt;margin-top:0pt;\">\r\n	<span style=\"line-height:1.5;\"></span> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>', '', '', '', '0', '1', '0', '3', 'zh_cn');
INSERT INTO syjx_category VALUES ('15', '4', '36', '37', '师资队伍', '', '0', '', '_self', 'teacher', '', '', '', 'product', '', '0', '', '', '', '', '0', '1', '0', '1', 'zh_cn');
INSERT INTO syjx_category VALUES ('16', '10', '72', '73', '工作动态', '', '0', '', '_self', 'news', '', '', '', 'article', '', '0', '', '', '', '', '0', '1', '0', '1', 'zh_cn');
INSERT INTO syjx_category VALUES ('17', '0', '87', '88', '规章制度', '', '0', '', '_self', 'policy', '', '', '', 'article', '', '0', '', '', '', '', '0', '1', '0', '5', 'zh_cn');
INSERT INTO syjx_category VALUES ('18', '10', '74', '75', '中心视频', '', '0', '', '_self', 'video', '', '', '', 'video', '', '0', '', '', '', '', '0', '1', '0', '3', 'zh_cn');
INSERT INTO syjx_category VALUES ('19', '10', '76', '77', '中心展厅', '', '0', '', '_self', 'show', '', '', '', 'product', '', '0', '', '', '', '', '0', '1', '0', '4', 'zh_cn');
INSERT INTO syjx_category VALUES ('20', '9', '62', '63', '学生指南', '', '0', '', '_self', 'sxzn', '', '', '', 'page', '', '0', '<p style=\"white-space:normal;\">\r\n 1.使用IE浏览器进入实验入口页面，允许IE加载ActiveX控件和活动脚本\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n <img src=\"http://cs.51snet.cn/data/attachment/image/20140919/0cb5288fa5403a8dd7ce82b3b03992f5.jpg\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p style=\"white-space:normal;\">\r\n 2.点击“进入系统”链接，允许浏览器与ActiveX控件交互\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n <img src=\"http://cs.51snet.cn/data/attachment/image/20140919/79544c18934ea4823da5c4b57c825652.jpg\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p style=\"white-space:normal;\">\r\n 3.在登陆界面输入用户名administrator密码isesadmin\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n <img src=\"http://cs.51snet.cn/data/attachment/image/20140919/8ddb87f76bdea1f04170dd06a738b501.jpg\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p>\r\n 4.运行网络安全虚拟仿真平台客户端，选择登录类型为学生输入用户名密码登录，或者选择匿名登录\r\n</p>\r\n<p>\r\n <img src=\"http://cs.51snet.cn/data/attachment/image/20140921/627cfd66cb29d8d2f72d7979be901b53.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>\r\n<p>\r\n <br />\r\n</p>\r\n<p>\r\n 5.登录后在左边列表选择网络扫描和嗅探、密码破解、数据库攻击、网络欺骗、日志清除等实验类别，阅读实验原理后按照实验步骤进行实验\r\n</p>\r\n<p>\r\n <img src=\"http://cs.51snet.cn/data/attachment/image/20140919/eb620c1083527895e85cfc30f80aabd6.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>\r\n<p style=\"white-space:normal;\">\r\n <br />\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n 6.网络攻防实验请运行网络攻防实验教学平台客户端，选择登录类型为学生输入用户名密码登录，或者选择匿名登录\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n <img src=\"http://cs.51snet.cn/data/attachment/image/20140921/cc416cdd296c1cca2f210a0cdb061980.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p style=\"white-space:normal;\">\r\n 7.登录后在左边列表选择网络扫描和嗅探、密码破解、数据库攻击、网络欺骗、日志清除等实验类别，阅读实验原理后按照实验步骤进行实验\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n <img src=\"http://cs.51snet.cn/data/attachment/image/20140919/602d1b46b4e3b1a172ee20290fa9c43a.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>', '', '', '', '0', '1', '0', '1', 'zh_cn');
INSERT INTO syjx_category VALUES ('21', '9', '64', '65', '教师指南', '', '0', '', '_self', 'jszn', '', '', '', 'page', '', '0', '', '', '', '', '0', '1', '0', '2', 'zh_cn');
INSERT INTO syjx_category VALUES ('22', '9', '66', '67', '管理指南', '', '0', '', '_self', 'glzn', '', '', '', 'page', '', '0', '', '', '', '', '0', '1', '0', '3', 'zh_cn');
INSERT INTO syjx_category VALUES ('23', '9', '68', '69', '培训指南', '', '0', '', '_self', 'pxzn', '', '', '', 'page', '', '0', '', '', '', '', '0', '1', '0', '4', 'zh_cn');
INSERT INTO syjx_category VALUES ('24', '2', '16', '17', '基础实验', '', '0', '', '_self', 'jcsy', '基础实验', '基础实验', '基础实验', 'article', '', '0', '', '', '', '', '0', '1', '0', '1', 'zh_cn');
INSERT INTO syjx_category VALUES ('25', '2', '18', '19', '专业实验', '', '0', '', '_self', 'zysy', '专业实验', '专业实验', '专业实验', 'article', '', '0', '', '', '', '', '0', '1', '0', '2', 'zh_cn');
INSERT INTO syjx_category VALUES ('26', '2', '20', '21', '综合实验', '', '0', '', '_self', 'zhsy', '综合实验', '综合实验', '综合实验', 'article', '', '0', '', '', '', '', '0', '1', '0', '3', 'zh_cn');
INSERT INTO syjx_category VALUES ('27', '2', '22', '23', '创新实验', '', '0', '', '_self', 'cxsy', '创新实验', '创新实验', '创新实验', 'article', '', '0', '', '', '', '', '0', '1', '0', '4', 'zh_cn');
INSERT INTO syjx_category VALUES ('28', '1', '8', '9', '学科架构', '', '0', '', '_self', 'xkjg', '学科架构', '学科架构', '学科架构', 'page', '', '0', '<p>\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; 目前，中心所在的武汉大学计算机学院拥有软件工程国家重点实验室，国家多媒体软件工程技术研究中心，以及空天信息安全与可信计算教育部重点实验室三个重要平台。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; （1）软件工程国家重点实验室</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; 软件工程国家重点实验室于1985年9月经国家计委、国家教委批准筹建，于1989年3月通过国家验收并正式对外开放。实验室围绕“网上软件工程”主体研究方向，开展理论、方法、技术、标准、基础设施以及典型应用等研究，在科学研究、队伍建设、人才培养、高科技成果转化以及对外学术交流等方面都取得了丰硕成果。近5年来，共承担和完成科研项目122项，经费6940.825万元，在国内外刊物上发表论文846篇，其中三大检索&nbsp;513&nbsp;篇次。出版论著、译著10本，获省部奖10项。在合作交流方面，与国内外大学和科研机构建立广泛联系，举办国际、国内学术会议13次，邀请国内外知名学者、专家来室作学术交流和合作研究135人次，选派学术骨干进行国内外学术交流270人次。实验室现有固定科研人员46名，其中教授29名，副教授7名，讲师6人，管理和技术人员3人。实验室总面积近3000平方米，科研设备292台套，价值近3500万元。实验室科研环境和条件良好，有小型机、工作站、高性能服务器，以及网络安全开发平台等大型设备和支撑软件。具有软件互操作性测试平台Interstage&nbsp;V5.0，OASIS的ebXML&nbsp;R&amp;R软件系统，ebXML互操作性测试平台MSH系统等软件开发环境。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; （2）国家多媒体软件工程技术研究中心</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; 国家多媒体软件工程技术研究中心于1996年1月23日批准组建，主要从事多媒体软件领域内的研发以及人才培养。1999年以全优成绩通过验收，2002、2007年以优异成绩通过运行评估。&nbsp;针对多媒体软件发展中的基础性、关键性和共性技术，进行技术突破和工程化研发。通过中试基地建设，促进技术成果商品化和产业化；近五年来共承担研发任务91项，创造了很好的经济效益和社会效益。其中在技术研究方面，承担23项国家级科研课题、25项省部级科研课题；在成果转化方面，承担41项企业委托的研究和研制项目、1项国际合作项目。目前中心拥有独立的科研和办公用房3000多平方米，通用服务器系统和网络设备、大型软硬件设计和测试平台、大型软件分析与设计建模平台、网络数据库平台、软件测试平台等设备以及通用和辅助设备总价值&nbsp;700多万元，具备较好的科研及成果转化支撑条件。</span> \r\n</p>\r\n<p>\r\n	<span style=\"line-height:1.5;text-indent:24pt;\">&nbsp; &nbsp; （3）空天信息安全与可信计算教育部重点实验室</span> \r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"margin-bottom:0pt;margin-top:0pt;\">\r\n	<span style=\"line-height:1.5;\">&nbsp; &nbsp; 2008年，教育部批准建立“空天信息安全与可信计算教育部重点实验室”&nbsp;。“空天信息安全与可信计算教育部重点实验室”以武汉大学计算机学院为依托，结合遥感、测绘科学与技术等学科，以信息安全研究所（系）为骨干力量，研究空天地环境中的信息安全科学与技术问题。目前实验室已逐步形成和发展了一系列具有多学科交叉特色的研究方向：空天信息的获取和处理、可信计算、密码学、网络安全等领域的研究走在国内前列，成为在这些领域具有重要影响的教学、科研和人才培养基地。沈昌祥院士任实验室学术委员会主任，国内多位知名学者任学术委员。王丽娜教授任实验室主任，朱欣焰教授、章登义教授、赵波教授任副主任。实验室现有固定科研人员29名，其中教授11名，副教授10名，讲师、助教8人。实验室围绕主体研究方向，开展理论、技术、标准以及典型应用等研究，在科学研究、队伍建设、人才培养、成果转化以及对外学术交流等方面都取得了丰硕成果。</span> \r\n</p>', '', '', '', '0', '1', '0', '4', 'zh_cn');
INSERT INTO syjx_category VALUES ('29', '3', '26', '27', '基础实验仿真平台', '', '0', '', '_self', 'jcsyfzpt', '基础实验仿真平台', '基础实验仿真平台', '基础实验仿真平台', 'article', '', '0', '', '', '', '', '0', '1', '0', '1', 'zh_cn');
INSERT INTO syjx_category VALUES ('30', '0', '81', '82', '网络安全虚拟仿真平台说明', '', '0', '', '_self', 'xpReadme1', '', '', '', 'page', '', '0', '<p style=\"white-space:normal;\">\r\n	1.在IE工具栏中点击Internet选项，进入安全选项卡，将受信任的站点的安全级别设置为低\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/08653baa41435144c5171a485cd6a894.jpg\" alt=\"\" /> \r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	2.点击站点，取消https，并将当前网站加入到受信任的站点中\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/1013c589e1d80d312fbb78deeb71cc6b.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	3.进入实验入口页面，允许IE加载ActiveX控件和活动脚本\r\n</p>\r\n<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/0cb5288fa5403a8dd7ce82b3b03992f5.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	4.点击“进入系统”链接，允许浏览器与ActiveX控件交互\r\n</p>\r\n<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/79544c18934ea4823da5c4b57c825652.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	5.在登陆界面输入用户名administrator密码isesadmin\r\n</p>\r\n<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/8ddb87f76bdea1f04170dd06a738b501.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	6.运行网络安全虚拟仿真平台客户端，<span style=\"white-space:normal;\">选择登录类型为学生输入用户名密码登录，或者选择匿名登录</span> \r\n</p>\r\n<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/627cfd66cb29d8d2f72d7979be901b53.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	7.登录后在左边列表选择网络扫描和嗅探、密码破解、数据库攻击、网络欺骗、日志清除等实验类别，阅读实验原理后按照实验步骤进行实验\r\n</p>\r\n<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/eb620c1083527895e85cfc30f80aabd6.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>', '', '', 'page_info', '0', '1', '0', '12', 'zh_cn');
INSERT INTO syjx_category VALUES ('32', '0', '85', '86', '实验平台学生入口', '', '0', '', '_self', 'student', '', '', '', 'page', '', '0', '<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/26dc7d80661d680c0de1a17def0d19e3.png\" alt=\"\" style=\"line-height:1.5;margin:0px;\" /><img src=\"http://cs.51snet.cn/data/attachment/image/20140921/081bd3307b0e6aa144331d2a1d7f8070.png\" alt=\"\" style=\"line-height:1.5;margin:0px;\" usemap=\"#Map\" /> \r\n	<map name=\"Map\" id=\"Map\">\r\n		<area shape=\"rect\" coords=\"148,53,233,81\" href=\"http://cs.51snet.cn/index.php/category/xpReadme3\" />\r\n          <area shape=\"rect\" coords=\"146,135,233,161\" href=\"http://210.42.123.10:8080\" />\r\n	</map>\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; 信息安全实验仿真系统可以仿真密码学、计算机病毒、信息隐藏、IDS等实验\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<hr />\r\n<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/576895b1d5a660de96e661b2ddc34b60.png\" alt=\"\" style=\"line-height:1.5;margin:0px;\" /><img src=\"http://cs.51snet.cn/data/attachment/image/20140921/081bd3307b0e6aa144331d2a1d7f8070.png\" alt=\"\" style=\"line-height:1.5;margin:0px;\" usemap=\"#Map1\" /> \r\n	<map name=\"Map\" id=\"Map1\">\r\n		<area shape=\"rect\" coords=\"148,53,233,81\" href=\"http://cs.51snet.cn/index.php/category/xpReadme1\" />\r\n          <area shape=\"rect\" coords=\"146,135,233,161\" href=\"javascript:exec();\" />\r\n	</map>\r\n</p>\r\n<p>\r\n	<span style=\"white-space:normal;\"><span style=\"white-space:normal;\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span>网络安全虚拟仿真平台可以虚拟仿真网络安全相关的网络扫描和嗅探、密码破解、数据库攻击、网络欺骗、日志清除等实验\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<hr />\r\n<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/e5cd4ac67fde38cb7d551a832b896666.png\" alt=\"\" style=\"font-size:12px;font-weight:normal;line-height:1.5;margin:0px;\" /><img src=\"http://cs.51snet.cn/data/attachment/image/20140921/081bd3307b0e6aa144331d2a1d7f8070.png\" alt=\"\" style=\"font-size:12px;font-weight:normal;line-height:1.5;margin:0px;\" usemap=\"#Map2\" /> \r\n<map name=\"Map\" id=\"Map2\">\r\n	<area shape=\"rect\" coords=\"148,53,233,81\" href=\"http://cs.51snet.cn/index.php/category/xpReadme2\" />\r\n          <area shape=\"rect\" coords=\"146,135,233,161\" href=\"javascript:exec();\" />\r\n</map>\r\n<p>\r\n	<span style=\"white-space:normal;\"><span style=\"white-space:normal;\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span>网络攻防实验教学平台可以虚拟仿真网络攻防相关的密码破解、数据加密解密、网络入侵与防范等实验\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<hr />\r\n<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/d10080a189e2e51640ed0ab10ac8c7d4.png\" alt=\"\" style=\"font-size:12px;font-weight:normal;line-height:1.5;margin:0px;\" /><img src=\"http://cs.51snet.cn/data/attachment/image/20140921/081bd3307b0e6aa144331d2a1d7f8070.png\" alt=\"\" style=\"font-size:12px;font-weight:normal;line-height:1.5;margin:0px;\" usemap=\"#Map3\" /> \r\n<map name=\"Map\" id=\"Map3\">\r\n	<area shape=\"rect\" coords=\"148,53,233,81\" href=\"http://cs.51snet.cn/index.php/category/xpReadme2\" />\r\n          <area shape=\"rect\" coords=\"146,135,233,161\" href=\"http://210.42.123.10:8000/SuSingWeb/userlogin.aspx\" />\r\n</map>\r\n<p>\r\n	<span style=\"white-space:normal;\"><span style=\"white-space:normal;\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span>网络安全虚拟仿真典型实验通过详细的指导和步骤示范引导学习网络安全的重点实验\r\n</p>', '', '', 'page_info', '0', '1', '0', '13', 'zh_cn');
INSERT INTO syjx_category VALUES ('31', '0', '83', '84', '网络攻防实验教学平台说明', '', '0', '', '_self', 'xpReadme2', '', '', '', 'page', '', '0', '<p style=\"white-space:normal;\">\r\n	1.在IE工具栏中点击Internet选项，进入安全选项卡，将受信任的站点的安全级别设置为低\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/08653baa41435144c5171a485cd6a894.jpg\" alt=\"\" />\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	2.点击站点，取消https，并将当前网站加入到受信任的站点中\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/1013c589e1d80d312fbb78deeb71cc6b.jpg\" alt=\"\" />\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	3.进入实验入口页面，允许IE加载ActiveX控件和活动脚本\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/0cb5288fa5403a8dd7ce82b3b03992f5.jpg\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p style=\"white-space:normal;\">\r\n	4.点击“进入系统”链接，允许浏览器与ActiveX控件交互\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/79544c18934ea4823da5c4b57c825652.jpg\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p style=\"white-space:normal;\">\r\n	5.在登陆界面输入用户名administrator密码isesadmin\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/8ddb87f76bdea1f04170dd06a738b501.jpg\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p style=\"white-space:normal;\">\r\n	6.运行网络攻防实验教学平台客户端，选择登录类型为学生输入用户名密码登录，或者选择匿名登录\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140921/cc416cdd296c1cca2f210a0cdb061980.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>\r\n<br style=\"white-space:normal;\" />\r\n<p style=\"white-space:normal;\">\r\n	7.登录后在左边列表选择网络扫描和嗅探、密码破解、数据库攻击、网络欺骗、日志清除等实验类别，阅读实验原理后按照实验步骤进行实验\r\n</p>\r\n<p style=\"white-space:normal;\">\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140919/602d1b46b4e3b1a172ee20290fa9c43a.jpg\" width=\"70%\" height=\"70%\" alt=\"\" /> \r\n</p>', '', '', 'page_info', '0', '1', '0', '14', 'zh_cn');
INSERT INTO syjx_category VALUES ('34', '0', '89', '90', '信息安全实验仿真系统说明', '', '0', '', '_self', 'Readme3', '', '', '', 'page', '', '0', '<p>\r\n	必须使用IE浏览器登录信息安全实验仿真平台，输入用户名001，密码abc，登录进入实验\r\n</p>\r\n<p>\r\n	<img src=\"http://cs.51snet.cn/data/attachment/image/20140922/e795145e53a0a06176548525d6e635ec.JPG\" alt=\"\" /> \r\n</p>', '', '', 'page_info', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('35', '3', '28', '29', '专业实验仿真平台', '', '0', '', '_self', 'zysyfzpt', '专业实验仿真平台', '专业实验仿真平台', '专业实验仿真平台', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('36', '3', '30', '31', '综合实验仿真平台', '', '0', '', '_self', 'zhfzsypt', '综合实验仿真平台', '综合实验仿真平台', '综合实验仿真平台', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('37', '3', '32', '33', '科研竞赛实验平台', '', '0', '', '_self', 'kyjssypt', '科研竞赛实验平台', '科研竞赛实验平台', '科研竞赛实验平台', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('38', '4', '38', '39', '专家名师', '', '0', '', '_self', 'zjms', '专家名师', '专家名师', '专家名师', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('39', '4', '40', '41', '合作企业师资', '', '0', '', '_self', 'hzqysz', '合作企业师资', '合作企业师资', '合作企业师资', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('40', '7', '52', '53', '教学成果', '', '0', '', '_self', 'jxcg', '教学成果', '教学成果', '教学成果', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('41', '7', '54', '55', '科研成果', '', '0', '', '_self', 'kycg', '科研成果', '科研成果', '科研成果', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('42', '7', '56', '57', '成果转化实验教学', '', '0', '', '_self', 'cgzhsyjx', '成果转化实验教学', '成果转化实验教学', '成果转化实验教学', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('43', '6', '44', '45', '合作企业', '', '0', '', '_self', 'hzqy', '合作企业', '合作企业', '合作企业', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('44', '6', '46', '47', '共享效果', '', '0', '', '_self', 'gxxg', '共享效果', '共享效果', '共享效果', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('45', '6', '48', '49', '合作计划', '', '0', '', '_self', 'hzjh', '合作计划', '合作计划', '合作计划', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('46', '1', '10', '11', '支撑平台', '', '0', '', '_self', 'sjzcpt', '', '', '', 'page', '', '0', '<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">在计算机类实验平台建设方面，武汉大学计算机学院目前拥有湖北省计算机实验教学示范中心、教育部互联网应用创新开放平台示范基地和国家级工程实践教育中心。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p18\" style=\"text-indent:21.1000pt;margin-bottom:0pt;margin-top:0pt;layout-grid-mode:char;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（1）湖北省计算机实验教学示范中心</span><o:p></o:p>\r\n</p>\r\n<p class=\"p18\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;layout-grid-mode:char;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">计算机实验教学中心是于2001年由原武汉大学、原武汉水利电力大学、原武汉测绘科技大学的计算机学院系的实验室及原湖北医科大学计算机教研室合并组建成立，其历史可追溯到1978年原武汉大学计算机科学系实验室。2007年获批成为“湖北省计算机实验教学示范中心”。2012年获批教育部首批“互联网应用创新开放平台示范基地”。实验中心强化实验教学、设备平台、实验室安全及教学科研服务的四位一体化管理。实验中心的教学实验室总面积近3350平方米，教学设备3150台套，价值2870万元。校内科研实习基地仪器设备2130余台套，价值3620余万元，实习基地总面积约11200平方米。专职实验技术队伍由24人组成，其中教授1人，高级实验师13人，讲师/实验师9人，助理实验师1人。实验中心建设有基础性实验室、专业性实验室、创新性实验室等三类实验室；其中，基础性实验室有计算机软件实验室、电子电路实验室、数字逻辑实验室、计算机组成原理实验室等；专业性实验室有软件工程实验室、网络工程实验室、信息安全综合实验室、微机系统与接口技术实验室、大规模集成电路实验室、嵌入式系统实验室、物联网工程实验室等实验室；创新性实验室有ACM训练基地、高性能计算实验室、互联网应用创新基地等以及24个校外实习基地。每年面向全校46个专业约3000名本科生承担计算机软硬件实验教学、科研竞赛和工程训练，开设的实验课程109门，年均完成实验教学人时数42万人机时。每年平均承担国家级、省级、校级、院级大学生科研创新项目50余项。夯实“三创”能力培养，学生的创新实践能力显著提高，多次在程序设计竞赛、信息安全竞赛、计算机仿真大赛、大学生超算大赛、云计算设计应用大赛、数学建模竞赛等赛事中摘金夺银。实验中心发挥实验资源优势，不断加大实验室开放力度，立足校内，服务社会，提高开放服务水平。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p18\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;layout-grid-mode:char;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（2）教育部互联网应用创新开放平台示范基地</span><o:p></o:p>\r\n</p>\r\n<p class=\"p18\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;layout-grid-mode:char;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">2012年9月21日，由教育部科技发展中心主办，清华大学、锐捷网络协办的“互联网应用创新开放平台联盟成立大会暨互联网应用创新研讨会”在北京隆重召开。开幕仪式上，清华大学、武汉大学等25所高校代表出席了首批“互联网应用创新开放平台示范基地”授牌仪式。目前，共有120多所大学加入了互联网应用创新开放平台联盟。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p18\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;layout-grid-mode:char;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">互联网应用创新开放平台是基于下一代互联网的多学科创新平台。平台筹建工作历时1年多，组织了全国120多所知名高校共同参与。开展的项目涵盖下一代互联网、物联网、云计算、水文、气象、电力、农业、医疗、化工等一大批具有行业及学科特色的领域。目前，高性能计算平台自对我校各学科师生及合作单位科研人员免费开放以来，拥有来自校内外20余个学院及科研单位的科研人员。在高性能计算系统上进行教学与科学研究的团队有130余个，在平台上进行的各类科研项目（包括国家级、省部级的纵向项目及横向项目等）210余项。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p18\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;layout-grid-mode:char;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">（3）国家级工程实践教育中心</span><o:p></o:p>\r\n</p>\r\n<p class=\"p0\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">国家级工程实践教育中心由教育部专门设立，是由高校和企业联合开展工程人才培养的综合性教育平台，主要面向高年级本科生和研究生，旨在贯彻落实党的十七大提出的走中国特色新型工业化道路、建设创新型国家、建设人力资源强国的战略部署，落实《国家中长期教育改革和发展规划纲要（2010-2020年）》，培养适应行业企业需求的工程人才。由教育部联合国务院有关部门负责管理，高校依托企业建立的，为落实高校“卓越工程师教育培养计划”培养方案中的企业学习阶段的任务，由高校和企业密切合作开展工程人才培养的综合平台。</span><o:p></o:p>\r\n</p>\r\n<p class=\"p18\" style=\"text-indent:24.0000pt;margin-bottom:0pt;margin-top:0pt;layout-grid-mode:char;line-height:150%;\">\r\n	<span style=\"line-height:1.5;\">依据《教育部等部门关于建设国家级工程实践教育中心的通知》，2012年11月，武汉大学计算机学院与深圳天源迪科信息技术股份有限公司被教育部批准为第一批合作共建国家级工程实践教育中心单位。</span><o:p></o:p>\r\n</p>', '', '', '', '0', '1', '0', '99', 'zh_cn');
INSERT INTO syjx_category VALUES ('47', '1', '12', '13', '需求背景', '', '0', '', '_self', 'xqbj', '需求背景', '需求背景', '需求背景', 'article', '', '0', '', '', '', '', '0', '1', '0', '99', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_comments`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_comments`;
CREATE TABLE `syjx_comments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) default NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `replyuid` int(10) unsigned NOT NULL default '0',
  `author` varchar(50) default NULL,
  `content` text NOT NULL,
  `description` text,
  `createtime` int(10) unsigned NOT NULL default '0',
  `replytime` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `listorder` mediumint(9) NOT NULL default '999',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_comments
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_config`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_config`;
CREATE TABLE `syjx_config` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `varname` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` char(10) NOT NULL,
  `value` text NOT NULL,
  `issystem` tinyint(1) unsigned NOT NULL default '0',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `varname` (`varname`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_config
-- ----------------------------
INSERT INTO syjx_config VALUES ('1', 'site_name', '', 'base', '网络安全虚拟仿真实验教学中心', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('2', 'site_title', '', 'base', '武汉大学', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('3', 'site_keywords', '', 'base', '', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('4', 'site_description', '', 'base', '', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('5', 'site_code', '', 'base', '', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('6', 'site_logo', '', 'base', 'images/logo.png', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('7', 'site_template', '', 'base', 'default', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('9', 'site_name', '', 'base', 'Six network technology', '1', 'en');
INSERT INTO syjx_config VALUES ('10', 'site_title', '', 'base', 'X6CMS is a function of a sound marketing website content management platform', '1', 'en');
INSERT INTO syjx_config VALUES ('11', 'site_keywords', '', 'base', 'X6CMS, website management system', '1', 'en');
INSERT INTO syjx_config VALUES ('12', 'site_description', '', 'base', '', '1', 'en');
INSERT INTO syjx_config VALUES ('13', 'site_code', '', 'base', '', '1', 'en');
INSERT INTO syjx_config VALUES ('14', 'site_logo', '', 'base', 'images/logo.png', '1', 'en');
INSERT INTO syjx_config VALUES ('15', 'site_template', '', 'base', 'default', '1', 'en');
INSERT INTO syjx_config VALUES ('34', 'water_type', '', 'attr', '0', '1', '0');
INSERT INTO syjx_config VALUES ('33', 'attr_allowtype', '', 'attr', '', '1', '0');
INSERT INTO syjx_config VALUES ('32', 'attr_maxsize', '', 'attr', '2048', '1', '0');
INSERT INTO syjx_config VALUES ('21', 'site_adminlang', '', 'lang', 'zh_cn', '1', '0');
INSERT INTO syjx_config VALUES ('22', 'site_frontlang', '', 'lang', 'zh_cn', '1', '0');
INSERT INTO syjx_config VALUES ('23', 'site_home', '', 'base', '', '1', 'en');
INSERT INTO syjx_config VALUES ('25', 'site_home', '', 'base', '', '1', 'zh_cn');
INSERT INTO syjx_config VALUES ('26', 'smtp_host', '', 'mail', '', '1', '0');
INSERT INTO syjx_config VALUES ('27', 'smtp_user', '', 'mail', '', '1', '0');
INSERT INTO syjx_config VALUES ('28', 'smtp_pass', '', 'mail', '', '1', '0');
INSERT INTO syjx_config VALUES ('29', 'smtp_port', '', 'mail', '', '1', '0');
INSERT INTO syjx_config VALUES ('30', 'smtp_sendmail', '', 'mail', '', '1', '0');
INSERT INTO syjx_config VALUES ('31', 'mail_type', '', 'mail', 'sendmail', '1', '0');
INSERT INTO syjx_config VALUES ('35', 'water_text_value', '', 'attr', 'Powered by X6CMS', '1', '0');
INSERT INTO syjx_config VALUES ('36', 'water_text_size', '', 'attr', '24', '1', '0');
INSERT INTO syjx_config VALUES ('37', 'water_text_color', '', 'attr', '#990000', '1', '0');
INSERT INTO syjx_config VALUES ('38', 'water_text_font', '', 'attr', '', '1', '0');
INSERT INTO syjx_config VALUES ('39', 'water_minwidth', '', 'attr', '200', '1', '0');
INSERT INTO syjx_config VALUES ('40', 'water_minheight', '', 'attr', '100', '1', '0');
INSERT INTO syjx_config VALUES ('41', 'water_padding', '', 'attr', '-20', '1', '0');
INSERT INTO syjx_config VALUES ('42', 'water_opacity', '', 'attr', '10', '1', '0');
INSERT INTO syjx_config VALUES ('43', 'water_quality', '', 'attr', '100', '1', '0');
INSERT INTO syjx_config VALUES ('44', 'water_position', '', 'attr', 'bottomright', '1', '0');
INSERT INTO syjx_config VALUES ('45', 'water_image_path', '', 'attr', 'data/attachment/image/20130131/638be3a673f86444ee7d48637cf015fa.png', '1', '0');
INSERT INTO syjx_config VALUES ('50', 'hotline1', '销售热线1', 'base', '027-59908931', '0', 'zh_cn');
INSERT INTO syjx_config VALUES ('51', 'hotline2', '销售热线2', 'base', '027-58908835', '0', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_down`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_down`;
CREATE TABLE `syjx_down` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `keywords` varchar(120) NOT NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `alt` varchar(255) default NULL,
  `color` char(7) NOT NULL,
  `attrurl` varchar(100) NOT NULL,
  `attrname` varchar(100) NOT NULL,
  `isbold` tinyint(1) unsigned NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `recommends` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `realhits` int(10) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `puttime` int(10) unsigned NOT NULL default '0',
  `tpl` varchar(20) NOT NULL,
  `listorder` int(10) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`),
  KEY `recommend` (`recommends`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_down
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_fragment`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_fragment`;
CREATE TABLE `syjx_fragment` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `varname` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `remark` mediumtext NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_fragment
-- ----------------------------
INSERT INTO syjx_fragment VALUES ('1', '版权信息', 'copyright', '地址：湖北省武汉市八一路武汉大学   邮编：430072   电话：027-68775201<br />\r\nCopyright @2014 武汉大学计算机学院实验教学中心 版权所有', '页面底部版权', '1410961525', '1410961525', '1', 'zh_cn');
INSERT INTO syjx_fragment VALUES ('2', '中心简介', 'about', '<p>\r\n <span style=\"line-height:1.5;\"><span style=\"line-height:2;\">&nbsp; &nbsp; 武汉大学网络安全虚拟仿真实验教学中心，其历史可追溯到1978年原武汉大学计算机科学系实验室。2007年实验中心获评\"湖北省计算机实验教学示范中心\"。</span></span><span style=\"line-height:2;\">2012年获批教育部首批“互联网应用创新开放平台示范基地”。</span><span style=\"line-height:2;\">实验教学中心依托省级计算机实验教学示范中心建设，主要提供网络安全虚拟仿真实验教学、实验资源的开放共享服务。</span><span style=\"line-height:1.5;\"><br />\r\n</span> \r\n</p>', '首页中心简介', '0', '1411185275', '1', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_guestbook`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_guestbook`;
CREATE TABLE `syjx_guestbook` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `replyuid` int(10) unsigned NOT NULL default '0',
  `author` varchar(50) NOT NULL,
  `address` varchar(255) default NULL,
  `postcode` varchar(255) default NULL,
  `tel` varchar(255) default NULL,
  `email` varchar(50) default NULL,
  `phone` varchar(50) default NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `replytime` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `listorder` mediumint(9) NOT NULL default '999',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_guestbook
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_hr`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_hr`;
CREATE TABLE `syjx_hr` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `keywords` varchar(120) NOT NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `age` varchar(255) default NULL,
  `sex` varchar(255) default NULL,
  `gzdy` varchar(255) default NULL,
  `num` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `alt` varchar(255) default NULL,
  `color` char(7) NOT NULL,
  `isbold` tinyint(1) unsigned NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `recommends` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `realhits` int(10) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `puttime` int(10) unsigned NOT NULL default '0',
  `tpl` varchar(20) NOT NULL,
  `listorder` int(10) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`),
  KEY `recommend` (`recommends`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_hr
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_keywords`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_keywords`;
CREATE TABLE `syjx_keywords` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `listorder` int(3) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL default '1',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `title` (`title`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_keywords
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_lang`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_lang`;
CREATE TABLE `syjx_lang` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `varname` varchar(20) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `listorder` tinyint(4) unsigned NOT NULL default '99',
  `status` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_lang
-- ----------------------------
INSERT INTO syjx_lang VALUES ('1', '简体中文', 'zh_cn', 'data/language/zh_cn/zh_cn.gif', '1', '1');
INSERT INTO syjx_lang VALUES ('2', 'English', 'en', 'data/language/en/en.gif', '2', '1');

-- ----------------------------
-- Table structure for `syjx_link`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_link`;
CREATE TABLE `syjx_link` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` mediumint(8) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `linktype` int(11) default '0',
  `username` varchar(255) default NULL,
  `tel` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `qq` varchar(255) default NULL,
  `remark` mediumtext NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `listorder` int(3) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`type`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_link
-- ----------------------------
INSERT INTO syjx_link VALUES ('1', '1', '武汉大学实验室与设备管理处', '', 'data/attachment/image/20140917/292936064443e3e69d1fd0a82269a66b.jpg', 'http://lab.whu.edu.cn/', '0', '0', '0', '0', '0', '', '1410964388', '1411185874', '2', '1', 'zh_cn');
INSERT INTO syjx_link VALUES ('2', '1', '武汉大学计算机学院', '', 'data/attachment/image/20140917/c20296aa56228e8875b3c6068ce2c4cc.jpg', 'http://cs.whu.edu.cn/', '0', '0', '0', '0', '0', '', '1410964424', '1411185882', '3', '1', 'zh_cn');
INSERT INTO syjx_link VALUES ('3', '1', '武汉大学', '', 'data/attachment/image/20140917/e80ed6e5a18d726e1ff4ca93b4a982fe.jpg', 'http://www.whu.edu.cn', '0', '0', '0', '0', '0', '', '1410964454', '1411185861', '1', '1', 'zh_cn');
INSERT INTO syjx_link VALUES ('4', '1', '空天信息安全与可信计算教育部重点实验室', '空天信息安全与可信计算教育部重点实验室（B类）', 'data/attachment/image/20140920/a12930de532bbefaa29d247c30c35926.JPG', 'http://liss.whu.edu.cn/', '0', '0', '0', '0', '0', '空天信息安全与可信计算教育部重点实验室（B类）', '1411109098', '1411185815', '99', '1', 'zh_cn');
INSERT INTO syjx_link VALUES ('5', '1', '软件工程国家重点实验室', '软件工程国家重点实验室', 'data/attachment/image/20140920/0d32acd03b1878c59769bb537ad1ceb7.JPG', 'http://www.sklse.org/', '0', '0', '0', '0', '0', '软件工程国家重点实验室', '1411109331', '1411185639', '99', '1', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_model`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_model`;
CREATE TABLE `syjx_model` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `varname` varchar(20) NOT NULL,
  `listorder` tinyint(4) unsigned NOT NULL default '99',
  `issearch` tinyint(1) unsigned NOT NULL default '0',
  `isrecommend` tinyint(1) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `varname` (`varname`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_model
-- ----------------------------
INSERT INTO syjx_model VALUES ('1', 'article', '99', '1', '1', '1');
INSERT INTO syjx_model VALUES ('2', 'product', '99', '1', '1', '1');
INSERT INTO syjx_model VALUES ('3', 'down', '99', '1', '1', '1');
INSERT INTO syjx_model VALUES ('4', 'page', '99', '0', '0', '1');
INSERT INTO syjx_model VALUES ('5', 'hr', '99', '1', '1', '1');
INSERT INTO syjx_model VALUES ('6', 'ask', '99', '1', '1', '0');
INSERT INTO syjx_model VALUES ('7', 'guestbook', '99', '0', '0', '0');
INSERT INTO syjx_model VALUES ('8', 'apply', '99', '1', '1', '0');
INSERT INTO syjx_model VALUES ('9', 'comments', '99', '1', '0', '0');
INSERT INTO syjx_model VALUES ('10', 'video', '99', '1', '1', '1');
INSERT INTO syjx_model VALUES ('11', 'order', '99', '1', '1', '0');

-- ----------------------------
-- Table structure for `syjx_navigation`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_navigation`;
CREATE TABLE `syjx_navigation` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `type` mediumint(8) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  `color` char(7) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `rel` varchar(20) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `listorder` tinyint(4) unsigned NOT NULL default '99',
  `status` tinyint(1) unsigned NOT NULL default '1',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_navigation
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_online`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_online`;
CREATE TABLE `syjx_online` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `remark` mediumtext NOT NULL,
  `listorder` int(3) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`type`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_online
-- ----------------------------
INSERT INTO syjx_online VALUES ('1', 'qq', '在线客服', '123456789', '0', '2', '1', 'zh_cn');
INSERT INTO syjx_online VALUES ('2', 'qq', '在线客服', '123456789', '0', '1', '1', 'zh_cn');
INSERT INTO syjx_online VALUES ('3', 'qq', '在线客服', '123456789', '0', '3', '1', 'zh_cn');
INSERT INTO syjx_online VALUES ('4', 'code', '咨询热线', '<span style=\"color:red;\">027-87401756</span>', '0', '6', '1', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_order`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_order`;
CREATE TABLE `syjx_order` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `replyuid` int(10) unsigned NOT NULL default '0',
  `author` varchar(50) NOT NULL,
  `provinces` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `address` varchar(255) default NULL,
  `email` varchar(50) default NULL,
  `tel` varchar(255) default NULL,
  `phone` varchar(50) default NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `replytime` int(10) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  `listorder` mediumint(9) NOT NULL default '999',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_order
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_product`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_product`;
CREATE TABLE `syjx_product` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `keywords` varchar(120) NOT NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `price` float(10,2) unsigned NOT NULL,
  `spxq` text,
  `gztx` text,
  `xgjscs` text,
  `czsm` text,
  `lxwm` varchar(100) default NULL,
  `thumb` varchar(100) NOT NULL,
  `filepath` text,
  `alt` varchar(255) default NULL,
  `color` char(7) NOT NULL,
  `isbold` tinyint(1) unsigned NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `recommends` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `realhits` int(10) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `puttime` int(10) unsigned NOT NULL default '0',
  `tpl` varchar(20) NOT NULL,
  `listorder` int(10) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`),
  KEY `recommend` (`recommends`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_product
-- ----------------------------
INSERT INTO syjx_product VALUES ('7', '19', '网格实验室', '1', '', '网格实验室', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140919/ec908f4aa890b85fb6e8f6c8e0020327.JPG', null, '', '', '0', '0', '', '2', '2', '1411117495', '1411117495', '1411117449', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('8', '19', '软件应用实验室', '1', '', '软件应用实验室', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140919/1a3be4ec14e7cc73e154a6d99fddfc0a.JPG', null, '', '', '0', '0', '', '0', '0', '1411117552', '1411117552', '1411117522', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('9', '19', '软件工程实验室', '1', '', '软件工程实验室', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140919/8de11a5b0fc280179ff9ac583c207fc1.JPG', null, '', '', '0', '0', '', '0', '0', '1411117585', '1411117585', '1411117555', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('10', '19', '网络工程实验室', '1', '', '网络工程实验室', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140919/f3e328d11b7f42ff5e09231a2ee1f89a.JPG', null, '', '', '0', '0', '', '0', '0', '1411117617', '1411117617', '1411117587', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('11', '19', '嵌入式系统实验室', '1', '', '嵌入式系统实验室', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140919/42d6dd3d4d37c70f6a6d56875807aab7.JPG', null, '', '', '0', '0', '', '0', '0', '1411117647', '1411117647', '1411117619', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('6', '19', '武汉大学计算机学院大楼', '1', '', '', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140917/8d87bb9782339db4be3bb64020525627.jpg', null, '', '', '0', '0', '', '8', '8', '1410964703', '1411116814', '1410964695', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('12', '19', '我院学子在第33届ACM国际大学生程序设计竞赛亚洲赛区预选赛中获得三金', '1', '', '我院学子在第33届ACM国际大学生程序设计竞赛亚洲赛区预选赛中获得三金', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140919/2cf0774e755ca9853ea56193cf0d9168.JPG', null, '', '', '0', '0', '', '0', '0', '1411117800', '1411117800', '1411117734', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('13', '19', '信息安全实验室', '1', '', '信息安全实验室', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140919/fddb977befa105ec16ca80601b205468.JPG', null, '', '', '0', '0', '', '0', '0', '1411117918', '1411117918', '1411117886', '', '999', '1', 'zh_cn');
INSERT INTO syjx_product VALUES ('14', '19', '一项教学成果获国家级教学成果一等奖', '1', '', '一项教学成果获国家级教学成果一等奖', '', '0.00', null, null, null, null, null, 'data/attachment/image/20140922/6f0091b9719f47a35f3ce8715f26ae51.JPG', null, '', '', '0', '0', '', '3', '3', '1411118022', '1411356897', '1411117973', '', '999', '1', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_purview`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_purview`;
CREATE TABLE `syjx_purview` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `parent` mediumint(8) unsigned NOT NULL default '0',
  `class` varchar(20) NOT NULL,
  `method` varchar(255) NOT NULL,
  `listorder` tinyint(4) unsigned NOT NULL default '99',
  `status` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent` (`parent`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_purview
-- ----------------------------
INSERT INTO syjx_purview VALUES ('1', '0', 'system', '', '5', '1');
INSERT INTO syjx_purview VALUES ('2', '1', 'purview', 'add,edit,del,order', '1', '1');
INSERT INTO syjx_purview VALUES ('3', '1', 'usergroup', 'add,edit,del,order,grant', '2', '1');
INSERT INTO syjx_purview VALUES ('4', '1', 'user', 'add,edit,del', '3', '1');
INSERT INTO syjx_purview VALUES ('5', '0', 'content', '', '2', '1');
INSERT INTO syjx_purview VALUES ('6', '0', 'module', '', '4', '1');
INSERT INTO syjx_purview VALUES ('7', '0', 'seo', '', '3', '0');
INSERT INTO syjx_purview VALUES ('20', '6', 'type', 'add,edit,del,order', '6', '1');
INSERT INTO syjx_purview VALUES ('9', '6', 'link', 'add,edit,del,order', '2', '1');
INSERT INTO syjx_purview VALUES ('19', '1', 'config', 'add,base,lang,mail,attr,del', '6', '1');
INSERT INTO syjx_purview VALUES ('11', '5', 'article', 'add,edit,del,order', '2', '1');
INSERT INTO syjx_purview VALUES ('14', '5', 'ask', 'add,edit,del,order', '4', '0');
INSERT INTO syjx_purview VALUES ('15', '6', 'slide', 'add,edit,del,order', '1', '1');
INSERT INTO syjx_purview VALUES ('21', '5', 'category', 'add,edit,del,order', '1', '1');
INSERT INTO syjx_purview VALUES ('22', '6', 'navigation', 'add,edit,del,order', '3', '1');
INSERT INTO syjx_purview VALUES ('23', '7', 'tags', 'add,edit,del,order', '1', '1');
INSERT INTO syjx_purview VALUES ('24', '5', 'hr', 'add,edit,del,order', '6', '1');
INSERT INTO syjx_purview VALUES ('25', '5', 'product', 'add,edit,del,order', '3', '1');
INSERT INTO syjx_purview VALUES ('32', '0', 'personal', '', '1', '1');
INSERT INTO syjx_purview VALUES ('28', '7', 'keywords', 'add,edit,del', '2', '1');
INSERT INTO syjx_purview VALUES ('29', '7', 'robots', 'save,restore', '4', '1');
INSERT INTO syjx_purview VALUES ('30', '7', 'htaccess', 'save,restore', '3', '1');
INSERT INTO syjx_purview VALUES ('33', '32', 'adminindex', '', '1', '1');
INSERT INTO syjx_purview VALUES ('34', '32', 'profile', 'save', '3', '1');
INSERT INTO syjx_purview VALUES ('35', '32', 'propass', 'save', '2', '1');
INSERT INTO syjx_purview VALUES ('36', '6', 'fragment', 'add,edit,del', '5', '1');
INSERT INTO syjx_purview VALUES ('37', '1', 'clearcache', '', '12', '1');
INSERT INTO syjx_purview VALUES ('38', '6', 'online', 'add,edit,del,order', '4', '1');
INSERT INTO syjx_purview VALUES ('39', '5', 'down', 'add,edit,del,order', '5', '1');
INSERT INTO syjx_purview VALUES ('40', '1', 'database', 'backup,download,upgrade,optimize,del', '10', '1');
INSERT INTO syjx_purview VALUES ('41', '5', 'guestbook', 'add,edit,del,order', '8', '0');
INSERT INTO syjx_purview VALUES ('42', '1', 'template', 'edit', '11', '1');
INSERT INTO syjx_purview VALUES ('43', '7', 'sitemap', 'generate,download,del', '5', '1');
INSERT INTO syjx_purview VALUES ('51', '1', 'lang', 'add,edit,del,order', '9', '0');
INSERT INTO syjx_purview VALUES ('52', '5', 'model', 'add,edit,del,order', '12', '0');
INSERT INTO syjx_purview VALUES ('53', '5', 'recommend', 'add,edit,del', '11', '0');
INSERT INTO syjx_purview VALUES ('54', '1', 'tpltags', '', '7', '1');
INSERT INTO syjx_purview VALUES ('55', '5', 'apply', 'add,edit,del,order', '9', '0');
INSERT INTO syjx_purview VALUES ('56', '5', 'comments', 'edit,del,order', '10', '0');
INSERT INTO syjx_purview VALUES ('57', '5', 'video', 'add,edit,del,order', '7', '1');
INSERT INTO syjx_purview VALUES ('58', '5', 'order', 'add,edit,del,order', '9', '0');

-- ----------------------------
-- Table structure for `syjx_recommend`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_recommend`;
CREATE TABLE `syjx_recommend` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `model` varchar(20) NOT NULL,
  `remark` mediumtext NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `listorder` tinyint(4) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `lang` (`lang`),
  KEY `model` (`model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_recommend
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_sessions`;
CREATE TABLE `syjx_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_sessions
-- ----------------------------
INSERT INTO syjx_sessions VALUES ('fabe2b05bb0f0afc8e1fa228952b0514', '58.19.126.63', 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko', '1411358496', '');
INSERT INTO syjx_sessions VALUES ('b9444878b7e8a7200716f3adc0f71940', '180.153.163.189', 'Mozilla/4.0', '1411360008', '');
INSERT INTO syjx_sessions VALUES ('8297c048fd88c4cb1af5cee901648a06', '58.19.126.63', 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; LCJB; rv:11.0) like Gecko', '1411381580', '');
INSERT INTO syjx_sessions VALUES ('960b18b267c7765f404c04744e17679f', '58.19.126.63', 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; LCJB; rv:11.0) like Gecko', '1411385008', '');
INSERT INTO syjx_sessions VALUES ('caf4d48df96b6e7422ae48f2d89f0939', '58.19.126.63', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '1411391767', '');
INSERT INTO syjx_sessions VALUES ('603a79b69574000a023dc13ae774d8b0', '183.60.70.30', 'Mozilla/4.0', '1411438313', '');
INSERT INTO syjx_sessions VALUES ('9407cb2844991121bb5230b1b6a88064', '183.60.35.29', 'Mozilla/4.0', '1411438313', '');
INSERT INTO syjx_sessions VALUES ('1a4bd9f9688227b283cfa4d3a5808670', '58.19.126.63', 'Mozilla/5.0 (Windows NT 6.2; WOW64; Trident/7.0; rv:11.0; BIDUBrowser 6.x) like Gecko', '1411438319', '');
INSERT INTO syjx_sessions VALUES ('7292a714d8efd89f5a12b9385add1eab', '58.19.126.63', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36 LBBROWSER', '1411444530', '');
INSERT INTO syjx_sessions VALUES ('4a67694f51e30771d6a3e4a232e2d8a6', '58.19.126.63', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36 LBBROWSER', '1411375501', 'a:3:{s:9:\"user_data\";s:0:\"\";s:7:\"varname\";s:10:\"superadmin\";s:9:\"edit_lang\";s:5:\"zh_cn\";}');
INSERT INTO syjx_sessions VALUES ('a0da5d11d3eba75d08fba39c6f726e41', '58.19.126.63', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729)', '1411376994', '');
INSERT INTO syjx_sessions VALUES ('6340b33318a71ee249bac715f8201314', '222.42.114.20', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1', '1411447865', '');
INSERT INTO syjx_sessions VALUES ('521447d58c6e354fce2a5f5f5b4404b8', '101.226.66.177', 'Mozilla/4.0', '1411447185', '');
INSERT INTO syjx_sessions VALUES ('a45a927ebea00ad9901c39c100c48cd5', '27.16.39.7', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', '1411447433', '');
INSERT INTO syjx_sessions VALUES ('c3c6ed4d2c7c91343ac7c34447baece8', '101.226.66.180', 'Mozilla/4.0', '1411446760', '');
INSERT INTO syjx_sessions VALUES ('4ce19721de219fd4711806df43fd4bbf', '180.153.206.23', 'Mozilla/4.0', '1411446047', '');

-- ----------------------------
-- Table structure for `syjx_slide`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_slide`;
CREATE TABLE `syjx_slide` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` mediumint(8) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `remark` mediumtext NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `listorder` int(3) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`type`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_slide
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_tags`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_tags`;
CREATE TABLE `syjx_tags` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `listorder` mediumint(9) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL default '1',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_tags
-- ----------------------------

-- ----------------------------
-- Table structure for `syjx_tpltags`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_tpltags`;
CREATE TABLE `syjx_tpltags` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `value` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `listorder` mediumint(9) unsigned NOT NULL default '99',
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_tpltags
-- ----------------------------
INSERT INTO syjx_tpltags VALUES ('1', '基本配置标签', 'system', '<?=$config[\'site_name\'];?>', '站点名称。其中site_name为参数，默认参数有：site_name（站点名称）、site_title（站点标题）、site_keywords（站点关键词）、site_description（站点描述）、seo_title（当前页SEO标题）、seo_keywords（当前页SEO关键词）、seo_description（当前页SEO描述）、site_logo（站点logo）、site_template（站点模板文件夹）、site_templateurl（站点模板文件夹路径），这里的参数还包括您自定义的配置，在后台->系统管理->站点设置中查看', '99');
INSERT INTO syjx_tpltags VALUES ('2', '搜索标签', 'system', '<?=x6cms_search(\'article\',true);?>', '其中有两个参数：参数1：article(默认搜索模型)\r\n参数2:true或者false（是否有下拉选择模型搜索）\r\n其中参数1的模型，后台->系统管理->模型管理中的模型表名，注意，只能填写允许搜索的模型', '99');
INSERT INTO syjx_tpltags VALUES ('3', '文件路径标签', 'system', '<?=x6cms_path(\'logo.png\');?>', '得到文件的完整路径。其中 logo.png即为参数，相对于系统根目录。', '99');
INSERT INTO syjx_tpltags VALUES ('4', '网址URL标签', 'system', '<?=x6cms_url(\'news\');?>', '得到页面的完整路径，其中 news 为参数，会生成 http://www.anli.com/demo/index.php?/news', '99');
INSERT INTO syjx_tpltags VALUES ('5', '语言标签', 'system', '<?php $tmpData = x6cms_lang();?>\r\n<?php foreach($tmpData as $item):?>\r\n<li>\r\n <a href=\"<?=$item[\'url\']?>\">\r\n  <img src=\"<?=$item[\'thumb\']?>\" alt=\"<?=$item[\'title\']?>\"/>\r\n </a>\r\n</li>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_lang();?>得到语言数组\r\n<?php foreach($tmpData as $item):?>\r\n循环数据：\r\n<?=$item[\'title\'];?>语言名称\r\n<?=$item[\'thumb\'];?>语言图标\r\n<?=$item[\'url\'];?>该语言首页地址\r\n<?php endforeach;?>', '99');
INSERT INTO syjx_tpltags VALUES ('6', '网站栏目', 'system', '<?=x6cms_category(0);?>', '其中0为参数，控制栏目显示多少级（0或不填即为显示所有栏目，1只显示顶级栏目2显示两级，以此类推）', '99');
INSERT INTO syjx_tpltags VALUES ('7', '加载模板', 'system', '<?php $this->load->view($config[\'site_template\'].\'/head\');?>', 'head 为参数，意思是加载head.php（头部）文件，如果为foot即，加载foot.php（底部）文件', '99');
INSERT INTO syjx_tpltags VALUES ('8', '幻灯标签', 'model', '<?php $tmpData = x6cms_slide(2);?>\r\n<?php foreach($tmpData as $item):?>\r\n<a href=\"<?=$item[\'url\']?>\" target=\"_blank\">\r\n<img src=\"<?=$item[\'thumb\']?>\" alt=\"<?=$item[\'title\']?>\" width=\"640\" height=\"250\" />\r\n</a>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_slide(2);?>\r\n取得后台系统管理->类别管理中幻灯分类id为2的所有幻灯数据\r\n<?=$item[\'url\']?> 链接\r\n<?=$item[\'thumb\']?> 图片\r\n<?=$item[\'title\']?> 标题\r\n<?=$item[\'description\']?> 描述', '99');
INSERT INTO syjx_tpltags VALUES ('9', '面包屑导航', 'seo', '<?=x6cms_location($category,\' > \');?>', '返回当前页面路径，用于除首页、RSS聚合、分类聚合、网站地图之外的其他页面。\r\n两个参数：$category，默认，一般不需要修改； \' > \'两个链接直接的连接符号。\r\n例：文章列表页会生成：首页 > 新闻中心 > 小六动态\r\n', '99');
INSERT INTO syjx_tpltags VALUES ('10', '导航标签', 'model', '<?php $tmpData = x6cms_navigation(4);?>\r\n<?php foreach($tmpData as $item):?>\r\n<li><a href=\"<?=$item[\'url\']?>\" <?=$item[\'color\']?>><?=$item[\'title\']?></a></li>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_navigation(4);?>\r\n取回导航分类ID为4的所有链接导航\r\n<?=$item[\'url\']?>导航链接\r\n<?=$item[\'color\']?>导航颜色\r\n<?=$item[\'title\']?>导航文字\r\n<?=$item[\'thumb\']?>导航图片', '99');
INSERT INTO syjx_tpltags VALUES ('11', '内容数据标签', 'content', '<?php $tmpData = x6cms_modellist(\'article\',0,\'default\',7,0);?>\r\n<?php foreach($tmpData as $item):?>\r\n<li>\r\n[<a href=\"<?=$item[\'categoryurl\']?>\"><?=$item[\'categoryname\']?></a>]\r\n<a href=\"<?=$item[\'url\']?>\" style=\"<?=$item[\'color\']?><?=$item[\'isbold\']?>\"><?=$item[\'title\']?></a>\r\n</li>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_modellist(\'article\',0,\'default\',7,0);?>\r\n三个参数：1、article(模型，还包括product、ask、hr、down)。2、0（分类栏目ID），如果为0即该模型下所有栏目。3：default（默认排序），puttime(发布时间)、hits(点击量)、id。4：7（显示条数）5：0（包括所有推荐位的数据）或者1（不包含所有推荐位的数据）\r\n<?=$item[\'categoryurl\']?>该条数据的栏目链接\r\n<?=$item[\'categoryname\']?>该条数据的栏目名称\r\n<?=$item[\'url\']?>该条数据的链接\r\n<?=$item[\'title\']?>该条数据的标题\r\n<?=$item[\'color\']?>该条数据的显示颜色\r\n<?=$item[\'isbold\']?>加粗\r\n<?=$item[\'thumb\']?>缩略图\r\n<?=$item[\'puttime\']?>发布时间\r\n<?=$item[\'tagsstr\']?>标签\r\n<?=$item[\'tagsstr\']?>标签\r\n<?=$item[\'oldur\']?>下载链接（只有下载模块，oldurl，直接显示链接）\r\n<?=$item[\'downurl\']?>下载链接（只有下载模块，downurl，经过转义的链接）\r\n<?=$item[\'categorymodel\']?>该条数据所属模型\r\n<?=$item[\'categoryid\']?>该条数据栏目的id', '99');
INSERT INTO syjx_tpltags VALUES ('12', '推荐位标签', 'content', '<?php $tmpData = x6cms_recommend(1,\'default\',7);?>\r\n<?php foreach($tmpData as $item):?>\r\n<li>\r\n[<a href=\"<?=$item[\'categoryurl\']?>\"><?=$item[\'categoryname\']?></a>]\r\n<a href=\"<?=$item[\'url\']?>\" style=\"<?=$item[\'color\']?><?=$item[\'isbold\']?>\"><?=$item[\'title\']?></a>\r\n</li>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_recommend(1,\'default\',7);?>\r\n三个参数：1、1（推荐位ID）。2、default（默认排序），puttime(发布时间)、hits(点击量)、id。3：7（显示条数）\r\n<?=$item[\'categoryurl\']?>该条数据的栏目链接\r\n<?=$item[\'categoryname\']?>该条数据的栏目名称\r\n<?=$item[\'url\']?>该条数据的链接\r\n<?=$item[\'title\']?>该条数据的标题\r\n<?=$item[\'color\']?>该条数据的显示颜色\r\n<?=$item[\'isbold\']?>加粗\r\n<?=$item[\'thumb\']?>缩略图\r\n<?=$item[\'puttime\']?>发布时间\r\n<?=$item[\'tagsstr\']?>标签\r\n<?=$item[\'tagsstr\']?>标签\r\n<?=$item[\'oldur\']?>下载链接（只有下载模块，oldurl，直接显示链接）\r\n<?=$item[\'downurl\']?>下载链接（只有下载模块，downurl，经过转义的链接）\r\n<?=$item[\'categorymodel\']?>该条数据所属模型\r\n<?=$item[\'categoryid\']?>该条数据栏目的id', '99');
INSERT INTO syjx_tpltags VALUES ('13', '碎片标签', 'model', '<?=x6cms_fragment(\'index_cpjs\')?>', '参数：index_cpjs（碎片变量名称）\r\n显示：该变量名称的值', '99');
INSERT INTO syjx_tpltags VALUES ('14', '聚合标签', 'seo', '<?php $tmpData = x6cms_tags(5);?>\r\n<?php foreach($tmpData as $item):?>\r\n<a href=\"<?=$item[\'url\']?>\" class=\"font<?=rand(1,10)?>\"><?=$item[\'title\']?></a>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_tags(5);?>\r\n取得聚合标签的数据\r\n<?=$item[\'url\']?>标签链接\r\n<?=$item[\'title\']?>标签文字', '99');
INSERT INTO syjx_tpltags VALUES ('15', '聚合标签数据', 'seo', '<?php $tmpData = x6cms_tagsData(\'article\',$tags,5);?>\r\n<?php foreach($tmpData as $item):?>\r\n<li>[<a href=\"<?=$item[\'categoryurl\']?>\"><?=$item[\'categoryname\']?></a>] \r\n<a href=\"<?=$item[\'url\']?>\" target=\"_blank\"><?=$item[\'title\']?></a>\r\n<span><?=$item[\'puttime\']?></span></li>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_tagsData(\'article\',$tags,5);?>\r\n三个参数：1、article（文章模型数据）2、$tags(标签文字，在标签页面，直接使用$tags,如果在其他页面使用，直接输入标签文字)。3、5（显示数据条数）\r\n数据显示，与x6cms_modellist的一样', '99');
INSERT INTO syjx_tpltags VALUES ('16', '友情链接', 'model', '<?php $tmpData = x6cms_link();?>\r\n<?php foreach($tmpData as $item):?>\r\n<a href=\"<?=$item[\'url\']?>\" target=\"_blank\" title=\"<?=$item[\'description\']?>\"><?=$item[\'title\']?></a>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '<?php $tmpData = x6cms_link(0);?>\r\n取得友情链接数据，参数：0（友情链接分类ID，如果为0或空即显示所有链接）\r\n<?=$item[\'url\']?>链接\r\n<?=$item[\'description\']?>链接描述\r\n<?=$item[\'title\']?>链接文字', '99');
INSERT INTO syjx_tpltags VALUES ('17', '客服标签', 'model', '<?php $tmpData = x6cms_online();?>\r\n<?php foreach($tmpData as $item):?>\r\n<?=$item[\'type\']?>\r\n<?=$item[\'title\']?>\r\n<?=$item[\'description\']?>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', 'type:客服类型（qq：qq客服、wangwang：旺旺客服、email：邮箱客服、code：纯代码）\r\ntitle：客服文字\r\ndescription：客服号码或者代码', '99');
INSERT INTO syjx_tpltags VALUES ('18', '栏目左侧分类', 'content', '<?php $tmpData = x6cms_thiscategory($category);?>\r\n<?php foreach ($tmpData as $item): ?>\r\n<li class=\"level<?=$item[\'level\']?><?php if($item[\'id\']==$category[\'id\']):?> active<?php endif;?>\">\r\n<a href=\"<?=$item[\'url\']?>\"><?=$item[\'name\']?></a>\r\n</li>\r\n<?php endforeach; ?>', '只应用于栏目列表页和详情页', '99');
INSERT INTO syjx_tpltags VALUES ('19', '栏目标签', 'seo', '<?php $tmpData = x6cms_allcategory();?>\r\n<?php foreach ($tmpData as $item): ?>\r\n<li class=\"level<?=$item[\'level\']?>\">\r\n<a href=\"<?=$item[\'url\']?>\"><?=$item[\'name\']?></a>\r\n</li>\r\n<?php endforeach;?>\r\n<?php unset($tmpData,$item);?>', '用于站点地图和rss，展示网站所有栏目的链接', '99');
INSERT INTO syjx_tpltags VALUES ('20', '内容相关标签', 'content', '<?php $tmpData = x6cms_related($detail);?>\r\n<?php foreach ($tmpData as $item): ?>\r\n<li><a href=\"<?=$item[\'url\']?>\"><?=$item[\'title\']?></a></li>\r\n<?php endforeach; ?>\r\n<?php unset($tmpData,$item);?>', '用于各栏目详情页，展示当前文章（产品等）相关的信息', '99');

-- ----------------------------
-- Table structure for `syjx_type`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_type`;
CREATE TABLE `syjx_type` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `listorder` tinyint(4) unsigned NOT NULL default '99',
  `status` tinyint(1) unsigned NOT NULL default '1',
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_type
-- ----------------------------
INSERT INTO syjx_type VALUES ('1', '友情链接', 'link', '', '', '99', '1', 'zh_cn');

-- ----------------------------
-- Table structure for `syjx_user`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_user`;
CREATE TABLE `syjx_user` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `usergroup` mediumint(8) unsigned NOT NULL default '0',
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` char(6) NOT NULL default '',
  `email` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL default '0',
  `tel` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `lasttime` int(10) unsigned NOT NULL default '0',
  `regip` char(15) NOT NULL,
  `lastip` char(15) NOT NULL,
  `logincount` int(11) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `usergroup` (`usergroup`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_user
-- ----------------------------
INSERT INTO syjx_user VALUES ('1', '1', 'admin', '1531fb296471aa225e05e5653bcde39b', 'VHCSR1', '275052454@qq.com', '黄老师', '1', '', '', '', '', '1335922827', '1411004964', '1411345358', '127.0.0.1', '59.174.125.152', '76', '1');

-- ----------------------------
-- Table structure for `syjx_usergroup`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_usergroup`;
CREATE TABLE `syjx_usergroup` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `varname` varchar(20) NOT NULL,
  `listorder` tinyint(4) unsigned NOT NULL default '99',
  `purview` text NOT NULL,
  `isupdate` tinyint(1) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_usergroup
-- ----------------------------
INSERT INTO syjx_usergroup VALUES ('1', 'superadmin', '1', 'a:4:{i:0;a:27:{i:0;s:1:\"2\";i:1;s:2:\"33\";i:2;s:2:\"32\";i:3;s:2:\"21\";i:4;s:2:\"15\";i:5;s:2:\"35\";i:6;s:2:\"11\";i:7;s:1:\"9\";i:8;s:1:\"5\";i:9;s:1:\"3\";i:10;s:2:\"34\";i:11;s:2:\"22\";i:12;s:2:\"25\";i:13;s:1:\"4\";i:14;s:2:\"38\";i:15;s:1:\"6\";i:16;s:2:\"36\";i:17;s:2:\"39\";i:18;s:1:\"1\";i:19;s:2:\"24\";i:20;s:2:\"19\";i:21;s:2:\"20\";i:22;s:2:\"54\";i:23;s:2:\"57\";i:24;s:2:\"40\";i:25;s:2:\"42\";i:26;s:2:\"37\";}i:1;a:27:{s:7:\"purview\";a:3:{s:2:\"id\";s:1:\"2\";s:5:\"class\";s:7:\"purview\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:10:\"adminindex\";a:3:{s:2:\"id\";s:2:\"33\";s:5:\"class\";s:10:\"adminindex\";s:6:\"method\";b:0;}s:8:\"personal\";a:3:{s:2:\"id\";s:2:\"32\";s:5:\"class\";s:8:\"personal\";s:6:\"method\";b:0;}s:8:\"category\";a:3:{s:2:\"id\";s:2:\"21\";s:5:\"class\";s:8:\"category\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:5:\"slide\";a:3:{s:2:\"id\";s:2:\"15\";s:5:\"class\";s:5:\"slide\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:7:\"propass\";a:3:{s:2:\"id\";s:2:\"35\";s:5:\"class\";s:7:\"propass\";s:6:\"method\";a:1:{i:0;s:4:\"save\";}}s:7:\"article\";a:3:{s:2:\"id\";s:2:\"11\";s:5:\"class\";s:7:\"article\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:4:\"link\";a:3:{s:2:\"id\";s:1:\"9\";s:5:\"class\";s:4:\"link\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:7:\"content\";a:3:{s:2:\"id\";s:1:\"5\";s:5:\"class\";s:7:\"content\";s:6:\"method\";b:0;}s:9:\"usergroup\";a:3:{s:2:\"id\";s:1:\"3\";s:5:\"class\";s:9:\"usergroup\";s:6:\"method\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";i:4;s:5:\"grant\";}}s:7:\"profile\";a:3:{s:2:\"id\";s:2:\"34\";s:5:\"class\";s:7:\"profile\";s:6:\"method\";a:1:{i:0;s:4:\"save\";}}s:10:\"navigation\";a:3:{s:2:\"id\";s:2:\"22\";s:5:\"class\";s:10:\"navigation\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:7:\"product\";a:3:{s:2:\"id\";s:2:\"25\";s:5:\"class\";s:7:\"product\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:4:\"user\";a:3:{s:2:\"id\";s:1:\"4\";s:5:\"class\";s:4:\"user\";s:6:\"method\";a:3:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";}}s:6:\"online\";a:3:{s:2:\"id\";s:2:\"38\";s:5:\"class\";s:6:\"online\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:6:\"module\";a:3:{s:2:\"id\";s:1:\"6\";s:5:\"class\";s:6:\"module\";s:6:\"method\";b:0;}s:8:\"fragment\";a:3:{s:2:\"id\";s:2:\"36\";s:5:\"class\";s:8:\"fragment\";s:6:\"method\";a:3:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";}}s:4:\"down\";a:3:{s:2:\"id\";s:2:\"39\";s:5:\"class\";s:4:\"down\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:6:\"system\";a:3:{s:2:\"id\";s:1:\"1\";s:5:\"class\";s:6:\"system\";s:6:\"method\";b:0;}s:2:\"hr\";a:3:{s:2:\"id\";s:2:\"24\";s:5:\"class\";s:2:\"hr\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:6:\"config\";a:3:{s:2:\"id\";s:2:\"19\";s:5:\"class\";s:6:\"config\";s:6:\"method\";a:6:{i:0;s:3:\"add\";i:1;s:4:\"base\";i:2;s:4:\"lang\";i:3;s:4:\"mail\";i:4;s:4:\"attr\";i:5;s:3:\"del\";}}s:4:\"type\";a:3:{s:2:\"id\";s:2:\"20\";s:5:\"class\";s:4:\"type\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:7:\"tpltags\";a:3:{s:2:\"id\";s:2:\"54\";s:5:\"class\";s:7:\"tpltags\";s:6:\"method\";b:0;}s:5:\"video\";a:3:{s:2:\"id\";s:2:\"57\";s:5:\"class\";s:5:\"video\";s:6:\"method\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:3:\"del\";i:3;s:5:\"order\";}}s:8:\"database\";a:3:{s:2:\"id\";s:2:\"40\";s:5:\"class\";s:8:\"database\";s:6:\"method\";a:5:{i:0;s:6:\"backup\";i:1;s:8:\"download\";i:2;s:7:\"upgrade\";i:3;s:8:\"optimize\";i:4;s:3:\"del\";}}s:8:\"template\";a:3:{s:2:\"id\";s:2:\"42\";s:5:\"class\";s:8:\"template\";s:6:\"method\";a:1:{i:0;s:4:\"edit\";}}s:10:\"clearcache\";a:3:{s:2:\"id\";s:2:\"37\";s:5:\"class\";s:10:\"clearcache\";s:6:\"method\";b:0;}}i:2;a:5:{i:1;a:8:{i:0;a:6:{s:2:\"id\";s:1:\"2\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:7:\"purview\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"3\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:9:\"usergroup\";s:6:\"method\";s:24:\"add,edit,del,order,grant\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:1:\"4\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:4:\"user\";s:6:\"method\";s:12:\"add,edit,del\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:2:\"19\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:6:\"config\";s:6:\"method\";s:27:\"add,base,lang,mail,attr,del\";s:9:\"listorder\";s:1:\"6\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:2:\"54\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:7:\"tpltags\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"7\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:2:\"40\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:8:\"database\";s:6:\"method\";s:36:\"backup,download,upgrade,optimize,del\";s:9:\"listorder\";s:2:\"10\";s:6:\"status\";s:1:\"1\";}i:6;a:6:{s:2:\"id\";s:2:\"42\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:8:\"template\";s:6:\"method\";s:4:\"edit\";s:9:\"listorder\";s:2:\"11\";s:6:\"status\";s:1:\"1\";}i:7;a:6:{s:2:\"id\";s:2:\"37\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:10:\"clearcache\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:2:\"12\";s:6:\"status\";s:1:\"1\";}}i:32;a:3:{i:0;a:6:{s:2:\"id\";s:2:\"33\";s:6:\"parent\";s:2:\"32\";s:5:\"class\";s:10:\"adminindex\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:2:\"35\";s:6:\"parent\";s:2:\"32\";s:5:\"class\";s:7:\"propass\";s:6:\"method\";s:4:\"save\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:2:\"34\";s:6:\"parent\";s:2:\"32\";s:5:\"class\";s:7:\"profile\";s:6:\"method\";s:4:\"save\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}}i:0;a:4:{i:0;a:6:{s:2:\"id\";s:2:\"32\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:8:\"personal\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"5\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:7:\"content\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:1:\"6\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"module\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:1:\"1\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"system\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}}i:5;a:6:{i:0;a:6:{s:2:\"id\";s:2:\"21\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:8:\"category\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:2:\"11\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:7:\"article\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:2:\"25\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:7:\"product\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:2:\"39\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:4:\"down\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:2:\"24\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:2:\"hr\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"6\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:2:\"57\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:5:\"video\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"7\";s:6:\"status\";s:1:\"1\";}}i:6;a:6:{i:0;a:6:{s:2:\"id\";s:2:\"15\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:5:\"slide\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"9\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:4:\"link\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:2:\"22\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:10:\"navigation\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:2:\"38\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:6:\"online\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:2:\"36\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:8:\"fragment\";s:6:\"method\";s:12:\"add,edit,del\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:2:\"20\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:4:\"type\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"6\";s:6:\"status\";s:1:\"1\";}}}i:3;a:4:{i:32;a:6:{s:2:\"id\";s:2:\"32\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:8:\"personal\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:1:\"5\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:7:\"content\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:6;a:6:{s:2:\"id\";s:1:\"6\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"module\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"1\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"system\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}}}', '0', '1');
INSERT INTO syjx_usergroup VALUES ('6', 'generaladmin', '2', 'a:4:{i:0;a:37:{i:0;s:2:\"32\";i:1;s:2:\"33\";i:2;s:2:\"23\";i:3;s:2:\"21\";i:4;s:2:\"15\";i:5;s:1:\"2\";i:6;s:2:\"35\";i:7;s:2:\"28\";i:8;s:1:\"3\";i:9;s:1:\"5\";i:10;s:2:\"11\";i:11;s:1:\"9\";i:12;s:2:\"34\";i:13;s:1:\"4\";i:14;s:2:\"22\";i:15;s:1:\"7\";i:16;s:2:\"25\";i:17;s:2:\"30\";i:18;s:2:\"14\";i:19;s:2:\"29\";i:20;s:1:\"6\";i:21;s:2:\"38\";i:22;s:2:\"43\";i:23;s:2:\"39\";i:24;s:2:\"36\";i:25;s:1:\"1\";i:26;s:2:\"20\";i:27;s:2:\"24\";i:28;s:2:\"19\";i:29;s:2:\"54\";i:30;s:2:\"41\";i:31;s:2:\"53\";i:32;s:2:\"51\";i:33;s:2:\"52\";i:34;s:2:\"40\";i:35;s:2:\"42\";i:36;s:2:\"37\";}i:1;a:37:{s:8:\"personal\";a:3:{s:2:\"id\";s:2:\"32\";s:5:\"class\";s:8:\"personal\";s:6:\"method\";b:0;}s:10:\"adminindex\";a:3:{s:2:\"id\";s:2:\"33\";s:5:\"class\";s:10:\"adminindex\";s:6:\"method\";b:0;}s:4:\"tags\";a:3:{s:2:\"id\";s:2:\"23\";s:5:\"class\";s:4:\"tags\";s:6:\"method\";b:0;}s:8:\"category\";a:3:{s:2:\"id\";s:2:\"21\";s:5:\"class\";s:8:\"category\";s:6:\"method\";b:0;}s:5:\"slide\";a:3:{s:2:\"id\";s:2:\"15\";s:5:\"class\";s:5:\"slide\";s:6:\"method\";b:0;}s:7:\"purview\";a:3:{s:2:\"id\";s:1:\"2\";s:5:\"class\";s:7:\"purview\";s:6:\"method\";b:0;}s:7:\"propass\";a:3:{s:2:\"id\";s:2:\"35\";s:5:\"class\";s:7:\"propass\";s:6:\"method\";b:0;}s:8:\"keywords\";a:3:{s:2:\"id\";s:2:\"28\";s:5:\"class\";s:8:\"keywords\";s:6:\"method\";b:0;}s:9:\"usergroup\";a:3:{s:2:\"id\";s:1:\"3\";s:5:\"class\";s:9:\"usergroup\";s:6:\"method\";b:0;}s:7:\"content\";a:3:{s:2:\"id\";s:1:\"5\";s:5:\"class\";s:7:\"content\";s:6:\"method\";b:0;}s:7:\"article\";a:3:{s:2:\"id\";s:2:\"11\";s:5:\"class\";s:7:\"article\";s:6:\"method\";b:0;}s:4:\"link\";a:3:{s:2:\"id\";s:1:\"9\";s:5:\"class\";s:4:\"link\";s:6:\"method\";b:0;}s:7:\"profile\";a:3:{s:2:\"id\";s:2:\"34\";s:5:\"class\";s:7:\"profile\";s:6:\"method\";b:0;}s:4:\"user\";a:3:{s:2:\"id\";s:1:\"4\";s:5:\"class\";s:4:\"user\";s:6:\"method\";b:0;}s:10:\"navigation\";a:3:{s:2:\"id\";s:2:\"22\";s:5:\"class\";s:10:\"navigation\";s:6:\"method\";b:0;}s:3:\"seo\";a:3:{s:2:\"id\";s:1:\"7\";s:5:\"class\";s:3:\"seo\";s:6:\"method\";b:0;}s:7:\"product\";a:3:{s:2:\"id\";s:2:\"25\";s:5:\"class\";s:7:\"product\";s:6:\"method\";b:0;}s:8:\"htaccess\";a:3:{s:2:\"id\";s:2:\"30\";s:5:\"class\";s:8:\"htaccess\";s:6:\"method\";b:0;}s:3:\"ask\";a:3:{s:2:\"id\";s:2:\"14\";s:5:\"class\";s:3:\"ask\";s:6:\"method\";b:0;}s:6:\"robots\";a:3:{s:2:\"id\";s:2:\"29\";s:5:\"class\";s:6:\"robots\";s:6:\"method\";b:0;}s:6:\"module\";a:3:{s:2:\"id\";s:1:\"6\";s:5:\"class\";s:6:\"module\";s:6:\"method\";b:0;}s:6:\"online\";a:3:{s:2:\"id\";s:2:\"38\";s:5:\"class\";s:6:\"online\";s:6:\"method\";b:0;}s:7:\"sitemap\";a:3:{s:2:\"id\";s:2:\"43\";s:5:\"class\";s:7:\"sitemap\";s:6:\"method\";b:0;}s:4:\"down\";a:3:{s:2:\"id\";s:2:\"39\";s:5:\"class\";s:4:\"down\";s:6:\"method\";b:0;}s:8:\"fragment\";a:3:{s:2:\"id\";s:2:\"36\";s:5:\"class\";s:8:\"fragment\";s:6:\"method\";b:0;}s:6:\"system\";a:3:{s:2:\"id\";s:1:\"1\";s:5:\"class\";s:6:\"system\";s:6:\"method\";b:0;}s:4:\"type\";a:3:{s:2:\"id\";s:2:\"20\";s:5:\"class\";s:4:\"type\";s:6:\"method\";b:0;}s:2:\"hr\";a:3:{s:2:\"id\";s:2:\"24\";s:5:\"class\";s:2:\"hr\";s:6:\"method\";b:0;}s:6:\"config\";a:3:{s:2:\"id\";s:2:\"19\";s:5:\"class\";s:6:\"config\";s:6:\"method\";b:0;}s:7:\"tpltags\";a:3:{s:2:\"id\";s:2:\"54\";s:5:\"class\";s:7:\"tpltags\";s:6:\"method\";b:0;}s:9:\"guestbook\";a:3:{s:2:\"id\";s:2:\"41\";s:5:\"class\";s:9:\"guestbook\";s:6:\"method\";b:0;}s:9:\"recommend\";a:3:{s:2:\"id\";s:2:\"53\";s:5:\"class\";s:9:\"recommend\";s:6:\"method\";b:0;}s:4:\"lang\";a:3:{s:2:\"id\";s:2:\"51\";s:5:\"class\";s:4:\"lang\";s:6:\"method\";b:0;}s:5:\"model\";a:3:{s:2:\"id\";s:2:\"52\";s:5:\"class\";s:5:\"model\";s:6:\"method\";b:0;}s:8:\"database\";a:3:{s:2:\"id\";s:2:\"40\";s:5:\"class\";s:8:\"database\";s:6:\"method\";b:0;}s:8:\"template\";a:3:{s:2:\"id\";s:2:\"42\";s:5:\"class\";s:8:\"template\";s:6:\"method\";b:0;}s:10:\"clearcache\";a:3:{s:2:\"id\";s:2:\"37\";s:5:\"class\";s:10:\"clearcache\";s:6:\"method\";b:0;}}i:2;a:6:{i:0;a:5:{i:0;a:6:{s:2:\"id\";s:2:\"32\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:8:\"personal\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"5\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:7:\"content\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:1:\"7\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:3:\"seo\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:1:\"6\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"module\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:1:\"1\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"system\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}}i:32;a:3:{i:0;a:6:{s:2:\"id\";s:2:\"33\";s:6:\"parent\";s:2:\"32\";s:5:\"class\";s:10:\"adminindex\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:2:\"35\";s:6:\"parent\";s:2:\"32\";s:5:\"class\";s:7:\"propass\";s:6:\"method\";s:4:\"save\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:2:\"34\";s:6:\"parent\";s:2:\"32\";s:5:\"class\";s:7:\"profile\";s:6:\"method\";s:4:\"save\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}}i:7;a:5:{i:0;a:6:{s:2:\"id\";s:2:\"23\";s:6:\"parent\";s:1:\"7\";s:5:\"class\";s:4:\"tags\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:2:\"28\";s:6:\"parent\";s:1:\"7\";s:5:\"class\";s:8:\"keywords\";s:6:\"method\";s:12:\"add,edit,del\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:2:\"30\";s:6:\"parent\";s:1:\"7\";s:5:\"class\";s:8:\"htaccess\";s:6:\"method\";s:12:\"save,restore\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:2:\"29\";s:6:\"parent\";s:1:\"7\";s:5:\"class\";s:6:\"robots\";s:6:\"method\";s:12:\"save,restore\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:2:\"43\";s:6:\"parent\";s:1:\"7\";s:5:\"class\";s:7:\"sitemap\";s:6:\"method\";s:21:\"generate,download,del\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}}i:5;a:9:{i:0;a:6:{s:2:\"id\";s:2:\"21\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:8:\"category\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:2:\"11\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:7:\"article\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:2:\"25\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:7:\"product\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:2:\"14\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:3:\"ask\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:2:\"39\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:4:\"down\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:2:\"24\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:2:\"hr\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"6\";s:6:\"status\";s:1:\"1\";}i:6;a:6:{s:2:\"id\";s:2:\"41\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:9:\"guestbook\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"7\";s:6:\"status\";s:1:\"1\";}i:7;a:6:{s:2:\"id\";s:2:\"53\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:9:\"recommend\";s:6:\"method\";s:12:\"add,edit,del\";s:9:\"listorder\";s:1:\"8\";s:6:\"status\";s:1:\"1\";}i:8;a:6:{s:2:\"id\";s:2:\"52\";s:6:\"parent\";s:1:\"5\";s:5:\"class\";s:5:\"model\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"9\";s:6:\"status\";s:1:\"1\";}}i:6;a:6:{i:0;a:6:{s:2:\"id\";s:2:\"15\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:5:\"slide\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"9\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:4:\"link\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:2:\"22\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:10:\"navigation\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:2:\"38\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:6:\"online\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:2:\"36\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:8:\"fragment\";s:6:\"method\";s:12:\"add,edit,del\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:2:\"20\";s:6:\"parent\";s:1:\"6\";s:5:\"class\";s:4:\"type\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"6\";s:6:\"status\";s:1:\"1\";}}i:1;a:9:{i:0;a:6:{s:2:\"id\";s:1:\"2\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:7:\"purview\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"3\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:9:\"usergroup\";s:6:\"method\";s:24:\"add,edit,del,order,grant\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:2;a:6:{s:2:\"id\";s:1:\"4\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:4:\"user\";s:6:\"method\";s:12:\"add,edit,del\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:3;a:6:{s:2:\"id\";s:2:\"19\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:6:\"config\";s:6:\"method\";s:27:\"add,base,lang,mail,attr,del\";s:9:\"listorder\";s:1:\"6\";s:6:\"status\";s:1:\"1\";}i:4;a:6:{s:2:\"id\";s:2:\"54\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:7:\"tpltags\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"7\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:2:\"51\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:4:\"lang\";s:6:\"method\";s:18:\"add,edit,del,order\";s:9:\"listorder\";s:1:\"9\";s:6:\"status\";s:1:\"1\";}i:6;a:6:{s:2:\"id\";s:2:\"40\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:8:\"database\";s:6:\"method\";s:36:\"backup,download,upgrade,optimize,del\";s:9:\"listorder\";s:2:\"10\";s:6:\"status\";s:1:\"1\";}i:7;a:6:{s:2:\"id\";s:2:\"42\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:8:\"template\";s:6:\"method\";s:4:\"edit\";s:9:\"listorder\";s:2:\"11\";s:6:\"status\";s:1:\"1\";}i:8;a:6:{s:2:\"id\";s:2:\"37\";s:6:\"parent\";s:1:\"1\";s:5:\"class\";s:10:\"clearcache\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:2:\"12\";s:6:\"status\";s:1:\"1\";}}}i:3;a:5:{i:32;a:6:{s:2:\"id\";s:2:\"32\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:8:\"personal\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"1\";s:6:\"status\";s:1:\"1\";}i:5;a:6:{s:2:\"id\";s:1:\"5\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:7:\"content\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"2\";s:6:\"status\";s:1:\"1\";}i:7;a:6:{s:2:\"id\";s:1:\"7\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:3:\"seo\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"3\";s:6:\"status\";s:1:\"1\";}i:6;a:6:{s:2:\"id\";s:1:\"6\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"module\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"4\";s:6:\"status\";s:1:\"1\";}i:1;a:6:{s:2:\"id\";s:1:\"1\";s:6:\"parent\";s:1:\"0\";s:5:\"class\";s:6:\"system\";s:6:\"method\";s:0:\"\";s:9:\"listorder\";s:1:\"5\";s:6:\"status\";s:1:\"1\";}}}', '1', '1');
INSERT INTO syjx_usergroup VALUES ('7', 'generaluser', '3', 'a:0:{}', '1', '1');

-- ----------------------------
-- Table structure for `syjx_video`
-- ----------------------------
DROP TABLE IF EXISTS `syjx_video`;
CREATE TABLE `syjx_video` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` mediumint(8) unsigned NOT NULL default '0',
  `title` varchar(120) NOT NULL,
  `uid` int(10) unsigned NOT NULL default '0',
  `keywords` varchar(120) NOT NULL,
  `description` mediumtext NOT NULL,
  `content` text NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `alt` varchar(255) default NULL,
  `color` char(7) NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `videoname` varchar(100) NOT NULL,
  `isbold` tinyint(1) unsigned NOT NULL default '0',
  `tags` varchar(255) NOT NULL,
  `recommends` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `realhits` int(10) unsigned NOT NULL default '0',
  `createtime` int(10) unsigned NOT NULL default '0',
  `updatetime` int(10) unsigned NOT NULL default '0',
  `puttime` int(10) unsigned NOT NULL default '0',
  `tpl` varchar(20) NOT NULL,
  `listorder` int(10) unsigned NOT NULL default '999',
  `status` tinyint(1) unsigned NOT NULL,
  `lang` varchar(20) NOT NULL default 'zh_cn',
  PRIMARY KEY  (`id`),
  KEY `category` (`category`),
  KEY `lang` (`lang`),
  KEY `recommend` (`recommends`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of syjx_video
-- ----------------------------
INSERT INTO syjx_video VALUES ('1', '18', '武汉大学高性能计算平台宣传片 ', '1', '', '', '<h1 style=\"color:#ff6600;\" class=\"STYLE10\">\r\n 平台简介\r\n</h1>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;武汉大学高性能计算系统是为全校师生提供高性能计算服务的公用系统，暂不收取任何费用。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;高性能计算系统由曙光集群、HP集群、HP SMP大型机、GPU集群、存储系统组成。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;<strong>曙光集群</strong>的峰值计算能力为19.64TFlops，包括93个计算节点、6个I/O节点、2个管理节点，每个节点2个CPU，每个CPU \r\n12核，主频2.2GHz，节点内存128GB。节点由40Gbps的IB交换机互联。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;<strong>HP集群</strong>的峰值计算能力为2.675Tflops，包括76个计算节点、10个I/O、2个管理节点，每个节点2个CPU，每个CPU2核，主频2.2GHz，节点内存4GB，节点由10Gbps的IB交换机互联。<br />\r\n&nbsp;&nbsp;集群节点安装64位SuSe11 \r\nLinux系统。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;<strong>SMP大型机</strong>的峰值计算能力为0.252Tflops<strong>，</strong>包括42个1.5GHz \r\n64位安腾2 CPU、196GB内存，HP-UX操作系统。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;<strong>GPU集群的</strong>峰值计算能力为单精度6.18TFlops，包括主机及6块Tesla C2050 \r\nGPU卡，主机为Intel Xeon 4核CPU，主频为2.4GHz，内存为32GB，硬盘为300GB。 主机安装SuSe11 Linux。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;<strong>存储系统的</strong>可用容量约为30TB，由集群、大型机和GPU集群共享。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;<strong>曙光集群和HP集群可组成统一的集群系统</strong>，运行用户的程序。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;系统安装有C/C++、FORTRAN编译系统、MPI和MPICH库。SMP大型机上另外安装OpenMP库。GPU集群安装有CUDA \r\nC编译系统。\r\n</p>\r\n<h1 style=\"color:#ff6600;\" class=\"STYLE9\">\r\n 使用说明\r\n</h1>\r\n<span class=\"STYLE9\">&nbsp;&nbsp;用户通过LSF \r\nportal完成各项工作，具体使用方法请阅读用户手册。请各位用户在成功申请账号后发送邮件至whucslab@foxmail.com获取本集群用户手册或在连接VPN后，使用http://10.10.10.100/登录高性能计算平台主页下载手册。&nbsp;</span><span class=\"STYLE18\"></span><span class=\"STYLE9\"> </span> \r\n<h1 style=\"color:#ff6600;\" class=\"STYLE10\">\r\n 提交、运行程序\r\n</h1>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;通过Web方式向作业调度系统LSF提交、运行程序。&nbsp;<a class=\"STYLE19\" href=\"http://10.10.10.100:8080/\">点击开始运行程序</a>\r\n</p>\r\n<h1 style=\"color:#ff6600;\" class=\"STYLE10\">\r\n 辅助工具\r\n</h1>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;WinSCP和SecureCRT是方便进行文件传输和编译源程序的辅助工具。&nbsp;<strong><a class=\"STYLE20\" href=\"http://csgrid.whu.edu.cn/tools/winscp-setup.exe\">点击下载WinSCP</a>&nbsp;<a class=\"STYLE20\" href=\"http://csgrid.whu.edu.cn/tools/securecrt.zip\">点击下载SecureCRT</a></strong>\r\n</p>\r\n<h1 class=\"STYLE8\">\r\n 开设账户及高性能平台使用须知\r\n</h1>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;用户申请账户时，尽量以课题组负责老师的名义申请，便于账号的管理和延续使用。请从本站点下载用户申请表、上机承诺书以及保密协议，将电子版填写完毕后发送至whucslab@foxmail.com邮箱，将纸质版签字、盖章后交至计算机学院B203办公室。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;若用户需自行安装应用程序或者因项目需要申请较多资源时，请电话或者邮件联系。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;若需开户或咨询，请联系 程老师 黄老师，联系邮箱：whucslab@foxmail.com ，联系电话：68775201 \r\n。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;用户通过VPN登录连接成功后，使用WEB浏览器访问LSF portal或者使用SecureCRT工具ssh \r\n10.10.10.100登录至node100查看或运行任务，请不要在node100,node101号节点上执行作业。\r\n</p>\r\n<p class=\"STYLE9\">\r\n &nbsp;&nbsp;GPU用户需在node100上登录至node102号节点才能使用。具体使用方法请阅读用户手册。\r\n</p>\r\n<h1 class=\"STYLE8\">\r\n 开设账户后，请各位用户定期备份数据，以免出现数据丢失的情况。从数据安全角度考虑，需将用户目录以及用户对应的程序数据目录设置为只能自己访问，按下列步骤执行：\r\n</h1>\r\n<ul class=\"STYLE9\">\r\n <li>\r\n  进入到需设置权限的文件或文件夹的父目录，其中用户目录对应路径为/dawnfs/users，用户程序对应路径为/dawnfs/apps/data/spooler/用户名。\r\n </li>\r\n <li>\r\n  执行命令 chmod 700 文件或文件夹名\r\n </li>\r\n</ul>\r\n<p class=\"STYLE9\">\r\n 例如，guest用户创建作业abc后，该作业对应路径为/dawnfs/apps/data/spooler/guest/abc，若将abc文件夹设为只能自己访问，步骤为：\r\n</p>\r\n<ul class=\"STYLE9\">\r\n <li>\r\n  切换到/dawnfs/apps/data/spooler/guest路径下\r\n </li>\r\n <li>\r\n  执行chmod 700 abc命令\r\n </li>\r\n <li>\r\n  通过ls -l命令查看guest目录下所有文件及文件夹的读写权限，若abc的读写权限为drwx------，则设置成功\r\n </li>\r\n</ul>\r\n<table border=\"0\" width=\"100%\" class=\"ke-zeroborder\">\r\n <tbody>\r\n  <tr class=\"STYLE18\">\r\n   <td class=\"STYLE14\">\r\n    <div class=\"STYLE12\" align=\"center\">\r\n     <u><a href=\"http://10.10.10.100:8080/\">运行程序</a></u>\r\n    </div>\r\n   </td>\r\n   <td class=\"STYLE14\">\r\n    <div class=\"STYLE12\" align=\"center\">\r\n     <u><a href=\"http://10.10.10.xn--100tools-hm3g/winscp-setup.exe\">下载winSCP</a></u>\r\n    </div>\r\n   </td>\r\n   <td class=\"STYLE14\">\r\n    <div class=\"STYLE12\" align=\"center\">\r\n     <u><a href=\"http://10.10.10.100/tools/securecrt.zip\">下载SecureCRT</a></u>\r\n    </div>\r\n   </td>\r\n   <td class=\"STYLE14\">\r\n    <div class=\"STYLE12\" align=\"center\">\r\n     <u><a href=\"http://10.10.10.100/hpcreadme.pdf\">下载用户手册</a></u>\r\n    </div>\r\n   </td>\r\n   <td class=\"STYLE14\">\r\n    <div class=\"STYLE12\" align=\"center\">\r\n     <u><a href=\"http://csgrid.whu.edu.cn/tools/HPCRegister.zip\">下载用户报名表</a></u>\r\n    </div>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>', 'data/attachment/image/20140917/3f981920bd8dbccfc16875b3a3fd5bb7.jpg', '', '', 'http://csgrid.whu.edu.cn/hpc promotion.flv', '', '0', '0', '', '4', '4', '1410964832', '1410964870', '1410964744', '', '999', '1', 'zh_cn');
