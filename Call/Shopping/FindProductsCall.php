<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindProducts.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class FindProductsCall extends BaseShoppingCall
{
    /** @var  bool */
    private $availableItemsOnly;
    /** @var array */
    private $categoryID = array();
    /** @var array */
    private $domainName = array();
    /** @var  bool */
    private $hideDuplicateItems;
    /** @var  string */
    private $includeSelector;
    /** @var  int */
    private $maxEntries;
    /** @var  int */
    private $pageNumber;
    /** @var  string */
    private $productID;
    /** @var  string */
    private $productIDType;
    /** @var  string */
    private $productSort;
    /** @var  string */
    private $queryKeywords;
    /** @var  string */
    private $sortOrder;

    /**
     * @return string
     */
    public function getInput()
    {
        if ($this->availableItemsOnly) {
            $this->input .= '<AvailableItemsOnly>' . $this->availableItemsOnly . '</AvailableItemsOnly>' . "\n";
        }
        if (!empty($this->categoryID)) {
            $this->input .= '<CategoryID>' . implode(',', $this->categoryID) . '</CategoryID>' . "\n";
        }
        if (!empty($this->domainName)) {
            foreach ($this->domainName as $domain) {
                $this->input .= '<DomainName>' . $domain . '</DomainName>' . "\n";
            }
        }
        if ($this->hideDuplicateItems) {
            $this->input .= '<HideDuplicateItems>' . $this->hideDuplicateItems . '</HideDuplicateItems>' . "\n";
        }
        if ($this->includeSelector) {
            $this->input .= '<IncludeSelector>' . $this->includeSelector . '</IncludeSelector>' . "\n";
        }
        if ($this->maxEntries > 0) {
            $this->input .= '<MaxEntries>' . $this->maxEntries . '</MaxEntries>' . "\n";
        }
        if ($this->pageNumber > 0) {
            $this->input .= '<PageNumber>' . $this->pageNumber . '</PageNumber>' . "\n";
        }
        if ($this->productID && $this->productIDType) {
            $this->input .= '<ProductID type="' . $this->productIDType . '">' . $this->productID . '</ProductID>' . "\n";
        }
        if ($this->productSort) {
            $this->input .= '<ProductSort>' . $this->productSort . '</ProductSort>' . "\n";
        }
        if ($this->queryKeywords) {
            $this->input .= '<QueryKeywords>' . $this->queryKeywords . '</QueryKeywords>' . "\n";
        }
        if ($this->sortOrder) {
            $this->input .= '<SortOrder>' . $this->sortOrder . '</SortOrder>' . "\n";
        }

        return $this->input;
    }

    /**
     * @return array
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * @param array $categoryID
     * @return $this
     */
    public function setCategoryID(array $categoryID)
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
     * @return string
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param string $productID
     * @return $this
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductIDType()
    {
        return $this->productIDType;
    }

    /**
     * @param string $productIDType
     * @return $this
     */
    public function setProductIDType($productIDType)
    {
        $this->productIDType = $productIDType;

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