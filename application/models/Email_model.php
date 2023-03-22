<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email_model extends CI_Model {
    
    function send_email($email_to, $subject, $message){
        if ($this->settings->mail_protocol == 'smtp') {

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
     
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP(); 

                $mail->Host     = $this->settings->mail_host;
                $mail->SMTPAuth = true;
                $mail->Username = $this->settings->mail_username;
                $mail->Password = base64_decode($this->settings->mail_password);
                if ($this->settings->mail_port == 587) {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       //Enable implicit TLS encryption
                } else {
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit SSL encryption
                }
                $mail->Port     = $this->settings->mail_port;       

                //Recipients
                $mail->setFrom($this->settings->mail_username, $this->settings->site_name);
                $mail->addAddress($email_to);     //Add a recipient
             
                //Content
                $mail->isHTML(true);                                          //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        } else {
            $this->load->library('email');
            $this->load->library('encryption');
            $this->email->set_mailtype('html');
            
            $this->email->from($this->settings->admin_email, $this->settings->site_name);
            $this->email->to($email_to);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
            if($this->email->send()){
               //Success email Sent
               return true;
            }else{
               //Email Failed To Send
               return $this->email->print_debugger();
            }
        }
    }

}