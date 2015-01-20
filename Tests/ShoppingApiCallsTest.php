<?php
namespace WebConsul\EbayApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelector;
use WebConsul\EbayApiBundle\Call\BaseCall;
use WebConsul\EbayApiBundle\Type\NameValueList;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/6/15
 * Time: 10:23 PM
 */
class ShoppingApiCallsTest extends WebTestCase
{
    const API = 'Shopping';
    private $service;

    public function testFindHalfProducts()
    {
        $productID = new ProductID();
        $productID->setValue('0439294827')->setType('ISBN');

        $callName = 'FindHalfProducts';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindHalfProductsCall $call */
        $call = $this->init($callName);

        $call->setMaxEntries(3)
            ->setAvailableItemsOnly(true)
            ->setIncludeSelector('Items')
            ->setProductID($productID);

        $this->justDoIt($call);
    }

    public function testFindPopularItems()
    {
        $callName = 'FindPopularItems';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindPopularItemsCall $call */
        $call = $this->init($callName);

        $call
            ->setMaxEntries(3)
            ->setQueryKeywords('Harry Potter');

        $this->justDoIt($call);
    }

    public function testFindPopularSearches()
    {
        $callName = 'FindPopularSearches';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindPopularSearchesCall $call */
        $call = $this->init($callName);

        $call
            ->setMaxKeywords(30)
            ->setQueryKeywords('Harry Potter');

        $this->justDoIt($call);
    }

    public function testFindProducts()
    {
        $callName = 'FindProducts';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindProductsCall $call */
        $call = $this->init($callName);

        $call
            ->setMaxEntries(3)
            ->setAvailableItemsOnly(true)
            ->setQueryKeywords('Harry Potter');
        $this->justDoIt($call);
    }

    public function testFindReviewsAndGuides()
    {
        $productID = new ProductID();
        $productID->setValue('9780545010221')->setType('ISBN');

        $callName = 'FindReviewsAndGuides';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindReviewsAndGuidesCall $call */
        $call = $this->init($callName);

        $call->setProductID($productID);

        $this->justDoIt($call);
    }

    public function testGetCategoryInfo()
    {
        $callName = 'GetCategoryInfo';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetCategoryInfoCall $call */
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
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetItemStatusCall $call */
        $call = $this->init($callName);

        $call
            ->setItemID([291199543274, 321632064639]);

        $this->justDoIt($call);
    }

    public function testGetMultipleItems()
    {
        $callName = 'GetMultipleItems';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetMultipleItemsCall $call */
        $call = $this->init($callName);

        $call
            ->setItemID([291199543274, 321632064639])
            ->setIncludeSelector('Description, Variations');

        $this->justDoIt($call);
    }

    public function testGetShippingCosts()
    {
        $callName = 'GetShippingCosts';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetShippingCostsCall $call */
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
        $variationSpecifics = [];
        $nameValueList = new NameValueList();
        $nameValueList->setName('Colour')->setValue(['RED']);
        $variationSpecifics[] = $nameValueList;

        $callName = 'GetSingleItem';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetSingleItemCall $call */
        $call = $this->init($callName);

        $call
            ->setItemID(151551119370)
            ->setIncludeSelector('Details, Variations')
            ->setVariationSpecifics($variationSpecifics);

        $this->justDoIt($call);
    }

    public function testGetUserProfile()
    {
        $callName = 'GetUserProfile';
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetUserProfileCall $call */
        $call = $this->init($callName);

        $call
            ->setUserID('yakutskiy')
            ->setIncludeSelector('Details, FeedbackDetails')
            ->setMessageID(crypt(microtime()));

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