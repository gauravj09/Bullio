 <!DOCTYPE html>
<html lang="en">

  <head>
    <title>Bullio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
	
	<link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  
  
    <?php
		session_start();
		include 'navbar.php';
		include 'addBoard.php';
		include_once 'login.php';

		$conn = new mysqli($hn, $un, $pw, $db);

		// Check Connection
		if ($conn->connect_error) {
			die($conn->connect_error);
		}
		
		if($_SESSION['newreg'] == "true" && !$_SESSION['regmessage'] == "false") {
			echo "
			<div class=\"alert success\">
			  <span class=\"closebtn\">&times;</span>  
			  Registration successful! Welcome to Bullio!
			</div>";
			$_SESSION['regmessage'] = "false";
		}
	
	?>

<br>
<div class="container-fluid"><div class="row justify-content-center">

<?php

		$userID = $_SESSION['userID'];
		$boardList = $conn->query("
			SELECT * 
			FROM boards 
			WHERE userID = '$userID'");
				
			if($boardList->num_rows > 0) {
				while($row = mysqli_fetch_array($boardList)) {
						$boardName = $row["boardname"];
						echo "
						<a href=\"#\" class=\"btn btn-secondary btn-xl board-list\">$boardName</a>";
				}
			}
?>

</div></div>

  
<section class="plusbutton">
  <div class = 'bottom-left'>
        <a href="#" class="btn btn-secondary btn-xl" data-toggle="modal" data-target="#addBoard">+ Add Board 
        </a> 
  </div>
</section>
  

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
  
  </body>
</html>
