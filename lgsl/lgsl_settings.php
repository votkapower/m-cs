<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
		<title>Live Game Server List</title>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
		<meta http-equiv='content-style-type' content='text/css' />
		<link rel="stylesheet" href="lgsl_style.css" type="text/css" />
	</head>

	<body>





<?php

 /*_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
 \_|                                                                                                      |_/
 \_|	                          LIVE GAME SERVER LIST [ STAND ALONE ]                                     |_/
 \_|                                                                                                      |_/
 \_|	                       © Richard Perry from http://www.greycube.com                                 |_/
 \_|                                                                                                      |_/
 \_|	                      Released under the terms and conditions of the                                |_/
 \_|	                   GNU General Public License Version 2 (http://gnu.org)                            |_/
 \_|                                                                                                      |_/
 \_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_*/

//-----------------------------------------------------------------------------------------------------------+

  $lgsl_path = ""; // RELATIVE PATH BETWEEN THIS FILE AND THE LGSL FOLDER FOR PAGE INTEGRATION

//-----------------------------------------------------------------------------------------------------------+

  require_once($lgsl_path."lgsl_protocol.php");

  $get_ip   = $_GET[ip];
  $get_port = $_GET[port];

//-----------------------------------------------------------------------------------------------------------+

  unset($get_type);

  $lines = file($lgsl_path."lgsl_servers.txt");

  foreach ($lines as $line)
  {
    if (!trim($line)) { continue; } // SKIP BLANK LINES

    $part        = explode(":", $line);
    $server_ip   = trim($part[0]);  // TRIM REMOVES
    $server_port = trim($part[1]);  // ACCIDENTAL SPACES
    $server_type = trim($part[2]);  // AND NEWLINE CHARACTERS
    
    if ($server_ip == $get_ip && $server_port == $get_port)
    {
      $get_type = $server_type; // GETS THE SERVER TYPE FROM THE LGSL_SERVERS.TXT
    }
  }

  if (!$get_type) { echo "Server Not On List"; return; } // PROTECT AGAINST THE LINK BEING ALTERED
  
//-----------------------------------------------------------------------------------------------------------+

  $setting = lgsl_query($get_ip, $get_port, $get_type, "settings");
  
  if (!$setting) { echo "<div style='text-align:center'>Server Not Responding</div></body></html>"; return; }
 
  ksort($setting); // SORT BY KEY

//-----------------------------------------------------------------------------------------------------------+

  echo "<table class='settings_table' cellpadding='3'>
			<tr>
			<td style='text-align:center'> <b>Setting</b> </td>
			<td style='height:30px'> <br /> </td>
			<td style='text-align:center'> <b>Value</b> </td>
			</tr>";

  foreach ($setting as $key => $value)
  {
    $key   = htmlentities($key, ENT_QUOTES);                      // CONVERT SYMBOLS
    $value = wordwrap($value, 90, "_LGSL_BREAK_POINT_", TRUE);    // ADD BREAK POINTS BEFORE ENTITIES MAKE THE STRING LONGER
    $value = htmlentities($value, ENT_QUOTES);                    // CONVERT SYMBOLS TO ENTITIES
    $value = str_replace("_LGSL_BREAK_POINT_", "<br />", $value); // CHANGE BREAK POINTS INTO XHTML

    echo "	<tr>
		<td class='settings_row'> $key </td>
		<td class='settings_spacer'><br /></td>
		<td class='settings_row'> $value </td>
		</tr>";
  }

  echo "</table><div style='height:30px'><br /></div>";

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
//-- PLEASE MAKE A DONATION OR SIGN THE GUESTBOOK AT WWW.GREYCUBE.COM IF YOU REMOVE THIS CREDIT ----------------------------------------------------------------------------------------------------+
  echo "<div style='text-align:center;font-family:tahoma;font-size:9px'><a rel='external' href='#' style='text-decoration:none'>ReaL-Players Corp.</a></div>";
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
?>





	</body>
</html>