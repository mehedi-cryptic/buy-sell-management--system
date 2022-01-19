<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

<?php 
global $connection;
$login = $_SESSION['u_l'];

if ($login == true) {

    $buyer_email_sessn=$_SESSION['user_email'];

    if (isset($_POST['confirm_order'])) {
		
        $post_id = $_POST['post_id'];
        $seller_email = $_POST['seller_email'];
        $buyer_email = $_POST['buyer_email'];
        $customer_name = $_POST['customer_name'];
        $customer_number = $_POST['customer_number'];
        $customer_adrss = $_POST['customer_adrss'];
        $payment_method = $_POST['p_method'];
        $product_price = $_POST['product_price'];

  

         
            $orders_query = "insert into orders (ordr_post_id,seller_email,buyer_email,receiver_name,receiver_number,receiver_address,payment_method,total_bill,ordr_date) values('$post_id','$seller_email','$buyer_email','$customer_name','$customer_number','$customer_adrss','$payment_method','$product_price',date('Y/m/d') ) ";

            $orders_query_result = mysqli_query($connection,$orders_query);

            if ($orders_query_result) {
				
                echo "<br><h4 style='color:green;text-align:center'>Your order request sent successfully </h4><br>";
            
                $select_rcnt_ordr_query = "select * from orders where ordr_post_id = '$post_id' and seller_email = '$seller_email' and  buyer_email = '$buyer_email' and total_bill = '$product_price' order by ordr_id desc ";
                $select_rcnt_ordr_rlst =mysqli_query($connection,$select_rcnt_ordr_query);

                $roww = mysqli_fetch_assoc($select_rcnt_ordr_rlst);

                $ordr_id = $roww['ordr_id'];
                $ordr_post_id = $roww['ordr_post_id'];
                $seller_email = $roww['seller_email'];
                $buyer_email = $roww['buyer_email'];
                $receiver_name = $roww['receiver_name'];
                $receiver_number = $roww['receiver_number'];
                $receiver_address = $roww['receiver_address'];
                $payment_method = $roww['payment_method'];
                $total_bill = $roww['total_bill'];
                $ordr_date = $roww['ordr_date'];


            ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div id="printableArea">
                                <h2>Order Details</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order Serial No:</th>
                                            <td><?php echo $ordr_id; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Product Serial No:</th>
                                            <td><?php echo $ordr_post_id; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Order Date:</th>
                                            <td><?php echo $ordr_date; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Seller Email:</th>
                                            <td><?php echo $seller_email; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Buyer Email:</th>
                                            <td><?php echo $buyer_email; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Receiver Name:</th>
                                            <td><?php echo $receiver_name; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Receiver Contact No:</th>
                                            <td><?php echo $receiver_number; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Receiver Address:</th>
                                            <td><?php echo $receiver_address; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Total Bill:</th>
                                            <td><?php echo $total_bill." Tk"; ?></td>
                                        </tr>

                                        <tr>
                                            <th>Payment Method:</th>
                                            <td><?php echo $payment_method; ?></td>
                                        </tr>

                                    </thead>
        
                                </table>
            
                            </div>
                        </div>
                    </div>
      


                    <div class="row mt-4 mb-4">
                        <div class="col-md-6 offset-md-3">

                            <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Order Details" />
              
                        </div>
                    </div>

                </div>

            <?php

            }
        

    } //Confirm order button click


}     //Successful login
else{
    echo "<script>alert('Opps!! You Have to login First');</script>";
    echo "<script>window.location.href = 'login.php'</script>";

}


 ?>

<script type="text/javascript">     
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 </script>
 
    <br><br>
<?php include "includes/footer.php" ?>  
