<?php
include("header.php");
?>


<main role="main" class="flex-shrink-0">
  <!-- routage vers le controleur connexion -->
  <!-- Slides -->
  <main role="main" class="flex-shrink-0">
<?php if(!isset($_GET['Continent'])) {  ?>
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images\w_s1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\w_s2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\w_s3.jpg" class="d-block w-100" alt="...">
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
  <div class="container">
  <?php
  if(isset($_GET['Continent']))
  {
    $selectedContinent = $_GET['Continent'];
    ?>
    <h1 class=" text-center mb-3">Les pays en <?php echo $selectedContinent ?> </h1>
    <?php
            $desPays = getCountriesByContinent($selectedContinent);
         ?>
       <code>
         <!-- <?php var_dump($desPays[0]); ?> -->
         <?php
         echo '<div class="row">';
          foreach ($desPays as $desPays) { ?>

            <?php echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3 ">
                              <a class="text-light " href="infos.php?Name='.$desPays->Name.'"><button type="button" class="btn btn-info w-100 h-100 shadow p-3 mb-5 rounded-lg">'.$desPays->Name.'</button></a>
                        </div>';
     }
     echo '</div>';
    }    ?>
      </code>
  </div>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
