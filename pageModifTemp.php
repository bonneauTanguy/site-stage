<html>  
    <head>  
    <title>Dynamic Drop Down List</title>  
    </head>  
    <body>  
        <form id="form1" name="form1" method="post">
			<?php
				require("fonctionsSQL.php");
				$connexion = connexion ();
				$request = $connexion->prepare("SELECT id_produit, nomProduit from produit;");
				echo '<select name="nomProduit">';
					while ($donnees = $request->fetch())
					{
						echo hdqfbuswdf;
						echo '<option value="'.$donnees['id_produit'].'">'.$donnees['nomProduit'].'</option>';
						
					}
					echo'<option value=4>test</option>';
				echo '</select>';
?>
            <input type="submit" name="Submit" value="Select" />  
        </form>  
    </body>  
</html>  