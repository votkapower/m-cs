<?php
// Functions by voTkaPoweR
function poll($promenliva = 1) // създаваме функция
{
        $ip = $_SERVER["REMOTE_ADDR"];
   
        $poll_query = mysqli_query($_db, "SELECT * FROM `poll` ORDER BY `id` DESC LIMIT 1");
        $poll       = mysqli_fetch_array($poll_query);
        $poll_broi  = mysqli_num_rows($poll_query);
    
    if ($poll_broi > 0) 
    { // ако изобщо съществува анкета
            $dali_si_glasuval = mysqli_num_rows(mysqli_query($_db, "SELECT `id` FROM `ips` WHERE `ip` = '$ip' AND `poll_id` = '" . $poll['id'] . "'"));
            echo $dali_si_glasuval;
                if ($dali_si_glasuval == 0) 
                { 
                     // проверяваме дали потребителя е гласувал. Ако не е му позволяваме да гласува
                    if (isset($_POST['submit']) && isset($_POST['vote']) && is_numeric($_POST['vote'])) 
                    { // малко защити :P
                        $vote            = $_POST['vote'];
                      
                            mysqli_query($_db, "UPDATE `otgovori` SET `broi` = `broi` + 1 WHERE `id` = '$vote' LIMIT 1");
                            mysqli_query($_db, "INSERT INTO `ips` (`poll_id`,`ip`) VALUES ('" . $poll['id'] . "','$ip')");
                             $order_by =  "ORDER BY `id` DESC";
                            if ($poll['podrejdane'] == 1) {
                                $order_by = "ORDER BY `id` ASC";
                            } // ако е избран тип стандартно подреждане
                            elseif ($poll['podrejdane'] == 2) {
                                $order_by = "ORDER BY `broi` DESC";
                            } // ако е избран тип подреждане по гласове
            

                            $query          = mysqli_query($_db, "SELECT SUM(broi) as `kolko` FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' GROUP BY id_poll");
                            $votes          = mysqli_fetch_array($query);
                            $votes          = $votes['kolko'];
                        ?>
                        <b><?= $poll['vapros'] ?></b><br><br> цукнал бутона
                        <table border="0">
                        <?php
                            // изкарваме резултатите от анкетата 
                            $query_otgovori = mysqli_query($_db, "SELECT * FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' $order_by");
                            while ($row_otgovori = mysqli_fetch_array($query_otgovori)) 
                            {
                                $procent = $row_otgovori['broi'] * (100 / $votes); // смятаме процентите
                                $procent = round($procent); // закръгляме ги
                        ?>
                        <tr><td><?= $row_otgovori['otgovor'] ?></td><td><div style="margin-bottom: 5px;background: darkred; height: 10px; width:<?php echo $procent;?>%;"></td><td><?= $row_otgovori['broi'] ?></td></tr>
                        <?php
                            }
                        ?>
                        </table><br>
                        <?php
                    } 
                    else 
                        {
                            
                            $query_otgovori = mysqli_query($_db, "SELECT * FROM `otgovori` WHERE `id_poll` = '".$poll['id']."' ORDER BY `id` ASC");
                            ?>
                            <b><?= $poll['vapros'] ?></b><br><br> ne  gasuwall 
                            <form action="" method="post">
                            <?php
                            // тук извеждаме формата за гласуване с възможните отговори
                            while ($row_otgovori = mysqli_fetch_array($query_otgovori)) 
                            {
                            ?>
                            <input type="radio" name="vote" value="<?= $row_otgovori['id'] ?>"> <?= $row_otgovori['otgovor'] ?><br>
                            <?php
                            }
                            ?>
                            <button  id='button' type="submit" name="submit" >Гласувай</button>
                            </form>
                            <?php
                        }
            } 
            else 
            {
             // ако е гласувал му извеждаме резултатите
            	    
                            $query          = mysqli_query($_db, "SELECT SUM(broi) as `kolko` FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' GROUP BY `id_poll`");
                            $votes          = mysqli_fetch_array($query);
                            $votes          = $votes['kolko'];
                        ?>
                        <b><?= $poll['vapros'] ?></b><br><br> gasuwall 
                        <table border="0">
                        <?php
                            // изкарваме резултатите от анкетата 
                            $query_otgovori = mysqli_query($_db, "SELECT * FROM `otgovori` WHERE `id_poll` = '" . $poll['id'] . "' $order_by");
                            while ($row_otgovori = mysqli_fetch_array($query_otgovori)) 
                            {
                                $procent = $row_otgovori['broi'] * (100 / $votes); // смятаме процентите
                                $procent = round($procent); // закръгляме ги
                        ?>
                        <tr><td><?= $row_otgovori['otgovor'] ?></td><td><div style="margin-bottom: 5px;background: darkred; height: 10px; width:<?php echo $procent;?>%;"></td><td><?= $row_otgovori['broi'] ?></td></tr>
                        <?php
                            }
                        ?>
                        </table><br>
                        <?php
            }
            
        
    } else {
        echo "Все още няма добавени анкети!"; // изкарваме съобщение, че няма такава анкета или изобщо не сме добавили
    }
}


