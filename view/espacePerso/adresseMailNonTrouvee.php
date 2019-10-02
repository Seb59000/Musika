<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Adresse mail non trouvée</title>
</head>
<body>
  <?php
      include 'view/header.php';
  ?>

  <section id="contact">
    <div class="container fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h1 class="section-description">Adresse mail non trouvée</h1>
          <div class="section-title-divider"></div>
          <p class="section-description">L'adresse mail suivante n'a pas été trouvé : <?php echo $_SESSION['mailTemp']; unset($_SESSION['mailTemp']); ?><br>
            Etes vous sûr de ne pas vous être trompé. Si vous voulez réessayer avec une autre adresse, <a href="index.php?page=connexion"> cliquez ici.</a></p>
        </div>
      </div>
      </div>
    </div>
  </section>
  <div class="place"></div>
  <div class="place"></div>

  <?php
        include 'view/footer.php';
  ?>

</body>
</html>
