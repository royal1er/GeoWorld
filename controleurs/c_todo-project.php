<?php
if (!isset($_REQUEST['task'])) {
    $_REQUEST['task'] = 'null';
}
include("getRacine.php");
$task = $_REQUEST['task'];
switch ($task) {
    case 'null': {
            include("accueil.php");
            break;
        }
    case 'project': {
            include("$racine/vues/todo-projet.php");
            break;
        }
}
