// Déclaration pour affichage

let popup = document.querySelector('#popup');
let section = document.querySelector('#popup section');

// récupération du bouton submit
let calculTotal = document.getElementById('btnCalculTotal');

// récup des 6 champs
let perf1 = document.getElementById('perf1');
let perf2 = document.getElementById('perf2');
let perf3 = document.getElementById('perf3');
let perf4 = document.getElementById('perf4');
let perf5 = document.getElementById('perf5');
let perf6 = document.getElementById('perf6');

// Préparation de la fonction de tests.
calculTotal.addEventListener('click', testCalculTotal);

// Préparation variables
let remplacementVirgule ;
let remplacementVirgule2 ;
let remplacementVirgule3 ;
let remplacementVirgule4 ;
let remplacementVirgule5 ;
let remplacementVirgule6 ;

let erreurs;
let ready1 = '';
let ready2 = '';
let ready3 = '';
let ready4 = '';
let ready5 = '';
let ready6 = '';



function testCalculTotal(){
  let form = document.querySelector('form[name=form_calcul_moyenne]');

  erreurs = '';
  // Formatage
  remplacementVirgule = perf1.value.replace(',', '.');
  ready1 = remplacementVirgule;
  remplacementVirgule2 = perf2.value.replace(',', '.');
  ready2 = remplacementVirgule2;
  remplacementVirgule3 = perf3.value.replace(',', '.');
  ready3 = remplacementVirgule3;
  remplacementVirgule4 = perf4.value.replace(',', '.');
  ready4 = remplacementVirgule4;
  remplacementVirgule5 = perf5.value.replace(',', '.');
  ready5 = remplacementVirgule5;
  remplacementVirgule6 = perf6.value.replace(',', '.');
  ready6 = remplacementVirgule6;

  // Vérifications des champs
  if ((ready1 < 0) || (ready2 < 0) || (ready3 < 0) || (ready4 < 0) || (ready5 < 0) || (ready6 < 0)) {
    erreurs += '<li>Tu ne peux pas avoir de perf négative!</li>';
    event.preventDefault();
  }
  if((isNaN(ready1) || isNaN(ready2) || isNaN(ready3) || isNaN(ready4) || isNaN(ready5) || isNaN(ready6)) && ((ready1 != '') || (ready2 != '') || (ready3 != '') || (ready4 != '') || (ready5 != '') || (ready6 != ''))){
    erreurs += '<li>Il ne faut saisir que des nombres!</li>';
    event.preventDefault();
  }
  if((ready1 == '') && (ready2 == '') && (ready3 == '') && (ready4 == '') && (ready5 == '') && (ready6 == '')){
    erreurs += '<li>Tu n\'as rentré aucune valeur!</li>';
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
