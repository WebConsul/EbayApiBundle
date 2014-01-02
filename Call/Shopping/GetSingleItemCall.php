<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetSingleItem.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class GetSingleItemCall extends BaseShoppingCall
{
    /** @var array */
    private $includeSelector = array();
    /** @var string */
    private $itemID;
    /** @var  string */
    private $variationSKU;
    /** @var array */
    private $nameValueList = array();

    /**
     * @return string
     */
    public function getInput()
    {
        if (!empty($this->includeSelector)) {
            $this->input .= '<IncludeSelector>' . implode(',', $this->includeSelector) . '</IncludeSelector>' . "\n";
        }
        if ($this->itemID) {
            $this->input .= '<ItemID>' . $this->itemID . '</ItemID>' . "\n";
        }
        if ($this->variationSKU) {
            $this->input .= '<VariationSKU>' . $this->variationSKU . '</VariationSKU>' . "\n";
        }
        if (!empty($this->nameValueList)) {
            $this->input .= '<VariationSpecifics>' . "\n";
            foreach ($this->nameValueList as $name => $valueList) {
                $this->input .= "\t" . '<NameValueList>' . "\n";
                $this->input .= "\t" . '<Name>' . $name . '</Name>' . "\n";
                foreach ($valueList as $value) {
                    $this->input .= "\t\t" . '<Value>' . $value . '</Value>' . "\n";
                }
                $this->input .= '</NameValueList>';
            }
            $this->input .= '<VariationSpecifics>';
        }

        return $this->input;
    }

    /**
     * @return string
     */
    public function getItemID()
    {
        return $this->itemID;
    }

    /**
     * @param string $itemID
     * @return $this
     */
    public function setItemID($itemID)
    {
        $this->itemID = $itemID;

        return $this;
    }

    /**
     * @return array
     */
    public function getIncludeSelector()
    {
        return $this->includeSelector;
    }

    /**
     * @param array $includeSelector
     * @return $this
     */
    public function setIncludeSelector($includeSelector)
    {
        $this->includeSelector = $includeSelector;

        return $this;
    }

    /**
     * @return string
     */
    public function getVariationSKU()
    {
        return $this->variationSKU;
    }

    /**
     * @param string $variationSKU
     * @return $this
     */
    public function setVariationSKU($variationSKU)
    {
        $this->variationSKU = $variationSKU;

        return $this;
    }

    /**
     * @return array
     */
    public function getNameValueList()
    {
        return $this->nameValueList;
    }

    /**
     * @param array $nameValueList
     * @return $this
     */
    public function setNameValueList($nameValueList)
    {
        $this->nameValueList = $nameValueList;

        return $this;
    }


}