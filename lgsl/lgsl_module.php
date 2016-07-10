<html>
<center>
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

  $lgsl_cache_time       = 3;     // REFRESH DELAY IN MINS - AS GUIDE ADD 1 AFTER EVERY 5 SERVERS ON THE LIST
  $lgsl_hostname_shorten = 0;     // OPTIONS ARE 0 = DISABLED or 1 = KEEP LEFT PART or 2 = KEEP RIGHT PART
  $lgsl_hostname_length  = 22;    // NUMBER OF CHARACTERS ALLOWED BEFORE SERVER NAME GETS SHORTENED
  $lgsl_hide_offline     = 0;     // CHANGE THIS TO 1 IF YOU DONT WANT TO SHOW OFFLINE SERVERS
  $lgsl_hide_empty       = 0;     // CHANGE THIS TO 1 IF YOU DONT WANT TO SHOW ONLINE BUT EMPTY SERVERS
  $lgsl_hide_full        = 0;     // CHANGE THIS TO 1 IF YOU DONT WANT TO SHOW ONLINE BUT FULL SERVERS
  $lgsl_hostname_to_ip   = 1;     // CONVERT HOSTNAMES TO IP ADDRESS TO SAVE SPACE AND FOR ASE LINK TO WORK
  $lgsl_random           = 0;     // NUMBER OF RANDOM SERVERS TO SHOW INSTEAD OF USING THE :on SELECTION

  $lgsl_path           = "./lgsl/"; // RELATIVE PATH BETWEEN THIS FILE AND ITS LOADING PAGE WITH 'require'

//-----------------------------------------------------------------------------------------------------------+

  require_once($lgsl_path."lgsl_protocol.php");

  if (!is_writable($lgsl_path."lgsl_module_cache.dat")) {
    $fp = fopen($lgsl_path."lgsl_module_cache.dat","a+");
    fclose($fp);
	//echo "THE FILE LGSL_MODULE_CACHE.DAT IS NOT WRITABLE"; 

  }

//-----------------------------------------------------------------------------------------------------------+

  $lines       = file($lgsl_path."lgsl_module_cache.dat");
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

    if ($lgsl_random > 0)
    {
      unset($data_cache);
      unset($data_counter);
      unset($random_file);
    
      // GENERATES A RANDOM FILE LIST USING SERVERS FROM THE REAL FILE LIST

      $lines = file($lgsl_path."lgsl_servers.txt");

      // GOES THROUGH LIST REMOVING ANY BLANK LINES SO THEY ARE NOT PICKED

      $data_counter = 0;
      unset($data_cache);
      unset($random_file);

      foreach ($lines as $line)
      {
        if (!trim($line)) { continue; } // SKIP BLANK LINES

        $data_counter += 1;
        $data_cache[$data_counter] = $line;
      }
  
      // MAKE SURE NUMBER OF SERVERS TO PICK IS NOT HIGHER THAN THE NUMBER AVAILABLE
  
      if ($lgsl_random > count($data_cache))
      {
        $lgsl_random = count($data_cache);
      }
  
      // PICK OUT RANDOM SERVERS WHILE MAKING SURE THAT NO SERVER IS REPEATED TWICE
  
      while (count($random_file) < $lgsl_random)
      {
        $random = rand(1, count($data_cache));
    
        if (!$random_file[$random])
        {
          $part = explode(":", $data_cache[$random]);
          $random_file[$random] = trim($part[0]).":".trim($part[1]).":".trim($part[2]).":on";
        }
      }
    }
    
