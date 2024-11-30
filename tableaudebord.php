<?php
include("connexion/connexion.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau de bord</title>
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
</head>
<body>
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
    
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Africa Cinema</a>
          <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
          <div class="navbar-nav">
            <div class="nav-item text-nowrap">
              <a class="nav-link px-3" href="#">Se deconnecter</a>
            </div>
          </div>
        </header>
        
        <div class="container-fluid">
          <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
              <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                      <span data-feather="home"></span>
                      Tableau de bord
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file"></span>
                      Categories
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="shopping-cart"></span>
                      Horaires
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="users"></span>
                      Reservation
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="bar-chart-2"></span>
                      A propos 
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="layers"></span>
                      Contacts
                    </a>
                  </li>
                </ul>
        
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Saved reports</span>
                  <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle"></span>
                  </a>
                </h6>
                <ul class="nav flex-column mb-2">
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file-text"></span>
                      Current month
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file-text"></span>
                      Last quarter
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file-text"></span>
                      Social engagement
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="file-text"></span>
                      Year-end sale
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"> Tableau de bord</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                  </div>
                  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                  </button>
                </div>
              </div>
              <a href="categorie.php" class="btn btn-dark">Nouvelle categorie</a>
              <?php
                            if(isset($_GET['message'])){
                                $message="Suppression ";
                                ?> 
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $message;?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                            }elseif(isset($_GET['error'])){
                                $message="Echec de suppression ";
                                ?> 
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $message;?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                            }
                        ?>
        
              <h2>Liste des categories</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nom de la categorie</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $req=$connexion->prepare("SELECT * FROM categorie");
                    $req->execute();
                     while ($affichage=$req->fetch()) {
                      ?>
                         <tr>
                      <td><?php echo $affichage[0]?></td>
                      <td><?php echo $affichage[1]?></td>
                      <td>
                        <a href="categorie.php?idModif=<?php echo $affichage[0]?>" class="btn btn-success">Modifier</a>
                        <a href="traitement/Delete_Categorie.php?IdSup=<?php echo $affichage[0]?>" onclick="return confirm('Vouliez-vous Supprimer ??')" class="btn btn-danger">Supprimer</a>
                      </td>
                      
                    </tr>
                       <?php
                     }
                    ?>
                   
                  </tbody>

                </table>
              </div>
            </main>
          </div>
        </div>
        
        
            <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        
              <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
          
</body>
</html>














































































































































































































































