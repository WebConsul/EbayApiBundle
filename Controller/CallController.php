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
        $callList = [
            'Shopping' =>
                [
                    'FindPopularItems',
                    'FindPopularSearches',
                    'FindProducts',
                    'FindReviewsAndGuides',
                    'GetCategoryInfo',
                    'GeteBayTime',
                    'GetItemStatus',
                    'GetMultipleItems',
                    'GetShippingCosts',
                    'GetSingleItem',
                    'GetUserProfile'
                ],
            'Trading' => ['GetCategories'],
            'Finding' => [
                'findCompletedItems',
                'findItemsAdvanced',
                'findItemsByCategory',
                'findItemsByImage',
                'findItemsByKeywords',
                'findItemsByProduct',
                'findItemsIneBayStores',
                'getHistograms',
                'getSearchKeywordsRecommendation',
                'getVersion'
            ],
        ];

        return $this->render('WebConsulEbayApiBundle:Call:index.html.twig', ['callList' => $callList]);
    }

    /**
     * @Route("/callTest/{api}/{callName}", name="call_test_show")
     * @param string $api
     * @param string $callName
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testCallAction($api, $callName)
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        $call = $ebay->getInstance($api, $callName);
        $call->setMode($ebay::MODE_PRODUCT);
        switch ($callName) {
            // Shopping API
            case 'FindPopularItems':
                $call->setMaxEntries(3)
                    ->setQueryKeywords('Harry Potter');
                break;
            case 'FindPopularSearches':
                $call->setMaxKeywords(30)
                    ->setQueryKeywords('Harry Potter');
                break;
            case 'FindProducts':
                $call->setMaxEntries(3)
                    ->setAvailableItemsOnly(true)
                    ->setQueryKeywords('Harry Potter');
                break;
            case 'FindReviewsAndGuides':
                $call->setProductID('085391698920')
                    ->setProductIDType('UPC');
                break;
            case 'GetCategoryInfo':
                $call->setCategoryID('-1')
                    ->setIncludeSelector('ChildCategories');
                break;
            case 'GetItemStatus':
                $call->setItemID(array(291199543274, 321632064639));
                break;
            case 'GetMultipleItems':
                $call->setItemID(array(291199543274, 321632064639))
                    ->setIncludeSelector(array('Description', 'Variations'));
                break;
            case 'GetShippingCosts':
                $call->setItemID(221346769539)
                    ->setDestinationPostalCode('95128')
                    ->setIncludeDetails(true)
                    ->setQuantitySold(1)
                    ->setDestinationCountryCode('US');
                break;
            case 'GetSingleItem':
                $call->setItemID(321632064639)
                    ->setIncludeSelector(array('Details', 'Variations'));
                break;
            case 'GetUserProfile':
                $call->setUserID('yakutskiy')
                    ->setIncludeSelector(array('Details', 'FeedbackDetails'));
                break;
            // Finding API
            case 'findCompletedItems':
                $call->setKeywords('Garmin nuvi 1300 Automotive GPS Receiver')
                    ->setCategoryId([156955])
                    ->setItemFilter(
                        array(
                            array('name' => 'Condition', 'values' => array('3000')),
                            array('name' => 'FreeShippingOnly', 'values' => array('true')),
                            array('name' => 'SoldItemsOnly', 'values' => array('true')),
                        )
                    )
                    ->setSortOrder('PricePlusShippingLowest')
                    ->setPaginationInput(array('entriesPerPage' => 2, 'pageNumber' => 1));
                break;
            case 'findItemsAdvanced':
                $call->setOutputSelector(array('AspectHistogram'))
                    ->setCategoryId(array(31388))
                    ->setItemFilter(
                        array(
                            array('name' => 'Condition', 'values' => array('Used')),
                            array('name' => 'ListingType', 'values' => array('AuctionWithBIN')),
                        )
                    )
                    ->setPaginationInput(array('entriesPerPage' => 2));
                break;
            case 'findItemsByCategory':
                $call->setCategoryId(array(10181))
                    ->setOutputSelector(array('CategoryHistogram'))
                    ->setPaginationInput(array('entriesPerPage' => 3));
                break;
            case 'findItemsByImage':
                $call
                    ->setItemId(261713305324)
                    ->setCategoryId(array(4251))
                    ->setOutputSelector(array('GalleryInfo'));
                break;
            case 'findItemsByKeywords':
                $call->setKeywords('bagpipes')
                    ->setBuyerPostalCode('95125')
                    ->setItemFilter(
                        array(
                            array('name' => 'MaxDistance', 'values' => array('25')),
                        )
                    );
                break;
            case 'findItemsByProduct':
                $call->setProductIdType('ReferenceID')
                    ->setProductId('53039031')
                    ->setPaginationInput(array('entriesPerPage' => 2));
                break;
            case 'findItemsIneBayStores':
                $call->setKeywords('iphone')
                    ->setStoreName('rick1982rickh')
                    ->setPaginationInput(array('entriesPerPage' => 2));
                break;
            case 'getHistograms':
                $call->setCategoryId('11233');
                break;
            case 'getSearchKeywordsRecommendation':
                $call->setKeywords('acordian');
                break;
            // Trading API
            case 'GetCategories':
                $call->setSiteID(15)
                    ->setCategorySiteID(2)
                    ->setDetailLevel('ReturnAll')
                    ->setLevelLimit(2)
                    ->setWarningLevel('High');
                break;
        }
        //  $call->setHeaders();
        $output = $call->getResponse();

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            [
                'api' => $api,
                'callName' => $callName,
                'headers' => $call->getHeaders(),
                'postFields' => $call->getPostFields(),
                'output' => preg_replace('/></', ">\n<", $output),
            ]
        );
    }
}
