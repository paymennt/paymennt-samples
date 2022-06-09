<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"
);
$client->useTestEnvironment(true);

$checkoutDetails = new \Paymennt\checkout\WebCheckoutRequest();
$checkoutDetails->requestId = "124003"; // unique payment reference (an order can have multiple payment attempts)
$checkoutDetails->orderId = "ORD-1001"; // the order id relating to this purchase
$checkoutDetails->currency = "AED"; // 3 letter ISO currency code. eg, AED
$checkoutDetails->amount = "1090"; // transaction amount
$checkoutDetails->returnUrl = "https://www.example.com/handle-paymennt-callback";

// order total = subtotal + tax + shipping + handling - discount
$checkoutDetails->totals = new \Paymennt\model\Totals(); // optional
$checkoutDetails->totals->subtotal = "90.00"; // item subtotal exclusive of VAT/Tax in order currency
$checkoutDetails->totals->tax = "5"; // VAT/Tax for this purchase in order currency
$checkoutDetails->totals->shipping = "5"; // shipping cost in order currency
$checkoutDetails->totals->handling = "0"; // handling fees in order currency
$checkoutDetails->totals->discount = "0"; // discount applied ()

$checkoutDetails->customer = new \Paymennt\model\Customer(); // required
$checkoutDetails->customer->firstName = "John"; // customer first name
$checkoutDetails->customer->lastName = "Smith"; // customer last name
$checkoutDetails->customer->email = "john.smith@example.com"; // customer email address
$checkoutDetails->customer->phone = "9715xxxxxxxx"; // customer email address
$checkoutDetails->customer->reference = "cus-001"; // customer refernece in your system

$checkoutDetails->billingAddress = new \Paymennt\model\Address(); // required
$checkoutDetails->billingAddress->name = "John Smith"; // name of person at billing address
$checkoutDetails->billingAddress->address1 = "120 Some Drive"; // billing address 1
$checkoutDetails->billingAddress->address2 = "Apt 222"; // billing address 2
$checkoutDetails->billingAddress->city = "Dubai"; // city
$checkoutDetails->billingAddress->state = "Dubai"; // state (if applicable)
$checkoutDetails->billingAddress->zip = "00000"; // zip/postal code
$checkoutDetails->billingAddress->country = "ARE"; // 3-letter country code

$checkoutDetails->deliveryAddress = new \Paymennt\model\Address(); // required if shipping is required
$checkoutDetails->deliveryAddress->name = "John Smith"; // name of person at billing address
$checkoutDetails->deliveryAddress->address1 = "120 Some Drive"; // billing address 1
$checkoutDetails->deliveryAddress->address2 = "Apt 222"; // billing address 2
$checkoutDetails->deliveryAddress->city = "Dubai"; // city
$checkoutDetails->deliveryAddress->state = "Dubai"; // state (if applicable)
$checkoutDetails->deliveryAddress->zip = "00000"; // zip/postal code
$checkoutDetails->deliveryAddress->country = "ARE"; // 3-letter country code

$checkoutDetails->items = []; // required
$checkoutDetails->items[0] = new \Paymennt\model\Item();
$checkoutDetails->items[0]->name = "ITEM 1"; // name / description of item
$checkoutDetails->items[0]->unitprice = "100"; // item unit price
$checkoutDetails->items[0]->quantity = "2"; // quanitity purchased by customer
$checkoutDetails->items[0]->linetotal = "200"; // total including any offers or discounts

/**
  * create the request using the constructor that takes 4 params:
  * source type eg: "TOKEN" 
  * token value 
  * checkout ID, else if checkout is not created pass null
  * checkoutDeatils to create a checkout with given data, pass null if checkout already created
  */
$request = new  \Paymennt\payment\CreatePaymentRequest("TOKEN", "ptk_sandbox_c668636620ecdec280bb01e54207e6e8780af9a0e0d0c79bbd59081115306e2c",
                                                       "", $checkoutDetails);

$payment = $client->createPayment($request);

echo "Payment ID : " . $payment->id . "\n";
echo "Amount      : " . $payment->currency . " " . $payment->amount . "\n";
echo "Stats       : " . $payment->status . "\n";
echo "Redirect URL: " . $payment->redirectUrl . "\n";