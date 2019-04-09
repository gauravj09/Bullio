 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Bullio</a>
  <button
	class="navbar-toggler"
	type="button"
	data-toggle="collapse"
	data-target="#navbarSupportedContent"
	aria-controls="navbarSupportedContent"
	aria-expanded="false"
	aria-label="Toggle navigation"
  >
	<span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
	  <li class="nav-item active">
		<a class="nav-link" href="about.php">About</a>
	  </li>
	</ul>
	
<?php
	
	if(!isset($_SESSION['user'])) { 
	
?>

<ul class="nav navbar-nav navbar-right">
  <li class="nav-item">
	<a class="nav-link navbar-right" href="" class="btn btn-default btn-rounded mb-4" 
		data-toggle="modal" data-target="#modalLoginForm">Login</a>
  </li>
  <li class="nav-item">
	<a class="nav-link navbar-right" href="" class="btn btn-default btn-rounded mb-4" 
		data-toggle="modal" data-target="#modalRegisterForm">Register</a>
  </li>
</ul>

<?php
	} else {
?>
	
<ul class="nav navbar-nav navbar-center">
  <li class="nav-item active">
	<a class="nav-link" href="boards.php">Boards</a>
  </li>
</ul>
	
<ul class="nav navbar-nav navbar-right">
  <li class="nav-item active">
	<a class="nav-link" href="account.php">Account</a>
  </li>
  <li class="nav-item active">
	<a class="nav-link" href="logout.php">Logout</a>
  </li>
</ul>
	
<?php
}
?>
	
  </div>
</nav>