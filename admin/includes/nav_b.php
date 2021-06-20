   <?php session_start(); ?>
   <!-- Bootstrap NavBar -->
   <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #6D4573;">
     <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <a class="navbar-brand" href="#">
       <img src="includes/kisspng-system-administrator-database-administrator-comput-administration-5ae7deef217d00.2403670715251453271372.png" width="30" height="30" class="d-inline-block align-top" alt="" />
       <span class="menu-collapsed">Gestion d'attribution d'ordinateurs</span>
     </a>
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <ul class="navbar-nav ml-auto">
         <li class="nav-item dropdown">
           <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="bi bi-person-circle"></i>
             <?= $_SESSION['user']['username']; ?>
           </a>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> Modifier mon profil</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item clickable" href="deconnexion.php"><i class="bi bi-door-closed-fill"></i> Déconnexion</a>
           </div>
         </li>
         <!-- This menu is hidden in bigger devices with d-sm-none. 
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
         <li class="nav-item dropdown d-sm-block d-md-none">
           <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Menu
           </a>
           <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
             <a class="dropdown-item" href="#top">Tableau de bord</a>
             <a class="dropdown-item" href="attributions.php">Attributions</a>
             <a class="dropdown-item" href="utilisateurs.php">Utilisateurs</a>
             <a class="dropdown-item" href="ordinateurs.php">Ordinateurs</a>
           </div>
         </li>
         <!-- Smaller devices menu END -->
       </ul>
     </div>
   </nav>
   <!-- NavBar END -->