
<?php
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rejected company</title>
</head>
<?php

include("Head.php");
?>

<body>
<?php
$i=0;
$selqry="select * from tbl_company c inner join tbl_place p on c.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where company_vstatus=2 ";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<H2 style="color: #0051ff7d;font-weight: 700;font-size: 29px;" > Rejected Company List</H2>
  <table width="500">
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
    <td><?php echo $row['company_name']?></td>
    <td><?php echo $row['company_address']?></td>
    <td><?php echo $row['district_name']?></td>
    <td><?php echo $row['place_name']?></td>
    <td><?php echo $row['company_email']?></td>
    <td><?php echo $row['company_contact']?></td>
    <td> <a href="../Assets/Files/Company/Proof/<?php  echo $row['company_proof']?>" download><img src="../Assets/Files/Company/Proof/<?php  echo $row['company_proof']?>" width="50px" />
   </a>
  </td>
    <td>   <a href="../Assets/Files/Company/Logo/<?php  echo $row['company_logo']?>" target="_blank"><img src="../Assets/Files/Company/Logo/<?php  echo $row['company_logo']?>" width="50px" />
 </a>  

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


