<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 12/30/13
 * Time: 12:58 PM
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use WebConsul\EbayApiBundle\Call\BaseCall;

class BaseShoppingCall extends BaseCall
{

    const URL_SANDBOX = 'http://open.api.sandbox.ebay.com/shopping?';
    const URL_PRODUCT = 'http://open.api.ebay.com/shopping?';
    const XMLNS = 'urn:ebay:apis:eBLBaseComponents';
    const API_VERSION = 903;

    protected $standardInputFields = array('MessageID');
    protected $messageID;

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }

    /**
     * @return $this
     */
    public function setHeaders()
    {
        $keys = $this->getKeys();
        $this->headers = array(
            'X-EBAY-API-CALL-NAME:' . self::$callName,
            'X-EBAY-API-SITE-ID:' . $this->siteId,
            // Site 0 is for US
            'X-EBAY-API-APP-ID:' . $keys['app_id'],
            'X-EBAY-API-VERSION:' . self::API_VERSION,
            'X-EBAY-API-REQUEST-ENCODING:XML',
            'X-EBAY-API-RESPONSE-ENCODING:' . $this->responseFormat,
            // for a POST request, the response by default is in the same format as the request
            'Content-Type:text/xml;charset=utf-8',
        );

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageID()
    {
        return $this->messageID;
    }

    /**
     * @param string $messageID
     * @return $this
     */
    public function setMessageID($messageID)
    {
        $this->messageID = $messageID;

        return $this;
    }

    /**
     * @return array
     */
    public function getStandardInputFields()
    {
        return $this->standardInputFields;
    }

}