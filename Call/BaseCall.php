<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 12/30/13
 * Time: 12:58 PM
 */
namespace WebConsul\EbayApiBundle\Call;

use JMS\Serializer\Annotation\ExclusionPolicy;

/** @ExclusionPolicy("all") */
class BaseCall
{

    const MODE_SANDBOX = 0;
    const MODE_PRODUCT = 1;

    public $parameters;
    protected $apiName;
    protected $callName;
    protected $headers = [];
    protected $siteId = 0; // US by default
    protected $mode = 0; // Sandbox by default
    protected $responseFormat = 'XML';
    protected $keys = [];
    protected $input;


    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @param string $apiName (e.g. Trading, Finding, etc.)
     * @param string $callName
     * @param integer $mode
     * @return object
     */
    public function getInstance($apiName, $callName, $mode = self::MODE_PRODUCT)
    {
        $className = 'WebConsul\\EbayApiBundle\\Call\\' . $apiName . '\\' . ucfirst($callName) . 'Call';
        /** @var BaseCall $instance */
        $instance = new $className($this->parameters);
        $keys = ($mode === self::MODE_PRODUCT) ? $this->parameters['application_keys']['production'] : $this->parameters['application_keys']['sandbox'];
        $instance->setApiName($apiName)->setCallName($callName)->setMode($mode)->setKeys($keys);

        return $instance;
    }

    /**
     * @param int $siteId
     * @return $this
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;

        return $this;
    }


    /**
     * @param int $mode
     * @return $this
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function setResponseFormat($format)
    {
        $this->responseFormat = $format;

        return $this;
    }


    public function getCallName()
    {
        return $this->callName;
    }

    /**
     * @return string
     */
    public function getRequestUrl()
    {
        if ($this->mode === self::MODE_PRODUCT) {
            return $this::URL_PRODUCT;
        } else {
            return $this::URL_SANDBOX;
        }
    }

    protected function setCallName($callName)
    {
        $this->callName = $callName;

        return $this;
    }

    public function getApiName()
    {
        return $this->apiName;
    }

    protected function setApiName($apiName)
    {
        $this->apiName = $apiName;

        return $this;
    }

    protected function setKeys(array $keys)
    {
        $this->keys = $keys;

        return $this;
    }

    /**
     * get application_keys for current mode ('sandbox' or 'production')
     * @return array
     */
    protected function getKeys()
    {
        return $this->keys;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setInput($value)
    {
        $this->input = $value;

        return $this;
    }

    public function getInput()
    {
        return $this->input;
    }

    public function getCallReference()
    {
        return
            [
                'Shopping' =>
                    [
                        'FindHalfProducts',
                        'FindPopularItems',
                        'FindPopularSearches',
                        'FindProducts',
                        'FindReviewsAndGuides',
                        'GetCategoryInfo',
                        'GeteBayTime',
                        'GetItemStatus',
                        'GetMultipleItems',
                        'GetShippingCosts',
                        'GetSingleItem',
                        'GetUserProfile'
                    ],
                'Trading' => ['GetCategories'],
                'Finding' => [
                    'findCompletedItems',
                    'findItemsAdvanced',
                    'findItemsByCategory',
                    'findItemsByImage',
                    'findItemsByKeywords',
                    'findItemsByProduct',
                    'findItemsIneBayStores',
                    'getHistograms',
                    'getSearchKeywordsRecommendation',
                    'getVersion'
                ],
            ];
    }
}
