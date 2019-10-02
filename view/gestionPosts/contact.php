<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>CONTACTEZ NOUS</title>

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
    <div class="container fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">CONTACTEZ NOUS</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Si vous avez une remarque ou une question, vous pouvez nous joindre ici. </p>
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
</div>
</body>
</html>
