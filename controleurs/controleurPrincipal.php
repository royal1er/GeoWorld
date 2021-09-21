<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["connexion"] = "c_connexion.php";
    $lesActions["request"] = "c_request.php";
    $lesActions["rss"] = "c_rssflux.php";
    $lesActions["update"] = "c_update.php";
    $lesActions["account"] = "c_account.php";
    $lesActions["inscription"] = "c_inscription.php";
    $lesActions["lespays"] = "c_paysContinent.php";
    $lesActions["todo"] = "c_todo-project.php";
    $lesActions["confirmation"] = "c_confirmation.php";
    /*$lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["updProfil"] = "updProfil.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions['confirmation'] = "confirmation.php";
    $lesActions["aimer"] = "aimer.php";
    $lesActions["noter"] = "noter.php";
    $lesActions["commenter"] = "commenter.php";
    $lesActions["supprimerCritique"] = "supprimerCritique.php";*/

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>