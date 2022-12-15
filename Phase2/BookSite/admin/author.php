<?php

//author.php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}

$message = '';

$error = '';

if(isset($_POST["add_author"]))
{
	$formdata = array();

	if(empty($_POST["author_id"]))
	{
		$error .= '<li>Author id is required</li>';
	}
	else
	{
		$formdata['author_id'] = trim($_POST["author_id"]);
	}

	if(empty($_POST["author_first"]))
	{
		$error .= '<li>Author First Name is required</li>';
	}
	else
	{
		$formdata['author_first'] = trim($_POST["author_first"]);
	}

	if(empty($_POST["author_last"]))
	{
		$error .= '<li>Author Last Name is required</li>';
	}
	else
	{
		$formdata['author_last'] = trim($_POST["author_last"]);
	}

	if($error == '')
	{
		$query = "
		SELECT * FROM author 
		WHERE author_first = '" . $formdata['author_first'] . "' 
		AND author_last = '" . $formdata['author_last'] . "' 
        AND author_id = '" . $formdata['author_id']. "'";

		$statement = $connect->prepare($query);

		$statement->execute();

		if($statement->rowCount() > 0)
		{
			$error = '<li>Author Name Already Exists</li>';
		}
		else
		{
			$data = array(
				':author_first'			=>	$formdata['author_first'],
				':author_last'			=>	$formdata['author_last'],
			);

			$query = "
			INSERT INTO author
            (author_id, author_first, author_last) 
            VALUES (:author_id, :author_first, :author_last)
			";

			$statement = $connect->prepare($query);

			$statement->execute($data);

			header('location:author.php?msg=add');
		}
	}
}

if(isset($_POST["edit_author"]))
{
	$formdata = array();

	if(empty($_POST["author_first"]))
	{
		$error .= '<li>Author First Name is required</li>';
	}
	else
	{
		$formdata['author_first'] = trim($_POST['author_first']);
	}

	if(empty($_POST["author_last"]))
	{
		$error .= '<li>Author Last Name is required</li>';
	}
	else
	{
		$formdata['author_last'] = trim($_POST['author_last']);
	}

	if($error == '')
	{
		$author_id = convert_data($_POST['author_id'], 'decrypt');

		$query = "
		SELECT * FROM author
        WHERE author_first = '".$formdata['author_first']."' 
		AND author_last = '".$formdata['author_last']."' 
        AND author_id != '".$author_id."'
		";

		$statement = $connect->prepare($query);

		$statement->execute();

		if($statement->rowCount() > 0)
		{
			$error = '<li>Author Name Already Exists</li>';
		}
		else
		{
			$data = array(
				':author_first'		=>	$formdata['author_first'],
				':author_last'		=>	$formdata['author_last'],
				':author_id'		=>	$author_id
			);	

			$query = "
			UPDATE author
            SET author_first = :author_first,  
			author_last = :author_last
            WHERE author_id = :author_id
			";

			$statement = $connect->prepare($query);

			$statement->execute($data);

			header('location:author.php?msg=edit');
		}
	}
}

$query = "
	SELECT * FROM author
    ORDER BY author_first ASC
";

$statement = $connect->prepare($query);

$statement->execute();

include '../header.php';

?>

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>Author Management</h1>
	<?php 

	if(isset($_GET["action"]))
	{
		if($_GET["action"] == "add")
		{
	?>

	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="author.php">Author Management</a></li>
        <li class="breadcrumb-item active">Add Author</li>
    </ol>

    <div class="row">
    	<div class="col-md-6">
    		<?php 

    		if($error != '')
    		{
    			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="list-unstyled">'.$error.'</ul> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    		}

    		?>
    		<div class="card mb-4">
    			<div class="card-header">
    				<i class="fas fa-user-plus"></i> Add New Author
                </div>
                <div class="card-body">
                	<form method="post">
                		<div class="mb-3">
                			<label class="form-label">Author Name</label>
                			<input type="text" name="author_name" id="author_name" class="form-control" />
                		</div>
                		<div class="mt-4 mb-0">
                			<input type="submit" name="add_author" class="btn btn-success" value="Add" />
                		</div>
                	</form>
                </div>
            </div>
    	</div>
    </div>

	<?php 
		}
		else if($_GET["action"] == 'edit')
		{
			$author_id = convert_data($_GET["code"], 'decrypt');

			if($author_id > 0)
			{
				$query = "
				SELECT * FROM author 
                WHERE author_id = '$author_id'
				";

				$author_result = $connect->query($query);

				foreach($author_result as $author_row)
				{
	?>

	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="author.php">Author Management</a></li>
        <li class="breadcrumb-item active">Edit Author</li>
    </ol>

    <div class="row">
    	<div class="col-md-6">
    		<div class="card mb-4">
    			<div class="card-header">
    				<i class="fas fa-user-edit"></i> Edit Author Details
    			</div>
    			<div class="card-body">
    				<form method="post">
    					<div class="mb-3">
    						<label class="form-label">Author Name</label>
    						<input type="text" name="author_name" id="author_name" class="form-control" value="<?php echo $author_row['author_first']; ?>" />
    					</div>
    					<div class="mt-4 mb-0">
    						<input type="hidden" name="author_id" value="<?php echo $_GET['code']; ?>" />
    						<input type="submit" name="edit_author" class="btn btn-primary" value="Edit" />
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>

	<?php
				}
			}
		}
	}
	else
	{

	?>
	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
		<li class="breadcrumb-item active">Author Management</li>
	</ol>
	<?php 

	if(isset($_GET["msg"]))
	{
		if($_GET["msg"] == 'add')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">New Author Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}
		if($_GET['msg'] == 'edit')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Author Data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}
		if($_GET["msg"] == 'disable')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Author Status Change to Disable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}

		if($_GET["msg"] == 'enable')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Author Status Change to Enable <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}
	}

	?>
	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> Author Management
				</div>
				<div class="col col-md-6" align="right">
					<a href="author.php?action=add" class="btn btn-success btn-sm">Add</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table id="datatablesSimple">
				<thead>
					<tr>
						<th>Author id</th>
						<th>First Name</th>
						<th>Last Name </th>
						<th>Middle Name</th>
					</tr>
				</thead>
				<tbody>
				<?php
				if($statement->rowCount() > 0)
				{
					foreach($statement->fetchAll() as $row)
					{				
						echo '
						<tr>
							<td>'.$row["author_id"].'</td>
							<td>'.$row["author_first"].'</td>
							<td>'.$row["author_last"].'</td>
							<td>'.$row["author_middle"].'</td>
							<td>
								<a href="author.php?action=edit&code='.convert_data($row["author_id"]).'" class="btn btn-sm btn-primary">Edit</a>
								<button type="button" name="delete_button" class="btn btn-danger btn-sm" onclick="delete_data(`'.$row["author_id"].'`)">Delete</button>
							</td>
						</tr>
						';
					}
				}
				else
				{
					echo '
					<tr>
						<td colspan="4" class="text-center">No Data Found</td>
					</tr>
					';
				}
				?>
				</tbody>
			</table>
		</div>
	</div>

	<script>

		function delete_data(code, status)
		{
			var new_status = 'Enable';

			if(status == 'Enable')
			{
				new_status = 'Disable';
			}

			if(confirm("Are you sure you want to "+new_status+" this Author?"))
			{
				window.location.href = "author.php?action=delete&code="+code+"&status="+new_status+"";
			}
		}

	</script>

	<?php 

	}

	?>
</div>

<?php 

?>