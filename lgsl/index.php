<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.1//EN' 'http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml'>
	<head>
		<title>Live Game Server List</title>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
		<meta http-equiv='content-style-type' content='text/css' />
		<link rel="stylesheet" href="lgsl_style.css" type="text/css" />
	</head>

	<body>
		<div style='height:30px'><br /></div>




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


  $lgsl_cache_time       = 1;     // REFRESH DELAY IN MINS - AS GUIDE ADD 1 AFTER EVERY 30 SERVERS ON THE LIST
  $lgsl_hostname_shorten = 1;     // OPTIONS ARE 0 = DISABLED or 1 = KEEP LEFT PART or 2 = KEEP RIGHT PART
  $lgsl_hostname_length  = 40;    // NUMBER OF CHARACTERS ALLOWED BEFORE SERVER NAME GETS SHORTENED
  $lgsl_hide_offline     = 0;     // CHANGE THIS TO 1 IF YOU DONT WANT TO SHOW OFFLINE SERVERS
  $lgsl_hostname_to_ip   = 0;     // CONVERT HOSTNAMES TO IP ADDRESS TO SAVE SPACE AND FOR ASE LINK TO WORK

  $lgsl_path             = "";    // RELATIVE PATH BETWEEN THIS FILE AND THE LGSL FOLDER FOR PAGE INTEGRATION

//-----------------------------------------------------------------------------------------------------------+

  require_once($lgsl_path."lgsl_protocol.php");

  if (!is_writable($lgsl_path."lgsl_cache.dat")) { echo "THE FILE LGSL_CACHE.DAT IS NOT WRITABLE"; exit; }

//-----------------------------------------------------------------------------------------------------------+

  $lines       = file($lgsl_path."lgsl_cache.dat");
  $last_line   = count($lines) - 1;
  $last_update = intval($lines[$last_line]);
  $time_check  = time() - ($lgsl_cache_time * 60);
  
  if ($time_check < $last_update)
  {
    // echo "DEBUG: This information was CACHED <br /><br />";
  
    unset($lines[$last_line]); // REMOVE TIMESTAMP
    unset($data_cache);

    foreach ($lines as $line_number=>$line)
    {
      $data_cache[$line_number] = unserialize($line);
    }
  }
  else
  {

//-----------------------------------------------------------------------------------------------------------+

    // echo "DEBUG: This information was LIVE <br /><br />";

    ignore_user_abort(true); // FINISH WRITING CACHE EVEN IF THE BROWSER IS CLOSED

    $lines = file($lgsl_path."lgsl_servers.txt");

    $data_counter = 0;
    unset($data_cache);

    foreach ($lines as $line)
    {
      if (!trim($line)) { continue; } // SKIP BLANK LINES

      $part        = explode(":", $line);
      $server_ip   = trim($part[0]);  // TRIM REMOVES
      $server_port = trim($part[1]);  // ACCIDENTAL SPACES
      $server_type = trim($part[2]);  // AND NEWLINE CHARACTERS

      if (!$server_ip || !$server_port) { continue; } // SKIP EMPTY FIELDS
   
      $data = lgsl_query($server_ip, $server_port, $server_type, "info");

      $data[gamemod] = preg_replace("/[^A-Za-z0-9 \_\-]/", "_", strtolower($data[gamemod]));  // AND FOLDER USAGE
      $data[mapname] = preg_replace("/[^A-Za-z0-9 \_\-]/", "_", strtolower($data[mapname]));  // CONVERT FOR FILE

      $data_counter += 1;
      $data_cache[$data_counter] = $data;
    }

    $fh = fopen($lgsl_path."lgsl_cache.dat","w");

    foreach($data_cache as $line)
    {
      $line = serialize($line)."\r\n";
      fwrite($fh,$line);
    }

    fwrite($fh, time());

    fclose($fh);
    
    ignore_user_abort(false);

  }

