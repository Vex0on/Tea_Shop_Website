<link rel="stylesheet" href="../css/cms.css">

<?php 
    session_start(); # rozpoczęcie sesji
    if (!isset($_SESSION['admin_logged_in'])){   # jeśli sesja nie jest ustawiona na zalogowanego użytkownika, użytkownik jest przekierowywany na stronę logowania
        header('Location: admin_page.php'); # adres strony logowania
        exit();
    }
    require_once('../admin/admin.php'); # import pliku z funkcjami administracyjnymi
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
<table> <!-- tabela z przyciskami, które pozwalają na tworzenie, wyświetlanie, edycję i usuwanie podstron oraz wylogowanie się z panelu administracyjnego -->
        <tr>
            <td><button><a href="create_page.php">Dodaj Podstronę</a></button></td> <!-- tworzenie podstron -->
            <td><button><a href="show_page.php">Pokaż Podstrony</a></button></td> <!-- wyświetlanie podstron -->
            <td><button><a href="edit_page.php">Edytuj Podstronę</a></button></td> <!-- edycja podstron -->
            <td><button><a href="delete_page.php">Usuń Podstronę</a></button></td> <!-- usuwanie podstron -->
            <td><button><a href="logout.php"> Wyloguj się</a> <!-- wylogowanie z panelu -->
        </tr>
        <tr class="osobna">
            <td><button><a href="categories.php">Zarządzaj Kategoriami</a></button></td> <!-- zarządzanie kategoriami obiektowe -->
        </tr>
        <tr>
            <td><button><a href="create_product.php">Dodaj Produkt</button></td> <!-- tworzenie produktów -->
            <td><button><a href="show_product.php">Pokaż Produkty</button></td> <!-- wyświetlanie produktów -->
            <td><button><a href="edit_product.php">Edytuj Produkty</button></td> <!-- edycja produktów -->
            <td><button><a href="delete_product.php">Usuń Produkt</button></td> <!-- usuwanie produktów -->
        </tr>
</table>
</body>
</html>
