<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/getSearchKeywordsRecommendation.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @XmlRoot("GetSearchKeywordsRecommendationRequest")
 */
class GetSearchKeywordsRecommendationCall extends BaseFindingCall
{
    /**
     * @var string
     * @SerializedName("keywords")
     */
    private $keywords;

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

}
