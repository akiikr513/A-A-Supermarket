<?php
  //invoice.php  
  include('database_connection.php');

  $statement = $connect->prepare("
    SELECT * FROM tbl_order 
    ORDER BY order_id DESC
  ");

  $statement->execute();

  $all_result = $statement->fetchAll();

  $total_rows = $statement->rowCount();

  if(isset($_POST["create_invoice"]))
  { 
    $order_total_before_tax = 0;
    $order_total_tax1 = 0;
    $order_total_tax2 = 0;
    
    $order_total_tax = 0;
    $order_total_after_tax = 0;
    $statement = $connect->prepare("
      INSERT INTO tbl_order 
        (order_no, order_date, order_receiver_name, order_receiver_address, order_total_before_tax, order_total_tax1, order_total_tax2,  order_total_tax, order_total_after_tax, order_datetime)
        VALUES (:order_no, :order_date, :order_receiver_name, :order_receiver_address, :order_total_before_tax, :order_total_tax1, :order_total_tax2,  :order_total_tax, :order_total_after_tax, :order_datetime)
    ");
    $statement->execute(
      array(
          ':order_no'               =>  trim($_POST["order_no"]),
          ':order_date'             =>  trim($_POST["order_date"]),
          ':order_receiver_name'          =>  trim($_POST["order_receiver_name"]),
          ':order_receiver_address'       =>  trim($_POST["order_receiver_address"]),
          ':order_total_before_tax'       =>  $order_total_before_tax,
          ':order_total_tax1'           =>  $order_total_tax1,
          ':order_total_tax2'           =>  $order_total_tax2,
         
          ':order_total_tax'            =>  $order_total_tax,
          ':order_total_after_tax'        =>  $order_total_after_tax,
          ':order_datetime'           =>  date("Y-m-d")
      )
    );

      $statement = $connect->query("SELECT LAST_INSERT_ID()");
      $order_id = $statement->fetchColumn();

      for($count=0; $count<$_POST["total_item"]; $count++)
      {
        $order_total_before_tax = $order_total_before_tax + floatval(trim($_POST["order_item_actual_amount"][$count]));

        $order_total_tax1 = $order_total_tax1 + floatval(trim($_POST["order_item_tax1_amount"][$count]));

        $order_total_tax2 = $order_total_tax2 + floatval(trim($_POST["order_item_tax2_amount"][$count]));

        

        $order_total_after_tax = $order_total_after_tax + floatval(trim($_POST["order_item_final_amount"][$count]));

        $statement = $connect->prepare("
          INSERT INTO tbl_order_item 
          (order_id, item_name, order_item_quantity, order_item_price, order_item_actual_amount, order_item_tax1_rate, order_item_tax1_amount, order_item_tax2_rate, order_item_tax2_amount,  order_item_final_amount)
          VALUES (:order_id, :item_name, :order_item_quantity, :order_item_price, :order_item_actual_amount, :order_item_tax1_rate, :order_item_tax1_amount, :order_item_tax2_rate, :order_item_tax2_amount, :order_item_final_amount)
        ");

        $statement->execute(
          array(
            ':order_id'               =>  $order_id,
            ':item_name'              =>  trim($_POST["item_name"][$count]),
            ':order_item_quantity'          =>  trim($_POST["order_item_quantity"][$count]),
            ':order_item_price'           =>  trim($_POST["order_item_price"][$count]),
            ':order_item_actual_amount'       =>  trim($_POST["order_item_actual_amount"][$count]),
            ':order_item_tax1_rate'         =>  trim($_POST["order_item_tax1_rate"][$count]),
            ':order_item_tax1_amount'       =>  trim($_POST["order_item_tax1_amount"][$count]),
            ':order_item_tax2_rate'         =>  trim($_POST["order_item_tax2_rate"][$count]),
            ':order_item_tax2_amount'       =>  trim($_POST["order_item_tax2_amount"][$count]),
            
            ':order_item_final_amount'        =>  trim($_POST["order_item_final_amount"][$count])
          )
        );
      }
      $order_total_tax = $order_total_tax1 + $order_total_tax2;

      $statement = $connect->prepare("
        UPDATE tbl_order 
        SET order_total_before_tax = :order_total_before_tax, 
        order_total_tax1 = :order_total_tax1, 
        order_total_tax2 = :order_total_tax2, 
         
        order_total_tax = :order_total_tax, 
        order_total_after_tax = :order_total_after_tax 
        WHERE order_id = :order_id 
      ");
      $statement->execute(
        array(
          ':order_total_before_tax'     =>  $order_total_before_tax,
          ':order_total_tax1'         =>  $order_total_tax1,
          ':order_total_tax2'         =>  $order_total_tax2,
          
          ':order_total_tax'          =>  $order_total_tax,
          ':order_total_after_tax'      =>  $order_total_after_tax,
          ':order_id'             =>  $order_id
        )
      );
      header("location:invoice.php");
  }

  if(isset($_POST["update_invoice"]))
  {
    $order_total_before_tax = 0;
      $order_total_tax1 = 0;
      $order_total_tax2 = 0;
      
      $order_total_tax = 0;
      $order_total_after_tax = 0;
      
      $order_id = $_POST["order_id"];
      
      
      
      $statement = $connect->prepare("
                DELETE FROM tbl_order_item WHERE order_id = :order_id
            ");
            $statement->execute(
                array(
                    ':order_id'       =>      $order_id
                )
            );
      
      for($count=0; $count<$_POST["total_item"]; $count++)
      {
        $order_total_before_tax = $order_total_before_tax + floatval(trim($_POST["order_item_actual_amount"][$count]));
        $order_total_tax1 = $order_total_tax1 + floatval(trim($_POST["order_item_tax1_amount"][$count]));
        $order_total_tax2 = $order_total_tax2 + floatval(trim($_POST["order_item_tax2_amount"][$count]));
        
        $order_total_after_tax = $order_total_after_tax + floatval(trim($_POST["order_item_final_amount"][$count]));
        $statement = $connect->prepare("
          INSERT INTO tbl_order_item 
          (order_id, item_name, order_item_quantity, order_item_price, order_item_actual_amount, order_item_tax1_rate, order_item_tax1_amount, order_item_tax2_rate, order_item_tax2_amount,  order_item_final_amount) 
          VALUES (:order_id, :item_name, :order_item_quantity, :order_item_price, :order_item_actual_amount, :order_item_tax1_rate, :order_item_tax1_amount, :order_item_tax2_rate, :order_item_tax2_amount, :order_item_final_amount)
        ");
        $statement->execute(
          array(
            ':order_id'                 =>  $order_id,
            ':item_name'                =>  trim($_POST["item_name"][$count]),
            ':order_item_quantity'          =>  trim($_POST["order_item_quantity"][$count]),
            ':order_item_price'            =>  trim($_POST["order_item_price"][$count]),
            ':order_item_actual_amount'     =>  trim($_POST["order_item_actual_amount"][$count]),
            ':order_item_tax1_rate'         =>  trim($_POST["order_item_tax1_rate"][$count]),
            ':order_item_tax1_amount'       =>  trim($_POST["order_item_tax1_amount"][$count]),
            ':order_item_tax2_rate'         =>  trim($_POST["order_item_tax2_rate"][$count]),
            ':order_item_tax2_amount'       =>  trim($_POST["order_item_tax2_amount"][$count]),
            
            ':order_item_final_amount'      =>  trim($_POST["order_item_final_amount"][$count])
          )
        );
        $result = $statement->fetchAll();
      }
      $order_total_tax = $order_total_tax1 + $order_total_tax2 ;
      
      $statement = $connect->prepare("
        UPDATE tbl_order 
        SET order_no = :order_no, 
        order_date = :order_date, 
        order_receiver_name = :order_receiver_name, 
        order_receiver_address = :order_receiver_address, 
        order_total_before_tax = :order_total_before_tax, 
        order_total_tax1 = :order_total_tax1, 
        order_total_tax2 = :order_total_tax2, 
         
        order_total_tax = :order_total_tax, 
        order_total_after_tax = :order_total_after_tax 
        WHERE order_id = :order_id 
      ");
      
      $statement->execute(
        array(
          ':order_no'               =>  trim($_POST["order_no"]),
          ':order_date'             =>  trim($_POST["order_date"]),
          ':order_receiver_name'        =>  trim($_POST["order_receiver_name"]),
          ':order_receiver_address'     =>  trim($_POST["order_receiver_address"]),
          ':order_total_before_tax'     =>  $order_total_before_tax,
          ':order_total_tax1'          =>  $order_total_tax1,
          ':order_total_tax2'          =>  $order_total_tax2,
          
          ':order_total_tax'           =>  $order_total_tax,
          ':order_total_after_tax'      =>  $order_total_after_tax,
          ':order_id'               =>  $order_id
        )
      );
      
      $result = $statement->fetchAll();
            
      header("location:invoice.php");
  }

  if(isset($_GET["delete"]) && isset($_GET["id"]))
  {
    $statement = $connect->prepare("DELETE FROM tbl_order WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    $statement = $connect->prepare(
      "DELETE FROM tbl_order_item WHERE order_id = :id");
    $statement->execute(
      array(
        ':id'       =>      $_GET["id"]
      )
    );
    header("location:invoice.php");
  }

  ?>
  <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Billing Record</title>
	<div id="view" style="position:absolute; top: 30px; left: 1000px;"><b><i><a href="adminhome.php" align="right"> Home </a>| <a href="logout.php">Logout</a></i></b></div>
<br><br>
<h5><marquee direction="right" scrollamount="5" hspace="80%" width="20%">SHOPPING MART</marquee><h5>
    <h1 align="center"><font color="rosybrown"><u>**Billing Record**</u></font></h1>
		
    
  </head>
  <body bgcolor="ivory">
   <fieldset>
<legend> <marquee><h3><i>Record of billing</i></h3> </marquee></legend> 
   
      <br />
      
      <br />
      <center><table id="data-table" border="5" cellpadding="10" cellspacing="10" >
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Invoice Date</th>
            <th>Receiver Name</th>
            <th>Invoice Total</th>
            <th>PDF</th>
            
          </tr>
        </thead>
        <?php
        if($total_rows > 0)
        {
          foreach($all_result as $row)
          {
            echo '
              <tr>
                <td>'.$row["order_no"].'</td>
                <td>'.$row["order_date"].'</td>
                <td>'.$row["order_receiver_name"].'</td>
                <td>'.$row["order_total_after_tax"].'</td>
                <td><a href="print_invoice.php?pdf=1&id='.$row["order_id"].'">PDF</a></td>
                
              </tr>
            ';
          }
        }
        ?>
      </table>
      </table>
    </div>
   </fieldset> 
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    var table = $('#data-table').DataTable({
          "order":[],
          "columnDefs":[
          {
            "targets":[4, 5, 6],
            "orderable":false,
          },
        ],
        "pageLength": 25
        });
    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to remove this?"))
      {
        window.location.href="invoice.php?delete=1&id="+id;
      }
      else
      {
        return false;
      }
    });
  });

</script>

<script>
$(document).ready(function(){
$('.number_only').keypress(function(e){
return isNumbers(e, this);      
});
function isNumbers(evt, element) 
{
var charCode = (evt.which) ? evt.which : event.keyCode;
if (
(charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
(charCode < 48 || charCode > 57))
return false;
return true;
}
});
</script>
  