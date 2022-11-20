<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>

<h2>Total Amount</h2>

<form id="paymentForm">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" id="email-address" required />
  </div>
  <div class="form-group">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" />
  </div>
  <div class="form-group">
    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" />
  </div>
  
    <button type="button" onclick="payWithPaystack()"> Pay </button>
  </div>
</form>
<script src="https://js.paystack.co/v1/inline.js"></script>
<br><br>
<script>

function payWithPaystack() {

  let handler = PaystackPop.setup({
    key: 'pk_test_e274a7e25ef515d0b9fc4ce155df001c30882d74', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: 8000 * 100,
    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("last-name").value,
    currency: "GHS",
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      window. location ="https://localhost/paystack2/index.php?transaction=call";
      alert('transaction failed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      window.location = "http:///localhost/paystack2/verify_transaction.php?reference="  + response.reference;
    }
  });

  handler.openIframe();
}
</script>
<div class="mt-30"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquerry/1.11.3/jquerry.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquerry/3.4.1/jquerry/min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquerry/3.4.1/jquerry/min.js"></script>
 
     

</body>
</html>