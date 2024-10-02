<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_update']))
{
		session_start();
	$selqry="select * from tbl_company where company_id='".$_SESSION['cid']."'";
	$result=$Conn->query($selqry);
    $result=$Conn->query($selqry);
	$row=$result->fetch_assoc();
	$oldpassword=$row['company_password'];
  $cpassword=$_POST['txt_password'];
  $newpassword=$_POST['txt_newpassword'];
  $repassword=$_POST['txt_repassword'];
    if($oldpassword==$cpassword)
    {
        if($newpassword==$repassword)
      {
      $upqry="update tbl_company set company_password='".$newpassword."' where company_id='".$_SESSION['cid']."'";
        if($Conn->query($upqry))
            {
              ?>
                    <script>
              alert("updated");
              window.location="myprofile.php";
              </script>
                    <?php
            }
      }
    else
  {
  ?>
              <script>
        alert("new password and confirm password not same");
        window.location="myprofile.php";
        </script>
              <?php
      }

}
else
{
	?>
            <script>
			 alert("password is not correct  ");
			 window.location="ChangePassword.php";
			 </script>
             <?php

}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
include("Head.php");
?>

<form method="post">
<table width="500" border="2">
  <tr>
    <td>Current Password</td>
    <td>
      <input type="text" name="txt_password" id="txt_password"  /></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
  </tr>
  <tr>
    <td>Re_Password</td>
    <td>
    <input type="text" name="txt_repassword" id="txt_repassword" /></td></tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="btn_update" id="btn_update" value="Submit" />
    </div></td>
    </tr>
</table>
</form>
<?php 
include("Foot.php");
?>

</body>
</html>