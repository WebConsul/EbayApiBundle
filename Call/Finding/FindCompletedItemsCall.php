<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findCompletedItems.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class FindCompletedItemsCall extends BaseFindingCall
{
    /** @var array */
    private $categoryId = [];
    /** @var array */
    private $keywords;
    /** @var array */
    private $outputSelector = [];
    /** @var  string */
    private $productId;
    /** @var  string */
    private $productIdType;
    public $standardInputFields = ['affiliate', 'buyerPostalCode', 'paginationInput', 'sortOrder',];

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
        if ($this->productId && $this->productIdType) {
            $this->input .= '<productId type="' . $this->productIdType . '">' . $this->productId . '</productId>' . "\n";
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
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     * @return $this
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductIdType()
    {
        return $this->productIdType;
    }

    /**
     * @param string $productIdType
     * @return $this
     */
    public function setProductIdType($productIdType)
    {
        $this->productIdType = $productIdType;

        return $this;
    }
}