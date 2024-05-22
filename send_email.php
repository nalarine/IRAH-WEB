<?php
// Include PHPMailer library files
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sabbycarpie@gmail.com'; // Your Gmail address
        $mail->Password   = 'ktkn kdan cvzp vxsr'; // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('sabbycarpie@gmail.com', 'Irah Solutions');
        $mail->addAddress('sabbycarpie@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <html>
            <body>
                <h2>New Contact Form Submission</h2>
                <p><strong>First Name:</strong> $fname</p>
                <p><strong>Last Name:</strong> $lname</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Message:</strong> $message</p>
            </body>
            </html>
        ";

        $mail->send();
        echo "
            <html>
            <head>
                <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap' rel='stylesheet'>
                <style>
                    body {
                        font-family: 'Poppins', sans-serif;
                        background-color: #f4f4f4;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }
                    .container {
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        text-align: center;
                        width: 80%;
                        max-width: 500px;
                    }
                    .container h1 {
                        color: #095c1d;
                    }
                    .container p {
                        color: #333;
                    }
                    .btn {
                        display: inline-block;
                        margin-top: 20px;
                        padding: 10px 20px;
                        font-size: 16px;
                        color: #fff;
                        background-color: #095c1d;
                        border: none;
                        border-radius: 4px;
                        text-decoration: none;
                    }
                    .btn:hover {
                        background-color: #ffb000;
                        color: #000;
                    }
                    .logo {
                        width: 100px;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <img src='img/irahborder.png' alt='Irah Solutions Logo' class='logo'>
                    <h1>Thank You!</h1>
                    <p>Your message has been sent to Irah Solutions and Services Inc.</p>
                    <a href='contact.php' class='btn'>Go Back to Contact Page</a>
                </div>
            </body>
            </html>
        ";
    } catch (Exception $e) {
        echo "
            <html>
            <head>
                <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap' rel='stylesheet'>
                <style>
                    body {
                        font-family: 'Poppins', sans-serif;
                        background-color: #f4f4f4;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }
                    .container {
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        text-align: center;
                        width: 80%;
                        max-width: 500px;
                    }
                    .container h1 {
                        color: #d9534f;
                    }
                    .container p {
                        color: #333;
                    }
                    .btn {
                        display: inline-block;
                        margin-top: 20px;
                        padding: 10px 20px;
                        font-size: 16px;
                        color: #fff;
                        background-color: #095c1d;
                        border: none;
                        border-radius: 4px;
                        text-decoration: none;
                    }
                    .btn:hover {
                        background-color: #ffb000;
                        color: #000;
                    }
                    .logo {
                        width: 100px;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <img src='img/irahborder.png' alt='Irah Solutions Logo' class='logo'>
                    <h1>Message could not be sent</h1>
                    <p>Mailer Error: {$mail->ErrorInfo}</p>
                    <a href='contact.php' class='btn'>Go Back to Contact Page</a>
                </div>
            </body>
            </html>
        ";
    }
} else {
    echo "Invalid request method.";
}
?>
