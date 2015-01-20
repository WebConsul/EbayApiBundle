<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsAdvanced.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("FindItemsAdvancedRequest")
 */
class FindItemsAdvancedCall extends BaseFindingCall
{

    /**
     * @var  bool
     * @SerializedName("descriptionSearch")
     */
    private $descriptionSearch;

    /**
     * @return boolean
     */
    public function getDescriptionSearch()
    {
        return $this->descriptionSearch;
    }

    /**
     * @param boolean $bool
     * @return $this
     */
    public function setDescriptionSearch($bool)
    {
        $this->descriptionSearch = $bool;

        return $this;
    }

}
