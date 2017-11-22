<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="style.css"/>

        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script type="text/javascript" src="JS/script.js"></script>

    </head>
    <body>
        <div class="container-fluid">
            <header>
              <div class="row bandeau">
                <div class="col text-center">
                  <h1 class="display-1"><a href="index.php" class="titre_blog">Billet simple pour l'Alaska</h1></a>
                </div>
              </div>
            </header>
            <div>
                <?= $contenu ?>
            </div> <!-- #contenu -->

        </div>
        <br>
        <br> <!-- container -->

        <footer>
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link " href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="index.php?action=login">Administration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=logout">Déconnexion</a>
            </li>
          </ul>

      </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
