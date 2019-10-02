<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Espace administrateur</title>
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
                    <li><a href="index.php?page=deposerannonceConcert">Concerts</a></li>
                    <li><a href="index.php?page=deposerannonceMusicien">Musiciens</a></li>
                    <li><a href="index.php?page=deposerannonceMatos">Matériel de musique</a></li>
                    <li><a href="index.php?page=deposerannonceAutre">Autres</a></li>
                  </ul>
                </li>
                <li class="menu-has-children"><a href="#">Consulter les annonces</a>
                  <ul>
                    <li><a href="index.php?page=annoncesConcerts">Concerts</a></li>
                    <li><a href="index.php?page=annoncesMusiciens">Musiciens</a></li>
                    <li><a href="index.php?page=annoncesMatos">Matériel de musique</a></li>
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
                    <li><a href="controller/espacePerso/deconnexion_page.php">Se déconnecter</a></li>
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

  <section id="contact">
    <div class="container fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Espace Administrateur</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
      <br>
      <div class="col-md-12" id="team2">
          <div class="tab">
            <button class="tablinks" onclick="openTab('Messages')">Messages reçus</button>
            <button class="tablinks" onclick="openTab('Utilisateurs')">Utilisateurs</button>
            <button class="tablinks" onclick="openTab('Annonces')">Annonces</button>
            <button class="tablinks" onclick="openTab('BonsPlans')">Bons plans</button>
            <button class="tablinks" onclick="openTab('Photos')">Photos</button>
            <button class="tablinks" onclick="openTab('Bureau')">Bureau</button>
          </div>

          <div id="Messages" class="tabcontent">
          <br>
              <!-- tableau messages début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauMessages.php';
                ?>
              <!-- tableau messages fin-->
          </div>

          <div id="Utilisateurs" class="tabcontent">
          <br>
              <!-- tableau utilisateurs début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauUtilisateurs.php';
                ?>
              <!-- tableau utilisateurs fin-->
          </div>

          <div id="Annonces" class="tabcontent">
          <br>
              <!-- tableau Annonces Concerts début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauAnnoncesConcerts.php';
                ?>
              <!-- tableau Annonces Concerts fin-->

              <!-- tableau Annonces Musiciens début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauAnnoncesMusiciens.php';
                ?>
              <!-- tableau Annonces Musiciens fin-->

              <!-- tableau Annonces Matos début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauAnnoncesMatos.php';
                ?>
              <!-- tableau Annonces Matos fin-->

              <!-- tableau Annonces Autres début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauAnnoncesAutres.php';
                ?>
              <!-- tableau Annonces Autres fin-->
          </div>
 
          <div id="BonsPlans" class="tabcontent">
                <!-- tableau bureau début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauBonsPlans.php';
                ?>
              <!-- tableau bureau fin-->
          </div>
          
          <div id="Photos" class="tabcontent">
          <br>
              <!-- tableau Photos début-->
                <?php
                    include 'view/affichageTableau/administrateur/tableauPhotos.php';
                ?>
              <!-- tableau Photos fin-->
          </div>

          <div id="Bureau" class="tabcontent">
                <!-- tableau bureau début-->
                <?php
                      include 'view/affichageTableau/administrateur/tableauBureau.php';
                ?>
              <!-- tableau bureau fin-->
          </div>
      </div>
    </div>
  </section>

<script>
  var cookie = window.location.search;
  if (cookie!=null){
    if(cookie=="?page=administrer&avancer=1" || cookie=="?page=administrer&reculer=1" || cookie.substring(0,37)=="?page=administrer&indexPremierMessage"){
      openTab('Messages');
    } else if (cookie=="?page=administrer&avancerUtilisateur=1" || cookie=="?page=administrer&reculerUtilisateurs=1" || cookie.substring(0,37)=="?page=administrer&indexPremierUtilisa"){
      openTab('Utilisateurs');
    } else if (cookie=="?page=administrer&avancerPhoto=1" || cookie=="?page=administrer&reculerPhoto=1" || cookie.substring(0, 37) == "?page=administrer&indexPremierePhoto="){
      openTab('Photos');
    } else if (cookie=="?page=administrer&bureauChange=1"){
      openTab('Bureau');
    } else if (cookie=="?page=administrer&supprBonPlan=1"){
      openTab('BonsPlans');
    } else {
      openTab('Annonces');
    }
  } else {
      openTab('Messages');
  }

  function openTab(tabToOpen) {
      document.cookie = "pageSelect=" + tabToOpen;
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabToOpen).style.display = "block";
      evt.currentTarget.className += " active";
  }
</script>
</body>
</html>



