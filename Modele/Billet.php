<?php

require_once 'Modele/Modele.php';

class Billet extends Modele {

    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from t_billet'
                . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    public function getBillet($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from t_billet'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    public function update($idBillet, $contenu, $majTitre)
    {
      $sql = "UPDATE `t_billet` SET `BIL_TITRE`=?,`BIL_CONTENU`=? WHERE `BIL_ID`= ?";
      $date = date('Y-m-d H:i:s');  // Récupère la date courante
      $this->executerRequete($sql, array($majTitre, $contenu, $idBillet));

    }

    public function creerArticle($titre, $contenu)
    {
      $sql = "INSERT INTO `t_billet` ( `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`) VALUES (NOW(), ?, ?)";
      $this->executerRequete($sql, array($titre, $contenu));

    }

    public function countBillets()
    {
      $sql = "SELECT COUNT(*) AS nb_billets FROM t_billet";
      $nbreBillets=$this->executerRequete($sql);
      $nbreBillets=$nbreBillets->fetch();
      return $nbreBillets;


    }

    public function getBilletsPage($premierMessage, $nbreBilletsPage)
    {
      $sql= 'SELECT * FROM t_billet ORDER BY `BIL_ID` DESC LIMIT '.$nbreBilletsPage.' OFFSET '.$premierMessage.'';
      $billets = $this->executerRequete($sql);

      return $billets;

    }

    public function deleteBillet($idBillet)
    {
      $sql= 'DELETE FROM `t_billet` WHERE `t_billet`.`BIL_ID` = ?';
      $this->executerRequete($sql,array($idBillet));


    }


}
