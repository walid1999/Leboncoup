<?php include("inc/header.inc.php"); ?>

<?php
session_start();
 if(isset($_SESSION["id"])){
   include("inc/header.log.inc.php");
 }
 else{
   include("inc/header.inc.php");
 }

 $annonce = $pdo->query('SELECT * FROM annonces ORDER BY id_annonces DESC');
if(isset($_POST['q']) AND !empty($_POST['q'])) {
   $q = htmlspecialchars($_POST['q']);
   $annonce = $pdo->query('SELECT * FROM annonces WHERE titre LIKE "%'.$q.'%" ORDER BY id_annonces DESC');
   if($annonce->rowCount() == 0) {
      $annonce = $pdo->query('SELECT * FROM annonces WHERE CONCAT(titre, prix) LIKE "%'.$q.'%" ORDER BY id_annonces DESC');
   }
}
?>
<div align="center">
<h1 >Leboncoup</h1>
<nav class="nav justify-content-center p-5">
  <form class="form-inline " method="post">
    <input name="q" class="form-control mr-sm-2 text-center" type="search" placeholder="Recherche..." aria-label="Search">
    <button name="search" class="btn btn-primary my-2 my-sm-0 " type="submit"><i class="fas fa-search"></i></button>
  </form>
</nav>
</div>
<h3 class="m-5">Annonces</h3>
<?php
  
    if($annonce->rowCount() > 0) { ?>
   
   <?php while($a = $annonce->fetch()) { ?>
    <div class="resume-item  m-5 row justify-content-center">
          <div class="resume-content ">
            <img class="img" src="<?php echo $a['img_annonce'];?>" >
            <p><?php echo $a['titre'];?>  <br>  <?php echo $a['prix']; ?>€</p>
            <a href="annonce.php?id=<?php echo $a['id_annonces']; ?>" class="btn btn-primary">Voir détail</a>
          </div>  
   </div>
   <?php } ?>
   
<?php } else { ?>
Aucun résultat pour: <?php $q ?>...
<?php } 
  
?>



    
