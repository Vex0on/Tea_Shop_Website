<?php
    session_start(); # rozpoczęcie sesji
    session_unset(); # usuwanie wszystkich zmiennych sesji
    header('Location: admin_page.php'); # przekierowanie na stronę logowania
?>