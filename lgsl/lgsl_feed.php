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

  $lgsl_unrestricted = 0;  // PROVIDE FEED FOR SERVERS NOT ON THE LIST ( NOT RECOMMENDED ! )

//------------------------------------------------------------------------------------------------------------+

  $get_ip      = mysqli_escape_string($_GET[ip]);
  $get_port    = mysqli_escape_string($_GET[port]);
  $get_type    = mysqli_escape_string($_GET[gametype]);  
  $get_request = mysqli_escape_string($_GET[request]);

//------------------------------------------------------------------------------------------------------------+
// FEED ACCESS LOGGING - RECORDS SITES USING THE FEED - 'logs' FOLDER MUST BE CREATED AND WRITABLE
/*
  $file_path = "logs/access_log.csv";
  if (filesize($file_path) > 1234567) { unlink($file_path); }
  $file_handle = fopen($file_path, "a");
  $file_string = date("Y/m/d,h:i:s").",$get_ip:$get_port,$get_type,$get_request,".$_SERVER['REMOTE_ADDR'].",".$_SERVER['HTTP_REFERER']."\n";
  fwrite($file_handle, $file_string);
  fclose($file_handle);
*/
//------------------------------------------------------------------------------------------------------------+
// FEED USAGE LOGGING - COUNTS FEED REQUESTS FOR EACH SERVER - 'logs' FOLDER MUST BE CREATED AND WRITABLE
/*
  $file_content = file('logs/usage_log.csv');
  foreach ($file_content as $file_line => $file_string)
  {
    if (!trim($file_string)) { continue; } $tmp = explode(",", trim($file_string));
    $log[$tmp[0]]['info']     = $tmp[1]; $log[$tmp[0]]['settings'] = $tmp[2];
    $log[$tmp[0]]['players']  = $tmp[3]; $log[$tmp[0]]['date']     = $tmp[4];
  }
  $log[$get_ip.":".$get_port][$get_request]++; $log[$get_ip.":".$get_port]['date'] = date("Y/m/d h:i:s");
  $file_handle = fopen('logs/usage_log.csv', "w");
  foreach ($log as $address => $data)
  {
    $file_string = $address.",".intval($data['info']).",".intval($data['settings']).",".intval($data['players']).",".$data['date']."\r\n";
    fwrite($file_handle, $file_string);
  }
  fclose($file_handle);
*/
//------------------------------------------------------------------------------------------------------------+

  if (!$lgsl_unrestricted)
  {
    unset($get_type); // CLEAR PROVIDED TYPE SO IT HAS TO BE ON LIST
  }

//------------------------------------------------------------------------------------------------------------+

  $lines = file("lgsl_servers.txt");

  foreach ($lines as $line)
  {
    if (!trim($line)) { continue; }     // SKIP BLANK LINES

    $part        = explode(":", $line);
    $server_ip   = trim($part[0]);      // TRIM REMOVES
    $server_port = trim($part[1]);      // ACCIDENTAL SPACES
    $server_type = trim($part[2]);      // AND NEWLINE CHARACTERS
    
    if ($server_ip == $get_ip && $server_port == $get_port)
    {
      $get_type = $server_type; // GETS THE SERVER TYPE FROM THE LGSL_SERVERS.TXT
    }
  }
  
  if (!$get_type)
  {
    if ($get_request == "info")
    {
      $data[status]     = TRUE;
      $data[ip]         = $get_ip;
      $data[port]       = $get_port;
      $data[gametype]   = $get_type;
      $data[gamemod]    = "NOT ON FEED LIST";
      $data[hostname]   = "NOT ON FEED LIST";
      $data[mapname]    = "NOT ON FEED LIST";
      $data[players]    = 0;
      $data[maxplayers] = 0;
      $data[password]   = TRUE;

      echo "_LGSL_FEED_".serialize($data)."_LGSL_FEED_";
    }
    
    exit;
  }
  
//-----------------------------------------------------------------------------------------------------------+

  if ($get_request == "info" || $get_request == "players" || $get_request == "settings")
  {
    require_once("lgsl_protocol.php");
    
    $tmp = lgsl_query($get_ip,$get_port,$get_type,$get_request);
    
    if ($get_request == "settings")
    {
      $tmp[_LGSL_FEED] = "http://".$_SERVER[HTTP_HOST]; // GIVE CREDIT TO FEED HOST
    }

    echo "_LGSL_FEED_".serialize($tmp)."_LGSL_FEED_";

    exit;
  }

//------------------------------------------------------------------------------------------------------------+
 
?>
