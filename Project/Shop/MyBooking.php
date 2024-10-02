<?php
ob_start();
include("Head.php");
session_start();
include("../Assets/Connection/Connection.php");
	{
		$selQry="select * from tbl_booking b inner join tbl_cart c on c.booking_id = b.booking_id inner join  tbl_product p on p.product_id = c.product_id inner join tbl_company k on k.company_id=p.company_id where shop_id='".$_SESSION["uid"]."' and booking_status>0 and cart_status>0"; 
		$res=$Conn->query($selQry);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRYSTAL_FLOW</title>
</head>

<body>
	<br><br><br><br><br>
	<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
<table border="1">
  <tr>
    <td>SlNo</td>
    <td>Name</td>
    <td>Photo</td>
    <td>Quantity</td>
    <td>Total amount</td>
    <td>Company Name</td>
    <td>Status</td>
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
    <td><?php echo  "$totalamount";?></td>
    <td><?php echo $row["company_name"];?></td>
	<td>
    <?php 
	      if($row["booking_status"]==1 && $row["cart_status"]==1)
					{
						?>
                        payment Pending 
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==1)
					{
						?>
                      Payement Completed
                       
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==2)
					{
						?>
                       Product Packed
                      
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==3)
					{
						?>
                      Product Shipped
                        <?php 
					}
					else if($row["booking_status"]==2 && $row["cart_status"]==4)
					{
						?>
                           Order Completed /
                           <a href="ProductRating.php?pid=<?php echo $row["product_id"]; ?>">Review</a>/
                           <a href="bill.php?id=<?php echo $row["cart_id"]; ?>">Bill</a>/
                           <a href="ShopComplaint.php?cid=<?php echo $row["company_id"]; ?>">Complaint</a>

                    <?php 
					}
					?>
                    </td>
					
					
       </tr>
<?php
	}
	}
	
	?>
    
</table>

</form>
	</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>