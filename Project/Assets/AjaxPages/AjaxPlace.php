<?php
include("../Connection/Connection.php");
?>
<option> select</option>
  <?php
	  $selqry2="select * from tbl_place where district_id='".$_GET['did']."'";
	  $result2=$Conn->query($selqry2);
	  while($row2=$result2->fetch_assoc())
	  {
	  ?>
       <option value="<?php  echo $row2['place_id']?>"> <?php echo $row2["place_name"] ?></option>
       <?php     
		  
	  }
	  ?>
      