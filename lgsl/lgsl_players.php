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

  $player_list = lgsl_query($get_ip, $get_port, $get_type, "players");
  
  if (!$player_list) { echo "<div style='text-align:center'>No Players or Server Not Responding</div></body></html>"; return; }
 
//-----------------------------------------------------------------------------------------------------------+

  if (isset($player_list[1][score]) )  { $lgsl_show_score  = 1; }
  if (isset($player_list[1][deaths]))  { $lgsl_show_deaths = 1; }
  if (isset($player_list[1][skill]))   { $lgsl_show_skill  = 1; }
  if (isset($player_list[1][goal]))    { $lgsl_show_goal   = 1; }
  if (isset($player_list[1][honor]))   { $lgsl_show_honor  = 1; }
  if (isset($player_list[1][leader]))  { $lgsl_show_leader = 1; }
  if (isset($player_list[1][ping])  )  { $lgsl_show_ping   = 1; }
  if (isset($player_list[1][team])  )  { $lgsl_show_team   = 1; }
  if (isset($player_list[1][stats]) )  { $lgsl_show_stats  = 1; }
  if (isset($player_list[1][time])  )  { $lgsl_show_time   = 1; }
  if (isset($player_list[1][skin]))    { $lgsl_show_skin   = 1; }
  if (isset($player_list[1][rate]))    { $lgsl_show_rate   = 1; }  
//if (isset($player_list[1][keyhash])) { $lgsl_show_hash   = 1; }
//if (isset($player_list[1][pid]))     { $lgsl_show_pid    = 1; }

//-----------------------------------------------------------------------------------------------------------+

  echo "<table class='players_table' cellpadding='3'>
        <tr>
        <td style='text-align:center'><b>Name</b><br /><br /></td>
        <td style='height:30px'><br /><br /></td>";

  if ($lgsl_show_score ) { echo "<td style='width:60px; text-align:center'><b>Score    </b><br /><br /></td>"; }
  if ($lgsl_show_deaths) { echo "<td style='width:60px; text-align:center'><b>Deaths   </b><br /><br /></td>"; }
  if ($lgsl_show_skill)  { echo "<td style='width:60px; text-align:center'><b>Skill    </b><br /><br /></td>"; }
  if ($lgsl_show_goal)   { echo "<td style='width:60px; text-align:center'><b>Goal     </b><br /><br /></td>"; }
  if ($lgsl_show_honor)  { echo "<td style='width:60px; text-align:center'><b>Honor    </b><br /><br /></td>"; }
  if ($lgsl_show_leader) { echo "<td style='width:60px; text-align:center'><b>Leader   </b><br /><br /></td>"; }
  if ($lgsl_show_ping)   { echo "<td style='width:60px; text-align:center'><b>Ping     </b><br /><br /></td>"; }
  if ($lgsl_show_team)   { echo "<td style='width:60px; text-align:center'><b>Team     </b><br /><br /></td>"; }
  if ($lgsl_show_stats)  { echo "<td style='width:60px; text-align:center'><b>Stats    </b><br /><br /></td>"; }
  if ($lgsl_show_time)   { echo "<td style='width:90px; text-align:center'><b>Time     </b><br /><br /></td>"; }
  if ($lgsl_show_skin)   { echo "<td style='width:90px; text-align:center'><b>Skin     </b><br /><br /></td>"; }
  if ($lgsl_show_rate)   { echo "<td style='width:90px; text-align:center'><b>Rate     </b><br /><br /></td>"; }
  if ($lgsl_show_hash)   { echo "<td style='width:90px; text-align:center'><b>Key Hash </b><br /><br /></td>"; }
  if ($lgsl_show_pid)    { echo "<td style='width:90px; text-align:center'><b>Player ID</b><br /><br /></td>"; }

  echo "</tr>";

