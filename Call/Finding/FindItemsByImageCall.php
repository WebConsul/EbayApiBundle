<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByImage.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("FindItemsByImageRequest")
 */
class FindItemsByImageCall extends BaseFindingCall
{
    /**
     * @var string
     * @SerializedName("itemId")
     */
    private $itemId;

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
