<?php include("inc/header.inc.php"); ?>

<?php

session_start();
if (isset($_POST['connexion'])){
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  if(!empty($username) AND !empty($password)){
    $requeteSQL = $pdo->prepare("SELECT * FROM profil WHERE identifiant = ? AND mot_de_passe = ?");
    $requeteSQL->execute(array($username, $password));
    $userexist = $requeteSQL->rowCount();
    if($userexist == 1 ){
        $userinfo = $requeteSQL->fetch();
        $_SESSION['id'] = $userinfo['id_profil'];
        $_SESSION['nom_utilisateur'] = $userinfo->identifiant;
        $_SESSION['mot_de_passe'] = $userinfo->mot_de_passe;
        header("Location: profil.php?id=".$_SESSION['id']);
    }
    else {
        $message = 'mauvais identifiant ou mot de passe.';
    }
  }
  else {
       $message = 'Tous les champs doivent être complétés. ';
  }
 
}
?>
<h1 class="box-title">Connexion</h1>
<form class="login" action="" method="post" name="login">
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur"></br></br>
<input type="password" class="box-input" name="password" placeholder="Mot de passe"></br></br>
<input type="submit" value="Connexion " name="connexion" class="box-button">

<a class="nav-link js-scroll-trigger" href="inscription.php">S'inscrire</a>

<?php if (! empty($message)) { ?>
    <p><?php echo $message; ?></p>
<?php } ?>
</form>

<?php include("inc/footer.inc.php"); ?>    