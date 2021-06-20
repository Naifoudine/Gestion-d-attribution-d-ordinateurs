    <!-- Bootstrap row -->
    <div class="row" id="body-row">
      <!-- Sidebar -->
      <div id="sidebar-container" class="d-none d-md-block sidebar-expanded">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
          <!-- Separator with title -->
          <li class="
              list-group-item
              sidebar-separator-title
              text-muted
              align-items-center
              menu-collapsed
              d-flex
            ">
            <small>MENU PRINCIPAL</small>
          </li>
          <!-- /END Separator -->

          <a href="profil.php" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
              <span class="fa fa-dashboard fa-fw mr-3"></span>
              <span class="menu-collapsed">Tableau de bord</span>
            </div>
          </a>
          <a href="attributions.php" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
              <span class="fa fa-calendar fa-fw mr-3"></span>
              <span class="menu-collapsed">Attributions</span>
            </div>
          </a>
          <a href="utilisateurs.php" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
              <span class="fa fa-users fa-fw mr-3"></span>
              <span class="menu-collapsed">Utilisateurs</span>
            </div>
          </a>
          <a href="ordinateurs.php" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
              <span class="fa fa-desktop fa-fw mr-3"></span>
              <span class="menu-collapsed">Ordinateurs</span>
            </div>
          </a>
          <!-- Separator with title -->
          <li class="
              list-group-item
              sidebar-separator-title
              text-muted
              align-items-center
              menu-collapsed
              d-flex
            ">
          </li>
          <!-- /END Separator -->
          <a href="#top" data-toggle="sidebar-colapse" class="
              bg-dark
              list-group-item list-group-item-action
              d-flex
              align-items-center
            ">
            <div class="d-flex w-100 justify-content-start align-items-center">
              <span id="collapse-icon" class="fa fa-2x mr-3 fa-angle-double-left"></span>
              <span id="collapse-text" class="menu-collapsed">Réduire</span>
            </div>
          </a>
        </ul>
        <!-- List Group END-->
      </div>

      <?php
      include "main.php";
      ?>
      <!-- sidebar-container END -->
      <!-- MAIN -->
      <!-- <div class="col p-4">
        <h1 class="display-4">Collapsing Sidebar Menu</h1>
        <div class="card">
          <h5 class="card-header font-weight-light">Requirements</h5>
          <div class="card-body">
            <ul>
              <li>JQuery</li>
              <li>Bootstrap 4.3</li>
              <li>FontAwesome</li>
            </ul>
          </div>
        </div>
      </div> -->
      <!-- Main Col END -->
    </div>
    <!-- body-row END -->

    <script src=""></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script>
      // Hide submenus
      $("#body-row .collapse").collapse("hide");

      // Collapse/Expand icon
      $("#collapse-icon").addClass("fa-angle-double-left");

      // Collapse click
      $("[data-toggle=sidebar-colapse]").click(function() {
        SidebarCollapse();
      });

      function SidebarCollapse() {
        $(".menu-collapsed").toggleClass("d-none");
        $(".sidebar-submenu").toggleClass("d-none");
        $(".submenu-icon").toggleClass("d-none");
        $("#sidebar-container").toggleClass(
          "sidebar-expanded sidebar-collapsed"
        );

        // Treating d-flex/d-none on separators with title
        var SeparatorTitle = $(".sidebar-separator-title");
        if (SeparatorTitle.hasClass("d-flex")) {
          SeparatorTitle.removeClass("d-flex");
        } else {
          SeparatorTitle.addClass("d-flex");
        }

        // Collapse/Expand icon
        $("#collapse-icon").toggleClass(
          "fa-angle-double-left fa-angle-double-right"
        );
      }
    </script>
    <script>
      // prevent navigation
      // document.addEventListener(
      //   "DOMContentLoaded",
      //   function() {
      //     var links = document.getElementsByTagName("A");
      //     for (var i = 0; i < links.length; i++) {
      //       links[i].addEventListener("click", function(e) {
      //         var href = this.getAttribute("href");

      //         if (!href) {
      //           return;
      //         }

      //         if (href === "#") {
      //           // hash only ('#')
      //           console.debug("Internal nav allowed by Codeply");
      //           e.preventDefault();
      //         } else if (this.hash) {
      //           // hash with tag ('#foo')
      //           var element = null;
      //           try {
      //             element = document.querySelector(this.hash);
      //           } catch (e) {
      //             console.debug("Codeply internal nav querySelector failed");
      //           }
      //           if (element) {
      //             // scroll to anchor
      //             e.preventDefault();
      //             const top =
      //               element.getBoundingClientRect().top + window.pageYOffset;
      //             //window.scrollTo({top, behavior: 'smooth'})
      //             window.scrollTo(0, top);
      //             console.debug(
      //               "Internal anchor controlled by Codeply to element:" +
      //               this.hash
      //             );
      //           } else {
      //             // allow javascript routing
      //             console.debug("Internal nav route allowed by Codeply");
      //           }
      //         } else if (
      //           href.indexOf("/p/") === 0 ||
      //           href.indexOf("/v/") === 0
      //         ) {
      //           // special multi-page routing
      //           console.debug("Special internal page route: " + href);

      //           var l = href.replace("/p/", "/v/");

      //           // reroute
      //           e.preventDefault();
      //           var newLoc = l + "?from=internal";
      //           console.debug("Internal view will reroute to " + newLoc);
      //           location.href = newLoc;
      //         } else if (href.indexOf("./") === 0) {
      //           // special multi-page routing
      //           console.debug("Special internal ./ route: " + href);

      //           var u = parent.document.URL.split("/");
      //           var pn = href.split("/")[1];
      //           var plyId = u[u.length - 1];

      //           if (plyId.indexOf("?from") > -1) {
      //             // already rerouted this
      //             console.debug("already rerouted");
      //             plyId = u[u.length - 2];
      //           }

      //           var l = plyId + "/" + pn;

      //           console.debug(u);
      //           console.debug(pn);
      //           console.debug("l", l);

      //           // reroute
      //           e.preventDefault();
      //           var newLoc = "/v/" + l + "?from=internal";
      //           console.debug("Internal page will reroute to " + newLoc);
      //           location.href = newLoc;
      //         } else {
      //           // no external links
      //           e.preventDefault();
      //           console.debug("External nav prevented by Codeply");
      //         }
      //         //return false;
      //       });
      //     }
      //   },
      //   null
      // );
    </script>