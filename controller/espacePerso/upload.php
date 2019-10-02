<?php
    session_start();
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $target_dir = "../../public/img/PhotosMembres/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Désolé, seul les formats JPG, JPEG, PNG & GIF sont admis.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas pu être téléchargé.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $extension = renomer($imageFileType, $idUtilisateur);
            changerPhotoBDD($idUtilisateur, $extension);
            $_SESSION['idPhoto'] = 1;
            $_SESSION['typePhoto'] = $extension;
            header ('Location: ../../index.php?page=espacePerso');
        } else {
            echo "Désolé, une erreur est survenue durant le téléchargement de votre image.";
        }
    }

    function renomer($imageFileType, $idUtilisateur){
        $extension = "";
        $ancienNom = "../../public/img/photosMembres/";
        $ancienNom = $ancienNom . basename($_FILES["fileToUpload"]["name"]);

        $nouveauNom ="../../public/img/photosMembres/";
        $nouveauNom = $nouveauNom . $idUtilisateur;

        if($imageFileType == "jpg") {
            $nouveauNom = $nouveauNom . ".jpg";
            $extension = ".jpg";
        } else if($imageFileType == "png") {
            $nouveauNom = $nouveauNom . ".png";
            $extension = ".png";
        } else if($imageFileType == "jpeg") {
            $nouveauNom = $nouveauNom . ".jpeg";
            $extension = ".jpeg";
        } else if($imageFileType == "gif") {
            $nouveauNom = $nouveauNom . ".gif";
            $extension = ".gif";
        }

        rename($ancienNom, $nouveauNom);

        return $extension;
    }

    function changerPhotoBDD($idUtilisateur, $extension){
            include '../../model/model.php';
            executeNoReturn("update utilisateur set idPhoto= 1 , typePhoto = '$extension' where idUtilisateur = '$idUtilisateur '");
    }
?>