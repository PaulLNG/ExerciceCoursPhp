<center>
<?php 

session_start();

echo "Bonjour ".$_SESSION["login"]; 

?>

<table name="user" width="80%" border="1">
	<tr>
		<td> Login </td>
		<td> Mot de passe </td>
		<td> Actions </td>
<?php
if (($handle = fopen("user.csv", "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000 , ";")) !== FALSE) {	
		
            echo "<tr>
				 <td>". $data[0] . "</td> " . 
				 "<td>" . $data[1] . "</td>
				 <td> 
				 <a href='modifUser.php?login=".$data[0]."&password=".$data[1]."'> <button type='button'> Modifier </button> </a> 
				 <a href='supprimerUser.php?login=".$data[0]."&password=".$data[1]."'> <button type='button'> Supprimer </button> </a>
				 </td>
			</tr>
			<br/>\n "; 
        	
			
	}
	fclose($handle);
		
	}
	

?> 

</table>
</form>
<br> 


<form method="post" name="deco">
	
	<input type="submit" name="deconnexion" value="Se déconnecter">

</form>

</center>
<?php 

if(isset($_POST["deconnexion"]))
{
	session_destroy();
	
	session_start();
	$_SESSION["deconnexion"]= "ok";
	header('Location: index.php');
	
}
