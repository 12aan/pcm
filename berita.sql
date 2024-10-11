-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 10:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `tanggal_lahir`, `alamat`, `email`, `no_hp`, `username`, `password`, `avatar`) VALUES
(6, 'afif', '2024-03-01', 'bantul, karanganom', 'admin@gmail.com', '082235722026', 'afif', '81dc9bdb52d04dc20036dbd8313ed055', 'Bilateral_Flags_ID-PS2.jpg'),
(11, 'afif Nurwidianto', '2024-04-05', 'bantul, karanganom', 'afiff@gmail.com', '0822357220277', 'ham', '996eea1bd2961d914cbfdced6b6c61ae', 'praktik_magang_drawio1.png'),
(12, 'faris rizaldi', '2001-01-02', 'jayapura karanganom', 'faris@gmail.com', '082235722026', 'faris', '1fc91e308c3d2977c8d2973bfd889d8b', 'kkkkk12.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `tanggal_upload`, `judul_berita`, `isi_berita`, `avatar`) VALUES
(3, '2024-04-06 06:13:26', 'Muhammadiyah Dan Aisyiyah Bangunjiwo Barat Adakan Musyawarah Ranting III', 'muhammadiyah yakaaannnnn', 'b69b819aa2f6670fb37398944c811010.jpeg'),
(6, '2024-05-06 05:29:08', 'PRM Bangunjiwo Barat Berbagi Dengan Warung Gratis Sembako Hadapi Kekejaman Covid-1999', 'Alhamdulillah yaalllah kereeeennnn bangetttt', 'c21e17450de189cc559a7730f6552ea5.jpeg'),
(19, '2024-05-06 05:27:40', 'Mohon Doa Dan Restu Pembangunan Masjid Dan Gedung Muhammadiyah Qur’an School (MQS) PCM Kasihan', 'BANTUL, Suara Muhammadiyah – PCM Kasihan menyelenggarakan Rapat Kerja bertempat di SMA Muhammadiyah Kasihan, Bantul. Ahad (10/12/2023). Rapat Kerja ini mengusung tema “Mewujudkan PCM Kasihan Unggul, Mandiri, dan Berkemajuan”. Kegiatan tersebut dihadiri oleh 9 Pimpinan Muhammadiyah Kasihan, ketua dan anggota majelis lembaga PCM Kasihan periode 2022-2027, PRM se-Kapanewon Kasihan sekitar 17 ranting.  Pada saat bersamaan, juga mengundang PDM Bantul yang dihadiri oleh Aris Samsugito, SAg, PCA Kasihan, PC PM Kasihan, PC NA Kasihan, KWARCAB HW Kasihan, PC TS Kasihan, PC IPM Kasihan, juga mengundang narasumber dari LPM UMY Bapak Dr. Ir. Gatot Supangkat, M.S.IPM. Kegiatan dalam rapat kerja meliputi motivasi dari LPM UMY dan paparan program kerja majelis lembaga PCM Kasihan.  Dengan adanya rapat kerja PCM Kasihan ini memiliki beberapa harapan yang sudah tercermin dalam tema kegiatan. Dalam sambutannya Agus Mulyono, SE selaku Ketua PCM Kasihan periode 2022-2027 menyampaikan bahwa tempat yang digunakan untuk rapat kerja PCM Kasihan memilih di SMA Muh Kasihan karena ada maksud tersendiri, yaitu karena ingin mengangkat dan menguatkan SMA Muh Kasihan.  Selain hal itu juga keinginan PCM Kasihan dapat unggul mandiri dan berkemajuan dalam mengelola amal usaha juga dakwah. Dengan mewujudkan hal tersebut PCM Kasihan memiliki langkah mensinergikan LPM UMY dengan PCM Kasihan.  Pada akhir sambutannya Ketua PCM Kasihan menyampaikan untuk mempererat sinergi dengan bertujuan agar lebih mandiri dalam menghidupkan pergerakan Muhammadiyah. Dalam Sambutan PDM Bantul Aris Samsugito, SAg menyampaikan “Mari bergerak secara bersama sama jangan sendiri, peneguhan ideologi yang perlu menjadi prioritas kita. Perkuat akar rumput, minimal basis data sudah dimiliki untuk langkah awal,”ujarnya. PDM Bantul juga mengingatkan bahwa dakwah generasi Z perlu diperhatikan dan gerakkan sebagai aset masa depan.  Di sisi lain, Dr. Ir. Gatot Supangkat, M.S.IPM mengingatkan dalam sesi motivasinya, bila bicara tentang Muhammadiyah maka riilnya ada di rantingnya masing-masing sebagai garda terdepannya Muhammadiyah.  “Ranting perlu memiliki beberapa titik pengajian dan amal usaha. Indikator kinerja untuk suksesnya dakwah Muhammadiyah meliputi (pembinaan jamaah, Kepemimpinan organisasi & manajemen, Pemberdayaan ekonomi dan sosial keumatan, Daya pengaruh dan penguasaan media dakwah media informasi),” katanya.  Gatot juga menjelaskan bahwa kemajuan juga akan berdampak baik juga bisa membawa dampak buruk maka diperlukan sinergitas satu kesepakatan bahwa berkembangnya organisasi Muhammadiyah karena ada kebersamaan, kesungguhan, dan keikhlasan. Ia menambahkan orang profesional pasti ikhlas, selalu percaya bahwa rezeki sudah terporsi Allah SWT dan akan naik turun berdasarkan profesionalitas dan keikhlasan.  “Dengan landasan teologis LPM UMY dari Al Ma’un dan adz dzariyat ayat 56 insyaAllah LPM UMY siap bekerjasama dengan PCM Kasihan dalam bentuk pengabdian-pengabdian,” jelasnya.  Penyampaian program kerja menjadi acara inti dalam rapat kerja PCM Kasihan. Paparan program dilakukan oleh setiap majelis lembaga di PCM Kasihan meliputi Majelis Tarjih dan Tabligh, Majelis Pendidikan Dasar Menengah dan Pendidikan Non Formal, Majelis Pendidikan Kader dan Sumber Daya Insani, Majelis Pembinaan Kesehatan Umum, Majelis Pembinaan Kesejahteraan Sosial, Majelis Ekonomi Bisnis dan Parwisata, Majelis Pendayagunaan Wakaf.  Selain itu, ada juga Majelis Pemberdayaan Masyarakat, Majelis Hukum dan Hak Asasi Manusia, Majelis Lingkungan Hidup dan Resiliensi Bencana, Majelis Pustaka dan Informasi, Lembaga Pengembangan Ranting dan Pembinaan Masjid, Lembaga Amil Zakat Infaq Sedekah, dan Lembaga Seni Budaya dan Olah Raga.  Acara kemudian ditutup oleh ketua PCM Kasihan Bapak Agus Mulyono S.E. dengan mengingatkan kembali tema rapat kerja bahwa melalui sinergitas antar majelis dan Lembaga diharapkan mampu mewujudkan PCM Kasihan Unggul, mandiri, dan berkemajuan. (MPI PCM Kasihan/Cris)  Sumber : suaramuhammadiyah.id dengan judul: Wujudkan PCM Unggul, Mandiri, dan Berkemajuan, PCM Kasihan Gelar Raker, https://www.suaramuhammadiyah.id/read/wujudkan-pcm-unggul-mandiri-dan-berkemajuan-pcm-kasihan-gelar-raker', '0f77f2a49f7a322929571da8f5d6d1db.jpeg'),
(20, '2024-05-06 05:28:52', 'MADSAKA Langsungkan Upacara Kemerdekaan RI Ke-78', 'Bangunjiwo – MTsS Muhammadiyah Kasihan pada ( 17/08/2023) melangsungkan Upacara Kemerdekaan Republik Indonesia yang ke-78.Kegiatan upacara kemerdekaan Republik Indonesia ke-78 tersebut dilaksanakan di lapangan Asriharjo.Adapun yang betindak sebagai Inspektur Upacara adalah Sumaryono ( Ketua PRM Bangunjiwo Barat ).  Rangkaian kegiatan dimulai dengan pemimpin pasukan memasuki lapangan upacara menyiapkan pasukannya masing – masing,komandan upacara memasuki lapangan upacara,inspektur upacara memasuki tempat upacara,dilanjutkan penghormatan kepada inspektur upacara dipimpin oleh komandan upacara.Kemudian pengibaran bendera merah putih diiringi lagu kebangsaan Indonesia Raya, mengheningkan cipta dipimpin oleh inspektur upacara,pembacaan teks proklamasi,pembacaan teks pancasila ditirukan oleh peserta upacara dan dilanjutkan dengan urutan tata upacara berikutnya.  Dalam amanatnya Ketua PRM Bangunjiwo Barat, Sumaryono menyampaikan, tema HUT RI ke-78 ini adalah “Terus Melaju Untuk Indonesia Maju”. Dalam tema itu ada semangat estafeta, ada pengkaderan kepada generasi muda sebagai penerus generasi tua. Guru adalah pahlawan tanpa tanda jasa,mempunyai peran dalam memajukan generasi muda Indonesia, Seperti yang sudah kita ketahui bersama bahwa guru itu digugu lan ditiru, guru yang inspiratif mesti menjadi teladan yang baik. Maka selayaknya sebagai siswa wajib menghormati guru, para siswa MTsS Muhammadiyah Kasihan saat ini hendaklah menjadikan dirinya seorang pahlawan, yakni belajar dengan sungguh-sungguh berjuang melawan kebodohan.  Disampaikan juga bahwa kita harus berterimakasih kepada para pahlawan dan syuhada dengan mendoakannya. Kita perlu mengambil contoh, meneladani  para pahlawan dan syuhada yang telah berjuang untuk kemerdekaan Indonesia dengan syaja’ah yakni berani karena benar, rela berkorban dengan harta dan jiwanya, ikhlas tanpa pamrih.  Tidak lupa beliau menyapa Mahasiswa PLP Universitas Ahmad Dahlan yang berkesempatan hadir dan menyampaikan Selamat berjuang generasi penerus,yang nantinya akan menjadi generasi penerus  di dalam bidang pendidikan,tuturnya. Upacara HUT RI ke-78 MTsS Muhammadiyah Kasihan diakhiri dengan pengumuman MADSAKA AWARD untuk Guru,Tenaga Kependidikan dan Siswa terfavorit, pemberian penghargaan kepada guru berprestasi dan siswa berprestasi,bidang Akademik dan Non Akademik yang diserahkan oleh Ketua PRM Bangunjiwo Barat. (gun/mar)', '5078842d6df4e921c1ab9d311e5088ed.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `id_news` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(255) NOT NULL,
  `isi_content` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breaking_news`
--

INSERT INTO `breaking_news` (`id_news`, `tanggal_upload`, `judul_berita`, `isi_content`, `avatar`) VALUES
(3, '2024-05-08 06:54:55', 'percayalah padaku yakannnnnnn', 'wasjnxjhkbcjhsdbchdsbfchbchjfdbnvcjh', '04281f852e83c79a038f4fd2baadb0d9.jpeg'),
(4, '2024-05-08 06:55:09', 'kajnfcsdkcnsdjhc', 'sdcnhjszbchvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvhvh', '290d4277692eb49491852fc2e05ecd6a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(255) NOT NULL,
  `isi_content` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `tanggal_upload`, `judul_berita`, `isi_content`, `avatar`) VALUES
(1, '2024-04-07 16:56:19', 'asdcscsdc  dejwshecfsduhc aku', 'sadxsacsdcd', 'f9e11b5de84e8a1743222c7da7bef6c6.jpg'),
(2, '2024-04-07 16:50:54', 'dcv jndjv nzjkf', 'dnljvcndfjvnjhn', '3932156a848a7f37049e034ae9cf71571.jpg'),
(3, '2024-04-07 16:56:29', 'sdc jndcj hdnfh', 'cnjdslcvzcccccczczczczczczczczczczczczczczczczczczz', '4d2f2b8c38c73e4d0229109ac15eab4d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ibrah`
--

CREATE TABLE `ibrah` (
  `id_ibrah` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(255) NOT NULL,
  `isi_content` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ibrah`
--

INSERT INTO `ibrah` (`id_ibrah`, `tanggal_upload`, `judul_berita`, `isi_content`, `avatar`) VALUES
(2, '2024-04-07 17:12:55', 'dcmncxdjncjdxsbckj  sfiudehcusdhcuds kkkk', 'sfcbsdhgcbsghdc', '7871317a03cb95b10d0cfb21323c0ff4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kabar_ranting`
--

CREATE TABLE `kabar_ranting` (
  `id_kabar_ranting` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` text NOT NULL,
  `isi_content` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kabar_ranting`
--

INSERT INTO `kabar_ranting` (`id_kabar_ranting`, `tanggal_upload`, `judul_berita`, `isi_content`, `avatar`) VALUES
(1, '2024-04-07 17:27:21', 'cskcmjszjhcdsd', 'dshcudscgksd', 'b4448e74fc51a6e96ff88b5b170a9afc.png'),
(2, '2024-04-07 17:28:03', 'jjjjjjjjjjjjjjjjjj', 'wasjnxjhkbcjhsdbchdsbfchbchjfdbnvcjh', '05bc6b90c0f114f732242428619d0eda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notulensi`
--

CREATE TABLE `notulensi` (
  `id_notulensi` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `agenda` varchar(255) NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `file_path_undangan` varchar(255) NOT NULL,
  `file_path_notulensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notulensi`
--

INSERT INTO `notulensi` (`id_notulensi`, `tanggal`, `agenda`, `nama_surat`, `file_path_undangan`, `file_path_notulensi`) VALUES
(13, '2024-05-01 14:52:28', 'Notulensi Rapat:', 'Rapat Koordinasi PCM Kasihan', '5aff2cc5178ba2a1247bf249e41518f0.pptx', 'd5597d80d6f0e7e3ecaf16490eb3e344.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(255) NOT NULL,
  `isi_content` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tanggal_upload`, `judul_berita`, `isi_content`, `avatar`) VALUES
(2, '2024-04-07 19:40:11', 'dcsdxcs', 'sdcsdcsdc', '956e18e3b4e903dad03ac2049c98b2c2.png');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `tahun_jabatan` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `nama_pejabat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `tanggal_upload`, `tahun_jabatan`, `avatar`, `nama_pejabat`) VALUES
(1, '2024-03-28 12:21:59', '1999-2000', 'download3.jpeg', 'asnawi'),
(2, '2024-03-28 12:25:14', '1999 - 2000', 'kkkkk3.png', 'Afif Nurwidianto'),
(3, '2024-03-28 12:25:55', '1999 - 2000', 'kkkkk4.png', 'Muhammad Faris Rizaldi'),
(4, '2024-03-28 14:45:33', '1999 - 2000', 'kkkkk5.png', 'Khoirunnisa Alwiyah'),
(5, '2024-03-29 21:21:57', '1000-2000', 'Bilateral_Flags_ID-PS.jpg', 'Amirul Mukminin'),
(6, '2024-03-29 21:22:10', '3000-40000', 'kkkkk6.png', 'Mukhdirin'),
(9, '2024-04-28 15:52:12', '1999 - 2000', '000m1.jpg', 'DIA'),
(10, '2024-04-28 15:53:15', '1000-2000', '000m2.jpg', 'Abdullah ');

-- --------------------------------------------------------

--
-- Table structure for table `pustaka`
--

CREATE TABLE `pustaka` (
  `id_pustaka` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_pustaka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pustaka`
--

INSERT INTO `pustaka` (`id_pustaka`, `tanggal_upload`, `judul_pustaka`) VALUES
(9, '2024-03-30 02:37:44', 'Tafsir Langkah Muhammadiyah K. K. Mas Mansur 37 Yogyakarta, Suara Muhammadiyah, 2013 II 86 Hibah'),
(10, '2024-03-30 02:37:55', 'Modul Pelayanan Keluarga Berencana Yekti, Istri, Sutrani 4 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 IV 136 Hibah'),
(11, '2024-03-30 02:38:05', 'Buku Evaluasi Mahasiswa Stase Keperawatan Maternitas 1 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 84 Hibah'),
(12, '2024-03-30 02:38:15', 'Modul Kesehatan Reproduksi II Bagi Mahasiswa Dewi, Herlin, Winnie, Sutarni, Rina, Istri 2 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 V 52 Hibah'),
(13, '2024-04-04 11:11:37', 'Panduan Praktikum Keperawatan Gerontik Ns. Suratini 3 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 138 Hibah.'),
(14, '2024-04-06 05:45:43', 'pustaka ini adalah daftar pustaka yang mempunyai adalah bapak haji');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_wakaf`
--

CREATE TABLE `sertifikat_wakaf` (
  `id_wakaf` int(11) NOT NULL,
  `nama_surat_wakaf` varchar(255) NOT NULL,
  `nama_masjid` varchar(255) NOT NULL,
  `file_path_sertifikat_wakaf` varchar(255) NOT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sertifikat_wakaf`
--

INSERT INTO `sertifikat_wakaf` (`id_wakaf`, `nama_surat_wakaf`, `nama_masjid`, `file_path_sertifikat_wakaf`, `tanggal`) VALUES
(16, 'Tanah Wakaf Muhammadiyah No. 15 Desa Tamantirto Hak Milik No. 1402 Akta Ikrar Wakaf 08-04-2010-W.2-01-VI-2010', 'Masjid Baitunnafiq Brajan', 'praktik_magang-Page-3_drawio2.png', '2024-05-01 14:40:41'),
(17, 'Tanah Wakaf Muhammadiyah No. 27 Desa Tamantirto Hak Milik No. 12105 Akta Ikrar Wakaf 10-01-2018-W2-02-BH-2018 Perluasan', 'Masjid Al Muqorrobin Selokambang', 'BANNER-removebg-preview_(1)3.png', '2024-05-01 14:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(255) NOT NULL,
  `isi_content` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `tanggal_upload`, `judul_berita`, `isi_content`, `avatar`) VALUES
(1, '2024-05-08 07:16:16', 'asxsdcs', 'sxcsaddcxs', 'ae66d9e3fe27118b1d0232594130dd1a.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `suara_muhammadiyah`
--

CREATE TABLE `suara_muhammadiyah` (
  `id_suara` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul_berita` varchar(255) NOT NULL,
  `isi_content` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suara_muhammadiyah`
--

INSERT INTO `suara_muhammadiyah` (`id_suara`, `tanggal_upload`, `judul_berita`, `isi_content`, `avatar`) VALUES
(1, '2024-05-08 07:18:45', 'xascx V', 'sxc B', '5bc398aa5e5a68e9e4b6305f62fcaf45.jpeg'),
(2, '2024-05-08 07:18:53', 'A', 'B', 'eed8bf12c59891c6d83077d4fd18d141.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_aktif_organisasi`
--

CREATE TABLE `surat_aktif_organisasi` (
  `id_aktif` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `instansi_kerja` varchar(255) NOT NULL,
  `alamat_instansi_kerja` text NOT NULL,
  `telepon_kantor_kerja` varchar(50) NOT NULL,
  `file_path_kartu_tanda_anggota` varchar(255) NOT NULL,
  `file_path_bukti_keaktifan` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_aktif_organisasi`
--

INSERT INTO `surat_aktif_organisasi` (`id_aktif`, `email`, `nama_lengkap`, `tanggal_lahir`, `alamat_tinggal`, `no_hp`, `instansi_kerja`, `alamat_instansi_kerja`, `telepon_kantor_kerja`, `file_path_kartu_tanda_anggota`, `file_path_bukti_keaktifan`, `tempat_lahir`) VALUES
(2, 'afiiiiif@gmail.com', 'adc', '2024-04-10', 'ponorogo', '082235722026', 'pembohong', 'kapanewin bantul', '0873736737377', '86d21bd7bbb8e46bd4287fb067c37436.pdf', '1bdea63c6e6f2036bdc8c25e056f854f.pdf', 'pemalang'),
(3, 'faris@gmail.com', 'Faris Rizaldi', '2024-04-27', 'Jetis Karanganom Bantul', '0822357220277', 'Progranmmer', 'kapanewon bantul ', '082235722026', '252fa2c38bfacbd2bb23ab824d5a0556.pdf', '7201e69168b1876d4312cc8a7c442c56.pdf', 'Yogyakarta'),
(4, 'alay@gmail.com', 'adc', '2024-04-06', 'Jetis Karanganom Bantul', '082235722026', 'pembohong', 'kapanewin bantul', '082235722026', '0761ec3633c8b3eb1990bc50cf5345de.png', '3932156a848a7f37049e034ae9cf7157.jpg', 'Yogyakarta'),
(5, 'afiiiiif@gmail.com', 'Faris Rizaldi', '2024-04-23', 'Jetis Karanganom Bantul', '082235722026', 'Progranmmer', 'kapanewin bantul', '0873736737377', '5ac8c74a4efe9c29d8a138e4fb947462.png', 'fd9346a8792aef526e54fc75c38a61bd.png', 'Yogyakarta'),
(6, 'faris@gmail.com', 'Faris Rizaldi', '2024-05-01', 'Jetis Karanganom Bantul', '0822357220277', 'Progranmmer', 'kapanewin bantul', '0873736737377', '17383fc3457bd92b48648c2bda8b6cad.jpg', 'eb2bda8025374e443c9a1cca56780863.jpg', 'Yogyakarta'),
(7, 'afiiiiif@gmail.com', 'Faris Rizaldi', '2024-04-28', 'ponorogo', '08223577777', 'Progranmmer', 'kapanewin bantul', '0873736737377', 'edd9d7aeed5d13e30f8ce884971bf803.jpg', '2fa465aaf159672601bae9ad9722c365.jpg', 'Yogyakarta'),
(8, 'admin@gmail.com', 'adc', '2024-04-29', 'Jetis Karanganom Bantul', '1234567890', 'Progranmmer', 'kapanewon bantul ', '1234567890', '71ebae36bfebfba769dc0a7a9ee9dcb1.jpg', 'fe98be3672ea0efb768811276e143eaf.jpg', 'Yogyakarta'),
(9, 'saya@gmail.com', 'YANTO', '2024-05-04', 'Jetis Karanganom Bantul', '08223577777', 'Progranmmer', 'kapanewin bantul', '1234567890', 'dba68fd649351536a6f2d8a657390919.jpg', '22915f212e48e54b51a7ddc9786cd597.jpg', 'Yogyakarta'),
(10, 'faris@gmail.com', 'YANTO', '2024-05-08', 'Jetis Karanganom Bantul', '082235722026', 'Progranmmer', 'kapanewin bantul', '0873736737377', '01a6dd805360ee8a870ff62e3119277b.jpg', '8c5de14b87c4b2993153e4a84e08becd.jpg', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_keluar` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `agenda` varchar(255) NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `file_path_surat` varchar(255) NOT NULL,
  `file_path_undangan` varchar(255) NOT NULL,
  `file_path_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_keluar`, `tanggal`, `agenda`, `nama_surat`, `file_path_surat`, `file_path_undangan`, `file_path_photo`) VALUES
(24, '2024-05-01 15:55:07', 'AGENDA SURAT KELUAR PCM KASIHAN 2015', 'Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '6d8869863defe8cf1111fd0282fd5c3c.jpg', 'a77132e2ca6d8ef3b6139d0ad42b26a5.jpg', ''),
(25, '2024-05-01 15:41:45', 'AGENDA SURAT KELUAR PCM KASIHAN 2016', 'Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '', '', ''),
(26, '2024-05-01 15:42:07', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '', '', ''),
(27, '2024-05-01 15:42:39', 'AGENDA SURAT KELUAR PCM KASIHAN 2018', 'Rapat Koordinasi PCM Kasihan', '', '', ''),
(28, '2024-05-01 15:43:57', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Pembentukan Panitia Milad PCM Kasihan 105', '', '', ''),
(29, '2024-05-01 15:44:21', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Surat Keluar Panitia Milad PCM Kasihan 105', '', '', ''),
(30, '2024-05-01 15:44:43', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Undangan-Rapat-Panitia-milda-pcm-105', '', '', ''),
(31, '2024-05-01 15:53:19', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', '2017-10-06-Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '63175beb062d3cf19ecd85bfa1480693.jpg', '0489c9601407bcc7ed3795239808af15.jpg', '500c02f6ec5ca9ac894bcca633ce416b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keputusan`
--

CREATE TABLE `surat_keputusan` (
  `id_keputusan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `agenda` varchar(255) NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keputusan`
--

INSERT INTO `surat_keputusan` (`id_keputusan`, `tanggal`, `agenda`, `nama_surat`, `file_path`) VALUES
(25, '2024-05-01 15:04:13', 'SURAT KEPUTUSAN DAN SURAT TUGAS PCM KASIHAN 2023', 'SK PDM Susunan PCM Kasihan Periode 2022-2027', 'struktur-prm_001-1024x9982.png'),
(26, '2024-05-01 15:06:03', 'SURAT KEPUTUSAN DAN SURAT TUGAS PCM KASIHAN 2023', 'SK Anggota PCM Kasihan 2022-2027', 'BANNER5.png'),
(27, '2024-05-01 15:07:48', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2022', 'not', '000m6.jpg'),
(28, '2024-05-01 15:08:35', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'ST 2021-01-01-001-Surat Tugas-KSH-I-2021-Tim Tukar Guling Tanah Wakaf Ngestiharjo-Pertashop', '5aff2cc5178ba2a1247bf249e41518f01.pptx'),
(29, '2024-05-01 15:09:02', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'ST 2021-01-02-001-Surat Tugas-KSH-I-2021-Tim Pendirian Petashop', '5aff2cc5178ba2a1247bf249e41518f02.pptx'),
(30, '2024-05-01 15:09:22', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'ST 2021-02-01-004-SK PCM Panitia Rehat Kantor Bersama Muhammadiyah Kasihan', '5aff2cc5178ba2a1247bf249e41518f03.pptx'),
(31, '2024-05-01 15:10:50', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'ST 2021-02-08-003-Surat Tugas-KSH-I-2021-Tim Pencarian Data Wakaf PCM Kasihan-KKN UMY', '5aff2cc5178ba2a1247bf249e41518f04.pptx'),
(32, '2024-05-01 15:11:08', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'SK 2021-03-06-002-SK PCM CORP MUBALIGH KASIHAN 2021', '5aff2cc5178ba2a1247bf249e41518f05.pptx'),
(33, '2024-05-01 15:12:16', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'SK PDM 2021-03-13-006-KEP-III-0-D-2021 Perpanjangan Periode Kepengurusan PCM Kasihan 2020-2021', 'BANNER6.png'),
(34, '2024-05-01 15:12:38', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'SK PCM 2021-04-19-004-KEP-IV-0-C-2021 Perpanjangan Periode Kepengurusan PCM Kasihan Periode 2020-2023', '5aff2cc5178ba2a1247bf249e41518f011.pptx'),
(35, '2024-05-01 15:13:11', 'SURAT KEPUTUSAN DAN SURAT TUGAS PCM KASIHAN 2020', 'ST 2020-01-03-001-Surat Tugas-KSH-I-2020-Mandat Mengikuti Penjaringan Kepala Desa Tirtonirmolo', '000m7.jpg'),
(36, '2024-05-01 15:13:35', 'SURAT KEPUTUSAN DAN SURAT TUGAS PCM KASIHAN 2020', 'ST 2020-01-03-002-Surat Tugas-KSH-II-2020-Mandat Mengikuti Rapimda', '000m8.jpg'),
(37, '2024-05-01 15:13:52', 'SURAT KEPUTUSAN DAN SURAT TUGAS PCM KASIHAN 2020', 'SK 2020-04-01-002-SK PCM Pembentukan MCCC', '000m9.jpg'),
(38, '2024-05-01 15:14:19', 'SURAT KEPUTUSAN DAN SURAT TUGAS PCM KASIHAN 2020', 'ST 2020-08-29-003-Surat Tugas-KSH-II-2020-Mandat Mengikuti Diseminasi dan Workshop UMY', '000m10.jpg'),
(39, '2024-05-01 15:14:51', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2019', 'SK N0. 002/KEP/IV.0/C/2019 tentang Penetapan Tim Sukses Dewan Perwakilan Daerah Tingkat Kecamatan Kasihan Dan Ranting Se Kecamatan Kasihan Pemilu 2019', '000m11.jpg'),
(40, '2024-05-01 15:15:48', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2019', 'SK N0. 003/KEP/IV.0/C/2019 tentang Penetapan Tim Pengelola Ambulan Muhammadiyah (Ambulanmu) Pimpinan Cabang Muhammadiyah Kasihan', 'BANNER7.png'),
(41, '2024-05-01 15:16:10', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2019', 'ST 2019-07-23-001-Surat Tugas-KSH-VII-2019-Mengikuti Soft Opening MGS Sekolah Berbasis Lingkungan SMP M 1 Gamping', '000m12.jpg'),
(42, '2024-05-01 15:16:34', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2019', 'ST 2019-07-23-002-Surat Tugas-KSH-VII-2019 tentang -Mengikuti Pelatihan PKU Bantul di Aula Pandansimo', '000m13.jpg'),
(43, '2024-05-01 15:17:34', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2019', 'ST 2019-07-26-003-Surat Tugas-KSH-VII-2019-Pelaksana penyelenggaraan penyuluhan tanah wakaf', '000m14.jpg'),
(44, '2024-05-01 15:18:06', 'SURAT KEPUTUSAN PCM KASIHAN 2018', 'SK No. 001/IV.0/C/VII/KAS/2018 tentang Perubahan Susunan Pengurus Pimpinan Cabang Muhamamdiyah Kasihan Periode 2015-2020', '000m15.jpg'),
(45, '2024-05-01 15:18:38', 'SURAT KEPUTUSAN PCM KASIHAN 2017', 'SK No. 013/KEP/II.0/D/2017 tentang Susunan Takmir Miniatur Masjid Raya Baiturrahman Aceh  Kasihan Bantul Yogyakarta Periode 2017-2020', '000m16.jpg'),
(46, '2024-05-01 15:18:56', 'SURAT KEPUTUSAN PCM KASIHAN 2017', 'SK No. 014/KEP/V.0/D/2017 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Ngestiharjo Utara Periode 2015-2020', '000m17.jpg'),
(47, '2024-05-01 15:19:17', 'SURAT KEPUTUSAN PCM KASIHAN 2017', 'SK No. 015/KEP/VIII.0/D/2017 tentang Susunan Corp Mubaligh  Pimpinan Cabang Muhammadiyah Kasihan Periode 2016-2020', '01481bb866b6fda2dc5fdcc8c86afe39_(5)2.pptx'),
(48, '2024-05-01 15:19:33', 'SURAT KEPUTUSAN PCM KASIHAN 2017', 'SK No. 017/KEP/VIII.0/D/2017 tentang Susunan Pengurus Baitul Tamwil Muhammadiyah  Pimpinan Cabang Muhammadiyah Kasihan Periode 2017-2022', '5aff2cc5178ba2a1247bf249e41518f012.pptx'),
(49, '2024-05-01 15:20:25', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 01/KEP/PCM-KSH/III/2016 tentang Tanfidz Keputusan Musyawarah Cabang Muhammadiyah Pimpinan Cabang Muhammadiyah Kasihan Periode 2015-2020', '5aff2cc5178ba2a1247bf249e41518f013.pptx'),
(50, '2024-05-01 15:20:42', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 01/KEP/PCM-KSH/III/2016 Lampiran Susunan Pengurus Lembaga Dan Majelis  Pimpinan Cabang Muhammadiyah Kasihan  Periode 2015-2020', '5aff2cc5178ba2a1247bf249e41518f014.pptx'),
(51, '2024-05-01 15:21:00', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 02/KEP/PCM-KSH/III/2016 tentang Tanfidz Keputusan Musyawarah Cabang Muhammadiyah Pimpinan Cabang Muhammadiyah Kasihan Periode 2015-2020 Pengangkatan Anggota Tambahan', '5aff2cc5178ba2a1247bf249e41518f015.pptx'),
(52, '2024-05-01 15:21:20', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 003/KEP/IV.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tamantirto Utara Periode 2015-2020', '000m18.jpg'),
(53, '2024-05-01 15:21:57', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 004/KEP/V.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tamantirto Selatan Periode 2015-2020', 'jjjj2.jpg'),
(54, '2024-05-01 15:22:21', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 005/KEP/V.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tamantirto Selatan Periode 2015-2020', ''),
(55, '2024-05-01 15:22:38', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 006/KEP/VI.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tirtonirmolo Tengah Periode 2015-2020', ''),
(56, '2024-05-01 15:24:35', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 007/KEP/VIII.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tirtonirmolo Tengah Periode 2015-2020', ''),
(57, '2024-05-01 15:24:51', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 008/KEP/IX.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tirtonirmolo Timur Periode 2015-2020', ''),
(58, '2024-05-01 15:25:05', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 009/KEP/IX.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tirtonirmolo Selatan Periode 2015-2020', ''),
(59, '2024-05-01 15:25:20', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 010/KEP/X.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tirtonirmolo Utara Periode 2015-2020', ''),
(60, '2024-05-01 15:25:34', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 011/KEP/X.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat Periode 2015-2020', ''),
(61, '2024-05-01 15:25:49', 'SURAT KEPUTUSAN PCM KASIHAN 2016', 'SK No. 012/KEP/XII.0/D/2016 tentang Penetapan Ketua Dan Anggota  Pimpinan Ranting Muhammadiyah Bangunjiwo Timur Periode 2015-2020', ''),
(62, '2024-05-01 15:27:13', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'SK PCM 2021-05-19-005-KEP-IV-0-C-2021 Perpanjangan Periode Kepengurusan PRM Tirtonirmolo Selatan Periode 2020-2023', ''),
(63, '2024-05-01 15:27:27', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'SK PCM 2021-05-19-006-KEP-IV-0-C-2021 Perpanjangan Periode Kepengurusan PRM Tamantirto Selatan Periode 2020-2023', ''),
(64, '2024-05-01 15:27:41', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'SE 2021-04-10-18-IV.0-A-KSH-IV-2021 Edaran PCM tentang Ramadhan 1442H', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `agenda` varchar(255) NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_masuk`, `tanggal`, `agenda`, `nama_surat`, `file_path`) VALUES
(46, '2024-05-01 16:00:38', 'Agenda Surat Masuk 2017', 'Undangan Pembukaan Milad PDM', 'jjjj3.jpg'),
(47, '2024-05-02 04:57:55', 'Agenda Surat Masuk 2017', 'Undangan Kajian Rutin Pimpinan Daerah', '44da93c2fc6728b14f158dfe97e95c41.jpg'),
(49, '2024-05-02 04:57:04', 'Agenda Surat Masuk 2016', 'Belum ada nama surat', ''),
(50, '2024-05-02 04:57:24', 'Agenda Surat Masuk 2015', 'Belum ada nama surat', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'afif', '1234'),
(2, 'aziz', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `ibrah`
--
ALTER TABLE `ibrah`
  ADD PRIMARY KEY (`id_ibrah`);

--
-- Indexes for table `kabar_ranting`
--
ALTER TABLE `kabar_ranting`
  ADD PRIMARY KEY (`id_kabar_ranting`);

--
-- Indexes for table `notulensi`
--
ALTER TABLE `notulensi`
  ADD PRIMARY KEY (`id_notulensi`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `pustaka`
--
ALTER TABLE `pustaka`
  ADD PRIMARY KEY (`id_pustaka`);

--
-- Indexes for table `sertifikat_wakaf`
--
ALTER TABLE `sertifikat_wakaf`
  ADD PRIMARY KEY (`id_wakaf`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `suara_muhammadiyah`
--
ALTER TABLE `suara_muhammadiyah`
  ADD PRIMARY KEY (`id_suara`);

--
-- Indexes for table `surat_aktif_organisasi`
--
ALTER TABLE `surat_aktif_organisasi`
  ADD PRIMARY KEY (`id_aktif`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ibrah`
--
ALTER TABLE `ibrah`
  MODIFY `id_ibrah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kabar_ranting`
--
ALTER TABLE `kabar_ranting`
  MODIFY `id_kabar_ranting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notulensi`
--
ALTER TABLE `notulensi`
  MODIFY `id_notulensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pustaka`
--
ALTER TABLE `pustaka`
  MODIFY `id_pustaka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sertifikat_wakaf`
--
ALTER TABLE `sertifikat_wakaf`
  MODIFY `id_wakaf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suara_muhammadiyah`
--
ALTER TABLE `suara_muhammadiyah`
  MODIFY `id_suara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_aktif_organisasi`
--
ALTER TABLE `surat_aktif_organisasi`
  MODIFY `id_aktif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