//-----------------------------------------------------------------------------------------------------------+

    // echo "DEBUG: This information was LIVE <br /><br />";

    ignore_user_abort(true); // FINISH WRITING CACHE EVEN IF THE CLIENTS BROWSER IS CLOSED

    if ($lgsl_random > 0)
    {
      $lines = $random_file; // USE RANDOM FILE LIST GENERATED ABOVE
    }
    else
    {
      $lines = file($lgsl_path."lgsl_servers.txt"); // USE THE REAL FILE LIST
    }

    $data_counter = 0;    
    unset($data_cache);

    foreach ($lines as $line)
    {
      if (!trim($line)) { continue; } // SKIP BLANK LINES

      $part          = explode(":", $line);
      $server_ip     = trim($part[0]);  // TRIM REMOVES
      $server_port   = trim($part[1]);  // ACCIDENTAL SPACES
      $server_type   = trim($part[2]);  // AND NEWLINE CHARACTERS
      $server_module = trim($part[3]);  // AND NEWLINE CHARACTERS
      
      if (!$server_ip || !$server_port) { continue; } // SKIP EMPTY FIELDS

      if ($server_module != "on") { continue; } // SKIP NON MODULES
   
      $data = lgsl_query($server_ip, $server_port, $server_type, "info");

      $data[mapname] = preg_replace("/[^A-Za-z0-9 \_\-]/", "_", strtolower($data[mapname]));  // CONVERT FOR FILE
      $data[gamemod] = preg_replace("/[^A-Za-z0-9 \_\-]/", "_", strtolower($data[gamemod]));  // AND FOLDER USAGE

      $data_counter += 1;
      $data_cache[$data_counter] = $data;
    }

    $fh = fopen($lgsl_path."lgsl_module_cache.dat","w");

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

  if (count($data_cache) == 0) { echo "Няма онлайн сървари ..";  } // STOP IF THE MODULE LIST IS EMPTY

//-----------------------------------------------------------------------------------------------------------+

  foreach($data_cache as $data)
  {

//-----------------------------------------------------------------------------------------------------------+

    if ($lgsl_hide_offline && !$data[status])                                        { continue; }
    if ($lgsl_hide_empty   &&  $data[status] && $data[players] == 0)                 { continue; }
    if ($lgsl_hide_full    &&  $data[status] && $data[players] == $data[maxplayers]) { continue; }

//-----------------------------------------------------------------------------------------------------------+

    if (!$data[status])
    {
      $lgsl_image_map = "./images/no-server-image.png"; // My Image
	  $server_satuts  = "<b style='color:darkgred'>Офлайн</b>"; // my change
      $data[hostname] = " няма";
      $data[mapname]  = " няма ";
    }
    else
    {
      $lgsl_image_map = $lgsl_path."images/maps/$data[gametype]/$data[gamemod]/$data[mapname].jpg";
		$server_satuts  = "<b style='color:darkgreen;'>Онлайн</b>"; // my change
      if (!file_exists($lgsl_image_map))
      {
        $lgsl_image_map = "./images/no-server-image.png"; // My Image
      }    
    }
    
    $lgsl_image_map = str_replace(" ", "%20", $lgsl_image_map); // CHANGE SPACES FOR A VALID URL

//-----------------------------------------------------------------------------------------------------------+

    if (!$data[password])
    {
      $lgsl_image_pass = $lgsl_path."images/status/nopassword.png";
    }
    else
    {
      $lgsl_image_pass = $lgsl_path."images/status/password.png";
    }

//-----------------------------------------------------------------------------------------------------------+

    if ($lgsl_hostname_to_ip) { $data[ip] = gethostbyname($data[ip]); } // CONVERT HOSTNAME TO IP
    
    $lgsl_launch = lgsl_get("launch", $data[ip], $data[port], $data[gametype]); // GET SOFTWARE LAUNCH LINK

//-----------------------------------------------------------------------------------------------------------+
 
    echo "
   
   

				<div style=\"float:left;border:1px solid #000;margin-right:5px;margin-bottom:10px;\"> 
				<img src=\"$lgsl_image_map\" width='100' height='100' border='0' >
				</div> 
				<div style='color:#666;' align='left'>
				<b>$data[ip]:$data[port]</b></font><br />
				<span style='font-size:8px;'>
					Играчи: <b>$data[players]</b> / <b>$data[maxplayers]</b> <br />
					Карта: <b>$data[mapname]</b><br />
					Статус: $server_satuts
				</span>
				</div>	
				
				<div id='clear'></div>

    ";

  }

//-----------------------------------------------------------------------------------------------------------+

?>
</center>
</html>