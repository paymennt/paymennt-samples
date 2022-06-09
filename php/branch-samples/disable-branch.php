<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\branches\DisableBranchRequest();
$request->branchId = "1718481231542631382"; // the branch ID of the branch

$branch = $client->disableBranchRequest($request);
  
echo "Branch ID     : " . $branch->id . "\n";
echo "Branch Name   : " . $branch->name.  "\n";
echo "Currency      : " . $branch->currency . "\n";
echo "Description   : " . $branch->description . "\n";
echo "Enabled       : " . $branch->enabled . "\n";
 