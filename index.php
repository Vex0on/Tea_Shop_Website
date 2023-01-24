<?php 
session_start(); # rozpoczęcie sesji
$_SESSION['active'] = true; # ustawianie zmiennej $_SESSION['active'] na true
if (!isset($_GET['id'])) $_GET['id'] = 1; # pobranie parametru id za pomocą metody GET
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<title>Swiat Herbat</title>
		<meta name="Author" content="Jacek Sosnowski" />
		<link rel="stylesheet" href="css/styles.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
		<script src="./js/kolorujtlo.js" type="text/javascipt"></script>
		<script src="./js/timedate.js" type="text/javascipt"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<link rel="shortcut icon" href="#">
	</head>

	<!-- Panel nawigacyjny -->
	<body onload="startclock()">
		<header>
			<a class="logo" ><img src="Images/teashop3.png" alt="logo"></a>
			<nav>
				<ul class="nav__links">
					<li><a href="index.php?page=glowna&id=1">Strona główna</a></li>
                	<li><a href="index.php?page=oNas&id=2">O Nas</a></li>
                	<li><a href="index.php?page=sklep&id=3">Sklep</a></li>
					<li><a href="index.php?page=prezenty&id=4">Prezenty</a></li>
					<li><a href="index.php?page=funkcyjna&id=6">Funkcyjna</a></li>
					<li><a href="index.php?page=filmy&id=7">Filmy</a></li>
					<li><a href="index.php?page=kontakt&id=8">Kontakt</a>
				</ul>
			</nav>
			<a class="cta" href="./php/admin_page.php">Logowanie</a>
		</header>
		<div class="section-header" id="zegarek"></div>
		<div class="section-header" id="data"></div>
	</body>
	
	<?php
		error_reporting(E_ALL^E_NOTICE^E_WARNING); # błąd
		include('./cfg.php'); # import pliku konfiguracyjnego
		include('./showpage.php'); # import funkcji pokazującej treść strony
		if(!isset($_GET['id']))
		{
			$id = 1; # jeśli id nie jest ustawione to jest równe 1
		}
		else
		{
			$id = $_GET['id']; # jeśli id jest ustawione to jest przypisywane do $id
		}
		echo PokazPodstrone($id, $link); # wywołanie funkcji, która wyświetla treść odpowiedniej podstrony

    ?>

	<footer class="main-footer">
		<div class="container main-footer-container">
			<h3 class="site-name">Świat Herbat</h3>
			<ul class="nav footer-nav">
				<li>
					<a href="https://facebook.com" width="50" height="50" target="_blank">
						<img src="Images/Facebook1.png">
					</a>
				</li>
				<li>
					<a href="https://instagram.com" target="_blank">
						<img src="Images/Instagram1.png">
					</a>
				</li>
			</ul>
		</div>
	</footer>
</html>

<?php
$nr_indeksu = '162681';
$nr_grupy = '4';

echo 'Autor: Jacek Sosnowski ' . $nr_indeksu . ' grupa: ' . $nr_grupy . '<br /><br />';
?>