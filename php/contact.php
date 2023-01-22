<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Username = 'jaceksosphp@gmail.com';
        $mail->Password = 'hytwoqijbhzpehow';
        
        $mail->addAddress("jaceksosphp@gmail.com");
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];
        
        $mail->isHTML(true);
        
        if ( $mail->send() )
        {
            echo "Email wysłany";
        }else
        {
            echo "Błąd!";
        }
        
    }


    function PrzypomnijHaslo($pass){
        echo'
            <form accept-charset="UTF-8" action="https://www.formbackend.com/f/6ba66b3cc9536956" method="POST">
                <input type="hidden" name="password" value="'.$pass.'"/>
                <input type="submit" name="x1_submit" value="Zapomniałeś hasła?" />
            </form>
        ';
    }
?>
