<?php $this->titre = "Admin"; ?>
<div class="alert alert-success" role="alert">
  Commentaire Supprimé
</div>
<a class="btn btn-primary" href="index.php?action=nouveau" role="button">Créer un nouvel article</a>
<a class="btn btn-primary" href="index.php?action=moderer" role="button">Vérifier les commentaires</a>
<a class="btn btn-primary" href="<?= "index.php?action=billetAdmin&id=" . $billet['bil_id'] ?>" role="button">Retourner à l'article'</a>
