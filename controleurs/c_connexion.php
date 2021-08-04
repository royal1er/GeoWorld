<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		break;
	}
  case 'deconnexion':{
    deconnecter();
		include("accueil.php");
		break;
  }
	case 'inscription':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['password'];
		$nom = $_REQUEST['nom'];
		$prenom = $_REQUEST['prenom'];
		$role = $_REQUEST['role'];
		inscrire($nom,$prenom,$login,password_hash($mdp,PASSWORD_DEFAULT),$role);
		include("vues/confirminscription.php");
		break;
  }
	case 'valideConnexion' :{
	//Connexion d'un visiteur
if (isset($_REQUEST["connexion"])){
			global $pdo;
			$login = $_REQUEST['login'];
			$mdp = $_REQUEST['password'];
			$visiteur = getInfosVisiteur($login, getMdpUser($mdp));
			if($visiteur==null){
				ajouterErreur("Login ou mot de passe incorrect");
				include("vues/v_erreurs.php");
				// include("vues/v_connexion.php");
			} else{
				$nom = $visiteur[0]-> nom;
				$prenom = $visiteur[0]-> prenom;
				$id = $visiteur[0]-> id;
				connecter($id, $nom, $prenom);
				include("accueil.php");
			}
      break;
}
}
	default :{
		include("accueil.php");
		break;
	}
}
?>
