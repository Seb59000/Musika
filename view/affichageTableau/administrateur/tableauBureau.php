<?php
  //Affichage header
  ?>
  <br>
  <h2>
    Sélectionnez les membres du bureau parmi les utilisateurs :
  </h2>
  <br>
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
          <th class="text-center"><strong><font>Editer</font></strong></th>
        </tr>
      </thead>
  <?php
  // On les affiche dans le tableau ligne par ligne
  $arrlength = count($arrayUtilisateursB);

  for($x = 0; $x < $arrlength; $x++) {
    ?>
        <tr> 
          <td rowspan="3" class ="photoMembre"><?php 
                  if($arrayUtilisateursB[$x]->get_photo()==1){
                    $adressePhotoProfil = $arrayUtilisateursB[$x]->get_idUtilisateur().$arrayUtilisateursB[$x]->get_typePhoto();
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
          <td rowspan="3" class="text-center"><strong><?php echo $arrayUtilisateursB[$x]->get_pseudo(); ?></strong>
            <br>
            <?php 
            // Affichage statut
              $statut = $arrayUtilisateursB[$x]->get_statut(); 
              if ($statut == 0){
                echo 'utilisateur<br>';
              } else {
                echo 'administrateur<br>';
              }

              // Affichage Role dans l'asso
              $bureau = $arrayUtilisateursB[$x]->get_idBureau(); 
              if ($bureau == 1){
                echo 'Secrétaire';
              } else if ($bureau == 2){
                echo 'Trésorier';
              } else if ($bureau == 3){
                echo 'Président';
              } 
              echo '<br><br>'; 
              if ($arrayUtilisateursB[$x]->get_fonction()!=null)  
              echo "Message affiché en page d'accueil :<br>".$arrayUtilisateursB[$x]->get_fonction();        
            ?>
            <br> 
            <br> 
          </td>
          <td class="text-center btnSubmitLike3">
            <a class="btnSubmitLike3" href="index.php?page=modifierBureau&idUtilisateur=<?php echo $arrayUtilisateursB[$x]->get_idUtilisateur().'&fonction=1&pseudo='.$arrayUtilisateursB[$x]->get_pseudo(); ?>"><strong>Secrétaire</strong>
            </a>
          </td>
            </tr>
            <tr>
            <td class="text-center btnSubmitLike3">
              <a class="btnSubmitLike3" href="index.php?page=modifierBureau&idUtilisateur=<?php echo $arrayUtilisateursB[$x]->get_idUtilisateur().'&fonction=2&pseudo='.$arrayUtilisateursB[$x]->get_pseudo(); ?>"><strong>Trésorier</strong>
              </a>
            </td>
            </tr>
            <tr>
            <td class="text-center btnSubmitLike3">
              <a class="btnSubmitLike3" href="index.php?page=modifierBureau&idUtilisateur=<?php echo $arrayUtilisateursB[$x]->get_idUtilisateur().'&fonction=3&pseudo='.$arrayUtilisateursB[$x]->get_pseudo(); ?>"><strong>Président</strong>
              </a>
            </td>
        </tr>
    <?php
  }
  ?></table>
  
  <?php 
    if ($indexPremierUtilisateurB == 0){
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

    $iDepartBoucle1 = ($indexPremierUtilisateurB/10)-4;
    $iFinBoucle1 = ($indexPremierUtilisateurB/10);

      for ( $i = $iDepartBoucle1 ; $i < $iFinBoucle1 ; $i++ ) { 
        if ($i>-1){
          ?>
          <a href="index.php?page=administrer&indexPremierUtilisateurB=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
          <?php  
        }       
      }

    ?>
    <a href="#" class="btnSubmitLike4"><?php echo ($iFinBoucle1+1); ?></a>
    <?php

    // liens vers 5 pages suivantes

    $iDebutBoucle2 = ($indexPremierUtilisateurB/10)+1;
    $iFinBoucle2 = ($indexPremierUtilisateurB/10)+5;

      for ($i=$iDebutBoucle2; $i < $iFinBoucle2; $i++) { 
        if ($i<$nbPage){
              ?>
              <a href="index.php?page=administrer&indexPremierUtilisateurB=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php 
        }     
      }

  } else {

    // On affiche les liens vers toutes les pages

      for ($i=0; $i < $nbPage; $i++) { 
          if ($i==($indexPremierUtilisateurB/10)){
              ?>
              <a href="#" class="btnSubmitLike4"><?php echo ($i +1); ?></a>
              <?php
          } else {
              ?>
              <a href="index.php?page=administrer&indexPremierUtilisateurB=<?php echo ($i); ?>" class="btnSubmitLike2"><?php echo ($i +1); ?></a>
              <?php
          }
      }
  }

  ////////////////////////////////////////////////
// Fin affichage des pages sous forme de boutons //
 ////////////////////////////////////////////////
  
  $indexPremierUtilisateurB+=11;
    if($indexPremierUtilisateurB>$nbTotalUtilisateur){
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


