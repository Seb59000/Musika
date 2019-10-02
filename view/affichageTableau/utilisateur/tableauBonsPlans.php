    <table class="table table-hover">
        <thead class="thead-dark">
          <tr> 
            <th class="text-center"><strong><font>Nom</font></strong></th>
            <th class="text-center"><strong><font>Description</font></strong></th>
            <th class="text-center"><strong><font>Adresse</font></strong></th>
            <th class="text-center"><strong><font>Liens Web</font></strong></th>
            <th class="text-center"><strong><font>Téléphone</font></strong></th>
          </tr>
        </thead>
    <?php
    // On les affiche dans le tableau ligne par ligne
    $arrlength = count($arrayAnnoncesConcerts);

    for($x = 0; $x < $arrlength; $x++) {
      ?>
          <tr> 
            <td class="text-center"><?php echo $arrayAnnoncesConcerts[$x]->get_titre() ?></td>
            <td class="text-center"><?php echo $arrayAnnoncesConcerts[$x]->get_description(); ?></td>
            <td class="text-center"><?php echo $arrayAnnoncesConcerts[$x]->get_adresse(); ?></td>
            <td class="text-center"><a href="<?php echo $arrayAnnoncesConcerts[$x]->get_lienWeb(); ?>"><?php echo $arrayAnnoncesConcerts[$x]->get_lienWeb(); ?></a></td>
            <td class="text-center"><?php echo $arrayAnnoncesConcerts[$x]->get_numTel(); ?></td>
          </tr>
      <?php
    } 
    ?></table>

    <?php 
      if ($indexPremierBonPlan == 0){
      } else {
    ?>
    <a href="index.php?page=bonsPlans&reculerConcert=1" class="btnSubmitLike2">Page précédente</a>
    <?php 
    }

 /////////////////////////////////////////////
// Affichage des pages sous forme de boutons //
 /////////////////////////////////////////////

  $nbPage = ceil($nbTotalBonsPlans/50);
  if ($nbPage>50) {

    // liens vers 5 pages précédentes

    $iDepartBoucle1 = ($indexPremierBonPlan/50)-4;
    $iFinBoucle1 = ($indexPremierBonPlan/50);

      for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
        if ($i>-1){
          ?>
          <a href="index.php?page=bonsPlans&indexPremierBonPlan=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
          <?php  
        }       
      }

    ?>
    <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
    <?php

    // liens vers 5 pages suivantes

    $iDebutBoucle2 = ($indexPremierBonPlan/50)+1;
    $iFinBoucle2 = ($indexPremierBonPlan/50)+5;

      for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
        if ($i<$nbPage){
              ?>
              <a href="index.php?page=bonsPlans&indexPremierBonPlan=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php 
        }     
      }

  } else {

    // On affiche les liens vers toutes les pages

      for ($i=0; $i < $nbPage; $i++) { 
          if ($i==($indexPremierBonPlan/50)){
              ?>
              <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
              <?php
          } else {
              ?>
              <a href="index.php?page=bonsPlans&indexPremierBonPlan=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php
          }
      }
  }

  ////////////////////////////////////////////////
// Fin affichage des pages sous forme de boutons //
 ////////////////////////////////////////////////

    $indexPremierBonPlan+=51;
      if($indexPremierBonPlan>$nbTotalBonsPlans){
      } else {
    ?>
    <a href="index.php?page=bonsPlans&avancerConcert=1" class="btnSubmitLike2">Page suivante</a>
    <?php  
    }
  
  ?>
<br>