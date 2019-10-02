<?php
  if ($nbTotalAnnoncesConcert==0){
      echo "<tr>
              <td><h1>Aucune annonce dans la catégorie concerts.</h1></td>
            </tr>";
  } else {
  


    //affichage header
    ?>
    <table class="table table-hover">
        <h1 class="">
          <?php 
            echo $nbTotalAnnoncesConcert; 
            if ($nbTotalAnnoncesConcert<2){
              echo " annonce concert";
            } else {
              echo " annonces concert";
            }
          ?></h1>
        <thead class="thead-dark">
          <tr> 
            <th class="text-center"><strong><font>Titre</font></strong></th>
            <th class="text-center"><strong><font>Contenu</font></strong></th>
            <th class="text-center"><strong><font>Date Publication</font></strong></th>
            <th class="text-center"><strong><font>Editer</font></strong></th>
          </tr>
        </thead>
    <?php
    // On les affiche dans le tableau ligne par ligne
    $arrlength = count($arrayAnnoncesConcerts);

    for($x = 0; $x < $arrlength; $x++) {
      ?>
          <tr> 
            <td class="text-center"><?php echo $arrayAnnoncesConcerts[$x]->get_titre() ?></td>
            <td class="text-center"><?php echo $arrayAnnoncesConcerts[$x]->get_contenu(); ?></td>
            <td class="text-center"><?php echo $arrayAnnoncesConcerts[$x]->get_date(); ?></td>
           
            <td class="text-center btnSubmitLike3"><a class="btnSubmitLike3" href="controller/gestionPosts/supprimerAnnonce_page.php?idAnnonce=<?php echo $arrayAnnoncesConcerts[$x]->get_idAnnonce(); ?>"><strong>Supprimer</strong></a></td>
          </tr>

      <?php
    } 
    ?></table>
    
    <?php 
      if ($indexPremierConcert == 0){
      } else {
    ?>
    <a href="index.php?page=administrer&reculerConcert=1" class="btnSubmitLike2">Page précédente</a>
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
          <a href="index.php?page=administrer&indexPremierConcert=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
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
              <a href="index.php?page=administrer&indexPremierConcert=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
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
              <a href="index.php?page=administrer&indexPremierConcert=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
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
    <a href="index.php?page=administrer&avancerConcert=1" class="btnSubmitLike2">Page suivante</a>
    <?php  
    }
  }
  ?>
<br>
<br>
<br>
