<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/getHistograms.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("GetHistogramsRequest")
 */
class GetHistogramsCall extends BaseFindingCall
{
    /**
     * @var string
     * @SerializedName("categoryId")
     */
    private $categoryId;

    /**
     * @return array
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param array $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

}