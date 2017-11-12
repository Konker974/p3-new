<?php $this->titre = "Admin"; ?>

<?php foreach ($billets as $billet):?>

<div class="list-group">
  <a href="<?= "index.php?action=billetAdmin&id=" . $billet['id'] ?>" class="list-group-item list-group-item-action"><?= $billet['titre'] ?></a>
</div>
<?php endforeach; ?>
<a class="btn btn-primary" href="index.php?action=nouveau" role="button">Créer un nouvel article</a>
<a class="btn btn-primary" href="index.php?action=moderer" role="button">Vérifier les commentaires</a>
