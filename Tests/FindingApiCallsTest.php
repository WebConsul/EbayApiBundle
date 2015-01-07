<?php
namespace WebConsul\EbayApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelector;

/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/6/15
 * Time: 10:23 PM
 */
class FindingApiCallsTest extends WebTestCase
{
    const API = 'Finding';

    public function testFindCompletedItems()
    {
        $callName = 'findCompletedItems';
        $call = $this->init($callName);

        $call
            ->setKeywords('Garmin nuvi 1300 Automotive GPS Receiver')
            ->setCategoryId([156955])
            ->setItemFilter(
                [
                    ['name' => 'Condition', 'values' => ['3000']],
                    ['name' => 'FreeShippingOnly', 'values' => ['true']],
                    ['name' => 'SoldItemsOnly', 'values' => ['true']],
                ]
            )
            ->setSortOrder('PricePlusShippingLowest')
            ->setPaginationInput(['entriesPerPage' => 2, 'pageNumber' => 1]);

        $output = $call->getResponse();
        $crawler = new Crawler($output);
        CssSelector::disableHtmlExtension();

        $ack = $crawler->filter('ack')->text();
        $this->assertEquals('Success', $ack);
        $searchResultCount = intval($crawler->filter('searchResult')->extract('count'));
        $this->assertGreaterThan(0, $searchResultCount);
        $this->assertGreaterThan(0, $crawler->filter($callName . 'Response')->count());
    }

    /**
     * @param $callName
     * @return array
     */
    private function init($callName)
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $container->get('web_consul_ebay_api.main');
        $call = $ebay::getInstance(self::API, $callName);
        $call->setMode($ebay::MODE_PRODUCT);

        return $call;
    }

}