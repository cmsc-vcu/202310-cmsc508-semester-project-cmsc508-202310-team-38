<?php

//index.php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}


include '../header.php';

?>

<div class="container-fluid py-4">
	<h1 class="mb-5">Dashboard</h1>
	<div class="row">
	</div>
</div>

<?php

?>