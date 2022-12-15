<?php

//genre.php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}

$message = '';

$error = '';

if(isset($_POST['add_genre']))
{
	$formdata = array();

	if(empty($_POST['genre_id']))
	{
		$error .= '<li>Genre Name is required</li>';
	}
	else
	{
		$formdata['genre_id'] = trim($_POST['genre_id']);
	}

	if(empty($_POST['genre_name']))
	{
		$error .= '<li>Genre Name is required</li>';
	}
	else
	{
		$formdata['genre_name'] = trim($_POST['genre_name']);
	}

	if($error == '')
	{
		$query = "
		SELECT * FROM genre 
        WHERE genre_name = '".$formdata['genre_name']."'
		AND genre_id = '".$formdata['genre_id']."'
		";

		$statement = $connect->prepare($query);

		$statement->execute();

		if($statement->rowCount() > 0)
		{
			$error = '<li>genre Name Already Exists</li>';
		}
		else
		{
			$data = array(
				':genre_name'			=>	$formdata['genre_name'],
				':genre_id'			    =>	$formdata['genre_id']
			);

			$query = "
			INSERT INTO genre 
            (genre_id, genre_name) 
            VALUES (:genre_id, :genre_name)
			";

			$statement = $connect->prepare($query);

			$statement->execute($data);

			header('location:genre.php?msg=add');
		}
	}
}

if(isset($_POST["edit_genre"]))
{
	$formdata = array();

	if(empty($_POST["genre_name"]))
	{
		$error .= '<li>genre Name is required</li>';
	}
	else
	{
		$formdata['genre_name'] = $_POST['genre_name'];
	}

	if($error == '')
	{
		$genre_id = convert_data($_POST['genre_id'], 'decrypt');

		$query = "
		SELECT * FROM genre 
        WHERE genre_name = '".$formdata['genre_name']."' 
        AND genre_id != '".$genre_id."'
		";

		$statement = $connect->prepare($query);

		$statement->execute();

		if($statement->rowCount() > 0)
		{
			$error = '<li>genre Name Already Exists</li>';
		}
		else
		{
			$data = array(
				':genre_name'		=>	$formdata['genre_name'],
				':genre_id'			=>	$genre_id
			);

			$query = "
			UPDATE genre 
            SET genre_name = :genre_name, 
            WHERE genre_id = :genre_id
			";

			$statement = $connect->prepare($query);

			$statement->execute($data);

			header('location:genre.php?msg=edit');
		}
	}
}


$query = "
SELECT * FROM genre 
    ORDER BY genre_name ASC
";

$statement = $connect->prepare($query);

$statement->execute();

include '../header.php';

?>

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>Genre Update</h1>
	<?php 

	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'add')
		{
	?>

	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="genre.php">Genre Update</a></li>
		<li class="breadcrumb-item active">Add genre</li>
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
					<i class="fas fa-user-plus"></i> Add New genre
                </div>
                <div class="card-body">

                	<form method="POST">

                		<div class="mb-3">
                			<label class="form-label">Genre Name</label>
                			<input type="text" name="genre_name" id="genre_name" class="form-control" />
                		</div>

                		<div class="mt-4 mb-0">
                			<input type="submit" name="add_genre" value="Add" class="btn btn-success" />
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
			$genre_id = convert_data($_GET["code"],'decrypt');

			if($genre_id > 0)
			{
				$query = "
				SELECT * FROM genre 
                WHERE genre_id = '$genre_id'
				";

				$genre_result = $connect->query($query);

				foreach($genre_result as $genre_row)
				{
				?>
	
	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="genre.php">Genre Update</a></li>
		<li class="breadcrumb-item active">Edit genre</li>
	</ol>
	<div class="row">
		<div class="col-md-6">
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-user-edit"></i> Edit genre Details
				</div>
				<div class="card-body">

					<form method="post">

						<div class="mb-3">
							<label class="form-label">genre Name</label>
							<input type="text" name="genre_name" id="genre_name" class="form-control" value="<?php echo $genre_row['genre_name']; ?>" />
						</div>

						<div class="mt-4 mb-0">
							<input type="hidden" name="genre_id" value="<?php echo $_GET['code']; ?>" />
							<input type="submit" name="edit_genre" class="btn btn-primary" value="Edit" />
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
		<li class="breadcrumb-item active">Genre Update</li>
	</ol>

	<?php 

	if(isset($_GET['msg']))
	{
		if($_GET['msg'] == 'add')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">New genre Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}

		if($_GET["msg"] == 'edit')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">genre Data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}
	}	

	?>

	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> Genre Update
				</div>
				<div class="col col-md-6" align="right">
					<a href="genre.php?action=add" class="btn btn-success btn-sm">Add</a>
				</div>
			</div>
		</div>
		<div class="card-body">

			<table id="datatablesSimple">
				<thead>
					<tr>
						<th>Genre ID</th>
						<th>Genre Name</th>
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
							<td>'.$row["genre_id"].'</td>
							<td>'.$row["genre_name"].'</td>
							<td>
								<a href="genre.php?action=edit&code='.convert_data($row["genre_id"]).'" class="btn btn-sm btn-primary">Edit</a>
								<button name="delete_button" class="btn btn-danger btn-sm" onclick="delete_data(`'.$row["genre_id"].'`)">Delete</button>
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

			<script>

				function delete_data(code)
				{
					if(confirm("Are you sure you want to delete this genre?"))
					{
						window.location.href="genre.php?action=delete&code="+code+"&status="+'Disabled'+"";
					}
				}

			</script>

		</div>
	</div>
	<?php 
	}
	?>

</div>

<?php 

?>