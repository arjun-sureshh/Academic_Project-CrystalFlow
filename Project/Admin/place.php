
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit']))
{
	$place=$_POST['txt_place'];
	$district=$_POST['sel_district'];
    $insqry="insert into tbl_place(place_name,district_id) value('".$place."','".$district."')";
	if($Conn->query($insqry))
	{
		?>
        <script>
		alert("inserted");
		window.location="place.php";		
        </script>
        <?php
	}
	
}else
{ 
echo"enter any input";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>
<?php

include("Head.php");
?>


<body>
<H2 style="color: #0051ff7d;font-weight: 700;font-size: 29px;" >Place</H2>
<form id="form1" name="form1" method="post" action="">
  <table width="500" >
    <tr>
      <td>District</td>
      <td>
        <select name="sel_district" id="sel_id">
        <option >select</option>
        <?php
		$selqry="select * from tbl_district";
		$result=$Conn->query($selqry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['district_id']?>"><?php echo $row['district_name']?></option>
        <?php
		}
		?> 
        </select>
        </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_id"></label>
      <input type="text" name="txt_place" id="txt_id" cols="45" rows="5" required></td>
    </tr> 
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<br><br>
<br>
<?php
$i=0;
$selqry="select * from tbl_place p inner join tbl_district d on d.district_id=p.district_id";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<table>
<tr>
<td>SINO </td>
<td>District</td>
<td>place_name</td>
<td>Action</td>
</tr>
<?php
while($row=$result->fetch_assoc())
{
	$i++;
?>
<tr>
<td><?php echo $i?></td>
<td><?php echo $row['district_name'] ?></td>
<td><?php echo $row['place_name']?></td>
<td><a href="place.php?did=<?Php echo $row['place_id'] ?>">Delete</a></td>
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
