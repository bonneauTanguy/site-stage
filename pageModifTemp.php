<html>  
    <head>  
    <title>Modifier produit</title>  
    </head>  
    <body>  
        <form id="form1" name="form1" method="post">
			<?php
				require("fonctionsSQL.php");
				$connexion = connexion ();
				$request = $connexion->query("SELECT * from produit;");
				echo '<select name="nomProduit">';
					while ($donnees = $request->fetch())
					{
						echo '<option value="'.$donnees['id_produit'].'">'.$donnees['nomProduit'].'</option>';
						
					}
				echo '</select>';
			?>
            <input type="submit" name="Submit" value="Select" />  
			</br>
			<label>Nom du produit</label>
			<input type="text" class="form-control" name="nomProduit" value="" required>
			</br>
			<label>Tarif achat HT</label>
			<input type="text" class="form-control" name="tarifHT" value=""required>
			</br>
			<label>Tarif revente TTC</label>
			<input type="text" class="form-control" name="tarifTTC" value="">
			</br>
			<label>Fournisseur</label>
			<input type="text" class="form-control" name="fournisseur" value="">	
			</br>
			<label >Stock</label>
			<input type="text" class="form-control" name="stock" value="">
			</br>
        </form> 
    </body>  
</html>  