<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindProducts.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * @XmlRoot("FindHalfProductsRequest")
 */
class FindHalfProductsCall extends BaseShoppingCall
{
    /**
     * @var boolean
     * @SerializedName("AvailableItemsOnly")
     */
    private $availableItemsOnly;

    /**
     * @XmlList(inline = true, entry = "DomainName")
     */
    private $domainName;

    /**
     * @var string
     * @SerializedName("ProductSort")
     */
    private $productSort;

    /**
     * @var  string
     * @SerializedName("QueryKeywords")
     */
    private $queryKeywords;

    /**
     * @var  string
     * @SerializedName("SellerID")
     */
    private $sellerID;

    /** @var  string
     * @SerializedName("sortOrder")
     */
    private $sortOrder;


    /**
     * @return string
     */
    public function getQueryKeywords()
    {
        return $this->queryKeywords;
    }

    /**
     * @param string $queryKeywords
     * @return $this
     */
    public function setQueryKeywords($queryKeywords)
    {
        $this->queryKeywords = $queryKeywords;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getAvailableItemsOnly()
    {
        return $this->availableItemsOnly;
    }

    /**
     * @param boolean $availableItemsOnly
     * @return $this
     */
    public function setAvailableItemsOnly($availableItemsOnly)
    {
        $this->availableItemsOnly = $availableItemsOnly;

        return $this;
    }

    /**
     * @return array
     */
    public function getDomainName()
    {
        return $this->domainName;
    }

    /**
     * @param array $domainName
     * @return $this
     */
    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductSort()
    {
        return $this->productSort;
    }

    /**
     * @param string $productSort
     * @return $this
     */
    public function setProductSort($productSort)
    {
        $this->productSort = $productSort;

        return $this;
    }

    /**
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param string $sortOrder
     * @return $this
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return string
     */
    public function getSellerID()
    {
        return $this->sellerID;
    }

    /**
     * @param string $sellerID
     * @return $this
     */
    public function setSellerID($sellerID)
    {
        $this->sellerID = $sellerID;

        return $this;
    }

}
