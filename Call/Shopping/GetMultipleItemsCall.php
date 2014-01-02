<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetMultipleItems.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class GetMultipleItemsCall extends BaseShoppingCall
{
    /** @var array */
    private $includeSelector = array();
    /** @var array */
    private $itemID = array();

    /**
     * @return string
     */
    public function getInput()
    {
        if (!empty($this->includeSelector)) {
            $this->input .= '<IncludeSelector>' . implode(',', $this->includeSelector) . '</IncludeSelector>' . "\n";
        }
        if (!empty($this->itemID)) {
            foreach ($this->itemID as $item) {
                $this->input .= '<ItemID>' . $item . '</ItemID>' . "\n";
            }
        }

        return $this->input;
    }

    /**
     * @return array
     */
    public function getItemID()
    {
        return $this->itemID;
    }

    /**
     * @param array $itemID
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


}