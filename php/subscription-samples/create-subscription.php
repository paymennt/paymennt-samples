<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\subscription\CreateSubscriptionRequest();
$request->description = "This is a description."; // description of the subscription
$request->orderId = "ORD-1001"; // the order id relating to this purchase
$request->currency = "AED"; // 3 letter ISO currency code. eg, AED
$request->amount = "100.00"; // transaction amount
//$request->customerId = "006"; // unique Id to refer to a customer
$request->returnUrl = "https://www.example.com/handle-paymennt-callback";

$request->customer = new \Paymennt\object\Customer(); // required
$request->customer->id = "123456"; // customer first name
$request->customer->firstName = "John"; // customer first name
$request->customer->lastName = "Smith"; // customer last name
$request->customer->email = "john.smith@example.com"; // customer email address
$request->customer->phone = "918318111210"; // customer contact with country code
$request->customer->reference = "cus-001"; // customer refernece in your system

$request->startDate = "2021-08-10"; // start date of the subscription in format (yyyy-MM-dd).
$request->endDate = "2024-05-01"; // end date of the subscription in format (yyyy-MM-dd).
$request->sendOnHour = "12"; // hour of day in UTC the checkout will be created on
$request->sendEvery = "TWO_MONTHS"; // unique Id to refer to a customer


$subscription = $client->createSubscription($request);

echo "Description             : " . $subscription->description . "\n";
echo "Subscription ID         : " . $subscription->id . "\n";
echo "Subscription display ID : " . $subscription->displayId .  "\n";
echo "Status                  : " . $subscription->status . "\n";
echo "Amount                  : " . $subscription->currency . " " . $subscription->amount . "\n";
echo "StartDate               : " . $subscription->startDate . "\n";
echo "Customer Name           : " . $subscription->customer->firstName . " " . $subscription->customer->lastName . "\n";
 