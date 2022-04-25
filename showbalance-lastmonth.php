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
							
						<li class="col-lg-2 nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true"><i class="icon-chart-pie mr-2"></i>Przeglądaj bilans</a>
							
							
							<div class="dropdown-menu m-0 p-0" aria-labelledby="submenu">
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
					<div class="addoperation text-center py-4 my-5 mx-auto bg-white col-md-10 col-lg-8">
						<h4 class="font-weight-bold">PRZEGLĄDAJ BILANS</h4>
						<p>Poprzedni miesiąc<p>
						<div class="table1 col-md-8 mt-3 mx-auto">
							<table>
								<thead>
									<tr>
										<th class="tabletitle" colspan="4">PRZYCHODY</th>
									</tr>
								</thead>
								<tbody>
<?php
	
	$day = '01';
	$year = date('y');
	$month = date('m');
	$month--;
	if($month == 0){
		$month =12;
		$year--;
	}
	$lastMonthNumberOfDays = date('t', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
	$beginOfPeriod = $year.'-'.$month.'-'.$day;
	$endOfPeriod = date('Y-'.$month.'-'.$lastMonthNumberOfDays);
	
	$userid = $_SESSION['id'];
	
	require_once "connect.php";
	
	$connection = new mysqli($host, $db_user, $db_password, $db_name);
			
	if ($connection->connect_errno!=0)
	{
		$_SESSION['fail'] = '<span style ="color:red">Wyswietlenie bilansu nie powiodlo sie, spróbuj ponownie.</span>';
		header('Location:mainmenu.php');
	}
	
	else
	{
		echo'<tr><td class="tablesubtitle">Data</td><td class="tablesubtitle">Kategoria</td><td class="tablesubtitle">Komentarz</td><td class="tablesubtitle">Kwota</td></tr>';
			
		$incomeGenerallySQL = $connection->query("SELECT i.date_of_income, ic.name, i.income_comment, SUM(i.amount) FROM incomes AS i, incomes_category_assigned_to_users AS ic WHERE i.user_id='$userid' AND ic.user_id='$userid' AND ic.id=i.income_category_assigned_to_user_id AND i.date_of_income BETWEEN '$beginOfPeriod' AND '$endOfPeriod' GROUP BY income_category_assigned_to_user_id");
		$incomesSQL = $incomeGenerallySQL->fetch_all(MYSQLI_ASSOC);
		$incomesSum = 0;
		foreach($incomesSQL as $incomeSQL)
		{
				echo '<td>'.$incomeSQL['date_of_income']." PLN </td>";
				echo '<td>'.$incomeSQL['name']." PLN </td>";
				echo '<td>'.$incomeSQL['income_comment']."</td>";
				echo '<td>'.$incomeSQL['SUM(i.amount)']." PLN </br></td></tr>";
				$incomesSum += $incomeSQL['SUM(i.amount)'];
		}
		echo '<td class="tablesubtitle" colspan="3">SUMA</td><td><b>'.$incomesSum.' PLN </b></td></tr>';

?>
								</tbody>
									
							</table>
						</div>
						<div class="table1 col-md-8 mt-5 mx-auto">
							<table>
								<thead>
									<tr>
										<th class="tabletitle" colspan="4">WYDATKI</th>
									</tr>
								</thead>
								<tbody>
									<tr><td class="tablesubtitle">Data</td><td class="tablesubtitle">Kategoria</td><td class="tablesubtitle">Komentarz</td><td class="tablesubtitle">Kwota</td></tr>
<?php

	$expenseGenerallySQL = $connection->query("SELECT e.date_of_expense, ex.name, e.expense_comment, SUM(e.amount) FROM expenses AS e, expenses_category_assigned_to_users AS ex WHERE e.user_id='$userid' AND ex.user_id='$userid' AND ex.id=e.expense_category_assigned_to_user_id AND e.date_of_expense BETWEEN '$beginOfPeriod' AND '$endOfPeriod' GROUP BY expense_category_assigned_to_user_id");
	
		$expensesSQL = $expenseGenerallySQL-> fetch_all(MYSQLI_ASSOC);
		$expensesSum = 0;
		foreach($expensesSQL as $expenseSQL)
		{
			echo '<tr><td>'.$expenseSQL['date_of_expense']." PLN </td>";
			echo '<td>'.$expenseSQL['name']." PLN </td>";
			echo '<td>'.$expenseSQL['expense_comment']."</td>";
			echo '<td>'.$expenseSQL['SUM(e.amount)']." PLN </br></td></tr>";
			$expensesSum +=$expenseSQL['SUM(e.amount)'];
		}
		echo '<td class="tablesubtitle" colspan="3">SUMA</td><td><b>'.$expensesSum.' PLN </b></td></tr>';
	}			
?>
									
								</tbody>	
							</table>
						</div>
						<p class="h3 font-weight-bold my-3">BILANS:</p>
<?php
	$balance = $incomesSum-$expensesSum;
	
	echo '<b>'.$balance.' '.'PLN </b></br>';
	if ($balance>=0) 
		echo "<span style='color:green'>Gratulacje. Świetnie zarządzasz finansami!";
	else 
		echo "<span style='color:red'>Uważaj, wpadasz w długi!";
	
	$connection->close();
?>
										
					</div>
				</div>
			</section>
	</div>
	
	<footer>
		<div class="footer text-center">2021 © Kinga Kowal</div>
	</footer>
	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src ="js/bootstrap.min.js"></script>
</body>
</html>