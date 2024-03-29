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
$query = 'SELECT id,Continent,Region,SurfaceArea,IndepYear,Population,LifeExpectancy,GNP,GNPOld,LocalName, GovernmentForm,HeadOfState,Capital FROM country
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

function getMdpUser($password){
  global $pdo;
  $req = $pdo->prepare("SELECT user.password from user");
  $req->execute();
  $lignes = $req->fetchAll();
  $mdp = "";
  foreach($lignes as $ligne){
    $verify = password_verify($password,$ligne->password);
    if($verify){
      $mdp = $ligne->password;
    }
}
return $mdp;
}

function getInfosUserById($id){
  global $pdo;
  $req = $pdo->prepare("select user.name as nom, user.FirstName as prenom, user.login from user
  where user.id='$id'");
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

function getRole($id){
  global $pdo;
  $query = "SELECT student FROM user Where user.id=$id";
  $prep = $pdo->prepare($query);
  $prep->execute();
  $req = $prep->fetchAll();
  foreach ($req as $req) {
    $role = $req->student;
  if($role ==1){
    echo $role = "Collaborateur";
  }else{
    echo $role = "Enseignant";
  }
}
}

/**
 * Détruit la session active
 */
function deconnecter(){
  if(session_id() != ""){
    $_SESSION = array();
    $_SESSION['nom'] = '';
    $_SESSION['prenom'] = '';
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

function updateInfos($id,$region,$SurfaceArea,$IndepYear,$Population,$LifeExpectancy,$GNP,$GovernmentForm,$HeadOfState){
  global $pdo;

  //IndepYear vide
if($IndepYear == ""){
  $sql = "UPDATE country SET Region='$region',SurfaceArea='$SurfaceArea', Population='$Population', LifeExpectancy='$LifeExpectancy',
GNP='$GNP' ,GovernmentForm='$GovernmentForm',HeadOfState='$HeadOfState' WHERE id=$id";
}
else
{$sql = "UPDATE country SET Region='$region', SurfaceArea='$SurfaceArea', IndepYear='$IndepYear', Population='$Population', LifeExpectancy='$LifeExpectancy',
GNP='$GNP' ,GovernmentForm='$GovernmentForm',HeadOfState='$HeadOfState' WHERE id=$id";
}
$query= $pdo->prepare($sql);
$count = $query->execute();
if(($count) != 0){
include ("vues\successUpdate.php");
  }
}

function updateUser($id,$name,$FirstName,$login){
  global $pdo;
  $sql = "update user set name='$name', FirstName='$FirstName', login='$login' WHERE id='$id'";
$query= $pdo->prepare($sql);
$count = $query->execute();
if(($count) != 0){
  include("vues\successUpdate.php");
}else{
  include("vues\errorUpdate.php");
}
}
function getPassword($id){
  global $pdo;
  $req = $pdo->prepare("select user.password from user where user.id='$id'");
  $req->execute();
  $ligne = $req->fetchAll();
  return $ligne;
}

function setPassword($id, $mpd){
  global $pdo;
  $sql = "update user set password='$mpd' WHERE id='$id'";
  $query= $pdo->prepare($sql);
  $count = $query->execute();
  if(($count) != 0){
    include("vues\successUpdate.php");
  }else{
    include("vues\errorUpdate.php");
  }
}

function inscrire($nom,$prenom,$id,$mdp,$etudiant){
  global $pdo;
   $sql = "insert into user (Name,FirstName,login,password,student) VALUES ('$nom', '$prenom', '$id','$mdp','$etudiant')";
   $query= $pdo->prepare($sql);
   $count = $query->execute();
}

function PaysLangue($langue){
  global $pdo;
  $query = "SELECT c.Name as PaysName FROM country c INNER JOIN  countrylanguage cl ON c.id = cl.idCountry
INNER JOIN language l ON cl.idLanguage = l.id
WHERE l.Name = '$langue'";
$req = $pdo->prepare($query);
$req->execute();
$ligne = $req->fetchAll();
return $ligne;
}

function verifLangue($langue){
  global $pdo;
$query = "SELECT COUNT(*) as nbpays FROM country c INNER JOIN  countrylanguage cl ON c.id = cl.idCountry
INNER JOIN language l ON cl.idLanguage = l.id
WHERE l.Name = '$langue'";
$req = $pdo->prepare($query);
$req->execute();
$ligne = $req->fetchAll();
return $ligne;
}

function getPaysLifeExpectancySup($percentage){
  global $pdo;
  $query ="SELECT c.name as Pays FROM country c WHERE LifeExpectancy >= '$percentage'";
  $req = $pdo->prepare($query);
  $req->execute();
  $ligne = $req->fetchAll();
  return $ligne;
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

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs

 * @param $name : le nom de l'utlisateur
 * @param $firstName : le prénom de l'utlisateur
 * @param $login : le pseudo de l'utlisateur
 * @param $password : le mot de passe de l'utlisateur
 * @param $student : la catégorie d'utilisateur
 * @param $mail : le mail de l'utilisateur
 * @param $clé : la clé unique de l'utilisateur
 */
function addUtilisateur($name, $firstName, $login, $password, $student, $mail, $clé) {
  try {
      global $pdo;
      $req = $pdo->prepare("insert into user (name, firstName, login, password, student, mail, clé) values(:name, :firstName, :login, :password, :student, :mail, $clé)");
      $req->bindValue(':name', $name, PDO::PARAM_STR);
      $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
      $req->bindValue(':login', $login, PDO::PARAM_STR);
      $req->bindValue(':password', $password, PDO::PARAM_STR);
      $req->bindValue(':student', $student, PDO::PARAM_STR);
      $req->bindValue(':mail', $mail, PDO::PARAM_STR);
      
      $resultat = $req->execute();
  } catch (PDOException $e) {
      print "Erreur !: " . $e->getMessage();
      die();
  }
  return $resultat;
}