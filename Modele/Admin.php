<?php

require_once 'Modele/Modele.php';

class Admin extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCredentials($pseudo,$pass_hache) {
        $sql = 'SELECT pseudo, pass FROM user WHERE pseudo=? AND pass=?';
        $credentials = $this->executerRequete($sql, array($pseudo, $pass_hache));
        return $credentials->fetch();
    }

}
