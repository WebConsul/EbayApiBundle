<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindPopularSearches.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class FindPopularSearchesCall extends BaseShoppingCall
{
    /** @var array */
    private $categoryID = array();
    /** @var bool */
    private $includeChildCategories;
    /** @var  int */
    private $maxKeywords;
    /** @var  int */
    private $maxResultsPerPage;
    /** @var  int */
    private $pageNumber;
    /** @var  string */
    private $queryKeywords;

    /**
     * @return mixed
     */
    public function getInput()
    {
        if (!empty($this->categoryID)) {
            $this->input .= '<CategoryID>' . implode(',', $this->categoryID) . '</CategoryID>' . "\n";
        }
        if ($this->includeChildCategories) {
            $this->input .= '<IncludeChildCategories>' . $this->includeChildCategories . '</IncludeChildCategories>' . "\n";
        }
        if ($this->maxKeywords > 0) {
            $this->input .= '<MaxKeywords>' . $this->maxKeywords . '</MaxKeywords>' . "\n";
        }
        if ($this->maxResultsPerPage > 0) {
            $this->input .= '<MaxResultsPerPage>' . $this->maxResultsPerPage . '</MaxResultsPerPage>' . "\n";
        }
        if ($this->pageNumber > 0) {
            $this->input .= '<PageNumber>' . $this->pageNumber . '</PageNumber>' . "\n";
        }
        if ($this->queryKeywords) {
            $this->input .= '<QueryKeywords>' . $this->queryKeywords . '</QueryKeywords>' . "\n";
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
     * @return boolean
     */
    public function getIncludeChildCategories()
    {
        return $this->includeChildCategories;
    }

    /**
     * @param boolean $includeChildCategories
     * @return $this
     */
    public function setIncludeChildCategories($includeChildCategories)
    {
        $this->includeChildCategories = $includeChildCategories;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxKeywords()
    {
        return $this->maxKeywords;
    }

    /**
     * @param int $maxKeywords
     * @return $this
     */
    public function setMaxKeywords($maxKeywords)
    {
        $this->maxKeywords = $maxKeywords;

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

}