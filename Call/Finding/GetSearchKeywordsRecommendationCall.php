<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/getSearchKeywordsRecommendation.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("GetSearchKeywordsRecommendationRequest")
 */
class GetSearchKeywordsRecommendationCall extends BaseFindingCall
{
}
