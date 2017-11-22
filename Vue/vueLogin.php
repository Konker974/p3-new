
<div class="row justify-content-md-center">
  <div class="col col-md-4">
    <form method="POST" action="index.php?action=login">
      <div class="form-group">
        <label for="identifiant">Identifiant</label>
        <input type="text" class="form-control" name="identifiant" id="identifiant" aria-describedby="emailHelp" placeholder="Identifiant administrateur uniquement">
        <small id="identifiantHelp" class="form-text text-muted">Veuillez entrer votre idientifiant à l'abri des regards indiscrets</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Connexion</button>
    </form>
  </div>
</div>
