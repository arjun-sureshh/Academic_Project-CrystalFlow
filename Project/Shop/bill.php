<?php
include("../Assets/Connection/Connection.php"); 
$selqry="select * from tbl_cart c inner join tbl_booking b on b.booking_id=c.booking_id inner join tbl_shop u on u.shop_id=b.shop_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_company k on k.company_id=p.company_id where c.cart_id='".$_GET["id"]."'";
$result=$Conn->query($selqry);
$data=$result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Tax Invoice</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <style>
      * {
        box-sizing: border-box;
      }

      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        word-break: break-all;
      }

      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 16px;
      }
      .h4-14 h4 {
        font-size: 12px;
        margin-top: 0;
        margin-bottom: 5px;
      }
      .img {
        margin-left: "auto";
        margin-top: "auto";
        height: 30px;
      }
      pre,
      p {
        /* width: 99%; */
        /* overflow: auto; */
        /* bpicklist: 1px solid #aaa; */
        padding: 0;
        margin: 0;
      }
      table {
        font-family: arial, sans-serif;
        width: 100%;
        border-collapse: collapse;
        padding: 1px;
      }
      .hm-p p {
        text-align: left;
        padding: 1px;
        padding: 5px 4px;
      }
      td,
      th {
        text-align: left;
        padding: 8px 6px;
      }
      .table-b td,
      .table-b th {
        border: 1px solid #ddd;
      }
      th {
        /* background-color: #ddd; */
      }
      .hm-p td,
      .hm-p th {
        padding: 3px 0px;
      }
      .cropped {
        float: right;
        margin-bottom: 20px;
        height: 100px; /* height of container */
        overflow: hidden;
      }
      .cropped img {
        width: 400px;
        margin: 8px 0px 0px 80px;
      }
      .main-pd-wrapper {
        box-shadow: 0 0 10px #ddd;
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
      }
      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
 <br /><br /><br /><br /><br /><br />
  <button id="cmd" onClick="printDiv('content')" style="float:right;color:#FFF;background:#0C0;border:none;margin:20px;padding:10px;border-radius:10px" >Download Bill</button>
    <section class="main-pd-wrapper" style="width: 1000px; margin: auto" id="content">
      <div style="display: table-header-group">
        <h4 style="text-align: center; margin: 0">
          <b>Tax Invoice</b>
        </h4>

        <table style="width: 100%; table-layout: fixed">
          <tr>
            <td
              style="border-left: 1px solid #ddd; border-right: 1px solid #ddd"
            >
              <div
                style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                "
              >
              	<span
                style="color:#F93;font-size:56px">
                           CRYSTAL FLOW
                        </span>

                <p style="font-weight: bold; margin-top: 15px">
                  GST TIN : 06AAFCD6498P1ZT
                </p>
                <p style="font-weight: bold">
                  Toll Free No. :
                  <a href="tel:018001236477" style="color: #00bb07"
                    >1800-123-6477</a
                  >
                </p>
              </div>
            </td>
            <td
              align="right"
              style="
                text-align: right;
                padding-left: 50px;
                line-height: 1.5;
                color: #323232;
              "
            >
              <div>
                <h4 style="margin-top: 5px; margin-bottom: 5px">
                  Bill to/ Ship to
                </h4>
                <p style="font-size: 14px">
                  <?php echo $data["shop_address"] ?>
                  <br />
                  Tel:<?php echo $data["shop_contact"] ?>
                </p>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <table
        class="table table-bordered h4-14"
        style="width: 100%; -fs-table-paginate: paginate; margin-top: 15px"
      >
        <thead style="display: table-header-group">
          <tr
            style="
              margin: 0;
              background: #fcbd021f;
              padding: 15px;
              padding-left: 20px;
              -webkit-print-color-adjust: exact;
            "
          >
            <td colspan="3">
              <p>Booking Date:- <?php echo $data["booking_date"] ?></p>
              <p style="margin: 5px 0">Invoice Generated:- <?php echo date("Y-m-d"); ?></p>
              <p>Delivered Date:- <?php echo $data["cart_ddate"] ?></p>
                         
            </td>
            
            <td colspan="3" style="width: 300px">
              <h4 style="margin: 0">Sold By:</h4>
              <p>
                <?php echo $data["company_address"] ?>
              </p>
            </td>
          </tr>

          <tr>
            <th style="width: 50px">#</th>
            <th style="width: 150px">Product</th>
            <th style="width: 100px">Photo</th>
            <th style="width: 150px">Price</th>
            <th style="width: 80px">Qty</th>
            <th style="width: 120px"><h4>TOTAL Value</h4></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>01</td>
            <td><?php echo $data["product_name"] ?></td>
            <td><img src="../Assets/Files/Company/CProduct/<?php echo $data["product_image"];?>" width="119" height="92" /></td>
            <td><?php echo $data["product_price"] ?></td>
            <td><?php echo $data["cart_quantity"] ?></td>
            <td><?php echo $data["product_price"] * $data["cart_quantity"] ?></td>
          </tr>
        </tbody>
        <tfoot></tfoot>
      </table>

      
      <table class="hm-p table-bordered" style="width: 100%; margin-top: 30px">
        
        <tr style="background: #fcbd02">
          <th>Total Order Value</th>
          <td style="width: 70px; text-align: right; border-right: none">
            <b><?php echo $data["product_price"] * $data["cart_quantity"] ?></b>
          </td>
          <td colspan="5" style="border-left: none"></td>
        </tr>
      </table>
    </section>
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js'></script>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
