<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';

ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
$selQry="select *from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id where p.company_id='".$_SESSION["cid"]."' and b.booking_status!='0' and c.cart_status!='0'";
// echo $selQry;
$res=$Conn->query($selQry);
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
		if($Conn->query($upQry))
		{
			?>
            <script>
				window.location="OrderDetails.php";
			</script>
            <?php
		}
	}

	if(isset($_GET["did"]))

	{
		$upQry="update tbl_cart set cart_status='".$_GET["sts"]."',cart_ddate=curdate() where cart_id='".$_GET["did"]."' ";
		if($Conn->query($upQry))
		{
			$selMail='select * from tbl_shop where shop_id='.$_GET["shop"];
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
		
			$mail->Subject =" your product is deliverd";
			$mail->Body = "product delliverd 
						  Thank you for choosing Crystal Flow";
						  if($mail->send())

			?>
            <script>
				window.location="OrderDetails.php";
			</script>
            <?php
		}
	}
	?>
    
            	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>order details</title>
</head>


<body>
	<br><br><br><br><br>
<h1 align="center">Order Details</h1>
<div id="tab" align="center">
<div align="center">
  <table  border="1">
    <tr>
      <td>SlNo</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total Amount</td>
	  <td>Booking Date</td>
	  <td>Delivered Date</td>
      <td>Action</td>
    </tr>
    <?php 
	$i=0;
	while($row=$res->fetch_assoc())
	{
		$quantity=$row["cart_quantity"];
		$price=$row["product_price"];
		$totalamount=$quantity*$price;
		$i++;
		?>
        <tr>
            <td><?php echo $i;?></td> 
            <td><?php echo $row["product_name"];?></td> 
            <td><img src="../Assets/Files/Company/CProduct/<?php echo $row["product_image"];?>" width="47" /></td>
            <td><?php echo $row["cart_quantity"];?></td>
            <td><?php echo $row["product_price"];?></td>
            <td><?php echo $totalamount;?></td>
			<td><?php echo $row["booking_date"];?></td>
			<td><?php echo $row["cart_ddate"];?></td>
	        <td>
			<?php  if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						
						?>
                        payment completed /
                        <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=2">Pack product</a>
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==2)
					{
						?>
                        product packed /
                        <a href="OrderDetails.php?cid=<?php echo $row ["cart_id"];?>&sts=3">Ship Product</a>
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==3)
					{
						?>
                        product shipped /
                        <a href="OrderDetails.php?did=<?php echo $row ["cart_id"];?>&sts=4&shop=<?php echo $row ["shop_id"];?>">Product Delivered</a>
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==4)
					{
						?>
                       Order Completed /
					   <a href="CompanyComplaint.php?uid=<?php echo $row ["shop_id"];?>">Complaint</a>
                        <?php 
					}
					?>
                    </td>
                    
				
       </tr>
<?php
	}
	?>
  </table>
</div>
</div>
</body>
<?php 
include("Foot.php");
ob_flush();
?>
</html>