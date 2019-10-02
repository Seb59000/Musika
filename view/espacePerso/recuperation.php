<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Récuperation du mot de passe</title>
</head>

<body>
  <?php
        include 'view/header.php';
  ?>


  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Récuperation du mot de passe</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Un code va être envoyé sur votre boite mail. Notez le et poursuivez. </p>
        </div>
      </div>

        <div class="col-md-6 col-md-push-3">
          <div class="form">
            <div id="errormessage"></div>
            <form action="controller/espacePerso/recuperationMotPasse_page.php" method="post" role="form">
              <div class="form-group">
                <input type="text" name="email" class="form-control" id="email" placeholder="Adresse mail" data-rule="minlen:4 email" data-msg="Veuillez entrer une adresse mail valide." />
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Envoyer le code sur ma boîte</button></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
<div class="placeHaut"></div>
<div class="place">
</div>
  <?php
        include 'view/footer.php';
  ?>

</body>
</html>
