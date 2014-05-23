
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

