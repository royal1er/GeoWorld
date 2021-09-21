<?php
include "getRacine.php";
if(session_id() == ""){
  session_start();
}
require_once("inc/manager-db.php");
require_once ("inc/connect-db.php");
include("$racine/vues/header.php");
global $pdo;
$estConnecte = estConnecte();
?>
<style>
  body{
    padding-top: 5rem;
  }
  .carousel{
  margin-top: -2%;
}
</style>
<?php 
include "$racine/controleurs/controleurPrincipal.php";


if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "$racine/controleurs/$fichier";
include("vues/v_modalrss.php");

  ?>
