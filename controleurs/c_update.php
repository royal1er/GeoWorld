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
				break;
    }
		case 'updateUserData':{
        $id = $_GET['id'];
        $name = $_POST['nom'];
        $FirstName = $_POST['prenom'];
        $login = $_POST['login'];
				updateUser($id,$name,$FirstName,$login);
        include('accueil.php');
				break;
    }
		case 'updateUser':{
				include('updateUser.php');
				break;
		}
		case 'updatePassword':{
				$id = $_GET['id'];
				$mdp = $_POST['mdp'];
				$test = getpassword($id);
				foreach ($test as $test) {
					$desTest = $test->password;
				if($mdp != $desTest){
					include('vues/errorUpdate.php');
					include('changePassword.php');
				}else{
					$newmdp = $_POST['newmdp'];
					setPassword($id,$newmdp);
					include('accueil.php');
				}
			}
				break;
		}


}

?>
