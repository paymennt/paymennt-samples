<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$request = new \Paymennt\branches\BranchLookupRequest();
$request->page = "0"; // optional, by default set to 0
$request->size = "15"; // optional, by default set to 20

$allBranch = $client->branchLookupRequest($request);

foreach($allBranch->content as $branch) {

  echo "Branch ID     : " . $branch->id . "\n";
  echo "Branch Name   : " . $branch->name.  "\n";
  echo "Currency      : " . $branch->currency . "\n";
  echo "Description   : " . $branch->description . "\n";
  echo "Enabled       : " . $branch->enabled . "\n";

}