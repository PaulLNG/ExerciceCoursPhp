<?php 

require("functions.php");

?>

<center> <h1> Formulaire de connexion </h1>


<form name="connect" method="POST">

<input type="Text" name="login" placeholder="Login"> <br>
<input type="password" name="password" placeholder="Mot de passe"> <br><br>
<input type="submit" name="connexion" value="Connexion"> 

</form>

<?php 

if(isset($_POST["connexion"]) )
{
	if(UserExiste($_POST["login"] , $_POST["password"]) === true)
	{
		session_start();
		$_SESSION["login"] = $_POST["login"];
		$_SESSION["password"] = $_POST["password"];
		header('Location: profil.php');
	}
	else
	{
		echo "Identifiant incorrect. Veuillez rééssayer.";
	}
}

?>

<h1> Ajout d'un utilisateur </h1>


<form name="ajout" method="POST">

<input type="Text" name="loginAjout" placeholder="Login"> <br>
<input type="password" name="passwordAjout" placeholder="Mot de passe"> <br><br>
<input type="submit" name="ajoutUser" value="Ajouter"> 

</form>

<?php 

if(isset($_POST["ajoutUser"]))
{
	
	$list = array (
	   array('login' => $_POST["loginAjout"] ,'password' => $_POST["passwordAjout"])
	   );

	$fp = fopen('user.csv', 'a+');

	foreach ($list as $fields) {
		fputcsv($fp, $fields , ";");
		 
	}

	fclose($fp);
	
	echo "L'ajout a été effectuer";
}
?> 

</center>

<?php 

session_start();
if(isset($_SESSION["deconnexion"]))
{
	echo "<script>alert('Déconnexion réussi !');</script>";
	session_unset($_SESSION["deconnexion"]);
}
