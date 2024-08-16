<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tailweb</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Tailweb Student Login Page </h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?php
$user = $this->session->userdata('user');
extract($user);
?>
			<h2>Welcome to Homepage </h2>
			
			<a href="<?php echo base_url(); ?>TeacherController/logout" class="btn btn-danger">Logout</a>

			<h4>Student Info:</h4>
			<p>Fullname: <?php echo $name; ?></p>
			<p>Email: <?php echo $email; ?></p>

		</div>
	</div>
</div>
</body>
</html>
