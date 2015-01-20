<?php
namespace WebConsul\EbayApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelector;
use WebConsul\EbayApiBundle\Call\BaseCall;
use WebConsul\EbayApiBundle\Type\RequesterCredentials;

/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/6/15
 * Time: 10:23 PM
 */
class TradingApiCallsTest extends WebTestCase
{
    const API = 'Trading';
    private $service;

    public function testGetCategories()
    {
        $callName = 'GetCategories';
        /** @var \WebConsul\EbayApiBundle\Call\Trading\GetCategoriesCall $call */
        $call = $this->init($callName);
        $token = $call->parameters['auth_token'];
        $requesterCredentials = new RequesterCredentials();
        $requesterCredentials->setEBayAuthToken($token);

        $call
            ->setSiteID(15)
            ->setCategorySiteID(2)
            ->setDetailLevel(['ReturnAll'])
            ->setLevelLimit(2)
            ->setWarningLevel('High')
            ->setRequesterCredentials($requesterCredentials);

        $this->justDoIt($call);
    }

    /**
     * @param $callName
     * @return BaseCall
     */
    private function init($callName)
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $container->get('web_consul_ebay_api.main');
        $call = $ebay->getInstance(self::API, $callName);
        $call->setMode($ebay::MODE_PRODUCT);
        $this->service = $container->get('web_consul_ebay_api.make_call');

        return $call;
    }

    /**
     * @param BaseCall $call
     */
    private function justDoIt(BaseCall $call)
    {
        $output = $this->service->getResponse($call);
        CssSelector::disableHtmlExtension();
        $crawler = new Crawler($output);

        $ack = $crawler->filter('Ack')->text();
        $this->assertEquals('Success', $ack);
        $this->assertGreaterThan(0, $crawler->filter($call->getCallName() . 'Response')->count());
    }

}