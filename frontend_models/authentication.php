 <?php
 
	$_SESSION['emailused'] = "false";
	$_SESSION['badcred'] = "false";
	$_SESSION['passver'] = "false";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		include_once 'login.php';
		
		// Salt Password
		$salt1    = "qm&h*";
		$salt2    = "pg!@";
		$email = $_POST['email'];
		$password = sanitizeString($_POST['password']);
		$vpassword = sanitizeString($_POST['vpassword']);
		$saltPW = hash('ripemd128', "$salt1$password$salt2");

		$conn = new mysqli($hn, $un, $pw, $db);

		// Check Connection
		if ($conn->connect_error) {
			die($conn->connect_error);
		}
		
		// If Logging In:
		if($_POST['vpassword'] == "") {
			$userCheck = $conn->query("
						SELECT * 
						FROM userdata 
						WHERE email = '$email' 
						AND password = '$saltPW'");
				
			if($userCheck->num_rows > 0) {
				// If Credentials Verified, Redirect to Boards Page
				$_SESSION['user'] = $email;
				while($row = mysqli_fetch_array($userCheck)) {
						$userID = $row["userID"];
				}
				$_SESSION['userID'] = $userID;
				echo '<meta http-equiv="refresh" content="0; URL=boards.php">';
			}
			else {
				// If Wrong Credentials, Display Error
				$_SESSION['badcred'] = "true";
			}
		}
		
		// If Registering:
		else {
			$emailCheck = $conn->query("
						SELECT * 
						FROM userdata 
						WHERE email = '$email'");
						
			if($emailCheck->num_rows > 0) {
				$_SESSION['emailused'] = "true";
			}
			else {
				if($password == $vpassword) {
					$register = $conn->query("
								INSERT INTO `userdata`(`email`, `password`, `isadmin`) 
								VALUES ('$email', '$saltPW', '0')");
							
					if($register) {
						$_SESSION['user'] = $email;
						
						$userCheck = $conn->query("
							SELECT * 
							FROM userdata 
							WHERE email = '$email' 
							AND password = '$saltPW'");
							
						while($row = mysqli_fetch_array($userCheck)) {
								$userID = $row["userID"];
						}
						
						$_SESSION['userID'] = "$userID";
						$_SESSION['newreg'] = "true";
						echo '<meta http-equiv="refresh" content="0; URL=boards.php">';
					}
				}
				else {
					$_SESSION['passver'] = "true";
				}
			}
		}
	}
	
	if($_SESSION['emailused'] == "true") {
		echo "
		<div class=\"alert\">
		  <span class=\"closebtn\">&times;</span>  
		  <strong>Error:</strong> There is already an account associated with this email.
		</div>";
	}
	elseif($_SESSION['badcred'] == "true") {
		echo "
		<div class=\"alert\">
		  <span class=\"closebtn\">&times;</span>  
		  <strong>Error:</strong> Email or password incorrect. Please enter again.
		</div>";
	}
	elseif($_SESSION['passver'] == "true") {
		echo "
		<div class=\"alert\">
		  <span class=\"closebtn\">&times;</span>  
		  <strong>Error:</strong> Passwords do not match. Please enter again.
		</div>";
	}
	
	function sanitizeString($var) {
		$var = stripslashes($var);
		$var = strip_tags($var);
		$var = htmlentities($var);
		return $var;
	}
?>