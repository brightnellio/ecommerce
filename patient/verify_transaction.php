<?php
$ref = $_GET['reference'];
if ($ref = "") {
    # code...
    header("location: javascript://history.go(-1)");
}
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_d5ed72b6c66b5b670166f1520671f9c09205865a",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    $result = json_decode($response);

  }
  if ($result->data->status == 'success') {
    # code...
    $status = $result->data->status;
    $reference = $result->data->reference;
    $lname = $result->data->customer->last_name;
    $fname = $result->data->customer->first_name;
    $fullname = $lname. ' '.$fname;
    $cus_email = $result->data->customer->email;
    date_default_timezone_set('Africa/Accra');
    $Date_time = date('m/d/y h:i:s a',time());

    //include database connection
    header("Location: success.php?status=success");
    exit;
  }
  else{
    header("location:error.html");
    exit;
  }
?>