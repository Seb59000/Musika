<?php
  //affichage header
  ?>
  <table class="table table-hover">
      <h1 class=" col-md-12 col-md-push-4">
        <?php 
          if ($nbTotalAnnonces == 0) {
            echo "Aucune annonce postée";
          } else if ($nbTotalAnnonces<2){
          	echo $nbTotalAnnonces ; 
            echo " annonce postée <br><br>";
          } else {
          	echo $nbTotalAnnonces ; 
            echo " annonces postées <br><br>";
          }

          if ($nbTotalAnnonces > 0){
          	?>
		      <thead class="thead-dark">
		        <tr> 
		          <th class="text-center"><strong><font>Titre</font></strong></th>
		          <th class="text-center"><strong><font>Contenu</font></strong></th>
		          <th class="text-center"><strong><font>Date Publication</font></strong></th>
		          <th class="text-center"><strong><font>Editer</font></strong></th>
		        </tr>
		      </thead>
          	<?php
          } else {
          	?>
      </h1>
          	<?php
          }
        ?>
        	
      </h1>
  <?php
  // On les affiche dans le tableau ligne par ligne
  $arrlength = count($arrayAnnonces);

  for($x = 0; $x < $arrlength; $x++) {
    ?>
        <tr> 
          <td class="text-center"><?php echo $arrayAnnonces[$x]->get_titre() ?></td>
          <td class="text-center"><?php echo $arrayAnnonces[$x]->get_contenu(); ?></td>
          <td class="text-center"><?php echo $arrayAnnonces[$x]->get_date(); ?></td>

          <td class="text-center btnSubmitLike3"><a class="btnSubmitLike3" href="controller/gestionPosts/supprimerAnnonce_page.php?idAnnonce=<?php echo $arrayAnnonces[$x]->get_idAnnonce(); ?>&location=espacePerso"><strong>Supprimer</strong></a></td>
        </tr>

    <?php
  } 
  ?></table>
  

  <?php 
    if ($indexPremiereAnnonce == 0){
    } else {
  ?>
  <a href="index.php?page=espacePerso&reculerAnnonce=1" class="btnSubmitLike2">Page précédente</a>
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
          <a href="index.php?page=espacePerso&indexPremiereAnnonce=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
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
              <a href="index.php?page=espacePerso&indexPremiereAnnonce=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
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
              <a href="index.php?page=espacePerso&indexPremiereAnnonce=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
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
  <a href="index.php?page=espacePerso&avancerAnnonce=1" class="btnSubmitLike2">Page suivante</a>
  <?php  
  }
  ?>
<br>