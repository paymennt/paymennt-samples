<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\webhooks\DeleteWebhookRequest();
$request->webhookId = "1718564815170324249"; // webhook id identifying the webhook on the PAYMENNT platform

$deletionResult = $client->deleteWebhookRequest($request);

echo "DeletionResult  : " . ($deletionResult?" Success": " Failure") . "\n";
  