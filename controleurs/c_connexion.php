<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
include("getRacine.php");
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
		$inscrit = false;
		if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["nom"]) 
		&& isset($_POST["mail"]) && isset($_POST["prenom"]) && isset($_POST["role"])) {
			if ($_POST["login"] != "" && $_POST["password"] != "" && $_POST["nom"] != "" && $_POST["mail"] != ""  && $_POST["prenom"] != "" && $_POST["prenom"] != "" && $_POST["role"] != "") {
				$login = $_POST["login"];
				$password = $_POST["password"];
				$nom = $_POST["nom"];
				$mail = $_POST["mail"];
				$prenom = $_POST["prenom"];
				$role = $_POST["role"];

				$lenKey = 15;
					$clé = '';
					for($i=1;$i < $lenKey; $i++){
						$clé .= mt_rand(0,9);
					}

				$ret = addUtilisateur($nom,$prenom,$login,password_hash($password,PASSWORD_DEFAULT),$role, $mail, $clé);
				if ($ret) {
					$inscrit = true;
				} else {
					$msg = "l'utilisateur n'a pas été enregistré.";
				}
			}
			$msg = "Votre mdp doit contenir au moins 8 caractères et au moins 3 des 4 catégories de caractères (majuscules, minuscules, chiffres, caractères spéciaux)!";
		}
	 else {
		$msg="Renseigner tous les champs...";    
		}
		

		if ($inscrit) {
			// appel du script de vue qui permet de gerer l'affichage des donnees
			$titre = "Inscription confirmée";

			//emplacement du template
			$template_file = "./template.php";
			$destinataire = $mail;
			$sujet = "Activer votre compte" ;
			$entete = "From: GEOWORLD <florianallebe19@gmail.com.com>\r\n";
			$entete .= "MIME-VERSION: 1.0\r\n";
			$entete .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			
			
			// Le lien d'activation est composé du login(log) et de la clé(cle)
			if(file_exists($template_file))
				$message = file_get_contents($template_file);
			else
				die("Impossible de retrouvé le fichier de template");

			//montré le message à l'utilisateur
			
			$swap_var = array(
				"{SITE_ADDR}" => "$web_host/index.php",
				"{TO_NAME}" => $prenom,
				"{CUSTOM_URL}" => "$web_host/index.php",
				"{EMAIL_LOGO}" => "https://raw.githubusercontent.com/royal1er/Appli/master/world.png",
				"{LOGIN}" => $login,
				"{CLE}" => $clé
			);
			
			foreach(array_keys($swap_var) as $key){
				if(strlen($key) > 2 && trim($key) != "")
					$message = str_replace($key, $swap_var[$key], $message);

			} 
			if(mail($destinataire, $sujet, $message, $entete))
				include("vues/confirminscription.php");
			else
				include("vues/erreurs.php");
		
		}break;
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
