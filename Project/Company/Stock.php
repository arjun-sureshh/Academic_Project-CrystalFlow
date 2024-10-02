<?php
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST['btn_submit']))
{
	$quantity=$_POST['txt_quantity'];
	$insquantity="insert into tbl_stock(stock_quantity,product_id,stock_date) value('".$quantity."','".$_GET['sid']."',curdate())";
	if($Conn->query($insquantity))
	{
		?>
        
        <script>
		alert("inserted");
		window.location="Stock.php";
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock </title>
</head>

<body>
<?php 
include("Head.php");
?>

<form id="form1" name="form1" method="post" action="">
  <table width="500" border="2">
    <tr>
      <td>Quantity</td>
      <td><label for="txt_quantity"></label>
      <input type="text" name="txt_quantity" id="txt_quantity" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<br>
<?php
$i=0;
$selqry="select * from tbl_stock s inner join tbl_product p on s.product_id=p.product_id  where p.company_id='".$_SESSION['cid']."' ";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<table border="3">
<tr>
<td>sino</td>
<td>Product_Name</td>
<td>Quantity</td>
<td>Date</td>
</tr>
<?php
while($row=$result->fetch_assoc())
{
	$i++;
	
?>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $row['product_name']?> </td>
<td><?php echo $row['stock_quantity']?></td> 
<td> <?php echo $row['stock_date']?></td>
</tr>
<?php
}
?>
</table>
<?php 
}
else
{
	echo"no data found";
}
?>
<?php 
include("Foot.php");
?>

</body>
</html>