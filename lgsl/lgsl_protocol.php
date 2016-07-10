<?php

 /*_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
 \_|                                                                                                      |_/
 \_|                                                                                                      |_/
 \_|                                                                                                      |_/
 \_|	                            LIVE GAME SERVER LIST PROTOCOL 2.8                                      |_/
 \_|                                                                                                      |_/
 \_|	                       © Richard Perry from http://www.greycube.com                                 |_/
 \_|                                                                                                      |_/
 \_|	                      Released under the terms and conditions of the                                |_/
 \_|	                   GNU General Public License Version 2 (http://gnu.org)                            |_/
 \_|                                                                                                      |_/
 \_|                                                                                                      |_/
 \_|                   By using the script or any of its code, you agree to the license.                  |_/
 \_|                                                                                                      |_/
 \_|                                                                                                      |_/
 \_|                                                                                                      |_/
 \_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_*/



//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_get($request, $ip, $port, $game)
  {
//---------------------------------------------------------+

    $lgsl_support = array("halflife"      => "Half-Life",
                          "halflifeold"   => "Half-Life Old",
                          "quake3"        => "Quake 3",
                          "callofduty"    => "Call Of Duty",
                          "callofduty2"   => "Call Of Duty 2",
                          "jediknight2"   => "JediKnight 2",
                          "wolfenstein"   => "Wolfenstein",
                          "startrekef"    => "StarTrek Elite-Force",
                          "sof2"          => "Soldier of Fortune 2",
                          "quake2"        => "Quake 2",
                          "warsow"        => "Warsow",
                          "mohq3"         => "Medal Of Honour Method 1",
                          "mohgs"         => "Medal Of Honour Method 2",
                          "ut"            => "Unreal Tournament",
                          "ut2003"        => "UT2003",
                          "ut2004"        => "UT2004",
                          "bf1942"        => "Battlefield 1942",
                          "halo"          => "Halo",
                          "swat4"         => "SWAT 4",
                          "flashpoint"    => "Operation Flashpoint",
                          "vietcong"      => "Vietcong",
                          "cnc"           => "Command and Conquer",
                          "ravenshield"   => "Raven Shield",
                          "halflife2"     => "Half-Life 2",
                          "bf2"           => "Battlefield 2",
                          "bf2142"        => "Battlefield 2142",
                          "graw"          => "Ghost Recon Warfighter",
                          "stalker"       => "S.T.A.L.K.E.R.",
                          "quakew"        => "Quake World",
                          "farcry"        => "Far Cry",
                          "painkiller"    => "PainKiller",
                          "neverwinter"   => "NeverWinter Nights",
                          "neverwinter2"  => "NeverWinter Nights 2",
                          "nascar2004"    => "Nascar Thunder 2004",
                          "fear"          => "F.E.A.R.",
                          "vietcong2"     => "Vietcong 2",
                          "bfvietnam"     => "Battlefield Vietnam",
                          "aarmy"         => "Americas Army",
                          "arma"          => "ArmA: Armed Assault",
                          "doom3"         => "Doom 3",
                          "quake4"        => "Quake 4");

//---------------------------------------------------------+

    $lgsl_protocol = array("halflife"     => "one",
                           "halflifeold"  => "one",
                           "quake3"       => "two",
                           "callofduty"   => "two",
                           "callofduty2"  => "two",
                           "jediknight2"  => "two",
                           "wolfenstein"  => "two",
                           "startrekef"   => "two",
                           "sof2"         => "two",
                           "mohq3"        => "two",
                           "quake2"       => "two",
                           "warsow"       => "two",
                           "mohgs"        => "three",
                           "ut"           => "three",
                           "ut2003"       => "three",
                           "ut2004"       => "three",
                           "bf1942"       => "three",
                           "halo"         => "three",
                           "swat4"        => "three",
                           "flashpoint"   => "three",
                           "vietcong"     => "three",
                           "cnc"          => "three",
                           "ravenshield"  => "four",
                           "halflife2"    => "five",
                           "bf2"          => "six",
                           "bf2142"       => "six",
                           "graw"         => "six",
                           "stalker"      => "six",
                           "quakew"       => "seven",
                           "farcry"       => "eight",
                           "painkiller"   => "eight",
                           "neverwinter"  => "nine",
                           "neverwinter2" => "nine",
                           "nascar2004"   => "nine",
                           "fear"         => "nine",
                           "vietcong2"    => "nine",
                           "bfvietnam"    => "nine",
                           "aarmy"        => "nine",
                           "arma"         => "nine",
                           "doom3"        => "ten",
                           "quake4"       => "ten");

//---------------------------------------------------------+

    $lgsl_launch = array("halflife"       => "EYE://HL://{IP}:{PORT}",
                         "halflifeold"    => "EYE://HL://{IP}:{PORT}",
                         "quake3"         => "EYE://Q3://{IP}:{PORT}",
                         "callofduty"     => "EYE://COD://{IP}:{PORT}",
                         "callofduty2"    => "EYE://COD://{IP}:{PORT}",
                         "jediknight2"    => "EYE://JK2://{IP}:{PORT}",
                         "wolfenstein"    => "EYE://RTCW://{IP}:{PORT}",
                         "startrekef"     => "EYE://EF://{IP}:{PORT}",
                         "sof2"           => "EYE://SOF2://{IP}:{PORT}",
                         "mohq3"          => "EYE://MOH://{IP}:{PORT}",
                         "quake2"         => "EYE://Q2://{IP}:{PORT}",
                         "warsow"         => "qtracker://{IP}:{PORT}?game=Warsow&amp;action=show",
                         "mohgs"          => "EYE://MOH://{IP}:{PORT}",
                         "ut"             => "EYE://UT://{IP}:{PORT}",
                         "ut2003"         => "EYE://UT2://{IP}:{PORT}",
                         "ut2004"         => "EYE://UT2://{IP}:{PORT}",
                         "bf1942"         => "EYE://NEW://{IP}:{PORT}",
                         "halo"           => "EYE://GS://{IP}:{PORT}",
                         "swat4"          => "EYE://GS://{IP}:{PORT}",
                         "flashpoint"     => "EYE://OLD://{IP}:{PORT}",
                         "vietcong"       => "EYE://OLD://{IP}:{PORT}",
                         "cnc"            => "CNC://{IP}:{PORT}",
                         "ravenshield"    => "EYE://RVS://{IP}:{PORT}",
                         "halflife2"      => "EYE://SRC://{IP}:{PORT}",
                         "bf2"            => "EYE://GS://{IP}:{PORT}",
                         "bf2142"         => "qtracker://{IP}:{PORT}?game=Battlefield2142&amp;action=show",
                         "graw"           => "EYE://GS://{IP}:{PORT}",
                         "stalker"        => "qtracker://{IP}:{PORT}?game=STALKER_ShadowChernobyl&amp;action=show",
                         "quakew"         => "EYE://QW://{IP}:{PORT}",
                         "farcry"         => "EYE://NEW://{IP}:{PORT}",
                         "painkiller"     => "EYE://NEW://{IP}:{PORT}",
                         "neverwinter"    => "EYE://GS://{IP}:{PORT}",
                         "neverwinter2"   => "EYE://GS://{IP}:{PORT}",
                         "nascar2004"     => "EYE://GS://{IP}:{PORT}",
                         "fear"           => "EYE://GS://{IP}:{PORT}",
                         "vietcong2"      => "EYE://GS://{IP}:{PORT}",
                         "bfvietnam"      => "EYE://GS://{IP}:{PORT}",
                         "aarmy"          => "EYE://GS://{IP}:{PORT}",
                         "arma"           => "EYE://GS://{IP}:{PORT}",
                         "doom3"          => "EYE://D3://{IP}:{PORT}",
                         "quake4"         => "EYE://D3://{IP}:{PORT}");

//---------------------------------------------------------+

    if ($request == "support")  { return $lgsl_support;  }
    if ($request == "protocol") { return $lgsl_protocol; }

    if ($request == "launch")
    {
      if ($ip != "" && $port != "" && $game != "") // CHECK FOR GAME SPECIFIC LAUNCH CODE
      {
        // GET PORTS JUST FOR THE LAUNCH LINKS - NOT USED FOR QUERYING

        if ($game == "stalker")                                              { $port = $port + 2;     }
        if ($game == "aarmy"  || $game == "flashpoint" || $game == "swat4")  { $port = $port + 1;     }
        if ($game == "ut"     || $game == "ut2003"     || $game == "ut2004") { $port = $port + 1;     }
        if ($game == "bf1942" || $game == "painkiller" || $game == "farcry") { $port = $port + 123;   }
        if ($game == "ravenshield")                                          { $port = $port + 1000;  }
        if ($game == "vietcong")                                             { $port = $port + 10000; }
        if ($game == "vietcong2" && $port <= 10000)                          { $port = 19967;         }
        if ($game == "bfvietnam" && $port == 15567)                          { $port = 23000;         }
        if ($game == "bf2"       && $port == 16567)                          { $port = 29900;         }
        if ($game == "bf2142"    && $port == 16567)                          { $port = 29900;         }

        $lgsl_launch_code = str_replace(array("{IP}","{PORT}"),array($ip,$port),$lgsl_launch[$game]);
      }

      return $lgsl_launch_code;
    }
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_query($ip, $port, $game, $request)
  {


//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/
//
//  THE FEED SYSTEM ALLOWS LGSL TO GET INFORMATION FROM
//  ANOTHER LGSL OVER PORT 80 TO BYPASS BLOCKED PORTS

    $lgsl_feed_url = "";

//_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/


    $lgsl_protocol = lgsl_get("protocol","","","");

    if (!$lgsl_protocol[$game])
    {
      echo ($game ? "INVALID GAME '$game'" : "MISSING GAME")." FOR $ip:$port"; exit;
    }
    
    if ($request != "info" && $request != "settings" && $request != "players")
    {
      echo "INVALID TYPE ( info, settings, players )"; exit;
    }

//---------------------------------------------------------+

    if ($lgsl_feed_url)
    {
      $data = lgsl_query_feed($ip, $port, $game, $request, $lgsl_feed_url);

      $lgsl_protocol[$game] = "feed"; // TO BYPASS QUERY FUNCTIONS BELOW
    }      

//-------------------------+

    if ($lgsl_protocol[$game] == "one")
    {
      $data = lgsl_query_one($ip, $port, $game, $request);
    }
    
//-------------------------+

    if ($lgsl_protocol[$game] == "two")
    {
      $data = lgsl_query_two($ip, $port, $game, $request);
    }

//-------------------------+

    if ($lgsl_protocol[$game] == "three")
    {
      $queryport = $port;

      if ($game == "ut"     || $game == "swat4" || $game == "flashpoint") { $queryport = $port + 1;  }
      if ($game == "ut2003" || $game == "ut2004")                         { $queryport = $port + 10; }
      if ($game == "bf1942"   && $queryport == 14567)                     { $queryport = 23000; }
      if ($game == "vietcong" && $queryport <= 10000)                     { $queryport = 15425; }
      if ($game == "mohgs")                                               { $queryport = 12300; }

      $data = lgsl_query_three($ip, $port, $queryport, $game, $request);
    }

//-------------------------+

    if ($lgsl_protocol[$game] == "four")
    {
      $queryport = $port + 1000;

      $data = lgsl_query_four($ip, $port, $queryport, $game, $request);
    }

//-------------------------+
    
    if ($lgsl_protocol[$game] == "five")
    {
      $data = lgsl_query_five($ip, $port, $game, $request);
    }

//-------------------------+

    if ($lgsl_protocol[$game] == "six")
    {
      $queryport = $port;

      if ($game == "stalker")                       { $queryport = $port + 2; }
      if ($game == "bf2"    && $queryport == 16567) { $queryport = 29900;     }
      if ($game == "bf2142" && $queryport == 16567) { $queryport = 29900;     }

      $data = lgsl_query_six($ip, $port, $queryport, $game, $request);
    }

//-------------------------+

    if ($lgsl_protocol[$game] == "seven")
    {
      $data = lgsl_query_seven($ip, $port, $game, $request);
    }

//-------------------------+

    if ($lgsl_protocol[$game] == "eight")
    {
      $queryport = $port + 123;

      $data = lgsl_query_eight($ip, $port, $queryport, $game, $request);
    }

//-------------------------+
    
    if ($lgsl_protocol[$game] == "nine")
    {
      $queryport = $port;

      if ($game == "vietcong2" && $queryport <= 10000) { $queryport = 19967; }
      if ($game == "bfvietnam" && $queryport == 15567) { $queryport = 23000; }
      if ($game == "aarmy")                            { $queryport = $port + 1; }

      $data = lgsl_query_nine($ip, $port, $queryport, $game, $request);
    }

//-------------------------+

    if ($lgsl_protocol[$game] == "ten")
    {
      $data = lgsl_query_ten($ip, $port, $game, $request);
    }    

//---------------------------------------------------------+

    if ($request == "info")
    {
      if (!is_array($data) || !trim($data['hostname']))
      {
        unset($data);
        $data['status']     = FALSE;
        $data['players']    = 0;
        $data['maxplayers'] = 0;
      }
      else
      {
        $data['status']     = TRUE;
        $data['gamemod']    = str_replace(" ", "", $data['gamemod']); // REMOVE EXTRA SPACING FOR THE GAMEMOD
        $data['gamemod']    = trim(strtolower($data['gamemod']));     // LOWERCASE AND TRIM
        $data['mapname']    = trim(strtolower($data['mapname']));     // LOWERCASE AND TRIM
        $data['players']    = intval($data['players']);               // MAKE SURE PLAYER NUMBER IS NUMERIC
        $data['maxplayers'] = intval($data['maxplayers']);            // MAKE SURE PLAYER NUMBER IS NUMERIC

        if (!trim($data['gamemod']))                  { $data['gamemod']  = $game;     } // GAME IS THE MOD IF NOT SET
        if (!$data['mapname'])                        { $data['mapname']  = "no map";  } // SOMETIMES THE MAP IS NOT SET
        if (!trim($data['password']))                 { $data['password'] = FALSE;     } // CONVERT EMPTY PASSWORDS
        if (strtolower($data['password']) == "false") { $data['password'] = FALSE;     } // CONVERT TEXT FALSE
        if (strtolower($data['password']) == "true")  { $data['password'] = TRUE;      } // CONVERT TEXT TRUE
      }

      $data['ip']       = $ip;   // VALUES
      $data['port']     = $port; // ALWAYS
      $data['gametype'] = $game; // SET
    }

    return $data;

//---------------------------------------------------------+    
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_query_one($ip, $port, $game, $request)
  {
//---------------------------------------------------------+

    $fp = @fsockopen("udp://$ip", $port, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // RETURN AS CONNECTION WAS REFUSED
    
    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS

//---------------------------------------------------------+

    if (($request == "settings" || $request == "players") && $game != "halflifeold")
    {
      $challenge_code = "\xFF\xFF\xFF\xFF\x57"; // CODE NEEDED FOR PLAYERS AND SETTINGS

      fwrite($fp, $challenge_code);

      $buffer = fread($fp, 4096);
      
      if (!trim($buffer)) { fclose($fp); return FALSE; }
    
      $challenge_code = substr($buffer, 5, 4);
    }
    
//---------------------------------------------------------+

    if ($game == "halflifeold")
    {
      if ($request == "info")     { $challenge = "\xFF\xFF\xFF\xFFdetails\x00"; }
      if ($request == "players")  { $challenge = "\xFF\xFF\xFF\xFFplayers\x00"; }
      if ($request == "settings") { $challenge = "\xFF\xFF\xFF\xFFrules\x00";   }
    }
    else
    {
      if ($request == "info")     { $challenge = "\xFF\xFF\xFF\xFFTSource Engine Query\x00"; }
      if ($request == "players")  { $challenge = "\xFF\xFF\xFF\xFFU".$challenge_code;        }
      if ($request == "settings") { $challenge = "\xFF\xFF\xFF\xFFV".$challenge_code;        }
    }

//---------------------------------------------------------+

    fwrite($fp, $challenge);

    $buffer = fread($fp, 4096);
    
    if (!$buffer) { fclose($fp); return FALSE; }       // IF BUFFER EMPTY RETURN
    
    if ($request == "settings")
    {
      $second_packet = fread($fp, 4096);

      if (strlen($second_packet) > 0)
      {
        $reverse_check = dechex(ord($buffer[8]));      // WORKS BUT MUST BE A CLEANER METHOD
        
        if ($reverse_check[0] == "1")
        {
          $tmp           = $buffer;                    // SWAP THE PACKETS AROUND 
          $buffer        = $second_packet;
          $second_packet = $tmp;
        }                 

        $buffer        = substr($buffer, 13);          // REMOVE LONG PACKET HEADER
        $second_packet = substr($second_packet, 9);    // REMOVE SECOND PACKET HEADER
        $buffer        = trim($buffer.$second_packet); // JOIN PACKETS AND TRIM
      }
      else
      {
        $buffer = trim(substr($buffer, 4)); // REMOVE SINGLE PACKET HEADER AND TRIM
      }
    }
    else
    {
      $buffer = trim(substr($buffer, 4)); // REMOVE SINGLE PACKET HEADER AND TRIM
    }

    fclose($fp); // CLOSE CONNECTION;

    if (!trim($buffer)) { return FALSE; } // IF BUFFER EMPTY RETURN
   
//---------------------------------------------------------+

    if ($request == "info")
    {
      unset($data);

      $tmp = explode("\x00", $buffer);

      $place = strlen($tmp[0].$tmp[1].$tmp[2].$tmp[3].$tmp[4]) + 5;
      
      $data['gamemod']        = $tmp[3];
      $data['hostname']       = $tmp[1];
      $data['mapname']        = $tmp[2];
      $data['players']        = ord($buffer[$place]);
      $data['maxplayers']     = ord($buffer[$place + 1]);
      $data['password']       = ord($buffer[$place + 5]);

//--- NONSTANDARD INFORMATION ----------------------------+
      $data['datatype']       = $buffer[0];               // m for steam info
      $data['version']        = ord($buffer[$place + 2]); // Network Version
      $data['description']    = $tmp[4];
      $data['server_type']    = $buffer[$place + 3];      // D edicated or L isten
      $data['server_os']      = $buffer[$place + 4];      // W indows or L inux
      $data['server_secure']  = ord($tmp[14]);            // VAC
      $data['server_bots']    = ord($tmp[15]);            // Number of Bots
//--------------------------------------------------------+

      return $data;  // RETURN INFO
    }

//---------------------------------------------------------+

    if ($request == "players")
    {
      // $buffer[0]      = datatype = D for steam players
      // ord($buffer[1]) = number of rules returned
    
      $player_number = 0;
      $position = 2;                                              // START POINT
    
      do
      { 
        $player_number++;                                         // INCREMENT PLAYER NUMBER

        $player[$player_number]['id'] = ord($buffer[$position]);
        $position ++;                                             // GET PLAYER GAME ID

        while($buffer[$position] != "\x00" && $position < 4000)   // NAME LOOP WITH 4000 CHARACTER TIMEOUT
        {
          $player[$player_number]['name'] .= $buffer[$position];  // COLLECT PLAYER NAME
          $position ++;
        }

        $player[$player_number]['score'] = (ord($buffer[$position + 1]))
                                         + (ord($buffer[$position + 2]) * 256)
                                         + (ord($buffer[$position + 3]) * 65536)
                                         + (ord($buffer[$position + 4]) * 16777216);

        if ($player[$player_number]['score'] > 2147483648) { $player[$player_number]['score'] -= 4294967296; }  // NEGATIVE SCORES ( -1 )

        $time = substr($buffer, $position + 5, 4);                // PLAYER TIME IN BYTES
        if (strlen($time) < 4) { return FALSE; }                  // CHECK FOR MISSING BYTES
        list(,$time) = unpack("f", $time);                        // CONVERT BYTES TO DECIMAL
        $time = mktime(0, 0, $time);                              // CONVERT DECIMAL TO UNIX TIMESTAMP
        $player[$player_number]['time'] = date("H:i:s", $time);   // CONVERT TIMESTAMP TO HUMAN READABLE TIME

        $position += 9;
      }
      while ($position < strlen($buffer));                        // REPEAT UNTIL THE END OF THE BUFFER

      return $player;
    }

//---------------------------------------------------------+

    if ($request == "settings")
    {
      // $buffer[0]      = datatype = E for steam rules
      // ord($buffer[1]) = number of rules returned
     
      $tmp     = substr($buffer, 2); // REMOVE BEGINNING DATA BYTES
      $rawdata = explode("\x00", $tmp);    
    
      for($i=1; $i<count($rawdata); $i=$i+2)
      {
        $rawdata[$i] = strtolower($rawdata[$i]);  // MAKE ARRAY KEYS LOWERCASE
        $setting[$rawdata[$i]] = $rawdata[$i+1];  // LOAD DATA IN AN ARRAY
      }

      return $setting;  // RETURN INFO
    }

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_query_two($ip, $port, $game, $request)
  {
//---------------------------------------------------------+

    if ($game == "mohq3")
    {
      $challenge = "\xFF\xFF\xFF\xFF\x02getstatus";
    }
    elseif ($game == "quake2")
    {
      $challenge = "\xFF\xFF\xFF\xFFstatus";
    }
    elseif ($game == "warsow")
    {
      $challenge = "\xFF\xFF\xFF\xFFgetinfo";
    }
    else
    {
      $challenge = "\xFF\xFF\xFF\xFFgetstatus";
    }

//---------------------------------------------------------+

    $fp = @fsockopen("udp://$ip", $port, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // RETURN AS CONNECTION WAS REFUSED

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS

    fwrite($fp, $challenge);

    $buffer = fread($fp, 4096);
    
    fclose($fp); // CLOSE CONNECTION;

    if (!$buffer) { return FALSE; } // IF BUFFER EMPTY RETURN

//---------------------------------------------------------+

    $rawdata = explode("\n", $buffer);     // SPLIT HEADER/INFO/PLAYERS/FOOTER
    
    array_pop($rawdata);                   // REMOVE FOOTER WHICH IS EITHER NULL OR "\challenge\"

    $rawitem = explode("\\", $rawdata[1]); // SPLIT SETTING STRING INTO ITEMS
    
    foreach ($rawitem as $key => $value)
    {
      if (!($key % 2)) { continue; }                                      // SKIP EVEN ITEMS CONTAINING THE VALUES

      $value             = strtolower($value);                            // MAKE KEY LOWERCASE
      $value             = preg_replace("/\^./", "", $value);             // REMOVE COLORCODES FROM KEY
      $rawitem[$key + 1] = preg_replace("/\^./", "", $rawitem[$key + 1]); // REMOVE COLORCODES FROM VALUE

      $setting[$value]   = $rawitem[$key + 1];
    }

    if ($request == "settings") { return $setting;  } // RETURN SETTINGS

//---------------------------------------------------------+

    $data['gamemod']    = $setting['gamename'];
    $data['hostname']   = $setting['sv_hostname'];
    $data['mapname']    = $setting['mapname'];
    $data['players']    = $rawdata[2] ? count($rawdata) - 2 : 0; // CHECK FOR 1ST PLAYER AS EMPTY ARRAYS COUNT AS 1
    $data['maxplayers'] = $setting['sv_maxclients'];
    $data['password']   = $setting['g_needpass'];

    if (!$data['hostname'])            { $data['hostname']   = $setting['hostname'];   } // HOSTNAME ALTERNATIVE
    if (isset($setting['pswrd']))      { $data['password']   = $setting['pswrd'];      } // CALL OF DUTY
    if (isset($setting['needpass']))   { $data['password']   = $setting['needpass'];   } // QUAKE2
    if (isset($setting['maxclients'])) { $data['maxplayers'] = $setting['maxclients']; } // QUAKE2

    if ($request == "info") { return $data; } // RETURN INFO

//---------------------------------------------------------+

    array_shift($rawdata); // REMOVE HEADER
    array_shift($rawdata); // REMOVE SETTING
    
    foreach ($rawdata as $key => $value)
    {
      if (!$value) { continue; }

      if ($game == "warsow") // WARSOW INCLUDES TEAMS
      {
        preg_match("/(.*) (.*) \"(.*)\" (.*)/", $value, $match);
        
        $player[$key + 1]['score']  = $match[1];
        $player[$key + 1]['ping']   = $match[2];
        $player[$key + 1]['name']   = $match[3];	
        $player[$key + 1]['team']   = $match[4];
      }
      elseif ($game == "sof2") // SOF INCLUDES DEATHS
      {
        preg_match("/(.*) (.*) (.*) \"(.*)\"/", $value, $match);
        
        $player[$key + 1]['score']  = $match[1];
        $player[$key + 1]['ping']   = $match[2];
        $player[$key + 1]['deaths'] = $match[3];	
        $player[$key + 1]['name']   = $match[4];
      }
      elseif ($game == "mohq3")  // MOH JUST RETURNS PING
      {
        preg_match("/(.*) \"(.*)\"/", $value, $match);
        
        $player[$key + 1]['ping']   = $match[1];
        $player[$key + 1]['name']   = $match[2];
      }
      else
      {
        preg_match("/(.*) (.*) \"(.*)\"/", $value, $match);

        $player[$key + 1]['score']  = $match[1];
        $player[$key + 1]['ping']   = $match[2];
        $player[$key + 1]['name']   = $match[3];	
      }

      $player[$key + 1]['name'] = preg_replace("/\^./", "", $player[$key + 1]['name']); // REMOVE COLORCODES
    }

    if ($request == "players") { return $player; } // RETURN PLAYERS

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_query_three($ip, $port, $queryport, $game, $request)
  {
//---------------------------------------------------------+

    if ($request == "info" || $request == "settings") { $challenge = "\\basic\\\\info\\\\rules\\"; }
    if ($request == "players")                        { $challenge = "\\players\\";                }
   
//---------------------------------------------------------+

    $fp = @fsockopen("udp://$ip", $queryport, $errno, $errstr, 1);
    
    if (!$fp) { return FALSE; } // RETURN AS CONNECTION WAS REFUSED
    
    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);    // SET TIMEOUT FOR OFFLINE SERVERS

    fwrite($fp, $challenge);

//---------------------------------------------------------+

    $packet1 = fread($fp, 2048);                                           // GET FIRST PACKET
    if (!trim($packet1)) { fclose($fp); return FALSE; }                    // DO NOT CONTINUE IF EMPTY
    
    preg_match_all("/(queryid\\\(.*)\.1|final\\\)/U", $packet1, $matches); // SCAN RETURNED DATA
    if (count(array_unique($matches[1])) < 2)                              // DATA INCOMPLETE
    {
      $packet2 = fread($fp, 2048);                                         // GET SECOND PACKET
      if (!trim($packet2)) { fclose($fp); return FALSE; }                  // DO NOT CONTINUE IF EMPTY

      preg_match_all("/(queryid\\\(.*)\.1|queryid\\\(.*)\.2|final\\\)/U", $packet1.$packet2, $matches);
      if (count(array_unique($matches[1])) < 3)                            // INCOMPLETE DATA
      {
        $packet3 = fread($fp, 2048);                                       // GET THIRD PACKET
      }
    }
 
    fclose($fp); // CLOSE CONNECTION;

//---------------------------------------------------------+

    $buffer = $packet1.$packet2.$packet3;                                  // JOIN PACKETS - ORDER SHOULD NOT MATTER
    $rawdata = explode("\\", $buffer);                                     // SEPERATE BY BACKSLASH

//---------------------------------------------------------+

    if ($request == "info" || $request == "settings")
    {
      for($i=1; $i<count($rawdata); $i=$i+2)
      {
        $rawdata[$i] = strtolower("$rawdata[$i]");                         // MAKE ARRAY KEY LOWERCASE
        
        if ($rawdata[$i] == "")        { continue; }                       // SKIP UNWANTED DATA
        if ($rawdata[$i] == "final")   { continue; }
        if ($rawdata[$i] == "queryid") { continue; }
        $tmp = explode("_", $rawdata[$i], 2);                              // SKIP PLAYER DATA THAT GAMES ( AARMY )
        if (is_numeric($tmp[1]))       { continue; }                       // SEND REGARDLESS OF THE CHALLENGE

        $setting[$rawdata[$i]] = $rawdata[$i+1];                           // LOAD DATA IN AN ARRAY
      }
      
      if ($request == "settings") { return $setting; }                     // RETURN SETTINGS

//---------------------------------------------------------+

      $data['gamemod'] = $setting['gamename'];
      if (!$data['gamemod'] || $game == "bf1942") { $data['gamemod'] = $setting['gameid']; } // GAMEMOD ALTERNATIVE

      $data['hostname'] = $setting['sv_hostname'];
      if (!$data['hostname']) { $data['hostname'] = $setting['hostname']; }                  // HOSTNAME ALTERNATIVE
      
      if ($game == "swat4") { $data['hostname'] = preg_replace("/\[c=......\]/iU", "", $data['hostname']); } // REMOVE COLORCODES FROM HOSTNAME

      $data['mapname']    = $setting['mapname'];
      $data['players']    = $setting['numplayers'];
      $data['maxplayers'] = $setting['maxplayers'];
      $data['password']   = $setting['password'];
      
      return $data;  // RETURN INFO
    }

//---------------------------------------------------------+

    if ($request == "players")
    {
      if ($game == "cnc") { $player[1]['name'] = "This Game Does Not Provide Player Information"; return $player; }
      
      for($i=1; $i<count($rawdata); $i++)
      {
        $buffer = explode("_", $rawdata[$i], 2);                      // SEPERATE KEY AND PLAYERID

        if (count($buffer) != 2)      { continue; }                   // NO SINGLE UNDERSCORE
        if (!is_numeric($buffer[1]))  { continue; }                   // NO PLAYER ID
        if ($rawdata[$i+1] == "")     { continue; }                   // NO VALUE
        if ($buffer[0] == "teamname") { continue; }                   // IGNORE BF1942 FIELD

        $buffer[0] = strtolower($buffer[0]);                          // MAKE KEY LOWERCASE
        
        if ($buffer[0] == "player")     { $buffer[0] = "name";  }     // CONVERT TO LGSL STANDARD
        if ($buffer[0] == "playername") { $buffer[0] = "name";  }     // CONVERT TO LGSL STANDARD
        if ($buffer[0] == "frags")      { $buffer[0] = "score"; }     // CONVERT TO LGSL STANDARD
        if ($buffer[0] == "ngsecret")   { $buffer[0] = "stats"; }     // CONVERT TO LGSL STANDARD

        $player[$buffer[1]+1][$buffer[0]] = $rawdata[$i+1];           // LOAD DATA INTO ARRAY
      }

      return $player;  // RETURN PLAYERS
    }

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_query_four($ip, $port, $queryport, $game, $request)
  {
//---------------------------------------------------------+

    $challenge = "REPORT";

    $fp = @fsockopen("udp://$ip", $queryport, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // RETURN AS CONNECTION WAS REFUSED

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS

    fwrite($fp, $challenge);

    $tmp = fread($fp, 4096);

    fclose($fp); // CLOSE CONNECTION;

    $tmp = trim($tmp);  // TRIM WHITE SPACE FROM PACKET

    if (!$tmp) { return FALSE; } // IF BUFFER EMPTY RETURN

//---------------------------------------------------------+
  
    $lgsl_ravenshield_codes = array(
    "P1" => "queryport",
    "E1" => "mapname",
    "I1" => "hostname",
    "F1" => "maptype",
    "A1" => "maxplayers",
    "G1" => "password",
    "H1" => "dedicated",
    "L1" => "playername",
    "M1" => "playertime",
    "N1" => "playerping",
    "O1" => "playerscore",
    "B1" => "players",
    "Q1" => "rounds",
    "R1" => "roundtime",
    "S1" => "bombtimer",
    "T1" => "bomb",
    "W1" => "allowteammatenames",
    "X1" => "iserver",
    "Y1" => "friendlyfire",
    "Z1" => "autobalance",
    "A2" => "tkpenalty",
    "D2" => "version",
    "B2" => "allowradar",
    "E2" => "lid",
    "F2" => "gid",
    "G2" => "hostport",
    "H2" => "terroristcount",
    "I2" => "aibackup",
    "J2" => "rotatemaponsuccess",
    "K2" => "forcefirstpersonweapons",
    "L2" => "gamename",
    "L3" => "punkbuster",
    "K1" => "mapcycle",
    "J1" => "mapcycletypes"
    );

//---------------------------------------------------------+

    $rawdata = explode("\xB6", $tmp);     // EXPLODE BY NEWLINE
 
    for($i=0; $i<count($rawdata); $i++)
    {
      $lgsl_setting_code = substr($rawdata[$i], 0, 2);
      $lgsl_setting_code = $lgsl_ravenshield_codes[$lgsl_setting_code];
      $rawdata[$i] = substr($rawdata[$i], 3);
      $setting[$lgsl_setting_code] = trim($rawdata[$i]);  // LOAD INTO ARRAY AND TRIM BLANK SPACING
    }

//---------------------------------------------------------+

    if ($request == "settings")
    {
      unset($setting['']); // REMOVE BLANK AND PLAYER DATA
      unset($setting['playername']); 
      unset($setting['playertime']);
      unset($setting['playerping']);
      unset($setting['playerscore']);
      
      $setting['mapcycle'] = str_replace("/"," ", $setting['mapcycle']); // BREAK UP LIST SO THAT IT WRAPS
      $setting['mapcycletypes'] = str_replace("/"," ", $setting['mapcycletypes']);


      return $setting;  // RETURN SETTINGS
    }

//---------------------------------------------------------+

    if ($request == "info")
    {
      unset($data);

      $data['gamemod']    = $setting['gamename'];
      $data['hostname']   = $setting['hostname'];
      $data['mapname']    = $setting['mapname'];
      $data['players']    = $setting['players'];
      $data['maxplayers'] = $setting['maxplayers'];
      $data['password']   = $setting['password'];
      
      return $data;  // RETURN INFO
    }

//---------------------------------------------------------+

    if ($request == "players")
    {
      $playername  = explode("/", $setting['playername']);  // EXPLODE BY FORWARDSLASH
      $playertime  = explode("/", $setting['playertime']);  
      $playerping  = explode("/", $setting['playerping']);  
      $playerscore = explode("/", $setting['playerscore']);
      
      for($i=1; $i<count($playername); $i++)
      {
        $player[$i]['name']   = $playername[$i];
        $player[$i]['time']   = $playertime[$i];
        $player[$i]['ping']   = $playerping[$i];
        $player[$i]['score']  = $playerscore[$i];
      }

      return $player;  // RETURN PLAYERS
    }

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_query_five($ip, $port, $game, $request)
  {
//---------------------------------------------------------+

    $fp = @fsockopen("udp://$ip", $port, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // RETURN AS CONNECTION WAS REFUSED

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS

//---------------------------------------------------------+

    if ($request == "settings" || $request == "players")
    {
      $challenge_code = "\xFF\xFF\xFF\xFF\x57"; // CODE NEEDED FOR PLAYERS AND SETTINGS

      fwrite($fp, $challenge_code);

      $buffer = fread($fp, 4096);

      if (!trim($buffer)) { fclose($fp); return FALSE; }

      $challenge_code = substr($buffer, 5, 4);
    }

//---------------------------------------------------------+
    
    if ($request == "info")     { $challenge = "\xFF\xFF\xFF\xFFTSource Engine Query\x00"; }
    if ($request == "players")  { $challenge = "\xFF\xFF\xFF\xFFU".$challenge_code;        }
    if ($request == "settings") { $challenge = "\xFF\xFF\xFF\xFFV".$challenge_code;        }

    fwrite($fp, $challenge);

    $buffer = fread($fp, 4096);
    
    if (!$buffer) { fclose($fp); return FALSE; } // IF BUFFER EMPTY RETURN
    
    if ($request == "settings")
    {
      $second_packet = fread($fp, 4096);

      if (strlen($second_packet) > 0)
      {
        $reverse_check = dechex(ord($buffer[8]));      // WORKS BUT MUST BE A CLEANER METHOD
        
        if ($reverse_check[0] == "1")
        {
          $tmp           = $buffer;                    // SWAP THE PACKETS AROUND 
          $buffer        = $second_packet;
          $second_packet = $tmp;
        }                 

        $buffer        = substr($buffer, 13);          // REMOVE LONG PACKET HEADER
        $second_packet = substr($second_packet, 9);    // REMOVE SECOND PACKET HEADER
        $buffer        = trim($buffer.$second_packet); // JOIN PACKETS AND TRIM
      }
      else
      {
        $buffer = trim(substr($buffer, 4)); // REMOVE SINGLE PACKET HEADER AND TRIM
      }
    }
    else
    {
      $buffer = trim(substr($buffer, 4)); // REMOVE SINGLE PACKET HEADER AND TRIM
    }

    fclose($fp); // CLOSE CONNECTION;

    if (!trim($buffer)) { return FALSE; } // IF BUFFER EMPTY RETURN

//---------------------------------------------------------+

    if ($request == "info")
    {
      $tmp = substr($buffer, 2); // REMOVE BEGINNING DATA BYTES
      $tmp = explode("\x00", $tmp);

      $place = strlen($tmp[0].$tmp[1].$tmp[2].$tmp[3]) + 8;

      $data['gamemod']       = $tmp[2];
      $data['hostname']      = $tmp[0];
      $data['mapname']       = $tmp[1];
      $data['players']       = ord($buffer[$place]);
      $data['maxplayers']    = ord($buffer[$place + 1]);
      $data['password']      = ord($buffer[$place + 5]);

//--- NONSTANDARD INFORMATION ----------------------------+
      $data['datatype']      = $buffer[0];               // I for source info
      $data['version']       = ord($buffer[1]);          // Network Version
      $data['description']   = $tmp[3];
      $data['botplayers']    = ord($buffer[$place + 2]);
      $data['server_type']   = $buffer[$place + 3];      // D edicated or L isten
      $data['server_os']     = $buffer[$place + 4];      // W indows or L inux
      $data['server_bots']   = ord($buffer[$place + 2]); // Number of Bots
      $data['server_secure'] = ord($buffer[$place + 6]); // VAC
//--------------------------------------------------------+

      return $data;
    }

//---------------------------------------------------------+

    if ($request == "players")
    {
      // $buffer[0]      = datatype = D for source players
      // ord($buffer[1]) = number of players returned

      $player_number = 0;
      $position = 2;                                             // START POINT
    
      do
      { 
        $player_number++;                                        // INCREMENT PLAYER NUMBER

        $player[$player_number]['id'] = ord($buffer[$position]);
        $position ++;                                            // GET PLAYER GAME ID

        while($buffer[$position] != "\x00" && $position < 4000)  // NAME LOOP WITH 4000 CHARACTER TIMEOUT
        {
          $player[$player_number]['name'] .= $buffer[$position]; // COLLECT PLAYER NAME
          $position ++;
        }

        $player[$player_number]['score'] = (ord($buffer[$position + 1]))
                                         + (ord($buffer[$position + 2]) * 256)
                                         + (ord($buffer[$position + 3]) * 65536)
                                         + (ord($buffer[$position + 4]) * 16777216);

        if ($player[$player_number]['score'] > 2147483648) { $player[$player_number]['score'] -= 4294967296; }  // NEGATIVE SCORES ( -1 )

        $time = substr($buffer, $position + 5, 4);               // PLAYER TIME IN BYTES
        if (strlen($time) < 4) { return FALSE; }                 // CHECK FOR MISSING BYTES
        list(,$time) = unpack("f", $time);                       // CONVERT BYTES TO DECIMAL
        $time = mktime(0, 0, $time);                             // CONVERT DECIMAL TO UNIX TIMESTAMP
        $player[$player_number]['time'] = date("H:i:s", $time);  // CONVERT TIMESTAMP TO HUMAN READABLE TIME

        $position += 9;
      }
      while ($position < strlen($buffer));                       // REPEAT UNTIL THE END OF THE BUFFER
 
      return $player;
    }

//---------------------------------------------------------+

    if ($request == "settings")
    {
      // $buffer[0]      = datatype = E for source rules
      // ord($buffer[1]) = number of rules returned

      $tmp     = substr($buffer, 2); // REMOVE BEGINNING DATA BYTES
      $rawdata = explode("\x00", $tmp);
      
      for($i=1; $i<count($rawdata); $i=$i+2)
      {
        $rawdata[$i] = strtolower($rawdata[$i]);  // MAKE ARRAY KEYS LOWERCASE
        $setting[$rawdata[$i]] = $rawdata[$i+1];  // LOAD DATA IN AN ARRAY
      }
      
      return $setting;
    }

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+

  function lgsl_query_six($ip, $port, $queryport, $game, $request)
  {

//---------------------------------------------------------+

    $fp = @fsockopen("udp://$ip", $queryport, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // RETURN AS CONNECTION WAS REFUSED

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS

//---------------------------------------------------------+

    if ($game == "bf2142" || $game == "stalker")
    {
      $challenge_code = "\xFE\xFD\x09\x21\x21\x21\x21\xFF\xFF\xFF\x01"; // REQUEST CODE

      fwrite($fp, $challenge_code);

      $challenge_packet = fread($fp, 1400);
    
      if (!trim($challenge_packet)) { fclose($fp); return FALSE; }

      $challenge_code = substr($challenge_packet, 5, -1); // REMOVE PACKET HEADER AND TRAILING NULL CHARACTER

      // IF CODE IS RETURNED CONVERT DECIMAL |TO| HEX AS 8 CHARACTER STRING |TO| 4 PAIRS OF HEX |TO| 4 PAIRS OF DECIMAL |TO| 4 PAIRS OF ASCII

	    $challenge_code = $challenge_code ? chr($challenge_code >> 24).chr($challenge_code >> 16).chr($challenge_code >> 8).chr($challenge_code >> 0) : "";
	  }

    $challenge  = "\xFE\xFD\x00\x21\x21\x21\x21".$challenge_code."\xFF\xFF\xFF\x01";
	
    fwrite($fp, $challenge);

//---------------------------------------------------------+

    $packet_check = "/(hostname\\x00|player_\\x00|score_\\x00|ping_\\x00|deaths_\\x00|pid_\\x00|skill_\\x00|team_\\x00|team_t\\x00|score_t\\x00)/U";

    if     ($game == "graw")    { $packet_check_expected = 3;  }              // GHOST RECON
    elseif ($game == "stalker") { $packet_check_expected = 6;  }              // S.T.A.L.K.E.R.
    else                        { $packet_check_expected = 10; }              // BF2 AND BF2142

//---------------------------------------------------------+

    $packet1 = fread($fp, 1400);                                              // GET FIRST PACKET
    if (!trim($packet1)) { fclose($fp); return FALSE; }                       // DO NOT CONTINUE IF EMPTY

    preg_match_all($packet_check, $packet1, $matches);                        // SCAN RETURNED DATA
    if (count(array_unique($matches[1])) < $packet_check_expected)            // DATA INCOMPLETE
    {
      $packet2 = fread($fp, 1400);                                            // GET SECOND PACKET
      if (!trim($packet2)) { fclose($fp); return FALSE; }                     // DO NOT CONTINUE IF EMPTY

      preg_match_all($packet_check, $packet1.$packet2, $matches);             // SCAN RETURNED DATA
      if (count(array_unique($matches[1])) < $packet_check_expected)          // DATA INCOMPLETE
      {
        $packet3 = fread($fp, 1400);                                          // GET THIRD PACKET
        if (!trim($packet3)) { fclose($fp); return FALSE; }                   // DO NOT CONTINUE IF EMPTY

        preg_match_all($packet_check, $packet1.$packet2.$packet3, $matches);  // SCAN RETURNED DATA
        if (count(array_unique($matches[1])) < $packet_check_expected)        // DATA INCOMPLETE
        {
          fclose($fp); return FALSE;                                          // DO NOT CONTINUE
        }
      }
    }

    fclose($fp); // CLOSE CONNECTION;

//---------------------------------------------------------+

    // SORT PACKETS THAT ARE SENT IN THE WRONG ORDER

    if ( strstr($packet3, "hostname\x00") ) { $tmp = $packet3; $packet3 = $packet1; $packet1 = $tmp; }
    if ( strstr($packet2, "hostname\x00") ) { $tmp = $packet2; $packet2 = $packet1; $packet1 = $tmp; }
    if ( strstr($packet2, "score_t") )      { $tmp = $packet3; $packet3 = $packet2; $packet2 = $tmp; }
    
//---------------------------------------------------------+

    // REMOVE INCOMPLETE FIELDS FROM THE END OF MULTI-PACKETS

    if ($packet2 && substr($packet1, -1) != "\x00\x00")
    {
      $tmp = explode("\x00", $packet1); // EXPLODE INTO BITS
      array_pop($tmp);                  // REMOVE x00
      array_pop($tmp);                  // REMOVE INCOMPLETE FIELD
      $tmp = implode("\x00", $tmp);     // RE-JOIN BITS
      $tmp .= "\x00\x00";               // ADD END x00x00
      $packet1 = $tmp;                  // SET PACKET
    }

    if ($packet3 && substr($packet2, -2) != "\x00\x00")
    {
      $tmp = explode("\x00", $packet2); // EXPLODE INTO BITS
      array_pop($tmp);                  // REMOVE x00
      array_pop($tmp);                  // REMOVE INCOMPLETE FIELD
      $tmp = implode("\x00", $tmp);     // RE-JOIN BITS
      $tmp .= "\x00\x00";               // ADD END x00x00
      $packet2 = $tmp;                  // SET PACKET
    }

//---------------------------------------------------------+
    
    $buffer = $packet1.$packet2.$packet3;                              // JOIN PACKETS
    $buffer = preg_replace("/\\x00\\x00....splitnum/U", "", $buffer);  // REMOVE MULTI-PACKET HEADER
    
//---------------------------------------------------------+

    $server = substr($buffer, 16);
    $server = explode("\x01", $server, 2);
    $server = explode("\x00", $server[0]);

    for($i=0; $i<count($server); $i=$i+2)
    {
      if (!trim($server[$i])) { continue; }

      $server[$i] = strtolower("$server[$i]"); // MAKE ARRAY KEY LOWERCASE
      $setting[$server[$i]] = $server[$i+1];   // LOAD DATA IN AN ARRAY
    }

    if ($request == "settings") { return $setting; }  // RETURN SETTINGS

//---------------------------------------------------------+

    if ($request == "info")
    {
      unset($data);

      $data['gamemod']    = $setting['gamename'];
      $data['hostname']   = $setting['hostname'];
      $data['mapname']    = $setting['mapname'];
      $data['players']    = $setting['numplayers'];
      $data['maxplayers'] = $setting['maxplayers'];
      $data['password']   = $setting['password'];

      return $data;  // RETURN INFO
    }
    
//---------------------------------------------------------+    

    if ($request == "players")
    {
      $buffer = explode("\x01", $buffer, 2);
      $buffer = $buffer[1]; // REMOVE SERVER INFO FROM PLAYER INFO FOR BETTER MATCHING

      if (strpos($buffer, "player_\x00\x00\x00") !== FALSE) { return FALSE; } // NO PLAYERS

      $name     = preg_match_all("/player_\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $name     = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      $score    = preg_match_all( "/score_\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $score    = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      $ping     = preg_match_all(  "/ping_\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $ping     = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      $deaths   = preg_match_all("/deaths_\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $deaths   = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      $pid      = preg_match_all(   "/pid_\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $pid      = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      $skill    = preg_match_all( "/skill_\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $skill    = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      $team     = preg_match_all(  "/team_\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $team     = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      $teamname = preg_match_all( "/team_t\\x00.(.*)\\x00\\x00/U", $buffer, $match);
      $teamname = $match[1][0] ? explode( "\x00",       $match[1][0]."\x00".$match[1][1]) : "";
      
      foreach ($name as $key => $value)
      {
        if (!$value) { continue; } // IGNORE EMPTY NAMES

        $player_id++;              // INCREMENT PLAYER ID

        if ($name)               { $player[$player_id]['name']   = $name[$key];              }
        if ($score)              { $player[$player_id]['score']  = $score[$key];             }
        if ($ping)               { $player[$player_id]['ping']   = $ping[$key];              }
        if ($deaths)             { $player[$player_id]['deaths'] = $deaths[$key];            }
        if ($pid)                { $player[$player_id]['pid']    = $pid[$key];               }
        if ($skill)              { $player[$player_id]['skill']  = $skill[$key];             }
        if ($team && !$teamname) { $player[$player_id]['team']   = $team[$key];              }
        if ($team && $teamname)  { $player[$player_id]['team']   = $teamname[$team[$key]-1]; } // TEAM (1/2) TEAMNAME (0/1)
      }
      
      return $player; // RETURN PLAYER
    }

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+

  function lgsl_query_seven($ip, $port, $game, $request)
  {
//---------------------------------------------------------+

    $challenge = "\xFF\xFF\xFF\xFFstatus\x00";

    $fp = @fsockopen("udp://$ip", $port, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // IF BUFFER EMPTY RETURN

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS
     
    fwrite($fp, $challenge);
      
    $buffer = fread($fp, 4096);
      
    fclose($fp);
 
    if (!$buffer) { return FALSE; }    // IF BUFFER EMPTY RETURN
     
//---------------------------------------------------------+

    $buffer = substr($buffer, 6);      // REMOVE PACKET HEADER
    $buffer = explode("\n", $buffer);  // EXPLODE BY ALL BY NEWLINE
     
//---------------------------------------------------------+

    $tmp = explode("\\", $buffer[0]);  // EXPLODE BY SETTINGS BY BACKSLASH

    for($i=0; $i<count($tmp); $i=$i+2)
    {
      if (!trim($tmp[$i])) { continue; }

      $tmp[$i] = strtolower($tmp[$i]); // MAKE ARRAY KEY LOWERCASE
      $setting[$tmp[$i]] = $tmp[$i+1]; // LOAD DATA IN AN ARRAY
    }
      
    if ($request == "settings") { return $setting; }  // RETURN SETTINGS

//---------------------------------------------------------+

    for($i=1; $i<=count($buffer); $i++)
    {
      if (!trim($buffer[$i])) { continue; }

      preg_match("/(.*) (.*) (.*) (.*) \"(.*)\" \"(.*)\" (.*) (.*)/U", $buffer[$i], $match);
      
      $player[$i]['pid']         = $match[1];
      $player[$i]['score']       = $match[2];
      $player[$i]['time']        = $match[3];	
      $player[$i]['ping']        = $match[4];
      $player[$i]['name']        = $match[5];
      $player[$i]['skin']        = $match[6];
      $player[$i]['skin_top']    = $match[7];
      $player[$i]['skin_bottom'] = $match[8];

//---------------------------------------------------------+

      // TRY TO REMOVE COLORCODES AND SYMBOLS FROM NAMES

      $name_length = strlen($player[$i]['name']);
      
      for($char_pos=0; $char_pos<$name_length; $char_pos++)
      {
        $char = ord($player[$i]['name'][$char_pos]);
        
        if ($char > 141)
        {
          $player[$i]['name'][$char_pos] = chr($char-128);
        }

        $char = ord($player[$i]['name'][$char_pos]);

        if ($char < 32)
        {
          $player[$i]['name'][$char_pos] = chr($char+30);
        }
      }

//---------------------------------------------------------+

    }

    if ($request == "players") { return $player; }  // RETURN PLAYER

//---------------------------------------------------------+

    $data['gamemod']    = $setting['*gamedir'];
    $data['hostname']   = $setting['hostname'];
    $data['mapname']    = $setting['map'];
    $data['players']    = count($player);
    $data['maxplayers'] = $setting['maxclients'];
    $data['password']   = ($setting['needpass'] > 0 && $setting['needpass'] < 4 ? TRUE:FALSE);
     
    return $data; // DATA IS LAST TO COLLECT NUMBER OF CURRENT PLAYERS

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+

  function lgsl_query_eight($ip, $port, $queryport, $game, $request)
  {
//---------------------------------------------------------+

    $challenge = "s";

    $fp = @fsockopen("udp://$ip", $queryport, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // IF BUFFER EMPTY RETURN

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS
     
    fwrite($fp, $challenge);
      
    $buffer = fread($fp, 4096);
      
    fclose($fp);
 
    if (!$buffer) { return FALSE; } // IF BUFFER EMPTY RETURN

//---------------------------------------------------------+
     
    $buffer = substr($buffer, 4); // REMOVE PACKET HEADER
    
    $buffer = str_replace("\x01\x01", "\x01", $buffer); // FIXES LAST VALUE INTERFERING WITH SPLIT

    $buffer_part = explode("\x01", $buffer, 2); // SEPERATE SETTINGS AND PLAYERS

//---------------------------------------------------------+

    $buffer = $buffer_part[0]; // SET BUFFER TO FIRST PART
     
    $position = 0;

    do
    {
      $rawsetting[] = substr($buffer, $position+1, ord($buffer[$position])-1);

      $position = $position + ord($buffer[$position]);
    }
    while ($position < strlen($buffer));

//---------------------------------------------------------+
      
    $setting['game']       = $rawsetting[0];
    $setting['port']       = $rawsetting[1];
    $setting['hostname']   = $rawsetting[2];
    $setting['mode']       = $rawsetting[3];
    $setting['mapname']   = $rawsetting[4];
    $setting['version']    = $rawsetting[5];
    $setting['password']   = $rawsetting[6];
    $setting['players']    = $rawsetting[7];
    $setting['maxplayers'] = $rawsetting[8];

//---------------------------------------------------------+
  
    for($i=9; $i<=count($rawsetting); $i=$i+2)
    {
      if (!trim($rawsetting[$i])) { continue; }
      
      $rawsetting[$i] = strtolower("$rawsetting[$i]"); // MAKE ARRAY KEY LOWERCASE
      $setting[$rawsetting[$i]] = $rawsetting[$i+1];   // LOAD DATA IN AN ARRAY
    }

    if ($request == "settings") { return $setting; }  // RETURN SETTINGS

//---------------------------------------------------------+

    if ($game == "farcry")     { $setting['hostname'] = preg_replace("/\\$\d/", "", $setting['hostname']); } // REMOVE COLORCODES FROM HOSTNAME
    if ($game == "painkiller") { $setting['hostname'] = preg_replace("/#./", "", $setting['hostname']);    } // REMOVE COLORCODES FROM HOSTNAME

    $data['gamemod']    = $setting['gr_ssmod'];
    $data['hostname']   = $setting['hostname'];
    $data['mapname']    = $setting['mapname'];
    $data['players']    = $setting['players'];
    $data['maxplayers'] = $setting['maxplayers'];
    $data['password']   = $setting['password'];

    if ($request == "info") { return $data; }  // RETURN INFO

//---------------------------------------------------------+

    $buffer = $buffer_part[1]; // SET BUFFER TO SECOND PART

    if (!$buffer[0]) { return FALSE; exit; } // CHECK IF BITWISE CHARACTER EXISTS

//---------------------------------------------------------+

    $player_number = 0;
    $position      = 0;

    do
    {
      unset($field_list); // BUILD LIST OF RETURNED VALUES FOR EACH PLAYER USING BITWISE CHARACTER
      
      if (ord($buffer[$position]) & 1)  { $field_list[] = "name";  }
      if (ord($buffer[$position]) & 2)  { $field_list[] = "team";  }
      if (ord($buffer[$position]) & 4)  { $field_list[] = "skin";  }
      if (ord($buffer[$position]) & 8)  { $field_list[] = "score"; }
      if (ord($buffer[$position]) & 16) { $field_list[] = "ping";  }
      if (ord($buffer[$position]) & 32) { $field_list[] = "time";  }

      $player_number++; // NEXT PLAYER ID
      $position++;      // SKIP BITWISE CHARACTER

      foreach ($field_list as $field)
      {
        $increment = ord($buffer[$position]);                       // READ SIZE CHARACTER

        $field_value = substr($buffer, $position+1, $increment-1);  // READ DATA SKIPPING WITHOUT THE SIZE CHARACTER

        if ($game == "farcry" && $field == "name")     { $field_value = preg_replace("/\\$\d/", "", $field_value); } // REMOVE COLORCODES FROM NAME
        if ($game == "painkiller" && $field == "name") { $field_value = preg_replace("/#./", "", $field_value);    } // REMOVE COLORCODES FROM NAME

        if ($game == "farcry" && $field == "skin")     { $field = "skin_NOTUSED"; } // WORKAROUND TO HIDE FIELDS
        if ($game == "painkiller" && $field == "time") { $field = "time_NOTUSED"; } // THAT ARE ALWAYS BLANK
        if ($game == "painkiller" && $field == "team") { $field = "team_NOTUSED"; } // OR ALWAYS THE SAME

        $player[$player_number][$field] = $field_value;             // SET PLAYER FIELD AND VALUE

        $position += $increment;                                    // MOVE TO THE NEXT FIELD
      }
    }
    while ($position < strlen($buffer));                            // KEEP GOING UNTIL END OF THE PLAYER STRING

    return $player;                                                 // RETURN PLAYER

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+

  function lgsl_query_nine($ip, $port, $queryport, $game, $request)
  {
//---------------------------------------------------------+

    if ($request == "info" || $request == "settings") { $challenge = "\xFE\xFD\x00\x21\x21\x21\x21\xFF\x00\x00\x00"; }
    if ($request == "players")                        { $challenge = "\xFE\xFD\x00\x21\x21\x21\x21\x00\xFF\x00\x00"; }

//---------------------------------------------------------+

    $fp = @fsockopen("udp://$ip", $queryport, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // IF BUFFER EMPTY RETURN

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS
     
    fwrite($fp, $challenge);
      
    $buffer = fread($fp, 4096);

    fclose($fp);
 
    if (!$buffer) { return FALSE; } // IF BUFFER EMPTY RETURN
    
    $buffer = substr($buffer, 5);   // REMOVE PACKET HEADER

//---------------------------------------------------------+

    if ($request == "info" || $request == "settings")
    {
      $rawsetting = explode("\x00",$buffer); // EXPLODE INTO BITS

      for($i=0; $i<count($rawsetting); $i=$i+2)
      {
        if (!trim($rawsetting[$i])) { continue; }
      
        $rawsetting[$i] = strtolower("$rawsetting[$i]"); // MAKE ARRAY KEY LOWERCASE
        $setting[$rawsetting[$i]] = $rawsetting[$i+1];   // LOAD DATA IN AN ARRAY
      }

      if ($game == "vietcong2")
      {
        // [ 13 = Vietnam and RPG Mode 19 1b 99 9b ] [ 55 = Chat and Blind Spectator 5a 5c da dc ]
        // [ 27 = Idle Limit ] [ 18 = Auto Balance ] [ 22 23 = Mounted MG Limit ]
      
        $setting['extinfo_autobalance'] = ( ord($setting['extinfo'][18]) == 2 ? "off" : "on" );
      }

      if ($request == "settings") { return $setting; }  // RETURN SETTINGS
    }

//---------------------------------------------------------+

    if ($request == "info")
    {
      $data['gamemod']                          = $setting['game_id'];      // GAMEMOD BFVIETNAM
      if (!$data['gamemod']) { $data['gamemod'] = $setting['gsgamename']; } // GAMEMOD FEAR
      if (!$data['gamemod']) { $data['gamemod'] = $setting['gamename'];   } // GAMEMOD AARMY

      $data['mapname']    = $setting['mapname'];
      $data['hostname']   = $setting['hostname'];
      $data['players']    = $setting['numplayers'];
      $data['maxplayers'] = $setting['maxplayers'];
      $data['password']   = $setting['password'];

      return $data;  // RETURN INFO
    }

//---------------------------------------------------------+

    if ($request == "players")
    {
      if ($game == "neverwinter" || $game == "neverwinter2" ||$game == "vietcong2" || $game == "nascar2004")
      {
        $player[1][name] = "This Game Does Not Provide Player Information"; return $player;
      }

      $buffer  = substr($buffer, 2, -1);              // REMOVE HEADER BYTE AND FOOTER NULL
      $buffer  = explode("\x00\x00",$buffer, 2);      // SPLIT PLAYER KEYS FROM PLAYER VALUES
      $raw_key = explode("\x00",$buffer[0]);          // SPLIT INTO SINGLE KEYS
      $raw_val = explode("\x00",$buffer[1]);          // SPLIT INTO SINGLE VALUES
      
      foreach ($raw_key as $key => $value)            // SCAN KEYS
      {
        $value = str_replace("_", "", $value);        // REMOVE UNDERSCORE FROM KEYS
        if ($value == "player") { $value = "name"; }  // CONVERT TO LGSL STANDARD
        $raw_key[$key] = $value;                      // SET UPDATED KEY
      }

      $raw_key_total = count($raw_key);               // USED SEVERAL TIMES SO
      $raw_val_total = count($raw_val);               // STORE FOR EFFECIENCY

      if ($raw_key_total < 1)  { return FALSE; }      // RETURN IF NO KEYS
      if ($raw_val_total == 1) { return FALSE; }      // RETURN IF NO PLAYERS
      
      $raw_val_number = 0;                            // MUST BE SET ZERO OTHERWISE YOU GET $raw_val[] INSTEAD OF $raw_val[0] BELOW
      
      do
      {
        $player_number++;                             // NEXT PLAYER ID
        
        for($i=0; $i<$raw_key_total; $i++)            // LOOP THROUGH KEYS
        {
          $player[$player_number][$raw_key[$i]] = $raw_val[$raw_val_number];
          
          $raw_val_number++;                          // NEXT DATA CHUNK
        }
      }
      while ($raw_val_number < $raw_val_total);       // LOOP WHILE THERES STILL UNREAD DATA CHUNKS
      
      return $player;
    }

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+

  function lgsl_query_ten($ip, $port, $game, $request)
  {
//---------------------------------------------------------+

    $challenge = "\xFF\xFFgetInfo";

    $fp = @fsockopen("udp://$ip", $port, $errno, $errstr, 1);

    if (!$fp) { return FALSE; } // IF BUFFER EMPTY RETURN

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS
     
    fwrite($fp, $challenge);
      
    $buffer = fread($fp, 4096);
      
    fclose($fp);
 
    if (!$buffer) { return FALSE; } // IF BUFFER EMPTY RETURN

//---------------------------------------------------------+

    $buffer = substr($buffer, 23);

    $buffer = explode("\x00\x00\x00", $buffer);

    $rawsetting = explode("\x00", $buffer[0]);

    for($i=0; $i<count($rawsetting); $i=$i+2)
    {
      $rawsetting[$i] = strtolower($rawsetting[$i]);                     // MAKE ARRAY KEY LOWERCASE
      $rawsetting[$i] = preg_replace("/\^./", "", $rawsetting[$i]);      // REMOVE COLORCODES FROM KEY
      $rawsetting[$i+1] = preg_replace("/\^./", "", $rawsetting[$i+1]);  // REMOVE COLORCODES FROM VALUE
      $setting[$rawsetting[$i]] = $rawsetting[$i+1];                     // LOAD DATA IN AN ARRAY
    }

    if ($request == "settings") { return $setting;  }  // RETURN SETTINGS

    if ($game == "doom3")
    {
      preg_match_all("/(.)(..)(..)(..)(.*)\\x00/U", $buffer[1], $matches); // DOOM3
    }
    else
    {
      preg_match_all("/(.)(..)(..)(..)(.*)\\x00(.*)\\x00/U", $buffer[1], $matches); // QUAKE4
    }

    for($i=0; $i<count($matches[5]); $i++)
    {
      $player[$i+1]['id']          = ord($matches[1][$i]);
      list(,$player[$i+1]['ping']) = unpack("s", $matches[2][$i]);
      list(,$player[$i+1]['rate']) = unpack("s", $matches[3][$i]);
      $player[$i+1]['name']        = preg_replace("/\^./", "", $matches[5][$i]);
      $player[$i+1]['tag']         = preg_replace("/\^./", "", $matches[6][$i]); // QUAKE4

      if ($player[$i+1]['tag']) { $player[$i+1]['name'] = $player[$i+1]['tag']." ".$player[$i+1]['name']; } // APPEND TAG TO NAME
    }

    if ($request == "players") { return $player;  }  // RETURN PLAYERS

//---------------------------------------------------------+

    $data['gamemod']    = $setting['gamename'];
    $data['hostname']   = $setting['si_name'];
    $data['mapname']    = $setting['si_map'];
    $data['players']    = count($player);
    $data['maxplayers'] = $setting['si_maxplayers'];
    $data['password']   = $setting['si_usepass'];

    return $data;  // RETURN INFO

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+


  function lgsl_query_feed($ip, $port, $game, $request, $lgsl_feed_url)
  {
    $host = parse_url($lgsl_feed_url);
    
    if (!$host[path]) { echo "INCOMPLETE FEED URL SET"; exit; } // FOR PEOPLE WHO MAKE TYPOS IN THE URL
    
    $host[path] .= "?ip=$ip&port=$port&gametype=$game&request=$request"; // ADD SERVER DETAILS TO FEED PATH

//---------------------------------------------------------+

    $fp = @fsockopen($host[host], "80", $errno, $errstr, 1);

    // FAKE ONLINE SERVER USED TO NOTIFY WHILE KEEPING CACHE TO STOP REPEATED REQUESTS TO AN OFFLINE FEED

    if (!$fp)
    {
      $data['status']     = TRUE;
      $data['hostname']   = $host['host'].$host['path'];
      $data['mapname']    = "feed offline";
      $data['players']    = 0;
      $data['maxplayers'] = 0;
      return $data;
    }

    stream_set_timeout($fp, 1, 0); stream_set_blocking($fp, true);  // SET TIMEOUT FOR OFFLINE SERVERS

    $html_request  = "GET $host[path] HTTP/1.0\r\n";
    $html_request .= "Host: $host[host]\r\n";
    $html_request .= "User-Agent: Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.2.1) Gecko/20021204\r\n";
    $html_request .= "Accept: text/xml,application/xml,application/xhtml+xml,";
    $html_request .= "text/html;q=0.9,text/plain;q=0.8,video/x-mng,image/png,";
    $html_request .= "image/jpeg,image/gif;q=0.2,text/css,*/*;q=0.1\r\n";
    $html_request .= "Accept-Language: en-us, en;q=0.50\r\n";
    $html_request .= "Accept-Encoding: \r\n";
    $html_request .= "Accept-Charset: ISO-8859-1, utf-8;q=0.66, *;q=0.66\r\n";
    $html_request .= "Referer: ".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']."\r\n";
    $html_request .= "Cache-Control: max-age=0\r\n";
    $html_request .= "Connection: Close\r\n\r\n";

    fwrite($fp, $html_request);

    unset($html_raw);
    
    while (!feof($fp))
    {
      $html_raw .= fread($fp, 1024);
    }

    fclose($fp);

//---------------------------------------------------------+

    $tmp = explode("_LGSL_FEED_", $html_raw);
    
    if (!$tmp[1])
    {
      $html_raw = htmlentities($html_raw, ENT_QUOTES);
      echo "<div style='width:160px; height:120px; overflow:auto'>
            Feed Missing From: $host[host]$host[path] Returned: $html_raw
            </div>";
      exit;
    }
    
    $data = unserialize($tmp[1]);
    
    return $data;

//---------------------------------------------------------+
  }

//------------------------------------------------------------------------------------------------------------+
//------------------------------------------------------------------------------------------------------------+

?>
