<?php
ini_set('display_errors', 1);
require_once 'autoload.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module" src="assets/js/default.js" defer></script>
    <title>TP combats</title>
</head>
<body>
    <header class="container">
            <div class="row justify-content-center">
            <h1>Mini jeu combats</h1>
            <nav class="nav">
                <a class="nav-link" href="index.php?controller=index">Accueil</a>
                <a class="nav-link" href="index.php?controller=jouer">Jouer</a>
                <a class="nav-link" href="index.php?controller=personnages">Liste des personnages</a>
                <a class="nav-link" href="index.php?controller=index&action=logout">Se deconnecter</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-12">
                <?php

                $controllerPath = 'combats\\controller\\';
                if( isset( $_REQUEST['controller'] ) ) {
                    $controllerClassName = $controllerPath . ucfirst( $_REQUEST['controller'] ) . 'Controller'; 
                 //   array_shift( $_REQUEST );
                    $controller = new $controllerClassName();
                } else {
                    $controller = new combats\controller\IndexController();
                }

                //echo '<p>Nombre de personnages créés : ' . $nbPerso .'</p>';
                ?>
            </div>
        </div>
    </main>

</body>
</html>