<?php

    $key = array_search($_SESSION['login'], $users['login']);
    $email = $users['email'][$key];

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="well">Votre profil, <?= $_SESSION['login'] ?></h1>

            <div class="row">
                <div class="col-md-6">
                    <h2>Login</h2>
                    <p><?= $_SESSION['login'] ?></p>
                </div>
                <div class="col-md-6">
                    <h2>Email</h2>
                    <p><?= $email ?></p>
                </div>
            </div>
        </div>
    </div>
</div>