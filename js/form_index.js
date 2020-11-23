// Déclaration pour affichage

let popup = document.querySelector('#popup');
let section = document.querySelector('#popup section');

// Déclaration pour poule + élim

let pouleElim = document.getElementById('btnPouleElim');
let pointsElim = document.getElementById('points_elim');
let matchElim = document.getElementById('match_elim');

// Déclaration pour poule unique

let pouleUnique = document.getElementById('btnPouleUnique');
let pointsUnique = document.getElementById('points_unique');
let matchUnique = document.getElementById('match_unique');

// Déclaration pour Elimination directe

let elimDirecte = document.getElementById('btnElimDirecte');
let pointsElimDirecte = document.getElementById('points_elim_directe');

// Déclaration pour ITC

let icd = document.getElementById('icd');
let icr = document.getElementById('icr');
let icn = document.getElementById('icn');
let tpe = document.getElementById('tpe');

let pointsItcSimple = document.getElementById('points_itc_simple');
let pointsItcDouble1 = document.getElementById('points_itc_double1');
let pointsItcDouble2 = document.getElementById('points_itc_double2');
let itcDouble = document.getElementById('btnInterclubsDouble');

// Préparation variables pour les fonctions

let remplacementVirgule ;
let remplacementVirgule1 ;
let remplacementVirgule2 ;
let ready;
let ready1;
let ready2;
let erreurs;
// Déclenchement des fonctions aux clicks sur envoi des formulaires

pouleElim.addEventListener('click', testPouleElim);
pouleUnique.addEventListener('click', testPouleUnique);
elimDirecte.addEventListener('click', testElimDirecte);
itcDouble.addEventListener('click', testItcDouble);


// SELECTIONNER TOUS LES BOUTONS. PUIS ONCLICK value== id du bouton sélectionné.
// Puis en PHP récupérer la value que j'aurai inséré en HTML
// Fonction pour poule + elim

function testPouleElim(){
  let form = document.querySelector('form[name=form_poule_elim]');

  erreurs = '';
  let ready;
  ready ='';

  if (pointsElim.value != ""){
    remplacementVirgule = pointsElim.value.replace(',', '.');
    ready = parseInt(remplacementVirgule, 10);
  }
  // Vérifications des champs
  if ((ready == "") || (matchElim.value == "")) {

    erreurs += '<li>Tu n\'as pas saisi toutes les valeurs</li>';
    event.preventDefault();
  }
  else if(ready<3) {
    erreurs += '<li>La série vaut au minimum 3 points!</li>';
    event.preventDefault();
  }
  if(isNaN(ready)){
    erreurs += '<li>Il ne faut saisir que des nombres!</li>';
    event.preventDefault();
  }

  let decompte = function() {
    popup.classList.remove('actif');
  };
  if (erreurs!='') {
    section.innerHTML = '<ul>'+erreurs+'</ul>';
    popup.classList.add('actif');
    setTimeout(decompte,2000);  } else {
    form.submit();
  }
};

// Fonction pour poule unique

function testPouleUnique(e){

  let form = document.querySelector('form[name=form_poule_unique]');

  erreurs = '';

    let ready;
    ready='';
  // Formatage


  // Vérification des champs
  if (pointsUnique.value != ''){
    remplacementVirgule = pointsUnique.value.replace(',', '.');
    ready = parseFloat(remplacementVirgule, 10);
  }

  if ((ready == "") || (matchUnique.value == "")) {
    remplacementVirgule = pointsUnique.value.replace(',', '.');
    ready = parseFloat(remplacementVirgule, 10);
    erreurs += '<li>Tu n\'as pas saisi toutes les valeurs</li>';
    event.preventDefault();
  }
  if(ready<3) {
    erreurs += '<li>La poule vaut au minimum 3 points!</li>';
    event.preventDefault();
  }
  if(isNaN(ready) && (isNaN(matchUnique.value))){
    erreurs += '<li>Il faut saisir un nombre!</li>';
    event.preventDefault();
  }
  if((matchUnique.value!='') && (matchUnique.value>7 || matchUnique.value<3)){
    erreurs +='<li>Une poule unique est forcément constituée de 3 à 7 joueurs/paires!</li>';
    event.preventDefault();
  }
  let decompte = function() {
    popup.classList.remove('actif');
  };
  if (erreurs!='') {
    section.innerHTML ='<ul>'+erreurs+'</ul>';
    popup.classList.add('actif');
    setTimeout(decompte,2000);  } else {
    form.submit();
  }
  };


// Fonction pour Elimination directe

