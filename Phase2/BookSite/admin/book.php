<?php

//book.php

include '../database_connection.php';

include '../function.php';


if(!is_admin_login())
{
	header('location:../admin_login.php');
}

$message = '';

$error = '';

if(isset($_POST["add_book"]))
{
	$formdata = array();

	if(empty($_POST["books_title"]))
	{
		$error .= '<li>Book Title is required</li>';
	}
	else
	{
		$formdata['books_title'] = trim($_POST["books_title"]);
	}

	if(empty($_POST["books_id"]))
	{
		$error .= '<li>Book Id is required</li>';
	}
	else
	{
		$formdata['books_id'] = trim($_POST["books_id"]);
	}

	if(empty($_POST["books_author_id"]))
	{
		$error .= '<li>Book Author Id is required</li>';
	}
	else
	{
		$formdata['books_author_id'] = trim($_POST["books_author_id"]);
	}

	if(empty($_POST["books_published_date"]))
	{
		$error .= '<li>Book Published Date is required</li>';
	}
	else
	{
		$formdata['books_published_date'] = trim($_POST["books_published_date"]);
	}

	if(empty($_POST["books_rating"]))
	{
		$error .= '<li>Book Rating is required</li>';
	}
	else
	{
		$formdata['books_rating'] = trim($_POST["books_rating"]);
	}
	if(empty($_POST["books_publisher_id"]))
	{
		$error .= '<li>Book Publisher ID is required</li>';
	}
	else
	{
		$formdata['books_publisher_id'] = trim($_POST["books_publisher_id"]);
	}

	if(empty($_POST["books_trope_id1"]))
	{
		$error .= '<li>Book Trope ID is required</li>';
	}
	else
	{
		$formdata['books_trope_id1'] = trim($_POST["books_trope_id1"]);
	}

	if(empty($_POST["books_trope_id2"]))
	{
		$error .= '<li>Book Trope ID is required</li>';
	}
	else
	{
		$formdata['books_trope_id2'] = trim($_POST["books_trope_id2"]);
	}

	if(empty($_POST["books_genre_id"]))
	{
		$error .= '<li>Book Genre ID is required</li>';
	}
	else
	{
		$formdata['books_genre_id'] = trim($_POST["books_genre_id"]);
	}

	if($error == '')
	{
		$data = array(
			':books_id'		=>	$formdata['books_id'],
			':books_title'			=>	$formdata['books_title'],
			':books_published_date'	=>	$formdata['books_published_date'],
			':books_rating'			=>	$formdata['books_rating'],
			':books_publisher_id'		=>	$formdata['books_publisher_id'],
			':books_author_id'		=>	$formdata['books_author_id'],
			':books_trope_id1'		=>	$formdata['books_trope_id1'],
			':books_trope_id2'		=>	$formdata['books_trope_id2'],
			':books_trope_id3'		=>	$formdata['books_trope_id3'],
			':books_genre_id'		=>	$formdata['books_genre_id']
		);

		$query = "
		INSERT INTO books 
        (books_id, books_title, books_published_date, books_rating, books_publisher_id, books_author_id, books_trope_id1, books_trope_id2, books_trope_id3,books_genre_id) 
        VALUES (:books_id, :books_title, :books_published_date, :books_rating, :books_publisher_id, :books_author_id, :books_trope_id1, :books_trope_id2, :books_trope_id3, :books_genre_id)
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		header('location:book.php?msg=add');
	}
}

