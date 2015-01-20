<?php
/**
 * @link http://developer.ebay.com/Devzone/shopping/docs/CallRef/GetMultipleItems.html
 */

namespace WebConsul\EbayApiBundle\Call\Shopping;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("GetMultipleItemsRequest")
 */
class GetMultipleItemsCall extends BaseShoppingCall
{
    /**
     * @var string
     * @SerializedName("IncludeSelector")
     */
    private $includeSelector;
    /**
     * @XmlList(inline = true, entry = "ItemID")
     */
    private $itemID;

    /**
     * @return string
     */
    public function getIncludeSelector()
    {
        return $this->includeSelector;
    }

    /**
     * @param string $includeSelector
     * @return $this
     */
    public function setIncludeSelector($includeSelector)
    {
        $this->includeSelector = $includeSelector;

        return $this;
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
