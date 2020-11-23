<?php // Initialisation des variables
$tableau=array();
$tableau2=array();
$tableauInitial=array();
$tableauFinal=array();

$resultat = 0;
$rResultat = 0;
$newResultat = 0;
// Récupération des perfs des joueurs, puis injection dans le tableau $reultat
if(!empty($_POST['perf1'])){
  $result1=$_POST['perf1'];
  $formated_result1 = str_replace(',', '.', $result1);
  array_push($tableau, $formated_result1);
  array_push($tableau2, $formated_result1);
  array_push($tableauInitial, $formated_result1);

};

if(!empty($_POST['perf2'])){
  $result2=$_POST['perf2'];
  $formated_result2 = str_replace(',', '.', $result2);
  array_push($tableau, $formated_result2);
  array_push($tableau2, $formated_result2);
  array_push($tableauInitial, $formated_result2);

};
if(!empty($_POST['perf3'])){
  $result3=$_POST['perf3'];
  $formated_result3 = str_replace(',', '.', $result3);
  array_push($tableau, $formated_result3);
  array_push($tableau2, $formated_result3);
  array_push($tableauInitial, $formated_result3);

};
if(!empty($_POST['perf4'])){
  $result4=$_POST['perf4'];
  $formated_result4 = str_replace(',', '.', $result4);
  array_push($tableau, $formated_result4);
  array_push($tableau2, $formated_result4);
  array_push($tableauInitial, $formated_result4);

};
if(!empty($_POST['perf5'])){
  $result5=$_POST['perf5'];
  $formated_result5 = str_replace(',', '.', $result5);
  array_push($tableau, $formated_result5);
  array_push($tableau2, $formated_result5);
  array_push($tableauInitial, $formated_result5);

};
if(!empty($_POST['perf6'])){
  $result6=$_POST['perf6'];
  $formated_result6 = str_replace(',', '.', $result6);
  array_push($tableau, $formated_result6);
  array_push($tableau2, $formated_result6);
  array_push($tableauInitial, $formated_result6);
}

// Je classe les tableaux par ordre décroissant
rsort($tableau);
rsort($tableau2);
rsort($tableauInitial);
$nombre_perf=count($tableau);


// Affichage de chaque perf
/*     foreach($tableau as $value){
  echo $value.' ';
}
*/
// Cas "normal" (6 résultats non exceptionnels).
foreach($tableau as $value){
  $resultat+=$value;
};


$moyenne = round($resultat/count($tableau),2);

// Vide le tableau2 des résultat le plus haut et le plus petit
$mini=array_pop($tableau2);
$maxi=array_shift($tableau2);

// Calcul de la totalité des points sans les 2 perfs extremes
foreach($tableau2 as $value){
  $rResultat+=$value;
}

// Calcul de la moyenne sans les 2 perfs extremes

foreach($tableau as $value){
  // Si il y a au moins 3 résultats
  if((count($tableau)>2)){
    $rMoy = round($rResultat/count($tableau2),2);

    // On vérifie si une perf est plus de 3* suppérieure à la moyenne sans les extremes puis pareil pour 0.5 * inférieure puis on transforme la valeur
  if($value>(3*$rMoy)){
    $value=(3*$rMoy);
  } else if($value<(0.5*$rMoy)){
    $value=(0.5*$rMoy);
  }
}
// On additionne les valeurs dans une variable résultat.
$newResultat+=$value;
array_push($tableauFinal, $value);
};
// On arrondie
$roundResultat = round($newResultat,2);

if (! function_exists("array_key_last")) {
    function array_key_last($array) {
        if (!is_array($array) || empty($array)) {
            return NULL;
        }

        return array_keys($array)[count($array)-1];
    }
}
// Clé de la dernière valeur de tableau
$lastKey = array_key_last($tableauInitial);
// Clé de la dernière valeur de tableau final
$lastKeyFinal = array_key_last($tableauFinal);

// Dernière valeur de tableau
$lastValue=$tableauInitial[$lastKey];
// Dernière valeur de tableau final
$lastValueFinal=$tableauFinal[$lastKeyFinal];

// Définition de la fonction score (qui calcule le total de points du joueur)
function score($tableauFinal, $tableau, $lastValue, $lastValueFinal,$roundResultat, $resultat, $nombre_perf, $multiplicateur){
if (($tableauFinal[0]==$tableau[0]) && ($lastValue==$lastValueFinal)){
  $score=($resultat+(($resultat/$nombre_perf)*$multiplicateur));
  return $score;
} else {
  $score=($roundResultat+(($roundResultat/$nombre_perf)*$multiplicateur));
  return $score;
}
};

// Appel de la bonne fonction selon son nombre de perf.

if($nombre_perf==5){
$score = score($tableauFinal, $tableau, $lastValue, $lastValueFinal, $roundResultat, $resultat, 5, 0.5);
} else if ($nombre_perf==4){
$score = score($tableauFinal, $tableau, $lastValue, $lastValueFinal, $roundResultat, $resultat, 4 ,1);
} else if ($nombre_perf==3){
$score = score($tableauFinal, $tableau, $lastValue, $lastValueFinal, $roundResultat, $resultat, 3, 1.5);
} else if($nombre_perf==6){
$score = score($tableauFinal, $tableau, $lastValue, $lastValueFinal, $roundResultat, $resultat, 6, 0);
} else if($nombre_perf <= 2){
$score = $resultat;
};

?>
