<?php
include("../Connection/Connection.php");

$com = "select * from tbl_company where company_email='".$_GET["email"]."'";
$comres = $Conn->query($com);

$shop = "select * from tbl_shop where shop_email='".$_GET["email"]."'";
$shopres = $Conn->query($shop);

if($row = $comres->fetch_assoc())
{
    echo "Existing Email";
}
else if($row = $shopres->fetch_assoc())
{
    echo "Existing Email";
}
else
{
    echo "Available";
}
?>