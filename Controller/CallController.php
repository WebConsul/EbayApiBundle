<?php

namespace WebConsul\EbayApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CallController extends Controller
{
    /**
     * @Route("/callReference", name="call_test_index")
     * @Template("WebConsulEbayApiBundle:Call:index.html.twig")
     */
    public function indexAction()
    {
        $callList = array(
            'Shopping' => array(
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
            ),
            'Trading' => array('GetCategories'),
            'Finding' => array(),
        );

        return array('callList' => $callList);
    }

    /**
     * @Route("/callTest/{api}/{callName}", name="call_test_show")
     * @Template("WebConsulEbayApiBundle:Call:testCall.html.twig")
     */
    public function testCallAction($api, $callName)
    {
        $ebay = $this->get('web_consul_ebay_api.main');
        $call = $ebay::getInstance($api, $callName);
        $call->setMode($ebay::MODE_PRODUCT);
        switch ($callName) {
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
                $call->setItemID(array(161188270777, 221346769539));
                break;
            case 'GetMultipleItems':
                $call->setItemID(array(161188270777, 221346769539))
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
                $call->setItemID(331092630373)
                    ->setIncludeSelector(array('Details', 'Variations', 'ShippingCosts'));
                break;
            case 'GetUserProfile':
                $call->setUserID('yakutskiy')
                    ->setIncludeSelector(array('Details', 'FeedbackDetails'));
                break;
            case 'GetCategories':
                $call->setSiteID(15)
                    ->setCategorySiteID(2)
                    ->setDetailLevel('ReturnAll')
                    ->setLevelLimit(2)
                    ->setWarningLevel('High');
                break;
        }

        return array(
            'api' => $api,
            'callName' => $callName,
            'postFields' => $call->getPostFields(),
            'headers' => $call->getHeaders(),
            'output' => $call->getResponse(),
        );
    }
}
