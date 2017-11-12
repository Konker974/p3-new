<?php

require_once 'Modele/Modele.php';

/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Billet extends Modele {

    /** Renvoie la liste des billets du blog
     *
     * @return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     *
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    public function update($idBillet, $contenu, $majTitre)
    {
      $sql = "UPDATE `t_billet` SET `BIL_ID`=3,`BIL_TITRE`=?,`BIL_CONTENU`=? WHERE `BIL_ID`= ?";
      $date = date('Y-m-d H:i:s');  // Récupère la date courante
      $this->executerRequete($sql, array($majTitre, $contenu, $idBillet));

    }

    public function creerArticle($titre, $contenu)
    {
      $sql = "INSERT INTO `t_billet` ( `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`) VALUES (NOW(), ?, ?)";
      $this->executerRequete($sql, array($titre, $contenu));

    }

}
