<?php $this->titre = "Admin"; ?>
<div class="alert alert-success" role="alert">
  <div class="row justify-content-center">
    <div class="col-md-auto">
      <p>  Commentaire Supprimé</p>
    </div>
  </div>

</div>
<div class="row">
  <div class="col">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="btn btn-primary" href="index.php?action=nouveau" role="button">Créer un nouvel article</a>
        <a class="btn btn-primary" href="index.php?action=moderer" role="button">Vérifier les commentaires</a>
        <a class="btn btn-primary" href="<?= "index.php?action=billetAdmin&id=" . $billet['bil_id'] ?>" role="button">Retourner à l'article</a>
      </li>
    </ul>

  </div>
</div>
