<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindProducts.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

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
