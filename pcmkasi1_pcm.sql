-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Des 2024 pada 22.38
-- Versi server: 8.0.40-cll-lve
-- Versi PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcmkasi1_pcm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `judul_artikel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `date_created`) VALUES
(4, 'PENGAJIAN RUTIN', '<p><strong>Pimpinan Pusat Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Pusat Muhammadiyah adalah jenjang struktur Muhammadiyah tertinggi. Dalam level yang paling tinggi dari seluruh level Pimpinan Muhammadiyah, Pimpinan Pusat Muhammadiyah mempunyai fungsi koordinatif dari seluruh Pimpinan Muhammadiyah yang ada di Indonesia, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah Indonesia melalui berbagai bentuk aktivitas dakwah, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.<br />\r\nDalam melaksanakan gerak dakwah Islamiyah, Pimpinan Pusat Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat pusat dan juga mengkoordinasikan seluruh aktivitas dakwah Islamiyah secara spesifik di Indonesia. Proses kaderisasi dalam Pimpinan Pusat Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level pusat yang mempunyai segmentasi tersendiri.<br />\r\nPengambilan keputusan di Pimpinan Pusat Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Muktamar Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Pusat Muhammadiyah, strategi dan program dakwah Muhammadiyah, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Muktamar Muhammadiyah melibatkan seluruh Pimpinan Daerah dan Wilayah Muhammadiyah di wilayah kabupaten tersebut.</p>\r\n\r\n<p><strong>Pimpinan Wilayah Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Wilayah Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat propinsi. Dalam level yang lebih tinggi dari Pimpinan Daerah Muhammadiyah, Pimpinan Wilayah Muhammadiyah mempunyai fungsi koordinatif bagi seluruh Pimpinan Muhammadiyah yang ada di wilayah propinsi tersebut, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah propinsi tersebut melalui berbagai bentuk, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Wilayah Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat propinsi. Proses kaderisasi dalam Pimpinan Wilayah Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level wilayah atau propinsi yang mempunyai segmentasi tersendiri.</p>\r\n\r\n<p>Pengambilan keputusan di Pimpinan Wilayah Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Wilayah Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Wilayah Muhammadiyah, strategi dan program dakwah Muhammadiyah di wilayah kabupaten tersebut, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Wilayah Muhammadiyah melibatkan seluruh Pimpinan Daerah di wilayah propinsi tersebut.</p>\r\n\r\n<p>Pimpinan Wilayah Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintah daerah setingkat I, organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Pimpinan Daerah Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Daerah Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat kabupaten (district). Dalam level yang lebih tinggi dari Pimpinan Cabang Muhammadiyah, Pimpinan Daerah Muhammadiyah mempunyai fungsi koordinatif bagi seluruh Pimpinan Muhammadiyah yang ada di wilayah kabupaten tersebut, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah Kabupaten tersebut melalui berbagai bentuk, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Daerah Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat daerah atau kabupaten. Sebagaimana di ranting dan cabang, proses kaderisasi dalam Pimpinan Daerah Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level daerah yang mempunyai segmentasi tersendiri.</p>\r\n\r\n<p>Pengambilan keputusan di Pimpinan Daerah Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Daerah Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Daerah Muhammadiyah, strategi dan program dakwah Muhammadiyah di wilayah kabupaten tersebut, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Wilayah Muhammadiyah melibatkan seluruh Pimpinan Cabang dan Ranting Muhammadiyah di wilayah kabupaten tersebut.</p>\r\n\r\n<p>Pimpinan Daerah Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintah daerah setingkat II, organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Pimpinan Cabang Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Cabang Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat kecamatan (sub-district). Dalam level yang lebih tinggi dari Pimpinan Ranting Muhammadiyah, Pimpinan Cabang Muhammadiyah mempunyai fungsi koordinatif bagi seluruh Pimpinan Muhammadiyah yang ada di wilayah kecamatan tersebut, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah kecamatan tersebut melalui berbagai bentuk, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Cabang Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat cabang atau kecamatan. Sebagaimana di level ranting, proses kaderisasi dalam Pimpinan Cabang Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level cabang yang mempunyai segmentasi tersendiri.</p>\r\n\r\n<p>Sebagaimana dalam level ranting, pengambilan keputusan di Pimpinan Cabang Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Cabang Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Cabang Muhammadiyah, strategi dan program dakwah Muhammadiyah di wilayah kecamatan tersebut, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Cabang Muhammadiyah melibatkan seluruh Pimpinan Ranting Muhammadiyah di wilayah cabang atau kecamatan tersebut.</p>\r\n\r\n<p>Pimpinan Cabang Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintahan daerah di tingkat kecamatan (MUSPIKA), organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Pimpinan Ranting Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Ranting Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat desa, dan merupakan ujung tombak bagi gerakan dakwah Islamiyah yang dilaksanakan Muhammadiyah, karena Pimpinan Ranting Muhammadiyah menjangkau dan berinteraksi secara langsung dengan warga Muhammadiyah. Sebagai ujung tombak dari gerakan dakwah Islamiyah yang dilaksanakan oleh Muhammadiyah, Pimpinan Ranting Muhammadiyah adalah kekuatan paling nyata yang dimiliki Muhammadiyah, karena di level inilah sebenarnya basis-basis gerakan Muhammadiyah bisa dilaksanakan secara nyata.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Ranting Muhammadiyah mempunyai seperangkat pengurus yang berfungsi untuk melaksanakan program-program Muhammadiyah di tingkat ranting atau desa. Di samping itu, untuk proses kaderisasi, Pimpinan Ranting Muhammadiyah juga melakukan pembinaan dan kaderisasi melaui organisasi-organisasi otonom Muhammadiyah di level ranting yang mempunyai segmentasi tersendiri, seperti Aisyiyah (yang bergerak dalam dakwah Islamiyah di kalangan wanita atau ibu-ibu), Pemuda Muhammadiyah (yang bergerak dalam dakwah Islamiyah di kalangan pemuda), Nasyi&rsquo;atul Aisyiyah (yang bergerak dalam dakwah Islamiyah di kalangan wanita-wanita muda), Ikatan Remaja Muhammadiyah (yang bergerak dalam dakwah Islamiyah di kalangan remaja dan pelajar).</p>\r\n\r\n<p>Pengambilan keputusan di Pimpinan Ranting Muhammadiyah dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Ranting Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Ranting Muhammadiyah, program dakwah Muhammadiyah, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Ranting Muhammadiyah melibatkan seluruh warga Muhammadiyah di ranting atau desa tersebut.</p>\r\n\r\n<p>Pimpinan Ranting Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintahan desa, organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Jama&rsquo;ah Muhammadiyah</strong></p>\r\n\r\n<p>Selain jalur-jalur struktural yang dimilikinya, Muhammadiyah juga mempunyai kelompok-kelompok yang tersebar di tengah masyarakat dalam bentuk Jama&rsquo;ah Muhammadiyah. Jama&rsquo;ah Muhammadiyah merupakan lini di luar jalur-jalur struktural Muhammadiyah secara nyata melaksanakan dakwah Islamiyah yang sesuai dengan visi dan misi Muhammadiyah di tengah masyarakat.</p>\r\n\r\n<p>Biasanya, Jama&rsquo;ah Muhammadiyah bergerak dalam skala mikro di tengah masyarakat melalui masjid-masjid sebagai basis aktivitas. Aktivitas dakwah yang dilaksanakan dalam Jama&rsquo;ah Muhammadiyah pun bermacam-macam, seperti pengajian, bakti sosial, infaq, zakat, shadaqah, dan lain-lain.</p>\r\n\r\n<p>Jama&rsquo;ah Muhammadiyah tersebar di tengah-tengah masyarakat melaksanakan aktivitas riil yang responsif bagi persoalan yang ditumbuh di kalangan masyarakat. Jama&rsquo;ah Muhammadiyah terdapat di seluruh wilayah Indonesia, bahkan ada beberapa Jama&rsquo;ah Muhammadiyah yang tersebar di luar negeri, diantaranya dalam bentuk Pimpinan Cabang Istimewa Muhammadiyah (PCIM), seperti Malaysia, Brunei, Thailand, Singapura, dan Philipina.</p>\r\n', '2024-12-23 04:08:31'),
(6, 'PIMPINAN CABANG MUHAMMADIYAH', '<p><strong>Pimpinan Pusat Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Pusat Muhammadiyah adalah jenjang struktur Muhammadiyah tertinggi. Dalam level yang paling tinggi dari seluruh level Pimpinan Muhammadiyah, Pimpinan Pusat Muhammadiyah mempunyai fungsi koordinatif dari seluruh Pimpinan Muhammadiyah yang ada di Indonesia, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah Indonesia melalui berbagai bentuk aktivitas dakwah, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.<br />\r\nDalam melaksanakan gerak dakwah Islamiyah, Pimpinan Pusat Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat pusat dan juga mengkoordinasikan seluruh aktivitas dakwah Islamiyah secara spesifik di Indonesia. Proses kaderisasi dalam Pimpinan Pusat Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level pusat yang mempunyai segmentasi tersendiri.<br />\r\nPengambilan keputusan di Pimpinan Pusat Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Muktamar Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Pusat Muhammadiyah, strategi dan program dakwah Muhammadiyah, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Muktamar Muhammadiyah melibatkan seluruh Pimpinan Daerah dan Wilayah Muhammadiyah di wilayah kabupaten tersebut.</p>\r\n\r\n<p><strong>Pimpinan Wilayah Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Wilayah Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat propinsi. Dalam level yang lebih tinggi dari Pimpinan Daerah Muhammadiyah, Pimpinan Wilayah Muhammadiyah mempunyai fungsi koordinatif bagi seluruh Pimpinan Muhammadiyah yang ada di wilayah propinsi tersebut, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah propinsi tersebut melalui berbagai bentuk, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Wilayah Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat propinsi. Proses kaderisasi dalam Pimpinan Wilayah Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level wilayah atau propinsi yang mempunyai segmentasi tersendiri.</p>\r\n\r\n<p>Pengambilan keputusan di Pimpinan Wilayah Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Wilayah Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Wilayah Muhammadiyah, strategi dan program dakwah Muhammadiyah di wilayah kabupaten tersebut, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Wilayah Muhammadiyah melibatkan seluruh Pimpinan Daerah di wilayah propinsi tersebut.</p>\r\n\r\n<p>Pimpinan Wilayah Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintah daerah setingkat I, organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Pimpinan Daerah Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Daerah Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat kabupaten (district). Dalam level yang lebih tinggi dari Pimpinan Cabang Muhammadiyah, Pimpinan Daerah Muhammadiyah mempunyai fungsi koordinatif bagi seluruh Pimpinan Muhammadiyah yang ada di wilayah kabupaten tersebut, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah Kabupaten tersebut melalui berbagai bentuk, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Daerah Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat daerah atau kabupaten. Sebagaimana di ranting dan cabang, proses kaderisasi dalam Pimpinan Daerah Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level daerah yang mempunyai segmentasi tersendiri.</p>\r\n\r\n<p>Pengambilan keputusan di Pimpinan Daerah Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Daerah Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Daerah Muhammadiyah, strategi dan program dakwah Muhammadiyah di wilayah kabupaten tersebut, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Wilayah Muhammadiyah melibatkan seluruh Pimpinan Cabang dan Ranting Muhammadiyah di wilayah kabupaten tersebut.</p>\r\n\r\n<p>Pimpinan Daerah Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintah daerah setingkat II, organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Pimpinan Cabang Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Cabang Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat kecamatan (sub-district). Dalam level yang lebih tinggi dari Pimpinan Ranting Muhammadiyah, Pimpinan Cabang Muhammadiyah mempunyai fungsi koordinatif bagi seluruh Pimpinan Muhammadiyah yang ada di wilayah kecamatan tersebut, sekaligus juga mengkoordinasikan gerakan dakwah Islamiyah di seluruh wilayah kecamatan tersebut melalui berbagai bentuk, seperti aktivitas keagamaan, pendidikan, kesejahteraan sosial, kesehatan, dan sebagainya.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Cabang Muhammadiyah mempunyai seperangkat pengurus dan majelis-majelis atau lembaga-lembaga yang berfungsi secara praktis untuk melaksanakan program-program Muhammadiyah di tingkat cabang atau kecamatan. Sebagaimana di level ranting, proses kaderisasi dalam Pimpinan Cabang Muhammadiyah juga dilakukan secara intensif melalui organisasi-organisasi otonom Muhammadiyah di level cabang yang mempunyai segmentasi tersendiri.</p>\r\n\r\n<p>Sebagaimana dalam level ranting, pengambilan keputusan di Pimpinan Cabang Muhammadiyah juga dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Cabang Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Cabang Muhammadiyah, strategi dan program dakwah Muhammadiyah di wilayah kecamatan tersebut, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Cabang Muhammadiyah melibatkan seluruh Pimpinan Ranting Muhammadiyah di wilayah cabang atau kecamatan tersebut.</p>\r\n\r\n<p>Pimpinan Cabang Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintahan daerah di tingkat kecamatan (MUSPIKA), organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Pimpinan Ranting Muhammadiyah</strong></p>\r\n\r\n<p>Pimpinan Ranting Muhammadiyah adalah jenjang struktural Muhammadiyah setingkat desa, dan merupakan ujung tombak bagi gerakan dakwah Islamiyah yang dilaksanakan Muhammadiyah, karena Pimpinan Ranting Muhammadiyah menjangkau dan berinteraksi secara langsung dengan warga Muhammadiyah. Sebagai ujung tombak dari gerakan dakwah Islamiyah yang dilaksanakan oleh Muhammadiyah, Pimpinan Ranting Muhammadiyah adalah kekuatan paling nyata yang dimiliki Muhammadiyah, karena di level inilah sebenarnya basis-basis gerakan Muhammadiyah bisa dilaksanakan secara nyata.</p>\r\n\r\n<p>Dalam melaksanakan gerak dakwah Islamiyah, Pimpinan Ranting Muhammadiyah mempunyai seperangkat pengurus yang berfungsi untuk melaksanakan program-program Muhammadiyah di tingkat ranting atau desa. Di samping itu, untuk proses kaderisasi, Pimpinan Ranting Muhammadiyah juga melakukan pembinaan dan kaderisasi melaui organisasi-organisasi otonom Muhammadiyah di level ranting yang mempunyai segmentasi tersendiri, seperti Aisyiyah (yang bergerak dalam dakwah Islamiyah di kalangan wanita atau ibu-ibu), Pemuda Muhammadiyah (yang bergerak dalam dakwah Islamiyah di kalangan pemuda), Nasyi&rsquo;atul Aisyiyah (yang bergerak dalam dakwah Islamiyah di kalangan wanita-wanita muda), Ikatan Remaja Muhammadiyah (yang bergerak dalam dakwah Islamiyah di kalangan remaja dan pelajar).</p>\r\n\r\n<p>Pengambilan keputusan di Pimpinan Ranting Muhammadiyah dilaksanakan secara demokratis dalam bentuk permusyawaratan. Permusyawaratan tertinggi ialah Musyawarah Ranting Muhammadiyah yang berfungsi untuk memilih pengurus dalam Pimpinan Ranting Muhammadiyah, program dakwah Muhammadiyah, mengevaluasi gerakan dakwah pada periode kepengurusan sebelumnya, dan lain-lain yang penting untuk diputuskan dalam permusyawaratan tersebut. Musyawarah Ranting Muhammadiyah melibatkan seluruh warga Muhammadiyah di ranting atau desa tersebut.</p>\r\n\r\n<p>Pimpinan Ranting Muhammadiyah dalam melakukan gerakan dakwah juga bekerjasama dengan elemen-elemen lain dalam masyarakat, baik pemerintahan desa, organisasi masyarakat lain, LSM, dan sebagainya.</p>\r\n\r\n<p><strong>Jama&rsquo;ah Muhammadiyah</strong></p>\r\n\r\n<p>Selain jalur-jalur struktural yang dimilikinya, Muhammadiyah juga mempunyai kelompok-kelompok yang tersebar di tengah masyarakat dalam bentuk Jama&rsquo;ah Muhammadiyah. Jama&rsquo;ah Muhammadiyah merupakan lini di luar jalur-jalur struktural Muhammadiyah secara nyata melaksanakan dakwah Islamiyah yang sesuai dengan visi dan misi Muhammadiyah di tengah masyarakat.</p>\r\n\r\n<p>Biasanya, Jama&rsquo;ah Muhammadiyah bergerak dalam skala mikro di tengah masyarakat melalui masjid-masjid sebagai basis aktivitas. Aktivitas dakwah yang dilaksanakan dalam Jama&rsquo;ah Muhammadiyah pun bermacam-macam, seperti pengajian, bakti sosial, infaq, zakat, shadaqah, dan lain-lain.</p>\r\n\r\n<p>Jamaah Muhammadiyah tersebar di tengah-tengah masyarakat melaksanakan aktivitas riil yang responsif bagi persoalan yang ditumbuh di kalangan masyarakat. Jama&rsquo;ah Muhammadiyah terdapat di seluruh wilayah Indonesia, bahkan ada beberapa Jama&rsquo;ah Muhammadiyah yang tersebar di luar negeri, diantaranya dalam bentuk Pimpinan Cabang Istimewa Muhammadiyah (PCIM), seperti Malaysia, Brunei, Thailand, Singapura, dan Philipina.</p>\r\n', '2024-12-23 04:09:14'),
(7, 'ARTIKEL BARU 2025', '<p>Kelahiran dan keberadaan Muhammadiyah pada awal berdirinya tidak lepas dan merupakan manifestasi dari gagasan pemikiran dan amal perjuangan Kyai Haji Ahmad Dahlan (Muhammad Darwis) yang menjadi pendirinya. Setelah menunaikan ibadah Haji ke Tanah SUci dan bermukim yang kedua kalinya pada tahun 1903, Kyai Dahlan mulai menyemaikan benih pembaruan di Tanah Air. Gagasan pembaruan itu diperoleh Kyai Dahlan setelah berguru kepada ulama-ulama Indonesia yang bermukim di Mekkah seperti Syeikh Ahmad Khatib dari Minangkabau, Kyai Nawawi dari Banten, Kyai Mas Abdullah dari Surabaya, dan Kyai Fakih dari Maskumambang. Juga setelah membaca pemikiran-pemikiran para pembaru Islam seperti Ibnu Taimiyah, Muhammad bin Abdil Wahhab, Jamaluddin Al-Afghani, Muhammad Abduh, dan Rasyid Ridha.</p>\r\n\r\n<p>Dengan modal kecerdasan dirinya serta interaksi selama bermukim si Saudi Arabia dan bacaan atas karya-karya para pembaru pemikiran Islam itu telah menanamkan benih ide-ide pembaruan dalam diri Kyai Dahlan. Jadi sekembalinya dari Arab Saudi, Kyai Dahlan justru membawa ide dan gerakan pembaruan, bukan malah menjadi konservatif. Organisasi Muhammadiyah mula masuk ke daerah&nbsp;&nbsp;Kasihan-Bantul sekitar tahun 1920, sebelumnya Organisasi Muhammadiyah di daerah tersebut masih gabung ke pusat. Kemudian didirikan TK, dan SD yang sampai saat ini kurang lebih jumlahnya sekitar 60 TK dan 67 SD di seluruh DIY.</p>\r\n', '2024-12-23 21:57:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kajian_hadist`
--

