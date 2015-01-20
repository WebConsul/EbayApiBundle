<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/14/15
 * Time: 8:18 PM
 */

namespace WebConsul\EbayApiBundle\Service;


use JMS\Serializer\Serializer;
use WebConsul\EbayApiBundle\Call\BaseCall;

class MakeCallService
{
    private $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getResponse(BaseCall $call)
    {
        $input = $this->getPostFields($call);
        $call->setInput($input);
        $ch = curl_init($call->getRequestUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $call->getHeaders()); //set headers using the above array of headers
        curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
        if (isset($call->parameters['timeout'])) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $call->parameters['timeout']);
        }
        $data = curl_exec($ch);
        curl_close($ch);

        return preg_replace('/></', ">\n<", $data);
    }

    private function getPostFields(BaseCall $call)
    {
        return $this->serializer->serialize($call, 'xml');
    }
}