<?php
//Verifie si le compte est activé
function getActif($mail){
$resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT Actif from user where mail=:mail AND Actif = 1");
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