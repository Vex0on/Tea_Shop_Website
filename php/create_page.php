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
        echo StworzPodstrone();
        echo ListaPodstron(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # wywołanie funkcji wyświetlania podstron z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-create'])){ # gdy został wciśnięty przycisk o wartości name=btn-create
            $page_title = $_POST['page_title']; # pobierany jest tytuł podany w inpucie i przypisywany do zmiennej $page_title
            $page_content = $_POST['page_content']; # pobierana jest treść strony podana w inpucie i przypisywana do zmiennej $page_content
            $status = $_POST['p_status']; # pobierany jest status podany w inpucie i przypisywany do zmiennej $status
            if ($status) # jeśli status zwraca prawdę to zmienna $active_status ma wartość 1
                $active_status = 1;
            else # w przeciwnym wypadku zmienna $active_status ma wartość 0
                $active_status = 0;

            $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('".$page_title."', '".$page_content."', '".$active_status."')"; # zapytanie SQL dodające nowy wpis w bazie danych
            mysqli_query($link, $query); # wykonanie poprzedniego zapytania
            header("Location: create_page.php"); # przekierowanie na stronę create_page
            echo ListaPodstron(mysqli_connect($dbhost, $dbuser, $dbpass, $baza, 3307)); # ponowne wywołanie funkcji w celu odświeżenia wyników
        }