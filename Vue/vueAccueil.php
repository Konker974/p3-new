
<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['BIL_ID'] ?>">
                <h1 class="display-4"><?= $billet['BIL_TITRE'] ?></h1>
            </a>
            <time><?= $billet['BIL_DATE'] ?></time>
        </header>
        <p><?= substr(strip_tags($billet['BIL_CONTENU']), 0, 1500); ?></p>
    </article>
    <a href="<?= "index.php?action=billet&id=" . $billet['BIL_ID'] ?>" class="btn btn-sm btn-info">Voir le billet</a>

    <hr />
<?php endforeach; ?>

<nav aria-label="navi_pagi">
  <ul class="pagination justify-content-center">
    <?php for ($i = 1 ; $i <= $nbrePages ; $i++){?>
    <li class="page-item"><a class="page-link" href=<?php echo '"index.php?page=' . $i . '"';?>><?php echo $i; ?></a></li>
    <?php }?>
  </ul>
</nav>
