<?php
if (!isset($_REQUEST['task'])) {
	$_REQUEST['task'] = 'null';
}
include("getRacine.php");
$task = $_REQUEST['task'];
switch ($task) {
    case 'null': {
		
		include("$racine/vues/accueil.php");
			break;
		}
	case 'afficherpays': {
		$selectedContinent = $_POST['continent'];
		include("$racine/vues/paysParContinent.php");
			break;
		}
    }

?>