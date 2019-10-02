<?php
    session_start();
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $commentaire = str_replace("'", "\'", $commentaire, $count);

    $target_dir = "../../public/img/PhotosGalerie/";
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
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Désolé, seul les types JPG, JPEG, PNG & GIF sont autorisés.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Désolé, fichier non téléchargé.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $extension = recupererExtension($imageFileType);
            $idDernierePhoto = enregistrerPhotoBDD($idUtilisateur, $extension, $commentaire);
            
            echo $idDernierePhoto;
            $extension = renomer($imageFileType, $idDernierePhoto);

            header ('Location: ../../index.php?page=galeriePhoto');
        } else {
            echo "Désolé, une erreur est survenue durant le téléchargement de votre image.";
        }
    }

    function enregistrerPhotoBDD($idUtilisateur, $extension, $commentaire){
            $idDernierePhoto = 0;
            require '../../model/model.php';
            execute("insert into photo(`idExpediteur`, `type`, `date`, `commentaire`) values ('$idUtilisateur','$extension',now(),'$commentaire')");

            $idDernierePhoto = afficheridPhoto("select idPhoto from photo order by date desc limit 1");

            return $idDernierePhoto;
    }

    function recupererExtension($imageFileType){
        if($imageFileType == "jpg") {
            $extension = ".jpg";
        } else if($imageFileType == "png") {
            $extension = ".png";
        } else if($imageFileType == "jpeg") {
            $extension = ".jpeg";
        } else if($imageFileType == "gif") {
            $extension = ".gif";
        }

        return $extension;
    }

    function renomer($imageFileType, $idUtilisateur){
        $ancienNom = "../../public/img/PhotosGalerie/";
        $ancienNom = $ancienNom . basename($_FILES["fileToUpload"]["name"]);

        $nouveauNom ="../../public/img/PhotosGalerie/";
        $nouveauNom = $nouveauNom . $idUtilisateur;

        if($imageFileType == "jpg") {
            $nouveauNom = $nouveauNom . ".jpg";
        } else if($imageFileType == "png") {
            $nouveauNom = $nouveauNom . ".png";
        } else if($imageFileType == "jpeg") {
            $nouveauNom = $nouveauNom . ".jpeg";
        } else if($imageFileType == "gif") {
            $nouveauNom = $nouveauNom . ".gif";
        }

        rename($ancienNom, $nouveauNom);
    }