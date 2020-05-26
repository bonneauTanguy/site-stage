
 <form action="Accueil.php" method="get">


  <div class="container">
    <label for="uname"><b>nom utilisateur</b></label>
    <input type="text" placeholder="Entrer utilisateur" name="uname" required>
</br>
</br>
    <label for="psw"><b>mot de passe</b></label>
    <input type="password" placeholder="entrer mdp" name="psw" required>
</br>
</br>
    <button type="submit">Connection</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> se souvenir de moi
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Annuler</button>
    <span class="psw"><a href="#">mod de passe oublié?</a></span>
  </div>
</form> 
<?php
	require("fonctionsSQL.php");
	if (isset($_POST['login'])){
	// $username = stripslashes($_REQUEST['login']); 
	// $username = mysqli_real_escape_string($conn, $login);
	// $password = stripslashes($_REQUEST['mdp']);
	// $password = mysqli_real_escape_string($conn,$mdp);
	$connexion = connexion ();
	$select = '*';
            $from = 'login';
            $where = "login='$login' and mdp='$mdp'";
            $groupBy = null;
            $having = null;
            $orderBy = null;
            $curseurAdherents = select($connexion, $select, $from, $where, $groupBy, $having, $orderBy);
            $result = $curseurAdherents->fetch();
	
	//$rows = mysqli_num_rows($result);
	//if($rows==1){
		// $_SESSION['login'] = $login;
	//}else{
		//$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
?>