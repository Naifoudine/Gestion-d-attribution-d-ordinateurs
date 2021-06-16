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
            <h1>Ajout d'une nouvelle attribution <br>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="nom_Formation">Nom de l'utilisateur : </label>
                    <select id="id_utilisateur" class="form-select" aria-label="Default select example" name="id_utilisateur">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description_Formation">Nom du poste :</label>
                    <select id="id_pc" class="form-select" aria-label="Default select example" name="id_pc">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <!-- <div class="form-group">
                    <label for="date">Date d'attribution :</label>
                    <input class="form-control" type="text" id="date" name="date">
                </div> -->

                <div class="md-form">
                    <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker">
                    <label for="date-picker-example">Try me...</label>
                </div>

                <div class="form-group">
                    <label for="heureDebut">Début du créneau :</label>
                    <input class="form-control" type="text" id="heureDebut" name="heureDebut">
                </div>

                <div class="form-group">
                    <label for="heureFin">Fin du créneau :</label>
                    <input class="form-control" type="text" id="heureFin" name="heureFin">
                </div>


                <button class="btn btn-primary">Ajouter</button>

            </form>
        </section>
    </div>
</main>

<script>
    // Data Picker Initialization
    $('.datepicker').pickadate();
</script>