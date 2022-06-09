<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\webhooks\WebhookLookupRequest();
$request->page = "0"; // optional, by default set to 0
$request->size = "15"; // optional, by default set to 20

$allWebhook = $client->webhookLookupRequest($request);

foreach($allWebhook->content as $webhook) {

  echo "Weebhook ID       : " . $webhook->id . "\n";
  echo "Weebhook HMAC Key : " . $webhook->hmacKey .  "\n";
  echo "Address           : " . $webhook->address . "\n";
  echo "Failed Flag       : " . $webhook->failed . "\n";
  echo "Enabled           : " . $webhook->enabled . "\n";

}