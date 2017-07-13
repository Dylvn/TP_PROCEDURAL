<?php

$cookies = array();

foreach ($_COOKIE as $key => $value) {
    if (is_int($key)) {
        $cookies[$key] = array();
        array_push($cookies[$key],$articles['title'][$key]);
        array_push($cookies[$key],$articles['prix'][$key]);
    }
}


// ADD OR DELETE ITEMS
if (!empty($_POST)) {

    if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {

        if (isset($_POST['delete'])) {
            foreach ($_POST as $cookie => $value) {
                unset($_COOKIE[$cookie]);
                setcookie ($cookie, "", time() - 3600);
            }
        }

        header('Location: index.php?page=panier');
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
            <h1 class='lead text-center'>Mon panier <br><?php if (count($_COOKIE) > 2) :?> <span><a href="/shopping_list_mail">Recevoir son panier par mail</a></span> <?php endif; ?></h1>
        </div>
        <?php 
        if (!empty($cookies)) : 
            foreach ($cookies as $key => $value) : ?>
                <div class="col-md-4 well">
                <?php foreach ($cookies[$key] as $clef => $valeur) : 
                    if ($clef == 0) : ?>
                        <h2><?= $valeur ?></h2>
                    <?php elseif ($clef == 1) : ?>
                        <p>Prix : <?= $valeur ?> €</p>
            <?php
                    endif;
                endforeach; ?>
                    <?php if (isset($_COOKIE[$key])) : ?>
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
            <?php endforeach; 
            else : ?>
                <h2>Votre panier semble vide</h2>
            <?php endif; ?>
    </div>
</div>