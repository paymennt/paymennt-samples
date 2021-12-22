<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"

);
$client->useTestEnvironment(true);

$request = new \Paymennt\checkout\GetCheckoutRequest();
$request->checkoutId = "1719744748122657253"; // checkoutId of checkout to be fetched

$checkout = $client->getCheckoutRequest($request);

echo "Checkout IDm: " . $checkout->id . "\n";
echo "Amount      : " . $checkout->currency . " " . $checkout->amount . "\n";
echo "Stats       : " . $checkout->status . "\n";
echo "Redirect URL: " . $checkout->redirectUrl . "\n";
  