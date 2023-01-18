<?php 
    session_start(); 
    if (!isset($_SESSION['admin_logged_in'])){  
        header('Location: admin_page.php');
        exit();
    }
    require_once('../admin/admin.php');
    require_once('../cfg.php');

?>

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
<table>
        <tr>
            <td><button class="b"><a href="create_page.php">Dodaj Podstronę</a></button></td>
            <td><button class="b"><a href="show_page.php">Pokaż Podstrony</a></button></td>
            <td><button class="b"><a href="edit_page.php">Edytuj Podstronę</a></button></td>
            <td><button class="b"><a href="delete_page.php">Usuń Podstronę</a></button></td>
        </tr>
</table>
</body>
</html>
