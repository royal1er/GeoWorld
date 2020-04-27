<?php
require_once 'header.php';
if(!isset($_SESSION)){
    session_start();
}
?>
<div class="row justify-content-between pl-5">
<a href="javascript:history.back(1)"><button type="button" class="btn btn-info"><i class="fas fa-undo-alt"></i> Retour</button></a>
 </div>
<h2 style="text-align: center;">Séléctionner le pays dont les informations seront modifiées</h2>
<?php
    require_once 'inc/manager-db.php';
?>
<div class="container">
    <?php
        $selectedContinent = $_GET['Continent'];
    
        $desPays = getCountriesByContinent($selectedContinent);
        echo '<div class="row">';
        foreach ($desPays as $desPays) { ?>

        <?php echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3 ">
                            <a class="text-light " href="updateInfos.php?Name='.$desPays->Name.'&Continent='.$selectedContinent.'"><button type="button" class="btn btn-info w-100 h-100 shadow p-3 mb-5 rounded-lg">'.$desPays->Name.'</button></a>
                    </div>';
    }
    echo '</div>';
?>
        </div>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>