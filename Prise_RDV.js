var boutonElt = document.getElementById("RetourDossierPatient");

boutonElt.addEventListener("click", function () {
    console.log("clic");
    console.log("Le récapitulatif a été envoyé");
    top.location.href='Dossier_Patient.html';

});
