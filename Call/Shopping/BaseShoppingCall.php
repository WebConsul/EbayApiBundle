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

    protected $standardInputFields = array('MessageID');
    protected $messageID;

    private $keys = array();
    private $version = 849;


    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
        $this->keys = self::$parameters['application_keys'];
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
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return array
     */
    public function getStandardInputFields()
    {
        return $this->standardInputFields;
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
            'X-EBAY-API-VERSION:' . $this->getVersion(),
            'X-EBAY-API-REQUEST-ENCODING:XML',
            // for a POST request, the response by default is in the same format as the request
            'Content-Type:text/xml;charset=utf-8',
        );

        return $this;
    }

    /**
     * get application_keys for current mode ('sandbox' or 'production')
     * @return array
     */
    private function getKeys()
    {
        if ($this->mode === parent::MODE_PRODUCT) {
            return $this->keys['production'];
        } else {
            return $this->keys['sandbox'];
        }
    }

} 