function ok($msg) // за изкарване на съобщение за УСПЕХ .. 
{
	 echo "<div id='success_msg'>".$msg."</div>";
}

function error($msg) // за изкарване на съобщение за Грешка .. 
{
	 echo "<div id='error_msg'>".$msg."</div>";
}

function default_site_layout($url)
{
  echo "<style type='text/css'>@import url('".$url."');</style> ";
}



function maketime($datefrom,$dateto=-1)
{
// Defaults and assume if 0 is passed in that
// its an error rather than the epoch

if($datefrom<=0) { return "Преди мноого време"; }
if($dateto==-1) { $dateto = time(); }

// Calculate the difference in seconds betweeen
// the two timestamps

$difference = $dateto - $datefrom;

// If difference is less than 60 seconds,
// seconds is a good interval of choice

if($difference < 60)
{
$interval = "s";
}

// If difference is between 60 seconds and
// 60 minutes, minutes is a good interval
elseif($difference >= 60 && $difference<60*60)
{
$interval = "n";
}

// If difference is between 1 hour and 24 hours
// hours is a good interval
elseif($difference >= 60*60 && $difference<60*60*24)
{
$interval = "h";
}

// If difference is between 1 day and 7 days
// days is a good interval
elseif($difference >= 60*60*24 && $difference<60*60*24*7)
{
$interval = "d";
}

// If difference is between 1 week and 30 days
// weeks is a good interval
elseif($difference >= 60*60*24*7 && $difference <
60*60*24*30)
{
$interval = "ww";
}

// If difference is between 30 days and 365 days
// months is a good interval, again, the same thing
// applies, if the 29th February happens to exist
// between your 2 dates, the function will return
// the 'incorrect' value for a day
elseif($difference >= 60*60*24*30 && $difference <
60*60*24*365)
{
$interval = "m";
}

// If difference is greater than or equal to 365
// days, return year. This will be incorrect if
// for example, you call the function on the 28th April
// 2008 passing in 29th April 2007. It will return
// 1 year ago when in actual fact (yawn!) not quite
// a year has gone by
elseif($difference >= 60*60*24*365)
{
$interval = "y";
}

// Based on the interval, determine the
// number of units between the two dates
// From this point on, you would be hard
// pushed telling the difference between
// this function and DateDiff. If the $datediff
// returned is 1, be sure to return the singular
// of the unit, e.g. 'day' rather 'days'

switch($interval)
{
case "m":
$months_difference = floor($difference / 60 / 60 / 24 /
29);
while (mktime(date("H", $datefrom), date("i", $datefrom),
date("s", $datefrom), date("n", $datefrom)+($months_difference),
date("j", $dateto), date("Y", $datefrom)) < $dateto)
{
$months_difference++;
}
$datediff = $months_difference;

// We need this in here because it is possible
// to have an 'm' interval and a months
// difference of 12 because we are using 29 days
// in a month

if($datediff==12)
{
$datediff--;
}

$res = ($datediff==1) ? "преди $datediff месец"  :  "преди $datediff 
месеца";
break;

case "y":
$datediff = floor($difference / 60 / 60 / 24 / 365);
$res = ($datediff==1) ? " преди $datediff год." : "преди  $datediff год.";
break;

case "d":
$datediff = floor($difference / 60 / 60 / 24);
$res = ($datediff==1) ? "преди $datediff ден " : "преди  $datediff 
дни";
break;

case "ww":
$datediff = floor($difference / 60 / 60 / 24 / 7);
$res = ($datediff==1) ? "преди $datediff седмица" : "преди $datediff
 седмици";
break;

case "h":
$datediff = floor($difference / 60 / 60);
$res = ($datediff==1) ? "преди  $datediff час " : " преди $datediff часа";
break;

case "n":
$datediff = floor($difference / 60);
$res = ($datediff==1) ? "преди $datediff мин. " :
"преди  $datediff мин.";
break;

case "s":
$datediff = $difference;
$res = ($datediff==1) ? "преди $datediff сек." :
"преди  $datediff сек.";
break;
}
return $res;
}


/// CREATE THUMBNAILS

