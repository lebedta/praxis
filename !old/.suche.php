<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Wilkommen in der Praxis am Bahnhof, direkt gegenüber dem Bahnhof Rüti</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
</head>
<?php
// Domain-Name für die Anzeige in den Resultaten
$DomainName = "http://".GetParam("SERVER_NAME", "S");

// Root-Verzeichnis für den Zugriff auf die Dateien am Server
// Beispiel: $RootDir=dirname("/htdocs");
$RootDir = dirname(GetParam("SCRIPT_FILENAME", "S"));

// Dateiname für die Protokollierung der Suchbegriffe
// (kein Dateiname zum deaktivieren der Protokollierung)
// z.B. "../../files/logs/search_words.log"
$SearchWordLog = "search/.protokoll.txt";

// Länge der Textfragmente um die Fundstellen (in Zeichen)
$Found_Piece_Len = 50;

// Erlaubtes Verzeichnis
// Z.B.: $AllowedDirs = $RootDir."/content";
$AllowedDir = $RootDir;
// Erlaubte Erweiterungen als Array, getrennt mit einem Beistrich
// Z.B.: $AllowedExts=array(".php",".php3",".php4",".htm",".html",".ihtml",".shtm",".shtml",".txt");
$AllowedExts = array(".php",".html",".shtml");

// Deutsche Umlaute dekodieren (dadurch wird beispielsweise "&auml;" zu "ä")
$ActivateUmlaut = "true";

// Links zu den gefundenen Seiten in einem neuen Tab/Fenster öffnen
$LinkTargetBlank = "true";

// Teile des Inhalts anzeigen ("true" für ja, "false" für nein)
$Show_Content = "false";

// Dateigröße anzeigen ("true" für ja, "false" für nein)
$Show_Filesize = "false";

// Nummer des Resultates anzeigen ("true" für ja, "false" für nein)
$Show_ResultNumber = "false";

// Beschreibung anzeigen ("true" für ja, "false" für nein)
$Show_Description = "true";

// Anzahl der Treffer pro Seite
$HitsPerPage = 5;

// Der Wert TRUE zeigt alle Ergebnisse an, FALSE nur die unter $HitsPerPage
// angegebene Anzahl.
$ShowAllResults = false;

// Stylesheets werden aus der Seite entfernt (empfohlen)
$RemoveStyle = true;

// Scripts werden aus der Seite entfernt (empfohlen)
$RemoveScript = true;


// *****************************************************************************

?>

<body background="images/color.gif">
<table width="1003" height="770" border="0" background="images/bg.jpg" style="background-repeat:no-repeat">
  <tr>
    <td height="146" colspan="2">&nbsp;</td>
    <td width="654">&nbsp;</td>
    <td width="154" class="p"></td>
  </tr>
  <tr>
    <td width="32" height="635" rowspan="2" valign="top">&nbsp;</td>
    <td width="145" rowspan="2" valign="top" id="nav">
    <p><a href="index.php" target="_self">Home</a></p>
    <p><a href="ueber.php" target="_self">Über uns</a></p>
    <p><a href="news.php" target="_self">News</a></p>
    <p><a href="notfall.php" target="_self">Notfall</a></p>
    <p><a href="angebot.php" target="_self">Angebot</a></p>
    <p><a href="aerzte.php" target="_self">Ärzte</a></p>
    <p><a href="personal.php" target="_self">Personal</a></p>
    <p><a href="downloads.php" target="_self">Downloads</a></p>
    <p><a href="online-beratung.php" target="_self">Online-Beratung</a></p>
    <p><a href="freie-stellen.php" target="_self">Freie Stellen</a></p>
    	<br />
    <p><a href="presse.php" target="_self">Presse</a></p>
    <p><a href="kontakt.php" target="_self">Kontakt</a></p>
    <p><a href="links.php" target="_self">Links</a></p>
    <p><a href="shop.php" target="_self">Shop</a></p>
    <p><form method="post" action=".suche.php">
          <label>			<input name="q" type="text" id="q" size=14 maxlength=250>
