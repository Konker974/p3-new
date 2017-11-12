<?php

require_once 'Modele/Modele.php';
/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, BIL_ID as bil_id from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
            $date = date('Y-m-d H:i:s');  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    public function getCommentairesSignales() {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, BIL_ID as bil_id from T_COMMENTAIRE'
                . ' where signalement=?';
        $commentaires = $this->executerRequete($sql, array(1));
        return $commentaires;
    }

    public function supprimerCommentaire($idCommentaire) {
      $sql = 'DELETE FROM `t_commentaire` WHERE `t_commentaire`.`COM_ID` = ?';
      $this->executerRequete($sql, array($idCommentaire));
    }

    public function signalerCommentaire($idCommentaire) {
      $sql = 'UPDATE `t_commentaire` SET `SIGNALEMENT` = 1 WHERE `t_commentaire`.`COM_ID` = ?';
      $this->executerRequete($sql, array($idCommentaire));
    }

    public function getCommentairesSignalesAvecId($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID=? AND SIGNALEMENT =1';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    public function annulerSignalement($idCommentaire) {
      $sql = 'UPDATE `t_commentaire` SET `SIGNALEMENT` = 0 WHERE `t_commentaire`.`COM_ID` = ?';
      $this->executerRequete($sql, array($idCommentaire));

    }
    public function getIdBillet($idCommentaire) {
      $sql = 'SELECT `BIL_ID` AS bil_id FROM `t_commentaire` WHERE `COM_ID`= ?';
      $idBillet = $this->executerRequete($sql, array($idCommentaire));
      $idBillet = $idBillet->fetch();
      return $idBillet;

    }


}
