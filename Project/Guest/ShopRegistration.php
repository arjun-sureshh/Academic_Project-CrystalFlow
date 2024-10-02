

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMail/src/Exception.php';
require 'phpMail/src/PHPMailer.php';
require 'phpMail/src/SMTP.php';



include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit1']))
{
  

  $shop = "select * from tbl_shop where shop_email='".$_POST['txt_email']."'";
  $shopres = $Conn->query($shop);

  if($row = $shopres->fetch_assoc())
  {
    ?>
    <script>
      alert("Email Already Exist..")
    </script>
    <?php
  }
  else
  {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'crystalflow8606@gmail.com'; // Your gmail
    $mail->Password = 'xrkniocnufgkjrqa'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('crystalflow8606@gmail.com'); // Your gmail

    $mail->addAddress($_POST["txt_email"]);

    $mail->isHTML(true);

    $mail->Subject =" Your Registration is currently being verified";
    $mail->Body = "Dear Shop,-----------------------------------------------------------
    Thank you for reaching out to Crystal Flow!.
    This is to confirm that we have received your request. Our Admin team is currently in the process of verifying the details provided.Once the verification is complete, you can expect to receive an email with further information and any relevant details regarding your inquiry.We appreciate your patience during this process. If you have any immediate questions or concerns, please feel free to contact us at [8606687433].
    Best regards,-----------------------------------------------------------Crystal Flow  Team";                       
      if($mail->send())
      {
        $name=$_POST['txt_name'];
        $contact=$_POST['txt_contact'];
        $district=$_POST['sel_district'];
        $place=$_POST['sel_place'];
        $address=$_POST['txt_address'];
        $email=$_POST['txt_email'];
        $Password=$_POST['txt_Password'];
        $photo=$_FILES['file_photo']["name"];
        $path=$_FILES['file_photo']['tmp_name'];
        move_uploaded_file($path,"../Assets/Files/Shop/Photo/".$photo);
        $proof=$_FILES['file_proof']["name"];
        $path1=$_FILES['file_proof']['tmp_name'];
        move_uploaded_file($path1,"../Assets/Files/Shop/Proof/".$proof);
        
        $insproduct="insert into tbl_shop(shop_name,shop_contact,shop_address,shop_email,shop_password,shop_photo,shop_proof,place_id) value('".$name."','".$contact."','".$address."','".$email."','".$Password."','".$photo."','".$proof."','".$place."')";
        if($Conn->query($insproduct))
        {
          ?>
              <script>
          alert("Shop Registered");
          window.location="ShopRegistration.php";
          </script>
              <?php
        }
      }
      else{
        ?>
          <script>
          alert("failed");
          window.location="ShopRegistration.php";
        </script>
        <?php
      }
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shop registration </title>
</head>

<body>
<?php 
include("Head.php");
?>
<H2 style="color:black;font-weight: 700;font-size: 29px;" > Shop Registration</H2>
<p></p>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="500" >
    <tr>
      <td style="color:black">Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" placeholder="Enter name"  required="required" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td style="color:black">Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" placeholder="Enter Contact" required  pattern="([0-9]{10,10})" title="Phone number with  10 digit with 0-9"/></td>
    </tr>
    <tr>
 <td style="color:black">District</td>
      <td><select name="sel_district" id="dis_id" onChange="getplace(this.value)"> 
      <option value="">select</option>
      <?php
	  $selqry="select * from tbl_district";
	  $result=$Conn->query($selqry);
	  while($row=$result->fetch_assoc())
	  {
	  ?>
       <option value="<?php  echo $row['district_id']?>"> <?php echo $row["district_name"] ?></option>
     <?php
	  }
	 ?>
      </select></td>
    </tr>
    <tr>
      <td style="color:black">PLace</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="place_id" required="required">
        <option value="">select</option>
        
      </select></td>
    </tr>
    <tr>
      <td style="color:black">Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"  placeholder="Enter Address" required="required"></textarea></td>
    </tr> 
    <tr>
      <td style="color:black">Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" placeholder="Enter Email" required="required" onkeyup="getEmail(this.value)" />
    
    </td>
    </tr>
    <tr>
      <td style="color:black">Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_Password" id="txt_password" placeholder="Enter Password" required="required"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/></td>
    </tr>
    <tr>
      <td style="color:black">Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required="required" /></td>
    </tr>
    <tr>
      <td style="color:black">Proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit1" id="btn_submit" value="Register" />
      </div></td>
    </tr>
  </table>
</form>
<?php 
include("Foot.php");
?>
</body>
</html>
<script src="../Assets/Jquery/jQuery.js"></script>

<script>
function getplace(pass)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+pass,
	  success: function(html){
		$("#place_id").html(html);
	  }
	});
}

function getEmail(email)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxEmail.php?email="+email,
	  success: function(html){
		$("#result").html(html);
	  }
	});
}
</script>