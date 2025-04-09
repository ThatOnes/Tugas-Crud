-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 07:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminav`
--

CREATE TABLE `adminav` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dbav`
--

CREATE TABLE `dbav` (
  `ID` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `episode` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbav`
--

INSERT INTO `dbav` (`ID`, `judul`, `genre`, `episode`, `gambar`) VALUES
(1, 'Naruto', 'Action', 220, 'naruto.png'),
(2, 'One Piece', 'Adventure', 1000, 'one_piece.png'),
(3, 'Bleach', 'Action', 366, 'bleach.png'),
(4, 'Attack on Titan', 'Action', 87, 'attack_on_titan.png'),
(5, 'Death Note', 'Thriller', 37, 'death_note.png'),
(6, 'Fullmetal Alchemist: Brotherhood', 'Adventure', 64, 'fullmetal_alchemist_brotherhood.png'),
(7, 'My Hero Academia', 'Action', 138, 'my_hero_academia.png'),
(8, 'Demon Slayer', 'Action', 44, 'demon_slayer.png'),
(9, 'Jujutsu Kaisen', 'Action', 48, 'jujutsu_kaisen.png'),
(10, 'Hunter x Hunter', 'Adventure', 148, 'hunter_x_hunter.png'),
(11, 'Tokyo Ghoul', 'Horror', 48, 'tokyo_ghoul.png'),
(12, 'Sword Art Online', 'Fantasy', 96, 'sword_art_online.png'),
(13, 'Re:Zero', 'Fantasy', 50, 're_zero.png'),
(14, 'One Punch Man', 'Action', 24, 'one_punch_man.png'),
(15, 'Steins;Gate', 'Sci-Fi', 24, 'steins_gate.png'),
(16, 'Code Geass', 'Sci-Fi', 50, 'code_geass.png'),
(17, 'Black Clover', 'Action', 170, 'black_clover.png'),
(18, 'Fairy Tail', 'Adventure', 328, 'fairy_tail.png'),
(19, 'Gintama', 'Comedy', 367, 'gintama.png'),
(20, 'Haikyuu!!', 'Sports', 85, 'haikyuu.png'),
(21, 'Your Lie in April', 'Drama', 22, 'your_lie_in_april.png'),
(22, 'Toradora!', 'Romance', 25, 'toradora.png'),
(23, 'The Rising of the Shield Hero', 'Fantasy', 38, 'shield_hero.png'),
(24, 'No Game No Life', 'Fantasy', 12, 'no_game_no_life.png'),
(25, 'Erased', 'Thriller', 12, 'erased.png'),
(26, 'Vinland Saga', 'Adventure', 48, 'vinland_saga.png'),
(27, 'Mob Psycho 100', 'Action', 37, 'mob_psycho_100.png'),
(28, 'The Promised Neverland', 'Thriller', 23, 'promised_neverland.png'),
(29, 'Made in Abyss', 'Adventure', 25, 'made_in_abyss.png'),
(30, 'KonoSuba', 'Comedy', 20, 'konosuba.png'),
(31, 'Overlord', 'Fantasy', 52, 'overlord.png'),
(32, 'Dr. Stone', 'Adventure', 35, 'dr_stone.png'),
(33, 'Akame ga Kill!', 'Action', 24, 'akame_ga_kill.png'),
(34, 'Claymore', 'Action', 26, 'claymore.png'),
(35, 'Fate/Stay Night: Unlimited Blade Works', 'Fantasy', 25, 'fate_stay_night.png'),
(36, 'Fate/Zero', 'Fantasy', 25, 'fate_zero.png'),
(37, 'Kill la Kill', 'Action', 24, 'kill_la_kill.png'),
(38, 'Angel Beats!', 'Drama', 13, 'angel_beats.png'),
(39, 'Clannad', 'Drama', 47, 'clannad.png'),
(40, 'Hellsing Ultimate', 'Action', 10, 'hellsing_ultimate.png'),
(41, 'Neon Genesis Evangelion', 'Sci-Fi', 26, 'evangelion.png'),
(42, 'Trigun', 'Action', 26, 'trigun.png'),
(43, 'Berserk', 'Action', 25, 'berserk.png'),
(44, 'Cowboy Bebop', 'Sci-Fi', 26, 'cowboy_bebop.png'),
(45, 'Samurai Champloo', 'Action', 26, 'samurai_champloo.png'),
(46, 'Spirited Away', 'Fantasy', 1, 'spirited_away.png'),
(47, 'Howl`s Moving Castle', 'Fantasy', 1, 'howls_moving_castle.png'),
(48, 'Princess Mononoke', 'Fantasy', 1, 'princess_mononoke.png'),
(49, 'The Wind Rises', 'Drama', 1, 'the_wind_rises.png'),
(50, 'Grave of the Fireflies', 'Drama', 1, 'grave_of_the_fireflies.png'),
(51, 'Kiki`s Delivery Service', 'Fantasy', 1, 'kikis_delivery_service.png'),
(52, 'My Neighbor Totoro', 'Fantasy', 1, 'my_neighbor_totoro.png'),
(53, 'Porco Rosso', 'Adventure', 1, 'porco_rosso.png'),
(54, 'Ponyo', 'Fantasy', 1, 'ponyo.png'),
(55, 'Whisper of the Heart', 'Romance', 1, 'whisper_of_the_heart.png'),
(56, 'Castle in the Sky', 'Adventure', 1, 'castle_in_the_sky.png'),
(57, 'Nausicaä of the Valley of the Wind', 'Fantasy', 1, 'nausicaa.png'),
(58, 'Weathering With You', 'Romance', 1, 'weathering_with_you.png'),
(59, 'Your Name', 'Romance', 1, 'your_name.png'),
(60, 'A Silent Voice', 'Drama', 1, 'a_silent_voice.png'),
(61, 'Bakemonogatari', 'Mystery', 15, 'bakemonogatari.png'),
(62, 'Monogatari Series: Second Season', 'Mystery', 26, 'monogatari_second.png'),
(63, 'Zoku Owarimonogatari', 'Mystery', 6, 'zoku_owarimonogatari.png'),
(64, 'Durarara!!', 'Mystery', 60, 'durarara.png'),
(65, 'The Great Pretender', 'Mystery', 23, 'great_pretender.png'),
(66, 'Psycho-Pass', 'Sci-Fi', 41, 'psycho_pass.png'),
(67, 'Zankyou no Terror', 'Thriller', 11, 'zankyou_no_terror.png'),
(68, 'Elfen Lied', 'Horror', 13, 'elfen_lied.png'),
(69, 'Higurashi no Naku Koro ni', 'Horror', 50, 'higurashi.png'),
(70, 'Another', 'Horror', 12, 'another.png'),
(71, 'K-On!', 'Music', 41, 'k_on.png'),
(72, 'Nodame Cantabile', 'Music', 45, 'nodame_cantabile.png'),
(73, 'Beck', 'Music', 26, 'beck.png'),
(74, 'Yuri!!! on Ice', 'Sports', 12, 'yuri_on_ice.png'),
(75, 'Ace of Diamond', 'Sports', 126, 'ace_of_diamond.png'),
(76, 'Kuroko no Basket', 'Sports', 75, 'kuroko_no_basket.png'),
(77, 'Prince of Tennis', 'Sports', 178, 'prince_of_tennis.png'),
(78, 'Initial D', 'Sports', 78, 'initial_d.png'),
(79, 'Eyeshield 21', 'Sports', 145, 'eyeshield_21.png'),
(80, 'Inuyasha', 'Adventure', 167, 'inuyasha.png'),
(81, 'Yu Yu Hakusho', 'Action', 112, 'yu_yu_hakusho.png'),
(82, 'Rurouni Kenshin', 'Action', 94, 'rurouni_kenshin.png'),
(83, 'Ranma ½', 'Comedy', 161, 'ranma_half.png'),
(84, 'Detective Conan', 'Mystery', 1000, 'detective_conan.png'),
(85, 'Case Closed: Zero the Enforcer', 'Mystery', 1, 'zero_enforcer.png'),
(86, 'Slam Dunk', 'Sports', 101, 'slam_dunk.png'),
(87, 'Danganronpa: The Animation', 'Mystery', 13, 'danganronpa.png'),
(88, 'Baccano!', 'Mystery', 16, 'baccano.png'),
(89, 'Blue Exorcist', 'Action', 37, 'blue_exorcist.png'),
(90, 'Soul Eater', 'Action', 51, 'soul_eater.png'),
(91, 'Zatch Bell!', 'Adventure', 150, 'zatch_bell.png'),
(92, 'Shaman King', 'Adventure', 64, 'shaman_king.png'),
(93, 'The World God Only Knows', 'Romance', 36, 'world_god_only_knows.png'),
(94, 'Magi: The Labyrinth of Magic', 'Fantasy', 50, 'magi.png'),
(95, 'Btooom!', 'Thriller', 12, 'btooom.png'),
(96, 'Parasyte - The Maxim', 'Horror', 24, 'parasyte.png'),
(97, 'Deadman Wonderland', 'Action', 12, 'deadman_wonderland.png'),
(98, 'Future Diary', 'Thriller', 26, 'future_diary.png'),
(99, 'Orange', 'Drama', 13, 'orange.png'),
(100, 'Hyouka', 'Mystery', 22, 'hyouka.png'),
(101, 'Binbougami ga', 'Comedy', 13, 'binbougami_ga.png'),
(102, 'Kotonoha no Niwa', 'Drama', 1, 'kotonoha_no_niwa.png'),
(103, 'Shiki', 'Horror', 22, 'shiki.png'),
(104, 'Dennou Coil', 'Sci-Fi', 26, 'dennou_coil.png'),
(105, 'Sora no Woto', 'Adventure', 12, 'sora_no_woto.png'),
(106, 'Kurenai no Buta', 'Action', 1, 'kurenai_no_buta.png'),
(107, 'Shinsekai yori', 'Mystery', 25, 'shinsekai_yori.png'),
(108, 'Saraiya Goyou', 'Adventure', 12, 'saraiya_goyou.png'),
(109, 'Hal', 'Romance', 1, 'hal.png'),
(110, 'Moyashimon', 'Comedy', 11, 'moyashimon.png'),
(111, 'Mushishi', 'Fantasy', 26, 'mushishi.png'),
(112, 'Erased', 'Drama', 12, 'erased.png'),
(113, 'Kujira no Kora wa Sajou ni Utau', 'Fantasy', 12, 'kujira_no_kora.png'),
(114, 'Planetes', 'Sci-Fi', 26, 'planetes.png'),
(115, 'Zetsuen no Tempest', 'Fantasy', 24, 'zetsuen_no_tempest.png'),
(116, 'Doukyuusei', 'Romance', 1, 'doukyuusei.png'),
(117, 'Ergo Proxy', 'Sci-Fi', 23, 'ergo_proxy.png'),
(118, 'Kino no Tabi', 'Adventure', 13, 'kino_no_tabi.png'),
(119, 'Kyousou Giga', 'Action', 10, 'kyousou_giga.png'),
(120, 'Karakuri Circus', 'Fantasy', 36, 'karakuri_circus.png'),
(121, 'Perfect Blue', 'Horror', 1, 'perfect_blue.png'),
(122, 'Samurai Flamenco', 'Adventure', 22, 'samurai_flamenco.png'),
(123, 'Hakumei to Mikochi', 'Fantasy', 12, 'hakumei_to_mikochi.png'),
(124, 'Paprika', 'Sci-Fi', 1, 'paprika.png'),
(125, 'Shoujo Kakumei Utena', 'Action', 39, 'shoujo_kakumei_utena.png'),
(126, 'Hotarubi no Mori e', 'Drama', 1, 'hotarubi_no_mori_e.png'),
(127, 'Nodame Cantabile', 'Music', 23, 'nodame_cantabile.png'),
(128, 'Made in Abyss', 'Fantasy', 13, 'made_in_abyss.png'),
(129, 'Redline', 'Action', 1, 'redline.png'),
(130, '5 Centimeters per Second', 'Romance', 1, '5_cm_per_second.png'),
(131, 'Arakawa Under the Bridge', 'Comedy', 13, 'arakawa_under_bridge.png'),
(132, 'NieA Under 7', 'Drama', 13, 'niea_under_7.png'),
(133, 'Kiba', 'Adventure', 51, 'kiba.png'),
(134, 'Casshern Sins', 'Fantasy', 24, 'casshern_sins.png'),
(135, 'Another', 'Horror', 12, 'another.png'),
(136, 'Black Lagoon', 'Action', 24, 'black_lagoon.png'),
(137, 'Colorful', 'Drama', 1, 'colorful.png'),
(138, 'Noein: Mou Hitori no Kimi e', 'Sci-Fi', 24, 'noein.png'),
(139, 'Carole & Tuesday', 'Music', 24, 'carole_and_tuesday.png'),
(140, 'Kemono no Souja Erin', 'Adventure', 50, 'kemono_no_souja.png'),
(141, 'Koi wa Ameagari no You ni', 'Romance', 12, 'koi_wa_ameagari.png'),
(142, 'Shigurui', 'Horror', 12, 'shigurui.png'),
(143, 'Tsuritama', 'Comedy', 12, 'tsuritama.png'),
(144, 'Yojouhan Shinwa Taikei', 'Drama', 11, 'yojouhan_shinwa.png'),
(145, 'Shouwa Genroku Rakugo Shinjuu', 'Drama', 13, 'shouwa_genroku.png'),
(146, 'Aoi Bungaku Series', 'Mystery', 12, 'aoi_bungaku.png'),
(147, 'Ping Pong the Animation', 'Sports', 11, 'ping_pong.png'),
(148, 'Natsume Yuujinchou', 'Fantasy', 13, 'natsume_yuujinchou.png'),
(149, 'Hakata Tonkotsu Ramens', 'Action', 12, 'hakata_tonkotsu_ramens.png'),
(150, 'Juuni Kokuki', 'Fantasy', 45, 'juuni_kokuki.png'),
(151, 'Kaiba', 'Sci-Fi', 12, 'kaiba.png'),
(152, 'Hinamatsuri', 'Comedy', 12, 'hinamatsuri.png'),
(153, 'Kuragehime', 'Romance', 11, 'kuragehime.png'),
(154, 'Hoshiai no Sora', 'Sports', 12, 'hoshiai_no_sora.png'),
(155, 'ReLIFE', 'Drama', 13, 'relife.png'),
(156, 'Shion no Ou', 'Mystery', 22, 'shion_no_ou.png'),
(157, 'Usagi Drop', 'Slice of Life', 11, 'usagi_drop.png'),
(158, 'Kaichou wa Maid-sama!', 'Romance', 26, 'kaichou_wa_maid_sama.png'),
(159, 'Kino no Tabi: The Beautiful World', 'Adventure', 12, 'kino_no_tabi_beautiful_world.png'),
(160, 'Houseki no Kuni', 'Fantasy', 12, 'houseki_no_kuni.png'),
(161, 'Yuru Camp△', 'Slice of Life', 12, 'yuru_camp.png'),
(162, 'Barakamon', 'Slice of Life', 12, 'barakamon.png'),
(163, 'Shoujo Shuumatsu Ryokou', 'Adventure', 12, 'shoujo_shuumatsu.png'),
(164, 'Sakamichi no Apollon', 'Music', 12, 'sakamichi_no_apollon.png'),
(165, 'Michiko to Hatchin', 'Action', 22, 'michiko_to_hatchin.png'),
(166, 'Seirei no Moribito', 'Adventure', 26, 'seirei_no_moribito.png'),
(167, 'Kobato.', 'Fantasy', 24, 'kobato.png'),
(168, 'Tatami Galaxy', 'Drama', 11, 'tatami_galaxy.png'),
(169, 'Princess Tutu', 'Fantasy', 38, 'princess_tutu.png'),
(170, 'Gankutsuou', 'Drama', 24, 'gankutsuou.png'),
(171, 'Hataraki Man', 'Slice of Life', 11, 'hataraki_man.png'),
(172, 'Denpa-teki na Kanojo', 'Mystery', 2, 'denpa_teki.png'),
(173, 'Rainbow: Nisha Rokubou no Shichinin', 'Drama', 26, 'rainbow_nisha.png'),
(174, 'Zankyou no Terror', 'Mystery', 11, 'zankyou_no_terror.png'),
(175, 'Serial Experiments Lain', 'Sci-Fi', 13, 'lain.png'),
(176, 'Shounen Hollywood', 'Music', 13, 'shounen_hollywood.png'),
(177, 'Chihayafuru', 'Sports', 25, 'chihayafuru.png'),
(178, 'Bokura no', 'Sci-Fi', 24, 'bokura_no.png'),
(179, 'Shiki Oriori', 'Drama', 1, 'shiki_oriori.png'),
(180, 'Aria the Animation', 'Slice of Life', 13, 'aria_animation.png'),
(181, 'Inu to Hasami wa Tsukaiyou', 'Comedy', 12, 'inu_to_hasami.png'),
(182, 'Kamisama no Memochou', 'Mystery', 12, 'kamisama_no_memochou.png'),
(183, 'Eikoku Koi Monogatari Emma', 'Romance', 12, 'emma.png'),
(184, 'Shoujo☆Kageki Revue Starlight', 'Music', 12, 'revue_starlight.png'),
(185, 'Toshokan Sensou', 'Action', 12, 'toshokan_sensou.png'),
(186, 'Haibane Renmei', 'Fantasy', 13, 'haibane_renmei.png'),
(187, 'Tsurune: Kazemai Koukou Kyuudoubu', 'Sports', 13, 'tsurune.png'),
(188, 'Zetsubou Sensei', 'Comedy', 12, 'zetsubou_sensei.png'),
(189, 'Sarazanmai', 'Fantasy', 11, 'sarazanmai.png'),
(190, 'Subete ga F ni Naru: The Perfect Insider', 'Mystery', 11, 'subete_ga_f.png'),
(191, 'Canaan', 'Action', 13, 'canaan.png'),
(192, 'Nana', 'Drama', 47, 'nana.png'),
(193, 'Shion no Ou', 'Mystery', 22, 'shion_no_ou.png'),
(194, 'Tari Tari', 'Music', 13, 'tari_tari.png'),
(195, 'Erin', 'Fantasy', 50, 'erin.png'),
(196, 'Gosick', 'Mystery', 24, 'gosick.png'),
(197, 'Abenobashi Mahou☆Shoutengai', 'Comedy', 13, 'abenobashi.png'),
(198, 'Spice and Wolf', 'Fantasy', 13, 'spice_and_wolf.png'),
(199, 'Giant Killing', 'Sports', 26, 'giant_killing.png'),
(200, 'Nagi no Asukara', 'Drama', 26, 'nagi_no_asukara.png');

-- --------------------------------------------------------

--
-- Table structure for table `userav`
--

CREATE TABLE `userav` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userav`
--

INSERT INTO `userav` (`ID`, `username`, `password`, `picture`) VALUES
(0, 'iki', '123', '67dcd57fd93bf_1.gif'),
(1, 'myman', '123', '67dbb860dbca2_default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminav`
--
ALTER TABLE `adminav`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dbav`
--
ALTER TABLE `dbav`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userav`
--
ALTER TABLE `userav`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
