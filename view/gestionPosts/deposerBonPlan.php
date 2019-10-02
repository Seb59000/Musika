<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Bons Plans</title>
</head>

<body>

  <?php
        include 'view/header.php';
  ?>

  <section id="contact">
    <div class="container fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Partagez vos adresses</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Déposez votre bon plan ici.</p>
        </div>
      </div>
        <div class="col-md-6 col-md-push-3">
          <div class="form">

            <form action="controller/gestionPosts/deposerBonPlan_page.php" method="post" role="form" name="myForm">
              <div class="form-group">
                <select name="categorie" class="form-control">Catégorie
                  <option value="Autre">Choisir une catégorie</option>
                  <option value="Association">Association</option>
                  <option value="Enregistrements">Enregistrements</option>
                  <option value="LocalsRepete">Locals de répétition</option>
                  <option value="Bars">Bars / Salles de concert</option>
                  <option value="Magasins">Magasins</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="description" rows="5" placeholder="Description" required></textarea>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="numRue" id="numRue" placeholder="Numéro"/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="rue" id="rue" placeholder="Rue"/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville"/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="lienWeb" id="lienWeb" placeholder="Lien Web" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="numTel" id="numTel" placeholder="Téléphone" required/>
                <div class="validation"></div>
              </div>
              <br>
              <div class="text-center"><button type="submit">Envoyer</button></div>
            </form>
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
