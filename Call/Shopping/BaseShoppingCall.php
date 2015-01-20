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
use JMS\Serializer\Annotation\Type;
use WebConsul\EbayApiBundle\Type\ProductID;

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
     * @var string
     * @Expose
     * @SerializedName("IncludeSelector")
     */
    protected $includeSelector;

    /**
     * @Expose
     * @var integer
     * @SerializedName("MaxEntries")
     */
    protected $maxEntries;

    /**
     * @Expose
     * @SerializedName(value="messageID")
     */
    protected $messageID;

    /**
     * @var integer
     * @Expose
     * @SerializedName("PageNumber")
     */
    protected $pageNumber;


    /**
     * @Expose
     * @Type("WebConsul\EbayApiBundle\Type\ProductID")
     * @SerializedName("ProductID")
     */
    protected $productID;

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
    public function getIncludeSelector()
    {
        return $this->includeSelector;
    }

    /**
     * @param string $includeSelector
     * @return $this
     */
    public function setIncludeSelector($includeSelector)
    {
        $this->includeSelector = $includeSelector;

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
     * @return int
     */
    public function getMaxEntries()
    {
        return $this->maxEntries;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setMaxEntries($value)
    {
        $this->maxEntries = $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     * @return $this
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    /**
     * return WebConsul\EbayApiBundle\Type\ProductID
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param ProductID $productID
     * @return $this
     */
    public function setProductID(ProductID $productID)
    {
        $this->productID = $productID;

        return $this;
    }
}
