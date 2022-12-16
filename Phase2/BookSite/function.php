<?php

//function.php

function base_url()
{
	return 'http://localhost/booksite/';
}

function is_admin_login()
{
	if(isset($_SESSION['admin_id']))
	{
		return true;
	}
	return false;
}

function is_user_login()
{
	if(isset($_SESSION['user_id']))
	{
		return true;
	}
	return false;
}


function convert_data($string, $action = 'encrypt')
{
	$encrypt_method = "AES-256-CBC";
	$secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
	$secret_iv = '5fgf5HJ5g27'; // user define secret key
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
	if ($action == 'encrypt') 
	{
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	    $output = base64_encode($output);
	} 
	else if ($action == 'decrypt') 
	{
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}
	return $output;
}


function fill_author($connect)
{
	$query = "
	SELECT author_id FROM author
	ORDER BY author_id DESC
	";

	$result = $connect->query($query);

	$output = '<option value="">Select Author</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["author_id"].'">'.$row["author_id"].'</option>';
	}

	return $output;
}

function fill_genre($connect)
{
	$query = "
	SELECT genre_id FROM genre
	ORDER BY genre_id DESC
	";

	$result = $connect->query($query);

	$output = '<option value="">Select Genre</option>';

	foreach($result as $row)
	{
		$output .= '<option value="'.$row["genre_id"].'">'.$row["genre_id"].'</option>';
	}

	return $output;
}

function Count_total_book_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(books_id) AS Total FROM books";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_author_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(author_id) AS Total FROM author ";

	$result  = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

function Count_total_genre_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(genre_id) AS Total FROM genre";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}
	return $total;
}

function Count_total_trope_number($connect)
{
	$total = 0;

	$query = "
	SELECT COUNT(trope_id) AS Total FROM trope";

	$result = $connect->query($query);

	foreach($result as $row)
	{
		$total = $row["Total"];
	}

	return $total;
}

?>