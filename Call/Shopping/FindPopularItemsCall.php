<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/FindPopularItems.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class FindPopularItemsCall extends BaseShoppingCall
{
    /** @var array */
    private $categoryID = array();
    /** @var array */
    private $categoryIDExclude = array();
    /** @var  int */
    private $maxEntries;
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
        if (!empty($this->categoryIDExclude)) {
            $this->input .= '<CategoryIDExclude>' . implode(
                    ',',
                    $this->categoryIDExclude
                ) . '</CategoryIDExclude>' . "\n";
        }
        if ($this->maxEntries) {
            $this->input .= '<MaxEntries>' . $this->maxEntries . '</MaxEntries>' . "\n";
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
     * @return array
     */
    public function getCategoryIDExclude()
    {
        return $this->categoryIDExclude;
    }

    /**
     * @param array $categoryIDExclude
     * @return $this
     */
    public function setCategoryIDExclude(array $categoryIDExclude)
    {
        $this->categoryIDExclude = $categoryIDExclude;

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