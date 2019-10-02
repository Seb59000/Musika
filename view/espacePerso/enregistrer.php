<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>s'enregistrer</title>

  <script>
    function validateForm() {
        // Je verifie que les mots de passe correspondent
        var motDePasse = document.forms["myForm"]["motDePasse"].value;
        var motDePasseRepeat = document.forms["myForm"]["passwordRepeat"].value;        

        if (motDePasse != motDePasseRepeat) {
            alert("Les deux mots de passe ne correspondent pas.");
            return false;
        }

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
          <h3 class="section-title">s'enregistrer</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">
           Veuillez renseigner tous les champs pour pouvoir créer votre compte.<br>
           Si avez déjà un compte,<a href="index.php?page=connexion"> connectez vous ici.</a> </p>
        </div>
      </div>

        <div class="col-md-6 col-md-push-3">
          <div class="form">
            <div id="errormessage"></div>
            <form action="controller/espacePerso/enregistrement_page.php" method="post" role="form" name="myForm" onsubmit="return validateForm()" >
              <div class="form-group">
                <input type="text" name="email" class="form-control" id="email" placeholder="Adresse mail" required/>
                <div class="messageErreur">
                  <?php
                    if (isset($_SESSION['emailDejaUtilise'])){
                      echo 'Adresse mail déjà utilisée';
                      unset($_SESSION['emailDejaUtilise']);
                    }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo" required/>
                <div class="messageErreur">
                  <?php
                    if (isset($_SESSION['pseudoDejaUtilise'])){
                      echo 'Pseudo déjà utilisé';
                      unset($_SESSION['pseudoDejaUtilise']);
                    }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="motDePasse" id="motDePasse" placeholder="Choisissez un mot de passe" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="Répétez votre mot de passe" required/>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">S'enregistrer</button></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>


<div class="placeS">
</div>
  <?php
        include 'view/footer.php';
  ?>

</body>
</html>
