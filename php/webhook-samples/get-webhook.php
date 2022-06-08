<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\webhooks\GetWebhookRequest();
$request->webhookId = "1718564815170324249"; // webhook id identifying the webhook on the PAYMENNT platform

if($request->validate()){
  echo "Validations executed successfully ";
  
  $webhook = $client->getWebhookRequest($request);
  
  echo "Weebhook ID       : " . $webhook->id . "\n";
  echo "Weebhook HMAC Key : " . $webhook->hmacKey .  "\n";
  echo "Address           : " . $webhook->address . "\n";
  echo "Failed Flag       : " . $webhook->failed . "\n";
  echo "Enabled           : " . $webhook->enabled . "\n";
  }

  
//1718564815170324249