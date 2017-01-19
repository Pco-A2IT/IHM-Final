
var boutonElt6 = document.getElementById("btn_prise_rdv");
var boutonElt7 = document.getElementById("btn_recap");
var boutonElt8 = document.getElementById("RetourDossierPatient");
// Ajout d'un gestionnaire pour l'événement click


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


function ChkAllClick(sonName, cbAllId){ 
var arrSon = document.getElementsByName(sonName); 
var cbAll = document.getElementById(cbAllId); 
var tempState=cbAll.checked; 
for(i=0;i<arrSon.length;i++) { 
if(arrSon[i].checked!=tempState) 
arrSon[i].click(); 
} 
} 
function ChkSonClick(sonName, cbAllId) { 
var arrSon = document.getElementsByName(sonName); 
var cbAll = document.getElementById(cbAllId); 
for(var i=0; i<arrSon.length; i++) { 
if(!arrSon[i].checked) { 
cbAll.checked = false; 
return; 
} 
} 
cbAll.checked = true; 
} 
function ChkOppClick(sonName){ 
var arrSon = document.getElementsByName(sonName); 
for(i=0;i<arrSon.length;i++) { 
arrSon[i].click(); 
} 
} 
function changeBgColor(btn){ 
var btn = document.getElementById(btn); 
btn.style.backgroundColor = "#90BFFF" 
} 
function recoverBgColor(btn){ 
var btn = document.getElementById(btn); 
btn.style.backgroundColor = "#1270B3" 
} 