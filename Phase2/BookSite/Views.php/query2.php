<?php

//book_details.php

include '../database_connection.php';

include '../function.php';

if(!is_user_login())
{
	header('location:../user_login.php');
}

$query = "
Select author_first, author_last from books join author 
on books_author_id= author_id
join Genre 
on books_genre_id = genre_id
where genre_name like '%Novel'
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
	<h1>Query 2</h1>
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
                        <th>Author First Name</th>
						<th>Author Last Name</th>
				</thead>
				<tbody>
				<?php 
				if($statement->rowCount() > 0)
				{
					foreach($statement->fetchAll() as $row)
					{
					echo '
						<tr>
                        <td>'.$row["author_first"].'</td>
                        <td>'.$row["author_last"].'</td>
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

