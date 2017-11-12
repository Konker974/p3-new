<?php $this->titre = "Admin"; ?>

<?php foreach ($commentaires as $commentaire):?>

<div class="list-group">
  <a href="<?= "index.php?action=billetAdmin&id=" . $commentaire['bil_id'] ?>" class="list-group-item list-group-item-action"><?= $commentaire['contenu'] ?></a>
</div>
<?php endforeach; ?>
<a class="btn btn-primary" href="index.php?action=nouveau" role="button">Créer un nouvel article</a>
<a class="btn btn-primary" href="index.php?action=moderer" role="button">Vérifier les commentaires</a>
