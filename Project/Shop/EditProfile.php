<?php
include("../Assets/Connection/Connection.php");
session_start();
 $selqry="select * from tbl_shop where shop_id=".$_SESSION['uid'];
	$result=$Conn->query($selqry);
	$row=$result->fetch_assoc();

	
if(isset($_POST['btn_update']))
{
   $name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$address=$_POST['txt_address'];
	
	$upqry="update tbl_shop set shop_name= '".$name."',shop_contact='".$contact."',shop_email='".$email."',shop_address='".$address."' where shop_id=".$_SESSION['uid'];
		if($Conn->query($upqry))
		{
			?>
            <script>
			 alert("updated");
			 window.location="EditProfile.php";
			 </script>
             <?php
		}
	

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile </title>
</head>

<body>
<?php 
include("Head.php");
?>

<form id="form1" name="form1" method="post" action="">
  <table width="500" border="2">
    <tr>
      <td style="color:black">Name</td>
      <td style="color:black"><label for="txt_name2"></label>
      <input type="text" name="txt_name" id="txt_name2" value="<?php echo $row['shop_name']?>" required="required" /></td>
    </tr>
    <tr>
      <td style="color:black">Email</td>
      <td style="color:black"><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required" value="<?php echo $row['shop_email']?>"/></td>
    </tr>
    <tr> 
      <td style="color:black">Contact</td>
      <td style="color:black"><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" value="<?php echo $row['shop_contact']?>" /></td>
    </tr>
    <tr> 
    <td style="color:black">Address</td>
    <td style="color:black"><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required"><?php echo $row['shop_address']?></textarea></td>
    </tr> 
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_update" id="btn_upadte" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<?php 
include("Foot.php");
?>

</body>
</html>

	