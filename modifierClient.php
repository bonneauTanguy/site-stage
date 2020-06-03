<html>  
    <head>  
    <title>Modifier Clients</title>  
    </head>  
    <body>  
        <form id="form1" name="form1" method="post">
			<?php
				require("fonctionsSQL.php");
				$connexion = connexion ();
				$request = $connexion->query("SELECT * from client;");
				echo '<select name="nomProduit">';
					while ($donnees = $request->fetch())
					{
						echo '<option value="'.$donnees['id_client'].'">'.$donnees['nomClient'].'</option>';
						
					}
				echo '</select>';
			?>
            <input type="submit" name="Submit" value="Select" />  
			</br>
			<label>Nom du client</label>
			<input type="text" class="form-control" name="nom" value="" required>
			</br>
			<label>Prénom du client</label>
			<input type="text" class="form-control" name="prenom" value=""required>
			</br>
			<label>Téléphone1 du client</label>
			<input type="text" class="form-control" name="tel1" value="">
			</br>
			<label>Téléphone2 du client</label>
			<input type="text" class="form-control" name="tel2" value="">	
			</br>
			<label>Type du client</label>
			<select name="type" class="form-control">
				<option value="1">Homme</option>
				<option value="2">Femme</option>
				<option value="3">Enfant</option>
			</select>
			</br>
			<label >Taille de la coupe</label>
			<input type="text" class="form-control" name="taille" value="">
			</br>
			<label>Couleur teinture</label>
			<input type="text" class="form-control" name="couleur" value="">
			
			</br>
        </form> 
    </body>  
</html>  