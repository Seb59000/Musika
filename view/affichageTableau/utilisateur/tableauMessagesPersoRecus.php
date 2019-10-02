       <table class="table table-hover">
        <h1 class=" col-md-12 col-md-push-4">
          <?php 
          if ($nbTotalMessagesRecus==0){
              echo "Aucun message reçu</table>";

          } else {
            echo $nbTotalMessagesRecus; 
            if ($nbTotalMessagesRecus<2){
              echo " message reçu <br><br>";
            } else {
              echo " messages reçus <br><br>";
            }
          ?></h1>
          <thead class="thead-dark">
            <tr> 
              <th class="text-center"><strong><font>Expéditeur</font></strong></th>
              <th class="text-center"><strong><font></font></strong></th>
              <th class="text-center"><strong><font>Editer</font></strong></th>
            </tr>
          </thead>
   <?php                  

  // On affiche les messages dans le tableau ligne par ligne
  $arrlength = count($arrayMessagesRecus);

  for($x = 0; $x < $arrlength; $x++) {
    ?>
        <tr> 
          <td rowspan="2" class="text-center"><?php echo $arrayMessagesRecus[$x]->get_pseudoDestinataire(); ?></td>
          <td rowspan="2" class="text-center"><?php echo $arrayMessagesRecus[$x]->get_contenu(); ?></td>

          <td class="text-center btnSubmitLike3">
            <a class="btnSubmitLike3" href="index.php?page=envoyerMessagePerso&idDestinataire=<?php echo $arrayMessagesRecus[$x]->get_idExpediteur(); ?>"><strong>Répondre</strong>
            </a>
          </td>
        </tr>
        <tr>
          <td class="text-center btnSubmitLike3"><a class="btnSubmitLike3" href="controller/gestionPosts/MessagePersoSupprimer_page.php?idMessagePerso=<?php echo $arrayMessagesRecus[$x]->get_idMessagePerso(); ?>"><strong>Supprimer</strong></a></td>
        </tr>

    <?php
  } 
  ?></table>
  
  <?php 
    if ($indexPremierMessageRecu == 0){
    } else {
  ?>
  <a href="espacePerso.php?reculer=1" class="btnSubmitLike2">Page précédente</a>
  <?php 
  }

 /////////////////////////////////////////////
// Affichage des pages sous forme de boutons //
 /////////////////////////////////////////////

  $nbPage = ceil($nbTotalMessagesRecus/10);
  if ($nbPage>10) {

    // liens vers 5 pages précédentes

    $iDepartBoucle1 = ($indexPremierMessageRecu/10)-4;
    $iFinBoucle1 = ($indexPremierMessageRecu/10);

      for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
        if ($i>-1){
          ?>
          <a href="espacePerso.php?indexPremierMessageRecu=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
          <?php  
        }       
      }

    ?>
    <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
    <?php

    // liens vers 5 pages suivantes

    $iDebutBoucle2 = ($indexPremierMessageRecu/10)+1;
    $iFinBoucle2 = ($indexPremierMessageRecu/10)+5;

      for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
        if ($i<$nbPage){
              ?>
              <a href="espacePerso.php?indexPremierMessageRecu=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php 
        }     
      }

  } else {

    // On affiche les liens vers toutes les pages

      for ($i=0; $i < $nbPage; $i++) { 
          if ($i==($indexPremierMessageRecu/10)){
              ?>
              <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
              <?php
          } else {
              ?>
              <a href="espacePerso.php?indexPremierMessageRecu=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php
          }
      }
  }

  ////////////////////////////////////////////////
// Fin affichage des pages sous forme de boutons //
 ////////////////////////////////////////////////
  
  $indexPremierMessageRecu+=11;
    if($indexPremierMessageRecu>$nbTotalMessagesRecus){
    } else {
  ?>
  <a href="espacePerso.php?avancer=1" class="btnSubmitLike2">Page suivante</a>
  <?php  
  }
}
  ?>

<!-- debut

fin -->

<br>
<br>
<br>
<br>