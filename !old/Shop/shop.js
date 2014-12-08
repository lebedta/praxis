// PaB Shop Scripts
function Konfigurationsbutton_Doro_334_GSM() {
  if (document.Bestellung_Doro_334_GSM.Konfiguration[0].checked == true) {
	document.getElementById('Schritt3 mit Konfiguration').style.display='block';
	document.getElementById('Schritt4').style.display='none';
  }
	else if (document.Bestellung_Doro_334_GSM.Konfiguration[1].checked == true) {
    document.getElementById('Schritt2').style.display='block';
	document.getElementById('Schritt4').style.display='none';
  } else {
    document.write("");
  }
}
function validEmail(email) {

  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";

  var regex = new RegExp(strReg);

  return(regex.test(email));

}

function Eingaben_Doro_334_GSM_Konfigurationsbutton ()	{
  if (document.Bestellung_Doro_334_GSM.Konfiguration[0].checked == true) {
	Eingaben_Doro_334_GSM_mit_Konfiguration();
	}
  else if (document.Bestellung_Doro_334_GSM.Konfiguration[1].checked == true) {
	Eingaben_Doro_334_GSM_ohne_Konfiguration();
	} 
  else {
    document.write("");
  }
}

function Eingaben_Doro_334_GSM_ohne_Konfiguration ()	{
	if( Anzahl_Doro_334_GSM(Doro_334_GSM.Anzahl) == false
      ||  Vorname_Doro_334_GSM(Doro_334_GSM.Vorname) == false
      ||  Nachname_Doro_334_GSM(Doro_334_GSM.Nachname) == false
      ||  Adresse_Doro_334_GSM(Doro_334_GSM.Adresse) == false
      ||  PLZ_Doro_334_GSM(Doro_334_GSM.PLZ) == false
      ||  Ort_Doro_334_GSM(Doro_334_GSM.Ort) == false
      ||  Telefon_Doro_334_GSM(Doro_334_GSM.Telefon) == false
      ||  E_Mail_Doro_334_GSM(Doro_334_GSM.E_Mail) == false)   
           {
           Anzahl_Doro_334_GSM();
           Vorname_Doro_334_GSM();
           Nachname_Doro_334_GSM();
           Adresse_Doro_334_GSM();
           PLZ_Doro_334_GSM();
           Ort_Doro_334_GSM();
           Telefon_Doro_334_GSM();
           E_Mail_Doro_334_GSM();
		   alert("if schleife 2");
           }
	 else	{
		document.getElementById('Schritt6').style.display='none';
        document.getElementById('Schritt7').style.display='block';
		alert("else schleife 2");
	 }
}

function Eingaben_Doro_334_GSM_mit_Konfiguration ()	{
     if( Anzahl_Doro_334_GSM(Doro_334_GSM.Anzahl) == false
   ||  Vorname_Doro_334_GSM(Doro_334_GSM.Vorname) == false
   ||  Nachname_Doro_334_GSM(Doro_334_GSM.Nachname) == false
   ||  Adresse_Doro_334_GSM(Doro_334_GSM.Adresse) == false
   ||  PLZ_Doro_334_GSM(Doro_334_GSM.PLZ) == false
   ||  Ort_Doro_334_GSM(Doro_334_GSM.Ort) == false
   ||  Telefon_Doro_334_GSM(Doro_334_GSM.Telefon) == false
   ||  A_Name_Doro_334_GSM(Doro_334_GSM.A_Name) == false
   ||  A_Nummer_Doro_334_GSM(Doro_334_GSM.A_Nummer) == false
   ||  B_Name_Doro_334_GSM(Doro_334_GSM.B_Name) == false
   ||  B_Nummer_Doro_334_GSM(Doro_334_GSM.B_Nummer) == false
   ||  C_Name_Doro_334_GSM(Doro_334_GSM.C_Name) == false
   ||  C_Nummer_Doro_334_GSM(Doro_334_GSM.C_Nummer) == false
   ||  D_Name_Doro_334_GSM(Doro_334_GSM.D_Name) == false
   ||  D_Name_Doro_334_GSM(Doro_334_GSM.D_Nummer) == false
   ||  E_Notfallname_Doro_334_GSM(Doro_334_GSM.E_Notfallname) == false
   ||  E_Notfallnummer_Doro_334_GSM(Doro_334_GSM.E_Notfallnummer) == false
   ||  SOS_Taste_Name_Doro_334_GSM(Doro_334_GSM.SOS_Taste_Name) == false
   ||  SOS_Taste_Nummer_Doro_334_GSM(Doro_334_GSM.SOS_Taste_Nummer) == false
   ||  E_Mail_Doro_334_GSM(Doro_334_GSM.E_Mail) == false)   
     {
     Anzahl_Doro_334_GSM();
     Vorname_Doro_334_GSM();
     Nachname_Doro_334_GSM();
     Adresse_Doro_334_GSM();
     PLZ_Doro_334_GSM();
     Ort_Doro_334_GSM();
     Telefon_Doro_334_GSM();
     A_Name_Doro_334_GSM();
     A_Nummer_Doro_334_GSM();
     B_Name_Doro_334_GSM();
     B_Nummer_Doro_334_GSM();
     C_Name_Doro_334_GSM();
     C_Nummer_Doro_334_GSM();
     D_Name_Doro_334_GSM();
     D_Name_Doro_334_GSM();
     E_Notfallname_Doro_334_GSM();
     E_Notfallnummer_Doro_334_GSM();
     SOS_Taste_Name_Doro_334_GSM();
     SOS_Taste_Nummer_Doro_334_GSM();
     E_Mail_Doro_334_GSM();
	 alert("if schleife 1");
     }
       else
     {
        document.getElementById('Schritt6').style.display='none';
        document.getElementById('Schritt7').style.display='block';
		alert("else schleife 1");

     }
}


