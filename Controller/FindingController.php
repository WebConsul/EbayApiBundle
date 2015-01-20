<?php
/**
 * Created by PhpStorm.
 * User: yakut
 * Date: 1/20/15
 * Time: 2:23 AM
 */

namespace WebConsul\EbayApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WebConsul\EbayApiBundle\Type\ItemFilter;
use WebConsul\EbayApiBundle\Type\PaginationInput;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * @Route("/callReference/callTest/Finding")
 */
class FindingController extends Controller
{
    /**
     * @Route("/findCompletedItems", name="findCompletedItems")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findCompletedItemsAction()
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

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findCompletedItemsCall $call */
        $call = $ebay->getInstance('Finding', 'findCompletedItems', $ebay::MODE_PRODUCT);

        $call->setKeywords('Garmin nuvi 1300 Automotive GPS Receiver')
            ->setCategoryId([156955])
            ->setItemFilter($itemFilterArray)
            ->setSortOrder('PricePlusShippingLowest')
            ->setPaginationInput($paginationInput);
        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/findItemsAdvanced", name="findItemsAdvanced")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findItemsAdvancedAction()
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

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsAdvancedCall $call */
        $call = $ebay->getInstance('Finding', 'findItemsAdvanced', $ebay::MODE_PRODUCT);

        $call
            ->setCategoryId([31388])
            ->setItemFilter($itemFilterArray)
            ->setPaginationInput($paginationInput)
            ->setOutputSelector(['AspectHistogram']);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/findItemsByCategory", name="findItemsByCategory")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findItemsByCategoryAction()
    {
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(3);

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsByCategoryCall $call */
        $call = $ebay->getInstance('Finding', 'findItemsByCategory', $ebay::MODE_PRODUCT);

        $call
            ->setCategoryId([10181])
            ->setPaginationInput($paginationInput)
            ->setOutputSelector(['CategoryHistogram']);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/findItemsByImage", name="findItemsByImage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findItemsByImageAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsByImageCall $call */
        $call = $ebay->getInstance('Finding', 'findItemsByImage', $ebay::MODE_PRODUCT);

        $call
            ->setItemId(170965157637)
            ->setCategoryId([4251])
            ->setOutputSelector(['GalleryInfo']);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/findItemsByKeywords", name="findItemsByKeywords")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findItemsByKeywordsAction()
    {
        $itemFilterArray = [];
        $itemFilter = new ItemFilter();
        $itemFilter->setName('MaxDistance')->setValue(['25']);
        $itemFilterArray[] = $itemFilter;

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsByKeywordsCall $call */
        $call = $ebay->getInstance('Finding', 'findItemsByKeywords', $ebay::MODE_PRODUCT);

        $call
            ->setKeywords('bagpipes')
            ->setBuyerPostalCode('95125')
            ->setItemFilter($itemFilterArray);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/findItemsByProduct", name="findItemsByProduct")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findItemsByProductAction()
    {
        $productId = new ProductID();
        $productId->setType('ReferenceID')->setValue(53039031);
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(2);

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsByProductCall $call */
        $call = $ebay->getInstance('Finding', 'findItemsByProduct', $ebay::MODE_PRODUCT);

        $call
            ->setProductId($productId)
            ->setPaginationInput($paginationInput);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/findItemsIneBayStores", name="findItemsIneBayStores")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function findItemsIneBayStoresAction()
    {
        $paginationInput = new PaginationInput();
        $paginationInput->setEntriesPerPage(2);

        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\findItemsIneBayStoresCall $call */
        $call = $ebay->getInstance('Finding', 'findItemsIneBayStores', $ebay::MODE_PRODUCT);

        $call
            ->setKeywords('iphone')
            ->setStoreName('rick1982rickh')
            ->setPaginationInput($paginationInput);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/getHistograms", name="getHistograms")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getHistogramsAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\getHistogramsCall $call */
        $call = $ebay->getInstance('Finding', 'getHistograms', $ebay::MODE_PRODUCT);

        $call->setCategoryId('11233');

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/getSearchKeywordsRecommendation", name="getSearchKeywordsRecommendation")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getSearchKeywordsRecommendationAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\getSearchKeywordsRecommendationCall $call */
        $call = $ebay->getInstance('Finding', 'getSearchKeywordsRecommendation', $ebay::MODE_PRODUCT);

        $call->setKeywords('acordian');

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }

    /**
     * @Route("/getVersion", name="getVersion")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getVersionAction()
    {
        /** @var \WebConsul\EbayApiBundle\Call\BaseCall $ebay */
        $ebay = $this->get('web_consul_ebay_api.main');
        /** @var \WebConsul\EbayApiBundle\Call\Finding\getVersionCall $call */
        $call = $ebay->getInstance('Finding', 'getVersion', $ebay::MODE_PRODUCT);

        /** @var \WebConsul\EbayApiBundle\Service\MakeCallService $service */
        $service = $this->get('web_consul_ebay_api.make_call');
        $output = $service->getResponse($call);

        return $this->render(
            'WebConsulEbayApiBundle:Call:testCall.html.twig',
            ['call' => $call, 'output' => $output,]
        );
    }
}
