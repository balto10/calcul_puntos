<?php
$coef = '';
$result = '';

if(isset($_POST['valider_elim'])) {

  $points_elim_no_int=$_POST['points_elim'];
  $match_elim_no_int=$_POST['match_elim'];

  $points_elim=(float)$points_elim_no_int;
  $match_elim=(int)$match_elim_no_int;
  // Formatage

  $formated_points_elim = str_replace(',', '.', $points_elim);
  $formated_match_elim = str_replace(',', '.', $match_elim);

  // Partie poule + éliminatoire
  function stade_tournoi($formated_points_elim, $taux) {
    return round(($formated_points_elim*$taux), 3);
  }
  if ($match_elim == 1) {
    $coef = 0.67;
  } else if ($match_elim == 2) {
    $coef = 0.9;
  } else if ($match_elim == 3) {
    $coef = 0.95;
  } else if ($match_elim > 3) {
    $coef = 1;
  }

  // Fonction qui calcule le nombre de points pour poule + élim

  function nb_victoire($stade, $coef) {
    if (round($stade*$coef, 2) == 1) {
      return round($stade*$coef, 2).' point.';
    } else {
      return round($stade*$coef, 2).' points.';
    }
  }
  $vainqueur = stade_tournoi($formated_points_elim, 1);
  $finale = stade_tournoi($formated_points_elim, 0.83);
  $demi= stade_tournoi($formated_points_elim, 0.67);
  $quart = stade_tournoi($formated_points_elim, 0.50);
  $huitieme= stade_tournoi($formated_points_elim, 0.33);
  $seizieme= stade_tournoi($formated_points_elim, 0.28);

  // Cas du format poule + élimination directe

  if(!empty($_POST['points_elim']) && !empty($_POST['match_elim'])) {
    echo "<div class='container forme_poule_elim'>Selon le stade de la compétition où tu es arrivé(e), tu as remporté : </br>
     <span class='vainqueur'>Vainqueur</span> : ".nb_victoire($vainqueur, $coef)."</br>
     <span class='finale'>Finale</span> : ".nb_victoire($finale, $coef)."</br>
     <span class='demi'>1/2</span> : ".nb_victoire($demi, $coef)."</br>
     <span class='quart'>1/4</span> : ".nb_victoire($quart, $coef)."</br>
     <span class='huitieme'>1/8</span> : ".nb_victoire($huitieme, $coef)."</br>
     <span class='seizieme'>1/16</span> : ".nb_victoire($seizieme, $coef)."</br></div>";
  } else {
    echo "<div class='forme_poule_elim'>Peut mieux faire...</div>";
  }
};

// Cas du format poule unique

if(isset($_POST['valider_unique'])) {
$points_unique_no_int=$_POST['points_unique'];
$nb_joueurs_no_int=$_POST['nb_joueurs'];

$points_unique = (int)$points_unique_no_int;
$nb_joueurs = (int)$nb_joueurs_no_int;
// Formatage

$formated_points_unique = str_replace(',', '.', $points_unique);
$formated_nb_joueurs = str_replace(',', '.', $nb_joueurs);

if ((int)$nb_joueurs == 3) {
  echo "<div class='container forme_poule_unique'><span class='vainqueur'>1er</span>, tu remportes ".$formated_points_unique." points. </br>
        2e, tu remportes ".$formated_points_unique*0.5." points.</br>
        3e, tu remportes ".$formated_points_unique*0.33." points si tu as gagné au moins un match, sinon 0 !</div>";
} else if ((int)$nb_joueurs == 4) {
  echo "<div class='container forme_poule_unique'><span class='vainqueur'>1er</span>, tu remportes ".$formated_points_unique." points. </br>
        2e, tu remportes ".$formated_points_unique*0.67." points.</br>
        3e, tu remportes ".$formated_points_unique*0.33." points.</br>
        4e, tu remportes ".$formated_points_unique*0.15." points si tu as gagné au moins un match, sinon 0 !</div>";
} else if ((int)$nb_joueurs == 5) {
  echo "<div class='container forme_poule_unique'><span class='vainqueur'>1er</span>, tu remportes ".$formated_points_unique." points. </br>
        2e, tu remportes ".$formated_points_unique*0.75." points.</br>
        3e, tu remportes ".$formated_points_unique*0.50." points.</br>
        4e, tu remportes ".$formated_points_unique*0.25." points.</br>
        5e, tu remportes ".$formated_points_unique*0.15." points si tu as gagné au moins un match, sinon 0 !</div>";
} else if ((int)$nb_joueurs == 6) {
  echo "<div class='container forme_poule_unique'><span class='vainqueur'>1er</span>, tu remportes ".$formated_points_unique." points. </br>
        2e, tu remportes ".$formated_points_unique*0.79." points.</br>
        3e, tu remportes ".$formated_points_unique*0.60." points.</br>
        4e, tu remportes ".$formated_points_unique*0.40." points.</br>
        5e, tu remportes ".$formated_points_unique*0.33." points.</br>
        6e, tu remportes ".$formated_points_unique*0.15." points si tu as gagné au moins un match, sinon 0 !</div>";
} else if ((int)$nb_joueurs == 7){
  echo "<div class='container forme_poule_unique'><span class='vainqueur'>1er</span>, tu remportes ".$formated_points_unique." points. </br>
        2e, tu remportes ".$formated_points_unique*0.81." points.</br>
        3e, tu remportes ".$formated_points_unique*0.65." points.</br>
        4e, tu remportes ".$formated_points_unique*0.50." points.</br>
        5e, tu remportes ".$formated_points_unique*0.43." points.</br>
        6e, tu remportes ".$formated_points_unique*0.25." points.</br>
        7e, tu remportes ".$formated_points_unique*0.15." points si tu as gagné au moins un match, sinon 0 !</div>";
}
};
// Cas du format Elimination directe

