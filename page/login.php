<?php
//"" vahele input elemendi NAME
echo $_POST ["email"];
	//echo $_POST ["password"];
	
	$email_error= "";
	
     
//kontrolli ainult siis kui kasutaja vajutab login nuppu.
	if($_SERVER["REQUEST_METHOD"] == "POST"){
 
		//kontrollime kasutaja emaili, et see pole tühi.
			if(empty($_POST ["email"])) {
				$email_error= "See on kohustuslik väli";
			}
	}
	
	$password_error="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
 
		//kontrollime kasutaja parooli, et see pole tühi.
			if(empty($_POST ["password"])) {
				$password_error= "See on kohustuslik väli";
			} else {
				//parool ei ole tühi, kontrollime pikkust
				if(strlen($_POST ["password"]) < 6){
					$password_error="Peab olema vähemalt 6 sümbolit pikk";
				}
			}
	}
	
?>

<?php
	//lehe nimi
	$page_title="Login leht";
	
	//faili nimi
	$page_file_name="home.php";
?>

<?php require_once ("../header.php"); ?>



		<h2>Login</h2>
		<form action="user_form.php" method="post">
		<input name="email" type="text" placeholder="E-mail">* <?php echo $email_error; ?> <br><br>
		<input name="password" type="password" placeholder="password">* <?php echo $password_error; ?><br><br>
		
		<input type="submit" value="Log in">
		</form>
		<h2>Create user</h2>
		
<?php require_once ("../footer.php"); ?>