if(isset($_POST["edit_book"]))
{
	$formdata = array();

	if(empty($_POST["books_title"]))
	{
		$error .= '<li>Book Title is required</li>';
	}
	else
	{
		$formdata['books_title'] = trim($_POST["books_title"]);
	}

	if(empty($_POST["books_published_date"]))
	{
		$error .= '<li>Book Published Date is required</li>';
	}
	else
	{
		$formdata['books_published_date'] = trim($_POST["books_published_date"]);
	}

	if(empty($_POST["books_rating"]))
	{
		$error .= '<li>Book Rating is required</li>';
	}
	else
	{
		$formdata['books_rating'] = trim($_POST["books_rating"]);
	}

	if(empty($_POST["books_publisher_id"]))
	{
		$error .= '<li>Book Publisher ID is required</li>';
	}
	else
	{
		$formdata['books_publisher_id'] = trim($_POST["books_publisher_id"]);
	}
	if(empty($_POST["books_author_id"]))
	{
		$error .= '<li>Book Author ID is required</li>';
	}
	else
	{
		$formdata['books_author_id'] = trim($_POST["books_author_id"]);
	}

	if(empty($_POST["books_trope_id1"]))
	{
		$error .= '<li>Book Trope ID is required</li>';
	}
	else
	{
		$formdata['books_trope_id1'] = trim($_POST["books_trope_id1"]);
	}

	if(empty($_POST["books_trope_id2"]))
	{
		$error .= '<li>Book Trope ID is required</li>';
	}
	else
	{
		$formdata['books_trope_id2'] = trim($_POST["books_trope_id2"]);
	}

	if(empty($_POST["books_genre_id"]))
	{
		$error .= '<li>Book Genre ID is required</li>';
	}
	else
	{
		$formdata['books_genre_id'] = trim($_POST["books_genre_id"]);
	}


	if($error == '')
	{
		$data = array(
			':books_title'			=>	$formdata['books_title'],
			':books_published_date'	=>	$formdata['books_published_date'],
			':books_rating'			=>	$formdata['books_rating'],
			':books_publisher_id'		=>	$formdata['books_publisher_id'],
			':books_author_id'		=>	$formdata['books_author_id'],
			':books_trope_id1'		=>	$formdata['books_trope_id1'],
			':books_trope_id2'		=>	$formdata['books_trope_id2'],
			':books_trope_id3'		=>	$formdata['books_trope_id3'],
			':books_genre_id'		=>	$formdata['books_genre_id']
		);
		$query = "
		UPDATE books 
        SET 	
		':books_title'			=   :books_title,
		':books_published_date'	=	:books_published_date,
		':books_rating'			=	:books_rating,
		':books_publisher_id'	=   :books_publisher_id,
		':books_author_id'		=	:books_author_id,
		':books_trope_id1'		=	:books_trope_id1,
		':books_trope_id2'		=	:books_trope_id2,
		':books_trope_id3'		=	:books_trope_id3,
		':books_genre_id'		=	:books_genre_id
        WHERE books_id = :books_id
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		header('location:book.php?msg=edit');
	}
}



$query = "
	SELECT * FROM books 
    ORDER BY books_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();


include '../header.php';

