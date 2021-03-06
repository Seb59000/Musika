
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="public/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="public/lib/animate-css/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="public/css/style.css" rel="stylesheet">
  <script src="public/lib/jquery/jquery.min.js"></script>
  <script src="public/lib/morphext/morphext.min.js"></script>
  <script src="public/js/custom.js"></script>
  <script src="public/lib/wow/wow.min.js"></script>
  <script src="public/lib/superfish/superfish.min.js"></script>
  <script src="public/lib/stickyjs/sticky.js"></script>

  <!-- =======================================================
    Theme Name: Imperial
    Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->

  <!--
    favicon
      <link rel="icon" type="image/jpeg" href="img/logo.jpg" />
  -->

</head>
<body>
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.php"><img src="public/img/logo.jpg" alt="" title="" /></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Musika l'Assault</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index.php">Accueil</a></li>
          <li class="menu-has-children">
              <a href="">Petites annonces</a>
              <ul>
                <li class="menu-has-children"><a href="#">D??poser une annonce</a>
                  <ul>
                    <li><a href="index.php?page=deposerannonceConcert">Concerts</a></li>
                    <li><a href="index.php?page=deposerannonceMusicien">Musiciens</a></li>
                    <li><a href="index.php?page=deposerannonceMatos">Mat??riel de musique</a></li>
                    <li><a href="index.php?page=deposerannonceAutre">Autres</a></li>
                  </ul>
                </li>
                <li class="menu-has-children"><a href="#">Consulter les annonces</a>
                  <ul>
                    <li><a href="index.php?page=annoncesConcerts">Concerts</a></li>
                    <li><a href="index.php?page=annoncesMusiciens">Musiciens</a></li>
                    <li><a href="index.php?page=annoncesMatos">Mat??riel de musique</a></li>
                    <li><a href="index.php?page=annoncesAutres">Autres</a></li>
                  </ul>
                </li>
              </ul>
          </li>
          <li class="menu-has-children"><a href="index.php?page=annoncesConcerts">Concerts</a>
            <ul>
              <li><a href="index.php?page=deposerannonceConcert">Annoncer un nouveau concert</a></li>
              <li><a href="index.php?page=annoncesConcerts">Voir les futurs concerts</a></li>
            </ul>
          </li>
          <li><a href="index.php?page=bonsPlans">Bons plans</a></li>
          <li><a href="index.php?page=galeriePhoto">Gallerie photos</a></li>
          <?php
              if(isset($_SESSION['idUtilisateur'])){
          ?>
          <li class="menu-has-children"><a href="index.php?page=espacePerso">Espace Perso</a>
                  <ul>
                    <li><a href="controller/espacePerso/deconnexion_page.php">Se d??connecter</a></li>
                  </ul>
          </li>
          <?php
              } else { 
          ?>
          <li><a href="index.php?page=connexion">Connexion</a></li>
          <?php
              }
          ?>
          <li><a href="index.php?page=contact">Nous contacter</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
</body>
</html>
