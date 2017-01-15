<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="keywords" content="keyword1,keyword2,keyword3"> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8">  
<script src="Dossier_Patient.js" type="text/javascript"> 
</script> 
<script type="text/javascript"> 
function play(){ 
document.getElementById("menu_item").style.display = ""; 
} 
function noplay(){ 
document.getElementById("menu_item").style.display = "none"; 
} 
</script>
<style type="text/css">
    .table { 
width:auto; 
} 
tr { 
font-family: "Calibri"; 
font-weight:bold; 
color: #1270B3; 
} 
input{ 
border: 1px solid #1270B3; 
color: #1270B3; 
font-weight:bold; 
font-family: "arial"; 
height: 35px; 
width: 150px;
line-height: 30px; 
border-radius:5px; 
} 
.submit { 
width: 150px; 
height: 40px; 
cursor :hand;
font-size: 20px; 
color: #ffffff; 
font-family: "Calibri"; 
background-color: #1270B3; 
border: 0px; 
} 
.thead { 
height: 40px; background : #1270B3; 
font-family: "Calibri"; 
font-size: 30px; 
font-weight: 700; 
color: #ffffff; 
background: #1270B3; 
} 
#3{ 
margin-bottom: 100px; 
} 
    </style>
</head> 
<body>
<form action="AjoutBDD_dossierPatient.php" method="post"> 
<table align="left" cellspacing="5px" class="table"> 
<tr> 
<td align="right">Civilité:</td>
<td align="left"><input type="text" name="civilite_p" placeholder="civilité" list="c"/>
    <datalist id="c">
            <option>Mr</option>
            <option>Mme</option>
    </datalist>
    </td>
    </tr>
<tr>
<td align="right">Nom:</td> 
<td align="left"><input type="text" name="nom_p" placeholder="nom" required/></td>
</tr>
<tr>
<td align="right">Prénom:</td> 
<td align="left"><input type="text" name="prenom_p" placeholder="prénom" required/></td>
</tr>  
<tr> 
<td align="right">Date de naissance:</td> 
<td align="left"><input type="date" name="birthday_p" /></td> 
    
<!--script language="JavaScript">writeSource("js10");</script>
                                <input class="inputDate" style="width:50px" name="date10_jour" id="date10_jour" value="" size="2" type="text"  placeholder="jj"> /
                                <input class="inputDate" style="width:50px" name="date10_mois" id="date10_mois"value="" size="2" type="text"  placeholder="mm"> /
                                <input class="inputDate" style="width:100px" name="date10_annee" id="date10_annee" value="" size="3" type="text"  placeholder="aaaa">  -->

</tr>
<tr> 
<td align="right">Mail:</td>
<td align="left">
    <input type="email" name="mail_p" placeholder="mail" id="email" required/></td> 
</tr> 
<tr> 
<td align="right">Téléphone:</td> 
<td align="left"> 
<input type="tel" pattern="[0-9]{10}" id="p" name="telephone_p" placeholder="Input 10 numbers" /> 
</td> 
</tr> 
</table> 
    
<table align="right" cellspacing="5px" class="table"> 
<tr> 
<td align="right">Ville:</td> 
<td align="left"> 
<input type="text" name="ville_p" placeholder="choisir une ville" list="l"/> 
<datalist id="l"> 
<option value="LY">Lyon</option> 
<option value="Pr">Paris</option> 
<option value="Nt">Nante<option> 
<option value="Bt">Bretagne</option> 
<option value="Ms">Marseille</option> 
</datalist> 
</td> 
</tr> 
<tr> 
<td align="right"> 
Adresse: 
</td> 
<td align="left"> 
<input type="text" name="adresse_p" placeholder="Rue,Résidence" required/>
</td> 
</tr>
<tr> 
<td align="right">Code Postal:</td> 
<td align="left"> 
<input type="number" pattern="[0-9]{6}" id="p" name="codePostal_p" placeholder="Input 6 numbers" /> 
</td> 
</tr> 
<tr>
<td align="right">Médecin traitant:</td> 
<td align="left"> 
<input type="text" name="M_traitant" placeholder="choisir un nom" list="t"/> 
<datalist id="t"> 
<option>Luigi Bardi</option>
<option>Lucas Delabarre</option> 
    </datalist></td></tr>

<tr>
<td align="right">Médecin appelant:</td> 
<td align="left"> 
<input type="text" name="M_appelant" placeholder="choisi le nom" list="a"/> 
<datalist id="a"> 
<option>Luigi Bardi</option>
<option>Lucas Delabarre</option> 
    </datalist></td>
</tr>   
<tr height="60px"> 
<td align="center"  colspan="2"> 
    <input type="submit" accesskey="enter" value="Valider" id="btn" onmousemove="changeBgColor('btn')" onmouseout="recoverBgColor('btn');" class="submit" formmethod="post"/> 
</td> 
</tr> 
</table>
</form>
    
</body> 
</html> 