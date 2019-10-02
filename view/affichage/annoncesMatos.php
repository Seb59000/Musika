<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Annonces Matos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
      include 'view/header.php';
  ?>

  <section id="">
    <div class="container fadeInUp">
      <br>
      <br>
      <br>
      <br>

    <!-- tableau Annonces Matos début-->
    <table class="table table-hover">
          <?php
              include 'view/affichageTableau/utilisateur/tableauAnnoncesMatos.php';
          ?>
    <!-- tableau Annonces Matos fin-->
    </div>
  </section>
</body>
</html>



