-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: skripsi_project
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_daerah` varchar(30) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `about_daerah` text NOT NULL,
  `gambar` varchar(30) NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'Lahat','+1-238290-12','dey@gmail.com','Lahat sumatera Selatan','Kabupaten lahat adalah salah satu kabupaten di Provinsi Sumatra Selatan. Kabupaten Lahat terdiri dari 7 kecamatan induk yaitu Lahat, Kikim, Kota Agung, Jarai, Tanjung Sakti, Pulau Pinang, dan Merapi. Namun pasca pemekaran, jumlah Kecamatan di Kabupaten Lahat bertambah menjadi 22 kecamatan.','332.jpg');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `waktu` datetime NOT NULL,
  `reply_comment` int(13) DEFAULT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inbox` (
  `id_mail` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('1','2') NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbox`
--

LOCK TABLES `inbox` WRITE;
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'bahari','  Wisata bahari merupakan salah satu wisata unggulan yang dimiliki Indonesia. Menurut data Kementerian Kelautan dan Perikanan, Indonesia memiliki 20,87Juta Ha kawasan konservasi perairan, pesisir, dan pulau-pulau kecil. Garis pantai Indonesia membentang 99.093 km dengan luas laut 3,257Juta km².\r\n\r\nKekayaan maritim ini membuat wisata bahari di Indonesia tak diragukan lagi keindahan dan keunikannya. Wisata bahari Indonesia tersebar dari Sabang sampai Merauke. Ada banyak yang bisa dieksplor dalam wisata bahari Indonesia.','2.jpg'),(2,'kuliner',' Kuliner di Lahat sangat lezat dan harganya tergolong murah jadi sangat pas dikantong. Seperti yang kita ketahui bahwa kebanyakan makanan tradisional dibuat menggunakan rempah-rempah alami atau cara mengolah yang sangat sederhana sehingga hasil masakannya menjadi sangat berbeda.\r\n\r\nKebanyakan kuliner yang ada di kabupaten bisa anda jumpai di beberapa daerah di Provinsi Sumatera Selatan, namun untuk rasanya jelas berbeda untuk setiap daerahnya. Tanpa banyak basa basi lagi, berikut daftar makanan khas Lahat yang menarik untuk anda cicipi.','download.jpg');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(30) NOT NULL,
  `tgl_post` datetime NOT NULL,
  `isi` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `latitude` varchar(30) NOT NULL,
  `langtitude` varchar(30) NOT NULL,
  `deskripsi_tempat` varchar(556) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'Aku Sehat','2022-07-27 13:21:37','123',2,2,'1c6ba2bc541aea01676e6cd9ad8965ca.jpg','-3.7892233952917524','103.5506155400199','Desa Serambi, Kec. Jarai, Kab. Lahat, Sumatera Selatan'),(2,'Aku Sehat','2022-07-27 13:22:07','123',2,1,'553ae4d4df0f222847fe9d5591c6a43d.jpg','-3.7893946813855357','103.54598068284217','Desa Serambi, Kec. Jarai, Kab. Lahat, Sumatera Selatan'),(3,'qweq','2022-07-27 13:22:40','assa',2,2,'dfb38bf2e8ec170d4aaa8216128175c5.jpg','-3.787339246022029','103.55885528611365','Desa Serambi, Kec. Jarai, Kab. Lahat, Sumatera Selatan'),(4,'Lahat Oline','2022-07-27 13:23:01','dasdsa',2,2,'1a7b3840f57b4b4f318e000122f6a880.jpg','-3.7904223972360085','103.55645202683631','Desa Serambi, Kec. Jarai, Kab. Lahat, Sumatera Selatan');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `akses` enum('super_admin','admin') NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `tgl_dibuat` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ongky juliastio','ongky','e4681180326b1e486c5c32f0919c89cf','chat-img1.jpg','super_admin','aktif','2022-07-06 12:20:49'),(2,'dea novita sari','dea','96991368fec63c8a1bfc48a70010f84a','default.jpg','admin','aktif','2022-07-27 12:20:49');
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

-- Dump completed on 2022-07-28 10:16:02
