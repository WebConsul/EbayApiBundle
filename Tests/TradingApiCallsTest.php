<?php
namespace WebConsul\EbayApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelector;
use WebConsul\EbayApiBundle\Call\BaseCall;

/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/6/15
 * Time: 10:23 PM
 */
class TradingApiCallsTest extends WebTestCase
{
    const API = 'Trading';

    public function testGetCategories()
    {
        $callName = 'GetCategories';
        $call = $this->init($callName);
        $call
            ->setSiteID(15)
            ->setCategorySiteID(2)
            ->setDetailLevel('ReturnAll')
            ->setLevelLimit(2)
            ->setWarningLevel('High');
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

        return $call;
    }

    /**
     * @param BaseCall $call
     */
    private function justDoIt(BaseCall $call)
    {
        $output = $call->getResponse();
        CssSelector::disableHtmlExtension();
        $crawler = new Crawler($output);

        $ack = $crawler->filter('Ack')->text();
        $this->assertEquals('Success', $ack);
        $this->assertGreaterThan(0, $crawler->filter($call->getCallName() . 'Response')->count());
    }

}