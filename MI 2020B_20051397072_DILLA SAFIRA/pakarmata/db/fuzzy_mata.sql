-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 19. Oktober 2016 jam 17:58
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fuzzy_mata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE IF NOT EXISTS `bobot` (
  `id_bobot` int(4) NOT NULL AUTO_INCREMENT,
  `kd_gejala` varchar(4) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL,
  `bobot` int(1) NOT NULL,
  PRIMARY KEY (`id_bobot`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `kd_gejala`, `kd_penyakit`, `bobot`) VALUES
(1, 'g1', 'p1', 5),
(2, 'g2', 'p1', 1),
(3, 'g3', 'p1', 3),
(4, 'g4', 'p1', 5),
(5, 'g5', 'p1', 5),
(6, 'g6', 'p1', 3),
(7, 'g7', 'p1', 1),
(8, 'g8', 'p1', 5),
(9, 'g9', 'p1', 3),
(10, 'g10', 'p1', 3),
(11, 'g11', 'p2', 5),
(12, 'g12', 'p2', 3),
(13, 'g13', 'p2', 3),
(14, 'g14', 'p2', 1),
(15, 'g15', 'p3', 5),
(16, 'g16', 'p3', 5),
(17, 'g17', 'p3', 1),
(18, 'g18', 'p3', 5),
(19, 'g19', 'p4', 5),
(20, 'g20', 'p4', 3),
(21, 'g21', 'p4', 5),
(22, 'g22', 'p4', 1),
(23, 'g23', 'p4', 3),
(24, 'g24', 'p5', 3),
(25, 'g25', 'p5', 3),
(26, 'g26', 'p5', 5),
(27, 'g27', 'p5', 1),
(28, 'g28', 'p5', 5),
(29, 'g29', 'p5', 3),
(30, 'g30', 'p6', 5),
(31, 'g31', 'p6', 3),
(32, 'g32', 'p6', 3),
(33, 'g33', 'p6', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `kd_gejala` varchar(4) NOT NULL,
  `gejala` varchar(200) NOT NULL,
  PRIMARY KEY (`kd_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('g1', 'penglihatan mulai samar-samar dan berkabut'),
('g2', 'Mudah Silau'),
('g3', 'hanya bisa melihat normal pada cukup cahaya'),
('g4', 'Terlihat DUA'),
('g5', 'Mengapa katarak terlihat sembirat kuning/ coklat'),
('g6', 'Sering Ganti lensa'),
('g7', 'Warna memudar'),
('g8', 'Penglihatan kacau waktu malam'),
('g9', 'Merasa melihat lingkaran'),
('g10', 'Terganggu dengan cahaya gelap'),
('g11', 'Mata tampak berair dan berkabut'),
('g12', 'Mata menjadi sensitif terhadap cahaya'),
('g13', 'Mata terlihat membesar (akibat tekanan yang terjadi di dalam mata)'),
('g14', 'Mata terlihat juling'),
('g15', 'Kelenjar getah bening yang membesar di depan telinga'),
('g16', 'Mata terasa seperti terbakar'),
('g17', 'Saat bangun pagi, bulu mata akan terasa menempel atau lengket'),
('g18', 'Mata terasa seperti berpasir'),
('g19', 'Peradangan yang disebabkan bakteri akan memberikan gambaran klinik rasa sakit yang sangat'),
('g20', 'kelopak merah dan bengkak, kelopak sukar dibuka'),
('g21', 'konjungtiva kemotik dan merah, kornea keruh, bilik mata depan keruh'),
('g22', 'terjadi penurunan tajam penglihatan dan fotofobia (takut cahaya) '),
('g23', 'Endoftalmitis akibat pembedahan biasa terjadi setelah 24 jam dan penglihatan akan semakin memburuk dengan berlalunya waktu. Bila sudah memburuk, akan terbentuk hipopion, yaitu kantung berisi cairan pu'),
('g24', 'Kecenderungan untuk memegang bacaan lebih jauh, agar bisa lebih jelas melihat huruf.'),
('g25', 'Menyipitkan mata.'),
('g26', 'Penglihatan kabur ketika membaca dengan jarak normal.'),
('g27', 'Butuh lampu lebih terang saat membaca.'),
('g28', 'Sakit kepala atau mata menegang setelah membaca.'),
('g29', 'Kesulitan membaca cetakan huruf yang berukuran kecil.'),
('g30', 'Bintik mengambang (floater) pada lapangan pandang.'),
('g31', 'Titik gelap pada bagian tengah lapangan pandang.'),
('g32', 'Kesulitan melihat di malam hari.'),
('g33', 'Penglihatan kabur, atau bahkan kebutaan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
  `id_hasil` int(4) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(4) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hasil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_pasien`, `kd_penyakit`, `tanggal`) VALUES
(23, 6, '', '2013-08-13'),
(22, 6, '', '2013-08-13'),
(3, 2, 'p003', '2013-08-13'),
(4, 2, 'P001', '2013-08-13'),
(21, 6, '', '2013-08-13'),
(20, 6, 'p003', '2013-08-13'),
(19, 6, '', '2013-08-13'),
(18, 6, '', '2013-08-13'),
(17, 4, '', '2013-08-13'),
(16, 4, '', '2013-08-13'),
(11, 4, 'p003', '2013-08-13'),
(15, 0, '', '2013-08-13'),
(14, 0, '', '2013-08-13'),
(24, 6, 'P001', '2013-08-13'),
(25, 6, 'P001', '2013-08-13'),
(26, 6, 'P001', '2013-08-13'),
(27, 6, 'P002', '2013-08-13'),
(28, 6, 'P002', '2013-08-13'),
(29, 6, 'P002', '2013-08-13'),
(30, 6, 'P002', '2013-08-13'),
(31, 7, 'P002', '2013-08-15'),
(32, 7, 'p012', '2013-08-15'),
(33, 7, 'p012', '2013-08-15'),
(34, 8, 'P001', '2013-08-15'),
(35, 8, 'P001', '2013-08-15'),
(36, 10, 'p003', '2014-02-27'),
(37, 10, 'p003', '2014-02-27'),
(38, 10, 'p003', '2014-02-27'),
(39, 14, 'P001', '2014-09-25'),
(40, 14, 'P001', '2014-09-25'),
(41, 14, 'P001', '2014-09-25'),
(42, 16, 'P6', '2016-10-19'),
(43, 16, 'P6', '2016-10-19'),
(44, 17, 'P6', '2016-10-19'),
(45, 17, 'P6', '2016-10-19'),
(46, 17, 'P6', '2016-10-19'),
(47, 17, 'P6', '2016-10-19'),
(48, 17, 'P6', '2016-10-19'),
(49, 17, 'P6', '2016-10-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `kelamin` char(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `kelamin`, `umur`, `alamat`, `noip`, `tanggal`, `email`) VALUES
(4, 'misbah', 'Wanita', '2', 'Kureng panjo', '127.0.0.1', '2013-08-13 09:30:58', 'milzameriana@gmail.c'),
(5, 'nurul', 'Wanita', '22', 'Darusslam', '127.0.0.1', '2013-08-13 09:33:05', '22'),
(6, 'jainab', 'Wanita', '2', 'Tepupin punti', '127.0.0.1', '2013-08-13 09:35:31', 'zainab@yahoo.com'),
(7, 'icut', 'Wanita', '22', 'Lhokseumawe', '127.0.0.1', '2013-08-15 11:08:51', 'cutliati@gmail.com'),
(8, 'cut lia', 'Laki-laki', '2', 'lhokseumawe', '127.0.0.1', '2013-08-15 11:11:53', 'cutliati@gmail.com'),
(9, 'df', 'Laki-laki', '2', 'aceh timur', '127.0.0.1', '2013-09-16 04:16:18', '2'),
(10, 'adsf', 'Laki-laki', '3', 'langsa', '127.0.0.1', '2014-02-27 01:25:57', '2'),
(11, '45', 'Laki-laki', '4', 'lhok kumbe', '127.0.0.1', '2014-04-05 20:41:00', 'arongan@gmail.com'),
(12, 'dsf', 'Laki-laki', '3', 'jungka gajah', '127.0.0.1', '2014-04-30 00:08:09', '3'),
(13, 'Juli', 'Wanita', '22', 'Lhokseumawe', '', '2014-05-03 10:28:49', 'arongan@gmail.com'),
(14, '34', 'Laki-laki', '2', 'lhok seumiluem', '', '2014-09-25 08:08:30', '23'),
(15, 'Halimah', 'Laki-laki', '54', 'panteu breuh', '', '2015-10-26 03:59:23', 'halimah23@gmail.com'),
(16, 'Cut lia', 'Wanita', '23', 'Matang', '', '2016-10-19 22:46:55', 'cutlia@gmail.com'),
(17, 'Amri', 'Laki-laki', '23', 'Lhoksukon', '', '2016-10-19 22:49:08', 'amristmik@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `kd_penyakit` varchar(4) NOT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `definisi` text,
  `solusi` text,
  PRIMARY KEY (`kd_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
('P2', 'Glaukoma', 'Glaukoma merunjuk pada sekelompok penyakit yang menyerang saraf optik dan melibatkan hilangnya sel ganglion retina dalam pola yang khas. Glaukoma adalah sejenis neuropati (penyakit saraf) optik. Tekanan intraocular yang miningkat merupakan factor resiko yang signifikan pada perkembangan glaucoma (di atas 22 mmHg atau 2,9 kPa). Eseorang bias mengalami kerusakan saraf pada tekanan yang relatif rendah, sementara orang lain mungkin mempuanyai tekanan bola mata tinggi selama bertahun-tahun tapi tidak pernah menagalami kerusakan. Penyakit glaukoma yang tidak di obati akan mengakibatkan kerusan sarf optik yang permanen dan pada gilirannya akan kehilangan bidang penglihatan, yang dapat berkembang menjadi kebutaan.', 'Glaukoma bisa ditangani dengan obat tetes mata, obat-obatan yang diminum, pengobatan laser, atau prosedur operasi.\r\nObat tetes mata\r\nUmumnya obat tetes mata sering menjadi bentuk penanganan pertama untuk glaukoma yang disarankan oleh dokter. Obat tetes ini berguna melancarkan pembuangan cairan mata (aqueous humour) atau mengurangi produksinya.\r\n\r\nBeberapa jenis obat tetes mata untuk glaukoma adalah:\r\n\r\n    Alpha-adrenergic agonists. Obat ini berfungsi meningkatkan aliran aqueous humour dan mengurangi produksinya. Efek samping yang mungkin saja terjadi setelah menggunakan alpha-adrenergic agonists adalah pembengkakan, gatal, dan merah pada mata, badan terasa lelah, mulut kering, hipertensi, dan detak jantung tidak teratur. Beberapa contoh obat ini adalah brimonidine dan apraclonidine.\r\n    Beta-blockers. Obat ini bekerja dengan cara memperlambat produksi aqueous humour guna mengurangi tekanan intraokular pada mata. Efek samping yang mungkin terjadi setelah mengonsumsi beta-blockers adalah mata terasa gatal, tersengat, atau panas. Mata juga bisa menjadi kering. Beberapa contoh obat ini adalah timolol, levobunolol hydrochloride, dan betaxolol hydrochloride..\r\n    Prostaglandin analogue. Obat ini mampu memperlancar pengaliran aqueous humour sehingga tekanan di dalam mata berkurang. Efek samping yang mungkin terjadi setelah mengonsumsi prostaglandin analogue adalah sakit, bengkak, dan merah pada mata, mata menjadi sensitif terhadap cahaya, mata menjadi kering, menggelapnya warna mata, pembuluh darah pada bagian putih mata menjadi bengkak, serta sakit kepala. Beberapa contoh obat ini adalah travoprost, bimatoprost, latanoprost, dan tafluprost.\r\n    Carbonic anhydrase inhibitors. Obat ini bekerja dengan cara mengurangi produksi aqueous humour sehingga tekanan di dalam mata berkurang. Efek samping yang mungkin terjadi setelah mengonsumsi carbonic anhydrase inhibitors adalah iritasi pada mata, mulut terasa pahit dan kering, serta mual. Beberapa contoh obat ini adalah dorzolamide dan brinzolamide.\r\n    Cholinergic agents atau miotic. Obat ini bekerja dengan cara meningkatkan pengaliran aqueous humour. Efek samping yang mungkin terjadi setelah mengonsumsi cholinergic agents atau miotic adalah penglihatan menjadi buram dan pupil mengecil. Salah satu contoh obat ini adalah pilocarpine.\r\n    Sympathomimetics.  Obat ini mampu memperlancar pengaliran aqueous humour sekaligus mengurangi produksinya. Efek samping yang mungkin terjadi setelah mengonsumsi sympathomimetics adalah nyeri dan merah pada mata. Salah satu contoh obat ini adalah brimonidine tartrate.\r\n\r\nObat tetes mata tidak boleh digunakan secara sembarangan tanpa resep atau petunjuk penggunaannya dari dokter karena dikhawatirkan bisa berbahaya. Contohnya adalah reaksi obat beta-blockers yang malah memperburuk kondisi orang yang memiliki penyakit jantung dan asma.\r\nObat-obatan glaukoma yang diminum\r\nUntuk melengkapi kinerja obat tetes atau jika obat tetes terbukti kurang efektif, dokter kemungkinan akan meresepkan obat glaukoma yang diminum. Salah satu contohnya adalah carbonic anhydrase inhibitor. Efek samping yang mungkin terjadi setelah mengonsumsi obat ini adalah:\r\n\r\n    Sakit perut\r\n    Jari tangan atau kaki kesemutan\r\n    Sering buang air kecil\r\n    Batu ginjal\r\n    Depresi\r\n\r\nTerapi laser\r\nPada kasus glaukoma sudut tertutup, terapi laser ditujukan untuk membuka penyumbatan aqueous humour. Sedangkan pada kasus glaukoma sudut tertutup terapi laser ditujukan untuk memperlancar pengaliran cairan tersebut. Berdasarkan tekniknya, terapi laser dibagi menjadi tiga, yaitu:\r\n\r\n    Trabeculoplasty. Sumbatan di area trabecular meshwork dibuka menggunakan sinar laser.\r\n    Iridotomy. Aliran aqueous humour diperlancar dengan cara membuat lubang kecil pada iris menggunakan sinar laser.\r\n    Cyclodiode Laser Treatment. Produksi aqueous humour dibatasi dengan cara merusak sebagian kecil jaringan penghasil aqueous humour.\r\n\r\nProsedur operasi\r\nBerikut ini adalah jenis-jenis operasi glaukoma jika diurutkan berdasarkan penerapannya secara umum:\r\n\r\n    Trabeculectomy. Ini merupakan jenis operasi glaukoma yang paling umum. Trabeculectomy bertujuan memperlancar aliran aqueous humour dengan cara membuang sebagian dari trabecular meshwork.\r\n    Aqueous shunt implant. Ini merupakan prosedur operasi yang bertujuan memperlancar aliran aqueous humour dengan cara memasang sebuah alat kecil menyerupai selang pada mata.\r\n    Viscocanalostomy. Melalui operasi ini dokter akan membuang sebagian lapisan luar berwarna putih yang menutupi bola mata (sclera) untuk meningkatkan pembuangan aqueous humour.\r\n    Sclerectomy dalam. Operasi ini dilakukan guna memperlebar trabecular meshwork melalui pemasangan alat untuk melebarkan trabecular meshwork.\r\n'),
('P1', 'Katarak', 'Katarak merupakan penyakit mata yang dicirikan dengan adanya kabur pada lensa mata. Lensa mata normal transparan dan mengandung banyak air, sehingga cahaya dapat menenbusnya dengan mudah. Walaupun sesl-sel baru pada lensa akan selalu terbentuk, banyak factor yng dapat menyebabkan daerah di dalam lensa menjadi buram,keras dan pejal. Lensa yang tidak bening tersebut tidak akan bias menembuskan cahaya ke ritina untuk dip roses dan dikirim melalui saraf optik ke otak.', 'Tindak Lanjut Jika Terjadi Gejala Katarak\r\n\r\n    Konsultasi\r\n\r\nJika anda merasakan gejala tersebut, segera konsultasi dengan optisien (ahli lensa kacamata). Lakukan selalu jika ada perubahan-perubahan secara signifikan mengenai mata. Biasanya mereka akan melakukan penglihatan secara continuitas.\r\n\r\nMaka optisien mengecek mata anda dengan oftalmoskop. Fungsinya untuk memperjelas tampilan dalam organ mata. Lalu alat akan merespon cahaya sehingga optisien mampu mengidentifikasi gangguan lensa tersebut.\r\n\r\nJika anda benar terkena katarak, maka segera diobatkan pada spesialis dokter mata. Sebab beliau lebih tahu mana penanganan yang pas. Agar anda mendapatkan pengobatan yang sesuai.\r\n\r\n    Konsumsi vitamin A\r\n\r\nPerbanyaklah konsumsi makanan yang mengandung vitamin A. fungsinya untuk menjaga, merawat serta pengobatan mata. Salah satunya dengan mengonsumsi wortel. Kandungan vitamin A yang sangat banyak serta beta karoten yang membantu penglihatan lemah.'),
('P3', 'Konjungtivitis', 'Konjungtivitis adalah suatu peradangan pada Konjungtiva. Bayi baru lahir bias mendapat infeksi gonokokus pada Konjungtiva dari ibunya ketika melewati jalan lahir. Kerena itu setiap bayi baru lahir tetes mata (biasanya perak nitrat povidin iodin) atau salep antibiotik (misalnya eritromisin) untuk membunuh bakteri yang bisa menyebabkan Konjungtivitis gonookal. (misalnya jika cairan semen yang terinfeksi masuk kedalam mata). Biasanya Konjungtivitis hanya menyerang suatu mata. Dalam waktu 12-48 jam setelah infeksi mulai, mata menjadi merah dan nyeri. Jika tidak di obati bias terbentuk ulkuskarnea, abses, perforasi mata bahkan kebutaan. Konjungtivitis gonokokal biasa diberiakan tblet, suntik maupun tetes mata yang tekandung antibioik. ', 'Perawatan konjungtivitis yang dilakukan tergantung pada penyebabnya. Berikut ini adalah perawatan yang digolongkan berdasarkan penyebab terjadinya konjungtivitis.\r\nKonjungtivitis Alergi\r\nBeberapa hal yang bisa Anda lakukan sendiri untuk mengatasi konjungtivitis alergi:\r\n\r\n    Kompres mata dengan kain yang dibasahi air dingin.\r\n    Hindari terpapar alergen.\r\n    Jangan memakai lensa kontak hingga gejala konjungtivitis hilang.\r\n    Agar gejala tidak memburuk, jangan menggosok mata walau terasa gatal.\r\n\r\nJika telah melakukan hal-hal seperti yang disebutkan di atas namun gejala tidak kunjung mereda, dokter mungkin akan meresepkan beberapa obat seperti berikut ini.\r\n\r\n    Obat antihistamin baik dalam bentuk tetes mata atau obat minum. Guna obat ini adalah meredakan gejala alergi. Contoh antihistamin adalah azelastine, cetirizine dan emedastine. Pastikan pilihan obat antihistamin Anda cocok untuk usia anak Anda.\r\n    Pemakaian obat kortikosteroid jangka pendek dalam bentuk gel, salep, atau krim akan diresepkan jika gejala konjungtivitis alergi yang dialami cukup parah.\r\n    Obat mast cell stabilisers berguna mengendalikan gejala alergi untuk jangka waktu yang panjang. Dokter mungkin akan meresepkan obat antihistamin untuk digunakan bersamaan dengan obat ini karena mast cell stabilisers memerlukan waktu selama beberapa pekan untuk merasakan efeknya. Contoh obat tetes mata mast cell stabilisers yang biasa diresepkan adalah nedocromil sodium, sodium cromoglicate, dan lodoxamide.\r\n\r\nKonjungtivitis Papiler Raksasa\r\nLensa kontak adalah penyebab paling umum pada konjungtivitis papiler raksasa. Dengan berhenti memakai lensa kontak, gejala konjungtivitis akan reda.\r\n\r\nJika Anda menjalani operasi mata, dan mengalami konjungtivitis, segera temui oftalmologis untuk mendapatkan perawatan yang efektif.\r\nKonjungtivitis Infektif\r\nAda beberapa cara yang bisa Anda lakukan sendiri untuk mengatasi konjungtivitis infektif karena kebanyakan tidak memerlukan perawatan medis dan akan menghilang dalam waktu 1-2 pekan. Di bawah ini ada beberapa cara yang bisa dilakukan untuk meredakan gejala yang dialami.\r\n\r\n    Gunakan obat tetes air mata yang berguna sebagai pelumas untuk meredakan rasa sakit dan lengket pada mata. Obat ini bisa dibeli secara bebas di apotek.\r\n    Cucilah tangan secara rutin setelah menyentuh mata yang terinfeksi agar tidak menular.\r\n    Jangan menggunakan lensa kontak sebelum gejala infeksi hilang atau setidaknya satu hari setelah menyelesaikan perawatan. Ganti lensa kontak yang telah dipakai saat terinfeksi karena kemungkinan bisa menjadi sumber infeksi.\r\n    Gunakan kain kapas yang dibasahi untuk membersihkan kelopak dan bulu mata dengan lembut agar tidak lengket.\r\n\r\nJika gejala yang dialami tidak kunjung mereda setelah dua pekan atau infeksi yang terjadi cukup parah, dokter akan meresepkan obat antibiotik. Ada dua tipe utama antibiotik yang mungkin diberikan, yaitu chloramphenicol dan fusidic acid.\r\n\r\nBiasanya dokter akan meresepkan obat tetes mata chloramphenicol sebagai alternatif pertama, namun salep mata antibiotik akan diresepkan jika pasien tidak cocok dengan obat tetes mata. Penglihatan mungkin akan menjadi buram selama 20 menit setelah pemakaian salep mata. Pastikan untuk mengikuti anjuran dokter tentang cara pemakaian obat.\r\n\r\nSelain obat tetes mata chloramphenicol, ada juga obat tetes mata fusidic acid. Anak-anak, wanita hamil, dan orang yang berusia lanjut lebih cocok untuk menggunakan obat tetes mata fusidic acid. Ikuti anjuran dokter untuk cara pemakaian obat.\r\n\r\nJika mengalami gejala seperti kehilangan penglihatan, mata terasa sakit, salah satu atau kedua mata berwarna sangat merah, mengalami fotofobia atau sensitif terhadap cahaya, temui dokter untuk pemeriksaan lanjutan. Pemeriksaan bertujuan untuk memeriksa apakah pasien menderita penyakit menular seksual yang bisa menyebabkan terjadinya konjungtivitis infektif, seperti chlamydia (klamidia).'),
('P4', 'Endoftalmitis', 'Endoftalmitis yaitu perandanga pada seluruh lapisan mata bagian dalam, cairan dalam bola mata (humor vitreus) dan bagian putih mata (sklera).', 'Mengingat endoftalmitis merupakan penyekit yang berbahaya dan darurat. Penanganan dan pengobatan yang tepat dan cepat harus diberikan. Karena apabila tidak segera ditangani akan menimbulkan masalah yang makin parah, bahkan bisa menyebebkan kehilangan bola mata dan kebutaan permanen. Pengobatan pada penyakit ini ditentukan pada faktor penyebabnya.\r\n\r\nBila penyakit mata ini disebabkan oleh adanya bakteri yang menyebabkan infeksi langkah yang paling efektif adalah dengan memberikan obat antibiotik untuk mata. Bisa berbentuk tetes tetes, pel oral, atau lewat intra vena. Bisa juga pengobatan dengan memberikan suntikan antibiotik secara langsung pada mata. Ini cara paling bagus, karena obat langsung dapat mencapai titik luka. Akan tetapi ini harus dilakukan oleh saran dokter dan dilakukan oleh dokter yang sudah profesional, karena sangat berbahaya apabila terjadi kesalahan.\r\n\r\nDan apabila disebabkan oleh adanya jamur, maka langkah yang harus dilakukan adalah memberikan obat atau senyawa anti jamur untuk mata. Senyawa anti jamur antara lain seperti amphoterichin B dan fluconazol. Untuk ampeoterichin B adalah obat yang disuntikan langsung pada mata. Sekali lagi bahwa ini hanya boleh dilakukan oleh saran dokter dan hanya boleh dilakukan oleh dokter yang sudah profesional karena kesalahan kecil saja akibatnya sangat fatal. Untuk fluconazol adalah obat oral atau diminum langsung.\r\n\r\n'),
('P8', 'Ulkus kornea', 'Ulkus kornea yaitu luka terbuka pada lapisan kornea yang paling luar.', '-'),
('P9', 'Dakriosistitis', 'Dakriosistitis adalah suatu infeksi pada kantong air mata (sakus lakkrimalis).', '-'),
('P10', 'Blefaritis', 'Blefaritis adalah suatu peradangan pada kelopak mata. Blefaritis ditandai dengan pembebtukan minyak berlebihan didalm kelenjar di dekat kelopak mata yang merupakan lingkungan yang disukai oleh bakteri yang dalam keadaan normal ditemukan dikulit.', '-'),
('P5', 'Presbiopia', 'Presbiopia, yang biasa disebut penglihatan tua (presby = old = tua ; opia = vision = penglihatan) merupakan keadaan normal sehubunagn dengan usia, dimana kemampuan akomodasi seseoarang telah mengalami penurunan sehingga sampai pada tahap di mana penglihatan pada jarak dekat menjadi kurang jelas. Ini sejalan dengan penurunan fisiologis amlitudo akomodasi yang di mulai sejak seseorang berumur tahun, dan bervariasi dengan individu, pekerjaan, dan kelainan refraksi.', 'Pengobatan Presbiopi\r\nTujuan pengobatan presbiopi adalah membantu ketidakmampuan mata untuk fokus pada benda berjarak dekat. Beberapa cara pengobatan presbiopi adalah:\r\n\r\n    Kacamata. Penggunaan kacamata adalah cara sederhana dan aman untuk menangani presbiopia. Jika kacamata baca biasa tidak bisa menangani, pasien mungkin akan diresepkan kacamata berlensa khusus untuk presbiopia.\r\n    Lensa kontak. Alat ini bisa digunakan bagi pasien yang tidak ingin mengenakan kacamata. Namun, lensa kontak mungkin tidak bisa digunakan jika penderita juga mengidap kondisi tidak normal pada kelopak mata, saluran air mata, dan permukaan mata.\r\n    Bedah refraktif. Prosedur ini bertujuan untuk mengubah bentuk kornea mata untuk meningkatkan penglihatan jarak dekat. Namun, pasien tetap membutuhkan kacamata usai pembedahan untuk aktivitas yang membutuhkan penglihatan jarak dekat.\r\n    Implan lensa. Pada prosedur ini, lensa mata penderita akan diganti dengan lensa mata sintetis. Umumnya, pasien yang memilih prosedur ini pernah menjalani pembedahan LASIK sebelumnya.\r\n    Inlay kornea. Dokter akan memasukkan ring plastik kecil di sudut setiap kornea mata untuk mengubah lengkungannya. Risiko inlay kornea lebih kecil jika dibandingkan tindakan pembedahan mata lainnya.\r\n'),
('P6', 'Myopia', 'Bila saat ini anda merasakn kesuliatan melihat benda yang jauh tetapi tidak masalah jika melihat benda yang dekat maka kemungkinan anda menderita apa yang dinamakan minus atau myopia. Myopia memang penyakit yang sangat populer dan menyerang antara 22% sampai 30% dari populasi. Gangguan mata ini dengan mudah dapat di koreksi menggunakan kaca mata, lensa kontak atau operasi', '-'),
('P7', 'Retinopati', 'Retinopati hipertensi (Hypertensive retinopathy) aaadalah kerusakan pada retina sebagai akibat tekanan darah tinggi.', ' Pengobatan\r\n\r\nHal pertama dan penting untuk pengobatan adalah mengontrol kadar gula darah sehingga tetap berada dalam rentang nilai normal. Dengan demikian, keparahan penyakit dapat dihindari. Selain kami anjurkan pasien untuk terus menjaga diet makanan, kami sarankan pasien untuk mengkonsumsi kapsul herbal untuk mengatasi penyakit diabetesnya. Kita semua tahu bahwa diabetes memang tidak bisa disembuhkan secara total, tapi penyakit ini bisa ditekan efek sampingnya atau dijaga supaya tidak semakin parah dan penderita bisa hidup dengan cukup sehat.\r\n\r\nPada retinopati yang mengalami perdarahan dapat dilakukan focal laser treatment untuk menghentikannya. Selain itu, terapi laser lain seperti scatter laser treatment dapat membantu mengecilkan pembuluh darah yang baru terbentuk.\r\n\r\nJika perdarahan banyak, dapat dilakukan operasi untuk membuang darah tersebut. Tindakan ini disebut vitrektomi.\r\n\r\nPencegahan\r\n\r\nUntuk mencegah timbulnya atau memberatnya retinopati diabetik, beberapa langkah dapat ditempuh, antara lain :\r\n\r\n    Menerapkan gaya hidup sehat yaitu dengan makan makanan yang dianjurkan bagi penderita diabetes, berolahraga teratur, tidak merokok, hindari stress, dll.\r\n\r\n    Mengecek kadar gula darah secara rutin untuk mengontrol kadar gula.\r\n\r\n    Memeriksakan mata secara teratur setiap tahun. Manfaatnya adalah mengetahui perkembangan retinopati diabetik. Dengan demikian dapat dilakukan antisipasi agar penyakit ini tidak semakin parah. Pada tahap dini, retinopati diabetik relatif lebih mudah dikendalikan.\r\n\r\nSampai saat ini, sudah banyak klien kami yang menggunakan Obat Terapi Mata Alami untuk membantu penderita diabetes yang mengalami KATARAK ataupun GLAUKOMA. Sedangkan untuk masalah retinopati, Obat Terapi Mata Alami berfungsi sebagai terapi penunjang, bukan terapi utama dan satu-satunya yang Anda andalkan. Jika Anda mengalami retinopati yang sudah sangat parah, kami sarankan Anda menghubungi dokter mata untuk pertolongan lebih lanjut.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_analisa`
--

CREATE TABLE IF NOT EXISTS `tmp_analisa` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  PRIMARY KEY (`noip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_analisa`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `noip` int(3) NOT NULL AUTO_INCREMENT,
  `kd_gejala` char(4) NOT NULL,
  `bobot` int(1) NOT NULL,
  PRIMARY KEY (`noip`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131327 ;

--
-- Dumping data untuk tabel `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`noip`, `kd_gejala`, `bobot`) VALUES
(131320, 'g1', 0),
(131321, 'g28', 0),
(131322, 'g29', 0),
(131323, 'g30', 0),
(131324, 'g31', 0),
(131325, 'g32', 0),
(131326, 'g33', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penyakit`
--

CREATE TABLE IF NOT EXISTS `tmp_penyakit` (
  `noip` varchar(30) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`noip`, `kd_penyakit`, `nilai`) VALUES
('', 'p1', 0.14705882352941),
('', 'p2', 0),
('', 'p3', 0),
('', 'p4', 0),
('', 'p5', 0.15),
('', 'p6', 0.3125);
