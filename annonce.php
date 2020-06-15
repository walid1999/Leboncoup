<?php
session_start();
 if(isset($_SESSION["id"])){
   include("inc/header.log.inc.php");
 }
 else{
   include("inc/header.inc.php");
 }

?>

<div class="starter-template"> 

        <?php if (!empty($_GET)) { ?>

                <?php
                //******************************************* */
                // Selection
                $requeteSQL = $pdo->prepare("SELECT * FROM annonces WHERE id_annonces = $_GET[id]");
                $requeteSQL->execute();     
                $userinfo = $requeteSQL->fetch()
               
                //******************************************* */
                ?>   

                <div class="card">
                        <img src="<?php echo $userinfo['img_annonce']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                                <h5 class="card-title"><?php echo $userinfo['titre']; ?></h5>
                                <h4 class="card-title"><?php echo $userinfo['prix']; ?> € </h4>
                                <p><?php echo $userinfo['description']; ?></p> 
                        </div>
                </div> 

        <?php } ?>

</div>