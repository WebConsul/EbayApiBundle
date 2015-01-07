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

        $this->justDoIt($call);
    }

    public function testFindItemsAdvanced()
    {
        $callName = 'findItemsAdvanced';
        $call = $this->init($callName);

        $call->setOutputSelector(['AspectHistogram'])
            ->setCategoryId([31388])
            ->setItemFilter(
                [
                    ['name' => 'Condition', 'values' => ['Used']],
                    ['name' => 'ListingType', 'values' => ['AuctionWithBIN']]
                ]
            )
            ->setPaginationInput(['entriesPerPage' => 2]);

        $this->justDoIt($call);
    }

    public function testFindItemsByCategory()
    {
        $callName = 'findItemsByCategory';
        $call = $this->init($callName);

        $call->setCategoryId([10181])
            ->setOutputSelector(['CategoryHistogram'])
            ->setPaginationInput(['entriesPerPage' => 3]);

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
        $callName = 'findItemsByKeywords';
        $call = $this->init($callName);

        $call->setKeywords('bagpipes')
            ->setBuyerPostalCode('95125')
            ->setItemFilter(
                array(
                    array('name' => 'MaxDistance', 'values' => array('25')),
                )
            );
        $this->justDoIt($call);
    }

    public function testFindItemsByProduct()
    {
        $callName = 'findItemsByProduct';
        $call = $this->init($callName);

        $call
            ->setProductIdType('ReferenceID')
            ->setProductId('53039031')
            ->setPaginationInput(array('entriesPerPage' => 2));

        $this->justDoIt($call);
    }

    public function testFindItemsIneBayStores()
    {
        $callName = 'findItemsIneBayStores';
        $call = $this->init($callName);

        $call
            ->setKeywords('iphone')
            ->setStoreName('rick1982rickh')
            ->setPaginationInput(array('entriesPerPage' => 2));

        $this->justDoIt($call);
    }

    public function testGetHistograms()
    {
        $callName = 'getHistograms';
        $call = $this->init($callName);

        $call->setCategoryId('11233');

        $this->justDoIt($call, false);
    }

    public function testGetSearchKeywordsRecommendation()
    {
        $callName = 'getSearchKeywordsRecommendation';
        $call = $this->init($callName);

        $call->setKeywords('acordian');

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

        return $call;
    }

    /**
     * @param BaseCall $call
     * @param bool $checkSearchResultsCount
     */
    private function justDoIt(BaseCall $call, $checkSearchResultsCount = true)
    {
        $output = $call->getResponse();
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