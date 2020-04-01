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