//-----------------------------------------------------------------------------------------------------------+

  echo "<table class='list_table' cellpadding='3'>";

  $lgsl_stats_servers    = 0;
  $lgsl_stats_players    = 0;
  $lgsl_stats_maxplayers = 0;

  foreach($data_cache as $data)
  {
    if (!$data[status] && $lgsl_hide_offline) { continue; }

    if (!$data[status])
    {
      $lgsl_image_status = $lgsl_path."images/status/server_offline.gif";
      $data[status]   = "OFFLINE";
      $data[hostname] = "Unknown";
      $data[mapname]  = "unknown";
    }
    else if (!$data[password])
    {
      $lgsl_image_status = $lgsl_path."images/status/server_online.gif";
      $data[status]   = "ONLINE";
    }
    else
    {
      $lgsl_image_status = $lgsl_path."images/status/server_online_password.gif";
      $data[status]   = "ONLINE WITH PASSWORD";
    }

//-----------------------------------------------------------------------------------------------------------+

    $lgsl_image_icon = $lgsl_path."images/icons/$data[gametype]/$data[gamemod].gif";  // USE MOD ICON

    if (!file_exists($lgsl_image_icon))
    {
      $lgsl_image_icon = $lgsl_path."images/icons/$data[gametype]/$data[gametype].gif"; // USE GAME ICON

      if (!file_exists($lgsl_image_icon))
      {
        $lgsl_image_icon = $lgsl_path."images/status/unknown.gif";  // USE UKNOWN ICON
      }
    }

//-----------------------------------------------------------------------------------------------------------+

    if (strlen($data[hostname]) > $lgsl_hostname_length)
    {
      if ($lgsl_hostname_shorten == 1)
      {
        $data[hostname] = substr($data[hostname], 0, $lgsl_hostname_length - 3) . "..."; // KEEP LEFT
      }
      else if ($lgsl_hostname_shorten == 2)
      {
        $data[hostname] = "..." . substr($data[hostname], - $lgsl_hostname_length); // KEEP RIGHT
      }
    }

    $data[hostname] = htmlentities($data[hostname], ENT_QUOTES); // CONVERT SYMBOLS TO ENTITIES

//-----------------------------------------------------------------------------------------------------------+

    if ($lgsl_hostname_to_ip) { $data[ip] = gethostbyname($data[ip]); } // CONVERT HOSTNAME TO IP
    
    $lgsl_launch = lgsl_get("launch", $data[ip], $data[port], $data[gametype]); // GET SOFTWARE LAUNCH LINK

//-----------------------------------------------------------------------------------------------------------+

    $lgsl_stats_servers++;                       // COUNT VISIBLE NUMBER OF SERVERS
    $lgsl_stats_players += $data[players];       // COUNT VISIBLE NUMBER OF PLAYERS
    $lgsl_stats_maxplayers += $data[maxplayers]; // COUNT VISIBLE NUMBER OF SLOTS

//-----------------------------------------------------------------------------------------------------------+

    echo "

      <tr>
      <td class='list_row'><img src='$lgsl_image_status' alt='' title='$data[status]' /></td>
      <td class='list_row'><img src='$lgsl_image_icon'   alt='' title='$data[gametype] - $data[gamemod]' /></td>
      <td class='list_row'><a style='text-decoration:none' href='$lgsl_launch' title='CLICK TO LAUNCH SOFTWARE'>$data[ip]:$data[port]</a></td>
      <td class='list_row'><a style='text-decoration:none' href='lgsl_settings.php?ip=$data[ip]&amp;port=$data[port]' title='CLICK TO VIEW SERVER SETTINGS'>$data[hostname]</a></td>
      <td class='list_row'>$data[mapname]</td>
      <td class='list_row' style='text-align:center'><a style='text-decoration:none' href='lgsl_players.php?ip=$data[ip]&amp;port=$data[port]' title='CLICK TO VIEW PLAYER INFO'>$data[players]/$data[maxplayers]</a></td>
      </tr>

    ";

//-----------------------------------------------------------------------------------------------------------+

  }

  echo "</table>
  
  <div style='height:30px'><br /></div>
  
  <div style='text-align:center'>$lgsl_stats_servers Servers - $lgsl_stats_players Current Players - $lgsl_stats_maxplayers Maximum Players</div>

  <div style='height:30px'><br /></div>";
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
//-- PLEASE MAKE A DONATION OR SIGN THE GUESTBOOK AT WWW.GREYCUBE.COM IF YOU REMOVE THIS CREDIT ----------------------------------------------------------------------------------------------------+
  echo "<div style='text-align:center;font-family:tahoma;font-size:9px'><a rel='external' href='#' style='text-decoration:none'>ReaL-Players Corp.</a></div>";
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
?>




	</body>
</html>