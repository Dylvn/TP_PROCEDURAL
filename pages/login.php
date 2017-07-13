<?php
    if (!empty($_POST)) {

        $errors = array();

        if (!isset($_POST['login']) && empty($_POST['login'])) {

            array_push($errors, 'Veuillez remplir le login svp');
        }

        if (!isset($_POST['password']) && empty($_POST['password'])) {

            array_push($errors, 'Veuillez remplir le password svp');
        }

        if (empty($errors)) {

            $keyLogin = array_search($_POST['login'], $users['login']);
            $keyPassword = array_search($_POST['password'], $users['password']);

            if ($keyLogin === $keyPassword) {
                $_SESSION['login'] = $_POST['login'];
                header('Location: index.php');
            } else {
                unset($_SESSION['login']);
                array_push($errors, 'Le mot de passe et le login, ne conviennent pas.');
            }
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
            <form action="" method="POST">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="texte" name="login" class="form-control" id="login" placeholder="Login">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>