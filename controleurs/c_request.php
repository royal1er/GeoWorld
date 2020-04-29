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
	case 'PaysLanguage' :{
		$langue = $_REQUEST['Langue'];	
		$nb = verifLangue($langue);
		foreach ($nb as $nb) {
			$listpays = $nb->nbpays;
		if(($listpays == 0)&&($langue != "")){
			$i = 1;
			include("vues/erreurReq.php");
			include('request.php');
		}
		else if ($langue != ""){
			$lesPays = PaysLangue($langue);
			include('vues/v_request.php');
		}else {
			$i = 2;
			include("vues/erreurReq.php");
			include('request.php');
		}
	}

}
}
?>
