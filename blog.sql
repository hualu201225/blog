-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: system
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_category`
--

DROP TABLE IF EXISTS `admin_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_category` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_controller` varchar(55) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_category`
--

LOCK TABLES `admin_category` WRITE;
/*!40000 ALTER TABLE `admin_category` DISABLE KEYS */;
INSERT INTO `admin_category` VALUES (1,'关于博客','index'),(2,'用户管理','user_control'),(3,'后台分类列表','category_control'),(4,'前台分类列表','index_category_control'),(5,'文章管理','article_control'),(6,'添加文章','add_article'),(7,'评论管理','comment_control'),(8,'添加评论','add_comment'),(9,'后台管理员','admin_user_control');
/*!40000 ALTER TABLE `admin_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `recommend` tinyint(1) NOT NULL,
  `title` varchar(128) NOT NULL DEFAULT '心情',
  `content` text NOT NULL,
  `source` varchar(50) NOT NULL DEFAULT '原创',
  `author` varchar(10) DEFAULT '',
  `last_date` datetime NOT NULL,
  `address` varchar(11) NOT NULL DEFAULT '地球' COMMENT '用户发文章的地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (19,2,0,'凤凰之旅','去年去凤凰，看了湘西的吊脚楼，穿了民族服饰，吃了当地特产血耙鸭，去了虹桥，去了沈从文故居，印象最深的是看了烟雨凤凰晚会，看完之后深深地被这种极具特色的民族歌舞剧而折服，舞台效果好不说，演员们也很给力，演出特别精彩，不过，凤凰这个古镇已经失去了“古”的特征，它正在慢慢现代化。如果要去古镇的话，尽量选择那种商业化还不是很严重的地方，这样，你对古镇的淡雅、慵懒、古老、慢时光的印象才不会被磨灭。','原创','hualu','2015-08-05 15:23:31',''),(30,1,0,'','终于把前端的部分完成得差不多啦，好开心 ^_^','原创','hualu','2015-08-05 16:53:16','兴湘教室'),(31,1,0,'','早上又吃了土豆卷，咳咳，真的是没啥好吃的~今天要攻克后台啦！                                                                                                            ','原创','hualu','2015-08-07 17:18:03','兴湘教室'),(38,3,0,'','早日走上人生巅峰，迎娶高富帅，哈哈哈哈哈                                        \r\n                                    ','','hualu','2015-08-07 16:25:05',''),(39,1,0,'心情','后台终于差不多啦，功能什么的慢慢加就好啦~~','原创','hualu','2015-08-08 11:11:25','兴湘教室'),(40,3,0,'许登宁是只猪','啦啦啦啦啦啦啦啦啦啦啦拉了拉啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦','原创','hualu','2015-08-09 21:48:04','地球'),(41,1,0,'心情','今天一天都没干啥，就只打了游戏哎，忧伤','原创','huamao','2015-08-30 16:50:48','金华'),(42,1,0,'心情','今天来姨妈了。。。。。。真的是想shi的心都有了。。。。','原创','hualu','2015-08-30 16:51:38','金华'),(43,1,0,'心情','今天开始看面试题，吼吼吼吼！fighting！','原创','hualu','2015-08-30 16:52:09','金华'),(44,2,0,'西塘','       8月26号和闺蜜方佳丽一起去了西塘，之前抱了很多美好的幻想，比如说，这个古镇肯定很美很美啦，嘉兴的粽子肯定很好吃啦~~~各种各种，毕竟小桥流水人家小学的时候就读过了，十分向往。但是，到了那里才觉得，貌似这样一个江南古镇，除了桥之外，其他真的是没有太大的亮点。景区不是很大，但是很绕，走进去之后要是不特意地记路很快就会迷路的。。。。每天傍晚5点之后，早上八点之前都可以免费进古镇游玩，所以我们第一天刚到的时候是5点之后进去的，饿得不行，一路吃东西，沿街的店铺真的是很多的啊，各种卖，但是有点失望，很多东西我在凤凰古城也见过，没有什么新意。路上还见到卖木锤酥的，原来木锤酥不是凤凰特产，感觉在商品方面有些被同化。唯一觉得不一样一点的就是，吃到了新鲜的乌梅，还有糯糯的芡实糕，其他真的是不会留下什么印象。总觉得每次出去玩其实是想去感受当地特别的东西的。住的客栈的老板给我们的地图上有写当地特色小吃，有管老太臭豆腐什么的，走了一圈景区已经数不清楚到底有多少家都叫管老太臭豆腐了，也是无语。晚上本来打算去酒吧，从来没有去过酒吧，但是等到晚上去酒吧一条街的时候，那种音乐嘈杂的混乱感让我们顿时没有了兴致。还记得有很多家美国自助冰淇淋店，进去店主会给你一个杯子，让你自己去那边挑选冰淇淋的口味，7元/50g，我们自己根本不知道会打多少，想让店主给我们打，但是店主一直在拒绝，我们又不好意思走人，就拿着杯子每样都打了一点点，以为只要十几块钱吧，但是称了之后已经二十几块了！顿时觉得。。。。。。买个教训吧。。。。再也不吃了，咳咳。','原创','hualu','2015-08-30 17:06:21','地球'),(45,4,0,'写一个函数计算文件相对路径','&lt;?php\r\n//文件路径\r\n$a = \'/a/b/c/d/e.php\';\r\n$b = \'/a/b/12/34/c.php\';\r\necho getRelativePath($a,$b);//结果是：../../../12/34/\r\n\r\nfunction getRelativePath($a,$b){\r\n //得到两个文件路径explode之后的数组表示\r\n $arr_a = explode(\'/\',$a);\r\n $arr_b = explode(\'/\',$b);\r\n //对数组的每一项进行比较\r\n $absolute_path = \'\';\r\n for($i=0;$i<=count($arr_b)-2;$i++){\r\n  $absolute_path .= $arr_a[$i] == $arr_b[$i]?\'../\':$arr_b[$i].\'/\';\r\n }\r\n return $absolute_path;\r\n}\r\n\r\n?&gt;','原创','hualu','2015-08-30 19:50:49','地球'),(46,4,0,'正则替换meta标签','&lt;?php\r\n//要被替换的标签\r\n$str = \"&lt;META http-equiv=\'Content-Type\' content=\'text/html; charset=gbk\'&gt;\";\r\n//用于替换的标签\r\n$str1 = \"&lt;META http-equiv=\'Content-Type\' content=\'text/html; charset=big5\'&gt;\";\r\n//正则匹配\r\n$preg = \'/&lt;meta\\s+http-equiv=(\\\'|\\\")?Content-Type(\\\'|\\\")?\\s+content=(\\\'|\\\")text\\/html;\\s+charset=(.*)(\\\'|\\\")&gt;/is\';//i表示不区分大小写\r\n//如果匹配那么替换\r\nif(preg_match($preg,$str)){\r\n $replace = preg_replace($preg,$str1,$str);\r\n echo htmlspecialchars($replace);\r\n}else{\r\n echo \'不匹配\';\r\n}\r\n?&gt;','原创','hualu','2015-08-30 20:13:48','地球'),(47,4,0,'php获取文件后缀名的方法（摘）','第一种：\r\n\r\n    &lt;?php\r\n     $filename = \"phpddt.jpg\";\r\n     echo substr(strrchr($filename,\".\"),1);\r\n    ?&gt;\r\n\r\n第二种：\r\n\r\n    &lt;?php\r\n     $filename = \"phpddt.jpg\";\r\n     $arr = explode(\".\",$filename);\r\n     echo array_pop($arr);\r\n    ?&gt;\r\n\r\n第三种：\r\n\r\n    &lt;?php\r\n     $filename = \"phpddt.jpg\";\r\n     $info = pathinfo($filename);\r\n     echo $info[\'extension\'];\r\n    ?&gt;\r\n\r\n第四种：\r\n\r\n    &lt;?php\r\n     $filename = \"phpddt.jpg\";\r\n     echo pathinfo($filename,PATHINFO_EXTENSION);\r\n    ?&gt;\r\n\r\n第五种：\r\n\r\n    &lt;?php\r\n     $filename = \"phpddt.jpg\";\r\n     echo substr($filename,strrpos($filename,\".\")+1);\r\n    ?&gt;','原创','hualu','2015-08-30 20:18:35','地球'),(48,4,0,'遍历一个文件夹下的所有文件和子文件夹','&lt;?php\r\n//目录为已存在的某一个文件夹\r\n$path = \'./moban\';\r\nshow_dir($path,$level=1);\r\n\r\nfunction show_dir($path,$level=1){\r\n //如果不是目录，那么返回Null\r\n if(!is_dir($path)) return null;\r\n //首先打印目录名称，前面留$level个空格\r\n echo str_repeat(\'&nbsp\',$level).\"<font [removed]>\".$path.\'文件夹下有：\'.\"<br/>\";\r\n //寻找./unit下的所有文件和文件夹\r\n $arr = glob($path.\'/*\');\r\n foreach($arr as $v){\r\n  if(is_dir($v)) show_dir($v,$level+9);\r\n  echo str_repeat(\' \',$level+9).\"<font [removed]>\".ltrim($v,$path).\"<br/>\";\r\n }\r\n}\r\n最后输出的结果为：\r\n./moban文件夹下有： \r\n          CompileClass.php\r\n          Factory.class.php\r\n          Template.php\r\n          ./moban/cache文件夹下有：  \r\n                   08769cdcb26674c6706093503ff0a3.htm\r\n                   08769cdcb26674c6706093503ff0a3.php\r\n          cache\r\n          cache.class.php\r\n          delete.php\r\n          index.php\r\n          ./moban/template文件夹下有：\r\n                   r.htm\r\n          template\r\n?&gt;','原创','hualu','2015-08-30 21:09:59','地球');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captcha`
