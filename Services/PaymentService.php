<?php
namespace Pongo\PayBundle\Services;

/**
* Pongo pay payment service main class
*/

class PaymentService
{
  
  protected $merchant_id;
  protected $payment_type;

  protected $api_url = 'https://www.paygenius.co.za/api/web-service/transact';

  protected $mandatory_parameters = array(
    'amount',
    'gatewayType',
    'cardNumber',
    'cardCvv',
    'cardExpiryMonth',
    'cardExpiryYear',
    'currency',
  );
  protected $optional_parameters = array(
    'merchantReference',
    'source',
    );

  function __construct($merchant_id, $payment_type)
  {
    $this->merchant_id = $merchant_id; 
    $this->payment_type = $payment_type; 
  }

  public function getMerchantId()
  {
    return $this->merchant_id;
  }

  public function setMerchantId($merchant_id)
  {
    $this->merchant_id = $merchant_id;
  }

  public function getPaymentType()
  {
    return $this->payment_type;
  }

  public function setPaymentType($payment_type)
  {
    $this->payment_type = $payment_type;
  }

  public function requestPayment(array $parameters)
  {
    $url = $this->api_url . '?merchantId=' . $this->merchant_id;
    $url .= '&paymentType=' . $this->payment_type;

    foreach ($this->mandatory_parameters as $value)
    {
      if(isset($parameters[$value]))
      {
        $url .= "&" . $value . '=' . $parameters[$value];
      }
      else
      {
        throw new \Exception("You need to provide a value for the '" . $value . "' parameter");
      }
    }

    foreach ($this->optional_parameters as $value)
    {
      if(isset($parameters[$value]))
      {
        $url .= "&" . $value . '=' . $parameters[$value];
      }
    }

    //throw new \Exception($url);
    
    $response = file_get_contents($url);

    if(!$response) throw new \Exception("Error Connecting to API");

    $result = json_decode($response, true);
    $result['merchant_id'] = $this->merchant_id;

    return  $result; 
  }

}