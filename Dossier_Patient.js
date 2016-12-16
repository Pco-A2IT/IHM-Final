var boutonElt = document.getElementById("menu1");
var boutonElt2 = document.getElementById("menu5");
var boutonElt3 = document.getElementById("menu3");
var boutonElt4 = document.getElementById("menu2");
var boutonElt5 = document.getElementById("menu4");
var boutonElt6 = document.getElementById("myButton1");
var boutonElt7 = document.getElementById("myButton2");
var boutonElt8 = document.getElementById("RetourDossierPatient");
// Ajout d'un gestionnaire pour l'événement click

boutonElt.addEventListener("click", function () {
    console.log("clic");
    top.location.href='Menu.html';

});

boutonElt2.addEventListener("click", function () {
    console.log("clic2");
    top.location.href='Calendrier.html';

});

boutonElt3.addEventListener("click", function () {
    console.log("clic3");
    top.location.href='Liste_Centres.html';
});

boutonElt4.addEventListener("click", function () {
    console.log("clic4");
    top.location.href='Liste_Patients.html';
});
boutonElt5.addEventListener("click", function () {
    console.log("clic5");
    top.location.href='Dossier_Patient.html';
});
boutonElt6.addEventListener("click", function () {
    console.log("clic6");
    top.location.href='Prise_RDV.html';
    
    
});

boutonElt7.addEventListener("click", function () {
    console.log("clic7");
    
    //console.log(document.getElementById("civilite").value);
    //console.log(document.getElementById("nom_p").value);
    //console.log(document.getElementById("prenom_p").value);
    
    

    var identite = document.getElementById("civilite").value +" "+ document.getElementById("nom_p").value+" "+ document.getElementById("prenom_p").value +" né(e) le"+document.getElementById("date10_jour").value+"/"+document.getElementById("date10_mois").value+"/"+document.getElementById("date10_annee").value ;
    console.log(identite);
    
    
    var coordonnee= "Numero de telephone :"+ document.getElementById("telephone_p").value + " adresse: "+ document.getElementById("adresse_p").value + " Ville: "+ document.getElementById("ville_p").value+ " Code Postal: "+ document.getElementById("codePostal_p").value;
    console.log(coordonnee);   
    
    var medecinTraitant= "Medecin Traitant : "+ document.getElementById("nom_mt").value+" "+ document.getElementById("prenom_mt").value + " Email: "+ document.getElementById("email_mt").value+ " Telephone: "+ document.getElementById("telephone_mt").value;
    console.log(medecinTraitant);
    
    var medecinUrgentiste= "Medecin Urgentiste : "+ document.getElementById("nom_mu").value+" "+ document.getElementById("prenom_mu").value + " Email: "+ document.getElementById("email_mu").value+ " Telephone: "+ document.getElementById("telephone_mu").value;
    
    console.log(medecinUrgentiste);
    
    var medecinUrgentiste= "Medecin Urgentiste : "+ document.getElementById("nom_mu").value+" "+ document.getElementById("prenom_mu").value + " Email: "+ document.getElementById("email_mu").value+ " Telephone: "+ document.getElementById("telephone_mu").value;
    
    console.log(medecinUrgentiste);
    
    var bilanPremiereIntention=" Les bilans de première intentions en urgence déjà réalisé(s) sont: ";
    if (document.getElementById("Scan").checked === true){bilanPremiereIntention = bilanPremiereIntention+' '+ "le Scan cérébral" +', '}
    if (document.getElementById("AngioScan").checked === true){bilanPremiereIntention =bilanPremiereIntention+' '+"l'angioscan"+', '}
    if (document.getElementById("Bilan Biologique").checked === true){bilanPremiereIntention=bilanPremiereIntention+' '+"le bilan biologique"+'. '}
    console.log(bilanPremiereIntention);
    
    var bilanSecondeIntention=" Les bilans de seconde intentions en urgence déjà réalisé(s) sont: ";
    var irm=" L'IRM est";
    var ett=" Le bilan cardiaque est";
    var neuro=" Le bilan neurologique est";
    if (document.getElementById("irmp").checked === true){irm = irm +' '+ "plannifiée" +', '}
    if (document.getElementById("irmp").checked === true){irm = irm +' '+ " et réalisée" +', '}
    
    if (document.getElementById("ettp").checked === true){ett = ett +' '+ "plannifié" +', '}
    if (document.getElementById("ettp").checked === true){ett = ett +' '+ "et réalisé" +', '}
    
    if (document.getElementById("neurop").checked === true){neuro = neuro +' '+ "plannifié" +', '}
    if (document.getElementById("neurop").checked === true){neuro = neuro +' '+ "et réalisé" +'.'}
    
    console.log(irm+ett+neuro);
    
    var recap_mt="Le récapitulatif est envoyé au médecin traitant:";
    var recap_mu="Le récapitulatif est envoyé au médecin urgentiste:";
    
    if (document.getElementById("recap_mt").checked === true){recap_mt = recap_mt+' '+ "oui" +'. '}
    else{recap_mt = recap_mt+' '+ "non" +'. '}
    if (document.getElementById("recap_mu").checked === true){recap_mu =recap_mu+' '+"oui"+', '}
    else{recap_mu = recap_mu+' '+ "non" +'. '}
   
    console.log(recap_mt+recap_mu);
    
    if(confirm(identite+coordonnee)){
       if(confirm(medecinTraitant + medecinUrgentiste)){
           if(confirm(bilanPremiereIntention)){
                if(confirm(irm+ett+neuro)){
                    if(confirm(irm+ett+neuro)){
                        //top.location.href='Dossier_Patient.html';
                    }
           
                }
           
            }
       }
    }
    
});

boutonElt8.addEventListener("click", function () {
    console.log("clic8");
    top.location.href='Dossier_Patient.html';

});
