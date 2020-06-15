

<?php
session_start();
 if(isset($_SESSION["id"])){
   include("inc/header.log.inc.php");
 }
 else{
   include("inc/header.inc.php");
 }

?>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
      <div class="leboncoup">
        <h1 href="titre" class="mb-0">LeBonCoup</h1>
      </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="annonce">
      <div class="w-100">
        <h2 class="mb-5">Annonce</h2>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
          <img class="img" src="img/voiture.jpg" href="voiture">
          <p>voiture</p>
          <img class="img" src="img/maison.jpg" href="maison">
          <p>maison</p>
          <img class="img" src="img/chien.jpg" href="chien ">
          <p>chien</p>
       
    </section>

    

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>