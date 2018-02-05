<?php
		session_start();
		include "log.inc.php";
		
		$user = $_POST["user"];
		$passwort = $_POST["password"];
	
		//Wahl des Usernamens
		$log_user = mysqli_query($con, "SELECT Username FROM user_registration WHERE `Username` = '$user'");
		$log_user_array = mysqli_fetch_assoc($log_user);
	
		// Korrektes Passwort
		$log_password = mysqli_query($con, "SELECT password FROM user_registration WHERE `Username` = '$user'");
		$log_password_array = mysqli_fetch_assoc($log_password);
		
		if($user == $log_user_array["Username"] and $passwort == $log_password_array["password"]){
			$_SESSION["Username"] = $user;
				$verhalten = 1;
			} else {
				$verhalten = 2;
			}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>EDIANA</title>
	<meta charset="UTF-8"/>
	<?php if ($verhalten == 1) {
	echo "<meta http-equiv='refresh' content='1; URL=index.php' />";}
	?>
	<link rel="stylesheet" href="../../../../../Users/kathi/LRZ%20Sync+Share/Serverseitig/alt/INCLUDES/styles.css"/>
 
</head>
<body class="body_external">
	<div class="main_wrap">
	
	<div class="picture">
		<img src="../../../../../Users/kathi/LRZ%20Sync+Share/Serverseitig/alt/PICTURES/anitta_external.jpg" />
	</div>
	
	<div>
		<img style="position: fixed; left: 10px; top: 10px; width: 10%; min-width: 140px" src="../../../../../Users/kathi/LRZ%20Sync+Share/Serverseitig/alt/PICTURES/logo-LMU.gif" />
	</div>	
	
	<div>
		<img style="position: fixed; left: 10px; bottom: 10px; width: 15%; min-width: 140px" src="../../../../../Users/kathi/LRZ%20Sync+Share/Serverseitig/alt/PICTURES/logo-DFG.gif" />
	</div>
	
	<div class="login_div">
	
	<?php if ($verhalten == 1) { echo "Login successfull...";}
				else if ($verhalten == 2) { ?>
								<span style="margin-left: -5%;">Please insert the correct Username or Password...</span>
								<form autocomplete="off" method="post" action="login.php">
								<input type="text" class="login_field" name="user" placeholder="User" /><br/>
								<input type="password" class="login_field" name="password" placeholder="Password" /><br/>
								<input type="submit" class="login_button" value="Login" class="pure-button" /><br/>
								<input type="reset" class="login_button" value="Reset" /><br/>
								</form>
				<?php } ?>

	
	</div>
	
	
	</div>
</body>

</html>	