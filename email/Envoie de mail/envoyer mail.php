<?php
if(isset($_POST['mailform']))

$header="MIME-Version: 1.0\r\n";
$header='From:"Plateforme AIT"<plateforme.ait@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='
Bonjour, veuillez trouver ci-joint le lien permettant de confirmer votre authentification sur la plateforme A2IT
';

mail("plateforme.ait@gmail.com", "Vérification d'identification plateforme A2IT !", $message, $header);

?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>