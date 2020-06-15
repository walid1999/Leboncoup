<?php
session_start();
 if(isset($_SESSION["id"])){
   include("inc/header.log.inc.php");
 }
 else{
   include("inc/header.inc.php");
 }

?>


<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="annonce">
        <div class="w-100">
        <h2 class="mb-5">annonces</h2>

<?php
        $requeteSQL = $pdo->prepare("SELECT * FROM annonces ");
        $requeteSQL->execute();
        while ($userinfo = $requeteSQL->fetch()) { ?>

        <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
          <img class="img" src="<?php echo $userinfo['img_annonce'];?>" >
          <p><?php echo $userinfo['titre']?>  <br>  <?php echo $userinfo['prix']; ?>€</p>
          <a href="annonce.php?id=<?php echo $userinfo['id_annonces']; ?>" class="btn btn-primary">Voir détail</a>
          
        </div>  
         
       
  


    <?php }
//******************************************* */
?>
  </section>

  