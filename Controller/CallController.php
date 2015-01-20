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
                    'FindHalfProducts',
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

}
