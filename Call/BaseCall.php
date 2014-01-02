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
    const AUTH_TOKEN = 'AgAAAA**AQAAAA**aAAAAA**d+MlUQ**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wNmYOiAJWFoQ2dj6x9nY+seQ**/7oBAA**AAMAAA**9uG0gK3r4JerR2pAAJ2LZQlrRsgpE0m0v/H4pBevGy99QU9SRqq8VHJOlubepC1bWvgd6ibAJOHY4zDErv6Ril1RV75k7D/5RsNWaB7bknYvnk1+NMt+74EOV2rnXgcqv0yZ1VXlNkHXJ/+e2IwZoF7cSxWUD/RifNfk2i0LVWvmDedvEMNwrRTz9yIypcLUktjgiLw0pl+OTDv61K8O5AnBnf+HNG7ODWAUMajufpktivdGAUG77pqb218a2bRw3dgYyu/wJDGU3CXRWnvqZGcKaI0qPqVVQYRMbzgwys979+oWg3MVaSkjbTgtO+EVGGPkNZSjcO8DpFWg3Wja8qlh8l0+mBbx8KucaRiOGYKRUFgZX8edzFPD9iuyMU1O8jc7IlNXBpgPoWBHhkaW3dg+Fgq0/IyEHoIPJsBRbLkZV12MOIfNEezHIs7sk1M7n2Rf7w0QF8neL9oSSJaX80vQGTercD/ibmptb9nm4oKY0NauO0A1qaQt89exdakqvX4xGKRcZFm8HuVi1R+ez50I0hqZaRNMMANgJ1W+O9PTJR54joMHQV6cEswR/eCTIqW71oS5n3vK0pm0O/mvfpu9DSkh0dYRkiuniq5pp1qP7PqkZ4Nt39dzwgVM1EJ7sfJkpl6D7PeG02etA3p1uWiutvXDsCgCd62dmEO+FymoltSLOplSNdvR3IvA4xQ8EIWeA3yQ6diB3/pVRNGnCgYyD261hE46jIab4vIbAhAgZ7Q0MU2QdQFPYycgh5dh';

    static $apiName;
    static $parameters;
    static $callName;


    protected $headers = array();
    protected $siteId = 0; // US bu default
    protected $mode = 0; // Sandbox by default
    protected $input;

    private $requestUrl;


    public function __construct(array $parameters)
    {
        self::$parameters = $parameters;
    }

    /**
     * @param $apiName (e.g. Trading, Finding, etc.)
     * @param $callName
     * @return object
     */
    static function getInstance($apiName, $callName)
    {
        self::$apiName = $apiName;
        self::$callName = $callName;
        $className = 'WebConsul\\EbayApiBundle\\Call\\' . $apiName . '\\' . $callName . 'Call';

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
     * @return string
     */
    public function getInput()
    {
        return $this->input;
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
    private function appendStandardInputFields($standardInputFields)
    {
        $standardInput = '';
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

        return $standardInput;
    }

    private function openRequest()
    {
        return '<?xml version="1.0" encoding="utf-8"?>'
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
        return $this->openRequest()
        . $this->getInput()
        . $this->appendStandardInputFields($this->getStandardInputFields())
        . $this->closeRequest();
    }

} 