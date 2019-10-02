<?php 
session_start();

  if(!isset($_SESSION['pseudo'])){
  	$_SESSION['deposerAnnonce'] = true;
    header ('Location: ../../index.php?page=vousDevezEtreConnecteBonPlan');            
  } else {
    $categorie = htmlspecialchars($_POST['categorie']);
    $titre = htmlspecialchars($_POST['nom']);
    $contenu = htmlspecialchars($_POST['description']);
    $ville = htmlspecialchars($_POST['ville']);
    $rue = htmlspecialchars($_POST['rue']);
    $numRue = htmlspecialchars($_POST['numRue']);
    $lienWeb = htmlspecialchars($_POST['lienWeb']);
    $numTel = htmlspecialchars($_POST['numTel']);

    include '../../model/model.php';

    executeNoReturn("INSERT INTO `bonplan`(`categorie`, `titre`, `description`, `ville`, 'rue', 'numRue', `lienWeb`, `numTel`) VALUES ('$categorie','$titre','$contenu','$ville', '$rue', '$numRue', '$lienWeb','$numTel')");

    header ('Location: ../../index.php?page=confirmationBonPlan');
  }
?>