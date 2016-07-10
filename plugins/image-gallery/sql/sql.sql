CREATE TABLE IF NOT EXISTS `image-gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE cp1251_bulgarian_ci NOT NULL,
  `author` varchar(70) COLLATE cp1251_bulgarian_ci NOT NULL,
  `image` text COLLATE cp1251_bulgarian_ci NOT NULL,
  `uploaded` enum('true','false') COLLATE cp1251_bulgarian_ci NOT NULL DEFAULT 'true',
  `link_in_menu` varchar(200) COLLATE cp1251_bulgarian_ci NOT NULL,
  `link_in_user_cp` varchar(150) COLLATE cp1251_bulgarian_ci NOT NULL,
  `thumb_image` text COLLATE cp1251_bulgarian_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_bulgarian_ci AUTO_INCREMENT=1 ;


