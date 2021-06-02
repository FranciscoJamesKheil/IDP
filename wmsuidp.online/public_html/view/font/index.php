<?php
        require 'phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mjlee32100@gmail.com';                 // SMTP username
        $mail->Password = 'mayJane32100m';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('mjlee32100@gmail.com', 'WMSU IDP Online');
        $mail->addAddress('bg201803128@wmsu.edu.ph');  

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'WMSU IDP Account';
        $mail->Body    = "<p>Greetings: <br> Herewith are your WMSU IDP account access codes: <br><br>Your username is <b>pauleen.faculty.ics</b><br>Your password is <b>p123</b> <br><br>To login, please go to <a href='wmsuidp.online'>wmsuidp.online</a>
            <br><br><p>Note:<br>
            1. The password will be change to your profile settings after loging in.<br>
            2. The username cannot be change (Unique).<br>
            3. Create and Keep the records of the Credentials of accounts for future use.<br>
            4. Please use <b><font color='#4285F4'>G</font><font color='#DB4437'>o</font><font color='#F4B400'>o</font><font color='#4285F4'>g</font><font color='#0F9D58'>l</font><font color='#DB4437'>e</font></b> Chrome browser, if possible.<br>
            5. Please ignore this message if you already received this message previously.</p>";

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
?>