<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mailer {
    public function dathang($tieude, $noidung, $maidathang) {
        $mail = new PHPMailer(true);
         $mail->CharSet = 'UTF-8';
        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP(); 
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true; 
            $mail->Username = 'vundh.22ce@vku.udn.vn'; // Tài khoản email
            $mail->Password = 'vpui pihd qhbs lsvo'; 
            $mail->SMTPSecure = 'ssl'; 
            $mail->Port = 465; 

            //Recipients
            $mail->setFrom('vundh.22ce@vku.udn.vn', 'vu'); 
            $mail->addAddress($maidathang, 'vu');

            //Content
            $mail->isHTML(true); 
            $mail->Subject = $tieude;
            $mail->Body = $noidung; 

            $mail->send();
            echo 'Email đã được gửi thành công ';
        } catch (Exception $e) {
            echo 'Email chưa được gửi  ', $mail->ErrorInfo;
        }
    }
}

// class Mailer
$mailer = new Mailer();
// $mailer->dathang($tieude, $noidung,$maildathang);
?>
