<?php 
    ob_start();
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
        echo StworzProdukt();
        echo ListaProdukt(mysqli_connect($dbhost, $dbuser, $dbpass, $baza, 3307)); # wywołanie funkcji wyświetlania produktów z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-create-p'])){ # gdy został wciśnięty przycisk o wartości name=btn-create-p
            $title = $_POST['title']; # pobierany jest tytuł podany w inpucie i przypisywany do zmiennej $title
            $description = $_POST['description']; # pobierany jest rodzic kategorii podany w inpucie i przypisywany do zmiennej $parent
            $creation_date = date("Y-m-d H:i:s");
            $modify_date = date("Y-m-d H:i:s");
            $expiration_date = date('Y-m-d H:i:s', strtotime($creation_date. ' + 30 days'));
            $netto_value = $_POST['netto_value'];
            $vat = $_POST['vat'];
            $amount = $_POST['amount'];
            $availability_status = $_POST['availability_status'];
            $category = $_POST['category'];
            $weight = $_POST['weight'];
            $image = $_POST['image'];

            $query = "INSERT INTO products (title, description, creation_date, modify_date, expiration_date, netto_value, vat, amount, availability_status, category, weight, image) 
            VALUES ('".$title."', '".$description."', '".$creation_date."', '".$modify_date."', '".$expiration_date."', 
            '".$netto_value."', '".$vat."', '".$amount."', '".$availability_status."', '".$category."', '".$weight."', '".$image."')"; # zapytanie SQL dodające nowy wpis w bazie danych
            mysqli_query($link, $query); # wykonanie poprzedniego zapytania
            header("Location: create_product.php"); # przekierowanie na stronę create_category
            echo ListaProdukt(mysqli_connect($dbhost, $dbuser, $dbpass, $baza, 3307)); # ponowne wywołanie funkcji w celu odświeżenia wyników
        }
?>

<?php ob_end_flush(); ?>