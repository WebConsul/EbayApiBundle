<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 12/30/13
 * Time: 12:58 PM
 */

namespace WebConsul\EbayApiBundle\Call;


class BaseCall
{

    const MODE_SANDBOX = 0;
    const MODE_PRODUCT = 1;

    static $parameters;

    protected $apiName;
    protected $callName;
    protected $headers = [];
    protected $siteId = 0; // US by default
    protected $mode = 0; // Sandbox by default
    protected $responseFormat = 'XML';
    protected $input;
    protected $keys = [];

    private $requestUrl;
    private $postFields;


    public function __construct(array $parameters)
    {
        self::$parameters = $parameters;
        $this->keys = self::$parameters['application_keys'];
    }

    /**
     * @param string $apiName (e.g. Trading, Finding, etc.)
     * @param string $callName
     * @return object
     */
    public function getInstance($apiName, $callName)
    {
        $className = 'WebConsul\\EbayApiBundle\\Call\\' . $apiName . '\\' . ucfirst($callName) . 'Call';
        $instance = new $className(self::$parameters);
        $instance->setApiName($apiName)->setCallName($callName);

        return $instance;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
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

    public function getResponse()
    {
        $this->setHeaders();
        $ch = curl_init($this->getRequestUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaders()); //set headers using the above array of headers
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getPostFields());
        if (isset(self::$parameters['timeout'])) {
            curl_setopt($ch, CURLOPT_TIMEOUT, self::$parameters['timeout']);
        }
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function getCallName()
    {
        return $this->callName;
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

    public function getPostFields()
    {
        if (!$this->postFields) {
            $this->postFields = $this->openRequest()
                . $this->getInput()
                . $this->appendStandardInputFields($this->getStandardInputFields())
                . $this->closeRequest();
        }

        return $this->postFields;
    }

    /**
     * @return array
     */
    protected function getStandardInputFields()
    {
        return $this->standardInputFields;
    }

    /**
     * Add standard input fields to the request
     * @param array $standardInputFields
     * @return string
     */
    protected function appendStandardInputFields($standardInputFields)
    {
        $standardInput = '';
        if (!empty($standardInputFields)) {
            foreach ($standardInputFields as $inputField) {
                $method = 'get' . $inputField;
                $value = $this->$method();
                if (is_array($value) && !empty($value)) {
                    foreach ($value as $str) {
                        $standardInput .= '<' . $inputField . '>' . $str . '</' . $inputField . '>' . "\n";
                    }
                } elseif (!is_array($value) && $value) {
                    $standardInput .= '<' . $inputField . '>' . $value . '</' . $inputField . '>' . "\n";
                }
            }
        }

        return $standardInput;
    }

    /**
     * get application_keys for current mode ('sandbox' or 'production')
     * @return array
     */
    protected function getKeys()
    {
        if ($this->mode === self::MODE_PRODUCT) {
            return $this->keys['production'];
        } else {
            return $this->keys['sandbox'];
        }
    }

    /**
     * @return string
     */
    private function getRequestUrl()
    {
        if ($this->mode === self::MODE_PRODUCT) {
            $this->requestUrl = $this::URL_PRODUCT;
        } else {
            $this->requestUrl = $this::URL_SANDBOX;
        }

        return $this->requestUrl;
    }


    private function openRequest()
    {
        return '<?xml version="1.0" encoding="utf-8"?>' . "\n"
        . '<' . $this->getCallName() . 'Request xmlns="' . $this::XMLNS . '">' . "\n";
    }

    private function closeRequest()
    {
        return '</' . $this->getCallName() . 'Request>' . "\n";
    }


}