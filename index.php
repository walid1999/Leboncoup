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

<form method="post">
   <input type="search" name="q" placeholder="Recherche..." />
   <input type="submit" name="search" value="Valider" />
</form>
</div>
<?php
  if (isset($_POST['search'])){
    if($annonce->rowCount() > 0) { ?>
   
   <?php while($a = $annonce->fetch()) { ?>
    <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="resume-content">
          <img class="img" src="<?php echo $a['img_annonce'];?>" >
          <p><?php echo $a['titre'];?>  <br>  <?php echo $a['prix']; ?>€</p>
          <a href="annonce.php?id=<?php echo $a['id_annonces']; ?>" class="btn btn-primary">Voir détail</a>
          
        </div>  
   <?php } ?>
   
<?php } else { ?>
Aucun résultat pour: <?php $q ?>...
<?php } 
  }
?>



    
