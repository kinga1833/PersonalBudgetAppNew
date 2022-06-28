<?php

	session_start();
	
	if((isset($_SESSION['signed_in'])) && ($_SESSION['signed_in']==true))
	{
		header('Location:mainmenu.php');
		exit();
	}
	if(isset($_SESSION['fail']))
	{
		unset($_SESSION['fail']);
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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<header>
				<h1 class="logo">
					<div style="display:inline-block"><span style="color:#cda3bc"><i class="icon-wallet"></i>moje</span></div><div style="display:inline-block">Finanse.pl</div>
				</h1>
				<h3 class="text-center">Aplikacja do zarządzania budżetem osobistym</h3>
			</header>
				<div class="square col-md-12 col-lg-7">
					<ul class="startpagelist mt-5 bg-white">
						<li><i class="icon-shopping-basket" ></i>Dodawaj swoje przychody i wydatki do aplikacji</li>

						<li><i class="icon-tags"></i>Przypisuj kategorie transakcjom</li>
									
						<li><i class="icon-calc "></i>Sprawdzaj różnicę między wydatkami i przychodami</li>
									
						<li><i class="icon-chart-pie"></i>Oglądaj bilans na wykresie</li>
									
						<li><i class="icon-money"></i>Zacznij oszczędzać! </li>
					</ul>		
				</div>
				
				<div class="square col-md-12 col-lg-5">
					<div class="loginRegister mt-5 mx-auto bg-white">Nie masz konta?<br />
						<div class="register mx-auto col-10 col-md-8"><a href="register.php" class="registerlink"><i class="icon-user-plus"></i>Zarejestruj się</a></div>
					</div>
					<div class="loginRegister mt-5 mb-5 mx-auto bg-white">Masz już konto?<br />
						<div class="login mx-auto col-10 col-md-8"><a href="loginsite.php" class="loginlink"><i class="icon-login"></i> Zaloguj się</a></div>
					</div>
				</div>		
		</div>	
	</div>
	<div class="row">
	<footer>
		<div class="footer text-center mt-3">2021 © Kinga Kowal</div>
	</footer>
	</div>
	
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src ="js/bootstrap.min.js"></script>
</body>
</html>