//-----------------------------------------------------------------------------------------------------------+

  foreach ($player_list as $key=>$player)
  {
    if (function_exists("mb_convert_encoding")) // REQUIRES http://php.net/mbstring
    {
      $player[name] = htmlspecialchars($player[name], ENT_QUOTES);
      $player[name] = @mb_convert_encoding($player[name],"HTML-ENTITIES","auto");
    }
    else
    {
      $player[name] = htmlentities($player[name], ENT_QUOTES);
    }

    if ($get_type == "bfvietnam" && $player[team] == "1")   { $player[team] = "Red";       }
    if ($get_type == "bfvietnam" && $player[team] == "2")   { $player[team] = "Blue";      }
    if ($get_type == "bf1942"    && $player[team] == "1")   { $player[team] = "Axis";      }
    if ($get_type == "bf1942"    && $player[team] == "2")   { $player[team] = "Allies";    }
    if ($get_type == "halo"      && $player[team] == "0")   { $player[team] = "Blue";      }
    if ($get_type == "halo"      && $player[team] == "1")   { $player[team] = "Red";       }
    if ($get_type == "halo"      && $player[team] == "2")   { $player[team] = "Spectator"; }
    if ($get_type == "ut"        && $player[team] == "255") { $player[team] = "Spectator"; }
    if ($get_type == "ut2003"    && $player[team] == "255") { $player[team] = "Spectator"; }
    if ($get_type == "ut2004"    && $player[team] == "255") { $player[team] = "Spectator"; }
    if ($get_type == "warsow"    && $player[team] == "0")   { $player[team] = "Spectator"; }
    if ($get_type == "warsow"    && $player[team] == "1")   { $player[team] = "Player";    }
    if ($get_type == "warsow"    && $player[team] == "2")   { $player[team] = "Red";       }
    if ($get_type == "warsow"    && $player[team] == "3")   { $player[team] = "Blue";      }
    if ($get_type == "warsow"    && $player[team] == "4")   { $player[team] = "Green";     }
    if ($get_type == "warsow"    && $player[team] == "5")   { $player[team] = "Yellow";    }
    if ($get_type == "stalker"   && $player[team] == "1")   { $player[team] = "Freedom";   }
    if ($get_type == "stalker"   && $player[team] == "2")   { $player[team] = "Mercs";     }


    echo "<tr><td class='players_row'> $player[name] </td><td class='players_spacer'><br /></td>";

    if ($lgsl_show_score)  { echo "<td class='players_row'> $player[score]  </td>"; }
    if ($lgsl_show_deaths) { echo "<td class='players_row'> $player[deaths] </td>"; }
    if ($lgsl_show_skill)  { echo "<td class='players_row'> $player[skill]  </td>"; }
    if ($lgsl_show_goal)   { echo "<td class='players_row'> $player[goal]   </td>"; }
    if ($lgsl_show_honor)  { echo "<td class='players_row'> $player[honor]  </td>"; }
    if ($lgsl_show_leader) { echo "<td class='players_row'> $player[leader] </td>"; }
    if ($lgsl_show_ping)   { echo "<td class='players_row'> $player[ping]   </td>"; }
    if ($lgsl_show_team)   { echo "<td class='players_row'> $player[team]   </td>"; }
    if ($lgsl_show_stats)  { echo "<td class='players_row'> $player[stats]  </td>"; }
    if ($lgsl_show_time)   { echo "<td class='players_row'> $player[time]   </td>"; }
    if ($lgsl_show_skin)   { echo "<td class='players_row'> $player[skin]   </td>"; }
    if ($lgsl_show_rate)   { echo "<td class='players_row'> $player[rate]   </td>"; }
    if ($lgsl_show_hash)   { echo "<td class='players_row'> $player[keyhash]</td>"; }
    if ($lgsl_show_pid)    { echo "<td class='players_row'> $player[pid]    </td>"; }

    echo "</tr>\r\n";
  }

  echo"</table><div style='height:30px'><br /></div>";

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
//-- PLEASE MAKE A DONATION OR SIGN THE GUESTBOOK AT WWW.GREYCUBE.COM IF YOU REMOVE THIS CREDIT ----------------------------------------------------------------------------------------------------+
  echo "<div style='text-align:center;font-family:tahoma;font-size:9px'><a rel='external' href='http://www.greycube.com' style='text-decoration:none'>LGSL-SA 2.2 By Richard Perry</a></div>";
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------+
?>




	</body>
</html>