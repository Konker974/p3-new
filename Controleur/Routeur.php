<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurAdmin.php';
require_once 'Vue/Vue.php';
class Routeur {

    private $ctrlAccueil;
    private $ctrlBillet;
    private $ctrlAdmin;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlBillet = new ControleurBillet();
        $this->ctrlAdmin = new ControleurAdmin();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billet($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                }

                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                }

                else if ($_GET['action'] == 'login') {
                    $this->ctrlAdmin->login();
                }

                else if ($_GET['action'] == 'logout') {
                    $this->ctrlAdmin->logout();
                }

                else if ($_GET['action'] == 'admin') {
                  if ($this->ctrlBillet->isAdmin()) {
                    $this->ctrlAdmin->adminAcceuil();
                  }
                  else {
                    throw new Exception("Veuillez vous connecter en tant qu'administrateur");
                  }

                  }

                else if ($_GET['action'] == 'delete') {
                  if ($this->ctrlBillet->isAdmin()) {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billetDelete($idBillet);
                        header('Location: http://www.pdp974.fr/P3/index.php?action=admin');
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                  }
                  else {
                    throw new Exception("Veuillez vous connecter en tant qu'administrateur");
                  }

                  }

                else if ($_GET['action'] == 'billetAdmin') {
                  if ($this->ctrlBillet->isAdmin()) {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlBillet->billetAdmin($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de billet non valide");
                  }
                  else {
                    throw new Exception("Veuillez vous connecter en tant qu'administrateur");
                  }
                }

                else if ($_GET['action'] == 'update') {
                  if ($this->ctrlBillet->isAdmin()) {
                    $idBillet = $this->getParametre($_POST, 'id');
                    $maj = $this->getParametre($_POST, 'maj');
                    $majTitre = $this->getParametre($_POST, 'majTitre');


                    if ($idBillet != 0) {
                        $this->ctrlBillet->updateArticle($idBillet,$maj,$majTitre);
                    }
                  }
                  else {
                    throw new Exception("Veuillez vous connecter en tant qu'administrateur");
                    }
                }

                else if ($_GET['action'] == 'nouveau') {
                  if ($this->ctrlBillet->isAdmin()) {
                    if (!count($_POST)) {
                      $this->ctrlBillet->nouveau();

                    }
                    else {
                      $contenu=$this->getParametre($_POST, 'contenu');
                      $titre=$this->getParametre($_POST, 'titre');
                      $this->ctrlBillet->creer($titre, $contenu);
                    }
                  }
                  else {
                    throw new Exception("Veuillez vous connecter en tant qu'administrateur");
                  }

                  }

                else if ($_GET['action'] == 'moderer') {
                  if ($this->ctrlBillet->isAdmin()) {
                    if (isset($_GET['id'])) {
                      $idCommentaire = intval($this->getParametre($_GET, 'id'));
                    }
                    else {
                      $idCommentaire=NULL;
                    }
                    $this->ctrlAdmin->modererCommentaires($idCommentaire);
                  }
                  else {
                    throw new Exception("Veuillez vous connecter en tant qu'administrateur");
                    }

                }

                else if ($_GET['action'] == 'signaler') {
                  if (isset($_GET['id'])) {
                    $idCommentaire = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlAdmin->signalerCommentaire($idCommentaire);

                  }

                }

                else if ($_GET['action'] == 'modererSignal') {
                  if ($this->ctrlBillet->isAdmin()) {
                    if (isset($_GET['id'])) {
                      $idCommentaire = intval($this->getParametre($_GET, 'id'));
                    }
                    else {
                      $idCommentaire=NULL;
                    }
                    $this->ctrlAdmin->annulerSignalement($idCommentaire);

                  }
                  else {
                    throw new Exception("Veuillez vous connecter en tant qu'administrateur");
                  }

                }


                  else{
                    throw new Exception("Action non valide");}

            }

            else {
              if (isset($_GET['page']))
                {
                    $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
                }
                else // La variable n'existe pas, c'est la première fois qu'on charge la page
                {
                    $page = 1; // On se met sur la page 1 (par défaut)
                }
              $this->ctrlAccueil->accueil($page);
            }
        }

        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
