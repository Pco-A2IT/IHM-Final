var boutonElt = document.getElementById("btn_liste_centres");
var boutonElt2 = document.getElementById("btn_liste_patients");
var boutonElt3 = document.getElementById("btn_calendrier");
var boutonElt4 = document.getElementById("btn_nouveau_patient");
// Ajout d'un gestionnaire pour l'événement click


boutonElt.addEventListener("click", function () {
    console.log("clic");
    console.log("Le récapitulatif a été envoyé");
    window.open('Liste_Centres.html','nom_de_ma_popup','fullscreen=yes, menubar=no, scrollbars=no'); 

});

boutonElt2.addEventListener("click", function () {
    console.log("clic2");
    
    window.open('Liste_Patients.html','nom_de_ma_popup','fullscreen=yes, menubar=no, scrollbars=no');
    window.close();

});

boutonElt3.addEventListener("click", function () {
    console.log("clic3");
    

    window.open('Calendrier.html','nom_de_ma_popup','fullscreen=yes, menubar=no, scrollbars=no');
});

boutonElt4.addEventListener("click", function () {
    console.log("clic4");
    window.open('Dossier_Patient.html','nom_de_ma_popup','fullscreen=yes, menubar=no, scrollbars=no');
});
