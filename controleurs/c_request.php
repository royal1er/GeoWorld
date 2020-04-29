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
		if ($langue != ""){
			$lesPays = PaysLangue($langue);
			include('vues/v_request.php');
		}else {
			include("vues/erreurReq.php");
			include('request.php');
		}
		
}
}
?>
