<?php declare(strict_types = 1); 
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fname'];
    if (empty($name)) {
      echo "Brak podanej wartości";
    } else {
      echo $name;
    }
  }

include 'Dodatek.php';

$nr_indeksu = '162681';
$nrGrupy = '4';

echo "<br /><br />";
echo 'Jacek Sosnowski - '. $nr_indeksu .' - grupa: ' . $nrGrupy . ' <br><br>';

echo 'Zastosowanie metody include() <br>';
echo 'Zadanie zrobione na przedmiot: ' . $przedmiot . ' (Skrót: ' . $skrot . ')' . '<br><br>';

function test(){
    require_once('Dodatek2.php');
    return $test;
}

echo test().'<br><br>';

$owoce = ['Truskawki', 'Maliny', 'banany'];
$dlg = count($owoce);
for ($owoc = 0; $owoc < $dlg; $owoc++){
    echo $owoce[$owoc];
    echo ', ';
}

$i = 0;
while ($i <= 8) {
    echo $i++;
}

$l1 = 5;
$l2 = 7;

if ($l1 < $l2) {
    echo '<br><br>' . 'Pierwsza liczba większa' . '<br><br>';
} else if ($l1 > $l2) {
    echo '<br><br>' . 'Druga liczba większa'. '<br><br>';
} else {
    echo '<br><br>' . 'Liczby są równe'. '<br><br>';
}

$statusyPlatnosci = [1, 2, 0];

foreach($statusyPlatnosci as $statusPlatnosci){
    switch($statusPlatnosci) {
        case 1:
            echo 'Opłacone';
            break;
        
        case 2:
            echo 'Odrzucone';
            break;    

        case 3:
            echo 'Oczekujące';
            break;  

        default:
            echo 'Status nieznany';
    }
    echo "<br />";
}

echo "<br />";

# Aby wywołać trzeba wejść na http://localhost/labor_4_162681_grupa4/labor_4_162681_grupa4.php/?name=Jacek

echo 'Hej ' . htmlspecialchars($_GET["name"]) . '!' . "<br />";

$_SESSION["nazwa"] = "sesja";
$_SESSION["test"] = "testttowo";
echo "Sesja wystartowała i jest odpowiednio ustawiona";

?>

</body>
</html>