--

LOCK TABLES `captcha` WRITE;
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
INSERT INTO `captcha` VALUES (1,1438475353,'::1','4731'),(2,1438475395,'::1','9329');
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'每日心情'),(2,'去过的地方'),(3,'HTML成长之路'),(4,'奋斗吧！PHP'),(5,'日记');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned NOT NULL,
  `belong` int(11) NOT NULL COMMENT '从属于的id（无限极分类）',
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `last_date` datetime NOT NULL,
  `descript` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (60,19,0,'这文章还是不错的','静静','2015-08-05 00:00:00','开心'),(61,19,0,'凤凰确实有点商业化呢','hualu','2015-08-07 17:11:09','还不错呢'),(62,19,0,'这篇文章还是不错的嘛~~~','hualu','2015-08-09 21:46:00','还阔以'),(226,19,61,'adsgsd','gadsg','2015-08-31 21:52:49',''),(227,19,61,'fasdg','gsdag','2015-08-31 21:53:18',''),(228,19,61,'fads','gadsg','2015-08-31 21:56:40',''),(229,19,62,'fda啥事都跟','g第三个','2015-08-31 22:06:13',''),(230,19,60,'f阿三地方','ga第三个','2015-08-31 22:07:54',''),(231,19,60,'f阿三地方','ga第三个','2015-08-31 22:07:54',''),(232,19,227,'gdgadsg','gdsg','2015-10-05 17:15:42',''),(233,19,228,'你好呀','华露','2015-10-05 17:16:00',''),(234,19,62,'可以可以','你猜','2015-10-05 18:45:02','');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_category`
--

DROP TABLE IF EXISTS `user_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_category` (
  `user_category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_category_name` varchar(50) DEFAULT '',
  PRIMARY KEY (`user_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_category`
--

LOCK TABLES `user_category` WRITE;
/*!40000 ALTER TABLE `user_category` DISABLE KEYS */;
INSERT INTO `user_category` VALUES (1,'基本资料'),(2,'兴趣爱好'),(3,'读过的书'),(4,'去过的地方'),(5,'已经完成的计划'),(6,'想要达成的目标');
/*!40000 ALTER TABLE `user_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(20) NOT NULL DEFAULT '',
  `sign` varchar(11) NOT NULL DEFAULT '好好学习，天天向上！' COMMENT '签名',
  `insert_judge_id` int(11) NOT NULL DEFAULT '0',
  `sex` enum('男','女') NOT NULL,
  `birthday` date NOT NULL,
  `residence` varchar(50) NOT NULL DEFAULT '地球' COMMENT '居住地',
  `hobby` varchar(50) NOT NULL,
  `book_readed` varchar(50) NOT NULL,
  `place_gone` varchar(50) NOT NULL,
  `plan_done` varchar(50) NOT NULL,
  `not_done` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (30,'hualu','hualu1994','834739358@qq.com','我是要成为海贼王的女人',1,'女','1994-02-12','浙江金华','睡觉,吃饭,吃饭，睡觉，打豆豆','','','',''),(31,'huamao','huamao','5438543@qq.com','好好学习，天天向上！',0,'男','0000-00-00','地球','','','','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-09  9:02:08
