<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <title>Swiat Herbat</title>
    <meta name="Author" content="Jacek Sosnowski" />
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="#">
    <title>CMS</title>
</head>

<body>
<?php
    session_start(); # rozpoczęcie sesji
    require_once("../cfg.php"); # import pliku konfiguracyjnego
    require_once("../admin/admin.php"); # import pliku z funkcjami administracyjnymi
    require_once("contact.php"); # import pliku od formularza kontaktowego
    echo FormularzLogowania(); # wywołanie funkcji FormularzLogowania z admin.php
    PrzypomnijHaslo($pass); # wywołanie funkcji przypominania hasła z contact.php

    if(isset($_POST['x1_submit'])) { # jeśli użytkownik wysła formularz logowania, przesyłane dane są filtrowane przy użyciu mysqli_real_escape_string, aby uniknąć ataków SQL injection
        $user = mysqli_real_escape_string($link, $_POST['login_email']); #
        $password = mysqli_real_escape_string($link, $_POST['login_pass']);
        
        if($user == $login && $password == $pass) { # sprawdzane są, czy przesłane dane logowania są zgodne z danymi zmiennych $login i $pass
            $_SESSION['user'] = $user;
            $_SESSION['admin_logged_in'] = true;
            header("Location: cms.php"); # jeśli warunek zwraca true, sesja jest ustawiana na zalogowanego użytkownika i przekierowuje na stronę cms.php
        } 
        else { # w przeciwnym razie wyświetlany jest komunikat o błędnych danych i ponownie wywoływany jest formularz logowania.
            echo "Błędne dane. Proszę spróbować ponownie.";
            echo FormularzLogowania();
        }
    } 
    if ((isset($_SESSION['admin_logged_in'])) && ($_SESSION['admin_logged_in']==true)){  # jeśli sesja jest już ustawiona na zalogowanego użytkownika, użytkownik jest przekierowywany 
        header('Location: cms.php'); # bezpośrednio na stronę cms.php.
        exit();
    }
?>

</body>
</html>