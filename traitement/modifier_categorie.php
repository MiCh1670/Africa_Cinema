<?php
include("../connexion/connexion.php");

if(isset($_POST["enregistrer"]))
{
    if(isset($_GET["idModif"])){
        $id=$_GET["idModif"];
        $nom_categorie= htmlspecialchars ($_POST["nomcategorie"]);
        if(!empty($nom_categorie)){
            $req=$connexion->prepare("UPDATE categorie SET nom=? WHERE idcategorie=?");
            $test=$req->execute([$nom_categorie,$id]);
            if($test==true){
                header("location:../categorie.php?message");
            }
            else {
                header("location:../categorie.php?error");
            }
        }else{
            header("location:../categorie.php?error");
        }
    }
    
}else{
    header("location:../categorie.php");
}