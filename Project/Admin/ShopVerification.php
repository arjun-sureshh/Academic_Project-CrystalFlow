<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';
include("../Assets/Connection/Connection.php");
if(isset($_GET['acp']))
{
	$updQry="update tbl_shop set shop_vstatus=1 where shop_id=".$_GET['acp'];
	if($Conn->query($updQry))
	{
    $selMail='select * from tbl_shop where shop_id='.$_GET['acp'];
    $resMail=$Conn->query($selMail);
    $dataMail=$resMail->fetch_assoc();
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'crystalflow8606@gmail.com'; // Your gmail
    $mail->Password = 'xrkniocnufgkjrqa'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('crystalflow8606@gmail.com'); // Your gmail

    $mail->addAddress($dataMail["shop_email"]);

    $mail->isHTML(true);

    $mail->Subject ="Verification Successful ----Welecom to Crystal Flow";
    $mail->Body = "Dear Shop,-----------------------------------------------------------
     Your shop's verification process on Crystal Flow has been successfully completed. Congratulations on joining our platform!Your shop is now officially verified, and you can dive right into the exciting opportunities Crystal Flow offers. Start exploring, purchasing, and maximizing your presence on our platform to elevate your business.Should you have any queries or need assistance along the way, our support team is readily available. Don't hesitate to reach out at [8606687344].
    Thank you for choosing Crystal Flow. We're excited to be part of your business journey!-------------------------
    Best regards,-----------------------------------------------------------
    Crystal Flow Team";
                  if($mail->send())
                  
            
		?>
        <script>
			 alert("Accepted the shop");
			 window.location="ShopVerification.php";
			 </script>
             <?php
	}
}
if(isset($_GET['reg']))
{
	$updQry1="update tbl_shop set shop_vstatus=2 where shop_id=".$_GET['reg'];
	if($Conn->query($updQry1))
	{
    $selMail='select * from tbl_shop where shop_id='.$_GET['reg'];
    $resMail=$Conn->query($selMail);
    $dataMail=$resMail->fetch_assoc();
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'crystalflow8606@gmail.com'; // Your gmail
    $mail->Password = 'xrkniocnufgkjrqa'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('crystalflow8606@gmail.com'); // Your gmail

    $mail->addAddress($dataMail["shop_email"]);

    $mail->isHTML(true);

    $mail->Subject =" Verification Status Update----- Crystal Flow";
    $mail->Body = " Dear Shop,-----------------------------------------------------------
    We appreciate your interest in joining Crystal Flow and submitting your shop for verification. After careful review, we regret to inform you that your shop verification request has not been approved at this time.Our decision is based on a thorough assessment, and unfortunately, we are unable to proceed with the verification for your shop on Crystal Flow. If you have any questions or would like further clarification, please feel free to reach out to our support team at [8606687344].
    Thank you for considering Crystal Flow,
     and we wish you success in your future endeavors.--------------------------------------------
     Best regards,-----------------------------------------------------------
     Crystal Flow  Team";
                  if($mail->send())
		?>
        <script>
			 alert("Rejected the shop");
			 window.location="ShopVerification.php";
			 </script>
             <?php
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shop verification</title>
</head>
<?php

include("Head.php");
?>

<body>
<?php
$i=0;
$selqry="select * from tbl_shop s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where shop_vstatus=0   ";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<H2 style="color: #0051ff7d;font-weight: 700;font-size: 29px;" >Shop Verification</H2><br>

  <table width="500" >
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Address</td>
      <td>Location</td>
      <td>Email</td>
      <td>Ph.No</td>
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
    <?php
    while($row=$result->fetch_assoc())
	{
	$i++;
	
	?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['shop_name']?></td>
    <td><?php echo $row['shop_address']?></td>
    <td><?php echo $row['district_name']?>,<br><?php echo $row['place_name']?></td>
  
    <td><?php echo $row['shop_email']?></td>
    <td><?php echo $row['shop_contact']?></td>
    <td>
    <a href="../Assets/Files/Shop/Proof/<?php  echo $row['shop_proof']?>"download><img src="../Assets/Files/Shop/Proof/<?php  echo $row['shop_proof']?>" width="50px" /></a>
  </td>
  <td>  <a href="../Assets/Files/Shop/Photo/<?php  echo $row['shop_photo']?>" target="_blank"><img src="../Assets/Files/Shop/Photo/<?php  echo $row['shop_photo']?>" width="50px" />
   </a>
  </td>
    <td><a href="shopverification.php?acp=<?php echo $row['shop_id']?>">Acp</a>/&nbsp;<a href="shopverification.php?reg=<?php echo $row['shop_id'] ?>">Rej</a>
   </td>
    </tr>
    <?php
	}
	?>
  </table>
  <?php
}
  ?>
</body>
<?php

include("Foot.php");
?>

</html>