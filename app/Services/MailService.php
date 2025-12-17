<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
class MailService
{
    public static function sendActivation(string $to, string $link): void
    {
        if (!isset($_POST['sendMail'])) {
            exit;
        }

            $dotenv = Dotenv::createImmutable(__DIR__."/../../");
            $dotenv->load();

            $mail = new PHPMailer(true); 
            try {
                $mail->isSMTP();
                $mail->Host       = $_ENV["MAIL_HOST"];
                $mail->SMTPAuth   = true;
                $mail->Username   = $_ENV["MAIL_USERNAME"];
                $mail->Password   = $_ENV["MAIL_PASSWORD"];  // APP PASSWORD!
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = $_ENV["MAIL_PORT"];

                    $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                        'allow_self_signed' => true,
                    ],
                ];

                $receivermail=$_POST["email"];
                $receivername=$_POST["receivername"]; 
                $mail->setFrom($_ENV["MAIL_FROM"], $_ENV["MAIL_FROM_NAME"]);
                $mail->addAddress($receivermail, $receivername);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Aktivacija računa';
                $mail->Body    = "Kliknite za aktivaciju: $link";

                $mail->send();

                echo "Email uspješno poslan! Aktivirajte račun preko dobivenog aktivacijskog linka u mail-u";
                echo "<p><a href=\"index.php?page=login\">Početna stranica</a></p>";

            } catch (Exception $e) {
                echo "Email nije poslan. Error: {$mail->ErrorInfo}";
            }
    }
} 