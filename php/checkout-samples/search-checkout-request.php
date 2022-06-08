<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\checkout\SearchCheckoutRequest();
// $request->type = "web"; //the mode used for checkout
// $request->requestId = "transaction_299329017_1636283206"; // unique payment reference (an order can have multiple payment attempts)
// $request->orderId = "299329017"; // the order id relating to this purchase
// $request->status = "REFUNDED"; // status of the payment checkout to search for

// $request->customer = new \Paymennt\object\Customer(); // optional
// $request->customer->email = "bashar.saleh@gmail.com"; // customer email address
// $request->customer->phone = "9715xxxxxxxx"; // customer phone number
//$request->customer->reference = "2"; // customer refernece in your system

// $request->afterId = "000000020"; // filter checkouts after the provided id
// $request->afterTimestamp = "2020-06-03T13:44:25"; // query checkouts created after specific date/time, date format is yyyy-mm-dd HH:MM:SS
$request->page = "14"; // page number, default is 0
$request->size = "11"; // page size, default is 20 

$checkouts = $client->searchCheckoutRequest($request);

echo "totalPages       : " . $checkouts->totalPages . "\n";
echo "pages            : " . $checkouts->page . "\n";
echo "TotalElements    : " . $checkouts->totalElements. "\n";
echo "size             : " . $checkouts->size . "\n";
echo "THE CHECKOUTS ARE-------------------------------------------------------------------------------- \n"; 
foreach($checkouts->content as $checkout) {

  echo "Checkout ID        : " . $checkout->id . "\n";
  echo "Customer Refernce  : " . $checkout->customer->reference . "\n";
  echo "Customer Email     : " . $checkout->customer->email . "\n";
  echo "Customer Phone     : " . $checkout->customer->phone . "\n";
  echo "Request ID         : " . $checkout->requestId . "\n";
  echo "Order ID           : " . $checkout->orderId . "\n";
  echo "Amount             : " . $checkout->currency . " " . $checkout->amount . "\n";
  echo "Stats              : " . $checkout->status . "\n";
  echo "Redirect URL       : " . $checkout->redirectUrl . "\n";
  echo "Branch ID          : " . $checkout->branchId . "\n";
  echo "Branch Name        : " . $checkout->branchName . "\n";

}