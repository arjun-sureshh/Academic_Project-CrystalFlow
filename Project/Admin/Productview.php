<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product upload</title>
</head>
<?php 
include("Head.php");
?>
<body>

<table border="1">
<?php
$i=0;
$selqry="select * from tbl_product";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<tr>
<td>#</td>
<td>Product name</td>
<td>Product price</td>
<td>Product_image</td>
<td>Details</td>
<td>Quantity</td>
<td>Stock</td>
</tr>
<?php
while($row=$result->fetch_assoc())
{
	$i++;
?>

<tr>
<td><?php echo $i?></td>
<td><?php echo $row['product_name'] ?></td>
<td>RS.<?php echo $row['product_price']?>
</td>
      <td><img src="../Assets/Files/Company/CProduct/<?php  echo $row['product_image']?>" width="300px" /></td>
<td><?php echo $row['product_details'] ?></td>
<td><?php echo $row['product_qty'] ?></td>

<td>
      <?php 
      $selStock="select sum(stock_quantity) as stock from tbl_stock where product_id=".$row['product_id'];
      $resStock=$Conn->query($selStock);
      $dataStock=$resStock->fetch_assoc();
      echo $dataStock['stock'];
      ?>
</td>
</tr>
<?php
}
?>
</table>
<?php
}
?>

<?php 
include("Foot.php");
?>
<body>

</body>
</html>
