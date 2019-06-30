<?php ob_start();?>
<?php include('includes/header.php'); ?>

<?php
if(isset($_POST['add'])){

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];

	$q = "INSERT INTO client VALUES(NULL,'{$name}','{$phone}','{$address}','{$email}')";

	$result = mysqli_query($dblink, $q);

	if(!$result){
		echo dangerMsg('There was an error.');
	}
	else{
		$client = mysqli_query($dblink,"SELECT `AUTO_INCREMENT` as client_id FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'chbs' AND   TABLE_NAME   = 'client'");
		$client_id = mysqli_fetch_assoc($client)['client_id'];
		$_SESSION['client_id'] = $client_id-1;
		
		successMsg('Client Added Successfully.');
		redirect_to('add_booking.php');
	}
}

?>
<h2>Client Registration</h2>
	<form method="post">
	  <div class="form-group">
	    <label for="name">Client Name</label>
	    <input type="text" name="name" required class="form-control" id="name"  placeholder="Enter Name">
	    
	  </div>
	   <div class="form-group">
	    <label for="address">Address</label>
	    <input type="text" name="address" required class="form-control" id="address" aria-describedby="addHelp" placeholder="Enter Address">
	     <small id="addHelp" class="form-text text-muted">Enter your address with street, city and district.</small>
	  </div>
	  <div class="form-group">
	    <label for="phone">Phone</label>
	    <input type="text" name="phone" required class="form-control" id="phone" placeholder="Enter Phone">
	  </div>
	 	<div class="form-group">
	    <label for="pass">Email</label>
	    <input type="text" name="email" required class="form-control" id="pass" placeholder="Enter Email">
	  </div>
	  <button type="submit" name="add" class="btn btn-primary">Submit</button>
	</form>

<?php include('includes/footer.php'); ?>
