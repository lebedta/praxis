<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Praxis am Bahnhof Rüti - Feedback</title>
<?php require ".header.html"; ?>
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
    <p><a href="kontakt.php" target="_self">Kontakt</a></p>
    <p><a href="anreise.php" target="_self">Anreise</a></p>
    <p><a href="feedback.php" target="_self">Feedback</a></p>
    <p><a href="webdesign.php" target="_self">WebDesign</a></p>
    <p><a href="datenschutz.php" target="_self">Datenschutz</a></p>
    <p><a href="sitemap.php" target="_self">Sitemap</a></p>
    	<br />
    <p><a href="index.php" target="_self">Home</a></p>
    <p><form method="post" action=".suche.php">
          <label>			<input name="q" type="text" id="q" size=14 maxlength=250>
<br />
			<input type="hidden" value="Suchen" name="submit">
          </label>
        </form></p>
    <p><script language="JavaScript" src="http://www.1st-tools.de/fcounter.php?id=58099&style=5&width=100&height=30"></script></p></td>
    <td height="24" valign="top">
    <p class="sitetitle">SAGEN SIE UNS IHRE MEINUNG!</p></td>
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
    <p>Teilen Sie uns ihre positiven und negativen Erlebnisse in unserer Praxis mit. Wir werden jedes Feedback lesen und zur Verbesserung unseres Services verwenden.</p>
    <p>Es ist Ihnen frei überlassen den Namen anzugeben oder nicht.</p>
    <form id="feedback" name="feedback" method="post" action=".feedback-form.php">
      <table width="563" border="0">
        <tr>
          <td width="156" height="171" valign="top">Feedback:</td>
          <td width="397"><label>
            <textarea name="Feedback" id="Feedback" cols="45" rows="5" style="width:400px; height:150px;"></textarea>
            </label>
            <?php
			$timestamp = time();
			$timestamp = $timestamp - 3600;
			$date1 = date("d.m.Y", $timestamp);
			$time1 = date("H:i", $timestamp);
			$time = $date1." - ".$time1;
			?>
            <input type="hidden" name="time" id="time" value="<?php echo $time; ?>" /> 
            </td>
        </tr>
        <tr>
          <td><input type="reset" name="button" id="button" value="Zurücksetzen" /></td>
          <td align="right"><label>
            <input type="submit" name="button2" id="button2" value="Senden" />
            </label></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
