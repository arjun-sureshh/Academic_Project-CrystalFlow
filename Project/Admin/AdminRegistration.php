<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST['Submitt_name']))
{
	$Name=$_POST['Name_name'];
	$Email=$_POST['Email_name'];
	$Contact=$_POST['Contact_name'];
	$Password=$_POST['Password_name'];
	$insqry="insert into tbl_admin(admin_name,admin_email,admin_contact,admin_password) value('".$Name."','".$Email."','".$Contact."','".$Password."')";
	if($Conn->query($insqry))
	{
		?>
        <script>
		alert("inserted");
		window.location="AdminRegistration.php";
		</script>
        <?php
	}
}
if(isset($_GET['did']))
{
	$delqry="delete from tbl_admin where admin_id=".$_GET['did'];
	if($Conn->query($delqry))
	{
		echo "deleted";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<form method="post">
<table width="500" border="2">
  <tr>
    <td>Name</td>
    <td>
      <input type="text" name="Name_name" id="Name_id" placeholder="enter name"  required="required"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <input type="email" name="Email_name" id="Email_id" placeholder=" enter email" required /></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td>
      <input type="text" name="Contact_name" id="Contact_id" placeholder="enter contact" required pattern="([0-9]{10,10})"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="Password_name" id="Password_id"   placeholder="enter password" required/></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td>
      <input type="password" name="Password_name" id="Password_id" /></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="Submitt_name" id="Submitt_id" value="Register" />
      &nbsp&nbsp&nbsp
      <input type="submit" name="Cancel_name" id="Cancel_id" value="Cancel" />
    </div></td>
    </tr>
</table>
</form>
<?php
$i=0;
$selqry="select * from tbl_admin";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<table border="3">
<tr>
<td>SINO</td>
<td>Name</td>
<td>Contact</td>
<td>Email</td>
<td>Action</td>
</tr>
<?php
while($row=$result->fetch_assoc())
{
	$i++
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $row['admin_name']?></td>
<td><?php echo $row['admin_contact']?></td>
<td><?php echo $row['admin_email']?></td>
<td><a href="AdminRegistration.php?did=<?php echo $row['admin_id']?>">delete</a></d>
</tr>
<?php
}
?>
</table>
<?php
}
?>
</body>
</html>