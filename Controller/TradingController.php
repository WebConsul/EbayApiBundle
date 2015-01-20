<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/19/15
 * Time: 7:56 PM
 */

namespace WebConsul\EbayApiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WebConsul\EbayApiBundle\Type\RequesterCredentials;

/**
 * @Route("/callReference/callTest/Trading")
 */
class TradingController extends Controller
{
    /**
     * @Route("/GetCategories", name="GetCategories")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCategoriesAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Trading\GetCategoriesCall $call */
        $call = $ebay->getInstance('Trading', 'GetCategories', $ebay::MODE_PRODUCT);

        $token = $call->parameters['auth_token'];
        $requesterCredentials = new RequesterCredentials();
        $requesterCredentials->setEBayAuthToken($token);

        $call->setSiteID(15)
            ->setCategorySiteID(2)
            ->setDetailLevel(['ReturnAll'])
            ->setLevelLimit(2)
            ->setWarningLevel('High')
            ->setRequesterCredentials($requesterCredentials);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }
}
