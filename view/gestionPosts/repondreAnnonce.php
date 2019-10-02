  <?php
    if(!isset($_SESSION['pseudo'])){
      header ('Location: index.php?page=vousDevezEtreConnecte');            
    } else {
      $_SESSION['idDestinataire'] = $_GET['idExpediteur'];
    }
    include 'view/header.php';
  ?>

  <section id="contact">
    <div class="container fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Répondre à l'annonce</h3>
          <div class="section-title-divider"></div>
          <!--<p class="section-description">Choisissez une catégorie</p>-->
        </div>
      </div>

        <div class="col-md-6 col-md-push-3">
          <div class="form">
            <form action="controller/gestionPosts/repondreAnnonce_page.php" method="post" role="form" name="myForm" onsubmit="return validateForm()" >
              <div class="dropdown form-group">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="contenu" id ="contenu" rows="5" placeholder="Votre message" required></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Envoyer</button></div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</body>
</html>
