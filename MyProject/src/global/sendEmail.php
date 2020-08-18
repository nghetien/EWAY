<?php
    require "../src/library/phpmailer/credentical.php";
    require "../src/library/phpmailer/PHPMailer.php";
    require "../src/library/phpmailer/SMTP.php";
    require "../src/library/phpmailer/Exception.php";
    use PHPMailer\PHPMailer\PHPMailer;

    function sendEmail($token,$fName,$lName,$email){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom(EMAIL, 'Welcome to Eway');
        $mail->addAddress($email);
        $mail->addReplyTo(EMAIL);
        $mail->isHTML(true);

        $link = 'http://localhost/MyProject/pages/active.php?key='.$token;
        $html_content = file_get_contents('../src/global/formEmailSend.html');
        $html_content = preg_replace('/{link}/', $link, $html_content);

        $mail->Subject = 'Welcome '.$fName." ".$lName." to Eway";
        $mail->Body    = $html_content;
        $mail->AltBody = 'Active';
        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
    function sendEmailToken($email,$resetPwd){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom(EMAIL, '[Eway] Please reset your password');
        $mail->addAddress($email);
        $mail->addReplyTo(EMAIL);
        $mail->isHTML(true);

        $link = 'http://localhost/MyProject/pages/resetPwd.php?key='.$resetPwd;
        $html_content = file_get_contents('../src/global/formResetPwd.html');
        $html_content = preg_replace('/{link}/', $link, $html_content);

        $mail->Subject = "Please reset your password";
        $mail->Body    = $html_content;
        $mail->AltBody = 'Reset your password';
        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
?>