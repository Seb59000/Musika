<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Connexion</title>

    <script>
    function validateForm() {
        // Je vérifie que l'adresse mail est valide
      var email   = document.forms["myForm"]["email"].value;
        var verif   = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
        if (verif.exec(email) == null)
      {
        alert("Votre email est incorrecte");
        return false;
      }
    }
  </script>

</head>

<body>
  <?php
        include 'view/header.php';
  ?>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class='section-title'>Connexion</h3>
            <div class='section-title-divider'></div>
            <p class='section-description'>Si vous n'êtes pas encore enregistré, vous pouvez créer <a href='index.php?page=enregistrer'>votre compte ici.</a> </p>
        </div>
      </div>

        <div class="col-md-6 col-md-push-3">
          <div class="form">
            <div id="errormessage"></div>
            <form action="controller/espacePerso/connexion_page.php" name ="myForm" method="post" role="form" onsubmit="return validateForm()">
              <div class="form-group">
                <input type="text" name="email" class="form-control" id="email" placeholder="Adresse mail" required="" />
                <div class="messageErreur">
                  <?php
                    if (isset($_SESSION['emailNonTrouve'])){
                      echo 'Aucun compte enregistré avec cette adresse mail';
                      unset($_SESSION['emailNonTrouve']);
                    }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="motDePasse" id="motDePasse" placeholder="Mot de passe" required/>
                <div class="messageErreur">
                  <?php
                    if (isset($_SESSION['motDePasseErrone'])){
                      echo 'Mot de passe erroné';
                      unset($_SESSION['motDePasseErrone']);
                    }
                  ?>
                </div>
              </div>
              <div class="text-center"><button type="submit">Se connecter</button></div>
            </form>
          </div>
        </div>
      </div>
      <div class="fadeInUp">
                <br><br>


        <p class="section-description">Si vous avez oublié votre mot de passe, vous pouvez le <a href="index.php?page=recuperation">réinitialiser ici.</a> </p>
      </div>
        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br>

  </section>

  <?php
        include 'view/footer.php';
  ?>

</body>
</html>
