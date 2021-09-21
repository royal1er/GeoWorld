<?php
if(!isset($_REQUEST['task'])){
	$_REQUEST['task'] = 'saisierequete';
}
$task = $_REQUEST['task'];
switch($task){
	case 'saisierequete':{
    include("$racine/vues/request.php");
		break;
	}
	case 'PaysLifeExpectancy':{
		$percentage = isset($_POST['percentage']) ? $_POST['percentage'] : NULL;
		if($percentage == NULL) {
			$i = 2;
			include("vues/erreurReq.php");
			include('request.php');
			break;
		}else{
		$vue = 2;
		$lesPays = getPaysLifeExpectancySup($percentage);
		include('vues/v_request.php'); 
		break;
		}
		
	}
	case 'infospays':{
		if(!isset($_POST['pays'])){
			$pays = $_GET['Name'];
		}else{
			$pays = $_POST['pays'];
		}
		include("$racine/vues/infos.php");
			break;
		}

	case 'PaysLanguage' :{
		
		$langue = isset($_POST['Langue']) ? $_POST['Langue'] : NULL;
		$nb = verifLangue($langue);
		foreach ($nb as $nb) {
			$listpays = $nb->nbpays;
		if(($listpays == 0)&&($langue != "")){
			$i = 1;
			include("vues/erreurReq.php");
			include('request.php');
			break;
		}
		else if ($langue != ""){
			$vue = 1;
			$lesPays = PaysLangue($langue);
			include('vues/v_request.php');
			break;
		}else {
			$i = 2;
			include("vues/erreurReq.php");
			include('request.php');
			break;
		}
	}
}
	

}
?>
