<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetCategoryInfo.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class GetCategoryInfoCall extends BaseShoppingCall
{
    /** @var string */
    private $categoryID;
    /** @var  string */
    private $includeSelector;

    /**
     * @return string
     */
    public function getInput()
    {
        if ($this->categoryID) {
            $this->input .= '<CategoryID>' . $this->categoryID . '</CategoryID>' . "\n";
        }
        if ($this->includeSelector) {
            $this->input .= '<IncludeSelector>' . $this->includeSelector . '</IncludeSelector>' . "\n";
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

}