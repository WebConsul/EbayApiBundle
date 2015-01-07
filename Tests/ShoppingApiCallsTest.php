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
class ShoppingApiCallsTest extends WebTestCase
{
    const API = 'Shopping';

    public function testFindPopularItems()
    {
        $callName = 'FindPopularItems';
        $call = $this->init($callName);
        $call
            ->setMaxEntries(3)
            ->setQueryKeywords('Harry Potter');
        $this->justDoIt($call);
    }

    public function testFindPopularSearches()
    {
        $callName = 'FindPopularSearches';
        $call = $this->init($callName);
        $call
            ->setMaxKeywords(30)
            ->setQueryKeywords('Harry Potter');
        $this->justDoIt($call);
    }

    public function testFindProducts()
    {
        $callName = 'FindProducts';
        $call = $this->init($callName);
        $call
            ->setMaxEntries(3)
            ->setAvailableItemsOnly(true)
            ->setQueryKeywords('Harry Potter');
        $this->justDoIt($call);
    }

    public function testFindReviewsAndGuides()
    {
        $callName = 'FindReviewsAndGuides';
        $call = $this->init($callName);
        $call
            ->setProductID('085391698920')
            ->setProductIDType('UPC');
        $this->justDoIt($call);
    }

    public function testGetCategoryInfo()
    {
        $callName = 'GetCategoryInfo';
        $call = $this->init($callName);
        $call
            ->setCategoryID('-1')
            ->setIncludeSelector('ChildCategories');
        $this->justDoIt($call);
    }

    public function testGeteBayTime()
    {
        $callName = 'GeteBayTime';
        $call = $this->init($callName);
        $this->justDoIt($call);
    }

    public function testGetItemStatus()
    {
        $callName = 'GetItemStatus';
        $call = $this->init($callName);
        $call
            ->setItemID(array(291199543274, 321632064639));
        $this->justDoIt($call);
    }

    public function testGetMultipleItems()
    {
        $callName = 'GetMultipleItems';
        $call = $this->init($callName);
        $call
            ->setItemID(array(291199543274, 321632064639))
            ->setIncludeSelector(array('Description', 'Variations'));
        $this->justDoIt($call);
    }

    public function testGetShippingCosts()
    {
        $callName = 'GetShippingCosts';
        $call = $this->init($callName);
        $call
            ->setItemID(221346769539)
            ->setDestinationPostalCode('95128')
            ->setIncludeDetails(true)
            ->setQuantitySold(1)
            ->setDestinationCountryCode('US');
        $this->justDoIt($call);
    }

    public function testGetSingleItem()
    {
        $callName = 'GetSingleItem';
        $call = $this->init($callName);
        $call
            ->setItemID(321632064639)
            ->setIncludeSelector(array('Details', 'Variations'));
        $this->justDoIt($call);
    }

    public function testGetUserProfile()
    {
        $callName = 'GetUserProfile';
        $call = $this->init($callName);
        $call
            ->setUserID('yakutskiy')
            ->setIncludeSelector(array('Details', 'FeedbackDetails'));
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