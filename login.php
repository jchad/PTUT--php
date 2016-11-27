<?php
require("Model/Model.php");
require("Model/UserManager.php");
$um=new UserManager();
// =============================================================================
$unityHash = $um->anti_injection_login($_POST["myform_hash"]);
$phpHash = "hashcode"; // same code in here as in your Unity game

$nick = $um->anti_injection_login($_POST["myform_nick"]);
$pass = $um->anti_injection_login_senha($_POST["myform_pass"]);
/*
you can also use this:
$nick = $_POST["myform_nick"];
$pass = $_POST["myform_pass"];
*/
if(!$nick || !$pass){
  echo "Login or password cant be empty.";
}else{
  if ($unityHash != $phpHash){
    echo "HASH code is diferent from your game, you infidel.";
  }else{
    $password=$um->getPass($nick);
    if($password==NULL){
      $erreur='Utilisateur inexistant';
    }else{
      if($pass!=$password){
        echo 'Mot de passe incorect';
      }else{
        $um->setStatut($nick);
        $infos=$um->getInfos($nick);
        echo ''.$infos['Statut'].';'.$infos['pseudo'].';'.$infos['dateInscription'].'';
      }
    }
  }
}
?>
