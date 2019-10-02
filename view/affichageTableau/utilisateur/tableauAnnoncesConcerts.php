<?php
  if ($nbTotalAnnoncesConcert==0){
    ?>
      <tr>
        <td><h1>Aucun concert prévus.</h1></td>
      </tr>
    <?php
  } else {

    //affichage header
    ?>
    <table class="table table-hover">
        <h1 class="">
          <?php 
            echo $nbTotalAnnoncesConcert; 
            if ($nbTotalAnnoncesConcert<2){
              echo " concert";
            } else {
              echo " concerts";
            }
          ?></h1>

    <?php
    // On séléctionne les 10 messages correspondants
    /*$sql = "select * from `annonce` where categorie = 'Concert' limit ";
    $sql = $sql . $indexPremierConcert;
    $sql = $sql . ",10";

    $r->execution($sql);
    $arrayAnnoncesConcerts = $r->afficherAnnoncesConcerts();*/

    // On les affiche dans le tableau ligne par ligne
    $arrlength = count($arrayAnnoncesConcerts);

    for($x = 0; $x < $arrlength; $x++) {
      ?>
        <tr> 
          <td  class ="photoConcert"><?php 
                  $type_photo = $arrayAnnoncesConcerts[$x]->get_type_photo();

                  if($arrayAnnoncesConcerts[$x]->get_type_photo()!=="0"){
                    $adressePhotoProfil = $arrayAnnoncesConcerts[$x]->get_idAnnonce().$arrayAnnoncesConcerts[$x]->get_type_photo();

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
            <h3><?php echo $arrayAnnoncesConcerts[$x]->get_titre(); ?></h3>
            <br> 
            <?php echo $arrayAnnoncesConcerts[$x]->get_contenu(); ?>
            <br> 
            <br> 

            <?php 
              $date = new DateTime($arrayAnnoncesConcerts[$x]->get_date());
              echo $date->format('d/m/Y');
            ?>
            <br> 
            <br> 
            <a class="btnSubmitLike3" href="index.php?page=repondreAnnonce&idExpediteur=<?php echo $arrayAnnoncesConcerts[$x]->get_idExpediteur(); ?>">
              <strong>Contacter</strong>
            </a>
          </td>
        </tr>

      <?php
    } 
    ?></table>

    <?php 
      if ($indexPremierConcert == 0){
      } else {
    ?>
    <a href="index.php?page=annoncesConcerts&reculerConcert=1" class="btnSubmitLike2">Page précédente</a>
    <?php 
    }

 /////////////////////////////////////////////
// Affichage des pages sous forme de boutons //
 /////////////////////////////////////////////

  $nbPage = ceil($nbTotalAnnoncesConcert/10);
  if ($nbPage>10) {

    // liens vers 5 pages précédentes

    $iDepartBoucle1 = ($indexPremierConcert/10)-4;
    $iFinBoucle1 = ($indexPremierConcert/10);

      for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
        if ($i>-1){
          ?>
          <a href="index.php?page=annoncesConcerts&indexPremierConcert=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
          <?php  
        }       
      }

    ?>
    <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
    <?php

    // liens vers 5 pages suivantes

    $iDebutBoucle2 = ($indexPremierConcert/10)+1;
    $iFinBoucle2 = ($indexPremierConcert/10)+5;

      for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
        if ($i<$nbPage){
              ?>
              <a href="index.php?page=annoncesConcerts&indexPremierConcert=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php 
        }     
      }

  } else {

    // On affiche les liens vers toutes les pages

      for ($i=0; $i < $nbPage; $i++) { 
          if ($i==($indexPremierConcert/10)){
              ?>
              <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
              <?php
          } else {
              ?>
              <a href="index.php?page=annoncesConcerts&indexPremierConcert=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php
          }
      }
  }

  ////////////////////////////////////////////////
// Fin affichage des pages sous forme de boutons //
 ////////////////////////////////////////////////

    
    $indexPremierConcert+=11;
      if($indexPremierConcert>$nbTotalAnnoncesConcert){
      } else {
    ?>
    <a href="index.php?page=annoncesConcerts&avancerConcert=1" class="btnSubmitLike2">Page suivante</a>
    <?php  
    }
  }
  ?>
<br>