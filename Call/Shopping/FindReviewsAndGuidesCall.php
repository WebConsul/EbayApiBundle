<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindReviewsAndGuides.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class FindReviewsAndGuidesCall extends BaseShoppingCall
{
    /** @var string */
    private $categoryID;
    /** @var  int */
    private $maxResultsPerPage;
    /** @var  int */
    private $pageNumber;
    /** @var  string */
    private $productID;
    /** @var  string */
    private $productIDType;
    /** @var  string */
    private $productSort;
    /** @var  string */
    private $reviewSort;
    /** @var  string */
    private $sortOrder;
    /** @var  string */
    private $userID;

    /**
     * @return string
     */
    public function getInput()
    {
        if ($this->categoryID) {
            $this->input .= '<CategoryID>' . $this->categoryID . '</CategoryID>' . "\n";
        }
        if ($this->maxResultsPerPage > 0) {
            $this->input .= '<MaxResultsPerPage>' . $this->maxResultsPerPage . '</MaxResultsPerPage>' . "\n";
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
        if ($this->reviewSort) {
            $this->input .= '<ReviewSort>' . $this->reviewSort . '</ReviewSort>' . "\n";
        }
        if ($this->sortOrder) {
            $this->input .= '<SortOrder>' . $this->sortOrder . '</SortOrder>' . "\n";
        }
        if ($this->userID) {
            $this->input .= '<UserID>' . $this->userID . '</UserID>' . "\n";
        }

        return $this->input;
    }

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
    public function getMaxResultsPerPage()
    {
        return $this->maxResultsPerPage;
    }

    /**
     * @param int $maxResultsPerPage
     * @return $this
     */
    public function setMaxResultsPerPage($maxResultsPerPage)
    {
        $this->maxResultsPerPage = $maxResultsPerPage;

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

    /**
     * @return string
     */
    public function getReviewSort()
    {
        return $this->reviewSort;
    }

    /**
     * @param string $reviewSort
     * @return $this
     */
    public function setReviewSort($reviewSort)
    {
        $this->reviewSort = $reviewSort;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param string $userID
     * @return $this
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }

}