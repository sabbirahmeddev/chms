<?php include('includes/header.php'); ?>

<?php
if(isset($_POST['add'])){
	

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$q = "INSERT INTO users VALUES(NULL,'{$username}','{$password}','manager')";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo dangerMsg('Username already Exists');
	}
	else{
		$user_id = mysqli_fetch_assoc(mysqli_query($dblink, "SELECT * FROM users WHERE username = '{$username}'"))['user_id'];

		$q = "INSERT INTO manager VALUES(NULL,'{$name}','{$phone}','{$email}','{$user_id}')";

		

		$result = mysqli_query($dblink, $q);

		if(!$result){
			echo dangerMsg('There was an error.');
		}
		else{
			echo successMsg('Manager Added Successfully.');
		}
	}
}

?>
<h2>Add Manager</h2>
	<form method="post">
	  <div class="form-group">
	    <label for="name">Manager Name</label>
	    <input type="text" name="name" required class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
	    
	  </div>
	  <div class="form-group">
	    <label for="phone">Phone</label>
	    <input type="text" name="phone" required class="form-control" id="phone" placeholder="Enter Phone">
	  </div>
	<div class="form-group">
	    <label for="email">Email</label>
	    <input type="text" name="email" required class="form-control" id="email" placeholder="Enter Email">
	</div>
	<div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" name="username" required class="form-control" id="username" placeholder="Enter Username">
	</div>
	<div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" name="password" required class="form-control" id="password" placeholder="Enter password">
	</div>
	  <button type="submit" name="add" class="btn btn-primary">Submit</button>
	</form>

<?php include('includes/footer.php'); ?>
