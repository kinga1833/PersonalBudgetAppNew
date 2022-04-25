<?php
	
	session_start();
	
	if(!isset($_SESSION['signed_in']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>mojeFinanse.pl</title>
	<meta name="description" content="Zacznij panować nad swoimi finansami!"/>
	<meta name="keywords" content="finanse, pieniadze,budzet" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<header>
			<h1 class="logo">
				<div style="display:inline-block"><span style="color:#cda3bc"><i class="icon-wallet"></i>moje</span></div><div style="display:inline-block">Finanse.pl</div>
			</h1>
			<h3>Aplikacja do zarządzania budżetem osobistym</h3>
	
			<nav class="navbar mt-4 bg-white navbar-expand-lg">
				
				<button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
					<span class="icon-menu-1"></span>
				</button>
					
				<div class="collapse navbar-collapse" id="mainmenu">
					 
					<ul class="navbar-nav mx-auto bg-white">
					
						<li class="col-lg-2 ml-1 nav-item">
							<a class="nav-link" href="mainmenu.php"><i class="icon-home mr-2"></i>Strona główna</a>
						</li>
							
						<li class="col-lg-2 nav-item">
							<a class="nav-link" href="addincome.php"><i class="icon-money mr-2"></i>Dodaj przychód</a>
						</li>
							
						<li class="col-lg-2 nav-item active">
							<a class="nav-link" href="addexpense.php"><i class="icon-shopping-basket mr-2"></i>Dodaj wydatek</a>
						</li>
							
						<li class="col-lg-2 nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true"><i class="icon-chart-pie mr-2"></i>Przeglądaj bilans</a>
							
							<div class="dropdown-menu" aria-labelledby="submenu">
								<a class="dropdown-item" href="showbalance-currentmonth.php">bieżący miesiąc</a>
								<a class="dropdown-item " href="showbalance-currentyear.php">poprzedni miesiąc</a>
								<a class="dropdown-item " href="showbalance-lastmonth.php">bieżący rok</a>
								<a class="dropdown-item " href="showbalance-custom.php">niestandardowy</a>
							</div>
						</li>
							
						<li class="col-lg-2 nav-item">
							<a class="nav-link" href="settings.php"><i class="icon-cog mr-2"></i>Ustawienia</a>
						</li>
							
						<li class="col-lg-2 mr-1 nav-item">
							<a class="nav-link" href="logout.php"><i class="icon-logout mr-2"></i>Wyloguj się</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<section class="mx-auto px-2">
			<div class="row">
				<div class="addoperation text-center mx-auto my-5 pt-4 bg-white col-sm-10 col-md-7 col-lg-5 ">
					<h4 class="font-weight-bold">DODAJ WYDATEK</h4>
					<form action="addexpenseaction.php" method="post">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text ">Kwota</span>
								<input class="form-control" type="number" name="amount" step="0.01" value="" required="">
							</div>
							<div class="input-group-prepend mt-3">
								<span class="input-group-text ">Data</span>
								<input class="form-control" type="date" name="date" value="" required="">
							</div>
							<div class="input-group-prepend mt-3">
								<span class="input-group-text ">Sposób płatności</span>
									<select class="form-control" name="paymentmethod" required="">
										<option value="" disabled="" selected="" hidden="">wybierz kategorię</option>
										<option>gotówka</option>
										<option>karta kredytowa</option>
										<option>karta debetowa</option>
										<option>blik</option>
										<option>Bitcoin</option>
									</select>
							</div>
							<div class="input-group-prepend mt-3">
								<span class="input-group-text ">Kategoria</span>
									<select class="form-control" name="expensecategory" required="">
										<option value="" disabled="" selected="" hidden="">wybierz kategorię</option>
										<option>jedzenie</option>
										<option>mieszkanie</option>
										<option>transport</option>
										<option>telekomunikacja</option>
										<option>opieka zdrowotna</option>
										<option>ubrania</option>
										<option>higiena</option>
										<option>dzieci</option>
										<option>rozrywka</option>
										<option>wycieczka</option>
										<option>szkolenie</option>
										<option>książki</option>
										<option>oszczędności</option>
										<option>na emeryturę</option>
										<option>spłata długów</option>
										<option>darowizna</option>
										<option>inne wydatki</option>
									</select>
							</div>
							<div class="input-group-prepend mt-3">
								<span class="input-group-text ">Komentarz <br> (opcjonalnie)</span>
								<textarea class="form-control" name="comment" maxlength="100" rows="4"></textarea>
							</div>
							<div class="mt-4 mx-auto">	
								<button class="btn mr-4 col-5" type="submit">	
									Dodaj
								</button>
								<button class="btn col-5">
									Anuluj
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
	<footer>
			<div class="footer text-center my-2">2021 © Kinga Kowal</div>
	</footer>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src ="js/bootstrap.min.js"></script>	
</body>
</html>