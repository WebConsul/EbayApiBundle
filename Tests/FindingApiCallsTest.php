<?php
namespace WebConsul\EbayApiBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelector;
use WebConsul\EbayApiBundle\Call\BaseCall;
use WebConsul\EbayApiBundle\Type\ItemFilter;
use WebConsul\EbayApiBundle\Type\PaginationInput;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/6/15
 * Time: 10:23 PM
 */
class FindingApiCallsTest extends WebTestCase
{
    const API = 'Finding';
    private $service;

    public function testFindCompletedItems()
    {
        $itemFilterArray = [];
        $itemFilter = new ItemFilter();
        $itemFilter->setName('Condition')->setValue(['3000']);
        $itemFilterArray[] = $itemFilter;
        $itemFilter = new ItemFilter();
        $itemFilter->setName('FreeShippingOnly')->setValue(['true']);
        $itemFilterArray[] = $itemFilter;
        $itemFilter = new ItemFilter();
        $itemFilter->setName('SoldItemsOnly')->setValue(['true']);
        $itemFilterArray[] = $itemFilter;
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(2)->setPageNumber(1);

        $callName = 'findCompletedItems';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findCompletedItemsCall $call */
        $call = $this->init($callName);

        $call->setKeywords('Garmin nuvi 1300 Automotive GPS Receiver')
            ->setCategoryId([156955])
            ->setItemFilter($itemFilterArray)
            ->setSortOrder('PricePlusShippingLowest')
            ->setPaginationInput($paginationInput);

        $this->justDoIt($call);
    }

    public function testFindItemsAdvanced()
    {
        $itemFilterArray = [];
        $itemFilter = new ItemFilter();
        $itemFilter->setName('Condition')->setValue(['Used']);
        $itemFilterArray[] = $itemFilter;
        $itemFilter = new ItemFilter();
        $itemFilter->setName('ListingType')->setValue(['AuctionWithBIN']);
        $itemFilterArray[] = $itemFilter;
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(2);

        $callName = 'findItemsAdvanced';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsAdvancedCall $call */
        $call = $this->init($callName);

        $call
            ->setCategoryId([31388])
            ->setItemFilter($itemFilterArray)
            ->setPaginationInput($paginationInput)
            ->setOutputSelector(['AspectHistogram']);

        $this->justDoIt($call);
    }

    public function testFindItemsByCategory()
    {
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(3);

        $callName = 'findItemsByCategory';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsByCategoryCall $call */
        $call = $this->init($callName);

        $call
            ->setCategoryId([10181])
            ->setPaginationInput($paginationInput)
            ->setOutputSelector(['CategoryHistogram']);

        $this->justDoIt($call);
    }

    /*  public function testFindItemsByImage()
      {
          $callName = 'findItemsByImage';
          $call = $this->init($callName);

          $call->setCategoryId(array(4251))
              ->setOutputSelector(array('GalleryInfo'))
              ->setItemId(170965157637);

                  $this->justDoIt($call);
      }*/

    public function testFindItemsByKeywords()
    {
        $itemFilterArray = [];
        $itemFilter = new ItemFilter();
        $itemFilter->setName('MaxDistance')->setValue(['25']);
        $itemFilterArray[] = $itemFilter;

        $callName = 'findItemsByKeywords';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsByKeywordsCall $call */
        $call = $this->init($callName);

        $call
            ->setKeywords('bagpipes')
            ->setBuyerPostalCode('95125')
            ->setItemFilter($itemFilterArray);

        $this->justDoIt($call);
    }

    public function testFindItemsByProduct()
    {
        $productId = new ProductID();
        $productId->setType('ReferenceID')->setValue(53039031);
        $pagination = new PaginationInput();
        $pagination->setEntriesPerPage(2);

        $callName = 'findItemsByProduct';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsByProductCall $call */
        $call = $this->init($callName);
        $call
            ->setProductId($productId)
            ->setPaginationInput($pagination);

        $this->justDoIt($call);
    }

    public function testFindItemsIneBayStores()
    {
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(2);

        $callName = 'findItemsIneBayStores';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsIneBayStoresCall $call */
        $call = $this->init($callName);

        $call
            ->setKeywords('iphone')
            ->setStoreName('rick1982rickh')
            ->setPaginationInput($paginationInput);

        $this->justDoIt($call);
    }

    public function testGetHistograms()
    {
        $callName = 'getHistograms';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\getHistogramsCall $call */
        $call = $this->init($callName);

        $call->setCategoryId('11233');

        $this->justDoIt($call, false);
    }

    public function testGetSearchKeywordsRecommendation()
    {
        $callName = 'getSearchKeywordsRecommendation';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\getSearchKeywordsRecommendationCall $call */
        $call = $this->init($callName);

        $call->setKeywords('acordian');

        $this->justDoIt($call, false);
    }

    public function testGetVersion()
    {
        $callName = 'getVersion';
        /** @var \WebConsul\EbayApiBundle\Call\Finding\getVersionCall $call */
        $call = $this->init($callName);

        $this->justDoIt($call, false);
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
     * @param bool $checkSearchResultsCount
     */
    private function justDoIt(BaseCall $call, $checkSearchResultsCount = true)
    {
        $output = $this->service->getResponse($call);
        CssSelector::disableHtmlExtension();
        $crawler = new Crawler($output);

        $ack = $crawler->filter('ack')->text();
        $this->assertEquals('Success', $ack);
        if ($checkSearchResultsCount) {
            $searchResultCount = intval($crawler->filter('searchResult')->extract('count'));
            $this->assertGreaterThan(0, $searchResultCount);
        }
        $this->assertGreaterThan(0, $crawler->filter($call->getCallName() . 'Response')->count());
    }

}