<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Espace personnel</title>
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
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Bonjour <?php echo $_SESSION['pseudo']; ?></h3>
          <div class="section-title-divider"></div>
            <p class="section-description">Vous êtes sur votre espace personnel.<br>
              Vous pouvez <a href="index.php?page=deposerPhotogalerie">ajouter des photos à la gallerie ici.</a>
            <?php     
                if ($_SESSION['statut']==1){
                    echo '<br>Ou encore <a href="index.php?page=administrer">administrer le site...</a><br> ';
                } else {
                    echo '
                    ';
                }
            ?>
          </div>
        </div>

<!-- 1 ere partie -->
      <br>
      <div class="col-md-12 col-md-push-1" id="">
          <div class="tab ">
            <button class="tablinks" onclick="openTab('MessagesEnvoyes')">Messages envoyés</button>
            <button class="tablinks" onclick="openTab('MessagesRecus')">Messages reçus</button>
            <button class="tablinks" onclick="openTab('Annonces')">Mes Annonces</button>
            <button class="tablinks" onclick="openTab('Photos')">Mes photos</button>
            <button class="tablinks" onclick="openTab('InfosPerso')">Mes informations personnelles</button>
          <br>
          <br>
          <br>
          <br>
          </div>
          </div>

          <div id="MessagesRecus" class="tabcontent">
          <br>
              <!-- tableau messages recus début-->
                <?php
                    include 'view/affichageTableau/utilisateur/tableauMessagesPersoRecus.php';
                ?>
              <!-- tableau messages recus fin-->
          </div>

          <div id="MessagesEnvoyes" class="tabcontent">
          <br>
              <!-- tableau messages envoyés début-->
                <?php
                      include 'view/affichageTableau/utilisateur/tableauMessagesPersoEnvoyes.php';
                ?>
              <!-- tableau messages envoyés fin-->
          </div>

          <div id="Annonces" class="tabcontent">
          <br>
              <!-- tableau Annonces début-->
                <?php
                      include 'view/affichageTableau/utilisateur/tableauAnnoncesEspacePerso.php';
                ?>
              <!-- tableau Annonces fin-->
          </div>

          <div id="Photos" class="tabcontent">
          <br>
              <!-- tableau Photos début-->
                <?php
                    include 'view/affichageTableau/utilisateur/tableauPhotosEspacePerso.php';
                ?>
              <!-- tableau Photos fin-->
          </div>

          <div id="InfosPerso" class="tabcontent">
          <br>
<!-- 2 eme partie -->
         <!-- <h1 class="section-description">Mes Informations Personnelles</h1> -->
            <p class="section-description">
              <?php
                  if ($_SESSION['idPhoto']==0){
                    echo 
                    "<strong>- Vous n'avez pas encore téléchargé votre photo -</strong>
                    <br>
                    <a href ='index.php?page=televerserPhoto'>Télécharger votre photo</a>
                    <br><br>
                    ";
                  } else { 
                    $adressePhotoProfil = $_SESSION["idUtilisateur"].$_SESSION["typePhoto"];
                    ?>
                    <img src="public/img/photosMembres/<?php echo $adressePhotoProfil; ?>" alt="">
                    <br>
                    <a href ='index.php?page=televerserPhoto'>Changer votre photo de profil</a>
                    <br>
                    <?php
                  }
              ?>
             <strong>- Pseudo -</strong><br><?php echo $_SESSION['pseudo']; ?><br><br>
             <strong>- Message de présentation -</strong><br><?php echo $_SESSION['pstation']; ?><br><br>
             <strong>- AdresseTwitter -</strong><br><?php echo $_SESSION['adresseTwitter']; ?><br><br>
             <strong>- AdresseFacebook -</strong><br><?php echo $_SESSION['adresseFacebook']; ?><br><br>
             <strong>- AdresseGooglePlus -</strong><br><?php echo $_SESSION['adresseGooglePlus']; ?><br><br>
             <strong>- AdresseLinkedin -</strong><br><?php echo $_SESSION['adresseLinkedin']; ?><br><br>
             <a href="index.php?page=changerInfosPerso">Changer mes informations personnelles</a><br><br>
             <a href="index.php?page=changerMotDePasseRegular">Changer mon mot de passe</a></p>
<!-- Fin 2 eme partie -->
          </div>         
      </div>
    </div>
<!-- Fin 1 ere partie -->
      </div>
    </div>          
  </section>

<script>
  
var varGet = window.location.search;
if (varGet!=null){
  if(varGet=="?page=espacePerso&avancerAnnonce=1" || varGet=="?page=espacePerso&reculerAnnonce=1" || varGet.substring(0, 39) == "?page=espacePerso&indexPremiereAnnonce="){
    openTab('Annonces');
  } else if (varGet=="?page=espacePerso&infosPerso=1"){
    openTab('InfosPerso');
  } else if(varGet=="?page=espacePerso&avancer=1" || varGet=="?page=espacePerso&reculer=1" || varGet.substring(0, 38) == "?page=espacePerso&indexPremierMessage=") {
    openTab('MessagesRecus');
  } else if(varGet=="?page=espacePerso&avancerPhoto=1" || varGet=="?page=espacePerso&reculerPhoto=1" || varGet.substring(0, 37) == "?page=espacePerso&indexPremierePhoto=") {
    openTab('Photos');
  } else {
    openTab('MessagesEnvoyes');
  }
} else {
    openTab('MessagesRecus');
}

function openTab(cityName) {
    document.cookie = "pageSelect=" + cityName;
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
</script>

</body>
</html>
