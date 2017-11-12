<?php
require_once 'Modele/Admin.php';
require_once 'Vue/Vue.php';
require_once 'ControleurBillet.php';

class ControleurAdmin {

    private $admin;
    private $billet;
    private $commentaire;
    private $contrlBillet;


    public function __construct() {
      $this->admin= new Admin;
      $this->billet = new Billet();
      $this->commentaire = new Commentaire();
    }

    public function login() {
      session_start();
      if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        header('Location: http://localhost/p3/index.php?action=admin');
        exit;
      }
      if (isset($_POST['identifiant']) AND isset($_POST['password']))
        {
          $pass_hache = sha1($_POST['password']);
          $credentials=$this->admin->getCredentials($_POST['identifiant'], $pass_hache);
          if (!$credentials)
              {
                  echo 'Mauvais identifiant ou mot de passe !';
              }
              else
              {
                  $_SESSION['identifiant'] = $credentials['pseudo'];
                  $_SESSION['loggedIn'] = true;
                  header('Location: http://localhost/p3/index.php?action=admin');
                  exit;


              }
        }
      else {
        $vue = new Vue("Login");
        $vue->generer(array ());
      }
    }

  public function logout() {
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: http://localhost/p3/index.php?action=login');
    exit;
  }

  public function adminAcceuil(){
    $billets = $this->billet->getBillets();
    $vue = new Vue("Admin");
    $vue->generer(array('billets' => $billets));
  }

  public function modererCommentaires($idCommentaire=NULL){

    if ($idCommentaire!=NULL) {
      $idBillet = $this->commentaire->getIdBillet($idCommentaire);
      $this->commentaire->supprimerCommentaire($idCommentaire);
      $vue = new Vue("CommentaireSupp");
      $vue->generer(array('billet' => $idBillet));
    }
    else {
      $commentaires = $this->commentaire->getCommentairesSignales();
      $vue = new Vue("AdminModerer");
      $vue->generer(array('commentaires' => $commentaires));
    }
  }

  public function signalerCommentaire($idCommentaire){
    $this->commentaire->signalerCommentaire($idCommentaire);
    $idBillet = $this->commentaire->getIdBillet($idCommentaire);
    $vue = new Vue("CommentaireSignale");
    $vue->generer(array('billet' => $idBillet));

  }

  public function annulerSignalement($idCommentaire){
    $this->commentaire->annulerSignalement($idCommentaire);
    $idBillet = $this->commentaire->getIdBillet($idCommentaire);
    $this->contrlBillet= new ControleurBillet();
    $this->contrlBillet->billetAdmin($idBillet['bil_id']);
  }




}
