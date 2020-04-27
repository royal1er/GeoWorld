<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'updateData';
}
$action = $_REQUEST['action'];
switch($action){
    case 'updateData':{
        $id = $_GET['id'];
        $Région = $_POST['Région'];
        $Superficie = $_POST['Superficie'];
        $IndepYear = $_POST['IndepYear'];
        $Population = $_POST['Population'];
        $LifeExpectancy = $_POST['LifeExpectancy'];
        $GNP = $_POST['GNP'];
        $GovernmentForm = $_POST['GovernmentForm'];
        $HeadOfState = $_POST['HeadOfState'];
        updateInfos($id,$Région,$Superficie,$IndepYear,$Population,$LifeExpectancy,$GNP,$GovernmentForm,$HeadOfState);
        include('accueil.php');
    }
	
}

?>