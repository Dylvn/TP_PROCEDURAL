<?php

    if (!empty($_POST)) {

        if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {

            if (isset($_POST['add'])) {
                foreach ($_POST as $cookie => $value) {
                    setcookie($cookie, true);
                }
            }

            if (isset($_POST['delete'])) {
                foreach ($_POST as $cookie => $value) {
                    unset($_COOKIE[$cookie]);
                    setcookie ($cookie, "", time() - 3600);
                }
            }

            header('Location: index.php');
        } else {
            $errors = array('Veuillez vous connecter pour ajouter des items dans votre panier.');
        }

    }

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($errors) && !empty($errors)) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['login'])) : ?>
                <h1>Bienvenue sur mon site <?= $_SESSION['login'] ?></h1>
            <?php else : ?>
                <h1>Bienvenue sur mon site Didier</h1>
            <?php endif; ?>

            <p>Qu'est ce qui est jaune et qui attend ?</p>
            <form action="?page=troll" method="post">
                <label class="radio-inline"><input type="radio" name="optradio">La mer noir</label>
                <label class="radio-inline"><input type="radio" name="optradio">La mew noiw</label>
                <label class="radio-inline"><input type="radio" name="optradio">Jonathan</label>
                <button type="submit" class="btn btn-info">Je valiiiiiiiiide</button>
            </form>

        </div>
    </div>
    <div class="row">
        <h1 class="text-center">Articles</h1>
        <?php  
            foreach ($articles['id'] as $article) : 
            $key = $article - 1;
        ?>
            <div class="col-md-4 well">
                <h2 class="text-center lead well"><?= $articles['title'][$key] ?></h2>
                <p><?= $articles['description'][$key] ?></p>
                <p>Prix : <?= $articles['prix'][$key] ?> € </p>
                <?php  
                if (!isset($_COOKIE[$key])) : ?>
                    <div class="row">
                        <div class="col-md-offset-7 col-md-4">
                            <form action="" method="post">
                            <input type="hidden" name="<?= $key ?>">
                            <button type="submit" name="add" class="btn btn-info">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-md-offset-7 col-md-4">
                            <form action="" method="post">
                            <input type="hidden" name="<?= $key ?>">
                            <button type="submit" name="delete" class="btn btn-warning">Retirer du panier</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>