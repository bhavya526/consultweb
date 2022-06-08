<?php 

session_start();




?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<div style='margin-left:40%';>
<form method="POST" action="passaddress.php">
    <br><br><br><br><br><br>
    <?php
     
    ?>
  

    <input type="textbox" name="amt" value="550" id="amt" hidden placeholder="Enter amt"/ ><br/><br/>
    <input type="button" name="btn" id="btn" value="Confirm" onclick="pay_now()" style=""/>
</form>
</div>

<script>
    function pay_now(){

        var amt=jQuery('#amt').val();
        <?php
           
        ?>
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt,
               success:function(result){
                   var options = {
                        "key": "rzp_test_UY1y7bu0apmIK4", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "One-Health",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                            console.log(response);
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="transfer.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>


