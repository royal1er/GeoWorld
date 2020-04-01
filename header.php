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
    <a class="navbar-brand text-light" href="index.php">GeoWorld</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light disabled" href="#">Disabled</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-light dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Continents</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <!-- Boucle php permettant d'afficher dns un menu déroulant tous les continents -->
            <?php
            require_once 'inc/manager-db.php';
            $lesContinents = getAllContinents(); // fonction permettant d'obtenir tous les continents
            foreach ($lesContinents as $unContinent)
            {
            echo '<a class="dropdown-item" href="index.php?Continent='.$unContinent->Continent .'">'. $unContinent->Continent.'</a>';
            }
          ?>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Langue</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
          <!-- Boucle php permettant d'afficher dns un menu déroulant tous les continents -->
            <?php
            require_once 'inc/manager-db.php';
            $lesLanguage = getAllLanguage(); // fonction permettant d'obtenir tous les languages
            foreach ($lesLanguage as $unLanguage)
            {
            echo '<a class="dropdown-item" href="index.php?Language='.$unLanguage->Name .'">'. $unLanguage->Name.'</a>';
            }
          ?>
          
          </div>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-light " href="login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light " href="todo-projet.php">
            ProjetPPE-SLAM
          </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</header>
