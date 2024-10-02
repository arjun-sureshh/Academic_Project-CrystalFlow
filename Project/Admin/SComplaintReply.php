<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRYSTAL_FLOW</title>
</head>
<?php
include("../Assets/Connection/Connection.php");
session_start();
	if(isset($_POST['btn_submit']))
{
	
	$complaintcontent=$_POST["txt_content"];
   echo $upqry="update tbl_shopcomplaint set scomplaint_reply= '".$complaintcontent."', scomplaint_status=1 where scomplaint_id=".$_GET['rep'];
	if($Conn->query($upqry))
	{
		?>
        <script>
		alert("Commented");
		window.location="SComplaintview.php";
		</script>
        <?php
	}
    else
    {
      ?>
      <script>
	  alert("not Reply Properly");
	  window.location="SComplaintReply.php";
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
      <td>Replay</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Replay" />
      </div></td>
    </tr>
  </table>
</form>
<?php 
include("Foot.php");
?>
</body>
</html>