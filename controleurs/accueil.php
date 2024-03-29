<?php
include("$racine/vues/header.php");

?>
<style>
  body {
    padding-top: 0;
  }

  .carousel {
    margin-top: 0%;
  }
</style>
<!-- routage vers le controleur connexion -->
<!-- Slides -->
<main role="main" class="flex-shrink-0">
  <?php if (!isset($_GET['Continent'])) {  ?>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images\w_s1.jpg" class="d-block w-100" alt="...">
          <p class="text_home">Découvrez le monde avec Geoworld</p>
        </div>
        <div class="carousel-item">
          <img src="images\w_s2.jpg" class="d-block w-100" alt="...">
          <p class="text_home">Apprenez de façon ludique !</p>
        </div>
        <div class="carousel-item">
          <img src="images\w_s3.jpg" class="d-block w-100" alt="...">
          <p class="text_home">A vous de jouer !</p>
        </div>
        <!--Copyright-->
        <div id="footer-text">
          <span class="text-copy">SIO SLAM MyWebApp &copy; 2019</span>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  <?php }
  ?>
  <!-- Fin slides -->
  <!-- On affiche la liste des pays par continent si un continent est sélectionner -->
  <?php
  require_once 'js/javascripts.php';
  ?>
