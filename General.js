var boutonElt1 = document.getElementById("menu1");
var boutonElt2 = document.getElementById("menu5");
var boutonElt3 = document.getElementById("menu3");
var boutonElt4= document.getElementById("menu2");
var boutonElt5 = document.getElementById("menu4");
var boutonElt6 = document.getElementById("RetourDossierPatient");

boutonElt1.addEventListener("click", function () {
    console.log("clic1");
    console.log("Le récapitulatif a été envoyé");
     top.location.href='Menu.html';
    window.close();
});


boutonElt2.addEventListener("click", function () {
    console.log("clic2");
    console.log("Le récapitulatif a été envoyé");
     top.location.href='Calendrier.html'; 
});

boutonElt3.addEventListener("click", function () {
    console.log("clic3");
    console.log("Le récapitulatif a été envoyé");
    top.location.href='Liste_Centres.html'; 
});

boutonElt4.addEventListener("click", function () {
    console.log("clic4");
    console.log("Le récapitulatif a été envoyé");
    top.location.href='Liste_Patients.html';
});

boutonElt5.addEventListener("click", function () {
    console.log("clic5");
    console.log("Le récapitulatif a été envoyé");
    top.location.href='Dossier_Patient.html';
});

boutonElt6.addEventListener("click", function () {
    console.log("clic6");
    console.log("Le récapitulatif a été envoyé");
    top.location.href='Dossier_Patient.html';; 
});

