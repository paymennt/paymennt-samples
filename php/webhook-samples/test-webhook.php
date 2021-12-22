<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\webhooks\TestWebhookRequest();
$request->webhookId = "1718569769043906522"; // webhook id identifying the webhook on the PAYMENNT platform


$testResult = $client->TestWebhookRequest($request);

echo "TestResult  : " . ($testResult? "Success": "Failure") . "\n";
  