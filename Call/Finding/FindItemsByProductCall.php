<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByProduct.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

class FindItemsByProductCall extends BaseFindingCall
{
    /** @var array */
    private $outputSelector = array();
    /** @var  string */
    private $productId;
    /** @var  string */
    private $productIdType;
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