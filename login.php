<?php
require("Model/Model.php");
require("Model/UserManager.php");
$um=new UserManager();
// =============================================================================
$unityHash = $um->anti_injection($_POST["myform_hash"]);
$phpHash = "hashcode"; // same code in here as in your Unity game

$nick = $um->anti_injection($_POST["myform_nick"]);
$pass = $um->anti_injection($_POST["myform_pass"]);
$pass = trim($pass);
$salt = $um->getSalt($nick);
/*
you can also use this:
$nick = $_POST["myform_nick"];
$pass = $_POST["myform_pass"];
*/

/*verif que l'utilisateur n'est pas déjà connecté*/
if(!$nick || !$pass){
  echo '{"Statut":"0","message":"Login or password cant be empty."}';
}else{
  if ($unityHash != $phpHash){
    echo '{"Statut":"0","message":"HASH code is diferent from your game, you infidel."}';
  }else{
    $password=$um->getPass($nick);
    if($password==NULL){
      echo '{"Statut":"0","message":"Utilisateur non existant"}';
    }else{
      if(crypt($pass,$salt)!=$password){
        echo '{"Statut":"0","message":"Mot de pass incorect"}';
      }else{
        $_SESSION['Login']=$nick;
        $um->setStatut($nick,1);
        $infos=$um->getInfos($nick);
        $temp = json_encode($infos);
        echo $temp;
      }
    }
  }
}
?>
