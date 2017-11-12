<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script type="text/javascript" src="JS/script.js">

        </script>
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
                <a href="index.php?action=login">Administration</a>
                <a href="index.php?action=logout">Deconnexion</a>
            </footer>
        </div> <!-- #global -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
