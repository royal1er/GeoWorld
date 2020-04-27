<?php
require_once 'header.php';
if(!isset($_SESSION)){
    session_start();
}
?>
<h2 style="text-align: center;">Séléctionner un continent</h2>
<?php
            require_once 'inc/manager-db.php';
            $lesContinents = getAllContinents(); // fonction permettant d'obtenir tous les continents
            echo '<div class="row ml-2 mr-2">';
            foreach ($lesContinents as $unContinent){
            echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3 ">
                              <a class="text-light" href="updatePays.php?Continent='.$unContinent->Continent.'"><button type="button" class="btn btn-info w-100 h-100 shadow p-3 mb-5 rounded-lg">'.$unContinent->Continent.'</button></a>
                        </div>';
                    };
                    echo '</div>';
          ?>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>