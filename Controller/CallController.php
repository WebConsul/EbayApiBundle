<?php

namespace WebConsul\EbayApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CallController extends Controller
{
    /**
     * @Route("/callReference", name="call_test_index")
     */
    public function indexAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');

        return $this->render('WebConsulEbayApiBundle:Call:index.html.twig', ['callList' => $ebay->getCallReference()]);
    }

    /**
     * @Route("/{api}/{callName}", name="callExample")
     * @param string $api
     * @param string $callName
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function callAction($api, $callName)
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $call */
        $call = $ebay->getInstance($api, $callName, $ebay::MODE_PRODUCT);
        $apiService = $this->get('web_consul_ebay_api.' . strtolower($api));
        $call = $apiService->$callName($call);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $callService = $this->get('web_consul_ebay_api.make_call');
        $output = $callService->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

}
