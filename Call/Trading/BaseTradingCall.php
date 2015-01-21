<?php

namespace WebConsul\EbayApiBundle\Call\Trading;

use WebConsul\EbayApiBundle\Call\AbstractApiInterface;
use WebConsul\EbayApiBundle\Call\BaseCall;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use WebConsul\EbayApiBundle\Type\RequesterCredentials;

/**
 * @XmlNamespace(uri="urn:ebay:apis:eBLBaseComponents")
 * @ExclusionPolicy(value="all")
 */
class BaseTradingCall extends BaseCall implements AbstractApiInterface
{

    const URL_SANDBOX = 'https://api.sandbox.ebay.com/ws/api.dll';
    const URL_PRODUCT = 'https://api.ebay.com/ws/api.dll';
    const API_VERSION = 903;

    /**
     * @Expose
     * @XmlList(inline = true, entry = "DetailLevel")
     */
    protected $detailLevel;

    /**
     * @var string
     * @Expose
     * @SerializedName("ErrorLanguage")
     */
    protected $errorLanguage;

    /**
     * @Expose
     * @SerializedName("MessageID")
     */
    protected $messageID;

    /**
     * @Expose
     * @XmlList(inline = true, entry = "OutputSelector")
     */
    protected $outputSelector;

    /**
     * @var string
     * @Expose
     * @SerializedName("WarningLevel")
     */
    protected $warningLevel;

    /**
     * @Expose
     * @Type("WebConsul\EbayApiBundle\Type\RequesterCredentials")
     * @SerializedName("RequesterCredentials")
     */
    protected $requesterCredentials;

    /**
     * @return array
     */
    public function getHeaders()
    {
        return
            [
                'X-EBAY-API-CALL-NAME:' . $this->getCallName(),
                'X-EBAY-API-SITEID:' . $this->siteId,
                // Site 0 is for US
                'X-EBAY-API-APP-NAME:' . $this->keys['app_id'],
                'X-EBAY-API-DEV-NAME:' . $this->keys['dev_id'],
                'X-EBAY-API-CERT-NAME:' . $this->keys['cert_id'],
                'X-EBAY-API-COMPATIBILITY-LEVEL:' . self::API_VERSION,
                'X-EBAY-API-REQUEST-ENCODING:XML',
                // for a POST request, the response by default is in the same format as the request
                'Content-Type:text/xml;charset=utf-8',
            ];
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
     * @return RequesterCredentials
     */
    public function getRequesterCredentials()
    {
        return $this->requesterCredentials;
    }

    /**
     * @param RequesterCredentials $requesterCredentials
     * @return $this
     */
    public function setRequesterCredentials(RequesterCredentials $requesterCredentials)
    {
        $this->requesterCredentials = $requesterCredentials;

        return $this;
    }

}
