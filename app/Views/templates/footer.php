
<?php $uri = service('uri'); if($uri->getSegment(1) == 'login' || $uri->getSegment(1) == 'Login' || $uri->getSegment(1) == ''): ?>
	<footer class="bg-dark text-center text-white myFooter">
	  <!-- Grid container -->
	  <div class="container p-4 pb-0">
		<!-- Section: Social media -->
		<section class="mb-4">

		  <!-- Google -->
		  <a class="btn btn-outline-light btn-floating m-1" href="mohamed.khateerr@gmail.com" role="button"
          target="_blank"><i class="fab fa-google"></i
		  ></a>

		  <!-- Linkedin -->
		  <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/mohamed-khaterr/" role="button"
          target="_blank"><i class="fab fa-linkedin-in"></i
		  ></a>

		  <!-- Github -->
		  <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/Mohamed-Khaterr" role="button"
          target="_blank"><i class="fab fa-github"></i
		  ></a>
		</section>
		<!-- Section: Social media -->
	  </div>
	  <!-- Grid container -->

	  <!-- Copyright -->
	  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
		© 2020 Khater
	  </div>
	  <!-- Copyright -->
	</footer>
<?php endif ?>

<!-- End your project here-->

	<!-- MDB -->
    <script type="text/javascript" src="<?= base_url('js/mdb.min.js') ?>"></script>
    
  </body>
</html>
