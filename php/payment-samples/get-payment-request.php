<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"

);
$client->useTestEnvironment(true);

$request = new \Paymennt\payment\GetPaymentRequest();
$request->paymentId = "1734334096701942236"; // paymentId of payment to be fetched

$payment = $client->getPaymentRequest($request);

echo "Payment ID  : " . $payment->id . "\n";
echo "Amount      : " . $payment->currency . " " . $payment->amount . "\n";
echo "Status      : " . $payment->status . "\n";
echo "Redirect URL: " . $payment->redirectUrl . "\n";
  