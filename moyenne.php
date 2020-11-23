<!DOCTYPE html>
<html>
    <head>
        <title>Calcul points de tournoi</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/moyenne.css">

        <meta name= "description" content="Sur cette page, vous pourrez effectuer des simulations pour savoir quelle sera votre côte et donc votre classement au badminton.">

        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">

    </head>
    <body>
      <?php
      include('includes/inc_banniere.php');
      include('includes/inc_moyenne.php')
      ?>

      <div class="container">
          <p>Ta côte globale est de : <span class="total"><?=round($score,2); ?> points.</span></p>

          <p> Tes performances prises en compte :

       <?php

      for ($i = 0; $i < count($tableauFinal); $i++){
        if($i<count($tableauFinal)-1) {
          if($tableauFinal[$i]>$tableauInitial[$i] ){
            echo '<span class="minoration">'.$tableauFinal[$i].'</span> - ';
          } else if($tableauFinal[$i]==$tableauInitial[$i]){
          echo $tableauFinal[$i].' - ';
        } else if($tableauFinal[$i]<$tableauInitial[$i]){
          echo "<span class='majoration'>".$tableauFinal[$i]."</span> - ";
        }
      } else{
        if($tableauFinal[$i]>$tableauInitial[$i] ){
          echo '<span class="minoration">'.$tableauFinal[$i].'</span>';
        } else if($tableauFinal[$i]==$tableauInitial[$i]){
        echo $tableauFinal[$i].' ';
      } else if($tableauFinal[$i]<$tableauInitial[$i]){
        echo '<span class="majoration">'.$tableauFinal[$i].'</span>';
      }
      };

};


      ?>
    </span>
    </p>

          <p>Tes performances :
            <?php
              for($i = 0; $i < count($tableauInitial); $i++){
                if($i<count($tableauInitial)-1) {
                  echo $tableauInitial[$i].' - ';
                }
                else {
                  echo $tableauInitial[$i];
                };
              };
            ?>
          </p>


      </div>
      <div class="container anotherOne">
        <p><a href="index.php"> Un autre calcul du nombre de points que tu peux gagner? </a></p>
      </div>
      <footer>
        <?php include('includes/inc_footer.php') ?>
      </footer>

    </body>
</html>
