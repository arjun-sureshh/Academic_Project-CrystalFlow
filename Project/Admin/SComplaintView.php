<?php
include("../Assets/Connection/Connection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shop complaint</title>
</head>
<?php

include("Head.php");
?>

<body>
<?php
$i=0;
$selqry="select * from tbl_shopcomplaint c inner join tbl_shop  p on c.shop_id=p.shop_id inner join tbl_company d on c.company_id=d.company_id   ";

$result=$Conn->query($selqry);
if($result->num_rows>0)
{
?>
<H2 style="color: #0051ff7d;font-weight: 700;font-size: 29px;" >  Complaint List </H2>

  <table width="500" >
    <tr>
      <td>SI.NO</td>
      <td>Title</td>
      <td>Content</td>
      <td>Company name</td>
      <td>Shop name</td>
      <td>Replay</td>
       </tr>
    <?php
    while($row=$result->fetch_assoc())
	{
	$i++;
	
	?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['scomplaint_title']?></td>
    <td><?php echo $row['scomplaint_content']?></td>
    <td><?php echo $row['company_name']?></td>
    <td><?php echo $row['shop_name']?></td>
    <td><a href="SComplaintReply.php?rep=<?php echo $row['scomplaint_id']?>">Reply</a>
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
