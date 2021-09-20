<?php
include_once("inc/connect-db.php");

try {
        $cnx = connect();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }

if(isset($_GET['login'],$_GET['cle']) AND !empty($_GET['login']) AND !empty($_GET['cle'])){
    $login = htmlspecialchars(urldecode($_GET['login']));
    $cle = intval($_GET['cle']);
    $requser = $cnx->prepare("SELECT * FROM user WHERE login = ?  AND clé = ?");
    $requser->execute(array($login,$cle));

    $userexist = $requser->rowCount();
    $user = $requser->fetch();
    if($userexist == 1){
        $user = $requser->fetch();// Régler la duplication de la déclaration de la variable user je me retrouve à la déclare deux fois 
        if($user['actif'] == false){
            $updateuser = $cnx->prepare("UPDATE user SET actif = true WHERE login = ? AND clé = ?");
            $updateuser->execute(array($login, $cle));
            echo "Votre compte a été activé ! ";
        }else{
            echo "Votre compte a déja été confirmé !";
        }
    }else{
        echo"L'utilisateur n'existe pas !";
    }
}

?>
