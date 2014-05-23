
# PongoPayBundle

## Configuration

``` yaml

parameters:
    pongo_pay.merchant_id: f316aaf0-eb34-4f7e-8c7b-9be1d5f505f8

```

## Controller code sample

``` php

$parameters = array(
  'amount' => '1',
  'gatewayType' => 'test',
  'cardNumber' =>  '4550000000000000',
  'cardCvv' => '123',
  'cardExpiryMonth' => '06',
  'cardExpiryYear' => '19',
  'currency' => 'EUR',
);


  $payer = $this->get('pongo_pay_payment');
  $payment_answer = $payer->requestPayment($parameters);

  print_r($payment_answer);

```

returns:

``` 

Array ( 
  [success] => 1 
  [errors] => null
  [gatewayReference] => null
  [merchant_id] => f316aaf0-eb34-4f7e-8c7b-9be1d5f505f8 
  ) 

```

## Parameters

| Property          | Mandatory | Description                                             | Sample value                         |
|-------------------|-----------|---------------------------------------------------------|--------------------------------------|
| merchantId        | yes       | The unique ID of a merchant.                            | f316aaf0-eb34-4f7e-8c7b-9be1d5f505f8 |
| amount            | yes       | The transaction amount (in cents). Ex. 1000 means       | 1000                                 |
|                   |           | 10.00.                                                  |                                      |
| gatewayType       | no        | The gateway switching the transaction.                  | 0                                    |
|                   |           | « 0 » for EUR, GBP and USD transactions                 |                                      |
|                   |           | « 1 » for ZAR transactions 0                            |                                      |
|                   |           | « test » to test parameter format                       |                                      |
|                   |           | If empty, the default value is 0.                       |                                      |
| cardNumber        | yes       | Credit Card number.                                     | 4550000000000000                     |
| cardCvv           | yes       | Credit Card verification value – the last 3-4 digits on | 123                                  |
|                   |           | the back of the Credit Card.                            |                                      |
| cardExpiryMonth   | yes       | Card Expiry Month                                       | 06                                   |
| cardExpiryYear    | yes       | Card Expiry Year                                        | 19                                   |
| currency          | yes       | Currency of the transaction. You can pay in these       | EUR                                  |
|                   |           | currencies:,« EUR »,                                    |                                      |
|                   |           | « USD »,                                                |                                      |
|                   |           | « GBP »,                                                |                                      |
|                   |           | « ZAR»,                                                 |                                      |
| merchantReference | no        | custom data                                             | order 1234                           |
| source            | no        | custom data                                             | mobile                               |