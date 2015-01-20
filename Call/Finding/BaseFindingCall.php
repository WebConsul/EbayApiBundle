<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/Concepts/MakingACall.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use WebConsul\EbayApiBundle\Call\AbstractApiInterface;
use WebConsul\EbayApiBundle\Call\BaseCall;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Type;
use WebConsul\EbayApiBundle\Type\PaginationInput;

/**
 * @XmlNamespace(uri="http://www.ebay.com/marketplace/search/v1/services")
 * @ExclusionPolicy(value="all")
 */
class BaseFindingCall extends BaseCall implements AbstractApiInterface
{

    const URL_SANDBOX = 'http://svcs.sandbox.ebay.com/services/search/FindingService/v1';
    const URL_PRODUCT = 'http://svcs.ebay.com/services/search/FindingService/v1';
    const API_VERSION = '1.13.0';

    /**
     * @Expose
     * @Type("WebConsul\EbayApiBundle\Type\Affiliate")
     * @SerializedName("affiliate")
     */
    private $affiliate;

    /**
     * @Expose
     * @SerializedName("buyerPostalCode")
     * @var  string
     */
    protected $buyerPostalCode;

    /**
     * @var array
     * @Expose
     * @Type("WebConsul\EbayApiBundle\Type\PaginationInput")
     * @SerializedName("paginationInput")
     */
    protected $paginationInput;

    /**
     * @var string
     */
    private $globalId = 'EBAY-US';

    /**
     * @var string
     * @Expose
     * @SerializedName("sortOrder")
     */
    protected $sortOrder;

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers = array(
            'X-EBAY-SOA-OPERATION-NAME:' . $this->getCallName(),
            'X-EBAY-SOA-GLOBAL-ID:' . $this->globalId,
            'X-EBAY-SOA-SECURITY-APPNAME:' . $this->keys['app_id'],
            'X-EBAY-SOA-SERVICE-VERSION:' . self::API_VERSION,
            'X-EBAY-SOA-REQUEST-DATA-FORMAT:XML',
            // for a POST request, the response by default is in the same format as the request
            'Content-Type:text/xml;charset=utf-8',
        );
    }

    public function getAffiliate()
    {
        if (empty($this->affiliate) && isset($this->parameters['affiliate'])) {
            $this->affiliate = $this->parameters['affiliate'];
        }

        return $this->affiliate;
    }


    /**
     * @return string
     */
    public function getGlobalId()
    {
        return $this->globalId;
    }

    /**
     * @param string $globalId
     * @return $this
     */
    public function setGlobalId($globalId)
    {
        $this->globalId = $globalId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param string $sortOrder
     * @return $this
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return PaginationInput
     */
    public function getPaginationInput()
    {
        return $this->paginationInput;
    }

    /**
     * @param PaginationInput $paginationInput
     * @return $this
     */
    public function setPaginationInput(PaginationInput $paginationInput)
    {
        $this->paginationInput = $paginationInput;

        return $this;
    }

    /**
     * @return string
     */
    public function getBuyerPostalCode()
    {
        return $this->buyerPostalCode;
    }

    /**
     * @param string $buyerPostalCode
     * @return $this
     */
    public function setBuyerPostalCode($buyerPostalCode)
    {
        $this->buyerPostalCode = $buyerPostalCode;

        return $this;
    }

}
