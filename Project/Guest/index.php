<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';

if(isset($_POST["btn_send"]))
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'email@gmail.com'; // Your gmail
    $mail->Password = 'sqxicokfqshnbulo'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('email@gmail.com'); // Your gmail
  
    $mail->addAddress($_POST["txt_email"]);
  
    $mail->isHTML(true);
  
    $mail->Subject = $_POST["txt_subject"];
    $mail->Body = $_POST["txt_message"];
  if($mail->send())
  {
    echo "Sended";
  }
  else
  {
    echo "Failed";
  }
  
}
?>
<body>
    <form method="post">
        <table border="1" align="center">
            <tr>
                <td>Email</td>
                <td><input type="email" name="txt_email"></td>
            </tr>
            <tr>
                <td>Subject</td>
                <td><input type="text" name="txt_subject"></td>
            </tr>
            <tr>
                <td>Message</td>
                <td>
                    <textarea name="txt_message">

                </textarea>
            </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_send" value="Send"></td>
            </tr>
        </table>
    </form>
</body>
</html>