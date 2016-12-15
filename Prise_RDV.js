var boutonElt = document.getElementById("RetourDossierPatient");

boutonElt.addEventListener("click", function () {
    console.log("clic");
    console.log("Le récapitulatif a été envoyé");
    window.open('Dossier_Patient.html','nom_de_ma_popup','fullscreen=yes, menubar=no, scrollbars=no'); 
});
