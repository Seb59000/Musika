<?php
    ?>
       <table class="table table-hover">
        <h1 class="">
          <?php 
            echo $nbTotalMessages; 
            if ($nbTotalMessages<2){
              echo " message reçu";
            } else {
              echo " messages reçus";
            }
          ?></h1>
          <thead class="thead-dark">
            <tr> 
              <th class="text-center"><strong><font >Nom</font></strong></th>
              <th class="text-center"><strong><font>Adresse mail</font></strong></th>
              <th class="text-center"><strong><font>Sujet</font></strong></th>
              <th class="text-center"><strong><font>Message</font></strong></th>
              <th class="text-center"><strong><font>Date</font></strong></th>
              <th class="text-center"><strong><font></font>Editer</strong></th>
            </tr>
          </thead>
   <?php                  

  // On affiche les messages dans le tableau ligne par ligne
  $arrlength = count($arrayMessages);

  for($x = 0; $x < $arrlength; $x++) {
    ?>
        <tr> 
          <td class="text-center"><?php echo $arrayMessages[$x]->get_pseudoExpediteur(); ?></td>
          <td class="text-center"><?php echo $arrayMessages[$x]->get_email(); ?></td>
          <td class="text-center"><?php echo $arrayMessages[$x]->get_sujet() ?></td>
          <td class="text-center"><?php echo $arrayMessages[$x]->get_contenu(); ?></td>
          <td class="text-center"><?php echo $arrayMessages[$x]->get_date(); ?></td>
         
          <td class="text-center btnSubmitLike3"><a class="btnSubmitLike3" href="controller/gestionPosts/supprimerMessage_page.php?idMessage=<?php echo $arrayMessages[$x]->get_idMessage(); ?>"><strong>Supprimer</strong></a></td>
        </tr>

    <?php
  } 
  ?></table>
  
  <?php 
    if ($indexPremierMessage == 0){
    } else {
  ?>
  <a href="index.php?page=administrer&reculer=1" class="btnSubmitLike2">Page précédente</a>
  <?php 
  }

 /////////////////////////////////////////////
// Affichage des pages sous forme de boutons //
 /////////////////////////////////////////////

  $nbPage = ceil($nbTotalMessages/10);
  if ($nbPage>10) {

    // liens vers 5 pages précédentes

    $iDepartBoucle1 = ($indexPremierMessage/10)-4;
    $iFinBoucle1 = ($indexPremierMessage/10);

      for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
        if ($i>-1){
          ?>
          <a href="index.php?page=administrer&indexPremierMessage=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
          <?php  
        }       
      }

    ?>
    <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
    <?php

    // liens vers 5 pages suivantes

    $iDebutBoucle2 = ($indexPremierMessage/10)+1;
    $iFinBoucle2 = ($indexPremierMessage/10)+5;

      for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
        if ($i<$nbPage){
              ?>
              <a href="index.php?page=administrer&indexPremierMessage=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php 
        }     
      }

  } else {

    // On affiche les liens vers toutes les pages

      for ($i=0; $i < $nbPage; $i++) { 
          if ($i==($indexPremierMessage/10)){
              ?>
              <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
              <?php
          } else {
              ?>
              <a href="index.php?page=administrer&indexPremierMessage=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php
          }
      }
  }

  ////////////////////////////////////////////////
// Fin affichage des pages sous forme de boutons //
 ////////////////////////////////////////////////

  $indexPremierMessage+=11;
    if($indexPremierMessage>$nbTotalMessages){
    } else {
  ?>
  <a href="index.php?page=administrer&avancer=1" class="btnSubmitLike2">Page suivante</a>
  <?php  
  }
  ?>
<br>
<br>
<br>
<br>
