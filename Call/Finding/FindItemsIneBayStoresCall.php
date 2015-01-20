<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsIneBayStores.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("FindItemsIneBayStoresRequest")
 */
class FindItemsIneBayStoresCall extends BaseFindingCall
{
    /**
     * @var  string
     * @SerializedName("storeName")
     */
    private $storeName;

     /**
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * @param string $storeName
     * @return $this
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;

        return $this;
    }

}
