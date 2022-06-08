<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\subscription\SearchSubscriptionRequest();
$request->status = "ACTIVE";

$request->customer = new \Paymennt\object\Customer(); // required
$request->customer->email = "john.smith@example.com"; // customer email address
$request->customer->phone = "918318111210"; // customer contact with country code
$request->customer->reference = "cus-001"; // customer refernece in your system

$request->afterId = "000000020"; // filter subscriptions after the provided id
$request->afterTimestamp = "2020-06-03T13:44:25"; // query subscriptions created after specific date/time, date format is yyyy-mm-dd HH:MM:SS
$request->page = "4"; // page number, default is 0
$request->size = "11"; // page size, default is 20 


$subscriptions = $client->searchSubscriptionRequest($request);

echo "totalPages       : " . $subscriptions->totalPages . "\n";
echo "pages            : " . $subscriptions->page . "\n";
echo "TotalElements    : " . $subscriptions->totalElements. "\n";
echo "size             : " . $subscriptions->size . "\n";
echo "THE SUBSCRIPTIONS ARE: \n"; 
foreach($subscriptions->content as $subscription) {

  echo "Description             : " . $subscription->description . "\n";
  echo "Subscription ID         : " . $subscription->id . "\n";
  echo "Subscription display ID : " . $subscription->displayId .  "\n";
  echo "Status                  : " . $subscription->status . "\n";
  echo "Amount                  : " . $subscription->currency . " " . $subscription->amount . "\n";
  echo "StartDate               : " . $subscription->startDate . "\n";
  echo "Customer Name           : " . $subscription->customer->firstName . " " . $subscription->customer->lastName . "\n";
}