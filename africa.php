<?php  require 'header.php'; ?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1>Les pays en Afrique </h1>
    </div>  
    <div>
        <?php
            require_once 'inc/manager-db.php';
            $continent = 'Africa';
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

</main>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>