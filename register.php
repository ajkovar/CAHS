<?php
include('./modules/wrappers/header-no-login.php');
require_once('./modules/autoload.php');
if(isset($_POST['submitted'])) {
	// note validation SHOULD occur here, but this is outside the scope of this project	
	$fn=trim($_POST['first']);
	$ln=trim($_POST['last']);
	$un=trim($_POST['username']);
	$pw=trim($_POST['password']);
	$ut=trim($_POST['usertype']);
	
	require_once('./modules/mysql_connect.php');
	
	// check if this username is already taken (ok.. we'll perform some validation)
	$q = "SELECT id FROM users where username='$un';";
	
	$r = @mysql_query($q);
	
	if(@mysql_num_rows($r)<=0)
	{	
	
		$q = "INSERT INTO users (first_name, last_name, username, password, user_type) values('$fn', '$ln', '$un','$pw','$ut');";
		
		$r = @mysql_query($q);	
		
		if($r) {
			$q = "SELECT id FROM users where username='$un';";
	
			$r = @mysql_query($q);
			
			$row = @mysql_fetch_assoc($r);
  			
  			$id=$row['id'];
			
			// save this user to the session so their data can be accessed later (in other words, log them in)
			if($ut=='C')
  				$_SESSION['user']= serialize(new Customer($id, $un, $fn, $ln));
  			else $_SESSION['user']= serialize(new Mechanic($id, $un, $fn, $ln));
									
			echo "<div class='infoBox'><h2>Welcome " . $fn . "!</h2> Thank you for signing up with us!  Now you can start to pay us ";
			echo "money!<br /><br /><a href='index.php'>Click here to return to the home page.</a></div>";
			include('./modules/wrappers/footer.html');
			mysql_close($dbc);
			exit();
		}
		else echo "<div class='infoBox'><h2>Register</h2><div style='color:#b22;'>Sorry! Your data is no good. Our engineer's didn't bother to do any validation so you'll have to figure out why.</div>";
	}
	else echo "<div class='infoBox'><h2>Register</h2><div style='color:#c22;'>Username is already taken. Please choose another.</div><br />";
}
else 	echo "<div class='infoBox'><h2>Register</h2><br><p>Sign up today for all the great benefits of being a member.</p>";
?>		
				<form action="register.php" method="post" name="login">
					<table>	
						<input type="hidden" name="submitted" value="true" />				
						<tr><td>First name:</td><td> <input name="first" /></td></tr>
						<tr><td>Last name:</td><td> <input name="last" type="text" /></td></tr>
						<tr><td>Username: </td><td><input name="username" type="text" /></td></tr>
						<tr><td>Password:</td><td><input name="password" type="password" /></td></tr>
						<tr><td>Member Type:*</td><td>
						<select name="usertype" style="width:120px;"><option value="C"> Customer </option><option value="M"> Mechanic </option></select>					
						</td></tr>
						<tr ><td colspan='2' style="padding-top:15px;"><input style="width:100px;" type='submit' value="Register" /></td></tr>
					 
					</table> 
					
				</form>
				<p id="smallnote">*The staff at Chicago Auto Hobby shop would like to acknowledge that a real website would not
					allow random people to come in and sign up to be a mechanic.</p>					
			</div>			

<?php
include('./modules/wrappers/footer.html');
?>