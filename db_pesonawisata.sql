-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 05:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesonawisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` int(20) NOT NULL,
  `nama_wisata` text NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pembayaran` text NOT NULL,
  `tanggal_kunjung` date NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `name`, `email`, `phone_number`, `nama_wisata`, `harga`, `jumlah`, `pembayaran`, `tanggal_kunjung`, `total`, `status`) VALUES
(13, 'Noval', '22082010214@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 4, 'Cash', '2024-10-22', 80000, 'Selesai'),
(14, 'Noval', '22082010214@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 5, 'Cash', '2024-06-12', 100000, 'Selesai'),
(15, 'bayu', '22082010204@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 2, 'Transfer', '2024-08-14', 40000, 'Selesai'),
(16, 'bayu', '22082010204@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 2, 'Cash', '2024-10-07', 40000, 'Selesai'),
(17, 'bayu', '22082010204@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 5, 'Cash', '2024-10-07', 100000, 'Selesai'),
(18, 'bayu', '22082010204@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 5, 'Cash', '2024-10-08', 100000, 'Selesai'),
(19, 'bayu', '22082010204@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 5, 'Cash', '2024-10-09', 100000, 'Selesai'),
(20, 'bayu', '22082010204@student.upnjatim.ac.id', 2147483647, 'Raja Ampat', 20000, 1, 'Cash', '2024-10-09', 20000, 'Sedang Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `phone_number`, `name`, `username`, `password`, `gender`, `date`) VALUES
(1, '22082010214@student.upnjatim.ac.id', '2147483647', 'Admin', 'admin', '$2y$10$f9pZred6QENO847RQsRKt.vtLreYUwSpcnwWKpp3QkaN69N5.j9xy', 'Male', '2004-05-30'),
(3, 'adriannoval2004@gmail.com', '085851788002', 'Adrian Noval', 'owner', '$2y$10$VAtp1AtVp3yH5CWJlrQ7lOLEFIR8KVHY/Hm8Lf50OM50BCnikjY6K', 'Male', '2004-05-30'),
(4, '22082010204@student.upnjatim.ac.id', '2147483647', 'bayu', 'bayu1', '$2y$10$CejZr1YQh4yI399jB9j3zOg6x9zxQOOAlTYR1XJoKD3iB1LBZSvgO', 'Male', '2004-05-10'),
(5, '22082010214@student.upnjatim.ac.id', '2147483647', 'Noval', 'noval1', '$2y$10$2BDELeL5fGyXPmDWF0DK/u7qgsnlnpNjG373nZ7ym1.vWUwqENbWW', 'Male', '2004-05-30'),
(6, '22082010209@student.upnjatim.ac.id', '0258715', 'Vishnu', 'vishnu1', '$2y$10$lZNPYaIX2EBDOvUxdpAlnu03IFvhVMcmsJE/3Q7KkUApsB689byaO', 'Male', '2024-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(100) NOT NULL,
  `kode_wisata` int(100) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `harga_wisata` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jadwal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `kode_wisata`, `nama_wisata`, `harga_wisata`, `deskripsi`, `jadwal`) VALUES
(1, 100, 'Raja Ampat', 1500000, 'Korpak Villa & Resort didirikan di Raja Ampat, “Surga Terakhir di Dunia”, di mana sambutan hangat masyarakat, kearifan lokal, dan pola kehidupan masyarakat yang unik telah dilestarikan selama ratusan tahun. Tahun 2018 merupakan titik awal untuk menghargai dan melestarikan budaya yang langka ini dan terus melingkupinya sebagai dasar masuknya Korpak Villa & Resort ke dalam industri perhotelan dengan semangat Bhinneka Tunggal Ika yang akan terus bergerak maju.', 'Setiap Hari'),
(3, 101, 'Labuan Bajo', 20000, 'Labuan Bajo adalah sebuah kota pelabuhan yang terletak di ujung barat Pulau Flores, Nusa Tenggara Timur, Indonesia. Kota ini terkenal sebagai gerbang utama menuju Taman Nasional Komodo, yang merupakan rumah bagi Komodo, kadal terbesar di dunia. Labuan Bajo telah berkembang menjadi salah satu destinasi wisata unggulan di Indonesia karena keindahan alamnya yang menakjubkan dan keunikan fauna serta flora yang dimilikinya.\r\n\r\n', 'Setiap Hari, 08.00 - 17.00'),
(7, 102, 'Danau Toba', 50000, 'Danau Toba adalah danau vulkanik terbesar di dunia, yang terletak di provinsi Sumatera Utara, Indonesia. Danau ini memiliki panjang sekitar 100 kilometer dan lebar sekitar 30 kilometer, serta dikelilingi oleh pegunungan yang hijau dan subur. Di tengah danau terdapat sebuah pulau vulkanik bernama Pulau Samosir, yang luasnya hampir sebanding dengan negara Singapura.', 'Setiap Hari, 08.00 - 17.00'),
(8, 103, 'Pulau Merah', 15000, 'Pulau Merah adalah sebuah destinasi wisata pantai yang terletak di Kabupaten Banyuwangi, Jawa Timur, Indonesia. Pulau ini terkenal karena keindahan pantainya yang memukau dengan pasir putih kemerahan dan sebuah bukit kecil yang ikonik di lepas pantai, yang dapat diakses saat air surut. Nama \"Pulau Merah\" berasal dari warna pasir dan bukit tersebut.\r\n\r\n', 'Setiap Hari, 08.00 - 17.00'),
(9, 104, 'Nusa Penida', 30000, 'Nusa Penida adalah sebuah pulau kecil yang terletak di tenggara Pulau Bali, Indonesia. Pulau ini terkenal dengan keindahan alamnya yang spektakuler, pantai-pantai eksotis, dan spot-spot menyelam yang luar biasa. Akses ke Nusa Penida umumnya melalui perjalanan laut dari Bali, seperti dari Pelabuhan Sanur, Padang Bai, atau Serangan.\r\n\r\n', 'Setiap hari, 08.00 - 17.00'),
(10, 105, 'Banda Neira', 40000, 'Banda Neira adalah sebuah pulau kecil di Kepulauan Banda, Maluku, Indonesia. Pulau ini memiliki sejarah yang kaya sebagai pusat perdagangan rempah-rempah, terutama pala dan cengkeh, pada masa kolonial. Banda Neira menawarkan kombinasi unik antara keindahan alam, warisan sejarah, dan kehidupan bawah laut yang menakjubkan.\r\n\r\n', 'Setiap Hari, 08.00 - 17.00'),
(11, 106, 'Pulau Derawan', 30000, 'Pulau Derawan adalah salah satu dari banyak pulau yang membentuk Kepulauan Derawan di Kabupaten Berau, Kalimantan Timur, Indonesia. Pulau ini terkenal dengan keindahan alam bawah lautnya yang menakjubkan, pantai berpasir putih, dan ekosistem yang kaya. Derawan menjadi salah satu destinasi favorit bagi para penyelam dan pecinta alam dari seluruh dunia.\r\n\r\n', 'Setiap hari, 08.00 - 17.00'),
(12, 107, 'Pulau Bunaken', 35000, 'Pulau Bunaken adalah sebuah pulau kecil yang terletak di Teluk Manado, Provinsi Sulawesi Utara, Indonesia. Pulau ini merupakan bagian dari Taman Nasional Bunaken, yang dikenal sebagai salah satu destinasi menyelam terbaik di dunia karena keanekaragaman hayati lautnya yang luar biasa dan keindahan terumbu karangnya.\r\n\r\n', 'Setiap Hari, 08.00 - 17.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
