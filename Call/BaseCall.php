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

    static $apiName;
    static $parameters;
    static $callName;


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
    static function getInstance($apiName, $callName)
    {
        self::$apiName = $apiName;
        self::$callName = $callName;
        $className = 'WebConsul\\EbayApiBundle\\Call\\' . $apiName . '\\' . ucfirst($callName) . 'Call';

        return new $className(self::$parameters);
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

    private function openRequest()
    {
        return '<?xml version="1.0" encoding="utf-8"?>' . "\n"
        . '<' . $this->getCallName() . 'Request xmlns="' . $this::XMLNS . '">' . "\n";
    }

    private function closeRequest()
    {
        return '</' . $this->getCallName() . 'Request>' . "\n";
    }

    private function getCallName()
    {
        return self::$callName;
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

}