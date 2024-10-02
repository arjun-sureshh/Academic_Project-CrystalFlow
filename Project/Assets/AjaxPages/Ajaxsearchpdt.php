<?php
include("../Connection/Connection.php");
$sel="select * from tbl_product where TRUE";
if($_GET['catid']!="")
{
	$sel= $sel." and category_id=".$_GET["catid"];
}
$res=$Conn->query($sel);
while($row=$res->fetch_assoc())
{
	?>
	<div class="card">
		<div>Name <?php echo $row["product_name"]?></div>
        <div>Price <?php echo $row["product_price"]?></div>
        <div><a href="">Book Now</a></div>
	</div>
	<?php
}
?>