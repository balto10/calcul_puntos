<!DOCTYPE html>
<html>
    <head>
        <title>Calcul points de tournoi</title>
        <meta charset="utf-8">
        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/calcul.css">
        <!-- CSS -->
        <!-- JS -->
        <script src="js/form_calcul.js" async></script>
        <!-- JS -->
        <meta name= "description" content="Sur cette page, vous allez pouvoir consulter combien de points vous allez gagner au badminton.">

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
      <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">

    </head>
    <body>
      <?php
      include('includes/inc_banniere.php');
      include('includes/inc_calcul.php')
      ?>


      <div class="container calcul_moyenne">
        <h3>Tu souhaites connaître ta future moyenne de points?</h3>
        <h4>Rentre tes meilleures performances</h4>
        <form action="moyenne.php" name="form_calcul_moyenne" method="post">
        <input type="float" class="perfs" name="perf1" id="perf1" value="" autocomplete="off">
        <input type="float" class="perfs" name="perf2" id="perf2" value="" autocomplete="off">
        <input type="float" class="perfs" name="perf3" id="perf3" value="" autocomplete="off">
        <input type="float" class="perfs" name="perf4" id="perf4" value="" autocomplete="off">
        <input type="float" class="perfs" name="perf5" id="perf5" value="" autocomplete="off">
        <input type="float" class="perfs" name="perf6" id="perf6" value="" autocomplete="off">
        <input type="submit" name="calcul_total" value="Calculez !" class="btn btn-primary" id="btnCalculTotal">
        </form>
        <div class="container anotherOne">
          <a href="index.php"> Un autre calcul des points que tu peux gagner? </a>
        </div>

      </div>
      <div id="popup">
        <section></section>
      </div>
      <footer>
        <?php include('includes/inc_footer.php') ?>
      </footer>

    </body>
</html>
