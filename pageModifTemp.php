<html>  
    <head>  
    <title>Modifier produit</title>  
    </head>  
    <body> 
		
        <form id="form1" name="form1" method="post">
			<?php
				print_r($_POST);
				$id = $_POST['id_produit'];
			?>
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
			<button type="submit" class="btn btn-primary" id="ste" name="ste" value="update">Modifier </button>
			</br>
			
			<?php
			if(array_key_exists('ste',$_POST))
			{
				$nom = $_POST["nomProduit"];
				$achatHT =$_POST["tarifHT"];
				$reventeTTC = $_POST["tarifTTC"];
				$nomFournisseur = $_POST["fournisseur"];
				$enStock = $_POST["stock"];
				$id = $_POST["type"];
				require("fonctionsSQL.php");
				$connexion = connexion ();
				$request = $connexion->prepare("UPDATE produit SET nomProduit='$nom', tarifAchatHT='$achatHT', tarifReventeTTC='$reventeTTC', fournisseur='$nomFournisseur', stock='$enStock' WHERE id_produit='$id'");
				$request->execute();
				$connexion = null;
				echo("Produit modifié");
			}
			?>
			
        </form> 
    </body>  
</html>  