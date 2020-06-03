<html>  
    <head>  
    <title>Modifier produit</title>  
    </head>  
    <body>  
        <form id="form1" name="form1" method="post">
			<?php
				require("fonctionsSQL.php");
				$connexion = connexion ();
				$request = $connexion->query("SELECT * from produit");
				echo '<select name="nomProduit">';
					while ($donnees = $request->fetch())
					{
						echo '<option value="'.$donnees['id_produit'].'">'.$donnees['nomProduit'].'</option>';
					}
				echo '</select>';
				if (isset($_GET["selection"])) {
				//$resultList = $connexion->prepare("SELECT * from produit where id_produit='$resultList'");
				$resultList = $connexion->prepare('SELECT * FROM produit WHERE id_produit = ?');
				$resultList->execute(array($_GET['id_produit']));
				var_dump($resultList)
				}
			?>
			<button type="submit" class="btn btn-primary" id="GET_produit" name="selection">select</button>
			</br>
			<label>Nom du produit</label>
			<input type="text" class="form-control" name="nomProduit" value="<?php echo $resultList['nomProduit']; ?>" required>
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
			<button type="submit" class="btn btn-primary" id="ste" name="ste" value="update">Modifier</button>
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
				$request = $connexion->prepare("UPDATE produit SET nomProduit='$nom', tarifAchatHT='$achatHT', tarifReventeTTC, fournisseur='$nomFournisseur', stock='$enStock'");
				$request->execute();
				$connexion = null;
				echo("Produit modifié");
			}
			?>
			
        </form> 
    </body>  
</html>  