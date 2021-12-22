<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"

);
$client->useTestEnvironment(true);

$request = new \Paymennt\checkout\CancelCheckoutRequest();
$request->checkoutId = "1718470216724656713"; // checkoutId for the "PENDING" checkout to be marked as "CANCELLED"

$checkout = $client->cancelCheckoutRequest($request);

echo "Checkout ID : " . $checkout->id . "\n";
echo "Amount      : " . $checkout->currency . " " . $checkout->amount . "\n";
echo "Stats       : " . $checkout->status . "\n";
echo "Redirect URL: " . $checkout->redirectUrl . "\n";
 