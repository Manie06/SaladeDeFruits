//Déclaration des varianles

var heureDebut;
var recapHeureDebut;
var heureFin;
var recapHeureFin;
var donnees=[];
var enregistre;
var lieuActivite;



heureDebut=document.getElementById("form_date_debut_time_hour");
recapHeureDebut=document.getElementById("debutActivite");
heureFin=document.getElementById("form_date_fin_time_hour");
recapHeureFin=document.getElementById("finActivite");
enregistre=document.getElementById("suivant");


//*******************************Activité 1********************//
//Fonction qui affiche dans le récap

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
    
    window.localStorage.setItem('cle3',JSON.stringify(donnees));
    affichage();
}

function affichage (){
    //je cherche le local storage
    var data=window.localStorage.getItem('cle3');
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
document.addEventListener('DOMContentLoaded', function (){
    
    heureDebut.addEventListener("click",afficher8);
    heureFin.addEventListener("click",afficher9);
    enregistre.addEventListener("click",enregistrer3);
});

var data=localStorage.getItem("cle");
data=JSON.parse(data);
console.log(data)
recapActivite=document.getElementById("nameActivite");
var string='';
    
for(index=0;index<data.length;index++){
        var date=data[index];
        //On met un article qui inclu un icone dans du HTML, data contacts nous permet de mettre des nombres caches
        string+=

        `<strong>Nom activité : </strong><p>${date.activite}</p>
        <strong>Description activité : </strong><p>${date.description}</p>`
       
}

var data1=localStorage.getItem("cle2");
 data1=JSON.parse(data1);
 console.log(data1)
 lieuActivite=document.getElementById("lieuActivite");
 console.log(lieuActivite);
    
var string1='';
    
for(index=0;index<data1.length;index++){
        var date1=data1[index];
        //On met un article qui inclu un icone dans du HTML, data contacts nous permet de mettre des nombres caches
        string1+=

        `<strong>Lieu activité : </strong><p>${date1.lieuActivite}</p>
        <strong>Code postal : </strong><p>${date1.codePostalActivite}</p>
        <strong>Ville: </strong><p>${date1.villeActivite}</p>
        <strong>Transport: </strong><p>${date1.transport}</p>`
        
       
    }
//Ca charge toutes les fonctions a mettre, il en faut q'un ! 
window.onload=function(){
    recapActivite.innerHTML=string;
    lieuActivite.innerHTML=string1; 
}


