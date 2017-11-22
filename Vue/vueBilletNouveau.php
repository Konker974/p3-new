<?php $this->titre = "Mon Blog - nouvel article ";
?>


<form method="post" id="tmce" action="index.php?action=nouveau">
  <div class="input-group">
    <span class="input-group-addon" class="basic-addon3">Titre de l'article</span>
    <input name="titre" form="tmce" class="form-control" />
  </div>

  <textarea name="contenu" id="mytextarea" form="tmce"></textarea>
  <br>
  <div class="row justify-content-center">
    <div class="col-md-3 ">
      <button type="button submit" class="btn btn-primary btn-block">Valider</button>
      <a href="index.php?action=admin" class="btn btn-danger btn-block">Annuler</a>
    </div>
  </div>


</form>
