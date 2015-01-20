<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 12/30/13
 * Time: 12:58 PM
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use WebConsul\EbayApiBundle\Call\AbstractApiInterface;
use WebConsul\EbayApiBundle\Call\BaseCall;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;

/**
 * @XmlNamespace(uri="urn:ebay:apis:eBLBaseComponents")
 * @ExclusionPolicy(value="all")
 */
class BaseShoppingCall extends BaseCall implements AbstractApiInterface
{

    const URL_SANDBOX = 'http://open.api.sandbox.ebay.com/shopping?';
    const URL_PRODUCT = 'http://open.api.ebay.com/shopping?';
    const API_VERSION = 897;

    /**
     * @Expose
     * @SerializedName(value="messageID")
     */
    protected $messageID;

    /**
     * @return array
     */
    public function getHeaders()
    {
        return array(
            'X-EBAY-API-CALL-NAME:' . $this->getCallName(),
            'X-EBAY-API-SITE-ID:' . $this->siteId,
            // Site 0 is for US
            'X-EBAY-API-APP-ID:' . $this->keys['app_id'],
            'X-EBAY-API-VERSION:' . self::API_VERSION,
            'X-EBAY-API-REQUEST-ENCODING:XML',
            'X-EBAY-API-RESPONSE-ENCODING:' . $this->responseFormat,
            // for a POST request, the response by default is in the same format as the request
            'Content-Type:text/xml;charset=utf-8',
        );
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

}