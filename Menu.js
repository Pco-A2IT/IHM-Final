var boutonElt = document.getElementById("btn_liste_centres");
var boutonElt2 = document.getElementById("btn_liste_patients");
var boutonElt3 = document.getElementById("btn_calendrier");
var boutonElt4 = document.getElementById("btn_nouveau_patient");
// Ajout d'un gestionnaire pour l'événement click


boutonElt.addEventListener("click", function () {
    console.log("clic");
    console.log("Le récapitulatif a été envoyé");
     top.location.href='Liste_Centres.html';
    window.close();

});

boutonElt2.addEventListener("click", function () {
    console.log("clic2");
    
     top.location.href='Liste_Patients.html';

});

boutonElt3.addEventListener("click", function () {
    console.log("clic3");
   
     top.location.href='Calendrier.html';
});

boutonElt4.addEventListener("click", function () {
    console.log("clic4");
   
    top.location.href='Dossier_Patient.html';
});
