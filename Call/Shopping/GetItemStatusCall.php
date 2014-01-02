<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetItemStatus.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

class GetItemStatusCall extends BaseShoppingCall
{
    /** @var array */
    private $itemID = array();

    /**
     * @return string
     */
    public function getInput()
    {
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


}