<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Material Design for Bootstrap</title>
        <!-- MDB icon -->
        <link rel="icon" href="<?= base_url('img/mdb-favicon.ico') ?>" type="image/x-icon" />
        <!-- Font Awesome -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        />
        <!-- Google Fonts Roboto -->
        <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        />
        <!-- MDB -->
        <link rel="stylesheet" href="<?= base_url('css/mdb.min.css') ?>" />
    </head>
    <body>
    <!-- Start your project here-->
	
	<script src="<?= base_url('js/jquery.js') ?>"></script>
	
    <style>
        .login-and-register{
            width: 35%;  
            margin: auto; 
            margin-top: 7%; 
            padding: 0 5% 0 5%;
        }

        .myFooter{
            position: fixed; 
            bottom: 0; 
            width: 100%;
        }

        .myBtn{
            margin-right: 15px;
        }

        @media only screen and (max-width: 1200px) {
            .login-and-register{
                width: 50%;  
            }
        }

        @media only screen and (max-width: 660px) {
            .login-and-register{
                width: 75%;  
            }
        }

        @media only screen and (max-height: 570px) {
            .myFooter{
                position: unset;
            }
        }

        @media only screen and (max-width: 990px) {
            .callBtn1{
                display: none;
            }
        }


    </style>

<?php $uri = service('uri'); if($uri->getSegment(1) == 'chat'): ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="">
      <img
        src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href=""><?= $firstName ?> <?= $lastName ?></a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <button id="logoutBtn" type="button" class="btn btn-primary me-3">
          Log out
        </button>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->


<script>
// Logout Pressed
document.getElementById('logoutBtn').addEventListener("click", function(){
	// Navigate to Home Page
	window.location.replace("<?= site_url('logout') ?>");
});
</script>

<?php endif; ?>
    </style>