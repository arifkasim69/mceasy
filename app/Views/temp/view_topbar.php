 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             <!-- Topbar Search -->
             <form class="d-none d-sm-inline-block form-inline mr-auto ml-sm-3 my-2 my-sm-0 mw-100 navbar-tittle">
                     <h1 class="h4 sm-2 text-gray-800"><?= $judul; ?></h1>
             </form>

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo session()->get('role_name') ?></span>
                         <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Profile
                         </a>
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                             Settings
                         </a>
                         <a class="dropdown-item" href="#">
                             <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                             Activity Log
                         </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
                     </div>
                 </li>

             </ul>

         </nav>
         <!-- End of Topbar -->