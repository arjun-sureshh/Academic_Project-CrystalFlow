<?php
include("../Assets/Connection/Connection.php");
$category="";
$check="";
if(isset($_POST['btn_submit']))
  {
	  $category=$_POST['txt_category'];
	  $check=$_POST['txt_id'];
	  if($check=="")
	{

	  $insqry=" insert into tbl_category(category_name) values('".$category."')";
	  if($Conn->query($insqry))
	  {
		
		 ?>
		 <script>
		 alert("inserted");
		 window.location="category.php";
		 </script>
     <?php
	  }
	}
	else
	{
		$upqry="update tbl_category set category_name= '".$category."' where category_id=".$check;
		if($Conn->query($upqry))
		{
			?>
            <script>
			 alert("updated");
			 window.location="category.php";
			 </script>
             <?php
		}
	}
		  
		 
		  
		  
 }
 if(isset($_GET['did']))
 {
	 $delQry="delete from tbl_category where category_id=".$_GET['did'];
	 if($Conn->query($delQry))
	 {
		 ?>
		 <script>
		 alert("Deleted");
		 window.location="category.php";
		 </script>
     <?php
	 }
 }
 if(isset($_GET['eid']))
 {
	 $selqry="select * from tbl_category where category_id=".$_GET['eid'];
	 $result=$Conn->query($selqry);
	 $row=$result->fetch_assoc();
	 $category=$row['category_name'];
	 $check=$row['category_id']; 
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>
<?php

include("Head.php");
?>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td >Category</td>
      <td><label for="txt_category"></label>
      <input type="text" name="txt_category" id="txt_category" value="<?php echo $category ?>"  required="required"/></td>
      <td><input type="hidden" name="txt_id"  value="<?php echo $check?>"  required="required"/></td>

    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<br><br><br>
<?php
$i=0;
$selqry="select * from tbl_category";
$result=$Conn->query($selqry);
if($result->num_rows>0)
{
 	
?>
<table>
    <tr>
      <td>SlNo</td>
      <td>Name</td>
      <td>ACTION</td>
    </tr>
    <?php
	while($row=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
       <td> <?php echo $row['category_name']?></td>
       <td><a href="category.php?did=<?php echo $row['category_id']?>"> Delete</a> &nbsp;&nbsp;&nbsp;<a href="category.php?eid=<?php echo $row['category_id']?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
 <?php
  }
  else 
  {
	  echo "no data found";
	  }
  ?>
</body>
<?php

include("Foot.php");
?>

</html>