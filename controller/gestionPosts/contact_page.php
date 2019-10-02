<?php 
    session_start();

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email =  htmlspecialchars($_POST['email']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message =  htmlspecialchars($_POST['message']);

    $pseudo = str_replace("'", " ", $pseudo);
    $email = str_replace("'", " ", $email);
    $sujet = str_replace("'", " ", $sujet);
    $message = str_replace("'", " ", $message);

    require('../../model/model.php');

    // On enregistre le message dans la base
    executeNoReturn("insert into `message`(`pseudoExpediteur`, `email`, `sujet`, `contenu`, `date`) values ('$pseudo','$email','$sujet','$message', now())");

    //$result = $r->afficherStatutUtilisateur();

    // On redirige vers page succès
    header ('Location: ../../index.php?page=messageEnvoye');