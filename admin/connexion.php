<?php
// On démarre la session PHP
session_start();

if (isset($_SESSION['user'])) {
  header("Location: profil.php");
  exit;
}

include_once "./includes/header.php";

// On verifie si le formulaire a été envoyé
if (!empty($_POST)) {
  //var_dump($_POST);
  // Le formulaire à été envoyé
  // On vérifie que tous les champs sont remplis
  if (
    isset($_POST['email'], $_POST['pass'])
    && !empty($_POST['email']) && !empty($_POST['pass'])
  ) {
    // Le formulaire est complet
    // On recupère les données en les protègent
    //$email = strip_tags(isset($_POST['email']));

    // On verifie si l'email en est un
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      die("Ce n'est pas un email !");
    }

    require "config.php";

    // Req. Connexion
    $sql = "SELECT * FROM `Users` WHERE `mail` = :mail";

    $query = $db->prepare($sql);

    $query->bindValue(":mail", $_POST['email'], PDO::PARAM_STR);

    $query->execute();

    $user = $query->fetch();

    //var_dump($user);

    if (!$user) {
      die("L'utilisateur ou le mot de passe est incorrect !");
    }

    // Ici on a un user existant, on peut vérifier son mdp 
    if (!password_verify($_POST["pass"], $user['password'])) {
      die("L'utilisateur ou le mot de passe est incorrect !");
    }

    // Ici l'utilisateur et le mdp sont correct
    // On va pouvoit "connecter" l'utilisateur


    // on stocke dans $_SESSION les infos  de l'utilisateur
    $_SESSION['user'] = [
      'id' => $user['id'],
      'username' => $user['username'],
      'mail' => $user['mail']
    ];

    //var_dump($_SESSION);
    // On redirige vres la page de profil
    header("Location: profil.php");

    //$query->bindValue(":password", $pass);
  } else {
    die("Le formulaire est incomplet");
  }
}


?>


<div class="row align-items-center" style="height: 100vh;">

  <div class="col d-flex justify-content-center">
    <!-- Material form login -->
    <div class="card">

      <h5 class="card-header info-color white-text text-center py-4">
        <strong>Connexion</strong>
      </h5>

      <!--Card content-->
      <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form method="post" class="text-center" style="color: #757575;">

          <!-- Email -->
          <div class="md-form">
            <input type="email" id="email" name="email" class="form-control">
            <label for="email">E-mail</label>
          </div>

          <!-- Password -->
          <div class="md-form">
            <input type="password" id="pass" name="pass" class="form-control">
            <label for="pass">Mot de passe</label>
          </div>

          <!-- Sign in button -->
          <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">S'identifier</button>

          <!-- Register -->
          <p>Pas encore membre?
            <a href="inscription.php">Cliquer ici pour vous inscrire</a>
          </p>


        </form>
        <!-- Form -->

      </div>

    </div>
    <!-- Material form login -->

  </div>
</div>


<?php include_once "../test/includes/footer.php"; ?>