function Anzahl_Doro_334_GSM()	{
  if (document.Doro_334_GSM.Anzahl.value == "" || isNaN(document.Doro_334_GSM.Anzahl.value)) {
	  document.getElementById('Anzahl_Doro_334_GSM').style.display='block';
    return false; 
  }
}
function Vorname_Doro_334_GSM()	{
  if (document.Doro_334_GSM.Vorname.value == "") {
	  document.getElementById('Vorname_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function Nachname_Doro_334_GSM()	{
  if (document.Doro_334_GSM.Nachname.value == "") {
	  document.getElementById('Nachname_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function Adresse_Doro_334_GSM()	{
  if (document.Doro_334_GSM.Adresse.value == "") {
	  document.getElementById('Adresse_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function PLZ_Doro_334_GSM()	{
  if (document.Doro_334_GSM.PLZ.value == "" || isNaN(document.Doro_334_GSM.PLZ.value)) {
	  document.getElementById('PLZ_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function Ort_Doro_334_GSM()	{
  if (document.Doro_334_GSM.Ort.value == "") {
	  document.getElementById('Ort_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function Telefon_Doro_334_GSM()	{
  if (document.Doro_334_GSM.Telefon.value == "" || isNaN(document.Doro_334_GSM.Telefon.value)) {
	  document.getElementById('Telefon_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function A_Name_Doro_334_GSM()	{
  if (document.Doro_334_GSM.A_Name.value == "") {
	  document.getElementById('A_Name_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function A_Nummer_Doro_334_GSM()	{
  if (document.Doro_334_GSM.A_Nummer.value == "" || isNaN(document.Doro_334_GSM.A_Nummer.value)) {
	  document.getElementById('A_Nummer_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function B_Name_Doro_334_GSM()	{
  if (document.Doro_334_GSM.B_Name.value == "") {
	  document.getElementById('B_Name_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function B_Nummer_Doro_334_GSM()	{
  if (document.Doro_334_GSM.B_Nummer.value == "" || isNaN(document.Doro_334_GSM.B_Nummer.value)) {
	  document.getElementById('B_Nummer_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function C_Name_Doro_334_GSM()	{
  if (document.Doro_334_GSM.C_Name.value == "") {
	  document.getElementById('C_Name_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function C_Nummer_Doro_334_GSM()	{
  if (document.Doro_334_GSM.C_Nummer.value == "" || isNaN(document.Doro_334_GSM.C_Nummer.value)) {
	  document.getElementById('C_Nummer_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function D_Name_Doro_334_GSM()	{
  if (document.Doro_334_GSM.D_Name.value == "") {
	  document.getElementById('D_Name_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function D_Nummer_Doro_334_GSM()	{
  if (document.Doro_334_GSM.D_Nummer.value == "" || isNaN(document.Doro_334_GSM.D_Nummer.value)) {
	  document.getElementById('D_Nummer_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function E_Notfallname_Doro_334_GSM()	{
  if (document.Doro_334_GSM.E_Notfallname.value == "") {
	  document.getElementById('E_Notfallname_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function E_Notfallnummer_Doro_334_GSM()	{
  if (document.Doro_334_GSM.E_Notfallnummer.value == "" || isNaN(document.Doro_334_GSM.E_Notfallnummer.value)) {
	  document.getElementById('E_Notfallnummer_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function SOS_Taste_Name_Doro_334_GSM()	{
  if (document.Doro_334_GSM.SOS_Taste_Name.value == "") {
	  document.getElementById('SOS_Taste_Name_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function SOS_Taste_Nummer_Doro_334_GSM()	{
  if (document.Doro_334_GSM.SOS_Taste_Nummer.value == "" || isNaN(document.Doro_334_GSM.SOS_Taste_Nummer.value)) {
	  document.getElementById('SOS_Taste_Nummer_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
function E_Mail_Doro_334_GSM()	{
  if (!validEmail(document.Doro_334_GSM.E_Mail.value)) {
	  document.getElementById('E_Mail_Doro_334_GSM').style.display='block';
    return false; 
  } 
}
