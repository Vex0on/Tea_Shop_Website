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
        echo EdytujPodstrone(); # wywołanie funkcji edycji strony
        echo ListaPodstron(mysqli_connect($dbhost, $dbuser, $dbpass, $baza)); # wywołanie funkcji wyświetlania podstron z danymi potrzebnymi do połączenia z bazą danych

        if(isset($_POST['btn-edit'])){ # gdy został wciśnięty przycisk o wartości name=btn-edit
            $page_id = $_POST['p_id']; # pobierane jest id podane w inpucie i przypisywane do zmiennej $page_id
            $title = $_POST['page_title']; # pobierany jest tytuł podany w inpucie i przypisywany do zmiennej $title
            $content = $_POST['page_content']; # pobierana jest treść strony podana w inpucie i przypisywana do zmiennej $content
            if(isset($_POST['p_status'])) { # jeśli status jest ustawiony na true
                $status = $_POST['p_status']; # pobierany jest status podany w inpucie i przypisywany do zmiennej $status
            } else {
                $status = 0; # w przeciwnym wypadku status jest równy 0
            }
        
            $link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza); # połączenie z bazą przypisane do $link
        
            $query = "SELECT * FROM page_list WHERE id='$page_id'"; # zapytanie MYSQL pobierające dane z bazy danych o $page_id
            $result = mysqli_query($link, $query); # rezultat poprzedniego zapytania zapisany do zmiennej $result
        
            if(mysqli_num_rows($result) == 1) { # sprawdza, czy liczba wyników zwróconych przez zapytanie SQL jest równa 1
                $row = mysqli_fetch_array($result); # jeśli tak, tworzony jest nowy wiersz za pomocą mysqli_fetch_array() z otrzymanych danych z bazy danych
                $existing_title = $row['page_title']; # przechowują tytuł podstrony
                $existing_content = $row['page_content']; # przechowuje treść podstrony
                if ($existing_title == $title && $existing_content == $content) { # jeśli tytuł i treść są takie same zwracany jest poniższy komunikat
                    echo "Podstrona o podanym tytule i zawartości już istnieje.";
                } elseif ($existing_title == $title) { # jeśli poadny tytuł istnieje to jest aktualizowany
                    $query = "UPDATE page_list SET page_content='$content', status='$status' WHERE id='$page_id'";
                    $result = mysqli_query($link, $query);
                    echo "Zawartość strony została zmieniona.";
                } elseif ($existing_content == $content) { # jeśli poadna treść istnieje to jest aktualizowana
                    $query = "UPDATE page_list SET page_title='$title', status='$status' WHERE id='$page_id'";
                    $result = mysqli_query($link, $query);
                    echo "Tytuł strony został zmieniony.";
                } else { # w innym przypadku aktualizowane jest wszystko
                    $query = "UPDATE page_list SET page_title='$title', page_content='$content', status='$status' WHERE id='$page_id'";
                    $result = mysqli_query($link, $query);
                }
            }
        }
    ?>
</body>
</html>