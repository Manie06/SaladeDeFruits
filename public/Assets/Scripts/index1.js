//Déclaration des variables
var donnees=[];
var donneesSortantes=[];

//On met des éléments du DOM dans des variables
var activiteName=document.getElementById("form_titre_activite");
var recapActivite=document.getElementById("nameActivite");
var description=document.getElementById("form_description_activite");
var recapDescription=document.getElementById("descriptionActivite");
var enregistre=document.getElementById("suivant");

console.log('toto');
//*******************************Activité 1********************//
//Fonction qui affiche dans le récap
function afficher1(){
    //On injecte du HTML instantannément
    recapActivite.innerHTML=`<strong>Nom activité : </strong><p>${activiteName.value}</p>`;
    //On retourne ce que l'on écrit pour l'enregistrer dans le local storage par la suite
    return(activiteName.value);
}

function afficher2(){

    recapDescription.innerHTML=`<strong>Description activité : </strong><p>${description.value}</p>`;
    return(description.value);
}

function enregistrer1(){
    //On met les données dans un objet 
   const donnee={
       activite:activiteName.value,
       description:description.value

   }
   //On créé un tableau d'objet pour avoir l'historique

    donnees.push(donnee);
    
    //On passe le tableau donnees dans le local strorange en le stringify au passage
    window.localStorage.setItem('cle',JSON.stringify(donnees));
    console.log(donnees);
    affichage();
}

function affichage (){
    //je cherche le local storage
    var data=window.localStorage.getItem("cle");
    //je teste sil y a quelque chose dedans
    if(data!=null && data != ''){
        //je le parse et j'obtiens un tableau d'objet
        data=JSON.parse(data);
    // //je remplace le tableau par ce qui provient du loca storage
    // donnees=data;
    //
 }


    var retour=document.getElementById("retour");
    
    var string='';
    
    for(index=0;index<donnees.length;index++){
        let date=data[index];
        //On met un article qui inclu un icone dans du HTML, data contacts nous permet de mettre des nombres caches
        string+=`<article class="card-body" id="save-contact">
                    
                    <i class="delete fas fa-trash-alt"></i>`
                    +date.activite+`<br>`+date.description+
                    `</article>`; 

    }

    retour.innerHTML=string; 

    
}

//Code principal
// Mettre la fonction 'DOMContentLoaded' pour que le JS s'execute aprés le chargement de la page en cours
document.addEventListener('DOMContentLoaded', function () {
    activiteName.addEventListener("keyup",afficher1);
    description.addEventListener("keyup",afficher2);
    enregistre.addEventListener("click",enregistrer1);
});
