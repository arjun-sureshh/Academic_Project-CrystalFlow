<?php
include("../Assets/Connection/Connection.php");
session_start();
 
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>my profile</title>
</head>

<body>
<?php 
include("Head.php");
?>

<?php
$selmy="select * from tbl_company c inner join tbl_place p on c.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where company_id='".$_SESSION['cid']."'";
 $result=$Conn->query($selmy);
 $row=$result->fetch_assoc();
 
 
?>
  <table width="500" >
    <tr>
      <td>Logo</td>
      <td><img src="../Assets/Files/Company/Logo/<?php  echo $row['company_logo']?>" width="300px" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php  echo $row['company_name']?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php  echo $row['company_email']?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php  echo $row['company_contact']?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php  echo $row['district_name']?></td>
    </tr>
    <tr>
    <td>place</td>
    <td><?php echo $row['place_name']?></td>
    </tr>
    <td>proof</td>
    <td><img src="../Assets/Files/Company/Proof/<?php  echo $row['company_proof']?>" width="300px" /> </td>
   
  </table>
  
  <?php 
include("Foot.php");
?>

</body>
</html>