<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!doctype html>
<html lang="fr" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Homepage : Bootstrap 4</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@500&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="fontawesome-free-5.13.0-web\css\all.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="accueil.php">GeoWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
       <li class="nav-item dropdown">
          <a class="nav-link text-light dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Continents</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <!-- Boucle php permettant d'afficher dns un menu déroulant tous les continents -->
          <?php
            require_once 'inc/manager-db.php';
            $lesContinents = getAllContinents(); // fonction permettant d'obtenir tous les continents
            foreach ($lesContinents as $unContinent){
            echo '<a class="dropdown-item" href="index.php?Continent='.$unContinent->Continent .'">'. $unContinent->Continent.'</a>';
          };
          ?>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="login">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            ProjetPPE-SLAM
          </a>
        </li>
        <?php
        if(isset($_SESSION['nom'])){
          if($_SESSION['nom'] != ''){
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo "Bienvenue ".$_SESSION['nom']."  ".$_SESSION['prenom']."  "?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Mon profil</a>
              <a class="dropdown-item" href="updateContinent.php">Mettre à jour des données</a>
              <a class="dropdown-item" href="request.php">Mes requêtes</a>
              <a class="dropdown-item" href="index.php?uc=connexion&action=deconnexion">Déconnecter</a>
            </div>
          </li>
        <?php
      }
    }
      ?>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input  id="search-country" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        <div class="col-sm-10 bg-light">
          <div id="result-search"></div>
        </div>
      </form>
      <script>
      $(document).ready(function(){
        $('#search-country').keyup(function(){
           $('#result-search').html('');
          var utilisateur = $(this).val();
          if(utilisateur != ""){
            $.ajax({
              type: 'GET',
              url: 'inc/recherche_pays.php',
              data: 'country=' + encodeURIComponent(utilisateur),
              success: function(data){
                if(data != ""){
                  $('#result-search').append(data);
                }else{
                  document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun pays trouvés</div>"
                  console.log(data);
                }
              }
            });
          }
        });
      });
      </script>
    </div>
  </nav>
</header>
