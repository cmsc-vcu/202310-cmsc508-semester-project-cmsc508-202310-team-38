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

$query1 = "
SELECT * FROM books JOIN Trope 
on books_trope_id1= trope_id 
where trope_name= 'Murder Mystery' 
";

$query2 = "
Select author_first, author_last from books join author 
on books_author_id= author_id
join Genre 
on books_genre_id = genre_id
where genre_name like '%Novel'
";

$query3 = "
Select count(*) from books 
";

$query4 = "
Select * 
from books 
join publisher on books_publisher_id = publisher_id
where publisher_name like '%Simon%'
";

$query5 = "
Select books_title, books_published_date
from books 
where books_published_date >='1954-01-01'
";

$query6 = "
select count(distinct(books_publisher_id)) from books 
";

$query7 = "
select distinct(publisher_name) 
from books join publisher 
on books_publisher_id = publisher_id
";

$query8 = "
select distinct(publisher_name) 
from books join publisher 
on books_publisher_id = publisher_id
";

$query9 = "
Select count(*) from Genre
";

$query10 = "
Select * from Genre where genre_name Like '%Novel%'
";

$query11 = "
select * from books where books_rating>=3.5
";
$query12 = "
select books_title as 'Books released in June'from books where books_published_date like '%-06-%'
";
$query13 = "
select * from books where books_description like '%slave%'
";
$query14 = "
Select  genre_name from books join Genre on books_genre_id= Genre_id
where books_publisher_id=2006
";
$query15 = "
Select author_first, author_last from books join Genre on books_genre_id=genre_id
join author on books_author_id= author_id where genre_name like '%Novel%'
";
$query16 = "
Select * from books where books_trope_id1 % 2 =0
";
$query17 = "
select count(*) from Trope
";
$query18 = "
Select * from books ORDER BY books_published_date DESC LIMIT 1
";
$query19 = "
Select * from books ORDER BY books_rating ASC LIMIT 1
";
$query20 = "
Select author_first, author_last, author_middle from books join author on books_author_id=author_id where author_middle != ''
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
	</div>

</div>

<?php 



?>

