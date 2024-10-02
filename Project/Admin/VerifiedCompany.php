
<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET['reg']))
{
	$updQry1="update tbl_company set company_vstatus=2 where company_id=".$_GET['reg'];
	if($Conn->query($updQry1))
	{
    ?>
    <script>
   alert("Rejected the company");
   window.location="CompanyVerification.php";
   </script>
         <?php
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRYSTAL_FLOW</title>
</head>
<?php

include("Head.php");
?>

<body>
<H2 style="color: #0051ff7d;font-weight: 700;font-size: 29px;" > Accepted Company List</H2>

<?php
$i=0;
$selqry="select * from tbl_company c inner join tbl_place p on c.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id  where  company_vstatus=1 ";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>

  <table width="300">
    <tr >
      <td>#</td>
      <td>Name</td>
      <td>Address</td>
      <td>Location</td>
      <td>Email</td>
      <td>Phone.No</td>
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>
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
    <td><?php echo $row['district_name']?>,<br><?php echo $row['place_name']?></td>
    <td><?php echo $row['company_email']?></td>
    <td><?php echo $row['company_contact']?></td>
    <td> <a href="../Assets/Files/Company/Proof/<?php  echo $row['company_proof']?>" download><img src="../Assets/Files/Company/Proof/<?php  echo $row['company_proof']?>" width="50px" />  Download</a>
   
  </td>
    <td>  <a href="../Assets/Files/Company/Logo/<?php  echo $row['company_logo']?>" target="_blank">  <img src="../Assets/Files/Company/Logo/<?php  echo $row['company_logo']?>" width="50px" /></a>
  
  </td>
  <td> <a href="companyverification.php?reg=<?php echo $row['company_id'] ?>">Reject</a></td>
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


