<?php
include("../Assets/Connection/Connection.php");
session_start();
 $selmy="select * from tbl_shop u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where shop_id='".$_SESSION['uid']."'";
 $result=$Conn->query($selmy);
 
 

 $row=$result->fetch_assoc();
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>my profile</title>
</head>

<body >
<?php 
include("Head.php");
?>

  <table width="500" border="2" style="color:black">
    <tr>
      <td style="color:black">Photo</td>
      <td style="color:black"><img src="../Assets/Files/Shop/Photo/<?php  echo $row['shop_photo']?>" width="300px" /></td>
    </tr>
    <tr>
      <td style="color:black">Name</td>
      <td style="color:black"><?php  echo $row['shop_name']?></td>
    </tr>
    <tr>
      <td style="color:black">Email</td>
      <td style="color:black"><?php  echo $row['shop_email']?></td>
    </tr>
    <tr>
      <td style="color:black">Contact</td>
      <td style="color:black"><?php  echo $row['shop_contact']?></td>
    </tr>
    <tr>
      <td style="color:black">Address</td>
      <td style="color:black"><?php  echo $row['shop_address']?></td>
    </tr>
   
  </table>
  
  <?php 
include("Foot.php");
?>

</body>
</html>