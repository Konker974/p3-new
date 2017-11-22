
<article >
    <header>
        <h1 class="display-4"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date'] ?></time>
    </header>
    <br>
    <p><?= $billet['contenu'] ?></p>
</article>
<br><br>
<hr />
<header>
    <h5 id="titreReponses">Réponses à : <?= $billet['titre'] ?></h5>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
    <a class="btn btn-outline-warning btn-sm" href="<?= "index.php?action=signaler&id=" . $commentaire['id'] ?>" role="button">Signaler le commentaire</a>
    <br>
    <br>
<?php endforeach; ?>
<br><br>
<hr />
<h5>Postez votre commentaire :</h5>

<form  method="post" action="index.php?action=commenter">
  <div class="form-group">
    <input class="form-control"  name="auteur" type="text" placeholder="Votre pseudo"
           required /><br />
    <textarea class="form-control"  name="contenu" rows="4"
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input class="btn btn-secondary" type="submit" value="Commenter" />
  </div>

</form>
