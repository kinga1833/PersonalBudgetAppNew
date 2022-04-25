<?php

	session_start();
	require_once "connect.php";
	
	$connection = new mysqli($host, $db_user, $db_password, $db_name);
			
	if ($connection->connect_errno!=0)
	{
		$_SESSION['fail'] = '<span style ="color:red">Zapisanie wydatku nie powiodło się! Spróbuj ponownie.</span>';
		header('Location:addincome.php');
	}
	else
	{
		$amount = $_POST['amount'];
		$date = $_POST['date'];
		$category = $_POST['category'];
		$comment = $_POST['comment'];
		$userid = $_SESSION['id'];
		
		mysqli_set_charset($connection, "utf8");
		$result = $connection->query("SELECT * FROM incomes_category_assigned_to_users WHERE incomes_category_assigned_to_users.user_id = '$userid' AND incomes_category_assigned_to_users.name = '$category'");
		$row =$result->fetch_assoc();
		$categoryid = $row['id'];
		
		if($result->num_rows>0)
		{
			if($connection->query("INSERT INTO incomes VALUES (NULL, '$userid', '$categoryid', '$amount', '$date', '$comment')"))
			{
				header('Location:mainmenu.php');
			}
			else
			{
				throw new Exception($connection->error);
			}
		}
	}

?>