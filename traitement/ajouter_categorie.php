<?php
include("../connexion/connexion.php");
if(isset($_POST["enregistrer"]))
{
    $nom_categorie= htmlspecialchars ($_POST["nomcategorie"]);
    if(!empty($nom_categorie)){
        $req=$connexion->prepare("INSERT INTO categorie(nom)VALUES(?)");
        $test=$req->execute([$nom_categorie]);
        if($test==true){
            header("location:../categorie.php?message");
        }
        else {
            header("location:../categorie.php?error");
        }
    }else{
        header("location:../categorie.php?error");
    }
    
}else{
    header("location:../categorie.php");
}

