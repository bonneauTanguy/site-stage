<html>  
    <head>  
    <title>Drop Down List</title>  
    </head>  
    <BODY>  
        <form id="form1" name="form1" method="post">
			<?php
				require("fonctionsSQL.php");
				$connexion = connexion ();
				$reponse = mysql_query("SELECT * from produit");
				echo '<select name="nomProduit">';
					while ($donnees = mysql_fetch_array($reponse) )
					{
						echo '<option value="'.$donnees['id_produit'].'">'.$donnees['nomProduit'].'</option>';
						
					}
				echo '</select>';

            <input type="submit" name="Submit" value="Select" />  
        </form>  
    </body>  
</html>  