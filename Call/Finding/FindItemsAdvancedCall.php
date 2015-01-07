<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsAdvanced.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class FindItemsAdvancedCall extends BaseFindingCall
{
    /** @var array */
    private $categoryId = array();
    /** @var  bool */
    private $descriptionSearch;
    /** @var string */
    private $keywords;
    /** @var array */
    private $outputSelector = array();

    public $standardInputFields = array(
        'affiliate',
        'buyerPostalCode',
        'paginationInput',
        'sortOrder',
    );

    /**
     * @return string
     */
    public function getInput()
    {
        if (!empty($this->categoryId)) {
            foreach ($this->categoryId as $category) {
                $this->input .= '<categoryId>' . $category . '</categoryId>' . "\n";
            }
        }
        if ($this->keywords) {
            $this->input .= '<keywords>' . $this->keywords . '</keywords>' . "\n";
        }
        if ($this->descriptionSearch) {
            $this->input .= '<descriptionSearch>' . $this->descriptionSearch . '</descriptionSearch>' . "\n";
        }
        if (!empty($this->aspectFilter)) {
            $this->input .= $this->performAspectFilter();
        }
        if (!empty($this->itemFilter)) {
            $this->input .= $this->performItemFilter();
        }
        if (!empty($this->outputSelector)) {
            foreach ($this->outputSelector as $outputSelector) {
                $this->input .= '<outputSelector>' . $outputSelector . '</outputSelector>' . "\n";
            }
        }

        return $this->input;
    }

    /**
     * @return array
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param array $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutputSelector()
    {
        return $this->outputSelector;
    }

    /**
     * @param array $outputSelector
     * @return $this
     */
    public function setOutputSelector($outputSelector)
    {
        $this->outputSelector = $outputSelector;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDescriptionSearch()
    {
        return $this->descriptionSearch;
    }

    /**
     * @param boolean $descriptionSearch
     * @return $this
     */
    public function setDescriptionSearch($descriptionSearch)
    {
        $this->descriptionSearch = $descriptionSearch;

        return $this;
    }
}