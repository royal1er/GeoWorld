
  <div class="container">
  <?php
  if(isset($selectedContinent))
  {
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

            <?php echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3 "><form method="POST" action="index.php?action=request&task=infospays">
                              <a class="text-light"><button type="submit" name="pays" value="'.$desPays->Name.'" class="btn btn-info w-100 h-100 shadow p-3 mb-5 rounded-lg">'.$desPays->Name.'</button></a>
                        </div></form>';
     }
     echo '</div>';
    }    ?>
      </code>
  </div>
<?php
require_once "$racine/js/javascripts.php";
?>