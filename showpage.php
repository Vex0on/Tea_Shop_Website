<?php

function PokazPodstrone($id, $link){ # funkcja przyjmująca dwa argumenty - $id oraz $link (z połączeniem z bazą danych)
    
    $id_clear = htmlspecialchars($id); # filtr przekazanego $id przy użyciu funkcji htmlspecialchars zapisujący wynik do $id_clear
    
    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1"; # zapytanie SQL, które pobiera dane z tabeli page_list o id równym $id_clear
    $result = mysqli_query($link, $query); # zapisanie wyniku poprzedniego zapytania do zmiennej $result
    $row = mysqli_fetch_array($result); # zmiennd, która przechowuje wynik zapytania jako tablicę

    if(empty($row['id']))  # jeśli tablica jest pusta lub nie zawiera klucza 'id', zmienna $web zostaje ustawiona na komunikat "[nie znaleziono strony]"
    {
        $web = '[nie znaleziono strony]';
    }
    else # w przeciwnym razie, zmienna $web zostaje ustawiona na zawartość strony z kolumny page_content
    {
        $web = $row['page_content'];
    }
    return $web; # funkcja zwraca zawartość zmiennej $web
}