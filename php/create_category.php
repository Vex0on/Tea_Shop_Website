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
        echo StworzKategorie();
        echo ListaKategorii(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # wywołanie funkcji wyświetlania kategorii z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-create-k'])){ # gdy został wciśnięty przycisk o wartości name=btn-create-k
            $category_name = $_POST['category_name']; # pobierana jest nazwa podana w inpucie i przypisywana do zmiennej $category_name
            $parent = $_POST['parent']; # pobierany jest rodzic kategorii podany w inpucie i przypisywany do zmiennej $parent

            $query = "INSERT INTO categories (category_name, parent) VALUES ('".$category_name."', '".$parent."')"; # zapytanie SQL dodające nowy wpis w bazie danych
            mysqli_query($link, $query); # wykonanie poprzedniego zapytania
            header("Location: create_category.php"); # przekierowanie na stronę create_category
            echo ListaKategorii(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # ponowne wywołanie funkcji w celu odświeżenia wyników
        }