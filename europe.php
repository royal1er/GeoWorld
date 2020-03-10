<?php  require_once 'header.php'; ?>

<main role="main" class="flex-shrink-0">

  <div class="container">
    <h1>Les pays en Europe </h1>
    <?php
            require_once 'inc/manager-db.php';
            $continent = 'Europe';
            $desPays = getCountriesByContinent($continent);
         ?>
       <code>
         <!-- <?php var_dump($desPays[0]); ?> -->
         <?php 
          foreach ($desPays as $desPays) {
            echo $desPays->Name. '<br />'; 
     }
         ?>
      </code>
    </div>
    <?php
require_once 'javascripts.php';
require_once 'footer.php';
?>