<?php
require_once 'connect-db.php';

/** Obtenir la liste de tous les pays référencés d'un continent donné
 * @param $continent le nom d'un continent
 * @return tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
  // pour utiliser la variable globale dans la fonction
  global $pdo;
  $query = 'SELECT * FROM Country WHERE Continent = :continent;';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':continent', $continent, PDO::PARAM_STR);
  $prep->execute();
  // var_dump($prep);
  // var_dump($continent);
  return $prep->fetchAll();
}

function getLanguageByCountry($country)
{
  // pour utiliser la variable globale dans la fonction
  global $pdo;
  $query = "SELECT * FROM country, countrylanguage, language Where country.id =countrylanguage.idCountry AND countrylanguage.idLanguage = language.id AND country.Name = :country;";
  $prep = $pdo->prepare($query);
  $prep->bindValue(':country', $country, PDO::PARAM_STR);
  $prep->execute();
  return $prep->fetchAll();
}

/** Obtenir la liste des pays
 * @return liste d'objets
 */
function getAllCountries()
{
  global $pdo;
  $query = 'SELECT * FROM Country;';
  return $pdo->query($query)->fetchAll();
}

/**Obtenir la liste des continents
 * @return liste d'objets
 */
function getAllContinents()
{
global $pdo;
$query = 'SELECT DISTINCT Continent FROM Country Order By Continent;';
return $pdo->query($query)->fetchAll();
}

/**
 * Obtenir les informations concernant un pays
 *
 */
function getInfosCountries($country)
{
global $pdo;
$query = 'SELECT Continent,Region,SurfaceArea,IndepYear,Population,LifeExpectancy,GNP,GNPOld,LocalName, GovernmentForm,HeadOfState,Capital FROM country
WHERE Name = :country;';
$prep = $pdo->prepare($query);
$prep->bindValue(':country', $country, PDO::PARAM_STR);
$prep->execute();
return $prep->fetchAll();

}
function getAllLanguage()
{
global $pdo;
$query = 'SELECT DISTINCT Name FROM Language ORDER By Name;';
return $pdo->query($query)->fetchAll();
}

function getCitiesByCountry($country){
global $pdo;
$query = 'SELECT c.Name, c.District, c.Population FROM city c INNER JOIN country co ON c.idCountry = co.id
WHERE co.Name = :country;';
$prep = $pdo->prepare($query);
$prep->bindValue(':country', $country, PDO::PARAM_STR);
$prep->execute();
return $prep->fetchAll();
}

function estConnecte(){
  return isset($_SESSION['idVisiteur']);
}

// /**
//  * Retourne les informations d'un visiteur
//
//  * @param $login
//  * @param $mdp
//  * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
// */
// // function getInfosVisiteur($login, $password){
//   $req = "select user.id as id, user.name as nom, user.FirstName as prenom from user
// 	where user.login='$login' and user.password='$password'";
// 	$rs = PdoGsb::$monPdo->query($req);
// 	$ligne = $rs->fetch();
// 	return $ligne;
// }
function getInfosVisiteur($login, $password){
  global $pdo;
  $req = $pdo->prepare("select user.id as id, user.name as nom, user.FirstName as prenom from user
  where user.login='$login' and user.password='$password'");
  $req->execute();
  $ligne = $req->fetchAll();
  return $ligne;
}

// function getInfosVisiteur($login, $password){
//   global $pdo;
//   $query = 'SELECT user.id AS id, user.name AS nom, user.FirstName AS prenom FROM user
//   WHERE user.login= :login AND user.password= :password;';
//   $req = $pdo->prepare($query);
//   $prep->bindValue(':login', $login, PDO::PARAM_STR, ':password', $password, PDO::PARAM_STR);
//   $prep->execute();
//   $ligne = $prep->fetch();
//   return $ligne;
// }

  /**
 * Enregistre dans une variable session les infos d'un visiteur

 * @param $id
 * @param $nom
 * @param $prenom
 */
function connecter($id,$nom,$prenom){
	$_SESSION['idVisiteur']= $id;
	$_SESSION['nom']= $nom;
	$_SESSION['prenom']= $prenom;
}


/**
 * Détruit la session active
 */
function deconnecter(){
  if(session_id() != ""){
    session_destroy();
    include("vues/deconnexion.php");
  }else{
    include("vues/connexion.php");
  }
}

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs

 * @param $msg : le libellé de l'erreur
 */
function ajouterErreur($msg){
   if (! isset($_REQUEST['erreurs'])){
      $_REQUEST['erreurs']=array();
	}
   $_REQUEST['erreurs'][]=$msg;
}

function getRequest($query)
{
global $pdo;
// $query = 'SELECT Continent,Region,SurfaceArea,IndepYear,Population,LifeExpectancy,GNP,GNPOld,LocalName, GovernmentForm,HeadOfState,Capital FROM country
// WHERE Name = :country;';
$prep = $pdo->prepare($query);
$prep->execute();
return $prep->fetchAll();

}
// function getCountriesByContinent($continent)
// {
//   // pour utiliser la variable globale dans la fonction
//   global $pdo;
//   $query = 'SELECT * FROM Country WHERE Continent = :continent;';
//   $prep = $pdo->prepare($query);
//   $prep->bindValue(':continent', $continent, PDO::PARAM_STR);
//   $prep->execute();
//   // var_dump($prep);
//   // var_dump($continent);
//   return $prep->fetchAll();
// }
