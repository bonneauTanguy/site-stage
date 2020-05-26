<form method="post">
  <table class="loginTable">
     <tr>
      <th>connexion</th>
     </tr>
     <tr>
      <td>
        <label class="firstLabel">nom d'utilisateur:</label>
        <input type="text" name="username" id="username" value="" autocomplete="off" />
      </td>
     </tr>
     <tr>
      <td><label>mot de passe:</label>
        <input type="password" name="password" id="password" value="" autocomplete="off" /></td>
     </tr>
     <tr>
      <td>
         <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" />
         <span class="loginMsg"><?php echo @$msg;?></span>
      </td>
     </tr>
  </table>
</form>

<?php 
session_start();
include("fonctionsSQL.php");
?>
<?php
$msg = "";
if(isset($_POST['submitBtnLogin'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['username']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `login` where `login`=$username and `mdp`=$password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('login', $username, PDO::PARAM_STR);
      $stmt->bindValue('mdp', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
	  header('location:Accueil.php');
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
        $_SESSION['sess_user_id']   = $row['uid'];
        $_SESSION['sess_user_name'] = $row['username'];
        $_SESSION['sess_name'] = $row['name'];
      } else {
        $msg = "nom d'utilisateur ou mot de passe incorrect";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Tous les champs doivent être remplis";
  }
}
?>