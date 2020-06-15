<?php include("inc/header.log.inc.php") ?>

<?php
session_start();

if(isset($_SESSION["id"])){ 
     $getid = intval($_SESSION["id"]);
     $requeteSQL = $pdo->prepare("SELECT * FROM profil WHERE id_profil = ?");
     $requeteSQL->execute(array($getid));
     $user = $requeteSQL->fetch();

    if (isset($_POST['editer'])) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $mail = htmlspecialchars($_POST['mail']);
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $motdepasse = htmlspecialchars($_POST['mot_de_passe']);

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
       

        $requeteSQL = $pdo->prepare("UPDATE profil SET prenom = ?, nom= ?, mail= ?, identifiant= ?, mot_de_passe= ?, img= 'img/$name' WHERE id_profil = ?");
        $requeteSQL->execute(array($prenom, $nom, $mail, $identifiant, $motdepasse, $getid));
        
        header('Location: profil.php');

    }

?>

<h1 class="box-title">Editer le profil</h1>
<form class="inscription" action="" method="post" name="editer" enctype='multipart/form-data'>
  <div class="form-group">
    <h5 for="text">Nom</h5>
    <input type="text" class="form-control" value="<?php echo $user['nom']; ?>" name="nom" id="">
  </div>
  <div class="form-group">
    <h5 for="text">Prénom</h5>
    <input type="text" class="form-control" value="<?php echo $user['prenom']; ?>" name="prenom" id="">
  </div>
  <div class="form-group">
    <h5 for="text">identifiant</h5>
    <input type="text" class="form-control" value="<?php echo $user['identifiant']; ?>" name="identifiant" id="">
  </div>
 
  <div class="form-group">
    <h5 for="text">Mail</h5>
    <input type="email" class="form-control" value="<?php echo $user['mail']; ?>" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <h5 for="text">Mot de passe</p></h5>
    <input type="text" class="form-control"  name="mot_de_passe" id="">
  </div>

  <div class="form-group">
            <label for="titre">Photo</label>
            <input type="file" class="form-control-file" id="img" name="img[]">
  </div>
  <button type="submit" name="editer" class="btn btn-primary">Modifier </button>
</form>

<?php }
    else{
        header('Location: login.php');
    } ?>