<br />
			<input type="hidden" value="Suchen" name="submit">
          </label>
        </form></p>
    <p><script language="JavaScript" src="http://www.1st-tools.de/fcounter.php?id=58099&style=5&width=100&height=30"></script></p></td>
    <td height="24" valign="top">
      <div class="sitetitle">Suche</div>
    </td>
    <td rowspan="2" class="p" valign="middle" align="right">
    		<a href="photos/praxis/tall/01-Emfang.jpg" rel="lightbox[vacation]" title="Empfang"><img src="photos/praxis/thumb/01-Emfang.jpg" width="150" height="99" /></a><br />
        	<div align="left">&nbsp;1. Empfang</div>
            <a href="photos/praxis/tall/02-Blick-zum-Empfang.jpg" rel="lightbox[vacation]" title="Blick zum Empfang"><img src="photos/praxis/thumb/02-Blick-zum-Empfang.jpg" width="150" height="99" /></a><br />
        	<div align="left">&nbsp;2. Blick zum Empfang</div>
      		<a href="photos/praxis/tall/10-Wartezimmer.jpg" rel="lightbox[vacation]" title="Wartezimmer"><img src="photos/praxis/thumb/10-Wartezimmer.jpg" width="150" height="99" /></a><br />
        	<div align="left">&nbsp;3. Wartezimmer</div>
            <a href="photos/praxis/tall/11-Wartezimmer-Kinderecke.jpg" rel="lightbox[vacation]" title="Kinder-Ecke im Wartezimmer"><img src="photos/praxis/thumb/11-Wartezimmer-Kinderecke.jpg" width="150" height="99" /></a><br />
        	<div align="left">&nbsp;4. Kinder-Ecke</div>
            <a href="photos/praxis/tall/09-Wartezimmer.jpg" rel="lightbox[vacation]" title="Wartezimmer in Abendstimmung"><img src="photos/praxis/thumb/09-Wartezimmer.jpg" width="150" height="99" /></a><br />
	  <div align="left">&nbsp;5. Wartezimmer Abend</div>
	  <br />
		<div id="copyright">© by <a href="http://www.jz-design.ch" target="_blank">jz-design.ch</a><br /></div></td>
  </tr>
  <tr>
    <td height="580" valign="top" class="p">      
    <div>
            <p>
            <form action="<?php echo GetParam("PHP_SELF", "S"); ?>" method="post">
              Neue Suche: 
              <input type="text" name="q" size=40 maxlength=250 value="<?=$SearchTerm?>">
            <input type="submit" value="Suchen" name="submit"></form></p>
            <p>
              <?php
      $SearchTerm = FormatSearchString(stripslashes(GetParam("q", "P")));
      if (!$SearchTerm) $SearchTerm = FormatSearchString(stripslashes(GetParam("q", "G")));
    ?>
              <?php
    
    if($SearchTerm){
      // Protokollierung der Suchbegriffe
      if(file_exists($SearchWordLog)) {
        $fp=@fopen($SearchWordLog,"a");
        if($fp) {
          flock($fp,2);
          fputs($fp,$SearchTerm."\r\n",256);
          flock($fp,3);
          fclose($fp);
        }
      }
    
      $files=ReadDirs($AllowedDir,$AllowedExts);
    
      $ResultCount=0;
      if($files && $SearchTerm){
        foreach($files as $f){
          if(SearchFile($f,$SearchTerm)){
            $fn=$f;
            if(substr($f,0,strlen($RootDir))==$RootDir) $fn=$DomainName.substr($f,strlen($RootDir));
            $ResultCount++;
            if($ResultCount == 6)	{ echo "Es wurden über 5 Ergebnisse gefunden. Beschreiben Sie genauer, was sie suchen."; exit();  }
            echo $ResultCount.". ";
            echo '<span class=search_small><a href="'.$fn.'"';
            if ($LinkTargetBlank) echo '';
            echo "><strong>".$Site_Title."</strong></a></font><br>\n";
            if($Meta_Description) $Meta_Description = substr($Meta_Description, 0, 200); $Meta_Description.= "..."; echo $Meta_Description."<br>\n";
            echo "<span class=grey>".$Site_Content."</span><br>\n";
            echo "<span class=grey>Datei:</span> ".$fn."";
            echo " - ";
            echo "<span class=grey>Größe:</span> ".round(filesize($f)/1024,2)." KB";
            echo "<br>";
            echo "<br>\n";
          }
        }
        clearstatcache();
      }
      if($ResultCount == 0) { echo "Es wurden keine mit Ihrer Suchanfrage - <b>$SearchTerm</b> - übereinstimmende Seiten gefunden.<br><br>Vorschläge: <br>- Vergewissern Sie sich, dass alle Wörter richtig geschrieben sind.<br>- Probieren Sie andere Suchbegriffe.<br>- Probieren Sie allgemeinere Suchbegriffe."; }
      echo "Es wurden <b>".$ResultCount."</b> Seiten gefunden.<br>\n";
    }
    
    function SearchFile($url,$search){
      global $Found_Piece_Len;
      global $ActivateUmlaut;
      global $RootDir;
      global $DomainName;
    
      global $Site_Title;
      global $Meta_Title;
      global $Site_Content;
      global $Meta_Description;
      global $Meta_Robots;
    
      $Site_Title="";
      $Meta_Title="";
      $Meta_Keywords="";
      $Site_Content="";
      $Meta_Description="";
      $Meta_Robots="";
    
      // *** Meta-Angaben ermitteln ***
      $gmtarray=get_meta_tags($url);
      while(list($key,$val)=each($gmtarray)){
        switch(strtolower($key)){
          case "title": $Meta_Title=$val; break;
          case "keywords": $Meta_Keywords=$val; break;
          case "description": $Meta_Description=$val; break;
          case "robots": $Meta_Robots=strtolower($val); break;
          case "revisit": $Meta_Revisit=strtolower($val); break;
          case "revisit-after": $Meta_RevisitAfter=strtolower($val); break;
        }
      }
    
      // *** Dateiinhalt einlesen (bzw. Ausgabe bei PHP) ***
      $fp=@fopen($url,"r");
      if(!$fp) return false;
      $content="";
      while(!feof($fp)){
        $content.=fgets($fp,10240);
      }
      fclose($fp);
      
      $content = preg_replace("/<\?.*?\?>/s", "", $content);
    
      $content = $Meta_Title." ".$Meta_Keywords." ".$Meta_Description." ".trim($content);
    
      // *** Seitentitel ermitteln ***
      $Site_Title = GetSiteTitle($content);
      if(!$Site_Title) $Site_Title = $Meta_Title;
      if(!$Site_Title) $Site_Title = basename($url);
    
      if (substr($content, 0, strlen($Site_Title)) == $Site_Title) $content = substr($content, strlen($Site_Title));
    
      $content = strip_tags($content);
      $content = str_replace("\n", " ", $content);
      $content = str_replace("\r", "", $content);
      $sc = " ".trim($content);
    
      while(strpos($sc,"  ")){
        $sc=str_replace("  "," ",$sc);
      }
      $content=$sc;
    
      // Deutsche Umlaute konvertieren
      if($ActivateUmlaut){
        $content=str_replace("&auml;","ä",$content);
        $content=str_replace("&ouml;","ö",$content);
        $content=str_replace("&uuml;","ü",$content);
        $content=str_replace("&Auml;","Ä",$content);
        $content=str_replace("&Ouml;","Ö",$content);
        $content=str_replace("&Uuml;","Ü",$content);
        $content=str_replace("&szlig;","ß",$content);
      }
      $content=str_replace("&euro;","€",$content);
      $content=str_replace("&nbsp;"," ",$content);
    
      // *** Suchen ***
      $found=false;
      $a=explode(" ",strtolower($search));
      $lowcontent=strtolower($content);
      $result_text="";
      foreach($a as $arg){
        $p0=strpos($lowcontent,$arg);
        if($p0>0){
          $p1=$Found_Piece_Len;
          $p2=$Found_Piece_Len;
          if (($p0-$p1) < 0) $p1=$p0;
          $result_text.="...".substr($content,$p0-$p1,$p1)."<b class=red>";
          $result_text.=substr($content,$p0,strlen($arg))."</b>".substr($content,$p0+strlen($arg),$p2);
          $found=true;
        }else{
          $found=false;
          break;
        }
      }
    
      if(!$found) return false;
      if($result_text) $result_text.="...";
    
      $Site_Content=$result_text;
    
      return true;
    }
    
    function FormatSearchString($search){
      $chars=".:-_,;!§$%&/()=#+*~'?\[|]{^°}²³µ@€ äöüß1234567890abcdefghijklmnopqrstuvwxyz";
      $s="";
      for($i=0;$i<strlen($search);$i++){
        $a=substr($search,$i,1);
        if(stristr($chars,$a)) $s.=$a;
      }
      while(strpos($s,"  ")){
        $s=str_replace("  "," ",$s);
      }
      return trim($s);
    }
    
    function ReadDirs($d,$ExtArray){
      $fileArray=array();
      if($hDir = opendir($d)){
        while($file=readdir($hDir)){
          if(!is_dir($d."/".$file)){
            // *** .*-Dateien (zB .htaccess) ignorieren ***
            if(substr($file,0,1)!="."){
                foreach($ExtArray as $ext){
                    if(substr(strtolower($file),strlen($file)-strlen($ext),strlen($ext))==strtolower($ext)){
                        array_push($fileArray,$d."/".$file);
                        continue;
                    }
                  }
              }
          }
        }
        closedir($hDir);
      }
      return $fileArray;
    }
    
    function GetSiteTitle($content)
    {
      $p1=strpos(strtolower($content),"<title>");
      if(!$p1) return false;
      $p2=strpos(strtolower($content),"</title>",$p1);
      if(!$p2) return false;
      return trim(substr($content,$p1+7,$p2-$p1-7));
    }
    
    function GetParam($ParamName, $Method = "P", $DefaultValue = "") {
      if ($Method == "P") {
        if (isset($_POST[$ParamName])) return $_POST[$ParamName]; else return $DefaultValue;
      } else if ($Method == "G") {
        if (isset($_GET[$ParamName])) return $_GET[$ParamName]; else return $DefaultValue;
      } else if ($Method == "S") {
        if (isset($_SERVER[$ParamName])) return $_SERVER[$ParamName]; else return $DefaultValue;
      }
    }
    
    ?>
    </div>
	</td>
  </tr>
</table>
</body>
</html>

</body>
</html>