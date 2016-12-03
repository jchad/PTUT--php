<?php
require("Model/Model.php");
require("Model/UserManager.php");
$um=new UserManager();
// =============================================================================
$unityHash = $um->anti_injection_login($_POST["myform_hash"]);
$phpHash = "hashcode"; // same code in here as in your Unity game


if ($unityHash != $phpHash){

}else{
  $um->setStatut()/*form avec chanp invisible pour passage du pseudo pour déconnexion*/
}
?>
