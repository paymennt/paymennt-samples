<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\branches\CreateBranchRequest();
$request->name = "Repo Office"; // the order id relating to this purchase
$request->currency = "AED"; // 3 letter ISO currency code. eg, AED
$request->description = "This is the Repo branch."; // 3 letter ISO currency code. eg, AED

$branch = $client->createBranch($request);

echo "Branch ID     : " . $branch->id . "\n";
echo "Branch Name   : " . $branch->name.  "\n";
echo "Currency      : " . $branch->currency . "\n";
echo "Description   : " . $branch->description . "\n";
echo "Enabled       : " . $branch->enabled . "\n";
