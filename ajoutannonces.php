<?php include("inc/header.log.inc.php") ?>

<?php
session_start();

if(isset($_SESSION["id"])){ 

    
    

   if (isset($_POST['ajoutannonce'])) {
       $titre = htmlspecialchars($_POST['titre']);
       $prix = htmlspecialchars($_POST['prix']);
       $description = htmlspecialchars($_POST['description']);
       
       $getid = intval($_SESSION["id"]);

        $name = "";
       if (!empty($_FILES)) {
         foreach ($_FILES["img"]["error"] as $key => $error) {
           if ($error == UPLOAD_ERR_OK) {
               $tmp_name = $_FILES["img"]["tmp_name"][$key];
               $name = basename($_FILES["img"]["name"][$key]);
               move_uploaded_file($tmp_name, "img/$name");
           }
         }
       }
      

       $requeteSQL = $pdo->prepare("INSERT INTO annonces (titre, prix, description, img_annonce, id_profil) VALUES (?, ?, ?, 'img/$name', ?)");
       $requeteSQL->execute(array($titre, $prix, $description, $getid));
       echo "une annonce a été mise en ligne ";
       

    }

 ?>   

<h1 class="box-title">Ajouter une annonce</h1>
<form class="inscription" action="" method="post" name="ajoutannonces" enctype='multipart/form-data'>
  <div class="form-group">
    <h5 for="text">Titre</h5>
    <input type="text" class="form-control" name="titre" id="">
  </div>
  <div class="form-group">
    <h5 for="text">Prix</h5>
    <input type="text" class="form-control" name="prix" id="">
  </div>
  <div class="form-group">
    <h5 for="text">Description</h5>
    <textarea rows="10" class="form-control" id="description" name="description"></textarea>
  </div>
  <div class="form-group">
            <label for="titre">Photo</label>
            <input type="file" class="form-control-file" id="img" name="img[]">
  </div>
  
  
  <button type="submit" name="ajoutannonce" class="btn btn-primary">Ajouter</button>
</form>

<?php }
    else{
        header('Location: login.php');
    } ?>