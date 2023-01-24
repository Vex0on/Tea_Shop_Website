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
        echo UsunPodstrone(); # wywołanie funkcji usuwającej podstronę z bazy danych
        echo ListaPodstron(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # wywołanie funkcji wyświetlania podstron z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-delete'])){ # gdy został wciśnięty przycisk o wartości name=btn-delete
            $page_id = $_POST['p_id']; # pobierane jest id podane w inpucie
            $query = "DELETE FROM page_list WHERE id = '".$page_id."'"; # zapytanie MYSQL usuwa stronę o danym id z bazy
            mysqli_query($link, $query); # wynik poprzedniego polecenia
            header("Location: delete_page.php"); # przekierowanie do strony delete_page

            echo ListaPodstron(mysqli_connect($dbhost, $dbuser, $dbpass, $baza, 3307)); # ponowne wywołanie funkcji w celu odświeżenia wyników
        }
