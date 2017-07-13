<!DOCTYPE html>
<html lang="fr">
<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>TP E-commerce</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    <link rel="stylesheet" href="css/style.css">

    <!-- Scripts
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>

    <iframe style="display:none" src="https://www.youtube.com/embed/aOYRj9jCGtE?autoplay=1" frameborder="0" allowfullscreen></iframe>

    <!-- Navbar
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <nav class="navbar navbar-inverse" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Project name</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <?php if (!empty($_SESSION['login'])) : ?>
                        <li><a href="/profil">Profil</a></li>
                        <li><a href="/logout">Se déconnecter</a></li>>
                        <li role="presentation" class="active"><a href="/panier">Panier <span class="badge"><?php if ((count($_COOKIE) - 2) >= 0) { echo count($_COOKIE) - 2; } ?></span></a></li>
                    <?php else : ?>
                        <li><a href="/login">Se connecter</a></li>
                        <li><a href="/logon">S'inscrire</a></li>
                    <?php endif; ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?= $_SESSION['error'] ?></p>
        </div>
    <?php elseif(isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?= $_SESSION['success'] ?></p>
        </div>
    <?php endif; 
        unset($_SESSION['error']);
        unset($_SESSION['success']);
    ?>