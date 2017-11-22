
<?php foreach ($commentaires as $commentaire):?>

<div class="card">
  <div class="card-body">
    <h4 class="card-title"><?= $commentaire['auteur'] ?>
    </h4>
    <p class="card-text"><?= $commentaire['contenu'] ?></p>
    <a href="<?= "index.php?action=billetAdmin&id=" . $commentaire['bil_id'] ?>" class="btn btn-outline-info">Voir le billet</a>
    <a href="<?= "index.php?action=moderer&id=" . $commentaire['id'] ?>" class="btn btn-outline-danger">Supprimer commentaire</a>
  </div>
</div>

<br>
<?php endforeach; ?>
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
