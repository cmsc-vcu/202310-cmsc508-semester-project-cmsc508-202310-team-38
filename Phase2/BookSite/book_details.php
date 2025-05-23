<?php

//book_details.php

include 'database_connection.php';

include 'function.php';

if(!is_user_login())
{
	header('location:user_login.php');
}

$query = "
	SELECT * FROM books 
	ORDER BY books_id DESC
";


$statement = $connect->prepare($query);

$statement->execute();

include 'header.php';
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
	<h1>Book Database With Tropes</h1>
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
						</tr>
						';
					}
				}
				?>
				</tbody>
			</table>
		</div>
		<a href ="Views.php\query1.php">Query 1</a>
		<a href ="Views.php\query2.php">Query 2</a>
		<a href ="Views.php\query3.php">Query 3</a>
		<a href ="Views.php\query4.php">Query 4</a>
		<a href ="Views.php\query5.php">Query 5</a>
		<a href ="Views.php\query6.php">Query 6</a>
		<a href ="Views.php\query7.php">Query 7</a>
		<a href ="Views.php\query8.php">Query 8</a>
		<a href ="Views.php\query9.php">Query 9</a>
		<a href ="Views.php\query10.php">Query 10</a>
		<a href ="Views.php\query11.php">Query 11</a>
		<a href ="Views.php\query12.php">Query 12</a>
		<a href ="Views.php\query13.php">Query 13</a>
		<a href ="Views.php\query14.php">Query 14</a>
		<a href ="Views.php\query15.php">Query 15</a>
		<a href ="Views.php\query16.php">Query 16</a>
		<a href ="Views.php\query17.php">Query 17</a>
		<a href ="Views.php\query18.php">Query 18</a>
		<a href ="Views.php\query19.php">Query 19</a>
		<a href ="Views.php\query20.php">Query 20</a>
	</div>

</div>

<?php 



?>

