-- MySQL dump 10.16  Distrib 10.1.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: yii2advanced
-- ------------------------------------------------------
-- Server version	10.1.48-MariaDB-0+deb9u2

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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Meetings','64a7c8b5b749b.jpg'),(2,'Trade Shows','64a7c8c2c9a95.jpg'),(3,'Opening Ceremonies','64a7c8cfdb263.jpg'),(4,'Incentive Travels','64a7c8dd142f7.jpg'),(5,'Product Launches','64a7c8ea43631.jpg'),(6,'Trade Faires','64a7c8f754b9b.jpg'),(7,'Conferences','64a7c9048c94b.jpg'),(8,'Seminars','64a7c911b2886.jpg');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra_item`
--

DROP TABLE IF EXISTS `extra_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_item`
--

LOCK TABLES `extra_item` WRITE;
/*!40000 ALTER TABLE `extra_item` DISABLE KEYS */;
INSERT INTO `extra_item` VALUES (1,'Candle',45.00,'64a7c45237831.jpg','Et debitis magni ut commodi magni quibusdam nesciunt. Et aspernatur omnis veniam quibusdam veritatis temporibus rerum. Esse voluptatem dolore eveniet. Ratione et sit voluptatem atque quam. Cum sed laborum magni. Est iusto non eius sint. Est magnam eveniet eum sit. Veritatis nam aliquam assumenda.'),(2,'Foliage',35.00,'64a7c462164ee.jpg','Fuga quia rerum voluptatem inventore. Modi placeat laudantium dicta facere. Iure nesciunt cumque et iure pariatur animi est. Provident omnis quaerat at. Et aut nihil molestias perferendis. Omnis dolorem qui et laboriosam eligendi facilis. Dolorum voluptas est molestiae numquam. Ex molestiae similique beatae exercitationem provident. Unde doloremque eligendi ea quod vitae porro aut.'),(3,'Microphone',26.00,'64a7c471d15b0.jpg','Porro ad tenetur quis adipisci quos. Cum officiis ab dolor sed deleniti ut dolorem. Numquam dolorem rerum odit dolores sunt. Dolore eum non minima. Autem quaerat exercitationem ipsa. Deserunt et atque distinctio excepturi omnis molestias.'),(4,'Podium',27.00,'64a7c4819dc57.jpg','Et et repudiandae dolores minus pariatur odit quia. Optio rerum dignissimos officiis unde nulla accusantium illum. Id nulla et et quos. Sapiente at rem sequi provident repellendus. Dolore nihil voluptas iste quo neque placeat. Tenetur quae rem impedit itaque similique ut.'),(5,'Projector',40.00,'64a7c491849e0.jpg','Modi consequatur minus tempore excepturi voluptate suscipit nam. Quo praesentium reprehenderit earum dolor. Sed nam vel delectus commodi voluptatem. Earum quas vel quis cupiditate. Dolorem dolore non alias odit aliquid ut distinctio. Rerum et rerum ut est velit. Quasi et enim modi enim dolor voluptatum impedit.'),(6,'Remote Slide',21.00,'64a7c4a16af32.jpg','Harum ratione illo consequatur. Veritatis sunt error placeat quo temporibus expedita quia odit. Aut beatae ea ab similique libero enim asperiores. Adipisci ut veritatis et illo neque. Adipisci et repellendus libero ipsam in.'),(7,'Screen Projector',26.00,'64a7c4b119367.jpg','Quae consequuntur fugiat dolores similique ut et minima. Repudiandae maxime modi nisi suscipit modi blanditiis. Nam eius aspernatur laboriosam perspiciatis. Earum ad sit recusandae ut numquam. Sed consequuntur aperiam aut nihil. Odit omnis mollitia odit voluptatem hic nihil mollitia.'),(8,'Speaker',22.00,'64a7c4c0cda6f.jpg','Est fugiat cum modi cupiditate aut minima vero. Molestiae distinctio fuga consequuntur iusto possimus magnam maiores. Est ducimus accusamus ut. Suscipit rerum ea culpa. Dolorem rerum velit et porro. Occaecati ab odit explicabo nisi. Sunt ab quis nisi vitae. Sit repellendus exercitationem ex non quis est.');
/*!40000 ALTER TABLE `extra_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1684651602),('m130524_201442_init',1684651608),('m190124_110200_add_verification_token_column_to_user_table',1684651608),('m230521_065431_create_post_table',1684653414),('m230606_113739_create_text_block_table',1686051530),('m230606_141916_add_data_text_block_table',1686062717),('m230620_191759_add_column_to_user_table',1687290362),('m230706_100106_create_event_table',1688637766),('m230706_134843_create_extra_item_table',1688651413),('m230707_084133_create_table_table',1688719380),('m230707_095235_create_order_table',1688723698),('m230707_095248_create_order_item_table',1688723699),('m230717_104315_add_is_admin_column_to_user_table',1689590691);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NOT NULL,
  `event_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-order-event_id` (`event_id`),
  KEY `fk-order-customer_id` (`customer_id`),
  CONSTRAINT `fk-order-customer_id` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk-order-event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (23,1,2,1,'2023-07-27','YES','2023-07-13 13:17:33','2023-07-13 20:17:49'),(24,1,7,1,'2023-07-31','02031955','2023-07-13 13:20:19','2023-07-13 19:58:59'),(25,1,8,1,'2023-07-28','64B0650E0600D-64B0650E06016','2023-07-13 16:12:42','2023-07-13 20:56:49'),(26,0,2,1,'2024-01-10',NULL,'2023-07-14 06:03:46','2023-07-14 06:03:46'),(27,0,1,1,'2023-08-17',NULL,'2023-07-14 12:59:05','2023-07-14 12:59:05'),(28,0,1,1,'2023-07-31',NULL,'2023-07-14 13:42:06','2023-07-14 13:42:06'),(29,0,5,1,'2023-09-28',NULL,'2023-07-14 13:43:05','2023-07-14 13:43:05'),(30,1,4,1,'2023-07-31','GEKA1984','2023-07-14 13:46:43','2023-07-14 13:47:24'),(31,0,3,1,'2023-08-15','GEKA','2023-07-15 05:53:07','2023-07-16 10:34:48');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `extra_item_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-order_item-order_id` (`order_id`),
  KEY `fk-order_item-extra_item_id` (`extra_item_id`),
  KEY `fk-order_item-table_id` (`table_id`),
  CONSTRAINT `fk-order_item-extra_item_id` FOREIGN KEY (`extra_item_id`) REFERENCES `extra_item` (`id`),
  CONSTRAINT `fk-order_item-order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `fk-order_item-table_id` FOREIGN KEY (`table_id`) REFERENCES `table` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_item`
--

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` VALUES (35,23,'8-10 People',400.00,1,NULL,3),(36,24,'Foliage',35.00,2,2,NULL),(37,24,'Microphone',26.00,1,3,NULL),(38,24,'12 People',500.00,1,NULL,4),(39,25,'Microphone',26.00,1,3,NULL),(40,25,'Screen Projector',26.00,1,7,NULL),(41,25,'Speaker',22.00,6,8,NULL),(42,25,'12 People',500.00,1,NULL,4),(43,26,'Microphone',26.00,2,3,NULL),(44,26,'Speaker',22.00,8,8,NULL),(45,26,'4-6 People',300.00,1,NULL,2),(46,27,'8-10 People',400.00,1,NULL,3),(47,28,'12 People',500.00,1,NULL,4),(48,29,'2 People',200.00,1,NULL,1),(49,30,'12 People',500.00,1,NULL,4),(50,31,'Microphone',26.00,2,3,NULL),(51,31,'Podium',27.00,1,4,NULL),(52,31,'Projector',40.00,1,5,NULL),(53,31,'Remote Slide',21.00,1,6,NULL),(54,31,'Screen Projector',26.00,2,7,NULL),(55,31,'Speaker',22.00,4,8,NULL),(56,31,'12 People',500.00,1,NULL,4);
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-post-author_id` (`author_id`),
  CONSTRAINT `fk-post-author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (2,1,'Первая статья','Тест текста','0000-00-00 00:00:00'),(3,1,'Вторая статья','Второй тестовый текст','0000-00-00 00:00:00'),(5,1,'Третья статья','качестве задания данного урока, вам предлагается создать новый контроллер - BlogController в вашем фронтенд приложении, который будет иметь два действия - index и view. Удалите старое действие actionBlog в контроллере SiteController frontend приложения, обновите ссылку Blog, чтобы она начала указывать на index страницу созданного контроллера BlogController frontend приложения.','0000-00-00 00:00:00'),(6,1,'Четвертая статья','Также посты должны быть отсортированы по полю id - пост с большим значением id, должен располагаться сверху. Максимальное кол-во отображаемых постов, должно ограничиваться десятью. При клике на название поста, данный пост должен открываться на отдельной странице, с полным текстом. Тело поста, должно быть заключено в тег <p>, а тайтл поста в тег <h1>','0000-00-00 00:00:00'),(7,1,'Пятая статья','Index страницу блога frontend приложения, реализуйте с использованием приведенного в материалах урока шаблона. Если длина текста поста больше 500 символов, то тело поста для превью на index странице, должно обрезаться до длины 500 символов и в конце должно добавляться троеточие - для этого воспользуйтесь методом truncate хелпера StringHelper.','0000-00-00 00:00:00'),(8,1,'Шестая статья','PHP предлагает альтернативный синтаксис для некоторых его управляющих структур, а именно: if, while, for, foreach и switch. В каждом случае основной формой альтернативного синтаксиса является изменение открывающей фигурной скобки на двоеточие (:), а закрывающей скобки на endif;, endwhile;, endfor;, endforeach; или endswitch; соответственно.','0000-00-00 00:00:00'),(9,1,'Седьмая статья','Конструкция foreach предоставляет простой способ перебора массивов. foreach работает только с массивами и объектами, и будет генерировать ошибку при попытке использования с переменными других типов или неинициализированными переменными. Существует два вида синтаксиса:\r\n\r\nforeach (iterable_expression as $value)\r\n    statement\r\nforeach (iterable_expression as $key => $value)\r\n    statement\r\nПервый цикл перебирает массив, задаваемый с помощью iterable_expression. На каждой итерации значение текущего элемента присваивается переменной $value.\r\n\r\nВторой цикл дополнительно присвоит ключ текущего элемента переменной $key на каждой итерации.\r\n\r\nОбратите внимание, что foreach не изменяет указатель внутреннего массива, который используется такими функциями, как current() и key().\r\n\r\nВозможно настроить итераторы объектов.\r\n\r\nДля того, чтобы напрямую изменять элементы массива внутри цикла, переменной $value должен предшествовать знак &. В этом случае значение будет присвоено по ссылке.','0000-00-00 00:00:00'),(10,1,'Восьмая статья','PHP 4, PHP 5, PHP 7, PHP 8)\r\n\r\nКонструкция declare используется для установки директив исполнения для блока кода. Синтаксис declare аналогичен с синтаксисом других конструкций управления выполнением:\r\n\r\ndeclare (directive)\r\n    statement\r\nСекция directive позволяет установить поведение блока declare. В настоящее время распознаются только три директивы: директива ticks (Дополнительная информация о директиве ticks доступна ниже), директива encoding (Дополнительная информация о директиве encoding доступна ниже) и директива strict_types (подробности в разделе про строгую типизацию на странице аргументов функции)\r\n\r\nПоскольку директивы обрабатываются при компиляции файла, то только символьные данные могут использоваться как значения директивы. Нельзя использовать переменные и константы. Пример:','0000-00-00 00:00:00'),(11,1,'Девятая статья','Часть statement блока declare будет выполнена - как выполняется и какие побочные эффекты возникают во время выполнения, может зависеть от директивы, которая установлена в блоке directive.\r\n\r\nКонструкция declare также может быть использована в глобальной области видимости, влияя на весь следующий за ней код (однако если файл с declare был включён, то она не будет действовать на родительский файл).','0000-00-00 00:00:00'),(12,1,'Десятая статья','require аналогично include, за исключением того, что в случае возникновения ошибки он также выдаст фатальную ошибку уровня E_COMPILE_ERROR. Другими словами, он остановит выполнение скрипта, тогда как include только выдал бы предупреждение E_WARNING, которое позволило бы скрипту продолжить выполнение.\r\n\r\nСмотрите документацию по include, чтобы узнать как он работает.','0000-00-00 00:00:00'),(13,1,'Одиннадцатая статья','Часто необходимо выполнить одно выражение, если определённое условие верно, и другое выражение, если условие не верно. Именно для этого else и используется. else расширяет оператор if, чтобы выполнить выражение, в случае, если условие в операторе if равно false. К примеру, следующий код выведет a больше чем b, если $a больше, чем $b, и a НЕ больше, чем b в противном случае:\r\n\r\n<?php\r\nIf you\'re coming from another language that does not have the \"elseif\" construct (e.g. C++), it\'s important to recognise that \"else if\" is a nested language construct and \"elseif\" is a linear language construct; they may be compared in performance to a recursive loop as opposed to an iterative loop.\r\n\r\n<?php\r\n$limit=1000;\r\nfor($idx=0;$idx<$limit;$idx++)  \r\n{ $list[]=\"if(false) echo \\\"$idx;\\n\\\"; else\"; }\r\n$list[]=\" echo \\\"$idx\\n\\\";\";\r\n$space=implode(\" \",$list);| // if ... else if ... else\r\n$nospace=implode(\"\",$list); // if ... elseif ... else\r\n$start=array_sum(explode(\" \",microtime()));\r\neval($space);\r\n$end=array_sum(explode(\" \",microtime()));\r\necho $end-$start . \" seconds\\n\";\r\n$start=array_sum(explode(\" \",microtime()));\r\neval($nospace);\r\n$end=array_sum(explode(\" \",microtime()));\r\necho $end-$start . \" seconds\\n\";','0000-00-00 00:00:00'),(14,1,'Omnis maxime.','Commodi omnis quibusdam dolorem qui hic accusamus. Minus ipsum tenetur quia molestiae ut quae. Eligendi facilis qui cum dicta. Earum quos voluptatem laborum. Iusto rem beatae rerum et animi neque ea expedita. Perspiciatis laborum ut ab voluptatum assumenda quia quisquam. Assumenda praesentium magni ut fugiat facere cum. Praesentium molestias enim nostrum rem. Inventore rerum sequi odio praesentium. Sint commodi tempora sit pariatur quia id. Necessitatibus qui perferendis voluptatem voluptas suscipit. Et et magni sint natus ipsum numquam. Est asperiores rerum laboriosam cumque quos natus excepturi nam. Deserunt libero nam expedita rerum ut molestias quos. Perspiciatis omnis eaque a id sunt. Non iusto sint possimus suscipit consectetur aperiam. Quibusdam neque sapiente nemo vero. Officia omnis quo libero soluta molestias eum sint. Laudantium voluptates ut aliquam atque enim. Impedit doloremque sint labore ea excepturi voluptas nostrum. A ipsum consequatur impedit est laborum molestias. Aliquam et dolorem quia et. Veniam nisi et quo quis labore quis sed et. Voluptas veritatis quo qui enim voluptas quo est quis. Fugit quo quo ut dolores alias autem. Incidunt et cum voluptatem quo. Dolorem aliquam consequatur ullam ducimus. A ipsam dicta maxime quia. Quasi sit debitis quaerat minus aliquam. Incidunt illum dignissimos atque adipisci. Quia in qui nihil velit aut quod. Distinctio repellendus eum tempora culpa minima veniam et amet. Ut et qui quas error vel vero ea ut. Temporibus inventore omnis veniam assumenda veritatis. Nihil quia incidunt minus alias. Enim placeat dolores autem et explicabo aut. Rerum aut aspernatur fugit. Sint voluptates iusto reprehenderit sint. Autem vel ullam architecto reiciendis fugit est hic. Est voluptatibus rerum eaque quis eveniet dolorum. Corporis unde consequatur nostrum accusantium et qui. Corporis omnis laudantium fuga commodi ab qui molestias. Nesciunt voluptatem nesciunt iste minima voluptas.','0000-00-00 00:00:00'),(15,1,'Ad nesciunt sint.','Et repellat atque dolorum non sapiente vel ad. Sed et aut aut aliquid recusandae officia culpa. Et asperiores fugit nemo omnis eius aliquam. Repudiandae assumenda qui nemo minus laborum. Sequi doloremque repudiandae ea ut beatae quam et dolorum. Laboriosam dolore dolor in quisquam atque at. Sed qui velit amet animi nulla sunt. Eius pariatur id rem et occaecati. Eos voluptate inventore voluptas sapiente sed nostrum. Et nisi tenetur at debitis sed praesentium sapiente. Adipisci quidem nihil quam. Vitae qui quis dolor rerum sed sed. Magnam quia vero magnam quaerat. Hic voluptas eius sit aperiam fugit. Voluptatem autem perferendis vero exercitationem. Laudantium qui quis non aperiam ut architecto. Consequatur tempora qui nemo illum voluptatum reiciendis. Quisquam illo consectetur quaerat quam. Dicta fuga rem quisquam nam deserunt voluptatem. Amet id consequuntur aut maxime numquam. Eaque magni ex ipsum consequatur. Et dolorem quo rem quidem vel est. Sit eaque minima voluptatem et. Dicta cumque omnis soluta iure voluptatem non quo eos. Assumenda saepe et nemo vel. Consequatur temporibus eos quia autem possimus. Illo sapiente qui rerum nemo placeat perferendis. Vero illo quo voluptas rerum ut. Distinctio ex mollitia fuga sunt. Dolor id soluta consequatur. Et mollitia quidem quibusdam consequuntur. Est est minima sit ut eaque voluptate et. Ut fugit nam iste exercitationem. Dolorum et aut expedita dignissimos qui fuga debitis sed. Est adipisci et ad voluptatem doloribus sint excepturi dolore. Suscipit quasi ut sit dolores nihil. Quae amet id aperiam et ut. Velit dolorum odit laborum maiores voluptas natus. Sint ad et quis fugiat omnis culpa. Et numquam dolor numquam sed quos ut provident aliquid. Cumque consectetur voluptatem dolor eum error id qui. Neque omnis non nemo nesciunt tenetur sunt soluta. Quam fuga et earum dolorum sed. Dignissimos officiis nisi et suscipit labore. Dolore ducimus repellat veritatis quod ab.','0000-00-00 00:00:00'),(16,1,'Ab dolores.','Quo nihil harum occaecati ut voluptatem doloribus autem. Libero et dolorem dolore neque dolor pariatur cumque. Voluptatem laudantium delectus nihil non dolor recusandae. Vel explicabo et aut mollitia et. Qui adipisci sequi ipsam vel nesciunt expedita necessitatibus in. Tenetur voluptatem nemo non quo. Odit et et rem cum. Dolor pariatur repellat reprehenderit id consequatur. Omnis qui sunt expedita aut iure. Cum non molestiae inventore repellat voluptatibus pariatur eum odio. Voluptatem optio aliquid ut id at necessitatibus placeat. Voluptas pariatur ut omnis dolor. Est aperiam unde doloremque maiores qui molestiae illo maiores. Aperiam consectetur rem reprehenderit ex laborum. Possimus quia quia voluptas et. Laboriosam ea et et et. Cumque sit iure vel assumenda. Iure fugit est tempora et. Repellendus et enim aut. Mollitia aut rerum voluptatum quidem vero laborum eum. Et ducimus voluptatibus aperiam nam ratione id. Dolorem veritatis et velit consectetur sed. Rem dolorum eveniet est est. Est aperiam aperiam explicabo aut. At nisi vel nam nulla numquam. Itaque nihil labore tempora placeat. Iure officia aliquam earum perferendis et voluptatibus. Laborum numquam repellat eos quod impedit. Velit fugiat sunt ut quo distinctio aperiam quia. Placeat error sed eum quas mollitia qui cupiditate. Qui sed incidunt impedit beatae amet. Perspiciatis sunt alias neque est recusandae. Saepe dolores qui accusantium non dolore qui non facere. Quia quod sint modi molestias id doloribus. Laboriosam quas architecto iure aperiam ut veniam. Ut in dolores velit assumenda sint qui. Dolor repellat est enim eum facere quis aut possimus. Eaque accusamus et perspiciatis qui iste. Perferendis maiores dolor ipsam voluptatem. Qui qui omnis adipisci et. Minima nostrum quas mollitia omnis. Omnis molestiae et quia est tempora quaerat qui. Est neque optio voluptate libero quibusdam ut architecto dicta. Debitis repellendus velit commodi expedita perferendis quasi ipsa.','0000-00-00 00:00:00'),(17,1,'Dignissimos voluptate delectus ea quo facere.','saepe ea qui aspernatur sit enim deserunt quia recusandae sed qui occaecati iure consequatur sint rem temporibus et quisquam provident laborum voluptas aut perferendis consequatur et error accusamus distinctio dicta officiis qui asperiores aperiam possimus est itaque quo rerum earum maiores ea rerum rerum numquam magni molestiae libero et consequuntur qui ipsa eius qui vel ducimus harum ex est voluptas nulla veritatis dolorum vel sint omnis sit consequatur libero eos quidem quisquam reiciendis quos dolor fugiat nostrum et asperiores voluptatem quam voluptates quidem incidunt totam perferendis sunt labore molestiae quia harum qui qui quis quae quo voluptas libero nesciunt voluptatem consequatur praesentium optio esse sint deserunt fugit dolor aut itaque non non numquam nulla et est labore maxime cum consequatur dolorum sed quam ipsam voluptas sit at enim consequatur officiis dignissimos vel ea repudiandae temporibus ut rerum labore deserunt atque sed consequatur illum minima assumenda aut ex sit et velit omnis veritatis fuga nam qui expedita accusamus ex voluptate est ipsum quaerat eligendi aperiam ab labore repellendus et voluptas','0000-00-00 00:00:00'),(18,1,'Magni consectetur nihil quia mollitia vel.','repellendus itaque nihil blanditiis suscipit non eaque ducimus vitae ad repellendus neque debitis at aperiam eos dolorem iste consequatur eaque reprehenderit quasi aut possimus odio similique nostrum dicta sint praesentium consequatur et praesentium quia repudiandae voluptatem cumque quis minima vel quos et sit laborum facilis laborum exercitationem et incidunt enim aliquid quia libero reprehenderit et voluptatum omnis sint dolore molestiae aut inventore recusandae exercitationem delectus vero sed optio repellendus quas sapiente fuga nihil et ea possimus quia ratione rerum iure quos quis itaque temporibus et voluptatem vel quibusdam molestiae culpa non voluptatibus ipsum aperiam enim eum expedita quia blanditiis aut aut laboriosam et aut beatae libero ut ex non officiis non voluptatem ullam et facilis perferendis minus maiores quisquam asperiores quam sunt sapiente deserunt ea odio quia sunt et in et omnis blanditiis temporibus aut voluptatum maiores ut rerum sint dicta et dolorem repudiandae illo ratione repellendus qui doloribus tenetur rerum quam aperiam ipsum sed et error consequatur beatae ut dolorem ut veritatis vero quos quia vel id quibusdam qui corporis aut soluta eos porro officia consectetur necessitatibus dolorum at qui rerum perferendis vero voluptatem laudantium quae est id fugit totam omnis est suscipit saepe ab velit et in assumenda rem quidem placeat quia et amet quaerat doloribus ut placeat qui ut iste eos explicabo saepe voluptatem dolores totam voluptatem odit ut voluptates dolores totam enim molestias quaerat soluta voluptatem consequuntur laudantium et est sint temporibus exercitationem autem harum itaque ipsa magni vitae quia aut amet ipsa quia fugit ducimus nam facere consequatur natus magnam beatae a laborum nesciunt repellendus ratione eos ut in unde illum nihil nihil ut necessitatibus qui et pariatur et quae est sit dolorem quidem veritatis sit maxime aut sapiente nesciunt sit quia modi facilis omnis officiis libero similique commodi optio','0000-00-00 00:00:00'),(19,1,'Ipsum autem molestias ad neque optio et adipisci.','fugiat tenetur minus ut eveniet voluptatem quidem tempora sit blanditiis sint culpa et culpa similique quod odio impedit autem qui hic ea quis ut in est inventore et reiciendis eligendi sequi atque quas veniam laboriosam qui doloremque ab itaque molestiae provident recusandae laborum in excepturi et ipsa voluptatem architecto rem dolorem et consectetur hic magni voluptas cupiditate reiciendis libero consectetur temporibus asperiores suscipit doloremque rem officia cupiditate nulla vitae ex temporibus enim autem qui eum ut aut aut nihil sunt et unde vero et tempore minima omnis nihil tempora adipisci delectus ut iste ut non placeat quaerat minus reprehenderit veritatis enim error quas quasi neque aut dolor ipsam autem cum numquam doloribus odio cum sint eum eos aut qui natus necessitatibus est facere eos veritatis et sunt id voluptatibus et esse aspernatur dignissimos expedita aliquam quam maiores vel ipsa magnam repellendus nesciunt ad officiis omnis dolores minima iste harum eum iure ut sed neque consectetur','0000-00-00 00:00:00'),(20,1,'Tenetur voluptas libero ipsam architecto.','quos expedita sapiente pariatur voluptatem libero aut nemo ut sed voluptas suscipit libero laudantium aut sit at quos molestias qui quisquam velit est iure quos iure dicta aut doloribus recusandae sed voluptate sit et vel aut eum illum consequatur quo sunt quidem unde assumenda qui ut explicabo error asperiores assumenda consequatur officia animi voluptatem rem quis est vel voluptas adipisci corrupti et odio ea asperiores ut repellendus architecto eius ad repellat consequatur cupiditate qui provident tenetur aut ea delectus consectetur impedit rerum eum eos odio non et totam voluptatum occaecati ea ex harum maiores molestiae voluptas molestiae dolores hic quaerat sed quia ea quia doloremque eos ab id officiis rerum eveniet debitis nulla excepturi accusantium doloribus dolores id inventore dolor cumque eligendi est quis dolores dolore temporibus et animi eos unde in eos non magnam consectetur ea aliquid laudantium quia dolor rerum velit possimus nam et consequuntur debitis enim sapiente nisi autem repellendus aut aut optio ut dolorem incidunt qui repellat laboriosam quas id quasi dolorum nesciunt quibusdam cumque dolorem velit inventore maiores reprehenderit quia facere et repellendus qui qui eos sit dolore consequatur earum velit aut sit aut aut amet ullam sunt enim sed vero quam odit quis possimus quas ut dolores at cum corrupti ea cupiditate commodi est consequuntur sint qui aut nulla libero natus illo iusto non omnis et tempore placeat vel quo rerum deserunt porro nam libero et et exercitationem qui omnis corporis veritatis beatae delectus quibusdam possimus molestiae quas sit voluptas incidunt id iusto illum nobis omnis et dignissimos voluptatum tempore pariatur ipsum nobis veritatis dolorem quisquam natus est vel itaque reprehenderit perferendis aut inventore impedit qui aliquam et officiis temporibus libero maxime et dolorum ab','0000-00-00 00:00:00'),(21,1,'Aliquid laborum assumenda reiciendis odio assumenda et.','corporis assumenda distinctio tenetur perspiciatis odit vel saepe voluptatem eum voluptatibus quia dolores et et maxime dolorem aut quaerat id suscipit sit aut provident sit magni libero iste et fugit omnis et at quis corrupti nihil voluptatem amet aut quam aut vel nulla amet placeat rerum voluptatem tenetur exercitationem omnis ipsum ipsa aliquam aut cum voluptates magnam exercitationem eos dicta minima ullam voluptates officia ab molestiae ipsum sint dolores officiis esse expedita cumque velit amet et eos velit recusandae quos dolorem optio nobis doloremque optio incidunt temporibus eos iste asperiores veritatis quo eos nam illo aspernatur ipsum dolorum repellat qui aut et deserunt sit soluta nam qui minima voluptatem illo autem amet adipisci quis soluta voluptate in qui odio ipsa ut vel dolores commodi vitae qui delectus laborum est quia veritatis rerum voluptatem ex vitae porro ex quia odit autem quisquam sed ab sit est commodi qui recusandae et commodi non consectetur repellat non est delectus dolorem sed tempora necessitatibus qui quibusdam fugit quia quisquam doloremque inventore possimus eos ipsam molestiae vitae rerum est rerum et cum voluptatum et consectetur a at ut et consequatur voluptatem beatae provident voluptatem unde illo reprehenderit ut quos aut voluptatum qui et quas iure nihil molestiae saepe et rerum et illo voluptas amet ea sequi beatae quibusdam ab voluptatum eum','0000-00-00 00:00:00'),(22,1,'Animi occaecati quas possimus doloribus et ut vel.','a necessitatibus sint pariatur sequi quisquam et nesciunt corrupti quas voluptates in voluptatum hic quas nam nostrum recusandae non consequatur corporis earum eius similique assumenda nihil rem ut et velit doloremque quia enim ipsa quos sit in necessitatibus ut quis et sed numquam ipsa dolores commodi quas quo enim aliquam voluptatem aspernatur voluptatem distinctio sunt at assumenda praesentium provident vel ducimus magnam placeat saepe dolorem voluptatum et deleniti ipsam sequi culpa ipsum aspernatur explicabo sunt error dicta est non velit ea qui qui laboriosam rerum minus officiis quis unde pariatur qui qui impedit autem in nihil harum asperiores doloremque rem soluta deserunt autem temporibus repellat aut temporibus cumque eos molestiae eos cum iure molestias est ex vero laudantium molestiae et quia necessitatibus et qui neque ipsa aperiam neque sint aut rerum nisi sed blanditiis in voluptates est possimus voluptatem voluptatem maxime asperiores sed non enim accusamus cupiditate aspernatur praesentium omnis quam facere cupiditate expedita ipsum ea nisi id voluptas soluta non corrupti id iure ea aut dolor voluptatem veniam omnis qui autem iusto non optio mollitia et quasi molestiae iure maxime repudiandae assumenda in ut aliquam deleniti laboriosam deleniti perferendis corrupti inventore exercitationem quod et ut quo voluptatem et magni ipsum ad veniam molestiae consequatur fugit accusamus mollitia pariatur consequatur aut molestiae quod et veniam dolor ea eos in omnis ut impedit omnis cum modi aliquam quasi eum sunt quidem aut ipsum voluptas aliquam ratione voluptate atque dolores cumque sunt cupiditate libero occaecati id nihil ex quaerat eveniet impedit totam magnam dolorem enim maxime natus velit soluta omnis esse est enim est commodi enim dolores voluptatem eaque minus dolor facere officia vel suscipit aut ut eum accusamus quia voluptatum aut aliquam dolorum et eum natus nihil omnis ea ut et in quod','0000-00-00 00:00:00'),(23,1,'Temporibus atque voluptatem rerum omnis quaerat qui illo et.','dolor consectetur voluptas omnis voluptatibus in perferendis occaecati quia architecto doloremque ut et explicabo dignissimos suscipit in ut beatae aut sit quia est fugiat illo harum qui enim dolorum voluptatem aut dolorum inventore labore totam quia sed reiciendis architecto necessitatibus dolores reiciendis fugiat quas eum voluptate et suscipit praesentium suscipite q r q v c m c f x a a y c z m x d h l b e s y m i z j s b g f n k w s k n d b k v b c i q l u w e x x k y z c g n t d a w x q v n k q p g k j t x p x m k m f f r f n x p p v i q m v a v s e d j n d i f a f f c x n b w e y u t s v j v t u p r j d d l i n g m n c a y z k z v t j u x e e o w z b b o g t r o t x k s j a d m a d s l z y w b v a d m y h s p p r v h v v t x f h x q a q u u a n a r m i u y i x u t s k z h b f i c y a o b t h e w h t s k k m k i o s q a y q o z h u t y a d e u j i o e w l h m a d g a t p y l x r q u q z h x q f z v c q o z l g q r r l b t u o u p x v o b z k b k k z h d e d l k z w q q w f e m y b l v h t f t y z t a c j q w o c g f k f u z d w l q h j f e z v j h l s w k v x o k d m j j i o w e b j b b t f v t j a v g q b m b o o i l p y n s q x h e s b j d y z j w w l s o t r h p n d a f v a q u m t y l t m n o x n y c g l s g k v v q i t g j x n d z a g u c y d s v o h u r i l q c u p b k n b h l e m z d g j c v e r p s d f z g t w i w w f h c v j z h x t z j o t j o b f g a k c c s f s h u l z n g q m u k g m y h m w b r a t e d l v k c r o x b f c n e i f t k r i b i s a g g r d w e c p o b v d c n t j n e b v d f d l p t m w s t n f s y a o e g e f','0000-00-00 00:00:00'),(24,1,'Sed et est iusto et.','facere blanditiis repudiandae et omnis quae amet consectetur sed voluptatem sunt voluptatem id assumenda voluptatem magni et tempora eius doloribus ullam quos tenetur est amet reprehenderit et repudiandae dolor est fuga cupiditate et mollitia veritatis tempore facilis laboriosam vel inventore officia accusamus deleniti iusto cum est quo aperiam laborum quo qui autem pariatur eos dolor est et ea dolore culpa quod unde deserunt aperiam qui aut nisi doloremque natus et voluptatem expedita consequatur beatae consectetur doloribus ducimus quos nihil rem vero voluptas et sed soluta rerum quae rem laudantium quibusdam excepturi itaque ut excepturi beatae aut eligendi corrupti eum quod similique rerum debitis velit ab recusandae aut dicta doloremque et ad vel velit fugit culpa ipsam reprehenderit deserunt sed neque a officiis exercitationem praesentium quia qui sed quasi sint temporibus odit facere molestiae aut enim ea reiciendis vel consequatur voluptatem sequi voluptas laborum iste totam veritatis accusantium iure consectetur illo eos non nisi provident ratione quasi illo omnis nihil dolor quod ad voluptatem ad','0000-00-00 00:00:00'),(25,1,'Ut et rerum blanditiis praesentium neque qui.','dolor perspiciatis ipsam atque iste modi ipsa magni id molestias quidem et velit id excepturi vero ea quia qui et quo rerum in ea illum sit placeat aspernatur praesentium sit maiores corporis earum distinctio sit deleniti officiis et rerum modi porro eius ducimus numquam blanditiis commodi molestias sunt culpa alias sed itaque voluptas sint ipsam dolorum earum aspernatur voluptate expedita voluptatem qui eum rem aliquid quidem qui qui aut est non architecto est sit perspiciatis aut omnis minus quae aut quisquam odit est tempora facilis nihil est ut nihil laborum nulla repudiandae sint consequatur necessitatibus exercitationem et similique explicabo a quis dolorem rem blanditiis autem molestiae eos quia nisi magnam eos odit excepturi rerum tempore ut officia sint cumque ad error repellendus libero beatae officia eos nostrum sit magnam molestiae atque dolor vero at mollitia sit quasi porro asperiores facilis distinctio nihil quia sint quasi molestias quos et qui enim officia qui aliquam officia amet ut sint quis voluptate nihil consequatur impedit nemo corrupti numquam voluptas consectetur sit corrupti exercitationem necessitatibus ab vero doloribus ut adipisci quam aut culpa qui et eum voluptate itaque quod quaerat soluta consequatur quod optio numquam qui non sint maiores ab illo eligendi libero est velit quae sint sint molestias rerum qui aut fuga dolores est consequatur commodi voluptas incidunt ea voluptatum omnis amet voluptas similique quibusdam et aut ut vero qui ipsum tempora rerum illum ipsa non qui voluptatem adipisci provident non delectus ex aliquid minus error praesentium impedit voluptas voluptate eum sit quisquam sunt odio deserunt asperiores beatae atque adipisci error ratione dignissimos deserunt eaque in est cum veniam amet laborum totam molestias aliquid dignissimos nesciunt et veniam maiores sapiente possimus est ratione fuga voluptate similique dolor eaque ipsa quasi odit ut totam et et ut et nam facilis deserunt','0000-00-00 00:00:00'),(26,1,'Et magni possimus assumenda aliquid molestiae esse.','placeat eum harum assumenda saepe quia id quia expedita officiis ab ratione minima fuga in sed est a reiciendis delectus illum sed et ut harum optio voluptatum aut velit amet quis itaque pariatur quia et rerum tempore voluptate rerum qui quisquam aperiam tenetur illum voluptatum aliquam et impedit et hica z m x a j e n w h h y d f s z v x u u l h f w e b z g a i c i b h p s w c r h z a p e c a p a g g c m f g z g w a o f b f o q g w u c y a w j j n d h l s f q y p d x u q w j g q u u s o d l y s x z c v e a d q u z r d q e a y y c c a c n k s l y z h q x j t b m i l m y r v u m i h z f g r f p c n c y e v s n t o q w d q i r y w c m u d t f f e r r j v c r a c m i m b x v r z h n e b v v a v q i u n d j f a w e l p a n n i c s j w q l u w m t p o l y n n z a v m i z o q f q n l y m h o c h j a l g b s v l v k t x i k c q l r z q h r v t a g s i o n u h u x j z b m d w u j g g u e n p p o n x s p a t c q l b k a a l o v e k s p g e r a w u l s y d p g q w u n y d h l v k o a m f z c r s m d h z v n n g m i w o t j n t s l l t t p f q x j z y x m z d w g m b n d v v w m o z k z l q h r l q e e n k a z a a p k p e d q j h e e j c o l i e q d j e p y l i v f s x x q y m x u x w w w b a t l l i p c p a v x t d v h v y j y p l j b a m p u h v q m a e d h b a i i c k m o n y f s s j r x a x x o h u s z i d d i l y n k w u r n v b b i g h a n s y p x g y y q m f l q q w b i m w n m n f d p x j x n b g p k p w i d x q y l b i c b m g l c l l r q i n h u i k b r i r a o f z i z v a b h k c','0000-00-00 00:00:00'),(28,1,'5','6','2023-06-05 14:05:51'),(29,1,'Eos voluptatem nihil ipsum soluta.','quia aut numquam nisi perspiciatis ut sit possimus perferendis aspernatur corporis et qui laborum adipisci enim corrupti commodi et pariatur et voluptatem animi est eligendi neque minus distinctio deleniti deleniti repudiandae quia quas sit ea laboriosam accusamus ea quaerat autem recusandae vero culpa molestias ut est voluptatem excepturi in eaque officiis sed numquam debitis et ea vero neque necessitatibus ad hic quaerat fugiat qui accusamus est sit fugiat perspiciatis harum laboriosam aspernatur tempora tempora harum in distinctio fugit blanditiis ex blanditiis et eum fugiat repellat qui perferendis adipisci a ut neque aut labore rerum voluptatem labore nesciunt ea ea temporibus omnis maiores distinctio voluptas autem doloribus fugiat quidem sunt magni voluptatem sed fugit aliquid unde itaque debitis itaque sapiente aut aspernatur facilis voluptatem consequatur vel vero perferendis omnis aperiam voluptate dolorum omnis rerum rerum beatae ad corrupti rerum sed fugiat temporibus dolores voluptatum ut aut vel sed quia culpa sequi in hic eum molestiae impedit quo inventore ea sed sed nobis ut voluptatibus laborum','2023-06-05 14:07:28'),(30,1,'Nostrum error consequatur et quia.','iure sint reiciendis aut blanditiis voluptas quod voluptatem exercitationem quo ut dolores quo voluptatum eius rerum rerum in repellendus et est ea ut quos ipsa alias eligendi cumque porro error a ut reprehenderit magnam et reiciendis natus laboriosam non nisi rerum odio sint vel et commodi repudiandae reprehenderit aperiam animi voluptatem saepe molestiae vel porro excepturi dicta voluptas velit quia dolorem provident ea culpa dolor quisquam rerum laudantium perferendis aliquam quos vitae repudiandae ut aut necessitatibus qui ut qui eaque odio doloribus reiciendis odit molestiae enim ad exercitationem minima doloribus laboriosam qui cumque vel autem aut iste in perspiciatis quasi at neque quae','2023-06-05 14:12:33'),(32,1,'Et ut corporis.','Dolores aliquid et nulla voluptas quia. Molestiae blanditiis facere fugiat accusamus alias sequi dignissimos voluptate. Animi eum accusamus autem repellendus nesciunt doloribus beatae. Cum distinctio officiis nesciunt iste ipsa velit. Inventore aut est nihil eum earum. Optio quaerat doloribus qui rerum. Minus dolorem molestias maxime voluptatem. Eos repudiandae in vel ab sed. Sit cumque et fugit aut. Alias architecto dolor omnis sint vel minus. Laudantium sunt illum omnis non velit consectetur ut repellat. Distinctio omnis doloremque illum voluptatem labore est. Animi hic omnis est earum vero voluptas. Qui magni itaque voluptates excepturi quo. Iste rerum harum a sit. Aspernatur autem perspiciatis natus libero cumque et beatae. Quibusdam consequatur non omnis at deleniti minus. Alias ipsam esse quibusdam. Qui atque et molestiae voluptatem natus. Perferendis voluptas exercitationem omnis aut consectetur expedita cumque. Perferendis totam et expedita esse odit non tenetur sint. Ex velit eos ut inventore nihil aliquam harum id. Non vel perspiciatis autem repudiandae numquam. Magni consectetur voluptas et eum veritatis. Sed repellat neque quo et beatae enim. Delectus aut quis quas perspiciatis aut quo. Laudantium quam earum distinctio nobis. Qui alias fugiat sint sit aspernatur. Soluta laboriosam soluta eius voluptatem reiciendis impedit omnis. Tempora harum eaque qui harum. Unde perspiciatis et deserunt ut laudantium. Voluptatibus similique earum eos distinctio non quod nihil minus. Et doloremque ut hic molestias. Nostrum et sint cum ut dolores sunt. Vel exercitationem beatae est esse illum vel. Amet nobis earum magnam quam. Dolores fugit cum in iste sunt et. Est est perferendis delectus nisi deleniti magnam voluptates. Impedit corporis sequi quis qui nihil autem. Porro atque sit veniam impedit velit. Ut enim velit magnam laudantium odit.','2023-06-06 09:52:48'),(33,1,'Est libero officiis hic aut fugit voluptatem.','qui corporis impedit omnis quasi id suscipit ipsum architecto eos odit aliquid tenetur ut alias fugiat omnis aut dolores sit est ducimus enim velit dicta natus nemo aut quos sed molestiae iusto non ad adipisci reiciendis quia at voluptatibus ut necessitatibus quam porro in a qui eveniet rem labore voluptas quidem magni fugit ea quo eligendi quo dolores praesentium modi doloremque nobis quo porro cum modi similique vitae veritatis voluptate deleniti dolores quisquam temporibus ipsum et nemo cumque libero temporibus autem incidunt et nulla quas fugit autem sit a quaerat cum qui accusantium qui harum eos similique maiores rerum ipsum id est similique sequi fugiat voluptatem accusantium aut ullam suscipit cumque amet vel hic hic voluptates voluptas recusandae et voluptatem officia ab optio numquam ea vel totam et expedita qui officia ut ea ab eius aperiam dolores et quasi reprehenderit sapiente rerum recusandae alias deserunt repellendus aut possimus sed architecto illum illum dignissimos cupiditate ea aut nobis qui et iusto eligendi inventore consectetur illum dicta sapiente facilis est autem facilis quod aut esse maxime eos tenetur nulla iusto dolor molestiae quis qui enim eaque aut qui velit quia sunt qui et magni saepe libero ut est voluptatem reprehenderit natus corrupti saepe aliquam maxime eius voluptatem dolorem blanditiis quod et sit qui est eos officiis et assumenda delectus nostrum quod magni amet quia itaque neque quas excepturi et sunt et culpa laudantium ex unde distinctio amet perferendis ullam est maxime voluptas ipsa rerum officiis dolores natus hic ipsam voluptas maiores et necessitatibus unde','2023-07-07 08:28:46');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table`
--

DROP TABLE IF EXISTS `table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_custom` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table`
--

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;
INSERT INTO `table` VALUES (1,'2','People',200.00,0),(2,'4-6','People',300.00,0),(3,'8-10','People',400.00,0),(4,'12','People',500.00,0),(5,'12+','People',0.00,1);
/*!40000 ALTER TABLE `table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_block`
--

DROP TABLE IF EXISTS `text_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_block` (
  `shortcut` varchar(255) NOT NULL,
  `text` text,
  PRIMARY KEY (`shortcut`),
  UNIQUE KEY `shortcut` (`shortcut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_block`
--

LOCK TABLES `text_block` WRITE;
/*!40000 ALTER TABLE `text_block` DISABLE KEYS */;
INSERT INTO `text_block` VALUES ('about1','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut lao dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper lobortis\r\n                nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hend rerit in vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odioqui blandit\r\n                praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dol ore eu feugiat nulla facilisis at vero\r\n                eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod\r\n                mazim placerat facer possim assum. Ea ea cum unde. Ut et quidem ipsam id molestias.'),('about2','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut lao dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper lobortis\n                nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hend rerit in vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odioqui blandit\n                praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse.'),('about3','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laodolore magna aliquam erat volutpat. Ut wisi minim veniam, quis nostrud exerci tation ullamcorper lobortis nisl ut\n                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in v esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio diqui blandit praesent\n                luptatum zzril delenit aug s dolore te feugait nulla facilisi.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laodolore magna m erat volutpat. Ut wisi enim ad minim\n                veniam, quis nostrud exerci tation ullamcorper lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel riure dolor in hendrerit in vulputateesse molestie consequat, vel illum dolore eu feugiat nulla facilisis\n                at vero eros et accumsan et iusto odio diqui blandit nt luptatum zzril delenit augue duis dolore te feugait nulla facilisi.');
/*!40000 ALTER TABLE `text_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test','2cCsEgQqmhvZFz-u33-7ukDVMMTSzSC7','$2y$13$/OcSSMHr5T9.APceMhbmkOdsYG6GF7OFGB/AybbAolJYwybgxIJ0S',NULL,'test@test.test',10,1684651668,1689597325,'qAaNhL97k20gzxRm0I7xz4iyEafQEDMa_1684651668','Test','Testov','8770 Marianne Islands','Port Maiya','(762) 528-1627',1),(105,'anthony.lemke','Lv_wriLwgmbS9USAQVrtcpIj6IHZA2t0','$2y$13$ni9NHuijIK2wA1j/NaLtcu35bdUxVpS8skW67IXoEQi4wcW2eVMpi',NULL,'corwin.constantin@pfeffer.com',9,1688465516,1688465516,'aKmmFiTvAFRB6ss-yow5_GzTlMNhfE7M_1688465516','Edyth','Spencer','58024 Oberbrunner Burg','New Anyaside','+12406897609',0),(115,'test2','vueO9KTI0a9gnaSYPrC737yTifESIOoS','$2y$13$rqfjMX8FKnBZc9I8U/6Afe5fgZ9BvpJi4z3WokPF9FRU9IO6Mlawu',NULL,'test2@geka.com',10,1689593317,1689593317,'KvejI845tp49UKJE3OVQwBdeUv2GxwR6_1689593317','Geka','Geks','Stepnaya 10','Stavropol','11111111111',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-17 13:05:38
