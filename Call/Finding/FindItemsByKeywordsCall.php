<?php
/**
 * @link http://www.developer.ebay.com/DevZone/finding/CallRef/findItemsByKeywords.html
 */

namespace WebConsul\EbayApiBundle\Call\Finding;

use JMS\Serializer\Annotation\XmlRoot;

/**
 * @XmlRoot("FindItemsByImageRequest")
 */
class FindItemsByKeywordsCall extends BaseFindingCall
{
}
