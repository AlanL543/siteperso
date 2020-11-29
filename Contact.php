<form method="post" action="/Contact.php?action=post">
	<label for="email">Adresse e-mail : </label>
	<input type="email" required id="email" name="user_e-mail" placeholder="Saisissez votre adresse e-mail">
	<label for="Subject">Objet : </label>
	<input type="text" required id="Subject" name="Subject" placeholder="Objet">
	<label for="Message">Message : </label>
	<input type="text" required id="Message" name="Message" placeholder="Ecrivez ici...">
	<input type="submit" name="Envoyer">
</form>
<?php
include_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
 
function sendMail(string $to, string $from, string $from_name, string $subject, string $body) {
    $mail = new PHPMailer(true);  // Crée un nouvel objet PHPMailer
    $mail->IsSMTP(); // active SMTP
    $mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
    $mail->SMTPSecure = 'tls'; //or ssl
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; 
 
    $mail->SMTPAuth = true;  // Authentification SMTP active
    $mail->Username = "alan.leveque@sts-sio-caen.info";
    $mail->Password = 'yourpassword';
 
        $mail->isHTML(true);
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    $mail->Send();
}
try{
    sendMail($to, '$from', '$from_name', 'Test', '<h1>'.$_POST["Subject"]'</h1>''<p>'.$POST_["Message"]'</p>');
    echo 'Message envoyé';
}catch (\Exception $e){
    echo 'Erreur lors de lenvoi de votre message!';
}
?>