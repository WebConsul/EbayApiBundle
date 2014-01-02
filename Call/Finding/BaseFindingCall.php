<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 12/30/13
 * Time: 12:58 PM
 */

namespace WebConsul\EbayApiBundle\Call\Finding;


use WebConsul\EbayApiBundle\Call\BaseCall;

class BaseFindingCall extends BaseCall
{

    const URL_SANDBOX = 'http://svcs.sandbox.ebay.com/services/search/FindingService/v1';
    const URL_PRODUCT = 'http://svcs.ebay.com/services/search/FindingService/v1';
    const XMLNS = 'http://www.ebay.com/marketplace/search/v1/services';

    /**
     * @link http://developer.ebay.com/DevZone/xml/docs/Reference/ebay/types/DetailLevelCodeType.html
     * @var array
     */
    protected $detailLevel = array();
    protected $errorLanguage;
    protected $messageID;
    protected $outputSelector = array();
    protected $warningLevel;

    private $keys = array();
    private $version = '1.12.0';

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
        $this->keys = self::$parameters['application_keys'];
    }

    /**
     * @return array
     */
    public function getDetailLevel()
    {
        return $this->detailLevel;
    }

    /**
     * @param array $detailLevel
     * @return $this
     */
    public function setDetailLevel($detailLevel)
    {
        $this->detailLevel = $detailLevel;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrorLanguage()
    {
        return $this->errorLanguage;
    }

    /**
     * @param string $errorLanguage
     * @return $this
     */
    public function setErrorLanguage($errorLanguage)
    {
        $this->errorLanguage = $errorLanguage;

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
    public function getOutputSelector()
    {
        return $this->outputSelector;
    }

    /**
     * @param array $outputSelector
     * @return $this
     */
    public function setOutputSelector($outputSelector)
    {
        $this->outputSelector = $outputSelector;

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
     * @return string
     */
    public function getWarningLevel()
    {
        return $this->warningLevel;
    }

    /**
     * @param string $warningLevel
     * @return $this
     */
    public function setWarningLevel($warningLevel)
    {
        $this->warningLevel = $warningLevel;

        return $this;
    }


    /**
     * @return $this
     */
    public function setHeaders()
    {
        $keys = $this->getKeys();
        $this->headers = array(
            'X-EBAY-SOA-OPERATION-NAME:' . self::$callName,
            'X-EBAY-SOA-GLOBAL-ID:EBAY-US', //. $this->siteId,
            // Site 0 is for US
            'X-EBAY-SOA-SECURITY-APPNAME:' . $keys['app_id'],
            'X-EBAY-SOA-SERVICE-VERSION:' . $this->getVersion(),
            'X-EBAY-SOA-REQUEST-DATA-FORMAT:XML',
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