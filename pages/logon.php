<?php

    if (!empty($_POST)) {

        $errors = array();

        if (!isset($_POST['login']) || empty($_POST['login'])) {

            array_push($errors, 'Veuillez remplir le login svp');
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {

            array_push($errors, 'Veuillez remplir le password svp');
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {

            array_push($errors, 'Veuillez remplir le email svp');
        }

        if (empty($errors)) {
            $id = end($users['id']) + 1;
            array_push($users['id'], $id);
            array_push($users['login'], $_POST['login']);
            array_push($users['password'], $_POST['password']);
            array_push($users['email'], $_POST['email']);
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
            <form action="?page=logon" method="POST">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="texte" name="login" class="form-control" id="login" placeholder="Login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>