<?php
ini_set('display_errors', 'on');
@session_start();
require "config_centre_culturel.php";


$countRP = $db->query("SELECT ROUND(Count(A.id_pc) * 100 / (Select Count(*) From Ordinateurs)) as Pourcentage From Attribution A inner join Ordinateurs O on A.id_pc = O.id_pc");

$countAttrib = $db->query("SELECT COUNT(*) as Total FROM `Attribution`");

$countPC = $db->query("SELECT COUNT(*) as Total FROM `Ordinateurs`");

$countUser = $db->query("SELECT COUNT(*) as Total FROM `Utilisateurs`");

?>



<!-- MAIN -->
<div class="col p-4">


    <div class="grey-bg container-fluid">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h1 class="display-4 text-uppercase">Tableau de bord</h1>
                    <!-- <h4 class="text-uppercase">Tableau de bord</h4> -->
                    <p>Statistiques des les attributions</p>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <?php while ($donnees = $countAttrib->fetch()) {
                                        ?>
                                            <h3 class="danger"><?= $donnees['Total']; ?></h3>
                                        <?php
                                        }
                                        $countAttrib->closeCursor(); // Termine le traitement de la requête
                                        ?>
                                        <span class="text-uppercase">Attributions</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-calendar danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <?php while ($donnees = $countPC->fetch()) {
                                        ?>
                                            <h3 class="success"><?= $donnees['Total']; ?></h3>
                                        <?php
                                        }
                                        $countPC->closeCursor(); // Termine le traitement de la requête
                                        ?>
                                        <span class="text-uppercase">Ordinateurs</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-screen-desktop success font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <?php while ($donnees = $countUser->fetch()) {
                                        ?>
                                            <h3 class="primary"><?= $donnees['Total']; ?></h3>
                                        <?php
                                        }
                                        $countUser->closeCursor(); // Termine le traitement de la requête
                                        ?>
                                        <span class="text-uppercase">Utilisateurs</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-user primary font-large-2 float-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <?php while ($donnees = $countRP->fetch()) {
                                        ?>
                                            <h3 class="warning"><?php echo $donnees['Pourcentage']; ?></h3>


                                            <span>Pourcentage de postes attribuées</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $donnees['Pourcentage']; ?>%" aria-valuenow="<?php echo $donnees['Pourcentage']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            <?php
                                        }

                                        $countRP->closeCursor(); // Termine le traitement de la requête

                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- <div class="card">
        <h5 class="card-header font-weight-light">Requirements</h5>
        <div class="card-body">
            <ul>
                <li>JQuery</li>
                <li>Bootstrap 4.3</li>
                <li>FontAwesome</li>
            </ul>
        </div>
    </div> -->
</div>
<!-- Main Col END -->