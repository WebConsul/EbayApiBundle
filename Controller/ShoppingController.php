<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/19/15
 * Time: 12:34 PM
 */

namespace WebConsul\EbayApiBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WebConsul\EbayApiBundle\Type\NameValueList;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * @Route("/callReference/callTest/Shopping")
 */
class ShoppingController extends Controller
{
    /**
     * @Route("/FindHalfProducts", name="FindHalfProducts")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findHalfProductsAction()
    {
        $productID = new ProductID();
        $productID->setValue('0439294827')->setType('ISBN');

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindHalfProductsCall $call */
        $call = $ebay->getInstance('Shopping', 'FindHalfProducts', $ebay::MODE_PRODUCT);

        $call->setMaxEntries(3)
            ->setAvailableItemsOnly(true)
            ->setIncludeSelector('Items')
            ->setProductID($productID);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/FindPopularItems", name="FindPopularItems")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findPopularItemsAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindPopularItemsCall $call */
        $call = $ebay->getInstance('Shopping', 'FindPopularItems', $ebay::MODE_PRODUCT);
        $call->setMaxEntries(3)
            ->setQueryKeywords('Harry Potter')
            ->setCategoryIDExclude([29798]);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/FindPopularSearches", name="FindPopularSearches")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findPopularSearchesAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindPopularSearchesCall $call */
        $call = $ebay->getInstance('Shopping', 'FindPopularSearches', $ebay::MODE_PRODUCT);
        $call->setMaxKeywords(30)
            ->setQueryKeywords(['Harry Potter', 'Umberto Eco']);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/FindProducts", name="FindProducts")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findProductsAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindProductsCall $call */
        $call = $ebay->getInstance('Shopping', 'FindProducts', $ebay::MODE_PRODUCT);
        $call->setMaxEntries(3)
            ->setAvailableItemsOnly(true)
            ->setQueryKeywords('Harry Potter')
            ->setDomainName(['Audiobooks', 'Fiction Books']);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/FindReviewsAndGuides", name="FindReviewsAndGuides")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findReviewsAndGuidesAction()
    {
        $productID = new ProductID();
        $productID->setValue('9780545010221')->setType('ISBN');

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\FindReviewsAndGuidesCall $call */
        $call = $ebay->getInstance('Shopping', 'FindReviewsAndGuides', $ebay::MODE_PRODUCT);

        $call->setProductID($productID);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/GetCategoryInfo", name="GetCategoryInfo")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getCategoryInfoAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetCategoryInfoCall $call */
        $call = $ebay->getInstance('Shopping', 'GetCategoryInfo', $ebay::MODE_PRODUCT);

        $call->setCategoryID('-1')
            ->setIncludeSelector('ChildCategories')
            ->setMessageID('test');

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/GeteBayTime", name="GeteBayTime")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function geteBayTimeAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        $call = $ebay->getInstance('Shopping', 'GeteBayTime', $ebay::MODE_PRODUCT);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/GetItemStatus", name="GetItemStatus")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getItemStatusAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetItemStatusCall $call */
        $call = $ebay->getInstance('Shopping', 'GetItemStatus', $ebay::MODE_PRODUCT);
        $call->setItemID([291199543274, 321632064639]);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/GetMultipleItems", name="GetMultipleItems")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getMultipleItemsAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetMultipleItemsCall $call */
        $call = $ebay->getInstance('Shopping', 'GetMultipleItems', $ebay::MODE_PRODUCT);
        $call->setItemID([291199543274, 321632064639])
            ->setIncludeSelector('Description, Variations');

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/GetShippingCosts", name="GetShippingCosts")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getShippingCostsAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetShippingCostsCall $call */
        $call = $ebay->getInstance('Shopping', 'GetShippingCosts', $ebay::MODE_PRODUCT);
        $call->setItemID(221346769539)
            ->setDestinationPostalCode('95128')
            ->setIncludeDetails(true)
            ->setQuantitySold(1)
            ->setDestinationCountryCode('US');

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/GetSingleItem", name="GetSingleItem")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getSingleItemAction()
    {
        $variationSpecifics = [];
        $nameValueList = new NameValueList();
        $nameValueList->setName('Colour')->setValue(['RED']);
        $variationSpecifics[] = $nameValueList;

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetSingleItemCall $call */
        $call = $ebay->getInstance('Shopping', 'GetSingleItem', $ebay::MODE_PRODUCT);

        $call->setItemID(151551119370)
            ->setIncludeSelector('Details, Variations')
            ->setVariationSpecifics($variationSpecifics);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/GetUserProfile", name="GetUserProfile")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getUserProfile()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Shopping\GetUserProfileCall $call */
        $call = $ebay->getInstance('Shopping', 'GetUserProfile', $ebay::MODE_PRODUCT);
        $call
            ->setUserID('yakutskiy')
            ->setIncludeSelector('Details, FeedbackDetails')
            ->setMessageID(crypt(microtime()));

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }
}