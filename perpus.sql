/*
SQLyog Community v12.2.1 (32 bit)
MySQL - 5.6.16 : Database - perpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `perpus`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `userid` varchar(3) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`userid`,`username`,`password`) values 
('001','MF SUCIANTO','202cb962ac59075b964b07152d234b70'),
('002','ANDI SAYOKO','202cb962ac59075b964b07152d234b70');

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `kdanggota` varchar(5) DEFAULT NULL,
  `nmanggota` varchar(30) DEFAULT NULL,
  `alamat` text,
  `notelp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `jkel` varchar(1) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`kdanggota`,`nmanggota`,`alamat`,`notelp`,`email`,`password`,`jkel`,`tgl_daftar`) values 
('A0001','NURILAH AJA','PALMERAH BARAT','085780708036','lulienurilah@gmail.com','202cb962ac59075b964b07152d234b70','P','2015-12-16 00:00:00'),
('A0002','MF Sucianto 3','Jl. Durikosambi\nCengkareng Jakarta barat','081516432825','mfsucianto@gmail.com','202cb962ac59075b964b07152d234b70','L','2015-12-16 00:00:00'),
('A0003','Dian Sastro Wardodo','Jl. Mangis selatan\r\nJakarta','081122333332','dian.s@gmail.com','202cb962ac59075b964b07152d234b70','P','2015-12-16 00:00:00'),
('A0004','doni','cghcj','jgfj','hfdh','827ccb0eea8a706c4c34a16891f84e7b','P','2015-12-17 00:00:00'),
('A0005','dimas','ciledug','09234','ashjjgsh@yahoo.com','81dc9bdb52d04dc20036dbd8313ed055','L','2015-12-17 00:00:00'),
('A0006','mf s','Jl Duri','021','as@gmail.com','202cb962ac59075b964b07152d234b70','L','2015-12-17 00:00:00'),
('A0007','MF','1','1','jawe99@yahoo.co.id','c4ca4238a0b923820dcc509a6f75849b','L','2016-05-19 21:13:40'),
('A0008','a','a','11','jawe999@yahoo.co.id','c4ca4238a0b923820dcc509a6f75849b','L','2016-05-19 21:18:54'),
('A0009','ad','as','2','ashjjgsha@yahoo.com','c4ca4238a0b923820dcc509a6f75849b','L','2016-05-19 21:19:53');

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `kdbuku` varchar(5) NOT NULL,
  `isbn` varchar(25) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `penulis` varchar(30) DEFAULT NULL,
  `kdpenerbit` varchar(3) DEFAULT NULL,
  `sinopsis` text,
  `thnTerbit` varchar(4) DEFAULT NULL,
  `stok` int(4) DEFAULT NULL,
  `kdjenis` varchar(2) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kdbuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `buku` */

