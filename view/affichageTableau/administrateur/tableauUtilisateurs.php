<?php
  //Affichage header
  ?>
  <table class="table table-hover">
      <h1 class="">
        <?php 
          echo $nbTotalUtilisateur; 
          if ($nbTotalUtilisateur<2){
            echo " utilisateur";
          } else {
            echo " utilisateurs";
          }
        ?> </h1>
      <thead class="thead-dark ">
        <tr> 
          <th class="text-center"><strong><font >Photo</font></strong></th>
          <th class="text-center"><strong><font>Infos persos</font></strong></th>
          <th class="text-center"><strong><font>Message de présentation</font></strong></th>
          <th class="text-center"><strong><font>Editer</font></strong></th>
        </tr>
      </thead>
  <?php
  // On les affiche dans le tableau ligne par ligne
  $arrlength = count($arrayUtilisateurs);

  for($x = 0; $x < $arrlength; $x++) {
    ?>
            <tr> 
              <td rowspan="3" class ="photoMembre"><?php 
                      if($arrayUtilisateurs[$x]->get_photo()==1){
                        $adressePhotoProfil = $arrayUtilisateurs[$x]->get_idUtilisateur().$arrayUtilisateurs[$x]->get_typePhoto();
                        ?>
                        <img src="public/img/photosMembres/<?php echo $adressePhotoProfil; ?>" alt="<?php echo $adressePhotoProfil; ?>">
                        <br>
                        <br>
                        <?php
                      } else {
                        ?>
                        <img src="public/img/photosMembres/profilMystere.png">
                        <?php
                      }
                  ?>
              </td>
              <td rowspan="3" class="text-center"><strong><?php echo $arrayUtilisateurs[$x]->get_pseudo(); ?></strong>
                <br>
                <?php 
                  $statut = $arrayUtilisateurs[$x]->get_statut(); 
                  if ($statut == 0){
                    echo 'utilisateur';
                  } else {
                    echo 'administrateur';
                  }
                ?>
                <br> 
                <br> 
                <?php echo $arrayUtilisateurs[$x]->get_email(); ?>
              </td>
              <td rowspan="3"><?php echo $arrayUtilisateurs[$x]->get_messagePresentation() ?>
              </td>
              <td class="text-center btnSubmitLike3">
                <a class="btnSubmitLike3" href="index.php?page=envoyerMessageAdminUtilisateur&idDestinataire=<?php echo $arrayUtilisateurs[$x]->get_idUtilisateur(); ?>"><strong>Contacter</strong>
                </a>
              </td>
            </tr>
            <tr>
              <td class="text-center btnSubmitLike3">
                <a class="btnSubmitLike3" href="controller/gestionSite/supprimerUtilisateur_page.php?idUtilisateur=<?php echo $arrayUtilisateurs[$x]->get_idUtilisateur(); ?>"><strong>Supprimer</strong>
                </a>
              </td>
            </tr>
            <tr>
              <td class="text-center btnSubmitLike3">
                <a class="btnSubmitLike3" href="controller/gestionSite/changerStatutUtilisateur_page.php?idUtilisateur=<?php echo $arrayUtilisateurs[$x]->get_idUtilisateur(); ?>&statut=<?php echo $arrayUtilisateurs[$x]->get_statut(); ?>"><strong>Changer le Statut</strong>
                </a>
              </td>
            </tr>
    <?php
  }
  ?></table>
  
  <?php 
    if ($indexPremierUtilisateur == 0){
    } else {
  ?>
  <a href="index.php?page=administrer&reculerUtilisateurs=1" class="btnSubmitLike2">Page précédente</a>
  <?php 
  }

 /////////////////////////////////////////////
// Affichage des pages sous forme de boutons //
 /////////////////////////////////////////////

  $nbPage = ceil($nbTotalUtilisateur/10);
  if ($nbPage>10) {

    // liens vers 5 pages précédentes

    $iDepartBoucle1 = ($indexPremierUtilisateur/10)-4;
    $iFinBoucle1 = ($indexPremierUtilisateur/10);

      for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
        if ($i>-1){
          ?>
          <a href="index.php?page=administrer&indexPremierUtilisateur=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
          <?php  
        }       
      }

    ?>
    <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
    <?php

    // liens vers 5 pages suivantes

    $iDebutBoucle2 = ($indexPremierUtilisateur/10)+1;
    $iFinBoucle2 = ($indexPremierUtilisateur/10)+5;

      for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
        if ($i<$nbPage){
              ?>
              <a href="index.php?page=administrer&indexPremierUtilisateur=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php 
        }     
      }

  } else {

    // On affiche les liens vers toutes les pages

      for ($i=0; $i < $nbPage; $i++) { 
          if ($i==($indexPremierUtilisateur/10)){
              ?>
              <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
              <?php
          } else {
              ?>
              <a href="index.php?page=administrer&indexPremierUtilisateur=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php
          }
      }
  }

  ////////////////////////////////////////////////
// Fin affichage des pages sous forme de boutons //
 ////////////////////////////////////////////////
  
  $indexPremierUtilisateur+=11;
    if($indexPremierUtilisateur>$nbTotalUtilisateur){
    } else {
  ?>
  <a href="index.php?page=administrer&avancerUtilisateur=1" class="btnSubmitLike2">Page suivante</a>
  <?php  
  }
  ?>
<br>
<br>
<br>
<br>


