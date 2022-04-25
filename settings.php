<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8"/>
	<title>mojeFinanse.pl</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
							
						<li class="col-lg-2 nav-item">
							<a class="nav-link" href="addexpense.php"><i class="icon-shopping-basket mr-2"></i>Dodaj wydatek</a>
						</li>
							
						<li class="col-lg-2 nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true"><i class="icon-chart-pie mr-2"></i>Przeglądaj bilans</a>
							
							<div class="dropdown-menu" aria-labelledby="submenu">
								<a class="dropdown-item " href="showbalance-currentmonth
								.php">bieżący miesiąc</a>
								<a class="dropdown-item " href="showbalance-lastmonth.php">poprzedni miesiąc</a>
								<a class="dropdown-item " href="showbalance-currentyear.php">bieżący rok</a>
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
			<div class="addoperation text-center mx-auto my-5 py-4 bg-white col-sm-10 col-md-7 ">
					<h4 class="mt-2 mb-5 font-weight-bold">USTAWIENIA</h4>
					<h5 class="mt-5 mb-3">DANE UŻYTKOWNIKA</h5>
					
					<label class="text-left">imię</label>
					<div class="input-group col-sm-12 col-lg-10 col-xl-8 mx-auto">
						<input class="form-control" value="" disabled>
							<div class="input-group-append">
								<button class="btn ml-1" type="button" ><i class="icon-pencil"></i></button>
								</div>
					</div>
						
					<label>e-mail</label>
					<div class="input-group col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" value="" disabled>
								<div class="input-group-append">
									<button class="btn ml-1" type="button" ><i class="icon-pencil"></i></button>
								</div>
						</div>
						
						<label>hasło</label>
						<div class="input-group col-sm-12 col-lg-10 col-xl-8 mx-auto">
								<input class="form-control" value="" disabled>
									<div class="input-group-append">
										<button class="btn ml-1" type="button" ><i class="icon-pencil"></i></button>
									</div>
							</div>
							
					<h5>KATERGORIE PRZYCHODÓW</h5>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="wynagrodzenie" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="odsetki" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="sprzedaż na allegro" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="inne" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<button class="btn my-4" type="button"><i class="icon-tags mr-2"></i>Dodaj nową kategorię</button>
						
						
						<h5>KATEGORIE WYDATKÓW</h5>
						
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="jedzenie" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="mieszkanie" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="transport" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="telekomunikacja" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="opieka zdrowotna" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="ubranie" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="higiena" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="dzieci" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="rozrywka" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="wycieczka" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="szkolenia" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="książki" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="oszczędności" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="na emeryturę" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="spłąta długów" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="darowizna" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="inne wydatki" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<button class="btn my-4" type="button"><i class="icon-tags mr-2"></i>Dodaj nową kategorię</button> 
						
						<h5>RODZAJE PŁATNOŚCI</h5>
						
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="gotówka" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="karta kredytowa" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="karta debetowa" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						<div class="input-group mb-1 col-sm-12 col-lg-10 col-xl-8 mx-auto">
							<input class="form-control" type="text" value="Bitcoin" disabled="">
							<div class="input-group-append">
								<button class="btn mx-1" type="button" ><i class="icon-pencil"></i></button>
								<button class="btn" type="button"><i class="icon-trash-empty"></i></button>
							</div>
						</div>
						
						<button class="btn my-4" type="button"><i class="icon-tags mr-2"></i>Dodaj nową kategorię</button>
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