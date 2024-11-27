<?php
include("../connexion/connexion.php");
    if(isset($_GET["IdSup"])&& !empty($_GET["IdSup"])){
        $id=$_GET["IdSup"];
            $req=$connexion->prepare("DELETE from categorie where idcategorie=?");
            $test=$req->execute([$id]);
            if($test==true){
                header("location:../tableaudebord.php?message");
            }
            else {
                header("location:../tableaudebord.php?error");
            }
        }else{
            header("location:../tableaudebord.php?error");
        }
    