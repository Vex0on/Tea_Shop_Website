<!DOCTYPE html>
<html lang="pl">
<html>
  <head>
    <link rel="stylesheet" href="../css/shop.css">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <title>Swiat Herbat</title>
    <meta name="Author" content="Jacek Sosnowski" />
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <script src="./js/kolorujtlo.js" type="text/javascipt"></script>
    <script src="./js/timedate.js" type="text/javascipt"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="#">
  </head>
  <body onload="startclock()">
    <header>
        <a class="logo" ><img src="../Images/teashop3.png" alt="logo"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="../index.php?page=glowna&id=1">Strona główna</a></li>
                <li><a href="../index.php?page=oNas&id=2">O Nas</a></li>
                <li><a href="shop.php">Sklep</a></li>
                <li><a href="../index.php?page=prezenty&id=4">Prezenty</a></li>
                <li><a href="../index.php?page=funkcyjna&id=6">Funkcyjna</a></li>
                <li><a href="../index.php?page=filmy&id=7">Filmy</a></li>
                <li><a href="../index.php?page=kontakt&id=8">Kontakt</a>
            </ul>
        </nav>
        <a class="cta" href="../php/admin_page.php">Logowanie</a>
    </header>
    <div class="section-header" id="zegarek"></div>
    <div class="section-header" id="data"></div>
    <h1 class="section-header">SKLEP</h1>
</body>
</html>

<?php 
    require_once('../admin/admin.php'); # import pliku z funkcjami administracyjnimi
?>

<?php
session_start(); # rozpoczęcie nowej sesji / wznowienie istniejącej
function PokazProdukty(){
    require('../cfg.php'); # import pliku konfiguracyjnego
    $query = "SELECT * from products"; # zapytanie SQL wybierające wszystkie dane z tabeli products
    $result = mysqli_query($link, $query); # wykonanie zapytania zapisane do zmiennej $result
    echo '<table>'; # Tabela 
        echo '<tr>';
            echo "<th>Zdjęcie</th>";
            echo "<th>Nazwa</th>";
            echo "<th>Opis</th>";
            echo "<th>Cena</th>";
            echo "<th>Ilość</th>";
            echo "<th>Koszyk</th>";
        echo '</tr>'; 
        while($row = mysqli_fetch_array($result)){ # pętla while iterująca przez wiersze wyniku zapytania tworząc nowy wiersz w tabeli HYML dla każdego z nich
            echo '<tr>';
                echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="50%" height="50%"/></td>';
                echo "<td>" . $row["title"]. "</td>";
                echo "<td>" . $row["description"]. "</td>";
                echo "<td>" . $row["netto_value"]. "</td>";
                echo "<td>" . $row["amount"]. "</td>";
                echo "<td> <form action='shop.php' method='post'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <input type='submit' class='button' id='button' value='Dodaj', name='addCart'>
                </form>
                </td>";
            echo '</tr>';
        }

        echo '</table>';
}
?>
            <button onclick="location.href='cart.php'">Koszyk</button> <!--Przycisk przekierowujący do koszyka -->

            <?php
            function DodajDoKoszyka(){
            require("../cfg.php"); # import pliku konfiguracyjnego
            $product_id = $_POST['id'];
            $query = "SELECT amount FROM products WHERE id = $product_id"; # zapytanie pobierające ilość produktu z tabeli products gdzie id produktu jest równe temu pobranemu z tablicy wyżej
            $result = mysqli_query($link, $query); # wykonanie zapytania zapisane do zmiennej $result
            $product = mysqli_fetch_assoc($result);
            if($product['amount'] <= 0){ # sprawdzenie dostępności produktu
                echo "Brak produktu na stanie";
            }
            else # jeśli produkt jest na stanie zwiększa jego ilość w koszyku sesji
            {
                if(!isset($_SESSION['cart'][$product_id])){
                    $_SESSION['cart'][$product_id] = [
                        'id' => $product_id,
                        'value' => 1
                    ];
                }
                else
                {
                    $_SESSION['cart'][$product_id]['value']++;
                }
                header('Location: shop.php');
            }
        }
?>
<?php
  if(isset($_POST['addCart'])){ # Sprawdzenie czy przycisk Dodaj został naciśnięty
    DodajDoKoszyka(); # Wywołanie funkcji DodajDoKoszyka()
}
?>


<?php
PokazProdukty(); # Wywołanie funkcji PokazProdukty()
?>
    </section>
    <footer class="main-footer">
		<div class="container main-footer-container">
			<h3 class="site-name">Świat Herbat</h3>
			<ul class="nav footer-nav">
				<li>
					<a href="https://facebook.com" width="50" height="50" target="_blank">
						<img src="../Images/Facebook1.png">
					</a>
				</li>
				<li>
					<a href="https://instagram.com" target="_blank">
						<img src="../Images/Instagram1.png">
					</a>
				</li>
			</ul>
		</div>
	</footer>
</body>
</html>

<!-- <?php
$nr_indeksu = '162681';
$nr_grupy = '4';

echo 'Autor: Jacek Sosnowski ' . $nr_indeksu . ' grupa: ' . $nr_grupy . '<br /><br />';
?> -->

