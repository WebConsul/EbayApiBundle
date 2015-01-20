<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindProducts.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;
use WebConsul\EbayApiBundle\Type\ProductID;

/**
 * @XmlRoot("FindProductsRequest")
 */
class FindProductsCall extends BaseShoppingCall
{
    /**
     * @var boolean
     * @SerializedName("AvailableItemsOnly")
     */
    private $availableItemsOnly;

    /**
     * @var string
     * @SerializedName("CategoryID")
     */
    private $categoryID;

    /**
     * @XmlList(inline = true, entry = "DomainName")
     */
    private $domainName;

    /** @var  boolean
     * @SerializedName("HideDuplicateItems")
     */
    private $hideDuplicateItems;

    /**
     * @var  string
     * @SerializedName("IncludeSelector")
     */
    private $includeSelector;

    /**
     * @var  integer
     * @SerializedName("MaxEntries")
     */
    private $maxEntries;

    /**
     * @var  integer
     * @SerializedName("PageNumber")
     */
    private $pageNumber;

    /**
     * @Type("WebConsul\EbayApiBundle\Type\ProductID")
     * @SerializedName("ProductID")
     */
    private $productID;

    /**
     * @var  string
     * @SerializedName("ProductSort")
     */
    private $productSort;

    /**
     * @var  string
     * @SerializedName("QueryKeywords")
     */
    private $queryKeywords;

    /** @var  string
     * @SerializedName("sortOrder")
     */
    private $sortOrder;

    /**
     * @return string
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * @param string $categoryID
     * @return $this
     */
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     * @return $this
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

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
     * @return boolean
     */
    public function getHideDuplicateItems()
    {
        return $this->hideDuplicateItems;
    }

    /**
     * @param boolean $hideDuplicateItems
     * @return $this
     */
    public function setHideDuplicateItems($hideDuplicateItems)
    {
        $this->hideDuplicateItems = $hideDuplicateItems;

        return $this;
    }

    /**
     * @return string
     */
    public function getIncludeSelector()
    {
        return $this->includeSelector;
    }

    /**
     * @param string $includeSelector
     * @return $this
     */
    public function setIncludeSelector($includeSelector)
    {
        $this->includeSelector = $includeSelector;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxEntries()
    {
        return $this->maxEntries;
    }

    /**
     * @param int $maxEntries
     * @return $this
     */
    public function setMaxEntries($maxEntries)
    {
        $this->maxEntries = $maxEntries;

        return $this;
    }

    /**
     * return WebConsul\EbayApiBundle\Type\ProductID
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param ProductID $productID
     * @return $this
     */
    public function setProductID(ProductID $productID)
    {
        $this->productID = $productID;

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

}
