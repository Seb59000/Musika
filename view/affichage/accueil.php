<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Musika l'assault</title>
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
  <div id="preloader"></div>
  <!--==========================
  Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <!--<div class="hero-logo">
          <img class="" src="img/logo.png" alt="Musika l'Assault">
        </div>-->

        <h1>Musika l'Assault</h1>
        <h2><span class="rotating">salle de répétition, organisation de concerts, studio</span></h2>
        <div class="actions">
          <a href="#services" class="btn-get-started">Présentation</a>
          <a href="#news" class="btn-services">Derniers posts</a>
        </div>
      </div>
    </div>
  </section>

  <!--==========================
  Header Section
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="public/img/logo.jpg" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Musika l'Assault</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Accueil</a></li>
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
          <li><a href="#contact">Nous contacter</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->

  <!--==========================
  About Section
  ============================-->
  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">HISTORIQUE DE L'ASSOCIATION</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Petite présentation et historique de l'association créée en 2000!! Souvenirs, souvenirs..</p>
        </div>
      </div>
    </div>
    <div class="container about-container wow fadeInUp">
      <div class="row">

        <div class="col-lg-6 about-img">
          <img src="public/img/essai.jpg" alt="">
        </div>

        <div class="col-md-6 about-content">
          <h2 class="about-title">Des créneaux de répétition pour les seclinois.</h2>
          <p class="about-text">
            L'association est née de la volontée de proposer un local de répét pour tous les seclinois. Gilles, albert et prague formèrent cette association
          </p>
          <p class="about-text">
            Le but est de proposer des locaux, mais aussi du matériel, et des conseils pour répéter ou organiser des concerts...
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
            id est laborum
          </p>
          <p class="about-text">
            Maintenant vous pouvez nous joindre directement via le site. Mais vous pouvez aussi venir 
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt molli.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!--==========================
  Services Section
  ============================-->
  <section id="services">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Présentation en quelques mots</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Découvrez ici tous les services de Musika L'Assault. Créneaux, concerts, contacts, etc...</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-calendar"></i></div>
          <h4 class="service-title"><a href="">Créneaux de répétition pour tous les seclinois</a></h4>
          <p class="service-description">L'association propose des créneaux de répétition du lundi au dimanche pour tous les adhérents.</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-music"></i></div>
          <h4 class="service-title"><a href="">Organisation de concerts</a></h4>
          <p class="service-description">Si vous voulez déposer une annonce ou voir les concerts organisés vous pouvez le faire en suivant le lien ici.</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-bullhorn"></i></div>
          <h4 class="service-title"><a href="">Mise en relation de musiciens</a></h4>
          <p class="service-description">Si vous voulez déposer une annonce, rechercher votre guitariste ou simplement du matos, c'est par ici.</p>
        </div>
        <!--<div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-photo"></i></div>
          <h4 class="service-title"><a href="">Chat</a></h4>
          <p class="service-description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        </div>-->
        <div class="col-md-2 service-item">
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-photo"></i></div>
          <h4 class="service-title"><a href="">Gallerie Photo</a></h4>
          <p class="service-description">Toutes les photos de l'association. Déposez vos propres photos, regardez les autres..</p>
        </div>
        <div class="col-md-4 service-item">
          <div class="service-icon"><i class="fa fa-caret-square-o-right"></i></div>
          <h4 class="service-title"><a href="">Studio</a></h4>
          <p class="service-description">Si vous avez besoin de conseils pour l'enregistrement nous sommes toujours prêts à donner un coup de main.</p>
        </div>
        <div class="col-md-2 service-item">
        </div>
      </div>
    </div>
  </section>

  <!--==========================
  Subscrbe Section
  ============================-->
  <section id="subscribe">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-8">
          <h3 class="subscribe-title">Dans la cave du Chateau Guillemot</h3>
          <p class="subscribe-text">Un endroit tranquille pour tous les musiciens seclinois</p>
        </div>
        <div class="col-md-4 subscribe-btn-container">
          <a class="subscribe-btn" href="#contact">Contactez nous</a>
        </div>
      </div>
    </div>
  </section>
    <!-- Start Blog Area -->
        <div id="news" class="blog-area">
            <div class="blog-inner area-padding">
                <div class="blog-overly"></div>
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="section-title">Dernières News</h3>
                            <div class="section-title-divider"></div>
                            <p class="section-description">En direct de Musika L'Assault. Mais qu'est ce qui se passe là dedans. Les concerts, les dernières annonces etc...</p>
                        </div>
                    </div>                  
                    <?php
                        for($x = 0; $x < 3; $x++){
                        $arrayAnnonces[$x]->get_idAnnonce();
                    ?>
                      <div class="row">
                          <!-- Start Left Blog -->
                          <div class="col-md-4 col-sm-4 col-xs-12">
                              <div class="single-blog">
                                  <?php
                                    $adresseImg = "";
                                      if($arrayAnnonces[$x]->get_type_photo()!=="0"){
                                        $adressePhotoProfil = $arrayAnnonces[$x]->get_idAnnonce().$arrayAnnonces[$x]->get_type_photo();
                                        $adresseImg = "public/img/PhotosAnnonce/". $adressePhotoProfil; 
                                      } else {
                                        $adresseImg = "public/img/PhotosAnnonce/AnnonceMystere.png";
                                      }
                                  ?>
                                  <div style="height:330px; width:330px; background-size:cover; background-image:url(<?php echo $adresseImg; ?>) ">
                                    <?php
                                        $href = "";
                                        $categorie = $arrayAnnonces[$x]->get_categorie();
                                        if ($categorie == 'concert'){
                                          $href = "index.php?page=annoncesConcerts";
                                        } else if ($categorie == 'matos'){
                                          $href = "index.php?page=annoncesMatos";
                                        } else if ($categorie == 'musicien'){
                                          $href = "index.php?page=annoncesMusiciens";
                                        } else {
                                          $href = "index.php?page=annoncesAutres";
                                        } 
                                    ?>
                                  </div>
                                  <div class="blog-meta">
                                      <span class="date-type">
                                          <i class="fa fa-calendar"></i><?php echo $arrayAnnonces[$x]->get_date() ?>
                                      </span>
                                  </div>
                                  <div class="blog-text">
                                      <h4>
                                          <a href="<?php echo $href; ?>"><?php echo $arrayAnnonces[$x]->get_titre(); ?></a>
                                      </h4>
                                      <p>
                                          <?php echo $arrayAnnonces[$x]->get_contenu(); ?>
                                      </p>
                                  </div>
                                  <span>

                                      <a href="<?php echo $href; ?>" class="ready-btn">Lire la suite</a>
                                  </span>
                                      <br>
                                      <br>
                              </div>
                              <!-- Start single blog -->
                          </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    <br>
    <br>
    <br>
</div>
  <!-- End Blog -->

  <!--==========================
  Porfolio Section
  ============================-->
 <?php
if ($nbTotalPhotos==0){
    ?>
      <tr>
        <td><h1>Aucune photo dans l'album</h1></td>
      </tr>
    <?php
} else {
  // On les affiche dans le tableau ligne par ligne
  $arrlength = count($arrayPhotos);
?>
  <section id="portfolio" class="grey">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Portfolio</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Un petit flash back de nos meilleurs moments Musika L'Assault. Postez vous aussi vos photos<a href="index.php?page=deposerPhotogalerie"> en suivant le lien ici.</a></p>
        </div>
      </div>

      <div class="row">
<?php
  for($x = 0; $x < $arrlength; $x++) {
    ?>

        <div class="col-md-3">
          <a class="portfolio-item" style="background-image: url(<?php echo 'public/img/PhotosGalerie/'.$arrayPhotos[$x]->get_idPhoto().$arrayPhotos[$x]->get_TypePhoto(); ?>);" href="<?php echo 'public/img/PhotosGalerie/'.$arrayPhotos[$x]->get_idPhoto().$arrayPhotos[$x]->get_TypePhoto(); ?>">
            <div class="details">
              <h4><?php echo $arrayPhotos[$x]->get_commentaire(); ?> </h4>
              <span>Posté par <?php echo $arrayPhotos[$x]->get_pseudoExpediteur(); ?></span>
            </div>
          </a>
        </div>
    <?php
  } 
  ?>
         </div>
  <?php   
}
?>
      </div>
    </section>

  <!--==========================
  Team Section
  ============================-->
  <section id="team">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">L'équipe</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Et ici, notre formidable Team. Les membres du bureau Musika L'Assault.</p>
        </div>
      </div>

      <div class="row">
      <?php
          // On les affiche dans le tableau ligne par ligne
          $arrlength = count($arrayUtilisateursB);
          for($x = 0; $x < $arrlength; $x++) {
            if($arrayUtilisateursB[$x]->get_photo()==1){
              $adressePhotoProfil = $arrayUtilisateursB[$x]->get_idUtilisateur().$arrayUtilisateursB[$x]->get_typePhoto();
              ?>
              <div class="col-md-4">
                <div class="member">
                  <div class="pic"><img src="public/img/photosMembres/<?php echo $adressePhotoProfil; ?>" alt="<?php echo $adressePhotoProfil; ?>" alt=""></div>
              <?php
            } else {
              ?>
              <div class="col-md-4">
                <div class="member">
                  <div class="pic"><img src="public/img/photosMembres/profilMystere.png" alt=""></div>
              <?php
            }
            ?>
                  <h4><?php echo $arrayUtilisateursB[$x]->get_pseudo(); ?></h4>
                  <span><?php echo $arrayUtilisateursB[$x]->get_fonction(); ?></span>
                  <div class="social">
                    <a href="<?php echo $arrayUtilisateursB[$x]->get_adresseTwitter(); ?>"><i class="fa fa-twitter"></i></a>
                    <a href="<?php echo $arrayUtilisateursB[$x]->get_adresseFacebook(); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo $arrayUtilisateursB[$x]->get_adresseGooglePlus(); ?>"><i class="fa fa-google-plus"></i></a>
                    <a href="<?php echo $arrayUtilisateursB[$x]->get_adresseLinkedin(); ?>"><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>

            <?php
          }    
      ?>
<!--    
        <div class="col-md-4">
          <div class="member">
            <div class="pic"><img src="img/team-3.jpg" alt=""></div>
            <h4>William Anderson</h4>
            <span>Ne sert à rien mais est juste beau gosse</span>
            <div class="social">
              <a href=""><i class="fa fa-twitter"></i></a>
              <a href=""><i class="fa fa-facebook"></i></a>
              <a href=""><i class="fa fa-google-plus"></i></a>
              <a href=""><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
        </div>
-->

      </div>
    </div>
  </section>

  <!--==========================
  Contact Section
  ============================-->
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Contactez nous</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Si vous avez une remarque ou une question, vous pouvez nous joindre ici.</p>
        </div>
      </div>

        <div class="col-md-6 col-md-push-3">
          <div class="form">
            <form action="controller/gestionPosts/contact_page.php" method="post" role="form" name="myForm" onsubmit="return validateForm()" >
              <div class="form-group">
                <input type="text" name="pseudo" class="form-control" id="pseudo" 
                <?php 
                  if(isset($_SESSION['pseudo'])){
                    echo 'value="'.$_SESSION['pseudo'].'"';
                  } else { 
                    echo 'placeholder="Votre nom"';
                  } 
                ?>  required/>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre email" required />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Envoyer</button></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
  Footer
============================-->
  <?php
  include 'view\footer.php';
  ?>

</body>

</html>
