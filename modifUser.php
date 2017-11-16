
<h1> Modification d'un utilisateur </h1>


<form name="modif" method="post">

	<input name="login" type="text" value="<?php echo $_GET["login"]?>">
	<input name="password" type="text" value="<?php echo $_GET["password"]?>">
	<input name="modification" type="submit" value="Modifier">
	
</form>

<?php 

if(isset($_POST["modification"]))
{
	
	$list = array ('login' => $_POST["login"] ,'password' => $_POST["password"]);

	$newFiles = fopen("newUser.csv", "w");
	$newUser = array($_GET["login"] , $_GET["password"]);
	
	if (($OldFile = fopen("user.csv", "r+")) !== FALSE) {
		while (($data = fgetcsv($OldFile, 1000 , ";")) !== FALSE) {
			
			if($data[0] !== $_GET["login"] && $data[1] !== $_GET["password"]) 
			{
				
				$newUser[] = array($data[0] , $data[1]);
				
			}
			
			//Suppression de l'ancien fichier avec les users
			
			//Insertion nouvelle liste dans le nouveau fichier créér
			fputcsv($newFiles, $newUser , ";");
			
		}
		
	
	fclose($newFiles);	
	fclose($OldFile);	
}
	
	

}