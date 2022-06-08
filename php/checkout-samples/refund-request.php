<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\checkout\RefundCheckoutRequest();
$request->checkoutId = "1715762599380078195"; //the checkoutId to create a refund request for
$request->amount = "10.00"; // transaction amount
$request->currency = "AED"; // 3 letter ISO currency code. eg, AED
$request->note = "Item Could Not Be Delivered."; // reason/note for the refund


$checkout = $client->refundCheckoutRequest($request);

echo "Checkout ID : " . $checkout->id . "\n";
echo "Amount      : " . $checkout->currency . " " . $checkout->amount . "\n";
echo "Stats       : " . $checkout->status . "\n";
echo "Redirect URL: " . $checkout->redirectUrl . "\n";
  