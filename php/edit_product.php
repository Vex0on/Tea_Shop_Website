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
        echo EdytujProdukt(); # wywołanie funkcji edycji kategorii
        echo ListaProdukt(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # wywołanie funkcji wyświetlania kategorii z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-edit-p'])){ # gdy został wciśnięty przycisk o wartości name=btn-edit-p
            $product_id = $_POST['id'];
            $title = $_POST['title']; # pobierany jest tytuł podany w inpucie i przypisywany do zmiennej $title
            $description = $_POST['description']; # pobierany jest rodzic kategorii podany w inpucie i przypisywany do zmiennej $description
            $modify_date = date("Y-m-d H:i:s");
            $expiration_date = $_POST['expiration_date'];
            $netto_value = $_POST['netto_value'];
            $vat = $_POST['vat'];
            $amount = $_POST['amount'];
            $category = $_POST['category'];
            $weight = $_POST['weight'];
            $image = $_POST['image'];
            if(isset($_POST['availability_status'])) { # jeśli status jest ustawiony na true
                $status = 1; # pobierany jest status podany w inpucie i przypisywany do zmiennej $status
            } else {
                $status = 0; # w przeciwnym wypadku status jest równy 0
            }
        
            $link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza); # połączenie z bazą przypisane do $link
            $query = "UPDATE products SET title='$title', description='$description', modify_date='$modify_date', 
            expiration_date='$expiration_date', netto_value='$netto_value', vat='$vat', amount='$amount', availability_status='$status',
            category='$category', weight='$weight', image='$image' WHERE id='$product_id'";
            $result = mysqli_query($link, $query);
            header("Location: edit_product.php"); # przekierowanie na stronę edit_product
        }
    ?>
</body>
</html>
<?php ob_end_flush(); ?>


<!-- if(mysqli_num_rows($result) == 1) { # sprawdza, czy liczba wyników zwróconych przez zapytanie SQL jest równa 1
                $row = mysqli_fetch_array($result); # jeśli tak, tworzony jest nowy wiersz za pomocą mysqli_fetch_array() z otrzymanych danych z bazy danych
                $existing_title = $row['title']; # przechowują nazwę kategorii
                $existing_description = $row['description'];
                $existing_creation_date = $row['creation_date'];
                $existing_modify_date = $row['modify_date'];
                $existing_expiration_date = $row['expiration_date'];
                $existing_netto_value = $row['netto_value'];
                $existing_vat = $row['vat'];
                $existing_amount = $row['amount'];
                $existing_availability_status = $row['availability_status'];
                $existing_category = $row['category'];
                $existing_weight = $row['weight']; -->