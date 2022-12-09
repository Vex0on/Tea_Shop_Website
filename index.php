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
	</head>

	<body>
		<header>
			<a class="logo" ><img src="Images/teashop3.png" alt="logo"></a>
			<nav>
				<ul class="nav__links">
					<li><a href="index.php?page=glowna&id=1">Strona główna</a></li>
                	<li><a href="index.php?page=oNas&id=2">O Nas</a></li>
                	<li><a href="index.php?page=sklep&id=3">Sklep</a></li>
					<li><a href="index.php?page=prezenty&id=4">Prezenty</a></li>
					<li><a href="index.php?page=wspolpraca&id=5">Współpraca</a></li>
					<li><a href="index.php?page=funkcyjna&id=6">Funkcyjna</a></li>
					<li><a href="index.php?page=filmy&id=7">Filmy</a></li>
				</ul>
			</nav>
			<a class="cta" href="index.php?page=kontakt&id=8">Kontakt</a>
		</header>
	</body>
	
	<?php
            error_reporting(E_ALL^E_NOTICE^E_WARNING);
			include('./cfg.php');
			include('./showpage.php');
			if(!isset($_GET['id']))
			{
				$id = 1;
			}
			else
			{
				$id = $_GET['id'];
			}
			echo PokazPodstrone($id)

            // $page_name = $_GET['page'];
            // $page = "./html/" . $page_name . ".html";

            // if(file_exists($page)){
            //     include($page);
            // }
            // else{
            //     include("./html/" .'blad.html');
            // }
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