<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByImage.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class findItemsByImageCall extends BaseFindingCall
{
    /** @var array */
    private $categoryId = array();
    /** @var string */
    private $itemId;
    /** @var array */
    private $outputSelector = array();

    public $standardInputFields = array(
        'affiliate',
        'buyerPostalCode',
        'paginationInput',
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
        if ($this->itemId) {
            $this->input .= '<itemId>' . $this->itemId . '</itemId>' . "\n";
        }
        if (!empty($this->aspectFilter)) {
            $this->input .= $this->performAspectFilter();
        }
        if (!empty($this->domainFilter)) {
            $this->input .= $this->performDomainFilter();
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

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param string $itemId
     * @return $this
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

}