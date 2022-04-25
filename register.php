<?php
	
	session_start();
	
	if(isset($_POST['username']))
	{
		$validation_ok = true;
		$username=$_POST['username'];
		
		if((strlen($username)<2) ||(strlen($username)>20))
		{
			$validation_OK = false;
			$_SESSION['e_name']="Imię musi posiadać od 2 do 20 znaków!";
		}
		
		$email =$_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_SANITIZE_EMAIL)== false) || ($emailB!=$email))
		{
			$validation_ok = false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail";
		}
		
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		
		if((strlen($password1)<8) || (strlen($password1)>20))
		{
			$validation_ok = false;
			$_SESSION['e_password'] = "Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if($password1!=$password2)
		{
			$validation_ok = false;
			$_SESSION['e_password'] = "Podane hasła nie są identyczne!";
		}
		
		$password_hash = password_hash($password1, PASSWORD_DEFAULT);
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$connection = new mysqli($host, $db_user, $db_password, $db_name);
			
			if ($connection->connect_errno!=0)
			{
				throw new Exception (mysqli_connect_errno());
			}
			else
			{
				//Czy email istnieje?
				$result = $connection->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$result) throw new Exception($connection->error);
				
				$how_many_mails = $result->num_rows;
				if ($how_many_mails>0)
				{
					$validation_ok = false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail";
				}
			}
			
			if($validation_ok == true)
			{
				if($connection->query("INSERT INTO users VALUES (NULL, '$username', '$password_hash', '$email')"))
				{
					if($connection->query("INSERT INTO incomes_category_assigned_to_users(id, name, user_id) SELECT NULL, incomes_category_default.name, users.id FROM users, incomes_category_default WHERE users.email = '$email'"))
					{
						if($connection->query("INSERT INTO payment_methods_assigned_to_users(id, name, user_id) SELECT NULL, payment_methods_default.name, users.id FROM users, payment_methods_default WHERE users.email = '$email'"))
						{
							if($connection->query("INSERT INTO expenses_category_assigned_to_users(id, name, user_id) SELECT NULL, expenses_category_default.name, users.id FROM users, expenses_category_default WHERE users.email = '$email'"))
							{
								$_SESSION['registersuccesfully']=true;
								header('Location:registersuccesfully.php');
							}
						}
					}
					else
					{
						$connection->query("DELETE FROM users WHERE email='$email'");
						
						throw new Exception($connection->error);
					}	
					
				}
				else
				{
					throw new Exception($connection->error);
				}	
			}	
			
		}
		catch(Exception $e)
		{
			echo '<span style="color: red";>Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br/> Informacja developerska: '.$e;
		}
		
		$connection->close();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>mojeFinanse.pl</title>
	<meta name="description" content="Zacznij panować nad swoimi finansami!"/>
	<meta name="keywords" content="finanse, pieniadze, budzet" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<header>
				<h1 class="logo text-center">
					<div style="display:inline-block"><span style="color:#cda3bc"><i class="icon-wallet"></i>moje</span></div><div style="display:inline-block">Finanse.pl</div>
				</h1>
				<h3>Aplikacja do zarządzania budżetem osobistym</h3>
			</header>
				<section class="mx-auto col-12 col-sm-10 col-md-8 col-lg-6">
					<h2>Nowe konto</h2>
					<div id="subtitle">Utwórz konto, aby w pełni móc korzystać z serwisu.</div>
					<div class="registerorloginwindow mb-5">
					
						<form method="post">
							<div class="input-group mx-auto col-12 col-sm-10">
								<div class="input-group-prepend"><i class="icon-user icons px-1"></i>
								<input class="form-control userinput" type="text" name="username" placeholder="imię" aria-label="imię"></div>

							</div>
							
								<?php
							
								if(isset($_SESSION['e_name']))
								{
									echo '<div class="error mb-2">'.$_SESSION['e_name'].'</div>';
									unset($_SESSION['e_name']);
								}	
							
								?>
							
							
							<div class="input-group mx-auto col-12 col-sm-10">
								<div class="input-group-prepend"><i class="icon-mail-alt icons px-1"></i>
								<input class="form-control userinput" type="text" name="email" placeholder="e-mail" aria-label="e-mail"></div>
							</div>
							
							<?php
								if(isset($_SESSION['e_email']))
								{
									echo '<div class="error">'.$_SESSION['e_email'].'</div>';
									unset($_SESSION['e_email']);
								}
							
							?>
							
							
							<div class="input-group mx-auto col-12 col-sm-10">
								<div class="input-group-prepend"><i class="icon-lock icons px-1"></i>
								<input class="form-control userinput" type="password" name="password1" placeholder="hasło" aria-label="hasło"></div>
							</div>
							
							<?php
								if(isset($_SESSION['e_password']))
								{
									echo '<div class="error">'.$_SESSION['e_password'].'</div>';
									unset($_SESSION['e_password']);
								}
							
							?>
						
							<div class="input-group mx-auto col-12 col-sm-10">
								<div class="input-group-prepend"><i class="icon-lock icons px-1"></i>
								<input class="form-control userinput" type="password" name="password2" placeholder="potwierdź hasło" aria-label=" potwierdź hasło"></div>
							</div>

							<button class="btn submitregistration mx-auto col-12 col-sm-10 col-lg-6" type="submit">Utwórz konto</button>
						</form>
					</div>
				</section>
		</div>
	</div>
	<footer>
			<div class="footer text-center">2021 © Kinga Kowal</div>
	</footer>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src ="js/bootstrap.min.js"></script>
</body>
</html>