<?php
    $dbhost = 'localhost'; # zawiera adres hosta bazy danych (localhost)
    $dbuser = 'root'; # to nazwa użytkownika (root)
    $dbpass = ''; # to hasło (puste w tym przypadku)
    $baza = 'moja_strona'; # to nazwa bazy danych (moja_strona)

    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $baza); # zmienna przechowująca informacje o połączeniu, jeśli połączenie nie zostanie nawiązane, wyświetli się *echo

    $login = "admin"; # login do admin panelu
    $pass = "admin"; # hasło do admin panelu
    
    if (!$link) echo '<b>przerwane połączenie</b>'; # jeśli połączenie nie zostanie nawiązane, wyświetli się *echo poniżej komunikat "przerwane połączenie