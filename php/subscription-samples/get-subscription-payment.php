<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\subscription\GetSubscriptionPaymentsRequest();
$request->subscriptionId = "1718646831202068875"; // subscription ID of the subscription
$request->page = "0";
$request->size = "11";

$subscriptions = $client->getSubscriptionPaymentsRequest($request);

echo "totalPages       : " . $subscriptions->totalPages . "\n";
echo "pages            : " . $subscriptions->page . "\n";
echo "TotalElements    : " . $subscriptions->totalElements. "\n";
echo "size             : " . $subscriptions->size . "\n";
echo "THE SUBSCRIPTION PAYMENT DETAILS ARE: \n"; 
foreach($subscriptions->content as $subscription) {

  echo "Subscription ID         : " . $subscription->id . "\n";
  echo "Subscription display ID : " . $subscription->displayId .  "\n";
  echo "Checkout Details--------------------------------------------------- " . "\n";
  echo "Checkout ID             : " . $subscription->$checkout->id . "\n";
  echo "Customer Refernce       : " . $subscription->$checkout->customer->reference . "\n";
  echo "Customer Email          : " . $subscription->$checkout->customer->email . "\n";
  echo "Customer Phone          : " . $subscription->$checkout->customer->phone . "\n";
  echo "Request ID              : " . $subscription->$checkout->requestId . "\n";
  echo "Order ID                : " . $subscription->$checkout->orderId . "\n";
  echo "Amount                  : " . $subscription->$checkout->currency . " " . $con->amount . "\n";
  echo "Stats                   : " . $subscription->$checkout->status . "\n";
  echo "Redirect URL            : " . $subscription->$checkout->redirectUrl . "\n";
  echo "Branch ID               : " . $subscription->$checkout->branchId . "\n";
  echo "Branch Name             : " . $subscription->$checkout->branchName . "\n";
  echo "------------------------------------------------------------------- " . "\n";
  echo "Timestamp               : " . $subscription->timestamp . "\n";
  echo "Cancelled               : " . ($subscription->cancelled? "True": "False") . "\n";
}