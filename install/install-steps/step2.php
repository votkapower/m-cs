<?php
require_once "../conf.php";
?>
<div id='header'><b>Стъпка 2:</b> Админ настройки <span style='float:right;'>2 от 3</span></div>
<form method='post' action=''>
					
						<table cellpadding='3' cellspacing='3' border='0'>
					
						
							 <tr>
							   <td>
								 Администраторски потребител: <br/>
								 <input type='text' name='admin_user' value='' />
								</td>
								<td>
								<span id='info_text' style='margin-top:-5px;'> * тук напиши с какво име искаш да влизаш в админ панела</span>
								</td>
							</tr>
							
						
							 <tr>
							   <td>
								 Администраторска парола: <br/>
								 <input type='text' name='admin_pass' value='' />
								 <br/>
								<label> <input type='checkbox' name='remember_me' value='true' checked  style='width:20px;box-shadow:none;'/> Запомни ме на този компютър</label>
								</td>
								<td>
								<span id='info_text' style='margin-top:-25px;'> * Тук си напиши с каква парола искаш да влизаш в админ панела </span>
								</td>
						
						   </tr>
						</table>	 
<?php
if(isset($_POST['insert_admin']))
{
  $admin_user = htmlspecialchars(trim($_POST['admin_user']));
  $admin_pass = htmlspecialchars(trim($_POST['admin_pass']));
  
  if( empty( $admin_user ) )
  {
    error("Напиши си <b>Потребителя</b>, иначе няма да може да влезеш в админ панела !");
  }
 else if( empty( $admin_pass ) )
	  {
		  error("Напиши си <b>Паролата</b>, иначе няма да може да влезеш в админ панела !");
	  }
		  else
			  {
				 $file = "../conf.php";
				 if(file_exists($file))
				 {
					
					
					$sql = ("
--table
DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci

--table
CREATE TABLE IF NOT EXISTS `site-settings` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_general_ci NOT NULL DEFAULT 'zaglavie na saita',
  `keywords` text COLLATE utf8_general_ci NOT NULL,
  `description` text COLLATE utf8_general_ci NOT NULL,
  `publisher` varchar(200) COLLATE utf8_general_ci NOT NULL DEFAULT 'voTkaPoweR',
  `revisit` varchar(50) COLLATE utf8_general_ci NOT NULL DEFAULT '1 days',
  `encoding` varchar(100) COLLATE utf8_general_ci NOT NULL DEFAULT 'windows-1251',
  `copyright` varchar(255) COLLATE utf8_general_ci NOT NULL DEFAULT 'voTkaPoweR',
  `news_limit` int(2) NOT NULL DEFAULT '5',
  `chatbox_limit` int(2) NOT NULL DEFAULT '10',
  `default_index_page` varchar(255) COLLATE utf8_general_ci NOT NULL DEFAULT 'index',
  `default_site_style` varchar(255) COLLATE utf8_general_ci NOT NULL DEFAULT './styles/main.css',
  `default_header` varchar(300) COLLATE utf8_general_ci NOT NULL DEFAULT './images/logo/logo.png'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--table

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_general_ci NOT NULL,
  `image` text COLLATE utf8_general_ci NOT NULL,
  `time_added` int(11) NOT NULL,
  `time-end` int(11) NOT NULL,
  `author` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `razmer` enum('120x240','468x60') COLLATE utf8_general_ci NOT NULL DEFAULT '468x60',
  `alt` varchar(200) COLLATE utf8_general_ci NOT NULL DEFAULT 'Посети го, няма да съжеляваш :)',
  `url` varchar(255) COLLATE utf8_general_ci NOT NULL DEFAULT '#',
  `show` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=8 ;


--table

CREATE TABLE IF NOT EXISTS `chatbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--table

CREATE TABLE `plugins` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`title` VARCHAR( 200 ) NOT NULL ,
`plugin_name` VARCHAR( 200 ) NOT NULL ,
`plugin_version` VARCHAR( 50 ) NOT NULL ,
`plugin_author` VARCHAR( 100 ) NOT NULL ,
`timestamp` INT NOT NULL ,
`installed` ENUM( 'true', 'false' ) NOT NULL DEFAULT 'false'
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;

--table


CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_general_ci NOT NULL,
  `msg` text COLLATE utf8_general_ci NOT NULL,
  `from` varchar(70) COLLATE utf8_general_ci NOT NULL,
  `from_email` varchar(100) COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `readed` enum('1','0') COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `ip` varchar(100) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--table

CREATE TABLE IF NOT EXISTS `ips` (
  `id` int(10) NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT ''
  `poll_id` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--table

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '---',
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--table

CREATE TABLE IF NOT EXISTS `otgovori` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_poll` int(10) NOT NULL,
  `otgovor` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `broi` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--table




CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `vapros` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `podrejdane` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;



--table

INSERT INTO `site-settings` (`id`, `title`, `keywords`, `description`, `publisher`, `revisit`, `encoding`, `copyright`, `news_limit`, `chatbox_limit`, `default_index_page`, `default_site_style`, `default_header`) VALUES
(1, 'М-Cs * Най-мoдерните сървари 2016', 'cs servers , free cs system, cs system by voTkaPoweR , безплатна система хамелион , админ панел , цс система 2012г. .., dimitar paapzov, системата на Димитър Папазов , супер яка , бъза и динамична, the best cs server 2012', 'M-Cs * е нова верига сървари, която цели да предостави на играчите си  най-доброто място за игра !', 'voTkaPoweR', '1 days', 'windows-1251', 'voTkaPoweR - All Rights reserevd !', 5, 10, 'index', './styles/my/Default.css', './images/logo/logo.png');

--table

CREATE TABLE IF NOT EXISTS `user-pms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` varchar(80) COLLATE utf8_general_ci NOT NULL,
  `to_user` varchar(80) COLLATE utf8_general_ci NOT NULL,
  `msg-title` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `msg-text` text COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `readed` enum('1','0') COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--table

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_general_ci NOT NULL,
  `avatar` varchar(500) COLLATE utf8_general_ci NOT NULL DEFAULT './images/no-server-image.png',
  `desc` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `gener` enum('1','2') COLLATE utf8_general_ci NOT NULL DEFAULT '1',
  `type` enum('user','admin') COLLATE utf8_general_ci NOT NULL DEFAULT 'user',
  `Csnick` varchar(80) COLLATE utf8_general_ci NOT NULL,
  `favorite_map` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `favorite_server_type` varchar(100) COLLATE utf8_general_ci NOT NULL DEFAULT 'Classic',
  `like_to_play_like` enum('1','2') COLLATE utf8_general_ci NOT NULL DEFAULT '1',
  `user_ip` varchar(50) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

--table

CREATE TABLE `pages` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`url` VARCHAR( 20 ) NOT NULL ,
`title` VARCHAR( 200 ) NOT NULL DEFAULT 'Няма заглавие',
`text` TEXT NOT NULL ,
`timestamp` INT NOT NULL ,
`author` VARCHAR( 30 ) NOT NULL
) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;



--table 

CREATE TABLE IF NOT EXISTS `site-styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `css-path` varchar(200) COLLATE utf8_general_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_general_ci NOT NULL DEFAULT 'my-new-css-style',
  `body-background` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `site-background` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `site-bg-transparent` varchar(5) COLLATE utf8_general_ci DEFAULT NULL,
  `links-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `text-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `button-text-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `button-text-shadow` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `buttons-shadow` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `button-gradient-top` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `button-gradient-bottom` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-text-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-gradient-top` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-gradient-bottom` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-border-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-background-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-border-transparent` varchar(5) COLLATE utf8_general_ci DEFAULT NULL,
  `panel-bottom-background-transparent` varchar(5) COLLATE utf8_general_ci DEFAULT NULL,
  `panel-bottom-text-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-box-shadow-transparent` varchar(4) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-box-shadow-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-box-shadow-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `body-background-image` text COLLATE utf8_general_ci NOT NULL,
  `body-background-repeat` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `body-background-position` varchar(10) COLLATE utf8_general_ci NOT NULL DEFAULT 'none',
  `menu-top-background` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `menu-bottom-background` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `menu-background-image` text COLLATE utf8_general_ci NOT NULL,
  `menu-background-repeat` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `menu-links-align` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `menu-links-underline` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `menu-links-margin` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `menu-links-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `menu-links-effect` varchar(7) COLLATE utf8_general_ci DEFAULT NULL,
  `menu-box-shadow-transparent` varchar(4) COLLATE utf8_general_ci DEFAULT NULL,
  `menu-box-shadow-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `menu-box-shadow-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `button-text-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `button-padding` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-background-image` text COLLATE utf8_general_ci NOT NULL,
  `panel-top-background-repeat` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `panel-top-text-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-padding` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-text-align` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-text-effect` varchar(7) COLLATE utf8_general_ci DEFAULT NULL,
  `panel-top-box-shadow-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-box-shadow-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-top-box-shadow-transparent` varchar(4) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-background-image` text COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-background-repeat` varchar(20) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-text-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-padding` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `panel-bottom-text-align` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `site-borders-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `site-borders-transparent` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `menu-padding` varchar(4) COLLATE utf8_general_ci NOT NULL DEFAULT '10px',
  `input-background` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `input-text-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `input-border-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `input-border-transparent` varchar(5) COLLATE utf8_general_ci DEFAULT NULL,
  `error-msg-text-align` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `error-msg-padding` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `error-msg-text-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `error-msg-border-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `error-msg-text-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `error-msg-background-bottom` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `error-msg-background-top` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `success-msg-text-align` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `success-msg-padding` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `success-msg-text-size` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `success-msg-border-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `success-msg-text-color` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `success-msg-background-bottom` varchar(7) COLLATE utf8_general_ci NOT NULL,
  `success-msg-background-top` varchar(7) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=518 ;

--table 

INSERT INTO `site-styles` (`id`, `css-path`, `title`, `body-background`, `site-background`, `site-bg-transparent`, `links-color`, `text-color`, `button-text-color`, `button-text-shadow`, `buttons-shadow`, `button-gradient-top`, `button-gradient-bottom`, `panel-top-text-color`, `panel-top-gradient-top`, `panel-top-gradient-bottom`, `panel-border-color`, `panel-bottom-background-color`, `panel-border-transparent`, `panel-bottom-background-transparent`, `panel-bottom-text-color`, `panel-bottom-box-shadow-transparent`, `panel-bottom-box-shadow-size`, `panel-bottom-box-shadow-color`, `body-background-image`, `body-background-repeat`, `body-background-position`, `menu-top-background`, `menu-bottom-background`, `menu-background-image`, `menu-background-repeat`, `menu-links-align`, `menu-links-underline`, `menu-links-margin`, `menu-links-color`, `menu-links-effect`, `menu-box-shadow-transparent`, `menu-box-shadow-size`, `menu-box-shadow-color`, `button-text-size`, `button-padding`, `panel-top-background-image`, `panel-top-background-repeat`, `panel-top-text-size`, `panel-top-padding`, `panel-top-text-align`, `panel-top-text-effect`, `panel-top-box-shadow-size`, `panel-top-box-shadow-color`, `panel-top-box-shadow-transparent`, `panel-bottom-background-image`, `panel-bottom-background-repeat`, `panel-bottom-text-size`, `panel-bottom-padding`, `panel-bottom-text-align`, `site-borders-color`, `site-borders-transparent`, `menu-padding`, `input-background`, `input-text-color`, `input-border-color`, `input-border-transparent`, `error-msg-text-align`, `error-msg-padding`, `error-msg-text-size`, `error-msg-border-color`, `error-msg-text-color`, `error-msg-background-bottom`, `error-msg-background-top`, `success-msg-text-align`, `success-msg-padding`, `success-msg-text-size`, `success-msg-border-color`, `success-msg-text-color`, `success-msg-background-bottom`, `success-msg-background-top`) VALUES
(131, ' styles/my/White-Gray-Blue-BG.css', 'White-Gray-Blue-BG', '#000000', ' transp', 'true', '#127beb', '#333333', '#1293e3', '#fafafa', '#127beb', '#f5f5f5', '#e8e8e8', '#198be8', '#f5f5f5', '#e8e8e8', '  trans', '#ededed', 'true', '', '#333333', '', '', '', '../../images/backgrounds/blue-bg.jpg', 'repeat', 'none', '#f7f7f7', '#ebebeb', 'http://', 'repeat-x', 'left', 'underline', '15px', '#1d9ded', NULL, '', '', '', '11px', '5px', 'http://', 'repeat-x', '13px', '10px', 'left', NULL, '', '', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#cccccc', '', '15px', '#fcfcfc', '#2b2b2b', '#cccccc', '', 'center', '10px', '12px', '#6b0000', '#070000', '#9e0000', '#cc1a1a', 'center', '10px', '12px', '#2085e3', '#010414', '#124ca3', '#248ec7'),
(321, ' styles/my/Bloody-dark.css', 'Bloody-dark', '#141414', ' transp', 'true', '#9b0707', '#CCCCCC', '#110000', '#8c0000', '#000000', '#660000', '#490000', '#840707', '#262626', '#000000', '  trans', '#121212', 'true', '', '#CCCCCC', '', '', '', '../../images/backgrounds/Bloody-dark-red-1280x9602.jpg', 'repeat-y', 'none', '#262626', '#000000', 'http://', 'repeat-x', 'center', 'underline', '10px', '#9b0707', '', '', '', '', '13px', '8px', 'http://', 'repeat-x', '16px', '5px', 'left', '', '', '', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '15px', '#171717', '#CCCCCC', '#000000', '', 'center', '10px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '5px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(310, ' styles/my/Dark-Blue-Ckarcks-design.css', 'Dark-Blue-Ckarcks-design', '#131414', ' transp', 'true', '#4171c4', '#949494', '#010d29', '#5bb0de', '#ffffff', '#247cd4', '#1667c4', '#021129', '#449cdb', '#265694', '  trans', '#121012', 'true', 'true', '#CCCCCC', '', '', '', '../../images/backgrounds/Blue-Cracks-1280x960.png', 'repeat-y', 'none', '#4b90d1', '#2c5287', 'http://', 'repeat-x', 'center', 'underline', '10px', '#000000', '', '', '', '', '13px', '8px', 'http://', 'repeat-x', '13px', '8px', 'left', '', '', '', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '10px', '#121112', '#CCCCCC', '#000000', '', 'center', '10px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'center', '10px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(311, ' styles/my/Dark-Green.css', 'Dark-Green', '#000000', '#212121', '', '#1e9908', '#CCCCCC', '#020f00', '#308a00', '#000000', '#206600', '#064700', '#168208', '#262626', '#000000', '#000000', '#333333', '', '', '#CCCCCC', '', '', '', 'http://', 'repeat-x', 'none', '#262626', '#000000', 'http://', 'repeat-x', 'left', 'none', '10px', '#199908', '', '', '', '', '13px', '5px', 'http://', 'repeat-x', '13px', '5px', 'left', '', '', '', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '10px', '#212121', '#CCCCCC', '#000000', '', 'left', '5px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '5px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(312, ' styles/my/Frozen-Cs.css', 'Frozen-Cs', '#000000', '#212121', '', '#564d87', '#CCCCCC', '#06000f', '#7474aa', '#000000', '#3a3a72', '#2b2b54', '#494075', '#262626', '#000000', '#000000', '#333333', '', '', '#CCCCCC', '', '', '', 'http://', 'repeat-x', 'none', '#262626', '#000000', 'http://', 'repeat-x', 'left', 'none', '10px', '#564d87', '', '', '', '', '13px', '5px', 'http://', 'repeat-x', '13px', '8px', 'left', '', '', '', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '10px', '#212121', '#CCCCCC', '#000000', '', 'left', '5px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '5px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(313, ' styles/my/Orange.css', 'Orange', '#fff6ea', '#fff2e0', '', '#7f4307', '#303030', '#4c2f06', '#f2a73e', '#000000', '#e07014', '#6d4a13', '#573604', '#e5790d', '#9b520a', '#99692a', '#ffedd1', '', '', '#331e00', '', '', '', 'http://', 'repeat-x', 'none', '#e5790d', '#9b520a', 'http://', 'repeat-x', 'left', 'underline', '10px', '#7f4307', 'true', '', '', '', '13px', '5px', 'http://', 'repeat-x', '13px', '8px', 'left', '', '', '', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '10px', '#fff7ed', '#CCCCCC', '#e8aa58', '', 'left', '5px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '5px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(417, ' styles/my/White-Gray.css', 'White-Gray', '#ffffff', '#f8f8f8', '', '#a3a3a3', '#666666', '#424242', '#f8f8f8', '#666666', '#ffffff', '#cecece', '#949494', '#ffffff', '#cecece', '#eaeaea', '#efefef', '', '', '#949494', 'true', '5px', '#000000', 'http://', 'repeat-x', 'none', '#ffffff', '#cecece', 'http://', 'repeat-x', 'left', 'underline', '10px', '#a3a3a3', 'true', 'true', '5px', '#000000', '13px', '5px', 'http://', 'repeat-x', '13px', '8px', 'left', 'true', '5px', '#000000', 'true', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '10px', '#fcfcfc', '#CCCCCC', '#e8e8e8', '', 'left', '5px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '5px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(424, ' styles/my/Blue.css', 'Blue', '#f7fbff', ' transp', 'true', '#2075e3', '#292929', '#063d8f', '#7eb9e0', '#575757', '#39b0f5', '#1c70c9', '#113080', '#49c1f5', '#1b84e0', '#e6e6e6', '#ebf5ff', '', '', '#3d3c3d', 'true', '5px', '#000000', 'http://', 'repeat', 'none', '#41bffa', '#368ee0', 'http://', 'repeat-x', 'left', 'underline', '10px', '#072ca6', 'true', 'true', '5px', '#000000', '13px', '5px', 'http://', 'repeat-x', '13px', '7px', 'left', 'true', '5px', '#000000', 'true', 'http://', 'repeat-x', '13px', '7px', 'left', '#1051a6', '', '10px', '#d6eaff', '#1a1b1f', '#cccccc', 'true', 'left', '5px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '5px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(421, ' styles/my/gamebox-bg.css', 'gamebox-bg', '#333333', ' transp', 'true', '#2b2b2b', '#545454', '#1a1a1a', '#ffffff', '#141414', '#f8f8f8', '#cccccc', '#cccccc', '#262626', '#000000', '#000000', '#bfbfbf', '', '', '#474747', 'true', '5px', '#000000', '../../images/backgrounds/raeta-bg.png', 'repeat', 'none', '#2b2b2b', '#262626', '../../images/backgrounds/menu-bg.png', 'repeat-x', 'left', 'underline', '10px', '#cccccc', '', 'true', '5px', '#050505', '13px', '5px', '../../images/backgrounds/menu-bg.png', 'repeat-x', '11px', '18px', 'left', '', '5px', '#000000', 'true', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '17px', '#333333', '#CCCCCC', '#000000', '', 'left', '10px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '10px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(423, ' styles/my/White-Blue.css', 'White-Blue', '#ffffff', '#f8f8f8', '', '#33568e', '#595959', '#20598e', '#ffffff', '#242424', '#f8f8f8', '#e8e8e8', '#3370a9', '#f8f8f8', '#e8e8e8', '#e0e0e0', '#f0f0f0', '', '', '#888888', 'true', '5px', '#000000', 'http://', 'repeat-x', 'none', '#f8f8f8', '#e8e8e8', 'http://', 'repeat-x', 'left', 'underline', '10px', '#33568e', 'true', 'true', '5px', '#000000', '13px', '5px', 'http://', 'repeat-x', '13px', '8px', 'left', '', '5px', '#000000', 'true', 'http://', 'repeat-x', '13px', '7px', 'left', '  trans', 'true', '10px', '#fcfcfc', '#888888', '#eaeaea', '', 'left', '5px', '12px', '#540a0a', '#070000', '#4f1313', '#7f1f1f', 'left', '5px', '12px', '#0e1c02', '#0b1601', '#0a490b', '#0f770f'),
(517, ' styles/my/Cool-Blue-Design.css', 'Cool-Blue-Design', '#303030', ' transp', 'true', '#2e87e6', '#CCCCCC', '#061c3d', '#2479d4', '#000000', '#196aab', '#0358a3', '#46a9fa', '#262626', '#000000', '#000000', '#1c2633', '', '', '#CCCCCC', '', '5px', '#000000', '../../images/backgrounds/bg.gif', 'repeat', 'none', '#000000', '#000000', '../../images/backgrounds/menu-small-bg-blue-my.png', 'repeat-x', 'left', 'underline', '10px', '#4daceb', '', '', '5px', '#000000', '12px', '8px', '../../images/backgrounds/menu-small-bg-blue-my.png', 'repeat-x', '13px', '12px', 'left', '', '5px', '#000000', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '12px', '#212121', '#4ea8fc', '#000000', '', 'left', '10px', '13px', '#940c0c', '#380202', '#ad1c1c', '#d13636', 'left', '10px', '13px', '#1f7813', '#193302', '#23a323', '#31c231'),
(511, ' styles/my/Cool-Greenish-Design.css', 'Cool-Greenish-Design', '#1f1f1f', ' transp', 'true', '#59e62e', '#CCCCCC', '#0e3b06', '#4dd424', '#000000', '#54ab19', '#42a103', '#7ffa46', '#262626', '#000000', '#000000', '#23331c', '', '', '#CCCCCC', '', '5px', '#000000', '../../images/backgrounds/bg.gif', 'repeat', 'none', '#000000', '#000000', '../../images/backgrounds/menu-small-bg-green-my.png', 'repeat-x', 'left', 'underline', '10px', '#72eb4d', '', '', '5px', '#000000', '12px', '8px', '../../images/backgrounds/menu-small-bg-green-my.png', 'repeat-x', '13px', '12px', 'left', '', '5px', '#000000', '', 'http://', 'repeat-x', '13px', '7px', 'left', '#000000', '', '12px', '#212121', '#92fa4d', '#000000', '', 'left', '10px', '13px', '#940c0c', '#380202', '#ad1c1c', '#d13636', 'left', '10px', '13px', '#1f7813', '#193302', '#23a323', '#31c231');


--table

CREATE TABLE IF NOT EXISTS `forum-settings` (
  `use-forum` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'true',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hide-locked-posts` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `allow-user-to-edit-own-posts` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'true',
  `allow-quick-answer` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'true',
  `alarm-users-when-admin-lock-post` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=2 ;

--table

INSERT INTO `forum-settings` (`use-forum`, `id`, `hide-locked-posts`, `allow-user-to-edit-own-posts`, `allow-quick-answer`, `alarm-users-when-admin-lock-post`) VALUES
('false', 1, 'true', 'true', 'true', 'true');


--table

CREATE TABLE IF NOT EXISTS `forum-posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_general_ci NOT NULL,
  `topic-title` varchar(200) COLLATE utf8_general_ci NOT NULL DEFAULT 'RE:',
  `text` text COLLATE utf8_general_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `locked` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `reported` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `timestamp` int(11) NOT NULL,
  `last-change` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `last-change-from` varchar(70) COLLATE utf8_general_ci NOT NULL,
  `last-change-time` int(11) NOT NULL,
  `times-changed` int(1) NOT NULL DEFAULT '0',
  `allow-answers` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=8 ;


--table


CREATE TABLE IF NOT EXISTS `forum-cats` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=5 ;


--table

CREATE TABLE IF NOT EXISTS `forum-answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_general_ci NOT NULL,
  `text` text COLLATE utf8_general_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `last-change` enum('true','false') COLLATE utf8_general_ci NOT NULL DEFAULT 'false',
  `last-change-from` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `last-change-time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=11 ;


");
					
					
					$tables = explode("--table",$sql);
					$i=0;
					while($i <  count($tables))
					{
					    mysqli_query($_db,"SET NAMES utf8");
				        mysqli_query($_db,$tables[$i]);
						$i++;
					}
				    @mkdir("../user-avatars/".$admin_user);
					@make_thumb("../images/no-server-image.png","../user-avatars/".$admin_user."/".$admin_user.".jpg", 100);
					$fo = fopen("../user-avatars/".$admin_user."/index.php","w+");
					fwrite($fo,"<?php \r header('Location: '.\$_SERVER['HTTP_REFERER']); \n exit; ");
				    fclose($fo);
				
					if($_POST['remember_me'] == "true") // Ако е цъкнат чекбокс-а
					{
					 @setcookie("adm_user", $admin_user, time()+ 900*86400, "/"); // 900 дни валидност ( над 5 год.)
					 @setcookie("adm_pass", $admin_pass, time()+ 900*86400, "/"); // 900 дни валидност ( над 5 год.)
					}
				
				     
					 if(mysqli_num_rows(mysqli_query($_db,"Select * FROM `users` WHERE `username`='".$admin_user."' AND `password` = '".md5($admin_pass)."'")) == 1)
					 {
						mysqli_query($_db,"Update `users` `username`='".$admin_user."', `password` = '".md5($admin_pass)."' WHERE `id`='1'"); // Update
					 }
           else	
						  {
						    mysqli_query($_db,"INSERT INTO `users` (`id`, `username`, `password`, `avatar`, `desc`, `email`, `timestamp`, `gener`, `type`, `Csnick`, `favorite_map`, `favorite_server_type`, `like_to_play_like`, `user_ip`) VALUES
                (1, '".$admin_user."', '".md5($admin_pass)."', './user-avatars/".$admin_user."/".$admin_user.".jpg', 'Аз съм администратора на сайта .. :)', '', ".(time()-2*60).", '1', 'admin', '".$admin_user."', 'de_dust2', 'Classic', '1', '127.0.0.1')"); // Insert New
						  }
					 
				
						ok("Стъпка 2: Приключена успешно :)"); // казвам ОК
						$url="";
						echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2;URL=$url\" >"; //рефрешш след 2 сек.
				
				
				 }
				 else
					{
					 error("Файла съществува !!");
					}
			  }

}
?>
<div style='float:right;'><button id='button' type='submit' name='insert_admin'>Напред &raquo;</button></div>
						<div class='clear'></div>
					</form>
					
