//Déclaration de variable
var lieuActivite;
var recapLieuActivite;
var codePostalActivite;
var recapCodePostalActivite;
var villeActivite;
var recapVilleActivite;
var transportActivite;
var recapTransportActivite;
var donnees=[];
var enregistre;
var recapActivite;

//On pointe sur nos rubriques
lieuActivite=document.getElementById("form_adresse_activite");
recapLieuActivite=document.getElementById("lieuActivite");
codePostalActivite=document.getElementById("form_code_postal_activite");
recapCodePostalActivite=document.getElementById("codePostalActivite");
villeActivite=document.getElementById("form_ville_activite");
recapVilleActivite=document.getElementById("villeActivite");
transportActivite=document.getElementById("form_moyen_transport");
recapTransportActivite=document.getElementById("transportActivite");
enregistre=document.getElementById("suivant");

//*******************************Activité 2********************

function afficher3(){

    recapLieuActivite.innerHTML=`<strong>Lieu activité : </strong><p>${lieuActivite.value}</p>`;
    //On retourne ce que l'on écrit pour l'enregistrer par la suite
    return(lieuActivite.value);
}

function afficher4(){

    recapCodePostalActivite.innerHTML=`<strong>Code postal : </strong><p>${codePostalActivite.value}</p>`;
    //On retourne ce que l'on écrit pour l'enregistrer par la suite
    return(codePostalActivite.value);
}

function afficher5(){

    recapVilleActivite.innerHTML=`<strong>Ville : </strong><p>${villeActivite.value}</p>`;
    //On retourne ce que l'on écrit pour l'enregistrer par la suite
    return(villeActivite.value);
}

function afficher6(){

    recapTransportActivite.innerHTML=`<strong>Transport : </strong><p>${transportActivite.value}</p>`;
    //On retourne ce que l'on écrit pour l'enregistrer par la suite
    return(transportActivite.value);
}

function enregistrer2(){
   
    const donnee={
        lieuActivite:lieuActivite.value,
        codePostalActivite:codePostalActivite.value, 
        villeActivite:villeActivite.value,
        transport:transportActivite.value, 
    }

    donnees.push(donnee);
   
    
    window.localStorage.setItem('cle2',JSON.stringify(donnees));
    affichage();
}

function affichage (){
    //je cherche le local storage
    var data=window.localStorage.getItem('cle2');
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
    lieuActivite.addEventListener("keyup",afficher3);
    codePostalActivite.addEventListener("keyup",afficher4);
    villeActivite.addEventListener("keyup",afficher5);
    transportActivite.addEventListener("click",afficher6);
    enregistre.addEventListener("click",enregistrer2);
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

window.onload=function(){
    recapActivite.innerHTML=string; 
}
    