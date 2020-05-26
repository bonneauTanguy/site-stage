<?php
	if (isset($_POST['function']))
    {
         if ($_POST['function'] == "sup" && isset($_POST['id']))
         {
			$connexion = connexion();
			sup($connexion,"client","id_client = ". $_POST['id']);
         }
    }
	function connexion ()
	{
		require_once("data/connexion.php");
		$connexion = new PDO($dsn, $username, $password);
		return $connexion;
	}
	
	function sup($connexion, $table, $conditions)
	{
		$requete="DELETE FROM ";
		if ($table)
		{
			$requete .= "$table WHERE ";
		}
		if ($conditions)
		{
			$requete .= "$conditions ;";
		}
		echo("</br> $requete </br> </br>");
		$request = $connexion->prepare($requete);
		$request->execute();
		return $request;
	}
	
	function modif($table,$set,$where)
	{
		
	}
	
	function insert($connexion,$table,$liste,$valeurs)
	{
		// $requete="INSERT INTO $table ("
		// if(is_array($liste))
		// {
			// $nb = count($liste);
				// for ($i = 0; $i < $nb; $i++)
				// {
					// $requete.= " $liste[$i], ";
				// }
				
				// $requete = substr($requete, 0, -2);
		// }
		// else
		// {
			// $requete.= $liste;
		// }
		// $requete.= ") VALUES (";
		// if(is_array($valeurs))
		// {
			// $nb = count($valeurs);
				// for ($i = 0; $i < $nb; $i++)
				// {
					// $requete.= " '$valeurs[$i]', ";
				// }
				
				// $requete = substr($requete, 0, -2);
		// }
		// else
		// {
			// $requete.= $valeurs;
		// }
		// $requete.= ");";
		
		// $request = $connexion->prepare($requete);
		// $request->execute();
	}
	
	function select($connexion, $select, $from, $conditions, $groupby, $having, $orderby)
	{
		$requete="SELECT ";
		if(is_array($select))
		{
			$nb = count($select);
			for ($i = 0; $i < $nb; $i++)
			{
				$requete.= " $select[$i], ";
			}
			
			$requete = substr($requete, 0, -2);
		}
		else
		{
			$requete.= $select;
		}
		
		$requete .=  " From $from ";
		
		if ($conditions)
		{
			$requete .= "WHERE ";
			if(is_array($conditions))
			{
				$nb = count($conditions);
				for ($i = 0; $i < $nb; $i++)
				{
					$requete.= " $conditions[$i], ";
				}
				
				$requete = substr($requete, 0, -2);
			}
			else
			{
				$requete.= $conditions;
			}
		}
		if ($groupby)
		{
			$requete .= "GROUP BY ";
			if(is_array($groupby))
			{
				$nb = count($groupby);
				for ($i = 0; $i < $nb; $i++)
				{
					$requete.= " $groupby[$i], ";
				}
				
				$requete = substr($requete, 0, -2);
			}
			else
			{
				$requete.= $groupby;
			}
		}
		
		if ($having)
		{
			$requete .= "HAVING ";
			if(is_array($having))
			{
				$nb = count($having);
				for ($i = 0; $i < $nb; $i++)
				{
					$requete.= " $having[$i], ";
				}
				
				$requete = substr($requete, 0, -2);
			}
			else
			{
				$requete.= $having;
			}
		}
		
		if ($orderby)
		{
			$requete .= "ORDER BY ";
			if(is_array($orderby))
			{
				$nb = count($orderby);
				for ($i = 0; $i < $nb; $i++)
				{
					$requete.= " $orderby[$i], ";
				}
				
				$requete = substr($requete, 0, -2);
			}
			else
			{
				$requete.= $orderby;
			}
		}
		
		$requete .=";";
		$request = $connexion->prepare($requete);
		$request->execute();
		return $request;
	}
?>