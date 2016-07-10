<?php
// SITE SETTINGS  !!!!!
mysqli_query($_db,"SET NAMES utf8");
$get_settings = mysqli_query($_db,"SELECT `title`,`news_limit`,`chatbox_limit`,`default_index_page`,`default_header` FROM `site-settings` ORDER BY `id` DESC LIMIT 1");
$sets_num = mysqli_num_rows($get_settings);


if($sets_num >= 1)
{
	$data = mysqli_fetch_array($get_settings);
	define(NEWS_LIMIT, $data['news_limit']); // Лимит на новините 
	define(CHATBOX_LIMIT, $data['chatbox_limit']); // Лимит на новините 
	define(DEFAULT_INDEX_PAGE, $data['default_index_page']); // Страница за подразбиране ..
	define(SITE_TITLE, $data['title']); // Заглавието за подразбиране ..
	define(SITE_HEADER_IMAGE, "<img src='".$data['default_header']."' alt='site-header' width='933'  border='0' >"); // Страница за подразбиране ..
	define(FIX_ENCODING, mysqli_query($_db,"SET NAMES utf8")); // Страница за подразбиране ..
}
else
	{
	 die(error("Моля, въведете настройките на сайта, за да може всичко да си върви както трябва !"));
	}
