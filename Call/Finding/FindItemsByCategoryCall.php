<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByCategory.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class FindItemsByCategoryCall extends BaseFindingCall
{
    /** @var array */
    private $categoryId = array();
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

}