CREATE TABLE `kajian_hadist` (
  `id_kajian` int NOT NULL,
  `judul_kajian` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi_kajian` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kajian_hadist`
--

INSERT INTO `kajian_hadist` (`id_kajian`, `judul_kajian`, `isi_kajian`, `date_created`) VALUES
(10, 'PENGAJIAN RUTIN 1', '<h4>Kajian Cabang</h4>\r\n\r\n<p>Do&rsquo;a ketika masuk bulan Ramadhan</p>\r\n\r\n<p>Satu doa yang dianjurkan untuk dibaca ketika masuk ramadhan. Doa itu adalah doa melihat hilal. Akan tetapi sejatinya doa ini adalah doa umum, berlaku untuk semua awal bulan, ketika seseorang melihat hilal dan tidak khusus untuk bulan ramadhan.</p>\r\n\r\n<p>Teks doa itu,</p>\r\n\r\n<p>اللَّهُ أَكْبَرُ، اللَّهُمَّ أَهِلَّهُ عَلَيْنَا بِالْأَمْنِ وَالْإِيمَانِ، وَالسَّلَامَةِ وَالْإِسْلَامِ، وَالتَّوْفِيقِ لِمَا نُحِبُّ وَتَرْضَى، رَبُّنَا وَرَبُّكَ اللَّهُ</p>\r\n\r\n<p>Allahu akbar, ya Allah jadikanlah hilal itu bagi kami dengan membawa keamanan dan keimanan, keselamatan dan islam,dan membawa taufiq yang membimbing kami menuju apa yang Engkau cintai dan Engkau ridhai. Tuhan kami dan Tuhan kamu (wahai bulan), adalah Allah.&rdquo; (HR. Ahmad 888, Ad-Darimi dalam Sunannya no. 1729, dan dinilai shahih oleh Syua&rsquo;ib Al-Arnauth dalam Ta&rsquo;liq Musnad Ahmad, 3/171).</p>\r\n\r\n<p>Pertama: Bekal ilmu.</p>\r\n\r\n<p>Bekal ini amat utama sekali agar ibadah kita menuai manfaat, berfaedah, dan tidak asal-asalan. &lsquo;Umar bin &lsquo;Abdul &lsquo;Aziz berkata,</p>\r\n\r\n<p>مَنْ عَبَدَ اللهَ بِغَيْرِ عِلْمٍ كَانَ مَا يُفْسِدُ أَكْثَرَ مِمَّا يُصْلِحُ</p>\r\n\r\n<p>&ldquo;Barangsiapa yang beribadah kepada Allah tanpa ilmu, maka dia akan membuat banyak kerusakan daripada mendatangkan kebaikan.&rdquo; (Al Amru bil Ma&rsquo;ruf, hal. 15).</p>\r\n\r\n<p>Kedua: Perbanyak taubat.</p>\r\n\r\n<p>Inilah yang dianjurkan oleh para ulama kita. Sebelum memasuki bulan Ramadhan, perbanyaklah taubat dan istighfar. Semoga di bulan Ramadhan kita bisa menjadi lebih baik. Kejelekan dahulu hendaklah kita tinggalkan dan ganti dengan kebaikan di bulan Ramadhan. Ingatlah bahwa syarat taubat yang dijelaskan oleh para ulama sebagaimana dinukil oleh Ibnu Katsir rahimahullah, &ldquo;Menghindari dosa untuk saat ini. Menyesali dosa yang telah lalu. Bertekad tidak melakukannya lagi di masa akan datang. Lalu jika dosa tersebut berkaitan dengan hak sesama manusia, maka ia harus menyelesaikannya/ mengembalikannya.&rdquo; (Tafsir Al Qur&rsquo;an Al &lsquo;Azhim, 14:61). Inilah yang disebut dengan taubat nashuha, taubat yang tulus dan murni. Moga Allah menerima taubat-taubat kita sebelum memasuki waktu barokah di bulan Ramadhan sehingga kita pun akan mudah melaksanakan kebaikan.</p>\r\n\r\n<p>Di antara do&rsquo;a untuk meminta segala ampunan dari Allah adalah do&rsquo;a berikut ini:</p>\r\n\r\n<p>اللَّهُمَّ اغْفِرْ لِى خَطِيئَتِى وَجَهْلِى وَإِسْرَافِى فِى أَمْرِى وَمَا أَنْتَ أَعْلَمُ بِهِ مِنِّى اللَّهُمَّ اغْفِرْ لِى جِدِّى وَهَزْلِى وَخَطَئِى وَعَمْدِى وَكُلُّ ذَلِكَ عِنْدِى</p>\r\n\r\n<p>&ldquo;Allahummagh-firlii khothii-atii, wa jahlii, wa isrofii fii amrii, wa maa anta a&rsquo;lamu bihi minni. Allahummagh-firlii jiddi wa hazlii, wa khotho-i wa &lsquo;amdii, wa kullu dzalika &lsquo;indii&rdquo; (Ya Allah, ampunilah kesalahanku, kejahilanku, sikapku yang melampaui batas dalam urusanku dan segala hal yang Engkau lebih mengetahui hal itu dari diriku. Ya Allah, ampunilah aku, kesalahan yang kuperbuat tatkala serius maupun saat bercanda dan ampunilah pula kesalahanku saat aku tidak sengaja maupn sengaja, ampunilah segala kesalahan yang kulakukan) (HR. Bukhari no. 6398 dan Muslim no. 2719).</p>\r\n\r\n<p>Ketiga: Banyak memohon kemudahan dari Allah.</p>\r\n\r\n<p>Selain dua hal di atas, kita juga harus pahami bahwa untuk mudah melakukan kebaikan di bulan Ramadhan, itu semua atas kemudahan dari Allah. Jika kita terus pasrahkan pada diri sendiri, maka ibadah akan menjadi sulit untuk dijalani. Karena diri ini sebenarnya begitu lemah. Oleh karena itu, hendaklah kita banyak bergantung dan tawakkal pada Allah dalam menjalani ibadah di bulan Ramadhan. Terus memohon do&rsquo;a pada Allah agar kita mudah menjalankan berbagai bentuk ibadah baik shalat malam, ibadah puasa itu sendiri, banyak berderma, mengkhatamkan atau mengulang hafalan Qur&rsquo;an dan kebaikan lainnya.</p>\r\n\r\n<p>Do&rsquo;a yang bisa kita panjatkan untuk memohon kemudahan dari Allah adalah sebagai berikut.</p>\r\n\r\n<p>اللَّهُمَّ لاَ سَهْلَ إِلاَّ مَا جَعَلْتَهُ سَهْلاً وَأَنْتَ تَجْعَلُ الحَزْنَ إِذَا شِئْتَ سَهْلاً</p>\r\n\r\n<p>&ldquo;Allahumma laa sahla illa maa ja&rsquo;altahu sahlaa, wa anta taj&rsquo;alul hazna idza syi&rsquo;ta sahlaa&rdquo; [artinya: Ya Allah, tidak ada kemudahan kecuali yang Engkau buat mudah. Dan engkau menjadikan kesedihan (kesulitan), jika Engkau kehendaki pasti akan menjadi mudah]. (Hadits ini dikeluarkan oleh Ibnu Hibban dalam Shahihnya 3:255. Dikeluarkan pula oleh Ibnu Abi &lsquo;Umar, Ibnus Suni dalam &lsquo;Amal Yaum wal Lailah).</p>\r\n\r\n<p>اللَّهُمَّ إِنِّى أَسْأَلُكَ فِعْلَ الْخَيْرَاتِ وَتَرْكَ الْمُنْكَرَاتِ</p>\r\n\r\n<p>&ldquo;Allahumma inni as-aluka fi&rsquo;lal khoiroot wa tarkal munkaroot.&rdquo; (Ya Allah, aku memohon pada-Mu agar mudah melakukan kebaikan dan mudah meninggalkan kemungkaran). (HR. Tirmidzi no. 3233, shahih menurut Syaikh Al Albani).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h5>RENUNGAN</h5>\r\n\r\n<p>Abu Darda&rsquo; Rodhiyallohu &lsquo;Anhu mengatakan: &ldquo;Tiga perkara yang aku cintai sementara manusia membencinya; kemiskinan, sakit dan kematian. Aku mencintai kemiskinan karena (menimbulkan) rasa tawadhu&rsquo; kepada Robb-ku, aku mencintai kematian karenan kerinduan kepada Robb-ku, aku mencintai sakit karena (merupakan) penghapus kesalahan-kesalahanku&rdquo;. [Siyar A&rsquo;lamin Nubala&rsquo; biographi Abu Darda&rsquo;]</p>\r\n', '2024-12-23 23:17:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Berita'),
(2, 'Breaking News'),
(3, 'Galeri'),
(4, 'Ibrah'),
(5, 'Kabar Ranting'),
(6, 'Pengumuman'),
(7, 'Slider'),
(8, 'Suara Muhammadiyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `id_konten` int DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `isi_komentar` text COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_konten`, `nama`, `email`, `isi_komentar`, `tanggal_komentar`) VALUES
(6, 21, 'FANI', 'afiiiiif@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-11-13 19:22:41'),
(7, 25, 'ayu', 'admin@gmail.com', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2024-11-13 19:29:31'),
(8, 34, ' rafi', 'faris@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2024-11-13 20:18:49'),
(9, 21, 'ansory', 'admin@gmail.com', 'dfv f dfv', '2024-11-14 09:23:37'),
(10, 20, ' rafi', 'afiff@gmail.com', 'bbbbbbbbbbbbbbb', '2024-11-14 09:24:04'),
(11, 23, 'ayu', 'afiiiiif@gmail.com', 'BBBBBBBBBBBBBBBBBB', '2024-11-14 13:53:39'),
(12, 40, 'aaaaaaaaa', 'afiiiiif@gmail.com', 'aaaaaaaaaaaaaaaaaaaaa', '2024-11-14 15:28:54'),
(13, 35, 'aziz', 'admin@gmail.com', 'aaaaaaaaaaaaaaa', '2024-11-14 15:50:40'),
(14, 32, ' rafi', 'afiiiiif@gmail.com', 'aaaaaaaaaaa', '2024-11-14 16:05:19'),
(15, 37, 'ansory', 'admin@gmail.com', 'cccccccccccccccccccccc', '2024-11-14 16:18:29'),
(16, 17, 'FANI', 'faris@gmail.com', 'Sangat Bagus', '2024-11-14 16:23:50'),
(18, 49, 'ansory', 'user@gmail.com', 'saya komentar', '2024-12-24 04:28:42'),
(19, 47, 'ansory', 'user@gmail.com', 'saya komentar disini', '2024-12-24 04:37:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id_konten` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isi_pesan` text COLLATE utf8mb4_general_ci,
  `tanggal_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kategori` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `gambar`, `isi_pesan`, `tanggal_posting`, `id_kategori`) VALUES
(15, 'KUKUHKAN TAKMIR MASJID MUJAHIDIN NGESTIHARJO BEGINI PESAN KETUA PCM KASIHAN', 'e669845afbdfdd9d930b1d1db59c1779.jpg', '<p>Pada hari Kamis 8 Agustus 2024 malam diselenggarakan Pengajian Rutin Malam Jumat oleh Takmir Masjid Mujahidin Satu Maret Kwaron Ngestiharjo Kasihan Bantul. Pada Pengajian kali bersamaan dengan Pengukuhan Takmir Masjid Mujahidin Satu Maret Kwaron Ngestiharjo. Pengukuhan dilakukan oleh Agus Mulyono dan Alif Khoiruddin Azizi masing-masing sebagai Ketua dan Wakil Sekretaris PCM Kasihan Bantul. Ketua PCM Kasihan melakukan Pengukuhan Takmir sedangkan Wakil Sekretaris PCM membacakan Surat Keputusan PCM. Acara Pengajian Rutin dan Pengkuhan Takmir tersebut dihadiri juga oleh Jajaran PRM Ngestiharjo Tengah (sebagai Persyarikatan yang menaungi Masjid Mujahidin) serta jamaah sekitar masjid. Dalam sambutannya, Ketua Takmir Aris Thobirin menyampaikan bahwa pergantian kepemimpinan adalah hal biasa dalam suatu lembaga atau organisasi yang paling penting adalah bagaimana setelah dikukuhkan dilanjutkan dengan program-program, aksi nyata serta memberikan konstribusi dan pelayanan bagi segenap jamaah. Hal senada juga disampaikan oleh Slamet Sujiman atas nama PRM Ngestiharjo Tengah, yang menyampaikan bahwa Masjid Mujahidin ini adalah wakaf untuk Muhammadiyah maka PRM Ngestiharjo berharap agar masjid ini dapat dijaga dan dirawat dengan baik baik fisik maupun kegiatannya agar membawa manfaat bagi umat. Selain itu Slamet Sujiman juga berpesan agar masjid Mujahidin ini amaliah ibadahnya harus sesuai dengan pandangan dan tuntunan Muhammadiyah (HPT-red). Slamet Sujiman berharap Takmir Masjid Mujahidin yang telah dikukuhkan bisa segera menjalankan program kedepan dengan lebih baik. Dalam amanatnya, Ketua PCM kasihan Agus Mulyono menyampaikan sebuah organisasi atau lembaga harus menggunakan prinsip 5T (Trust, Ta&rsquo;aruf, Ta&rsquo;awun, Tabayun, dan Tumandang). Selain itu, semua bidang harus saling bersinergi agar Masjid Mujahidin ini menjadi masjid yang unggul dan makmur-memakmurkan jamaah dan umat sekitarnya. Agus Mulyono juga menyampaikan bahwa Pengurus Takmir harus bisa menjadi contoh (uswatun hasanah) panutan dan tauladan bagi jamaah dan masyarakat. Menurut Agus Mulyono, kriteria minimal sebagai panutan adalah takmir harus rajin shalat berjamaah di masjid tepat waktu dan senang bersedekah. ooOOoo</p>\r\n', '2024-12-22 03:25:05', 8),
(16, 'PENGAJIAN KELUARGA SAKINAH RANTING AISYIYAH TIRTONIRMOLO BARAT: PRA-PRM HARUS SINERGIS AGAR MENJADI “PASANGAN HARMONIS” HADAPI TANTANGAN DAKWAH YANG MAKIN DINAMIS', '1eba695dd33cbe471e35ba5f814990b1.jpeg', '<p>Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Kasihan Bantul terus konsisten dan &ldquo;menyala&rdquo; dalam dakwah dan membina jamaah untuk mewujudkan keluarga yang sakinah. Pada hari Ahad 4 Agustus 2024 bertempat di Masjid MUHTADIN Pedukuhan Jeblog Kelurahan Tirtonirmolo diselenggarakan Pengajian Keluarga Sakinah Aisyiyah (PKSA) Ranting Tirtonirmolo Barat. PKSA sudah terselenggara sejak tahun 2012 setiap dua bulan sekali dengan tempat bergantian dari satu masjid ke masjid lain di wilayah Ranting Tirtonirmolo Barat. PKSA edisi Agustus 2024 yang duhadiri kurang lebih 500an jamaah ini diawali sambutan tuan rumah yakni Takmir Masjid Muhtadin Jeblog, M. Januri. &ldquo;Kami sebagai tuan rumah menyampaikan terima kasih kepada jamaah Aisyiyah-Muhammadiyah dari Masjid Muhtadin dan sekitarnya di wilayah Ranting Tirtonirmolo Barat yang masih memiliki semangat menyala untuk memakmurkan masjid dengan menghadiri PKSA PRA Tirtonirmolo Barat kali ini&rdquo;. Selanjutnya Januri mengungkapkan &ldquo;Meskipun kita dihadapkan pada tantangan ekonomi rumah tangga setiap waktu namun jangan mengendorkan semangat dalam menyemarakkan dakwah Aisyiyah/Muhammadiyah yang kita cintai ini&rdquo;. &ldquo;Dari bulan Maret sampai Agustus ini menurut kami banyak sekali kebutuhan belanja rumah tangga dari mulai puasa, lebaran, sekolah, bahkan sampai di bulan Agustus setiap rumah tangga mungkin harus berpartisipasi iuran dana dalam rangka peringatan hari kemedekaan RI ke-79 dari tingkat RT dan seterusnya tetapi ternyata yang membuat kita bangga adalah semangat warga Persyarikatan khususnya ibu- ibu Aisyiyah yang tetap menyala dan membara untuk menyemarakkan kegiatan dakwah Aisyiyah/Muhammadiyah,&rdquo; demikian ujar Januri. Sementara itu Ketua PRA Tirtonirmolo Barat, Murwanti, dalam sambutannya menyampaikan harapan agar semua jamaah dan anggota Persyarikatan selalu menggelorakan ibadah di lingkungan keluarga dan memperkuat doa untuk kebaikan orang tua, keluarga termasuk anak keturunan di rumah tangga masing-masing. Ketua Pimpinan Ranting Muhammadiyah (PRM) Tirtonirmolo Barat, Sofriyanto yang hadir dalam PKSA menyampaikan bahwa PKSA ini harus berdampak tidak hanya bagi keluarga jamaah yg hadir rutin dalam PKSA ini tapi harapannya juga berdampak bagi organisasi. &ldquo;Yang sakinah nanti jangan hanya jamaah PKSA ini tapi juga organisasinya yaitu PRA dan PRM juga harus sakinah.&rdquo; Menurut Sofriyanto, PRA dan PRM harus menjadi &ldquo;sejoli&rdquo; atau &ldquo;pasangan harmonis&rdquo; secara organisasi nantinya dan menjadi organisasi sakinah sehingga membuat pengurus dan anggotanya selalu merasa tenang, riang-senang, dan tidak bimbang dalam ber-Aisyiyah dan ber-Muhammadiyah. Selanjutnya Sofriyanto mengharapkan PRA dan PRM bisa menjadi pasangan sakinah ma waddah wa rahmah dalam wujud saling koordinasi, kolaborasi, sinergi, berbagi, dll. Ustadz Ahmad Masrusi sebagai pembicara dalam PKSA menyampaikan materi tentang akhlak sebagai fondasi bagi keluarga sakinah. &ldquo;Akhlak dalam hal komunikasi dan interaksi sesama anggota keluarga sangat penting dan berpengaruh bagi keberlangsungan keluarga&rdquo;. Menurut Ustaz Ahmad Masrusi, komunikasi apapun yang baik dari istri kepada suami atau dari suami kepada istri yang sederhana namun disampaikan dengan baik akan membawa dampak dan pengaruh yang baik bagi anggota keluarga. &ldquo;Mari kita selalu berdoa kepada Allah SWT agar diberi kekuatan menjalankan akhlak yang baik dan dipalingkan dari akhlak yang buruk&rdquo;, demikian ajakan dari ustaz Masrusi. ooOOoo</p>\r\n', '2024-12-22 03:24:54', 8),
(17, 'PRA-PRM Harus Sinergis Hadapi Tantangan Dakwah yang Dinamis', 'b5f482968e1259b470e12d81b6f024b7.jpg', '<p>BANTUL, Suara Muhammadiyah &ndash; Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Kasihan Bantul pada Ahad, 4 Agustus 2024 di Masjid Muhtadin Pedukuhan Jeblog Kelurahan Tirtonirmolo menggelar Pengajian Keluarga Sakinah Aisyiyah (PKSA) Ranting Tirtonirmolo Barat. PKSA sudah terselenggara sejak tahun 2012 setiap dua bulan sekali dengan tempat bergantian dari satu masjid ke masjid lain di wilayah Ranting Tirtonirmolo Barat. PKSA edisi Agustus 2024 yang dihadiri kurang lebih 500an jamaah. Ketua Takmir Masjid Muhtadin Jeblog, M. Januri menyampaikan terima kasih kepada seluruh warga Persyarikatan di wilayah Tirtonirmolo Barat yang tidak pernah lelah bersemangat bermuhammadiyah lewat memakmurkan masjid. &ldquo;Kami sebagai tuan rumah menyampaikan terima kasih kepada jamaah Aisyiyah-Muhammadiyah dari Masjid Muhtadin dan sekitarnya di wilayah Ranting Tirtonirmolo Barat yang masih memiliki semangat menyala untuk memakmurkan masjid dengan menghadiri PKSA PRA Tirtonirmolo Barat kali ini,&rdquo; jelasnya. Januri mengatakan meskipun dihadapkan pada tantangan ekonomi rumah tangga setiap waktu, namun jangan mengendorkan semangat dalam menyemarakkan dakwah Aisyiyah dan Muhammadiyah. &ldquo;Dari bulan Maret sampai Agustus ini menurut kami banyak sekali kebutuhan belanja rumah tangga dari mulai puasa, lebaran, sekolah, bahkan sampai di bulan Agustus setiap rumah tangga mungkin harus berpartisipasi iuran dana dalam rangka peringatan hari kemedekaan RI ke-79 dari tingkat RT dan seterusnya tetapi ternyata yang membuat kita bangga adalah semangat warga Persyarikatan khususnya ibu- ibu Aisyiyah yang tetap menyala dan membara,&rdquo; ujarnya. Sementara itu Ketua PRA Tirtonirmolo Barat, Murwanti, menyampaikan agar semua jamaah dan anggota Persyarikatan selalu menggelorakan ibadah di lingkungan keluarga. Dan memperkuat doa untuk kebaikan orang tua, keluarga termasuk anak keturunan di rumah tangga masing-masing. Ketua Pimpinan Ranting Muhammadiyah (PRM) Tirtonirmolo Barat, Sofriyanto menyampaikan PKSA ini harus berdampak tidak hanya bagi keluarga jamaah yg hadir rutin dalam PKSA ini tapi harapannya juga berdampak bagi organisasi. &ldquo;Yang sakinah nanti jangan hanya jamaah PKSA ini tapi juga organisasinya yaitu PRA dan PRM juga harus sakinah,&rdquo; katanya. Menurut Sofriyanto, PRA dan PRM harus menjadi &ldquo;sejoli&rdquo; atau &ldquo;pasangan harmonis&rdquo; secara organisasi nantinya dan menjadi organisasi sakinah sehingga membuat pengurus dan anggotanya selalu merasa tenang, riang-senang, dan tidak bimbang dalam ber-Aisyiyah dan ber-Muhammadiyah. Ia mengharapkan PRA dan PRM bisa menjadi pasangan sakinah ma waddah wa rahmah dalam wujud saling koordinasi, kolaborasi, sinergi, berbagi, dll. Ustadz Ahmad Masrusi sebagai pembicara dalam PKSA menyampaikan materi tentang aktualisasi akhlak karimah sebagai fondasi bagi keluarga sakinah. &ldquo;Akhlak karimah dalam hal komunikasi dan interaksi sesama anggota keluarga sangat penting dan berpengaruh bagi keberlangsungan keluarga,&rdquo; tuturnya. Menurut Masrusi, komunikasi apapun yang baik dari istri kepada suami atau dari suami kepada istri yang sederhana namun disampaikan dengan baik akan membawa dampak dan pengaruh yang baik bagi anggota keluarga. &ldquo;Mari kita selalu berdoa kepada Allah SWT agar diberi kekuatan menjalankan akhlak karimah dan dipalingkan dari akhlak yang buruk&rdquo;, ajaknya. (Sof/Cris/Lika) Artikel ini telah tayang di suaramuhammadiyah.id dengan judul: PRA-PRM Harus Sinergis Hadapi Tantangan Dakwah yang Dinamis, https://suaramuhammadiyah.id/read/pra-prm-harus-sinergis-hadapi-tantangan-dakwah-yang-dinamis Leave a Response</p>\r\n', '2024-12-22 03:24:24', 8),
(18, ' PRM TIRTONIRMOLO BARAT BERI KTAM KEPADA LURAH TIRTONIRMOLO: Sebuah Pesan untuk Mempimpin dengan Adil dan Amanah', 'c74bc3c0791e8827930ee3311f24e5e4.jpg', '<p>Ada yang spesial dari Pengajian Ahad Pagi (PAP) Pimpinan Ranting Muhammadiyah (PRM) Tirtonirmolo Barat Kasihan Bantul pada Ahad 28 Juli 2028 di Masjid Thoyyibah Kalipakis-Ambarbunangun. Pengajian tersebut menghadirkan Drs. Subagya, M.Pd. yang merupakan Lurah Tirtonirmolo Barat yang baru dilantik sebagai Lurah PAW untuk empat tahun mendatang. Dalam kesempatan PAP tersebut PRM membuat surprise dengan acara pemberian simbolis Kartu Tanda Anggota Muhammadiyah (KTAM) kepada Lurah Tirtonirmolo beserta istri (Kus Aminah) menyertai hadir dalam PAP tersebut. Penyerahan KTAM untuk Lurah Tirtonirmolo dan Ibu dilakukan oleh ketua PCM Kasihan, Agus Mulyono, S.E. didampingi Ketua dan jajaran PRM Tirtonirmolo Barat, serta Rektor Universitas Muhammadiyah Kupang, Prof. Dr. Zainur Wula, M.Si. yang hadir sebagai pembicara PAP PRM Tirtonirmolo Barat. Ketua PRM Tirtonirmolo Barat, Sofriyanto S.M. menuturkan bahwa pemberian KTAM kepada pejabat pemerintah baik itu lurah dan seterusnya merupakan sesuatu yang wajar, lumrah, dan lazim dalam Muhammadiyah. &ldquo;Ini hal yang wajar, lumrah, dan lazim dalam Muhammadiyah, bukan untuk kepentingan politik dan lainnya namun sebagai bentuk penghormatan dan pesan agar beliau nantinya dapat menjadi pemimpin yang amanah dan adil bagi semua kalangan tidak hanya bagi kalangan tertentu saja&rdquo;, ungkap Sofriyanto. Sofriyanto menambahkan, &ldquo;Secara domisili Lurah Drs. Subagya, M.Pd. tinggal di Ranting Muhammadiyah Tirtonirmolo Timur tetapi diserahkan dalam acara yang diselenggarakan oleh Ranting Muhammadiyah Tirtonirmolo Barat, hal itu tidak menjadi masalah karena di Tirtonirmolo ada lima Ranting Muhammadiyah yaitu Ranting Muhammadiyah Tirtonirmolo Tumur, Selatan, Barat, Utara, dan Tengah, semuanya dalam satu kepemimpinan Lurah Tirtonirmolo. Yang perlu dicatat, proses pembuatan KTAM untuk Lurah dan Bu Lurah ini sudah sesuai mekanisme melalui rekomendasi ranting tempat domisili PaknLurah dan rekomendasi Cabang Muhammadiyah Kasihan termasuk membayar uang pangkal sesuai ketentuan&rdquo;. Ketua Pimpinan Cabang Muhammadiyah (PCM) Kasihan, Agus Mulyono, S.E. menyatakan, &ldquo;PCM Kasihan mengapresiasi dan mengucapkan selamat dan sukses kepada Drs. Subagya, M. Pd., sebagai Lurah Tirtonirmolo dan sekaligus saat ini menjadi anggota kehormatan Muhammadiyah sekaligus menerima KTAM beserta istri dengan doa dan harapan semoga selalu bersinergi dan berkolaborasi dengan persyarikatan Muhammadiyah, Aisyiyah, dan organisasi otonom di Tirtonirmolo yang terbagi lima Ranting Muhammadiyah&rdquo;. Agus Mulyono, S.E. juga menyampaikan harapan untuk Lurah Tirtonirmolo agar menjadi pemimpin yang adil dan merakyat serta menjadikan dapat Tirtonirmolo sebagai desa yang baldatun thayyibatun wa rabbun ghaffur, semoga Muhammadiyah dan Aisyiyah Tirtonirmolo khususnya Tirtonirmolo Barat dibawah pimpinan beliau menjadi Muhammadiyah yang maju, unggul, dan mandiri dalam segala bidang. Sementara itu Drs. Subagya, M.Pd. dalam sambutannya menyampaikan rasa terima kasih atas kepercayaan warga Tirtonirmolo kepadanya untuk memimpin Tirtonirmolo empat tahun mendatang serta menyampaikan harapan, doa, dan kerja sama dari semua pihak, warga, tokoh, pimpinan RT, Dukuh, dan semuanya untuk kemajuan Tirtonirmolo ke depan. Selanjutnya Drs. Subagya, M. Pd. mengaku dengan Muhammadiyah bukan sebagai orang asing, &ldquo;Saya pernah mengajar sebagai Dosen Pamong di perguruan tinggi Muhammadiyah termasuk di Universitas Ahmad Dahlan, anak cucu saya sekolah di Muhammadiyah, jadi tidak asing lagi dengan Muhammadiyah&rdquo;, demikian pangkasnya.</p>\r\n', '2024-12-22 03:26:54', 1),
(19, ' PENGAJIAN MUHAMMADIYAH TIRTONIRMOLO BARAT: Belajar Kisah Senang dan Menantang Dakwah di Bumi Karang Kupang NTT', '30284eb66913265205bf37debcf127be.jpg', '<p>Pimpinan Ranting Muhammadiyah (PRM) Tirtonirmolo Barat Kasihan Bantul terus berusaha menggelorakan dakwah dan ghirah warga di Tirtonirmolo Barat dan sekitarnya. Salah satu program yang digalakkan adalah Pengajian Ahad Pagi (PAP) Ranting Tirtonirmolo Barat. PAP kali ini diselenggarakan pada Ahad 28 Juli 2024 menghadirkan Prof. Dr. Zainur Wula, S.Pd., M.Si., Rektor Universitas Muhammadiyah Kupang, yang juga pengurus Pimpinan Wilayah Muhammadiyah Nusa Tenggara Timur sebagai Wakil Ketua yang membidangi Pengembangan Cabang dan Ranting. PAP diselenggarakan di Masjid Thoyyibah Kalipakis-Ambarbinangun, sebuah masjid yang bernilai sejarah karena menurut tokoh setempat Dr. Khomsul Latifin masjid tersebut bediri sejak sebelum kemerdekaan RI. Ketua PRM Tirtonirmolo Barat, H. Sofriyanto, S.M., S.Pd. menyampaikan bahwa sampai hari ini Universitas Muhammadiyah Kupang adalah salah satu role model, contoh terbaik dalam konteks dakwah rahmatan lil alamin yang dikembangkan Muhammadiyah di wilayah minoritas muslim. &ldquo;Banyak kiprah dan kisah dakwah Muhammadiyah di daerah minoritas muslim yang sukses dan selama ini kita hanya mendengar dari medsos dalam PAP ini jamaah mendengar langsung melalui salah satu sumber dan aktornya yaitu Rektor Universitas Muhammadiyah Kupang (UMK), Prof. Dr. Zainur Wula, M.Si&rdquo;, demikian ungkap Sofriyanto. Sofriyanto menambahkan, dengan belajar kiprah dan kisah sukses UMK kita harapkan akan mengobarkan semangat dakwah dan kiprah warga Muhammadiyah di Tirtonirmolo Barat semakin berkobar, &ldquo;menyala, menyala, seperti ungkapan anak-anak sekarang.&rdquo; Ketua Pimpinan Cabang Muhammadiyah (PCM) Kasihan, Agus Mulyono, S.E. yanghadir dalam PAP tersebut mengapresiasi dan mendukung terselenggaranya PAP PRM Tirtonirmolo Barat yang menghadirkan tokoh dari Indonesia Timur yaitu Rektor Universitas Muhammadiyah Kupang Prof. Dr. Zainur Wula, M.Si yang menularkan pengalaman dakwah Muhammadiyah di daerah minoritas muslimnya dan minoritas warga Muhammadiyahnya dari jumlah penduduk Kota Kupang atau bahkan seluruh NTT. Sebagai pembicara utama, Prof. Dr. Zainur Wula, S.Pd., M.Si., menyampaikan pengalaman dakwah agar sukses dan berhasil dengan pendekatan penuh kearifan lokal sesuai kondisi sosio-kultural masyarakat serta dengan contoh baik dan amal nyata melalui pengembangan pendidikan dan ekonomi. (Oempri)</p>\r\n', '2024-12-22 03:26:41', 1),
(20, ' USTADZ HALIM PURNOMO UNGKAP MANAJEMEN RUMAH TANGGA BAHAGIA', '0eb82b6cb5e6075864c7c4fcdf471cfc.jpeg', '<p>Pimpinan Ranting Muhammadiyah Tamantirto Selatan rutin menyelenggarakan Pengajian Ahad Pagi di Masjid Khoirul Ummi Kasihan. Pada Pengajian Ahad Pagi 21 Juli 2024, Ustadz Dr. Halim Purnomo, M.Pd.I sebagai pemateri menyampaikan pengajian dengan tema &ldquo;Manajemen Rumah Tangga Bahagia&rdquo;. Pengajian juga disiarkan secara langsung di YouTube PRM Tamantirto Selatan. Sebagai informasi, Ustadz Halim Purnomo merupakan Sekretaris PRM Tamantirto Selatan, beliau juga aktif mengajar di S3 Psikologi Pendidikan Islam dan S1 Komunikasi dan Penyiaran Islam Universitas Muhammadiyah Yogyakarta. Dalam kajiannya, beliau menggarisbawahi pentingnya bersyukur atas segala rezeki yang diterima, termasuk kesempatan untuk hadir dan mengikuti kajian. Beliau mendoakan semoga kehadiran para jamaah kajian di Masjid Khoirul Ummi menjadi wasilah kepada Allah untuk terus mendapat Kesehatan fisik dan non fisik. Dengan tema yang disematkan, beliau membuka sesi penyampaian materi dengan bertanya kepada seluruh jamaah &ldquo;Bagaimana menjadikan rumah tangga kawak (lawas) Bahagia?&rdquo; Kebahagiaan rumah tangga yang kawak (lawas) perlu adanya penyegaran kembali, karena tidak lepas dari berbagai permasalahan, maka Ustadz Halim Purnomo menyampaikan beberapa kompenen agar dapat menjaga keluarga atau pasangan tetap bahagia. Mengetahui hak istri dan hak suami Alangkah baiknya jika suami memahami dan memenuhi kebutuhan istri dalam hal sandang, pangan, dan papan. Ketika suami bekerja untuk mencari nafkah, diharapkan istri dapat menggunakan uang tersebut dengan bijaksana. Selain itu, diharapkan istri juga dapat merawat penampilannya dan menyediakan makanan yang halal dan baik untuk anak-anaknya. Sebagai pencari rezeki, suami juga bertanggung jawab untuk menyediakan tempat tinggal yang nyaman dan layak bagi keluarganya, serta senantiasa mengajak keluarga untuk membaca ayat-ayat Al-Quran untuk mempercantik suasana rumah dari dalam maupun luar. Kerjasama antar suami dan istri Dalam analoginya, beliau mengibaratkan suami sebagai gelas dan istri sebagai teko yang saling melengkapi. Keduanya memiliki peran penting dalam saling menjaga dan menerima satu sama lain. Hubungan keduanya perlu dijaga agar tidak tergerus oleh rutinitas sehari-hari. Seiring berjalannya waktu dalam pernikahan, tidak jarang muncul tantangan-tantangan yang memerlukan penyelesaian bersama. Namun, diharapkan setiap persoalan yang muncul dapat dijadikan pembelajaran untuk mengelola masalah dengan lebih baik. Penting untuk selalu memperbarui diri dan meningkatkan kualitas hubungan dalam rumah tangga. Termasuk juga ketika mendapatkan rezeki, lalu membandingkanya denga rezeki orang lain, yang terkadang dapat mengurangi rasa syukur karena terfokus pada apa yang dirasa kurang. Rasulullah memberikan pesan kepada umatnya mengenai urusan dunia; انْظُرُوا إِلَى مَنْ هُوَ أَسْفَلَ مِنْكُمْ &ldquo;Lihatlah orang yang berada dibawah kalian)&rdquo; Bersyukur adalah kunci utama untuk menjaga keharmonisan. Lebih baik hidup sederhana namun bahagia daripada hidup dalam kemewahan namun merasa sengsara dan gelisah. Birrul Walidain Menjaga ketaatan kepada orang tua adalah hal yang penting, meskipun sudah menikah. Mempertahankan komunikasi dan hubungan yang baik dengan orang tua merupakan kunci untuk menjaga keharmonisan dalam rumah tangga dalam jangka waktu yang panjang. Tindakan-tindakan kecil atau sederhana dapat menjadi wasilah terbaik untuk menjaga keharmonisan rumah tangga. Kesimpulannya, beliau menyampaikan bahwa rumah tangga yang ingin bahagia adalah rumah tangga yang selalu menjaga birrul walidain (menjaga ketaatanya pada orang tua). Hidup atau telah meninggal, sebagai seorang anak dapat menyapa dan mengunjungi orang tuanya lewati do&rsquo;a ketika setelah sholat; رَّبِّ اغْفِرْلِي وَلِوَالِدَيَّ وَارْحَمْهُمَا كَمَا رَبَّيَانِي صَغِيراً &ldquo;Ya Tuhanku, ampunilah dosa-dosaku dan dosa kedua orang tuaku, sayangilah keduanya sebagaimana mereka telah menyayangi aku sewaktu kecil.&rdquo; Rasulullah bersabda bahwa keluarga besar yang memelihara iman dan islam mereka akan berkumpul di surga-Nya suatu hari nanti. Semoga Allah mengabulkan doa ini. Aamiin Yaa Rabbal Alamin. (FS) Oleh; Fikrotus Shofiyah</p>\r\n', '2024-12-22 03:26:28', 1),
(21, 'Awal Tahun Ajaran Baru 2024-2025 MTs Muhammadiyah Kasihan Gelar Upacara Bendera', '8ec04730eef397c68387be00ccad86b4.jpg', '<p>foto bersama pembina upacara berserta para petugas upacara dan guru setelah upacara Bantul, 15 Juli 2024.Bertempat di lapangan Asri harjo Bangunjiwo Kasihan Bantul digelar upacara awal tahun ajaran baru 2024- 2025 Madrasah Tsanawiyah Muhammadiyah Kasihan . Diikuti sekitar 300 siswa-siswi kelas 1,2 dan 3. Bertindak sebagai pembina upacara adalah Sumaryono ketua Pimpinan Ranting Muhammadiyah Bangunjiwo Barat. Dipagi yang dingin itu ratusan siswa berjalan berbondong rapi menuju lapangan Asriharjo, menempuh jarak sekitar 200 meter arah selatan dari gedung madrasah. diiringi segenab guru dan karyawan wajah wajah antusias terpancar semangat baru mengawali tahun ajaran baru 2024-2025 dengan hadir dalam pelaksanaan upacara bendera. Dalam amanatnya pembina upacara menyampaikan,&rdquo;para siswa sekalian,kalian adalah orang yang berjihad di jalan Allah karena Nabi SAW dalam hadis riwayat Turmuzi bersabda,&rdquo;Man Kharaja ilaa tholabul &lsquo;ilmi fahuwa fii sabilillah hatta yarji&rsquo; &ldquo;. artinya barang siapa yang keluar berangkat untuk mencari ilmu maka dia adalah orang yang berada di jalan Allah sampai dia kembali&rdquo;. Selanjutnya ketua PRM Bangunjiwo Barat juga mengajak seluruh siswa peserta upacara untuk bersemangat dan bersungguh sungguh dalam belajar serta senantiasa istiqomah. Sehingga akan terwujud cita-cita yang hendak diraih. Jadilah dokter, insinyur, birokrat bahkan menteri ataupun presiden yang penting bermanfaat bagi manusia.(mar)</p>\r\n', '2024-12-22 03:26:13', 1),
(22, 'PRM Bangunjiwo Barat berbagi dengan Warung Gratis Sembako hadapi kekejaman Covid-20', 'bf2ed19dd689648530b2c3a09957e654.jpeg', '<p>Bertempat di Gedung Muhammadiyah Bangunjiwo Barat, Ahad (17/5/2020), Keluarga Besar Muhammadiyah Bangunjiwo Barat, Kasihan, Bantul, laksanakan dua agenda kegiatan: launching warung sembako gratis bagi umat yang terdampak pandemi Covid-19 dan pembagian sembako gratis. Warung sembako gratis ini diinisiasi oleh Pimpinan Ranting Aisyiyah (PRA) Bangunjiwo Barat. Menurut Dra Hj Nuromdhon, Ketua PRA Bangunjiwo Barat, &lsquo;Aisyiyah bergerak dalam tolong-menolong bagi jamaah di sekitar wilayah Bangunjiwo Barat untuk sedikit meringankan dalam kebutuhan sehari-hari. &ldquo;Tapi jangan dilihat wujudnya dan yang paling penting adalah kepedulian sesama umat yang membutuhkan uluran tangan dari kita,&rdquo; kata Hj Nuromdhon. Adapun pembagian sembako gratis bagi anggota Pimpinan Ranting Muhammadiyah (PRM) dan Pimpinan Ranting &lsquo;Aisyiyah (PRA) serta jamaah masjid/musholla binaan Muhammadiyah Bangunjiwo Barat sebanyak 150 paket yang per paket senilai Rp 100 ribu. Seperti disampaikan Agus Mulyono, Ketua PRM Bangunjiwo Barat, bantuan ini semoga dapat bermanfaat untuk umat yang berdampak. &ldquo;Sehingga dapat sedikit meringankan beban rumah tangga bagi jamaah,&rdquo; kata Agus Mulyono yang berpesan kepada warga Muhammadiyah dan &lsquo;Aisyiyah untuk tetap sabar dalam menghadapi cobaan ini. &ldquo;Selain itu, jaga kesehatan dan tetap mematuhi protokol kesehatan dengan tetap memakai masker, selalu cuci tangan dan yang lebih penting selalu berdoa dalam suka dan duka,&rdquo; tandas Agus Mulyono, yang menambahkan jadi orang itu tidak perlu kondang (tenar), tapi yang penting tumandang (bekerja). (Affan/mediamu.id)</p>\r\n', '2024-12-22 03:33:36', 6),
(23, 'Pimpinan Cabang IPM Kasihan Siapkan Fortasi 2018', 'a23482fb331efca4363befa7c5289e7e.jpg', '<p>Pimpinan Cabang Kasihan Siapkan Fortasi 2018 Kasihan (10/07) Pimpinan Cabang Ikatan Pelajar Muhammadiyah (PC IPM) Kasihan malam ini menyelenggarakan rapat persiapan Fortasi 2018. Pertemuan dilaksanakan di Rumah Nur Amin, S.H.I. Mrisi Tirtonirmolo Kasihan Bantul pada pukul 20.00-selesai. Hadir Anggota Pimpinan Cabang Ikatan Pelajar Muhammadiyah Kasihan serta utusan dari pengurus IPM dari sekolah Muhammadiyah yang berada di wilayah kerja Cabang Muhammadiyah Kasihan. Fortasi kepanjangan dari Forum Orientasi dan Ta&rsquo;aruf Siswa. Kegiatan ini diperuntukkan bagi siswa baru di sekolah Muhammadiyah wilayah Cabang Kasihan. Selain memberikan pengenalan terhadap sekolah, Fortasi juga menjadi sarana mengenalkan Muhammadiyah dengan IPMnya. Lingkungan baru yang bakal menjadi tempat sehari-hari para siswa menuntut ilmu juga akan menjadi ajang menempa diri. Dengan mengenal sekolah dan seluk beluknya lebih komprehensif, maka para siswa akan cepat beradaptasi. Lebih cepat beradaptasi dengan lingkungan maka proses belajar juga akan semakin baik. Harapan berdirinya sekolah Muhammadiyah salah satunya adalah memberikan bekal agama kepada para siswa. Mengingat bahwa sekolah modern yang saat ini berdiri dirasa masih sangat kurang memberikan pengetahuan agama. Sedangkan pada masa remaja siswa perlu mendapatkan pondasi agama yang kuat. Pengetahuan agama dan akhlaqul karimah ini akan senantiasa dibawa selama hidupnya. Selain itu juga akan dikenalkan organisasi Ikatan Pelajar Muhamamdiyah yang disebut IPM. Organisasi otonom yang mewadahi para pelajar Muhammadiyah dari SMP dan SMA. Namun juga tidak membatasi para remaja umum diusia tersebut untuk mengikuti organisasi ini. Pimpinan Cabang Ikatan Pelajar Muhamamdiyah Kasihan membawahi Ranting IPM di wilayah Kasihan. Ranting di bawah PCIPM adalah PRIPM di SMA Muhammadiyah Kasihan, SMKMuhammadiyah Kasihan, SMP Muhammadiyah Senggotan, dan MTs Muhammadiyah Kasihan di Bangunjiwo. PC IPM Kasihan juga menyelenggarakan Fortasi di SMP Muhammadiyah Sewon. Fortasi akan dilaksanakan pada 16.sd 18 Juli 2018 selama 3 hari di sekolah-sekolah tersebut. Pelaksana kegiatan ini kolaborasi antara PC IPM Kasihan dibantu Hizbul Wathon serta Pimpinan Ranting IPM di sekolah masing-masing. Adapun materi yang disampaikan meliputi penguatan aqidah dan akhlaq, pengenalan organisasi keIPMan-Muhammadiyah, mengenal sekolah dan cara belajar efektif serta problematika remaja. Materi disampaikan oleh nara sumber yang telah ditentukan baik dari sekolah maupun dari unsur Muhammadiyah yang ditunjuk khususnya dari PC IPM, PC HW, dan Pimpinan Cabang Pemuda Muhammadiyah Kasihan.</p>\r\n', '2024-12-22 03:34:31', 6),
(24, 'Milad Muhammadiyah Cabang Kasihan 105 | 19 Nop 2017 | Jam: 07.00-11.30 WIB | Komplek Kelurahan Tirtonirmolo |', '1b1c14f8bc0974922b7fd6b75ba7eb7c.jpg', '<p>Milad Muhammadiyah Cabang Kasihan 105 | 19 Nop 2017 | Jam: 07.00-11.30 WIB | Komplek Kelurahan Tirtonirmolo | &ldquo;MUHAMMADIYAH MEMBANGUN JAMA&rsquo;AH DAN KUAT BERSAMA UMAT&rdquo; Pameran Amal Usaha Muhammadiyah Temu Sesepuh Muhammadiyah Jajan Bareng di Kantin Muhammadiyah Kumpul Dokumen Generakan Muhammadiyah Gelar Drumband Perguruan Muhamamdiyah dan Masjid Pentas Seni Anak dan Warga Muhammadiyah Orasi Muhammadiyah Nafas Nadi Gerakanku bersama Ketua LPCR Wilayah dan Direktur PKU Muhammadiyah Bantul Ustd. H.M. Jamaluddin Ahmad, S.Psi.</p>\r\n', '2024-12-22 03:34:18', 6),
(25, 'Milad Muhammadiyah Cabang Kasihan 105 | 19 Nop 2017 | Jam: 07.00-11.30 WIB | Komplek Kelurahan Tirtonirmolo |', 'dd9c4ce253ebf52ecf5007f5acd1bc8d.jpg', '<p>Milad Muhammadiyah Cabang Kasihan 105 | 19 Nop 2017 | Jam: 07.00-11.30 WIB | Komplek Kelurahan Tirtonirmolo | &ldquo;MUHAMMADIYAH MEMBANGUN JAMA&rsquo;AH DAN KUAT BERSAMA UMAT&rdquo; Pameran Amal Usaha Muhammadiyah Temu Sesepuh Muhammadiyah Jajan Bareng di Kantin Muhammadiyah Kumpul Dokumen Generakan Muhammadiyah Gelar Drumband Perguruan Muhamamdiyah dan Masjid Pentas Seni Anak dan Warga Muhammadiyah Orasi Muhammadiyah Nafas Nadi Gerakanku bersama Ketua LPCR Wilayah dan Direktur PKU Muhammadiyah Bantul Ustd. H.M. Jamaluddin Ahmad, S.Psi.</p>\r\n', '2024-12-22 03:34:08', 6),
(26, 'Nonton Bareng Film Dokumenter Bareng Danramil Kasihan', '807fb9112553edcf8eb5285c122cbbe8.jpg', '<p>As.wr.wb. Segenap Pimpinan Ranting Muhammadiyah Tamantirto Utara Dg ini memohon kehadiran dalam rangka Nonton Bersama Film G30SPKI pd hari Sabtu malam ahad 30 September 2017 pukul 19.30 Tempat Halaman Masjid Husnul Khatimah Rt 04 Peleman-Rukeman Tamantirto, Demikian Undangan ini disampaikan atas perhatian dan kehadiranya diucapkan terimakasih. Wasalam wr.wb. pengundang Tertanda Ketua PRM-TU Dr. Ali Muhammad, S.IP.,M.A NBM. 1020432</p>\r\n', '2024-12-22 03:33:24', 6),
(27, 'Sabtu, 02 Sept. 2017 J. 20.00-selesai | AMM Gelar Parade Takbir ke-10 | Pastikan Masjid/Mushalla Teman2 Muda di Kasihan Ngikut', '84f510bea6a7ac807e4958e06024c0c8.jpg', '<p>Sabtu, 02 Sept. 2017 J. 20.00-selesai | AMM Gelar Parade Takbir ke-10 | Pastikan Masjid/Mushalla Teman2 Muda di Kasihan Ngikut</p>\r\n', '2024-12-22 03:33:13', 6),
(28, 'KUKUHKAN TAKMIR MASJID MUJAHIDIN NGESTIHARJO BEGINI PESAN KETUA PCM KASIHAN', '0e0952c2ef8297bbcde2568da5c79227.jpeg', '<p>Pada hari Kamis 8 Agustus 2024 malam diselenggarakan Pengajian Rutin Malam Jumat oleh Takmir Masjid Mujahidin Satu Maret Kwaron Ngestiharjo Kasihan Bantul. Pada Pengajian kali bersamaan dengan Pengukuhan Takmir Masjid Mujahidin Satu Maret Kwaron Ngestihar</p>\r\n', '2024-12-22 03:30:22', 5),
(29, 'PENGAJIAN KELUARGA SAKINAH RANTING AISYIYAH TIRTONIRMOLO BARAT: PRA-PRM HARUS SINERGIS AGAR MENJADI “PASANGAN HARMONIS” HADAPI TANTANGAN DAKWAH YANG MAKIN DINAMIS', 'c8cacc31f885e2f1d09d2dbb36930339.jpeg', '<p>Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Kasihan Bantul terus konsisten dan &ldquo;menyala&rdquo; dalam dakwah dan membina jamaah untuk mewujudkan keluarga yang sakinah. Pada hari Ahad 4 Agustus 2024 bertempat di Masjid MUHTADIN Pedukuhan Jeblog Kelurahan T</p>\r\n', '2024-12-22 03:30:10', 5),
(30, 'PRA-PRM Harus Sinergis Hadapi Tantangan Dakwah yang Dinamis', 'f01ae826d7b206aedcfd53e0dac5b849.jpg', '<p>BANTUL, Suara Muhammadiyah &ndash; Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Kasihan Bantul pada Ahad, 4 Agustus 2024 di Masjid Muhtadin Pedukuhan Jeblog Kelurahan Tirtonirmolo menggelar Pengajian Keluarga Sakinah Aisyiyah (PKSA) Ranting Tirtonirmolo B</p>\r\n', '2024-12-22 03:29:57', 5),
(31, 'PRM TIRTONIRMOLO BARAT BERI KTAM KEPADA LURAH TIRTONIRMOLO: Sebuah Pesan untuk Mempimpin dengan Adil dan Amanah', '014f1cf3426779fdf8565056768265ff.jpg', '<p>Ada yang spesial dari Pengajian Ahad Pagi (PAP) Pimpinan Ranting Muhammadiyah (PRM) Tirtonirmolo Barat Kasihan Bantul pada Ahad 28 Juli 2028 di Masjid Thoyyibah Kalipakis-Ambarbunangun. Pengajian tersebut menghadirkan Drs. Subagya, M.Pd. yang merupakan Lu</p>\r\n', '2024-12-22 03:29:44', 5),
(32, 'RANTING ‘AISYIYAH TAMANTIRTO SELATAN DAN PAUD TERPADU KB TK ABA KEMBARAN GELAR KEGIATAN HARI ANAK NASIONAL 2024', '7b914a14024d07c428fab51086302e3a.jpeg', '<p>Dalam rangka memperingati Hari Anak Nasional 2024, Pimpinan Ranting &lsquo;Aisyiyah Tamantirto Selatan dan PAUD Terpadu KB TK Aisyiyah Kembaran menggelar kegiatan Semarak Hari Anak Nasional 2024 ke-40 dengan tema &ldquo;Anak Terlindungi, Indonesia Maju&rdquo;. Kegiatan ber</p>\r\n', '2024-12-22 03:25:36', 4),
(33, 'Musyran Muhammadiyah dan Aisyiyah Tamantirto Utara', '4d85cdb361ae8c0e980cdb55580f315a.jpeg', '<p>Pimpinan Ranting Muhammadiyah Tamantirto Utara (PRM Tamantirto Utara) menyelenggarakan Musyawarah Ranting (Musyran) pada Rabu, 19 Juli 2023 yang dibuka langsung oleh Ketua PCM Kasihan Agus Mulyono, S.E. Forum tertinggi di tingkat ranting ini adalah sasana</p>\r\n', '2024-12-22 03:25:45', 4),
(34, 'PRM Bangunjiwo Barat berbagi dengan Warung Gratis Sembako hadapi kekejaman Covid-19', 'd5caef94c7fb630ccd2248477fbeff42.jpg', '<p>Bertempat di Gedung Muhammadiyah Bangunjiwo Barat, Ahad (17/5/2020), Keluarga Besar Muhammadiyah Bangunjiwo Barat, Kasihan, Bantul, laksanakan dua agenda kegiatan: launching warung sembako gratis bagi umat yang terdampak pandemi Covid-19 dan pembagian sem</p>\r\n', '2024-12-22 03:25:55', 4),
(35, 'PRM Bangunjiwo Barat berbagi dengan Warung Gratis Sembako hadapi kekejaman Covid-19', '7789077dc4597c89e26d39a92e68e823.jpg', '<p>Bertempat di Gedung Muhammadiyah Bangunjiwo Barat, Ahad (17/5/2020), Keluarga Besar Muhammadiyah Bangunjiwo Barat, Kasihan, Bantul, laksanakan dua agenda kegiatan: launching warung sembako gratis bagi umat yang terdampak pandemi Covid-19 dan pembagian sembako gratis. Warung sembako gratis ini diinisiasi oleh Pimpinan Ranting Aisyiyah (PRA) Bangunjiwo Barat. Menurut Dra Hj Nuromdhon, Ketua PRA Bangunjiwo Barat, &lsquo;Aisyiyah bergerak dalam tolong-menolong bagi jamaah di sekitar wilayah Bangunjiwo Barat untuk sedikit meringankan dalam kebutuhan sehari-hari. &ldquo;Tapi jangan dilihat wujudnya dan yang paling penting adalah kepedulian sesama umat yang membutuhkan uluran tangan dari kita,&rdquo; kata Hj Nuromdhon. Adapun pembagian sembako gratis bagi anggota Pimpinan Ranting Muhammadiyah (PRM) dan Pimpinan Ranting &lsquo;Aisyiyah (PRA) serta jamaah masjid/musholla binaan Muhammadiyah Bangunjiwo Barat sebanyak 150 paket yang per paket senilai Rp 100 ribu. Seperti disampaikan Agus Mulyono, Ketua PRM Bangunjiwo Barat, bantuan ini semoga dapat bermanfaat untuk umat yang berdampak. &ldquo;Sehingga dapat sedikit meringankan beban rumah tangga bagi jamaah,&rdquo; kata Agus Mulyono yang berpesan kepada warga Muhammadiyah dan &lsquo;Aisyiyah untuk tetap sabar dalam menghadapi cobaan ini. &ldquo;Selain itu, jaga kesehatan dan tetap mematuhi protokol kesehatan dengan tetap memakai masker, selalu cuci tangan dan yang lebih penting selalu berdoa dalam suka dan duka,&rdquo; tandas Agus Mulyono, yang menambahkan jadi orang itu tidak perlu kondang (tenar), tapi yang penting tumandang (bekerja). (Affan/mediamu.id)</p>\r\n', '2024-12-22 03:27:22', 3),
(36, 'Kunjungan Silaturahmi LPCR PDM Bantul “ngaruhke” Cabang dan Ranting di Kasihan', 'bb9fdb9fd494bc86169c3a3f1ec3b3f9.jpeg', '<p>Bakmi Pele (31 Januari 2020) Drs. H. Sumarno PRS bersama rombongan Pimpinan Daerah Muhammadiyah Bantul hadir silaturahmi di Cabang Kasihan bertemu dengan LPCR Cabang Kasihan dan PRM Se Cabang Kasihan. Ada 9 Pimpinan Ranting yang hadir di Bakmi Pele Sembungan Tirtonirmolo Kasihan Bantul. Drs. H. Sumarno menyampaikan salam taklim kepada para pimpinan cabang maupun ranting yang sudah datang untuk menerima silaturahmi PDM Bantul. Tujuan utamanya adalah /;ngaruhke&rdquo; kegiatan yang dilakanakan baik oleh cabang maupun ranting. Sekaligus melakukan pengamatan langsung seiring dengan pemanfaatan Sistem Informasi Cabang dan Ranting (SICARA) yang sudah diluncurkan oleh PP Muhammadiyah beberapa waktu lalu. Ada beberapa cabang dan ranting yang belum terupdate, sehingga masih berwaarna merah. Sementara beberapa ranting di Kasihan ini juga masih merah. Artinya tidakterupdate datanya. Apakah hanya tidak terupdate ataukah memang pergerakan Muhammaidyah di wilayah tersebut tidak ada alias macet. Inilah yang perlu kita perjelas. Jika memang hanya karena ketidaktahuan untuk mengupdate di sistem maka, saat inilah kami dari LPCR PDM Bantul memberitahukan bagaimana cara mengippdatenya. Namun apabila memang tidak ada gerakan, maka sesegera mungkin kita bersama-sama bisa mengaktifkan kembali. Sementara H. Toto Budi Santoso selaku Ketua Cabang Kasihan menyampaikan terimakasih atas kunjungannya. Dan salah satu fungsi dari organisasi tataran atas memang adalah untuk memberikan semangat. Hal sederhana yang dapat dilakukan adalah silaturahmi. Walau hanya sekedar ikut berjamaah, berbincang mendengarkan keluh kesah. Barang kali ada yang bisa dilakukakn bersama untuk lebih memajukan dakwah Islamiah dengan organisasi Muhammadiyah. Hal lain yang perlu fikirkan lebih mendalam adalah aset Muhammadiyah berupa tanah. Tanah wakaf di Kasihan ini sangat banyak, tersebar di ranting-ranting melingkar dari Tambak jalan Godean sammpai ke ujung Bangunjiwo terdapat hampir puluhan tanah wakaf. Ada sebagian yang sudah lumayan terpelihara dan dipergunakan untuk beberapa kegiatan mulai dari tempat ibadah dan AUM. Namun ada yang masih nganggur belum dimanfaatkan. Sementara PRM yang sudah hadir pada pertemuan tersebut menyampaikan satu persatu perkembangan muhammadiyah di masing-masing wilayah. Mulai dari kajian pimpinan rutin yang diselenggarakan, pengajian anggota, amal usaha yang dilaksanakan, serta prestasi yang sudah diperoleh.<br />\r\n&nbsp;</p>\r\n', '2024-12-22 03:24:45', 7),
(37, 'Kajian di Penghujung Tahun 2019 bersama Dr. Untung Cahyono, S.H., M.Hum.', '4b3c109e120654cd802e830ed5a10dad.jpg', '<p>PCM Kasihan menyelenggarakan Kajian di Penghujung Tahun 2019 pada tanggal 31 Desember 2019 bersama Pimpinan Wilayah Muhammadiyah Yogyakarta Dr. Untung Cahyono, S,H,, M.Hum. Kajian di gelar di Masjid K.H. Ahmad Dahlan Kampus Terpadu Universitas Muhammadiyah Yogyakarta mulai pukul 20.00 &ndash; 22.30 WIB dengan dihadiri perwakilan dari anggota Pimpinan Ranting se Kecamatan Kasihan baik Muhammadiyah maupun Aisyiyah. Juga dihadiri oleh Organisasi Ortonom dan AUM se Kasihan. Untung Cahyono menyampaikan bahwa satu aspek pokok yang menjadikan Muhammadiyah menjadi besar adalah pola organisasi yang selalu mengamalkan firman Allah SWT dalam surat Al Hasyr 18. َا أَيُّهَا الَّذِينَ آمَنُوا اتَّقُوا اللَّهَ وَلْتَنْظُرْ نَفْسٌ مَا قَدَّمَتْ لِغَدٍ ۖ وَاتَّقُوا اللَّهَ ۚ إِنَّ اللَّهَ خَبِيرٌ بِمَا تَعْمَلُونَ &ldquo;Hai orang-orang yang beriman, bertakwalah kepada Allah dan hendaklah setiap diri memperhatikan apa yang telah diperbuatnya untuk hari esok (akhirat); dan bertakwalah kepada Allah, sesungguhnya Allah Maha Mengetahui apa yang kamu kerjakan&rdquo;. Seiring dengan pengelolaan organisasi modern yang harus selalu melakukan audit terhadap kinerja. Maka Muhammadiyah sudah jauh-jauh hari melaksanakannya. Belajar dari pendirian Perguruan Tinggi Muhammadiyah yang tergabung dalam PTM se Indonesia tidak lepas dari perbaikan terus menerus yang mendasarkan kepada evaluasi kinerja. Selain itu Muhammadiyah berkembang karena kader-kader yang telah dihasilkannya. Beberapa kriteria kader ideal dalam Muhammadiyah harus memenuhi 4 syarat yaitu: Keislaman, Akademik-intelektual, Keorganisasian dan Kepemimpinan, serta Kepeloporan dan Kemanusiaan. Untung Cahyono menutup kajiannya dengan menekankan bahwa warga Muhammadiyah harus bisa mengenali diri sehingga dapat membedakan dengan pribadi lainnya.Sehingga memgetahui karakter seperti apa yang harus dimiliki oleh warga Muhammadiyah. Salah satu jalannya adalah mengetahuinya dari Buku Pedoman Hidup Islami Warga Muhammadiyah (BPHIWM). Pertanyaan besar bagi warga Muhammadiyah terlebih kepada para pengurus Muhammadiyah adalah &ldquo;Sudahkah kita memahami atau setidaknya membaca buku tersebut?&rdquo;</p>\r\n', '2024-12-22 03:25:14', 7),
(38, 'Khitankan 10 Anak Amal Nyata PRM Tirtonirmolo Selatan', 'ccccfcf55cddf215dce7dcfd6eb6e875.jpg', '<p>Kasihan (24/12) PRM Tirtonirmolo Selatan menyelenggarakan Khitanan Masalah. Diselenggarakan Selasa, 24 Desember 2019 mulai 08.00-10.30 WIB di SMA Muhammadiyah 1 Kasihan. Diikuti oleh 10 anak dari wilayah kerja Ranting Muhammadiyah Tirtonirmolo Selatan, Tirtonirmolo, Kasihan, Bantul. Khitanan masal yang diselenggarakan dengan melibatkan dokter-dokter PKU Muhammadiyah Gamping sebagai tim medis. dr. Muhammad Taufik Ismail, Sp. JP yang kebetulan juga sebagai anggota PRM Tirtonirmolo Selatan menerangkan bahwa dengan khitan selain melaksanakan kewajiban yang dituntunkan Nabi juga berefek sehat khususnya bagi kaum laki-laki. Selain itu tubuh anak biasanya juga akan cepat tumbuh. PRM Tirtonirmolo Selatan memberikan contoh nyata bentuk pengabdian kepada masyarakat untuk meringankan tugas orang tua mengkhitankan anak laki-laki mereka. Selain itu penyelenggara juga memberikan uang saku bagi peserta, baju koko, sarung, dan peci. Sebelum khitan para peserta diarak keliling wilayah ranting sebagai syiar dan mengenalkan kepada generasi penerus perjuangan Muhammadiyah Ranting Tirtonirmolo Selatan dan Muhammadiyah di Kasihan.<br />\r\n&nbsp;</p>\r\n', '2024-12-22 03:25:24', 7),
(39, 'Resepsi Milad 107 Muhammadiyah Mencerdaskan Kehidupan Bangsa oleh Dr. H. Abdul Mu’ti, M.Ed. Sekretaris PP Muhammadiyah.', '3ec3a7b948ce9df79a398138bb2f3c50.jpeg', '<p>Resepsi Milad 107 Muhammadiyah Mencerdaskan Kehidupan Bangsa oleh Dr. H. Abdul Mu&rsquo;ti, M.Ed. Sekretaris PP Muhammadiyah. Harus bersyukur atas apa yang kita capai, dan Muhammadiyah telah mampu meraih MDMC resmi menjadi jaringan kemanusiaan yang masuk Tim WHO PBB. Gelar Pahlawan Nasional Kepada Prof. Abdul Kahar Mudzakkir diberikan pada 10 November 2019. Ada 4 orang Muhammadiyah yang berjasa meletakkan dasar negara Indonesia yaitu Sukarno, Kasman Singodimejo, Abdul Kahar Mudzakir 5 modal sosial Muhammadiyah yang luar biasa yaitu.. Ribuan sekolah, rumah sakit, pelayanan sosial bukan karena Muhammadiyah punya anggota yang banyak dan merupakan milyader. Tapi kuncinya adalah modal sosial dan modal moral. Muhammadiyah mempunyai nama baik, ada kepercayaan pada nama Muhammadiyah. Tertib administrasi dan keuangan menjadikan tidak hanya orang Muhammadiyah yang percaya. Orang2 di luar Muhammadiyah juga percaya dengan organisasi Muhammadiyah. Yang kedua, Muhammadiyah mempunyai nama besar. Diakui dan layak kita banggakan. Modal ketiga, modal intelektual, keceedasan. Kekuatan Muhammadiyah ada pada isi kepala, sedangkan mungkin di tempat lain jumlah kepala. Canda Kyai Abdul Mu&rsquo;ti orang Muhammadiyah selalu kalah pada saat pemilihan. Setiap kali ada masalah PR larinya kepada Muhammadiyah, namun jika ada Rp maka tidak diberikan ke Muhammadiyah. Modal ke empat, Muhammadiyah punya jaringan yang terstruktur dari pusat sampai ranting bahkan jamaah, gerakan yang masif terkondisi dan terkoordinasi. TK ABA pada 1 abad telah menginternasional, di Malaysia, Thailand, dan kota lain seperti Cairo. Dengan murid beragama nasrani. Modal ke lima, Modal spiritual. Muhammadiyah melakukan semua ini karena li kalimatillah, li mardhatiah menjadikan inner power yang tidak terhingga. Pengorbanan dan keikhlasan, dan tidak mengukur diri dari gaji yang diterima. Berapapun pendapatan yang diperoleh tetapi jika tidak disyukuri Having moot, bersyukur dengan yang dimiki dan beeing moot pingin semuanya, sehingga tidak akan terpuaskan. Muhammadiyah mencerdaskan kehidupan bangsa. Orang bicara revolusi Industri hidup dalam era digital. Smith mengatakan bahwa dunia sekarang terhubung dengan internet. Pendidikan Indonesia ada 3 kritik: &ndash; era 2.0 saja indonesia belum bisa memaksimalkan teknologi listrik. &ndash; 53% sedunia tidak bisa membaca, indonesia memberikan kontribusi sebesar 47%. Bukan textual membaca yang dimaksud bisa membaca tetapi tidak faham. &ndash; Problem pembodohan dengan adanya diss informasi, tidak mendapatkan ilmu dari yang dibacanya. Orang membaca di internet bukan untuk mendapatkan kebenaran tetapi ingin mendapatkan pembenaran. Sebenarnya ada banyak masalah tetapi seolah2 tidak masalah. Hal itu karena orang tidak mendapatkan pengetahuan dan informasi. Sabda Rasulullah SAW bersabda bahwa Alloh tidak akan mencabut ilmu secara serta merta, tetapi Alloh akan mewafatkan para &lsquo;alim dan tidak ada penggantinya. Ciri kiamat, ilmu diangkat, kebodohan diturunkan, banyak fitnah, dan terjadi al harju- al qotlu yaitu banyak pembunuhan. Saat ini banyak orang mempunyai sifat tabbaru jal jahiliyyah itu prilaku orang yang tidak bodoh tetapi bersikap bodoh, pinter tetapi keblinger, punya akal tetapi hobinya membodohi. Yang harus dilakukan oleh Muhammadiyah: &ndash; 10% murid dari tk smp mahasiswa ada di lembaga Muhammadiyah. &ndash; Muhammadiyah ingin menjadikan orang berilmu, cerdas yang bisa dilihat dari cara bicara, berprilaku, dan dapat mendemonstrasikan kemampuannya untuk mengolah kekayaan, sumber daya untuk kemakmuran umat manusia. Agar dapat menjadikan diri meneruskan keberlangsungan Muhammadiyah dengan segala visi misi dan marwah Muhammadiyah. Surat yang terkait: &ndash; Al Alaq (Iqra&rsquo; bismirabbikaladzi khalaq) &ndash; Al Alaq (Nun wal qalami wamaa yas turun) Rasulullah SAW: &ndash; Mengajarkan Al Quran dengan kekayaan pengetahuan, ilmu, dan agama &ndash; Memberikan contoh mengamalkannya &ndash; Membangun masyarakat dengan ilmu Pembaharuan Muhammadiyah pada Pendidikan: &ndash; Pengembangan institusional (model barat dan Islam) &ndash; Pembaharuan kurikulum (agama dan mu umum) &ndash; Pembaharuan Model Pembelajaran dengan dialog. Saat ini sehat merupakan gaya hidup healty life style. Yang kedua adalah kulinery tourism. Spiritual life style, hidup bernuansa agamis. Medical tourism, orang yang berobat walaupun sehat.</p>\r\n', '2024-12-22 03:27:35', 3),
(40, 'Resmikan Gedung Ranting Muhammadiyah Bangunjiwo Barat dan Pelantikan Pengelola AmbulanMu PCM Kasihan', '20b8c92cf8aa7469efa2242743a82fe5.jpeg', '<p>MILAD MUHAMMADIYAH 110 bersama dengan Lounching Ambulanmu Kasihan, serah terima dan Pelantikan Pengelola Ambulanmu Kasihan PCM Kasihan dan Pelantikan Gedung Muhammadiyah Bangunjiwo Barat. Diselenggarakan Ahad, 29 September 2019 padal pukul 09.00-12.00 WIB di Komplek Perguruan Muhammadiyah (SMK Muhammadiyah Kasihan, MTs Muhammadiyah Kasihan, dan Komplek Kantor Muhammadiyah Bangunjiwo Barat). Hadir untuk meresmikan Drs. H. Sahari, M.Pd. bersama dr. Agus Taufiqurrahman, M.Kes., Sp.S. selaku Pimpinan Pusat Muhammadiyah. sebagai penceramah. Acara dimeriahkan oleh Paduan Suara PKU Bantul, Penampilan Tapak Suci MTs. Muhammadiyah Kasihan, TK ABA Lemahdadi, Polcil SD Muhammadiyah Tamantirto, dan dukungan dari Paguyuban AmbulanMu se Bantul, juga pengawalan Kokam Kasihan.</p>\r\n', '2024-12-22 03:27:48', 3),
(46, 'Kunjungan Silaturahmi LPCR PDM Bantul “ngaruhke” Cabang dan Ranting di Kasihan', 'e.jpg', '<p>&ldquo;Dalam mendukung gerak dakwah Muhamamdiyah saat ini dan mendatang, sebagai kader Muhammadiyah perlu ditanamkan jiwa kader yang bermental tangguh dan pantang menyerah, memegang teguh komitmen sebagai kader sejati, dan tidak perlu ragu-ragu menjadi kader Muhammadiyah,&rdquo; demikian disampaikan oleh Ketua PCM Kasihan, Agus Mulyono, S.E. Sabtu 14 November 2024 di halaman SMK Muhammadiyah Bangunjiwo Kasihan saat melepas 24 peserta Diklatsar KOKAM Kasihan Angkatan IX.</p>\r\n\r\n<p>Kegiatan Diklatsar KOKAM Kasihan Angkatan IX ini diselenggarakan untuk menguji mental dan fisik calon anggota KOKAM karena harus bermalam di bumi perkemahan Sembung Hutan Pinus. Untuk menuju Sembung peserta harus jalan kaki sekitar 5 km dengan membawa perlengkapan selama dua hari. Dari 24 peserta ada yang sudah berumur 65 th tapi semangatnya luar biasa.</p>\r\n', '2024-12-22 10:28:41', 1);
INSERT INTO `konten` (`id_konten`, `judul`, `gambar`, `isi_pesan`, `tanggal_posting`, `id_kategori`) VALUES
(47, 'PENGAJIAN KELUARGA SAKINAH RANTING AISYIYAH TIRTONIRMOLO BARAT: PRA-PRM HARUS SINERGIS AGAR MENJADI “PASANGAN HARMONIS” HADAPI TANTANGAN DAKWAH YANG MAKIN DINAMIS', 'a.jpeg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:29:20', 1),
(48, 'PENGAJIAN KELUARGA SAKINAH RANTING AISYIYAH TIRTONIRMOLO BARAT: PRA-PRM HARUS SINERGIS AGAR MENJADI “PASANGAN HARMONIS” HADAPI TANTANGAN DAKWAH YANG MAKIN DINAMIS', 'x.jpeg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:30:49', 5),
(49, 'KUKUHKAN TAKMIR MASJID MUJAHIDIN NGESTIHARJO BEGINI PESAN KETUA PCM KASIHAN', 'd.jpg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:31:13', 1),
(50, 'Kunjungan Silaturahmi LPCR PDM Bantul “ngaruhke” Cabang dan Ranting di Kasihan', 'b.jpeg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2024-12-22 10:31:47', 5),
(51, 'PENGAJIAN KELUARGA SAKINAH RANTING AISYIYAH TIRTONIRMOLO BARAT: PRA-PRM HARUS SINERGIS AGAR MENJADI “PASANGAN HARMONIS” HADAPI TANTANGAN DAKWAH YANG MAKIN DINAMIS', 'b1.jpeg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:35:00', 6),
(52, 'PRM Bangunjiwo Barat berbagi dengan Warung Gratis Sembako hadapi kekejaman Covid-19', 'c1.jpg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:35:15', 6),
(53, 'PRA-PRM Harus Sinergis Hadapi Tantangan Dakwah yang Dinamis', 'y.jpeg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:35:38', 6),
(54, 'KUKUHKAN TAKMIR MASJID MUJAHIDIN NGESTIHARJO BEGINI PESAN KETUA PCM KASIHAN', 'e1.jpg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:35:51', 6),
(55, 'Milad Muhammadiyah Cabang Kasihan 105 | 19 Nop 2017 | Jam: 07.00-11.30 WIB | Komplek Kelurahan Tirtonirmolo |', 'x1.jpeg', '<p>&ldquo;Komitmen, ini merupakan fondasi yang menguatkan hubungan keluarga agar tetap kokoh menghadapi berbagai dinamika kehidupan. Dengan komitmen yang kuat, pasangan suami-istri akan mampu menjalani kehidupan rumah tangga secara harmonis, seimbang, dan penuh berkah sebagai ihtiar mewujudkan keluarga sakinah, keluarga yang tenang, penuh cinta, kasih-sayang, dan diridai oleh Allah SWT.&rdquo;</p>\r\n\r\n<p>Demikian disampaikan oleh Ustazah Dra. Mariatun Sholikhah (Anggota Majelis Hukum dan HAM Pimpinan Wilayah Aisyiyah DI Yogyakarta) saat menjadi pembicara Pengajian Keluarga Sakinah Pimpinan Ranting Aisyiyah (PRA) Tirtonirmolo Barat Cabang Kasihan Daerah Bantul DIY pada Ahad 17 November 2024 di Masjid Amar Makruf Nahi Mungkar Kampung Menayu Lor, sebuah masjid yang representatif lokasinya di wilayah Ranting Tirtonirmolo Barat.</p>\r\n\r\n<p>&ldquo;Selain komitmen, fondasi penting dalam membangun keluarga sakinah adalah &ldquo;komunikasi&rdquo; antar anggota keluarga. Komunikasi efektif yang terbangun dalam keluarga sakinah akan dapat dilihat dengan adanya keterbukaan dalam &ldquo;menyampaikan&rdquo; dan &ldquo;mendengarkan&rdquo; perasaan dan pemikiran para anggota keluarga tersebut. Saling menyampaikan secara terbuka dan saling mendengarkan dengan penuh empati dan menghormati pendapat satu sama lain. Jika itu terjadi maka akan sangat baik dalam proses membangun keluarga sakinah.&rdquo; Demikian ustazah Mariatun Sholikhah menambahkan.</p>\r\n\r\n<p>Ustazah Mariatun Sholikhah yang aktif mendampingi warga yang memiliki masalah hukum dan membuka konsultasi hukum ini juga menyampaikan pengalaman dan berbagi resep membina hubungan keluarga, &ldquo;Untuk dapat menjaga hubungan baik antar anggota keluarga maka resepnya empat T, yaitu: Tahabbub (saling cinta), Taafuf (saling memaafkan), Taawun (saling menolong), dan Tasyawur (saling bermusyawarah). Selain itu ada empat P yang perlu dihindari dalam membina keluarga yaitu: Pertengkaran, Pukul (KDRT), Pergi tanpa pamit, dan Perceraian.&rdquo;</p>\r\n\r\n<p>Pengajian Keluarga Sakinah diawali dengan pembacaan Kalam Ilahi, Sambutan Takmir, dan Sambutan Ketua PRA Tirtonirmolo Barat.</p>\r\n\r\n<p>Ketua Takmir Masjid Amar Makruf Nahi Mungkar, Ustaz Sugiyono dalam sambutannya memyampaikan: &ldquo;Kami merasa bahagia dan bersyukur karena dipercaya oleh Aisyiyah untuk menjadi tuan rumah Pengajian Keluarga Sakinah dan alhamdulillah pagi ini jamaahnya sangat antusias, melimpah sampai keluar di jalanan, mudah-mudahan akan membawa dampak positif bagi kemakmuran masjid Amar Makruf Nahi Mungkar ini ke depan.&rdquo;</p>\r\n\r\n<p>Ketua PRA Tirtonirmolo Barat, Ustazah Murwanti dalam sambutannya menyampaikan rasa optimis: &ldquo;Pengajian Keluarga Sakinah ini sudah berlangsung sejak 2012 alhamdulillah masih istikamah dan jamaahnya semakin meningkat dilihat dari pagi ini disediakan konsumsi oleh tuan rumah sejumlah 400 lebih, insa Allah aman.&rdquo;</p>\r\n\r\n<p>Ustazah Murwanti menambahkan, &ldquo;Kegiatan PRA Tirtonirmolo Barat bukan hanya Pengajian Keluarga Sakinah ini saja tapi banyak pengajian yang lain dan semuanya &ldquo;gayeng&rdquo;, meneyangkan dan menggembirakan.&rdquo;</p>\r\n\r\n<p>Sementara itu, Ketua Pimpinan Ranting Muhammadiyah Tirtonirmolo Barat, H. Sofriyanto Solih M, dalam sambutan setelah pengajian inti menggarisbawahi aspek komunikasi yang disampaikan oleh pembicara ustadzah Dra. Mariatun Sholikhah sebagai faktor penting membangun keluarga Sakinah Mawadah warahmah (SAMAWA).</p>\r\n\r\n<p>&ldquo;Kita sebagai orang tua harus senang ketika ada anak kita yang bisa diajak berkomunikasi dengan terbuka dan tidak merasa canggung, demikian juga suami terhadap istri atau sebaliknya, harus mau terbuka dalam hal komunikasi. Namun, tantangan keluarga saat ini adalah ketergantungan pada perangkat teknologi seperti ponsel dan media sosial sering mengurangi waktu berkualitas bersama keluarga. Interaksi tatap muka tergantikan oleh komunikasi digital yang kurang mendalam.&rdquo;</p>\r\n\r\n<p>Sofriyanto melanjutkan, SAMAWA sebagai akronim dari sakinah mawadah warahmah saat ini mengalami pergeseran, Sofriyanto mencotohkan, ada keluarga makan bersama di warung, sambil menunggu makanan datang, terlihat bapak, ibu, anak-anak semua main HP. Setelah makanan datang lengkap, masih terlihat bapak, ibu, anak-anak semua makan sambil main HP. Sofriyanto menanyakan kepada jamaah yang hadir: &ldquo;itu tanda samawa atau bukan?&rdquo; dijawab oleh jamaah: &ldquo;bukan&rdquo;. Sofriyanto menangkal: &ldquo;Itu samawa zaman now, karena SAMAWA adalah Sama-sama sibuk WA.&rdquo; Jamaahpun merespon dengan tertawa.</p>\r\n', '2024-12-22 10:36:05', 6),
(56, 'berita baru', 'avatar.jpg', '<p>Tahun 1933 diselenggarakan Konggres Muhammadiyah ke 22 (sekarang Muktamar) di Semarang bertempat di kampung Bon Cino Jl. Mataram. Salah satu hasil Konggres adalah memutuskan untuk membeli tanah di Jl. Sadewa Nomor 45 (sekarang Jl. Indraprasta nomor 37). Di Jalan Sadewa ini kemudian dijadikan sebagai Kantor Konsulat Muhammdiyah Semarang. Selain kegiatan rutin mengadakan pengajian-pengajian, kemudian berkembang ke dunia pendidikan, yaitu dengan mendirikan HIS. (Sumber: H. Soewito, sesepuh Muhammadiyah dan pelaku sejarah).</p>\r\n\r\n<p>Pada tahun 1950 terjadi serah terima pengelolaan yatim piatu dari Majelis Umat Islam (MUI) sekarang Majelis Ulama Indonesia, dan ditampung di Jl. Sadewa 45 (Indraprasta 37). Kemudian pada tahun 1960 Yatim Piatu pindah ke Singosari (sekarang kompleks Rumah Sakit Roemani). Di tempat ini selain sebagai Gedung Yatim Piatu dan Kantor Muhammadiyah Semarang, juga terdapat Gedung SD Muhammadiyah 08 dan Kantor Pimpinan Muhammadiyah Wilayah Jawa Tengah. Sebagian tanah dimanfaatkan juga sebagai pertanian tanaman sayur-sayuran, kolam ikan, peternakan ayam dan kambing yang bermanfaat bagi ketrampilan dan kegiatan sehari-hari anak Panti Asuhan, disamping juga sebagai upaya menambah dana untuk kepentingan Panti.</p>\r\n', '2024-12-23 16:33:21', 3),
(57, 'PENGAJIAN KELUARGA SAKINAH RANTING AISYIYAH TIRTONIRMOLO BARAT: PRA-PRM HARUS SINERGIS AGAR MENJADI “PASANGAN HARMONIS” HADAPI TANTANGAN DAKWAH YANG MAKIN DINAMIS', 'e2.jpg', '<p>Diceritakan oleh &nbsp;almarhum K.H. Ali Cholil (cucu Kyai Sholeh Darat, sekaligus pelaku sejarah) Gedung yang dipakai untuk kantor Muhammadiyah mula-mula menempati rumah K.H. Mashud Ilyas di Kampung Petrus dan Mijen Jl. Gendingan (sekarang komplek Mall Sri Ratu), yang kemudian pindah di Jl. Kakap 72 Kelurahan Mlayu Darat (Sekarang Kel. Dadapsari Semarang Utara). Gedung ini merupakan wakaf dari H Ahmad Said Makarim dari Solo.</p>\r\n\r\n<p>Tahun 1928 dibentuk Konsulat Muhammadiyah Semarang, yang diresmikan oleh K.H. Dzazuli dari Yogyakarta. Sebagai ketua pertama adalah K.H. Dzulkarnain. Kantor secretariat konsulat Muhammadiyah pertama di kampung Krendo Kauman. Kegiatannya sementara hanya pengajian-pengajian.</p>\r\n\r\n<p>Tahun 1933 diselenggarakan Konggres Muhammadiyah ke 22 (sekarang Muktamar) di Semarang bertempat di kampung Bon Cino Jl. Mataram. Salah satu hasil Konggres adalah memutuskan untuk membeli tanah di Jl. Sadewa Nomor 45 (sekarang Jl. Indraprasta nomor 37). Di Jalan Sadewa ini kemudian dijadikan sebagai Kantor Konsulat Muhammdiyah Semarang. Selain kegiatan rutin mengadakan pengajian-pengajian, kemudian berkembang ke dunia pendidikan, yaitu dengan mendirikan HIS. (Sumber: H. Soewito, sesepuh Muhammadiyah dan pelaku sejarah).</p>\r\n', '2024-12-23 17:09:33', 2),
(58, 'PRA-PRM Harus Sinergis Hadapi Tantangan Dakwah yang Dinamis', 'b2.jpeg', '<p>Diceritakan oleh &nbsp;almarhum K.H. Ali Cholil (cucu Kyai Sholeh Darat, sekaligus pelaku sejarah) Gedung yang dipakai untuk kantor Muhammadiyah mula-mula menempati rumah K.H. Mashud Ilyas di Kampung Petrus dan Mijen Jl. Gendingan (sekarang komplek Mall Sri Ratu), yang kemudian pindah di Jl. Kakap 72 Kelurahan Mlayu Darat (Sekarang Kel. Dadapsari Semarang Utara). Gedung ini merupakan wakaf dari H Ahmad Said Makarim dari Solo.</p>\r\n\r\n<p>Tahun 1928 dibentuk Konsulat Muhammadiyah Semarang, yang diresmikan oleh K.H. Dzazuli dari Yogyakarta. Sebagai ketua pertama adalah K.H. Dzulkarnain. Kantor secretariat konsulat Muhammadiyah pertama di kampung Krendo Kauman. Kegiatannya sementara hanya pengajian-pengajian.</p>\r\n\r\n<p>Tahun 1933 diselenggarakan Konggres Muhammadiyah ke 22 (sekarang Muktamar) di Semarang bertempat di kampung Bon Cino Jl. Mataram. Salah satu hasil Konggres adalah memutuskan untuk membeli tanah di Jl. Sadewa Nomor 45 (sekarang Jl. Indraprasta nomor 37). Di Jalan Sadewa ini kemudian dijadikan sebagai Kantor Konsulat Muhammdiyah Semarang. Selain kegiatan rutin mengadakan pengajian-pengajian, kemudian berkembang ke dunia pendidikan, yaitu dengan mendirikan HIS. (Sumber: H. Soewito, sesepuh Muhammadiyah dan pelaku sejarah).</p>\r\n', '2024-12-23 17:10:21', 2),
(59, 'Milad Muhammadiyah Cabang Kasihan 105 | 19 Nop 2017 | Jam: 07.00-11.30 WIB | Komplek Kelurahan Tirtonirmolo |', 'z.jpg', '<p>Diceritakan oleh &nbsp;almarhum K.H. Ali Cholil (cucu Kyai Sholeh Darat, sekaligus pelaku sejarah) Gedung yang dipakai untuk kantor Muhammadiyah mula-mula menempati rumah K.H. Mashud Ilyas di Kampung Petrus dan Mijen Jl. Gendingan (sekarang komplek Mall Sri Ratu), yang kemudian pindah di Jl. Kakap 72 Kelurahan Mlayu Darat (Sekarang Kel. Dadapsari Semarang Utara). Gedung ini merupakan wakaf dari H Ahmad Said Makarim dari Solo.</p>\r\n\r\n<p>Tahun 1928 dibentuk Konsulat Muhammadiyah Semarang, yang diresmikan oleh K.H. Dzazuli dari Yogyakarta. Sebagai ketua pertama adalah K.H. Dzulkarnain. Kantor secretariat konsulat Muhammadiyah pertama di kampung Krendo Kauman. Kegiatannya sementara hanya pengajian-pengajian.</p>\r\n\r\n<p>Tahun 1933 diselenggarakan Konggres Muhammadiyah ke 22 (sekarang Muktamar) di Semarang bertempat di kampung Bon Cino Jl. Mataram. Salah satu hasil Konggres adalah memutuskan untuk membeli tanah di Jl. Sadewa Nomor 45 (sekarang Jl. Indraprasta nomor 37). Di Jalan Sadewa ini kemudian dijadikan sebagai Kantor Konsulat Muhammdiyah Semarang. Selain kegiatan rutin mengadakan pengajian-pengajian, kemudian berkembang ke dunia pendidikan, yaitu dengan mendirikan HIS. (Sumber: H. Soewito, sesepuh Muhammadiyah dan pelaku sejarah).</p>\r\n', '2024-12-23 17:10:47', 1),
(60, 'BERITA BARU 2025', 'Picture11.jpg', '<p>Kelahiran dan keberadaan Muhammadiyah pada awal berdirinya tidak lepas dan merupakan manifestasi dari gagasan pemikiran dan amal perjuangan Kyai Haji Ahmad Dahlan (Muhammad Darwis) yang menjadi pendirinya. Setelah menunaikan ibadah Haji ke Tanah SUci dan bermukim yang kedua kalinya pada tahun 1903, Kyai Dahlan mulai menyemaikan benih pembaruan di Tanah Air. Gagasan pembaruan itu diperoleh Kyai Dahlan setelah berguru kepada ulama-ulama Indonesia yang bermukim di Mekkah seperti Syeikh Ahmad Khatib dari Minangkabau, Kyai Nawawi dari Banten, Kyai Mas Abdullah dari Surabaya, dan Kyai Fakih dari Maskumambang. Juga setelah membaca pemikiran-pemikiran para pembaru Islam seperti Ibnu Taimiyah, Muhammad bin Abdil Wahhab, Jamaluddin Al-Afghani, Muhammad Abduh, dan Rasyid Ridha.</p>\r\n\r\n<p>Dengan modal kecerdasan dirinya serta interaksi selama bermukim si Saudi Arabia dan bacaan atas karya-karya para pembaru pemikiran Islam itu telah menanamkan benih ide-ide pembaruan dalam diri Kyai Dahlan. Jadi sekembalinya dari Arab Saudi, Kyai Dahlan justru membawa ide dan gerakan pembaruan, bukan malah menjadi konservatif. Organisasi Muhammadiyah mula masuk ke daerah&nbsp;&nbsp;Kasihan-Bantul sekitar tahun 1920, sebelumnya Organisasi Muhammadiyah di daerah tersebut masih gabung ke pusat. Kemudian didirikan TK, dan SD yang sampai saat ini kurang lebih jumlahnya sekitar 60 TK dan 67 SD di seluruh DIY.</p>\r\n', '2024-12-24 05:00:04', 1);
INSERT INTO `konten` (`id_konten`, `judul`, `gambar`, `isi_pesan`, `tanggal_posting`, `id_kategori`) VALUES
(61, 'GAKERI BARU', 'a1_drawio1.png', '<p>Kelahiran dan keberadaan Muhammadiyah pada awal berdirinya tidak lepas dan merupakan manifestasi dari gagasan pemikiran dan amal perjuangan Kyai Haji Ahmad Dahlan (Muhammad Darwis) yang menjadi pendirinya. Setelah menunaikan ibadah Haji ke Tanah SUci dan bermukim yang kedua kalinya pada tahun 1903, Kyai Dahlan mulai menyemaikan benih pembaruan di Tanah Air. Gagasan pembaruan itu diperoleh Kyai Dahlan setelah berguru kepada ulama-ulama Indonesia yang bermukim di Mekkah seperti Syeikh Ahmad Khatib dari Minangkabau, Kyai Nawawi dari Banten, Kyai Mas Abdullah dari Surabaya, dan Kyai Fakih dari Maskumambang. Juga setelah membaca pemikiran-pemikiran para pembaru Islam seperti Ibnu Taimiyah, Muhammad bin Abdil Wahhab, Jamaluddin Al-Afghani, Muhammad Abduh, dan Rasyid Ridha.</p>\r\n\r\n<p>Dengan modal kecerdasan dirinya serta interaksi selama bermukim si Saudi Arabia dan bacaan atas karya-karya para pembaru pemikiran Islam itu telah menanamkan benih ide-ide pembaruan dalam diri Kyai Dahlan. Jadi sekembalinya dari Arab Saudi, Kyai Dahlan justru membawa ide dan gerakan pembaruan, bukan malah menjadi konservatif. Organisasi Muhammadiyah mula masuk ke daerah&nbsp;&nbsp;Kasihan-Bantul sekitar tahun 1920, sebelumnya Organisasi Muhammadiyah di daerah tersebut masih gabung ke pusat. Kemudian didirikan TK, dan SD yang sampai saat ini kurang lebih jumlahnya sekitar 60 TK dan 67 SD di seluruh DIY.</p>\r\n', '2024-12-24 05:00:57', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `idmenu` int NOT NULL,
  `judul` text COLLATE utf8mb4_general_ci NOT NULL,
  `url` text COLLATE utf8mb4_general_ci,
  `aktif` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`idmenu`, `judul`, `url`, `aktif`) VALUES
(1, 'Home', 'home', 1),
(2, 'Profile', 'home/profile', 1),
(3, 'Kajian', 'home/kajian', 1),
(4, 'Amal Usaha', '', 1),
(46, 'Majlis dan Lembaga', '', 1),
(47, 'PRM', '', 1),
(48, 'Ortom', '', 1),
(49, 'Sekolah', '', 1),
(50, 'Adminor', '', 1),
(51, 'Artikel', 'home/artikel', 1),
(52, 'Perguruan Atas', 'home/perguruan_atas', 0),
(53, 'Perguruan Paud/TK', 'home/perguruan_paud_tk', 0),
(54, 'Perguruan Dasar', 'home/perguruan_dasar', 0),
(55, 'Pustaka', 'home/pustaka', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notulensi`
--

CREATE TABLE `notulensi` (
  `id_notulensi` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_surat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_undangan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_notulensi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notulensi`
--

INSERT INTO `notulensi` (`id_notulensi`, `tanggal`, `agenda`, `nama_surat`, `file_path_undangan`, `file_path_notulensi`) VALUES
(13, '2024-10-13 15:49:25', 'Notulensi Rapat:', 'Rapat Koordinasi PCM Kasihan', 'c79d29098850f00d2797999f34c6a10b.jpg', '248894e6352d9a338bce228cfaccda95.png'),
(14, '2024-10-13 18:29:38', 'makanan', 'undangan pernikahan meme', '654d51ced7ee15191e56331ee2086ef6.jpg', '9b08ddf93bb041c3e9e320a0afd231a9.jpg'),
(25, '2024-10-17 08:21:07', 'pagi', 'apa', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tahun_jabatan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pejabat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `tanggal_upload`, `tahun_jabatan`, `avatar`, `nama_pejabat`) VALUES
(1, '2024-03-28 12:21:59', '1999-2000', 'profile_1734951844.jpg', 'asnawi'),
(2, '2024-03-28 12:25:14', '1999 - 2000', 'profile_1734951817.jpg', 'Afif Nurwidianto'),
(3, '2024-03-28 12:25:55', '1999 - 2000', 'profile_1734951800.jpg', 'Muhammad Faris Rizaldi'),
(4, '2024-03-28 14:45:33', '1999 - 2000', 'profile_1734951870.jpg', 'Khoirunnisa Alwiyah'),
(5, '2024-03-29 21:21:57', '1000-2000', 'profile_1734951830.jpg', 'Amirul Mukminin'),
(6, '2024-03-29 21:22:10', '3000-40000', 'profile_1734951783.jpg', 'Mukhdirin'),
(9, '2024-04-28 15:52:12', '1999 - 2000', 'profile_1734951770.jpg', 'DIA'),
(13, '2024-12-24 05:14:44', '2030-2035', 'profile_1735017284.jpg', 'Ansory');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pustaka`
--

CREATE TABLE `pustaka` (
  `id_pustaka` int NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `judul_pustaka` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pustaka`
--

INSERT INTO `pustaka` (`id_pustaka`, `tanggal_upload`, `judul_pustaka`) VALUES
(9, '2024-03-30 02:37:44', 'Tafsir Langkah Muhammadiyah K. K. Mas Mansur 37 Yogyakarta, Suara Muhammadiyah, 2013 II 86 Hibah'),
(10, '2024-03-30 02:37:55', 'Modul Pelayanan Keluarga Berencana Yekti, Istri, Sutrani 4 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 IV 136 Hibah'),
(11, '2024-03-30 02:38:05', 'Buku Evaluasi Mahasiswa Stase Keperawatan Maternitas 1 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 84 Hibah'),
(12, '2024-03-30 02:38:15', 'Modul Kesehatan Reproduksi II Bagi Mahasiswa Dewi, Herlin, Winnie, Sutarni, Rina, Istri 2 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 V 52 Hibah'),
(13, '2024-04-04 11:11:37', 'Panduan Praktikum Keperawatan Gerontik Ns. Suratini 3 Yogyakarta, Sekolah Tinggi Ilmu Kesehatan Aisyiyah, 2015 138 Hibah.'),
(15, '2024-10-16 17:00:00', 'asasasas'),
(16, '2024-10-18 17:00:00', 'aaasssaassaass'),
(17, '2024-12-22 17:00:00', 'judul sebuah pustaka'),
(18, '2024-12-23 17:00:00', 'pustaka baru baru baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat_wakaf`
--

CREATE TABLE `sertifikat_wakaf` (
  `id_wakaf` int NOT NULL,
  `nama_surat_wakaf` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_masjid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_sertifikat_wakaf` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sertifikat_wakaf`
--

INSERT INTO `sertifikat_wakaf` (`id_wakaf`, `nama_surat_wakaf`, `nama_masjid`, `file_path_sertifikat_wakaf`, `tanggal`) VALUES
(16, 'Tanah Wakaf Muhammadiyah No. 15 Desa Tamantirto Hak Milik No. 1402 Akta Ikrar Wakaf 08-04-2010-W.2-01-VI-2010', 'Masjid Baitunnafiq Brajan', 'praktik_magang-Page-3_drawio2.png', '2024-05-01 14:40:41'),
(17, 'Tanah Wakaf Muhammadiyah No. 27 Desa Tamantirto Hak Milik No. 12105 Akta Ikrar Wakaf 10-01-2018-W2-02-BH-2018 Perluasan', 'Masjid Al Muqorrobin Selokambang', 'BANNER-removebg-preview_(1)3.png', '2024-05-01 14:41:35'),
(21, 'apa', 'apa yaa', '38c226cacd09bc9ae8d8a0e9f62486e51.docx', '2024-10-17 08:16:31'),
(22, 'apa', 'apa yaa', '', '2024-10-17 08:20:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `idsubmenu` int NOT NULL,
  `idmenu` int DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`idsubmenu`, `idmenu`, `judul`, `url`, `aktif`) VALUES
(3, 4, 'RUMAH YATIM & DHUAFA TIRTONIRMOLO TIMUR', 'home/amal_usaha_rumah', 1),
(4, 4, 'MASJID MUSYAWARAH TEGAL WANGI TAMANTIRTO', 'home/masjid_musyawarah_tegal_wangi_tamantirto', 1),
(5, 4, 'MASJID / MUSHALLA WAKAF MUHAMMADIYAH', 'home/amal_usaha_mushalla', 1),
(47, 50, 'Surat Masuk', 'home/surat_masuk', 1),
(48, 50, 'Surat Keluar', 'home/surat_keluar', 1),
(49, 50, 'Surat Tugas', 'home/surat_tugas', 1),
(50, 50, 'Surat Keputusan', 'home/surat_keputusan', 1),
(51, 50, 'Notulensi', 'home/notulensi', 1),
(52, 50, 'Daftar & Sertifikat Wakaf', 'home/daftar_sertifikat_wakaf', 1),
(53, 50, 'Surat Aktif Organisasi', 'home/surat_aktif_organisasi', 1),
(54, 49, 'SD MUHAMMADIYAH SENGGOTAN TIRTONIRMOLO', 'home/sd_muhammadiyah_senggotan_tirtonirmolo', 1),
(55, 49, 'SD MUHAMMADIYAH MRISI TIRTONIRMOLO', 'home/sd_muhammadiyah_mrisi_tirtonirmolo', 1),
(56, 49, 'SD MUHAMMADIYAH SAMBIKEREP BANGUNJIWO', 'home/sd_muhammadiyah_sambikerep_bangunjiwo', 1),
(57, 49, 'SD MUHAMMADIYAH TAMANTIRTO', 'home/sd_muhammadiyah_tamantirto', 1),
(58, 49, 'SD MUHAMMADIYAH KEMBARAN TAMANTIRTO', 'home/sd_muhammadiyah_kembaran_tamantirto', 1),
(59, 48, 'PIMPINAN CABANG AISYIHAH', 'home/pimpinan_cabang_aisyihah', 1),
(60, 48, 'PIMPINAN CABANG PEMUDA MUHAMMADIYAH', 'home/pimpinan_cabang_pemuda_muhammadiyah', 1),
(61, 48, 'PIMPINAN CABANG NASIYAH', 'home/pimpinan_cabang_nasiyah', 1),
(62, 48, 'PIMPINAN CABANG IPM', 'home/pimpinan_cabang_ipm', 1),
(63, 48, 'KOKAM KECAMATAN KASIHAN', 'home/kokam_kecamatan_kasihan', 1),
(64, 48, 'HW KECAMATAN KASIHAN', 'home/hw_kecamatan_kasihan', 1),
(65, 48, 'TS KECAMATAN KASIHAN', 'home/ts_kecamatan_kasihan', 1),
(66, 47, 'PRM TIRTONIRMOLO UTARA', 'home/prm_tirtonirmolo_utara', 1),
(67, 47, 'PRM BANGUNJIWO TIMUR', 'home/prm_bangunjiwo_timur', 1),
(68, 47, 'PRM TAMANTIRTO UTARA', 'home/prm_tamantirto_utara', 1),
(69, 47, 'PRM TAMANTIRTO SELATAN', 'home/prm_tamantirto_selatan', 1),
(70, 47, 'PRM TIRTONIRMOLO BARAT', 'home/prm_tirtonirmolo_barat', 1),
(71, 47, 'PRM TIRTONIRMOLO TENGAH', 'home/prm_tirtonirmolo_tengah', 1),
(72, 47, 'PRM TIRTONIRMOLO TIMUR', 'home/prm_tirtonirmolo_timur', 1),
(73, 47, 'PRM TIRTONIRMOLO SELATAN', 'home/prm_tirtonirmolo_selatan', 1),
(74, 47, 'PRM NGESTIHARJO UTARA', 'home/prm_ngestiharjo_utara', 1),
(75, 47, 'PRM NGESTIHARJO TENGAH', 'home/prm_ngestiharjo_tengah', 1),
(76, 47, 'PRM NGESTIHARJO SELATAN', 'home/prm_ngestiharjo_selatan', 1),
(77, 47, 'PRM BANGUNJIWO BARAT', 'home/prm_bangunjiwo_barat', 1),
(78, 46, 'LEMBAGA AMIL ZAKAT INFAQ DAN SHADAQAH', 'home/lembaga_amil_zakat_infaq_dan_shadaqah', 1),
(79, 46, 'MAJLIS WAKAF DAN KEKAYAAN', 'home/majlis_wakaf_dan_kekayaan', 1),
(80, 46, 'MAJLIS TABLIGH DAN TARJIH', 'home/majlis_tabligh_dan_tarjih', 1),
(81, 46, 'LEMBAGA PENANGGULANGAN BENCANA', 'home/lembaga_penanggulangan_bencana', 1),
(82, 46, 'LEMBAGA PENGEMBANGAN RANTING MASJID DAN MUSHALLA', 'home/lembaga_pengembangan_ranting_masjid_dan_mushalla', 1),
(83, 46, 'MAJLIS DIKDASMEN', 'home/majlis_dikdasmen', 1),
(84, 46, 'MAJLIS PUSTAKA DAN INFORMASI', 'home/majlis_pustaka_dan_informasi', 1),
(85, 46, 'MAJLIS PENDIDIKAN KADER', 'home/majlis_pendidikan_kader', 1),
(86, 46, 'MAJLIS PEMBERDAYA MASYARAKAT', 'home/majlis_pemberdaya_masyarakat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_aktif_organisasi`
--

CREATE TABLE `surat_aktif_organisasi` (
  `id_aktif` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_tinggal` text COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `instansi_kerja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_instansi_kerja` text COLLATE utf8mb4_general_ci NOT NULL,
  `telepon_kantor_kerja` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_kartu_tanda_anggota` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_bukti_keaktifan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_aktif_organisasi`
--

INSERT INTO `surat_aktif_organisasi` (`id_aktif`, `email`, `nama_lengkap`, `tanggal_lahir`, `alamat_tinggal`, `no_hp`, `instansi_kerja`, `alamat_instansi_kerja`, `telepon_kantor_kerja`, `file_path_kartu_tanda_anggota`, `file_path_bukti_keaktifan`, `tempat_lahir`, `tanggal_upload`) VALUES
(26, 'jayakkkk@gmail.com', 'fren', '2024-10-02', 'Afifnurwidianto', '085264160572', 'Progranmmer', 'Afifnurwidianto', '085264160572', 'e86bd2db52ab5c05eb875204dea2ef26.pdf', '110f872788b8545b2d67ce9ac64497c7.pdf', 'Yogyakarta', '2024-10-13 21:00:20'),
(35, 'alay@gmail.com', 'Afif', '2024-10-11', 'Afifnurwidianto', '085264160572', 'pembohong', 'Afifnurwidianto', '085264160572', 'ae0e7ea271664f10da6197493e89978d.pdf', 'b6e080eecd63b7febc58beec8cf8a1a9.pdf', 'Yogyakarta', '2024-10-13 21:03:16'),
(36, 'admin@gmail.com', 'Afif', '2024-10-08', 'Afifnurwidianto', '085264160572', 'Progranmmer', 'Afifnurwidianto', '085264160572', 'bc3383a4a449f968fda86d7fd241d307.jpg', '88b23986da1d8b9fdc7f1f4bb4c3c028.pdf', 'Yogyakarta', '2024-10-13 21:04:25'),
(38, 'admin@gmail.com', 'aa', '2024-10-08', 'aa', '12345', 'as', 'as', '1234', '', '', 'aa', '2024-10-17 10:20:21'),
(39, 'user@gmail.com', 'AAN', '2024-12-10', 'YOHYAKARTA', '08800880', 'KAMPUS 4', 'KAMPUS 5', '08900989', '02212382deae60a5d434cc0284293b8f.jpg', 'bb78a41695d00a4fb9ab2406a9666fc1.jpg', 'YOGYAKARTA', '2024-12-23 18:48:29'),
(40, 'kamu@gmail.com', 'kamu', '2024-12-02', 'kamu', '08800880', 'kamu', 'kamu', '00000000000', '56881fbc32066d8690b192e86649ed72.jpg', '1e85cb164941728cf21d3956d77cd5bc.jpg', 'kamu kamu', '2024-12-23 19:26:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_keluar` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_surat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_surat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_undangan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path_photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_keluar`, `tanggal`, `agenda`, `nama_surat`, `file_path_surat`, `file_path_undangan`, `file_path_photo`) VALUES
(24, '2024-10-13 13:04:46', 'AGENDA SURAT KELUAR PCM KASIHAN 2015', 'Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '2959eb1dc9aa7ea79536854da8cb6ac8.pdf', '82832407d6c452e934f2f27a9a8e5e0b.pdf', 'fa65c58d6ab26c59b03c78c04654aa6e.pdf'),
(25, '2024-10-13 13:05:10', 'AGENDA SURAT KELUAR PCM KASIHAN 2016', 'Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '8afe10f06ff2b5b8ebab305a8db4ab4d.pdf', '', '9edbb3ff90dd65ba4156738421776735.pdf'),
(26, '2024-05-01 15:42:07', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '', '', ''),
(27, '2024-05-01 15:42:39', 'AGENDA SURAT KELUAR PCM KASIHAN 2018', 'Rapat Koordinasi PCM Kasihan', '', '', ''),
(28, '2024-05-01 15:43:57', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Pembentukan Panitia Milad PCM Kasihan 105', '', '', ''),
(29, '2024-05-01 15:44:21', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Surat Keluar Panitia Milad PCM Kasihan 105', '', '', ''),
(30, '2024-05-01 15:44:43', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', 'Undangan-Rapat-Panitia-milda-pcm-105', '', '', ''),
(31, '2024-10-13 18:32:20', 'AGENDA SURAT KELUAR PCM KASIHAN 2017', '2017-10-06-Undangan Rapat Pimpinan Cabang di MBA Jam: 19.30 WIB', '63175beb062d3cf19ecd85bfa1480693.jpg', '0489c9601407bcc7ed3795239808af15.jpg', '55c161a3b9858e7f8152552b7f4255a0.jpg'),
(39, '2024-10-17 08:22:02', 'pagi', 'surat baru', '317f8714d5ab6ebbe8f7a8fc84db3b14.docx', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keputusan`
--

CREATE TABLE `surat_keputusan` (
  `id_keputusan` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_surat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_keputusan`
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
(64, '2024-05-01 15:27:41', 'SURAT KEPUTUSAN DAN SURAT TUGAS  PCM KASIHAN 2021', 'SE 2021-04-10-18-IV.0-A-KSH-IV-2021 Edaran PCM tentang Ramadhan 1442H', ''),
(65, '2024-10-13 18:30:17', 'makanan nih boss senggol donhg', 'undangan pernikahan kalian', 'f36dc11cdab6960850e3d14d4fd3abad.jpg'),
(66, '2024-10-13 14:49:40', 'yakin nih', 'parah', '37392159281.jpg'),
(67, '2024-10-13 15:00:40', 'SURAT KEPUTUSAN DAN SURAT TUGAS PCM KASIHAN 2023', 'parah', 'download.jpg'),
(70, '2024-10-17 08:22:34', 'pagi', 'surat baru', '38c226cacd09bc9ae8d8a0e9f62486e53.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_masuk` int NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_surat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_masuk`, `tanggal`, `agenda`, `nama_surat`, `file_path`) VALUES
(46, '2024-12-23 19:27:40', 'Agenda Surat Masuk 2017', 'Undangan Pembukaan Milad PDM', '14d9a5c2b8d27706b0a57d54d9e778c5.jpg'),
(47, '2024-05-02 04:57:55', 'Agenda Surat Masuk 2017', 'Undangan Kajian Rutin Pimpinan Daerah', '44da93c2fc6728b14f158dfe97e95c41.jpg'),
(49, '2024-10-13 09:31:53', 'Agenda Surat Masuk 2016', 'Belum ada nama surat', '9ecb8696eae17ffd2f3206af2522ce4b.pdf'),
(50, '2024-10-13 09:31:22', 'Agenda Surat Masuk 2015', 'Belum ada nama surat', 'd40ae231d347549a73afe3950d7aae6b.docx'),
(72, '2024-12-23 18:36:35', 'agenda surat masuk 2025', 'surat', 'akmalxxx.docx'),
(73, '2024-12-23 18:37:06', 'agenda surat masuk 2025', 'apa yaa', 'a1_drawio.png'),
(74, '2024-12-24 04:51:30', 'agenda surat masuk 2025', 'surat baru 2025', 'akmalxxx_(2).docx'),
(75, '2024-12-24 04:52:45', 'Agenda Surat Masuk 2017', 'sarat 2017', 'Picture1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'SAIDAH', 'admin@gmail.com', 'avatar.jpg', '$2y$10$BhdLg2P.KU5Ay98wgxjJ5uYvFp4274I1UYcD9/kFkroy/JkUB7Yj2', 1, 1, 1728136426),
(21, 'kayes', 'kayes@gmail.com', 'png-transparent-computer-icons-button-login-image-file-formats-logo-monochrome1.png', '$2y$10$X3BpVoLLi09zIfoVoLNtyeWS7phRR2D84PdY89Bdfok0KR4VUIlyS', 2, 1, 1728513951),
(23, 'Arum', 'arum@gmail.com', 'AdminLTELogo1.png', '$2y$10$2h7cai7dw82cCLAHIiJWqeb7M5RZcXK7ust9sVL3c7GGR6YuGLOpi', 1, 1, 1728516600),
(26, 'Ansoryyyy', 'san678761@gmail.com', 'avatar2.jpg', '$2y$10$uX4Xuk934QPWuAzRZNKIeOlHtav1R8ghQy/wQDsd8pvIRzargPRZS', 2, 1, 1729154038);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(126, 1, 3),
(134, 1, 20),
(135, 1, 2),
(137, 1, 14),
(141, 1, 9),
(142, 1, 12),
(143, 1, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(9, 'Adminor'),
(12, 'Pustaka'),
(14, 'Profile PCM Kasihan'),
(15, 'PRM'),
(16, 'Sekolah'),
(18, 'Ortom'),
(20, 'Berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(14, 9, 'Surat Masuk', 'adminor/surat', 'fa fa-fw-solid fa-book-open', 1),
(15, 9, 'Surat Keluar', 'adminor/surat_kel', 'fa fa-fw-solid fa-envelope-open', 1),
(18, 9, 'Surat Keputusan', 'adminor/surat_kep', 'fa fa-fw-solid fa-paper-plane', 1),
(19, 9, 'Notulensi', 'adminor/notulensi', 'fa fa-fw-solid fa-copy', 1),
(20, 9, 'Daftar Dan Sertifikat Wakaf', 'adminor/wakaf', 'fa fa-fw-solid fa-newspaper', 1),
(21, 9, 'Surat Aktif Organisasi', 'adminor/surat_aktif_organisasi', 'fa fa-fw-solid fa-print', 1),
(22, 12, 'Pustaka', 'pustaka/pustaka', 'fa fa-fw-solid fa-school', 1),
(33, 3, 'Menu Website', 'menu/menu_website', 'fas fa-fw fa-user-tie', 1),
(34, 1, 'Data Admin', 'admin/data_admin', 'fas fa-fw fa-user-tie', 1),
(35, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(37, 14, 'Profile', 'profile/profile', 'fas fa-fw fa-user', 1),
(38, 14, 'Artikel', 'profile/artikel', 'fa fa-fw-solid fa-newspaper', 1),
(39, 14, 'Kajian Hadist', 'profile/kajian_hadist', 'fa fa-fw-solid fa-bookmark', 1),
(41, 20, 'Berita', 'konten/derita', 'fa fa-fw-solid fa-newspaper', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visit`
--

CREATE TABLE `visit` (
  `id_visit` int NOT NULL,
  `date_visit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `visit`
--

INSERT INTO `visit` (`id_visit`, `date_visit`) VALUES
(1, '2024-10-16'),
(2, '2024-10-17'),
(3, '2024-10-18'),
(4, '2024-10-18'),
(5, '2024-10-18'),
(6, '2024-10-18'),
(7, '2024-10-18'),
(8, '2024-10-18'),
(9, '2024-10-18'),
(10, '2024-10-18'),
(11, '2024-10-18'),
(12, '2024-10-18'),
(13, '2024-10-18'),
(14, '2024-10-18'),
(15, '2024-10-18'),
(16, '2024-10-18'),
(17, '2024-10-18'),
(18, '2024-10-18'),
(19, '2024-10-18'),
(20, '2024-10-18'),
(21, '2024-10-18'),
(22, '2024-10-18'),
(23, '2024-10-18'),
(24, '2024-10-18'),
(25, '2024-10-18'),
(26, '2024-10-18'),
(27, '2024-10-18'),
(28, '2024-10-18'),
(29, '2024-10-18'),
(30, '2024-10-18'),
(31, '2024-10-18'),
(32, '2024-10-18'),
(33, '2024-10-18'),
(34, '2024-10-18'),
(35, '2024-10-18'),
(36, '2024-10-18'),
(37, '2024-10-18'),
(38, '2024-10-18'),
(39, '2024-10-18'),
(40, '2024-10-18'),
(41, '2024-10-18'),
(42, '2024-10-18'),
(43, '2024-10-18'),
(44, '2024-10-18'),
(45, '2024-10-18'),
(46, '2024-10-18'),
(47, '2024-10-18'),
(48, '2024-10-18'),
(49, '2024-10-18'),
(50, '2024-10-18'),
(51, '2024-10-18'),
(52, '2024-10-18'),
(53, '2024-10-18'),
(54, '2024-10-18'),
(55, '2024-10-18'),
(56, '2024-10-18'),
(57, '2024-10-18'),
(58, '2024-10-18'),
(59, '2024-10-19'),
(60, '2024-10-19'),
(61, '2024-10-19'),
(62, '2024-10-19'),
(63, '2024-10-19'),
(64, '2024-10-19'),
(65, '2024-10-19'),
(66, '2024-10-19'),
(67, '2024-10-19'),
(68, '2024-10-19'),
(69, '2024-10-19'),
(70, '2024-10-19'),
(71, '2024-10-19'),
(72, '2024-10-19'),
(73, '2024-10-19'),
(74, '2024-10-19'),
(75, '2024-10-19'),
(76, '2024-10-19'),
(77, '2024-10-19'),
(78, '2024-10-19'),
(79, '2024-10-19'),
(80, '2024-10-19'),
(81, '2024-10-19'),
(82, '2024-10-19'),
(83, '2024-10-19'),
(84, '2024-10-19'),
(85, '2024-10-19'),
(86, '2024-10-19'),
(87, '2024-10-19'),
(88, '2024-10-19'),
(89, '2024-10-19'),
(90, '2024-10-19'),
(91, '2024-10-19'),
(92, '2024-10-19'),
(93, '2024-10-19'),
(94, '2024-10-19'),
(95, '2024-10-19'),
(96, '2024-10-19'),
(97, '2024-10-19'),
(98, '2024-10-19'),
(99, '2024-10-19'),
(100, '2024-10-19'),
(101, '2024-10-19'),
(102, '2024-10-19'),
(103, '2024-10-19'),
(104, '2024-10-19'),
(105, '2024-10-19'),
(106, '2024-10-19'),
(107, '2024-10-19'),
(108, '2024-10-19'),
(109, '2024-10-19'),
(110, '2024-10-19'),
(111, '2024-10-19'),
(112, '2024-10-19'),
(113, '2024-10-19'),
(114, '2024-10-19'),
(115, '2024-10-19'),
(116, '2024-10-19'),
(117, '2024-10-19'),
(118, '2024-10-19'),
(119, '2024-10-19'),
(120, '2024-10-19'),
(121, '2024-10-19'),
(122, '2024-10-19'),
(123, '2024-10-19'),
(124, '2024-10-19'),
(125, '2024-10-19'),
(126, '2024-10-19'),
(127, '2024-10-19'),
(128, '2024-10-19'),
(129, '2024-10-19'),
(130, '2024-10-19'),
(131, '2024-10-19'),
(132, '2024-10-19'),
(133, '2024-10-19'),
(134, '2024-10-19'),
(135, '2024-10-19'),
(136, '2024-10-19'),
(137, '2024-10-19'),
(138, '2024-10-19'),
(139, '2024-10-19'),
(140, '2024-10-19'),
(141, '2024-10-19'),
(142, '2024-10-19'),
(143, '2024-10-19'),
(144, '2024-10-19'),
(145, '2024-10-19'),
(146, '2024-10-19'),
(147, '2024-10-19'),
(148, '2024-10-19'),
(149, '2024-10-19'),
(150, '2024-10-19'),
(151, '2024-10-19'),
(152, '2024-10-19'),
(153, '2024-10-19'),
(154, '2024-10-19'),
(155, '2024-10-19'),
(156, '2024-10-19'),
(157, '2024-10-19'),
(158, '2024-10-19'),
(159, '2024-10-19'),
(160, '2024-10-19'),
(161, '2024-10-19'),
(162, '2024-10-19'),
(163, '2024-10-19'),
(164, '2024-10-19'),
(165, '2024-10-19'),
(166, '2024-10-19'),
(167, '2024-10-19'),
(168, '2024-10-19'),
(169, '2024-10-19'),
(170, '2024-10-19'),
(171, '2024-10-19'),
(172, '2024-10-19'),
(173, '2024-10-19'),
(174, '2024-10-19'),
(175, '2024-10-19'),
(176, '2024-10-19'),
(177, '2024-10-19'),
(178, '2024-10-19'),
(179, '2024-10-19'),
(180, '2024-10-19'),
(181, '2024-10-19'),
(182, '2024-10-19'),
(183, '2024-10-19'),
(184, '2024-10-19'),
(185, '2024-10-19'),
(186, '2024-10-19'),
(187, '2024-10-20'),
(188, '2024-10-20'),
(189, '2024-10-20'),
(190, '2024-10-20'),
(191, '2024-10-20'),
(192, '2024-10-21'),
(193, '2024-10-21'),
(194, '2024-10-21'),
(195, '2024-10-21'),
(196, '2024-10-21'),
(197, '2024-10-21'),
(198, '2024-10-21'),
(199, '2024-10-21'),
(200, '2024-10-21'),
(201, '2024-10-21'),
(202, '2024-10-21'),
(203, '2024-10-21'),
(204, '2024-10-21'),
(205, '2024-10-21'),
(206, '2024-10-21'),
(207, '2024-10-21'),
(208, '2024-10-21'),
(209, '2024-10-21'),
(210, '2024-10-21'),
(211, '2024-10-21'),
(212, '2024-10-21'),
(213, '2024-10-21'),
(214, '2024-10-21'),
(215, '2024-10-21'),
(216, '2024-10-25'),
(217, '2024-10-25'),
(218, '2024-10-25'),
(219, '2024-10-25'),
(220, '2024-10-25'),
(221, '2024-10-25'),
(222, '2024-10-25'),
(223, '2024-10-25'),
(224, '2024-10-25'),
(225, '2024-10-25'),
(226, '2024-10-25'),
(227, '2024-10-25'),
(228, '2024-10-25'),
(229, '2024-10-25'),
(230, '2024-10-25'),
(231, '2024-10-25'),
(232, '2024-10-25'),
(233, '2024-10-25'),
(234, '2024-10-25'),
(235, '2024-10-25'),
(236, '2024-10-25'),
(237, '2024-10-25'),
(238, '2024-10-25'),
(239, '2024-10-25'),
(240, '2024-10-25'),
(241, '2024-10-25'),
(242, '2024-10-25'),
(243, '2024-10-25'),
(244, '2024-10-25'),
(245, '2024-10-25'),
(246, '2024-10-25'),
(247, '2024-10-25'),
(248, '2024-10-25'),
(249, '2024-10-25'),
(250, '2024-10-25'),
(251, '2024-10-25'),
(252, '2024-10-25'),
(253, '2024-10-25'),
(254, '2024-10-25'),
(255, '2024-10-25'),
(256, '2024-10-25'),
(257, '2024-10-25'),
(258, '2024-10-25'),
(259, '2024-10-25'),
(260, '2024-10-25'),
(261, '2024-10-25'),
(262, '2024-10-25'),
(263, '2024-10-25'),
(264, '2024-10-25'),
(265, '2024-10-25'),
(266, '2024-10-25'),
(267, '2024-10-25'),
(268, '2024-10-25'),
(269, '2024-10-25'),
(270, '2024-10-25'),
(271, '2024-10-25'),
(272, '2024-10-25'),
(273, '2024-10-26'),
(274, '2024-10-28'),
(275, '2024-10-28'),
(283, '2024-11-02'),
(284, '2024-11-05'),
(285, '2024-11-12'),
(286, '2024-11-12'),
(287, '2024-11-12'),
(288, '2024-11-12'),
(289, '2024-11-12'),
(290, '2024-11-12'),
(291, '2024-11-12'),
(292, '2024-11-12'),
(293, '2024-11-12'),
(294, '2024-11-12'),
(295, '2024-11-12'),
(296, '2024-11-12'),
(297, '2024-11-12'),
(298, '2024-11-12'),
(299, '2024-11-12'),
(300, '2024-11-12'),
(301, '2024-11-12'),
(302, '2024-11-12'),
(303, '2024-11-12'),
(304, '2024-11-12'),
(305, '2024-11-12'),
(306, '2024-11-12'),
(307, '2024-11-12'),
(308, '2024-11-12'),
(309, '2024-11-12'),
(310, '2024-11-12'),
(311, '2024-11-12'),
(312, '2024-11-12'),
(313, '2024-11-12'),
(314, '2024-11-12'),
(315, '2024-11-12'),
(316, '2024-11-12'),
(317, '2024-11-12'),
(318, '2024-11-12'),
(319, '2024-11-12'),
(320, '2024-11-12'),
(321, '2024-11-12'),
(322, '2024-11-12'),
(323, '2024-11-12'),
(324, '2024-11-12'),
(325, '2024-11-12'),
(326, '2024-11-12'),
(327, '2024-11-12'),
(328, '2024-11-12'),
(329, '2024-11-12'),
(330, '2024-11-12'),
(331, '2024-11-12'),
(332, '2024-11-12'),
(333, '2024-11-12'),
(334, '2024-11-12'),
(335, '2024-11-12'),
(336, '2024-11-12'),
(337, '2024-11-12'),
(338, '2024-11-12'),
(339, '2024-11-13'),
(340, '2024-11-13'),
(341, '2024-11-13'),
(342, '2024-11-13'),
(343, '2024-11-13'),
(344, '2024-11-13'),
(345, '2024-11-13'),
(346, '2024-11-13'),
(347, '2024-11-13'),
(348, '2024-11-13'),
(349, '2024-11-13'),
(350, '2024-11-13'),
(351, '2024-11-13'),
(352, '2024-11-13'),
(353, '2024-11-13'),
(354, '2024-11-13'),
(355, '2024-11-13'),
(356, '2024-11-13'),
(357, '2024-11-13'),
(358, '2024-11-13'),
(359, '2024-11-13'),
(360, '2024-11-13'),
(361, '2024-11-13'),
(362, '2024-11-13'),
(363, '2024-11-13'),
(364, '2024-11-13'),
(365, '2024-11-13'),
(366, '2024-11-13'),
(367, '2024-11-13'),
(368, '2024-11-13'),
(369, '2024-11-13'),
(370, '2024-11-13'),
(371, '2024-11-13'),
(372, '2024-11-13'),
(373, '2024-11-13'),
(374, '2024-11-13'),
(375, '2024-11-13'),
(376, '2024-11-13'),
(377, '2024-11-13'),
(378, '2024-11-13'),
(379, '2024-11-13'),
(380, '2024-11-13'),
(381, '2024-11-13'),
(382, '2024-11-13'),
(383, '2024-11-13'),
(384, '2024-11-13'),
(385, '2024-11-13'),
(386, '2024-11-13'),
(387, '2024-11-13'),
(388, '2024-11-13'),
(389, '2024-11-13'),
(390, '2024-11-13'),
(391, '2024-11-13'),
(392, '2024-11-13'),
(393, '2024-11-13'),
(394, '2024-11-13'),
(395, '2024-11-13'),
(396, '2024-11-13'),
(397, '2024-11-13'),
(398, '2024-11-13'),
(399, '2024-11-13'),
(400, '2024-11-13'),
(401, '2024-11-13'),
(402, '2024-11-13'),
(403, '2024-11-13'),
(404, '2024-11-13'),
(405, '2024-11-13'),
(406, '2024-11-13'),
(407, '2024-11-13'),
(408, '2024-11-13'),
(409, '2024-11-13'),
(410, '2024-11-13'),
(411, '2024-11-13'),
(412, '2024-11-13'),
(413, '2024-11-13'),
(414, '2024-11-13'),
(415, '2024-11-13'),
(416, '2024-11-13'),
(417, '2024-11-13'),
(418, '2024-11-13'),
(419, '2024-11-13'),
(420, '2024-11-13'),
(421, '2024-11-13'),
(422, '2024-11-13'),
(423, '2024-11-13'),
(424, '2024-11-13'),
(425, '2024-11-13'),
(426, '2024-11-13'),
(427, '2024-11-13'),
(428, '2024-11-13'),
(429, '2024-11-13'),
(430, '2024-11-13'),
(431, '2024-11-14'),
(432, '2024-11-14'),
(433, '2024-11-14'),
(434, '2024-11-14'),
(435, '2024-11-14'),
(436, '2024-11-14'),
(437, '2024-11-14'),
(438, '2024-11-14'),
(439, '2024-11-14'),
(440, '2024-11-14'),
(441, '2024-11-14'),
(442, '2024-11-14'),
(443, '2024-11-14'),
(444, '2024-11-14'),
(445, '2024-11-14'),
(446, '2024-11-14'),
(447, '2024-11-14'),
(448, '2024-11-14'),
(449, '2024-11-14'),
(450, '2024-11-14'),
(451, '2024-11-14'),
(452, '2024-11-14'),
(453, '2024-11-14'),
(454, '2024-11-14'),
(455, '2024-11-14'),
(456, '2024-11-14'),
(457, '2024-11-14'),
(458, '2024-11-14'),
(459, '2024-11-14'),
(460, '2024-11-14'),
(461, '2024-11-14'),
(462, '2024-11-14'),
(463, '2024-11-14'),
(464, '2024-11-14'),
(465, '2024-11-14'),
(466, '2024-11-14'),
(467, '2024-11-14'),
(468, '2024-11-14'),
(469, '2024-11-14'),
(470, '2024-11-14'),
(471, '2024-11-14'),
(472, '2024-11-14'),
(473, '2024-11-14'),
(474, '2024-11-14'),
(475, '2024-11-14'),
(476, '2024-11-14'),
(477, '2024-11-27'),
(478, '2024-11-27'),
(479, '2024-11-27'),
(480, '2024-12-19'),
(481, '2024-12-19'),
(482, '2024-12-19'),
(483, '2024-12-19'),
(484, '2024-12-19'),
(485, '2024-12-19'),
(486, '2024-12-19'),
(487, '2024-12-19'),
(488, '2024-12-19'),
(489, '2024-12-19'),
(490, '2024-12-19'),
(491, '2024-12-19'),
(492, '2024-12-19'),
(493, '2024-12-19'),
(494, '2024-12-19'),
(495, '2024-12-19'),
(496, '2024-12-19'),
(497, '2024-12-19'),
(498, '2024-12-19'),
(499, '2024-12-19'),
(500, '2024-12-19'),
(501, '2024-12-19'),
(502, '2024-12-19'),
(503, '2024-12-19'),
(504, '2024-12-19'),
(505, '2024-12-19'),
(506, '2024-12-19'),
(507, '2024-12-19'),
(508, '2024-12-19'),
(509, '2024-12-19'),
(510, '2024-12-19'),
(511, '2024-12-19'),
(512, '2024-12-21'),
(513, '2024-12-21'),
(514, '2024-12-21'),
(515, '2024-12-21'),
(516, '2024-12-21'),
(517, '2024-12-21'),
(518, '2024-12-21'),
(519, '2024-12-21'),
(520, '2024-12-21'),
(521, '2024-12-21'),
(522, '2024-12-21'),
(523, '2024-12-21'),
(524, '2024-12-21'),
(525, '2024-12-21'),
(526, '2024-12-21'),
(527, '2024-12-22'),
(528, '2024-12-22'),
(529, '2024-12-22'),
(530, '2024-12-22'),
(531, '2024-12-22'),
(532, '2024-12-22'),
(533, '2024-12-22'),
(534, '2024-12-22'),
(535, '2024-12-22'),
(536, '2024-12-22'),
(537, '2024-12-22'),
(538, '2024-12-22'),
(539, '2024-12-22'),
(540, '2024-12-22'),
(541, '2024-12-22'),
(542, '2024-12-22'),
(543, '2024-12-22'),
(544, '2024-12-22'),
(545, '2024-12-22'),
(546, '2024-12-22'),
(547, '2024-12-22'),
(548, '2024-12-22'),
(549, '2024-12-22'),
(550, '2024-12-22'),
(551, '2024-12-22'),
(552, '2024-12-22'),
(553, '2024-12-22'),
(554, '2024-12-22'),
(555, '2024-12-22'),
(556, '2024-12-22'),
(557, '2024-12-22'),
(558, '2024-12-22'),
(559, '2024-12-22'),
(560, '2024-12-22'),
(561, '2024-12-22'),
(562, '2024-12-22'),
(563, '2024-12-22'),
(564, '2024-12-22'),
(565, '2024-12-22'),
(566, '2024-12-22'),
(567, '2024-12-22'),
(568, '2024-12-22'),
(569, '2024-12-22'),
(570, '2024-12-22'),
(571, '2024-12-22'),
(572, '2024-12-22'),
(573, '2024-12-22'),
(574, '2024-12-22'),
(575, '2024-12-22'),
(576, '2024-12-22'),
(577, '2024-12-22'),
(578, '2024-12-22'),
(579, '2024-12-22'),
(580, '2024-12-22'),
(581, '2024-12-22'),
(582, '2024-12-22'),
(583, '2024-12-22'),
(584, '2024-12-22'),
(585, '2024-12-22'),
(586, '2024-12-22'),
(587, '2024-12-22'),
(588, '2024-12-22'),
(589, '2024-12-22'),
(590, '2024-12-22'),
(591, '2024-12-22'),
(592, '2024-12-22'),
(593, '2024-12-22'),
(594, '2024-12-22'),
(595, '2024-12-22'),
(596, '2024-12-23'),
(597, '2024-12-23'),
(598, '2024-12-23'),
(599, '2024-12-23'),
(600, '2024-12-23'),
(601, '2024-12-23'),
(602, '2024-12-23'),
(603, '2024-12-23'),
(604, '2024-12-23'),
(605, '2024-12-23'),
(606, '2024-12-23'),
(607, '2024-12-23'),
(608, '2024-12-23'),
(609, '2024-12-23'),
(610, '2024-12-23'),
(611, '2024-12-23'),
(612, '2024-12-23'),
(613, '2024-12-23'),
(614, '2024-12-23'),
(615, '2024-12-23'),
(616, '2024-12-23'),
(617, '2024-12-23'),
(618, '2024-12-23'),
(619, '2024-12-23'),
(620, '2024-12-23'),
(621, '2024-12-23'),
(622, '2024-12-23'),
(623, '2024-12-23'),
(624, '2024-12-23'),
(625, '2024-12-23'),
(626, '2024-12-23'),
(627, '2024-12-23'),
(628, '2024-12-23'),
(629, '2024-12-23'),
(630, '2024-12-23'),
(631, '2024-12-23'),
(632, '2024-12-23'),
(633, '2024-12-23'),
(634, '2024-12-23'),
(635, '2024-12-23'),
(636, '2024-12-23'),
(637, '2024-12-23'),
(638, '2024-12-23'),
(639, '2024-12-23'),
(640, '2024-12-23'),
(641, '2024-12-23'),
(642, '2024-12-23'),
(643, '2024-12-23'),
(644, '2024-12-23'),
(645, '2024-12-23'),
(646, '2024-12-23'),
(647, '2024-12-23'),
(648, '2024-12-23'),
(649, '2024-12-23'),
(650, '2024-12-23'),
(651, '2024-12-23'),
(652, '2024-12-23'),
(653, '2024-12-23'),
(654, '2024-12-23'),
(655, '2024-12-23'),
(656, '2024-12-23'),
(657, '2024-12-23'),
(658, '2024-12-23'),
(659, '2024-12-23'),
(660, '2024-12-23'),
(661, '2024-12-23'),
(662, '2024-12-23'),
(663, '2024-12-23'),
(664, '2024-12-23'),
(665, '2024-12-23'),
(666, '2024-12-23'),
(667, '2024-12-23'),
(668, '2024-12-23'),
(669, '2024-12-23'),
(670, '2024-12-23'),
(671, '2024-12-23'),
(672, '2024-12-23'),
(673, '2024-12-23'),
(674, '2024-12-23'),
(675, '2024-12-23'),
(676, '2024-12-23'),
(677, '2024-12-23'),
(678, '2024-12-23'),
(679, '2024-12-23'),
(680, '2024-12-23'),
(681, '2024-12-24'),
(682, '2024-12-24'),
(683, '2024-12-24'),
(684, '2024-12-24'),
(685, '2024-12-24'),
(686, '2024-12-24'),
(687, '2024-12-24'),
(688, '2024-12-24'),
(689, '2024-12-24'),
(690, '2024-12-24'),
(691, '2024-12-24'),
(692, '2024-12-24'),
(693, '2024-12-24'),
(694, '2024-12-24'),
(695, '2024-12-24'),
(696, '2024-12-24'),
(697, '2024-12-24'),
(698, '2024-12-24'),
(699, '2024-12-24'),
(700, '2024-12-24'),
(701, '2024-12-24'),
(702, '2024-12-24'),
(703, '2024-12-24'),
(704, '2024-12-24'),
(705, '2024-12-24'),
(706, '2024-12-24'),
(707, '2024-12-24'),
(708, '2024-12-24'),
(709, '2024-12-24'),
(710, '2024-12-24'),
(711, '2024-12-24'),
(712, '2024-12-24'),
(713, '2024-12-24'),
(714, '2024-12-24'),
(715, '2024-12-24'),
(716, '2024-12-24'),
(717, '2024-12-24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `kajian_hadist`
--
ALTER TABLE `kajian_hadist`
  ADD PRIMARY KEY (`id_kajian`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_konten` (`id_konten`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indeks untuk tabel `notulensi`
--
ALTER TABLE `notulensi`
  ADD PRIMARY KEY (`id_notulensi`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `pustaka`
--
ALTER TABLE `pustaka`
  ADD PRIMARY KEY (`id_pustaka`);

--
-- Indeks untuk tabel `sertifikat_wakaf`
--
ALTER TABLE `sertifikat_wakaf`
  ADD PRIMARY KEY (`id_wakaf`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`idsubmenu`),
  ADD KEY `idmenu` (`idmenu`);

--
-- Indeks untuk tabel `surat_aktif_organisasi`
--
ALTER TABLE `surat_aktif_organisasi`
  ADD PRIMARY KEY (`id_aktif`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_access_role` (`role_id`),
  ADD KEY `fk_access_menu` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_submenu_menu` (`menu_id`);

--
-- Indeks untuk tabel `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id_visit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kajian_hadist`
--
ALTER TABLE `kajian_hadist`
  MODIFY `id_kajian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `notulensi`
--
ALTER TABLE `notulensi`
  MODIFY `id_notulensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pustaka`
--
ALTER TABLE `pustaka`
  MODIFY `id_pustaka` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `sertifikat_wakaf`
--
ALTER TABLE `sertifikat_wakaf`
  MODIFY `id_wakaf` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `idsubmenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `surat_aktif_organisasi`
--
ALTER TABLE `surat_aktif_organisasi`
  MODIFY `id_aktif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_keluar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  MODIFY `id_keputusan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `visit`
--
ALTER TABLE `visit`
  MODIFY `id_visit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_konten`) REFERENCES `konten` (`id_konten`);

--
-- Ketidakleluasaan untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `fk_submenu_idmenu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `fk_access_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_access_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `fk_submenu_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
