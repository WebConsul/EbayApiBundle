<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetItemStatus.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;

/**
 * @XmlRoot("GetItemStatusRequest")
 */
class GetItemStatusCall extends BaseShoppingCall
{
    /**
     * @XmlList(inline = true, entry = "itemID")
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
