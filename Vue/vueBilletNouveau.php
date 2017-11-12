<?php $this->titre = "Mon Blog - nouvel article ";
?>


<form method="post" id="tmce" action="index.php?action=nouveau">
  <div class="input-group">
    <span class="input-group-addon" class="basic-addon3">Titre de l'article</span>
    <input name="titre" form="tmce" class="form-control" />
  </div>

  <textarea name="contenu" id="mytextarea" form="tmce"></textarea>
  <button type="button submit" class="btn btn-primary">valider</button>

</form>
