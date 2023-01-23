<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    # importowanie wymaganych plików dla PHPMailera

    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){  # jeśli formularz zostanie wysłany
        $mail = new PHPMailer(true); # tworzony jest nowy obiekt klasy PHPMailer

        $mail->isSMTP(); # który konfiguruje połączenie z serwerem SMTP
        $mail->Host = 'smtp.gmail.com'; # w tym przypadku Gmail
        $mail->SMTPAuth = true; # dalsza konfiguracja SMTP
        $mail->SMTPSecure = 'ssl'; # dalsza konfiguracja SMTP
        $mail->Port = 465; # ustawienie portu na 465
        $mail->Username = 'jaceksosphp@gmail.com'; # nazwa konta (email)
        $mail->Password = 'hytwoqijbhzpehow'; # hasło konta pobrane z ustawień gmaila
        
        $mail->addAddress("jaceksosphp@gmail.com"); # adres odbiorcy
        $mail->Subject = $_POST["subject"]; # temat wiadomości 
        $mail->Body = $_POST["message"]; # treść wiadomości
        
        $mail->isHTML(true); 
        
        if ( $mail->send() ) # wiadomość jest wysyłana przy użyciu metody send() 
        {
            echo "Email wysłany"; # jeśli zostanie wysłana pomyślnie, wyświetlany jest komunikat "Email wysłany"
        }else
        {
            echo "Błąd!"; # w przeciwnym razie "Błąd!"
        }
        
    }


    function PrzypomnijHaslo($pass){ # funkcja generuje formularz, który przesyła hasło do podanego adresu email
        echo'
            <form accept-charset="UTF-8" action="https://www.formbackend.com/f/6ba66b3cc9536956" method="POST">
                <input type="hidden" name="password" value="'.$pass.'"/>
                <input type="submit" name="x1_submit" value="Zapomniałeś hasła?" />
            </form>
        ';
    }
?>
