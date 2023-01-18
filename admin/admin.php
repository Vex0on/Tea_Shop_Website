<?php

require_once('../cfg.php');

function FormularzLogowania(){
    $wynik = '
        <div class="logowanie-1">
            <h1 class="heading">Panel CMS:</h1>
            <div class="logowanie">
                <form method="POST" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
                    <table class="logowanie-2">
                        <tr><td class="log4_t"></td><td><input type="text" name="login_email" class="logowanie" placeholder="email"/></td></tr>
                        <tr><td class="log4_t"></td><td><input type="password" name="login_pass" class="logowanie" placeholder="password"/></td></tr>
                        <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="button" value="Zaloguj" /></td></tr>
                    </table>
                </form>
            </div>
        </div>
    ';
    return $wynik;
}

function ListaPodstron($link){
    $query = "SELECT * FROM page_list";
    $result = mysqli_query($link, $query);
    
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Tytuł podstrony</th>';
    echo '<th>Opcje</th>';
    echo '</tr>';
    while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['page_title'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}

function EdytujPodstrone(){
    $wynik = '
        <div class="editForm">
        <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <h1>Edytuj stronę: </h1>
                <input type="number" name="p_id" placeholder="ID strony">
                <input type="text" name="page_title" placeholder="Tytuł strony">
                <textarea name="page_content" rows="20" cols="70 "placeholder="Treść strony"></textarea>
                <label><input type="checkbox" name="p_status" class="checkbox">Aktywna?</label>
                <div>
                    <div><input type="submit" value="edytuj" class="edit" name="btn-edit"></div>
                </div>
            </form>
        </div>
        ';
    return $wynik;
}

function StworzPodstrone(){
    $wynik = '
        <div class="createForm">
        <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <h1>Dodaj stronę: </h1>
                <input type="number" name="p_id" placeholder="ID strony">
                <input type="text" name="page_title" placeholder="Tytuł strony">
                <textarea name="page_content" rows="20" cols="70 "placeholder="Treść strony"></textarea>
                <label><input type="checkbox" name="p_status" class="checkbox">Aktywna?</label>
                <div>
                    <div><input type="submit" value="stworz" class="create" name="btn-create"></div>
                </div>
            </form>
        </div>
        ';
    return $wynik;
}

function UsunPodstrone(){
    $wynik = '
        <div class="deleteForm">
        <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <h1>Usuń stronę: </h1>
                <input type="number" name="p_id" placeholder="ID strony">
                <div>
                    <div><input type="submit" value="usun" class="delete" name="btn-delete"></div>
                </div>
            </form>
        </div>
        ';
    return $wynik;
}

