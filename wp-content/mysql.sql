-- MySQL dump 10.13  Distrib 5.5.30, for Linux (i686)
--
-- Host: localhost    Database: wp_meredithrt
-- ------------------------------------------------------
-- Server version	5.5.30-30.1-log

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
-- Table structure for table `wp_blog_versions`
--

DROP TABLE IF EXISTS `wp_blog_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_blog_versions` (
  `blog_id` bigint(20) NOT NULL DEFAULT '0',
  `db_version` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`blog_id`),
  KEY `db_version` (`db_version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_blog_versions`
--

LOCK TABLES `wp_blog_versions` WRITE;
/*!40000 ALTER TABLE `wp_blog_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_blog_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_blogs`
--

DROP TABLE IF EXISTS `wp_blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_blogs` (
  `blog_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) NOT NULL DEFAULT '0',
  `domain` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `public` tinyint(2) NOT NULL DEFAULT '1',
  `archived` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `mature` tinyint(2) NOT NULL DEFAULT '0',
  `spam` tinyint(2) NOT NULL DEFAULT '0',
  `deleted` tinyint(2) NOT NULL DEFAULT '0',
  `lang_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blog_id`),
  KEY `domain` (`domain`(50),`path`(5)),
  KEY `lang_id` (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_blogs`
--

LOCK TABLES `wp_blogs` WRITE;
/*!40000 ALTER TABLE `wp_blogs` DISABLE KEYS */;
INSERT INTO `wp_blogs` VALUES (1,1,'meredithrt.wpengine.com','/','2012-12-11 20:48:06','2013-04-23 17:09:09',1,'0',0,0,0,0);
/*!40000 ALTER TABLE `wp_blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_commentmeta`
--

LOCK TABLES `wp_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
INSERT INTO `wp_comments` VALUES (1,1,'Mr WordPress','','http://wordpress.org/','','2013-01-22 20:29:46','2013-01-22 20:29:46','Hi, this is a comment.\nTo delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.',0,'1','','',0,0);
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_compmenus`
--

DROP TABLE IF EXISTS `wp_facileforms_compmenus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_compmenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` varchar(30) NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `page` int(11) NOT NULL DEFAULT '1',
  `frame` tinyint(1) NOT NULL DEFAULT '0',
  `border` tinyint(1) NOT NULL DEFAULT '0',
  `params` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_compmenus`
--

LOCK TABLES `wp_facileforms_compmenus` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_compmenus` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_compmenus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_config`
--

DROP TABLE IF EXISTS `wp_facileforms_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_config` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_config`
--

LOCK TABLES `wp_facileforms_config` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_config` DISABLE KEYS */;
INSERT INTO `wp_facileforms_config` VALUES ('archived','0');
INSERT INTO `wp_facileforms_config` VALUES ('arealarge','20');
INSERT INTO `wp_facileforms_config` VALUES ('areamedium','12');
INSERT INTO `wp_facileforms_config` VALUES ('areasmall','4');
INSERT INTO `wp_facileforms_config` VALUES ('cellnewline','1');
INSERT INTO `wp_facileforms_config` VALUES ('compress','1');
INSERT INTO `wp_facileforms_config` VALUES ('csvdelimiter',';');
INSERT INTO `wp_facileforms_config` VALUES ('csvquote','\"');
INSERT INTO `wp_facileforms_config` VALUES ('emailadr','Enter your email address here');
INSERT INTO `wp_facileforms_config` VALUES ('exported','0');
INSERT INTO `wp_facileforms_config` VALUES ('formname','');
INSERT INTO `wp_facileforms_config` VALUES ('formpkg','');
INSERT INTO `wp_facileforms_config` VALUES ('fromname','');
INSERT INTO `wp_facileforms_config` VALUES ('ftp_enable','0');
INSERT INTO `wp_facileforms_config` VALUES ('ftp_host','127.0.0.1');
INSERT INTO `wp_facileforms_config` VALUES ('ftp_pass','');
INSERT INTO `wp_facileforms_config` VALUES ('ftp_port','21');
INSERT INTO `wp_facileforms_config` VALUES ('ftp_root','');
INSERT INTO `wp_facileforms_config` VALUES ('ftp_user','');
INSERT INTO `wp_facileforms_config` VALUES ('getprovider','0');
INSERT INTO `wp_facileforms_config` VALUES ('gridcolor1','#e0e0ff');
INSERT INTO `wp_facileforms_config` VALUES ('gridcolor2','#ffe0e0');
INSERT INTO `wp_facileforms_config` VALUES ('gridshow','1');
INSERT INTO `wp_facileforms_config` VALUES ('gridsize','10');
INSERT INTO `wp_facileforms_config` VALUES ('images','{mossite}/components/com_breezingforms/images');
INSERT INTO `wp_facileforms_config` VALUES ('limitdesc','100');
INSERT INTO `wp_facileforms_config` VALUES ('livesite','0');
INSERT INTO `wp_facileforms_config` VALUES ('mailer','mail');
INSERT INTO `wp_facileforms_config` VALUES ('mailfrom','');
INSERT INTO `wp_facileforms_config` VALUES ('menupkg','');
INSERT INTO `wp_facileforms_config` VALUES ('movepixels','10');
INSERT INTO `wp_facileforms_config` VALUES ('piecepkg','');
INSERT INTO `wp_facileforms_config` VALUES ('scriptpkg','');
INSERT INTO `wp_facileforms_config` VALUES ('sendmail','/usr/sbin/sendmail');
INSERT INTO `wp_facileforms_config` VALUES ('smtpauth','0');
INSERT INTO `wp_facileforms_config` VALUES ('smtphost','localhost');
INSERT INTO `wp_facileforms_config` VALUES ('smtppass','');
INSERT INTO `wp_facileforms_config` VALUES ('smtpport','25');
INSERT INTO `wp_facileforms_config` VALUES ('smtpsecure','none');
INSERT INTO `wp_facileforms_config` VALUES ('smtpuser','');
INSERT INTO `wp_facileforms_config` VALUES ('stylesheet','1');
INSERT INTO `wp_facileforms_config` VALUES ('uploads','{contentdir}/breezingforms/uploads');
INSERT INTO `wp_facileforms_config` VALUES ('viewed','0');
INSERT INTO `wp_facileforms_config` VALUES ('wysiwyg','0');
/*!40000 ALTER TABLE `wp_facileforms_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_elements`
--

DROP TABLE IF EXISTS `wp_facileforms_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` int(11) NOT NULL DEFAULT '0',
  `page` int(11) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(50) NOT NULL DEFAULT '',
  `class1` varchar(30) DEFAULT NULL,
  `class2` varchar(30) DEFAULT NULL,
  `logging` tinyint(1) NOT NULL DEFAULT '1',
  `posx` int(11) DEFAULT NULL,
  `posxmode` tinyint(1) NOT NULL DEFAULT '0',
  `posy` int(11) DEFAULT NULL,
  `posymode` tinyint(1) NOT NULL DEFAULT '0',
  `width` int(11) DEFAULT NULL,
  `widthmode` tinyint(1) NOT NULL DEFAULT '0',
  `height` int(11) DEFAULT NULL,
  `heightmode` tinyint(1) NOT NULL DEFAULT '0',
  `flag1` tinyint(1) NOT NULL DEFAULT '0',
  `flag2` tinyint(1) NOT NULL DEFAULT '0',
  `data1` text,
  `data2` text,
  `data3` text,
  `script1cond` tinyint(1) NOT NULL DEFAULT '0',
  `script1id` int(11) DEFAULT NULL,
  `script1code` text,
  `script1flag1` tinyint(1) NOT NULL DEFAULT '0',
  `script1flag2` tinyint(1) NOT NULL DEFAULT '0',
  `script2cond` tinyint(1) NOT NULL DEFAULT '0',
  `script2id` int(11) DEFAULT NULL,
  `script2code` text,
  `script2flag1` tinyint(1) NOT NULL DEFAULT '0',
  `script2flag2` tinyint(1) NOT NULL DEFAULT '0',
  `script2flag3` tinyint(1) NOT NULL DEFAULT '0',
  `script2flag4` tinyint(1) NOT NULL DEFAULT '0',
  `script2flag5` tinyint(1) NOT NULL DEFAULT '0',
  `script3cond` tinyint(1) NOT NULL DEFAULT '0',
  `script3id` int(11) DEFAULT NULL,
  `script3code` text,
  `script3msg` text,
  `mailback` tinyint(1) NOT NULL DEFAULT '0',
  `mailbackfile` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_elements`
--

LOCK TABLES `wp_facileforms_elements` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_elements` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_elements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_forms`
--

DROP TABLE IF EXISTS `wp_facileforms_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alt_mailfrom` varchar(255) NOT NULL DEFAULT '',
  `alt_fromname` varchar(255) NOT NULL DEFAULT '',
  `mb_alt_mailfrom` varchar(255) NOT NULL DEFAULT '',
  `mb_alt_fromname` varchar(255) NOT NULL DEFAULT '',
  `mailchimp_email_field` varchar(255) NOT NULL DEFAULT '',
  `mailchimp_checkbox_field` varchar(255) NOT NULL DEFAULT '',
  `mailchimp_api_key` varchar(255) NOT NULL DEFAULT '',
  `mailchimp_list_id` varchar(255) NOT NULL DEFAULT '',
  `mailchimp_double_optin` tinyint(1) NOT NULL DEFAULT '1',
  `mailchimp_mergevars` text,
  `mailchimp_text_html_mobile_field` varchar(255) NOT NULL DEFAULT '',
  `mailchimp_send_errors` tinyint(1) NOT NULL DEFAULT '0',
  `mailchimp_update_existing` tinyint(1) NOT NULL DEFAULT '0',
  `mailchimp_replace_interests` tinyint(1) NOT NULL DEFAULT '0',
  `mailchimp_send_welcome` tinyint(1) NOT NULL DEFAULT '0',
  `mailchimp_default_type` varchar(255) NOT NULL DEFAULT 'text',
  `mailchimp_delete_member` tinyint(1) NOT NULL DEFAULT '0',
  `mailchimp_send_goodbye` tinyint(1) NOT NULL DEFAULT '1',
  `mailchimp_send_notify` tinyint(1) NOT NULL DEFAULT '1',
  `mailchimp_unsubscribe_field` varchar(255) NOT NULL DEFAULT '',
  `salesforce_token` varchar(255) NOT NULL DEFAULT '',
  `salesforce_username` varchar(255) NOT NULL DEFAULT '',
  `salesforce_password` varchar(255) NOT NULL DEFAULT '',
  `salesforce_type` varchar(255) NOT NULL DEFAULT '',
  `salesforce_fields` text,
  `salesforce_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `dropbox_email` varchar(255) NOT NULL DEFAULT '',
  `dropbox_password` varchar(255) NOT NULL DEFAULT '',
  `dropbox_folder` text,
  `package` varchar(30) NOT NULL DEFAULT '',
  `template_code` longtext NOT NULL,
  `template_code_processed` longtext NOT NULL,
  `template_areas` longtext NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `runmode` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `custom_mail_subject` varchar(255) NOT NULL DEFAULT '',
  `mb_custom_mail_subject` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `class1` varchar(30) DEFAULT NULL,
  `class2` varchar(30) DEFAULT NULL,
  `width` int(11) NOT NULL DEFAULT '0',
  `widthmode` tinyint(1) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `heightmode` tinyint(1) NOT NULL DEFAULT '0',
  `pages` int(11) NOT NULL DEFAULT '1',
  `emailntf` tinyint(1) NOT NULL DEFAULT '1',
  `mb_emailntf` tinyint(1) NOT NULL DEFAULT '1',
  `emaillog` tinyint(1) NOT NULL DEFAULT '1',
  `mb_emaillog` tinyint(1) NOT NULL DEFAULT '1',
  `emailxml` tinyint(1) NOT NULL DEFAULT '0',
  `mb_emailxml` tinyint(1) NOT NULL DEFAULT '0',
  `email_type` tinyint(1) NOT NULL DEFAULT '0',
  `mb_email_type` tinyint(1) NOT NULL DEFAULT '0',
  `email_custom_template` text,
  `mb_email_custom_template` text,
  `email_custom_html` tinyint(1) NOT NULL DEFAULT '0',
  `mb_email_custom_html` tinyint(1) NOT NULL DEFAULT '0',
  `emailadr` text,
  `dblog` tinyint(1) NOT NULL DEFAULT '1',
  `script1cond` tinyint(1) NOT NULL DEFAULT '0',
  `script1id` int(11) DEFAULT NULL,
  `script1code` text,
  `script2cond` tinyint(1) NOT NULL DEFAULT '0',
  `script2id` int(11) DEFAULT NULL,
  `script2code` text,
  `piece1cond` tinyint(1) NOT NULL DEFAULT '0',
  `piece1id` int(11) DEFAULT NULL,
  `piece1code` text,
  `piece2cond` tinyint(1) NOT NULL DEFAULT '0',
  `piece2id` int(11) DEFAULT NULL,
  `piece2code` text,
  `piece3cond` tinyint(1) NOT NULL DEFAULT '0',
  `piece3id` int(11) DEFAULT NULL,
  `piece3code` text,
  `piece4cond` tinyint(1) NOT NULL DEFAULT '0',
  `piece4id` int(11) DEFAULT NULL,
  `piece4code` text,
  `prevmode` tinyint(1) NOT NULL DEFAULT '2',
  `prevwidth` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_forms`
--

LOCK TABLES `wp_facileforms_forms` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_integrator_criteria_fixed`
--

DROP TABLE IF EXISTS `wp_facileforms_integrator_criteria_fixed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_integrator_criteria_fixed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) NOT NULL,
  `reference_column` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `fixed_value` text NOT NULL,
  `andor` varchar(3) NOT NULL DEFAULT 'AND',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_integrator_criteria_fixed`
--

LOCK TABLES `wp_facileforms_integrator_criteria_fixed` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_integrator_criteria_fixed` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_integrator_criteria_fixed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_integrator_criteria_form`
--

DROP TABLE IF EXISTS `wp_facileforms_integrator_criteria_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_integrator_criteria_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) NOT NULL,
  `reference_column` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `element_id` varchar(255) NOT NULL,
  `andor` varchar(3) NOT NULL DEFAULT 'AND',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_integrator_criteria_form`
--

LOCK TABLES `wp_facileforms_integrator_criteria_form` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_integrator_criteria_form` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_integrator_criteria_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_integrator_criteria_joomla`
--

DROP TABLE IF EXISTS `wp_facileforms_integrator_criteria_joomla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_integrator_criteria_joomla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) NOT NULL,
  `reference_column` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `joomla_object` varchar(255) NOT NULL,
  `andor` varchar(3) NOT NULL DEFAULT 'AND',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_integrator_criteria_joomla`
--

LOCK TABLES `wp_facileforms_integrator_criteria_joomla` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_integrator_criteria_joomla` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_integrator_criteria_joomla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_integrator_items`
--

DROP TABLE IF EXISTS `wp_facileforms_integrator_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_integrator_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `reference_column` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_integrator_items`
--

LOCK TABLES `wp_facileforms_integrator_items` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_integrator_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_integrator_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_integrator_rules`
--

DROP TABLE IF EXISTS `wp_facileforms_integrator_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_integrator_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `form_id` int(11) NOT NULL,
  `reference_table` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'insert',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `finalize_code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_integrator_rules`
--

LOCK TABLES `wp_facileforms_integrator_rules` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_integrator_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_integrator_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_packages`
--

DROP TABLE IF EXISTS `wp_facileforms_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_packages` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `version` varchar(30) NOT NULL DEFAULT '',
  `created` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `author` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `copyright` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_packages`
--

LOCK TABLES `wp_facileforms_packages` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_packages` DISABLE KEYS */;
INSERT INTO `wp_facileforms_packages` VALUES ('','mypck_001','0.0.1','2005-07-31 22:21:23','My First Package','My Name','my.name@my.domain','http://www.my.domain','This is the first package that I created','This FacileForms package is released under the GNU/GPL license');
INSERT INTO `wp_facileforms_packages` VALUES ('FF','stdlib.english','1.5.1','2010-06-21 23:51:45','BreezingForms -Standard Piece and Script Libraries','Markus Bopp','markus.bopp@crosstec.de','http://www.crosstec.de','These are the standard BreezingForms script and piece libraries.','This BreezingForms package is released under the GNU/GPL license');
/*!40000 ALTER TABLE `wp_facileforms_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_pieces`
--

DROP TABLE IF EXISTS `wp_facileforms_pieces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_pieces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `package` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `type` varchar(30) NOT NULL DEFAULT '',
  `code` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_pieces`
--

LOCK TABLES `wp_facileforms_pieces` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_pieces` DISABLE KEYS */;
INSERT INTO `wp_facileforms_pieces` VALUES (1,1,'FF','ff_addCustomCSSFile','Add custom CSS File','Adds a custom css file to the form. To choose a css file, execute this piece and call the function ff_addCustomCSSFile(\'path/to/css/file\') with the RELATIVE (not full!) path to your joomla installation.\r\nDo not forget to call $this->execPieceByName(\'ff_InitLib\') before!\r\n\r\nExample:\r\n\r\nglobal $mainframe;\r\n\r\n$this->execPieceByName(\'ff_InitLib\');\r\n$this->execPieceByName(\'ff_addCustomCSSFile\');\r\n\r\nff_addCustomCSSFile(\'templates/\' . $mainframe->getTemplate() . \'/css/template.css\');','Before Form','function ff_addCustomCSSFile($path){\r\n	if(file_exists(JPATH_SITE . \'/\' . $path)){\r\n		JFactory::getDocument()->addStyleSheet(JURI::root() . $path);\r\n	}\r\n}');
INSERT INTO `wp_facileforms_pieces` VALUES (2,1,'FF','ff_Constants','Constansts definitions','Library constants definitions','Before Form','define(\'FF_DIE\',       \'_ff_die_on_errors_\');\r\ndefine(\'FF_DONTDIE\',   \'_ff_stay_alive_\');\r\ndefine(\'FF_IGNOREDIE\', \'_ff_ignore_if_dying_\');\r\n\r\ndefine(\'FF_ARRAY\',     \'_ff_return_as_array_\');\r\ndefine(\'FF_LIST\',      \'_ff_return_as_list_\');\r\ndefine(\'FF_SLIST\',     \'_ff_return_as_slist_\');\r\ndefine(\'FF_DLIST\',     \'_ff_return_as_dlist_\');\r\n\r\ndefine(\'FF_NOTRIM\',    1);\r\ndefine(\'FF_ALLOWHTML\', 2);\r\ndefine(\'FF_ALLOWRAW\',  4);');
INSERT INTO `wp_facileforms_pieces` VALUES (3,1,'FF','ff_die','Terminate form gracefully','Gracefully terminates the form and shows a message plus opionally a \r\nCONTINUE button for further redirection.\r\n\r\nCall:\r\n\r\n    ff_die($message=null, $action=\'stop\', $target=\'\', $params=\'\', $label=\'Continue\');\r\n    return;\r\n\r\n    $message = A message to display. If no message is provided, it will\r\n               display:\r\n\r\n                    Fatal error in $formname, processing stopped.\r\n\r\n    $action  = \'stop\' : Dont show a CONTINUE button (default)\r\n               \'self\' : Redirect to the same form\r\n               \'form\' : Redirect to another form \r\n               \'page\' : Redirect to another page of this site\r\n               \'home\' : Redirect to homepage of the site\r\n               \'url\'  : Redirect to a url\r\n\r\n    $target  = Target name/url for \'form\', \'page\' and \'url\'\r\n\r\n    $params  = Additional parameters for \'self\' and \'form\'\r\n\r\n    $label   = Text for the continue button\r\n\r\nExamples:\r\n\r\n    // Display standard message without continue button\r\n    ff_die(); \r\n\r\n    // Display message without continue button\r\n    ff_die(\'Sorry, cannot continue for some reason.\');\r\n\r\n    // Display standard message and return to same form with a parameter\r\n    ff_die(null, \'self\', \'&ff_param_foo=bar\');\r\n\r\n    // Redirect to another form\r\n    ff_die(\'Guess you are hungry now...\', \'form\', \'SamplePizzaShop\', null, \'Order\');\r\n\r\n    // Redirect to another site page\r\n    ff_die(\r\n        \'Something strange has happened!\', \r\n        \'page\', \r\n        \'index.php?option=com_content&task=section&id=1&Itemid=2\'\r\n    );','Untyped','function ff_die($message=\'\', $action=\'stop\', $target=\'\', $params=\'\', $label=\'Continue\')\r\n{\r\n    global $ff_processor;\r\n    if ($ff_processor->dying) return;\r\n\r\n    ob_end_clean();\r\n    $form =& $ff_processor->formrow;\r\n    if (!$message) \r\n        $message = \r\n            \"<strong>Fatal error in $form->name, form processing halted.</strong>\";\r\n    switch ($action) {\r\n        case \'self\': $url = ff_makeSelfUrl($params); break;\r\n        case \'form\': $url = ff_makeFormUrl($target, $params); break;\r\n        case \'page\': $url = ff_makePageUrl($target); break;\r\n        case \'home\': $url = \"{mossite}\"; break;\r\n        case \'url\' : $url = $target; break;\r\n        default    : $url = \'\';\r\n    } // switch\r\n    if ($form->class1 != \'\') echo \'<div class=\"\'.$form->class1.\'\">\'.nl();\r\n    echo($message.\'<br/><br/><br/>\'.nl());\r\n    if ($url) {\r\n        if (!$ff_processor->inline) echo \'<form action=\"#redirect\">\'.nl();\r\n        if ($ff_processor->inframe) $t = \'parent\'; else $t = \'document\';\r\n        echo \'<input type=\"button\" class=\"button\" value=\"\'.$label.\'\"\'.\r\n             \' onClick=\"\'.$t.\'.location.href=\\\'\'.htmlentities($url,ENT_QUOTES).\'\\\';\"\'.\r\n             \'/>\'.nl();\r\n        if (!$ff_processor->inline) echo \'</form>\'.nl();\r\n    } // if\r\n    if ($form->class1 != \'\') echo \'</div>\'.nl();\r\n    unset($form);\r\n    ob_start();\r\n    $ff_processor->suicide();\r\n} // ff_die');
INSERT INTO `wp_facileforms_pieces` VALUES (4,1,'FF','ff_DisableFormTrace','Disable tracing at view time','Disables tracing for use as before form piece','Before Form','//+trace dis');
INSERT INTO `wp_facileforms_pieces` VALUES (5,1,'FF','ff_DisableSubmitTrace','Disable tracing at submit time','Disables tracing for use as begin submit piece','Begin Submit','//+trace dis');
INSERT INTO `wp_facileforms_pieces` VALUES (6,1,'FF','ff_dying','Query live status','Query if form is dying','Untyped','//+trace max none\r\nfunction ff_dying()\r\n{\r\n    global $ff_processor; \r\n    return $ff_processor->dying;\r\n} // ff_dying');
INSERT INTO `wp_facileforms_pieces` VALUES (7,1,'FF','ff_expString','String export','Export string function: escapes special characters in c-codes','Untyped','function ff_expString($text)\r\n{\r\n    return expstring($text);\r\n} // ff_expString');
INSERT INTO `wp_facileforms_pieces` VALUES (8,1,'FF','ff_getPageByNameX','Get page # by element name','Gets the page number by the name of an element. \r\nTypically used to redirect to a certain page in a before form piece \r\nas \r\n\r\n    $this->page = ff_getPageByName(\'elementname\');','Untyped','function ff_getPageByName($name)\r\n{\r\n    global $ff_processor;\r\n    foreach($ff_processor->rows as $row)\r\n        if ($row->name==$name)\r\n            return $row->page;\r\n    return null;\r\n} // ff_getPageByName');
INSERT INTO `wp_facileforms_pieces` VALUES (9,1,'FF','ff_getParam','Get GET/POST parameter','Direct replacement for mosGetParam. ff_getParam will attempt to filter \r\nout parameters that are targeted to another form on the same page.','Untyped','function ff_getParam($name, $default=null, $mask=0)\r\n{\r\n    global $ff_request;\r\n    if (substr($name,0,9)==\'ff_param_\') {\r\n        if (!isset($ff_request[$name])) return $default;\r\n        $val = $ff_request[$name];\r\n    } else {\r\n        if (!isset($_REQUEST[$name])) return $default;\r\n        $val = $_REQUEST[$name];\r\n    } // if\r\n    $dotrim = ($mask & FF_NOTRIM)==0;\r\n    $dostrp = ($mask & FF_ALLOWHTML)==0;\r\n    $addsla = ($mask & FF_ALLOWRAW)==0 && !get_magic_quotes_gpc();\r\n    $remsla = ($mask & FF_ALLOWRAW)!=0 && get_magic_quotes_gpc();\r\n    if (is_array($val)) {\r\n        $cnt = count($val);\r\n        for ($v = 0; $v < $cnt; $v++)\r\n            if (is_string($val[$v])) {\r\n                if ($dotrim) $val[$v] = trim($val[$v]);\r\n                if ($dostrp) $val[$v] = strip_tags($val[$v]);\r\n                if ($addsla) $val[$v] = addslashes($val[$v]);\r\n                if ($remsla) $val[$v] = stripslashes($val[$v]);\r\n            } // if\r\n    } else {\r\n        if (is_string($val)) {\r\n            if ($dotrim) $val = trim($val);\r\n            if ($dostrp) $val = strip_tags($val);\r\n            if ($addsla) $val = addslashes($val);\r\n            if ($remsla) $val = stripslashes($val);\r\n        } // if\r\n    } // if\r\n    return $val;\r\n} // ff_getParam');
INSERT INTO `wp_facileforms_pieces` VALUES (10,1,'FF','ff_getSubmit','Get submited data','Returns submitdata either as scalar, array or list. In case of list the values\r\nare returned as a string with the values concatenated by comma.\r\n\r\nExamples:\r\n\r\n// Get as scalar: Optionally pass a default value as second parameter.\r\n// If no default is provided, it will return NULL if no value was submitted\r\n\r\n    $myval = ff_getSubmit(\'myvar\');        // return NULL if not submitted\r\n\r\n    $myval = ff_getSubmit(\'myvar\',1);      // return 1 if not submitted\r\n\r\n    $myval = ff_getSubmit(\'myvar\',\'foo\');  // return \'foo\' if not submitted\r\n\r\n    ff_query(\r\n        \"insert into #__mytable(id, name) \".\r\n        \"values (\'\".\r\n            ff_getSubmit(\'id\').\", \".\r\n            ff_getSubmit(\'name\',\'unknown\').\r\n        \"\')\"\r\n    );\r\n\r\n// Get as array: Pass FF_ARRAY as second Parameter\r\n\r\n    $myarr = $ff_getSubmit(\'myarr\', FF_ARRAY);\r\n\r\n    foreach ($myarr as $myval) ...\r\n\r\n// Get as list: Pass either FF_LIST, FF_SLIST or FF_DLIST as 2nd parameter.\r\n\r\n    // FF_LIST will return numeric data unquoted and strings in single quotes:\r\n    //    1,2,\'a\',4\r\n\r\n    // FF_SLIST will return all data single quoted:\r\n    //    \'1\',\'2\',\'a\',\'4\'\r\n\r\n    // FF_DLIST will return all data double quoted:\r\n    //    \"1\",\"2\",\"a\",\"4\"\r\n\r\n    ff_query(\r\n        \"delete from #__mytable \".\r\n        \"where id in (\".ff_getSubmit(\'itemlist\',FF_LIST).\")\"\r\n    );','Untyped','function ff_getSubmit($name, $default=null)\r\n{\r\n    global $ff_processor;\r\n\r\n    switch ((string)$default) {\r\n        case FF_ARRAY: $value = array(); break;\r\n        case FF_LIST : \r\n        case FF_SLIST:\r\n        case FF_DLIST: $value = \'\'; break;\r\n        default      : $value = $default;\r\n    } // switch\r\n    foreach ($ff_processor->submitdata as $data)\r\n        if ($data[_FF_DATA_NAME]==$name) {\r\n            $q = \'\';\r\n            switch ((string)$default) {\r\n                case FF_ARRAY:\r\n                    $value[] = $data[_FF_DATA_VALUE];\r\n                    break;\r\n                case FF_SLIST:\r\n                    $q = \"\'\";\r\n                case FF_DLIST:\r\n                    if ($q==\'\') $q = \'\"\';\r\n                case FF_LIST:\r\n                    if ($q==\'\' && !is_numeric($data[_FF_DATA_VALUE])) $q = \"\'\";\r\n                    if ($value!=\'\') $value.=\',\';\r\n                    $value .= $q.$data[_FF_DATA_VALUE].$q;\r\n                    break;\r\n                default:\r\n                    return $data[_FF_DATA_VALUE];\r\n            } // switch\r\n         } // if\r\n    return $value;\r\n} // ff_getSubmit');
INSERT INTO `wp_facileforms_pieces` VALUES (11,1,'FF','ff_impString','String import','Import string function: unescapes c-coded characters of a string','Untyped','function ff_impString($text)\r\n{\r\n    return impstring($text);\r\n} // ff_impString');
INSERT INTO `wp_facileforms_pieces` VALUES (12,1,'FF','ff_InitLib','Init Library','A collection of useful functions for use in form pieces. \r\n\r\nInclude by: \r\n\r\n    $this->execPieceByName(\'ff_InitLib\');','Before Form','//+trace high none\r\nif (!defined(\'FF_DIE\'))                    $this->execPieceByName(\'ff_Constants\');\r\nif (!function_exists(\'ff_expstring\'))      $this->execPieceByName(\'ff_expstring\');\r\nif (!function_exists(\'ff_makePageUrl\'))    $this->execPieceByName(\'ff_makePageUrl\');\r\nif (!function_exists(\'ff_makeFormUrl\'))    $this->execPieceByName(\'ff_makeFormUrl\');\r\nif (!function_exists(\'ff_makeSelfUrl\'))    $this->execPieceByName(\'ff_makeSelfUrl\');\r\nif (!function_exists(\'ff_die\'))            $this->execPieceByName(\'ff_die\');\r\nif (!function_exists(\'ff_dying\'))          $this->execPieceByName(\'ff_dying\');\r\nif (!function_exists(\'ff_redirect\'))       $this->execPieceByName(\'ff_redirect\');\r\nif (!function_exists(\'ff_redirectParent\')) $this->execPieceByName(\'ff_redirectParentX\');\r\nif (!function_exists(\'ff_redirectPage\'))   $this->execPieceByName(\'ff_redirectPage\');\r\nif (!function_exists(\'ff_redirectForm\'))   $this->execPieceByName(\'ff_redirectForm\');\r\nif (!function_exists(\'ff_redirectSelf\'))   $this->execPieceByName(\'ff_redirectSelf\');\r\nif (!function_exists(\'ff_setChecked\'))     $this->execPieceByName(\'ff_setCheckedX\');\r\nif (!function_exists(\'ff_setSelected\'))    $this->execPieceByName(\'ff_setSelectedX\');\r\nif (!function_exists(\'ff_setValue\'))       $this->execPieceByName(\'ff_setValueX\');\r\nif (!function_exists(\'ff_getPageByName\'))  $this->execPieceByName(\'ff_getPageByNameX\');\r\nif (!function_exists(\'ff_getParam\'))       $this->execPieceByName(\'ff_getParam\');\r\nif (!function_exists(\'ff_getSubmit\'))      $this->execPieceByName(\'ff_getSubmit\');\r\nif (!function_exists(\'ff_impString\'))      $this->execPieceByName(\'ff_impString\');\r\nif (!function_exists(\'ff_expString\'))      $this->execPieceByName(\'ff_expString\');\r\nif (!function_exists(\'ff_securityImage\'))  $this->execPieceByName(\'ff_securityImage\');\r\nif (!function_exists(\'ff_select\'))         $this->execPieceByName(\'ff_select\');\r\nif (!function_exists(\'ff_selectValue\'))    $this->execPieceByName(\'ff_selectValue\');\r\nif (!function_exists(\'ff_query\'))          $this->execPieceByName(\'ff_query\');\r\nif (!function_exists(\'ff_markdown\'))       $this->execPieceByName(\'ff_markdown\');');
INSERT INTO `wp_facileforms_pieces` VALUES (13,1,'FF','ff_makeFormUrl','Make URL to other form','Redirects to another facile form. \r\n\r\nCall: \r\n\r\n    $url = ff_makeFormUrl($name, $params = \'\');\r\n\r\nExample:\r\n\r\n    $url = ff_makeFormUrl(\r\n       \'OtherForm\', \r\n       \'&ff_param_email=\'.urlencode($email)\r\n    );','Untyped','function ff_makeFormUrl($name, $params=\'\')\r\n{\r\n    global $ff_processor, $ff_otherparams;\r\n    $url = \'\';\r\n    switch ($ff_processor->runmode) {\r\n        case 2: // preview\r\n        case 1: // backend\r\n            $url .= \'administrator/index2.php?option=com_breezingforms&act=run\'.\r\n                    \'&ff_name=\'.urlencode($name);\r\n            if ($ff_processor->inframe) $url .= \'&ff_frame=1\';\r\n            if ($ff_processor->border) $url .= \'&ff_border=1\';\r\n            break;\r\n        default: // frontend\r\n            $url .= \'index.php?ff_name=\'.urlencode($name);\r\n            if ($ff_otherparams[\'option\'] == \'com_breezingforms\') {\r\n                reset($ff_otherparams);\r\n                while (list($prop, $val) = each($ff_otherparams))\r\n                    $url .= \'&\'.urlencode($prop).\'=\'.urlencode($val);\r\n            } else\r\n                $url .= \'&option=com_breezingforms\';\r\n            if ($ff_processor->target > 1) $url .= \'&ff_target=\'.$ff_processor->target;\r\n            if ($ff_processor->inframe) $url .= \'&ff_frame=1\';\r\n            if ($ff_processor->border) $url .= \'&ff_border=1\';\r\n            if ($ff_processor->align !=1) $url .= \'&ff_align=\'.$ff_processor->align;\r\n            if ($ff_processor->top>0) $url .= \'&ff_top=\'.$ff_processor->top;\r\n    } // switch\r\n    return ff_makePageUrl($url. $params);\r\n} // ff_makeFormUrl');
INSERT INTO `wp_facileforms_pieces` VALUES (14,1,'FF','ff_makePageUrl','Make URL to other page','Builds an URL to another mambo page\r\n\r\nCall: \r\n\r\n    $url = ff_makePageUrl($params = \'\');\r\n\r\nExample:\r\n\r\n    $url = ff_makePageUrl(\r\n        \'index.php?option=com_content&task=blogsection&id=0&Itemid=39\'\r\n    );','Untyped','function ff_makePageUrl($params=\'\')\r\n{\r\n    $url = \'{mossite}\';\r\n    if ($params != \'\') {\r\n        $len = strlen($url);\r\n        if ($len > 0 && $url{$len-1} != \'/\') $url .= \'/\';\r\n        $url .= $params;\r\n    } // if\r\n    return $url;\r\n} // ff_makePageUrl');
INSERT INTO `wp_facileforms_pieces` VALUES (15,1,'FF','ff_makeSelfUrl','Make URL to same form','Make an URL to the same form. \r\n\r\nCall: \r\n\r\n    $url = ff_makeSelfUrl($params = \'\');\r\n\r\nExample:\r\n\r\n    $url = ff_makeSelfUrl(\'&ff_param_email=\'.urlencode($email));','Untyped','function ff_makeSelfUrl($params=\'\')\r\n{\r\n    global $ff_processor;\r\n    return ff_makeFormUrl($ff_processor->formrow->name, $params);\r\n} // ff_makeSelfUrl');
INSERT INTO `wp_facileforms_pieces` VALUES (16,1,'FF','ff_markdown','Markdown tagging for facile forms','Convert text marked up by \'Markdown\' into HTML.\r\n\r\nInclude by: \r\n\r\n    if (!function_exists(\'ff_markdown\')) $this->execPieceByName(\'ff_markdown\');\r\n\r\nCall syntax: \r\n\r\n    $html = ff_markdown($text);','Untyped','function ff_markdown($text)\r\n{\r\n    global $ff_processor, $ff_compath;\r\n\r\n    // do the standard Markdown processing first\r\n    if (!function_exists(\'Markdown\')) require_once($ff_compath.\'/markdown.php\');\r\n    $html = Markdown($text);\r\n\r\n    // now fix <a href...> tags\r\n    $html = preg_replace(\r\n        \"/(\\\\<a href=[^\\\\>]+)/i\",    // search pattern\r\n        \"\\${1} target=\\\"_parent\\\"\",  // replacement\r\n        $html\r\n    );       \r\n    return $html;\r\n} // ff_markdown');
INSERT INTO `wp_facileforms_pieces` VALUES (17,1,'FF','ff_query','Non-select queries against db','Execute a simple db query.\r\n\r\nInclude by one of:\r\n\r\n    $this->execPieceByName(\'ff_InitUtilities\');\r\n    $this->execPieceByName(\'ff_SubmitUtilities\');\r\n    if (!function_exists(\'ff_query\')) $this->execPieceByName(\'ff_query\');\r\n\r\nCall syntax:\r\n\r\n    [$newid = ] ff_query($sql [, $insert = 0]);\r\n\r\n    $sql:    Sql statement to call\r\n    $insert: 1 = return key of auto column when inserting rows\r\n    $newid:  The key of the new row.','Untyped','function ff_query($sql, $insert=false, $error=FF_DIE)\r\n{\r\n    global $ff_processor;\r\n    $database = JFactory::getDBO();\r\n    if ($ff_processor->dying && $error!=FF_IGNOREDIE) return -1;\r\n    $database->setQuery($sql);\r\n    $database->query();\r\n    if ($database->getErrorNum()) {\r\n        $dienow = $error==FF_DIE;\r\n        $error = $database->stderr();\r\n        if ($dienow) ff_die($error);\r\n    } else {\r\n        $error = null;\r\n        if ($insert) return $database->insertid();\r\n    } // if\r\n    return 0;\r\n} // ff_query');
INSERT INTO `wp_facileforms_pieces` VALUES (18,1,'FF','ff_redirect','Basic redirection','Basic redirection routine supporting multiple targets and methods.\r\n\r\nCall:\r\n \r\nff_redirect($url [, $target=\'self\' , $method=\'post\'])\r\n\r\n    $url    = The url to redirect to including the parameters appended.\r\n\r\n    $target = \'top\', \'parent\', \'self\' or \'blank\'\r\n\r\n              \'top\'    = redirect to the top browser window\r\n              \'parent\' = redirect to the parent frame\r\n              \'self\'   = redirect in the same frame (the default)\r\n              \'blank\'  = redirect to a new browser window \r\n                         (blank works with post method only)\r\n\r\n    $method = \'post\' or \'get\'. The default is \'post\'.\r\n\r\n    Example:\r\n\r\n       ff_redirect(\r\n          \'http://mysite.net/index.php?option=xxx&Itemid=33\',\r\n          \'top\'\r\n       );','Untyped','function ff_redirect($url, $target=\'self\', $method=\'post\')\r\n{\r\n    global $ff_processor, $ff_request;\r\n    if ($ff_processor->dying) return;\r\n\r\n    ob_end_clean();\r\n    switch (strtolower($method)) {\r\n        case \'get\': {\r\n            switch (strtolower($target)) {\r\n                case \'top\'   :\r\n                case \'parent\': break;\r\n                default      : $target = \'document\';\r\n            } // switch\r\n            echo \'<script type=\"text/javascript\">\'.nl().\r\n                 \'<!--\'.nl().\r\n                 \"onload=function() { \".$target.\".location.href=\'\".$url.\"\'; }\".nl().\r\n                 \'-->\'.nl().\r\n                 \'</script>\'.nl().\r\n                 \'</body>\'.nl();\r\n            break;\r\n        } // url\r\n        default: { // post\r\n            $pos = strpos($url,\'?\');\r\n            $ff_request = array();\r\n            if ($pos === false)\r\n                $action = $url;\r\n            else {\r\n                $action = substr($url,0,$pos);\r\n                addRequestParams(substr($url, $pos+1));\r\n            } // if\r\n            switch (strtolower($target)) {\r\n                case \'blank\' : $target = \' target=\"_blank\"\';  break;\r\n                case \'top\'   : $target = \' target=\"_top\"\';    break;\r\n                case \'parent\': $target = \' target=\"_parent\"\'; break;\r\n                default      : $target = \' target=\"_self\"\';\r\n            } // switch\r\n            echo \'<script language=\"javascript\" type=\"text/javascript\">\'.nl().\r\n                 \'<!--\'.nl().\r\n                 \'onload = function() { document.ff_redirect.submit(); }\'.nl().\r\n                 \'-->\'.nl().\r\n                 \'</script>\'.nl().\r\n                 \'<form action=\"\'.$action.\'\" \'.\r\n                  \'method=\"post\" \'.\r\n                  \'name=\"ff_redirect\" id=\"ff_redirect\" \'.\r\n                  \'enctype=\"multipart/form-data\"\'.\r\n                  $target.\r\n                 \'>\'.nl();\r\n            while (list($prop, $val) = each($ff_request))\r\n                echo \'<input type=\"hidden\" name=\"\'.$prop.\'\" \'.\r\n                            \'value=\"\'.htmlentities(urldecode($val)).\'\"/>\'.nl();\r\n            echo \'</form>\'.nl().\r\n                 \'</body>\'.nl();\r\n        } // post\r\n    } // switch\r\n    exit;\r\n} // ff_redirect');
INSERT INTO `wp_facileforms_pieces` VALUES (19,1,'FF','ff_redirectForm','Redirect to other form','Redirects to another facile form. \r\n\r\nCall: \r\n\r\n    ff_redirectForm($name, $params = \'\');\r\n\r\nExample:\r\n\r\n    ff_redirectForm(\r\n        $this, \r\n       \'SecondForm\', \r\n       \'&ff_param_email=\'.urlencode($email)\r\n    );','Untyped','function ff_redirectForm($name, $params=\'\', $method=\'post\')\r\n{\r\n    ff_redirectParent(ff_makeFormUrl($name, $params), $method);\r\n} // ff_redirectForm');
INSERT INTO `wp_facileforms_pieces` VALUES (20,1,'FF','ff_redirectPage','Redirect to other page','Redirects to another mambo page. \r\n\r\nCall: \r\n\r\n    ff_redirectPage($params = \'\');\r\n\r\nExample:\r\n\r\n    ff_redirectPage(\r\n        \'index.php?option=com_content&task=blogsection&id=0&Itemid=39\'\r\n    );','Untyped','function ff_redirectPage($params=\'\', $method=\'post\')\r\n{\r\n    ff_redirectParent(ff_makePageUrl($params), $method);\r\n} // ff_redirectPage');
INSERT INTO `wp_facileforms_pieces` VALUES (21,1,'FF','ff_redirectParentX','Redirect to parent window','Redirects to the parent window when runing in iframe, otherwise to self. \r\n\r\nff_redirectParent($url [, $method=\'post\'])\r\n\r\n    $url    = The url to redirect to including the parameters appended.\r\n\r\n    $method = \'post\' or \'url\'. The default is \'post\'.\r\n\r\n    Example:\r\n\r\n       ff_redirectParent(\r\n          \'http://mysite.net/index.php?option=xxx&Itemid=33\',\r\n          \'url\'\r\n       );','Untyped','function ff_redirectParent($url, $method = \'post\')\r\n{\r\n    global $ff_processor;\r\n    if ($ff_processor->inframe) $target = \'parent\'; else $target = \'self\'; \r\n    ff_redirect($url, $target, $method);\r\n} // ff_redirectParent');
INSERT INTO `wp_facileforms_pieces` VALUES (22,1,'FF','ff_redirectSelf','Redirect to same form','Redirects to the same form. \r\n\r\nCall: \r\n\r\n    ff_redirectSelf($params = \'\');\r\n\r\nExample:\r\n\r\n    ff_redirectSelf(\'&ff_param_email=\'.urlencode($email));','Untyped','function ff_redirectSelf($params=\'\', $method=\'post\')\r\n{\r\n    ff_redirectParent(ff_makeSelfUrl($params), $method);\r\n} // ff_redirectSelf');
INSERT INTO `wp_facileforms_pieces` VALUES (23,1,'FF','ff_securityImage','Security Image','Create code to display the security image','Untyped','global $ff_seccode;\r\n\r\nif (!isset($this->record_id)) { $ff_seccode = null; }\r\n\r\nfunction ff_securityImage()\r\n{\r\n    global $ff_comsite, $ff_seccode;\r\n    if (!isset($ff_seccode)) { \r\n        mt_srand((double)microtime()*1000000);\r\n        $ff_seccode = mt_rand(10000, 99999);\r\n        JFactory::getSession()->set(\'ff_seccode\', $ff_seccode);\r\n    } // if\r\n\r\n    return \'<img src=\"\'.JURI::root().\'ff_secimage.php?option=com_breezingforms&showSecImage=true\" title=\"\" alt=\"\" />\';\r\n} // ff_securityImage');
INSERT INTO `wp_facileforms_pieces` VALUES (24,1,'FF','ff_select','Select rows from db','Execute a select query\r\n\r\nInclude by one of:\r\n\r\n    $this->execPieceByName(\'ff_InitUtilities\');\r\n    $this->execPieceByName(\'ff_SubmitUtilities\');\r\n    if (!function_exists(\'ff_select\')) $this->execPieceByName(\'ff_select\');\r\n\r\nCall syntax:\r\n\r\n    $rows = ff_select($sql);\r\n\r\n    $sql:    Sql SELECT-statement to call\r\n    $rows:   List of row objects','Untyped','function ff_select($sql, $error=FF_DIE)\r\n{\r\n    $database = JFactory::getDBO();\r\n    $database->setQuery($sql);\r\n    $rows = $database->loadObjectList();\r\n    if ($database->getErrorNum()) {\r\n        $dienow = $error==FF_DIE;\r\n        $error = $database->stderr();\r\n        $rows = array();\r\n        if ($dienow) ff_die($error);\r\n    } else\r\n        $error = null;\r\n    return $rows;\r\n} // ff_select');
INSERT INTO `wp_facileforms_pieces` VALUES (25,1,'FF','ff_selectValue','Select single value from db','Execute query to read a single value\r\n\r\nInclude by one of:\r\n\r\n    $this->execPieceByName(\'ff_InitUtilities\');\r\n    $this->execPieceByName(\'ff_SubmitUtilities\');\r\n    if (!function_exists(\'ff_selectValue\')) $this->execPieceByName(\'ff_selectValue\');\r\n\r\nCall syntax:\r\n\r\n    $value = ff_selectValue($sql);\r\n\r\n    $sql:    Sql SELECT-statement to call\r\n    $value:  The value returned by the database','Untyped','function ff_selectValue($sql, $def=null, $error=FF_DIE)\r\n{\r\n    $database = JFactory::getDBO();\r\n    $database->setQuery($sql);\r\n    $value = $database->loadResult();\r\n    if ($database->getErrorNum()) {\r\n        $dienow = $error==FF_DIE;\r\n        $error = $database->stderr();\r\n        if ($dienow) ff_die($error);\r\n    } else {\r\n        $error = null;\r\n        if ($value) return $value;\r\n    } // if\r\n    return $def;\r\n} // ff_selectValue');
INSERT INTO `wp_facileforms_pieces` VALUES (26,1,'FF','ff_setCheckedX','Set checkbox/radiobutton checked','Set a radio button or checkbox checked. \r\n\r\nCall: \r\n\r\n    ff_setChecked(\'name\', \'value\');','Untyped','function ff_setChecked($name, $value)\r\n{\r\n    global $ff_processor;\r\n    for ($r = 0; $r < $ff_processor->rowcount; $r++) {\r\n        $row =& $ff_processor->rows[$r];\r\n        if ($row->name==$name && $row->data1==$value)\r\n            $row->flag1 = 1;\r\n        unset($row);\r\n    } // for\r\n} // ff_setChecked');
INSERT INTO `wp_facileforms_pieces` VALUES (27,1,'FF','ff_setSelectedX','Set a select list option to *selected*','Sets a select list option to selected. \r\n\r\nCall: \r\n\r\n    ff_setSelected(\'name\', \'value\');','Untyped','function ff_setSelected($name, $value)\r\n{\r\n    global $ff_processor;\r\n    for ($r = 0; $r < $ff_processor->rowcount; $r++) {\r\n        $row =& $ff_processor->rows[$r];\r\n        if ($row->name==$name)\r\n            $row->data2 =\r\n                preg_replace(\r\n                    \'/(^|\\r\\n|\\n)(0|1);([^;]*);(\'.$value.\')($|\\r\\n|\\n)/\',\r\n                    \'${1}1;${3};${4}${5}\',\r\n                    $row->data2\r\n                );\r\n        unset($row);\r\n    } // for\r\n} // ff_setSelected');
INSERT INTO `wp_facileforms_pieces` VALUES (28,1,'FF','ff_setValueX','Set text, textarea, hidden value','Set value of a Static Text, Text, Textarea or Hidden Input. \r\n\r\nCall: \r\n\r\n    ff_setValue(\'name\', \'value\');','Untyped','function ff_setValue($name, $value)\r\n{\r\n    global $ff_processor;\r\n    for ($r = 0; $r < $ff_processor->rowcount; $r++) {\r\n        $row =& $ff_processor->rows[$r];\r\n        if ($row->name==$name)\r\n            $row->data1 = $value;\r\n        unset($row);\r\n    } // for\r\n} // ff_setValue');
INSERT INTO `wp_facileforms_pieces` VALUES (29,1,'FF','Markdown','Original Markdown Processor','Converts text marked up by \'Markdown\' into HTML.\r\n\r\nPlease use ff_markdown() in forms instead of Markdown()','Untyped','#\r\n# Markdown  -  A text-to-HTML conversion tool for web writers\r\n#\r\n# Copyright (c) 2004-2005 John Gruber\r\n# <http://daringfireball.net/projects/markdown/>\r\n#\r\n# Copyright (c) 2004-2005 Michel Fortin - PHP Port\r\n# <http://www.michelf.com/projects/php-markdown/>\r\n#\r\n\r\nglobal	$MarkdownPHPVersion, $MarkdownSyntaxVersion,\r\n		$md_empty_element_suffix, $md_tab_width,\r\n		$md_nested_brackets_depth, $md_nested_brackets,\r\n		$md_escape_table, $md_backslash_escape_table,\r\n		$md_list_level;\r\n\r\n$MarkdownPHPVersion    = \'1.0.1b\'; # Mon 6 Jun 2005\r\n$MarkdownSyntaxVersion = \'1.0.1\';  # Sun 12 Dec 2004\r\n\r\n\r\n#\r\n# Global default settings:\r\n#\r\n$md_empty_element_suffix = \" />\";     # Change to \">\" for HTML output\r\n$md_tab_width = 4;\r\n\r\n#\r\n# WordPress settings:\r\n#\r\n$md_wp_posts    = true;  # Set to false to remove Markdown from posts.\r\n$md_wp_comments = true;  # Set to false to remove Markdown from comments.\r\n\r\n\r\n# -- WordPress Plugin Interface -----------------------------------------------\r\n/*\r\nPlugin Name: Markdown\r\nPlugin URI: http://www.michelf.com/projects/php-markdown/\r\nDescription: <a href=\"http://daringfireball.net/projects/markdown/syntax\">Markdown syntax</a> allows you to write using an easy-to-read, easy-to-write plain text format. Based on the original Perl version by <a href=\"http://daringfireball.net/\">John Gruber</a>. <a href=\"http://www.michelf.com/projects/php-markdown/\">More...</a>\r\nVersion: 1.0.1b\r\nAuthor: Michel Fortin\r\nAuthor URI: http://www.michelf.com/\r\n*/\r\nif (isset($wp_version)) {\r\n	# More details about how it works here:\r\n	# <http://www.michelf.com/weblog/2005/wordpress-text-flow-vs-markdown/>\r\n\r\n	# Post content and excerpts\r\n	if ($md_wp_posts) {\r\n		remove_filter(\'the_content\',  \'wpautop\');\r\n		remove_filter(\'the_excerpt\',  \'wpautop\');\r\n		add_filter(\'the_content\',     \'Markdown\', 6);\r\n		add_filter(\'get_the_excerpt\', \'Markdown\', 6);\r\n		add_filter(\'get_the_excerpt\', \'trim\', 7);\r\n		add_filter(\'the_excerpt\',     \'md_add_p\');\r\n		add_filter(\'the_excerpt_rss\', \'md_strip_p\');\r\n\r\n		remove_filter(\'content_save_pre\',  \'balanceTags\', 50);\r\n		remove_filter(\'excerpt_save_pre\',  \'balanceTags\', 50);\r\n		add_filter(\'the_content\',  	  \'balanceTags\', 50);\r\n		add_filter(\'get_the_excerpt\', \'balanceTags\', 9);\r\n\r\n		function md_add_p($text) {\r\n			if (strlen($text) == 0) return;\r\n			if (strcasecmp(substr($text, -3), \'<p>\') == 0) return $text;\r\n			return \'<p>\'.$text.\'</p>\';\r\n		}\r\n		function md_strip_p($t) { return preg_replace(\'{</?[pP]>}\', \'\', $t); }\r\n	}\r\n\r\n	# Comments\r\n	if ($md_wp_comments) {\r\n		remove_filter(\'comment_text\', \'wpautop\');\r\n		remove_filter(\'comment_text\', \'make_clickable\');\r\n		add_filter(\'pre_comment_content\', \'Markdown\', 6);\r\n		add_filter(\'pre_comment_content\', \'md_hide_tags\', 8);\r\n		add_filter(\'pre_comment_content\', \'md_show_tags\', 12);\r\n		add_filter(\'get_comment_text\',    \'Markdown\', 6);\r\n		add_filter(\'get_comment_excerpt\', \'Markdown\', 6);\r\n		add_filter(\'get_comment_excerpt\', \'md_strip_p\', 7);\r\n\r\n		global $md_hidden_tags;\r\n		$md_hidden_tags = array(\r\n			\'<p>\'	=> md5(\'<p>\'),		\'</p>\'	=> md5(\'</p>\'),\r\n			\'<pre>\'	=> md5(\'<pre>\'),	\'</pre>\'=> md5(\'</pre>\'),\r\n			\'<ol>\'	=> md5(\'<ol>\'),		\'</ol>\'	=> md5(\'</ol>\'),\r\n			\'<ul>\'	=> md5(\'<ul>\'),		\'</ul>\'	=> md5(\'</ul>\'),\r\n			\'<li>\'	=> md5(\'<li>\'),		\'</li>\'	=> md5(\'</li>\'),\r\n			);\r\n\r\n		function md_hide_tags($text) {\r\n			global $md_hidden_tags;\r\n			return str_replace(array_keys($md_hidden_tags),\r\n								array_values($md_hidden_tags), $text);\r\n		}\r\n		function md_show_tags($text) {\r\n			global $md_hidden_tags;\r\n			return str_replace(array_values($md_hidden_tags),\r\n								array_keys($md_hidden_tags), $text);\r\n		}\r\n	}\r\n}\r\n\r\n\r\n# -- bBlog Plugin Info --------------------------------------------------------\r\nfunction identify_modifier_markdown() {\r\n	global $MarkdownPHPVersion;\r\n	return array(\r\n		\'name\'			=> \'markdown\',\r\n		\'type\'			=> \'modifier\',\r\n		\'nicename\'		=> \'Markdown\',\r\n		\'description\'	=> \'A text-to-HTML conversion tool for web writers\',\r\n		\'authors\'		=> \'Michel Fortin and John Gruber\',\r\n		\'licence\'		=> \'GPL\',\r\n		\'version\'		=> $MarkdownPHPVersion,\r\n		\'help\'			=> \'<a href=\"http://daringfireball.net/projects/markdown/syntax\">Markdown syntax</a> allows you to write using an easy-to-read, easy-to-write plain text format. Based on the original Perl version by <a href=\"http://daringfireball.net/\">John Gruber</a>. <a href=\"http://www.michelf.com/projects/php-markdown/\">More...</a>\'\r\n	);\r\n}\r\n\r\n# -- Smarty Modifier Interface ------------------------------------------------\r\nfunction smarty_modifier_markdown($text) {\r\n	return Markdown($text);\r\n}\r\n\r\n# -- Textile Compatibility Mode -----------------------------------------------\r\n# Rename this file to \"classTextile.php\" and it can replace Textile anywhere.\r\nif (strcasecmp(substr(__FILE__, -16), \"classTextile.php\") == 0) {\r\n	# Try to include PHP SmartyPants. Should be in the same directory.\r\n	@include_once \'smartypants.php\';\r\n	# Fake Textile class. It calls Markdown instead.\r\n	class Textile {\r\n		function TextileThis($text, $lite=\'\', $encode=\'\', $noimage=\'\', $strict=\'\') {\r\n			if ($lite == \'\' && $encode == \'\')   $text = Markdown($text);\r\n			if (function_exists(\'SmartyPants\')) $text = SmartyPants($text);\r\n			return $text;\r\n		}\r\n	}\r\n}\r\n\r\n\r\n\r\n#\r\n# Globals:\r\n#\r\n\r\n# Regex to match balanced [brackets].\r\n# Needed to insert a maximum bracked depth while converting to PHP.\r\n$md_nested_brackets_depth = 6;\r\n$md_nested_brackets =\r\n	str_repeat(\'(?>[^\\[\\]]+|\\[\', $md_nested_brackets_depth).\r\n	str_repeat(\'\\])*\', $md_nested_brackets_depth);\r\n\r\n# Table of hash values for escaped characters:\r\n$md_escape_table = array(\r\n	\"\\\\\" => md5(\"\\\\\"),\r\n	\"`\" => md5(\"`\"),\r\n	\"*\" => md5(\"*\"),\r\n	\"_\" => md5(\"_\"),\r\n	\"{\" => md5(\"{\"),\r\n	\"}\" => md5(\"}\"),\r\n	\"[\" => md5(\"[\"),\r\n	\"]\" => md5(\"]\"),\r\n	\"(\" => md5(\"(\"),\r\n	\")\" => md5(\")\"),\r\n	\">\" => md5(\">\"),\r\n	\"#\" => md5(\"#\"),\r\n	\"+\" => md5(\"+\"),\r\n	\"-\" => md5(\"-\"),\r\n	\".\" => md5(\".\"),\r\n	\"!\" => md5(\"!\")\r\n);\r\n# Create an identical table but for escaped characters.\r\n$md_backslash_escape_table;\r\nforeach ($md_escape_table as $key => $char)\r\n	$md_backslash_escape_table[\"\\\\$key\"] = $char;\r\n\r\n\r\nfunction Markdown($text) {\r\n#\r\n# Main function. The order in which other subs are called here is\r\n# essential. Link and image substitutions need to happen before\r\n# _EscapeSpecialCharsWithinTagAttributes(), so that any *\'s or _\'s in the <a>\r\n# and <img> tags get encoded.\r\n#\r\n	# Clear the global hashes. If we don\'t clear these, you get conflicts\r\n	# from other articles when generating a page which contains more than\r\n	# one article (e.g. an index page that shows the N most recent\r\n	# articles):\r\n	global $md_urls, $md_titles, $md_html_blocks;\r\n	$md_urls = array();\r\n	$md_titles = array();\r\n	$md_html_blocks = array();\r\n\r\n	# Standardize line endings:\r\n	#   DOS to Unix and Mac to Unix\r\n	$text = str_replace(array(\"\\r\\n\", \"\\r\"), \"\\n\", $text);\r\n\r\n	# Make sure $text ends with a couple of newlines:\r\n	$text .= \"\\n\\n\";\r\n\r\n	# Convert all tabs to spaces.\r\n	$text = _Detab($text);\r\n\r\n	# Strip any lines consisting only of spaces and tabs.\r\n	# This makes subsequent regexen easier to write, because we can\r\n	# match consecutive blank lines with /\\n+/ instead of something\r\n	# contorted like /[ \\t]*\\n+/ .\r\n	$text = preg_replace(\'/^[ \\t]+$/m\', \'\', $text);\r\n\r\n	# Turn block-level HTML blocks into hash entries\r\n	$text = _HashHTMLBlocks($text);\r\n\r\n	# Strip link definitions, store in hashes.\r\n	$text = _StripLinkDefinitions($text);\r\n\r\n	$text = _RunBlockGamut($text);\r\n\r\n	$text = _UnescapeSpecialChars($text);\r\n\r\n	return $text . \"\\n\";\r\n}\r\n\r\n\r\nfunction _StripLinkDefinitions($text) {\r\n#\r\n# Strips link definitions from text, stores the URLs and titles in\r\n# hash references.\r\n#\r\n	global $md_tab_width;\r\n	$less_than_tab = $md_tab_width - 1;\r\n\r\n	# Link defs are in the form: ^[id]: url \"optional title\"\r\n	$text = preg_replace_callback(\'{\r\n						^[ ]{0,\'.$less_than_tab.\'}\\[(.+)\\]:	# id = $1\r\n						  [ \\t]*\r\n						  \\n?				# maybe *one* newline\r\n						  [ \\t]*\r\n						<?(\\S+?)>?			# url = $2\r\n						  [ \\t]*\r\n						  \\n?				# maybe one newline\r\n						  [ \\t]*\r\n						(?:\r\n							(?<=\\s)			# lookbehind for whitespace\r\n							[\"(]\r\n							(.+?)			# title = $3\r\n							[\")]\r\n							[ \\t]*\r\n						)?	# title is optional\r\n						(?:\\n+|\\Z)\r\n		}xm\',\r\n		\'_StripLinkDefinitions_callback\',\r\n		$text);\r\n	return $text;\r\n}\r\nfunction _StripLinkDefinitions_callback($matches) {\r\n	global $md_urls, $md_titles;\r\n	$link_id = strtolower($matches[1]);\r\n	$md_urls[$link_id] = _EncodeAmpsAndAngles($matches[2]);\r\n	if (isset($matches[3]))\r\n		$md_titles[$link_id] = str_replace(\'\"\', \'&quot;\', $matches[3]);\r\n	return \'\'; # String that will replace the block\r\n}\r\n\r\n\r\nfunction _HashHTMLBlocks($text) {\r\n	global $md_tab_width;\r\n	$less_than_tab = $md_tab_width - 1;\r\n\r\n	# Hashify HTML blocks:\r\n	# We only want to do this for block-level HTML tags, such as headers,\r\n	# lists, and tables. That\'s because we still want to wrap <p>s around\r\n	# \"paragraphs\" that are wrapped in non-block-level tags, such as anchors,\r\n	# phrase emphasis, and spans. The list of tags we\'re looking for is\r\n	# hard-coded:\r\n	$block_tags_a = \'p|div|h[1-6]|blockquote|pre|table|dl|ol|ul|\'.\r\n					\'script|noscript|form|fieldset|iframe|math|ins|del\';\r\n	$block_tags_b = \'p|div|h[1-6]|blockquote|pre|table|dl|ol|ul|\'.\r\n					\'script|noscript|form|fieldset|iframe|math\';\r\n\r\n	# First, look for nested blocks, e.g.:\r\n	# 	<div>\r\n	# 		<div>\r\n	# 		tags for inner block must be indented.\r\n	# 		</div>\r\n	# 	</div>\r\n	#\r\n	# The outermost tags must start at the left margin for this to match, and\r\n	# the inner nested divs must be indented.\r\n	# We need to do this before the next, more liberal match, because the next\r\n	# match will start at the first `<div>` and stop at the first `</div>`.\r\n	$text = preg_replace_callback(\"{\r\n				(						# save in $1\r\n					^					# start of line  (with /m)\r\n					<($block_tags_a)	# start tag = $2\r\n					\\\\b					# word break\r\n					(.*\\\\n)*?			# any number of lines, minimally matching\r\n					</\\\\2>				# the matching end tag\r\n					[ \\\\t]*				# trailing spaces/tabs\r\n					(?=\\\\n+|\\\\Z)	# followed by a newline or end of document\r\n				)\r\n		}xm\",\r\n		\'_HashHTMLBlocks_callback\',\r\n		$text);\r\n\r\n	#\r\n	# Now match more liberally, simply from `\\n<tag>` to `</tag>\\n`\r\n	#\r\n	$text = preg_replace_callback(\"{\r\n				(						# save in $1\r\n					^					# start of line  (with /m)\r\n					<($block_tags_b)	# start tag = $2\r\n					\\\\b					# word break\r\n					(.*\\\\n)*?			# any number of lines, minimally matching\r\n					.*</\\\\2>				# the matching end tag\r\n					[ \\\\t]*				# trailing spaces/tabs\r\n					(?=\\\\n+|\\\\Z)	# followed by a newline or end of document\r\n				)\r\n		}xm\",\r\n		\'_HashHTMLBlocks_callback\',\r\n		$text);\r\n\r\n	# Special case just for <hr />. It was easier to make a special case than\r\n	# to make the other regex more complicated.\r\n	$text = preg_replace_callback(\'{\r\n				(?:\r\n					(?<=\\n\\n)		# Starting after a blank line\r\n					|				# or\r\n					\\A\\n?			# the beginning of the doc\r\n				)\r\n				(						# save in $1\r\n					[ ]{0,\'.$less_than_tab.\'}\r\n					<(hr)				# start tag = $2\r\n					\\b					# word break\r\n					([^<>])*?			#\r\n					/?>					# the matching end tag\r\n					[ \\t]*\r\n					(?=\\n{2,}|\\Z)		# followed by a blank line or end of document\r\n				)\r\n		}x\',\r\n		\'_HashHTMLBlocks_callback\',\r\n		$text);\r\n\r\n	# Special case for standalone HTML comments:\r\n	$text = preg_replace_callback(\'{\r\n				(?:\r\n					(?<=\\n\\n)		# Starting after a blank line\r\n					|				# or\r\n					\\A\\n?			# the beginning of the doc\r\n				)\r\n				(						# save in $1\r\n					[ ]{0,\'.$less_than_tab.\'}\r\n					(?s:\r\n						<!\r\n						(--.*?--\\s*)+\r\n						>\r\n					)\r\n					[ \\t]*\r\n					(?=\\n{2,}|\\Z)		# followed by a blank line or end of document\r\n				)\r\n			}x\',\r\n			\'_HashHTMLBlocks_callback\',\r\n			$text);\r\n\r\n	return $text;\r\n}\r\nfunction _HashHTMLBlocks_callback($matches) {\r\n	global $md_html_blocks;\r\n	$text = $matches[1];\r\n	$key = md5($text);\r\n	$md_html_blocks[$key] = $text;\r\n	return \"\\n\\n$key\\n\\n\"; # String that will replace the block\r\n}\r\n\r\n\r\nfunction _RunBlockGamut($text) {\r\n#\r\n# These are all the transformations that form block-level\r\n# tags like paragraphs, headers, and list items.\r\n#\r\n	global $md_empty_element_suffix;\r\n\r\n	$text = _DoHeaders($text);\r\n\r\n	# Do Horizontal Rules:\r\n	$text = preg_replace(\r\n		array(\'{^[ ]{0,2}([ ]?\\*[ ]?){3,}[ \\t]*$}mx\',\r\n			  \'{^[ ]{0,2}([ ]? -[ ]?){3,}[ \\t]*$}mx\',\r\n			  \'{^[ ]{0,2}([ ]? _[ ]?){3,}[ \\t]*$}mx\'),\r\n		\"\\n<hr$md_empty_element_suffix\\n\",\r\n		$text);\r\n\r\n	$text = _DoLists($text);\r\n	$text = _DoCodeBlocks($text);\r\n	$text = _DoBlockQuotes($text);\r\n\r\n	# We already ran _HashHTMLBlocks() before, in Markdown(), but that\r\n	# was to escape raw HTML in the original Markdown source. This time,\r\n	# we\'re escaping the markup we\'ve just created, so that we don\'t wrap\r\n	# <p> tags around block-level tags.\r\n	$text = _HashHTMLBlocks($text);\r\n	$text = _FormParagraphs($text);\r\n\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _RunSpanGamut($text) {\r\n#\r\n# These are all the transformations that occur *within* block-level\r\n# tags like paragraphs, headers, and list items.\r\n#\r\n	global $md_empty_element_suffix;\r\n\r\n	$text = _DoCodeSpans($text);\r\n\r\n	$text = _EscapeSpecialChars($text);\r\n\r\n	# Process anchor and image tags. Images must come first,\r\n	# because ![foo][f] looks like an anchor.\r\n	$text = _DoImages($text);\r\n	$text = _DoAnchors($text);\r\n\r\n	# Make links out of things like `<http://example.com/>`\r\n	# Must come after _DoAnchors(), because you can use < and >\r\n	# delimiters in inline links like [this](<url>).\r\n	$text = _DoAutoLinks($text);\r\n	$text = _EncodeAmpsAndAngles($text);\r\n	$text = _DoItalicsAndBold($text);\r\n\r\n	# Do hard breaks:\r\n	$text = preg_replace(\'/ {2,}\\n/\', \"<br$md_empty_element_suffix\\n\", $text);\r\n\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _EscapeSpecialChars($text) {\r\n	global $md_escape_table;\r\n	$tokens = _TokenizeHTML($text);\r\n\r\n	$text = \'\';   # rebuild $text from the tokens\r\n#	$in_pre = 0;  # Keep track of when we\'re inside <pre> or <code> tags.\r\n#	$tags_to_skip = \"!<(/?)(?:pre|code|kbd|script|math)[\\s>]!\";\r\n\r\n	foreach ($tokens as $cur_token) {\r\n		if ($cur_token[0] == \'tag\') {\r\n			# Within tags, encode * and _ so they don\'t conflict\r\n			# with their use in Markdown for italics and strong.\r\n			# We\'re replacing each such character with its\r\n			# corresponding MD5 checksum value; this is likely\r\n			# overkill, but it should prevent us from colliding\r\n			# with the escape values by accident.\r\n			$cur_token[1] = str_replace(array(\'*\', \'_\'),\r\n				array($md_escape_table[\'*\'], $md_escape_table[\'_\']),\r\n				$cur_token[1]);\r\n			$text .= $cur_token[1];\r\n		} else {\r\n			$t = $cur_token[1];\r\n			$t = _EncodeBackslashEscapes($t);\r\n			$text .= $t;\r\n		}\r\n	}\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _DoAnchors($text) {\r\n#\r\n# Turn Markdown link shortcuts into XHTML <a> tags.\r\n#\r\n	global $md_nested_brackets;\r\n	#\r\n	# First, handle reference-style links: [link text] [id]\r\n	#\r\n	$text = preg_replace_callback(\"{\r\n		(					# wrap whole match in $1\r\n		  \\\\[\r\n			($md_nested_brackets)	# link text = $2\r\n		  \\\\]\r\n\r\n		  [ ]?				# one optional space\r\n		  (?:\\\\n[ ]*)?		# one optional newline followed by spaces\r\n\r\n		  \\\\[\r\n			(.*?)		# id = $3\r\n		  \\\\]\r\n		)\r\n		}xs\",\r\n		\'_DoAnchors_reference_callback\', $text);\r\n\r\n	#\r\n	# Next, inline-style links: [link text](url \"optional title\")\r\n	#\r\n	$text = preg_replace_callback(\"{\r\n		(				# wrap whole match in $1\r\n		  \\\\[\r\n			($md_nested_brackets)	# link text = $2\r\n		  \\\\]\r\n		  \\\\(			# literal paren\r\n			[ \\\\t]*\r\n			<?(.*?)>?	# href = $3\r\n			[ \\\\t]*\r\n			(			# $4\r\n			  ([\'\\\"])	# quote char = $5\r\n			  (.*?)		# Title = $6\r\n			  \\\\5		# matching quote\r\n			)?			# title is optional\r\n		  \\\\)\r\n		)\r\n		}xs\",\r\n		\'_DoAnchors_inline_callback\', $text);\r\n\r\n	return $text;\r\n}\r\nfunction _DoAnchors_reference_callback($matches) {\r\n	global $md_urls, $md_titles, $md_escape_table;\r\n	$whole_match = $matches[1];\r\n	$link_text   = $matches[2];\r\n	$link_id     = strtolower($matches[3]);\r\n\r\n	if ($link_id == \"\") {\r\n		$link_id = strtolower($link_text); # for shortcut links like [this][].\r\n	}\r\n\r\n	if (isset($md_urls[$link_id])) {\r\n		$url = $md_urls[$link_id];\r\n		# We\'ve got to encode these to avoid conflicting with italics/bold.\r\n		$url = str_replace(array(\'*\', \'_\'),\r\n						   array($md_escape_table[\'*\'], $md_escape_table[\'_\']),\r\n						   $url);\r\n		$result = \"<a href=\\\"$url\\\"\";\r\n		if ( isset( $md_titles[$link_id] ) ) {\r\n			$title = $md_titles[$link_id];\r\n			$title = str_replace(array(\'*\',     \'_\'),\r\n								 array($md_escape_table[\'*\'],\r\n									   $md_escape_table[\'_\']), $title);\r\n			$result .=  \" title=\\\"$title\\\"\";\r\n		}\r\n		$result .= \">$link_text</a>\";\r\n	}\r\n	else {\r\n		$result = $whole_match;\r\n	}\r\n	return $result;\r\n}\r\nfunction _DoAnchors_inline_callback($matches) {\r\n	global $md_escape_table;\r\n	$whole_match	= $matches[1];\r\n	$link_text		= $matches[2];\r\n	$url			= $matches[3];\r\n	$title			=& $matches[6];\r\n\r\n	# We\'ve got to encode these to avoid conflicting with italics/bold.\r\n	$url = str_replace(array(\'*\', \'_\'),\r\n					   array($md_escape_table[\'*\'], $md_escape_table[\'_\']),\r\n					   $url);\r\n	$result = \"<a href=\\\"$url\\\"\";\r\n	if (isset($title)) {\r\n		$title = str_replace(\'\"\', \'&quot;\', $title);\r\n		$title = str_replace(array(\'*\', \'_\'),\r\n							 array($md_escape_table[\'*\'], $md_escape_table[\'_\']),\r\n							 $title);\r\n		$result .=  \" title=\\\"$title\\\"\";\r\n	}\r\n\r\n	$result .= \">$link_text</a>\";\r\n\r\n	return $result;\r\n}\r\n\r\n\r\nfunction _DoImages($text) {\r\n#\r\n# Turn Markdown image shortcuts into <img> tags.\r\n#\r\n	global $md_nested_brackets;\r\n\r\n	#\r\n	# First, handle reference-style labeled images: ![alt text][id]\r\n	#\r\n	$text = preg_replace_callback(\'{\r\n		(				# wrap whole match in $1\r\n		  !\\[\r\n			(\'.$md_nested_brackets.\')		# alt text = $2\r\n		  \\]\r\n\r\n		  [ ]?				# one optional space\r\n		  (?:\\n[ ]*)?		# one optional newline followed by spaces\r\n\r\n		  \\[\r\n			(.*?)		# id = $3\r\n		  \\]\r\n\r\n		)\r\n		}xs\',\r\n		\'_DoImages_reference_callback\', $text);\r\n\r\n	#\r\n	# Next, handle inline images:  ![alt text](url \"optional title\")\r\n	# Don\'t forget: encode * and _\r\n\r\n	$text = preg_replace_callback(\'{\r\n		(				# wrap whole match in $1\r\n		  !\\[\r\n			(\'.$md_nested_brackets.\')		# alt text = $2\r\n		  \\]\r\n		  \\(			# literal paren\r\n			[ \\t]*\r\n			<?(\\S+?)>?	# src url = $3\r\n			[ \\t]*\r\n			(			# $4\r\n			  ([\\\'\"])	# quote char = $5\r\n			  (.*?)		# title = $6\r\n			  \\5		# matching quote\r\n			  [ \\t]*\r\n			)?			# title is optional\r\n		  \\)\r\n		)\r\n		}xs\',\r\n		\'_DoImages_inline_callback\', $text);\r\n\r\n	return $text;\r\n}\r\nfunction _DoImages_reference_callback($matches) {\r\n	global $md_urls, $md_titles, $md_empty_element_suffix, $md_escape_table;\r\n	$whole_match = $matches[1];\r\n	$alt_text    = $matches[2];\r\n	$link_id     = strtolower($matches[3]);\r\n\r\n	if ($link_id == \"\") {\r\n		$link_id = strtolower($alt_text); # for shortcut links like ![this][].\r\n	}\r\n\r\n	$alt_text = str_replace(\'\"\', \'&quot;\', $alt_text);\r\n	if (isset($md_urls[$link_id])) {\r\n		$url = $md_urls[$link_id];\r\n		# We\'ve got to encode these to avoid conflicting with italics/bold.\r\n		$url = str_replace(array(\'*\', \'_\'),\r\n						   array($md_escape_table[\'*\'], $md_escape_table[\'_\']),\r\n						   $url);\r\n		$result = \"<img src=\\\"$url\\\" alt=\\\"$alt_text\\\"\";\r\n		if (isset($md_titles[$link_id])) {\r\n			$title = $md_titles[$link_id];\r\n			$title = str_replace(array(\'*\', \'_\'),\r\n								 array($md_escape_table[\'*\'],\r\n									   $md_escape_table[\'_\']), $title);\r\n			$result .=  \" title=\\\"$title\\\"\";\r\n		}\r\n		$result .= $md_empty_element_suffix;\r\n	}\r\n	else {\r\n		# If there\'s no such link ID, leave intact:\r\n		$result = $whole_match;\r\n	}\r\n\r\n	return $result;\r\n}\r\nfunction _DoImages_inline_callback($matches) {\r\n	global $md_empty_element_suffix, $md_escape_table;\r\n	$whole_match	= $matches[1];\r\n	$alt_text		= $matches[2];\r\n	$url			= $matches[3];\r\n	$title			= \'\';\r\n	if (isset($matches[6])) {\r\n		$title		= $matches[6];\r\n	}\r\n\r\n	$alt_text = str_replace(\'\"\', \'&quot;\', $alt_text);\r\n	$title    = str_replace(\'\"\', \'&quot;\', $title);\r\n	# We\'ve got to encode these to avoid conflicting with italics/bold.\r\n	$url = str_replace(array(\'*\', \'_\'),\r\n					   array($md_escape_table[\'*\'], $md_escape_table[\'_\']),\r\n					   $url);\r\n	$result = \"<img src=\\\"$url\\\" alt=\\\"$alt_text\\\"\";\r\n	if (isset($title)) {\r\n		$title = str_replace(array(\'*\', \'_\'),\r\n							 array($md_escape_table[\'*\'], $md_escape_table[\'_\']),\r\n							 $title);\r\n		$result .=  \" title=\\\"$title\\\"\"; # $title already quoted\r\n	}\r\n	$result .= $md_empty_element_suffix;\r\n\r\n	return $result;\r\n}\r\n\r\n\r\nfunction _DoHeaders($text) {\r\n	# Setext-style headers:\r\n	#	  Header 1\r\n	#	  ========\r\n	#\r\n	#	  Header 2\r\n	#	  --------\r\n	#\r\n	$text = preg_replace(\r\n		array(\'{ ^(.+)[ \\t]*\\n=+[ \\t]*\\n+ }emx\',\r\n			  \'{ ^(.+)[ \\t]*\\n-+[ \\t]*\\n+ }emx\'),\r\n		array(\"\'<h1>\'._RunSpanGamut(_UnslashQuotes(\'\\\\1\')).\'</h1>\\n\\n\'\",\r\n			  \"\'<h2>\'._RunSpanGamut(_UnslashQuotes(\'\\\\1\')).\'</h2>\\n\\n\'\"),\r\n		$text);\r\n\r\n	# atx-style headers:\r\n	#	# Header 1\r\n	#	## Header 2\r\n	#	## Header 2 with closing hashes ##\r\n	#	...\r\n	#	###### Header 6\r\n	#\r\n	$text = preg_replace(\"{\r\n			^(\\\\#{1,6})	# $1 = string of #\'s\r\n			[ \\\\t]*\r\n			(.+?)		# $2 = Header text\r\n			[ \\\\t]*\r\n			\\\\#*			# optional closing #\'s (not counted)\r\n			\\\\n+\r\n		}xme\",\r\n		\"\'<h\'.strlen(\'\\\\1\').\'>\'._RunSpanGamut(_UnslashQuotes(\'\\\\2\')).\'</h\'.strlen(\'\\\\1\').\'>\\n\\n\'\",\r\n		$text);\r\n\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _DoLists($text) {\r\n#\r\n# Form HTML ordered (numbered) and unordered (bulleted) lists.\r\n#\r\n	global $md_tab_width, $md_list_level;\r\n	$less_than_tab = $md_tab_width - 1;\r\n\r\n	# Re-usable patterns to match list item bullets and number markers:\r\n	$marker_ul  = \'[*+-]\';\r\n	$marker_ol  = \'\\d+[.]\';\r\n	$marker_any = \"(?:$marker_ul|$marker_ol)\";\r\n\r\n	$markers = array($marker_ul, $marker_ol);\r\n\r\n	foreach ($markers as $marker) {\r\n		# Re-usable pattern to match any entirel ul or ol list:\r\n		$whole_list = \'\r\n			(								# $1 = whole list\r\n			  (								# $2\r\n				[ ]{0,\'.$less_than_tab.\'}\r\n				(\'.$marker.\')				# $3 = first list item marker\r\n				[ \\t]+\r\n			  )\r\n			  (?s:.+?)\r\n			  (								# $4\r\n				  \\z\r\n				|\r\n				  \\n{2,}\r\n				  (?=\\S)\r\n				  (?!						# Negative lookahead for another list item marker\r\n					[ \\t]*\r\n					\'.$marker.\'[ \\t]+\r\n				  )\r\n			  )\r\n			)\r\n		\'; // mx\r\n\r\n		# We use a different prefix before nested lists than top-level lists.\r\n		# See extended comment in _ProcessListItems().\r\n\r\n		if ($md_list_level) {\r\n			$text = preg_replace_callback(\'{\r\n					^\r\n					\'.$whole_list.\'\r\n				}mx\',\r\n				\'_DoLists_callback_top\', $text);\r\n		}\r\n		else {\r\n			$text = preg_replace_callback(\'{\r\n					(?:(?<=\\n\\n)|\\A\\n?)\r\n					\'.$whole_list.\'\r\n				}mx\',\r\n				\'_DoLists_callback_nested\', $text);\r\n		}\r\n	}\r\n\r\n	return $text;\r\n}\r\nfunction _DoLists_callback_top($matches) {\r\n	# Re-usable patterns to match list item bullets and number markers:\r\n	$marker_ul  = \'[*+-]\';\r\n	$marker_ol  = \'\\d+[.]\';\r\n	$marker_any = \"(?:$marker_ul|$marker_ol)\";\r\n\r\n	$list = $matches[1];\r\n	$list_type = preg_match(\"/$marker_ul/\", $matches[3]) ? \"ul\" : \"ol\";\r\n\r\n	$marker_any = ( $list_type == \"ul\" ? $marker_ul : $marker_ol );\r\n\r\n	# Turn double returns into triple returns, so that we can make a\r\n	# paragraph for the last item in a list, if necessary:\r\n	$list = preg_replace(\"/\\n{2,}/\", \"\\n\\n\\n\", $list);\r\n	$result = _ProcessListItems($list, $marker_any);\r\n\r\n	# Trim any trailing whitespace, to put the closing `</$list_type>`\r\n	# up on the preceding line, to get it past the current stupid\r\n	# HTML block parser. This is a hack to work around the terrible\r\n	# hack that is the HTML block parser.\r\n	$result = rtrim($result);\r\n	$result = \"<$list_type>\" . $result . \"</$list_type>\\n\";\r\n	return $result;\r\n}\r\nfunction _DoLists_callback_nested($matches) {\r\n	# Re-usable patterns to match list item bullets and number markers:\r\n	$marker_ul  = \'[*+-]\';\r\n	$marker_ol  = \'\\d+[.]\';\r\n	$marker_any = \"(?:$marker_ul|$marker_ol)\";\r\n\r\n	$list = $matches[1];\r\n	$list_type = preg_match(\"/$marker_ul/\", $matches[3]) ? \"ul\" : \"ol\";\r\n\r\n	$marker_any = ( $list_type == \"ul\" ? $marker_ul : $marker_ol );\r\n\r\n	# Turn double returns into triple returns, so that we can make a\r\n	# paragraph for the last item in a list, if necessary:\r\n	$list = preg_replace(\"/\\n{2,}/\", \"\\n\\n\\n\", $list);\r\n	$result = _ProcessListItems($list, $marker_any);\r\n	$result = \"<$list_type>\\n\" . $result . \"</$list_type>\\n\";\r\n	return $result;\r\n}\r\n\r\n\r\nfunction _ProcessListItems($list_str, $marker_any) {\r\n#\r\n#	Process the contents of a single ordered or unordered list, splitting it\r\n#	into individual list items.\r\n#\r\n	global $md_list_level;\r\n\r\n	# The $md_list_level global keeps track of when we\'re inside a list.\r\n	# Each time we enter a list, we increment it; when we leave a list,\r\n	# we decrement. If it\'s zero, we\'re not in a list anymore.\r\n	#\r\n	# We do this because when we\'re not inside a list, we want to treat\r\n	# something like this:\r\n	#\r\n	#		I recommend upgrading to version\r\n	#		8. Oops, now this line is treated\r\n	#		as a sub-list.\r\n	#\r\n	# As a single paragraph, despite the fact that the second line starts\r\n	# with a digit-period-space sequence.\r\n	#\r\n	# Whereas when we\'re inside a list (or sub-list), that line will be\r\n	# treated as the start of a sub-list. What a kludge, huh? This is\r\n	# an aspect of Markdown\'s syntax that\'s hard to parse perfectly\r\n	# without resorting to mind-reading. Perhaps the solution is to\r\n	# change the syntax rules such that sub-lists must start with a\r\n	# starting cardinal number; e.g. \"1.\" or \"a.\".\r\n\r\n	$md_list_level++;\r\n\r\n	# trim trailing blank lines:\r\n	$list_str = preg_replace(\"/\\n{2,}\\\\z/\", \"\\n\", $list_str);\r\n\r\n	$list_str = preg_replace_callback(\'{\r\n		(\\n)?							# leading line = $1\r\n		(^[ \\t]*)						# leading whitespace = $2\r\n		(\'.$marker_any.\') [ \\t]+		# list marker = $3\r\n		((?s:.+?)						# list item text   = $4\r\n		(\\n{1,2}))\r\n		(?= \\n* (\\z | \\2 (\'.$marker_any.\') [ \\t]+))\r\n		}xm\',\r\n		\'_ProcessListItems_callback\', $list_str);\r\n\r\n	$md_list_level--;\r\n	return $list_str;\r\n}\r\nfunction _ProcessListItems_callback($matches) {\r\n	$item = $matches[4];\r\n	$leading_line =& $matches[1];\r\n	$leading_space =& $matches[2];\r\n\r\n	if ($leading_line || preg_match(\'/\\n{2,}/\', $item)) {\r\n		$item = _RunBlockGamut(_Outdent($item));\r\n	}\r\n	else {\r\n		# Recursion for sub-lists:\r\n		$item = _DoLists(_Outdent($item));\r\n		$item = preg_replace(\'/\\n+$/\', \'\', $item);\r\n		$item = _RunSpanGamut($item);\r\n	}\r\n\r\n	return \"<li>\" . $item . \"</li>\\n\";\r\n}\r\n\r\n\r\nfunction _DoCodeBlocks($text) {\r\n#\r\n#	Process Markdown `<pre><code>` blocks.\r\n#\r\n	global $md_tab_width;\r\n	$text = preg_replace_callback(\"{\r\n			(?:\\\\n\\\\n|\\\\A)\r\n			(	            # $1 = the code block -- one or more lines, starting with a space/tab\r\n			  (?:\r\n				(?:[ ]\\{$md_tab_width} | \\\\t)  # Lines must start with a tab or a tab-width of spaces\r\n				.*\\\\n+\r\n			  )+\r\n			)\r\n			((?=^[ ]{0,$md_tab_width}\\\\S)|\\\\Z)	# Lookahead for non-space at line-start, or end of doc\r\n		}xm\",\r\n		\'_DoCodeBlocks_callback\', $text);\r\n\r\n	return $text;\r\n}\r\nfunction _DoCodeBlocks_callback($matches) {\r\n	$codeblock = $matches[1];\r\n\r\n	$codeblock = _EncodeCode(_Outdent($codeblock));\r\n//	$codeblock = _Detab($codeblock);\r\n	# trim leading newlines and trailing whitespace\r\n	$codeblock = preg_replace(array(\'/\\A\\n+/\', \'/\\s+\\z/\'), \'\', $codeblock);\r\n\r\n	$result = \"\\n\\n<pre><code>\" . $codeblock . \"\\n</code></pre>\\n\\n\";\r\n\r\n	return $result;\r\n}\r\n\r\n\r\nfunction _DoCodeSpans($text) {\r\n#\r\n# 	*	Backtick quotes are used for <code></code> spans.\r\n#\r\n# 	*	You can use multiple backticks as the delimiters if you want to\r\n# 		include literal backticks in the code span. So, this input:\r\n#\r\n#		  Just type ``foo `bar` baz`` at the prompt.\r\n#\r\n#	  	Will translate to:\r\n#\r\n#		  <p>Just type <code>foo `bar` baz</code> at the prompt.</p>\r\n#\r\n#		There\'s no arbitrary limit to the number of backticks you\r\n#		can use as delimters. If you need three consecutive backticks\r\n#		in your code, use four for delimiters, etc.\r\n#\r\n#	*	You can use spaces to get literal backticks at the edges:\r\n#\r\n#		  ... type `` `bar` `` ...\r\n#\r\n#	  	Turns to:\r\n#\r\n#		  ... type <code>`bar`</code> ...\r\n#\r\n	$text = preg_replace_callback(\'@\r\n			(?<!\\\\\\)	# Character before opening ` can\\\'t be a backslash\r\n			(`+)		# $1 = Opening run of `\r\n			(.+?)		# $2 = The code block\r\n			(?<!`)\r\n			\\1			# Matching closer\r\n			(?!`)\r\n		@xs\',\r\n		\'_DoCodeSpans_callback\', $text);\r\n\r\n	return $text;\r\n}\r\nfunction _DoCodeSpans_callback($matches) {\r\n	$c = $matches[2];\r\n	$c = preg_replace(\'/^[ \\t]*/\', \'\', $c); # leading whitespace\r\n	$c = preg_replace(\'/[ \\t]*$/\', \'\', $c); # trailing whitespace\r\n	$c = _EncodeCode($c);\r\n	return \"<code>$c</code>\";\r\n}\r\n\r\n\r\nfunction _EncodeCode($_) {\r\n#\r\n# Encode/escape certain characters inside Markdown code runs.\r\n# The point is that in code, these characters are literals,\r\n# and lose their special Markdown meanings.\r\n#\r\n	global $md_escape_table;\r\n\r\n	# Encode all ampersands; HTML entities are not\r\n	# entities within a Markdown code span.\r\n	$_ = str_replace(\'&\', \'&amp;\', $_);\r\n\r\n	# Do the angle bracket song and dance:\r\n	$_ = str_replace(array(\'<\',    \'>\'),\r\n					 array(\'&lt;\', \'&gt;\'), $_);\r\n\r\n	# Now, escape characters that are magic in Markdown:\r\n	$_ = str_replace(array_keys($md_escape_table),\r\n					 array_values($md_escape_table), $_);\r\n\r\n	return $_;\r\n}\r\n\r\n\r\nfunction _DoItalicsAndBold($text) {\r\n	# <strong> must go first:\r\n	$text = preg_replace(\'{\r\n			(						# $1: Marker\r\n				(?<!\\*\\*) \\*\\* |	#     (not preceded by two chars of\r\n				(?<!__)   __		#      the same marker)\r\n			)\r\n			(?=\\S) 					# Not followed by whitespace\r\n			(?!\\1)					#   or two others marker chars.\r\n			(						# $2: Content\r\n				(?:\r\n					[^*_]+?			# Anthing not em markers.\r\n				|\r\n									# Balence any regular emphasis inside.\r\n					([*_]) (?=\\S) .+? (?<=\\S) \\3	# $3: em char (* or _)\r\n				|\r\n					(?! \\1 ) .		# Allow unbalenced * and _.\r\n				)+?\r\n			)\r\n			(?<=\\S) \\1				# End mark not preceded by whitespace.\r\n		}sx\',\r\n		\'<strong>\\2</strong>\', $text);\r\n	# Then <em>:\r\n	$text = preg_replace(\r\n		\'{ ( (?<!\\*)\\* | (?<!_)_ ) (?=\\S) (?! \\1) (.+?) (?<=\\S) \\1 }sx\',\r\n		\'<em>\\2</em>\', $text);\r\n\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _DoBlockQuotes($text) {\r\n	$text = preg_replace_callback(\'/\r\n		  (								# Wrap whole match in $1\r\n			(\r\n			  ^[ \\t]*>[ \\t]?			# \">\" at the start of a line\r\n				.+\\n					# rest of the first line\r\n			  (.+\\n)*					# subsequent consecutive lines\r\n			  \\n*						# blanks\r\n			)+\r\n		  )\r\n		/xm\',\r\n		\'_DoBlockQuotes_callback\', $text);\r\n\r\n	return $text;\r\n}\r\nfunction _DoBlockQuotes_callback($matches) {\r\n	$bq = $matches[1];\r\n	# trim one level of quoting - trim whitespace-only lines\r\n	$bq = preg_replace(array(\'/^[ \\t]*>[ \\t]?/m\', \'/^[ \\t]+$/m\'), \'\', $bq);\r\n	$bq = _RunBlockGamut($bq);		# recurse\r\n\r\n	$bq = preg_replace(\'/^/m\', \"  \", $bq);\r\n	# These leading spaces screw with <pre> content, so we need to fix that:\r\n	$bq = preg_replace_callback(\'{(\\s*<pre>.+?</pre>)}sx\',\r\n								\'_DoBlockQuotes_callback2\', $bq);\r\n\r\n	return \"<blockquote>\\n$bq\\n</blockquote>\\n\\n\";\r\n}\r\nfunction _DoBlockQuotes_callback2($matches) {\r\n	$pre = $matches[1];\r\n	$pre = preg_replace(\'/^  /m\', \'\', $pre);\r\n	return $pre;\r\n}\r\n\r\n\r\nfunction _FormParagraphs($text) {\r\n#\r\n#	Params:\r\n#		$text - string to process with html <p> tags\r\n#\r\n	global $md_html_blocks;\r\n\r\n	# Strip leading and trailing lines:\r\n	$text = preg_replace(array(\'/\\A\\n+/\', \'/\\n+\\z/\'), \'\', $text);\r\n\r\n	$grafs = preg_split(\'/\\n{2,}/\', $text, -1, PREG_SPLIT_NO_EMPTY);\r\n\r\n	#\r\n	# Wrap <p> tags.\r\n	#\r\n	foreach ($grafs as $key => $value) {\r\n		if (!isset( $md_html_blocks[$value] )) {\r\n			$value = _RunSpanGamut($value);\r\n			$value = preg_replace(\'/^([ \\t]*)/\', \'<p>\', $value);\r\n			$value .= \"</p>\";\r\n			$grafs[$key] = $value;\r\n		}\r\n	}\r\n\r\n	#\r\n	# Unhashify HTML blocks\r\n	#\r\n	foreach ($grafs as $key => $value) {\r\n		if (isset( $md_html_blocks[$value] )) {\r\n			$grafs[$key] = $md_html_blocks[$value];\r\n		}\r\n	}\r\n\r\n	return implode(\"\\n\\n\", $grafs);\r\n}\r\n\r\n\r\nfunction _EncodeAmpsAndAngles($text) {\r\n# Smart processing for ampersands and angle brackets that need to be encoded.\r\n\r\n	# Ampersand-encoding based entirely on Nat Irons\'s Amputator MT plugin:\r\n	#   http://bumppo.net/projects/amputator/\r\n	$text = preg_replace(\'/&(?!#?[xX]?(?:[0-9a-fA-F]+|\\w+);)/\',\r\n						 \'&amp;\', $text);;\r\n\r\n	# Encode naked <\'s\r\n	$text = preg_replace(\'{<(?![a-z/?\\$!])}i\', \'&lt;\', $text);\r\n\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _EncodeBackslashEscapes($text) {\r\n#\r\n#	Parameter:  String.\r\n#	Returns:    The string, with after processing the following backslash\r\n#				escape sequences.\r\n#\r\n	global $md_escape_table, $md_backslash_escape_table;\r\n	# Must process escaped backslashes first.\r\n	return str_replace(array_keys($md_backslash_escape_table),\r\n					   array_values($md_backslash_escape_table), $text);\r\n}\r\n\r\n\r\nfunction _DoAutoLinks($text) {\r\n	$text = preg_replace(\"!<((https?|ftp):[^\'\\\">\\\\s]+)>!\",\r\n						 \'<a href=\"\\1\">\\1</a>\', $text);\r\n\r\n	# Email addresses: <address@domain.foo>\r\n	$text = preg_replace(\'{\r\n		<\r\n        (?:mailto:)?\r\n		(\r\n			[-.\\w]+\r\n			\\@\r\n			[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]+\r\n		)\r\n		>\r\n		}exi\',\r\n		\"_EncodeEmailAddress(_UnescapeSpecialChars(_UnslashQuotes(\'\\\\1\')))\",\r\n		$text);\r\n\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _EncodeEmailAddress($addr) {\r\n#\r\n#	Input: an email address, e.g. \"foo@example.com\"\r\n#\r\n#	Output: the email address as a mailto link, with each character\r\n#		of the address encoded as either a decimal or hex entity, in\r\n#		the hopes of foiling most address harvesting spam bots. E.g.:\r\n#\r\n#	  <a href=\"&#x6D;&#97;&#105;&#108;&#x74;&#111;:&#102;&#111;&#111;&#64;&#101;\r\n#		x&#x61;&#109;&#x70;&#108;&#x65;&#x2E;&#99;&#111;&#109;\">&#102;&#111;&#111;\r\n#		&#64;&#101;x&#x61;&#109;&#x70;&#108;&#x65;&#x2E;&#99;&#111;&#109;</a>\r\n#\r\n#	Based by a filter by Matthew Wickline, posted to the BBEdit-Talk\r\n#	mailing list: <http://tinyurl.com/yu7ue>\r\n#\r\n	$addr = \"mailto:\" . $addr;\r\n	$length = strlen($addr);\r\n\r\n	# leave \':\' alone (to spot mailto: later)\r\n	$addr = preg_replace_callback(\'/([^\\:])/\',\r\n								  \'_EncodeEmailAddress_callback\', $addr);\r\n\r\n	$addr = \"<a href=\\\"$addr\\\">$addr</a>\";\r\n	# strip the mailto: from the visible part\r\n	$addr = preg_replace(\'/\">.+?:/\', \'\">\', $addr);\r\n\r\n	return $addr;\r\n}\r\nfunction _EncodeEmailAddress_callback($matches) {\r\n	$char = $matches[1];\r\n	$r = rand(0, 100);\r\n	# roughly 10% raw, 45% hex, 45% dec\r\n	# \'@\' *must* be encoded. I insist.\r\n	if ($r > 90 && $char != \'@\') return $char;\r\n	if ($r < 45) return \'&#x\'.dechex(ord($char)).\';\';\r\n	return \'&#\'.ord($char).\';\';\r\n}\r\n\r\n\r\nfunction _UnescapeSpecialChars($text) {\r\n#\r\n# Swap back in all the special characters we\'ve hidden.\r\n#\r\n	global $md_escape_table;\r\n	return str_replace(array_values($md_escape_table),\r\n					   array_keys($md_escape_table), $text);\r\n}\r\n\r\n\r\n# _TokenizeHTML is shared between PHP Markdown and PHP SmartyPants.\r\n# We only define it if it is not already defined.\r\nif (!function_exists(\'_TokenizeHTML\')) :\r\nfunction _TokenizeHTML($str) {\r\n#\r\n#   Parameter:  String containing HTML markup.\r\n#   Returns:    An array of the tokens comprising the input\r\n#               string. Each token is either a tag (possibly with nested,\r\n#               tags contained therein, such as <a href=\"<MTFoo>\">, or a\r\n#               run of text between tags. Each element of the array is a\r\n#               two-element array; the first is either \'tag\' or \'text\';\r\n#               the second is the actual value.\r\n#\r\n#\r\n#   Regular expression derived from the _tokenize() subroutine in\r\n#   Brad Choate\'s MTRegex plugin.\r\n#   <http://www.bradchoate.com/past/mtregex.php>\r\n#\r\n	$index = 0;\r\n	$tokens = array();\r\n\r\n	$match = \'(?s:<!(?:--.*?--\\s*)+>)|\'.	# comment\r\n			 \'(?s:<\\?.*?\\?>)|\'.				# processing instruction\r\n			 								# regular tags\r\n			 \'(?:<[/!$]?[-a-zA-Z0-9:]+\\b(?>[^\"\\\'>]+|\"[^\"]*\"|\\\'[^\\\']*\\\')*>)\';\r\n\r\n	$parts = preg_split(\"{($match)}\", $str, -1, PREG_SPLIT_DELIM_CAPTURE);\r\n\r\n	foreach ($parts as $part) {\r\n		if (++$index % 2 && $part != \'\')\r\n			$tokens[] = array(\'text\', $part);\r\n		else\r\n			$tokens[] = array(\'tag\', $part);\r\n	}\r\n\r\n	return $tokens;\r\n}\r\nendif;\r\n\r\n\r\nfunction _Outdent($text) {\r\n#\r\n# Remove one level of line-leading tabs or spaces\r\n#\r\n	global $md_tab_width;\r\n	return preg_replace(\"/^(\\\\t|[ ]{1,$md_tab_width})/m\", \"\", $text);\r\n}\r\n\r\n\r\nfunction _Detab($text) {\r\n#\r\n# Replace tabs with the appropriate amount of space.\r\n#\r\n	global $md_tab_width;\r\n\r\n	# For each line we separate the line in blocks delemited by\r\n	# tab characters. Then we reconstruct every line by adding the\r\n	# appropriate number of space between each blocks.\r\n\r\n	$lines = explode(\"\\n\", $text);\r\n	$text = \"\";\r\n\r\n	foreach ($lines as $line) {\r\n		# Split in blocks.\r\n		$blocks = explode(\"\\t\", $line);\r\n		# Add each blocks to the line.\r\n		$line = $blocks[0];\r\n		unset($blocks[0]); # Do not add first block twice.\r\n		foreach ($blocks as $block) {\r\n			# Calculate amount of space, insert spaces, insert block.\r\n			$amount = $md_tab_width - strlen($line) % $md_tab_width;\r\n			$line .= str_repeat(\" \", $amount) . $block;\r\n		}\r\n		$text .= \"$line\\n\";\r\n	}\r\n	return $text;\r\n}\r\n\r\n\r\nfunction _UnslashQuotes($text) {\r\n#\r\n#	This function is useful to remove automaticaly slashed double quotes\r\n#	when using preg_replace and evaluating an expression.\r\n#	Parameter:  String.\r\n#	Returns:    The string with any slash-double-quote (\\\") sequence replaced\r\n#				by a single double quote.\r\n#\r\n	return str_replace(\'\\\"\', \'\"\', $text);\r\n}\r\n\r\n\r\n/*\r\n\r\nPHP Markdown\r\n============\r\n\r\nDescription\r\n-----------\r\n\r\nThis is a PHP translation of the original Markdown formatter written in\r\nPerl by John Gruber.\r\n\r\nMarkdown is a text-to-HTML filter; it translates an easy-to-read /\r\neasy-to-write structured text format into HTML. Markdown\'s text format\r\nis most similar to that of plain text email, and supports features such\r\nas headers, *emphasis*, code blocks, blockquotes, and links.\r\n\r\nMarkdown\'s syntax is designed not as a generic markup language, but\r\nspecifically to serve as a front-end to (X)HTML. You can use span-level\r\nHTML tags anywhere in a Markdown document, and you can use block level\r\nHTML tags (like <div> and <table> as well).\r\n\r\nFor more information about Markdown\'s syntax, see:\r\n\r\n<http://daringfireball.net/projects/markdown/>\r\n\r\n\r\nBugs\r\n----\r\n\r\nTo file bug reports please send email to:\r\n\r\n<michel.fortin@michelf.com>\r\n\r\nPlease include with your report: (1) the example input; (2) the output you\r\nexpected; (3) the output Markdown actually produced.\r\n\r\n\r\nVersion History\r\n---------------\r\n\r\nSee the readme file for detailed release notes for this version.\r\n\r\n1.0.1b - 6 Jun 2005\r\n\r\n1.0.1a - 15 Apr 2005\r\n\r\n1.0.1 - 16 Dec 2004\r\n\r\n1.0 - 21 Aug 2004\r\n\r\n\r\nAuthor & Contributors\r\n---------------------\r\n\r\nOriginal Perl version by John Gruber\r\n<http://daringfireball.net/>\r\n\r\nPHP port and other contributions by Michel Fortin\r\n<http://www.michelf.com/>\r\n\r\n\r\nCopyright and License\r\n---------------------\r\n\r\nCopyright (c) 2004-2005 Michel Fortin\r\n<http://www.michelf.com/>\r\nAll rights reserved.\r\n\r\nCopyright (c) 2003-2004 John Gruber\r\n<http://daringfireball.net/>\r\nAll rights reserved.\r\n\r\nRedistribution and use in source and binary forms, with or without\r\nmodification, are permitted provided that the following conditions are\r\nmet:\r\n\r\n*	Redistributions of source code must retain the above copyright notice,\r\n	this list of conditions and the following disclaimer.\r\n\r\n*	Redistributions in binary form must reproduce the above copyright\r\n	notice, this list of conditions and the following disclaimer in the\r\n	documentation and/or other materials provided with the distribution.\r\n\r\n*	Neither the name \"Markdown\" nor the names of its contributors may\r\n	be used to endorse or promote products derived from this software\r\n	without specific prior written permission.\r\n\r\nThis software is provided by the copyright holders and contributors \"as\r\nis\" and any express or implied warranties, including, but not limited\r\nto, the implied warranties of merchantability and fitness for a\r\nparticular purpose are disclaimed. In no event shall the copyright owner\r\nor contributors be liable for any direct, indirect, incidental, special,\r\nexemplary, or consequential damages (including, but not limited to,\r\nprocurement of substitute goods or services; loss of use, data, or\r\nprofits; or business interruption) however caused and on any theory of\r\nliability, whether in contract, strict liability, or tort (including\r\nnegligence or otherwise) arising in any way out of the use of this\r\nsoftware, even if advised of the possibility of such damage.\r\n\r\n*/');
/*!40000 ALTER TABLE `wp_facileforms_pieces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_records`
--

DROP TABLE IF EXISTS `wp_facileforms_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `submitted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `form` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(30) NOT NULL DEFAULT '',
  `browser` varchar(255) NOT NULL DEFAULT '',
  `opsys` varchar(255) NOT NULL DEFAULT '',
  `provider` varchar(255) NOT NULL DEFAULT '',
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `exported` tinyint(1) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL DEFAULT '',
  `user_full_name` varchar(255) NOT NULL DEFAULT '',
  `paypal_tx_id` varchar(255) NOT NULL DEFAULT '',
  `paypal_payment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paypal_testaccount` tinyint(1) NOT NULL DEFAULT '0',
  `paypal_download_tries` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_records`
--

LOCK TABLES `wp_facileforms_records` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_scripts`
--

DROP TABLE IF EXISTS `wp_facileforms_scripts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `package` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` text,
  `type` varchar(30) NOT NULL DEFAULT '',
  `code` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_scripts`
--

LOCK TABLES `wp_facileforms_scripts` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_scripts` DISABLE KEYS */;
INSERT INTO `wp_facileforms_scripts` VALUES (1,1,'FF','ff_anychecked','Any Checked','Validate that any radio button or checkbox of a group is checked.','Element Validation','function ff_anychecked(element, message)\r\n{\r\n    // get plain name\r\n   // alert(document.ff_form52[\'ff_nm_bfQuickMode6303958[]\']);\r\n   // alert(document.getElementById(element.id).id);\r\n    var name = \'\';\r\n    if(!element.name){\r\n    	if(element.length && element.length != 0){\r\n           name = element[0].name;\r\n           var cnt = 0;\r\n           for (var i = 0; i < element.length; i++)\r\n             if (element[i].name==name) \r\n              if (element[i].checked) cnt++;                      \r\n           if (cnt==0) {\r\n            ff_validationFocus(element[0].name);\r\n            if (message==\'\') message = \"Please check or select \"+name+\".\\n\";\r\n            return message;\r\n           } // if \r\n\r\n        } else {\r\n           return \'\';\r\n        }\r\n    } else {\r\n      name = element.name;\r\n      if (name.substr(0,6) == \'ff_nm_\') name = name.substring(6,name.length-2);\r\n\r\n      // loop through elements and count selections\r\n      var cnt = 0;\r\n      for (var i = 0; i < ff_elements.length; i++)\r\n        if (ff_elements[i][2]==name) \r\n            if (ff_getElementByIndex(i).checked) cnt++;\r\n\r\n      // if none selected, emitt error\r\n      if (cnt==0) {\r\n        ff_validationFocus(element.name);\r\n        if (message==\'\') message = \"Please check or select \"+name+\".\\n\";\r\n        return message;\r\n      } // if\r\n    }\r\n    \r\n    return \'\';\r\n} // ff_anychecked');
INSERT INTO `wp_facileforms_scripts` VALUES (2,1,'FF','ff_checked','Checked','Validate that radio button or checkbox is checked.','Element Validation','function ff_checked(element, message)\r\n{\r\n    if (element.checked) \r\n        return \'\'; \r\n    else {\r\n        if (message==\'\') message = element.name+\" is not checked.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } \r\n}');
INSERT INTO `wp_facileforms_scripts` VALUES (3,1,'FF','ff_checkedValue','Get checked value','Get value of the currently checked radiobutton.','Untyped','function ff_checkedValue(name)\r\n{\r\n    // loop through elements and find checked\r\n    for (i = 0; i < ff_elements.length; i++)\r\n        if (ff_elements[i][2]==name) {\r\n            e = ff_getElementByIndex(i);\r\n            if (e.checked) return e.value;\r\n        } // if \r\n    return \'\';\r\n} // ff_checkedValue');
INSERT INTO `wp_facileforms_scripts` VALUES (4,1,'FF','ff_countQuerySelections','Count Query Selections','Counts how many checkboxes/radiobuttons are checked/selected in a query list element','Untyped','function ff_countQuerySelections(name)\r\n{\r\n    var id = ff_getIdByName(name);\r\n    var cnt = ff_queryRows[id].length;\r\n    var pagesize = ff_queryPageSize[id];\r\n    if (pagesize>0) {\r\n        var currpage = ff_queryCurrPage[id];\r\n        var p;\r\n        for (p = 1; p < currpage; p++) cnt -= pagesize;\r\n        if (cnt > pagesize) cnt = pagesize;\r\n    } // if\r\n    var curr;\r\n    var sels = 0;\r\n    for (curr = 0; curr < cnt; curr++)\r\n        if (document.getElementById(\'ff_cb\'+id+\'_\'+curr).checked) sels++;\r\n    return sels;\r\n} // ff_countQuerySelections');
INSERT INTO `wp_facileforms_scripts` VALUES (5,1,'FF','ff_dollaramount2dp','Dollar Amount with 2 Decimal Places','Validate that a dollar amount with two decimal places is entered.','Element Validation','function ff_dollaramount2dp(element, message)\r\n{\r\n    var ex  = /^\\d+$|^\\d+\\.\\d{2}$/;\r\n    if (!ex.test(element.value)) {\r\n        if (message==\'\') message = element.name+\" must be a number with two decimal places.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n    return \'\';\r\n} // ff_dollaramount2dp');
INSERT INTO `wp_facileforms_scripts` VALUES (6,1,'FF','ff_expString','String export','Export string function: escapes special characters of a string','Untyped','function ff_expString(text)\r\n{\r\n    text = trim(text);\r\n    var i;\r\n    var o = \'\';\r\n    for(i = 0; i < text.length; i++) {\r\n        c = text.charAt(i);\r\n        switch(c) {\r\n            case \';\' : o += \'\\\\x3B\'; break;\r\n            case \',\' : o += \'\\\\x2C\'; break;\r\n            case \'&\' : o += \'\\\\x26\'; break;\r\n            case \'<\' : o += \'\\\\x3C\'; break;\r\n            case \'>\' : o += \'\\\\x3E\'; break;\r\n            case \'\\\'\': o += \'\\\\x27\'; break;\r\n            case \'\\\\\': o += \'\\\\x5C\'; break;\r\n            case \'\"\' : o += \'\\\\x22\'; break;\r\n            case \'\\n\': o += \'\\\\n\'; break;\r\n            case \'\\r\': o += \'\\\\r\'; break;\r\n            default: o += c;\r\n        } // switch\r\n    } // for\r\n    return o;\r\n} // expString');
INSERT INTO `wp_facileforms_scripts` VALUES (7,1,'FF','ff_flashupload_not_empty','Flash Upload Not Empty (QuickMode only!)','Validates if a flash upload is empty or not.','Element Validation','function ff_flashupload_not_empty(element, message)\r\n{\r\n    if(typeof bfSummarizers == \"undefined\") { alert(\"Flash upload validation only available in QuickMode!\"); return \'\'}\r\n    if(JQuery(\'#bfFlashFileQueue\'+element.id.split(\'ff_elem\')[1]).html() != \'\') return \'\';\r\n    if (message==\'\') message = \"Please enter \"+element.name+\".\\n\";\r\n    ff_validationFocus(element.name);\r\n    return message;\r\n} // ff_valuenotempty');
INSERT INTO `wp_facileforms_scripts` VALUES (8,1,'FF','ff_getfocus','Get focus','Get the focus. Usually this is for the first element of the form/page.','Element Init','function ff_getfocus(element,condition)\r\n{\r\n    if(!element.name){\r\n    	if(element.length && element.length != 0){\r\n    		element[0].focus();\r\n    	}\r\n    }else{\r\n    	element.focus();\r\n    }\r\n}');
INSERT INTO `wp_facileforms_scripts` VALUES (9,1,'FF','ff_getQuerySelectedRows','Get Query Selected Rows','Returns the selected rows in a 2-dimensional array','Untyped','function ff_getQuerySelectedRows(name)\r\n{\r\n    var id = ff_getIdByName(name);\r\n    var rcnt = ff_queryRows[id].length;\r\n    var cnt = rcnt;\r\n    var pagesize = ff_queryPageSize[id];\r\n    if (pagesize>0) {\r\n        var currpage = ff_queryCurrPage[id];\r\n        var p;\r\n        for (p = 1; p < currpage; p++) cnt -= pagesize;\r\n        if (cnt > pagesize) cnt = pagesize;\r\n    } // if\r\n    var curr, r;\r\n    var selcnt = 0;\r\n    var sels = new Array;\r\n    for (curr = 0; curr < cnt; curr++) {\r\n        var elem = document.getElementById(\'ff_cb\'+id+\'_\'+curr);\r\n        if (elem.checked) {\r\n            var ident = elem.value;\r\n            for (r = 0; r < rcnt; r++)\r\n                if (ff_queryRows[id][r][0] == ident) {\r\n                    sels[selcnt++] = ff_queryRows[id][r];\r\n                    break;\r\n                } // if\r\n        } // if\r\n    } // for\r\n    return sels;\r\n} // ff_getQuerySelectedRows');
INSERT INTO `wp_facileforms_scripts` VALUES (10,1,'FF','ff_getQuerySelections','Get Query Selected ID\'s','Returns the column values of the checked/selected checkboxes/radiobuttons in an array','Untyped','function ff_getQuerySelections(name)\r\n{\r\n    var id = ff_getIdByName(name);\r\n    var cnt = ff_queryRows[id].length;\r\n    var pagesize = ff_queryPageSize[id];\r\n    if (pagesize>0) {\r\n        var currpage = ff_queryCurrPage[id];\r\n        var p;\r\n        for (p = 1; p < currpage; p++) cnt -= pagesize;\r\n        if (cnt > pagesize) cnt = pagesize;\r\n    } // if\r\n    var curr;\r\n    var selcnt = 0;\r\n    var sels = new Array;\r\n    for (curr = 0; curr < cnt; curr++) {\r\n        var elem = document.getElementById(\'ff_cb\'+id+\'_\'+curr);\r\n        if (elem.checked) \r\n            sels[selcnt++] = elem.value;\r\n    } // for\r\n    return sels;\r\n} // ff_getQuerySelections');
INSERT INTO `wp_facileforms_scripts` VALUES (11,1,'FF','ff_impString','String import','Import string function: unescapes c-coded characters of a string','Untyped','function ff_impString(text)\r\n{\r\n    var str = \'\';\r\n    var ss = 0;\r\n    var s;\r\n    var tl = text.length;\r\n    var hexdigs = \"0123456789abcdefABCDEF\";\r\n    while (ss < tl) {\r\n        s = text.charAt(ss++);\r\n        if (s == \'\\\\\') {\r\n            if (ss < tl) s = text.charAt(ss++); else s = 0;\r\n            switch (s) {\r\n                case 0   : break;\r\n                case \'e\' : str += \'\\33\'; break;\r\n                case \'t\' : str += \'\\t\'; break;\r\n                case \'r\' : str += \'\\r\'; break;\r\n                case \'n\' : str += \'\\n\'; break;\r\n                case \'f\' : str += \'\\f\'; break;\r\n                case \'x\' : {\r\n                    if (ss < tl) s = text.charAt(ss++); else s = 0;\r\n                    var ch = \'\';\r\n                    while (hexdigs.indexOf(s)>=0 && ch.length < 2) {\r\n                        ch += s;\r\n                        if (ss < tl) s = text.charAt(ss++); else s = 0;\r\n                    } // while\r\n                    while (ch.length < 2) ch = \'0\'+ch;\r\n                    str += unescape(\'%\'+ch);\r\n                    if (s) ss--;\r\n                    break;\r\n                }\r\n                default:\r\n                    str += s;\r\n            } // switch\r\n        } else\r\n            str += s;\r\n    } // while\r\n    return str;\r\n} // impString');
INSERT INTO `wp_facileforms_scripts` VALUES (12,1,'FF','ff_integer','Integer Number','Validate that an integer value is entered.','Element Validation','function ff_integer(element, message)\r\n{\r\n    var ex  = /(^-?\\d\\d*$)/;\r\n    if (!ex.test(element.value)) {\r\n        if (message==\'\') message = element.name+\" must be integer.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n    return \'\';\r\n} // ff_integer');
INSERT INTO `wp_facileforms_scripts` VALUES (13,1,'FF','ff_integeramount','Positive Integer','Validate that an positive integer value is entered.','Element Validation','function ff_integeramount(element, message)\r\n{\r\n    var ex  = /(^-?\\d\\d*$)/;\r\n    if (!ex.test(element.value)) {\r\n        if (message==\'\') message = element.name+\" must be integer.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n    return \'\';\r\n} // ff_integeramount');
INSERT INTO `wp_facileforms_scripts` VALUES (14,1,'FF','ff_integer_or_empty','Integer or empty','Validate that either an integer value or nothing is entered.','Element Validation','function ff_integer_or_empty(element, message)\r\n{\r\n    if (element.value != \'\') {\r\n        var ex  = /(^-?\\d\\d*$)/;\r\n        if (!ex.test(element.value)) {\r\n            if (message==\'\') message = element.name+\" must be integer.\\n\";\r\n            ff_validationFocus(element.name);\r\n            return message;\r\n        } // if\r\n    } // if\r\n    return \'\';\r\n} // ff_integer_or_empty');
INSERT INTO `wp_facileforms_scripts` VALUES (15,1,'FF','ff_nextpage','Next page','Switchs to the next page.','Element Action','function ff_nextpage(element, action)\r\n{\r\n    if (ff_currentpage < ff_lastpage) {\r\n        ff_switchpage(ff_currentpage+1);\r\n        self.scrollTo(0,0);\r\n    }\r\n} // ff_nextpage');
INSERT INTO `wp_facileforms_scripts` VALUES (16,1,'FF','ff_page1','Page 1','Switches to the first page.','Element Action','function ff_page1(element, action)\r\n{\r\n    ff_switchpage(1);\r\n} // ff_page1');
INSERT INTO `wp_facileforms_scripts` VALUES (17,1,'FF','ff_page2','Page 2','Switches to the second page.','Element Action','function ff_page2(element, action)\r\n{\r\n    if (ff_lastpage >= 2) ff_switchpage(2);\r\n} // ff_page2');
INSERT INTO `wp_facileforms_scripts` VALUES (18,1,'FF','ff_page3','Page 3','Switches to the third page.','Element Action','function ff_page3(element, action)\r\n{\r\n    if (ff_lastpage >= 3) ff_switchpage(3);\r\n} // ff_page3');
INSERT INTO `wp_facileforms_scripts` VALUES (19,1,'FF','ff_previouspage','Previous page','Switches to the previous page.','Element Action','function ff_previouspage(element, action)\r\n{\r\n    if (ff_currentpage > 1){\r\n        ff_switchpage(ff_currentpage-1);\r\n        self.scrollTo(0,0);\r\n    }\r\n} // ff_previouspage');
INSERT INTO `wp_facileforms_scripts` VALUES (20,1,'FF','ff_real','Real Number','Validate that a real number is entered.','Element Validation','function ff_real(element, message)\r\n{\r\n    var ex  = /(^-?\\d\\d*\\.?\\d*$)/;\r\n    if (!ex.test(element.value)) {\r\n        if (message==\'\') message = element.name+\" must be a number.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n    return \'\';\r\n} // ff_real');
INSERT INTO `wp_facileforms_scripts` VALUES (21,1,'FF','ff_realamount','Positive Real Number','Validate that a positive real number is entered.','Element Validation','function ff_realamount(element, message)\r\n{\r\n    var ex  = /(^\\d\\d*\\.?\\d*$)/;\r\n    if (!ex.test(element.value)) {\r\n        if (message==\'\') message = element.name+\" must be a number.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n    return \'\';\r\n} // ff_realamount');
INSERT INTO `wp_facileforms_scripts` VALUES (22,1,'FF','ff_resetForm','Reset form','Reset all form inputs to the initial values.','Element Action','function ff_resetForm(element, action)\r\n{\r\n    eval(\'document.\'+ff_processor.form_id).reset();\r\n} // ff_resetForm');
INSERT INTO `wp_facileforms_scripts` VALUES (23,1,'FF','ff_securitycode_entered','Security code entered','Check that a security code was entered.','Element Validation','function ff_securitycode_entered(element, message)\r\n{\r\n    var ex  = /(^\\d{5}$)/;\r\n    if (!ex.test(element.value)) {\r\n        if (message==\'\') message = \"Security code must be entered as five digits.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n    return \'\';\r\n} // ff_securitycode_entered');
INSERT INTO `wp_facileforms_scripts` VALUES (24,1,'FF','ff_securitycode_ok','Security code ok','Check that a valid security code was entered.','Element Validation','function ff_securitycode_ok(element, message)\r\n{\r\n<?php\r\n    global $ff_seccode;\r\n    if (!isset($ff_seccode)) { \r\n        mt_srand((double)microtime()*1000000);\r\n        $ff_seccode = mt_rand(10000, 99999);\r\n        JFactory::getSession()->set(\'ff_seccode\', $ff_seccode);\r\n    } // if\r\n    $enc = array();\r\n    mt_srand((double)microtime()*1000000);\r\n    for ($i = 0; $i < 256; $i++) $enc[] = mt_rand(0, 255);\r\n    $seccode = (string)$ff_seccode;\r\n    $hash = \'\';\r\n    $ini = $ff_seccode % 240;\r\n    for ($i = 0; $i < 5; $i++) {\r\n        $d = $ini+intval($seccode{$i});\r\n        for ($j = 0; $j < 7; $j++) $d = $enc[$d];\r\n        $hash .= $d;\r\n        $ini = ($ini+$d) % 240;\r\n    } // for\r\n    return\r\n        \"var enc = \".$this->expJsValue($enc).\";\\n\".\r\n        \"var seccode = new String(element.value);\\n\".\r\n        \"if (seccode.length==5) {\\n\".\r\n        \"    var hash = \'\';\\n\".\r\n        \"    var ini = parseInt(element.value) % 240;\\n\".\r\n        \"    var i, j;\\n\".\r\n        \"    for (i = 0; i < 5; i++) {\\n\".\r\n        \"        var d = ini+parseInt(seccode.charAt(i));\\n\".\r\n        \"        for (j = 0; j < 7; j++) d = enc[d];\\n\".\r\n        \"        hash += d;\\n\".\r\n        \"        ini = (ini+d) % 240;\\n\".\r\n        \"    } // for\\n\".\r\n        \"    if (hash == \'$hash\') return \'\';\\n\". \r\n        \"} // if\\n\".\r\n        \"if (message==\'\') message = \\\"Security code is missing or wrong.\\\\n\\\";\\n\".\r\n        \"ff_validationFocus(element.name);\\n\".\r\n        \"return message;\\n\";\r\n?>\r\n} // ff_securitycode_ok');
INSERT INTO `wp_facileforms_scripts` VALUES (25,1,'FF','ff_selectedValues','Get selected values as list','Get values of selected options of a select list as list:\r\n\r\nx = ff_selectedValues(\'myselectlist\');\r\n// x = green,red','Untyped','function ff_selectedValues(name)\r\n{\r\n    vals = \'\';\r\n    opts = ff_getElementByName(name).options;\r\n    for (o = 0; o < opts.length; o++)\r\n        if (opts[o].selected) {\r\n            if (vals != \'\') vals += \',\';\r\n            vals += opts[o].value;\r\n        } // if\r\n    return vals;\r\n} // ff_selectedValues');
INSERT INTO `wp_facileforms_scripts` VALUES (26,1,'FF','ff_setChecked','Set radiobutton checked','Set a radiobutton checked/unchecked','Untyped','function ff_setChecked(name, value, checked)\r\n{\r\n    if (arguments.length<3) checked = true;\r\n    for (var i = 0; i < ff_elements.length; i++)\r\n        if (ff_elements[i][2]==name) {\r\n            var e = ff_getElementByIndex(i);\r\n            if (e.value == value) {\r\n                e.checked = checked;\r\n                break;\r\n            } // if\r\n        } // if\r\n} // ff_setChecked');
INSERT INTO `wp_facileforms_scripts` VALUES (27,1,'FF','ff_setSelected','Select options of  select list','Select options in a Select List element.\r\n\r\nff_setSelected(\'mylist\', \'green\'); // select green in single or multi mode, unselect all other options\r\nff_setSelected(\'mylist\', \'red,green\'); // select red and green in multi mode, unselect all other options','Untyped','function ff_setSelected(name, list)\r\n{\r\n    ids = list.split(\',\')\r\n    opts = ff_getElementByName(name).options;\r\n    for (o = 0; o < opts.length; o++) {\r\n        state = false;\r\n        for (i = 0; i < ids.length; i++) \r\n            if (ids[i]==opts[o].value) {\r\n                state = true;\r\n                break;\r\n            } // if\r\n        opts[o].selected = state;\r\n    } // for\r\n} // ff_setSelected');
INSERT INTO `wp_facileforms_scripts` VALUES (28,1,'FF','ff_showaction','Show action','Displays the element action.','Element Action','function ff_showaction(element, action)\r\n{\r\n   alert(\'Action \'+action+\' performed by element \'+element.id);\r\n}');
INSERT INTO `wp_facileforms_scripts` VALUES (29,1,'FF','ff_showelementinit','Show element initialization','Display the element initialization (mainly for debugging)','Element Init','function ff_showelementinit(element,condition)\r\n{\r\n    if(!element.name)\r\n    	if(element.length && element.length != 0)\r\n    		alert(\'Initialization of \'+element[0].name+\' at \'+condition);\r\n    else\r\n    	alert(\'Initialization of \'+element.name+\' at \'+condition);\r\n}');
INSERT INTO `wp_facileforms_scripts` VALUES (30,1,'FF','ff_showforminit','Show form initialization','Show when form initialization is run (for debugging)','Form Init','function ff_showforminit()\r\n{\r\n    alert(\'Form initialization\');\r\n}');
INSERT INTO `wp_facileforms_scripts` VALUES (31,1,'FF','ff_showsubmitted','Show submitted status','Display submit status as user feedback.','Form Submitted','function ff_showsubmitted(status, message)\r\n{\r\n    alert(message);\r\n} // ff_showsubmitted');
INSERT INTO `wp_facileforms_scripts` VALUES (32,1,'FF','ff_showvalidation','Show element validation','Display element validation (for debugging)','Element Validation','function ff_showvalidation(element, message)\r\n{\r\n    alert(\'Validation of \'+element.name+\" with message: \\n\"+message);\r\n    return \'\';\r\n}');
INSERT INTO `wp_facileforms_scripts` VALUES (33,1,'FF','ff_submittedhome','Return to homepage','Display submit status and then return to the home page of the site.','Form Submitted','function ff_submittedhome(status, message)\r\n{\r\n    alert(message+\"\\nYou will be redirected to the home page now.\");\r\n    ff_returnHome();\r\n} // ff_submittedhome');
INSERT INTO `wp_facileforms_scripts` VALUES (34,1,'FF','ff_unchecked','Unchecked','Validate that radio button or checkbox is unchecked.','Element Validation','function ff_unchecked(element, message)\r\n{\r\n    if (!element.checked) \r\n        return \'\'; \r\n    else {\r\n        if (message==\'\') message = element.name+\" is checked.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n} // ff_unchecked');
INSERT INTO `wp_facileforms_scripts` VALUES (35,1,'FF','ff_validate_date_DDMMYYYY','Validate Date DD/MM/YYYY format','Validates that the date in a textfield is correctly formatted in DD/MM/YYYY format.\r\nCan be used with a textfield element and/or the Calendar element.','Element Validation','function ff_validate_date_DDMMYYYY(element, message)\r\n{\r\n   // Regular expression used to check if date is in correct format\r\n   var pattern = /[0-3][0-9]\\/(0|1)[0-9]\\/(19|20)[0-9]{2}/;\r\n   if(pattern.test(element.value))\r\n   {\r\n      var date_array = element.value.split(\'/\');\r\n      var day = date_array[0];\r\n\r\n      // Attention! Javascript consider months in the range 0 - 11\r\n      var month = date_array[1] - 1;\r\n      var year = date_array[2];\r\n\r\n      // This instruction will create a date object\r\n      source_date = new Date(year,month,day);\r\n\r\n      if(year != source_date.getFullYear())\r\n      {\r\n         return message == \'\' ? \'Element \' + element.name + \' failed my test\' : message;\r\n      }\r\n\r\n      if(month != source_date.getMonth())\r\n      {\r\n         return message == \'\' ? \'Element \' + element.name + \' failed my test\' : message;\r\n      }\r\n\r\n      if(day != source_date.getDate())\r\n      {\r\n         return message == \'\' ? \'Element \' + element.name + \' failed my test\' : message;\r\n      }\r\n   }\r\n   else\r\n   {\r\n      return message == \'\' ? \'Element \' + element.name + \' failed my test\' : message;\r\n   }\r\n\r\n   return \'\';\r\n}');
INSERT INTO `wp_facileforms_scripts` VALUES (36,1,'FF','ff_validate_form','Validate form','Validates the form and displays the result.','Element Action','function ff_validate_form(element, action)\r\n{\r\n    if(typeof bfUseErrorAlerts != \'undefined\'){\r\n     JQuery(\".bfErrorMessage\").html(\'\');\r\n     JQuery(\".bfErrorMessage\").css(\"display\",\"none\");\r\n    }\r\n    error = ff_validation(0);\r\n    if (error != \'\') {\r\n        if(typeof bfUseErrorAlerts == \'undefined\'){\r\n           alert(error);\r\n        } else {\r\n           bfShowErrors(error);\r\n        }\r\n        ff_validationFocus(\'\');\r\n    } else\r\n        alert(\'All inputs are valid.\');\r\n} // ff_validate_form');
INSERT INTO `wp_facileforms_scripts` VALUES (37,1,'FF','ff_validate_nextpage','Validate and next page','Validates the current page, and if everything is ok is switches to the next page.','Element Action','function ff_validate_nextpage(element, action)\r\n{\r\n    if(typeof bfUseErrorAlerts != \'undefined\'){\r\n     JQuery(\".bfErrorMessage\").html(\'\');\r\n     JQuery(\".bfErrorMessage\").css(\"display\",\"none\");\r\n    }\r\n\r\n    error = ff_validation(ff_currentpage);\r\n    if (error != \'\') {\r\n       if(typeof bfUseErrorAlerts == \'undefined\'){\r\n           alert(error);\r\n        } else {\r\n           bfShowErrors(error);\r\n        }\r\n        ff_validationFocus(\'\');\r\n    } else {\r\n        ff_switchpage(ff_currentpage+1);\r\n        self.scrollTo(0,0);   \r\n    }\r\n} // ff_validate_nextpage');
INSERT INTO `wp_facileforms_scripts` VALUES (38,1,'FF','ff_validate_page','Validate page','Validates the current page and displays the result.','Element Action','function ff_validate_page(element, action)\r\n{\r\n    if(typeof bfUseErrorAlerts != \'undefined\'){\r\n     JQuery(\".bfErrorMessage\").html(\'\');\r\n     JQuery(\".bfErrorMessage\").css(\"display\",\"none\");\r\n    }\r\n    error = ff_validation(ff_currentpage);\r\n    if (error != \'\') {\r\n        if(typeof bfUseErrorAlerts == \'undefined\'){\r\n           alert(error);\r\n        } else {\r\n           bfShowErrors(error);\r\n        }\r\n        ff_validationFocus(\'\');\r\n    } else\r\n        alert(\'All inputs are valid.\');\r\n} // ff_validate_page');
INSERT INTO `wp_facileforms_scripts` VALUES (39,1,'FF','ff_validate_prevpage','Validate previous page','Validates the current page and switches to the previous page if all is ok','Element Action','function ff_validate_prevpage(element, action)\r\n{\r\n    if(typeof bfUseErrorAlerts != \'undefined\'){\r\n     JQuery(\".bfErrorMessage\").html(\'\');\r\n     JQuery(\".bfErrorMessage\").css(\"display\",\"none\");\r\n    }\r\n\r\n    error = ff_validation(ff_currentpage);\r\n    if (error != \'\') {\r\n       if(typeof bfUseErrorAlerts == \'undefined\'){\r\n           alert(error);\r\n        } else {\r\n           bfShowErrors(error);\r\n        }\r\n        ff_validationFocus(\'\');\r\n    } else{\r\n    	if(ff_currentpage > 1){\r\n	 ff_switchpage(ff_currentpage-1);\r\n	 self.scrollTo(0,0);\r\n        }\r\n    }\r\n} // ff_validate_prevpage');
INSERT INTO `wp_facileforms_scripts` VALUES (40,1,'FF','ff_validate_submit','Validate and submit form','Validates the whole form, and if everything is ok it submits the form.','Element Action','function ff_validate_submit(element, action)\r\n{\r\n    if(typeof bfUseErrorAlerts != \'undefined\'){\r\n     JQuery(\".bfErrorMessage\").html(\'\');\r\n     JQuery(\".bfErrorMessage\").css(\"display\",\"none\");\r\n    }\r\n    error = ff_validation(0);\r\n    if (error != \'\') {\r\n\r\n        if(typeof bfUseErrorAlerts == \'undefined\'){\r\n           alert(error);\r\n        } else {\r\n           bfShowErrors(error);\r\n        }\r\n        ff_validationFocus();\r\n    } else\r\n        ff_submitForm();\r\n} // ff_validate_submit');
INSERT INTO `wp_facileforms_scripts` VALUES (41,1,'FF','ff_validemail','Valid email','Validate entry of a valid email (syntax check only)','Element Validation','function ff_validemail(element, message)\r\n{\r\n    var check =\r\n    /^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/;\r\n    if (!check.test(element.value)){\r\n        if (message==\'\') message = element.name+\" is no valid email address.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n    return \'\';\r\n} // ff_validemail');
INSERT INTO `wp_facileforms_scripts` VALUES (42,1,'FF','ff_validemail_repeat','Validate Email repeat','Checks if the field value is a valid email address and has a second counterpart that has an equal value.\r\nThe 2nd email field must be named \"FIELDNAME_repeat\"!','Element Validation','function ff_validemail_repeat(element, message)\r\n{\r\n    var check =\r\n    /^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/;\r\n    if (!check.test(element.value)){\r\n        if (message==\'\') message = element.name+\" is no valid email address.\\n\";\r\n        ff_validationFocus(element.name);\r\n        return message;\r\n    } // if\r\n	\r\n    try{\r\n	    var repeat = element.name.split(\"ff_nm_\")[1].split(\"[]\")[0];\r\n	\r\n	    if(!ff_getElementByName(repeat + \'_repeat\')){\r\n	     	if (message==\'\') message = repeat+\" has no repeat email field.\\n\";\r\n	        ff_validationFocus(element.name);\r\n	        return message;\r\n	    } else {\r\n	        if(ff_getElementByName(repeat + \'_repeat\').value != element.value){\r\n	           if (message==\'\') message = element.name+\" and \" + repeat + \"_repeat do not match.\\n\";\r\n	           ff_validationFocus(repeat + \'_repeat\');\r\n	           return message;\r\n	        }\r\n	    }\r\n    }catch(e){\r\n        return e.description;\r\n    }\r\n\r\n    return \'\';\r\n} // ff_validemail');
INSERT INTO `wp_facileforms_scripts` VALUES (43,1,'FF','ff_valuenotempty','Value not empty','Validate that value is not empty.','Element Validation','function ff_valuenotempty(element, message)\r\n{\r\n    if (element.value!=\'\') return \'\'; \r\n    if (message==\'\') message = \"Please enter \"+element.name+\".\\n\";\r\n    ff_validationFocus(element.name);\r\n    return message;\r\n} // ff_valuenotempty');
/*!40000 ALTER TABLE `wp_facileforms_scripts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_facileforms_subrecords`
--

DROP TABLE IF EXISTS `wp_facileforms_subrecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_facileforms_subrecords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record` int(11) NOT NULL DEFAULT '0',
  `element` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(255) NOT NULL DEFAULT '',
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_facileforms_subrecords`
--

LOCK TABLES `wp_facileforms_subrecords` WRITE;
/*!40000 ALTER TABLE `wp_facileforms_subrecords` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_facileforms_subrecords` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_links`
--

LOCK TABLES `wp_links` WRITE;
/*!40000 ALTER TABLE `wp_links` DISABLE KEYS */;
INSERT INTO `wp_links` VALUES (1,'http://codex.wordpress.org/','Documentation','','','','Y',1,0,'0000-00-00 00:00:00','','','');
INSERT INTO `wp_links` VALUES (2,'http://wordpress.org/news/','WordPress Blog','','','','Y',1,0,'0000-00-00 00:00:00','','','http://wordpress.org/news/feed/');
INSERT INTO `wp_links` VALUES (3,'http://wordpress.org/support/','Support Forums','','','','Y',1,0,'0000-00-00 00:00:00','','','');
INSERT INTO `wp_links` VALUES (4,'http://wordpress.org/extend/plugins/','Plugins','','','','Y',1,0,'0000-00-00 00:00:00','','','');
INSERT INTO `wp_links` VALUES (5,'http://wordpress.org/extend/themes/','Themes','','','','Y',1,0,'0000-00-00 00:00:00','','','');
INSERT INTO `wp_links` VALUES (6,'http://wordpress.org/support/forum/requests-and-feedback','Feedback','','','','Y',1,0,'0000-00-00 00:00:00','','','');
INSERT INTO `wp_links` VALUES (7,'http://planet.wordpress.org/','WordPress Planet','','','','Y',1,0,'0000-00-00 00:00:00','','','');
/*!40000 ALTER TABLE `wp_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=610 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_options`
--

LOCK TABLES `wp_options` WRITE;
/*!40000 ALTER TABLE `wp_options` DISABLE KEYS */;
INSERT INTO `wp_options` VALUES (1,'siteurl','http://meredithrt.wpengine.com','yes');
INSERT INTO `wp_options` VALUES (2,'blogname','Vagrant','yes');
INSERT INTO `wp_options` VALUES (3,'blogdescription','Just another WordPress site','yes');
INSERT INTO `wp_options` VALUES (4,'users_can_register','0','yes');
INSERT INTO `wp_options` VALUES (5,'admin_email','test@example.com','yes');
INSERT INTO `wp_options` VALUES (6,'start_of_week','1','yes');
INSERT INTO `wp_options` VALUES (7,'use_balanceTags','0','yes');
INSERT INTO `wp_options` VALUES (8,'use_smilies','1','yes');
INSERT INTO `wp_options` VALUES (9,'require_name_email','1','yes');
INSERT INTO `wp_options` VALUES (10,'comments_notify','1','yes');
INSERT INTO `wp_options` VALUES (11,'posts_per_rss','10','yes');
INSERT INTO `wp_options` VALUES (12,'rss_use_excerpt','0','yes');
INSERT INTO `wp_options` VALUES (13,'mailserver_url','mail.example.com','yes');
INSERT INTO `wp_options` VALUES (14,'mailserver_login','login@example.com','yes');
INSERT INTO `wp_options` VALUES (15,'mailserver_pass','password','yes');
INSERT INTO `wp_options` VALUES (16,'mailserver_port','110','yes');
INSERT INTO `wp_options` VALUES (17,'default_category','1','yes');
INSERT INTO `wp_options` VALUES (18,'default_comment_status','open','yes');
INSERT INTO `wp_options` VALUES (19,'default_ping_status','open','yes');
INSERT INTO `wp_options` VALUES (20,'default_pingback_flag','0','yes');
INSERT INTO `wp_options` VALUES (21,'posts_per_page','10','yes');
INSERT INTO `wp_options` VALUES (22,'date_format','F j, Y','yes');
INSERT INTO `wp_options` VALUES (23,'time_format','g:i a','yes');
INSERT INTO `wp_options` VALUES (24,'links_updated_date_format','F j, Y g:i a','yes');
INSERT INTO `wp_options` VALUES (25,'links_recently_updated_prepend','<em>','yes');
INSERT INTO `wp_options` VALUES (26,'links_recently_updated_append','</em>','yes');
INSERT INTO `wp_options` VALUES (27,'links_recently_updated_time','120','yes');
INSERT INTO `wp_options` VALUES (28,'comment_moderation','0','yes');
INSERT INTO `wp_options` VALUES (29,'moderation_notify','1','yes');
INSERT INTO `wp_options` VALUES (30,'permalink_structure','','yes');
INSERT INTO `wp_options` VALUES (31,'gzipcompression','0','yes');
INSERT INTO `wp_options` VALUES (32,'hack_file','0','yes');
INSERT INTO `wp_options` VALUES (33,'blog_charset','UTF-8','yes');
INSERT INTO `wp_options` VALUES (34,'moderation_keys','','no');
INSERT INTO `wp_options` VALUES (35,'active_plugins','a:6:{i:0;s:61:\"advanced-recent-posts-widget/advanced-recent-posts-widget.php\";i:1;s:33:\"configure-smtp/configure-smtp.php\";i:2;s:39:\"recent-posts-plus/recent-posts-plus.php\";i:3;s:41:\"simple-ads-manager/simple-ads-manager.php\";i:4;s:22:\"socialshare/plugin.php\";i:5;s:44:\"wordpress-bootstrap-css/hlt-bootstrapcss.php\";}','yes');
INSERT INTO `wp_options` VALUES (36,'home','http://meredithrt.wpengine.com','yes');
INSERT INTO `wp_options` VALUES (37,'category_base','','yes');
INSERT INTO `wp_options` VALUES (38,'ping_sites','http://rpc.pingomatic.com/','yes');
INSERT INTO `wp_options` VALUES (39,'advanced_edit','0','yes');
INSERT INTO `wp_options` VALUES (40,'comment_max_links','2','yes');
INSERT INTO `wp_options` VALUES (41,'gmt_offset','0','yes');
INSERT INTO `wp_options` VALUES (42,'default_email_category','1','yes');
INSERT INTO `wp_options` VALUES (43,'recently_edited','a:2:{i:0;s:81:\"/vagrant/wordpress/wp-content/plugins/akfeatured-post-widget/ak_featured_post.php\";i:1;s:0:\"\";}','no');
INSERT INTO `wp_options` VALUES (44,'template','mrttheme','yes');
INSERT INTO `wp_options` VALUES (45,'stylesheet','mrttheme','yes');
INSERT INTO `wp_options` VALUES (46,'comment_whitelist','1','yes');
INSERT INTO `wp_options` VALUES (47,'blacklist_keys','','no');
INSERT INTO `wp_options` VALUES (48,'comment_registration','0','yes');
INSERT INTO `wp_options` VALUES (49,'html_type','text/html','yes');
INSERT INTO `wp_options` VALUES (50,'use_trackback','0','yes');
INSERT INTO `wp_options` VALUES (51,'default_role','subscriber','yes');
INSERT INTO `wp_options` VALUES (52,'db_version','22441','yes');
INSERT INTO `wp_options` VALUES (53,'uploads_use_yearmonth_folders','','yes');
INSERT INTO `wp_options` VALUES (54,'upload_path','','yes');
INSERT INTO `wp_options` VALUES (55,'blog_public','0','yes');
INSERT INTO `wp_options` VALUES (56,'default_link_category','2','yes');
INSERT INTO `wp_options` VALUES (57,'show_on_front','posts','yes');
INSERT INTO `wp_options` VALUES (58,'tag_base','','yes');
INSERT INTO `wp_options` VALUES (59,'show_avatars','1','yes');
INSERT INTO `wp_options` VALUES (60,'avatar_rating','G','yes');
INSERT INTO `wp_options` VALUES (61,'upload_url_path','','yes');
INSERT INTO `wp_options` VALUES (62,'thumbnail_size_w','150','yes');
INSERT INTO `wp_options` VALUES (63,'thumbnail_size_h','150','yes');
INSERT INTO `wp_options` VALUES (64,'thumbnail_crop','1','yes');
INSERT INTO `wp_options` VALUES (65,'medium_size_w','300','yes');
INSERT INTO `wp_options` VALUES (66,'medium_size_h','300','yes');
INSERT INTO `wp_options` VALUES (67,'avatar_default','mystery','yes');
INSERT INTO `wp_options` VALUES (68,'large_size_w','1024','yes');
INSERT INTO `wp_options` VALUES (69,'large_size_h','1024','yes');
INSERT INTO `wp_options` VALUES (70,'image_default_link_type','','yes');
INSERT INTO `wp_options` VALUES (71,'image_default_size','','yes');
INSERT INTO `wp_options` VALUES (72,'image_default_align','','yes');
INSERT INTO `wp_options` VALUES (73,'close_comments_for_old_posts','0','yes');
INSERT INTO `wp_options` VALUES (74,'close_comments_days_old','14','yes');
INSERT INTO `wp_options` VALUES (75,'thread_comments','1','yes');
INSERT INTO `wp_options` VALUES (76,'thread_comments_depth','5','yes');
INSERT INTO `wp_options` VALUES (77,'page_comments','0','yes');
INSERT INTO `wp_options` VALUES (78,'comments_per_page','50','yes');
INSERT INTO `wp_options` VALUES (79,'default_comments_page','newest','yes');
INSERT INTO `wp_options` VALUES (80,'comment_order','asc','yes');
INSERT INTO `wp_options` VALUES (81,'sticky_posts','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (82,'widget_categories','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (83,'widget_text','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (84,'widget_rss','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (85,'uninstall_plugins','a:3:{s:36:\"async-social-sharing/admin/admin.php\";s:33:\"async_share_delete_plugin_options\";s:39:\"full-screen-popup/full-screen-popup.php\";s:11:\"fsp_destroy\";s:33:\"configure-smtp/configure-smtp.php\";a:2:{i:0;s:17:\"c2c_ConfigureSMTP\";i:1;s:9:\"uninstall\";}}','no');
INSERT INTO `wp_options` VALUES (86,'timezone_string','','yes');
INSERT INTO `wp_options` VALUES (87,'page_for_posts','0','yes');
INSERT INTO `wp_options` VALUES (88,'page_on_front','0','yes');
INSERT INTO `wp_options` VALUES (89,'default_post_format','0','yes');
INSERT INTO `wp_options` VALUES (90,'link_manager_enabled','0','yes');
INSERT INTO `wp_options` VALUES (91,'initial_db_version','22441','yes');
INSERT INTO `wp_options` VALUES (92,'wp_user_roles','a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:62:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:9:\"add_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}','yes');
INSERT INTO `wp_options` VALUES (93,'widget_search','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (94,'widget_recent-posts','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (95,'widget_recent-comments','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (96,'widget_archives','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (97,'widget_meta','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (98,'sidebars_widgets','a:9:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:1:{i:0;s:27:\"simple_ads_manager_widget-2\";}s:9:\"sidebar-2\";a:1:{i:0;s:19:\"recent-posts-plus-2\";}s:9:\"sidebar-3\";a:1:{i:0;s:23:\"advanced-recent-posts-3\";}s:9:\"sidebar-4\";a:1:{i:0;s:27:\"simple_ads_manager_widget-3\";}s:9:\"sidebar-5\";a:1:{i:0;s:27:\"simple_ads_manager_widget-4\";}s:9:\"sidebar-6\";a:0:{}s:9:\"sidebar-7\";a:1:{i:0;s:13:\"socialshare-4\";}s:13:\"array_version\";i:3;}','yes');
INSERT INTO `wp_options` VALUES (99,'cron','a:5:{i:1367972413;a:1:{s:21:\"update_network_counts\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1368001807;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1368025267;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1368029090;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}','yes');
INSERT INTO `wp_options` VALUES (100,'_transient_doing_cron','1367518314.1836490631103515625000','yes');
INSERT INTO `wp_options` VALUES (101,'_site_transient_update_core','O:8:\"stdClass\":3:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":9:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:40:\"http://wordpress.org/wordpress-3.5.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":4:{s:4:\"full\";s:40:\"http://wordpress.org/wordpress-3.5.1.zip\";s:10:\"no_content\";s:51:\"http://wordpress.org/wordpress-3.5.1-no-content.zip\";s:11:\"new_bundled\";s:52:\"http://wordpress.org/wordpress-3.5.1-new-bundled.zip\";s:7:\"partial\";b:0;}s:7:\"current\";s:5:\"3.5.1\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"3.5\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1367518315;s:15:\"version_checked\";s:5:\"3.5.1\";}','yes');
INSERT INTO `wp_options` VALUES (102,'_site_transient_update_plugins','O:8:\"stdClass\":2:{s:12:\"last_checked\";i:1367518314;s:8:\"response\";a:0:{}}','yes');
INSERT INTO `wp_options` VALUES (105,'_site_transient_update_themes','O:8:\"stdClass\":3:{s:12:\"last_checked\";i:1367518315;s:7:\"checked\";a:10:{s:13:\"art-blogazine\";s:5:\"1.0.2\";s:7:\"coaster\";s:4:\"1.62\";s:6:\"dknote\";s:3:\"1.4\";s:9:\"esplanade\";s:5:\"1.1.0\";s:8:\"mrttheme\";s:3:\"1.0\";s:6:\"origin\";s:5:\"0.5.3\";s:9:\"presswork\";s:7:\"1.0.4.2\";s:12:\"twentyeleven\";s:3:\"1.5\";s:9:\"twentyten\";s:3:\"1.5\";s:12:\"twentytwelve\";s:3:\"1.1\";}s:8:\"response\";a:0:{}}','yes');
INSERT INTO `wp_options` VALUES (106,'_site_transient_timeout_browser_81cf9356d9304bebdee60f38af12f726','1367593273','yes');
INSERT INTO `wp_options` VALUES (107,'_site_transient_browser_81cf9356d9304bebdee60f38af12f726','a:9:{s:8:\"platform\";s:5:\"Linux\";s:4:\"name\";s:7:\"Firefox\";s:7:\"version\";s:4:\"20.0\";s:10:\"update_url\";s:23:\"http://www.firefox.com/\";s:7:\"img_src\";s:50:\"http://s.wordpress.org/images/browsers/firefox.png\";s:11:\"img_src_ssl\";s:49:\"https://wordpress.org/images/browsers/firefox.png\";s:15:\"current_version\";s:2:\"16\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}','yes');
INSERT INTO `wp_options` VALUES (108,'dashboard_widget_options','a:4:{s:25:\"dashboard_recent_comments\";a:1:{s:5:\"items\";i:5;}s:24:\"dashboard_incoming_links\";a:5:{s:4:\"home\";s:30:\"http://meredithrt.wpengine.com\";s:4:\"link\";s:106:\"http://blogsearch.google.com/blogsearch?scoring=d&partner=wordpress&q=link:http://meredithrt.wpengine.com/\";s:3:\"url\";s:140:\"http://blogsearch.google.com/blogsearch_feeds?scoring=d&ie=utf-8&num=10&output=rss&partner=wordpress&q=link:http://localhost:8080/wordpress/\";s:5:\"items\";i:10;s:9:\"show_date\";b:0;}s:17:\"dashboard_primary\";a:7:{s:4:\"link\";s:26:\"http://wordpress.org/news/\";s:3:\"url\";s:31:\"http://wordpress.org/news/feed/\";s:5:\"title\";s:14:\"WordPress Blog\";s:5:\"items\";i:2;s:12:\"show_summary\";i:1;s:11:\"show_author\";i:0;s:9:\"show_date\";i:1;}s:19:\"dashboard_secondary\";a:7:{s:4:\"link\";s:28:\"http://planet.wordpress.org/\";s:3:\"url\";s:33:\"http://planet.wordpress.org/feed/\";s:5:\"title\";s:20:\"Other WordPress News\";s:5:\"items\";i:5;s:12:\"show_summary\";i:0;s:11:\"show_author\";i:0;s:9:\"show_date\";i:0;}}','yes');
INSERT INTO `wp_options` VALUES (115,'can_compress_scripts','0','yes');
INSERT INTO `wp_options` VALUES (142,'theme_mods_twentytwelve','a:8:{s:16:\"header_textcolor\";s:3:\"444\";s:16:\"background_color\";s:6:\"e6e6e6\";s:16:\"background_image\";s:0:\"\";s:17:\"background_repeat\";s:6:\"repeat\";s:21:\"background_position_x\";s:4:\"left\";s:21:\"background_attachment\";s:5:\"fixed\";s:18:\"nav_menu_locations\";a:1:{s:7:\"primary\";i:0;}s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1367444370;s:4:\"data\";a:4:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:0:{}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}}}}','yes');
INSERT INTO `wp_options` VALUES (143,'current_theme','Meredith Rebuilding Together Theme','yes');
INSERT INTO `wp_options` VALUES (144,'theme_mods_mrttheme','a:2:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:7:\"primary\";i:2;}}','yes');
INSERT INTO `wp_options` VALUES (145,'theme_switched','','yes');
INSERT INTO `wp_options` VALUES (146,'optionsframework','a:3:{s:2:\"id\";s:8:\"mrttheme\";s:12:\"knownoptions\";a:1:{i:0;s:8:\"mrttheme\";}s:7:\"version\";s:3:\"1.5\";}','yes');
INSERT INTO `wp_options` VALUES (147,'mrttheme','a:3:{s:17:\"dknote_custom_css\";s:0:\"\";s:18:\"dknote_meta_google\";s:0:\"\";s:17:\"dknote_meta_alexa\";s:0:\"\";}','yes');
INSERT INTO `wp_options` VALUES (148,'recently_activated','a:17:{s:39:\"full-screen-popup/full-screen-popup.php\";i:1367515015;s:32:\"breezing-forms/breezingforms.php\";i:1367514691;s:37:\"simple-social-bar/simplesocialbar.php\";i:1367448449;s:27:\"e-mailit/emailit_widget.php\";i:1367448144;s:57:\"custom-recent-posts-widget/custom-recent-posts-widget.php\";i:1367446157;s:37:\"simple-featured-posts-widget/sfpw.php\";i:1367446052;s:41:\"custom-ads-sidebar/custom-ads-sidebar.php\";i:1367444425;s:27:\"ads-content/ads-content.php\";i:1367444413;s:19:\"adpress/adpress.php\";i:1367444406;s:59:\"weptile-image-slider-widget/weptile-image-slider-widget.php\";i:1367435094;s:35:\"wp-social-share/wp-social-share.php\";i:1367362261;s:31:\"boggle-woggle/boggle-woggle.php\";i:1367359706;s:23:\"linkimage/linkimage.php\";i:1367359455;s:54:\"webloggerz-wp-social-media-widget/webloggerzsocial.php\";i:1367357310;s:36:\"async-social-sharing/async-share.php\";i:1367355316;s:41:\"loginradius-for-wordpress/LoginRadius.php\";i:1367343679;s:15:\"flare/flare.php\";i:1367341476;}','yes');
INSERT INTO `wp_options` VALUES (159,'hlt_bootstrapcss_option','twitter','yes');
INSERT INTO `wp_options` VALUES (160,'hlt_bootstrapcss_inc_responsive_css','Y','yes');
INSERT INTO `wp_options` VALUES (161,'hlt_bootstrapcss_customcss','N','yes');
INSERT INTO `wp_options` VALUES (162,'hlt_bootstrapcss_all_js','Y','yes');
INSERT INTO `wp_options` VALUES (163,'hlt_bootstrapcss_js_head','N','yes');
INSERT INTO `wp_options` VALUES (164,'hlt_bootstrapcss_useshortcodes','N','yes');
INSERT INTO `wp_options` VALUES (165,'hlt_bootstrapcss_use_minified_css','N','yes');
INSERT INTO `wp_options` VALUES (166,'hlt_bootstrapcss_use_compiled_css','N','yes');
INSERT INTO `wp_options` VALUES (167,'hlt_bootstrapcss_replace_jquery_cdn','N','yes');
INSERT INTO `wp_options` VALUES (168,'hlt_bootstrapcss_use_cdnjs','N','yes');
INSERT INTO `wp_options` VALUES (169,'hlt_bootstrapcss_enable_shortcodes_sidebarwidgets','N','yes');
INSERT INTO `wp_options` VALUES (170,'hlt_bootstrapcss_inc_bootstrap_css_in_editor','N','yes');
INSERT INTO `wp_options` VALUES (171,'hlt_bootstrapcss_inc_bootstrap_css_wpadmin','N','yes');
INSERT INTO `wp_options` VALUES (172,'hlt_bootstrapcss_hide_dashboard_rss_feed','N','yes');
INSERT INTO `wp_options` VALUES (173,'hlt_bootstrapcss_delete_on_deactivate','N','yes');
INSERT INTO `wp_options` VALUES (174,'hlt_bootstrapcss_prettify','N','yes');
INSERT INTO `wp_options` VALUES (221,'nav_menu_options','a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}','yes');
INSERT INTO `wp_options` VALUES (222,'widget_ts_widgets_social_icons','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (231,'ssb_version','1.2.2','yes');
INSERT INTO `wp_options` VALUES (236,'_flare--options','a:9:{s:9:\"positions\";a:3:{i:0;s:4:\"none\";i:1;s:4:\"none\";i:2;s:4:\"left\";}s:9:\"iconstyle\";s:20:\"rounded-square-bevel\";s:15:\"backgroundcolor\";s:4:\"none\";s:14:\"enablecounters\";b:1;s:11:\"enabletotal\";b:1;s:16:\"closablevertical\";b:1;s:16:\"humbleflarecount\";s:1:\"5\";s:10:\"post_types\";a:2:{i:0;s:4:\"post\";i:1;s:4:\"page\";}s:17:\"enablehumbleflare\";b:0;}','yes');
INSERT INTO `wp_options` VALUES (237,'widget_flare_widget','a:2:{i:2;a:4:{s:5:\"title\";s:4:\"Test\";s:9:\"iconstyle\";s:11:\"round-bevel\";s:8:\"iconsize\";i:24;s:11:\"iconspacing\";i:2;}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (238,'LoginRadius_settings','a:19:{s:21:\"LoginRadius_loginform\";s:1:\"1\";s:19:\"LoginRadius_regform\";s:1:\"1\";s:27:\"LoginRadius_regformPosition\";s:5:\"embed\";s:25:\"LoginRadius_commentEnable\";s:1:\"1\";s:24:\"LoginRadius_sharingTheme\";s:10:\"horizontal\";s:24:\"LoginRadius_counterTheme\";s:10:\"horizontal\";s:23:\"LoginRadius_shareEnable\";s:1:\"1\";s:25:\"LoginRadius_counterEnable\";s:1:\"1\";s:20:\"LoginRadius_sharetop\";s:1:\"1\";s:25:\"LoginRadius_counterbottom\";s:1:\"1\";s:21:\"LoginRadius_sharehome\";s:1:\"1\";s:21:\"LoginRadius_sharepost\";s:1:\"1\";s:21:\"LoginRadius_sharepage\";s:1:\"1\";s:23:\"LoginRadius_counterhome\";s:1:\"1\";s:23:\"LoginRadius_counterpost\";s:1:\"1\";s:23:\"LoginRadius_counterpage\";s:1:\"1\";s:22:\"LoginRadius_noProvider\";s:1:\"0\";s:32:\"LoginRadius_enableUserActivation\";s:1:\"1\";s:29:\"LoginRadius_defaultUserStatus\";s:1:\"1\";}','yes');
INSERT INTO `wp_options` VALUES (239,'loginradius_version','4.0','yes');
INSERT INTO `wp_options` VALUES (240,'widget_socialshare','a:4:{i:2;a:5:{s:7:\"twitter\";s:0:\"\";s:10:\"twitterurl\";s:34:\"http://www.twitter.com/#/werebuild\";s:8:\"facebook\";s:39:\"http://www.facebook.com/312321238810694\";s:11:\"google_plus\";s:0:\"\";s:9:\"pinterest\";s:0:\"\";}i:3;a:5:{s:7:\"twitter\";s:0:\"\";s:10:\"twitterurl\";s:35:\"http://www.twitter.com/#/werebuild/\";s:8:\"facebook\";s:39:\"http://www.facebook.com/312321238810694\";s:11:\"google_plus\";s:0:\"\";s:9:\"pinterest\";s:0:\"\";}i:4;a:5:{s:7:\"twitter\";s:0:\"\";s:10:\"twitterurl\";s:31:\"http://twitter.com/MeredithCorp\";s:8:\"facebook\";s:39:\"http://www.facebook.com/312321238810694\";s:11:\"google_plus\";s:31:\"http://localhost:8080/wordpress\";s:9:\"pinterest\";s:31:\"http://localhost:8080/wordpress\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (241,'fb_share_image','','yes');
INSERT INTO `wp_options` VALUES (242,'fb_type_of','website','yes');
INSERT INTO `wp_options` VALUES (243,'fb_app_id','','yes');
INSERT INTO `wp_options` VALUES (244,'fb_page_id','','yes');
INSERT INTO `wp_options` VALUES (245,'fb_admin_ids','','yes');
INSERT INTO `wp_options` VALUES (246,'fb_api_type','sh','yes');
INSERT INTO `wp_options` VALUES (247,'fb_where','manual','yes');
INSERT INTO `wp_options` VALUES (248,'fb_rss_where','before','yes');
INSERT INTO `wp_options` VALUES (249,'fb_style','float: right; margin-left: 10px;','yes');
INSERT INTO `wp_options` VALUES (250,'fb_version','button','yes');
INSERT INTO `wp_options` VALUES (251,'fb_display_page','1','yes');
INSERT INTO `wp_options` VALUES (252,'fb_display_front','1','yes');
INSERT INTO `wp_options` VALUES (253,'fb_display_rss','1','yes');
INSERT INTO `wp_options` VALUES (254,'fb_include_counter','1','yes');
INSERT INTO `wp_options` VALUES (255,'fb_count_type','box_count','yes');
INSERT INTO `wp_options` VALUES (256,'fb_share_show_send','','yes');
INSERT INTO `wp_options` VALUES (263,'wp_social_share_options','s:613:\"a:20:{s:10:\"cat_enable\";s:3:\"yes\";s:11:\"cat_twitter\";s:3:\"yes\";s:9:\"cat_gplus\";s:3:\"yes\";s:12:\"cat_facebook\";s:3:\"yes\";s:18:\"cat_facebook_share\";s:3:\"yes\";s:12:\"cat_linkedin\";s:2:\"no\";s:15:\"cat_stumbleupon\";s:2:\"no\";s:12:\"cat_diggthis\";s:2:\"no\";s:10:\"cat_reddit\";s:2:\"no\";s:12:\"cat_evernote\";s:2:\"no\";s:11:\"post_enable\";s:3:\"yes\";s:12:\"post_twitter\";s:3:\"yes\";s:10:\"post_gplus\";s:3:\"yes\";s:13:\"post_facebook\";s:3:\"yes\";s:19:\"post_facebook_share\";s:3:\"yes\";s:13:\"post_linkedin\";s:3:\"yes\";s:16:\"post_stumbleupon\";s:3:\"yes\";s:13:\"post_diggthis\";s:3:\"yes\";s:11:\"post_reddit\";s:3:\"yes\";s:13:\"post_evernote\";s:3:\"yes\";}\";','yes');
INSERT INTO `wp_options` VALUES (265,'widget_webloggerzsocial','a:2:{i:2;a:8:{s:8:\"facebook\";s:35:\"http://facebook.com/312321238810694\";s:3:\"rss\";s:12:\"web-bloggerz\";s:7:\"twitter\";s:10:\"webloggerz\";s:6:\"colbox\";s:3:\"310\";s:5:\"gplus\";s:21:\"102182186419905223120\";s:9:\"gpluspage\";s:21:\"100302322511288585262\";s:4:\"gbox\";s:3:\"300\";s:13:\"author_credit\";i:1;}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (266,'fans_count','925','yes');
INSERT INTO `wp_options` VALUES (269,'_simplesocialbar--options','a:3:{s:4:\"side\";s:4:\"left\";s:10:\"post_types\";a:3:{i:0;s:4:\"post\";i:1;s:4:\"page\";i:2;s:10:\"attachment\";}s:15:\"show_horizontal\";b:0;}','yes');
INSERT INTO `wp_options` VALUES (270,'widget_linkimage','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (271,'bw_addunit1_home','true','yes');
INSERT INTO `wp_options` VALUES (272,'bw_addunit1_page','true','yes');
INSERT INTO `wp_options` VALUES (273,'bw_addunit1_post','true','yes');
INSERT INTO `wp_options` VALUES (274,'bw_addunit1_category','true','yes');
INSERT INTO `wp_options` VALUES (275,'bw_addunit1_search','true','yes');
INSERT INTO `wp_options` VALUES (276,'bw_addunit1_archive','true','yes');
INSERT INTO `wp_options` VALUES (277,'bw_addunit1_text','','yes');
INSERT INTO `wp_options` VALUES (278,'bw_addunit1_location','0','yes');
INSERT INTO `wp_options` VALUES (279,'bw_addunit1_alignment','0','yes');
INSERT INTO `wp_options` VALUES (280,'bw_addunit2_home','true','yes');
INSERT INTO `wp_options` VALUES (281,'bw_addunit2_page','true','yes');
INSERT INTO `wp_options` VALUES (282,'bw_addunit2_post','true','yes');
INSERT INTO `wp_options` VALUES (283,'bw_addunit2_category','true','yes');
INSERT INTO `wp_options` VALUES (284,'bw_addunit2_search','true','yes');
INSERT INTO `wp_options` VALUES (285,'bw_addunit2_archive','true','yes');
INSERT INTO `wp_options` VALUES (286,'bw_addunit2_text','','yes');
INSERT INTO `wp_options` VALUES (287,'bw_addunit2_location','0','yes');
INSERT INTO `wp_options` VALUES (288,'bw_addunit2_alignment','0','yes');
INSERT INTO `wp_options` VALUES (289,'bw_addunit3_home','true','yes');
INSERT INTO `wp_options` VALUES (290,'bw_addunit3_page','true','yes');
INSERT INTO `wp_options` VALUES (291,'bw_addunit3_post','true','yes');
INSERT INTO `wp_options` VALUES (292,'bw_addunit3_category','true','yes');
INSERT INTO `wp_options` VALUES (293,'bw_addunit3_search','true','yes');
INSERT INTO `wp_options` VALUES (294,'bw_addunit3_archive','true','yes');
INSERT INTO `wp_options` VALUES (295,'bw_addunit3_text','','yes');
INSERT INTO `wp_options` VALUES (296,'bw_addunit3_location','0','yes');
INSERT INTO `wp_options` VALUES (297,'bw_addunit3_alignment','0','yes');
INSERT INTO `wp_options` VALUES (298,'bw_addunit4_home','true','yes');
INSERT INTO `wp_options` VALUES (299,'bw_addunit4_page','true','yes');
INSERT INTO `wp_options` VALUES (300,'bw_addunit4_post','true','yes');
INSERT INTO `wp_options` VALUES (301,'bw_addunit4_category','true','yes');
INSERT INTO `wp_options` VALUES (302,'bw_addunit4_search','true','yes');
INSERT INTO `wp_options` VALUES (303,'bw_addunit4_archive','true','yes');
INSERT INTO `wp_options` VALUES (304,'bw_addunit4_text','','yes');
INSERT INTO `wp_options` VALUES (305,'bw_addunit4_location','0','yes');
INSERT INTO `wp_options` VALUES (306,'bw_addunit4_alignment','0','yes');
INSERT INTO `wp_options` VALUES (307,'bw_addunit5_home','true','yes');
INSERT INTO `wp_options` VALUES (308,'bw_addunit5_page','true','yes');
INSERT INTO `wp_options` VALUES (309,'bw_addunit5_post','true','yes');
INSERT INTO `wp_options` VALUES (310,'bw_addunit5_category','true','yes');
INSERT INTO `wp_options` VALUES (311,'bw_addunit5_search','true','yes');
INSERT INTO `wp_options` VALUES (312,'bw_addunit5_archive','true','yes');
INSERT INTO `wp_options` VALUES (313,'bw_addunit5_text','','yes');
INSERT INTO `wp_options` VALUES (314,'bw_addunit5_location','0','yes');
INSERT INTO `wp_options` VALUES (315,'bw_addunit5_alignment','0','yes');
INSERT INTO `wp_options` VALUES (316,'bw_addunit6_home','true','yes');
INSERT INTO `wp_options` VALUES (317,'bw_addunit6_page','true','yes');
INSERT INTO `wp_options` VALUES (318,'bw_addunit6_post','true','yes');
INSERT INTO `wp_options` VALUES (319,'bw_addunit6_category','true','yes');
INSERT INTO `wp_options` VALUES (320,'bw_addunit6_search','true','yes');
INSERT INTO `wp_options` VALUES (321,'bw_addunit6_archive','true','yes');
INSERT INTO `wp_options` VALUES (322,'bw_addunit6_text','','yes');
INSERT INTO `wp_options` VALUES (323,'bw_addunit6_location','0','yes');
INSERT INTO `wp_options` VALUES (324,'bw_addunit6_alignment','0','yes');
INSERT INTO `wp_options` VALUES (325,'bw_addunit7_home','true','yes');
INSERT INTO `wp_options` VALUES (326,'bw_addunit7_page','true','yes');
INSERT INTO `wp_options` VALUES (327,'bw_addunit7_post','true','yes');
INSERT INTO `wp_options` VALUES (328,'bw_addunit7_category','true','yes');
INSERT INTO `wp_options` VALUES (329,'bw_addunit7_search','true','yes');
INSERT INTO `wp_options` VALUES (330,'bw_addunit7_archive','true','yes');
INSERT INTO `wp_options` VALUES (331,'bw_addunit7_text','','yes');
INSERT INTO `wp_options` VALUES (332,'bw_addunit7_location','0','yes');
INSERT INTO `wp_options` VALUES (333,'bw_addunit7_alignment','0','yes');
INSERT INTO `wp_options` VALUES (334,'bw_addunit8_home','true','yes');
INSERT INTO `wp_options` VALUES (335,'bw_addunit8_page','true','yes');
INSERT INTO `wp_options` VALUES (336,'bw_addunit8_post','true','yes');
INSERT INTO `wp_options` VALUES (337,'bw_addunit8_category','true','yes');
INSERT INTO `wp_options` VALUES (338,'bw_addunit8_search','true','yes');
INSERT INTO `wp_options` VALUES (339,'bw_addunit8_archive','true','yes');
INSERT INTO `wp_options` VALUES (340,'bw_addunit8_text','','yes');
INSERT INTO `wp_options` VALUES (341,'bw_addunit8_location','0','yes');
INSERT INTO `wp_options` VALUES (342,'bw_addunit8_alignment','0','yes');
INSERT INTO `wp_options` VALUES (343,'bw_addunit9_home','true','yes');
INSERT INTO `wp_options` VALUES (344,'bw_addunit9_page','true','yes');
INSERT INTO `wp_options` VALUES (345,'bw_addunit9_post','true','yes');
INSERT INTO `wp_options` VALUES (346,'bw_addunit9_category','true','yes');
INSERT INTO `wp_options` VALUES (347,'bw_addunit9_search','true','yes');
INSERT INTO `wp_options` VALUES (348,'bw_addunit9_archive','true','yes');
INSERT INTO `wp_options` VALUES (349,'bw_addunit9_text','','yes');
INSERT INTO `wp_options` VALUES (350,'bw_addunit9_location','0','yes');
INSERT INTO `wp_options` VALUES (351,'bw_addunit9_alignment','0','yes');
INSERT INTO `wp_options` VALUES (352,'bw_adwidget1_home','true','yes');
INSERT INTO `wp_options` VALUES (353,'bw_adwidget1_page','true','yes');
INSERT INTO `wp_options` VALUES (354,'bw_adwidget1_post','true','yes');
INSERT INTO `wp_options` VALUES (355,'bw_adwidget1_category','true','yes');
INSERT INTO `wp_options` VALUES (356,'bw_adwidget1_search','true','yes');
INSERT INTO `wp_options` VALUES (357,'bw_adwidget1_archive','true','yes');
INSERT INTO `wp_options` VALUES (358,'bw_adwidget1_text','','yes');
INSERT INTO `wp_options` VALUES (359,'bw_adwidget2_home','true','yes');
INSERT INTO `wp_options` VALUES (360,'bw_adwidget2_page','true','yes');
INSERT INTO `wp_options` VALUES (361,'bw_adwidget2_post','true','yes');
INSERT INTO `wp_options` VALUES (362,'bw_adwidget2_category','true','yes');
INSERT INTO `wp_options` VALUES (363,'bw_adwidget2_search','true','yes');
INSERT INTO `wp_options` VALUES (364,'bw_adwidget2_archive','true','yes');
INSERT INTO `wp_options` VALUES (365,'bw_adwidget2_text','','yes');
INSERT INTO `wp_options` VALUES (366,'bw_adwidget3_home','true','yes');
INSERT INTO `wp_options` VALUES (367,'bw_adwidget3_page','true','yes');
INSERT INTO `wp_options` VALUES (368,'bw_adwidget3_post','true','yes');
INSERT INTO `wp_options` VALUES (369,'bw_adwidget3_category','true','yes');
INSERT INTO `wp_options` VALUES (370,'bw_adwidget3_search','true','yes');
INSERT INTO `wp_options` VALUES (371,'bw_adwidget3_archive','true','yes');
INSERT INTO `wp_options` VALUES (372,'bw_adwidget3_text','','yes');
INSERT INTO `wp_options` VALUES (373,'bw_global_excludelist','','yes');
INSERT INTO `wp_options` VALUES (376,'widget_bogglewoggleadwidget1','a:2:{i:2;a:1:{s:5:\"title\";s:12:\"ADVERTISMENT\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (377,'widget_bogglewoggleadwidget2','a:2:{i:2;a:1:{s:5:\"title\";s:16:\"From Our Parther\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (378,'widget_bogglewoggleadwidget3','a:2:{i:2;a:1:{s:5:\"title\";s:13:\"ADVERTISEMENT\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (381,'csl-adpress-installed_base_version','0.2','yes');
INSERT INTO `wp_options` VALUES (382,'csl-adpress-notice-countdown','1367620232','yes');
INSERT INTO `wp_options` VALUES (383,'csl-adpress-license_key','','yes');
INSERT INTO `wp_options` VALUES (384,'csl-adpress-purchased','','yes');
INSERT INTO `wp_options` VALUES (385,'csl-adpress-ADPRESS-lk','','yes');
INSERT INTO `wp_options` VALUES (386,'csl-adpress-debugging','','yes');
INSERT INTO `wp_options` VALUES (387,'csl-adpress-thisbox','on','yes');
INSERT INTO `wp_options` VALUES (419,'_transient_random_seed','6085b0820b00c56365fa19671a472a3d','yes');
INSERT INTO `wp_options` VALUES (463,'widget_adscontent_widget','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (464,'adssidebar_adside_image','/wp-content/plugins/custom-ads-sidebar/image/custom-ads-sidebar.jpg','yes');
INSERT INTO `wp_options` VALUES (465,'adssidebar_adside_link','','yes');
INSERT INTO `wp_options` VALUES (466,'adssidebar_adside_width','200','yes');
INSERT INTO `wp_options` VALUES (467,'adssidebar_adside_height','100','yes');
INSERT INTO `wp_options` VALUES (506,'sam_db_version','2.1','yes');
INSERT INTO `wp_options` VALUES (507,'sam_version','1.7.57','yes');
INSERT INTO `wp_options` VALUES (508,'samPluginOptions','a:27:{s:7:\"adCycle\";i:1000;s:9:\"adDisplay\";s:5:\"blank\";s:13:\"placesPerPage\";i:10;s:12:\"itemsPerPage\";i:10;s:13:\"deleteOptions\";i:0;s:8:\"deleteDB\";i:0;s:12:\"deleteFolder\";i:0;s:10:\"beforePost\";i:0;s:7:\"bpAdsId\";i:0;s:10:\"bpUseCodes\";i:0;s:10:\"middlePost\";i:0;s:7:\"mpAdsId\";i:0;s:10:\"mpUseCodes\";i:0;s:9:\"afterPost\";i:0;s:7:\"apAdsId\";i:0;s:10:\"apUseCodes\";i:0;s:6:\"useDFP\";i:0;s:10:\"detectBots\";i:0;s:13:\"detectingMode\";s:7:\"inexact\";s:8:\"currency\";s:4:\"auto\";s:6:\"dfpPub\";s:0:\"\";s:9:\"dfpBlocks\";a:0:{}s:16:\"editorButtonMode\";s:6:\"modern\";s:6:\"useSWF\";i:0;s:6:\"access\";s:14:\"manage_options\";s:8:\"errorlog\";i:1;s:10:\"errorlogFS\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (509,'widget_recent-posts-by-tags','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (510,'widget_advanced-recent-posts','a:3:{i:2;a:15:{s:5:\"title\";s:21:\"latest from our blogs\";s:4:\"cats\";a:1:{i:0;s:1:\"3\";}s:7:\"sort_by\";s:4:\"date\";s:9:\"show_type\";s:4:\"post\";s:14:\"asc_sort_order\";s:0:\"\";s:6:\"number\";i:3;s:5:\"thumb\";s:0:\"\";s:4:\"date\";s:0:\"\";s:11:\"comment_num\";s:0:\"\";s:14:\"excerpt_length\";i:10;s:16:\"excerpt_readmore\";s:13:\"Read more →\";s:7:\"thumb_w\";i:0;s:7:\"thumb_h\";i:0;s:7:\"excerpt\";s:2:\"on\";s:8:\"readmore\";s:0:\"\";}i:3;a:15:{s:5:\"title\";s:21:\"latest from out blogs\";s:4:\"cats\";a:1:{i:0;s:1:\"3\";}s:7:\"sort_by\";s:4:\"date\";s:9:\"show_type\";s:4:\"post\";s:14:\"asc_sort_order\";s:0:\"\";s:6:\"number\";i:3;s:5:\"thumb\";s:0:\"\";s:4:\"date\";s:0:\"\";s:11:\"comment_num\";s:0:\"\";s:14:\"excerpt_length\";i:10;s:16:\"excerpt_readmore\";s:13:\"Read more →\";s:7:\"thumb_w\";i:0;s:7:\"thumb_h\";i:0;s:7:\"excerpt\";s:2:\"on\";s:8:\"readmore\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (516,'_site_transient_timeout_popular_importers_en_US','1367603864','yes');
INSERT INTO `wp_options` VALUES (517,'_site_transient_popular_importers_en_US','a:2:{s:9:\"importers\";a:8:{s:7:\"blogger\";a:4:{s:4:\"name\";s:7:\"Blogger\";s:11:\"description\";s:86:\"Install the Blogger importer to import posts, comments, and users from a Blogger blog.\";s:11:\"plugin-slug\";s:16:\"blogger-importer\";s:11:\"importer-id\";s:7:\"blogger\";}s:9:\"wpcat2tag\";a:4:{s:4:\"name\";s:29:\"Categories and Tags Converter\";s:11:\"description\";s:109:\"Install the category/tag converter to convert existing categories to tags or tags to categories, selectively.\";s:11:\"plugin-slug\";s:18:\"wpcat2tag-importer\";s:11:\"importer-id\";s:9:\"wpcat2tag\";}s:11:\"livejournal\";a:4:{s:4:\"name\";s:11:\"LiveJournal\";s:11:\"description\";s:82:\"Install the LiveJournal importer to import posts from LiveJournal using their API.\";s:11:\"plugin-slug\";s:20:\"livejournal-importer\";s:11:\"importer-id\";s:11:\"livejournal\";}s:11:\"movabletype\";a:4:{s:4:\"name\";s:24:\"Movable Type and TypePad\";s:11:\"description\";s:99:\"Install the Movable Type importer to import posts and comments from a Movable Type or TypePad blog.\";s:11:\"plugin-slug\";s:20:\"movabletype-importer\";s:11:\"importer-id\";s:2:\"mt\";}s:4:\"opml\";a:4:{s:4:\"name\";s:8:\"Blogroll\";s:11:\"description\";s:61:\"Install the blogroll importer to import links in OPML format.\";s:11:\"plugin-slug\";s:13:\"opml-importer\";s:11:\"importer-id\";s:4:\"opml\";}s:3:\"rss\";a:4:{s:4:\"name\";s:3:\"RSS\";s:11:\"description\";s:58:\"Install the RSS importer to import posts from an RSS feed.\";s:11:\"plugin-slug\";s:12:\"rss-importer\";s:11:\"importer-id\";s:3:\"rss\";}s:6:\"tumblr\";a:4:{s:4:\"name\";s:6:\"Tumblr\";s:11:\"description\";s:84:\"Install the Tumblr importer to import posts &amp; media from Tumblr using their API.\";s:11:\"plugin-slug\";s:15:\"tumblr-importer\";s:11:\"importer-id\";s:6:\"tumblr\";}s:9:\"wordpress\";a:4:{s:4:\"name\";s:9:\"WordPress\";s:11:\"description\";s:130:\"Install the WordPress importer to import posts, pages, comments, custom fields, categories, and tags from a WordPress export file.\";s:11:\"plugin-slug\";s:18:\"wordpress-importer\";s:11:\"importer-id\";s:9:\"wordpress\";}}s:10:\"translated\";b:0;}','yes');
INSERT INTO `wp_options` VALUES (524,'theme_mods_twentyeleven','a:2:{i:0;b:0;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1367444842;s:4:\"data\";a:6:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:0:{}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:9:\"sidebar-4\";N;s:9:\"sidebar-5\";N;}}}','yes');
INSERT INTO `wp_options` VALUES (527,'hlt_bootstrapcss_upgraded1to2','Y','yes');
INSERT INTO `wp_options` VALUES (528,'hlt_bootstrapcss_current_plugin_version','2.3.1-1','yes');
INSERT INTO `wp_options` VALUES (529,'hlt_bootstrapcss_feedback_admin_notice','','yes');
INSERT INTO `wp_options` VALUES (530,'hlt_bootstrapcss_includes_list','a:2:{i:0;s:118:\"http://localhost:8080/wordpress/wp-content/plugins/wordpress-bootstrap-css/resources/bootstrap-2.3.1/css/bootstrap.css\";i:1;s:129:\"http://localhost:8080/wordpress/wp-content/plugins/wordpress-bootstrap-css/resources/bootstrap-2.3.1/css/bootstrap-responsive.css\";}','yes');
INSERT INTO `wp_options` VALUES (531,'widget_sfpwidget','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (532,'widget_recent-posts-plus','a:2:{i:2;a:15:{s:5:\"title\";s:22:\"volunteer of the month\";s:5:\"count\";s:1:\"5\";s:22:\"include_post_thumbnail\";s:5:\"false\";s:20:\"include_post_excerpt\";s:4:\"true\";s:19:\"truncate_post_title\";s:2:\"35\";s:24:\"truncate_post_title_type\";s:4:\"char\";s:21:\"truncate_post_excerpt\";s:2:\"15\";s:26:\"truncate_post_excerpt_type\";s:4:\"word\";s:16:\"truncate_elipsis\";s:3:\"...\";s:20:\"post_thumbnail_width\";s:0:\"\";s:21:\"post_thumbnail_height\";s:0:\"\";s:16:\"wp_query_options\";s:38:\"{\r\n\"category_name\":\"volunter_essay\"\r\n}\";s:22:\"widget_output_template\";s:82:\"<li>{THUMBNAIL}<a title=\"{TITLE_RAW}\" href=\"{PERMALINK}\">{TITLE}</a>{EXCERPT}</li>\";s:19:\"show_expert_options\";s:4:\"true\";s:16:\"post_date_format\";s:3:\"M j\";}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (533,'widget_custom-recent-posts','a:1:{s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (534,'widget_simple_ads_manager_widget','a:4:{i:2;a:4:{s:5:\"title\";s:13:\"ADVERTISEMENT\";s:6:\"adp_id\";s:1:\"1\";s:10:\"hide_style\";b:0;s:11:\"place_codes\";b:0;}i:3;a:4:{s:5:\"title\";s:16:\"from our partner\";s:6:\"adp_id\";s:1:\"2\";s:10:\"hide_style\";b:0;s:11:\"place_codes\";b:0;}i:4;a:4:{s:5:\"title\";s:13:\"ADVERTISEMENT\";s:6:\"adp_id\";s:1:\"3\";s:10:\"hide_style\";b:0;s:11:\"place_codes\";b:0;}s:12:\"_multiwidget\";i:1;}','yes');
INSERT INTO `wp_options` VALUES (575,'_site_transient_timeout_poptags_40cd750bba9870f18aada2478b24840a','1367523232','yes');
INSERT INTO `wp_options` VALUES (576,'_site_transient_poptags_40cd750bba9870f18aada2478b24840a','a:40:{s:6:\"widget\";a:3:{s:4:\"name\";s:6:\"widget\";s:4:\"slug\";s:6:\"widget\";s:5:\"count\";s:4:\"3734\";}s:4:\"post\";a:3:{s:4:\"name\";s:4:\"Post\";s:4:\"slug\";s:4:\"post\";s:5:\"count\";s:4:\"2373\";}s:6:\"plugin\";a:3:{s:4:\"name\";s:6:\"plugin\";s:4:\"slug\";s:6:\"plugin\";s:5:\"count\";s:4:\"2244\";}s:5:\"admin\";a:3:{s:4:\"name\";s:5:\"admin\";s:4:\"slug\";s:5:\"admin\";s:5:\"count\";s:4:\"1861\";}s:5:\"posts\";a:3:{s:4:\"name\";s:5:\"posts\";s:4:\"slug\";s:5:\"posts\";s:5:\"count\";s:4:\"1786\";}s:7:\"sidebar\";a:3:{s:4:\"name\";s:7:\"sidebar\";s:4:\"slug\";s:7:\"sidebar\";s:5:\"count\";s:4:\"1551\";}s:7:\"twitter\";a:3:{s:4:\"name\";s:7:\"twitter\";s:4:\"slug\";s:7:\"twitter\";s:5:\"count\";s:4:\"1276\";}s:6:\"google\";a:3:{s:4:\"name\";s:6:\"google\";s:4:\"slug\";s:6:\"google\";s:5:\"count\";s:4:\"1269\";}s:8:\"comments\";a:3:{s:4:\"name\";s:8:\"comments\";s:4:\"slug\";s:8:\"comments\";s:5:\"count\";s:4:\"1259\";}s:6:\"images\";a:3:{s:4:\"name\";s:6:\"images\";s:4:\"slug\";s:6:\"images\";s:5:\"count\";s:4:\"1213\";}s:4:\"page\";a:3:{s:4:\"name\";s:4:\"page\";s:4:\"slug\";s:4:\"page\";s:5:\"count\";s:4:\"1179\";}s:5:\"image\";a:3:{s:4:\"name\";s:5:\"image\";s:4:\"slug\";s:5:\"image\";s:5:\"count\";s:4:\"1080\";}s:5:\"links\";a:3:{s:4:\"name\";s:5:\"links\";s:4:\"slug\";s:5:\"links\";s:5:\"count\";s:3:\"956\";}s:8:\"facebook\";a:3:{s:4:\"name\";s:8:\"Facebook\";s:4:\"slug\";s:8:\"facebook\";s:5:\"count\";s:3:\"927\";}s:3:\"seo\";a:3:{s:4:\"name\";s:3:\"seo\";s:4:\"slug\";s:3:\"seo\";s:5:\"count\";s:3:\"913\";}s:9:\"shortcode\";a:3:{s:4:\"name\";s:9:\"shortcode\";s:4:\"slug\";s:9:\"shortcode\";s:5:\"count\";s:3:\"908\";}s:9:\"wordpress\";a:3:{s:4:\"name\";s:9:\"wordpress\";s:4:\"slug\";s:9:\"wordpress\";s:5:\"count\";s:3:\"785\";}s:7:\"gallery\";a:3:{s:4:\"name\";s:7:\"gallery\";s:4:\"slug\";s:7:\"gallery\";s:5:\"count\";s:3:\"780\";}s:6:\"social\";a:3:{s:4:\"name\";s:6:\"social\";s:4:\"slug\";s:6:\"social\";s:5:\"count\";s:3:\"745\";}s:3:\"rss\";a:3:{s:4:\"name\";s:3:\"rss\";s:4:\"slug\";s:3:\"rss\";s:5:\"count\";s:3:\"700\";}s:7:\"widgets\";a:3:{s:4:\"name\";s:7:\"widgets\";s:4:\"slug\";s:7:\"widgets\";s:5:\"count\";s:3:\"661\";}s:5:\"pages\";a:3:{s:4:\"name\";s:5:\"pages\";s:4:\"slug\";s:5:\"pages\";s:5:\"count\";s:3:\"654\";}s:6:\"jquery\";a:3:{s:4:\"name\";s:6:\"jquery\";s:4:\"slug\";s:6:\"jquery\";s:5:\"count\";s:3:\"653\";}s:4:\"ajax\";a:3:{s:4:\"name\";s:4:\"AJAX\";s:4:\"slug\";s:4:\"ajax\";s:5:\"count\";s:3:\"602\";}s:5:\"email\";a:3:{s:4:\"name\";s:5:\"email\";s:4:\"slug\";s:5:\"email\";s:5:\"count\";s:3:\"593\";}s:5:\"media\";a:3:{s:4:\"name\";s:5:\"media\";s:4:\"slug\";s:5:\"media\";s:5:\"count\";s:3:\"557\";}s:10:\"javascript\";a:3:{s:4:\"name\";s:10:\"javascript\";s:4:\"slug\";s:10:\"javascript\";s:5:\"count\";s:3:\"547\";}s:5:\"video\";a:3:{s:4:\"name\";s:5:\"video\";s:4:\"slug\";s:5:\"video\";s:5:\"count\";s:3:\"542\";}s:10:\"buddypress\";a:3:{s:4:\"name\";s:10:\"buddypress\";s:4:\"slug\";s:10:\"buddypress\";s:5:\"count\";s:3:\"537\";}s:4:\"feed\";a:3:{s:4:\"name\";s:4:\"feed\";s:4:\"slug\";s:4:\"feed\";s:5:\"count\";s:3:\"517\";}s:5:\"photo\";a:3:{s:4:\"name\";s:5:\"photo\";s:4:\"slug\";s:5:\"photo\";s:5:\"count\";s:3:\"500\";}s:7:\"content\";a:3:{s:4:\"name\";s:7:\"content\";s:4:\"slug\";s:7:\"content\";s:5:\"count\";s:3:\"499\";}s:6:\"photos\";a:3:{s:4:\"name\";s:6:\"photos\";s:4:\"slug\";s:6:\"photos\";s:5:\"count\";s:3:\"483\";}s:4:\"link\";a:3:{s:4:\"name\";s:4:\"link\";s:4:\"slug\";s:4:\"link\";s:5:\"count\";s:3:\"481\";}s:5:\"stats\";a:3:{s:4:\"name\";s:5:\"stats\";s:4:\"slug\";s:5:\"stats\";s:5:\"count\";s:3:\"443\";}s:4:\"spam\";a:3:{s:4:\"name\";s:4:\"spam\";s:4:\"slug\";s:4:\"spam\";s:5:\"count\";s:3:\"435\";}s:8:\"category\";a:3:{s:4:\"name\";s:8:\"category\";s:4:\"slug\";s:8:\"category\";s:5:\"count\";s:3:\"434\";}s:5:\"login\";a:3:{s:4:\"name\";s:5:\"login\";s:4:\"slug\";s:5:\"login\";s:5:\"count\";s:3:\"422\";}s:7:\"youtube\";a:3:{s:4:\"name\";s:7:\"youtube\";s:4:\"slug\";s:7:\"youtube\";s:5:\"count\";s:3:\"418\";}s:5:\"share\";a:3:{s:4:\"name\";s:5:\"Share\";s:4:\"slug\";s:5:\"share\";s:5:\"count\";s:3:\"413\";}}','yes');
INSERT INTO `wp_options` VALUES (577,'xyz_credit_link','0','yes');
INSERT INTO `wp_options` VALUES (578,'xyz_fsp_html','Hello world.','yes');
INSERT INTO `wp_options` VALUES (579,'xyz_fsp_tinymce','1','yes');
INSERT INTO `wp_options` VALUES (580,'xyz_fsp_delay','0','yes');
INSERT INTO `wp_options` VALUES (581,'xyz_fsp_page_count','1','yes');
INSERT INTO `wp_options` VALUES (582,'xyz_fsp_mode','delay_only','yes');
INSERT INTO `wp_options` VALUES (583,'xyz_fsp_repeat_interval','1','yes');
INSERT INTO `wp_options` VALUES (584,'xyz_fsp_repeat_interval_timing','1','yes');
INSERT INTO `wp_options` VALUES (585,'xyz_fsp_z_index','100000','yes');
INSERT INTO `wp_options` VALUES (586,'xyz_fsp_corner_radius','0','yes');
INSERT INTO `wp_options` VALUES (587,'xyz_fsp_border_color','#cccccc','yes');
INSERT INTO `wp_options` VALUES (588,'xyz_fsp_bg_color','#ffffff','yes');
INSERT INTO `wp_options` VALUES (589,'xyz_fsp_title','Title','yes');
INSERT INTO `wp_options` VALUES (590,'xyz_fsp_title_color','#fcfcfa','yes');
INSERT INTO `wp_options` VALUES (591,'xyz_fsp_border_width','10','yes');
INSERT INTO `wp_options` VALUES (592,'xyz_fsp_page_option','1','yes');
INSERT INTO `wp_options` VALUES (593,'xyz_fsp_iframe','1','yes');
INSERT INTO `wp_options` VALUES (594,'xyz_fsp_free_version','1.0','yes');
INSERT INTO `wp_options` VALUES (597,'_site_transient_timeout_wporg_theme_feature_list','1367527909','yes');
INSERT INTO `wp_options` VALUES (598,'_site_transient_wporg_theme_feature_list','a:5:{s:6:\"Colors\";a:15:{i:0;s:5:\"black\";i:1;s:4:\"blue\";i:2;s:5:\"brown\";i:3;s:4:\"gray\";i:4;s:5:\"green\";i:5;s:6:\"orange\";i:6;s:4:\"pink\";i:7;s:6:\"purple\";i:8;s:3:\"red\";i:9;s:6:\"silver\";i:10;s:3:\"tan\";i:11;s:5:\"white\";i:12;s:6:\"yellow\";i:13;s:4:\"dark\";i:14;s:5:\"light\";}s:7:\"Columns\";a:6:{i:0;s:10:\"one-column\";i:1;s:11:\"two-columns\";i:2;s:13:\"three-columns\";i:3;s:12:\"four-columns\";i:4;s:12:\"left-sidebar\";i:5;s:13:\"right-sidebar\";}s:5:\"Width\";a:2:{i:0;s:11:\"fixed-width\";i:1;s:14:\"flexible-width\";}s:8:\"Features\";a:19:{i:0;s:8:\"blavatar\";i:1;s:10:\"buddypress\";i:2;s:17:\"custom-background\";i:3;s:13:\"custom-colors\";i:4;s:13:\"custom-header\";i:5;s:11:\"custom-menu\";i:6;s:12:\"editor-style\";i:7;s:21:\"featured-image-header\";i:8;s:15:\"featured-images\";i:9;s:15:\"flexible-header\";i:10;s:20:\"front-page-post-form\";i:11;s:19:\"full-width-template\";i:12;s:12:\"microformats\";i:13;s:12:\"post-formats\";i:14;s:20:\"rtl-language-support\";i:15;s:11:\"sticky-post\";i:16;s:13:\"theme-options\";i:17;s:17:\"threaded-comments\";i:18;s:17:\"translation-ready\";}s:7:\"Subject\";a:3:{i:0;s:7:\"holiday\";i:1;s:13:\"photoblogging\";i:2;s:8:\"seasonal\";}}','yes');
INSERT INTO `wp_options` VALUES (599,'bkup_c2c_configure_smtp','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (600,'c2c_configure_smtp','a:12:{s:9:\"use_gmail\";s:1:\"1\";s:4:\"host\";s:14:\"smtp.gmail.com\";s:4:\"port\";s:3:\"465\";s:11:\"smtp_secure\";s:3:\"ssl\";s:9:\"smtp_auth\";b:1;s:9:\"smtp_user\";s:19:\"nmortelli@gmail.com\";s:9:\"smtp_pass\";s:12:\"k4z3n05tigma\";s:8:\"wordwrap\";s:0:\"\";s:5:\"debug\";s:0:\"\";s:10:\"from_email\";s:0:\"\";s:9:\"from_name\";s:0:\"\";s:8:\"_version\";s:3:\"3.1\";}','yes');
INSERT INTO `wp_options` VALUES (603,'category_children','a:0:{}','yes');
INSERT INTO `wp_options` VALUES (604,'_site_transient_timeout_theme_roots','1367520114','yes');
INSERT INTO `wp_options` VALUES (605,'_site_transient_theme_roots','a:11:{s:13:\"art-blogazine\";s:7:\"/themes\";s:7:\"coaster\";s:7:\"/themes\";s:6:\"dknote\";s:7:\"/themes\";s:9:\"esplanade\";s:7:\"/themes\";s:10:\"formidable\";s:7:\"/themes\";s:8:\"mrttheme\";s:7:\"/themes\";s:6:\"origin\";s:7:\"/themes\";s:9:\"presswork\";s:7:\"/themes\";s:12:\"twentyeleven\";s:7:\"/themes\";s:9:\"twentyten\";s:7:\"/themes\";s:12:\"twentytwelve\";s:7:\"/themes\";}','yes');
INSERT INTO `wp_options` VALUES (606,'limit_login_retries','a:1:{s:12:\"67.224.70.98\";i:3;}','no');
INSERT INTO `wp_options` VALUES (607,'limit_login_retries_valid','a:1:{s:12:\"67.224.70.98\";i:1367583607;}','no');
INSERT INTO `wp_options` VALUES (608,'wpe_notices','a:2:{s:4:\"read\";s:0:\"\";s:8:\"messages\";a:0:{}}','yes');
INSERT INTO `wp_options` VALUES (609,'wpe_notices_ttl','1367967615','yes');
/*!40000 ALTER TABLE `wp_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_postmeta`
--

LOCK TABLES `wp_postmeta` WRITE;
/*!40000 ALTER TABLE `wp_postmeta` DISABLE KEYS */;
INSERT INTO `wp_postmeta` VALUES (1,2,'_wp_page_template','default');
INSERT INTO `wp_postmeta` VALUES (2,4,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (3,4,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (4,4,'_menu_item_object_id','4');
INSERT INTO `wp_postmeta` VALUES (5,4,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (6,4,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (7,4,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (8,4,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (9,4,'_menu_item_url','http://localhost:8080/wordpress/');
INSERT INTO `wp_postmeta` VALUES (20,6,'_wp_trash_meta_status','auto-draft');
INSERT INTO `wp_postmeta` VALUES (21,6,'_wp_trash_meta_time','1367337952');
INSERT INTO `wp_postmeta` VALUES (22,7,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (23,7,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (24,7,'_menu_item_object_id','7');
INSERT INTO `wp_postmeta` VALUES (25,7,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (26,7,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (27,7,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (28,7,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (29,7,'_menu_item_url','http://localhost:8080/wordpress');
INSERT INTO `wp_postmeta` VALUES (31,8,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (32,8,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (33,8,'_menu_item_object_id','8');
INSERT INTO `wp_postmeta` VALUES (34,8,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (35,8,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (36,8,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (37,8,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (38,8,'_menu_item_url','http://localhost:8080/wordpress/');
INSERT INTO `wp_postmeta` VALUES (40,9,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (41,9,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (42,9,'_menu_item_object_id','9');
INSERT INTO `wp_postmeta` VALUES (43,9,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (44,9,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (45,9,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (46,9,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (47,9,'_menu_item_url','http://rebuildingtogether.org/help/volunteer/');
INSERT INTO `wp_postmeta` VALUES (49,10,'_menu_item_type','custom');
INSERT INTO `wp_postmeta` VALUES (50,10,'_menu_item_menu_item_parent','0');
INSERT INTO `wp_postmeta` VALUES (51,10,'_menu_item_object_id','10');
INSERT INTO `wp_postmeta` VALUES (52,10,'_menu_item_object','custom');
INSERT INTO `wp_postmeta` VALUES (53,10,'_menu_item_target','');
INSERT INTO `wp_postmeta` VALUES (54,10,'_menu_item_classes','a:1:{i:0;s:0:\"\";}');
INSERT INTO `wp_postmeta` VALUES (55,10,'_menu_item_xfn','');
INSERT INTO `wp_postmeta` VALUES (56,10,'_menu_item_url','http://rebuildingtogether.org/donate');
INSERT INTO `wp_postmeta` VALUES (58,11,'_flare_color','#00aced');
INSERT INTO `wp_postmeta` VALUES (59,11,'_flare_mode','easy');
INSERT INTO `wp_postmeta` VALUES (60,11,'_flare_twitter_via','werebuild');
INSERT INTO `wp_postmeta` VALUES (61,11,'_flare_twitter_tailoring','');
INSERT INTO `wp_postmeta` VALUES (62,12,'_flare_color','#0b59aa');
INSERT INTO `wp_postmeta` VALUES (63,12,'_flare_mode','easy');
INSERT INTO `wp_postmeta` VALUES (64,12,'_flare_facebook_verb','like');
INSERT INTO `wp_postmeta` VALUES (65,13,'_flare_color','#d84d2f');
INSERT INTO `wp_postmeta` VALUES (66,13,'_flare_mode','easy');
INSERT INTO `wp_postmeta` VALUES (67,14,'_flare_color','#ce1c1e');
INSERT INTO `wp_postmeta` VALUES (68,14,'_flare_mode','easy');
INSERT INTO `wp_postmeta` VALUES (69,22,'_wp_attached_file','Ad-MediumRectangle-300x250.jpg');
INSERT INTO `wp_postmeta` VALUES (70,22,'_wp_attachment_metadata','a:4:{s:5:\"width\";i:300;s:6:\"height\";i:250;s:4:\"file\";s:30:\"Ad-MediumRectangle-300x250.jpg\";s:10:\"image_meta\";a:10:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";}}');
INSERT INTO `wp_postmeta` VALUES (71,23,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (72,23,'-destination','');
INSERT INTO `wp_postmeta` VALUES (73,23,'_edit_lock','1367361949:1');
INSERT INTO `wp_postmeta` VALUES (74,26,'_wp_attached_file','house4.jpg');
INSERT INTO `wp_postmeta` VALUES (75,26,'_wp_attachment_metadata','a:4:{s:5:\"width\";i:179;s:6:\"height\";i:240;s:4:\"file\";s:10:\"house4.jpg\";s:10:\"image_meta\";a:10:{s:8:\"aperture\";i:0;s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";i:0;s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";i:0;s:3:\"iso\";i:0;s:13:\"shutter_speed\";i:0;s:5:\"title\";s:0:\"\";}}');
INSERT INTO `wp_postmeta` VALUES (76,27,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (77,27,'_edit_lock','1367422644:1');
INSERT INTO `wp_postmeta` VALUES (79,29,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (80,29,'_edit_lock','1367422698:1');
INSERT INTO `wp_postmeta` VALUES (82,31,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (83,31,'_edit_lock','1367422731:1');
INSERT INTO `wp_postmeta` VALUES (85,33,'_edit_last','1');
INSERT INTO `wp_postmeta` VALUES (86,33,'_edit_lock','1367518239:1');
/*!40000 ALTER TABLE `wp_postmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_posts`
--

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;
INSERT INTO `wp_posts` VALUES (1,1,'2013-01-22 20:29:46','2013-01-22 20:29:46','Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!','Hello world!','','publish','open','open','','hello-world','','','2013-01-22 20:29:46','2013-01-22 20:29:46','',0,'http://localhost:8080/wordpress/?p=1',0,'post','',1);
INSERT INTO `wp_posts` VALUES (2,1,'2013-01-22 20:29:46','2013-01-22 20:29:46','This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http://localhost:8080/wordpress/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!','Sample Page','','publish','open','open','','sample-page','','','2013-01-22 20:29:46','2013-01-22 20:29:46','',0,'http://localhost:8080/wordpress/?page_id=2',0,'page','',0);
INSERT INTO `wp_posts` VALUES (4,1,'2013-04-30 16:04:44','2013-04-30 16:04:44','','Home','','publish','open','open','','home','','','2013-04-30 16:10:38','2013-04-30 16:10:38','',0,'http://localhost:8080/wordpress/?p=4',1,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (6,1,'2013-04-30 16:04:50','2013-04-30 16:04:50','','Auto Draft','','trash','open','open','','auto-draft','','','2013-04-30 16:05:52','2013-04-30 16:05:52','',0,'http://localhost:8080/wordpress/?page_id=6',0,'page','',0);
INSERT INTO `wp_posts` VALUES (7,1,'2013-04-30 16:08:19','2013-04-30 16:08:19','','The Community Projects','','publish','open','open','','the-community-projects','','','2013-04-30 16:10:38','2013-04-30 16:10:38','',0,'http://localhost:8080/wordpress/?p=7',2,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (8,1,'2013-04-30 16:10:38','2013-04-30 16:10:38','','The Home Projects','','publish','open','open','','the-home-projects','','','2013-04-30 16:10:38','2013-04-30 16:10:38','',0,'http://localhost:8080/wordpress/?p=8',3,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (9,1,'2013-04-30 16:10:38','2013-04-30 16:10:38','','Volunteer','','publish','open','open','','volunteer','','','2013-04-30 16:10:38','2013-04-30 16:10:38','',0,'http://localhost:8080/wordpress/?p=9',4,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (10,1,'2013-04-30 16:10:38','2013-04-30 16:10:38','','Donate','','publish','open','open','','donate','','','2013-04-30 16:10:38','2013-04-30 16:10:38','',0,'http://localhost:8080/wordpress/?p=10',5,'nav_menu_item','',0);
INSERT INTO `wp_posts` VALUES (11,1,'2013-04-30 17:02:08','2013-04-30 17:02:08','','twitter','','publish','closed','open','','twitter','','','2013-04-30 17:02:08','2013-04-30 17:02:08','',0,'http://localhost:8080/wordpress/?flare=twitter',2,'flare','',0);
INSERT INTO `wp_posts` VALUES (12,1,'2013-04-30 17:02:08','2013-04-30 17:02:08','','facebook','','publish','closed','open','','facebook','','','2013-04-30 17:02:08','2013-04-30 17:02:08','',0,'http://localhost:8080/wordpress/?flare=facebook',1,'flare','',0);
INSERT INTO `wp_posts` VALUES (13,1,'2013-04-30 17:02:08','2013-04-30 17:02:08','','googleplus','','publish','open','open','','googleplus','','','2013-04-30 17:02:08','2013-04-30 17:02:08','',0,'http://localhost:8080/wordpress/?flare=googleplus',3,'flare','',0);
INSERT INTO `wp_posts` VALUES (14,1,'2013-04-30 17:02:08','2013-04-30 17:02:08','','pinterest','','publish','open','open','','pinterest','','','2013-04-30 17:02:08','2013-04-30 17:02:08','',0,'http://localhost:8080/wordpress/?flare=pinterest',4,'flare','',0);
INSERT INTO `wp_posts` VALUES (15,1,'2013-04-30 21:33:16','0000-00-00 00:00:00','a:4:{s:15:\"verticaldisplay\";s:3:\"big\";s:17:\"horizontaldisplay\";s:5:\"small\";s:14:\"codesnippetbig\";s:0:\"\";s:16:\"codesnippetsmall\";s:0:\"\";}','StumbleUpon','','draft','open','open','','','','','2013-04-30 21:33:16','0000-00-00 00:00:00','',0,'http://localhost:8080/wordpress/?post_type=simplesocialbar&p=15',0,'simplesocialbar','',0);
INSERT INTO `wp_posts` VALUES (16,1,'2013-04-30 21:33:16','0000-00-00 00:00:00','a:4:{s:15:\"verticaldisplay\";s:3:\"big\";s:17:\"horizontaldisplay\";s:5:\"small\";s:14:\"codesnippetbig\";s:0:\"\";s:16:\"codesnippetsmall\";s:0:\"\";}','reddit','','draft','open','open','','','','','2013-04-30 21:33:16','0000-00-00 00:00:00','',0,'http://localhost:8080/wordpress/?post_type=simplesocialbar&p=16',0,'simplesocialbar','',0);
INSERT INTO `wp_posts` VALUES (17,1,'2013-04-30 21:33:16','0000-00-00 00:00:00','a:4:{s:15:\"verticaldisplay\";s:3:\"big\";s:17:\"horizontaldisplay\";s:5:\"small\";s:14:\"codesnippetbig\";s:0:\"\";s:16:\"codesnippetsmall\";s:0:\"\";}','Buzz','','draft','open','open','','','','','2013-04-30 21:33:16','0000-00-00 00:00:00','',0,'http://localhost:8080/wordpress/?post_type=simplesocialbar&p=17',0,'simplesocialbar','',0);
INSERT INTO `wp_posts` VALUES (18,1,'2013-04-30 21:33:16','2013-04-30 21:33:16','a:4:{s:15:\"verticaldisplay\";s:5:\"small\";s:17:\"horizontaldisplay\";s:5:\"small\";s:14:\"codesnippetbig\";s:0:\"\";s:16:\"codesnippetsmall\";s:0:\"\";}','Twitter','','publish','open','open','','twitter','','','2013-04-30 21:33:16','2013-04-30 21:33:16','',0,'http://localhost:8080/wordpress/?simplesocialbar=twitter',0,'simplesocialbar','',0);
INSERT INTO `wp_posts` VALUES (19,1,'2013-04-30 21:33:16','2013-04-30 21:33:16','a:4:{s:15:\"verticaldisplay\";s:5:\"small\";s:17:\"horizontaldisplay\";s:5:\"small\";s:14:\"codesnippetbig\";s:0:\"\";s:16:\"codesnippetsmall\";s:0:\"\";}','Facebook','','publish','open','open','','facebook','','','2013-04-30 21:33:16','2013-04-30 21:33:16','',0,'http://localhost:8080/wordpress/?simplesocialbar=facebook',0,'simplesocialbar','',0);
INSERT INTO `wp_posts` VALUES (20,1,'2013-04-30 22:31:33','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2013-04-30 22:31:33','0000-00-00 00:00:00','',0,'http://localhost:8080/wordpress/?post_type=adpress_ad&p=20',0,'adpress_ad','',0);
INSERT INTO `wp_posts` VALUES (21,1,'2013-04-30 22:37:42','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2013-04-30 22:37:42','0000-00-00 00:00:00','',0,'http://localhost:8080/wordpress/?post_type=adpress_ad&p=21',0,'adpress_ad','',0);
INSERT INTO `wp_posts` VALUES (22,1,'2013-04-30 22:43:43','2013-04-30 22:43:43','','Ad-MediumRectangle-300x250','','inherit','open','open','','ad-mediumrectangle-300x250','','','2013-04-30 22:43:43','2013-04-30 22:43:43','',0,'http://localhost:8080/wordpress/wp-content/uploads/Ad-MediumRectangle-300x250.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (23,1,'2013-04-30 22:44:40','2013-04-30 22:44:40','','ADVERTISMENT','','publish','closed','closed','','23','','','2013-04-30 22:45:57','2013-04-30 22:45:57','',0,'http://localhost:8080/wordpress/?post_type=adpress_ad&#038;p=23',0,'adpress_ad','',0);
INSERT INTO `wp_posts` VALUES (24,1,'2013-04-30 22:44:40','2013-04-30 22:44:40','','','','inherit','open','open','','23-revision','','','2013-04-30 22:44:40','2013-04-30 22:44:40','',23,'http://localhost:8080/wordpress/?p=24',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (25,1,'2013-04-30 22:44:57','2013-04-30 22:44:57','','ADVERTISMENT','','inherit','open','open','','23-revision-2','','','2013-04-30 22:44:57','2013-04-30 22:44:57','',23,'http://localhost:8080/wordpress/?p=25',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (26,1,'2013-04-30 22:46:38','2013-04-30 22:46:38','','house4','','inherit','open','open','','house4','','','2013-04-30 22:46:38','2013-04-30 22:46:38','',23,'http://localhost:8080/wordpress/wp-content/uploads/house4.jpg',0,'attachment','image/jpeg',0);
INSERT INTO `wp_posts` VALUES (27,1,'2013-05-01 15:39:13','2013-05-01 15:39:13','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget justo vel eros consequat porttitor sed posuere magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.','Lorem Ipsum Dolor Sit Amet','','publish','open','open','','lorem-ipsum-dolor-sit-amet','','','2013-05-01 15:39:13','2013-05-01 15:39:13','',0,'http://localhost:8080/wordpress/?p=27',0,'post','',0);
INSERT INTO `wp_posts` VALUES (28,1,'2013-05-01 15:38:38','2013-05-01 15:38:38','','Lorem Ipsum','','inherit','open','open','','27-revision','','','2013-05-01 15:38:38','2013-05-01 15:38:38','',27,'http://localhost:8080/wordpress/?p=28',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (29,1,'2013-05-01 15:40:07','2013-05-01 15:40:07','Etiam vitae velit et lacus tincidunt molestie ac quis urna. Donec eget nunc sapien, a dictum justo. Maecenas facilisis dictum diam, at pretium neque interdum eget. Donec a consequat dolor. Fusce hendrerit ante faucibus tortor vehicula laoreet. Sed dapibus iaculis ante quis scelerisque.','Consectetur Adipiscing Elit','','publish','open','open','','consectetur-adipiscing-elit','','','2013-05-01 15:40:07','2013-05-01 15:40:07','',0,'http://localhost:8080/wordpress/?p=29',0,'post','',0);
INSERT INTO `wp_posts` VALUES (30,1,'2013-05-01 15:39:35','2013-05-01 15:39:35','','Consectetur Adipiscing Elit','','inherit','open','open','','29-revision','','','2013-05-01 15:39:35','2013-05-01 15:39:35','',29,'http://localhost:8080/wordpress/?p=30',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (31,1,'2013-05-01 15:40:42','2013-05-01 15:40:42','Vestibulum sed quam nisl, vel vestibulum enim. Nam ut mi ac purus fringilla volutpat. Donec scelerisque vulputate est, a semper ligula tempus quis. Cras congue sodales ante, eget dapibus leo hendrerit non. Proin bibendum tristique pretium. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et orci neque. Nam in purus sed libero mollis vestibulum feugiat sed quam. Maecenas ornare rhoncus sapien eget cursus. Phasellus vel dui non libero hendrerit lacinia. Vivamus luctus eleifend leo ut aliquam. Praesent nunc lectus, rhoncus sed placerat sit amet, egestas ac nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.','Phasellus Quis Lectus Metus','','publish','open','open','','phasellus-quis-lectus-metus','','','2013-05-01 15:40:42','2013-05-01 15:40:42','',0,'http://localhost:8080/wordpress/?p=31',0,'post','',0);
INSERT INTO `wp_posts` VALUES (32,1,'2013-05-01 15:40:32','2013-05-01 15:40:32','','Phasellus Quis Lectus Metus','','inherit','open','open','','31-revision','','','2013-05-01 15:40:32','2013-05-01 15:40:32','',31,'http://localhost:8080/wordpress/?p=32',0,'revision','',0);
INSERT INTO `wp_posts` VALUES (33,1,'2013-05-02 18:01:19','0000-00-00 00:00:00','','Stephanie Smith','','draft','open','open','','','','','2013-05-02 18:01:19','2013-05-02 18:01:19','',0,'http://localhost:8080/wordpress/?p=33',0,'post','',0);
INSERT INTO `wp_posts` VALUES (34,1,'2013-05-06 14:46:09','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2013-05-06 14:46:09','0000-00-00 00:00:00','',0,'http://meredithrt.wpengine.com/?p=34',0,'post','',0);
/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_registration_log`
--

DROP TABLE IF EXISTS `wp_registration_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_registration_log` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `IP` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blog_id` bigint(20) NOT NULL DEFAULT '0',
  `date_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`),
  KEY `IP` (`IP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_registration_log`
--

LOCK TABLES `wp_registration_log` WRITE;
/*!40000 ALTER TABLE `wp_registration_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_registration_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_sam_ads`
--

DROP TABLE IF EXISTS `wp_sam_ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_sam_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `code_type` tinyint(1) NOT NULL DEFAULT '0',
  `code_mode` tinyint(1) NOT NULL DEFAULT '1',
  `ad_code` text,
  `ad_img` text,
  `ad_alt` text,
  `ad_title` varchar(255) DEFAULT NULL,
  `ad_no` tinyint(1) NOT NULL DEFAULT '0',
  `ad_target` text,
  `ad_swf` tinyint(1) DEFAULT '0',
  `ad_swf_flashvars` text,
  `ad_swf_params` text,
  `ad_swf_attributes` text,
  `count_clicks` tinyint(1) NOT NULL DEFAULT '0',
  `ad_users` tinyint(1) DEFAULT '0',
  `ad_users_unreg` tinyint(1) DEFAULT '0',
  `ad_users_reg` tinyint(1) DEFAULT '0',
  `x_ad_users` tinyint(1) DEFAULT NULL,
  `x_view_users` varchar(255) DEFAULT NULL,
  `ad_users_adv` tinyint(1) DEFAULT '0',
  `view_type` int(11) DEFAULT '1',
  `view_pages` set('isHome','isSingular','isSingle','isPage','isAttachment','isSearch','is404','isArchive','isTax','isCategory','isTag','isAuthor','isDate') DEFAULT NULL,
  `view_id` varchar(255) DEFAULT NULL,
  `ad_cats` tinyint(1) DEFAULT '0',
  `view_cats` varchar(255) DEFAULT NULL,
  `ad_authors` tinyint(1) DEFAULT '0',
  `view_authors` varchar(255) DEFAULT NULL,
  `ad_tags` tinyint(1) DEFAULT '0',
  `view_tags` varchar(255) DEFAULT NULL,
  `ad_custom` tinyint(1) DEFAULT '0',
  `view_custom` varchar(255) DEFAULT NULL,
  `x_id` tinyint(1) DEFAULT '0',
  `x_view_id` varchar(255) DEFAULT NULL,
  `x_cats` tinyint(1) DEFAULT '0',
  `x_view_cats` varchar(255) DEFAULT NULL,
  `x_authors` tinyint(1) DEFAULT '0',
  `x_view_authors` varchar(255) DEFAULT NULL,
  `x_tags` tinyint(1) DEFAULT '0',
  `x_view_tags` varchar(255) DEFAULT NULL,
  `x_custom` tinyint(1) DEFAULT '0',
  `x_view_custom` varchar(255) DEFAULT NULL,
  `ad_schedule` tinyint(1) DEFAULT '0',
  `ad_start_date` date DEFAULT NULL,
  `ad_end_date` date DEFAULT NULL,
  `limit_hits` tinyint(1) DEFAULT '0',
  `hits_limit` int(11) DEFAULT '0',
  `limit_clicks` tinyint(1) DEFAULT '0',
  `clicks_limit` int(11) DEFAULT '0',
  `ad_hits` int(11) DEFAULT '0',
  `ad_clicks` int(11) DEFAULT '0',
  `ad_weight` int(11) DEFAULT '10',
  `ad_weight_hits` int(11) DEFAULT '0',
  `adv_nick` varchar(50) DEFAULT NULL,
  `adv_name` varchar(100) DEFAULT NULL,
  `adv_mail` varchar(50) DEFAULT NULL,
  `cpm` decimal(10,2) unsigned DEFAULT '0.00',
  `cpc` decimal(10,2) unsigned DEFAULT '0.00',
  `per_month` decimal(10,2) unsigned DEFAULT '0.00',
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_sam_ads`
--

LOCK TABLES `wp_sam_ads` WRITE;
/*!40000 ALTER TABLE `wp_sam_ads` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_sam_ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_sam_blocks`
--

DROP TABLE IF EXISTS `wp_sam_blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_sam_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `b_lines` int(11) DEFAULT '2',
  `b_cols` int(11) DEFAULT '2',
  `block_data` longtext,
  `b_margin` varchar(30) DEFAULT '5px 5px 5px 5px',
  `b_padding` varchar(30) DEFAULT '5px 5px 5px 5px',
  `b_background` varchar(30) DEFAULT '#FFFFFF',
  `b_border` varchar(30) DEFAULT '0px solid #333333',
  `i_margin` varchar(30) DEFAULT '5px 5px 5px 5px',
  `i_padding` varchar(30) DEFAULT '5px 5px 5px 5px',
  `i_background` varchar(30) DEFAULT '#FFFFFF',
  `i_border` varchar(30) DEFAULT '0px solid #333333',
  `trash` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_sam_blocks`
--

LOCK TABLES `wp_sam_blocks` WRITE;
/*!40000 ALTER TABLE `wp_sam_blocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_sam_blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_sam_errors`
--

DROP TABLE IF EXISTS `wp_sam_errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_sam_errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `error_date` datetime DEFAULT NULL,
  `table_name` varchar(30) DEFAULT NULL,
  `error_type` int(11) NOT NULL DEFAULT '0',
  `error_msg` varchar(255) DEFAULT NULL,
  `error_sql` text,
  `resolved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_sam_errors`
--

LOCK TABLES `wp_sam_errors` WRITE;
/*!40000 ALTER TABLE `wp_sam_errors` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_sam_errors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_sam_places`
--

DROP TABLE IF EXISTS `wp_sam_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_sam_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `code_before` varchar(255) DEFAULT NULL,
  `code_after` varchar(255) DEFAULT NULL,
  `place_size` varchar(25) DEFAULT NULL,
  `place_custom_width` int(11) DEFAULT NULL,
  `place_custom_height` int(11) DEFAULT NULL,
  `patch_img` varchar(255) DEFAULT NULL,
  `patch_link` varchar(255) DEFAULT NULL,
  `patch_code` text,
  `patch_adserver` tinyint(1) DEFAULT '0',
  `patch_dfp` varchar(255) DEFAULT NULL,
  `patch_source` tinyint(1) DEFAULT '0',
  `patch_hits` int(11) DEFAULT '0',
  `trash` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_sam_places`
--

LOCK TABLES `wp_sam_places` WRITE;
/*!40000 ALTER TABLE `wp_sam_places` DISABLE KEYS */;
INSERT INTO `wp_sam_places` VALUES (1,'','300 x 250 DART ad for Sidebar1','','','300x250',0,0,'http://localhost:8080/wordpress/wp-content/plugins/sam-images/300x250.png','http://www.meredith.com/','',0,'',0,21,0);
INSERT INTO `wp_sam_places` VALUES (2,'','Rebuilding Promotional ad static image in sidebar4','','','custom',300,160,'http://localhost:8080/wordpress/wp-content/plugins/sam-images/300x160.png','http://www.rebuildingtogether.org/','',0,'',0,21,0);
INSERT INTO `wp_sam_places` VALUES (3,'','DART ad Unit 300 x 600 tower ad. place in sidebar5','','','custom',300,600,'http://localhost:8080/wordpress/wp-content/plugins/sam-images/300x600.png','http://www.meredith.com/','',0,'',0,21,0);
/*!40000 ALTER TABLE `wp_sam_places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_sam_zones`
--

DROP TABLE IF EXISTS `wp_sam_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_sam_zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `z_default` int(11) DEFAULT '0',
  `z_home` int(11) DEFAULT '0',
  `z_singular` int(11) DEFAULT '0',
  `z_single` int(11) DEFAULT '0',
  `z_ct` int(11) DEFAULT '0',
  `z_single_ct` longtext,
  `z_page` int(11) DEFAULT '0',
  `z_attachment` int(11) DEFAULT '0',
  `z_search` int(11) DEFAULT '0',
  `z_404` int(11) DEFAULT '0',
  `z_archive` int(11) DEFAULT '0',
  `z_tax` int(11) DEFAULT '0',
  `z_category` int(11) DEFAULT '0',
  `z_cats` longtext,
  `z_tag` int(11) DEFAULT '0',
  `z_author` int(11) DEFAULT '0',
  `z_authors` longtext,
  `z_date` int(11) DEFAULT '0',
  `z_cts` int(11) DEFAULT '0',
  `z_archive_ct` longtext,
  `trash` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_sam_zones`
--

LOCK TABLES `wp_sam_zones` WRITE;
/*!40000 ALTER TABLE `wp_sam_zones` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_sam_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_signups`
--

DROP TABLE IF EXISTS `wp_signups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_signups` (
  `domain` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_login` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `meta` longtext COLLATE utf8_unicode_ci,
  KEY `activation_key` (`activation_key`),
  KEY `domain` (`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_signups`
--

LOCK TABLES `wp_signups` WRITE;
/*!40000 ALTER TABLE `wp_signups` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_signups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_site`
--

DROP TABLE IF EXISTS `wp_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_site` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `domain` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `domain` (`domain`,`path`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_site`
--

LOCK TABLES `wp_site` WRITE;
/*!40000 ALTER TABLE `wp_site` DISABLE KEYS */;
INSERT INTO `wp_site` VALUES (1,'meredithrt.wpengine.com','/');
/*!40000 ALTER TABLE `wp_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_sitemeta`
--

DROP TABLE IF EXISTS `wp_sitemeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_sitemeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `site_id` bigint(20) NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `meta_key` (`meta_key`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_sitemeta`
--

LOCK TABLES `wp_sitemeta` WRITE;
/*!40000 ALTER TABLE `wp_sitemeta` DISABLE KEYS */;
INSERT INTO `wp_sitemeta` VALUES (1,1,'site_name','Your SUPER-powered WP Engine Multisite Install');
INSERT INTO `wp_sitemeta` VALUES (2,1,'admin_email','wpengine@sourceallies.com');
INSERT INTO `wp_sitemeta` VALUES (3,1,'admin_user_id','');
INSERT INTO `wp_sitemeta` VALUES (4,1,'registration','none');
INSERT INTO `wp_sitemeta` VALUES (5,1,'upload_filetypes','jpg jpeg png gif mp3 mov avi wmv midi mid pdf');
INSERT INTO `wp_sitemeta` VALUES (6,1,'blog_upload_space','100');
INSERT INTO `wp_sitemeta` VALUES (7,1,'fileupload_maxk','1500');
INSERT INTO `wp_sitemeta` VALUES (8,1,'site_admins','a:2:{i:0;s:8:\"wpengine\";i:1;s:10:\"meredithrt\";}');
INSERT INTO `wp_sitemeta` VALUES (9,1,'allowedthemes','a:2:{s:12:\"twentyeleven\";b:1;s:12:\"twentytwelve\";b:1;}');
INSERT INTO `wp_sitemeta` VALUES (10,1,'illegal_names','a:9:{i:0;s:3:\"www\";i:1;s:3:\"web\";i:2;s:4:\"root\";i:3;s:5:\"admin\";i:4;s:4:\"main\";i:5;s:6:\"invite\";i:6;s:13:\"administrator\";i:7;s:5:\"files\";i:8;s:4:\"blog\";}');
INSERT INTO `wp_sitemeta` VALUES (11,1,'wpmu_upgrade_site','22441');
INSERT INTO `wp_sitemeta` VALUES (12,1,'welcome_email','Dear User,\n\nYour new SITE_NAME site has been successfully set up at:\nBLOG_URL\n\nYou can log in to the administrator account with the following information:\nUsername: USERNAME\nPassword: PASSWORD\nLog in here: BLOG_URLwp-login.php\n\nWe hope you enjoy your new site. Thanks!\n\n--The Team @ SITE_NAME');
INSERT INTO `wp_sitemeta` VALUES (13,1,'first_post','Welcome to <a href=\"SITE_URL\">SITE_NAME</a>. This is your first post. Edit or delete it, then start blogging!');
INSERT INTO `wp_sitemeta` VALUES (14,1,'siteurl','http://meredithrt.wpengine.com');
INSERT INTO `wp_sitemeta` VALUES (15,1,'add_new_users','0');
INSERT INTO `wp_sitemeta` VALUES (16,1,'upload_space_check_disabled','1');
INSERT INTO `wp_sitemeta` VALUES (17,1,'subdomain_install','0');
INSERT INTO `wp_sitemeta` VALUES (18,1,'global_terms_enabled','0');
INSERT INTO `wp_sitemeta` VALUES (19,1,'ms_files_rewriting','0');
INSERT INTO `wp_sitemeta` VALUES (20,1,'initial_db_version','20596');
INSERT INTO `wp_sitemeta` VALUES (21,1,'active_sitewide_plugins','a:0:{}');
INSERT INTO `wp_sitemeta` VALUES (22,1,'WPLANG','en_US');
INSERT INTO `wp_sitemeta` VALUES (23,1,'blog_count','1');
INSERT INTO `wp_sitemeta` VALUES (24,1,'user_count','');
INSERT INTO `wp_sitemeta` VALUES (25,1,'can_compress_scripts','0');
INSERT INTO `wp_sitemeta` VALUES (26,1,'wpe_upload_space_usage','a:2:{i:1;a:2:{s:6:\"kbytes\";s:1:\"0\";s:4:\"type\";s:10:\"production\";}i:0;a:2:{s:6:\"kbytes\";s:5:\"87980\";s:4:\"type\";s:10:\"production\";}}');
INSERT INTO `wp_sitemeta` VALUES (27,1,'wpe_upload_space_usage_ttl','1368318914');
/*!40000 ALTER TABLE `wp_sitemeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_relationships`
--

LOCK TABLES `wp_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_term_relationships` DISABLE KEYS */;
INSERT INTO `wp_term_relationships` VALUES (1,1,0);
INSERT INTO `wp_term_relationships` VALUES (4,2,0);
INSERT INTO `wp_term_relationships` VALUES (7,2,0);
INSERT INTO `wp_term_relationships` VALUES (8,2,0);
INSERT INTO `wp_term_relationships` VALUES (9,2,0);
INSERT INTO `wp_term_relationships` VALUES (10,2,0);
INSERT INTO `wp_term_relationships` VALUES (27,3,0);
INSERT INTO `wp_term_relationships` VALUES (29,3,0);
INSERT INTO `wp_term_relationships` VALUES (31,3,0);
INSERT INTO `wp_term_relationships` VALUES (33,1,0);
/*!40000 ALTER TABLE `wp_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (1,1,'category','',0,1);
INSERT INTO `wp_term_taxonomy` VALUES (2,2,'nav_menu','',0,5);
INSERT INTO `wp_term_taxonomy` VALUES (3,3,'category','All post meant for the \"Latest From Our Blogs\" section in the sidebar are part of this categoryt',0,3);
INSERT INTO `wp_term_taxonomy` VALUES (4,4,'category','post for the text and image of the volunteer of the month section',0,0);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Uncategorized','uncategorized',0);
INSERT INTO `wp_terms` VALUES (2,'MRT','mrt',0);
INSERT INTO `wp_terms` VALUES (3,'LatestBlog','latestblog',0);
INSERT INTO `wp_terms` VALUES (4,'volunteer_essay','volunteer-essay',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'first_name','');
INSERT INTO `wp_usermeta` VALUES (2,1,'last_name','');
INSERT INTO `wp_usermeta` VALUES (3,1,'nickname','admin');
INSERT INTO `wp_usermeta` VALUES (4,1,'description','');
INSERT INTO `wp_usermeta` VALUES (5,1,'rich_editing','true');
INSERT INTO `wp_usermeta` VALUES (6,1,'comment_shortcuts','false');
INSERT INTO `wp_usermeta` VALUES (7,1,'admin_color','fresh');
INSERT INTO `wp_usermeta` VALUES (8,1,'use_ssl','0');
INSERT INTO `wp_usermeta` VALUES (9,1,'show_admin_bar_front','true');
INSERT INTO `wp_usermeta` VALUES (10,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}');
INSERT INTO `wp_usermeta` VALUES (11,1,'wp_user_level','10');
INSERT INTO `wp_usermeta` VALUES (12,1,'dismissed_wp_pointers','wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link,wp350_media');
INSERT INTO `wp_usermeta` VALUES (13,1,'show_welcome_panel','1');
INSERT INTO `wp_usermeta` VALUES (14,1,'wp_user-settings','libraryContent=browse&editor=tinymce&uploader=1');
INSERT INTO `wp_usermeta` VALUES (15,1,'wp_user-settings-time','1367435690');
INSERT INTO `wp_usermeta` VALUES (16,1,'wp_dashboard_quick_press_last_post_id','34');
INSERT INTO `wp_usermeta` VALUES (17,1,'managenav-menuscolumnshidden','a:4:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}');
INSERT INTO `wp_usermeta` VALUES (18,1,'metaboxhidden_nav-menus','a:2:{i:0;s:8:\"add-post\";i:1;s:12:\"add-post_tag\";}');
INSERT INTO `wp_usermeta` VALUES (19,1,'closedpostboxes_nav-menus','a:0:{}');
INSERT INTO `wp_usermeta` VALUES (20,1,'hlt_bootstrapcss_current_version','2.3.1-1');
INSERT INTO `wp_usermeta` VALUES (21,1,'nav_menu_recently_edited','2');
INSERT INTO `wp_usermeta` VALUES (22,1,'meta-box-order_adpress_ad','a:3:{s:4:\"side\";s:9:\"submitdiv\";s:6:\"normal\";s:56:\"postimagediv,render_content_area_ui,slugdiv,revisionsdiv\";s:8:\"advanced\";s:0:\"\";}');
INSERT INTO `wp_usermeta` VALUES (23,1,'screen_layout_adpress_ad','2');
INSERT INTO `wp_usermeta` VALUES (24,1,'closedpostboxes_adpress_ad','a:1:{i:0;s:12:\"postimagediv\";}');
INSERT INTO `wp_usermeta` VALUES (25,1,'metaboxhidden_adpress_ad','a:1:{i:0;s:7:\"slugdiv\";}');
INSERT INTO `wp_usermeta` VALUES (26,1,'primary_blog','1');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_users`
--

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'admin','$P$BlzvV.y1dqrovRnpBz6Z1se2sopD5a0','admin','test@example.com','','2013-01-22 20:29:46','',0,'admin');
/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-08  5:23:13
