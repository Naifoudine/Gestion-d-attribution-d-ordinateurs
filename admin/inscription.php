  <?php
    // On démarre la session PHP
    session_start();

    if (isset($_SESSION['user'])) {
        header("Location: profil.php");
        exit;
    }

    ini_set('display_errors', 'on');
    include_once "./includes/header.php";
    include("config.php");

    // On verifie si le formulaire a été validé
    if (!empty($_POST)) {
        //var_dump($_POST);
        // Le formulaire à été envoyé
        // On vérifie que tous les champs sont remplis
        if (
            isset($_POST['username'], $_POST['email'], $_POST['pass'], $_POST['verif_pass'])
            && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['verif_pass'])
        ) {
            // Le formulaire est complet
            // On recupère les données en les protègeant
            $pseudo = strip_tags($_POST['username']);
            $email = strip_tags($_POST['email']);
            $pass = strip_tags($_POST['pass']);
            $verif_mdp = strip_tags($_POST['verif_pass']);

            // Vérification email 
            // Valider si c'est une adresse mail pour eviter les contouenements
            $_SESSION['error'] = [];
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'][] = "L'adresse email est incorrecte !";
            } else {
                // if (
                //     preg_match('/(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[.!?,_@#$=+*/])[a-zA-Z0-9#!?,;:!<>ù%$£=+{})àç@_è|é"#()]{8,}/', $pass)
                // ) {
                if (strlen($pseudo) < 3) {
                    $_SESSION['error'][] = "Le nom d'utilisateur est trop court !";
                }


                if ($pass == $verif_mdp) {

                    // On va hasher le mot de passe
                    $pass = password_hash($_POST['pass'], PASSWORD_ARGON2ID);

                    // On e,registre en bdd
                    require_once("config.php");

                    // Req. inscription
                    $sql = "INSERT INTO `Users` (`id`, `username`, `mail`, `password`) VALUES (NULL,:username, :mail, '$pass')";

                    $query = $db->prepare($sql);

                    $query->bindValue(":username", $pseudo, PDO::PARAM_STR);
                    $query->bindValue(":mail", $email, PDO::PARAM_STR);

                    $query->execute();

                    // on recuperer le'id du nouvel utilisateur
                    $id = $db->lastInsertId();

                    // Ici l'utilisateur et le mdp sont correct
                    // On va pouvoit "connecter" l'utilisateur


                    // on stocke dans $_SESSION les infos  de l'utilisateur
                    $_SESSION["user"] = [
                        "id" => $id,
                        "username" => $pseudo,
                        "mail" => $_POST["email"]
                    ];

                    //var_dump($_SESSION);
                    // On redirige vres la page de connexion
                    header("Location: connexion.php");

                    // $insertmbr = $bdd->prepare("INSERT INTO `menbres` (`Nom`, `Prenom`, `tel`, `mail`, `motdepasse`) VALUES ( ?, ?, ?, ?, ?)");
                    // $insertmbr->execute(array($Nom, $Prenom, $tel, $mail, $mdp));
                    // $erreur = "Votre compte a été créé ! <a href=\"login.php\">Me connecter</a>";
                } else {
                    die("Vos mots de passe ne correspondent pas !");
                }
                // } else {
                //     die("Veuillez respecter le format demandé !");
                // }

            }

            // // On va hasher le mot de passe
            // $pass = password_hash($_POST['pass'], PASSWORD_ARGON2ID);

            // // On e,registre en bdd
            // require_once("config.php");

            // // Req. inscription
            // $sql = "INSERT INTO `Users` (`id`, `username`, `mail`, `password`) VALUES (NULL,:username, :mail, '$pass')";

            // $query = $db->prepare($sql);

            // $query->bindValue(":username", $pseudo, PDO::PARAM_STR);
            // $query->bindValue(":mail", $email, PDO::PARAM_STR);

            // $query->execute();
        } else {
            die("Le formulaire est incomplet");
        }
    }


    ?>

  <div class="row align-items-center" style="height: 100vh;">

      <div class="col d-flex justify-content-center">

          <!-- Material form register -->
          <div class="card">

              <h5 class="card-header info-color white-text text-center py-4">
                  <strong>Inscription</strong>
              </h5>

              <!--Card content-->
              <div class="card-body px-lg-5 pt-0">

                  <!-- Form -->
                  <form method="post" class="text-center" style="color: #757575;">

                      <div class="form-row">
                          <div class="col">
                              <!-- nom d'utilisateur -->
                              <div class="md-form">
                                  <input type="text" id="username" name="username" class="form-control">
                                  <label for="username">Nom d'utilisateur</label>
                              </div>
                          </div>
                          <div class="col">
                              <!-- E-mail -->
                              <div class="md-form">
                                  <input type="email" id="email" name="email" class="form-control">
                                  <label for="email">E-mail</label>
                              </div>
                          </div>
                      </div>

                      <!-- Password -->
                      <div class="md-form mt-0">
                          <input type="password" id="pass" name="pass" class="form-control" aria-describedby="pass">
                          <label for="pass">Mot de passe</label>
                          <small id="pass" class="form-text text-muted text-left">
                              Au moins:
                              <ul>
                                  <li>Au moins 8 caractères dont 1 Maj. et 1 min</li>
                                  <li>1 chiffre</li>
                                  <li>1 caractère spécial (!?,_@#$=+*/...)</li>
                              </ul>
                          </small>
                      </div>

                      <div class="md-form mt-0">
                          <input type="password" id="verif_pass" name="verif_pass" class="form-control" aria-describedby="verif_pass">
                          <label for="verif_pass">Vérification du mot de passe</label>
                      </div>

                      <!-- Sign up button -->
                      <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">S'inscrire</button>

                      <hr>

                      <!-- Terms of service -->
                      <p>En cliquant sur
                          <em>S'inscrire,</em> vous acceptez nos
                          <a href="" target="_blank">conditions d'utilisation</a>

                  </form>
                  <!-- Form -->

              </div>

          </div>
          <!-- Material form register -->

      </div>
  </div>