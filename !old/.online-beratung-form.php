<?php
//AUSLESEN
//Geschlecht
if($_POST["Geschlecht"] == "Mann")  
{ $geschlecht = "Mann"; }
else
{ $geschlecht = "Frau"; }
//END

$name = $_POST["Name"];
$vorname = $_POST["Vorname"];
$strasse = $_POST["Strasse"];
$plz_ort = $_POST["PLZ"]." ".$_POST["Ort"];
$geburtsdatum = $_POST["Geburtsdatum_dd"].".".$_POST["Geburtsdatum_mm"].".".$_POST["Geburtsdatum_yyyy"];
$email = $_POST["E-Mail"];
//ART DER FRAGE
if($_POST["Art"] == "organisatorisch")  
{ $art = "organisatorisch"; }
else
{ $art = "medizinisch"; }
//END
$frage = nl2br($_POST["Frage"]);
$time = $_POST["time"];

//Inhalt-Überprüfung
function check_geschlecht($geschlecht)	{
	if(!$geschlecht) {
		return false;
	}
	else {
		return true;
	}
}
function check_name($name)	{
	if(!$name) {
		return false;
	}
	else {
		return true;
	}
}
function check_vorname($vorname)	{
	if(!$vorname) {
		return false;
	}
	else {
		return true;
	}
}
function check_adresse($strasse)	{
	if(!$strasse) {
		return false;
	}
	else {
		return true;
	}
}
function check_plz_ort($plz_ort)	{
	if($plz_ort == " ") {
		return false;
	}
	else {
		return true;
	}
}
function check_geburtsdatum($geburtsdatum)	{
	if($geburtsdatum == "..") {
		return false;
	}
	else {
		return true;
	}
}
function check_art($art)	{
	if(!$art) {
		return false;
	}
	else {
		return true;
	}
}
function check_frage($frage)	{
	if(!$frage) {
		return false;
	}
	else {
		return true;
	}
}

//Mail-Überprüfung
function check_email($email) {
    if(!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        return false;
    }
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }
    if(!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
        $domain_array = explode(".", $email_array[1]);
        if(sizeof($domain_array) < 2) {
            return false;
        }
        for($i = 0; $i < sizeof($domain_array); $i++) {
            if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}
?>
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
<?php
	if((check_geschlecht($geschlecht) == false) or (check_name($name) == false) or (check_vorname($vorname) == false) or (check_adresse($strasse) == false) or (check_plz_ort($plz_ort) == false) or (check_geburtsdatum($geburtsdatum) == false) or (check_email($email) == false) or (check_art($art) == false) or (check_frage($frage) == false) ) 
	{ ?>
      <div class="sitetitle">Fehler</div>
    </td>
    <td rowspan="2" class="p" valign="middle" align="right">
      		<a href="photos/praxis/tall/10-Wartezimmer.jpg" rel="lightbox[vacation]" title="Wartezimmer"><img src="photos/praxis/thumb/10-Wartezimmer.jpg" width="150" height="99" /></a><br />
        	<div align="left">&nbsp;1. Wartezimmer</div>
    		<a href="photos/praxis/tall/01-Emfang.jpg" rel="lightbox[vacation]" title="Empfang"><img src="photos/praxis/thumb/01-Emfang.jpg" width="150" height="99" /></a><br />
        	<div align="left">&nbsp;2. Empfang</div>
            <a href="photos/praxis/tall/09-Wartezimmer.jpg" rel="lightbox[vacation]" title="Wartezimmer in Abendstimmung"><img src="photos/praxis/thumb/09-Wartezimmer.jpg" width="150" height="99" /></a><br />
			<div align="left">&nbsp;3. Wartezimmer Abend</div>
            <a href="photos/praxis/tall/02-Blick-zum-Empfang.jpg" rel="lightbox[vacation]" title="Blick zum Empfang"><img src="photos/praxis/thumb/02-Blick-zum-Empfang.jpg" width="150" height="99" /></a><br />
	        <div align="left">&nbsp;4. Blick zum Empfang</div>
            <a href="photos/praxis/tall/11-Wartezimmer-Kinderecke.jpg" rel="lightbox[vacation]" title="Kinder-Ecke im Wartezimmer"><img src="photos/praxis/thumb/11-Wartezimmer-Kinderecke.jpg" width="150" height="99" /></a><br />
        	<div align="left">&nbsp;5. Kinder-Ecke</div>
	  <br />
		<div id="copyright">© by <a href="http://www.jz-design.ch" target="_blank">jz-design.ch</a><br /></div></td>
  </tr>
  <tr>
    <td height="580" valign="top" class="p">      
    <p>Bitte füllen Sie alle Felder aus...</p>
    <?php if(check_email($email) == false) { ?><p>· Bitte geben Sie eine gültige Mail-Adresse an.</p><?php } else { } ?>
    <?php if(check_geschlecht($geschlecht) == false) { ?><p>· Bitte geben Sie Ihr Geschlecht an.</p><?php } else { } ?>
    <?php if(check_name($name) == false) { ?><p>· Bitte geben Sie Ihren Namen an.</p><?php } else { } ?>
    <?php if(check_vorname($vorname) == false) { ?><p>· Bitte geben Sie Ihren Vornamen an.</p><?php } else { } ?>
    <?php if(check_email($strasse) == false) { ?><p>· Bitte geben Sie eine Strasse an.</p><?php } else { } ?>
    <?php if(check_plz_ort($plz_ort) == false) { ?><p>· Bitte geben Sie eine Postleitzahl und einen Ort ein.</p><?php } else { } ?>
    <?php if(check_art($art) == false) { ?><p>· Bitte geben Sie um welche Art Frage es sich handelt.</p><?php } else { } ?>
    <?php if(check_frage($frage) == false) { ?><p>· Bitte geben Sie eine Frage ein.</p><?php } else { } ?>
    <p><a href="javascript:history.back();" target="_self">zurück zum Formular</a></p>
<p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
	}
	else
	{
		if($geschlecht == Mann) { $geschlecht = "Herr"; } else { $geschlecht = "Frau"; }
		$nachricht = $art."e Frage von ".$vorname." ".$name."<br> Geschrieben: ".$time."<br><br>Kontaktinformationen:<br>".$geschlecht." ".$vorname." ".$name."<br>".$strasse."<br>".$plz_ort."<br><br>Frage:<br>".$frage;
		$empfaenger = "online-beratung@praxisambahnhof.ch";
		$betreff = $art."e Frage";
		$from = "From: ".$vorname." ".$name." <".$email.">\n";
		$from .= "Content-Type: text/html\n";
		$text = $nachricht;
		
		mail($empfaenger, $betreff, $text, $from);

	?>
      <div class="sitetitle">Gesendet</div>
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
    <p>Ihre Nachricht wurde erfolgreich versendet.</p>
    <p><a href="online-beratung.php" target="_self">zurück zur Online-Beratung</a></p>
<p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php } ?>