<?php
	//"" vahele input elemendi NAME
	//echo $_POST ["email"];
	//echo $_POST ["password"];
	//ERRORid
	$email_error= "";
	$password_error="";
	$name_error="";
	$new_email_error="";
	$new_password_error="";
	
	//väärtustega muutujad
	$email="";
	$password="";
	$name="";
     
	//kontrolli ainult siis kui kasutaja vajutab login nuppu.
	if($_SERVER["REQUEST_METHOD"] == "POST"){
 
		//kontrollin kas muutuja $_POST["login"]; ehk login nupp on olemas
		if(isset($_POST["login"])){
						//kontrollime kasutaja emaili, et see pole tühi.
				if(empty($_POST ["email"])) {
					$email_error= "See on kohustuslik väli";
				} else {
					
					//annan väärtuse
					$email=test_input($_POST["email"]);
				}
		
		
				
				//kontrollime kasutaja parooli, et see pole tühi.
					if(empty($_POST ["password"])) {
						$password_error= "See on kohustuslik väli";
					} else {
						$password=test_input($_POST["password"]);
					}
					
					if($password_error == "" && $email_error == ""){
						//erroreid ei olnud
						echo "Kontollin  ".$email." ".$password;
					}
		}
	}
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(isset($_POST["create"])){				
				//loomisel emaili kontroll
					if(empty($_POST ["new_email"])) {
						$new_email_error= "See on kohustuslik väli";
					} else {
					}
				
				//loomisel parooli kontroll
					if(empty($_POST ["new_password"])) {
						$new_password_error= "See on kohustuslik väli";
					} else {
				//parool ei ole tühi, kontrollime pikkust
					if(strlen($_POST ["password"]) < 6){
						$new_password_error="Parool peab olema vähemalt 6 sümbolit pikk";
					}
					}
				
				//kasutajanime kontroll 
					if(empty($_POST ["name"])) {
						$name_error= "Palun sisesta oma kasutajanimi";
					} else {
					}
				}
			}
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
?>

<?php
	//lehe nimi
	$page_title="Login leht";
	
	//faili nimi
	$page_file_name="login.php";
?>

<?php require_once ("../header.php"); ?>


		<h2>Login</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input name="email" type="text" placeholder="E-mail" value="<?php echo $email; ?>">* <?php echo $email_error; ?> <br><br>
			<input name="password" type="password" placeholder="password">* <?php echo $password_error; ?><br><br>
		<input name="login" type="submit" value="Log in">
		</form>
		
		<h2>Create user</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input name="email" type="text" placeholder="E-mail" value="<?php echo $email; ?>">* <?php echo $new_email_error; ?> <br><br>
			<input name="password" type="password" placeholder="password">* <?php echo $new_password_error; ?><br><br>
			<input name="name" type="text" placeholder="Kasutajanimi" >* <?php echo $name_error; ?> <br><br>
			<input name="create" type ="submit" value="Create user">
		</form>

		
		
<?php require_once ("../footer.php"); ?>