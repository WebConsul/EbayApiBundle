<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/Concepts/MakingACall.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;


use WebConsul\EbayApiBundle\Call\BaseCall;

class BaseFindingCall extends BaseCall
{

    const URL_SANDBOX = 'http://svcs.sandbox.ebay.com/services/search/FindingService/v1';
    const URL_PRODUCT = 'http://svcs.ebay.com/services/search/FindingService/v1';
    const XMLNS = 'http://www.ebay.com/marketplace/search/v1/services';
    const API_VERSION = '1.13.0';

    /** @var array */
    protected $aspectFilter = [];
    /** @var array */
    protected $itemFilter = [];

    /** @var string */
    protected $sortOrder;
    /** @var array */
    protected $paginationInput = [];
    /** @var array */
    protected $standardInputFields = [];
    /** @var  string */
    protected $buyerPostalCode;

    /** @var string */
    private $globalId = 'EBAY-US';
    /** @var array */
    private $affiliate = [];

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
            'X-EBAY-SOA-OPERATION-NAME:' . parent::$callName,
            'X-EBAY-SOA-GLOBAL-ID:' . $this->globalId,
            'X-EBAY-SOA-SECURITY-APPNAME:' . $keys['app_id'],
            'X-EBAY-SOA-SERVICE-VERSION:' . self::API_VERSION,
            'X-EBAY-SOA-REQUEST-DATA-FORMAT:XML',
            // for a POST request, the response by default is in the same format as the request
            'Content-Type:text/xml;charset=utf-8',
        );

        return $this;
    }

    /**
     * @return array
     */
    public function getAspectFilter()
    {
        return $this->aspectFilter;
    }

    /**
     * @param array $aspectFilter
     * @return $this
     */
    public function setAspectFilter($aspectFilter)
    {
        $this->aspectFilter = $aspectFilter;

        return $this;
    }

    /**
     * @return array
     */
    public function getItemFilter()
    {
        return $this->itemFilter;
    }

    /**
     * @param array $itemFilter
     * @return $this
     */
    public function setItemFilter($itemFilter)
    {
        $this->itemFilter = $itemFilter;

        return $this;
    }

    public function getAffiliate()
    {
        if (empty($this->affiliate) && isset(self::$parameters['affiliate'])) {
            $this->affiliate = self::$parameters['affiliate'];
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
     * @return array
     */
    public function getPaginationInput()
    {
        return $this->paginationInput;
    }

    /**
     * @param array $paginationInput
     * @return $this
     */
    public function setPaginationInput($paginationInput)
    {
        $this->paginationInput = $paginationInput;

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

    /**
     * Add standard input fields to the request
     * @param array $standardInputFields
     * @return string
     */
    protected function appendStandardInputFields($standardInputFields)
    {
        $standardInput = '';
        if (array_search('affiliate', $standardInputFields) !== false && $this->affiliate) {
            $standardInput .= '<affiliate>' . "\n"
                . "\t" . '<networkId>' . $this->affiliate['networkId'] . '</networkId>' . "\n"
                . "\t" . '<trackingId>' . $this->affiliate['trackingId'] . '</trackingId>' . "\n"
                . "\t" . '<customId>' . $this->affiliate['customId'] . '</customId>' . "\n"
                . "\t" . '<geoTargeting>' . $this->affiliate['geoTargeting'] . '</geoTargeting>' . "\n"
                . '</affiliate>' . "\n";
        }
        if (array_search('buyerPostalCode', $standardInputFields) !== false && $this->buyerPostalCode) {
            $standardInput .= '<buyerPostalCode>' . $this->buyerPostalCode . '</buyerPostalCode>' . "\n";
        }
        if (array_search('paginationInput', $standardInputFields) !== false && $this->paginationInput) {
            $standardInput .= '<paginationInput>' . "\n"
                . "\t" . '<entriesPerPage>' . $this->paginationInput['entriesPerPage'] . '</entriesPerPage>' . "\n";
            if (isset($this->paginationInput['pageNumber'])) {
                $standardInput .= "\t" . '<pageNumber>' . $this->paginationInput['pageNumber'] . '</pageNumber>' . "\n";
            }
            $standardInput .= '</paginationInput>' . "\n";
        }
        if (array_search('sortOrder', $standardInputFields) !== false && $this->sortOrder) {
            $standardInput .= '<sortOrder>' . $this->sortOrder . '</sortOrder>' . "\n";
        }

        return $standardInput;
    }


    protected function performAspectFilter()
    {
        $aspectFilter = '';
        foreach ($this->aspectFilter as $aspect) {
            $aspectFilter .= '<aspectFilter>' . "\n";
            $aspectFilter .= "\t" . '<aspectName>' . $aspect['aspectName'] . '</aspectName>' . "\n";;
            foreach ($aspect['values'] as $value) {
                $aspectFilter .= "\t" . '<aspectValueName>' . $value . '</aspectValueName>' . "\n";;
            }
            $aspectFilter .= '</aspectFilter>' . "\n";
        }

        return $aspectFilter;
    }

    protected function performItemFilter()
    {
        $itemFilter = '';
        foreach ($this->itemFilter as $filter) {
            $itemFilter .= '<itemFilter>' . "\n";
            $itemFilter .= "\t" . '<name>' . $filter['name'] . '</name>' . "\n";
            if (isset($filter['paramName'])) {
                $itemFilter .= "\t" . '<paramName>' . $filter['paramName'] . '</paramName>' . "\n";
            }
            if (isset($filter['paramValue'])) {
                $itemFilter .= "\t" . '<paramValue>' . $filter['paramValue'] . '</paramValue>' . "\n";
            }
            foreach ($filter['values'] as $value) {
                $itemFilter .= "\t" . '<value>' . $value . '</value>' . "\n";
            }
            $itemFilter .= '</itemFilter>' . "\n";
        }

        return $itemFilter;
    }

}