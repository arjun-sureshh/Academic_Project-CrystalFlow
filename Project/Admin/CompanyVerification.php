<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';
include("../Assets/Connection/Connection.php");
if(isset($_GET['acp']))
{
	$updQry="update tbl_company set company_vstatus=1 where company_id=".$_GET['acp'];
	if($Conn->query($updQry))
	{
    $selMail='select * from tbl_company where company_id='.$_GET['acp'];
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

    $mail->addAddress($dataMail["company_email"]);

    $mail->isHTML(true);

    $mail->Subject =" Verification Successful ----Welecom to Crystal Flow";
    $mail->Body = "Dear Company,-----------------------------------------------------------
    We are delighted to inform you that your details have been successfully verified by our administrative team at Crystal Flow. Your account has now been accepted, and you are officially welcomed to join our platform.You may proceed to upload your products and commence your sales or business activities on Crystal Flow. We believe that our platform will provide you with the tools and opportunities needed for success.Should you require any assistance or have questions as you navigate through the process, feel free to reach out to our dedicated support team at [8606687344].
    Thank you for choosing Crystal Flow.-----------------------------
     We look forward to a successful partnership!----------------------
     Best regards,-----------------------------------------------------------
     Crystal Flow Team";
                  if($mail->send()){
		?>
        <script>
			 alert("Accepted the company");
			 window.location="CompanyVerification.php";
			 </script>
             <?php
             }
             else{
              ?>
              <script>
                alert('Error')
              </script>
              <?php
             }
	}
}
if(isset($_GET['reg']))
{
	$updQry1="update tbl_company set company_vstatus=2 where company_id=".$_GET['reg'];
	if($Conn->query($updQry1))
	{
    $selMail='select * from tbl_company where company_id='.$_GET['reg'];
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

    $mail->addAddress($dataMail["company_email"]);

    $mail->isHTML(true);

    $mail->Subject =" Verification Status Update----- Crystal Flow";
    $mail->Body = "Dear Company,-----------------------------------------------------------
    We appreciate your interest in Crystal Flow and the effort you put into the verification process. After careful review, we regret to inform you that your verification request has not been approved at this time.We understand this may be disappointing, and we want to assure you that our decision is based on thorough evaluation. If you have any questions or would like further clarification, please don't hesitate to reach out to our support team at [8606687344].-------------------------------
    Thank you for considering Crystal Flow. We appreciate your understanding.-------------------------------- Team Best regards,-----------------------------------------------------------
          Crystal Flow Team";
                  if($mail->send()){
		?>
        <script>
			 alert("Rejected the company");
			 window.location="CompanyVerification.php";
			 </script>
             <?php
	}
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>company verification</title>
</head>
<?php

include("Head.php");
?>

<body>
  <H2 style="color: #0051ff7d; font-weight: 700;font-size: 29px;" > Company Verification</H2><br>
  <br>

<?php
$i=0;
$selqry="select * from tbl_company c inner join tbl_place p on c.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where company_vstatus=0 ";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>

  <table width="500">
    <tr>
      <td>#</td>
      <td>Name</td>
      <td>Address</td>
      <td>Location</td>
      <td>Email</td>
      <td>Phone.No</td>
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
    <td><?php echo $row['company_name']?></td>
    <td><?php echo $row['company_address']?></td>
    <td><?php echo $row['district_name']?>,<br><?php echo $row['place_name']?></td>
    <td><?php echo $row['company_email']?></td>
    <td><?php echo $row['company_contact']?></td>
    <td>  <a href="../Assets/Files/Company/Proof/<?php  echo $row['company_proof']?>"  download><img src="../Assets/Files/Company/Proof/<?php  echo $row['company_proof']?>" width="50px" />
    </a>
    </td>
    <td>   <a href="../Assets/Files/Company/Logo/<?php  echo $row['company_logo']?>"  target="_blank">
    <img src="../Assets/Files/Company/Logo/<?php  echo $row['company_logo']?>" width="50px" /> 
  </a>
  </td>
    <td><a href="companyverification.php?acp=<?php echo $row['company_id']?>">Accept</a>&nbsp;/<a href="companyverification.php?reg=<?php echo $row['company_id'] ?>">Reject</a>
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