function make_thumb($src,$dest,$desired_width)
{

	/* read the source image */
	if(strtolower(end(explode(".",$src))) == "jpg" ||  strtolower(end(explode(".",$src))) == "jpeg") {	$source_image = imagecreatefromjpeg($src);} else{	$source_image = imagecreatefrompng($src);	}

	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height*($desired_width/$width));
	
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	
	/* copy source image at a resized size */
	imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	
	/* create the physical thumbnail image to its destination */
	if(strtolower(end(explode(".",$src))) == "jpeg"  || strtolower(end(explode(".",$src))) == "jpg"  )
	{
	imagejpeg($virtual_image,$dest,100);
	}
	else if(strtolower(end(explode(".",$src))) == "gif" )
	{
	 imagegif($virtual_image,$dest);
	}
	else
		{
			imagepng($virtual_image, $dest);
		}
}


function EmptyDir($dir) { // da izchisti vsichki failowe ot dadena direktoriq .. 
$handle=opendir($dir);

while (($file = readdir($handle))!==false) {
//echo "$file <br>";  Twa e da pokazwa list saas failowete za triene
@unlink($dir.'/'.$file);
}

closedir($handle);
}

// example   --- >>   EmptyDir('text');



function emoticons($commentara)			
{
 $commentara = str_replace(":D","<img src='./images/emo/1.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(";)","<img src='./images/emo/2.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(":)","<img src='./images/emo/3.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(";(","<img src='./images/emo/4.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(":*","<img src='./images/emo/5.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(":p","<img src='./images/emo/6.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(":P","<img src='./images/emo/6.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(kvo)","<img src='./images/emo/7.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(doh)","<img src='./images/emo/11.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(angry)","<img src='./images/emo/12.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(":@","<img src='./images/emo/12.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(wasntme)","<img src='./images/emo/13.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(mm)","<img src='./images/emo/14.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(":x","<img src='./images/emo/15.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace(":X","<img src='./images/emo/15.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(hug)","<img src='./images/emo/18.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(xixi)","<img src='./images/emo/19.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(bravo-bravo)","<img src='./images/emo/20.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(ok)","<img src='./images/emo/21.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(yes)","<img src='./images/emo/22.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(no)","<img src='./images/emo/23.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(inlove)","<img src='./images/emo/9.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(devil)","<img src='./images/emo/16.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(angel)","<img src='./images/emo/17.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(sun)","<img src='./images/emo/24.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(smooking)","<img src='./images/emo/25.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(fubar)","<img src='./images/emo/26.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(swear)","<img src='./images/emo/27.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(heady)","<img src='./images/emo/28.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(evil)","<img src='./images/emo/29.gif'  width='19' border='0' />",$commentara);
 $commentara = str_replace("(dull)","<img src='./images/emo/8.gif'  width='19' border='0' />",$commentara);

 
 return $commentara;
	
}


function randomname($n, $l=10)
{
  $m =  str_shuffle(str_repeat(md5($n), 7));
  $n = str_replace($n, $m, $n);
  $n = substr($n,0,$l);
 return $n;
}


function user_pm($from, $to, $tema, $msg) //  да праща ЛС на даден потребител
{
	$t = time();
   mysqli_query($_db,"INSERT INTO `user-pms` (`from_user`,`to_user`,`msg-title`,`msg-text`,`timestamp`,`readed`)VALUES('$from','$to','$tema','$msg','$t','0')") or die(mysqli_error());
}


function contact_admin($tema, $msg) //  да праща ЛС на даден потребител
{
	$time = time();
	$ip = $_SERVER['REMOTE_ADDR'];
	$from = $_SESSION['user']['username'];
	$email = $_SESSION['user']['email'];
    mysqli_query($_db,"INSERT INTO `contacts` (`title`,`msg`,`from`,`from_email`,`timestamp`,`readed`,`ip`)VALUES('$tema','$msg','$from','$email','$time','0','$ip')") OR DIE(mysqli_error());
}




function bbcode($text)
{

   $text = preg_replace("/\[quote=(.*)\](.*)\[\/quote\]/i","<div class='quote'><span>$1 каза:</span>$2</div>",$text);
   $text = preg_replace("/\[q=(.+)\](.+)\[\/q\]/i","<div class='quote'><span>$1 каза:</span>$2</div>",$text);
   $text = preg_replace("/\[q\](.+)\[\/q\]/i","<div class='quote'>$1</div>",$text);
   $text = preg_replace("/\[b\](.+)\[\/b\]/i","<b>$1</b>",$text);
   $text = preg_replace("/\[i\](.+)\[\/i\]/i","<i>$1</i>",$text);
   $text = preg_replace("/\[u\](.+)\[\/u\]/i","<u>$1</u>",$text);
   $text = preg_replace("/\[url=(.+)\](.+)\[\/url\]/i","<a href='$1'>$2</a>",$text);
   $text = preg_replace("/\[url\](.+)\[\/url\]/i","<a href='$1'>$1</a>",$text);
   $text = preg_replace("/\[img\](.+)\[\/img\]/i","<img src='$1' border='0' style='width:720px;' />",$text);

  // preg_match("/([quote\=(.+)](.*)[\/quote])/i",$text, $matches);
   

  return $text;
}