-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 02 Ara 2022, 21:04:57
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `arackiralama`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `liste`
--

DROP TABLE IF EXISTS `liste`;
CREATE TABLE IF NOT EXISTS `liste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marka` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `yil` varchar(4) COLLATE utf8_turkish_ci NOT NULL,
  `plaka` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `resimKod` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `liste`
--

INSERT INTO `liste` (`id`, `marka`, `model`, `yil`, `plaka`, `resimKod`) VALUES
(1, 'Renault', '1.5 dCi Joy ', '2019', '34 CFJ 958', 'car_1.jpg'),
(2, 'Toyota', '1.4 D-4D Touch ', '2016', '54 DJ 257', 'car_2.jpg'),
(3, 'Volkswagen', '1.6 TDI Comfortline ', '2020', '34 DJB 820', 'car_4.jpg'),
(4, 'BMW', ' 520i 50th Year M Edition ', '2022', '10 AKA 43', 'car_3.jpg'),
(5, 'Honda', ' 1.6i VTEC Eco Executive ', '2020', '34 AHJ 636', 'car_6.jpg'),
(6, 'Mercedes - Benz', ' C 200 D AMG ', '2020', '34 YP 566', 'car_7.jpg'),
(7, 'Audi', ' A5 Sportback 1.4 TFSI Design ', '2017', '34 AAK 465', 'car_4.jpg'),
(26, 'aa', '54', '43', '24', 'car_1.jpg'),
(33, 'volvo', 'xc90', '2020', '34 DAS 800', 'A2017.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciAdi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `login`
--

INSERT INTO `login` (`id`, `kullaniciAdi`, `eposta`, `sifre`) VALUES
(1, 'habibe', 'habibe.v720@gmail.com', '123456'),
(11, 'sude', 'sude.v@hotmail.com', '729813');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
