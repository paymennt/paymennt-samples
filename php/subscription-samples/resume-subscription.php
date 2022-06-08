<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\subscription\ResumeSubscriptionRequest();
$request->subscriptionId = "1718646831202068875"; // subscription ID of the subscription

$subscription = $client->resumeSubscriptionRequest($request);

echo "Description             : " . $subscription->description . "\n";
echo "Subscription ID         : " . $subscription->id . "\n";
echo "Subscription display ID : " . $subscription->displayId .  "\n";
echo "Status                  : " . $subscription->status . "\n";
echo "Amount                  : " . $subscription->currency . " " . $subscription->amount . "\n";
echo "StartDate               : " . $subscription->startDate . "\n";
echo "Customer Name           : " . $subscription->customer->firstName . " " . $subscription->customer->lastName . "\n";
 