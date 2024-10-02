<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product upload</title>
</head>

<?php
include("../Assets/Connection/Connection.php");
session_start();
	if(isset($_POST['btn_submit']))
{
	$product_name=$_POST["txt_name"];
	$price=$_POST["txt_price"];
	$details=$_POST["txt_details"];
	$qyt=$_POST["txt_qty"];
    $cat = $_POST["sel_category"];
	$image=$_FILES['file_image']["name"];
	$path=$_FILES['file_image']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Company/CProduct/".$image);
	$insqry="insert into tbl_Product(product_name,product_price,product_qty,product_image,product_details,company_id,category_id) value('".    $product_name."','".$price."','".$qyt."','".$image."','".$details."','".$_SESSION['cid']."','$cat')";
	if($Conn->query($insqry))
	{
		?>
        <script>
		alert("inserted");
		window.location="productupload.php";
		</script>
        <?php
	}
    else
    {
      ?>
      <script>
	  alert("not inserted");
	  window.location="productupload.php";
	  </script>
      <?php
    }
}
else
{ 
	if(isset($_POST['btn_cancel']))
{
  ?>
      <script>
	  window.location="productupload.php";
	  </script>
      <?php
}
}
if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_product where product_id=".$_GET['did'];
	 if($Conn->query($delQry))
	 {
		 ?>
		 <script>
		 alert("Deleted");
		 window.location="ProductUpload.php";
		 </script>
     <?php
	 }
 }
?>
<?php 
include("Head.php");
?>
<body>


<form action="" method="post"  name="form" id="formid" enctype="multipart/form-data">
  <table width="500" border="2">
    <tr>
      <td>Product Name</td>
      <td>
      <input type="text" name="txt_name" id="txt_name" required="required" /></td>
    </tr>
      <td>Price
      <td>
      <input type="text" name="txt_price" id="txt_price" required="required" /></td>
    </tr>
    <tr>
    <td>Category</td>
     <td><select name="sel_category" id="dis_id" onChange="getplace(this.value)"> 
      <option value="">--SELECT--</option>
      <?php
	  $selqry="select * from tbl_category";
	  $result=$Conn->query($selqry);
	  while($row=$result->fetch_assoc())
	  {
	  ?>
       <option value="<?php  echo $row['category_id']?>" > <?php echo $row["category_name"] ?></option>
     <?php
	  }
	  
	 ?>
      </select></td>
    
    </tr>
    <tr>
    <td>Quantity</td>
    <td><input type="text" name="txt_qty" id="id_qyt" placeholder="quantity in -ML-"  required="required"/>
    </td>
    </tr>
    <tr>
    <td>Image</td>
    <td><input type="file" name="file_image" id="id_img"  required="required"/></td>
    </tr>
    
    <tr>
      <td>Details</td>
      <td>
        <textarea name="txt_details" id="txt_details" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_select" value="Submit" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" />
      </div></td>
    </tr>
  </table>
</form>



<table border="1">
<?php
$i=0;
$selqry="select * from tbl_product where company_id='".$_SESSION['cid']."'"; //p inner join tbl_subcategory d on d.subcategory_id=p.subcategory_id inner join tbl_category c on d.category_id=c.category_id ";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<tr>
<td>isno</td>
<td>product name</td>
<td>product price</td>
<td>Product_image</td>
<td>details</td>
<td>Quantity</td>
<td> &nbsp;&nbsp;&nbsp;&nbsp;Action</td>
</tr>
<?php
while($row=$result->fetch_assoc())
{
	$i++;
?>

<tr>
<td><?php echo $i?></td>
<td><?php echo $row['product_name'] ?></td>
<td>RS.<?php echo $row['product_price']?></td>
      <td><img src="../Assets/Files/Company/CProduct/<?php  echo $row['product_image']?>" width="300px" /></td>
<td><?php echo $row['product_details'] ?></td>
<td><?php echo $row['product_qty'] ?></td>

<td><a href="ProductUpload.php?did=<?php echo $row['product_id']?>">Delete</a>/<a href="Stock.php?sid=<?php  echo $row['product_id']?>">Stock</a></td>
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
