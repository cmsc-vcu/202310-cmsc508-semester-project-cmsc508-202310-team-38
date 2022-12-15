<?php

include 'database_connection.php';
include 'function.php';

if(is_user_login())
{
	header('location:book_details.php');
}

include 'header.php';



?>
   
<div class="p-5 mb-4 bg-light rounded-3">
	<div class="container-fluid py-4">

		<h1 class="display-5 fw-bold" style="font-family:'Times New Roman'">Book Database With Tropes</h1>

		<p class="fs-4" style="font-family:'Times New Roman'">This database allows you to find books with your favorite trope. Use user login if you don't want to create a new account!
		</br> </br>User_login: test@gmail.com 
            </br>Password: password 
		</p>

	</div>

</div>

<div class="row align-items-md-stretch">

	<div class="col-md-6">

		<div class="h-100 p-5 text-white bg-dark rounded-3">

			<h2>Admin Login</h2>
			<p></p>
			<a href="admin_login.php" class="btn btn-outline-light">Admin Login</a>

		</div>

	</div>

	<div class="col-md-6">

		<div class="h-100 p-5 bg-light border rounded-3">

			<h2>User Login</h2>

			<p></p>

			<a href="user_login.php" class="btn btn-outline-secondary">User Login</a>

			<a href="user_registration.php" class="btn btn-outline-primary">User Sign Up</a>

		</div>

	</div>

</div>

<?php
?>