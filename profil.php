<?php include("inc/header.log.inc.php") ?>

<?php

session_start();

if(isset($_SESSION["id"])){

  $getid = intval($_SESSION["id"]);
  $requeteSQL = $pdo->prepare("SELECT * FROM profil WHERE id_profil = ?");
  $requeteSQL->execute(array($getid));
  $userinfo = $requeteSQL->fetch();
  if (isset($_POST['deconnexion'])){
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
  }elseif(isset($_POST['editer'])){
    header('Location: editerprofil.php');
  }

?>  
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="annonce">
      <div class="profil">
        
      <a class="navbar-brand js-scroll-trigger" href="index.php">         
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo $userinfo['img'];?>" alt="">
        </span>
        </a>

        <h1 class="box-title">Profil : <?php echo $userinfo['identifiant']; ?> </h1>
        <p class="profil">Prénom : <?php echo $userinfo['prenom']; ?></p>
        <p class="profil">Nom : <?php echo $userinfo['nom']; ?></p>
        <p class="profil">Mail : <?php echo $userinfo['mail']; ?></p>

        <form class="login" action="" method="post" name="login">
        <input type="submit" value="Editer profil " name="editer" class="box-button">
        <input type="submit" value="Se deconnecter " name="deconnexion" class="box-button">
        </form>


    

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
          
       
    </section>

<?php 
  }
else {
  header("Location: login.php");
    } ?>