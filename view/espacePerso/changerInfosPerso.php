<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Changer Infos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script src="public/lib/jquery/jquery.min.js"></script>
  <script src="public/lib/morphext/morphext.min.js"></script>
  <script src="public/js/custom.js"></script>
  <script src="public/lib/wow/wow.min.js"></script>
  <script src="public/lib/superfish/superfish.min.js"></script>
  <script src="public/lib/stickyjs/sticky.js"></script><!-- =======================================================
    Theme Name: Imperial
    Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
                <li class="menu-has-children"><a href="#">Déposer une annonce</a>
                  <ul>
                    <li><a href="index.php?page=deposerannonceConcert.php">Concerts</a></li>
                    <li><a href="index.php?page=deposerannonceMusicien.php">Musiciens</a></li>
                    <li><a href="index.php?page=deposerannonceMatos.php">Matériel de musique</a></li>
                    <li><a href="index.php?page=deposerannonceAutre.php">Autres</a></li>
                  </ul>
                </li>
                <li class="menu-has-children"><a href="#">Consulter les annonces</a>
                  <ul>
                    <li><a href="index.php?page=annoncesConcerts.php">Concerts</a></li>
                    <li><a href="index.php?page=annoncesMusiciens.php">Musiciens</a></li>
                    <li><a href="index.php?page=annoncesMatos.php">Matériel de musique</a></li>
                    <li><a href="index.php?page=annoncesAutres.php">Autres</a></li>
                  </ul>
                </li>
              </ul>
          </li>
          <li class="menu-has-children"><a href="index.php?page=annoncesConcerts.php">Concerts</a>
            <ul>
              <li><a href="index.php?page=deposerannonceConcert.php">Annoncer un nouveau concert</a></li>
              <li><a href="index.php?page=annoncesConcerts.php">Voir les futurs concerts</a></li>
            </ul>
          </li>
          <li><a href="index.php?page=bonsPlans.php">Bons plans</a></li>
          <li><a href="index.php?page=galeriePhoto.php">Gallerie photos</a></li>
          <?php
              if(isset($_SESSION['idUtilisateur'])){
          ?>
          <li class="menu-has-children"><a href="index.php?page=espacePerso.php">Espace Perso</a>
                  <ul>
                    <li><a href="controller/espacePerso/deconnexion_page.php">Se déconnecter</a></li>
                  </ul>
          </li>
          <?php
              } else { 
          ?>
          <li><a href="index.php?page=connexion.php">Connexion</a></li>
          <?php
              }
          ?>
          <li><a href="index.php?page=contact.php">Nous contacter</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>

  <section id="contact">
    <div class="container fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Entrez de nouvelles informations</h3>
          <div class="section-title-divider"></div>
          <!--<p class="section-description">Choisissez une catégorie</p>-->
        </div>
      </div>

        <div class="col-md-6 col-md-push-3">
          <div class="form">
            <form action="controller/espacePerso/changerInfosPerso_page.php?categorie=musicien" method="post" role="form" name="myForm">
              
              <br>
              <br>
              <div class="form-group">
                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo"/>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="Email"/>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="MessagePresentation" id="MessagePresentation" placeholder="Message de présentation"/>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Adresse twitter"/>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Adresse facebook"/>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="google" id="google" placeholder="Adresse google+"/>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Adresse linkedin"/>
              </div>




              <div class="text-center"><button type="submit">Publier</button></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</body>
</html>
