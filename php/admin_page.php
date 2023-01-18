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
    session_start();
    require_once("../cfg.php");
    require_once("../admin/admin.php");

    if(isset($_POST['x1_submit'])) {
        $user = mysqli_real_escape_string($link, $_POST['login_email']);
        $password = mysqli_real_escape_string($link, $_POST['login_pass']);
        
        if($user == $login && $password == $pass) {
            $_SESSION['user'] = $user;
            $_SESSION['admin_logged_in'] = true;
            header("Location: cms.php");
        } 
        else {
            echo "Błędne dane. Proszę spróbować ponownie.";
            echo FormularzLogowania();
        }
    } 
    if ((isset($_SESSION['admin_logged_in'])) && ($_SESSION['admin_logged_in']==true)){  
        header('Location: cms.php');
        exit();
    }
?>

</body>
</html>