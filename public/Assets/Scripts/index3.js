//Déclaration des varianles
let dateActivite;
let recapDateActivite;
let heureDebut;
let recapHeureDebut;
let heureFin;
let recapHeureFin;
let donnees=[];
let enregistre;


dateActivite=document.getElementById("activite-rdv-date");
recapDateActivite=document.getElementById("dateActivite");
heureDebut=document.getElementById("activite-rdv-heure");
recapHeureDebut=document.getElementById("debutActivite");
heureFin=document.getElementById("activite-retour-heure");
recapHeureFin=document.getElementById("finActivite");
enregistre=document.getElementById("suivant");


//*******************************Activité 1********************//
//Fonction qui affiche dans le récap
function afficher7(){

    recapDateActivite.innerHTML=`<strong>Date : </strong><p>${dateActivite.value}</p>`;
    //On retourne ce que l'on écrit pour l'enregistrer par la suite
    return(dateActivite.value);
}

function afficher8(){

    recapHeureDebut.innerHTML=`<strong>Heure de début : </strong><p>${heureDebut.value}</p>`;
    return(heureDebut.value);
}

function afficher9(){

    recapHeureFin.innerHTML=`<strong>Heure de fin : </strong><p>${heureFin.value}</p>`;
    return(heureFin.value);
}

function enregistrer3(){
   
    donnees.push(dateActivite.value);
    donnees.push(heureDebut.value);
    donnees.push(heureFin.value);
    
    window.localStorage.setItem('cle',JSON.stringify(donnees));
    affichage();
}

function affichage (){
    //je cherche le local storage
    let data=window.localStorage.getItem('cle');
    console.log(data);
    //je teste sil y a quelque chose dedans
    if(data!=null && data != ''){
        //je le parse et j'obtiens un tableau d'objet
        data=JSON.parse(data);
    //je remplace le tableau par ce qui provient du loca storage
    donneesSortantes=data;
    console.log(donneesSortantes);
    }
}

//Code principal
dateActivite.addEventListener("click",afficher7);
heureDebut.addEventListener("keyup",afficher8);
heureFin.addEventListener("keyup",afficher9);
enregistre.addEventListener("click",enregistrer3);
