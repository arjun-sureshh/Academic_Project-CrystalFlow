
<?php
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shop verification</title>
</head>
<?php

include("Head.php");
?>

<body>
<?php
$i=0;
$selqry="select * from tbl_shop s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where shop_vstatus= 2  ";

$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<H2 style="color: #0051ff7d;font-weight: 700;font-size: 29px;" > Rejected Shop List</H2>
<br><br>

  <table width="500" >
    <tr>
      <td>SI.NO</td>
      <td>Name</td>
      <td>Address</td>
      <td>District</td>
      <td>Place</td>
      <td>Email</td>
      <td>Phone.No</td>
      <td>Proof</td>
      <td>Photo</td>
    </tr>
    <?php
    while($row=$result->fetch_assoc())
	{
	$i++;
	
	?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['shop_name']?></td>
    <td><?php echo $row['shop_address']?></td>
    <td><?php echo $row['district_name']?></td>
    <td><?php echo $row['place_name']?></td>
    <td><?php echo $row['shop_email']?></td>
    <td><?php echo $row['shop_contact']?></td>
    <td><a herf="../Assets/Files/Shop/Proof/<?php  echo $row['shop_proof']?>"download> <img src="../Assets/Files/Shop/Proof/<?php  echo $row['shop_proof']?>" width="50px" /> </a>
  </td>
    <td><a herf="../Assets/Files/Shop/Photo/<?php  echo $row['shop_proof']?>"target="_blank"><img src="../Assets/Files/Shop/Photo/<?php  echo $row['shop_photo']?>" width="50px" /> </a>

  </td>
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