insert  into `buku`(`kdbuku`,`isbn`,`judul`,`penulis`,`kdpenerbit`,`sinopsis`,`thnTerbit`,`stok`,`kdjenis`,`image`) values 
('B0001','9786023396269','Kurokos Basketball 13  ','Tadatoshi Fujimaki','002','Setelah berlatih keras, akhirnya tim Seirin siap menghadapi Winter Cup. Siapa sangka lawan pertama mereka adalah...?',NULL,5,'02','15120001.jpg'),
('B0003','9786023396351','Friendless Yugami','JUN SAKURA','002','Di depan Yugami-kun yang berprinsip \"Aku tidak butuh teman\", muncul seseorang yang mengaku dirinya sebagai sahabat Yugami.\r\nLalu, ada yang mengusulkan Yugami-kun sebagai kapten baru klub Baseball, padahal Yugami sama sekali tidak tertarik bergaul.\r\nHari-hari yang dia ingin nikmatinya seorang diri malah dihantam badai kesalahpahaman! \r\n',NULL,7,'02','15120003.jpg'),
('B0004','9786026826022 ','Cjr The Movie Edisi Komik ','Hilman Mutasi & Yanto Prawoto','003','Keputusan salah satu sahabat mereka mengundurkan diridari Coboy Junior membuat Iqbal, Aldi, dan Kiki merasa kehilangan. Disaat itulah ketiga personil Coboy Junior yang tersisa merasa gelisah. Beruntung mereka memiliki Produser seperti Patrick (Abimana Aryasatya). Patrick pun mengajak mereka untuk melakukan perjalanan keliling Australia di temani Jimmy (Arie Kriting). Selama berada di Australiia, Iqbal, Aldi, dan Kiki juga berlatih vokal dan fisik dengan D-Doc (Rio Dewanto) dan Melisa yang terkenal tegas dan sangat disiplin. Akhirnya perjalanan CJR ke Australia berakhir. Mereka harus kembali ke Indonesia. Justru ujian sesungguhnya akan mereka hadapi saat mereka akan melakukan konser yang megah. Banyak cobaan besar mereka hadapi menjelang konser. Lalu, mampukah Iqbal, Aldi, dan Kiki menghadapi cobaan yang menghadang, dan akankah konser mereka terlaksana?',NULL,9,'02','15120004.jpg'),
('B0005','9786022911029 ','Ayah','Andrea Hirata','004','Betapa Sabari menyayangi Zorro. Ingin dia memeluknya sepanjang waktu. Dia terpesona melihat makhluk kecil yang sangat indah dan seluruh kebaikan yang terpancar darinya. Diciuminya anak itu dari kepala sampai ke jari-jemari kakinya yang mungil. Kalau malam Sabari susah susah tidur lantaran membayangkan bermacam rencana yang akan dia lalui dengan anaknya jika besar nanti. Dia ingin mengajaknya melihat pawai 17 Agustus, mengunjungi pasar malam,  membelikannya mainan, menggandengnya ke masjid,  mengajarinya berpuasa dan mengaji, dan memboncengnya naik sepeda saban sore ke taman kota.','2014',4,'04','B0005.jpg'),
('B0006','9786022552949','Wings For Dream Before Sunshine Comes  ','Lee Hyona','005','Seorang calon pianis muda diam-diam menemukan kebahagiaan ketika menari. Terlebih ketika seorang superstar bernama Choi Dongwoo pindah ke sekolahnya. Sementara itu, sosok dingin Hwang Jisung makin menguatkan tekad Soohyo untuk mengikuti tawaran audisi Dongwoo. Inilah pintu masuk yang membuatnya sadar akan nyatanya persaingan kejam dunia hiburan Korea. Tidak hanya itu, pesan-pesan misterius yang diterimanya pun terus membuatnya penasaran.',NULL,4,'04','15120006.jpg'),
('B0007','9789791102681 ','BURLIAN','Tere Liye ','006','-',NULL,0,'04','15120007.jpg'),
('B0008','9786023751471 ','Forget Me Not ','Cherry Zhang ','007','Kecelakaan itu mengubah Daniel menjadi pribadi yang keras dan getir. pria itu hidup dengan memendam kebenciannya terhadap sosok gadis yang pernah dikasihinya. Saat sang waktu berpihak padanya dan mempertemukan mereka kembali di kota tempat segalanya berawal, Daniel memanfaatkan segala kesempatan yang ada untuk mendapatkan keadilan, Ia bertekad memusnahkan semua yang dimiliki Amelia, termasuk kehormatan dan kebanggaan diri istrinya itu.',NULL,4,'04','15120008.jpg'),
('B0009','9789791090919','Project PHP & MySQL1 : Membuat Website Buku Digita','YM. Kusuma Ardhana., S.T.','008','Pernah melihat website yang bisa menampilkan ebook dengan tampilan yang kererr dan dapat langsung dibaca pada website tersebut? sebut saja SCRIBD.COM. Pada buku ini, penulis rancang dan susun untuk mengetahui bagaimana membuat sebuah website penampil ebook yang mirip SCRIBD.COM, yang tentunya dengan bahasa yang sederhana, mudah dipelajari dan mudah dimengerti.\r\n\r\nPembahasan dalam buku ini meliputi: Pengenalan Electronic Book, WAMP Server, Pemrograman HTML5, Database MySQL, Pemrograman Dasar PHP, Flex Paper Viewer, SWF Tools, Proyek Membuat Website Ebook, Proyek Membuat Menu Admin Website Ebook, Cara Memasukkan Konten Melalui Halaman Admin Website Ebook.',NULL,3,'03','15120009.jpg'),
('B0010','9789792927450 ','Algoritma dan Pemrograman','Dr. Suarga, M.Sc., M.Math.,Ph.','009','Apakah Anda tertarik untuk menjadi programmer komputer? Bila jawaban Anda,Ya, maka mulailah dari algoritma pemrograman. Buku ini menjelaskan konsep dasar penyusunan program komputer. Pembahasannya dibagi menjadi empat belas bab mulai dari dasar-dasar desain program prosedural hingga konsep pemrograman berorientasi objek. Buku ini dilengkapi dengan ringkasan pemrograman dalam berbagai bahasa populer seperti Basic, Pascal, C/C++, Java, Matlab, dan C#.',NULL,-2,'03','15120010.jpg'),
('B0011','9786020275291','Pemrograman Java dari Nol  ff','Tim EMS','010','Saat ini, aplikasi berbasis web maupun desktop banyak memanfaatkan pemrograman Java karena sifatnya yang sangat universal dan dapat langsung diaplikasikan ke berbagai sistem informasi. ï¿½Write Once, Run Anywhereï¿½ adalah slogan yang menggambarkan keunggulan pemrograman Java. Sekali tulis, bisa jalan di berbagai platform. Dengan keunggulan seperti itu, Anda tidak salah jika mencoba mempelajari pemrograman Java dan ini adalah buku yang tepat bagi Anda yang ingin belajar pemrograman Java dari nol. Materi dijelaskan secara bertahap sehingga mudah diikuti. - Mengenal Java. - Menyiapkan infrastruktur pemrograman. - Cara penulisan dan pemrograman Java untuk pemula. - Pemrograman Java lanjutan. Setelah menguasai teknik dasar pemrograman Java dari nol, diharapkan Anda bisa berkembang dengan kreativitas sendiri dan mengembangkan pemrograman lebih lanjut sesuai yang dibutuhkan','2016',0,'03','15120011.jpg');

