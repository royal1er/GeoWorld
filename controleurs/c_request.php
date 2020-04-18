<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'saisierequete';
}
$action = $_REQUEST['action'];
switch($action){
	case 'saisierequete':{
    include("vues/request.php");
		break;
	}
	case 'afficherequete' :{
	//Connexion d'un visiteur
if (isset($_REQUEST["SQL"])){
			global $pdo;
      $requete = $_REQUEST['request'];
			$enseignant = getRequest($requete);
			if($enseignant==""){
				ajouterErreur("Vous avez mal saisi la requête");
				include("vues/v_erreurs.php");
				// include("vues/v_connexion.php");
			} else{
        $_SESSION['enseignant']= $enseignant;
        include("vues/v_request.php");
            }
      }
}
}
?>
