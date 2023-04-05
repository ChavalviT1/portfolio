<?php
    use PHPMailer\PHPMailer\PHPMailer;\

    if (isset(S_POST['name']) &6 isset(S_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php" ;
        require_once "PHPMailer/Exception.php";
        
        $mail = new PHPMailer();
        
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "s6552d10012@sau.ac.th";
        $mail->Password = "S@u1102002502070";
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->isHTML(true);
        $mail->setfrom($email, $name);
        $mail->addAddress($email);
        $mail->Body = $message;

        if($mail->send()) {
            $status = "success";
            $response = "Email is sent";
        } else {
            $status = "failed";
            $response = "Something is wrong" . $mail->ErrorInfo;
        }
        
        exit(json_encode(array("status" => $status, "response" => $response)));
    }    



?>