<?php

//book_details.php

include '../database_connection.php';

include '../function.php';

if(!is_user_login())
{
	header('location:../user_login.php');
}

$query = "
Select * from books join author on books_author_id= author_id 
ORDER BY author_first 
";

$statement = $connect->prepare($query);

$statement->execute();

include '../header.php';
?>

<style>
table, th, td {
  border: 1px solid black;
  border-color: #96D4D4;
}

th, td {
    border-spacing: 30px;
}

th {
    text-align: center;
}

td {
    padding-left: 10px;
}

tr:hover {background-color: #D6EEEE;}
</style>

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>Query 6</h1>
	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6" align="right">
				</div>
			</div>
		</div>
		<div class="card-body">
			<table id="datatablesSimple">
				<thead>
					<tr>
                        <th>Books ID</th>
						<th>Book Title</th>
						<th>Published Date</th>
						<th>Rating</th>
						<th>Publisher ID</th>
						<th>Author ID</th>
						<th>Trope ID 1</th>
					    <th>Trope ID 2</th>
						<th>Trope ID 3</th>
						<th>Genre ID </th>
                        <th>Author ID </th>
                        <th>Author First </th>
                        <th>Author Last </th>
                        <th>Author Middle </th>
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
                        <td>'.$row["author_id"].'</td>
                        <td>'.$row["author_first"].'</td>
                        <td>'.$row["author_last"].'</td>
                        <td>'.$row["author_middle"].'</td>
						</tr>
						';
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php 



?>

