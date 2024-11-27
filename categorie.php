<?php 
include("connexion/connexion.php");
if(isset($_GET["idModif"])){
    $id=$_GET["idModif"];
    $titre="Modifier categorie";
    $btn="Modifier";
    $getCategorie=$connexion->prepare("SELECT * FROM categorie where idcategorie=?");
    $getCategorie->execute([$id]);
    $Afficat=$getCategorie-> fetch();
    $action="traitement/modifier_categorie.php?idModif=$id";

}else{
    $titre="Ajouter categorie";
    $btn="Enregistrer";
    $action="traitement/ajouter_categorie.php";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog"
        id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <h2 class="fw-bold mb-0"><?php echo $titre?></h2>
                    <a href="tableaudebord.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                    
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" action="<?php echo $action?>" method="POST">
                        <div class="form-floating mb-3">
                            <label for="floatingInput"> entrez le nom de la categorie</label>
                            <input type="text" class="form-control rounded-4" id="floatingInput"
                                placeholder="EX:Dessin Annimée" name="nomcategorie"  <?php if(isset($_GET["idModif"])) {?>value="<?=$Afficat[1];?>"<?php }?>>
                        </div>
                        <?php
                            if(isset($_GET['message'])){
                                $message="Enregistrement reussi ";
                                ?> 
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $message;?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                            }elseif(isset($_GET['error'])){
                                $message="Echec d'enregistrement ";
                                ?> 
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $message;?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                            }
                        ?>
                        

                        <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="enregistrer"><?php echo $btn?></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
