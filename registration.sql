-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2024 at 09:13 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nwsnight`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `idregistration` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `validation` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`idregistration`, `firstname`, `lastname`, `tel`, `mail`, `company`, `job`, `token`, `validation`) VALUES
(1, 'Gaspard', 'Janty', '0695770023', 'gaspardjnt@gmail.com', 'pornhub', 'pdg', NULL, '0'),
(2, 'test', 'test', 'test', 'test', 'test', 'test', NULL, '0'),
(3, 'test', 'test', 'test', 'test', 'test', '11111', '9d885e00f494e2ffeeb25f3e6f4f9b98af98326ac3c690f2fa520e64e25e6c1d', '0'),
(4, 'ojgorjgorj', 'grojgroj', 'oigorgor', 'ogorjgorj', 'ojgorjgorj', 'jogrojgorj', '97218dead1727294e474258eb2a8a83748c541f5888e73be72948660a9941503', '0'),
(5, 'phtphtp', 'tpohtpkhph', 'ôhpkthpiyp', 'oypihthpt', 'ohtphtpo', 'ophtpotpo', '773fb9e9452f7d1dce0c7c5aadfe4ad9b55c7768ff297e7ce2fcc23377619599', '0'),
(6, 'phtphtp', 'tpohtpkhph', 'ôhpkthpiyp', 'oypihthpt', 'ohtphtpo', 'ophtpotpo', '1c2817753721275f0ca1d5aee395de7bbb74f20b0240ccbff59a3a4ad38604c5', '0'),
(7, 'scisif', 'gtpkhtkp', ')htpohtp', 'zaihdi', 'fiheifi', 'ifeifeizi', '3b227e35babfd7868ecdbcd7af20c87334deb0cf7ddcff0bfab2e65cd38c3887', '0'),
(8, 'qdefgr', 'degzhrt', 'dzefzg', 'dzefgrht', 'dzqefgrth', 'dzqefrght', 'd1ffaa50a5d12f0f5958e7d22f3005bd3435df74c47e082caaedff78408caa87', '0'),
(9, 'axel', 'maurice', '0606060606', 'gogier@normandiewebschool.com', 'nws', 'casse couilles', '4333656bc0cbdbe989467ed08ba9d7d260a1c917950e80146685e32307b445f5', '0'),
(10, 'grogro', 'htohtpp', '0303030303', 'gogier@normandiewebschool.fr', 'zerty', 'tyuiopppppppp', 'e2233b7b5506e6b33e5526014df3ac2a5a8fedc249e70535c3b2f95a80677570', '0'),
(11, 'azertyu', 'zertyyyyyy', '01234789', 'gregoire.ogier@gmail.com', 'testlte', 'tlrlrlrle', '0524d2a8c11930c0add58197a6c2668efc6c8b578c205cc9b35cfc2109a33d97', '0'),
(12, 'azertyuik', 'qsdfghj', '1234567890', 'gregoire.ogier@gmail.com', 'dcvbn', 'tyjklmù', '5df98b1fb5ac058b248d16926e87be57009e0d8543e49b6819687a3a28649d52', '0'),
(13, 'zertyu', 'ertyu', '1234576089', 'gregoire.ogier@gmail.com', 'xcvn', 'mlkhgfd', '18be8b322cde16374efed70ee05dc21d4458cfe42eed4b178ddef81d2676995d', '0'),
(14, 'zertyui', 'azertyu²', '0303020104', 'gregoire.ogier@gmail.com', 'iuytrez', 'jhgfdsq', '31138526f143d9d07466fdc6ddc01ea33e2d1c0e2f7f1d206bb36bd51a23cf01', '0'),
(15, 'poiuytr', 'azerty', '0102030405', 'gregoire.ogier@gmail.com', 'poiuytre', 'kjhgfds', '1815bec41fe89ae1a38457e67642db94cee7b7cbdc009cfc57b9ce3e20d6f40e', '0'),
(16, 'Gaspard', 'Janty', '0695770023', 'gaspardjnt@gmail.com', 'NWS', 'Etudiant', '1b0055102f49f1e7ebf4155f278c72b6a6c274a78df05115a0299eb3d690d4b5', '0'),
(17, 'mlkjhgfdsq', 'azertyu4567890', '1234567890', 'gregoire.ogier@gmail.com', 'nbvcxw', 'poiuytreza', 'e97411f775bfc3433ab49b9f8e8f13b8ab041b1c4ee398274a1e86a437e77335', '0'),
(18, 'hthreg', 'hth', '1414141414', 'gregoire.ogier@gmail.com', 'blcmsm', 'mfllzls', 'c671c0248ab7e3c017e60b1eac7dd998ca0fef4d81d34f2983ce5f9ce2a43ed2', '0'),
(19, 'ifllm', 'gkffk', '1213461270', 'gregoire.ogier@gmail.com', 'lptptp', 'mbmbmbm', '4c402545d24f52bd9c9ba9f8ee8488205e4e4cc9a118a932d81249cd51c0cfa0', '1'),
(20, 'salut mec', 'eoeoeo', '0101010203', 'gregoire.ogier@gmail.com', 'jtv', 'rgrgz', '1bc03439d588323a02db72fd2258d15073d14a04c24805dd44188273f48f3421', '0'),
(21, 'salut mec', 'eoeoeo', '0101010203', 'gregoire.ogier@gmail.com', 'jtv', 'rgrgz', 'd996c5d661e9d4c0084b7d21a35f7a22d8dc59e89ebadd809c2a87a94f1975e3', '0'),
(22, 'salut mec', 'eoeoeo', '0101010203', 'gregoire.ogier@gmail.com', 'jtv', 'rgrgz', 'f04655f0f0c84db83968279a327ed2d1ee20ad768b698a6c4f158b95dcf5e63e', '0'),
(23, 'test', 'test', '0000000000', 'gregoire.ogier@gmail.com', 'glflfl', 'mfmfm', 'f65e4113f300ff2dbf9c48bc2822939c6b6e2b85ae6ad63e859a947808186f37', '0'),
(24, 'gmtmtmz', 'gkgkga', '1234567908', 'gregoire.ogier@gmail.com', 'mfmfmm', 'lemsmq', 'ab8220e372076e3194e007d42def9e4be1a0f86b906b1ce7d30d9394c5ce89bb', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`idregistration`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `idregistration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
