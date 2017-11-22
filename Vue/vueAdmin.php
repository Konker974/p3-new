<?php $this->titre = "Admin"; ?>

<?php foreach ($billets as $billet):?>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><a href="<?= "index.php?action=billetAdmin&id=" . $billet['id'] ?>"><?= $billet['titre'] ?></a>
      </h4>
      <p class="card-text"><?= substr(strip_tags($billet['contenu']), 0, 1500) ?></p>
      <a href="<?= "index.php?action=billetAdmin&id=" . $billet['id'] ?>" class="btn btn-outline-info">Voir le billet</a>
      <a href="<?= "index.php?action=delete&id=". $billet['id'] ?>" class="btn btn-outline-danger">Supprimer le billet</a>
    </div>
  </div>

  <br>

<?php endforeach; ?>
<br>
<div class="row">
  <div class="col">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="btn btn-primary btn-sm" href="index.php?action=nouveau" role="button">Créer un nouvel article</a>
        <a class="btn btn-primary btn-sm" href="index.php?action=moderer" role="button">Vérifier les commentaires</a>

      </li>
    </ul>

  </div>

</div>