function testElimDirecte(e) {


  let form = document.querySelector('form[name=form_elim_directe]');

  erreurs = '';

  let ready;
  ready= '';
  // Vérification des champs


    if (pointsElimDirecte.value != "") {
      remplacementVirgule = pointsElimDirecte.value.replace(',', '.');
      ready = parseFloat(remplacementVirgule, 10); }


  if (ready == ''){
  erreurs +='<li>Tu n\'as pas saisi de valeur !</li>';
  event.preventDefault();
  }
  else if (ready < 3) {
    erreurs +='<li>La série vaut au minimum 3 points!</li>';
    event.preventDefault();
}
  if(isNaN(ready)){
    erreurs +='<li>Il faut saisir un nombre!</li>';
    event.preventDefault();
}
  let decompte = function() {
    popup.classList.remove('actif');
  };
  if (erreurs!='') {
    section.innerHTML ='<ul>'+erreurs+'</ul>';
    popup.classList.add('actif');
    setTimeout(decompte,2000);  } else {
    form.submit();

  };

}


// Fonction pour ITC Double
function testItcDouble(e) {


  let form = document.querySelector('form[name=form_itc_equipe]');

  erreurs = '';
  // Formatage

  if (pointsItcSimple.value != "") {
    remplacementVirgule = pointsItcSimple.value.replace(',', '.');
    ready = parseFloat(remplacementVirgule, 10);

  }
  if (pointsItcDouble1.value!= "") {
    remplacementVirgule1 = pointsItcDouble1.value.replace(',', '.');
    ready1 = parseFloat(remplacementVirgule1, 10);
  }
  if (pointsItcDouble2.value!= "") {
    remplacementVirgule2 = pointsItcDouble2.value.replace(',', '.');
    ready2 = parseFloat(remplacementVirgule2, 10);
  }

  // Vérification des champs

    if ((ready1 < 0) || (ready2 <0) || (ready <0)) {
    erreurs +='<li>Il n\'est pas possible d\'avoir des points négatifs !</li>';
    event.preventDefault();
}
    if(isNaN(ready) && (isNaN(ready2)) && (isNaN(ready1))){
    erreurs +='<li>Tu dois saisir au moins un nombre !</li>';
    event.preventDefault();
}
    if((typeof ready == "number") && (typeof ready1 == "number") && (typeof ready2 == "number")){
    erreurs +='<li>Tu ne peux avoir affronté 3 personnes !</li>';
    ready1 = '';
    ready2 = '';
    ready = '';
    event.preventDefault();
}
    if(((typeof ready1 == "number") && (typeof ready2 == "undefined")) || ((typeof ready1 =="undefined") && (typeof ready2 == "number"))){
    erreurs +='<li>Tu dois saisir les points des deux joueurs de la paire!</li>';
    event.preventDefault();
}
  let decompte = function() {
    popup.classList.remove('actif');
  };
  if (erreurs!='') {
    section.innerHTML ='<ul>'+erreurs+'</ul>';
    popup.classList.add('actif');
    setTimeout(decompte,2000);  } else {
    form.submit();

  };
};
// Gestion boutons ICD/ICR/ICN/TPE

let btna = document.querySelectorAll('input[type="button"]');
let envoiValue = document.getElementById('rankITC');

btna[0].addEventListener('click',function(){
  btna[0].style.backgroundColor="#345beb";
  btna[1].style.backgroundColor="#a8a8a8";
  btna[2].style.backgroundColor="#a8a8a8";
  btna[3].style.backgroundColor="#a8a8a8";
  envoiValue.value="ICD";

});

btna[1].addEventListener('click',function(){
  btna[1].style.backgroundColor="#345beb";
  btna[0].style.backgroundColor= "#a8a8a8";
  btna[2].style.backgroundColor= "#a8a8a8";
  btna[3].style.backgroundColor= "#a8a8a8";
  envoiValue.value="ICR";
});

btna[2].addEventListener('click',function(){
  btna[2].style.backgroundColor="#345beb";
  btna[1].style.backgroundColor= "#a8a8a8";
  btna[0].style.backgroundColor= "#a8a8a8";
  btna[3].style.backgroundColor= "#a8a8a8";
  envoiValue.value="ICN";

});

btna[3].addEventListener('click',function(){
  btna[3].style.backgroundColor="#345beb";
  btna[0].style.backgroundColor= "#a8a8a8";
  btna[1].style.backgroundColor= "#a8a8a8";
  btna[2].style.backgroundColor= "#a8a8a8";
  envoiValue.value="TPE";
});
