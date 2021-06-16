<?php

ini_set('display_errors', 'on');
session_start();
include_once "./includes/header.php";






?>
<main class="container">
    <div class="row">
        <section class="col-12">
            <?php

            if (!empty($_SESSION['erreur'])) {
                echo '<div class="alert alert-danger" role="alert">
					' . $_SESSION['erreur'] . '
				  </div>';
                $_SESSION['erreur'] = "";
            } ?>
            <h1>Ajout d'un nouvel ordinateur <br>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="nom_pc">Nom de l'ordinateur : </label>
                    <input class="form-nom_pc" type="text" id="id_pc" name="nom_pc">
                </div>

                <div class="form-group">
                    <label for="Adresse_ip">Adresse IP :</label>
                    <input class="form-control" type="text" id="Adresse_ip" name="Adresse_ip">
                </div>
                <button class="btn btn-primary">Ajouter</button>

            </form>
        </section>
    </div>
</main>