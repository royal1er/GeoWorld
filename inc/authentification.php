<?php
require_once 'connect-db.php';
//Verifie si le compte est activé
function getMail($mail){
    $resultat = array();
        try {
            $cnx = connect();
            $req = $cnx->prepare("SELECT mail from user where mail=:mail");
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->rowCount(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
        
    }
function getActif($mail){
$resultat = array();
    try {
        $cnx = connect();
        $req = $cnx->prepare("SELECT actif from user where mail=:mail AND actif = 1");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->rowCount(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    
}

?>