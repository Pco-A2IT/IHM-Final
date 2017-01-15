
var boutonElt1 = document.getElementById("menu1");
var boutonElt2 = document.getElementById("menu2");
var boutonElt3= document.getElementById("menu3");
var boutonElt4 = document.getElementById("menu4");
var boutonElt5 = document.getElementById("RetourDossierPatient");


boutonElt1.addEventListener("click", function () {
    console.log("clic1");
    console.log("Le récapitulatif a été envoyé");
     top.location.href='Calendrier.html'; 
});

boutonElt2.addEventListener("click", function () {
    console.log("clic2");
     top.location.href='Liste_Services.html'; 
});

boutonElt3.addEventListener("click", function () {
    console.log("clic3");
    console.log("Le récapitulatif a été envoyé");
    top.location.href='Liste_Patients.html'; 
});

boutonElt4.addEventListener("click", function () {
    console.log("clic4");
    console.log("Le récapitulatif a été envoyé");
    top.location.href='Liste_Medecins.html';
});