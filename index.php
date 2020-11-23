<!DOCTYPE html>
<html>
  <head>
    <title>Calculez les points gagnés en tournoi ou interclub au badminton !</title>
    <meta name= "description" content="Bienvenue sur le site qui vous permettra de calculer les points que vous allez gagner sur vos différents tournois de badminton et rencontres d'interclubs de badminton.">
    <meta charset="utf-8">
      <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
      <!-- CSS -->
      <!-- JS -->
    <script src="js/form_index.js" async></script>
      <!-- JS -->
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
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href=favicon"/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  </head>
  <body>
    <?php
    include('includes/inc_banniere.php');
    ?>

        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-sx-12 col-md-3 col-lg-3 categorie1">
              <div class="poule_elim">
                <h2>Poules + élimination directe</h2>
                <form action="calcul.php" name='form_poule_elim' method="post">
                <p>Nombre de points de la série  <br><input type="float" name="points_elim" value="" id="points_elim" autocomplete="off"/></p>
                <p>Nombre de matchs gagnés  <br><input type="number" name="match_elim" value="" id="match_elim" autocomplete="off"/></p>
                <input type="submit" name="valider_elim" value="Calculez !" class="btn btn-primary" id="btnPouleElim">
              </form>
              </div>
            </div>
            <div class="col-sm-12 col-sx-12 col-md-3 col-lg-3 categorie2">
              <div class="poule_unique">
                <h2>Poule unique</h2>
                <form action="calcul.php" name="form_poule_unique" method="post">
                  <p>Nombre de points de la série  <br><input type="float" name="points_unique" id="points_unique" autocomplete="off"/></p>
                  <p>Nombre de joueurs/paires de la série  <br><input type="number" name="nb_joueurs" id="match_unique" autocomplete="off"/></p>
                  <input type="submit" name= "valider_unique" value="Calculez !" class="btn btn-primary" id="btnPouleUnique">
                </form>
              </div>
            </div>
            <div class="col-sm-12 col-sx-12 col-md-3 col-lg-3 categorie3">
            <div class="interclubs">
              <h2>Interclubs / Tournoi par équipes </h2>
              <form action="calcul.php" name="form_itc_equipe" method="post">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <input type="button" class="btn btn-secondary focus" value="ICD" id="btnInterclubICD" title="Interclubs Départementaux"></button>
                  <input type="button" class="btn btn-secondary" value="ICR" id="btnInterclubICR"title="Interclubs Régionaux"></button>
                  <input type="button" class="btn btn-secondary" value="ICN" id="btnInterclubICN"title="Interclubs Nationaux"></button>
                  <input type="button" class="btn btn-secondary" value="TPE" id="btnInterclubTPE"title="Tournoi par Équipes"></button>
                  <input type="hidden" name="interclub" value="ICD" id="rankITC">
                </div>
              <p><span class="simple">Simple</span> : Nombre de points de ton adversaire <br>
                <input type="float" name="points_itc_simple" id="points_itc_simple" autocomplete="off"/></p>
              <p class="double_mixte"><span class="double">Double/Mixte</span> : Nombre de points de tes adversaires <br>
                <div class="mixtedouble">
                  <span> Joueur 1 : </span><input type="float" class="inputJ1" name="points_itc_double1" id="points_itc_double1" autocomplete="off"/><br>
                  <span> Joueur 2 : </span><input type="float" class="inputJ2" name="points_itc_double2" id="points_itc_double2" autocomplete="off"/></p>
                </div>
                <input type="submit" name= "itc_double" value="Calculez !" class="btn btn-primary" id="btnInterclubsDouble">
              </form>
            </div>
          </div>
          <div class="col-sm-12 col-sx-12 col-md-3 col-lg-3">
            <div class="elimination_directe">
              <h2>Elimination directe </h2>
              <form action="calcul.php" name="form_elim_directe" method="post">
                <p>Nombre de points du tableau <br><input type="float" name="points_elim_directe" id="points_elim_directe" autocomplete="off"/></p>
                <input type="submit" name= "elim_directe" value="Calculez !" class="btn btn-primary" id="btnElimDirecte">
              </form>
            </div>
          </div>
          </div>
          <div class="simu">
          <a href="calcul.php">Une simulation de ta future côte?</a>
          </div>
        </div>
        <div id="popup">
          <section></section>
        </div>
      <footer>
        <?php include('includes/inc_footer.php'); ?>
      </footer>
    </body>
</html>
