<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<div class="row justify-content-between pl-5">
<a href="javascript:history.back(1)"><button type="button" class="btn btn-info"><i class="fas fa-undo-alt"></i> Retour</button></a>
 </div>
<h2 style="text-align: center;">Séléctionner le pays dont les informations seront modifiées</h2>
<?php
    require_once "$racine/inc/manager-db.php";
?>
<div class="container">
    <?php
    
        $desPays = getCountriesByContinent($selectedContinent);
        echo '<div class="row">';
        foreach ($desPays as $desPays) { ?>

        <?php echo '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3 "><form method="POST" action="index.php?action=update&task=updatePays">
                            <a class="text-light"><button type="submit" name="country" value="'.$desPays->Name.'" class="btn btn-info w-100 h-100 shadow p-3 mb-5 rounded-lg">'.$desPays->Name.'</button></a>
                    </form></div>';
    }
    echo '</div>';
?>
        </div>

<?php
require_once 'js/javascripts.php';
require_once "$racine/vues/footer.php";
?>