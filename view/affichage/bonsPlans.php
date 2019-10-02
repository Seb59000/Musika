<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Bons Plans</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
      include 'view/header.php';
  ?>

  <section id="contact">
    <div class="container fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Bons Plans</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Si vous avez des bons plans, des adresses de bars où l'accueil est cool, ou autres, vous pouvez <a href="index.php?page=deposerBonPlan">partager vos adresses ici.</a></p>
        </div>
      </div>
      <br>

    <!-- tableau Annonces Concerts début-->

          <?php
              include 'view/affichageTableau/utilisateur/tableauBonsPlans.php';
          ?>

    <!-- tableau Annonces Concerts fin-->
    </div>
  </section>
</body>
</html>



