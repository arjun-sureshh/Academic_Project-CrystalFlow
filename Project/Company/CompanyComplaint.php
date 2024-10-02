<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include("../Assets/Connection/Connection.php");
session_start();
	if(isset($_POST['btn_submit']))
{
	$complainttitle=$_POST["txt_title"];
	$complaintcontent=$_POST["txt_content"];
	$insqry="insert into tbl_companycomplaint(ccomplaint_title,ccomplaint_content,ccomplaint_date,company_id,shop_id) value('".$complainttitle."','".$complaintcontent."',curdate(),'".$_SESSION['cid']."','".$_GET['uid']."')";
	if($Conn->query($insqry))
	{
		?>
        <script>
		alert("inserted");
		window.location="CompanyComplaint.php";
		</script>
        <?php
	}
    else
    {
      ?>
      <script>
	  alert("not inserted");
	  window.location="CompanyComplaint.php";
	  </script>
      <?php
    }
}
?>

<body>
  <?php 
include("Head.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="500" >
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
      <td>Content</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<?php 
include("Foot.php");
?>
</body>
</html>