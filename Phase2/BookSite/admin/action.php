<?php 

//action.php

include '../database_connection.php';

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'search_book_id')
	{
		$query = "
		SELECT books_id, books_title FROM books 
		WHERE books_id LIKE '%".$_POST["request"]."%' 
		";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'id_no'		=>	str_replace($_POST["request"], '<b>'.$_POST["request"].'</b>', $row["books_id"]),
				'books_title'		=>	$row['books_title']
			);
		}
		echo json_encode($data);
	}

	if($_POST["action"] == 'search_user_id')
	{
		$query = "
		SELECT user_unique_id, user_name FROM login_user 
		WHERE user_unique_id LIKE '%".$_POST["request"]."%' 
		AND user_status = 'Enable'
		";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'user_unique_id'	=>	str_replace($_POST["request"], '<b>'.$_POST["request"].'</b>', $row["user_unique_id"]),
				'user_name'			=>	$row["user_name"]
			);
		}

		echo json_encode($data);
	}
}

?>