if(isset($_POST['elim_directe'])) {
$points_elim_directe_no_int=$_POST['points_elim_directe'];

$points_elim_directe = (int)$points_elim_directe_no_int;

// Formatage

$formated_points_elim_directe = str_replace(',', '.', $points_elim_directe);

echo "<div class='container forme_elim_directe'><span class='vainqueur'>Vainqueur</span>, tu remportes ".$formated_points_elim_directe." points. </br>
      Finaliste, tu remportes ".$formated_points_elim_directe*0.83." points.</br>
      1/2, tu remportes ".$formated_points_elim_directe*0.67." points.</br>
      1/4, tu remportes ".$formated_points_elim_directe*0.50." points.</br>
      1/8, tu remportes ".$formated_points_elim_directe*0.33." points.</br>
      1/16, tu remportes ".$formated_points_elim_directe*0.28." points.</br>
      1/32, tu remportes ".$formated_points_elim_directe*0.22." points si tu as gagné au moins un match, sinon 0 !</div>";
};


// Cas du format interclub simple
if (isset($_POST['interclub'])){
  $niveau = $_POST['interclub'];
  $coeffITC = "";

  if($niveau == "ICD"){
  $coeffITC .= '5.5';
  } else if ($niveau == "ICR"){
  $coeffITC .= '5.75';
  } else if ($niveau == "ICN"){
  $coeffITC .= '6';
  } else if ($niveau =="TPE"){
  $coeffITC .= '6.5';
  };


  if(isset($_POST['itc_double'])) {
  $points_itc_simple_no_int=$_POST['points_itc_simple'];
  $points_itc_simple = (int)$points_itc_simple_no_int;

  $points_itc_double1_no_int=$_POST['points_itc_double1'];
  $points_itc_double1 = (int)$points_itc_double1_no_int;

  $points_itc_double2_no_int=$_POST['points_itc_double2'];
  $points_itc_double2 = (int)$points_itc_double2_no_int;
    // Formatage
  $formated_points_itc_simple = str_replace(',', '.', $points_itc_simple);
  $formated_points_itc_double1 = str_replace(',', '.', $points_itc_double1);
  $formated_points_itc_double2 = str_replace(',', '.', $points_itc_double2);

  // Tests pour le formulaire du simple

  if ((round($formated_points_itc_simple/$coeffITC,2)>1.5)){
    echo "<div class='container itc'>Wosooooo, tu remportes <span class='vainqueur'>".round($formated_points_itc_simple/$coeffITC,2) ." points.</span></div>";
  } else if (empty($_POST['points_itc_simple'])){
  //  echo "<div class='itc'>Félicitations, tu remportes <span class='vainqueur'>1.5 points.</span></div>";
  echo "";
  } else if (!empty($_POST['points_itc_simple']) && (round($formated_points_itc_simple/$coeffITC,2)<1.5)) {
  echo "<div class='itc'>Wosooooo, tu remportes <span class='vainqueur'>1.5 points.</span></div>";
  }
  // Tests pour le formulaire du double
  if (round(sqrt($formated_points_itc_double1*$formated_points_itc_double2)/$coeffITC,2)>1.5){
  echo "<div class='container itc'>Wosooooo, tu remportes <span class='vainqueur'>".round(sqrt($formated_points_itc_double1*$formated_points_itc_double2)/$coeffITC,2) ." points.</span></div>";
  } else if (empty($_POST['points_itc_double1']) || (empty($_POST['points_itc_double2']))){
  echo "";
  } else if (((!empty($_POST['points_itc_double1'])) && (!empty($_POST['points_itc_double2']))) && (round($formated_points_itc_simple/$coeffITC,2)<1.5))  {
  echo "<div class='container itc'>Wosooooo, tu remportes <span class='vainqueur'>1.5 points.</span></div>";
  }
  }
}

?>