?>

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>Book Management</h1>
	<?php 
	if(isset($_GET["action"]))
	{
		if($_GET["action"] == 'add')
		{
	?>

	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="book.php">Book Management</a></li>
        <li class="breadcrumb-item active">Add Book</li>
    </ol>

    <?php 

    if($error != '')
    {
    	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="list-unstyled">'.$error.'</ul> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }

    ?>

    <div class="card mb-4">
    	<div class="card-header">
    		<i class="fas fa-user-plus"></i> Add New Book
        </div>
        <div class="card-body">
        	<form method="post">
        		<div class="row">
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Book Title</label>
        					<input type="text" name="book_name" id="book_name" class="form-control" />
        				</div>
        			</div>
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Book Published Date</label>
        					<select name="book_author" id="book_author" class="form-control">
        						<?php echo fill_author($connect); ?>
        					</select>
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Select Category</label>
        					<select name="book_category" id="book_category" class="form-control">
        						<?php echo fill_category($connect); ?>
        					</select>
        				</div>
        			</div>
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Select Location Rack</label>
        					<select name="book_location_rack" id="book_location_rack" class="form-control">
        						<?php echo fill_location_rack($connect); ?>
        					</select>
        				</div>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">Book ISBN Number</label>
        					<input type="text" name="book_isbn_number" id="book_isbn_number" class="form-control" />
        				</div>
        			</div>
        			<div class="col-md-6">
        				<div class="mb-3">
        					<label class="form-label">No. of Copy</label>
        					<input type="number" name="book_no_of_copy" id="book_no_of_copy" step="1" class="form-control" />
        				</div>
        			</div>
        		</div>
        		<div class="mt-4 mb-3 text-center">
        			<input type="submit" name="add_book" class="btn btn-success" value="Add" />
        		</div>
        	</form>
        </div>
    </div>

	<?php 
		}
		else if($_GET["action"] == 'edit')
		{
			$book_id = convert_data($_GET["code"], 'decrypt');

			if($book_id > 0)
			{
				$query = "
				SELECT * FROM books 
                WHERE books_id = '$book_id'
				";

				$book_result = $connect->query($query);

				foreach($book_result as $book_row)
				{
	?>
	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="book.php">Book Management</a></li>
        <li class="breadcrumb-item active">Edit Book</li>
    </ol>
    <div class="card mb-4">
    	<div class="card-header">
    		<i class="fas fa-user-plus"></i> Edit Book Details
       	</div>
       	<div class="card-body">
       		<form method="post">
       			<div class="row">
       				<div class="col-md-6">
       					<div class="mb-3">
       						<label class="form-label">Book Name</label>
       						<input type="text" name="book_name" id="book_name" class="form-control" value="<?php echo $book_row['books_title']; ?>" />
       					</div>
       				</div>
       				<div class="col-md-6">
       					<div class="mb-3">
       						<label class="form-label">Select Author</label>
       						<select name="book_author" id="book_author" class="form-control">
       							<?php echo fill_author($connect); ?>
       						</select>
       					</div>
       				</div>
       			</div>
       			<div class="row">
       				<div class="col-md-6">
       					<div class="mb-3">
       						<label class="form-label">Select Genre</label>
       						<select name="book_category" id="book_category" class="form-control">
       							<?php echo fill_genre($connect); ?>
       						</select>
       					</div>
       				</div>
       			<div class="mt-4 mb-3 text-center">
       				<input type="hidden" name="book_id" value="<?php echo $book_row['books_id']; ?>" />
       				<input type="submit" name="edit_book" class="btn btn-primary" value="Edit" />
       			</div>
       		</form>
       		<script>
       			document.getElementById('book_author').value = "<?php echo $book_row['books_author_id']; ?>";
       			document.getElementById('book_category').value = "<?php echo $book_row['books_genre_id']; ?>";
       		</script>
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
		<li class="breadcrumb-item active">Book Management</li>
	</ol>
	<?php 

	if(isset($_GET["msg"]))
	{
		if($_GET["msg"] == 'add')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">New Book Added<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}
		if($_GET['msg'] == 'edit')
		{
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Book Data Edited <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
		}
	}

	?>
	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> Book Update
                </div>
                <div class="col col-md-6" align ="right">
                	<a href="book.php?action=add" class="btn btn-success btn-sm">Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        	<table id="datatablesSimple">
        		<thead> 
        			<tr> 
        				<th>Book ID</th>
        				<th>Book Title</th>
        				<th>Book Published Date</th>
        				<th>Book Rating</th>
        				<th>Book Publisher ID</th>
        				<th>Book Author ID</th>
        				<th>Book Trope ID 1</th>
        				<th>Book Trope ID 2</th>
        				<th>Book Trope ID 3</th>
        				<th>Book Genre ID</th>
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
                        <td>'.$row["books_id"].'</td>
                        <td>'.$row["books_title"].'</td>
                        <td>'.$row["books_published_date"].'</td>
                        <td>'.$row["books_rating"].'</td>
                        <td>'.$row["books_publisher_id"].'</td>
                        <td>'.$row["books_author_id"].'</td>
                        <td>'.$row["books_trope_id1"].'</td>
                        <td>'.$row["books_trope_id2"].'</td>
                        <td>'.$row["books_trope_id3"].'</td>
                        <td>'.$row["books_genre_id"].'</td>
						<td>
        						<a href="book.php?action=edit&code='.convert_data($row["books_id"]).'" class="btn btn-sm btn-primary">Edit</a>
        						<button type="button" name="delete_button" class="btn btn-danger btn-sm" onclick="delete_data(`'.$row["books_id"].'`)">Delete</button>
        					</td>
        				</tr>
        				';
        			}
        		}
        		else
        		{
        			echo '
        			<tr>
        				<td colspan="10" class="text-center">No Data Found</td>
        			</tr>
        			';
        		}

        		?>
        		</tbody>
        	</table>
        </div>
    </div>
    <script>

    	function delete_data(code)
    	{
    		if(confirm("Are you sure you want to "delete" this Category?"))
    		{
    			window.location.href = "book.php?action=delete&code="+code+"&status="+'Disable'+"";
    		}
    	}

    </script>
    <?php 
	}
    ?>
</div>


<?php


?>