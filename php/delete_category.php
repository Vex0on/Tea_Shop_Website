<?php 
    require_once('../admin/admin.php'); # import pliku z funkcjami administracyjnimi
    require_once('../cfg.php'); # import pliku konfiguracyjnego
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
</head>
<body>
    <?php 
        echo UsunKategorie(); # wywołanie funkcji usuwającej kategorię z bazy danych
        echo ListaKategorii(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # wywołanie funkcji wyświetlania kategorii z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-delete-k'])){ # gdy został wciśnięty przycisk o wartości name=btn-delete-k
            $category_id = $_POST['k_id']; # pobierane jest id podane w inpucie
            $query = "DELETE FROM categories WHERE id = '".$category_id."'"; # zapytanie MYSQL usuwa kategorię o danym id z bazy
            mysqli_query($link, $query); # wynik poprzedniego polecenia
            header("Location: delete_category.php"); # przekierowanie do strony delete_category

            echo ListaPodstron(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # ponowne wywołanie funkcji w celu odświeżenia wyników
        }
