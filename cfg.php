<?
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza = 'moja_strona';

    $link = mysql_connect($dbhost, $dbuser, $dbpass);
    if (!$link) echo '<b>przerwane połączenie</b>';
    if(!mysql_select_dbi($baza)) echo 'nie wybrano bazy';
?>