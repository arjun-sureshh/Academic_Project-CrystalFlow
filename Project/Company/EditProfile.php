
<?php
include("../Assets/Connection/Connection.php");
session_start();
 $selqry="select * from tbl_company where company_id=".$_SESSION['cid'];
	$result=$Conn->query($selqry);
	$row=$result->fetch_assoc();

	
if(isset($_POST['btn_update']))
{
   $name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$address=$_POST['txt_address'];
	
echo	$upqry="update tbl_company set company_name= '".$name."',company_contact='".$contact."',company_email='".$email."',shop_address='".$address."' where company_id=".$_SESSION['cid'];
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
      <td>Name</td>
      <td><label for="txt_name2"></label>
      <input type="text" name="txt_name" id="txt_name2" value="<?php echo $row['company_name']?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email"  value="<?php echo $row['company_email']?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $row['company_contact']?>" /></td>
    </tr>
    <tr> 
    <td>Address</td>
    <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required"><?php echo $row['company_address']?></textarea></td>
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

	