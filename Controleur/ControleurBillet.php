<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un billet
    public function billet($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $vue = new Vue("Billet");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire à un billet
    public function commenter($auteur, $contenu, $idBillet) {
        $auteur=trim($auteur);
        $contenu=trim($contenu);
        if (empty($auteur)||empty($contenu)) {
          throw new Exception("Votre commentaire ou votre pseudo n'est pas correct. Veuillez recommencer en renseignant les champs obligatoires svp.");
        }
        $auteur=htmlspecialchars($auteur);
        $contenu=htmlspecialchars($contenu);
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        // Actualisation de l'affichage du billet
        $this->billet($idBillet);
    }

    public function billetAdmin($idBillet) {
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentairesSignalesAvecId($idBillet);
        $vue = new Vue("BilletAdmin");
        $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    public function updateArticle($idBillet, $maj, $majTitre) {
        $this->billet->update($idBillet, $maj, $majTitre);
        $vue = new Vue("Update");
        $vue->generer(array());
    }

    public function nouveau() {
        $vue = new Vue("BilletNouveau");
        $vue->generer(array());

    }

    public function creer($titre, $contenu) {
        $this->billet->creerArticle($titre, $contenu);
        $vue = new Vue("Update");
        $vue->generer(array());


    }

    public function billetDelete($idBillet) {
        $this->billet->deleteBillet($idBillet);
        //$this->commentaire->supprimerCommentairesAvecId($idBillet);


    }

    public function isAdmin(){
      session_start();
      if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        return true;
      }
      else {
        return false;
      }
    }



}
