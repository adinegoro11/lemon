-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 02:25 PM
-- Server version: 5.1.42
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db_ch_idr_tsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `prtg_idr_ip`
--

CREATE TABLE IF NOT EXISTS `prtg_idr_ip` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(100) DEFAULT NULL,
  `sensor_tx_traffic` int(10) DEFAULT NULL,
  `sensor_rx_traffic` int(10) DEFAULT NULL,
  `sensor_lebno` int(5) DEFAULT NULL,
  `sensor_rebno` int(5) DEFAULT NULL,
  `value_tx_traffic` varchar(100) DEFAULT NULL,
  `value_rx_traffic` varchar(100) DEFAULT NULL,
  `value_rebno` varchar(100) DEFAULT NULL,
  `value_lebno` varchar(100) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `hub` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `prtg_idr_ip`
--

INSERT INTO `prtg_idr_ip` (`id`, `nama_link`, `sensor_tx_traffic`, `sensor_rx_traffic`, `sensor_lebno`, `sensor_rebno`, `value_tx_traffic`, `value_rx_traffic`, `value_rebno`, `value_lebno`, `last_update`, `hub`) VALUES
(2, 'Long Midang', 3054, 3053, 2911, 2913, '637 kbit/s', '1.167 kbit/s', '10 dB', '10 dB', '2017-11-21 16:40:22', 'Balikpapan'),
(3, 'Long Bawan', 2921, 2920, 2911, 2913, '1.112 kbit/s', '1.785 kbit/s', '10 dB', '10 dB', '2017-11-21 16:40:23', 'Balikpapan'),
(4, 'Data Bilang', 2927, 2926, 2924, 2925, '1.767 kbit/s', '1.853 kbit/s', '11 dB', '10 dB', '2017-11-21 16:40:24', 'Balikpapan'),
(5, 'Sekatak Buji', 2933, 2932, 2930, 2931, '1.867 kbit/s', '1.698 kbit/s', '9 dB', '9 dB', '2017-11-21 16:40:25', 'Balikpapan'),
(6, 'Sekatak', 2939, 2938, 2936, 2937, '2.161 kbit/s', '2.226 kbit/s', '10 dB', '7 dB', '2017-11-21 16:40:26', 'Balikpapan'),
(7, 'Loloda', 3427, 3428, 3429, 3430, '1.626 Kbps', '1.829 Kbps', '8 dB', '8 dB', '2017-11-21 16:40:27', 'Ternate'),
(8, 'Mala-Mala', 3432, 3433, 3434, 3435, '1.667 Kbps', '2.044 Kbps', '11 dB', '10 dB', '2017-11-21 16:40:28', 'Ternate'),
(9, 'Patani', 3437, 3438, 3439, 3440, '2.652 Kbps', '3.190 Kbps', '9 dB', '9 dB', '2017-11-21 16:40:29', 'Ternate'),
(10, 'Bere Bere', 3443, 3444, 3445, 3446, '1.718 Kbps', '1.811 Kbps', '10 dB', '8 dB', '2017-11-21 16:40:30', 'Ternate'),
(11, 'Buli', 3452, 3451, 3449, 3450, '3 kbit/s', '2 kbit/s', '13 dB', '13 dB', '2017-11-21 16:40:31', 'Ternate'),
(12, 'Antang Tarempa', 3386, 3387, 3388, 3389, '1.408 Kbps', '1.890 Kbps', '11 dB', '9 dB', '2017-11-21 16:40:32', 'Batam'),
(13, 'Tiakur', 3252, 3251, 3249, 3250, '8.315 kbit/s', '689 kbit/s', '16 dB', '17 dB', '2017-11-21 16:40:33', 'Bogor'),
(14, 'Tiakur', 3252, 3251, 3249, 3250, '8.315 kbit/s', '689 kbit/s', '16 dB', '17 dB', '2017-11-21 16:40:34', 'Bogor'),
(15, 'Saumalaki', 3258, 3257, 3255, 3256, '4.419 kbit/s', '319 kbit/s', '15 dB', '17 dB', '2017-11-21 16:40:35', 'Bogor'),
(16, 'Arthabumi', 2956, 2955, 2953, 2954, '3.274 kbit/s', '3.454 kbit/s', '10 dB', '10 dB', '2017-11-21 16:40:36', 'Palu'),
(17, 'Bangkurung', 2962, 2961, 2959, 2960, '915 kbit/s', '1.125 kbit/s', '11 dB', '11 dB', '2017-11-21 16:40:37', 'Palu'),
(18, 'Wuasa', 2968, 2967, 2965, 2966, '13.959 kbit/s', '7.470 kbit/s', '12 dB', '12 dB', '2017-11-21 16:40:38', 'Palu'),
(19, 'Tukun', 2991, 2990, 2988, 2989, '666 kbit/s', '726 kbit/s', '12 dB', '11 dB', '2017-11-21 16:40:39', 'Palangkaraya'),
(20, 'PT.Top Buhut', 2997, 2996, 2994, 2995, '3.297 kbit/s', '3.446 kbit/s', '9 dB', '9 dB', '2017-11-21 16:40:40', 'Palangkaraya'),
(21, 'Pama Asmi', 3009, 3008, 3006, 3007, '1.827 kbit/s', '1.009 kbit/s', '11 dB', '12 dB', '2017-11-21 16:40:41', 'Palangkaraya'),
(22, 'Tumbang Manjul', 3015, 3014, 3012, 3013, '1.180 kbit/s', '1.320 kbit/s', '13 dB', '8 dB', '2017-11-21 16:40:42', 'Palangkaraya'),
(23, 'Ruwai', 3022, 3021, 3019, 3020, '1.200 kbit/s', '1.291 kbit/s', '9 dB', '9 dB', '2017-11-21 16:40:44', 'Sampit'),
(24, 'AKT', 3040, 3039, 3037, 3038, '2.877 kbit/s', '3.131 kbit/s', '11 dB', '9 dB', '2017-11-21 16:40:45', 'Sampit'),
(25, 'Kundang', 3046, 3045, 3043, 3044, '1.100 kbit/s', '924 kbit/s', '9 dB', '9 dB', '2017-11-21 16:40:46', 'Sampit'),
(26, 'T.Senaman', 3052, 3051, 3049, 3050, '1.037 kbit/s', '937 kbit/s', '10 dB', '10 dB', '2017-11-21 16:40:47', 'Sampit'),
(27, 'Antang Tarempa', 3386, 3387, 3388, 3389, '1.449 Kbps', '1.890 Kbps', '11 dB', '9 dB', '2017-11-21 16:40:48', 'Batam'),
(28, 'Serbar', 3323, 3322, 3320, 3321, '19.059 kbit/s', '5.070 kbit/s', '11 dB', '10 dB', '2017-11-21 16:40:49', 'Batam'),
(29, 'Jemaja', 3329, 3328, 3326, 3327, '15.869 kbit/s', '4.859 kbit/s', '11 dB', '10 dB', '2017-11-21 16:40:50', 'Batam'),
(30, 'Marinir Ntn', 3334, 3333, 3331, 3332, '11.398 kbit/s', '2.953 kbit/s', '9 dB', '9 dB', '2017-11-21 16:40:52', 'Batam'),
(31, 'Midai', 3339, 3338, 3336, 3337, '17.940 kbit/s', '6.005 kbit/s', '10 dB', '10 dB', '2017-11-21 16:40:53', 'Batam'),
(32, 'Gboip Ntn', 3344, 3343, 3341, 3342, '15.653 kbit/s', '8.046 kbit/s', '13 dB', '14 dB', '2017-11-21 16:40:54', 'Batam'),
(33, 'T.Matak', 3349, 3348, 3346, 3347, '10.831 kbit/s', '4.220 kbit/s', '11 dB', '12 dB', '2017-11-21 16:40:55', 'Batam'),
(34, 'Siantan Tengah', 3354, 3353, 3351, 3352, '20.320 kbit/s', '3.419 kbit/s', '12 dB', '11 dB', '2017-11-21 16:40:56', 'Batam'),
(35, 'Conoco Matak', 3359, 3358, 3356, 3357, '21.945 kbit/s', '4.865 kbit/s', '12 dB', '12 dB', '2017-11-21 16:40:57', 'Batam'),
(36, 'Tarempa Gboip', 3364, 3363, 3361, 3362, '25.959 kbit/s', '10.124 kbit/s', '10 dB', '12 dB', '2017-11-21 16:40:59', 'Batam'),
(37, 'Bupati Anambas', 3369, 3368, 3366, 3367, '0 kbit/s', '0 kbit/s', '12 dB', '12 dB', '2017-11-21 16:41:00', 'Batam'),
(38, 'Natuna 145/50', 3374, 3373, 3371, 3372, '132.333 kbit/s', '47.142 kbit/s', '14 dB', '15 dB', '2017-11-21 16:41:01', 'Batam'),
(39, 'Natuna 35/30', 3379, 3378, 3376, 3377, '21 kbit/s', '3 kbit/s', '11 dB', '10 dB', '2017-11-21 16:41:02', 'Batam'),
(40, 'Natuna 80/50', 3384, 3383, 3381, 3382, '0 kbit/s', '0 kbit/s', '12 dB', '11 dB', '2017-11-21 16:41:03', 'Batam'),
(41, 'PT.Erna', 3195, 3196, 3197, 3198, '1.423 Kbps', '1.711 Kbps', '11 dB', '11 dB', '2017-11-21 16:41:04', 'Pontianak'),
(42, 'Balai Semendang 2/2', 3200, 3201, 3202, 3203, '1.363 Kbps', '1.612 Kbps', '10 dB', '9 dB', '2017-11-21 16:41:05', 'Pontianak'),
(43, 'Nangasayan 2/2', 3206, 3207, 3208, 3209, '0 Kbps', '0 Kbps', '100 dB', '100 dB', '2017-11-21 16:41:07', 'Pontianak'),
(44, 'Prakarsatani', 3213, 3214, 3215, 3216, '1.979 Kbps', '3.481 Kbps', '10 dB', '9 dB', '2017-11-21 16:41:08', 'Pontianak'),
(45, 'Tontang', 3219, 3220, 3221, 3222, '669 Kbps', '1.050 Kbps', '10 dB', '10 dB', '2017-11-21 16:41:10', 'Pontianak'),
(46, 'Tempuak', 3224, 3225, 3226, 3227, '571 Kbps', '809 Kbps', '10 dB', '8 dB', '2017-11-21 16:41:11', 'Pontianak'),
(47, 'Nanganuak', 3224, 3225, 3226, 3227, '571 Kbps', '809 Kbps', '10 dB', '8 dB', '2017-11-21 16:41:13', 'Pontianak'),
(48, 'Geser', 3140, 3139, 3137, 3138, '6.284 Kbps', '5.337 Kbps', '12 dB', '14 dB', '2017-11-21 16:41:14', 'Ambon'),
(49, 'Liran', 3140, 3139, 3137, 3138, '6.284 Kbps', '5.337 Kbps', '12 dB', '14 dB', '2017-11-21 16:41:15', 'Ambon'),
(50, 'Moa Lakor', 3147, 3148, 3149, 3150, '4.140 Kbps', '4.739 Kbps', '11 dB', '10 dB', '2017-11-21 16:41:16', 'Ambon'),
(51, 'Gorom', 3170, 3169, 3160, 3161, '3.183 Kbps', '2.811 Kbps', '11 dB', '10 dB', '2017-11-21 16:41:17', 'Ambon'),
(52, 'LNG Tangguh', 3104, 3105, 3106, 3107, '1.544 Kbps', '1.477 Kbps', '11 dB', '13 dB', '2017-11-21 16:41:18', 'Sorong'),
(53, 'Babo', 3109, 3110, 3111, 3112, '6.749 Kbps', '3.335 Kbps', '10 dB', '10 dB', '2017-11-21 16:41:19', 'Sorong'),
(54, 'Teminabuan', 3114, 3115, 3116, 3117, '6.881 Kbps', '7.223 Kbps', '9 dB', '11 dB', '2017-11-21 16:41:20', 'Sorong'),
(55, 'Patipi', 3119, 3120, 3121, 3122, '934 Kbps', '930 Kbps', '9 dB', '10 dB', '2017-11-21 16:41:21', 'Sorong'),
(56, 'Karas', 3124, 3125, 3126, 3127, '1.472 Kbps', '1.466 Kbps', '9 dB', '10 dB', '2017-11-21 16:41:22', 'Sorong'),
(57, 'Teminabuan 4/4', 3129, 3130, 3131, 3132, '3.470 Kbps', '3.464 Kbps', '15 dB', '11 dB', '2017-11-21 16:41:23', 'Sorong'),
(58, 'Kepikrida', 3186, 3187, 3184, 3185, '960 Kbps', '803 Kbps', '10 dB', '10 dB', '2017-11-21 16:41:24', 'Timika'),
(59, 'Enarotali', 3276, 3277, 3274, 3275, '6.856 Kbps', '7.653 Kbps', '10 dB', '10 dB', '2017-11-21 16:41:25', 'Timika'),
(60, 'Dogiyai', 3282, 3283, 3280, 3281, '3.299 Kbps', '3.675 Kbps', '11 dB', '10 dB', '2017-11-21 16:41:26', 'Timika'),
(61, 'Wamena', 3265, 3264, 3262, 3263, '155.102 kbit/s', '65.891 kbit/s', '13 dB', '12 dB', '2017-11-21 16:41:27', 'Jayapura'),
(62, 'Wamena 2', 3309, 3308, 3306, 3307, '42.888 kbit/s', '1 kbit/s', '14 dB', '13 dB', '2017-11-21 16:41:28', 'Jayapura'),
(63, 'Wamena#3', 3314, 3313, 3311, 3312, '29.326 kbit/s', '0 kbit/s', '12 dB', '12 dB', '2017-11-21 16:41:29', 'Jayapura'),
(64, 'Karubaga', 3059, 3060, 3061, 3062, '1.744 Kbps', '1.968 Kbps', '10 dB', '10 dB', '2017-11-21 16:41:30', 'Jayapura'),
(65, 'Lereh', 3065, 3066, 3067, 3068, '3.617 Kbps', '6.580 Kbps', '10 dB', '11 dB', '2017-11-21 16:41:31', 'Jayapura'),
(66, 'Yalimo', 3071, 3072, 3073, 3074, '4.293 Kbps', '6.102 Kbps', '11 dB', '12 dB', '2017-11-21 16:41:32', 'Jayapura'),
(67, 'Senggi', 3076, 3077, 3078, 3079, '1.399 Kbps', '1.602 Kbps', '10 dB', '10 dB', '2017-11-21 16:41:33', 'Jayapura'),
(68, 'Dekai', 3081, 3082, 3083, 3084, '6.614 Kbps', '3.493 Kbps', '10 dB', '11 dB', '2017-11-21 16:41:34', 'Jayapura'),
(69, 'Tolikara', 3087, 3088, 3089, 3090, '1.965 Kbps', '2.673 Kbps', '10 dB', '9 dB', '2017-11-21 16:41:36', 'Jayapura'),
(70, 'Supiori', 3092, 3093, 3094, 3095, '0 Kbps', '0 Kbps', '8 dB', '9 dB', '2017-11-21 16:41:36', 'Jayapura');
