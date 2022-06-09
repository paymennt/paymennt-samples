<?php
ini_set('log_errors', 1);
ini_set('display_errors', 0);
require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Paymennt\PaymenntClient(
  "[API KEY]",
  "[API SECRET]"

);
$client->useTestEnvironment(true);

$request = new \Paymennt\checkout\QRCheckoutRequest();
$request->requestId = "0050"; // unique payment reference (an order can have multiple payment attempts)
$request->orderId = "ORD-1001"; // the order id relating to this purchase
$request->currency = "AED"; // 3 letter ISO currency code. eg, AED
$request->amount = "100.00"; // transaction amount
$request->description = "string: demo QR checkout"; // transaction amount
$request->deviceReference = "string: dev ref 111"; // transaction amount
$request->qrSize = "600"; // Default: 300, the size of the QR image in pixels.
$request->expiresIn = "1440"; // number of minutes the payment will remain available, after that the payment will expire.

// order total = subtotal + tax + shipping + handling - discount
$request->totals = new \Paymennt\model\Totals(); // optional
$request->totals->subtotal = "90.00"; // item subtotal exclusive of VAT/Tax in order currency
$request->totals->tax = "5"; // VAT/Tax for this purchase in order currency
$request->totals->shipping = "5"; // shipping cost in order currency
$request->totals->handling = "0"; // handling fees in order currency
$request->totals->discount = "0"; // discount applied ()

$request->customer = new \Paymennt\model\Customer(); // required
$request->customer->firstName = "John"; // customer first name
$request->customer->lastName = "Smith"; // customer last name
$request->customer->email = "john.smith@example.com"; // customer email address
$request->customer->phone = "9715xxxxxxxx"; // customer email address
$request->customer->reference = "cus-001"; // customer refernece in your system

$request->billingAddress = new \Paymennt\model\Address(); // required
$request->billingAddress->name = "John Smith"; // name of person at billing address
$request->billingAddress->address1 = "120 Some Drive"; // billing address 1
$request->billingAddress->address2 = "Apt 222"; // billing address 2
$request->billingAddress->city = "Dubai"; // city
$request->billingAddress->state = "Dubai"; // state (if applicable)
$request->billingAddress->zip = "00000"; // zip/postal code
$request->billingAddress->country = "ARE"; // 3-letter country code

$request->deliveryAddress = new \Paymennt\model\Address(); // required if shipping is required
$request->deliveryAddress->name = "John Smith"; // name of person at billing address
$request->deliveryAddress->address1 = "120 Some Drive"; // billing address 1
$request->deliveryAddress->address2 = "Apt 222"; // billing address 2
$request->deliveryAddress->city = "Dubai"; // city
$request->deliveryAddress->state = "Dubai"; // state (if applicable)
$request->deliveryAddress->zip = "00000"; // zip/postal code
$request->deliveryAddress->country = "ARE"; // 3-letter country code

$request->items = []; // required
$request->items[0] = new \Paymennt\model\Item();
$request->items[0]->name = "ITEM 1"; // name / description of item
$request->items[0]->unitprice = "100"; // item unit price
$request->items[0]->quantity = "2"; // quanitity purchased by customer
$request->items[0]->linetotal = "200"; // total including any offers or discounts

$checkout = $client->createQRCheckout($request);

echo "Checkout ID : " . $checkout->id . "\n";
echo "Amount      : " . $checkout->currency . " " . $checkout->amount . "\n";
echo "Stats       : " . $checkout->status . "\n";
echo "Redirect URL: " . $checkout->redirectUrl . "\n";
echo "QR Code     : " . $checkout->base64QR . "\n";


//1719744748122657253