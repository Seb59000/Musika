<?php
  if ($nbTotalAnnonces==0){
      echo "<tr>
              <td><h1>Aucune annonce</h1></td>
            </tr>";
  } else {
      // Affichage header
      ?>
      <table class="table table-hover">
          <h1 class="">
            <?php 
              echo $nbTotalAnnonces; 
              if ($nbTotalAnnonces<2){
                echo " annonce";
              } else {
                echo " annonces";
              }
            ?></h1>
      <?php
      // On les affiche dans le tableau ligne par ligne
      $arrlength = count($arrayAnnoncesMatos);

      for($x = 0; $x < $arrlength; $x++) {
        ?>
          <tr> 
            <td class ="photoConcert"><?php 
                    $type_photo = $arrayAnnoncesMatos[$x]->get_type_photo();

                    if($arrayAnnoncesMatos[$x]->get_type_photo()!=="0"){
                      $adressePhotoProfil = $arrayAnnoncesMatos[$x]->get_idAnnonce().$arrayAnnoncesMatos[$x]->get_type_photo();

                      ?>
                      <img src="public/img/PhotosAnnonce/<?php echo $adressePhotoProfil; ?>" alt="<?php echo $adressePhotoProfil; ?>">
                      <br>
                      <br>
                      <?php
                    } else {
                      ?>
                      <img src="public/img/PhotosAnnonce/AnnonceMystere.png">
                      <?php
                    }
                ?>
            </td>
            <td  class="text-center">
              <br> 
              <h3><?php echo $arrayAnnoncesMatos[$x]->get_titre(); ?></h3>
              <br> 
              <?php echo $arrayAnnoncesMatos[$x]->get_contenu(); ?>
              <br> 
              <br> 
              Date de publication
              <br> 
              <?php 
                $date = new DateTime($arrayAnnoncesMatos[$x]->get_date());
                echo $date->format('d/m/Y');
              ?>
              <br> 
              <br> 
              <a class="btnSubmitLike3" href="index.php?page=repondreAnnonce&idExpediteur=<?php echo $arrayAnnoncesMatos[$x]->get_idExpediteur(); ?>">
                <strong>Contacter</strong>
              </a>
            </td>
          </tr>
        <?php        
      } 
      ?></table>
      
      <?php 
        if ($indexPremiereAnnonce == 0){
        } else {
      ?>
      <a href="index.php?page=annoncesMatos&reculerAnnonceMatos=1" class="btnSubmitLike2">Page précédente</a>
      <?php 
      }

 /////////////////////////////////////////////
// Affichage des pages sous forme de boutons //
 /////////////////////////////////////////////

  $nbPage = ceil($nbTotalAnnonces/10);
  if ($nbPage>10) {

    // liens vers 5 pages précédentes

    $iDepartBoucle1 = ($indexPremiereAnnonce/10)-4;
    $iFinBoucle1 = ($indexPremiereAnnonce/10);

      for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
        if ($i>-1){
          ?>
          <a href="index.php?page=annoncesMatos&indexPremiereAnnonce=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
          <?php  
        }       
      }

    ?>
    <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
    <?php

    // liens vers 5 pages suivantes

    $iDebutBoucle2 = ($indexPremiereAnnonce/10)+1;
    $iFinBoucle2 = ($indexPremiereAnnonce/10)+5;

      for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
        if ($i<$nbPage){
              ?>
              <a href="index.php?page=annoncesMatos&indexPremiereAnnonce=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php 
        }     
      }

  } else {

    // On affiche les liens vers toutes les pages

      for ($i=0; $i < $nbPage; $i++) { 
          if ($i==($indexPremiereAnnonce/10)){
              ?>
              <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
              <?php
          } else {
              ?>
              <a href="index.php?page=annoncesMatos.&indexPremiereAnnonce=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php
          }
      }
  }

  ////////////////////////////////////////////////
// Fin affichage des pages sous forme de boutons //
 ////////////////////////////////////////////////
      
      $indexPremiereAnnonce+=11;
        if($indexPremiereAnnonce>$nbTotalAnnonces){
        } else {
      ?>
      <a href="index.php?page=annoncesMatos&avancerAnnonceMatos=1" class="btnSubmitLike2">Page suivante</a>
      <?php  
      }    
  }

  ?>
<br>
