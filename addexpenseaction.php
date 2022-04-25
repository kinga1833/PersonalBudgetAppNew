<?php
	
	session_start();
	require_once "connect.php";
	$connection = new mysqli($host, $db_user, $db_password, $db_name);
			
	if ($connection->connect_errno!=0)
	{
		$_SESSION['fail'] = '<span style ="color:red">Zapisanie wydatku nie powiodlo sie! Spróbuj ponownie.</span>';
		header('Location:addincome.php');
	}
	else
	{
		$amount = $_POST['amount'];
		$date = $_POST['date'];
		$paymentmethod = $_POST['paymentmethod'];
		$expensecategory = $_POST['expensecategory'];
		$comment = $_POST['comment'];
		$userid = $_SESSION['id'];
		
		mysqli_set_charset($connection, "utf8");
		$result1 = $connection->query("SELECT * FROM expenses_category_assigned_to_users WHERE expenses_category_assigned_to_users.user_id = '$userid' AND expenses_category_assigned_to_users.name = '$expensecategory'");
		$row1 =$result1->fetch_assoc();
		$expensecategorycategoryid = $row1['id'];
		
		mysqli_set_charset($connection, "utf8");
		$result2 = $connection->query("SELECT * FROM payment_methods_assigned_to_users WHERE payment_methods_assigned_to_users.user_id = '$userid' AND payment_methods_assigned_to_users.name = '$paymentmethod'");
		$row2 =$result2->fetch_assoc();
		$paymentmethodid = $row2['id'];
		
		if($result1->num_rows>0)	
		{
			if($connection->query("INSERT INTO expenses VALUES (NULL, '$userid', '$expensecategorycategoryid', '$paymentmethodid', '$amount', '$date', '$comment')"))
			{
				header('Location:mainmenu.php');
			}
			else{
				throw new Exception($connection->error);
			}
		}
	}
	$connection->close();
?>