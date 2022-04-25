<?php
	
	session_start();
	
	if((!isset($_POST['email'])) || (!isset($_POST['password'])))
	{
		header('Location:index.php');
		exit();
	}
	require_once "connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if ($result = @$connection->query(sprintf("SELECT * FROM users WHERE email='%s'", mysqli_real_escape_string($connection, $email))))
		{
			$users_amount=$result->num_rows;
			if($users_amount>0)
			{
				$row =$result->fetch_assoc();
				
				if (password_verify($password, $row['password']) == true)
				{
					$_SESSION['signed_in'] = true;
					$_SESSION['id']=$row['id'];
					$_SESSION['username'] =$row['username'];
					
					unset($_SESSION['fail']);
					$result->free_result();
					header('Location:mainmenu.php');
				}
				else
				{
					$_SESSION['fail'] = '<span style ="color:red">Nieprawidłowe hasło!</span>';
					header('Location:loginsite.php');
				}
			}
			else
			{
				$_SESSION['fail'] = '<span style ="color:red">Nieprawidłowe hasło lub login!</span>';
				header('Location:loginsite.php');
			}
		}
		
		$connection->close();
	}	
	
?>
	