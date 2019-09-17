<?php

class Mail {

    function send($email, $Subject, $body) {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->AddAddress($email);
        $mail->Username = "Contact.RDVsh@gmail.com";
        $mail->Password = "heythemsiwar";
        $mail->SetFrom('Contact.RDVsh@gmail.com', 'Support RDV');
        $mail->AddReplyTo("Contact.RDVsh@gmail.com", "support RDV");
        $mail->Subject = $Subject;
        $mail->MsgHTML($body);
        $mail->Send();
    }

}
