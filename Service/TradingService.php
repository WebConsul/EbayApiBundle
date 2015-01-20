<?php
namespace WebConsul\EbayApiBundle\Service;

use WebConsul\EbayApiBundle\Call\Trading\GetCategoriesCall;
use WebConsul\EbayApiBundle\Type\RequesterCredentials;

class TradingService
{

    public function getCategories(GetCategoriesCall $call)
    {
        $token = $call->parameters['auth_token'];
        $requesterCredentials = new RequesterCredentials();
        $requesterCredentials->setEBayAuthToken($token);

        return $call->setSiteID(15)
            ->setCategorySiteID(2)
            ->setDetailLevel(['ReturnAll'])
            ->setLevelLimit(2)
            ->setWarningLevel('High')
            ->setRequesterCredentials($requesterCredentials);
    }
}