/*Table structure for table `jenis` */

DROP TABLE IF EXISTS `jenis`;

CREATE TABLE `jenis` (
  `kdjenis` varchar(2) NOT NULL,
  `nmjenis` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kdjenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jenis` */

insert  into `jenis`(`kdjenis`,`nmjenis`) values 
('01','FIKSI'),
('02','KOMIK'),
('03','KOMPUTER'),
('04','NOVEL'),
('06','AGAMA ISLAM'),
('07','HUKUM');

/*Table structure for table `penerbit` */

DROP TABLE IF EXISTS `penerbit`;

CREATE TABLE `penerbit` (
  `kdpenerbit` varchar(3) NOT NULL,
  `nmpenerbit` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`kdpenerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penerbit` */

insert  into `penerbit`(`kdpenerbit`,`nmpenerbit`) values 
('001','GRAMEDIA PUSTAKA'),
('002','M & C'),
('003','Falcon publishing'),
('004','Bentang pustaka'),
('005','Gaca aca'),
('006','Republika'),
('007','Grasindo'),
('008','Jasakom'),
('009','Andi Publiser'),
('010','Elek Media Komputindo'),
('011','gramedia');

/*Table structure for table `sysparam` */

DROP TABLE IF EXISTS `sysparam`;

CREATE TABLE `sysparam` (
  `prog` varchar(10) NOT NULL,
  `nilai` text,
  `keterangan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`prog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sysparam` */

insert  into `sysparam`(`prog`,`nilai`,`keterangan`) values 
('CNTK','<p><b>Perpustakaan Nusa Mandiri</b>\n<br>\n<br>\nAnda bisa langsung menghungin kami melalui nomor di bawah ini\ndan anda bisa langsung datang ke perpustakaan langsung\n<br>\n<br>\nNo Telp : 0878999999<br></p>','Hubungi kami'),
('COMP_NAME','Perpustakaan Nusa Mandiri','Nama Perpustakaan'),
('LAMA','7','Maksimal lama peminjaman '),
('N_DENDA','2000','Nominal Denda perhari'),
('PD_PINJAM','<p><b>Panduan Peminjaman</b></p><ol><li>Silahkan anda Login terlebih dahulu, jika belum memiliki account silahkan lakukan pendaftaran</li><li>pilih buku yang akan anda pesan untuk meminjam</li><li>jika sudah selesai klik Keranjang Peminjaman</li><li>Klik tombol selesai</li><li>Kami akan menyiapkan buku yang anda pesan dan mengkonfirm pesanan anda.</li><li>anda bisa mengambil langsung pesanan anda di perpustakaan kami dengan menghubungi admin kami dan menunjukan bukti pemesanan<br></li></ol>','Panduan peminjaman'),
('SRT_PJM','Dalam waktu 2 hari buku yang di pinjam tidak di ambil,\r\nmaka peminjaman akan kami anggap batal\r\n\r\nTerimakasih','Sarat peminjaman yg ada d');

/*Table structure for table `t_pinjam` */

DROP TABLE IF EXISTS `t_pinjam`;

CREATE TABLE `t_pinjam` (
  `no_pinjam` varchar(10) NOT NULL,
  `tglpesan` date DEFAULT NULL,
  `tglpinjam` date DEFAULT NULL,
  `tglkembali` date NOT NULL DEFAULT '0000-00-00',
  `tglConfrim` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Tgl Confirm admin',
  `telat` int(4) NOT NULL DEFAULT '0',
  `denda` int(11) NOT NULL DEFAULT '0',
  `ket` varchar(100) DEFAULT NULL,
  `kdanggota` varchar(5) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0 = > NEW 1 => Confirm BY Admin 2 => Proses 3 = Finish 4 =>  Canceled',
  PRIMARY KEY (`no_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_pinjam` */

insert  into `t_pinjam`(`no_pinjam`,`tglpesan`,`tglpinjam`,`tglkembali`,`tglConfrim`,`telat`,`denda`,`ket`,`kdanggota`,`status`) values 
('2015120001',NULL,'2015-12-08','2015-12-11','2015-12-16',0,0,NULL,'A0002',3),
('2015120002',NULL,'2015-12-08','2015-12-18','2015-12-17',0,0,NULL,'A0003',0),
('2015120003',NULL,'2015-12-16','2015-12-18','0000-00-00',0,0,NULL,'A0002',2),
('2015120004',NULL,'2015-12-17','2015-12-22','0000-00-00',0,0,NULL,'A0002',0),
('2015120005',NULL,'2015-12-17','2015-12-22','0000-00-00',0,0,NULL,'A0004',0),
('2015120006',NULL,'2015-12-17','2015-12-22','2015-12-17',0,0,NULL,'A0004',3),
('2016050007',NULL,'2016-05-13','1970-01-01','0000-00-00',0,0,NULL,'A0002',0),
('2016050008',NULL,'2016-05-13','2016-05-20','0000-00-00',0,0,NULL,'A0002',0),
('2016050009',NULL,'2016-05-13','2016-05-20','0000-00-00',0,0,NULL,'A0002',0),
('2016070010','2016-07-02','2016-07-02','0000-00-00','0000-00-00',0,0,NULL,'A0003',0),
('2016070011','2016-07-02','2016-07-02','0000-00-00','0000-00-00',0,0,NULL,'A0003',2),
('2016070012',NULL,'2016-07-02','2016-07-09','0000-00-00',0,0,NULL,'A001',0),
('2016070013','2016-07-01',NULL,'0000-00-00','0000-00-00',0,0,NULL,'A001',0),
('2016070014','2016-07-03','2016-07-03','2016-08-10','0000-00-00',31,62000,NULL,'A0002',3),
('2016070015','2016-07-04','2016-07-04','2016-07-04','0000-00-00',0,0,NULL,'A0003',3);

/*Table structure for table `t_pinjam_detail` */

DROP TABLE IF EXISTS `t_pinjam_detail`;

CREATE TABLE `t_pinjam_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pinjam` varchar(10) DEFAULT NULL,
  `kdbuku` varchar(8) DEFAULT NULL,
  `nQty` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `t_pinjam_detail` */

insert  into `t_pinjam_detail`(`id`,`no_pinjam`,`kdbuku`,`nQty`) values 
(1,'2015120001','15120006',1),
(2,'2015120002','15120011',1),
(3,'2015120003','15120005',1),
(4,'2015120003','15120007',1),
(5,'2015120003','15120004',1),
(6,'2015120004','15120007',1),
(7,'2015120005','15120011',1),
(8,'2015120006','15120006',1),
(9,'2016050007','15120011',1),
(10,'2016050007','15120010',1),
(11,'2016050007','15120011',1),
(12,'2016050007','15120010',1),
(13,'2016050008','15120011',1),
(14,'2016050008','15120010',1),
(15,'2016050009','15120011',1),
(16,'2016050009','15120010',1),
(17,'2016070011','15120005',1),
(18,'2016070011','15120004',1),
(19,'2016070012','B0011',1),
(20,'2016070013','B0011',1),
(21,'2016070014','B0009',1),
(23,'2016070015','B0009',1);

/*Table structure for table `tmp_keranjang` */

DROP TABLE IF EXISTS `tmp_keranjang`;

CREATE TABLE `tmp_keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdbuku` varchar(8) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `kdanggota` varchar(5) DEFAULT NULL,
  `dCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tmp_keranjang` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
