<?php

require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $billet;

    public function __construct() {
        $this->billet = new Billet();
    }

// Affiche la liste de tous les billets du blog
    public function accueil($page) {
        $nbreBillets= $this->billet->countBillets();
        $nbreBillets=intval($nbreBillets['nb_billets']);
        $nbreBilletsPage=5;
        $nbrePages = ceil($nbreBillets/$nbreBilletsPage);
        $premierMessage = ($page -1) * $nbreBilletsPage;
        $billets=$this->billet->getBilletsPage($premierMessage, $nbreBilletsPage);
        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets, 'nbrePages' =>$nbrePages));
    }

}
