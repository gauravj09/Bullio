<div class="modal fade" id="addBoard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="table modal-dialog">
        <div class="table-cell">
            <div class="modal-dialog">
                <div class="modal-content">
					<form class="modal-content animate" action="boards.php" method="post">
						<div class="modal-header">
						   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">&times;</span>
						   </button>
						</div>
						<div class="modal-body">
						   <div class="md-form">
							  <i class="fas fa-envelope prefix grey-text"></i>
							  <input class="form-control" name="boardName" placeholder="Board Name" required autofocus>
						   </div>
						</div>
						<div class="modal-footer d-flex justify-content-center">
							<button class="btn btn-secondary" type="submit">Add Board</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		include_once 'login.php';

		$conn = new mysqli($hn, $un, $pw, $db);

		// Check Connection
		if ($conn->connect_error) {
			die($conn->connect_error);
		}

		$boardName = $_POST['boardName'];
		$userID = $_SESSION['userID'];

		$conn->query("
				INSERT INTO `boards` (`boardname`, `userID`)
				VALUES ('$boardName', '$userID')");

								
	}
	
	
	
	?>