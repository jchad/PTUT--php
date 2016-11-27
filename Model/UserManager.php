<?php
  class UserManager extends Model{
    // PROTECT AGAINST SQL INJECTION and CONVERT PASSWORD INTO MD5 formats
    function anti_injection_login_senha($sql, $formUse = true)
    {
    $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|,|'|#|\*|--|\\\\)/i","",$sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    if(!$formUse || !get_magic_quotes_gpc())
      $sql = addslashes($sql);
      $sql = md5(trim($sql));
    return $sql;
    }
    // THIS ONE IS JUST FOR THE NICKNAME PROTECTION AGAINST SQL INJECTION
    function anti_injection_login($sql, $formUse = true)
    {
    $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|,|'|#|\*|--|\\\\)/i","",$sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    if(!$formUse || !get_magic_quotes_gpc())
      $sql = addslashes($sql);
    return $sql;
    }
    //Return the password of a given user
    public function getPass($Login){
      $sql = 'Select mdp from joueur where pseudo = :identifiant';
      $req= $this->executerRequete($sql, array('identifiant' => $Login));
      $results = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results['mdp'];
    }
    public function setStatut($Login){
      $sql = 'Update joueur set Statut=1 where pseudo = :identifiant';
      $req= $this->executerRequete($sql, array('identifiant' => $Login));
      $req->closeCursor();
    }

    public function getInfos($Login){
      $sql = 'Select Statut, noJoueur, pseudo, dateInscription, tempsdeJeu, niveau from joueur where pseudo = :identifiant';
      $req= $this->executerRequete($sql, array('identifiant' => $Login));
      $results = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }
  }
?>
