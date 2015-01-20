<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/20/15
 * Time: 10:19 PM
 */

namespace WebConsul\EbayApiBundle\Service;


use WebConsul\EbayApiBundle\Call\Finding\FindCompletedItemsCall;
use WebConsul\EbayApiBundle\Call\Finding\FindItemsAdvancedCall;
use WebConsul\EbayApiBundle\Call\Finding\FindItemsByCategoryCall;
use WebConsul\EbayApiBundle\Call\Finding\FindItemsByImageCall;
use WebConsul\EbayApiBundle\Call\Finding\FindItemsByKeywordsCall;
use WebConsul\EbayApiBundle\Call\Finding\FindItemsByProductCall;
use WebConsul\EbayApiBundle\Call\Finding\FindItemsIneBayStoresCall;
use WebConsul\EbayApiBundle\Call\Finding\GetHistogramsCall;
use WebConsul\EbayApiBundle\Call\Finding\GetSearchKeywordsRecommendationCall;
use WebConsul\EbayApiBundle\Call\Finding\GetVersionCall;
use WebConsul\EbayApiBundle\Type\ItemFilter;
use WebConsul\EbayApiBundle\Type\PaginationInput;
use WebConsul\EbayApiBundle\Type\ProductID;

class FindingService
{
    public function findCompletedItems(FindCompletedItemsCall $call)
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

        return
            $call
                ->setKeywords('Garmin nuvi 1300 Automotive GPS Receiver')
                ->setCategoryId([156955])
                ->setItemFilter($itemFilterArray)
                ->setSortOrder('PricePlusShippingLowest')
                ->setPaginationInput($paginationInput);
    }


    public function findItemsAdvanced(FindItemsAdvancedCall $call)
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

        return
            $call
                ->setCategoryId([31388])
                ->setItemFilter($itemFilterArray)
                ->setPaginationInput($paginationInput)
                ->setOutputSelector(['AspectHistogram']);
    }

    public function findItemsByCategory(FindItemsByCategoryCall $call)
    {
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(3);

        return
            $call
                ->setCategoryId([10181])
                ->setPaginationInput($paginationInput)
                ->setOutputSelector(['CategoryHistogram']);
    }

    public function findItemsByImage(FindItemsByImageCall $call)
    {
        return
            $call
                ->setItemId(170965157637)
                ->setCategoryId([4251])
                ->setOutputSelector(['GalleryInfo']);
    }

    public function findItemsByKeywords(FindItemsByKeywordsCall $call)
    {
        $itemFilterArray = [];
        $itemFilter = new ItemFilter();
        $itemFilter->setName('MaxDistance')->setValue(['25']);
        $itemFilterArray[] = $itemFilter;

        return $call
            ->setKeywords('bagpipes')
            ->setBuyerPostalCode('95125')
            ->setItemFilter($itemFilterArray);
    }

    public function findItemsByProduct(FindItemsByProductCall $call)
    {
        $productId = new ProductID();
        $productId->setType('ReferenceID')->setValue(53039031);
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(2);

        return
            $call
                ->setProductId($productId)
                ->setPaginationInput($paginationInput);
    }

    public function findItemsIneBayStores(FindItemsIneBayStoresCall $call)
    {
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(2);

        return
            $call
                ->setKeywords('iphone')
                ->setStoreName('rick1982rickh')
                ->setPaginationInput($paginationInput);
    }

    public function getHistograms(GetHistogramsCall $call)
    {
        return $call->setCategoryId('11233');
    }

    public function getSearchKeywordsRecommendation(GetSearchKeywordsRecommendationCall $call)
    {
        return $call->setKeywords('acordian');
    }

    public function getVersion(GetVersionCall $call)
    {
        return $call;
    }

}
