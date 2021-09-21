<?php
include("$racine/vues/header.php");
if (!isset($_REQUEST['task'])) {
	$_REQUEST['task'] = 'null';
}
$task = $_REQUEST['task'];
switch ($task) {
	case 'null': {
        include("accueil.php");
			break;
		}
	case 'myAccount': {
			include("$racine/vues/v_profil.php");
			break;
		}
        case 'updateData': {
			include("$racine/vues/updateContinent.php");
			break;
		}
        case 'request': {
			include("$racine/vues/request.php");
			break;
		}
		case 'password': {
			include("$racine/vues/changePassword.php");
			break;
		}
    }
?>