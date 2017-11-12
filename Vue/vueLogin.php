<?php $this->titre = "Login"; ?>
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
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
