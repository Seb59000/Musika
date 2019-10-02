<?php
  if ($nbTotalPhotos==0){
    ?>
        <h1 class="centre">Aucune photo dans l'album</h1>
    <?php
  } else {
    // On les affiche dans le tableau ligne par ligne
    $arrlength = count($arrayPhotos);
  ?>
    <section id="portfolio">
      <div class="container wow fadeInUp">
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>

        <div class="row">
  <?php
    for($x = 0; $x < $arrlength; $x++) {
      ?>

          <div class="col-md-3">
            <a class="portfolio-item" style="background-image: url(<?php echo 'public/img/PhotosGalerie/'.$arrayPhotos[$x]->get_idPhoto().$arrayPhotos[$x]->get_TypePhoto(); ?>);" href="<?php echo 'public/img/PhotosGalerie/'.$arrayPhotos[$x]->get_idPhoto().$arrayPhotos[$x]->get_TypePhoto(); ?>">
              <div class="details">
                <h4><?php echo $arrayPhotos[$x]->get_commentaire(); ?> </h4>
              </div>
            </a>
            <a class="btnSubmitLike6" href="controller/gestionPosts/supprimerPhoto_page.php?adresse=<?php echo 'public/img/PhotosGalerie/'.$arrayPhotos[$x]->get_idPhoto().$arrayPhotos[$x]->get_TypePhoto()."&idPhoto=".$arrayPhotos[$x]->get_idPhoto()."&admin=0"; ?>">
              <strong>Supprimer</strong>
            </a>          
          </div>

      <?php
    } 
    ?>
           </div>
   <!-- <a href="" class="btnSubmitLike2">Page <?php $page = ($indexPremierePhoto/8)+1; echo $page; ?></a> -->
    <?php 
      if ($indexPremierePhoto == 0){
      } else {
    ?>
    <a href="index.php?page=espacePerso&reculerPhoto=1" class="btnSubmitLike2">Page précédente</a>
    <?php 
    } 

    /////////////////////////////////////////////
  // Affichage des pages sous forme de boutons //
   /////////////////////////////////////////////

    $nbPage = ceil($nbTotalPhotos/8);
    if ($nbPage>8) {

      // liens vers 5 pages précédentes

      $iDepartBoucle1 = ($indexPremierePhoto/8)-4;
      $iFinBoucle1 = ($indexPremierePhoto/8);

        for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
          if ($i>-1){
            ?>
            <a href="index.php?page=espacePerso&indexPremierePhoto=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
            <?php  
          }       
        }

      ?>
      <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
      <?php

      // liens vers 5 pages suivantes

      $iDebutBoucle2 = ($indexPremierePhoto/8)+1;
      $iFinBoucle2 = ($indexPremierePhoto/8)+5;

        for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
          if ($i<$nbPage){
                ?>
                <a href="index.php?page=espacePerso&indexPremierePhoto=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
                <?php 
          }     
        }

    } else {

      // On affiche les liens vers toutes les pages

        for ($i=0; $i < $nbPage; $i++) { 
            if ($i==($indexPremierePhoto/8)){
                ?>
                <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
                <?php
            } else {
                ?>
                <a href="index.php?page=espacePerso&indexPremierePhoto=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
                <?php
            }
        }
    }

    ////////////////////////////////////////////////
  // Fin affichage des pages sous forme de boutons //
   ////////////////////////////////////////////////

    $indexPremierePhoto+=9;
      if($indexPremierePhoto>$nbTotalPhotos){
      } else {
    ?>
    <a href="index.php?page=espacePerso&avancerPhoto=1" class="btnSubmitLike2">Page suivante</a>
        </div>
      </section>
    <?php  
    }  
  }
?>