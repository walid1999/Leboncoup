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
              
                $requeteSQL = $pdo->prepare("SELECT * FROM annonces WHERE id_annonces = $_GET[id]");
                $requeteSQL->execute();     
                $annonce = $requeteSQL->fetch();

                $_SESSION['idprofil'] = $annonce['id_profil'];

                $reqSQL = $pdo->prepare("SELECT * FROM profil WHERE id_profil = $_SESSION[idprofil]");
                $reqSQL->execute();     
                $userinfo = $reqSQL->fetch();
               
                
                ?>   

                <div class="card">
                        <img src="<?php echo $annonce['img_annonce']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                                <h5 class="card-title"><?php echo $annonce['titre']; ?></h5>
                                <h4 class="card-title"><?php echo $annonce['prix']; ?> € </h4>
                                <h4 class="card-title">Vendeur: <?php echo $userinfo['identifiant']; ?></h4>

                                <p><?php echo $annonce['description']; ?></p> 
                        </div>
                </div> 

        <?php } ?>

</div>