<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/20/15
 * Time: 10:23 PM
 */

namespace WebConsul\EbayApiBundle\Service;

use WebConsul\EbayApiBundle\Call\Shopping\FindHalfProductsCall;
use WebConsul\EbayApiBundle\Call\Shopping\FindPopularItemsCall;
use WebConsul\EbayApiBundle\Call\Shopping\FindPopularSearchesCall;
use WebConsul\EbayApiBundle\Call\Shopping\FindProductsCall;
use WebConsul\EbayApiBundle\Call\Shopping\FindReviewsAndGuidesCall;
use WebConsul\EbayApiBundle\Call\Shopping\GetCategoryInfoCall;
use WebConsul\EbayApiBundle\Call\Shopping\GeteBayTimeCall;
use WebConsul\EbayApiBundle\Call\Shopping\GetItemStatusCall;
use WebConsul\EbayApiBundle\Call\Shopping\GetMultipleItemsCall;
use WebConsul\EbayApiBundle\Call\Shopping\GetShippingCostsCall;
use WebConsul\EbayApiBundle\Call\Shopping\GetSingleItemCall;
use WebConsul\EbayApiBundle\Call\Shopping\GetUserProfileCall;
use WebConsul\EbayApiBundle\Type\NameValueList;
use WebConsul\EbayApiBundle\Type\ProductID;

class ShoppingService
{

    public function findHalfProducts(FindHalfProductsCall $call)
    {
        $productID = new ProductID();
        $productID->setValue('0439294827')->setType('ISBN');

        return
            $call
                ->setMaxEntries(3)
                ->setAvailableItemsOnly(true)
                ->setIncludeSelector('Items')
                ->setProductID($productID);
    }

    public function findPopularItems(FindPopularItemsCall $call)
    {
        return
            $call
                ->setMaxEntries(3)
                ->setQueryKeywords('Harry Potter')
                ->setCategoryIDExclude([29798]);
    }

    public function findPopularSearches(FindPopularSearchesCall $call)
    {
        return
            $call
                ->setMaxKeywords(30)
                ->setQueryKeywords(['Harry Potter', 'Umberto Eco']);
    }

    public function findProducts(FindProductsCall $call)
    {
        return
            $call
                ->setMaxEntries(3)
                ->setAvailableItemsOnly(true)
                ->setQueryKeywords('Harry Potter')
                ->setDomainName(['Audiobooks', 'Fiction Books']);
    }

    public function findReviewsAndGuides(FindReviewsAndGuidesCall $call)
    {
        $productID = new ProductID();
        $productID->setValue('9780545010221')->setType('ISBN');

        return $call->setProductID($productID);
    }

    public function getCategoryInfo(GetCategoryInfoCall $call)
    {
        return
            $call
                ->setCategoryID('-1')
                ->setIncludeSelector('ChildCategories')
                ->setMessageID('test');
    }

    public function geteBayTime(GeteBayTimeCall $call)
    {
        return $call;
    }

    public function getItemStatus(GetItemStatusCall $call)
    {
        return $call->setItemID([291199543274, 321632064639]);
    }

    public function getMultipleItems(GetMultipleItemsCall $call)
    {
        return
            $call
                ->setItemID([291199543274, 321632064639])
                ->setIncludeSelector('Description, Variations');
    }

    public function getShippingCosts(GetShippingCostsCall $call)
    {
        return
            $call
                ->setItemID(221346769539)
                ->setDestinationPostalCode('95128')
                ->setIncludeDetails(true)
                ->setQuantitySold(1)
                ->setDestinationCountryCode('US');
    }

    public function getSingleItem(GetSingleItemCall $call)
    {
        $variationSpecifics = [];
        $nameValueList = new NameValueList();
        $nameValueList->setName('Colour')->setValue(['RED']);
        $variationSpecifics[] = $nameValueList;

        return
            $call
                ->setItemID(151551119370)
                ->setIncludeSelector('Details, Variations')
                ->setVariationSpecifics($variationSpecifics);
    }

    public function getUserProfile(GetUserProfileCall $call)
    {
        return
            $call
                ->setUserID('yakutskiy')
                ->setIncludeSelector('Details, FeedbackDetails')
                ->setMessageID(crypt(microtime()));
    }
}
