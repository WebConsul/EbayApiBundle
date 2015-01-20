<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetMultipleItems.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;

/**
 * @XmlRoot("GetMultipleItemsRequest")
 */
class GetMultipleItemsCall extends BaseShoppingCall
{
    /**
     * @XmlList(inline = true, entry = "ItemID")
     */
    private $itemID;

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
