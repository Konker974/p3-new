<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>


<h1><?= $billet['titre'] ?></h1>
<time><?= $billet['date'] ?></time>
<form method="post" id="tmce" action="index.php?action=update">
  <div class="input-group">
    <span class="input-group-addon" class="basic-addon3">Titre de l'article</span>
    <input name="majTitre" form="tmce" class="form-control" value="<?= $billet['titre'] ?>">
  </div>

  <textarea name="maj" id="mytextarea" form="tmce"><?= $billet['contenu'] ?></textarea>
  <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
  <button type="button submit" class="btn btn-primary">valider</button>

</form>

<?php foreach ($commentaires as $commentaire): ?>
  <h4 id="titreReponses">Commentaire signalé</h4>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
    <a class="btn btn-primary" href="<?= "index.php?action=moderer&id=" . $commentaire['id'] ?>"  role="button">Supprimer commentaire</a>
    <a class="btn btn-primary" href="<?= "index.php?action=modererSignal&id=" . $commentaire['id'] ?>"  role="button">Oter le signalement</a>

<?php endforeach; ?>
