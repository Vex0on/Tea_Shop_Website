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
        echo EdytujKategorie(); # wywołanie funkcji edycji kategorii
        echo ListaKategorii(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # wywołanie funkcji wyświetlania kategorii z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-edit-k'])){ # gdy został wciśnięty przycisk o wartości name=btn-edit-k
            $category_id = $_POST['k_id']; # pobierane jest id podane w inpucie i przypisywane do zmiennej $category_id
            $category_name = $_POST['category_name']; # pobierana jest nazwa podana w inpucie i przypisywana do zmiennej $category_name
            $parent = $_POST['parent']; # pobierany jest rodzic kategorii podany w inpucie i przypisywany do zmiennej $parent
        
            $link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza); # połączenie z bazą przypisane do $link
        
            $query = "SELECT * FROM categories WHERE id='$category_id'"; # zapytanie MYSQL pobierające dane z bazy danych o $category_id
            $result = mysqli_query($link, $query); # rezultat poprzedniego zapytania zapisany do zmiennej $result
        
            if(mysqli_num_rows($result) == 1) { # sprawdza, czy liczba wyników zwróconych przez zapytanie SQL jest równa 1
                $row = mysqli_fetch_array($result); # jeśli tak, tworzony jest nowy wiersz za pomocą mysqli_fetch_array() z otrzymanych danych z bazy danych
                $existing_name = $row['category_name']; # przechowują nazwę kategorii
                $existing_parent = $row['parent']; # przechowuje rodzica kategorii
                if ($existing_name == $category_name && $existing_parent == $parent) { # jeśli nazwa i rodzic są takie same zwracany jest poniższy komunikat
                    echo "Kategoria o podanym tytule i zawartości już istnieje.";
                } elseif ($existing_name == $category_name) { # jeśli podana nazwa istnieje to jest aktualizowana
                    $query = "UPDATE categories SET category_name='$category_name', parent='$parent' WHERE id='$category_id'";
                    $result = mysqli_query($link, $query);
                    echo "Zawartość strony została zmieniona.";
                } elseif ($existing_parent == $parent) { # jeśli podany rodzic istnieje to jest aktualizowany
                    $query = "UPDATE categories SET category_name='$category_name', parent='$parent' WHERE id='$category_id'";
                    $result = mysqli_query($link, $query);
                    echo "Tytuł strony został zmieniony.";
                } else { # w innym przypadku aktualizowane jest wszystko
                    $query = "UPDATE categories SET category_name='$category_name', parent='$parent' WHERE id='$category_id'";
                    $result = mysqli_query($link, $query);
                }
            }
        }
    ?>
</body>
</html>