<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="google-site-verification" content="DsulSAuo1_AO3uPvlcBN-RKKFhxu25Df6YNDVgOy-mw" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Praxis am Bahnhof Rüti - Startseite</title>
<meta name="keywords" content="Praxis am Bahnhof, Arztpraxis, Bahnhof Praxis, Praxis Zeller, Rüti, Dürnten, Bubikon, Wald, Oberdürnten, Wolfhausen, Jona, Rapperswil, Notfall, Notfallmedizin, medizinischer Notfall, Arzt, Notfallarzt, ärztliche Hausbesuche" />
<meta name="description" content="Die Praxis am Bahnhof direkt neben dem Bahnhof Rüti hat von 07:00 bis 20:00 Uhr geöffnet." />
<?php /*require ".header.html";*/ ?>
<link rel="stylesheet" type="text/css" href="style.css">
<!--<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightbox/js/lightbox.js"></script>
-->

<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
		var timer = setInterval(function() {
			//alert('ddd');
			clearInterval(timer);
			closeLightBox();
      		// Do something every 2 seconds
		}, 15000);
      //$('.default').dropkick();
	  var getWidth = ($(window).width()/2)-($('#lightDiv').width()/2);
	  var getHeight = ($(window).height()/2)-($('#lightDiv').height()/2);
	  //alert(getWidth + " ; " + getHeight);
	  $('#closeDiv').css({'margin-top':getHeight-12, 'margin-left':getWidth+$('#lightDiv').width()-12});
	  $('#lightDiv').css({'margin-top':getHeight, 'margin-left':getWidth});
	  //////////
	  $('#closeDiv').click(function() {
		  clearInterval(timer);
		  $('#lightDivOverlay').fadeOut('slow', function() {
			// Animation complete.
		  });
		});
	  function closeLightBox(){
		  $('#lightDivOverlay').fadeOut('slow', function() {
			// Animation complete.
		  });
	  }
    });
  </script>
<style type="text/css">
body {
	margin: 0px;
}
#closeDiv{width:25px; height:25px; position:absolute; z-index:5002; cursor:pointer;}
#lightDiv{width:550px; height:550px; position:absolute; z-index:5001; border:2px solid #CCC; -moz-box-shadow: 0 0 10px #333;
-webkit-box-shadow: 0 0 10px #333; box-shadow: 0 0 10px #333;}
#lightDivOverlay{width:100%; height:100%; position:absolute; z-index:5000; background:url(ima/overlay_ima.png);}
</style>
</head>

<body background="images/color.gif">


<div id="lightDivOverlay">
	<div id="closeDiv"><img src="ima/close.png" width="25" height="25" /></div>
  <div id="lightDiv"><img src="ima/4.jpg" width="550" height="550" /></div>
</div>


<table width="1003" height="770" border="0" background="images_home/bg.jpg">
  <tr>
    <td height="146" colspan="2">&nbsp;</td>
    <td width="654">&nbsp;</td>
    <td width="154" class="p"></td>
  </tr>
  <tr>
    <td width="32" height="635" valign="top">&nbsp;</td>
    <td width="145" valign="top" id="nav">
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
    <td colspan="2" align="left" valign="top">
    	<div id="slide_ari">
        	<div id="slide_innerari">
            	<div class="left_timeari">
                	<div class="leftari_sec">
                    	<p>Praxis für Allgemeinmedizin <br />und Spezialgebiete</p>
                    </div>
                    <div class="leftaribold" style="display:none">
                    <h1>Öffnungszeiten</h1>
                    <p><span>Mo - Fr : 7 - 22 Uhr<br /> Samstag : 8:00 - 12:00 Uhr</span></p>
                    <div class="walkingari"><span>Walk in</span></div>
                    </div>
                    <div class="leftaribold">
                    <h1>Öffnungszeiten
                      <span></span></h1>
                    <span><table width="249" border="0">
                      <tr>
                        <td width="86">Mo - Fr:</td>
                        <td width="153">7:00 - 22:00 Uhr</td>
                      </tr>
                      <tr>
                        <td width="86">Walk in:</td>
                        <td width="153">8:00 - 20:00 Uhr</td>
                      </tr>
                      <tr>
                        <td>Samstag:</td>
                        <td>8:00 - 18:00 Uhr</td>
                      </tr>
                      <tr>
                        <td>Walk in:</td>
                        <td>8:00 - 18:00 Uhr</td>
                      </tr>
                      <tr>
                        <td>Sonntag:</td>
                        <td>10:00 - 16:00 Uhr</td>
                      </tr>
                    </table></span>
                    <div class="walkingari"><span>Walk in</span></div>
                    </div>
                </div>
                <div class="right_aslideari">
                	<div id="slider" class="nivoSlider">
                	    <img src="images_home/17.jpg" width="443" height="294" alt="" title="Wilkommen in der Praxis am Bahnhof" />
                	    <img src="images_home/001.jpg" width="443" height="294" alt="" title="Blick zum Empfang" />
                	    <img src="images_home/002.jpg" width="443" height="294" alt="" title="Wartezimmer" />
                	    <img src="images_home/003.jpg" width="443" height="294" alt="" title="Sprechzimmer" />
                	    <img src="images_home/004.jpg" width="443" height="294" alt="" title="Kinderecke im Wartezimmer" />
                	    <img src="images_home/005.jpg" width="443" height="294" alt="" title="Unsere Apotheke" />
                	    <img src="images_home/006.jpg" width="443" height="294" alt="" title="Kindersprechzimmer" />
                	    <img src="images_home/007.jpg" width="443" height="294" alt="" title="Röntgen" />
                	    <img src="images_home/008.jpg" width="443" height="294" alt="" title="technischer Untersuchungsraum" />
                	    <img src="images_home/009.jpg" width="443" height="294" alt="" title="Wartezimmer" />
                    </div>
              </div>
            </div>
        </div>
        <div id="ariart">
        	<div class="art_prx">
            	<h1>Arzt Praxis</h1>
                <div class="arilink">
                	<ul>
                    	<li>Allgemein und Innere Medizin</li>
                    	<li>Gynäkologie und Schwangerenbetreuung</li>
                    	<li>Dermatologie, Hautkrankheiten</li>
                    	<li>Notfallmedizin</li>
                    	<li>Kinder und Säuglingsbetreuung</li>
                    	<li>Check-Up Untersuchungen</li>
                    	<li>Reiseberatung</li>
                    	<li>Röntgenuntersuchungen</li>
                    	<li>Gesprächstherapie Kinder und Erwachsene</li>
                    	<li><a href="angebot.php">weitere Informationen auf der Seite Angebot</a></li>
                    </ul>
                </div>
            </div>
            <div class="ariort">
            	<h1>Ort</h1>
  <span>Dorfstrasse 43, 8630 Rüti<br/>
  gegenüber vom Bahnhof Rüti ZH<br />
  Tel : 055 555 05 05<br />
                E-mail : <a href="mailto:praxis@praxisambahnhof.ch">praxis@praxisambahnhof.ch</a></span>
                <div class="partner"><img src="images/medix.png" width="150" height="50" /><img src="images/equam.png" width="150" height="152" /></div>
              <div class="arifooter">&copy; by <a href="http://www.jz-design.ch" target="_blank">jz-design.ch</a></div>
            </div>
        </div>
    </td>
  </tr>
</table>
    <script type="text/javascript" src="script/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="script/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>

</body>
</html>
