<?php
include("../Assets/Connection/Connection.php");


$district="";
$check="";
if(isset($_POST['submit']))
{
	$district=$_POST['txt_dis'];
	$check=$_POST['txt_id'];
	if($check=="")
	{
	$insQry="insert into tbl_district(district_name)values('".$district."')";
	if($Conn->query($insQry))
	{
		?>
		<script>
			 alert("inserted");
			 window.location="District.php";
		</script>
	<?php
    }
	}
	else
	{
		$upqry="update tbl_district set district_name= '".$district."' where district_id=".$check;
		if($Conn->query($upqry))
		{
			?>
            <script>
			 alert("updated");
			 window.location="District.php";
			 </script>
             <?php
		}
	}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_district where district_id=".$_GET['did'];
	if($Conn->query($delQry))
	{
		?>
        <script>
		alert("Deleted");
		window.location="District.php";
		</script>
        <?php
	}
}
if(isset($_GET['eid']))
{
	$selQry="select * from tbl_district where district_id=".$_GET['eid'];
	$result=$Conn->query($selQry);
	$row=$result->fetch_assoc();
	$district=$row['district_name'];
	$check=$row['district_id'];
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>
<?php

include("Head.php");
?>
<body>

<H2 style="color: #0051ff7d;font-weight: 700;font-size: 29px;" > District</H2>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td >District Name</td>
      <td><input type="text" name="txt_dis" id="txt_dis" value="<?php echo $district ?>"/>
	  <input type="hidden" name="txt_id"  value="<?php echo $check?>"  required="required"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">

        <input type="submit" name="submit" id="button" value="Submit" />

	</td>
    </tr>
  </table>
</form>
<br><br><br>
<?php
$i=0;
$selqry="select * from tbl_district";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
	?>
<table>
    <tr>
      <td >SINO</td>
      <td >DistrictName</td>
       <td >Action</td>
    </tr>
    <?php
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td> <?php echo $row['district_name']?></td>
       <td ><a href="District.php?did=<?php echo $row['district_id'] ?>">Delete</a>&nbsp;&nbsp;&nbsp;<a href="District.php?eid=<?php echo $row['district_id'] ?>">Edit</a></td>
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